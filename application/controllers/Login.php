<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('model_login','model_login');
    }
    
	function index(){
        if($this->session->userdata('logged') !=TRUE){
            $this->load->view('admin/login/index');
        }else{
            redirect('index.php/home');
        };
    }
    
    function autentikasi(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
                
        $validasi_username = $this->model_login->query_validasi_username($username);
        if($validasi_username->num_rows() > 0){
            $validate_ps=$this->model_login->query_validasi_password($username,$password);
            if($validate_ps->num_rows() > 0){
                $x = $validate_ps->row_array();
                if($x['status']=='1'){
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('user',$username);
                    $id=$x['id'];
                    if($x['role']=='1'){ //Administrator
                        $name = $x['name'];
                        $this->session->set_userdata('access','Administrator');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        redirect('index.php/home');

                    }else if($x['role']=='2'){ //Karyawan
                        $name = $x['name'];
                        $this->session->set_userdata('access','Karyawan');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        redirect('index.php/home');

                    }
                }else{
                    echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect('index.php/login');
                }
            }else{
                echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect('index.php/login');
            }

        }else{
            echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Uupps!</h3>
            <p>username yang kamu masukan salah.</p>');
            redirect('index.php/login');
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect('index.php/login');
    }

}