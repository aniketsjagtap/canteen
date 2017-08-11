<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Permission_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get permission by permission_id
     */
    function get_permission($permission_id)
    {
        return $this->db->get_where('permission',array('permission_id'=>$permission_id))->row_array();
    }
        
    /*
     * Get all permission
     */
    function get_all_permission()
    {
        $this->db->order_by('permission_id', 'desc');
        return $this->db->get('permission')->result_array();
    }
        
    /*
     * function to add new permission
     */
    function add_permission($params)
    {
        $this->db->insert('permission',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update permission
     */
    function update_permission($permission_id,$params)
    {
        $this->db->where('permission_id',$permission_id);
        return $this->db->update('permission',$params);
    }
    
    /*
     * function to delete permission
     */
    function delete_permission($permission_id)
    {
        return $this->db->delete('permission',array('permission_id'=>$permission_id));
    }
}
