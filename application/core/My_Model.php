<?php

class My_Model extends CI_Model
{
	protected $table_name = '';
    protected $column_name = '';
    
    /**
     * Get All Admin Contact Details
     * @return [type] [description]
     */
    public function get_contact_details()
    {
        $this->db->select('*');
        $result = $this->db->get('contact');
        return $result->row();
    }
    
	/**
	 * Get the where condition
	 * @param  int $id pass the table id 
	 * @return array     
	 */
	public function get_by($id)
	{
		$this->db->where('id',$id);
		$result = $this->db->get($this->table_name);
		return $result->row();
	}

    /**
     * Get all searching data
     * @param  string $search value of search text box
     * @return number       
     */
    public function get_all_search($search)
    {
        if(!empty($search))
        {
            $this->db->like($this->column_name,$search);
        }

        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('is_delete', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Get all information with limited pagination rows
     * @param  int $limit  
     * @param  int $offset
     * @param  search $search
     * @return array
     */
    public function get_all_with_pagination($limit, $offset, $search)
    {
        if(!empty($search))
        {
            $this->db->like($this->column_name, $search);
        }

        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('is_delete', 0);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Multiple Delete
     * @param  array  $id where to delete
     * @return boolean
     */
    public function multiple_delete($data = array())
    {
        $query = $this->db->update_batch($this->table_name, $data, 'id');
        return TRUE;
    }

    /**
     * Count the all record
     * @return int
     */
    public function record_count() {
        return $this->db->count_all($this->table_name);
    }

    /**
     * Insert into data base
     * @param  array $data insert value
     * @return void       
     */
    public function insert_data($data)
    {
        $this->db->insert($this->table_name, $data);
        return TRUE;
    }

    /**
     * Insert into data base
     * @param  array $data insert value
     * @return int   last insert id    
     */
    public function insert_last_id($data)
    {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }
    /**
     * Get by id
     * @param  int $id where to get
     * @return array     
     */
    public function get_by_id($id)
    {
        $this->db->where('id',$id);
        $result = $this->db->get($this->table_name);
        return $result->result_array();
    }

    /**
     * Update data
     * @param  int $id   where to update
     * @param  array $data data for update
     * @return boolean
     */
    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
        return TRUE;
    }

     /**
     * For delete Data with is_delete field
     * @param  int $id   where to delete
     * @param  array $data for delete
     * @return boolean       
     */
    public function delete($id)
    {
      $this->db->where('id', $id);
      $data = array('is_delete'=>1);
      $this->db->update($this->table_name, $data);
      return true;

    }

    /**
     * Gell All data
     * @return array 
     */
    public function get_all()
    {
        $this->db->where('is_delete', 0);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }
}