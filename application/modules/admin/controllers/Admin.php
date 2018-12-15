<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . "modules/base/controllers/Base.php";

class Admin extends Base {

	function __construct()
	{
		$this->load->model('M_user','user');
	}
	public function index()
	{
		parent::viewadmin('admin/base');
	}
}
