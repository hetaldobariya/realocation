<?php  

/**
 * for login user
 */
class Agency_model extends My_Model
{
    public $table_name='create_agency';

    /**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();

    }

    /**
     * Insert Into create_agency table
     * @param  array $data   insert into crated agency table
     * @param  array $login_data insert into login table
     * @return boolean             
     */
    public function insert($data,$login_data)
    {
        parent::insert_data($data);
        $this->table_name = "login";
        parent::insert_data($login_data);
        return TRUE;
    }

    public function get_agency_id($email)
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->join('create_agency', 'create_agency.email = login.email');
        $this->db->where('login.email', $email);
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            return $query->result_array();
        }
        else 
        {
            return "You are not authorized person";       
        }    
    }
}
?>
