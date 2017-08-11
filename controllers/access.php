<?php
class Access extends CI_Controller
{
	public function index()
	{
		$this->template
					->title('Login Admin','Login Page')
					->set_layout('access')
					->build('access/login');
	}
	
	public function register()
	{
		$this->template
					->title('Register User','Register Page')
					->set_layout('access')
					->build('access/register');
	}
}