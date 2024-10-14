<?php
Class Bast_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	function listdata_bast($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$cnoj	       	= $parsearch['carnoj'];
		$cpro	       	= $parsearch['carpro'];
		$ctnew	       	= $parsearch['cartnew'];
		
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.nojo=b.nojo "; 
		$query .= "WHERE b.skema='1' ";
		if($cnoj!=''){
			$query .= "AND a.nojo like '%$cnoj%' ";
		}
		if($ctnew!=''){
			$query .= "AND a.type_new='$ctnew' ";
		}
		if($cpro!=''){
			$query .= "AND (a.project like '%$cpro%' OR a.n_project like '%$cpro%') ";
		}
		$query .= "GROUP BY a.nojo ";
		$query .= "ORDER BY a.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	function trajo($njo){
		$data		= array();
		$query	= "SELECT a.id, a.nojo, a.jabatan, a.gender, a.pendidikan, a.lokasi, a.atasan, a.kontrak, a.waktu, a.jumlah, b.komponen, c.name_job_function, d.city_name, a.flag_app, e.nama as enama, a.level, a.skilllayanan, a.detail_komp, p.jml as jml_hire ";
		$query	.= "FROM trans_rincian a ";
		$query	.= "Inner Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join job_function c ON a.jabatan=c.id ";
		$query	.= "LEFT Join mapping_city d ON a.lokasi=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		$query	.= "WHERE a.nojo = '$njo' and a.skema='1'  ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}

	function listdoc(){
		$data	= array();
		$query	= "Select * FROM listbast WHERE status='1' ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;

	}		
	
	

}
?>