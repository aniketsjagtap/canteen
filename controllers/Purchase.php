<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Purchase extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Purchase_model');
        $this->load->model('Location_model');
        $this->load->model('Order_model');
        $this->load->model('Supplier_model');
        $this->load->model('Rawmaterial_model');
        $this->load->model('Unit_model');
    } 

    /*
     * Listing of purchase
     */
    function index()
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('read',$id)&&($this->User_model->hasPermission('purchase',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$user_role = $this->User_model->loadRoles($user['person_id']);
			
			$this->data['user'] = $user['username'];
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			
			$this->data['pp'] = $specialPerm;
			$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
			if($this->User_model->hasPermission('WILD_CARD',$id)){
				$this->data['purchase'] = $this->Purchase_model->get_all_purchase();
			}
			else{
				$this->data['purchase'] = $this->Purchase_model->get_location_purchase($user['location_id']);
			}
			
			$this->data['supplier'] = $this->Supplier_model->get_all_status_supplier();
			$this->data['rawMaterial'] = $this->Rawmaterial_model->get_all_rawmaterial();
			$this->data['unit'] = $this->Unit_model->get_all_units();
			$this->data['location'] = $this->Location_model->get_all_location();
			
			$this->template
				->title('Welcome','My Aapp')
				->build('purchase/index',$this->data);
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    }

    /*
     * Adding a new purchase
     */
    function add()
    {   
	
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('add',$id)&&($this->User_model->hasPermission('purchase',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$this->form_validation->set_rules('supplier_id', '<b>Supplier</b>', 'trim|required|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('purchaseNumber', '<b>Invoice/Bill Number</b>', 'trim|required|min_length[1]|max_length[100]');
			
			$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())     
			{   
				list($part1,$part2) = explode(' ', date("Y-m-d H:i:s",strtotime($this->input->post('dtp_input2'))));
				list($year, $month, $day) = explode('-', $part1);
				list($hours, $minutes,$seconds) = explode(':', $part2);
				$timeto =  mktime($hours, $minutes, $seconds, $month, $day, $year);
				$params = array(
					'location_id' => $user['location_id'],
					'supplier_id' => $this->input->post('supplier_id'),
					'order_id' => '0',
					'purchaseNumber' => $this->input->post('purchaseNumber'),
					'rawMaterial_id' => $this->input->post('rawMaterial_id'),
					'quantity' => $this->input->post('quantity'),
					'unit_id' => $this->input->post('unit_id'),
					'price' => $this->input->post('price'),
					//'date' => time(),
					'date' => $timeto,
				);
				//var_dump($params);
				$purchase_id = $this->Purchase_model->add_purchase($params);
				redirect('purchase/index');
			}
			else
			{     
				
				$user_role = $this->User_model->loadRoles($user['person_id']);
				
				$this->data['user'] = $user['username'];
				$this->data['role'] = $user_role;
				$specialPerm =  $this->User_model->loadSpecialPermission($id);
				
				$this->data['pp'] = $specialPerm;
				$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
				$this->data['purchase'] = $this->Purchase_model->get_all_purchase();
				$this->data['rawmaterial'] = $this->Rawmaterial_model->get_all_rawmaterial();
				$this->data['order'] = $this->Order_model->get_all_order();
				$this->data['location'] = $this->Location_model->get_all_location();
				$this->data['unit'] = $this->Unit_model->get_all_units();
				$this->data['supplier'] = $this->Supplier_model->get_all_supplier();
				
				$this->template
					->title('Welcome','My Aapp')
					->build('purchase/add',$this->data);
			}
				
		}else{
			$this->template
				->title('Login Admin','Login Page')
				->set_layout('access')
				->build('access/login');
		}
        
    }  

    /*
     * Editing a purchase
     */
    function edit($purchase_id)
    {   
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('update',$id)&&($this->User_model->hasPermission('purchase',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			// check if the purchase exists before trying to edit it
			$this->data['purchase'] = $this->Purchase_model->get_purchase($purchase_id);
			
			if(isset($this->data['purchase']['id']))
			{
				$user = $this->User_model->get('person_id', $id);
				unset($user['password']);
				
				$this->form_validation->set_rules('supplier_id', '<b>Supplier</b>', 'trim|required|min_length[1]|max_length[10]');
				$this->form_validation->set_rules('purchaseNumber', '<b>Invoice/Bill Number</b>', 'trim|required|min_length[1]|max_length[100]');
					
				if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())     
				{   
					$params = array(
					//	'location_id' => $user('location_id'),
						'supplier_id' => $this->input->post('supplier_id'),
						//'order_id' => '-',
						'purchaseNumber' => $this->input->post('purchaseNumber'),
					//	'rawMaterial_id' => $this->input->post('rawMaterial_id'),
						'quantity' => $this->input->post('quantity'),
						'unit_id' => $this->input->post('unit_id'),
						'price' => $this->input->post('price'),
						//'date' => time(),
					);

					//var_dump($params);
					$this->Purchase_model->update_purchase($purchase_id,$params);            
					redirect('purchase/index');
				}
				else
				{
					
					$user_role = $this->User_model->loadRoles($user['person_id']);
				
					$this->data['user'] = $user['username'];
					$this->data['role'] = $user_role;
					$specialPerm =  $this->User_model->loadSpecialPermission($id);
					
					$this->data['pp'] = $specialPerm;
					$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
					$this->data['rawMaterial'] = $this->Rawmaterial_model->get_all_rawmaterial();
					$this->data['order'] = $this->Order_model->get_all_order();
					$this->data['location'] = $this->Location_model->get_all_location();
					$this->data['unit'] = $this->Unit_model->get_all_units();
					$this->data['supplier'] = $this->Supplier_model->get_all_supplier();
					
					$this->template
						->title('Welcome','My Aapp')
						->build('purchase/edit',$this->data);
				}
			}
			else
				show_error('The purchase you are trying to edit does not exist.');
		}else{
			$this->template
				->title('Login Admin','Login Page')
				->set_layout('access')
				->build('access/login');
		}
    } 

    /*
     * Deleting purchase
     */
    function remove($purchase_id)
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('delete',$id)&&($this->User_model->hasPermission('purchase',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$purchase = $this->Purchase_model->get_purchase($purchase_id);

			// check if the purchase exists before trying to delete it
			if(isset($purchase['id']))
			{
				$this->Purchase_model->delete_purchase($purchase_id);
				redirect('purchase/index');
			}
			else
				show_error('The purchase you are trying to delete does not exist.');
		}else{
			$this->template
				->title('Login Admin','Login Page')
				->set_layout('access')
				->build('access/login');
		}
    }
    
}
