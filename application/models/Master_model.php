<?php
Class Master_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	function listkomponen($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.id like '%".$search."%' OR b.jenis like '%".$search."%' OR a.komponen like '%".$search."%' OR a.sifat like '%".$search."%' ";
		}
		
		$query = "SELECT a.id as idkomp , a.kode as kode, a.nama as komponen, b.id as idjenis, b.jenis, a.keterangan as sifat, IF(a.flag='1', 'Aktif', 'Tidak Aktif') as status, a.flag as idstat, a.mandatory ";
		$query .= "FROM komponen a "; 
		$query .= "LEFT JOIN m_jenis_komponen b ON a.jenis = b.id ";
		$query .= "$where_clause ";
		$query .= "order by a.nama ASC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	function get_jeniskomponen(){
		$data	= array();
		$query  = "SELECT id, jenis FROM m_jenis_komponen ORDER BY jenis ASC ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	function get_lskema(){
		$data	= array();
		$query 	= "SELECT id, level FROM m_level_skema order by level ASC ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	

	function get_komponen(){
		$data	= array();
		$query 	= "SELECT id, kode, komponen FROM m_komponen order by komponen ASC ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_sifatkomp($idkom,$jenis,$status){
		$data	= array();
		$query 	= "SELECT id, kode, keterangan FROM komponen WHERE kode='$idkom' ";
		
		if($jenis=='2'){
			$query .= "AND jenis='2' ";
			
			if($status!=''){
				$query .= "AND status_kontrak='$status' ";
			} else {
				$query .= "";
			}
		} else {
			$query .= "";
		}
		
		// var_dump($query);exit();
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data = $row['keterangan'];
			}
		}
		return $data;
	}


	function insert_komponen($datas){
		//$this->db3 = $this->load->database('db_third',TRUE);
		// $this->db->insert('m_komponen',$datas);
		$this->db->insert('komponen',$datas);
	}

	function get_sifatkomponen(){
		$data	= array();
		$query  = "SELECT id, sifat FROM m_sifat_komponen ORDER BY sifat ASC ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}

	function komponen_update($item,$where){
		$this->db->where($where);
		$this->db->update('m_komponen',$item);
	}

}
?>