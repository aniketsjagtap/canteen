<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Acc_report_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get sale by id
     */
    function get_acc_sales_report($params)
    {
		//var_dump($params);
		// $this->db->where('date >=', $params['opening_date']);
		// $this->db->where('date <=', $params['closing_date']);
		// $this->db->where('location_id =', $params['location_id']);
		// $this->db->where('date BETWEEN "'. $params['opening_date']. '" and "'. $params['closing_date'].'" and location_id='.$params['location_id']);
		$this->db->where('(date >= "'. $params['opening_date'] . '" and date <= "'. $params['closing_date'] .'" )and location_id='. $params['location_id']);
		return $this->db->get('acc_sales')->result_array();
    }
	
	function get_acc_expense_report($params)
    {
		$this->db->where('(date >= "'. $params['opening_date'] . '" and date <= "'. $params['closing_date'] .'" )and location_id='. $params['location_id']);
		return $this->db->get('acc_expenses')->result_array();
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
    function get_all_acc_sales()
    {
        $this->db->order_by('location_id', 'asc');
        return $this->db->get('acc_sales')->result_array();
    }
	
	/*
     * Get all sales
     */
    function get_location_acc_sales($location_id)
    {
        $this->db->order_by('date', 'asc');
        return $this->db->get_where('acc_sales',array('location_id'=>$location_id))->result_array();
    }
	
	/*
     * Get all sales
     */
    function get_item_acc_sales($product_id)
    {
        $this->db->order_by('date', 'asc');
        return $this->db->get_where('acc_sales',array('product_id'=>$product_id))->row_array();
    }
        
    
}
