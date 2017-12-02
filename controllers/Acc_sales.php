<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class acc_sales extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Acc_sales_model');
        $this->load->model('Acc_salesType_model');
        $this->load->model('Rawmaterial_model');
        $this->load->model('Product_rawmaterial_model');
        $this->load->model('Product_model');
        $this->load->model('Unit_model');
        $this->load->model('Type_model');
        $this->load->model('Location_model');
    } 

    /*
     * Listing of sales
     */
    function index()
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('read',$id)&&($this->User_model->hasPermission('sales',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
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
			if($this->User_model->hasPermission('WILD_CARD',$id)){
				$this->data['sales'] = $this->Acc_sales_model->get_all_acc_sales();
			}
			else{
				$this->data['sales'] = $this->Acc_sales_model->get_location_acc_sales($user['location_id']);
			}
			
			$this->data['saleType'] = $this->Acc_salesType_model->get_all_saleType();
			$this->data['Type'] = $this->Type_model->get_all_Type();
			
			$this->data['location'] = $this->Location_model->get_all_location();
			$this->data['product'] = $this->Product_model->get_all_product();
			
			
			$this->data['unit'] = $this->Unit_model->get_all_units();
			
			for($i=0;$i<sizeof($this->data['sales']);$i++)
			{
				$this->data['rawMaterial'][$i] = $this->Product_rawmaterial_model->get_product_first_rawMaterial($this->data['sales'][$i]['product_id']);
				$this->data['rawMaterialType'][$i] = $this->Rawmaterial_model->get_rawmaterial($this->data['rawMaterial'][$i]['rawMaterial_id']);
				$this->data['sales'][$i]['rawMaterialType'] = $this->data['rawMaterialType'][$i]['type_id'];
			}
			$this->template
				->title('Welcome','My Aapp')
				->build('acc_sales/index',$this->data);
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
			
			if(!($this->User_model->hasPermission('add',$id)&&($this->User_model->hasPermission('sales',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			
				// $this->form_validation->set_rules('Product_id', '<b>Product</b>', 'trim|required');
				// $this->form_validation->set_rules('unit_id', '<b>Unit</b>', 'trim|required|integer|min_length[10]|max_length[11]');
				// $this->form_validation->set_rules('price', '<b>Price</b>', 'trim|required|integer|min_length[1]|max_length[4]');
				// $this->form_validation->set_rules('quantity', '<b>Quantity</b>', 'trim|required|integer|min_length[1]|max_length[4]');
				$this->form_validation->set_rules('dtp_input2', '<b>Date</b>', 'trim|required');
				
			if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())     
			{     
				list($part1,$part2) = explode(' ', date("Y-m-d H:i:s",strtotime($this->input->post('dtp_input2'))));
				list($year, $month, $day) = explode('-', $part1);
				list($hours, $minutes,$seconds) = explode(':', $part2);
				$timeto =  mktime($hours, $minutes, $seconds, $month, $day, $year);
				//echo $timeto;
				$params = array(
					'unit_id' => $this->input->post('unit_id'),
					'location_id' => $user['location_id'],
					
					'salesType_id' => $this->input->post('salesType_id'),
					'product_id' => $this->input->post('product_id'),
					'quantity' => $this->input->post('quantity'),
					'date' => $timeto,
					'remark' => $this->input->post('remark'),
					//'price' => $this->input->post('price'),
				);
				// $release_date=$_POST['dtp_input2'];
				//echo date("Y-m-d H:i:s",strtotime($release_date));
				// print_r($params);
				$sale_id = $this->Acc_sales_model->add_sale($params);
				redirect('acc_sales/index');
			}else{
				
				$user_role = $this->User_model->loadRoles($user['person_id']);
				
				$this->data['user'] = $user['username'];
				$this->data['urole'] = $user_role;
				$specialPerm =  $this->User_model->loadSpecialPermission($id);
						
				
				$this->data['pp'] = $specialPerm;
				$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
				$this->data['sales'] = $this->Acc_sales_model->get_all_acc_sales();
				$this->data['saleType'] = $this->Acc_salesType_model->get_all_saleType();

				
				
				$this->data['product'] = $this->Product_model->get_all_product();
				$this->data['unit'] = $this->Unit_model->get_all_units();
				
				$this->template
					->title('Welcome','My Aapp')
					->build('acc_sales/add',$this->data);
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
			
			if(!($this->User_model->hasPermission('update',$id)&&($this->User_model->hasPermission('sales',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
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
						'salesType_id' => $this->input->post('salesType_id'),
						//'location_id' => $this->input->post('location_id'),
						'quantity' => $this->input->post('quantity'),
						//'product_id' => $this->input->post('product_id'),
						//'date' => $this->input->post('date'),
						//'price' => $this->input->post('price'),
						'remark' => $this->input->post('remark'),
					);

					$this->Acc_sales_model->update_sale($sales_id,$params);            
					redirect('acc_sales/index');
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
					$this->data['product'] = $this->Product_model->get_all_product();
					$this->data['unit'] = $this->Unit_model->get_all_units();
					$this->data['saleType'] = $this->Acc_salesType_model->get_all_saleType();
					
					
					$this->template
						->title('Welcome','My Aapp')
						->build('acc_sales/edit',$this->data);
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
			
			if(!($this->User_model->hasPermission('delete',$id)&&($this->User_model->hasPermission('sales',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$sale = $this->Acc_sales_model->get_sale($sales_id);

			// check if the sale exists before trying to delete it
			if(isset($sale['id']))
			{
				$this->Acc_sales_model->delete_sale($sales_id);
				redirect('acc_sales/index');
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
