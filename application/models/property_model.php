<?php  

/**
 * for login user
 */
class Property_model extends My_Model
{
    public $table_name='properties';
    /**
	 * The constructor loads automatically
	 */
    public function __construct()
    {
    	parent::__construct();

    }

    /**
     * Get All country details
     * @return array 
     */
    public function get_all_country()
    {
        $this->table_name = 'country';
        return parent::get_all(); 
    }

    /**
     * Get All country wise state details
     * @param  int $id country_id
     * @return array     
     */
    public function get_all_state($id)
    {
        $this->db->select('*,state.id AS state_id');
        $this->db->from('state');
        $this->db->join('country', 'country.id = state.country_id');
        $this->db->where('state.country_id ', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get All state wise city details
     * @param  int $id state_id
     * @return array     
     */
    public function get_all_cities($id)
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->join('state', 'state.id = city.state_id');
        $this->db->where('city.state_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    
    /**
     * Insert All property details
     * @param  array $data inserting data
     * @return int       last_insert_id
     */
    public function insert_id($data)
    {
        return parent::insert_last_id($data);
    }

    /**
     * Insert mutiple images in the properties_images tables
     * @param  array $data insert images
     * @return boolean       
     */
    public function insert_images($data)
    {
        $this->db->insert_batch('properties_images', $data);
        return true;
    }

     /**
     * Insert multiple amenities in the properties_amenities tables
     * @param  array $data insert amenities
     * @return boolean       
     */
    public function insert_amenities($amenities)
    {
        $this->db->insert_batch('properties_amenities', $amenities);
        return true;
    }

    public function insert_property_agency($agency_data)
    {
        $this->table_name = 'property_agency';
        return parent::insert_data($agency_data);
    }

    public function get_all_properties()
    {
        return parent::get_all();
    }
}
?>
