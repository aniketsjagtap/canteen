<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This is an EXAMPLE user model, edit to match your implementation
 * OR use the adapter model for easy integration with an existing model
 */
class User_model extends CI_Model {
    
    // database table name
    var $table = 'person';
	//acess local variable use $table instead of $this->table
	
	var $userRoles = array();
	
	public $permissions;
	
	
	
	public function __construct()
	{
		
		date_default_timezone_set('Asia/Calcutta');
		$this->permissionList = array();
		
		
	}
    
    /**
     * Add a user, password will be hashed
     * 
     * @param array user
     * @return int id
     */
    public function insert_person($user) {
        // need the library for hashing the password
        $this->load->library("auth");
        
        $user['password'] = $this->hash($user['password']);
        $user['registered'] = time();
        
        $this->db->insert($this->table, $user);
        return $this->db->insert_id();
    }
	/**
     * edit user
     * 
     * @param array user
     */
    // public function update_user($id,$user)
	// {
		// $this->load->library("random_compat-master/lib/Database.php");
		// $db = new Database;
		// $st =$db->prepare('UPDATE person SET username = :un ,first_name = :fn ,Last_name = :ln ,mobile = :sf ,prefix = :pf ,
		// gender = :ge ,email = :em WHERE person_id = :per_id');
		// $st->execute(array(':per_id' => $id,':un' => $user['username'],':fn' => $user['first_name'],':ln' => $user['last_name'],
		// ':sf' => $user['mobile'],':pf' => $user['prefix'],':ge' => $user['gender'],':em' => $user['email']));
	// }
	// /**
     // * Add a user role
     // * 
     // * @param array user
     // * @return int id
     // */
	// public function insert_role($role) {
		
        // $this->db->insert('role', $role);
		// return $this->db->insert_id();
    // }
	
	/**
     * Add a user role to person
     */
	public function insert_person_role($per_id,$role_id) {
        
		$arr=array("role_id"=>$role_id);
		//$this->db->update('person', $arr);
		$this->db->where('person_id', $per_id)->update('person', $arr);
    }
	/**
     * Delete a user role for person
     */
	public function delete_person_role($per_id)
	{
		$this->db->where('person_id', $per_id)->delete('person');
	}
	/**
     * Add a person to department
     */
	public function insert_person_department($per_id,$department) {
        switch ($department) 
		{
		case "account":
			$department_id=1;
			break;
		case "IT":
			$department_id=2;
			break;
		case "enviornment":
			$department_id=3;
			break;
		case "production":
			$department_id=4;
			break;
		case "HR":
			$department_id=5;
			break;
		case "marketing":
			$department_id=6;
			break;
		case "super_admin":
			$department_id=7;
			break;
		default:
			echo "Invalid Department!";
		}
		$arr=array("person_id"=>$per_id, "department_id"=>$department_id);
		$this->db->insert('person_department', $arr);
    }
	/**
     * Delete a person from department
     */
	public function delete_person_department($per_id)
	{
		$this->db->where('person_id', $per_id)->delete('person_department');
	}
	/**
     * Give permissions to person
	 * Special Case Permissions
     */
	public function insert_person_permission($per_id,$permission) {
    if(isset($permission))
	{
		if (in_array('read', $permission)){
			$perm_id=1;
			$arr=array("person_id"=>$per_id, "permission_id"=>$perm_id);
		$this->db->insert('person_permission', $arr);
		}
		if (in_array('insert', $permission)){
			$perm_id=2;
			$arr=array("person_id"=>$per_id, "permission_id"=>$perm_id);
		$this->db->insert('person_permission', $arr);
		}
		if (in_array('delete', $permission)){
			$perm_id=3;
			$arr=array("person_id"=>$per_id, "permission_id"=>$perm_id);
		$this->db->insert('person_permission', $arr);
		}
		if (in_array('update', $permission)){
			$perm_id=4;
			$arr=array("person_id"=>$per_id, "permission_id"=>$perm_id);
		$this->db->insert('person_permission', $arr);
		}	
	}
    }
	/**
     * Give permissions to person
	 * Special Case Permissions
     */
	public function delete_person_permission($per_id)
	{
		return $this->db->where('person_id', $per_id)->delete('person_permission');
	}
	/**
     * Get permissions of person
	 * Special Case Permissions
     */
	public function loadSpecialPermission($per_id)
	{
		$query = $this->db->query("SELECT permission_id from person_permission WHERE person_id = $per_id");
		return  $query->result();
	}
	/****
	* Add a profile type of user, default given is 2 that is customer
	* 1 	admin
	* 2 	customer
	* 3 	banker
	* 4 	employee
	***/
	// public function insert_profile($table,$id)
	// {
		// $profile['person_id'] = $id;
		// $profile['profile_type_id'] = 2;
		
