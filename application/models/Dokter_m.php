<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_m extends CI_Model {
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambahDataDokter($data)
	{
		$this->db->insert('dokter', $data);
	}

	public function ubahDataDokter($data, $id)
	{
		$this->db->where('id_dokter', $id);
		$this->db->update('dokter', $data);
	}

}