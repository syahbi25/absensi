<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            redirect('index.php/login');
		};
	}
	
	public function index()
	{
		$this->load->view('menu/head');
		$this->load->view('menu/nav');
		$this->load->view('menu/index');
		$this->load->view('menu/foot');
	}
}