		// $this->db->insert($table, $profile);
	// }
    
    /**
     * Update a user, password will be hashed
     * 
     * @param int id
     * @param array user
     * @return int id
     */
    public function update($id, $user) {
        // prevent overwriting with a blank password
        if (isset($user['password']) && $user['password']) {
            $user['password'] = $this->hash($user['password']);
        } else {
            unset($user['password']);
        }
        
        $this->db->where('person_id', $id)->update($this->table, $user);
        return $id;
    }
    
    /**
     * Delete a user
     * 
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function delete($where, $value = FALSE, $table = FALSE) {
        if (!$value) {
            $value = $where;
            $where = 'person_id';
        }
		 if (!$table) {
			$table = 'person';
        }
       
        $this->db->where($where, $value)->delete($table);
    }
    
    /**
     * Retrieve a user
     * 
     * @param string where
     * @param int value
     * @param string identification field
     */
    public function get($where, $value = FALSE, $table = FALSE) {
		//echo "-where-->".$where."-value-->".$value."-table-->".$table;
        if (!$value) {
            $value = $where;
            $where = 'person_id';
        }
		
		 if (!$table) {
            $table = 'person';
        }
        //echo "-where-->".$where."-value-->".$value."-table-->".$table;
		//return $this->db->get_where('person',array('person_id'=>$person_id))->row_array();
        return $this->db->get_where($table,array('status_id'=>'1',$where=> $value))-> row_array();
        
    }
    
    /**
     * Get a list of users with pagination options
     * 
     * @param int limit
     * @param int offset
     * @return array users
     */
    public function get_list($limit = FALSE, $offset = FALSE) {
        if ($limit) {
            return $this->db->order_by("username")->limit($limit, $offset)->get($this->table)->result_array();
        } else {
            return $this->db->order_by("username")->get($this->table)->result_array();
        }
    }
    
    /**
     * Check if a user exists
     * 
     * @param string where
     * @param int value
     * @param string identification field
     */
    
    public function exists($where, $value = FALSE) {
        if (!$value) {
            $value = $where;
            $where = 'person_id';
        }
        
        return $this->db->where($where, $value)->count_all_results($this->table);
    }
    
    /**
     * Password hashing function
     * 
     * @param string $password
     */
    public function hash($password) {
        $this->load->library('PasswordHash', array('iteration_count_log2' => 8, 'portable_hashes' => FALSE));
        
        // hash password
        return $this->passwordhash->HashPassword($password);
    }
    
    /**
     * Compare user input password to stored hash
     * 
     * @param string $password
     * @param string $stored_hash
     */
    public function check_password($password, $stored_hash) {
        $this->load->library('PasswordHash', array('iteration_count_log2' => 8, 'portable_hashes' => FALSE));
        
        // check password
        return $this->passwordhash->CheckPassword($password, $stored_hash);
    }
	
	public function updatePassword($person_id,$password){
		
		 $user['password'] = $this->hash($user['password']);
		 return $this->db->update('person',$user);
	
	}
	
	public function register_user()
	{
		$this->load->model('User_model');
		$user = array();
		
		$user['username'] = $this->input->post('username');
		$user['first_name'] = $this->input->post('first_name');
		$user['Last_name'] = $this->input->post('Last_name');
		$user['middle_name'] = $this->input->post('middle_name');
		$user['mobile'] = $this->input->post('mobile');
		$user['location_id'] = $this->input->post('location_id');
		$user['gender'] = $this->input->post('gender');
        $user['email'] = $this->input->post('email');
		$user['password'] = $this->input->post('password');
		$department = $this->input->post('department');
		$user['status_id'] = $this->input->post('status_id');
		$role_id=3;
		
		//$role_id = $this->User_model->insert_role($role);
		$per_id = $this->User_model->insert_person($user);
		$ipr = $this->User_model->insert_person_role($per_id,$role_id);
		//$ipd = $this->User_model->insert_person_department($per_id,$department);
		//$ipp = $this->User_model->insert_person_permission($per_id,$role_id);
		
		// if(isset($id))
		// {
			// $this->User_model->insert_profile('person_profile',$id);
			// return true;
		// }
		
		return $per_id;
	}
	
