<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

	/**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('property_model');
    }

	public function index()
	{
     	if($this->session->userdata('logged_in'))
     	{
     		$data['role'] = $this->session->userdata['logged_in']['role'];
     		$data['content'] = $this->load->view('home/index','', TRUE);
			$this->load->view('layout/default', $data);
     	}
     	else
     	{
     		$data['properties'] = $this->property_model->get_all_properties();
			$data['content'] = $this->load->view('home/index',$data, TRUE);
			$this->load->view('layout/default', $data);
		}
	}

	
}
