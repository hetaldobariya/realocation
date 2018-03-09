<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends My_Controller {

	/**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('agency_model');
    }

	public function index()
	{
		if($this->input->post())
		{
			$this->image_name = 'profile_photo';
			$data = array(
						'title' => $this->input->post('title'),
						'description ' => $this->input->post('description'),
						'address' => $this->input->post('address'),
						'email' => $this->input->post('email'),
						'website' => $this->input->post('website'),
						'mobile_no' => $this->input->post('mobile_no'),
						'profile_photo'=> $this->upload_image($this->image_name)
					);

			$login_data = array(
						'email' => $this->input->post('email'),
						'password ' => $this->input->post('password'),
						'role' => 'agency'
					);
			
			$add = $this->agency_model->insert($data,$login_data);
			
			if($add == TRUE)
			{
				$this->session->set_flashdata('message','<div id="snackbar">Created Succssfully..</div>');
          		redirect('home');
			}
			else
			{
				$this->session->set_flashdata('message','<div id="snackbar">Can not created this time</div>');
          		redirect('home');
			}
		}
		else 
		{
			$data['content'] = $this->load->view('agency/index','', TRUE);
			$this->load->view('layout/default', $data);	
		}
	}
}
