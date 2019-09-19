<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_login','login');
	}

	public function index()
	{
		$this->load->library('session');
		$data['error'] 	= '';
		if($this->session->userdata('login') == TRUE ){
			redirect('monitoring');
		}
		
		$this->load->view('login');
	}

	public function proses()
	{
		// echo '0';

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = $this->login->proses($username, $password);

		if (!empty($login)) {
			$data = array(
						'users_id' 		=> $login->id,
						'username' 		=> $login->username, 
						'nama' 			=> $login->nama,
						'groups_id' 	=> $login->groups_id
					);
			
			$this->session->set_userdata('login',$data);
			echo '1';
		} else {
			echo '0';
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */