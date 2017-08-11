<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Product extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
		$this->load->model('Rawmaterial_model');
		$this->load->model('Product_rawmaterial_model');
    } 

    /*
     * Listing of product
     */
    function index()
    {	
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('read',$id)&&($this->User_model->hasPermission('product',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
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
			$this->data['product'] = $this->Product_model->get_all_product();
			$this->data['productRawMaterial'] = $this->Product_rawmaterial_model->get_all_product_rawMaterial();
			$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
			$i=0;
			//echo"*********************************".sizeof($this->data['productRawMaterial']);
			
			for($i=0;$i<sizeof($this->data['productRawMaterial']);$i++){ 
				$this->data['rawmaterial'][$i] = $this->Rawmaterial_model->get_rawmaterial($this->data['productRawMaterial'][$i]['rawMaterial_id']);
				$this->data['rawmaterial'][$i]['product_id'] =$this->data['productRawMaterial'][$i]['product_id'];
				$this->data['rawmaterial'][$i]['formula'] =$this->data['productRawMaterial'][$i]['formula'];
				$this->data['rawmaterial'][$i]['partyFormula'] =$this->data['productRawMaterial'][$i]['partyFormula'];
				
				for($j=0; $j<sizeof($this->data['product']);$j++){
					if($this->data['product'][$j]['id']==$this->data['rawmaterial'][$i]['product_id'])
					{
						$this->data['rawmaterial'][$i]['prod_name'] = $this->data['product'][$j]['name'];
						$this->data['rawmaterial'][$i]['price'] = $this->data['product'][$j]['price'];
					}
				}
			}
			
					
			$this->template
					->title('Welcome','My Aapp')
					->build('product/index',$this->data);
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
        
    }

    /*
     * Adding a new product
     */
    function add()
    {   
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('add',$id)&&($this->User_model->hasPermission('product',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$this->form_validation->set_rules('name', '<b>Name</b>', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('price', '<b>Price Id</b>', 'trim|required');
			// $this->form_validation->set_rules('raw_material_id', '<b>Raw Material</b>', 'trim|required|min_length[1]');
			
			if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())       
			{   
				$params = array(
					'name' => $this->input->post('name'),
					'price' => $this->input->post('price'),
				);
				
				
				$product_id = $this->Product_model->add_product($params);
				
				$params1 = array(
					'product_id' => $product_id,
					'rawMaterial_id' => $this->input->post('rawMaterial_id'),
					'formula' => $this->input->post('field_name'),
					'partyFormula' => $this->input->post('formula_name'),
				);
				$this->Product_rawmaterial_model->add_product_rawMaterial($params1);
				//var_dump($params1);
				redirect('product/index');
			}
			else
			{            
				$id = $this->auth->userid();
				$user = $this->User_model->get('person_id', $id);
				unset($user['password']);
				
				$user_role = $this->User_model->loadRoles($user['person_id']);
				$this->data['user'] = $user['username'];
				$this->data['role'] = $user_role;
				$specialPerm =  $this->User_model->loadSpecialPermission($id);
				
				$this->data['pp'] = $specialPerm;
				$this->data['rawmaterial'] = $this->Rawmaterial_model->get_all_rawmaterial();
				$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
						
				$this->template
					->title('Welcome','My Aapp')
					->build('product/add',$this->data);
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
     * Editing a product
     */
    function edit($product_id)
    {   
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('update',$id)&&($this->User_model->hasPermission('product',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			// check if the product exists before trying to edit it
			$this->data['product'] = $this->Product_model->get_product($product_id);
			
			if(isset($this->data['product']['id']))
			{
				$this->form_validation->set_rules('name', '<b>Name</b>', 'trim|required|max_length[100]');
				$this->form_validation->set_rules('price', '<b>Price Id</b>', 'trim|required');
				
				if(isset($_POST) && count($_POST) > 0 && $this->form_validation->run())      
				{   
					$params = array(
						'name' => $this->input->post('name'),
						'price' => $this->input->post('price'),
					);
					if($this->Product_rawmaterial_model->delete_product_rawMaterial($product_id))
					{
						$this->Product_model->update_product($product_id,$params);     
						
						$params1 = array(
						'product_id' => $product_id,
						'rawMaterial_id' => $this->input->post('rawMaterial_id'),
						'formula' => $this->input->post('field_name'),
						'partyFormula' => $this->input->post('formula_name'),
						);
						$this->Product_rawmaterial_model->add_product_rawMaterial($params1);
						redirect('product/index');
					}
				}
				else
				{
					$id = $this->auth->userid();
					$user = $this->User_model->get('person_id', $id);
					unset($user['password']);
					
					$user_role = $this->User_model->loadRoles($user['person_id']);
							$this->data['user'] = $user['username'];
							$this->data['role'] = $user_role;
							$specialPerm =  $this->User_model->loadSpecialPermission($id);
						
						$this->data['pp'] = $specialPerm;
						$this->data['rawmaterial'] = $this->Rawmaterial_model->get_all_rawmaterial();
						$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
						
					$this->template
					->title('Welcome','My Aapp')
					->build('product/edit',$this->data);
				}
			}
			else
				show_error('The product you are trying to edit does not exist.');
				
		}else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
	
       
    } 
	/*function edit($product_id)
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!$this->User_model->hasPermission('delete',$id)){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$product = $this->Product_model->get_product($product_id);

			// check if the product exists before trying to delete it
			if(isset($product['id']))
			{
				
				if($this->Product_rawmaterial_model->delete_product_rawMaterial($product_id))
				{	
					$this->Product_model->delete_product($product_id);
					redirect('product/add');
				}
				else
					show_error('The product you are trying to Failed to delete .');
			}
			else
				show_error('The product you are trying to delete does not exist.');
		}else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    }*/
	
	
    /*
     * Deleting product
     */
    function remove($product_id)
    {
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!($this->User_model->hasPermission('delete',$id)&&($this->User_model->hasPermission('product',$id)||$this->User_model->hasPermission('WILD_CARD',$id)))){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			$product = $this->Product_model->get_product($product_id);

			// check if the product exists before trying to delete it
			if(isset($product['id']))
			{
				
				if($this->Product_rawmaterial_model->delete_product_rawMaterial($product_id))
				{	
					$this->Product_model->delete_product($product_id);
					redirect('product/index');
				}
				else
					show_error('The product you are trying to Failed to delete .');
			}
			else
				show_error('The product you are trying to delete does not exist.');
		}else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}
    }
    
}
