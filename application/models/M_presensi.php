<?php

/**
 * 
 */
class M_presensi extends CI_Model
{
	

	public function get_Jadwal($where)
	{
		return $this->db->get_where("absensi",$where);
	}


	public function createAbsen($data,$where)
	{
		$this->db->where($where);
		return $this->db->update("absensi",$data);
	}


	public function cekLogin ($where)
	{
		return $this->db->get_where("akun", $where);
	}


	



}