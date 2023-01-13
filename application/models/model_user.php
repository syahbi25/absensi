<?php
class model_user extends CI_Model{

    function user(){
		return $this->db->query("select * from user 
        left join karyawan on karyawan.id_karyawan=user.karyawan_id");
    }

	function ubahUser($id)
    {
		return $this->db->query("select * from user where id='$id'");
    }

    function hapus_data($where,$table)
	{
		$this->db->where($where); 
		$this->db->delete($table);
	}



}