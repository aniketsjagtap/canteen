<?php

class Product_rawmaterial_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	/*
     * Get all product rawMaterial
     */
    function get_all_product_rawMaterial()
    {
        $this->db->order_by('product_id', 'desc');
        return $this->db->get('product_rawmaterial')->result_array();
    }
	/*
     * Get  rawMaterial by product_id
     */
    function get_product_first_rawMaterial($prod_id)
    {
      return $this->db->get_where('product_rawmaterial',array('product_id'=>$prod_id))->row_array();
    }
        
    /*
     * function to add new product rawMaterial
     */
    function add_product_rawMaterial($params)
    {
		//print_r($params);
		//$this->db->insert('product_rawmaterial',$params);
        //return $this->db->insert_id();
		
		$len = sizeof($params['rawMaterial_id']);
		for($i=0;$i<$len;$i++){
		
			$tmp['product_id'] = $params['product_id'];
			$tmp['rawMaterial_id'] = $params['rawMaterial_id'][$i];
			$tmp['formula'] = $params['formula'][$i];
			$tmp['partyFormula'] = $params['partyFormula'][$i];
			$this->db->insert('product_rawmaterial',$tmp);
			$this->db->insert_id();
		}
		return true;
        
    }
    
    /*
     * function to update product rawMaterial
     */
    function update_product_rawMaterial($id,$params)
    {
        $this->db->where('product_id',$id);
        return $this->db->update('product_rawmaterial',$params);
    }
    
    /*
     * function to delete product rawMaterial
     */
    function delete_product_rawMaterial($id)
    {
        return $this->db->delete('product_rawmaterial',array('product_id'=>$id));
    }
}