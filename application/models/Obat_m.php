<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_m extends CI_Model {
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tambahDataObat($data)
	{
		$this->db->insert('obat', $data);
	}

	public function ubahDataObat($data, $id)
	{
		$this->db->where('id_obat', $id);
		$this->db->update('obat', $data);
	}

}