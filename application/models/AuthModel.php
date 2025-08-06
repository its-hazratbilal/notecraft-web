<?php

class AuthModel extends CI_Model
{

	function get_user_by_email($email)
	{
		return $this->db
			->select('*')
			->from('users')
			->where(array('role' => 'admin', 'email' => $email))
			->get()
			->row();
	}

}
