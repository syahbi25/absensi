<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	public function __construct()
	{
			parent::__construct();
			$this->load->model('model_karyawan');
	}

    public function index()
    {
		$data['karyawan'] = $this->model_karyawan->karyawan()->result(); // untuk konek ke model
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/karyawan/index',$data); // $data untuk menampilkan data karyawan
        $this->load->view('menu/foot');
    }

	public function tambahKaryawan()
    {
		
		$data['jabatan_pilih'] = $this->model_karyawan->jabatan_pilih();
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/karyawan/add',$data);
        $this->load->view('menu/foot');
    }

	public function ubahKaryawan()
    {
		$id_karyawan = $this->uri->segment(3);
			$query = $this->model_karyawan->ubahKaryawan($id_karyawan);
			foreach ($query->result_array() as $tampil)
			{
				$data['id_karyawan'] = $tampil['id_karyawan'];
				$data['nama'] = $tampil['nama'];
				$data['email'] = $tampil['email'];
				$data['no_hp'] = $tampil['no_hp'];
				$data['tempat'] = $tampil['tempat'];
				$data['tgl'] = $tampil['tgl'];
				$data['alamat'] = $tampil['alamat'];
				$data['jabatan_id'] = $tampil['jabatan_id'];
				$data['nama_jabatan'] = $tampil['nama_jabatan'];
			}
		
			$data['jabatan_pilih'] = $this->model_karyawan->jabatan_pilih();
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/karyawan/edit',$data);
        $this->load->view('menu/foot');
    }

    //awal
    public function simpanKaryawan()
	{
		$this->form_validation->set_rules('nama','Nama Karyawan','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('no_hp','Nomor Telpon','required');
		$this->form_validation->set_rules('tempat','Tempat','required');
		$this->form_validation->set_rules('tgl','Tanggal Lahir','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('id_jabatan','Jabatan','required');
		if($this->form_validation->run()==FALSE)
		{
        $this->load->view('menu/head');
        $this->load->view('menu/nav');
        $this->load->view('admin/karyawan/index',$data);
        $this->load->view('menu/foot');
		}		
		else
		{
			if(empty($_FILES['userfile']['name']))
			{
				$in_data['id_karyawan'] = $this->input->post('id_karyawan');
				$in_data['nama'] = $this->input->post('nama');
				$in_data['email'] = $this->input->post('email');
				$in_data['no_hp'] = $this->input->post('no_hp');
				$in_data['tempat'] = $this->input->post('tempat');
				$in_data['tgl'] = $this->input->post('tgl');
				$in_data['alamat'] = $this->input->post('alamat');
				$in_data['jabatan_id'] = $this->input->post('jabatan_id');
				$this->db->insert("karyawan",$in_data);
				$this->session->set_flashdata('berhasil','karyawan Berhasil Disimpan');
				redirect("index.php/karyawan");
			}	
			else
			{
				$config['upload_path']     = './assets/images/';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name']    = TRUE;
				$config['remove_spaces']   = TRUE;
				$config['max_size']        = '3000';
				$config['max_width']       = '5000';
				$config['max_height']      = '5000';

				$this->load->library('upload',$config);
				if($this->upload->do_upload("userfile"))
			{
					$data 				= $this->upload->data();

					$source 			= "./assets/images/".$data['file_name'];
					$destination_thumb 	="./assets/images/thumb/";
					$destination_medium ="./assets/images/medium/";
					
					chmod($source, 0777);

					$this->load->library('image_lib');
					$img['images_library']	='GD2';
					$img['create_thumb']	= TRUE;
					$img['maintain_ratio']	= TRUE;

					$limit_medium 	= 5000;
					$limit_thumb	= 5000;

					$limit_use 		= $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'];

					if($limit_use > $limit_thumb) 
					{
						$percent_medium 	= $limit_medium/$limit_use;
						$percent_thumb		= $limit_thumb/$limit_use;
					}

					$img['widht']	=$limit_use > $limit_thumb ? $data['image_width'] * $percent_thumb : $data['image_width'];
					$img['height']	=$limit_use > $limit_thumb ? $data['image_height'] * $percent_thumb : $data['image_height'];

					$img['thumb_marker'] = '';
					$img['quality']		 = '100%';
					$img['source_image'] = $source;
					$img['new_image']	 = $destination_thumb;

					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$img['width']	=$limit_use > $limit_medium ? $data['image_width'] * $percent_medium : $data['image_width'];
					$img['height']	=$limit_use > $limit_medium ? $data['image_height'] * $percent_medium : $data['image_height'];
					
					$img['thumb_marker'] = '';
					$img['quality']		 = '100%';
					$img['source_image'] = $source;
					$img['new_image']	 = $destination_thumb;

					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear();

				
                    $in_data['id_karyawan'] = $this->input->post('id_karyawan');
                    $in_data['nama'] = $this->input->post('nama');
                    $in_data['email'] = $this->input->post('email');
                    $in_data['no_hp'] = $this->input->post('no_hp');
                    $in_data['tempat'] = $this->input->post('tempat');
                    $in_data['tgl'] = $this->input->post('tgl');
                    $in_data['alamat'] = $this->input->post('alamat');
                    $in_data['jabatan_id'] = $this->input->post('jabatan_id');
					$in_data['foto'] = $data['file_name'];

					$this->db->insert("karyawan", $in_data);

					$this->session->set_flashdata('berhasil','Karyawan Berhasil Disimpan');
					redirect("index.php/karyawan");
				}
				else{
					$this->load->view('home/error');
				}

			}
		}
		
    }
	function updateKaryawan(){
		$id['id_karyawan'] = $this->input->post("id_karyawan");
		if (empty($_FILES['userfile']['name']))
		{
			$in_data['id_karyawan'] = $this->input->post('id_karyawan');
			$in_data['nama'] = $this->input->post('nama');
			$in_data['email'] = $this->input->post('email');
			$in_data['no_hp'] = $this->input->post('no_hp');
			$in_data['tempat'] = $this->input->post('tempat');
			$in_data['tgl'] = $this->input->post('tgl');
			$in_data['alamat'] = $this->input->post('alamat');
			$in_data['jabatan_id'] = $this->input->post('jabatan_id');
			$this->db->update("karyawan", $in_data, $id);
	
			$this->session->set_flashdata('update', 'Karyawan Berhasil Diupdate');
			redirect("index.php/karyawan");
		}
		else {
				$config['upload_path']     = './assets/images/';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name']    = TRUE;
				$config['remove_spaces']   = TRUE;
				$config['max_size']        = '5000';
				$config['max_width']       = '5000';
				$config['max_height']      = '5000';
	
				$this->load->library('upload',$config);
				if($this->upload->do_upload("userfile")){
					$data 				= $this->upload->data();
	
					$source 			= "./assets/images/".$data['file_name'];
					$destination_thumb 	="./assets/images/";
					$destination_medium ="./assets/images/";
					
					chmod($source, 0777);
	
					$this->load->library('image_lib');
					$img['images_library']	='GD2';
					$img['create_thumb']	= TRUE;
					$img['maintain_ratio']	= TRUE;
	
					$limit_medium 	= 5000;
					$limit_thumb	= 5000;
	
					$limit_use 		= $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'];
	
					if($limit_use > $limit_thumb) {
						$percent_medium 	= $limit_medium/$limit_use;
						$percent_thumb		= $limit_thumb/$limit_use;
					}
	
					$img['widht']	=$limit_use > $limit_thumb ? $data['image_width'] * $percent_thumb : $data['image_width'];
					$img['height']	=$limit_use > $limit_thumb ? $data['image_height'] * $percent_thumb : $data['image_height'];
	
					$img['thumb_marker'] = '';
					$img['quality']		 = '100%';
					$img['source_image'] = $source;
					$img['new_image']	 = $destination_thumb;
	
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear();
	
					$img['widht']	=$limit_use > $limit_medium ? $data['image_width'] * $percent_medium : $data['image_width'];
					$img['height']	=$limit_use > $limit_medium ? $data['image_height'] * $percent_medium : $data['image_height'];
					
					$img['thumb_marker'] = '';
					$img['quality']		 = '100%';
					$img['source_image'] = $source;
					$img['new_image']	 = $destination_thumb;
	
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear();
	
					$in_data['id_karyawan'] = $this->input->post('id_karyawan');
					$in_data['nama'] = $this->input->post('nama');
					$in_data['email'] = $this->input->post('email');
					$in_data['no_hp'] = $this->input->post('no_hp');
					$in_data['tempat'] = $this->input->post('tempat');
					$in_data['tgl'] = $this->input->post('tgl');
					$in_data['alamat'] = $this->input->post('alamat');
					$in_data['jabatan_id'] = $this->input->post('jabatan_id');
					$in_data['foto'] = $data['file_name'];
					$this->db->update("karyawan", $in_data, $id);
	
					$this->session->set_flashdata('update','Karyawan Berhasil Diupdate');
					redirect("index.php/karyawan");
				}
				else{
					$this->load->view('home/error');
				}
	
			}
	}
	function hapusKaryawan($id_karyawan)
	{
		$where = array('id_karyawan' => $id_karyawan);
		$this->model_karyawan->hapus_data($where,'karyawan');
		$this->session->set_flashdata('message','karyawan Berhasil Dihapus');
		redirect("index.php/karyawan");
	}
    //akhir

}