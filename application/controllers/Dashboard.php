<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->database();
		$this->load->model('DashboardModel');

		$session_data = $this->session->get_userdata();
		if (!isset($session_data['id'])) {
			redirect(base_url('login'));
		}

	}

	public function home() {
		$response['total_admins'] = $this->DashboardModel->get_total_admins();
		$response['total_users'] = $this->DashboardModel->get_total_users();
		$response['total_active_users'] = $this->DashboardModel->get_total_active_users();
		$response['total_notes'] = $this->DashboardModel->get_total_notes();

		$response['notes'] = $this->DashboardModel->get_all_notes();

		$this->load->view('dashboard/home', $response);
	}

	public function view_users() {
		$response['users'] = $this->DashboardModel->get_all_users();
		$this->load->view('users/view', $response);

	}

	public function create_user() {
		$this->load->view('users/create');

	}

	public function add_user()
	{
		$this->load->library('Password');

		$full_name = $this->input->post('full_name');
		$email = $this->input->post('email');
		$gender = $this->input->post('gender');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$role = $this->input->post('role');
		$status = $this->input->post('status');

		if (empty($full_name) || empty($email) || empty($gender) || empty($password) || empty($role) || empty($status)) {
			$this->session->set_flashdata('error_message', 'All fields are required');
			redirect(base_url('users/create'));
		}

		if ($password != $confirm_password) {
			$this->session->set_flashdata('error_message', 'Password and confirm password is not matched');
			redirect(base_url('users/create'));
		}

		$user = $this->DashboardModel->get_user_by_email($email);
		if (!empty($user)) {
			$this->session->set_flashdata('error_message', 'Email address already registered');
			redirect(base_url('users/create'));
		}

		$password_validation = validate_password($password);
		if ($password_validation != "success") {
			$this->session->set_flashdata('error_message', $password_validation);
			redirect(base_url('users/create'));
		}

		$insert = array(
			'full_name' => $full_name,
			'email' => $email,
			'gender' => $gender,
			'password' => $this->password->make($password),
			'role' => $role,
			'status' => $status
		);

		$this->DashboardModel->insert_user($insert);

		$this->session->set_flashdata('success_message', 'Account created successfully');
		redirect(base_url('users'));

	}

	public function delete_user($id = "0") {
		$this->DashboardModel->delete_user($id);
		$this->session->set_flashdata('success_message', 'Record deleted successfully');
		redirect('users');
	}

	public function edit_user($id = "0") {
		$response['user'] = $this->DashboardModel->get_user_by_id($id);
		$this->load->view('users/edit', $response);

	}

	public function update_user() {
		$this->load->library('Password');

		$id = $this->input->post('id');
		$full_name = $this->input->post('full_name');
		$gender = $this->input->post('gender');
		$role = $this->input->post('role');
		$status = $this->input->post('status');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');

		if (empty($full_name) || empty($gender) || empty($role) || empty($status)) {
			$this->session->set_flashdata('error_message', 'All fields are required');
			redirect(base_url('users/edit/'.$id));
		}

		$update = array(
			'full_name' => $full_name,
			'gender' => $gender,
			'role' => $role,
			'status' => $status
		);

		if ($password != $confirm_password) {
			$this->session->set_flashdata('error_message', 'Password and confirm password is not matched');
			redirect(base_url('users/edit/'.$id));
		} else {
			if (!empty($password)) {
				$password_validation = validate_password($password);
				if ($password_validation != "success") {
					$this->session->set_flashdata('error_message', $password_validation);
					redirect(base_url('users/edit/'.$id));
				} else {
					$update['password'] = $this->password->make($password);
				}
			}
		}

		$result = $this->DashboardModel->update_user_by_id($id, $update);

		if (empty($result)) {
			$this->session->set_flashdata('error_message', 'Failed to update account. Please try again');
			redirect(base_url('users/edit/'.$id));
		} else {
			$this->session->set_flashdata('success_message', 'Account updated successfully');
			redirect(base_url('users'));
		}
	}

	public function view_notes() {
		$response['view_by'] = "all";
		$response['notes'] = $this->DashboardModel->get_all_notes();
		$this->load->view('notes/view', $response);

	}

	public function delete_note($id = "0") {
		$result = $this->DashboardModel->delete_note($id);
		$this->session->set_flashdata('success_message', 'Record deleted successfully');
		redirect('notes');
	}

	public function home_delete_note($id = "0") {
		$result = $this->DashboardModel->delete_note($id);
		$this->session->set_flashdata('success_message', 'Record deleted successfully');
		redirect('home');
	}

	public function view_user_notes($user_id) {
		$response['view_by'] = "user";
		$response['user_id'] = $user_id;
		$response['notes'] = $this->DashboardModel->get_notes_by_user_id($user_id);
		$this->load->view('notes/view', $response);

	}

	public function user_delete_note($user_id, $id) {
		$result = $this->DashboardModel->delete_note_by_user_id($id, $user_id);
		$this->session->set_flashdata('success_message', 'Record deleted successfully');
		redirect(base_url('users/view-notes/'.$user_id));
	}


}
