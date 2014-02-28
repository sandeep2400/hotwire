<?php
class Signup extends CI_Controller {
	public function index()
	{
		$this->load->library('form_validation'); //Initialize the validation

		$this->form_validation->set_rules('signup_name', 'Name', 'required|min_length[3]|max_length[35]|alpha_numeric_dash_space');
		$this->form_validation->set_rules('signup_access', 'Access Group', 'required|min_length[3]|max_length[35]|alpha_numeric');
		$this->form_validation->set_rules('signup_username', 'Username', 'required|min_length[3]|max_length[35]|is_unique[users.username]');	
		$this->form_validation->set_rules('signup_pass', 'Password', 'required|min_length[3]|max_length[20]|alpha_numeric');
		$this->form_validation->set_rules('signup_re_pass', 'Confirm-Password', 'required|min_length[3]|max_length[20]|alpha_numeric|matches[signup_pass]');

		
		if ($this->form_validation->run() == FALSE) 
		{  
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('signup_view');
			$this->load->view('templates/footer');
		}	
		else
		{
			$signup['name'] = $_POST['signup_name'];
			$signup['access'] = $_POST['signup_access'];
			$signup['username'] = $_POST['signup_username'];
			$signup['password'] = $_POST['signup_pass'];
			var_dump($signup);
			$this->load->model('login_Model');
			$this->login_Model->write_data($signup);
			$newdata = array
						(   'username' => $signup['username'],
							'is_logged_in' => true
						);
			$this->session->set_userdata($newdata);
			redirect('users');  
		}

	}	
}
?>