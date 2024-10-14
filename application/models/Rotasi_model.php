<?php
Class Rotasi_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	function getdata_event($length,$start,$search,$order,$dir,$parsearch,$level,$username){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$cnoevent      	= $parsearch['cnoevent'];
		$cnmevent      	= $parsearch['cnmevent'];
		$cjevent      	= $parsearch['cjevent'];
		$csperiode     	= $parsearch['csperiode'];
		$ceperiode     	= $parsearch['ceperiode'];
		$ccustomer     	= $parsearch['ccustomer'];
		
		$query = "SELECT a.*, b.nama, (select flag from trans_eventapp where eventid=a.id Order By id DESC Limit 1) as flag ";
		$query .= "FROM trans_event a LEFT JOIN m_login b ON a.upd=b.username ";
		$query .= "WHERE a.id!='0' ";
		if(($level=='1') OR ($level=='2' and $regional=='1')){
			$query .= "AND a.upd='$username' ";
		}
		if($cnoevent!=''){
			$query .= "AND a.no_event like '%$cnoevent%' ";
		}
		if($cnmevent!=''){
			$query .= "AND a.nama_event like '%$cnmevent%' ";
		}
		if($ccustomer!=''){
			$query .= "AND a.customer like '%$ccustomer%' ";
		}
		if($cjevent!=''){
			$query .= "AND a.jenisevent like '%$cjevent%' ";
		}
		if($csperiode!=''){
			$query .= "AND a.startperiode='$csperiode' ";
		}
		if($ceperiode!=''){
			$query .= "AND a.endperiode='$ceperiode' ";
		}
		if($level=='2'){
			$query .= "AND ((b.jabatan='$jabatan' AND b.layanan='$layanan') OR a.upd='$username') ";
			$query .= "HAVING (flag is null OR flag=0)  ";
		}
		if($level=='5'){
			$query .= "HAVING (flag='1' OR flag='2') ";
		}
		$query .= "ORDER BY a.no_event DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	

	function get_insertjo(){
		$query = "SELECT MAX(no_event) as novent FROM trans_event";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() <= 0){
			$nojo = 0;
		} else {
			$row = $Q->row_array();
			$nor = substr($row['novent'],0,6);
			$nojo = $nor;
		}
		return $nojo;
	}
	
	function simpanevent($item){
		$this->db->insert('trans_event',$item);
	}
	
	function listedit($sid){
		$data			= array();
		$query = "SELECT a.*, (select flag from trans_eventapp where eventid=a.id Order By id DESC Limit 1) as flag, (select ket from trans_eventapp where eventid=a.id Order By id DESC Limit 1) as ketflag ";
		$query .= "FROM trans_event a LEFT JOIN m_login b ON a.upd=b.username ";
		$query .= "WHERE a.id='$sid' ";
		
		$Q		= $this->db->query($query);
		$data 	= $Q->row();
		
		return $data;		
	}
	
	function dellamp($sd) {
		unlink("event/".$sd);	
    }
	
	function ubahevent($item,$item1){
		$this->db->where($item1);
		$this->db->update('trans_event',$item);
	}
	
	function saveapp_event($putih){
		$this->db->insert('trans_eventapp',$putih);
	}

}
?>