	function login($username,$password)
	{
		
		//echo $email."<br>".$password;
        $error = '';
		
         $user = $this->User_model->get('username', $username);
        // $user = $this->User_model->get_where('person',array('status_id ='=>'1','username'=>$username))->result_array();
		//echo $user['person_id'];
		if ($user) {
			// compare passwords
			if ($this->User_model->check_password($password, $user['password'])) {
				// mark user as logged in
				$this->auth->login($user['person_id']);
				//$user_role=$this->User_model->getRole($email);
				//$user['role']=$user_role;
				return true;
			} else {
			
				$error = 'Wrong password';
				return $error;
			}
			
		} 
		else {
			$error = 'User does not exist';
			return $error;
		}
        		
		return false;
	}
	
/*********************************************ROLES & PERMISSIONS***************************************************/
/**
*Get Role of person
*@param int person_id
**/
	// public function getRole($email)
    // {
		// $user = $this->User_model->get('email', $email);
		// $per_role = $this->User_model->loadRoles($user['person_id']);
		// foreach($per_role as $x => $x_value) 
		// {
			// $rol=$x;
			// echo "+++Key=" . $x."+++" ;
		// }
			// return $x;
	// }
/**
*Load all Roles
*@param int person_id
*
*
*
*
**/
    public function loadRoles($person_id)
    {
		//INNER JOIN to populate roles related to person_id
        $fetchRoles = $this->db->where("person.person_id = $person_id")
								->join("role","person.role_id = role.role_id")
								->get("person");
		
	
		
		//Populate the array
		foreach( $fetchRoles->result_array() as $row)
		{
			
			$this->userRoles[$row["role_description"]] = $this->User_model->getRolePermission($row["role_id"]);
		
		}
		return $this->userRoles;
    }
 
    
    //Create populate Role Object
    public function getRolePermission($role_id)
    {
				
		$fetchRolePermission = $this->db->where("role_permission.role_id = $role_id")->join("role_permission","permission.permission_id = role_permission.permission_id")->get("permission");
		// SELECT * FROM `permission` JOIN `permission` ON `role_permission`.`permission_id` = `permission`.`permission_id` WHERE `role_permission`.`role_id` = 1
		// $this->db->where("role.role_id = $role_id")->join("person","role.role_id = person.person_id")->get("role");
		
		
		foreach($fetchRolePermission->result_array() as $row)
        {
			
			$this->permissionList[$row["permission_description"]] = true;			
        }

		
        return $this->permissionList;
    }
 
    
	//Check if the user has a certain permission
    public function hasPermission($permission,$user_id)
    {	
		if($this->User_model->loadRoles($user_id)){
			//print_r( $this->permissionList);
			//echo '<br/>********'.$permission.': ';
			return (isset($this->permissionList[$permission]));
		}
		
		return false;
    }
	
	
/*********************************************NOMINEE*****************************************************/
	/**
     * get nominee types
     * 
     * 
     */
	public function get_nominee_types(){
		
		$query = $this->db->get('nominee_type');
		return $query->result_array();
	}
	
	/**
	*Insert Nominee from registered person ???
	*@param int profile_id ???
	*@param int person_id
	*@param int nominee_type_id
	*system date start date
	*system date end date
	**/
	public function set_nominee()
	{
		$table = 'nominee';
		$asset = array();
		
		$asset['profile_id'] = $this->input->post('profile_id');
		$asset['person_id'] = $this->input->post('person_id');
		$asset['nominee_type_id'] = $this->input->post('nominee_type_id');
		$asset['start_date'] = date('Y-m-d H:i:s');
		$asset['end_date'] = $this->input->post('end_date');
				
		$this->db->insert($table, $asset);
		
		return $this->db->insert_id();
	}
	
	
	
	
	
	
}