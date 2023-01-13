<?php
class model_jabatan extends CI_Model{

    function jabatan(){
		return $this->db->query("select * from jabatan");
    }

	function ubahJabatan($id_jabatan)
    {
		return $this->db->query("select * from jabatan where id_jabatan='$id_jabatan'");
    }

    function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}



}