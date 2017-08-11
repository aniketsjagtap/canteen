<?php
class User extends CI_Controller{
	var $data = array();
	var $page = array();
	var $usr = array();
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
		// $this->load->library("random_compat-master/lib/Database.php");
		// require_once "C:/xampp/htdocs/133511/random_compat-master/lib/random.php";
		//$this->load->library("random_compat-master/lib/random.php");
	}
	public function index()
	{
		if ($this->auth->loggedin()) {
			$id = $this->auth->userid();
			if(!$this->User_model->hasPermission('read',$id)){
				show_error('You Don\'t have permission to perform this operation.');
				return false;
			}
			
			$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
			if($this->data['p_role']['role_id']==1||$this->data['p_role']['role_id']==2)
			{
				redirect('Person/index');
			}
			if($this->data['p_role']['role_id']==4)
			{
				redirect('stock/index');
			}
			if($this->data['p_role']['role_id']==5)
			{
				redirect('sale/index');
			}
			if($this->data['p_role']['role_id']==6)
			{
				redirect('sale/index');
			}
			if($this->data['p_role']['role_id']==7)
			{
				redirect('Purchase/index');
			}
			else
			{
				$user = $this->User_model->get('person_id', $id);
				unset($user['password']);
				
				$user_role = $this->User_model->loadRoles($user['person_id']);
						$this->data['user'] = $user['username'];
						$this->data['role'] = $user_role;
						$specialPerm =  $this->User_model->loadSpecialPermission($id);
						
						$this->data['pp'] = $specialPerm;
				$this->template
					->title('Welcome','MyApp')
					 ->build('pages/home',$this->data);
			}
		}
		else{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
		}

	}
	
	public function login()
	{		
		$rules = array(array('field'=>'rusername','label'=>'Username','rules'=>'required'),
				array('field'=>'rpassword','label'=>'Password','rules'=>'required'));
		
		$this->form_validation->set_rules($rules);
		
		if($this->form_validation->run() == FALSE)
		{
			//echo "in form run  ";
			//$this->index();
			$this->template
				->title('Login Admin','Login Page')
				->set_layout('access')
				->build('access/login');
		}
		else
		{
			//echo "in else of form run  ";
			$token = $this->User_model->login($this->input->post('rusername'),$this->input->post('rpassword'));
			if(isset($token)&& $token === true)
			{
				if ($this->auth->loggedin()) {
					
					redirect('User/index');
					
				}
				
				$this->template
					->title('Welcome','MyApp')
					 ->build('category/add',$this->data);
			}
			else
			{
				
				$this->data['error'] = $token;
				$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login',$this->data);
				return false;
			}
		}
	}
	public function urole()
	{
		$token = $this->User_model->getRole($this->input->post('rusername'));
		return $token;
		
	}
	public function register()
	{
		$this->data['title'] = 'Sign Up';
		$this->data['user'] = 'Guest';
		$this->data['role'] = '';
		
		if ($this->auth->loggedin()) {
				
			
			//get current user id
			$id = $this->auth->userid();
			
			// get user from database
			
			$user = $this->User_model->get('person_id', $id);
			//$profile = $this->User_model->get('person_id', $id,'person_profile');
			unset($user['password']);
			$this->data['user'] = $user['username'];
			// $this->data['department'] = $this->User_model->getDepartment($id);
			//$this->data['role'] = $profile['profile_type_id'];
		}
		//echo json_encode($this->data);
		$this->template
					->title('Register User','Register Page')
					->set_layout('access')
					->build('access/register');
		return false;
	}
	
	public function do_register()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|integer|min_length[10]|max_length[11]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			
			if ($this->auth->loggedin()) {
					
				//echo "inside if login  ";
				//get current user id
				$id = $this->auth->userid();
				
				// get user from database
				
				$user = $this->User_model->get('person_id', $id);
				//$profile = $this->User_model->get('person_id', $id,'person_profile');
				unset($user['password']);
				$this->data['user'] = $user['username'];
				// $this->data['department'] = $this->User_model->getDepartment($id);
				//$this->data['role'] = $profile['profile_type_id'];
			}
			//echo json_encode($this->data);
			$this->template
					->title('Register User','Register Page')
					->set_layout('access')
					->build('access/register');
			return false;
		}
			else
			{
				$this->User_model->register_user();
				$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
			}
	}
	
	
	function redi()
	{
		if ($this->auth->loggedin()) {
			
		redirect('User/index');
		}
		else
		{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
		}
	}
	
	
	
	public function redir()
	{
	if ($this->auth->loggedin()) {
			
		$id = $this->auth->userid();
		$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$this->data['user'] = $user['username'];
			$user_role = $this->User_model->loadRoles($user['person_id']);
			//$dep = $this->User_model->getDepartment($id);
			//$this->data['department'] = $dep;
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			$this->data['pp'] = $specialPerm;
			
			
		if($_GET['i'] == 0)
		{
				$departmentBooks=$this->User_model->getFnames($dep);
				$this->data['depbooks']=array_flip($departmentBooks);
				$this->data['e']=isset($dep)?"No BOOKS Found":"";
				$this->data['error']=count($departmentBooks)==0?"No BOOKS Found":"";
				$token=$this->genToken();
				$this->template
						->title('welcome','documents')
						->build('pages/delDocuments',$this->data);
			
		}
		else{
		$departmentBooks=$this->User_model->getFnames($dep);
		$this->data['depbooks']=array_flip($departmentBooks);
		$this->data['e']=isset($dep)?"No BOOKS Found":"";
		$this->data['error']=count($departmentBooks)==0?"No BOOKS Found":"";
		$token=$this->genToken();
		$this->template
				->title('welcome','documents')
				->build('pages/documents',$this->data);
		}
	}
	else
	{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
	}
	}
	
	
	public function getUsers()
	{
	if ($this->auth->loggedin()) {
			
		$id = $this->auth->userid();
		$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$this->data['user'] = $user['username'];
			$user_role = $this->User_model->loadRoles($user['person_id']);
			// $dep = $this->User_model->getDepartment($id);
			// $this->data['department'] = $dep;
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			$this->data['pp'] = $specialPerm;
			
			
		$this->data['uifo'] = $this->User_model->userInfo();
		$i=0;
		foreach($this->data['uifo'] as $x_key => $x_value)
		{
			foreach($x_value as $y_key => $y_value)
			{
				if($y_key == 'person_id')
				{
					//$depa[$i]=$this->User_model->getDepartment($y_value);
					$i++;
				}
			}
		}
					$this->data['depart']=$depa;
		$this->template
					->title('Welcome','MyApp')
					 ->build('pages/users',$this->data);
				return false;
				
	}
	else
	{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
	}
	}
	
	public function editProfile()
	{
	if ($this->auth->loggedin()) {
			
		$id = $this->auth->userid();
		$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$this->data['user'] = $user['username'];
			$user_role = $this->User_model->loadRoles($user['person_id']);
			// $dep = $this->User_model->getDepartment($id);
			// $this->data['department'] = $dep;
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			$this->data['pp'] = $specialPerm;
			

		//$p = $_GET['profile'];
		$p = $_POST['profile'];
		$profile = $this->User_model->get('person_id', $p);
		$this->data['profile'] = $profile;
		//$this->data['dep'] = $this->User_model->getDepartment($profile['person_id']);
		$this->data['pr'] =  $this->User_model->loadRoles($profile['person_id']);
		$this->data['pp'] = $this->User_model->loadSpecialPermission($profile['person_id']);
		
		echo json_encode($this->data);
		/* $this->template
					->title('Welcome','MyApp')
					->build('pages/profile',$this->data);
				return false; */
				
	}
	else
	{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
	}
	}
	
	public function saveUser()
	{
	if ($this->auth->loggedin()) {
			
		$id = $this->auth->userid();
		$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$this->data['user'] = $user['username'];
			$user_role = $this->User_model->loadRoles($user['person_id']);
			// $dep = $this->User_model->getDepartment($id);
			// $this->data['department'] = $dep;
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			$this->data['pp'] = $specialPerm;
			
		$id = $this->auth->userid();
		$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$user_role = $this->User_model->loadRoles($user['person_id']);
			// $this->data['department'] = $this->User_model->getDepartment($id);
			$this->data['user'] = $user['username'];
			$this->data['role'] = $user_role;
		
		$pid = $_POST['pid'];
		$this->usr['username'] = $_POST['username'];
		$this->usr['first_name'] = $_POST['first_name'];
		$this->usr['last_name'] = $_POST['last_name'];
		$this->usr['gender'] = NULL;
		if(isset($_POST['gender']))
			$this->usr['gender'] = $_POST['gender'];
		$this->usr['mobile']  = $_POST['mobile'];
		if(isset($_POST['role_id']))
			$this->usr['role_id']  = $_POST['role_id'];
		$this->usr['email'] = $_POST['email'];
		$entryNewUser = $this->User_model->update_user($pid,$this->usr);
		
		$gt = $this->getUsers();
		
	}
	else
	{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
	}
	}
	

	
	public function savePosition()
	{
	if ($this->auth->loggedin()) {
			
		$id = $this->auth->userid();
		$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$this->data['user'] = $user['username'];
			$user_role = $this->User_model->loadRoles($user['person_id']);
			// $dep = $this->User_model->getDepartment($id);
			// $this->data['department'] = $dep;
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			$this->data['pp'] = $specialPerm;
			
		$pid = $_POST['personiD'];
		$pos = $_POST['prole'];
		if($pos == 'employee') $posID=1;
		if($pos == 'manager') $posID=2;
		if($pos == 'admin') $posID=3;
		if($pos == 'super_admin') $posID=4;
		$deleteOldRole = $this->User_model->delete_person_role($pid);
		$entryNewRole = $this->User_model->insert_person_role($pid,$posID);
		
		$gt = $this->getUsers();
		/* $profile = $this->User_model->get('person_id', $pid);
		$this->data['profile'] = $profile;
		$this->data['dep'] = $this->User_model->getDepartment($profile['person_id']);
		$this->data['pr'] = $this->User_model->loadRoles($profile['person_id']);
		$this->data['pp'] = $this->User_model->loadSpecialPermission($profile['person_id']);
		
		$this->template
					->title('Welcome','MyApp')
					->build('pages/profile',$this->data);
				return false; */
				
	}
	else
	{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
	}
	}
	
	public function savePermission()
	{
	if ($this->auth->loggedin()) {
			
		$id = $this->auth->userid();
		$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$this->data['user'] = $user['username'];
			$user_role = $this->User_model->loadRoles($user['person_id']);
			// $dep = $this->User_model->getDepartment($id);
			// $this->data['department'] = $dep;
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			$this->data['pp'] = $specialPerm;
			
		
		$pid = $_POST['personid'];
		$per = NULL;
		if(isset($_POST['permission']))
			$per = $_POST['permission'];
		$deleteSpecialPermission = $this->User_model->delete_person_permission($pid);
		$entrySpecialPermission = $this->User_model->insert_person_permission($pid,$per);
		
		
		$gt = $this->getUsers();
		
	}
	else
	{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
	}
	}
	
	public function saveLoggedInUser()
	{
	if ($this->auth->loggedin()) {
		
		
		if(isset($_POST) && count($_POST) > 0)     
		{ 
			$pid = $_POST['personID'];
			$this->usr['username'] = $_POST['username'];
			$this->usr['password'] = $_POST['password'];
			$this->usr['first_name'] = $_POST['first_name'];
			$this->usr['last_name'] = $_POST['last_name'];
			$this->usr['gender'] = NULL;
			
			if(isset($_POST['gender']))
			{
				$this->usr['gender'] = $_POST['gender'];
			}
			
			$this->usr['mobile']  = $_POST['mobile'];
			$this->usr['email'] = $_POST['email'];
			$entryNewUser = $this->User_model->update($pid,$this->usr);
			 redirect('Person/index');
			
			
		}
		else{
		
			$id = $this->auth->userid();
			$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$this->data['user'] = $user['username'];
			$user_role = $this->User_model->loadRoles($user['person_id']);
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			$this->data['pp'] = $specialPerm;
			$profile = $this->User_model->get('person_id', $pid);
			$this->data['uinfo'] = $profile;
			$this->data['pr'] = $this->User_model->loadRoles($profile['person_id']);
			$this->data['pp'] = $this->User_model->loadSpecialPermission($profile['person_id']);
			$this->template
					->title('Welcome','MyApp')
					->build('pages/userProfile',$this->data);
		}
	}
	else
	{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
	}
	}
	
	public function editUser()
	{
	if ($this->auth->loggedin()) {
			
		$id = $this->auth->userid();
		$user = $this->User_model->get('person_id', $id);
			unset($user['password']);
			$this->data['user'] = $user['username'];
			$user_role = $this->User_model->loadRoles($user['person_id']);
			// $dep = $this->User_model->getDepartment($id);
			// $this->data['department'] = $dep;
			$this->data['role'] = $user_role;
			$specialPerm =  $this->User_model->loadSpecialPermission($id);
			$this->data['pp'] = $specialPerm;
			
		$this->data['p_role'] = $this->Person_role_model->get_person_role($id);
			$this->data['user'] = $user['username'];
			$this->data['uinfo'] = $user;
			
			$this->template
					->title('Welcome','MyApp')
					->build('pages/userProfile',$this->data);
				return false;
				
	}
	else
	{
			$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
				return false;
	}
	}
	
	public function logout()
	{
		$l=$this->auth->logout();
		$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
	}
}	

//^[0-9A-Za-z\-_]{36}$
?>