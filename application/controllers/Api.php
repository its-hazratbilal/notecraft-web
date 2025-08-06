<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller {

	function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->model('ApiModel');

	}

	private function generate_token($user)
	{
		$this->load->library('Authorization_Token');
		$token_data = array(
			'id' => $user->id,
			'time' => time()
		);

		return $this->authorization_token->generateToken($token_data);
	}

	private function validate_auth_token()
	{
		$this->load->library('Authorization_Token');
		$auth_token = $this->authorization_token->validateToken();

		if ($auth_token['status'] == FALSE) {
			$response = array(
				'success' => false,
				'message' => $auth_token['message']
			);

			$this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
		}

		return $auth_token;
	}

	public function register_post()
	{
		$this->load->library('Password');

		$full_name = $this->post('full_name');
		$email = $this->post('email');
		$gender = $this->post('gender');
		$password = $this->post('password');

		if (empty($full_name) || empty($email) || empty($gender) || empty($password)) {
			$response = array(
				'success' => false,
				'message' => "All fields are required"
			);

			$this->response($response);
		}

		$user = $this->ApiModel->get_user_by_email($email);
		if (!empty($user)) {
			$response = array(
				'success' => false,
				'message' => "Email address already registered"
			);

			$this->response($response);
		}

		$password_validation = validate_password($password);
		if ($password_validation != "success") {
			$response = array(
				'success' => false,
				'message' => $password_validation
			);

			$this->response($response);
		}

		$insert = array(
			'full_name' => $full_name,
			'email' => $email,
			'gender' => $gender,
			'password' => $this->password->make($password),
			'role' => 'user',
			'status' => 'active'
		);

		$this->ApiModel->insert_user($insert);

		$response = array(
			'success' => true,
			'message' => "Account created successfully"
		);

		$this->response($response);
	}

	public function login_post()
	{
		$this->load->library('Password');

		$email = $this->post('email');
		$password = $this->post('password');

		if (empty($email) || empty($password)) {
			$response = array(
				'success' => false,
				'message' => "Email or Password is empty"
			);

			$this->response($response);
		}

		$user = $this->ApiModel->get_user_by_email($email);

		if (empty($user)) {
			$response = array(
				'success' => false,
				'message' => "Email is not found"
			);

			$this->response($response);

		} else if (!$this->password->validate($password, $user->password)) {
			$response = array(
				'success' => false,
				'message' => "Invalid login"
			);

			$this->response($response);

		} else if ($user->status != "active") {
			$response = array(
				'success' => false,
				'message' => "Your account is restricted. Please contact us to re-activate your account"
			);

			$this->response($response);

		} else {
			$userData = array(
				'full_name' => $user->full_name,
				'email' => $user->email,
				'gender' => $user->gender,
				'token' => $this->generate_token($user)
			);

			$response = array(
				'user' => $userData,
				'success' => true,
				'message' => "Login successfully"
			);

			$this->response($response);

		}
	}

	public function change_password_post() {
		$auth_token = $this->validate_auth_token();
		$user_id = $auth_token['data']->id;

		$this->load->library('Password');

		$old_password = $this->post('password');
		$new_password = $this->post('new_password');

		if (empty($old_password) || empty($new_password)) {
			$response = array(
				'success' => false,
				'message' => "All fields are required"
			);

			$this->response($response);
		}

		$user = $this->ApiModel->get_user_by_id($user_id);

		if (!$this->password->validate($old_password, $user->password)) {
			$response = array(
				'success' => false,
				'message' => "Old password is not valid"
			);

			$this->response($response);

		}

		$generated_password = $this->password->make($new_password);
		$this->ApiModel->update_user_by_id($user_id, array('password' => $generated_password));

		$response = array(
			'success' => true,
			'message' => "Password changed successfully"
		);
		$this->response($response);
	}

	public function update_profile_post() {
		$auth_token = $this->validate_auth_token();
		$user_id = $auth_token['data']->id;

		$full_name = $this->post('full_name');
		$gender = $this->post('gender');

		if (empty($full_name) || empty($gender)) {
			$response = array(
				'success' => false,
				'message' => "All fields are required"
			);

			$this->response($response);
		}

		$update = array(
			'full_name' => $full_name,
			'gender' => $gender,
		);

		$this->ApiModel->update_user_by_id($user_id, $update);
		$response = array(
			'success' => true,
			'message' => "Profile updated successfully"
		);

		$this->response($response);

	}

	public function notes_get() {
		$auth_token = $this->validate_auth_token();
		$user_id = $auth_token['data']->id;

		$notes = $this->ApiModel->get_notes_by_user_id($user_id);

		$response = array(
			'notes' => $notes,
			'success' => true,
			'message' => "success"
		);

		$this->response($response);
	}

	public function add_note_post() {
		$auth_token = $this->validate_auth_token();
		$user_id = $auth_token['data']->id;

		$title = $this->post('title');
		$description = $this->post('description');

		if (empty($title) || empty($description)) {
			$response = array(
				'success' => false,
				'message' => "All fields are required"
			);

			$this->response($response);
		}

		$insert = array(
			'user_id' => $user_id,
			'title' => $title,
			'description' => $description
		);
		$this->ApiModel->insert_note($insert);

		$response = array(
			'success' => true,
			'message' => "Note added successfully"
		);

		$this->response($response);

	}

	public function delete_note_post() {
		$auth_token = $this->validate_auth_token();
		$user_id = $auth_token['data']->id;

		$id = $this->post('id');

		if (empty($id)) {
			$response = array(
				'success' => false,
				'message' => "Note id is not valid"
			);

			$this->response($response);
		}

		$this->ApiModel->delete_note_by_id($id, $user_id);

		$response = array(
			'success' => true,
			'message' => "Note deleted successfully"
		);

		$this->response($response);

	}

	public function update_note_post() {
		$auth_token = $this->validate_auth_token();
		$user_id = $auth_token['data']->id;

		$id = $this->post('id');
		$title = $this->post('title');
		$description = $this->post('description');

		if (empty($id) || empty($title) || empty($description)) {
			$response = array(
				'success' => false,
				'message' => "All fields are required"
			);

			$this->response($response);
		}

		$update = array(
			'title' => $title,
			'description' => $description
		);

		$this->ApiModel->update_note_by_id($id, $user_id, $update);

		$response = array(
			'success' => true,
			'message' => "Note updated successfully"
		);

		$this->response($response);

	}

}
