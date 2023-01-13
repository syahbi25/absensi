<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_absen');
		if($this->session->userdata('logged') !=TRUE){
            redirect('index.php/login');
		};
	}
	
	public function index()
	{
        $data['date'] = $this->model_absen->get_tanggal();
        $data['user_absen'] = $this->model_absen->absen()->result();
		$this->load->view('menu/head');
		$this->load->view('menu/nav');
		$this->load->view('admin/absen/index', $data);
		$this->load->view('menu/foot');
	}
	public function list_absen()
	{
        $data['user'] = $this->model_absen->user()->result();
		$this->load->view('menu/head');
		$this->load->view('menu/nav');
		$this->load->view('admin/absen/list', $data);
		$this->load->view('menu/foot');
	}

    function harian(){
        $id = $this->input->post('id');
        $day = date('w');
        $dayList = array(
            '0' => 'Minggu',
            '1' => 'Senin',
            '2' => 'Selasa',
            '3' => 'Rabu',
            '4' => 'Kamis',
            '5' => 'Jumat',
            '6' => 'Sabtu'
        );
        $hari = $dayList[$day];
        
    if ($day == 1) {
        $LiburArray = array();
        $tgl1    = date('d-m-Y');
        $tgl2    = date('d-m-Y', strtotime('-1 days', strtotime($tgl1)));

        for($x = 0; $x < sizeof($id); $x++){
    
        $LiburArray[] = array(
            'user_id'=>$id[$x],
            'hari' => $dayList[0],
            'tanggal' => $tgl2,
            'stat_absen' => 0,
            'keterangan' => "Libur"
        );
        } 
        $this->db->insert_batch('absen',$LiburArray); 
    } 
	$insertArray = array();

	for($x = 0; $x < sizeof($id); $x++){

    $insertArray[] = array(
        'user_id'=>$id[$x],
        'hari' => $hari,
        'tanggal' => date('d-m-Y')
    );
	}     
	$this->db->insert_batch('absen',$insertArray); 

 redirect('index.php/absen');
    }

    function harian_karyawan(){
        $id['id_absen'] = $this->input->post("id_absen");
        $in_data['keterangan'] = "Hadir";
        $in_data['stat_absen'] = 0 ;
        $this->db->update("absen", $in_data, $id);

        $this->session->set_flashdata('update', 'Jabatan Berhasil Diupdate');
        redirect("index.php/home");
    }

    function hadir(){
        $id['id_absen'] = $this->input->post("id_absen");
        $in_data['keterangan'] = "Hadir";
        $in_data['stat_absen'] = 0 ;
        $this->db->update("absen", $in_data, $id);

        $this->session->set_flashdata('update', 'Jabatan Berhasil Diupdate');
        redirect("index.php/absen");
    }

    function tidak_hadir(){
        $id['id_absen'] = $this->input->post("id_absen");
        $in_data['keterangan'] = "Tidak Hadir";
        $in_data['stat_absen'] = 0 ;
        $this->db->update("absen", $in_data, $id);

        $this->session->set_flashdata('update', 'Jabatan Berhasil Diupdate');
        redirect("index.php/absen");
    }
}