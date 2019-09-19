<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_users','users');
	}

	public function index()
	{
		
	}

	public function check_username()
	{
		$username = $this->input->post('username');
		$result = $this->users->check_username($username);
		echo $result;
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */