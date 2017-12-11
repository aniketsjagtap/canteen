<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Acc_expensesItem_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get expense by id
     */
    function get_expense_item($id)
    {
        return $this->db->get_where('acc_expense_items',array('id'=>$id))->row_array();
    }
	
	        
    /*
     * Get all acc_expense_items
     */
    function get_all_acc_expense_items()
    {
        $this->db->order_by('acc_expense_sub_type_id', 'asc');
        return $this->db->get('acc_expense_items')->result_array();
    }
	
	/*
     * Get all acc_expense_items
     */
    function get_location_acc_expense_items($acc_expense_sub_type_id)
    {
        $this->db->order_by('date', 'asc');
        return $this->db->get_where('acc_expense_items',array('acc_expense_sub_type_id'=>$acc_expense_sub_type_id))->result_array();
    }
        
    /*
     * function to add new expense
     */
    function add_expense_items($params)
    {
		//print_r($params);
		for($i=0;$i<sizeof($params['acc_expense_sub_type_id']);$i++){
			
			$tmp['name'] = $params['name'][$i];
			$tmp['description'] = $params['description'][$i];
			$tmp['acc_expense_sub_type_id'] = $params['acc_expense_sub_type_id'][$i];
			$this->db->insert('acc_expense_items',$tmp);
			$this->db->insert_id();
			
		}
		return true;
        // $this->db->insert('acc_expense_items',$params);
        // return $this->db->insert_id();
    }
    
    /*
     * function to update expense
     */
    function update_expense_item($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('acc_expense_items',$params);
    }
    
    /*
     * function to delete expense
     */
    function delete_expense_item($id)
    {
        return $this->db->delete('acc_expense_items',array('id'=>$id));
    }
}
