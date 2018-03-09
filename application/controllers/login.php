
<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller 
{
  	/**
  	 * Define the Model
  	 */
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model('login_model');
  	}

  	/**
  	 * Load the index page data
  	 * @return  void
  	 */
  	public function index()
  	{
        if($this->input->post())
        {  	
        		$data = array(
       					'email' => $this->input->post('email'),
       					'password' => $this->input->post('password')
       				     );
            $result = $this->login_model->login_query($data);
         		if($result == TRUE)
         		{	     			 
     				    $session_data = array('email' => $result[0]['email'],
                                      'role' => $result[0]['role']
                                      );
     				    $this->session->set_userdata('logged_in', $session_data);
                if($this->session->userdata['logged_in']['role'] == 'admin')
                {
                   echo "<script>alert('You have to not permission to access this account')</script>";
                   $data['content'] = $this->load->view('login/index','', TRUE);
                   $this->load->view('layout/default', $data);
                }
                else 
                {
                  redirect('home');    
                }
         		}
         		else
         		{
              	$email = $this->input->post('email');
              	$result = $this->login_model->read_username($email);

              	if($result == FALSE)
              	{ 
                    $error_message = 'User does not Exist';
                    $this->session->set_userdata('message', $error_message);
                  	$data['content'] = $this->load->view('login/index','', TRUE);
                    $this->load->view('layout/default', $data);
              	} 
              	else
              	{
                  	$error_message = 'Password Invalid';
                    $this->session->set_userdata('message', $error_message);
                    $data['content'] = $this->load->view('login/index','', TRUE);
                    $this->load->view('layout/default', $data);
              	} 
       	  	}
        }
        else
        {
            $data['content'] = $this->load->view('login/index','', TRUE);
            $this->load->view('layout/default', $data);
        }
    }

     	/**
     	  * Logout
     	  * @return void 
     	*/
    	public function logout()
     	{
     		$this->session->sess_destroy();
        redirect('login/index');
     	}

   
}
?>
