<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_m extends CI_Model {
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambahDataPasien($data)
	{
		$this->db->insert('pasien', $data);
	}

	public function ubahDataPasien($data, $id)
	{
		$this->db->where('id_pasien', $id);
		$this->db->update('pasien', $data);
	}

}