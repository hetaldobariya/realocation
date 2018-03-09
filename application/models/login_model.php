<?php  

/**
 * for login user
 */
class Login_model extends My_Model
{
    /**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();
    }

   /**
    * query for login 
    * @param  array $data $admin_name,$password
    * @return boolean       
    */
    public function login_query($data)
    {
    	$this->db->select('*');
    	$this->db->from('login');
    	$this->db->where('email', $data['email']);
    	$this->db->where('password', $data['password']);
    	$this->db->limit(1);
    	$query = $this->db->get();

    	if( $query->num_rows() == 1 )
    	{
    		return $query->result_array();
        }
    }

    /**
     * Read the username for stored in session
     * @param  string $user_name user name
     * @return object,boolean
     */
    public function read_username($email)
    {
    	$this->db->select('*');
    	$this->db->from('login');
    	$this->db->where('email', $email);
    	$this->db->limit(1);
    	$query = $this->db->get();

    	if( $query->num_rows() == 1 )
    	{
    		return $query->result();
    	}
    	else
    	{
    		return FALSE;
    	}
    }

}
?>
