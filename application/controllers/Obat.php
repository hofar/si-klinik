<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_m');
		$this->load->library('form_validation');
		is_logged_in();
	}

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama Obat', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				"title" => "Manajement Data Obat",
				"content" => $this->load->view("obat/index", array(
					"obat" => $this->Obat_m->get('obat')->result_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$data = [
				'nama_obat' => html_escape($this->input->post('nama', true))
			];
			$this->Obat_m->tambahDataObat($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Obat Berhasil Ditambahkan.</div>');
			redirect('obat');
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$where = ['id_obat' => $id];
			$data = array(
				"title" => "Ubah Data Obat",
				"content" => $this->load->view("obat/ubah", array(
					"obat" => $this->Obat_m->get_where('obat', $where)->row_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$id = $this->input->post('id_obat');
			$data = [
				'nama_obat' => $this->input->post('nama', true)
			];
			$this->Obat_m->ubahDataObat($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Obat Berhasil Diubah.</div>');
			redirect('obat');
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
			"obat" => $this->Obat_m->get('obat')->result_array()
		);

		$this->load->view("laporan/laporan_obat", $data);
	}
}
