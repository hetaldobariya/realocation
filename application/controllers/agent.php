<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class agent extends My_Controller {

	/**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('agent_model');
    }

	public function index()
	{
		if($this->input->post())
		{
			$this->image_name = 'photos';
			$data = array(
						'email' => $this->input->post('email'),
						'first_name ' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'skype_name' => $this->input->post('skype_name'),
						'profile_photo'=> $this->upload_image($this->image_name),
						'post' => $this->input->post('post'),
						'status' => $this->input->post('status'),
					);

			$login_data = array(
						'email' => $this->input->post('email'),
						'password ' => $this->input->post('password'),
						'role' => 'agent'
					);
			
			$add = $this->agent_model->insert($data,$login_data);
			
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
			$data['content'] = $this->load->view('agent/index','', TRUE);
			$this->load->view('layout/default', $data);	
		}
	}
}
