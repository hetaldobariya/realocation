<?php  

/**
 * for login user
 */
class Agent_model extends My_Model
{
    public $table_name='agent_register';

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

}
?>
