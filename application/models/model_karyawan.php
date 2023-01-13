<?php
class model_karyawan extends CI_Model{

    function karyawan(){
		return $this->db->query
        ("select * from karyawan 
        inner join jabatan on jabatan.id_jabatan=karyawan.jabatan_id
        left join user on karyawan.id_karyawan=user.karyawan_id");
    }

    function ubahKaryawan($id_karyawan)
    {
        return $this->db->query("select * from karyawan inner join jabatan on jabatan.id_jabatan=karyawan.jabatan_id where id_karyawan='$id_karyawan'");
    }

    function jabatan_pilih(){ 
        $result = $this -> db -> select('id_jabatan, nama_jabatan') -> get('jabatan') -> result_array(); 
 
        $a = array(); 
        $a[''] = 'Pilih Jabatan...'; 
        foreach($result as $r) { 
            $a[$r['id_jabatan']] = $r['nama_jabatan']; 
        } 
        return $a; 
	}	

    function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}