<?php  

/**
 * for login user
 */
class Register_model extends My_Model
{
    public $table_name='register';
    /**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();

    }

    public function insert($data,$login_data)
    {
        parent::insert_data($data);
        $this->table_name = "login";
        parent::insert_data($login_data);
        return TRUE;
    }

}
?>
