<?php

class My_Controller extends CI_Controller {

	protected $image_name = '';
    protected $start = '';
    protected $limit = '';
    protected $search_name = '';
	protected $multiple_delete_button_name = '';
	protected $multiple_delete_checkbox_value = ''; 
	
	public function __construct()
	{
		parent::__construct();
		//$this->view->model('My_Model','mm');
		
	}

	public function upload_image()
	{
       	$config['upload_path']   = './uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        // $config['max_size']      = 100; 
        // $config['max_width']     = 1024; 
        // $config['max_height']    = 768;  
		$this->load->library('upload', $config);

		$path = '';
		if($_FILES[$this->image_name]['name'] != NULL)
        	{
        		if (!$this->upload->do_upload($this->image_name))
        		{
            		$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('imgmsg','<div id="snackbar">Some text some message..</div>');
					echo "Failed".$this->upload->display_errors();
        		}
        		else
        		{
            		$data = array('upload_data' => $this->upload->data());
					$path = 'uploads/'.$data['upload_data']['file_name'];
					
				}
       		}
        	else
        	{
        		$path = $_POST[$this->image_name];
        	}

        return $path;
	}

	/**
	 * Used don't allow accessing the other page without login
	 * @return boolean 
	 */
	public function check_admin_vaild()
	{
		if($this->session->userdata('logged_in'))
		{
			return TRUE;
		}
		else
		{
    		redirect('admin/login');
		}
	}

	/**
	 * Declare the variable used in paginaiton
	 * @return array 
	 */
	public function paginate()
	{
		$config['uri_segment']= 5;
        $config['num_links'] = 3;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>>';
        $config['first_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        return $config;
	}

	/**
	 * To get search textbox name
	 * @return array 
	 */
	public function get_search_title()
	{
		if($this->input->post($this->search_name) !="")
        {
            $search = trim($this->input->post($this->search_name));
        }
        else
        {
            $search = str_replace("%20",' ',($this->uri->segment(4))?$this->uri->segment(4):0);
            
        }  	
        return $search;
	}

	public function multiple_delete()
	{
		$count = count($this->input->post('multi_delete'));
		$data = array();
		for($i = 0; $i < $count; $i++)
		{
			$id = $this->input->post('multi_delete');
			array_push($data,array('id'=>$id[$i],
									'is_delete' => 1));
			// $multi_delete = $id[$i];
			
		}
		return $data;
	}
}
