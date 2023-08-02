<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_m');
		$this->load->library('form_validation');
		is_logged_in();
	}

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				"title" => "Dokter",
				"content" => $this->load->view("dokter/index", array(
					"dokter" => $this->Dokter_m->get('dokter')->result_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$data = [
				'nama_dokter' => html_escape($this->input->post('nama', true))
			];
			$this->Dokter_m->tambahDataDokter($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Dokter Berhasil Ditambahkan.</div>');
			redirect('dokter');
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Dokter', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$where = ['id_dokter' => $id];
			$data = array(
				"title" => "Ubah Data Dokter",
				"content" => $this->load->view("dokter/ubah", array(
					"dokter" => $this->Dokter_m->get_where('dokter', $where)->row_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$id = $this->input->post('id_dokter');
			$data = [
				'nama_dokter' => $this->input->post('nama', true)
			];
			$this->Dokter_m->ubahDataDokter($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Dokter Berhasil Diubah.</div>');
			redirect('dokter');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('dokter', ['id_dokter' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Dokter Berhasil Dihapus.</div>');
		redirect('dokter');
	}

	public function laporan()
	{
		$data = array(
			"dokter" => $this->Dokter_m->get('dokter')->result_array()
		);

		$this->load->view("laporan/laporan_dokter", $data);
	}
}
