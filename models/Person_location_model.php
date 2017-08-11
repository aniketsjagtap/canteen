<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Person_location_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get person_location by id
     */
    function get_person_location($id)
    {
        return $this->db->get_where('person',array('person_id'=>$id))->row_array();
    }
        
    /*
     * Get all person_location
     */
    function get_all_person_location()
    {
        $this->db->order_by('person_id', 'desc');
        return $this->db->get('person')->result_array();
    }
        
    /*
     * function to add new person_location
     */
   /* function add_person_location($params)
    {
        $this->db->insert('person',$params);
        return $this->db->insert_id();
    }*/
    
    /*
     * function to update person_location
     */
    function update_person_location($id,$params)
    {
		
        $this->db->where('person_id',$id);
        return $this->db->update('person',$params);
    }
    
    /*
     * function to delete person_location
     */
   /* function delete_person_location($id)
    {
        return $this->db->delete('person',array('person_id'=>$id));
    }*/
}
