<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Person_location extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Person_location_model');
    } 

    /*
     * Listing of person_location
     */
    function index()
    {
        $data['person_location'] = $this->Person_location_model->get_all_person_location();
        
        $data['_view'] = 'person_location/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new person_location
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'person_id' => $this->input->post('person_id'),
				'location_id' => $this->input->post('location_id'),
            );
            
            $person_location_id = $this->Person_location_model->add_person_location($params);
            redirect('person_location/index');
        }
        else
        {
			$this->load->model('Person_model');
			$data['all_person'] = $this->Person_model->get_all_person();

			$this->load->model('Location_model');
			$data['all_location'] = $this->Location_model->get_all_location();
            
            $data['_view'] = 'person_location/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a person_location
     */
    function edit($id)
    {   
        // check if the person_location exists before trying to edit it
        $data['person_location'] = $this->Person_location_model->get_person_location($id);
        
        if(isset($data['person_location']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'person_id' => $this->input->post('person_id'),
					'location_id' => $this->input->post('location_id'),
                );

                $this->Person_location_model->update_person_location($id,$params);            
                redirect('person_location/index');
            }
            else
            {
				$this->load->model('Person_model');
				$data['all_person'] = $this->Person_model->get_all_person();

				$this->load->model('Location_model');
				$data['all_location'] = $this->Location_model->get_all_location();

                $data['_view'] = 'person_location/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The person_location you are trying to edit does not exist.');
    } 

    /*
     * Deleting person_location
     */
    function remove($id)
    {
        $person_location = $this->Person_location_model->get_person_location($id);

        // check if the person_location exists before trying to delete it
        if(isset($person_location['id']))
        {
            $this->Person_location_model->delete_person_location($id);
            redirect('person_location/index');
        }
        else
            show_error('The person_location you are trying to delete does not exist.');
    }
    
}
