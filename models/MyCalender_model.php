<?php

class MyCalender_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get event by id
     */
    function get_event($id)
    {
        return $this->db->get_where('events',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all events
     */
    function get_all_events()
    {
       return $this->db->get('events')->result_array();
    }
        
    /*
     * function to add new event
     */
    function add_event($params)
    {
		$this->db->insert('events',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update event
     */
    function update_event($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('events',$params);
    }
    
    /*
     * function to delete event
     */
    function delete_eve($params)
    {	//echo $id;
        return $this->db->delete('events',$params);
    }
}
