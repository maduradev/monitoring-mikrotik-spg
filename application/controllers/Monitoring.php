<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_mikrotik','mikrotik');
	}

	public function index()
	{
		$data = array();
		$data['page'] 	= 'monitoring';
		$data['title'] 	= 'Monitoring Mikrotik';
		$data['mikrotik'] 	= $this->mikrotik->get_all();
		$this->ayr_theme('monitoring',$data);
	}

	public function load_cctv_status($id='')
	{
		ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
		$mikrotik = $this->mikrotik->get_by_id($id);
		exec("ping -n 3 ".$mikrotik->ip_mikrotik, $output, $status);

		if ($status == 1) {
			$bg = 'bg-color-red';
			$icon = 'fa-times';
		} else {
			$bg = 'bg-color-green';
			$icon = 'fa-check';
		}

		echo '	<div class="col-md-3 col-sm-6 col-xs-6">           
                    <div class="panel panel-back noti-box">
                        <span class="icon-box '.$bg.' set-icon">
                            <i class="fa '.$icon.'"></i>
                        </span>
                        <div class="text-box" >
                            <p class="main-text">'.$mikrotik->ip_mikrotik.'</p>
                            <p class="text-muted">'.$mikrotik->nama_mikrotik.'</p>
                        </div>
                    </div>
                </div>';
	}
}

/* End of file monitoring.php */
/* Location: ./application/controllers/monitoring.php */