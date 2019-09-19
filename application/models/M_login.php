<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function proses($username, $password)
	{
		$this->db->select('*');
		$this->db->where('username',$username);
	    $query = $this->db->get('users');

	    if ($query->num_rows() > 0) {
	    	$data = $query->row();
	        if (password_verify($password, $data->password)) {
			    return $data;
			} else {
			    return array();
			}
	    } else {
	        return array();
	    }
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */