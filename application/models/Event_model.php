<?php
Class Event_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	function getdata_event($length,$start,$search,$order,$dir,$parsearch,$level,$username){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type	 		= $session_data['type'];
		$regional 		= $session_data['regional'];
		
		$cnoevent      	= $parsearch['cnoevent'];
		$cnmevent      	= $parsearch['cnmevent'];
		$cjevent      	= $parsearch['cjevent'];
		$csperiode     	= $parsearch['csperiode'];
		$ceperiode     	= $parsearch['ceperiode'];
		$ccustomer     	= $parsearch['ccustomer'];
		$ctevent     	= $parsearch['ctevent'];
		$cpengadaan    	= $parsearch['cpengadaan'];
		
		$this->db3 = $this->load->database('db_third',TRUE);
		$cekid_client = $this->db3->query("SELECT GROUP_CONCAT(id) as kumpid FROM ish_salesfunnel.new_customer WHERE manager_enterprise='$username' ")->row();
		
		$this->db = $this->load->database('default',TRUE);
		$query  = "SELECT a.*, b.nama, (select flag from trans_eventapp where eventid=a.id Order By id DESC Limit 1) as flag, ";
		$query .= "(select lup from trans_eventapp where eventid=a.id and flag='1' Order By id DESC Limit 1) as lup_app ";
		$query .= "FROM trans_event a LEFT JOIN m_login b ON a.upd=b.username ";
		$query .= "WHERE a.id!='0' ";
		if(($level=='1') OR ($level=='2' and $regional=='1')){
			$query .= "AND a.upd='$username' ";
		}
		if($ctevent!=''){
			$query .= "AND a.flag_pengadaan = '$ctevent' ";
		}
		if($cpengadaan!=''){
			$query .= "AND a.type_pengadaan = '$cpengadaan' ";
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
		if($level=='2' or $level=='4'){
			if($session_data['mgr_enterprise']=='1'){
				$query .= "AND a.kd_customer IN ($cekid_client->kumpid) and b.jabatan='J003' AND b.layanan='L021'  ";
			} else {
				$query .= "AND ((b.jabatan='$jabatan' AND b.layanan='$layanan') OR a.upd='$username') ";
			}
			// $query .= "HAVING (flag is null OR flag=0)  ";
		}
		if($level=='5' && $type=='PPC'){
			$query .= "HAVING (flag='1' OR flag='2' OR flag='3') ";
		}
		if($level=='5' && $type=='PM'){
			$query .= "HAVING (flag='2' OR flag='3') and a.userpm='$username' ";
		}
		// $query .= "ORDER BY flag, a.no_event ASC ";
		$query .= "ORDER BY flag ASC, a.lup DESC ";
		// var_dump($query);die;
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function getdata_event_xls($ctevent,$cnoevent,$ccustomer,$cjevent,$cnmevent,$csperiode,$ceperiode){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type	 		= $session_data['type'];
		$level	 		= $session_data['level'];
		$regional 		= $session_data['regional'];
		
		$this->db3 = $this->load->database('db_third',TRUE);
		$cekid_client = $this->db3->query("SELECT GROUP_CONCAT(id) as kumpid FROM ish_salesfunnel.new_customer WHERE manager_enterprise='$username' ")->row();
		
		$this->db = $this->load->database('default',TRUE);
		$query  = "SELECT a.*, b.nama, (select flag from trans_eventapp where eventid=a.id Order By id DESC Limit 1) as flag, ";
		$query .= "(select lup from trans_eventapp where eventid=a.id and flag='1' Order By id DESC Limit 1) as lup_app ";
		$query .= "FROM trans_event a LEFT JOIN m_login b ON a.upd=b.username ";
		$query .= "WHERE a.id!='0' ";
		if(($level=='1') OR ($level=='2' and $regional=='1')){
			$query .= "AND a.upd='$username' ";
		}
		if($ctevent!=''){
			$query .= "AND a.flag_pengadaan = '$ctevent' ";
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
		if($level=='2' or $level=='4'){
			if($session_data['mgr_enterprise']=='1'){
				$query .= "AND a.kd_customer IN ($cekid_client->kumpid) and b.jabatan='J003' AND b.layanan='L021'  ";
			} else {
				$query .= "AND ((b.jabatan='$jabatan' AND b.layanan='$layanan') OR a.upd='$username') ";
			}
		}
		if($level=='5' && $type=='PPC'){
			$query .= "HAVING (flag='1' OR flag='2' OR flag='3') ";
		}
		if($level=='5' && $type=='PM'){
			$query .= "HAVING (flag='2' OR flag='3') and a.userpm='$username' ";
		}	
		
		$Q		= $this->db->query($query);
		$data 	= $Q->result_array();
		return $data;
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
		
		// var_dump($query);die;
		
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
	
	function get_nojnorek(){
		$data			= array();
		$query = "SELECT * FROM trans_jo WHERE new_rekrut='3' ";
		
		$Q		= $this->db->query($query);
		$data 	= $Q->result();
		
		return $data;		
	}
	
	function get_allarx($nojox){
		$data			= array();
		$query = "SELECT a.lokasi, (select value2 from saparea where value1=a.lokasi) as nlokasi FROM trans_rincian a Where nojo='$nojox' and skema='1' ";
		
		$Q		= $this->db->query($query);
		$data 	= $Q->result_array();
		return $data;
	}
	
	function saveto_dbproposal($ijo){
		$this->db70 = $this->load->database('db70',TRUE);
		$this->db70->insert('t_proposal',$ijo);
	}
	
	function cek_nmrpro(){
		$this->db70 = $this->load->database('db70',TRUE);
		$query 	= "SELECT MAX(nmrproposal) as nmrproposal FROM t_proposal";
		$Q		= $this->db70->query($query);
		if ($Q->num_rows() <= 0){
			$nopro = 0;
		} else {
			$row = $Q->row_array();
			$nor = substr($row['nmrproposal'],0,8);
			$nopro = $nor;
		}
		return $nopro;
	}
}
?>