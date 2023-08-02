<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_m');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			$data = array(
				"title" => "Dashboard",
				"content" => $this->load->view("dashboard", array(
					"user" => $this->Auth_m->get_where('users', ['username' => $this->session->userdata('username')])->row_array()
				), TRUE)
			);

			$this->parser->parse("template", $data);
		} else {
			redirect('auth');
		}
	}
}
