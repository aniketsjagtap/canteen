<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get product by id
     */
    function get_product($id)
    {
        return $this->db->get_where('product',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all product
     */
    function get_all_product()
    {
        $this->db->order_by('name', 'asc');
        return $this->db->get('product')->result_array();
    }
        
    /*
     * function to add new product
     */
    function add_product($params)
    {
        $this->db->insert('product',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update product
     */
    function update_product($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('product',$params);
    }
    
    /*
     * function to delete product
     */
    function delete_product($id)
    {
        return $this->db->delete('product',array('id'=>$id));
    }
	
	    /*
     * Get rawMaterial by product id
     */
    function get_product_rawMaterial($id)
    {
        return $this->db->get_where('product',array('id'=>$id))->row_array();
    }
        
}
