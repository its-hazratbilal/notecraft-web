<?php

class DashboardModel extends CI_Model {

	function get_total_admins() {
		return $this->db
			->select('*')
			->from('users')
			->where('role', 'admin')
			->count_all_results();
	}

	function get_total_users() {
		return $this->db
			->select('*')
			->from('users')
			->where('role', 'user')
			->count_all_results();
	}

	function get_total_active_users() {
		return $this->db
			->select('*')
			->from('users')
			->where(array('role' => 'user', 'status' => 'active'))
			->count_all_results();
	}

	function get_total_notes() {
		return $this->db
			->select('*')
			->from('notes')
			->count_all_results();
	}

	function insert_user($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	function get_all_users() {
		return $this->db
			->select('*')
			->from('users')
			->get()
			->result();
	}

	function get_user_by_email($email)
	{
		return $this->db
			->select('*')
			->from('users')
			->where('email', $email)
			->get()
			->row();
	}

	function get_user_by_id($id)
	{
		return $this->db
			->select('*')
			->from('users')
			->where('id', $id)
			->get()
			->row();
	}

	function delete_user($id)
	{
		return $this->db->where('id', $id)->delete("users");
	}

	function update_user_by_id($id, $data)
	{
		return $this->db
			->set($data)
			->where('id', $id)
			->update('users');
	}

	function get_all_notes()
	{
		return $this->db
			->select('users.full_name, users.email, users.status, notes.id, notes.title, notes.description, notes.created_at')
			->from('notes')
			->join('users', 'notes.user_id = users.id', 'left')
			->get()
			->result();
	}

	function get_notes_by_user_id($user_id)
	{
		return $this->db
			->select('users.full_name, users.email, users.status, notes.id, notes.title, notes.description, notes.created_at')
			->from('notes')
			->join('users', 'notes.user_id = users.id', 'left')
			->where('notes.user_id', $user_id)
			->get()
			->result();
	}

	function delete_note($id)
	{
		return $this->db->where('id', $id)->delete("notes");
	}

	function delete_note_by_user_id($id, $user_id)
	{
		return $this->db->where(array('id' => $id, 'user_id' => $user_id))->delete("notes");
	}

}
