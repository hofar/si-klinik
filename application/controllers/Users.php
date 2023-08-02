<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_m');
		$this->load->library('form_validation');
		is_logged_in();
	}

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				"title" => "Users",
				"content" => $this->load->view("users/index", array(
					"users" => $this->Users_m->get('users')->result_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$data = array(
				'nama_lengkap' => html_escape($this->input->post('nama', true)),
				'username' => html_escape($this->input->post('username', true)),
				'password' => html_escape(sha1($this->input->post('password', true)))
			);
			$this->Users_m->tambahDataUser($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> User Berhasil Ditambahkan.</div>');
			redirect('users');
		}
	}

	public function getuserid()
	{
		$user = $this->Users_m->get_where($this->input->post('id', true));
		$data = array();

		if ($user) {
			$data = $user;
		}

		echo json_encode($data);
	}

	public function ubahUser()
	{
		$this->Users_m->ubahDataUser($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> User Berhasil Diubah.</div>');
		redirect('users');
	}

	public function hapus($id)
	{
		$this->db->delete('users', ['id_user' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> User Berhasil Dihapus.</div>');
		redirect('users');
	}
}
