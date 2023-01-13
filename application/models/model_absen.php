<?php
class model_absen extends CI_Model{

    function absen(){
		return $this->db->query("select * from absen
        left join user on user.id=absen.user_id where stat_absen=1");
    }

    function user(){
		return $this->db->query("select * from user");
    }

	function get_tanggal()
    {
		$q = $this->db->query("SELECT MAX(RIGHT(tanggal,10)) AS absen_max FROM absen");
        $g = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ($k->absen_max);
                $g = sprintf($tmp);
            }
        }else{
            $g = date('d-m-Y');
        }
        return $g;
    }



}