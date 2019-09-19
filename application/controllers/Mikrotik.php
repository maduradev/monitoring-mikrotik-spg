<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikrotik extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_mikrotik','mikrotik');
	}

	public function index()
	{
		$data = array();
		$data['page'] 		= 'mikrotik';
		$data['title'] 		= 'Data Mikrotik';
		$data['mikrotik'] 	= $this->mikrotik->get_all();
		$this->ayr_theme('mikrotik/index',$data);
	}

	public function tambah()
	{
		$data['page'] 		= 'mikrotik';
		$data['title'] 		= 'Tambah Data Mikrotik';
		$this->ayr_theme('mikrotik/add',$data);
	}

	public function create()
	{
		$post = $this->input->post();
		$data = array(
			'ip_mikrotik' => $post['ip_mikrotik'],
			'nama_mikrotik' => $post['nama_mikrotik']
		);

		$result = $this->mikrotik->create($data);
		echo $result;
	}

	public function edit($id)
	{
		$data['page'] 		= 'mikrotik';
		$data['title'] 		= 'Edit Data Mikrotik';
		$data['mikrotik'] 	= $this->mikrotik->get_by_id($id);
		$this->ayr_theme('mikrotik/edit',$data);
	}

	public function update()
	{
		$post = $this->input->post();
		$data = array(
			'id' => $post['id_mikrotik'],
			'ip_mikrotik' => $post['ip_mikrotik'],
			'nama_mikrotik' => $post['nama_mikrotik']
		);

		$result = $this->mikrotik->update($data);
		echo $result;
	}

	public function check_ip()
	{
		$ip_mikrotik = $this->input->post('ip_mikrotik');

		$result = $this->mikrotik->get_by_ip($ip_mikrotik);

		if (!empty($result)) {
			$result->ret = 0; //ada ip
		} else {
			$result = 1; //tidak ada ip
		}

		echo json_encode($result);
	}

	public function hapus()
	{
		$id = $this->input->post('id');

		$result = $this->mikrotik->delete($id);

		echo $result;
	}
}

/* End of file mikrotik.php */
/* Location: ./application/controllers/mikrotik.php */