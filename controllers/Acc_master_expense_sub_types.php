<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class acc_master_expense_sub_types extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Acc_expensesType_model');
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
			
			
			$this->data['expenseSubtype'] = $this->Acc_expensesType_model->get_all_expenseSubtype();
			$this->data['expenseType'] = $this->Acc_expensesType_model->get_all_expenseType();
			
			
			$this->template
				->title('Welcome','My Aapp')
				->build('acc_master_expense_sub_types/index',$this->data);
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
			
				//$this->form_validation->set_rules('ExpenseType_id', '<b>Expense Type</b>', 'trim|required');
				
			if(isset($_POST) && count($_POST) > 0)     
			{     
				$params = array(
					'acc_expense_type_id' => $this->input->post('ExpenseType_id'),
					'name' => $this->input->post('ExpenseSubtype'),
					'description' => $this->input->post('ExpenseDescription'),
					);
				$subtype_id = $this->Acc_expensesType_model->add_expenseSubtype($params);
				redirect('acc_sales/index');
			}else{
				
				$user_role = $this->User_model->loadRoles($user['person_id']);
				
				$this->data['user'] = $user['username'];
				$this->data['urole'] = $user_role;
				$specialPerm =  $this->User_model->loadSpecialPermission($id);
						
				
				$this->data['pp'] = $specialPerm;
				$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
				
				$this->data['expenseType'] = $this->Acc_expensesType_model->get_all_expenseType();
				
				$this->template
					->title('Welcome','My Aapp')
					->build('acc_master_expense_sub_types/add',$this->data);
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
    function edit($expenses_id)
    {   var_dump($expense_id);
	return true;
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			
			if(!($this->User_model->hasPermission('update',$id)&&($this->User_model->hasPermission('accounts',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			// check if the ExpenseSubtype exists before trying to edit it
			$this->data['expenseSubtype'] = $this->Acc_expensesType_model->get_expenseSubtype($expenses_id);
			
			if(isset($this->data['expenseSubtype']['id']))
			{
				
				$this->form_validation->set_rules('expenseSubtype', '<b>Expense Subtype</b>', 'trim|required|min_length[1]|max_length[100]');
				$this->form_validation->set_rules('expenseType_id', '<b>Expense Type</b>', 'trim|required|integer|min_length[1]|max_length[400]');
				$this->form_validation->set_rules('expenseDescription', '<b>Description</b>', 'trim|min_length[0]|max_length[400]');
					
				if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())     
				{      
					$params = array(
						
						'acc_expense_type_id' => $this->input->post('expenseType_id'),
						'name' => $this->input->post('expenseSubtype'),
						'description' => $this->input->post('expenseDescription'),
					);
					
					$this->Acc_expensesType_model->update_expenseSubtype($expenses_id,$params);            
					redirect('Acc_master_expense_sub_types/index');
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
					$this->data['expenseType'] = $this->Acc_expensesType_model->get_all_expenseType();
				
					$this->template
						->title('Welcome','My Aapp')
						->build('Acc_master_expense_sub_types/edit',$this->data);
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
    function remove($expenses_id)
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			
			if(!($this->User_model->hasPermission('delete',$id)&&($this->User_model->hasPermission('accounts',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$expense = $this->Acc_expensesType_model->get_expenseSubtype($expenses_id);

			// check if the expense exists before trying to delete it
			if(isset($expense['id']))
			{
				$this->Acc_expensesType_model->delete_expenseSubtype($expenses_id);
				redirect('Acc_master_expense_sub_types/index');
			}
			else
				show_error('The expense you are trying to delete does not exist.');
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    }
    
}
