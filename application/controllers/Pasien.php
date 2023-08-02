<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pasien_m');
		$this->load->library('form_validation');
		is_logged_in();
	}

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required|trim');
		$this->form_validation->set_rules('jk', 'Kelamin Pasien', 'required|trim');
		$this->form_validation->set_rules('umur', 'Umur Pasien', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				"title" => "Manajement Data Pasien",
				"content" => $this->load->view("pasien/index", array(
					"pasien" => $this->Pasien_m->get('pasien')->result_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$data = [
				'nama_pasien' => html_escape($this->input->post('nama', true)),
				'jk_pasien' => html_escape($this->input->post('jk', true)),
				'umur_pasien' => html_escape($this->input->post('umur', true))
			];
			$this->Pasien_m->tambahDataPasien($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Ditambahkan.</div>');
			redirect('pasien');
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required|trim');
		$this->form_validation->set_rules('jk', 'Kelamin Pasien', 'required|trim');
		$this->form_validation->set_rules('umur', 'Umur Pasien', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$where = ['id_pasien' => $id];
			$data = array(
				"title" => "Ubah Data Pasien",
				"content" => $this->load->view("pasien/ubah", array(
					"pasien" => $this->Pasien_m->get_where('pasien', $where)->row_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$id = $this->input->post('id_pasien');
			$data = [
				'nama_pasien' => html_escape($this->input->post('nama', true)),
				'jk_pasien' => html_escape($this->input->post('jk', true)),
				'umur_pasien' => html_escape($this->input->post('umur', true))
			];
			$this->Pasien_m->ubahDataPasien($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Diubah.</div>');
			redirect('pasien');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('obat', ['id_obat' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Obat Berhasil Dihapus.</div>');
		redirect('obat');
	}

	public function laporan()
	{
		$data = array(
			"pasien" => $this->Pasien_m->get('pasien')->result_array()
		);

		$this->load->view("laporan/laporan_pasien", $data);
	}
}
