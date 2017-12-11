<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Acc_expenses_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get expense by id
     */
    function get_acc_expense($id)
    {
        return $this->db->get_where('acc_expenses',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all acc_expense
     */
    function get_all_acc_expenses()
    {
        $this->db->order_by('location_id', 'asc');
        return $this->db->get('acc_expenses')->result_array();
    }
	
	/*
     * Get all acc_expense
     */
    function get_location_acc_expense($location_id)
    {
        $this->db->order_by('date', 'asc');
        return $this->db->get_where('acc_expenses',array('location_id'=>$location_id))->result_array();
    }
        
    /*
     * function to add new expense
     */
    function add_acc_expenses($params)
    {
		//print_r($params);
		for($i=0;$i<sizeof($params['location_id']);$i++){
			
			$tmp['location_id'] = $params['location_id'][$i];
			$tmp['acc_expense_item_id'] = $params['acc_expense_item_id'][$i];
			$tmp['date'] = $params['date'];
			$tmp['expense'] = $params['expense'][$i];
			$tmp['remark'] = $params['remark'][$i];
			$this->db->insert('acc_expenses',$tmp);
			$this->db->insert_id();
			// echo "<br>**************<br>";
			//  print_r($tmp);
		}
		return true;
        // $this->db->insert('acc_expenses',$params);
        // return $this->db->insert_id();
    }
    
    /*
     * function to update expense
     */
    function update_acc_expense($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('acc_expenses',$params);
    }
    
    /*
     * function to delete expense
     */
    function delete_acc_expense($id)
    {
        return $this->db->delete('acc_expenses',array('id'=>$id));
    }
}