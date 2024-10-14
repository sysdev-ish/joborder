<?php
Class Pks_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	//Baru 2023
	function get_pks_verifikasi($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type 		= $session_data['type'];
		
		$cari_project	       	= $parsearch['cari_project'];
		$cari_customer	       	= $parsearch['cari_customer'];
		$cari_status	       	= $parsearch['cari_status'];
		
		$query = "select a.id, a.nobak, a.project, a.customer, a.project_type, a.project_start, a.project_end, a.project_long, a.project_created, a.project_approved_by, a.project_approved_at, a.nopks, a.status_pks from legal_pks a ";
		// $query .= "left join trans_jo b on b.no_bak=a.nobak ";
		// $query .= "left join m_type c on c.id=b.type_jo ";
		// $query .= "left join trans_nojopks d on d.nobak=a.nobak ";
		$query .= "where a.status_pks in(0,6)   ";

		if($cari_project != ''){
			$query .= "and a.nobak like '%$cari_project%' || a.project like '%$cari_project%' || a.project_start like '%$cari_project%' || a.project_end like '%$cari_project%' || a.project_long like '%$cari_project%' ";
		}

		if($cari_customer != ''){
			$query .= "and a.customer like '%$cari_customer%' ";
		}

		if($cari_status != ''){
			$query .= "and a.status_pks = '$cari_status' ";
		}
		
		$query .= "group by a.nobak ";
		$query .= "order by a.id desc ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	function get_pks_draft($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type 		= $session_data['type'];
		
		$cari_project	       	= $parsearch['cari_project'];
		$cari_customer	       	= $parsearch['cari_customer'];
		$cari_status	       	= $parsearch['cari_status'];
		
		$query = "select a.id, a.nobak, a.project, a.customer, a.project_type, a.project_start, a.project_end, a.project_long, a.project_created, a.project_approved_by, a.project_approved_at, a.nopks, a.status_pks from legal_pks a ";
		// $query .= "left join trans_jo b on b.no_bak=a.nobak ";
		// $query .= "left join m_type c on c.id=b.type_jo ";
		// $query .= "left join trans_nojopks d on d.nobak=a.nobak ";
		$query .= "where a.status_pks in(1,2,3)   ";

		if($cari_project != ''){
			$query .= "and a.nobak like '%$cari_project%' || a.project like '%$cari_project%' || a.project_start like '%$cari_project%' || a.project_end like '%$cari_project%' || a.project_long like '%$cari_project%' ";
		}

		if($cari_customer != ''){
			$query .= "and a.customer like '%$cari_customer%' ";
		}

		if($cari_status != ''){
			$query .= "and a.status_pks = '$cari_status' ";
		}
		
		$query .= "group by a.nobak ";
		$query .= "order by a.id desc ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	function get_pks_sirkuler($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type 		= $session_data['type'];
		
		$cari_project	       	= $parsearch['cari_project'];
		$cari_customer	       	= $parsearch['cari_customer'];
		$cari_status	       	= $parsearch['cari_status'];
		
		$query = "select a.id, a.nobak, a.project, a.customer, a.project_type, a.project_start, a.project_end, a.project_long, a.project_created, a.project_approved_by, a.project_approved_at, a.nopks, a.status_pks from legal_pks a ";
		// $query .= "left join trans_jo b on b.no_bak=a.nobak ";
		// $query .= "left join m_type c on c.id=b.type_jo ";
		// $query .= "left join trans_nojopks d on d.nobak=a.nobak ";
		$query .= "where a.status_pks in(4,5)   ";

		if($cari_project != ''){
			$query .= "and a.nobak like '%$cari_project%' || a.project like '%$cari_project%' || a.project_start like '%$cari_project%' || a.project_end like '%$cari_project%' || a.project_long like '%$cari_project%' ";
		}

		if($cari_customer != ''){
			$query .= "and a.customer like '%$cari_customer%' ";
		}

		if($cari_status != ''){
			$query .= "and a.status_pks = '$cari_status' ";
		}
		
		$query .= "group by a.nobak ";
		$query .= "order by a.id desc ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	function get_pks_selesai($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type 		= $session_data['type'];
		
		$cari_project	       	= $parsearch['cari_project'];
		$cari_customer	       	= $parsearch['cari_customer'];
		$cari_status	       	= $parsearch['cari_status'];
		
		$query = "select a.id, a.nobak, a.project, a.customer, a.project_type, a.project_start, a.project_end, a.project_long, a.project_created, a.project_approved_by, a.project_approved_at, a.nopks, a.status_pks from legal_pks a ";
		// $query .= "left join trans_jo b on b.no_bak=a.nobak ";
		// $query .= "left join m_type c on c.id=b.type_jo ";
		// $query .= "left join trans_nojopks d on d.nobak=a.nobak ";
		$query .= "where a.status_pks = 8   ";

		if($cari_project != ''){
			$query .= "and a.nobak like '%$cari_project%' || a.project like '%$cari_project%' || a.project_start like '%$cari_project%' || a.project_end like '%$cari_project%' || a.project_long like '%$cari_project%' ";
		}

		if($cari_customer != ''){
			$query .= "and a.customer like '%$cari_customer%' ";
		}

		if($cari_status != ''){
			$query .= "and a.status_pks = '$cari_status' ";
		}
		
		$query .= "group by a.nobak ";
		$query .= "order by a.id desc ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	function get_pks_stop($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type 		= $session_data['type'];
		
		$cari_project	       	= $parsearch['cari_project'];
		$cari_customer	       	= $parsearch['cari_customer'];
		$cari_status	       	= $parsearch['cari_status'];
		
		$query = "select a.id, a.nobak, a.project, a.customer, a.project_type, a.project_start, a.project_end, a.project_long, a.project_created, a.project_approved_by, a.project_approved_at, a.nopks, a.status_pks from legal_pks a ";
		// $query .= "left join trans_jo b on b.no_bak=a.nobak ";
		// $query .= "left join m_type c on c.id=b.type_jo ";
		// $query .= "left join trans_nojopks d on d.nobak=a.nobak ";
		$query .= "where a.status_pks = 7   ";

		if($cari_project != ''){
			$query .= "and a.nobak like '%$cari_project%' || a.project like '%$cari_project%' || a.project_start like '%$cari_project%' || a.project_end like '%$cari_project%' || a.project_long like '%$cari_project%' ";
		}

		if($cari_customer != ''){
			$query .= "and a.customer like '%$cari_customer%' ";
		}

		if($cari_status != ''){
			$query .= "and a.status_pks = '$cari_status' ";
		}
		
		$query .= "group by a.nobak ";
		$query .= "order by a.id desc ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	function get_project_non_pks($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type 		= $session_data['type'];
		
		$cari_project	       	= $parsearch['cari_project'];
		$cari_customer	       	= $parsearch['cari_customer'];
		
		if($cari_project != ''){
			$query .= "and b.no_bak like '%$cari_project%' || IF(b.n_project='' || b.n_project='pilih',b.project,b.n_project) like '%$cari_project%' || b.start_project like '%$cari_project%' || b.end_project like '%$cari_project%' || a.lama like '%$cari_project%' ";
		}

		if($cari_customer != ''){
			$query .= "and b.nama_cust like '%$cari_customer%' ";
		}

		$query = "SELECT c.lup_skema, b.tanggal, b.start_project, b.end_project, b.nilai_project, b.no_bak, b.upd, GROUP_CONCAT(DISTINCT(IF(b.no_bak=b.no_bak AND type_jo=1,b.nojo ,NULL))) AS nojo, b.nama_cust, d.nama AS jenis_captive, IF(b.n_project='' || b.n_project='pilih',b.project,b.n_project) AS project, b.lama, b.komponen_bak, (select nama from m_login where m_login.username=b.upd) as pembuat
				FROM trans_rincian_rekrut a  ";
		$query .= "LEFT JOIN trans_jo b ON a.nojo = b.nojo ";
		$query .= "LEFT JOIN trans_rincian c ON a.nojo = c.nojo ";
		$query .= "LEFT JOIN m_jenis_project d ON d.id=b.jenis_captive ";
		$query .= "WHERE b.type_new IN (1,2) and b.pks=0 and c.lup_skema > '2023-12-31' $where_clause ";
		$query .= "GROUP BY b.no_bak order by c.lup_skema desc ";

		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}

	function get_status_pks()
    {
        $session_data   = $this->session->userdata('logged_in');
        $username       = $session_data['username'];

        $sql = "
                SELECT  (
					SELECT COUNT(*)	FROM legal_pks
					) AS jml,
                	(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 0
					) AS dikirim,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 6
					) AS dikembalikan,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 7
					) AS berhenti,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 9
					) AS return_draft,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks IN(1,2,3,4,5)
					) AS progres
				FROM DUAL
            ";

        // var_dump($sql);die;
        $data = $this->db->query($sql);
        return $data->result_array();
    }

    function detailDataPks($id){
		$data 	= array();		
		
		$sql		= "select a.id, a.nobak, a.project, a.customer, a.project_type, a.project_nilai, a.project_start, a.project_end, a.project_long, a.pks_file, a.project_created, a.project_approved_by, a.project_approved_at, a.nopks, a.status_pks 
			from legal_pks a 
			where a.id = '$id' ";
			
		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}

	//old
	function listdata_pks($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type 		= $session_data['type'];
		
		$cnoj	       	= $parsearch['carnoj'];
		$cpro	       	= $parsearch['carpro'];
		$ctnew	       	= $parsearch['cartnew'];
		$ctbak	       	= $parsearch['cartbak'];
		$cartstatpks   	= $parsearch['cartstatpks'];
		$carpks	       	= $parsearch['carpks'];
		$carapp	       	= $parsearch['carapp'];
		
		$query = "SELECT a.nobak,a.customer,a.project,a.status_pks,a.nopks,b.type_jo,b.lama,c.nama as nama_type,(select nama from m_login where m_login.username=a.approval_draft) as approval FROM trans_pks_new a ";
		$query .= "left join trans_jo b on b.no_bak=a.nobak ";
		$query .= "left join m_type c on c.id=b.type_jo ";
		$query .= "left join trans_nojopks d on d.nobak=a.nobak ";
		$query .= "WHERE a.nobak <> ''   ";
		if($cnoj!=''){
			$query .= "AND b.nojo like '%$cnoj%' ";
		}
		if($ctnew!=''){
			$query .= "AND b.type_new='$ctnew' ";
		}
		if($cpro!=''){
			$query .= "AND (a.project like '%$cpro%') ";
		}
		if($ctbak!=''){
			$query .= "AND a.nobak like '%$ctbak%' ";
		}
		if($cartstatpks!=''){
			if($cartstatpks=='0'){
				$query .= "AND a.status_pks='0' OR a.status_pks is null OR a.status_pks=''  ";
			} else {
				$query .= "AND a.status_pks='$cartstatpks' ";
			} 
			
		}
		if($carpks!=''){
			$query .= "AND a.nopks like '%$carpks%' ";
		}
		if($carapp!=''){
			$query .= "AND (select nama from m_login where m_login.username=a.approval_draft) like '%$carapp%' ";
		}
		if($type == "PM"){
			$query .= "AND d.userpm like '%$username%' ";
		}
		$query .= "GROUP BY a.nobak ";
		$query .= "ORDER BY a.date_approved DESC ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}


	function listdata_pks2($length,$start,$search,$order,$dir,$parsearch){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$cnoj	       	= $parsearch['carnoj'];
		$cpro	       	= $parsearch['carpro'];
		$ctnew	       	= $parsearch['cartnew'];
		$ctbak	       	= $parsearch['cartbak'];
		$cartstatpks   	= $parsearch['cartstatpks'];
		
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "WHERE a.type_jo='1' and pilpks='Y' AND approval='1' AND (flag_cancel_sap!=1 OR flag_cancel_sap IS NULL)   ";
		if($cnoj!=''){
			$query .= "AND a.nojo like '%$cnoj%' ";
		}
		if($ctnew!=''){
			$query .= "AND a.type_new='$ctnew' ";
		}
		if($cpro!=''){
			$query .= "AND (a.project like '%$cpro%' OR a.n_project like '%$cpro%') ";
		}
		if($ctbak!=''){
			$query .= "AND a.no_bak like '%$ctbak%' ";
		}
		if($cartstatpks!=''){
			if($cartstatpks=='0'){
				$query .= "AND a.flag_pks='0' OR a.flag_pks is null OR a.flag_pks=''  ";
			} else if($cartstatpks=='1'){
				$query .= "AND a.flag_pks IN (1,7)  ";
			} else {
				$query .= "AND a.flag_pks='$cartstatpks' ";
			} 
			
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

	function listdata_nojo($nobak){
		$data 	= array();		
		
		$sql		= "SELECT a.nojo,(select nama from m_login where m_login.username=a.userpm) as approval FROM trans_nojopks a 
			where a.nobak = '$nobak' group by a.nojo,a.userpm ";
			
		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}

	function list_document($nobak){
		$data 	= array();		
		
		$sql		= "SELECT * FROM trans_pks_new where nobak = '$nobak' ";
		
		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	function update_pks($item,$putih){
		$this->db->where($item);
		$this->db->update('trans_pks_new',$putih);
	}

	function update_revisi($id, $item){
		$update = array(
            'nobak' => $id
        );
		$this->db->where($update);
		$this->db->update('trans_pks_new',$item);
	}
	
	function get_allbak(){
		$data			= array();
		// $query  = "SELECT RIGHT(nojo,4) AS thn, nojo, no_bak FROM trans_jo HAVING thn IN (2019,2020) ";
		$query  = "SELECT RIGHT(nojo,4) AS thn, nojo, no_bak FROM trans_jo HAVING thn IN (2022,2023) ";		
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		return $data;
	}

}
?>