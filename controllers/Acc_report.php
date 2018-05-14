<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Acc_report extends CI_Controller{
    function __construct()
    {
        parent::__construct();
		$this->load->model('Acc_sales_model');
		$this->load->model('Acc_salesType_model');
		$this->load->model('Acc_expenses_model');
        $this->load->model('Acc_expensesItem_model');
        $this->load->model('Acc_expensesType_model');
		
        $this->load->model('Acc_report_model');
         $this->load->model('Stock_model');
        $this->load->model('Rawmaterial_model');
        $this->load->model('Unit_model');
        $this->load->model('Location_model');
		$this->load->model('Order_model');
    } 

    /*
     * Listing of sales
     */
    function index()
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('read',$id)&&($this->User_model->hasPermission('accounts',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$user_role = $this->User_model->loadRoles($user['person_id']);
			
			$this->data['user'] = $user['username'];
			$this->data['urole'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
					
			
			$this->data['pp'] = $specialPerm;
			$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
			unset($this->data['p_role']['password']);
			if($this->User_model->hasPermission('WILD_CARD',$id)){
				$this->data['sales'] = $this->Acc_sales_model->get_all_acc_sales();
			}
			else{
				$this->data['sales'] = $this->Acc_sales_model->get_location_sales($user['location_id']);
			}
			
			$this->data['saleType'] = $this->Acc_salesType_model->get_all_saleType();
			
			$this->data['location'] = $this->Location_model->get_all_location();
			
			$this->template
				->title('Welcome','My Aapp')
				->build('acc_report/getData',$this->data);
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
        
        
    }


	function getData()
	{
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			$user = $this->User_model->get('person_id', $id);
				unset($user['password']);
			
			if(!($this->User_model->hasPermission('read',$id)&&($this->User_model->hasPermission('accounts',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			
			$user_role = $this->User_model->loadRoles($user['person_id']);
				
			$this->data['user'] = $user['username'];
			$this->data['urole'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
					
			
			$this->data['pp'] = $specialPerm;
			$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
			unset($this->data['p_role']['password']);
			$this->data['saleType'] = $this->Acc_salesType_model->get_all_saleType();
			$this->data['expenseTypes'] = $this->Acc_expensesType_model->get_all_expenseType();
			$this->data['expenseSubtypes'] = $this->Acc_expensesType_model->get_all_expenseSubtype();
			$this->data['expenseItems'] = $this->Acc_expensesItem_model->get_all_acc_expense_items();
			
			$this->data['location'] = $this->Location_model->get_all_location();
			
			
				$this->form_validation->set_rules('dtp_input1', '<b>Opening Stock Date</b>', 'trim|required');
				$this->form_validation->set_rules('dtp_input2', '<b>Closing Stock Date</b>', 'trim|required');
				$this->form_validation->set_rules('location_id', '<b>Location</b>', 'trim|required|integer');
				
			if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())     
			{         
				list($part1,$part2) = explode(' ', date("Y-m-d H:i:s",strtotime($this->input->post('dtp_input1'))));
				list($year, $month, $day) = explode('-', $part1);
				list($hours, $minutes,$seconds) = explode(':', $part2);
				$opening =  mktime($hours, $minutes, $seconds, $month, $day, $year); 
				
				list($part3,$part4) = explode(' ', date("Y-m-d H:i:s",strtotime($this->input->post('dtp_input2'))));
				list($year, $month, $day) = explode('-', $part3);
				list($hours, $minutes,$seconds) = explode(':', $part4);
				$closing =  mktime($hours, $minutes, $seconds, $month, $day, $year);
				
				

				$params = array(
					'location_id' => $this->input->post('location_id'),
					'opening_date' => $opening,
					'closing_date' => $closing,
				);
				
				$this->data['sales_report'] = $this->Acc_report_model->get_acc_sales_report($params);
				$array = $this->data['sales_report'];
					$result = array();
					foreach ($array as $val) {
						if (!isset($result[$val['acc_salesType_id']]))
							$result[$val['acc_salesType_id']] = $val;
						else
							$result[$val['acc_salesType_id']]['sale'] += $val['sale'];
							
					}
					$this->data['sales_report'] = array_values($result);

				
				$this->data['expense_report'] = $this->Acc_report_model->get_acc_expense_report($params);
				for($i=0;$i<sizeof($this->data['expense_report']);$i++)
				{
					$tmp = null;
					$tmp = $this->Acc_expensesItem_model->get_expense_item($this->data['expense_report'][$i]['acc_expense_item_id']);
					$this->data['expense_report'][$i]['expense_item_name'] = $tmp ['name'];
					$this->data['expense_report'][$i]['expense_sub_type_id'] = $tmp ['acc_expense_sub_type_id'];
					$tmp = null;
					$tmp = $this->Acc_expensesType_model->get_expenseSubtype($this->data['expense_report'][$i]['expense_sub_type_id']);
					$this->data['expense_report'][$i]['expense_sub_type_name'] = $tmp['name'];
					$this->data['expense_report'][$i]['expense_type_id'] = $tmp['acc_expense_type_id'];
					$tmp = null;
					$tmp = $this->Acc_expensesType_model->get_expenseType($this->data['expense_report'][$i]['expense_type_id']);
					$this->data['expense_report'][$i]['expense_type_name'] = $tmp['name'];
				}
			
	/************************************** Stock Calculation *****************************************************/
				$this->data['open_date'] = $opening;
				$this->data['close_date'] = $closing;

				$arr = $this->data['location'];
				foreach($arr as $key => $val){
					
					if(($val['id']) === ($this->input->post('location_id'))){
						$arr[$key]['id'] = $val['id'];
						$arr[$key]['address'] = $val['address'];
						$arr[$key]['name'] = $val['name'];
						
					}
					else{
						unset($arr[$key]);
					}
				}
				
				$this->data['location'] = array_values($arr);
				if(sizeof($this->data['location'])>0){
					$this->data['location'] = $this->data['location'][0];
				}
				else{
					$this->data['location'] = NULL;
				}
				
					$array = $this->data['expense_report'];
					$result = array();
					foreach ($array as $val) {
							//print_r( $val );
						if (!isset($result[$val['acc_expense_item_id']]))
							$result[$val['acc_expense_item_id']] = $val;
						else
							$result[$val['acc_expense_item_id']]['expense'] += $val['expense'];
							
					}
					$this->data['expense_report'] = array_values($result);
					
					
					/************************Opening Stock Calculation*******************************/
					$this->data['open_date'] = $opening;
					$this->data['close_date'] = $closing;
					
					$close = strtotime('+1 day', $opening);
					$params = array(
						'location_id' => $this->input->post('location_id'),
						'opening_date' => $opening,
						'closing_date' => $close,
						);
					$this->data['openingStock'] = $this->Stock_model->get_location_stock($params);
				
				$rawMaterialPrice = NULL;
				for($i=0;$i<sizeof($this->data['openingStock']);$i++)
				{
					$params = array(
						'rawMaterial_id' => $this->data['openingStock'][$i]['rawMaterial_id'],
						'opening_date' => $opening,
						'closing_date' => $closing,
						);
					$rawMaterialPrice[$i] = $this->Stock_model->get_rate_rawMaterial($params);
					
					
					$this->data['openingStock'][$i]['rate'] = ($rawMaterialPrice[$i]['price']/$this->data['openingStock'][$i]['quantity']);
					$this->data['openingStock'][$i]['price'] = round($this->data['openingStock'][$i]['rate']*$this->data['openingStock'][$i]['quantity'],2);
					$params = null;
					
					// echo"<pre>";
					// print_r($this->data['openingStock'][$i]);
					// echo"</pre>";
					
				}
				
				// return true;

				$array = $this->data['openingStock'];
					$result = array();
					foreach ($array as $val) {
							//print_r( $val );
						if (!isset($result[$val['date']]))
							$result[$val['date']] = $val;
						else
							$result[$val['date']]['price'] += $val['price'];
							
					}
					$this->data['openingStock'] = array_values($result);
					// unset($this->data['openingStock'][0]['id']);
					// unset($this->data['openingStock'][0]['location_id']);
					// unset($this->data['openingStock'][0]['rawMaterial_id']);
					// unset($this->data['openingStock'][0]['quantity']);
					// unset($this->data['openingStock'][0]['unit_id']);
					// unset($this->data['openingStock'][0]['rate']);
					// unset($this->data['openingStock'][0]['date']);
					// foreach($this->data['openingStock'] as $key => $val)
					// {
					// 	$this->data['openingStock'] = $this->data['openingStock'][$key];
					// }

					if(sizeof($this->data['openingStock'])>0){
						$this->data['openingStock'] = $this->data['openingStock'][0]['price'];
					}
					else{
						$this->data['openingStock'] = NULL;
					}
					
			/************************Closing Stock Calculation*******************************/
				$close = strtotime('+1 day', $closing);
				$params = array(
					'location_id' => $this->input->post('location_id'),
					'opening_date' => $closing,
					'closing_date' => $close,
					);
				$this->data['closingStock'] = $this->Stock_model->get_location_stock($params);
			
			$rawMaterialPrice = NULL;
			
			for($i=0;$i<sizeof($this->data['closingStock']);$i++)
			{
				$params = array(
					'rawMaterial_id' => $this->data['closingStock'][$i]['rawMaterial_id'],
					'opening_date' => $opening,
					'closing_date' => $closing,
					);
					$rawMaterialPrice[$i][$i] = $this->Stock_model->get_rate_rawMaterial($params);
				
				$this->data['closingStock'][$i]['rate'] = ($rawMaterialPrice[$i][$i]['price']/$this->data['closingStock'][$i]['quantity']);
				$this->data['closingStock'][$i]['price'] = round($this->data['closingStock'][$i]['rate']*$this->data['closingStock'][$i]['quantity'],2);
			
				$params = null;
				
			// echo"<pre>";
					// print_r($this->data['closingStock'][$i]);
					// echo"</pre>";
					
				}
				
				// return true;

			$array = $this->data['closingStock'];
					$result = array();
					foreach ($array as $val) {
							//print_r( $val );
						if (!isset($result[$val['date']]))
							$result[$val['date']] = $val;
						else
							$result[$val['date']]['price'] += $val['price'];
							
					}
					$this->data['closingStock'] = array_values($result);
					if(sizeof($this->data['closingStock'])>0){
						$this->data['closingStock'] = $this->data['closingStock'][0]['price'];
					}
					else{
						$this->data['closingStock'] = NULL;
					}
				
				// echo"<pre>";
				// print_r($this->data);
				// echo"</pre>";
				// return true;
				$this->template
						->title('Welcome','My Aapp')
						->build('acc_report/index',$this->data);
			}
				
				
			
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    
	}
	
    /*
     * Adding a new sale
     */
    function add()
    {   
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			$user = $this->User_model->get('person_id', $id);
				unset($user['password']);
			
			if(!($this->User_model->hasPermission('add',$id)&&($this->User_model->hasPermission('accounts',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			
				// $this->form_validation->set_rules('Product_id', '<b>Product</b>', 'trim|required');
				// $this->form_validation->set_rules('unit_id', '<b>Unit</b>', 'trim|required|integer|min_length[10]|max_length[11]');
				// $this->form_validation->set_rules('price', '<b>Price</b>', 'trim|required|integer|min_length[1]|max_length[4]');
				// $this->form_validation->set_rules('quantity', '<b>Quantity</b>', 'trim|required|integer|min_length[1]|max_length[4]');
				
			if(isset($_POST) && count($_POST) > 0)     
			{     
				$params = array(
					'unit_id' => $this->input->post('unit_id'),
					'location_id' => $user['location_id'],
					
					'salesType_id' => $this->input->post('salesType_id'),
					'product_id' => $this->input->post('product_id'),
					'quantity' => $this->input->post('quantity'),
					'date' => time(),
					'remark' => $this->input->post('remark'),
					//'price' => $this->input->post('price'),
				);
				// print_r($params);
				$sale_id = $this->Acc_sales_model->add_sale($params);
				redirect('acc_report/index');
			}else{
				
				$user_role = $this->User_model->loadRoles($user['person_id']);
				
				$this->data['user'] = $user['username'];
				$this->data['urole'] = $user_role;
				$specialPerm =  $this->User_model->loadSpecialPermission($id);
						
				
				$this->data['pp'] = $specialPerm;
				$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
				unset($this->data['p_role']['password']);
				$this->data['sales'] = $this->Acc_sales_model->get_all_acc_sales();
				$this->data['saleType'] = $this->Acc_salesType_model->get_all_saleType();

				
				
				$this->data['product'] = $this->Product_model->get_all_product();
				$this->data['unit'] = $this->Unit_model->get_all_units();
				
				$this->template
					->title('Welcome','My Aapp')
					->build('acc_report/add',$this->data);
			}
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
        
       
    }  

    /*
     * Editing a sale
     */
    function edit($sales_id)
    {   
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			
			if(!($this->User_model->hasPermission('update',$id)&&($this->User_model->hasPermission('accounts',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			// check if the sale exists before trying to edit it
			$this->data['sale'] = $this->Acc_sales_model->get_sale($sales_id);
			
			if(isset($this->data['sale']['id']))
			{
			  // $this->form_validation->set_rules('Product_id', '<b>Product</b>', 'trim|required');
				$this->form_validation->set_rules('unit_id', '<b>Unit</b>', 'trim|required|integer|min_length[1]|max_length[3]');
				//$this->form_validation->set_rules('price', '<b>Price</b>', 'trim|required|integer|min_length[1]|max_length[4]');
				$this->form_validation->set_rules('quantity', '<b>Quantity</b>', 'trim|required|integer|min_length[1]|max_length[4]');
					
				if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())     
				{      
					$params = array(
						'unit_id' => $this->input->post('unit_id'),
						//'location_id' => $this->input->post('location_id'),
						'quantity' => $this->input->post('quantity'),
						//'product_id' => $this->input->post('product_id'),
						//'date' => $this->input->post('date'),
						//'price' => $this->input->post('price'),
					);

					$this->Acc_sales_model->update_sale($sales_id,$params);            
					redirect('acc_report/index');
				}
				else
				{
					$user = $this->User_model->get('person_id', $id);
					unset($user['password']);
					$user_role = $this->User_model->loadRoles($user['person_id']);
					
					$this->data['user'] = $user['username'];
					$this->data['urole'] = $user_role;
					$specialPerm =  $this->User_model->loadSpecialPermission($id);
							
					
					$this->data['pp'] = $specialPerm;
					$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
					unset($this->data['p_role']['password']);
					$this->data['product'] = $this->Product_model->get_all_product();
					$this->data['unit'] = $this->Unit_model->get_all_units();
					
					
					$this->template
						->title('Welcome','My Aapp')
						->build('acc_report/edit',$this->data);
				}
			}
			else
				show_error('The sale you are trying to edit does not exist.');
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    } 

    /*
     * Deleting sale
     */
    function remove($sales_id)
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			
			if(!($this->User_model->hasPermission('delete',$id)&&($this->User_model->hasPermission('accounts',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$sale = $this->Acc_sales_model->get_sale($sales_id);

			// check if the sale exists before trying to delete it
			if(isset($sale['id']))
			{
				$this->Acc_sales_model->delete_sale($sales_id);
				redirect('acc_report/index');
			}
			else
				show_error('The sale you are trying to delete does not exist.');
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    }
}
