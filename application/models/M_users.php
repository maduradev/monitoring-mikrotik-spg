<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {
	var $table = 'users';

	public function check_username($username)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username', $username);

		if ($this->db->count_all_results() > 0) {
			return 1; //user ada di database
		} else {
			return 0; //user tidak ada di database
		}
	}
}

/* End of file M_users.php */
/* Location: ./application/models/M_users.php */