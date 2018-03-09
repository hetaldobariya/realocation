<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amenities extends My_Controller {

	/**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();
    	$this->check_admin_vaild();
    	$this->load->model('amenities_model');
    }

	public function index()
	{
		$this->search_name = 'search_box';     
		$search = $this->get_search_title($this->search_name);
		$config = $this->paginate();
		
			$baseurl = base_url()."admin/amenities/index/".$search;
	        $config['base_url'] = $baseurl;
	        $config['total_rows'] = $this->amenities_model->get_all_search_amenities($search);
	        $config['per_page'] = 1;
	        
	        $data['limit'] = $config['per_page'];
	        $data['number_page'] = $config['per_page']; 
	       	$this->load->library('pagination', $config);  
	        $this->pagination->initialize($config); 

	        if($this->uri->segment(5))
	        {
				$offset = ($this->uri->segment(5)) ;
			}
			else
			{
				$offset = 0;
			}  
			
			$data['searching_name'] = $search; 
	        $data['links'] = $this->pagination->create_links();
	        $data['amenities'] = $this->amenities_model->get_all_amenities($data['limit'],$offset,$search);
       	$data['content'] = $this->load->view('admin/amenities/index',$data, TRUE);
       	$this->load->view('layout/admin_layout', $data);

		if($this->input->post('multiple_delete'))
		{
			$data = $this->multiple_delete();
			// echo "<pre>";
			// print_r($id);die;
			$multi_delete = $this->amenities_model->multiple_delete($data);
			if($multi_delete == TRUE)
			{
				$this->session->set_flashdata('message','<div id="snackbar">Deleted Succssfully..</div>');
          		$referred_from = $this->session->userdata('referred_from');
				redirect($referred_from, 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div id="snackbar">Deleted not Succssfully..</div>');
          		$referred_from = $this->session->userdata('referred_from');
				redirect($referred_from, 'refresh');
			}
		}
	}

	public function add()
	{
		if($this->input->post())
		{
			$data = array('title' => $this->input->post('title'));
			$add = $this->amenities_model->add($data);
			if($add == TRUE)
			{
				$this->session->set_flashdata('message','<div id="snackbar">Added Succssfully</div>');
          		$referred_from = $this->session->userdata('referred_from');
				redirect($referred_from, 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','<div id="snackbar">Can not add this time</div>');
          		$referred_from = $this->session->userdata('referred_from');
				redirect($referred_from, 'refresh');
			}
		}
		else
		{
			$data['content'] = $this->load->view('admin/amenities/add','', TRUE);
	       	$this->load->view('layout/admin_layout', $data);
	    }
	}

	/**
	 * Update the data
	 * @return boolean
	 */
	public function edit()
	{
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$data = array('title'=>$title);
		$edit = $this->amenities_model->edit($id,$data);
		return true;
	}

	/**
	 * Delete the data with is_delete Field
	 * @param  int $id 
	 * @return void     
	 */
	public function delete($id)
	{
		$edit = $this->amenities_model->delete($id);
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
	}

	/**
	 * For cancle page
	 * @return void
	 */
	public function cancle()
	{
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
	}

}
