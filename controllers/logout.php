<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    public function index() {
        // in case you did not autoload the library
        $this->load->library('auth');
		$this->load->helper('url_helper');
        $this->auth->logout();
        redirect('User');
    }

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */