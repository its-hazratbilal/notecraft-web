<?php

class ApiModel extends CI_Model
{

	function get_user_by_id($id)
	{
		return $this->db
			->select('*')
			->from('users')
			->where(array('role' => 'user', 'id' => $id))
			->get()
			->row();
	}

	function get_user_by_email($email)
	{
		return $this->db
			->select('*')
			->from('users')
			->where(array('role' => 'user', 'email' => $email))
			->get()
			->row();
	}

	function insert_user($data)
	{
		return $this->db->insert('users', $data);
	}

	function update_user_by_id($user_id, $data)
	{
		return $this->db
			->set($data)
			->where('id', $user_id)
			->update('users');
	}

	function get_notes_by_user_id($user_id)
	{
		return $this->db
			->select('*')
			->from('notes')
			->where('user_id', $user_id)
			->order_by('id', 'DESC')
			->get()
			->result();
	}

	function insert_note($data)
	{
		$this->db->insert('notes', $data);
		return $this->db->insert_id();
	}

	function delete_note_by_id($id, $user_id)
	{
		return $this->db->where(array('id' => $id, 'user_id' => $user_id))->delete("notes");
	}

	function update_note_by_id($id, $user_id, $data)
	{
		return $this->db
			->set($data)
			->where(array('id' => $id, 'user_id' => $user_id))
			->update('notes');
	}

}
