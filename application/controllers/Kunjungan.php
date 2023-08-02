<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kunjungan_m');
		$this->load->model('Dokter_m');
		$this->load->model('Pasien_m');
		$this->load->model('Obat_m');
		$this->load->library('form_validation');
		is_logged_in();
	}

	public function index()
	{
		$this->form_validation->set_rules('pasien', 'Nama Pasien', 'required|trim');
		$this->form_validation->set_rules('dokter', 'Nama Dokter', 'required|trim');
		$this->form_validation->set_rules('tgl', 'Tanggal Berobat', 'required|trim');
		// $this->form_validation->set_rules('keluhan', 'Keluhan', 'required|trim');
		// $this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required|trim');
		// $this->form_validation->set_rules('penata', 'Penatalaksanaan', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				"title" => "Kunjungan Data Pasien",
				"content" => $this->load->view("kunjungan/index", array(
					"kunjungan" => $this->Kunjungan_m->get_join('berobat')->result_array(),
					"dokter" => $this->Dokter_m->get('dokter')->result_array(),
					"pasien" => $this->Pasien_m->get('pasien')->result_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$data = [
				'id_pasien' => html_escape($this->input->post('pasien', true)),
				'id_dokter' => html_escape($this->input->post('dokter', true)),
				'tgl_berobat' => html_escape($this->input->post('tgl', true))
			];
			$this->Kunjungan_m->tambahDataKunjungan($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Ditambahkan.</div>');
			redirect('kunjungan');
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('pasien', 'Nama Pasien', 'required|trim');
		$this->form_validation->set_rules('dokter', 'Nama Dokter', 'required|trim');
		$this->form_validation->set_rules('tgl', 'Tanggal Berobat', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$where = ['id_berobat' => $id];
			$data = array(
				"title" => "Ubah Data Kunjungan Berobat",
				"content" => $this->load->view("kunjungan/ubah", array(
					"kunjungan" => $this->Kunjungan_m->get_where('berobat', $where)->row_array(),
					"dokter" => $this->Dokter_m->get('dokter')->result_array(),
					"pasien" => $this->Pasien_m->get('pasien')->result_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			$id = $this->input->post('id_berobat');
			$data = [
				'id_pasien' => html_escape($this->input->post('pasien', true)),
				'id_dokter' => html_escape($this->input->post('dokter', true)),
				'tgl_berobat' => html_escape($this->input->post('tgl', true))
			];
			$this->Kunjungan_m->ubahDataKunjungan($data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Pasien Berhasil Diubah.</div>');
			redirect('kunjungan');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('berobat', ['id_berobat' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Kunjungan Berhasil Dihapus.</div>');
		redirect('kunjungan');
	}

	// REKAM MEDIS
	public function rekam($id)
	{
		// $id = id_berobat
		// $where = ['id_pasien'];
		// $data['pasien'] = $this->Pasien_m->get_where('pasien', $where)->row_array();

		$where = ['id_berobat' => $id];
		$idPasien = $this->Obat_m->get_where('berobat', $where)->row_array()['id_pasien'];
		// $idBerobat = $data['idBerobat']['id_berobat'];

		$data = array(
			"title" => "Rekam Medis",
			"content" => $this->load->view("kunjungan/rekam_medis", array(
				"d" => $this->Kunjungan_m->get_rekam($id)->row_array(),
				"riwayat" => $this->Kunjungan_m->get_riwayat($idPasien)->result_array(),
				"obat" => $this->Obat_m->get('obat')->result_array(),
				"resep" => $this->Kunjungan_m->get_resep($id)->result_array()
			), TRUE)
		);

		$this->parser->parse("template", $data);
	}

	public function tambahRekam()
	{
		$idBerobat = $this->input->post('id_berobat', true);
		$keluhan = $this->input->post('keluhan', true);
		$diagnosa = $this->input->post('diagnosa', true);
		$penata = $this->input->post('penata', true);

		$data = [
			'keluhan' => $keluhan,
			'diagnosa' => $diagnosa,
			'penatalaksaan' => $penata
		];
		$where = ['id_berobat' => $idBerobat];
		$this->Kunjungan_m->update_where('berobat', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Rekam Medis Berhasil Diperbarui.</div>');
		redirect('kunjungan/rekam/' . $idBerobat);
	}

	public function tambahResep()
	{
		$idBerobat = $this->input->post('id_berobat', true);
		$obat = $this->input->post('obat', true);

		$data = [
			'id_berobat' => $idBerobat,
			'id_obat' => $obat
		];

		$this->Kunjungan_m->insert('resep_obat', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Resep Obat Berhasil Diperbarui.</div>');
		redirect('kunjungan/rekam/' . $idBerobat);
	}

	public function hapusResep($idResep, $idBerobat)
	{
		$this->db->delete('resep_obat', ['id_resep' => $idResep]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Resep Obat Berhasil Dihapus.</div>');
		redirect('kunjungan/rekam/' . $idBerobat);
	}

	public function chart_json()
	{
		// $results = $this->Kunjungan_m->get_join('berobat')->result();
		$results = $this->Kunjungan_m->get_jumlah_kunjungan_per_tanggal()->result();

		$data = array();
		foreach ($results as $key => $value) {
			$row = array();

			$row['id'] = $value->tgl_berobat;
			$row['name'] = $value->tgl_berobat;
			$row['value'] = $value->jumlah_kunjungan;
			$row['info'] = $value->jumlah_kunjungan;

			$data[] = $row;
		}

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function laporan()
	{
		$data = array(
			"title" => "Laporan Kunjungan",
			"kunjungan" => $this->Kunjungan_m->get_join('berobat')->result_array()
		);

		$this->load->view("laporan/laporan_kunjungan", $data);
	}
}
