<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends MX_Controller {

	function __construct()
	{

	}
	public function view($view,$data=array())
	{
		$this->load->view('base/login/header_login');
		$this->load->view($view,$data);
		$this->load->view('base/login/footer_login');
	}

	public function viewadmin($view,$data=array())
	{
		if ($this->session->userdata('username')!="") {
			$this->load->view('base/admin/header_admin');
			$this->load->view($view,$data);
			$this->load->view('base/admin/footer_admin');
		}
		else {
			redirect('login');
		}

	}
}
