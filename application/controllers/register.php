<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends My_Controller {

	/**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('register_model');
    }
	public function index()
	{
		if($this->input->post())
		{
			$data = array(
						'email' => $this->input->post('email'),
						'first_name ' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
					);
			$login_data = array(
						'email' => $this->input->post('email'),
						'password ' => $this->input->post('password'),
						'role' => 'user',
					);
			$add = $this->register_model->insert($data,$login_data);
			
			if($add == TRUE)
			{
				$this->session->set_flashdata('message','<div id="snackbar">Deleted Succssfully..</div>');
          		redirect('home');
			}
			else
			{
				$this->session->set_flashdata('message','<div id="snackbar">Deleted not Succssfully..</div>');
          		redirect('home');
			}
		}
		else 
		{
			$data['content'] = $this->load->view('register/index','', TRUE);
			$this->load->view('layout/default', $data);	
		}
	}
}
