<?php  

/**
 * for Admin Amenities
 */
class Amenities_model extends My_Model
{
    public $table_name='amenities';

    /**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();

    }

    /**
     * Get All the actors information with searching
     * @param  string $search value of search box
     * @return number         
     */
    public function get_all_search_amenities($search)
    {
        $this->column_name = 'title';
        return parent::get_all_search($search);
    }

    /**
     * Get all the actors informaion with pagination
     * @param  int $limit number of rows that you display
     * @param  int $offset number of offset 
     * @param  string $search value of search box
     * @return array       
     */
    public function get_all_amenities($limit, $offset, $search)
    {
       $this->column_name = 'title';
       $this->limit = 10;
       $this->offset = 0;
       return parent::get_all_with_pagination($limit, $offset, $search);
    }

    /**
     * Count all the record
     * @return void 
     */
    public function record_count() {
        return parent::record_count();
    }

    /**
     * Multiple Delete 
     * @param  array  $id where to delete
     * @return void
     */
    public function multiple_delete($data = array())
    {
      return parent::multiple_delete($data);
    }

    /**
     * Insert Into create_agency table
     * @param  array $data   insert into crated agency table
     * @param  array $login_data insert into login table
     * @return boolean             
     */
    public function add($data)
    {
        parent::insert_data($data);
        return TRUE;
    }

    /**
     * Update data
     * @param  int $id   where to update
     * @param  array $data data for update
     * @return boolean
     */
    public function edit($id, $data)
    {
      return parent::update_data($id, $data);   
    }

     /**
     * For delete Data with is_delete field
     * @param  int $id   where to delete
     * @param  array $data for dalete
     * @return boolean       
     */
    public function delete($id)
    {
      return parent::delete($id);  
    }

    public function gell_all_amenities()
    {
        return parent::get_all();
    }
}
?>
