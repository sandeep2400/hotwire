<?php
class About extends CI_controller{
	public function index(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('about');
		$this->load->view('templates/footer');

	}
}
?>