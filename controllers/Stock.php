<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Stock extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stock_model');
        $this->load->model('Rawmaterial_model');
        $this->load->model('Unit_model');
        $this->load->model('Location_model');
    } 

    /*
     * Listing of stock
     */
    function index()
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('read',$id)&&($this->User_model->hasPermission('stock',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
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
				$this->data['stock'] = $this->Stock_model->get_all_stock();
			}
			else{
				$this->data['stock'] = $this->Stock_model->get_location_stock($user['location_id']);
			}
			$this->data['location'] = $this->Location_model->get_all_location();
			$this->data['rawMaterial'] = $this->Rawmaterial_model->get_all_rawMaterial();
			$this->data['unit'] = $this->Unit_model->get_all_units();
			for($i=0;$i<sizeof($this->data['stock']);$i++)
			{
				$this->data['rawMaterialRate'][$i] = $this->Stock_model->get_rate_rawMaterial($this->data['stock'][$i]['rawMaterial_id']);
				// echo "<pre>";
					// echo "Raw Material Id : ".$this->data['stock'][$i]['rawMaterial_id'].":";
					// print_r($this->data['rawMaterialRate'][$i]);
				// echo "</pre>";
				// if( $this->data['rawMaterialRate'][$i]['price']){
					// $this->data['$rate'] = number_format(($this->data['rawMaterialRate']['price'])/($this->data['rawMaterialRate']['quantity']),2);
					// echo $s['rawMaterial_id']." : ".$s['quantity']." * ".$rate." = ".number_format(($s['quantity']*$rate),2)."<br><br>";
				// }
			}
				
			$this->template
				->title('Welcome','My Aapp')
				->build('stock/index',$this->data);
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
        
        
       
    }

    /*
     * Adding a new stock
     */
    function add()
    {   
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('add',$id)&&($this->User_model->hasPermission('stock',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			
			// $this->form_validation->set_rules('rawMaterial_id', '<b>Raw Material</b>', 'trim|required|integer|min_length[1]|max_length[100]');
			// $this->form_validation->set_rules('quantity', '<b>Closing Stock</b>', 'trim|required|min_length[1]|max_length[4]');
			// $this->form_validation->set_rules('unit_id', '<b>Unit</b>', 'trim|required|integer|min_length[1]|max_length[4]');
			$this->form_validation->set_rules('dtp_input2', '<b>Date</b>', 'trim|required');
			
			if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())     
			{    
			
				list($part1,$part2) = explode(' ', date("Y-m-d H:i:s",strtotime($this->input->post('dtp_input2'))));
				list($year, $month, $day) = explode('-', $part1);
				list($hours, $minutes,$seconds) = explode(':', $part2);
				$timeto =  mktime($hours, $minutes, $seconds, $month, $day, $year);
				
				$params = array(
					'location_id' => $user['location_id'],
					'unit_id' => $this->input->post('unit_id'),
					'rawMaterial_id' => $this->input->post('rawMaterial_id'),
					'quantity' => $this->input->post('quantity'),
					// 'date' => time(),
					'date' => $timeto,
				);
				
				$stock_id = $this->Stock_model->add_stock($params);
				redirect('stock/index');
			}
			else
			{            
				
				$user_role = $this->User_model->loadRoles($user['person_id']);
				
				$this->data['user'] = $user['username'];
				$this->data['urole'] = $user_role;
				$specialPerm =  $this->User_model->loadSpecialPermission($id);
						
				
				$this->data['pp'] = $specialPerm;
				$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
				
				$this->data['rawMaterial'] = $this->Rawmaterial_model->get_all_rawmaterial();
				$this->data['unit'] = $this->Unit_model->get_all_units();
				
				$this->template
					->title('Welcome','My Aapp')
					->build('stock/add',$this->data);
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
     * Editing a stock
     */
    function edit($stock_id)
    {   
	
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('update',$id)&&($this->User_model->hasPermission('stock',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			
			
			// check if the stock exists before trying to edit it
			$this->data['stock'] = $this->Stock_model->get_stock($stock_id);
			
			if(isset($this->data['stock']['id']))
			{
				$user = $this->User_model->get('person_id', $id);
				unset($user['password']);
				
				$this->form_validation->set_rules('rawMaterial_id', '<b>Raw Material</b>', 'trim|required|integer|min_length[1]|max_length[100]');
				$this->form_validation->set_rules('quantity', '<b>Closing Stock</b>', 'trim|required|min_length[1]|max_length[4]');
				$this->form_validation->set_rules('unit_id', '<b>Unit</b>', 'trim|required|integer|min_length[1]|max_length[4]');
							
				if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())     
				{       
					$params = array(
						//'location_id' => $user['location_id'],
						'unit_id' => $this->input->post('unit_id'),
						'rawMaterial_id' => $this->input->post('rawMaterial_id'),
						'quantity' => $this->input->post('quantity'),
						// 'date' => time(),
					);

					$this->Stock_model->update_stock($stock_id,$params);            
					redirect('stock/index');
				}
				else
				{
					$user_role = $this->User_model->loadRoles($user['person_id']);
					
					$this->data['user'] = $user['username'];
					$this->data['urole'] = $user_role;
					$specialPerm =  $this->User_model->loadSpecialPermission($id);
							
					
					$this->data['pp'] = $specialPerm;
					$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
					
					$this->data['rawMaterial'] = $this->Rawmaterial_model->get_all_rawmaterial();
					$this->data['unit'] = $this->Unit_model->get_all_units();
					
					$this->template
						->title('Welcome','My Aapp')
						->build('stock/edit',$this->data);
				}
			}
			else
				show_error('The stock you are trying to edit does not exist.');
			
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    } 

    /*
     * Deleting stock
     */
    function remove($stock_id)
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('delete',$id)&&($this->User_model->hasPermission('stock',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$stock = $this->Stock_model->get_stock($stock_id);

			// check if the stock exists before trying to delete it
			if(isset($stock['id']))
			{
				$this->Stock_model->delete_stock($stock_id);
				redirect('stock/index');
			}
			else
				show_error('The stock you are trying to delete does not exist.');
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    }
    
}
