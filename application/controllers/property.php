<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends My_Controller {

	/**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('property_model');
    	$this->load->model('amenities_model');
    	$this->load->model('agency_model');

    }

	public function index()
	{
		$email = $this->session->userdata['logged_in']['email'];
		$agency = $this->agency_model->get_agency_id($email);
		if($agency == TRUE)
		{
			$agency_id = $agency[0]['id'];
		}
		else
		{
			echo "<script>alert('".$agency."')</script>";
			$this->session->sess_destroy();
        	redirect('home');
		}

		if($this->input->post())
		{
			$data = array(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'price' => $this->input->post('price'),
						'baths' => $this->input->post('baths'),
						'beds' => $this->input->post('beds'),
						'area' => $this->input->post('area'),
						'garages' => $this->input->post('garages'),
						'status' => $this->input->post('status'),
						'city' => $this->input->post('city'),
						'state' => $this->input->post('state'),
						'country' => $this->input->post('country'),
						'type' => $this->input->post('type'),
						'facebook_url' => $this->input->post('facebook_url'),
						'twitter_url' => $this->input->post('twitter_url'),
						'linkin_url' => $this->input->post('linkin_url'),
						'google_plus_url' => $this->input->post('googleplus_url'),
						'vimeo_url' => $this->input->post('vimeo_url'),
						'youtube_url' => $this->input->post('youtube_url')
					);
			$id = $this->property_model->insert_id($data);
			if($id == TRUE )
			{
				// echo $id;
		 		$data = array();
        	 
            	$filesCount = count($_FILES['photos']['name']);

            	for($i = 0; $i < $filesCount; $i++)
            	{
                	$_FILES['userFile']['name'] = $_FILES['photos']['name'][$i];
                	$_FILES['userFile']['type'] = $_FILES['photos']['type'][$i];
                	$_FILES['userFile']['tmp_name'] = $_FILES['photos']['tmp_name'][$i];
                	$_FILES['userFile']['error'] = $_FILES['photos']['error'][$i];
                	$_FILES['userFile']['size'] = $_FILES['photos']['size'][$i];

                	$upload_path = './uploads/';
                	$config['upload_path'] = $upload_path;
                	$config['allowed_types'] = 'gif|jpg|png';
                
                	$this->load->library('upload', $config);
                	$this->upload->initialize($config);

                	if($this->upload->do_upload('userFile'))
                	{
                    	$fileData = $this->upload->data();
                    	array_push($data, array( 'property_id' =>$id,
                    							'image_path' => 'upload/'.$fileData['file_name'])
                    					);
               		}
					
               	}
           		$images = $this->property_model->insert_images($data);
           		$amenities = array();
        		$count = count($this->input->post('amenities'));        		
				for ($i = 0; $i < $count ; $i++) 
    			{
        	 		$amenities_data = $this->input->post('amenities');
    				array_push($amenities ,array(
    							'property_id'=> $id,
    							'amenities_id' => $amenities_data[$i]));	
    			}
				
				$insert_amenities = $this->property_model->insert_amenities($amenities);
				$agency_data = array('property_id' => $id,
									 'agency_id' => $agency_id
									);
				// echo "<pre>";
				// print_r($agency_data);die;
				$property_agency = $this->property_model->insert_property_agency($agency_data);
           		redirect('home');	
			}
			
		}
		else 
		{
			$data['amenities'] = $this->amenities_model->gell_all_amenities();
			$data['countries'] = $this->property_model->get_all_country();
			// $data['states'] = $this->property_model->get_all_state();
			//$data['cities'] = $this->property_model->get_all_city();
			// echo "<pre>";
			// print_r($data);
			$data['content'] = $this->load->view('property/index',$data, TRUE);
			$this->load->view('layout/default', $data);	
		}
	}

	public function state()
	{
		$country_id = $this->input->post('id');
		$states = $this->property_model->get_all_state($country_id);
		// echo "<pre>";
		// print_r($states);die;
		foreach ($states as $state) 
        {
?>        	
            <option value="<?php echo $state['state_id'];?>">
            	<?php echo $state['state_name']; ?></option>    
<?php 
        }   
	}

	public function city()
	{
		$state_id = $this->input->post('id');
		$cities = $this->property_model->get_all_cities($state_id);
		foreach ($cities as $city) 
        {
?>        	
            <option value="<?php echo $city['id'];?>">
            	<?php echo $city['city_name']; ?></option>    
<?php 
        }   
	}
}
?>