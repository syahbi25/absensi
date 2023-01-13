<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public function __construct()
	{
			parent::__construct();
			$this->load->model('model_jabatan');
	}

    public function index()
    {
		$data['jabatan'] = $this->model_jabatan->jabatan()->result();
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/jabatan/index',$data);
        $this->load->view('menu/foot');
    }

    public function tambahJabatan()
    {
		$this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/jabatan/add');
        $this->load->view('menu/foot');
    }

    public function simpanJabatan(){
		$this->form_validation->set_rules('nama_jabatan','Nama Jabatan','required');
		if($this->form_validation->run()==FALSE)
		{
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/jabatan/index',$data);
        $this->load->view('menu/foot');
		}		
		else
		{
		$in_data['nama_jabatan'] = $this->input->post('nama_jabatan');
		$this->db->insert("jabatan",$in_data);
		$this->session->set_flashdata('berhasil','Jabatan Berhasil Disimpan');
		redirect("index.php/Jabatan");
		}
		
    }

    public function ubahJabatan(){
		$id_jabatan = $this->uri->segment(3);
			$query = $this->model_jabatan->ubahJabatan($id_jabatan);
			foreach ($query->result_array() as $tampil)
			{
				$data['id_jabatan'] = $tampil['id_jabatan'];
				$data['nama_jabatan'] = $tampil['nama_jabatan'];
			}
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/jabatan/edit',$data);
        $this->load->view('menu/foot');
    }
    public function updateJabatan(){
		    $id['id_jabatan'] = $this->input->post("id_jabatan");
			$in_data['nama_jabatan'] = $this->input->post('nama_jabatan');
			$this->db->update("jabatan", $in_data, $id);
	
			$this->session->set_flashdata('update', 'Jabatan Berhasil Diupdate');
			redirect("index.php/jabatan");
    }

    function hapusJabatan($id_jabatan)
	{
		$where = array('id_jabatan' => $id_jabatan);
		$this->model_jabatan->hapus_data($where,'jabatan');
		$this->session->set_flashdata('message','Jabatan Berhasil Dihapus');
		redirect("index.php/jabatan");
	}
}