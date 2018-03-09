<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_controller {

	/**
	 * Automatic load login_model 
	 */
	public function __construct()
	{
		parent::__construct();
		$this-> check_admin_vaild();
	}

	/**
	 * Load the login page
	 * @return void 
	 */
	public function index()
	{
		$data['content'] = $this->load->view('admin/Dashboard/index','', TRUE);
		$this->load->view('layout/admin_layout', $data);
	}
	
}
