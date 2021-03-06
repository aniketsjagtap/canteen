<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Report_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get sale by id
     */
    function get_sales_report($params)
    {
		//var_dump($params);
		// $this->db->where('date >=', $params['opening_date']);
		// $this->db->where('date <=', $params['closing_date']);
		// $this->db->where('location_id =', $params['location_id']);
		// $this->db->where('date BETWEEN "'. $params['opening_date']. '" and "'. $params['closing_date'].'" and location_id='.$params['location_id']);
		$this->db->where('(date >= "'. $params['opening_date'] . '" and date <= "'. $params['closing_date'] .'" )and location_id='. $params['location_id']);
		return $this->db->get('sales')->result_array();
    }
	
	function get_purchase_report($params)
    {
		$this->db->where('(date >= "'. $params['opening_date'] . '" and date <= "'. $params['closing_date'] .'" )and location_id='. $params['location_id']);
		return $this->db->get('purchase')->result_array();
    }
	
	function get_stock_report($params)
    {
		//var_dump($params);
		$this->db->where('(date >= "'. $params['opening_date'] . '" and date <= "'. $params['closing_date'] .'" )and location_id='. $params['location_id']);
		return $this->db->get('stock')->result_array();
    }
        
    /*
     * Get all sales
     */
    function get_all_sales()
    {
        $this->db->order_by('location_id', 'asc');
        return $this->db->get('sales')->result_array();
    }
	
	/*
     * Get all sales
     */
    function get_location_sales($location_id)
    {
        $this->db->order_by('date', 'asc');
        return $this->db->get_where('sales',array('location_id'=>$location_id))->result_array();
    }
	
	/*
     * Get all sales
     */
    function get_product_sales($product_id)
    {
        $this->db->order_by('date', 'asc');
        return $this->db->get_where('sales',array('product_id'=>$product_id))->row_array();
    }
        
    /*
     * function to add new sale
     */
    function add_sale($params)
    {
		//print_r($params);
		for($i=0;$i<sizeof($params['product_id']);$i++){
			
			
			$tmp['product_id'] = $params['product_id'][$i];
			$tmp['quantity'] = $params['quantity'][$i];
			$tmp['unit_id'] = $params['unit_id'][$i];
			$tmp['salesType_id'] = $params['salesType_id'][$i];
			$tmp['remark'] = $params['remark'][$i];
			
			$tmp['date'] = $params['date'];
			$tmp['location_id'] = $params['location_id'];
			
			
			$this->db->insert('sales',$tmp);
			$this->db->insert_id();
			// echo "<br>**************<br>";
			 // print_r($tmp);
		}
		return true;
        // $this->db->insert('sales',$params);
        // return $this->db->insert_id();
    }
    
    /*
     * function to update sale
     */
    function update_sale($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('sales',$params);
    }
    
    /*
     * function to delete sale
     */
    function delete_sale($id)
    {
        return $this->db->delete('sales',array('id'=>$id));
    }
}
