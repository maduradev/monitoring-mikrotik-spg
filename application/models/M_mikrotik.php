<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mikrotik extends CI_Model {

	var $table = 'mikrotik';

	public function get_all($where='',$limit='',$offset='',$order='')
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('id','ASC');
		$query = $this->db->get();

		if ($this->db->count_all_results() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		if ($this->db->count_all_results() > 0) {
			return $query->row();
		} else {
			return array();
		}
	}

	public function get_by_ip($ip_mikrotik='')
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('ip_mikrotik',$ip_mikrotik);
		$query = $this->db->get();

		if ($this->db->count_all_results() > 0) {
			return $query->row();
		} else {
			return array();
		}
	}

	public function create($data)
	{
		$this->db->insert($this->table, $data);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function update($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update($this->table, $data);

		return true;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file M_mikrotik.php */
/* Location: ./application/models/M_mikrotik.php */