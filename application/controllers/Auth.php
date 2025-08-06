<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->database();
		$this->load->model('AuthModel');

	}

	public function view() {
		$session_data = $this->session->get_userdata();
		if (isset($session_data['id'])) {
			redirect(base_url('home'));
		}

		$this->load->view('auth/login');
	}

	public function login() {
		$this->load->library('Password');

		if (!$this->input->post()) {
			$this->session->set_flashdata('error_message', 'Email or Password is empty');
			redirect(base_url('login'));
		}

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->AuthModel->get_user_by_email($email);
		if (empty($user)) {
			$this->session->set_flashdata('error_message', 'Username or Password is not valid');
			redirect(base_url('login'));
		} else if(!$this->password->validate($password, $user->password)) {
			$this->session->set_flashdata('error_message', 'Invalid Login');
			redirect(base_url('login'));
		} else if ($user->status != "active") {
			$this->session->set_flashdata('error_message', 'Your account is '.ucfirst($user->status).'. Please contact us');
			redirect(base_url('login'));
		} else {
			$data = array(
				'id' => $user->id,
				'full_name' => $user->full_name,
			);
			$this->session->set_userdata($data);

			$this->session->set_flashdata('success_message', 'Login successfully');
			redirect(base_url('home'));
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('success_message', 'You have successfully logged out');
		redirect(base_url('login'));

	}

}
