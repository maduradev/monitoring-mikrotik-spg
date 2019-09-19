<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function ayr_theme($view, $data=[])
	{
		$session 	= $this->session->userdata('login');
		if ($session['groups_id'] == 1){
			$data['_header'] 	= $this->load->view('_partial/header', $data, true);
			$data['_navbar'] 	= $this->load->view('_partial/navbar', $data, true);
			$data['_sidebar'] 	= $this->load->view('_partial/sidebar', $data, true);
			$data['_content'] 	= $this->load->view($view, $data, true);
			$data['_js'] 		= $this->load->view('_partial/js', $data, true);
			$data['_footer'] 	= $this->load->view('_partial/footer', $data, true);

			$this->load->view('_partial/template.php', $data);
		} else {
			redirect('login','refresh');
		}
	}
}

/* End of file mY_Controller.php */
/* Location: ./application/controllers/mY_Controller.php */