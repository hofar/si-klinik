<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_m extends CI_Model
{
	public function get($table)
	{
		return $this->db->get($table);
	}

	public function tambahDataUser($data)
	{
		$this->db->insert('users', $data);
	}

	public function get_where($id)
	{
		return $this->db->get_where('users', ['id_user', $id])->row_array();
	}

	public function ubahDataUser($data)
	{
		$id_user = $data['id_user'];
		$arr = [
			'username' => html_escape($data['username']),
			'password' => html_escape($data['password']),
			'nama_lengkap' => html_escape($data['nama'])
		];

		$this->db->where('id_user', $id_user);
		$this->db->update('users', $arr);
	}
}
