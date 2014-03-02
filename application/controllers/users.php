<?php
class Users extends CI_Controller {
	public function index()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (isset($is_logged_in) && ($is_logged_in == true))
		{
			//$this->load->library('javascript'); //Initialize the validation
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('users_view');
				$this->load->view('templates/footer');
		}
		else
		{
			redirect('login');
		}
	}

	public function getall()
	{
		$this->load->model('Login_Model'); 
		$contr_recs ['rows']= $this->Login_Model->getall();
		$usernm = $this->session->userdata('username');
		for ($i=0; $i < count($contr_recs['rows']); $i++) {
			if (($contr_recs['rows'][$i]->username)==$usernm) {
				$contr_recs['rows'][$i]->you = true;
			}
			else {
				$contr_recs['rows'][$i]->you = false;	
			}
		}
		$contr_recs = json_encode($contr_recs);
		print($contr_recs);
	}

	public function postnote()
	{
			$obj = json_decode(file_get_contents('php://input'));
			$message = $obj->message;
			echo 'You entered: '.$message;
	
	}


	public function sendmail()
	{
		$this->load->dbutil();
		$this->load->helper('file');
		$query = $this->db->query("SELECT * FROM users");
		$new_report =  $this->dbutil->csv_from_result($query);
		$filename = 'data/user_report_'.date("m_d_Y_H_i_s").'.csv';
		write_file($filename,$new_report);

		$this->load->library('email');
// ----- Gmail settings ---
		$this->email->from('gopal.sandeep@gmail.com');
 		$this->email->reply_to('gopal.sandeep@gmail.com');

// ----- Office 365 settings ---
//		$this->email->from('****************');
//		$this->email->reply_to('**************');

		$this->email->to('gopal.sandeep@gmail.com');
		$this->email->subject('User Data Report');
		$this->email->attach($filename);
		$msg_body = 'Daily extract of user report is attached here.';
		$this->email->message($msg_body);
		if ( !$this->email->send())
		{	// Generate error
			$message = 'Your message was not sent. Please try again later'; 
			echo $this->email->print_debugger();
		}
		else
		{
			$message = 'Report was sent'; 
			//$this->email->print_debugger();
		}		
			echo $message;
	
	}

	public function update()
	{	
		$obj = json_decode(file_get_contents('php://input'));
        $message = $obj->message;
		$item['name']  = $message->name;
		$item['access_group']  = $message->access_group;
		$item['password']  = $message->password;
		$item['username']  = $message->username;
		$this->load->model('login_model');
		$this->login_model->update_data($item);
	
	}	

}
?>