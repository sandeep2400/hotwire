<?php
class Login extends CI_Controller {
	public function index()
	{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('login_view');
			$this->load->view('templates/footer');
	}

	public function validate_credentials()
	{	
		$formSubmit = $this->input->post('login');
		if ($formSubmit == 'Login')
		{
			$creds['username'] = $_POST['username'];
			$creds['password']=$_POST['password'];
			$this->load->model('login_Model');
			$query = $this->login_Model->validate($creds);
			if ($query)
			{	
				$newdata = array
							(   'username' => $creds['username'],
								'is_logged_in' => true
							);
				$this->session->set_userdata($newdata);
				redirect('users'); 
			}	
			else
			{	$data['err_msg'] = "Incorrect username or password";
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');				
				$this->load->view('login_view', $data);
				$this->load->view('templates/footer');
			}

		}
		else
		{
			redirect('signup');
		}
	}

	public function logout()
	{
			$this->session->sess_destroy();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');			
			$this->load->view('login_view');
			$this->load->view('templates/footer');
	}

}
?>