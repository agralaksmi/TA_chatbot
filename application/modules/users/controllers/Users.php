<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . "modules/base/controllers/Base.php";

class Users extends Base {

	function __construct()
	{
		$this->load->model('M_user','user');
	}

	public function index()
	{
		$data['data']=$this->user->listUser();
		parent::viewadmin('user/index', $data);
	}

	public function getUser($id)
	{
		$data=$this->user->showUser($id);
		echo json_encode($data[0]);
	}

	public function process_edit()
	{
		$id=$this->input->post('edt_id');
		$username=$this->input->post('edt_username');
		$password=md5($this->input->post('edt_password'));

		$data=$this->user->editUser($id,$username,$password);

		if ($data==0) {
			$this->session->set_flashdata('failed','Username taken !!');
			redirect('users');
		}
		else {
			$this->session->set_flashdata('success','Success edit users');
			redirect('users');
		}
	}

	public function createUser()
	{
		$username=$this->input->post('add_username');
		$password=md5($this->input->post('add_password'));

		$cek_exist=$this->db->where('username', $username)->get('users')->num_rows();
		print_r($cek_exist);
		if ($cek_exist==0) {
			$this->user->createUser($username,$password);
			$this->session->set_flashdata('success','Success insert users');
			redirect('users');
		}
		else {
			$this->session->set_flashdata('failed','Username taken');
			redirect('users');
		}
	}
	public function deleteUser($id)
	{
		$data = array(
			'id' => $id
		);
		$this->db->where('id',$id);
		$data=$this->db->delete('users',$data);
		$this->session->set_flashdata('success','Success delete users');
		redirect('users');
	}
}
