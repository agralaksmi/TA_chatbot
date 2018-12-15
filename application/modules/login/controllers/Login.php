<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . "modules/base/controllers/Base.php";

class Login extends Base {

	function __construct()
	{
		$this->load->model('m_login','login');
	}
	public function index()
	{
		parent::view('login');
	}
	public function check()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		//echo $password;die();
		$check=$this->login->checkLogin($username,$password);
		if ($check) {
			$session = array(
				'username' => $check[0]->username,
				'id' => $check[0]->id,
			);
			$this->session->set_userdata($session);

			redirect('admin');
		}
		else {
			$this->session->set_flashdata('failed', "Username / Password salah");
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->userdata = array();
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}
