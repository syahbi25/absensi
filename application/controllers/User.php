<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
	{
			parent::__construct();
	 		$this->load->model('model_user');
	}

	public function index()
    {
		$data['user'] = $this->model_user->user()->result(); // untuk konek ke model
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/user/index',$data); // $data untuk menampilkan data karyawan
        $this->load->view('menu/foot');
    }

    public function simpanUser(){
		$password = $this->input->post('password');
		$in_data['name'] = $this->input->post('name');
		$in_data['username'] = $this->input->post('username');
		$in_data['password'] = MD5($password);
		$in_data['avatar'] = $this->input->post('avatar');
		$in_data['karyawan_id'] = $this->input->post('karyawan_id');
		$in_data['role'] = $this->input->post('role');
		$this->db->insert("user",$in_data);
		$this->session->set_flashdata('berhasil','User Berhasil Disimpan');
		redirect("index.php/Karyawan");
    }

	public function ubahUser(){
		$id = $this->uri->segment(3);
			$query = $this->model_user->ubahUser($id);
			foreach ($query->result_array() as $tampil)
			{
				$data['id'] = $tampil['id'];
				$data['name'] = $tampil['name'];
				$data['name'] = $tampil['name'];
				$data['username'] = $tampil['username'];
				$data['password'] = $tampil['password'];
				$data['avatar'] = $tampil['avatar'];
				$data['karyawan_id'] = $tampil['karyawan_id'];
				$data['role'] = $tampil['role'];
			}
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/user/edit',$data);
        $this->load->view('menu/foot');
    }

	public function updateUser(){
		$id['id'] = $this->input->post("id");
		$in_data['username'] = $this->input->post('username');
		$in_data['password'] = MD5($this->input->post('password'));
		$this->db->update("user", $in_data, $id);

		$this->session->set_flashdata('update', 'Jabatan Berhasil Diupdate');
		redirect("index.php/user");
}

	function hapusUser($id)
	{
		$where = array('id' => $id);
		$this->model_user->hapus_data($where,'user');
		$this->session->set_flashdata('message','Jabatan Berhasil Dihapus');
		redirect("index.php/user");
	}
}