<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Person_role extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Person_role_model');
    } 

    /*
     * Listing of person_role
     */
    function index()
    {
        $data['person_role'] = $this->Person_role_model->get_all_person_role();
        
        $data['_view'] = 'person_role/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new person_role
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'person_id' => $this->input->post('person_id'),
				'role_id' => $this->input->post('role_id'),
            );
            
            $person_role_id = $this->Person_role_model->add_person_role($params);
            redirect('person_role/index');
        }
        else
        {            
            $data['_view'] = 'person_role/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a person_role
     */
    function edit($)
    {   
        // check if the person_role exists before trying to edit it
        $data['person_role'] = $this->Person_role_model->get_person_role($);
        
        if(isset($data['person_role']['']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'person_id' => $this->input->post('person_id'),
					'role_id' => $this->input->post('role_id'),
                );

                $this->Person_role_model->update_person_role($,$params);            
                redirect('person_role/index');
            }
            else
            {
                $data['_view'] = 'person_role/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The person_role you are trying to edit does not exist.');
    } 

    /*
     * Deleting person_role
     */
    function remove($)
    {
        $person_role = $this->Person_role_model->get_person_role($);

        // check if the person_role exists before trying to delete it
        if(isset($person_role['']))
        {
            $this->Person_role_model->delete_person_role($);
            redirect('person_role/index');
        }
        else
            show_error('The person_role you are trying to delete does not exist.');
    }
    
}
