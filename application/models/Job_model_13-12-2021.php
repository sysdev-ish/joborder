<?php
Class Job_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	
	/*function simpangojob($njok)
	{
		$data = $this->db->query(" Insert into company_jobs values('', '97', ) ");
		return $data->result();
	}*/
	
	function cek_rinc_edit($nojo){
		$data 	= array();
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT * from trans_rincian where nojo='$nojo' ";
		$Q		= $this->db->query($query);
		$data	= $Q->num_rows();
		return $data;
	}
	
	function get_dokpks(){
		$data 	= array();
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT * from m_docpks ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_email_penerima_pp($nid){
		$data 	= array();
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a left join trans_perpanjangan b on a.username=b.upd where b.id='$nid' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_dashboard($nama){
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query = "SELECT a.`nojo`, c.id, b.id, a.project, a.latihan, current_date() as tgl_sekarang, b.jumlah, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) user, b.jabatan, a.tanggal, c.note, b.lokasi, datediff(a.latihan,current_date()) as selisih ";
		$query .= "FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON b.id = c.`nojo` ";	
		$query .= "WHERE a.approval_admin = 1 and project like '%$search%' ";
		$query .= "GROUP BY b.id ";	
		//var_dump($query);
		//exit();		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_appjo_ops($search,$username,$jbt,$daud){
		//$search 	= $this->input->post('dataarr');
		$data			= array();
		$query = "SELECT a.*, b.nama as nupd, a.n_project, (select nama from m_login where jabatan='$jbt' and layanan='$daud' and level='2' and (regional='' or regional is null) ) as natasan FROM trans_jo a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.username='$username' and (project like '%$search%' or nojo like '%$search%') ";
		$query .= "ORDER BY a.approval=0 DESC, a.approval DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	
	}
	
	
	
	function get_appjo($search,$daud,$jbt){
		//$search 	= $this->input->post('dataarr');
		$data			= array();
		$query = "SELECT a.*, b.nama as nupd, a.n_project FROM trans_jo a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE layanan = '$daud' and jabatan='$jbt' and (project like '%$search%' or nojo like '%$search%') ";
		$query .= "ORDER BY a.approval=0 DESC, a.approval DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function get_appjo1($search,$tes1){
		//$search 	= $this->input->post('dataarr');
		$data			= array();
		//$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, upd, lup FROM trans_jo a ";
		$query = "SELECT a.*, , b.nama as nupd, a.n_project FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.approval = 1 and (project like '%$search%' or nojo like '%$search%') ";
		$query .= "ORDER BY a.approval=0 DESC, a.approval DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	
	}
	
	
	function get_appjo2($search,$username, $jbt, $daud){
		//$search 	= $this->input->post('dataarr');
		$data			= array();
		//$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, upd, lup FROM trans_jo a ";
		$query = "SELECT a.*, b.nama as nupd, a.n_project, (select nama from m_login where jabatan='$jbt' and layanan='$daud' and level='2' and (regional='' or regional is null) ) as natasan FROM trans_jo a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE username ='$username' and (project like '%$search%' or nojo like '%$search%') ";
		$query .= "ORDER BY a.approval=0 DESC, a.approval DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		} 
		return $data;	
	}
	
	
	function get_appjo3($search){
		//$search 	= $this->input->post('dataarr');
		$data			= array();
		//$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup FROM trans_jo a ";
		$query = "SELECT a.*, b.nama as nupd, a.n_project FROM trans_jo a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE project like '%$search%' or nojo like '%$search%' ";
		$query .= "ORDER BY a.approval=0 DESC, a.approval DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function get_transall1(){
		
		$data			= array();
		$query = "SELECT a.*, b.skema FROM trans_jo a ";
		$query .= "INNER JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "WHERE approval_admin = 1 ";
		$query .= "GROUP BY b.id ORDER BY b.nojo";
		//$query .= "order by approval_admin, nojo ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	 
	/*
	function get_transappjo1(){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, upd, lup, ket_atasan, ket_admin FROM trans_jo ";
		//$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE approval = 1 ";
		$query .= "order by approval_admin, nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	*/
	
	function get_transappjo1(){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, a.type_new, a.type_replace,  project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, upd as nupd, lup, ket_atasan, ket_admin, a.type_jo, a.n_project, c.nama as ntype_jo, (SELECT doc_id FROM trans_doc WHERE trans_doc.`nojo`=a.`nojo`) AS doc_id FROM trans_jo a ";
		//$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		//, (select count(id) from trans_rincian where trans_rincian.nojo=a.nojo) as jml_rincian
		$query .= "left JOIN m_type c ON a.`type_jo` = c.`id` ";
		$query .= "WHERE approval = 1 ";
		$query .= "order by approval, nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	/*
	function get_listorder1($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.`project`, u.upd, 
		u.level, u.`tanggal`, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.`lokasi`, u.`bekerja`, u.atasan, u.rekrut, u.hr, u.jmluser, 
		u.training, u.note, u.city_name, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.nama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.bskema, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama AS ntype, a.pic_hi, b.n_project, b.skema AS bskema, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo ";
		$query .= "FROM trans_rincian a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id`  "; 
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` "; 
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "WHERE b.approval = '1' AND d.username='$username' ";
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, '' AS skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '' AS `jumlah`, a.nm_area AS `lokasi`, b.`bekerja`, '' AS atasan, '' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, e.city_name, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama, '' AS status_rekrut, '' AS ket_rekrut, g.nama AS ntype, '' AS pic_hi, b.n_project, b.skema AS bskema, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo ";
		$query .= "FROM trans_perner a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "WHERE b.approval = '1' AND d.username='$username' ";
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		$query .= "ORDER BY u.nojo desc ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	*/
	
	//function get_transappjo2($username, $jbt, $daud){
	function get_transappjo2($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND a.nojo like '%".$search."%' ";
		}
		
		//$data			= array();
		$query = "SELECT a.nojo, a.tanggal, a.project, a.syarat, a.kode_cust, a.deskripsi, a.bekerja, b.nama as nupd, a.lup, a.approval, a.approval_admin, a.komponen, ket_atasan, ket_admin, a.type_jo, a.type_replace, a.type_new, a.n_project, (select nama from m_login where jabatan='$jabatan' and layanan='$layanan' and level='2' and (regional='' or regional is null) limit 1) as natasan, c.nama as ntype_jo, (SELECT doc_id FROM trans_doc WHERE trans_doc.`nojo`=a.`nojo`) AS doc_id, a.flag_cancel_sap FROM trans_jo a ";
		$query .= "left JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "left JOIN m_type c ON a.`type_jo` = c.`id` ";
		$query .= "WHERE username = '$username' ";
		if($username=='8105099'){
			$query .= "OR (b.jabatan='J003' AND b.layanan='L021') ";
		}
		$query .= "$where_clause ";
		$query .= "order by a.approval ASC, a.nojo DESC ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);				
	}
	
	
	//function get_transappjo3(){
	function get_transappjo3($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND a.nojo like '%".$search."%' ";
		}
		//$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, a.kode_cust, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, b.nama as nupd, a.lup, ket_atasan, ket_admin, a.type_jo, a.type_new, a.type_replace, a.n_project, c.nama as ntype_jo, (SELECT doc_id FROM trans_doc WHERE trans_doc.`nojo`=a.`nojo`) AS doc_id, a.flag_cancel_sap FROM trans_jo a ";
		$query .= "left JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "left JOIN m_type c ON a.`type_jo` = c.`id` ";
		$query .= "WHERE a.nojo!='' ";
		$query .= "$where_clause ";
		//$query .= "WHERE approval = 1 ";
		$query .= "order by a.approval ASC, a.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);				
	}
	
	
	function get_transappjo_enterprise($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$this->db3 = $this->load->database('db_third',TRUE);
		$cekid_client = $this->db3->query("SELECT GROUP_CONCAT(id) as kumpid FROM ish_salesfunnel.new_customer WHERE manager_enterprise='$username' ")->row();
		
		$this->db = $this->load->database('default',TRUE);
		$where_clause="";
		if($search != ""){
			$where_clause .= " AND a.nojo like '%".$search."%' ";
		}
		//$data			= array();
		$query = "SELECT a.nojo, a.tanggal, a.kode_cust, a.project, a.syarat, a.deskripsi, a.bekerja, a.upd, a.lup, a.approval, a.approval_admin, a.komponen, ket_atasan, ket_admin, a.type_jo, a.type_replace, b.nama as nupd, a.type_new, a.n_project, c.nama as ntype_jo, (SELECT doc_id FROM trans_doc WHERE trans_doc.`nojo`=a.`nojo`) AS doc_id, a.flag_cancel_sap FROM trans_jo a ";
		//$query .= "LEFT JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "left JOIN m_type c ON a.`type_jo` = c.`id` ";
		$query .= "WHERE a.kode_cust IN ($cekid_client->kumpid) and b.jabatan='J003' AND b.layanan='L021'  ";
		$query .= "$where_clause ";
		$query .= "order by a.approval ASC, a.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	//function get_transappjo($daud, $jbt){
	function get_transappjo($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND a.nojo like '%".$search."%' ";
		}
		//$data			= array();
		$query = "SELECT a.nojo, a.tanggal, a.kode_cust, a.project, a.syarat, a.deskripsi, a.bekerja, a.upd, a.lup, a.approval, a.approval_admin, a.komponen, ket_atasan, ket_admin, a.type_jo, a.type_replace, b.nama as nupd, a.type_new, a.n_project, c.nama as ntype_jo, (SELECT doc_id FROM trans_doc WHERE trans_doc.`nojo`=a.`nojo`) AS doc_id, a.flag_cancel_sap FROM trans_jo a ";
		//$query .= "LEFT JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "left JOIN m_type c ON a.`type_jo` = c.`id` ";
		$query .= "WHERE layanan = '$layanan' and jabatan = '$jabatan' ";
		$query .= "$where_clause ";
		$query .= "order by a.approval ASC, a.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	//function get_transappjo_ops($username, $jbt, $daud){
	function get_transappjo_ops($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND a.nojo like '%".$search."%' ";
		}
		//$data			= array();
		$query = "SELECT a.nojo, a.tanggal, a.project, a.syarat, a.deskripsi, a.bekerja, a.upd, a.lup, a.approval, a.approval_admin, a.komponen, ket_atasan, ket_admin, a.type_jo, a.type_replace, b.nama as nupd, a.type_new, a.n_project, (select nama from m_login where jabatan='$jabatan' and layanan='$layanan' and level='2' and (regional='' or regional is null) ) as natasan, c.nama as ntype_jo, (SELECT doc_id FROM trans_doc WHERE trans_doc.`nojo`=a.`nojo`) AS doc_id FROM trans_jo a ";
		//$query .= "LEFT JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "left JOIN m_type c ON a.`type_jo` = c.`id` ";
		$query .= "WHERE username = '$username' ";
		$query .= "$where_clause ";
		//$query .= "order by a.approval=0 DESC, a.approval DESC ";
		$query .= "order by a.approval ASC, a.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	
	function get_transappjo_skema_ops($username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.username = '$username' ";
		$query .= "group by a.nojo ";
		$query .= "Order By a.flag_approval ASC, a.nojo DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function vget_transappjo_skema_ops($username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.username = '$username' and variabel='1' ";
		$query .= "group by a.nojo ";
		$query .= "Order By a.flag_approval ASC, a.nojo DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function view_sk_ops($area,$perar,$username){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.username = '$username' ";
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else
		{
			$query .= "";
		}
		
		if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		else
		{
			$query .= "";
		}
		
		//var_dump($query);
		//exit();
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_approval=0 desc, a.flag_approval desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		} 
		return $data;		
	}
	
	
	
	function get_transappjo_skema($daud, $jbt){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_cancel_sap, a.flag_skema FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.layanan = '$daud' and b.jabatan = '$jbt' ";
		$query .= "group by a.nojo ";
		//$query .= "Order By a.flag_approval=0 desc, a.flag_approval desc";
		$query .= "Order By a.flag_approval asc, a.nojo desc";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function vget_transappjo_skema($daud, $jbt){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_cancel_sap FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.layanan = '$daud' and b.jabatan = '$jbt' and a.flag_approval='5' and variabel='1' ";
		$query .= "group by a.nojo ";
		//$query .= "Order By a.flag_approval=0 desc, a.flag_approval desc";
		$query .= "Order By a.id desc";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function view_sk($area,$perar,$daud,$jbt){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.layanan = '$daud' and b.jabatan = '$jbt' ";
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else
		{
			$query .= "";
		}
		
		if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		else
		{
			$query .= "";
		}
		
		//var_dump($query);
		//exit();
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_approval=0 desc, a.flag_approval desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_transappjo_skema2($username){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.username = '$username' AND variabel is null ";
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_approval asc, a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function vget_transappjo_skema2($username){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		// $query .= "WHERE b.username = '$username' and a.flag_approval='5' and variabel='1' ";
		$query .= "WHERE b.username = '$username' and variabel='1' ";
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_approval asc, a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function view_sk_cr($area,$perar,$username){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE b.username = '$username'  ";
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else
		{
			$query .= "";
		}
		
		if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		else
		{
			$query .= "";
		}
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_approval=0 desc, a.flag_approval desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_pesan($tes){
		$data			= array();
		$query = "SELECT * FROM trans_jo ";
		$query .= "where approval = 1 and approval_admin = 0 ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_notif(){		
		/*$query = "SELECT a.* FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE b.level = '$tes' and a.approval = 1 ";
		$Q		= $this->db->query($query);*/
		//$this->db->where("perner_b",$username);
		$this->db->where("approval","1");
		$this->db->where("approval_admin","0");
		$Q		= $this->db->get('trans_jo');
		$jml  = $Q->num_rows();

		return $jml;
	}
	
	function get_pesan1(){
		$data			= array();
		$query = "SELECT * FROM trans_jo ";
		$query .= "where approval_admin = 1 ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_notif1(){		
		$this->db->where("approval_admin","1");
		$Q		= $this->db->get('trans_jo');
		$jml  = $Q->num_rows();

		return $jml;
	}
	
	function get_pesan2($daud){
		$data			= array();
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE layanan='$daud' and approval = 0 ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_notif2($daud){
		/*		
		$this->db->where("level",$tes);
		$this->db->where("approval","0");
		$Q		= $this->db->get('trans_jo');
		*/
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE layanan='$daud' and approval = 0 ";
		$Q		= $this->db->query($query);
		$jml  = $Q->num_rows();

		return $jml;
	}
	
	function get_pesan3($username){
		$data			= array();
		$query = "SELECT * FROM trans_jo  ";
		//$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE upd = '$username' and (approval = 2 OR approval_admin = 2) ";
		//$this->db->where("upd",$nama);
		//$this->db->where("approval_admin","2");
		//$this->db->where("approval","2");
		//$Q		= $this->db->get('trans_jo');
		$Q		= $this->db->query($query);
		$jml  = $Q->num_rows();
		if ($jml > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
		
	function get_notif3($username){		
		//$this->db->where("approval","2");
		/*
		$this->db->where("upd",$nama);
		$this->db->where("approval_admin","2");
		$Q		= $this->db->get('trans_jo');
		*/
		$query = "SELECT * FROM trans_jo  ";
		$query .= "WHERE upd = '$username' and (approval = 2 OR approval_admin = 2) ";
		$Q		= $this->db->query($query);
		$jml  = $Q->num_rows();

		return $jml;
	}
	
	function simpan_komentar($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_jo',$item1);
	}
	
	function simpan_cancel($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_jo',$item1);
	}
	
	function simpan_cancel_sap($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_jo',$item1);
	}
	
	function simpan_cancel_sap2($putih,$putih1){
		$this->db->where($putih);
		$this->db->update('trans_rincian',$putih1);
	}

	
	/*function get_transall(){
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "WHERE b.approval_admin = 1 ";
		$query .= "GROUP BY a.id ORDER BY a.nojo";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}*/


	function get_transall(){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 ";
		$query .= "WHERE b.approval = 1 ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_transall_manar2(){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 ";
		$query .= "WHERE b.skema = 1 AND e.province_id IN ('1','2','3') ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_jo($search){
		
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "WHERE b.approval = 1 and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_jo_manar2($search){
		
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "WHERE b.skema = '1' and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_transall_rekrut($daud){
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_jobs, a.flag_app, a.ket_rej, b.type_jo, a.status_rekrut, a.ket_rekrut, h.nama as ntype, a.pic_hi, b.n_project, b.skema as bskema ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo "; 
		$query .= "LEFT JOIN province g ON e.province_id = g.id ";
		//$query .= "LEFT JOIN m_login d ON d.layanan = g.layanan ";
		$query .= "LEFT JOIN m_type h ON b.type_jo = h.id ";
		$query .= "WHERE b.approval = 1 and a.flag_app = 1 and g.layanan='$daud' ";
		$query .= "GROUP BY a.id ORDER BY a.status_rekrut ASC, a.nojo DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_jo_rekrut($daud,$search){
		
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.lup, b.syarat, b.deskripsi, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_jobs, a.flag_app, a.ket_rej, b.type_jo, a.status_rekrut, a.ket_rekrut, h.nama as ntype, a.pic_hi ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN province g ON e.province_id = g.id ";
		//$query .= "LEFT JOIN m_login d ON d.layanan = g.layanan ";
		$query .= "LEFT JOIN m_type h ON b.type_jo = h.id ";
		$query .= "WHERE b.approval = 1 and a.flag_app = 1 and g.layanan='$daud' and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY a.id ORDER BY a.status_rekrut ASC, a.nojo DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_jo_creater($username, $search){
		
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.lup, b.syarat, b.deskripsi, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "WHERE b.approval = 1 AND d.username='$username' and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_transall_manar_2($username){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, i.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN mapping_manar e ON a.`lokasi` = e.`areaid` and e.personalareaid=b.project ";
		$query .= "LEFT JOIN mapping_city i ON i.`city_id` = e.`areaid` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.username='$username' ";
		$query .= "WHERE b.approval = 1 AND e.manar='$username' and (b.type_jo='2' or b.type_jo='4') ";
		$query .= "GROUP BY a.id ORDER BY (a.flag_app=0 OR a.flag_app IS NULL) DESC, a.flag_app DESC ";
		
		//var_dump($query);
		//exit();
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_transall_manar($username){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		//$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.username='$username' ";
		$query .= "WHERE b.approval = 1 AND e.manar='$username'  ";
		$query .= "GROUP BY a.id ORDER BY (a.flag_app=0 OR a.flag_app IS NULL) DESC, a.flag_app DESC ";
		
		//var_dump($query);
		//exit();
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_jo_manar($username, $search){
		
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		//$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.username='$username' ";
		$query .= "WHERE b.approval = 1 AND e.manar='$username' AND (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY a.id ORDER BY (a.flag_app=0 OR a.flag_app IS NULL) DESC, a.flag_app DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_transall_approval($daud,$jbt){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.layanan='$daud' ";
		$query .= "WHERE b.approval = 1 AND d.layanan='$daud' and d.jabatan='$jbt' ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_jo_approval($daud,$jbt,$search){
		
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.lup, b.syarat, b.deskripsi, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "WHERE b.approval = 1 AND d.layanan='$daud' and d.jabatan='$jbt' and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_transall_approval_ops($username){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.layanan='$daud' ";
		$query .= "WHERE b.approval = 1 AND d.username='$username' ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_jo_approval_ops($username,$search){
		
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.lup, b.syarat, b.deskripsi, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "WHERE b.approval = 1 AND d.username='$username' and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_transall_sap(){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, a.project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema as skemax, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap, c.nama as ntype, d.nama as dnama, b.pic_hi, a.ket_done, a.n_project, f.name_job_function as jabatan, e.city_name as lokasi, b.atasan, b.kontrak, b.waktu, b.jumlah, b.id, b.lokasi as lokasix, b.skema FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` "; 
		$query .= "LEFT JOIN m_type c ON a.`type_jo` = c.`id` "; 
		$query .= "LEFT JOIN m_login d ON a.`upd` = d.`username` "; 
		$query .= "LEFT JOIN mapping_city e ON b.`lokasi` = e.`city_id` "; 
		$query .= "LEFT JOIN job_function f ON b.`jabatan` = f.`id` "; 
		//$query .= "WHERE approval_admin = 1 "; 
		$query .= "WHERE approval = 1 and b.flag_app = 1 "; 
		//$query .= "GROUP BY b.nojo ";
		$query .= "order by(b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.nojo DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	/* 
	function get_transall_sap_2($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.project like '%".$search."%' OR a.n_project like '%".$search."%' OR b.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, a.project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema as skemax, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap, c.nama as ntype, d.nama as dnama, b.pic_hi, a.ket_done, a.n_project, f.name_job_function, e.city_name as lokasi, b.atasan, b.kontrak, b.waktu, b.jumlah, b.id, b.lokasi as lokasix, b.skema, b.jabatan, b.skilllayanan, b.skilllayanan_txt, b.ket_done as bket_done, a.type_jo, a.type_new, a.type_replace FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` "; 
		$query .= "LEFT JOIN m_type c ON a.`type_jo` = c.`id` "; 
		$query .= "LEFT JOIN m_login d ON a.`upd` = d.`username` "; 
		$query .= "LEFT JOIN mapping_city e ON b.`lokasi` = e.`city_id` "; 
		$query .= "LEFT JOIN job_function f ON b.`jabatan` = f.`id` "; 
		//$query .= "WHERE approval_admin = 1 "; 
		$query .= "WHERE approval = 1 and b.flag_app = 1 "; 
		$query .= "$where_clause ";
		$query .= "order by(b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	*/
	
	
	function getnojo_pm(){
		$data			= array();
		$query = "SELECT nojo From trans_jo ";
		$query .= "WHERE approval IN (1,5) "; 
		$query .= "Order By nojo "; 
		$Q		= $this->db->query($query);
		$data = $Q->result_array();
		
		return $data;		
	}
	
	
	function detrfc_new($id){
		$data			= array();
		$query = "SELECT * From perner_newjo ";
		$query .= "WHERE rincid='$id' "; 
		$query .= "Order By id "; 
		$Q		= $this->db->query($query);
		$data = $Q->result_array();
		
		return $data;		
	}
	
	
	function detrfc_rep($id){
		$abc = $this->db->query("Select perner, perner_ganti From trans_perner Where id='$id' ")->row();
		
		$data			= array();
		$query = "SELECT *, perner_ganti as perner, message_rfc as messagerfc From trans_perner_ganti ";
		$query .= "WHERE perner_resrot='".$abc->perner."' and perner_ganti='".$abc->perner_ganti."' "; 
		$query .= "Order By id "; 
		$Q		= $this->db->query($query);
		$data = $Q->result_array();
		
		return $data;		
	}
	
	
	function detrfc_res($id){
		$data			= array();
		$query = "SELECT *, message_rfc as messagerfc From trans_perner ";
		$query .= "WHERE id='$id' "; 
		$query .= "Order By id "; 
		$Q		= $this->db->query($query);
		$data = $Q->result_array();
		
		return $data;		
	}
	
	
	function get_transall_sap_2($length,$start,$search,$order,$dir,$parsearch){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$chire       	= $parsearch['carhire'];
		$cdone       	= $parsearch['cardone'];
		$cpm	       	= $parsearch['carpm'];
		$cpro	       	= $parsearch['carpro'];
		$clok	       	= $parsearch['carlok'];
		$cnoj	       	= $parsearch['carnoj'];
		$czpar	       	= $parsearch['carzpar'];
		$ccreat	       	= $parsearch['carcreat'];
		$cnobak	       	= $parsearch['carnobak'];
		$ctglcr	       	= $parsearch['cartglcr'];
		$ctglbk	       	= $parsearch['cartglbek'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.dnama like '%".$search."%' OR u.zparam like '%".$search."%' OR u.n_project like '%".$search."%' ";
		}
		
		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.project, 
		u.level, u.`tanggal`, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.lokasix, u.`bekerja`, u.atasan, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.dnama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.skemax, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.deskripsi, u.bket_done, u.lokasi, u.skilllayanan, u.type_replace, u.kontrak, u.waktu, u.lup, u.ket_atasan, u.ket_admin, u.ket_done, u.type_new, u.nm_persa, u.no_bak, u.alev, u.level_sap, u.persa_sap, u.skill_sap, u.area_sap, u.jabatan_sap, u.skema_sap, u.abkrs_sap, u.jenis_pro_sap, u.zparam, u.detail_komp, u.lup_skema, u.lup_cancel_skema, u.rekrutx, u.blup, u.id_hire, u.jml_hire, u.userpm, u.nuserpm, u.rotasi_resign, u.lama, u.lup_edit, u.lupapp_atasan, u.lup_newrej, u.alup_edit, u.kunci_tgl_create, u.rstatus_rekrut, u.jml_stop, u.flag_peralihan, u.bekerja_edit, u.type_rekrut, u.tgl_bekerja, u.tgl_latihan, u.perner_norekrut, u.nreason, u.nama_cust, u.perner_ganti, u.status_pernernewjo "; 
		// $query .= "u.rekrut, u.hr, u.jmluser, u.training, u.note, u.upd,  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, d.level, b.tanggal, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi` as lokasix, b.`bekerja`, a.atasan, e.value2 as lokasi, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama as dnama, a.status_rekrut, a.ket_rekrut, g.nama AS ntype, a.pic_hi, b.n_project, b.skema AS skemax, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.deskripsi, a.ket_done as bket_done, a.skilllayanan, b.type_replace, a.kontrak, a.waktu, a.lup, b.ket_atasan, b.ket_admin, b.ket_done, b.type_new, '' as nm_persa, b.no_bak, a.level as alev, a.level_sap, a.persa_sap, a.skill_sap, a.area_sap, a.jabatan_sap, a.skema_sap, a.abkrs_sap, a.jenis_pro_sap, a.zparam, a.detail_komp, a.lup_skema, b.lup_cancel_skema, b.new_rekrut as rekrutx, b.lup as blup, r.id AS id_hire, p.jml as jml_hire, a.userpm, (select nama from m_login where m_login.username=a.userpm) as nuserpm, '' as rotasi_resign, b.lama, b.lup_edit, b.lupapp_atasan, a.lup_newrej, a.lup_edit as alup_edit, a.kunci_tgl_create, r.status_rekrut as rstatus_rekrut, r.jumlah as jml_stop, b.flag_peralihan, b.bekerja_edit, a.type_rekrut, a.tgl_bekerja, a.tgl_latihan, a.perner_norekrut, (select reason from m_reason where m_reason.kd_reason=a.kd_reason AND m_reason.kode_z=a.kd_rotasi) as nreason, b.nama_cust, '' as perner_ganti, (SELECT flagrfc FROM perner_newjo WHERE rincid=a.id AND perner=a.perner_norekrut) AS status_pernernewjo  ";  
		// $query .= "SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd,   ";
		$query .= "FROM trans_rincian a  ";
		// $query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id`  "; 
		$query .= "LEFT JOIN saparea e ON a.`lokasi` = e.value1  "; 
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` "; 
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		// $query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		$query .= "WHERE (b.approval IN (1,5) OR a.skema='1')  ";
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, a.skema, b.`project`, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '1' AS `jumlah`, a.nm_area AS lokasix, b.bekerja, '' AS atasan, a.nm_area as lokasi, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama as dnama, '' AS status_rekrut, '' AS ket_rekrut, g.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS skemax, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.deskripsi, a.ket_done as bket_done, '' as skilllayanan, b.type_replace, '' as kontrak, '' as waktu, a.lup, b.ket_atasan, b.ket_admin, b.ket_done, b.type_new, a.nm_persa, b.no_bak, '' as alev, '' as level_sap, '' as persa_sap, '' as skill_sap, '' as area_sap, '' as jabatan_sap, '' as skema_sap, '' as abkrs_sap, '' as jenis_pro_sap, '' as zparam, '' as detail_komp, a.lup_skema, b.lup_cancel_skema, b.type_replace as rekrutx, b.lup as blup, r.id AS id_hire, p.jml as jml_hire, a.userpm, (select nama from m_login where m_login.username=a.userpm) as nuserpm, a.rotasi_resign, b.lama, b.lup_edit, b.lupapp_atasan, a.lup_newrej, a.lup_edit as alup_edit, a.kunci_tgl_create, r.status_rekrut as rstatus_rekrut, r.jumlah as jml_stop, b.flag_peralihan, b.bekerja_edit, a.type_rep as type_rekrut, a.tglbekerja as tgl_bekerja, a.tgllatihan as tgl_latihan, '' as perner_norekrut, '' as nreason, b.nama_cust, a.perner_ganti, a.flagrfc as status_pernernewjo ";
		// $query .= "'' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd   ";
		$query .= "FROM trans_perner a  ";
		// $query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  "; 
		$query .= "LEFT JOIN saparea e ON a.`area` = e.value1  ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		// $query .= "WHERE b.approval = '5' and a.flag_app = 1 ";
		$query .= "WHERE (b.approval IN (1,5) OR a.skema='1') ";
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		if($cpro!=''){
			$query .= "AND (u.n_project like '%".$cpro."%' OR u.project like '%".$cpro."%') ";
		}
		if($clok!=''){
			$query .= "AND u.lokasi like '%".$clok."%' ";
		}
		if($cnoj!=''){
			$query .= "AND u.nojo like '%".$cnoj."%' ";
		}
		if($czpar!=''){
			$query .= "AND u.zparam like '%".$czpar."%' ";
		}
		if($ccreat!=''){
			$query .= "AND u.dnama like '%".$ccreat."%' ";
		}
		if($cnobak!=''){
			$query .= "AND u.no_bak like '%".$cnobak."%' ";
		}
		if($ctglcr!=''){
			$query .= "AND date_format(u.tanggal,'%m-%Y')='".$ctglcr."' "; 
		}
		if($ctglbk!=''){
			$query .= "AND date_format(u.bekerja,'%m-%Y')='".$ctglbk."' "; 
		}
		$query .= "HAVING id IS NOT NULL ";
		if($chire!=''){
			if($chire==0){
				$query .= "AND jml_hire IS NULL  ";
			} else {
				$query .= "AND jml_hire='$chire' ";
			}
		}
		
		if($cdone!=''){
			if($cdone==1){
				$query .= "AND (skema=1 OR skemax=1)  ";
			} else if($cdone==3){
				$query .= "AND (flag_cancel=1 OR flag_cancel_sap=1) ";
			} else if($cdone==2) {
				$query .= "AND (skema!=1 OR skemax!=1) AND (flag_cancel!=1 OR flag_cancel_sap!=1)  ";
			}
		}
		
		if($cpm!=''){
			$query .= "AND u.userpm='$cpm' ";
		}
		
		// $query .= "order by (u.skema=0 OR u.skema IS NULL OR u.skema='' OR u.skemax='') DESC, u.flag_cancel_sap ASC, u.nojo DESC ";
		// $query .= "ORDER BY (u.skema=0 OR u.skema IS NULL OR u.skema='') DESC, (u.flag_cancel_sap=0 OR u.flag_cancel_sap IS NULL OR u.flag_cancel_sap='') DESC, u.lup DESC  ";
		$query .= "ORDER BY (u.skema=0 OR u.skema IS NULL OR u.skema='') DESC, (u.flag_cancel_sap=0 OR u.flag_cancel_sap IS NULL OR u.flag_cancel_sap='') DESC, u.tanggal DESC  ";
		// $query .= "ORDER BY u.skema ASC, u.nojo DESC";
		
		// var_dump($query);
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function newget_transall_sap_2($length,$start,$search,$order,$dir,$parsearch){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		$type	 		= $session_data['type'];
		$level	 		= $session_data['level'];
		
		$chire       	= $parsearch['carhire'];
		$cdone       	= $parsearch['cardone'];
		$cpm	       	= $parsearch['carpm'];
		$cpro	       	= $parsearch['carpro'];
		$clok	       	= $parsearch['carlok'];
		$cnoj	       	= $parsearch['carnoj'];
		$czpar	       	= $parsearch['carzpar'];
		$ccreat	       	= $parsearch['carcreat'];
		$cnobak	       	= $parsearch['carnobak'];
		$ctglcr	       	= $parsearch['cartglcr'];
		$ctglbk	       	= $parsearch['cartglbek'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.dnama like '%".$search."%' OR u.zparam like '%".$search."%' OR u.n_project like '%".$search."%' ";
		}
		
		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.project, 
		u.level, u.`tanggal`, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.lokasix, u.`bekerja`, u.atasan, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.dnama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.skemax, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.deskripsi, u.bket_done, u.lokasi, u.skilllayanan, u.type_replace, u.kontrak, u.waktu, u.lup, u.ket_atasan, u.ket_admin, u.ket_done, u.type_new, u.nm_persa, u.no_bak, u.alev, u.level_sap, u.persa_sap, u.skill_sap, u.area_sap, u.jabatan_sap, u.skema_sap, u.abkrs_sap, u.jenis_pro_sap, u.zparam, u.detail_komp, u.lup_skema, u.lup_cancel_skema, u.rekrutx, u.blup, u.id_hire, u.jml_hire, u.userpm, u.nuserpm, u.rotasi_resign, u.lama, u.lup_edit, u.lupapp_atasan, u.lup_newrej, u.alup_edit, u.kunci_tgl_create, u.rstatus_rekrut, u.jml_stop, u.flag_peralihan, u.bekerja_edit, u.type_rekrut, u.tgl_bekerja, u.tgl_latihan, u.perner_norekrut, u.nreason, u.nama_cust, u.perner_ganti, u.status_pernernewjo, u.flag_done_pm, u.ket_done_pm, u.pilpks, u.dokpks, u.divisiid, u.rfc_rotasi "; 
		// $query .= "u.rekrut, u.hr, u.jmluser, u.training, u.note, u.upd,  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, d.level, b.tanggal, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi` as lokasix, b.`bekerja`, a.atasan, e.value2 as lokasi, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama as dnama, a.status_rekrut, a.ket_rekrut, g.nama AS ntype, a.pic_hi, b.n_project, b.skema AS skemax, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.deskripsi, a.ket_done as bket_done, a.skilllayanan, b.type_replace, a.kontrak, a.waktu, a.lup, b.ket_atasan, b.ket_admin, b.ket_done, b.type_new, '' as nm_persa, b.no_bak, a.level as alev, a.level_sap, a.persa_sap, a.skill_sap, a.area_sap, a.jabatan_sap, a.skema_sap, a.abkrs_sap, a.jenis_pro_sap, a.zparam, a.detail_komp, a.lup_skema, b.lup_cancel_skema, b.new_rekrut as rekrutx, b.lup as blup, r.id AS id_hire, p.jml as jml_hire, a.userpm, (select nama from m_login where m_login.username=a.userpm) as nuserpm, '' as rotasi_resign, b.lama, b.lup_edit, b.lupapp_atasan, a.lup_newrej, a.lup_edit as alup_edit, a.kunci_tgl_create, r.status_rekrut as rstatus_rekrut, r.jumlah as jml_stop, b.flag_peralihan, b.bekerja_edit, a.type_rekrut, a.tgl_bekerja, a.tgl_latihan, a.perner_norekrut, (select reason from m_reason where m_reason.kd_reason=a.kd_reason AND m_reason.kode_z=a.kd_rotasi) as nreason, b.nama_cust, '' as perner_ganti, (SELECT COUNT(1) FROM perner_newjo WHERE rincid=a.id AND flagrfc='6') AS status_pernernewjo, a.flag_done_pm, a.ket_done_pm, b.pilpks, b.dokpks, b.divisiid, '' as rfc_rotasi  ";  
		// $query .= "SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd,   ";
		$query .= "FROM trans_rincian a  ";
		// $query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id`  "; 
		$query .= "LEFT JOIN saparea e ON a.`lokasi` = e.value1  "; 
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` "; 
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		// $query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		if($type=='PM'){
			$query .= "WHERE a.skema='1' and a.userpm='$username'  ";
		} else if($type=='PPC' OR $type=='AVP' OR $type=='VP') {
			$query .= "WHERE (b.approval IN (1,5) OR a.skema='1')  ";
		}
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, a.skema, b.`project`, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '1' AS `jumlah`, a.nm_area AS lokasix, b.bekerja, '' AS atasan, a.nm_area as lokasi, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama as dnama, '' AS status_rekrut, '' AS ket_rekrut, g.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS skemax, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.deskripsi, a.ket_done as bket_done, '' as skilllayanan, b.type_replace, '' as kontrak, '' as waktu, a.lup, b.ket_atasan, b.ket_admin, b.ket_done, b.type_new, a.nm_persa, b.no_bak, '' as alev, '' as level_sap, '' as persa_sap, '' as skill_sap, '' as area_sap, '' as jabatan_sap, '' as skema_sap, '' as abkrs_sap, '' as jenis_pro_sap, '' as zparam, '' as detail_komp, a.lup_skema, b.lup_cancel_skema, b.type_replace as rekrutx, b.lup as blup, r.id AS id_hire, p.jml as jml_hire, a.userpm, (select nama from m_login where m_login.username=a.userpm) as nuserpm, a.rotasi_resign, b.lama, b.lup_edit, b.lupapp_atasan, a.lup_newrej, a.lup_edit as alup_edit, a.kunci_tgl_create, r.status_rekrut as rstatus_rekrut, r.jumlah as jml_stop, b.flag_peralihan, b.bekerja_edit, a.type_rep as type_rekrut, a.tglbekerja as tgl_bekerja, a.tgllatihan as tgl_latihan, '' as perner_norekrut, '' as nreason, b.nama_cust, a.perner_ganti, a.flagrfc as status_pernernewjo, a.flag_done_pm, a.ket_done_pm, b.pilpks, b.dokpks, b.divisiid, (select flagrfc from trans_perner_ganti Where nojo=a.nojo and perner_resrot=a.perner and perner_ganti=a.perner_ganti order by id asc limit 1) as rfc_rotasi ";
		// $query .= "'' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd   ";
		$query .= "FROM trans_perner a  ";
		// $query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  "; 
		$query .= "LEFT JOIN saparea e ON a.`area` = e.value1  ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		// $query .= "WHERE b.approval = '5' and a.flag_app = 1 ";
		if($type=='PM'){
			$query .= "WHERE a.skema='1' and a.userpm='$username' ";
		} else if($type=='PPC' OR $type=='AVP' OR $type=='VP') {
			$query .= "WHERE (b.approval IN (1,5) OR a.skema='1')  ";
		} 
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		if($cpro!=''){
			$query .= "AND (u.n_project like '%".$cpro."%' OR u.project like '%".$cpro."%') ";
		}
		if($clok!=''){
			$query .= "AND u.lokasi like '%".$clok."%' ";
		}
		if($cnoj!=''){
			$query .= "AND u.nojo like '%".$cnoj."%' ";
		}
		if($czpar!=''){
			$query .= "AND u.zparam like '%".$czpar."%' ";
		}
		if($ccreat!=''){
			$query .= "AND u.dnama like '%".$ccreat."%' ";
		}
		if($cnobak!=''){
			$query .= "AND u.no_bak like '%".$cnobak."%' ";
		}
		if($ctglcr!=''){
			$query .= "AND date_format(u.tanggal,'%m-%Y')='".$ctglcr."' "; 
		}
		if($ctglbk!=''){
			$query .= "AND date_format(u.bekerja,'%m-%Y')='".$ctglbk."' "; 
		}
		$query .= "HAVING id IS NOT NULL ";
		if($chire!=''){
			if($chire==0){
				$query .= "AND jml_hire IS NULL  ";
			} else {
				$query .= "AND jml_hire='$chire' ";
			}
		}
		
		if($level==5 and ($type=='PPC' OR $type=='AVP' OR $type=='VP') ){
			if($cdone!=''){
				if($cdone==1){
					$query .= "AND (skema=1 OR skemax=1)  ";
				} else if($cdone==3){
					$query .= "AND (flag_cancel=1 OR flag_cancel_sap=1) ";
				} else if($cdone==2) {
					$query .= "AND (skema!=1 OR skemax!=1) AND (flag_cancel!=1 OR flag_cancel_sap!=1)  ";
				}
			}
		} else if($level==5 and $type=='PM'){
			if($cdone!=''){
				if($cdone==1){
					$query .= "AND (flag_done_pm=1)  ";
				} else if($cdone==2) {
					$query .= "AND (flag_done_pm!=1 OR flag_done_pm is null)  ";
				}
			}
		}
		
		
		if($cpm!=''){
			$query .= "AND u.userpm='$cpm' ";
		}
		
		// $query .= "order by (u.skema=0 OR u.skema IS NULL OR u.skema='' OR u.skemax='') DESC, u.flag_cancel_sap ASC, u.nojo DESC ";
		// $query .= "ORDER BY (u.skema=0 OR u.skema IS NULL OR u.skema='') DESC, (u.flag_cancel_sap=0 OR u.flag_cancel_sap IS NULL OR u.flag_cancel_sap='') DESC, u.lup DESC  ";
		$query .= "ORDER BY (u.skema=0 OR u.skema IS NULL OR u.skema='') DESC, (u.flag_cancel_sap=0 OR u.flag_cancel_sap IS NULL OR u.flag_cancel_sap='') DESC, u.tanggal DESC  ";
		// $query .= "ORDER BY u.skema ASC, u.nojo DESC";
		
		// var_dump($query);
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function m_rejectjo_rrsap($njok, $keter, $pilpks, $flagstat){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$tglnow = date('Y-m-d H:i:s');
		
		$update	= array (
			'upd_cancel_rekrut' => $data['username'],
			'flag_cancel_sap'	=> $flagstat,
			'ket_cancel'  		=> $keter,
			'lup_cancel_skema'  => $tglnow,
			'pilpks'  			=> $pilpks
		);
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_jo', $update);
	}	
	
	function m_rejectjo_rrsap2($nid, $keter, $pilpks, $flagstat){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$tglnow = date('Y-m-d H:i:s');
		
		$update	= array (
			'flag_rej'  	=> $flagstat,
			'upd_rej' 		=> $data['username'],
			'lup_rej'  		=> $tglnow,
			'ket_rej_pm'  	=> $keter,
			'pilpks'  		=> $pilpks
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_perner', $update);
	}	
	
	function get_transall_pro($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= "WHERE a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' ";
		}
		
		$query = "SELECT a.*, b.project, b.n_project, c.item_name, d.nama  ";
		$query .= "FROM trans_proc a ";  
		$query .= "LEFT JOIN trans_jo b ON a.nojo=b.nojo ";  
		$query .= "LEFT JOIN m_item c ON a.item_id=c.item_id ";  	
		$query .= "LEFT JOIN m_login d ON a.upd=d.username ";  		
		$query .= "$where_clause ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function app_transall_pro($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= "AND a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' ";
		}
		
		$query = "SELECT a.*, b.project, b.n_project, c.item_name, d.nama  ";
		$query .= "FROM trans_proc a ";  
		$query .= "LEFT JOIN trans_jo b ON a.nojo=b.nojo ";  
		$query .= "LEFT JOIN m_item c ON a.item_id=c.item_id ";  	
		$query .= "LEFT JOIN m_login d ON a.upd=d.username ";  	
		$query .= "WHERE a.flag='1' "; 		
		$query .= "$where_clause ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	
	function get_transall_ops($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.project like '%".$search."%' OR a.n_project like '%".$search."%' OR b.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, a.project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema as skemax, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap, c.nama as ntype, d.nama as dnama, b.pic_hi, a.ket_done, a.n_project, f.name_job_function, e.city_name as lokasi, b.atasan, b.kontrak, b.waktu, b.jumlah, b.id, b.lokasi as lokasix, b.skema, b.jabatan, b.skilllayanan, b.skilllayanan_txt, b.ket_done as bket_done, '-' as tanggalx, b.persa_sap FROM trans_jo a ";
		//$query .= "INNER JOIN trans_doc u ON a.`nojo` = u.`nojo` ";  
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";  
		$query .= "LEFT JOIN m_type c ON a.`type_jo` = c.`id` ";  
		$query .= "LEFT JOIN m_login d ON a.`upd` = d.`username` ";  
		$query .= "LEFT JOIN mapping_city e ON b.`lokasi` = e.`city_id` "; 
		$query .= "LEFT JOIN job_function f ON b.`jabatan` = f.`id` "; 
		//$query .= "WHERE approval_admin = 1 "; 
		// $query .= "WHERE approval = 5 and b.flag_app = 1 AND (b.skema='1' OR a.skema='1') and (a.type_jo='1' and a.type_new='1') AND (persa_sap IS NOT NULL AND persa_sap!='') "; 
		$query .= "WHERE (approval = 5 OR approval=1) AND (b.skema='1' OR a.skema='1') and (a.type_jo='1' and a.type_new='1') AND (persa_sap IS NOT NULL AND persa_sap!='') "; 
		$query .= "$where_clause ";
		// $query .= "GROUP BY a.nojo, b.persa_sap ORDER BY (b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.nojo DESC ";
		$query .= "GROUP BY a.nojo, b.persa_sap ORDER BY a.nojo DESC ";
		// var_dump($query);exit();
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	
	function get_transall_legal($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.project like '%".$search."%' OR a.n_project like '%".$search."%' OR b.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, komponen_bak, a.nojo, tanggal, a.project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema as skemax, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap, c.nama as ntype, d.nama as dnama, b.pic_hi, a.ket_done, a.n_project, f.name_job_function, e.city_name as lokasi, b.atasan, b.kontrak, b.waktu, b.jumlah, b.id, b.lokasi as lokasix, b.skema, b.jabatan, b.skilllayanan, b.skilllayanan_txt, b.ket_done as bket_done, '-' as tanggalx, (SELECT count(1) FROM trans_pks WHERE trans_pks.nojo=a.nojo ) as jml_pks, u.filename, u.pks_cli, u.pks_ish, u.judul_pks, u.nilai_kontrak_pks, b.persa_sap FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";  
		$query .= "LEFT JOIN m_type c ON a.`type_jo` = c.`id` ";  
		$query .= "LEFT JOIN m_login d ON a.`upd` = d.`username` ";  
		$query .= "LEFT JOIN mapping_city e ON b.`lokasi` = e.`city_id` "; 
		$query .= "LEFT JOIN job_function f ON b.`jabatan` = f.`id` "; 
		$query .= "LEFT JOIN trans_pks u ON b.`nojo` = u.`nojo` "; 
		//$query .= "WHERE approval_admin = 1 "; 
		$query .= "WHERE (approval = 1 or approval='5') and b.flag_app = 1 and (b.skema='1' OR a.skema='1') and (a.type_jo='1' and a.type_new='1') "; 
		$query .= "$where_clause ";
		$query .= "GROUP BY a.nojo, b.persa_sap ORDER BY (b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	
	
	function app_transall_ops($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= "and u.nojo like '%".$search."%' OR u.project like '%".$search."%' OR u.n_project like '%".$search."%' ";
		}
		
		$query = "SELECT u.nojo, u.tanggal as tanggalx, u.project, u.n_project, u.dnama ";
		$query .= "FROM ( ";  
		$query .= "SELECT a.nojo, a.tanggal, c.project, c.n_project, c.upd as dnama ";  
		$query .= "FROM trans_ops a "; 
		$query .= "LEFT JOIN trans_jo c ON a.nojo=c.nojo "; 
		$query .= "UNION ";
		$query .= "SELECT b.nojo, b.tanggal, d.project, d.`n_project`, d.upd as dnama "; 		
		$query .= "FROM trans_fin b  ";
		$query .= "LEFT JOIN trans_jo d ON b.nojo=d.nojo ";
		$query .= ") u ";
		$query .= "WHERE u.nojo!='' ";
		$query .= "$where_clause" ;
		$query .= "GROUP BY u.nojo, u.tanggal ";
		$query .= "ORDER BY u.nojo ASC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function get_transall_tax($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.project like '%".$search."%' OR a.n_project like '%".$search."%' OR b.lokasi like '%".$search."%' ";
		}
		
		$query = "SELECT a.nojo, a.lama, a.no_bak, b.persa_sap, b.abkrs_sap, u.pks_ish, u.tgl_kontrak, c.nama_perusahaan, b.n_pic_hi, u.nilai_kontrak_pks FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";  
		$query .= "LEFT JOIN trans_doc_lengkap c ON a.`nojo` = c.`id` ";  
		$query .= "LEFT JOIN trans_pks u ON b.`nojo` = u.`nojo` "; 
		//$query .= "WHERE approval_admin = 1 "; 
		$query .= "WHERE approval = 1 and b.flag_app = 1 and (b.skema='1' OR a.skema='1') and (a.type_jo='1' and a.type_new='1') AND (persa_sap IS NOT NULL AND persa_sap!='') "; 
		$query .= "$where_clause ";
		$query .= "GROUP BY a.nojo, b.persa_sap ORDER BY (b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		//var_dump($query);exit();
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	
	function get_transall_fin($length,$start,$search,$order,$dir){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.project like '%".$search."%' OR a.n_project like '%".$search."%' OR b.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, a.project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema as skemax, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap, c.nama as ntype, d.nama as dnama, b.pic_hi, a.ket_done, a.n_project, f.name_job_function, e.city_name as lokasi, b.atasan, b.kontrak, b.waktu, b.jumlah, b.id, b.lokasi as lokasix, b.skema, b.jabatan, b.skilllayanan, b.skilllayanan_txt, b.ket_done as bket_done, '-' as tanggalx FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";  
		$query .= "LEFT JOIN m_type c ON a.`type_jo` = c.`id` ";  
		$query .= "LEFT JOIN m_login d ON a.`upd` = d.`username` ";  
		$query .= "LEFT JOIN mapping_city e ON b.`lokasi` = e.`city_id` "; 
		$query .= "LEFT JOIN job_function f ON b.`jabatan` = f.`id` "; 
		//$query .= "WHERE approval_admin = 1 "; 
		$query .= "WHERE approval = 1 and b.flag_app = 1 and b.skema='1' and (a.type_jo='1' and a.type_new='1') "; 
		$query .= "$where_clause ";
		$query .= "GROUP BY a.nojo ORDER BY (b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function get_josap($search){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema as skemax, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap, c.nama as ntype, d.nama as dnama, a.n_project, a.ket_done, a.n_project, f.name_job_function as jabatan, e.city_name as lokasi, b.atasan, b.kontrak, b.waktu, b.jumlah, b.id, b.lokasi as lokasix, b.skema FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN m_type c ON a.`type_jo` = c.`id` ";
		$query .= "LEFT JOIN m_login d ON a.`upd` = d.`username` ";
		$query .= "LEFT JOIN mapping_city e ON b.`lokasi` = e.`city_id` "; 
		$query .= "LEFT JOIN job_function f ON b.`jabatan` = f.`id` "; 
		$query .= "WHERE approval = 1 and b.flag_app = 1 and (a.project like '%$search%' OR a.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "order by(b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.nojo DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function xget_josap($search, $level, $type){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_done,  ";
		$query .= "(select value2 from saparea where saparea.value1=a.area) as new_narea, ";
		$query .= "(select value2 from sappersonalarea where sappersonalarea.value1=a.perar) as new_nperar ";
		$query .= "FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		if($level==5 and $type=='PPC'){
			$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') and variabel is null and (a.nojo like '%$search%' OR b.nama like '%$search%' OR a.n_perar like '%$search%') ";
		} else if($level==5 and $type=='PM'){
			$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') and variabel is null and (a.nojo like '%$search%' OR b.nama like '%$search%' OR a.n_perar like '%$search%') ";
		}
		
		$query .= "GROUP BY a.nojo ";
		$query .= "ORDER BY (a.flag_skema=0 OR a.flag_skema IS NULL) DESC, (a.flag_cancel_sap=0 OR a.flag_cancel_sap IS NULL OR a.flag_cancel_sap='') DESC, a.lup DESC ";
		
		$Q		= $this->db->query($query);
		$data 	= $Q->result_array();
		
		return $data;		
	}
	
	
	function reportexcel_skm(){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_done, a.tgl_input, a.lupapp_skema, ";
		$query .= "(select nama from m_login where m_login.username=a.upd_skema) as npm, ";
		$query .= "(select value2 from saparea where saparea.value1=a.area) as new_narea, ";
		$query .= "(select value2 from sappersonalarea where sappersonalarea.value1=a.perar) as new_nperar ";
		$query .= "FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') and variabel is null ";
		$query .= "GROUP BY a.nojo ";
		$query .= "ORDER BY (a.flag_skema=0 OR a.flag_skema IS NULL) DESC, (a.flag_cancel_sap=0 OR a.flag_cancel_sap IS NULL OR a.flag_cancel_sap='') DESC, a.lup DESC ";
		
		$Q		= $this->db->query($query);
		$data 	= $Q->result_array();
		
		return $data;		
	}
	
	/*
	function get_josap($search){
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, b.lup, b.syarat, b.deskripsi, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "WHERE b.approval = 1 and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY b.nojo ORDER BY a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	*/
	
	
	function get_dashboard_cancel(){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "WHERE approval_admin = 1 and (flag_cancel = 1 or flag_cancel_sap = 1) ";
		$query .= "GROUP BY nojo ";
		$query .= "order by nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_dashboard_cancel_search($search){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "WHERE approval_admin = 1 and (flag_cancel = 1 or flag_cancel_sap = 1) and (a.nojo like '%$search%' or a.project like '%$search%' or a.upd like '%$search%') ";
		$query .= "GROUP BY nojo ";
		$query .= "order by nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_dashboard_newjo(){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		//$query .= "WHERE approval_admin = 1 and (flag_cancel = 1 or flag_cancel_sap = 1) ";
		$query .= "GROUP BY nojo ";
		$query .= "order by nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_dashboard_newjo_search($search){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "WHERE a.nojo like '%$search%' or a.project like '%$search%' or a.upd like '%$search%' ";
		$query .= "GROUP BY nojo ";
		$query .= "order by nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_dashboard_ontime(){
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		//$query .= "WHERE b.approval_admin = 1 ";
		//$query .= "WHERE b.approval_admin = 1 AND DATEDIFF(b.latihan,CURRENT_DATE()) < '0' AND ( a.jumlah=(SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=a.`id`) OR a.jumlah < (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=a.`id`) ) ";
		$query .= "WHERE b.approval_admin = 1 AND DATEDIFF(b.latihan,CURRENT_DATE()) < '0' AND a.jumlah<=(SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=a.`id`) ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_dashboard_over(){
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		//$query .= "WHERE b.approval_admin = 1 ";
		$query .= "WHERE b.approval_admin = 1 AND DATEDIFF(b.latihan,CURRENT_DATE()) < '0' AND ( a.jumlah > (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=a.`id`) OR c.jml_pkwt IS NULL ) ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_insertjo(){
		$query = "SELECT MAX(nojo) as nojob FROM trans_jo";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() <= 0){
			$nojo = 0;
		} else {
			$row = $Q->row_array();
			$nor = substr($row['nojob'],0,6);
			$nojo = $nor;
		}
		return $nojo;
	}
	
	
	function get_insertjosk(){
		$query = "SELECT MAX(nojo) as nojob FROM trans_skema";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() <= 0){
			$nojo = 0;
		} else {
			$row = $Q->row_array();
			$nor = substr($row['nojob'],0,6);
			$nojo = $nor;
		}
		return $nojo;
	}
	
	
	function get_insertjoz(){
		$query = "SELECT MAX(nojo) as nojob FROM trans_jo";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() <= 0){
			$nojoz = 0;
		} else {
			$row = $Q->row_array();
			$nor = substr($row['nojob'],0,6);
			$nojoz = $nor;
		}
		return $nojoz;
	}
	
	function get_jabatan(){
		$query = "SELECT * FROM m_jabatan WHERE status = '1'";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}

	function get_tgg(){
		$query = "SELECT jabatan FROM m_jabatan WHERE tggjawab = '1' ORDER BY jabatan";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	public function getSkill($id){
		$dbpostgre = $this->load->database('db_second',TRUE);
    	$this->db->where('id',$id);
    	return $this->db->get('skill')->row();
		$dbpostgre = $this->load->database('db_second',FALSE);
    }
	
	public function getBenefit($id){
		$dbpostgre = $this->load->database('db_second',TRUE);
    	$this->db->where('id',$id);
    	return $this->db->get('benefits')->row();
		$dbpostgre = $this->load->database('db_second',FALSE);
    }
	
	public function addBenefit($data){
		$dbpostgre = $this->load->database('db_second',TRUE);
        $this->db->where('lower(name_benefits)', strtolower($data['name_benefits']));
        $cek = $this->db->get('benefits')->result();

        if(count($cek) == 0){
            $this->db->insert('benefits', $data);
            
            $inserted = $this->db->insert_id();

            $this->db->where('id',$inserted);
            return $this->db->get('benefits')->row();
        }else{
            $this->db->where('name_benefits',$data['name_benefits']);
            return $this->db->get('benefits')->row();            
        }
		$dbpostgre = $this->load->database('db_second',FALSE);
    }
	
	public function addSkill($data){
		$dbpostgre = $this->load->database('db_second',TRUE);
        $this->db->where('lower(skill_name)', strtolower($data['skill_name']));
        $cek = $this->db->get('skill')->result();

        if(count($cek) == 0){
            $this->db->insert('skill', $data);
            
            $inserted = $this->db->insert_id();

            $this->db->where('id',$inserted);
            return $this->db->get('skill')->row();
        }else{
            $this->db->where('skill_name',$data['skill_name']);
            return $this->db->get('skill')->row();            
        }
		$dbpostgre = $this->load->database('db_second',FALSE);
    }
	
	function get_level_name(){
		// $this->db2 = $this->load->database('db_second',TRUE);
		$query = "SELECT value1 as id, value2 as job_name_level FROM saplevel";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	public function getSkills(){
		$this->db2 = $this->load->database('db_second',TRUE);
        $this->db2->order_by('skill_name');
        return $this->db2->get('skill');
    }
	
	public function getBenefits(){
		$this->db2 = $this->load->database('db_second',TRUE);
        $this->db2->order_by('name_benefits');
        return $this->db2->get('benefits');
    }
	
	public function getEmploymentTypes(){
		$this->db2 = $this->load->database('db_second',TRUE);
        return $this->db2->get('employment_type');
    }
	
	function simpan_media($item){
		//$this->db2->database('db_second',TRUE);
		$this->db2 = $this->load->database('db_second',TRUE);
		$this->db2->insert('company_jobs',$item);
		$this->load->database('db_second',FALSE);
	}
	
	function simpan_mediax($item){
		$this->db2 = $this->load->database('db_second',TRUE);
		$this->db2->insert('company_jobs',$item);
	}
	
	public function take_lok($kode_province){		
		$data = array();
		//$dbpostgre = $this->load->database('db_second',TRUE);
		$query	= "select a.city_id, a.city_name from mapping_city a where a.province_id='$kode_province' AND city_id NOT IN('I595','I652') order by a.city_name ";		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	public function take_jab($kode_kategori){		
		$data = array();
		//$dbpostgre = $this->load->database('db_second',TRUE);
		$query	= "select id,name_job_function from job_function where function_category='$kode_kategori' order by name_job_function";		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	function get_province(){
		//$dbpostgre = $this->load->database('db_second',TRUE);
		$query = "SELECT id,name_province FROM province ORDER BY name_province";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_kategori(){
		//$dbpostgre = $this->load->database('db_second',TRUE);
		$query = "SELECT id,name_job_function_category FROM job_function_category ORDER BY name_job_function_category";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_lokasi(){
		$query = "SELECT id,kota,area FROM m_lokasi WHERE status = '1' ORDER BY kota,area";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		 
	}

	function get_pendidikan(){
		$query = "SELECT id,pendidikan FROM m_pendidikan WHERE status = '1' ORDER BY pendidikan";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_kontrak(){
		$query = "SELECT id,jenis FROM m_kontrak WHERE status = '1' ORDER BY jenis";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_jpkwt($kontrak){
		$query  = "SELECT id,nama FROM m_pkwt ";
		$query .= "WHERE status = '1' ";
		if($kontrak!=''){
			if($kontrak==1 || $kontrak==6){
				$query .= "AND pembeda = 'PKWT' ";
			} else if($kontrak==4){
				$query .= "AND pembeda = 'PARTTIME' ";
			} else if($kontrak==5){
				$query .= "AND pembeda = 'THL' ";
			}
		}
		$query .= "ORDER BY id";
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		return $data;		
	}
	 
	
	function take_kompon($id_kon){
		if($id_kon==6){
			$kontzx = 1;
		} else {
			$kontzx = $id_kon;
		}
		$data	= array();
		$query 	= "SELECT id, kode, nama as komponen FROM komponen WHERE status_kontrak='$kontzx' and jenis='4' order by komponen ASC ";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	function take_kompon_variabel($id_kon){
		if($id_kon==6){
			$kontzx = 1;
		} else {
			$kontzx = $id_kon;
		}
		$data	= array();
		$query 	= "SELECT id, kode, nama as komponen FROM komponen WHERE status_kontrak='$kontzx' and jenis='2' order by komponen ASC ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function take_kompon_benefit($id_kon){
		if($id_kon==6){
			$kontzx = 1;
		} else {
			$kontzx = $id_kon;
		}
		$data	= array();
		$query 	= "SELECT id, kode, nama as komponen FROM komponen WHERE status_kontrak='$kontzx' and (jenis='1' or jenis='3') order by komponen ASC ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function pros_file_g($noj){
		$data	= array();
		$query 	= "SELECT * FROM trans_doc_lengkap WHERE nojo='$noj' ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}

	function inserttransjo($item){
		$this->db->insert('trans_jo',$item);
	}
 
	function inserttransrincian($iteml){
		$this->db->insert('trans_rincian',$iteml);
		//$this->db->last_query();
	}

	function insert_file($putih){
		$this->db->insert('trans_upload',$putih);
	}
	
	function detailjo($onjo){
		$data		= array();
		$query	= "SELECT Replace(a.komponen, ' ', '_') as komponen, komponen_bak, komponen_other, a.nojo, a.tanggal, a.project, a.syarat, a.deskripsi, a.lama, a.latihan, a.bekerja  ";
		$query	.= "FROM trans_jo a WHERE a.nojo = '$onjo' ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data = $row;
			}
		}
		return $data;		
	}	
	
	
	function detail_emplo($aid, $bid){
		$data		= array();
		$query	= "Select GROUP_CONCAT(judul SEPARATOR ';') AS judul, GROUP_CONCAT(id SEPARATOR ';') AS id, GROUP_CONCAT(deskripsi SEPARATOR ';') AS deskripsi, ";
		$query	.= "(SELECT COUNT(1) FROM m_proses_hr) AS jml ";
		$query	.= "FROM m_proses_hr a ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}	
	
	
	function detail_file_leg($tgl, $docid, $noj){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_id, a.doc_name, a.nama_file, a.source_data, (SELECT filename FROM trans_pks WHERE trans_pks.`docid`=a.doc_id AND trans_pks.docid='$a' AND nojo='$noj') AS filename ";
			$query .= "From m_doc a  ";
			//$query .= "LEFT JOIN trans_pks b ON a.doc_id=b.docid  ";
			$query .= "Where doc_id='$a' and access='1' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	function detail_file_ops($tgl, $docid, $noj){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_id, a.doc_name, a.nama_file, a.source_data, (SELECT filename FROM file_trans_ops e LEFT JOIN trans_ops f ON e.id_ops=f.id WHERE a.doc_id=e.id_doc AND a.doc_id='$a' AND f.nojo='$noj' AND tanggal='$tgl') AS filename  ";
			$query .= "From m_doc a  ";
			//$query .= "LEFT JOIN file_trans_ops b ON a.doc_id=b.id_doc  ";
			//$query .= "LEFT JOIN trans_ops c ON b.id_ops=c.id ";
			$query .= "Where doc_id='$a' and access='3' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	
	function detail_file_opsX($docid, $noj){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_id, a.doc_name, a.nama_file, a.source_data, (SELECT filename FROM file_trans_ops e LEFT JOIN trans_ops f ON e.id_ops=f.id WHERE a.doc_id=e.id_doc AND a.doc_id='$a' AND f.nojo='$noj' ) AS filename  ";
			$query .= "From m_doc a  ";
			//$query .= "LEFT JOIN file_trans_ops b ON a.doc_id=b.id_doc  ";
			//$query .= "LEFT JOIN trans_ops c ON b.id_ops=c.id ";
			$query .= "Where doc_id='$a' and access='3' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	function detail_file_fin($tgl, $docid, $noj){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_id, a.doc_name, a.nama_file, a.source_data, (SELECT filename FROM file_trans_fin e LEFT JOIN trans_fin f ON e.id_fin=f.id WHERE a.doc_id=e.id_doc AND a.doc_id='$a' AND f.nojo='$noj' AND tanggal='$tgl') AS filename ";
			$query .= "From m_doc a  ";
			//$query .= "LEFT JOIN file_trans_fin b ON a.doc_id=b.id_doc  ";
			//$query .= "LEFT JOIN trans_fin c ON b.id_fin=c.id and c.nojo='$noj' ";
			$query .= "Where doc_id='$a' AND access='4' ";
			//$query .= "Group By b.id_fin ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	function detail_file($tgl, $docid, $noj){
		/*
		$data		= array();
		$query	= "Select a.* ";
		$query	.= "FROM trans_ops a ";
		$query	.= "LEFT JOIN file_trans_ops b ON a.id=b.id_ops ";
		$query	.= "WHERE a.id='$aid'  ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
		*/
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_id, a.doc_name, a.nama_file, b.filename, a.source_data ";
			$query .= "From m_doc a  ";
			$query .= "LEFT JOIN file_trans_ops b ON a.doc_id=b.id_doc  ";
			$query .= "Where doc_id='$a' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	function detail_file_b($kid, $noj, $docid){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_name, a.nama_file, a.doc_id, a.source_data ";
			$query .= "From m_doc a  ";
			$query .= "Where doc_id='$a' and access='3' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	function detail_file_c($kid, $noj, $docid){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_name, a.nama_file, a.doc_id, a.source_data, (SELECT filename FROM trans_pks WHERE trans_pks.`docid`=a.doc_id AND trans_pks.`nojo`='$noj') AS filename  ";
			$query .= "From m_doc a  ";
			$query .= "Where doc_id='$a' and access='1'  ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	function detail_file_d($kid, $noj, $docid){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_name, a.nama_file, a.doc_id, a.source_data ";
			$query .= "From m_doc a  ";
			$query .= "Where doc_id='$a' and access='4' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	function detail_file_f($kid, $noj, $docid){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_name, a.nama_file, a.doc_id, a.source_data ";
			$query .= "From m_doc a  ";
			$query .= "Where doc_id='$a' and access='4' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	
	function detail_emplo_train($aid, $bid){
		$data		= array();
		$query	= "Select * ";
		$query	.= "FROM detail_trans_training a WHERE a.user_id = '$aid' and id_rincian='$bid' ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}	
	
	function detail_isian_emplo($aid, $bid){
		$data		= array();
		$query	= "SELECT * ";
		$query	.= "FROM detail_trans_hr a WHERE a.user_id = '$aid' and id_rincian='$bid' ";
		//$query	.= "FROM m_proses_hr a ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}	
	
	
	function detkar($nojx){
		$data		= array();
		$query	= "SELECT c.name_job_function AS jabatan, jumlah, b.city_name, a.jabatan_sap_nm ";
		$query	.= "FROM trans_rincian a ";
		$query	.= "LEFT JOIN mapping_city b ON a.lokasi=b.city_id ";
		$query	.= "LEFT JOIN job_function c ON a.jabatan=c.id ";
		$query	.= "WHERE LEFT(nojo,6)='$nojx' ";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}	
	
	
	function detpek($nojx){
		$ccc = $this->db->query("Select area_sap, persa_sap, jabatan_sap_nm from trans_rincian where LEFT(nojo,6)='$nojx' ")->result();
		
		$this->db3 = $this->load->database('db_third',TRUE);
		$data			= array();
		//$docid = explode( ';', $docid);
		//for ($i = 0; $i < sizeof($docid); $i++) {
		foreach($ccc as $key => $list){	
			$a = $list->area_sap;
			$b = $list->persa_sap;
			$c = $list->jabatan_sap_nm;
					
			$query = "SELECT pernr, cname, platx, btrtx ";
			$query .= "From sapprofile1  ";
			$query .= "Where btrtl='$a' and werks='$b' and platx='$c' ";
			
			$Q		= $this->db3->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}			
		}
		
		//var_dump($ccc);exit();
		return $data;		
	}	
	
	
	
	function detail_isian_emplo_user($aid, $bid){
		$data		= array();
		$query	= "SELECT * ";
		$query	.= "FROM detail_trans_user a WHERE a.user_id = '$aid' and id_rincian='$bid' ";
		//$query	.= "FROM m_proses_hr a ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}	
	

	function detkom($noj, $jab, $lok, $llv, $lsl, $dkp){
		$data			= array();
		$query = "SELECT a.*, c.id as blvl, c.level as blvl_txt, b.skilllayanan, b.skilllayanan_txt FROM trans_komponen a  ";
		$query .= "LEFT JOIN trans_rincian b ON a.nojo=b.nojo and a.jabatan=b.jabatan and a.area=b.lokasi and a.level=b.level and a.skill=b.skilllayanan ";
		$query .= "LEFT JOIN m_level_skema c ON b.level=c.id ";
		$query .= "WHERE a.nojo = '$noj' and a.area = '$lok' and a.jabatan='$jab' and a.level='$llv' and a.skill='$lsl'  ";
		if( ($dkp!=null) and ($dkp!='') and ($dkp!='0') ) {
			$query .= "AND a.detail_komp='$dkp' ";
		}
		// var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	
	function get_mgm(){
		$data			= array();
		$query = "SELECT * FROM m_gm ";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	
	function detail_komp($anojo, $alokasi, $ajabatan, $alevel, $askill, $adekomp){
		$data			= array();
		$query = "SELECT a.*, c.id as blvl, c.level as blvl_txt, b.skilllayanan, b.skilllayanan_txt FROM trans_komponen a LEFT JOIN trans_rincian b ON a.nojo=b.nojo and a.jabatan=b.jabatan and a.area=b.lokasi AND a.level=b.level ";
		$query .= "LEFT JOIN m_level_skema c ON b.level=c.id ";
		$query .= "WHERE a.nojo = '$anojo' and a.area = '$alokasi' and a.jabatan='$ajabatan' and (a.level='$alevel' OR a.level is null) and a.skill='$askill' ";
		if( ($adekomp!=null) and ($adekomp!='') and ($adekomp!='0') ){
			$query .= "AND a.detail_komp='$adekomp' ";
		} else {
			$query .= "AND (a.detail_komp='0' or a.detail_komp is null) ";
		}
		$query .= "GROUP BY a.komponen ";
		// var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function trajo($username, $njo){
		$data		= array();
		$query	= "SELECT a.id, a.nojo, a.jabatan, a.gender, a.pendidikan, a.lokasi, a.atasan, a.kontrak, a.jenis_pkwt, a.waktu, a.jumlah, b.komponen, c.name_job_function, d.city_name, a.flag_app, e.nama as enama, a.level, a.skilllayanan, a.detail_komp, b.latihan, b.bekerja, b.new_rekrut, b.perner_norekrut, a.tgl_latihan, a.tgl_bekerja, a.perner_norekrut as aperner_norekrut, a.type_rekrut ";
		$query	.= "FROM trans_rincian a ";
		$query	.= "Inner Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join job_function c ON a.jabatan=c.id ";
		$query	.= "LEFT Join mapping_city d ON a.lokasi=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		//$query	.= "WHERE (a.skema=1 OR b.skema=1) AND a.nojo = '$njo' AND d.manar2 IN ($username) ";
		$query	.= "WHERE a.nojo = '$njo'  ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	function trajo_2($username, $njo){
		$data		= array();
		$query	= "SELECT a.id, a.nojo, a.jabatan, a.gender, a.pendidikan, a.lokasi, a.atasan, a.kontrak, a.jenis_pkwt, a.waktu, a.jumlah, b.komponen, c.name_job_function, d.city_name, a.flag_app, e.nama as enama, a.detail_komp, b.latihan, b.bekerja, b.new_rekrut, b.perner_norekrut, a.tgl_latihan, a.tgl_bekerja, a.perner_norekrut as aperner_norekrut, a.type_rekrut ";
		$query	.= "FROM trans_rincian a ";
		$query	.= "Inner Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join job_function c ON a.jabatan=c.id ";
		$query	.= "LEFT Join mapping_city d ON a.lokasi=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		//$query	.= "WHERE (a.skema=1 OR b.skema=1) AND a.nojo = '$njo' AND d.manar='$username' ";
		$query	.= "WHERE a.nojo = '$njo' AND d.manar='$username' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	
	function trajo_id($username, $nid){
		$data		= array();
		$query	= "SELECT a.id, a.nojo, a.jabatan, a.gender, a.pendidikan, a.lokasi, a.atasan, a.kontrak, a.jenis_pkwt, a.waktu, a.jumlah, b.komponen, c.name_job_function, d.city_name, a.flag_app, e.nama as enama, a.level, a.skilllayanan, a.detail_komp, a.tgl_latihan, a.tgl_bekerja, a.type_rekrut, b.new_rekrut, b.latihan, b.bekerja, a.perner_norekrut as aperner_norekrut, b.perner_norekrut ";
		$query	.= "FROM trans_rincian a ";
		$query	.= "Inner Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join job_function c ON a.jabatan=c.id ";
		$query	.= "LEFT Join mapping_city d ON a.lokasi=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		//$query	.= "WHERE (a.skema=1 OR b.skema=1) AND a.nojo = '$njo' AND d.manar2 IN ($username) ";
		$query	.= "WHERE a.id = '$nid'  ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	function trajo_2_id($username, $nid){
		$data		= array();
		$query	= "SELECT a.id, a.nojo, a.jabatan, a.gender, a.pendidikan, a.lokasi, a.atasan, a.kontrak, a.jenis_pkwt, a.waktu, a.jumlah, b.komponen, c.name_job_function, d.city_name, a.flag_app, e.nama as enama, a.level, a.skilllayanan, a.detail_komp, a.tgl_latihan, a.tgl_bekerja, a.type_rekrut, b.new_rekrut, b.latihan, b.bekerja, a.perner_norekrut as aperner_norekrut, b.perner_norekrut ";
		$query	.= "FROM trans_rincian a ";
		$query	.= "Inner Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join job_function c ON a.jabatan=c.id ";
		$query	.= "LEFT Join mapping_city d ON a.lokasi=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		//$query	.= "WHERE (a.skema=1 OR b.skema=1) AND a.nojo = '$njo' AND d.manar='$username' ";
		$query	.= "WHERE a.id = '$nid' AND d.manar='$username' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function det_per($username, $njo, $layanan, $jabatan){
		$data		= array();
		$query	= "SELECT a.*, b.*, d.city_name, e.nama as enamax, (select nama from m_login where jabatan='$jabatan' and layanan='$layanan' and level='2' limit 1) as enama, ";
		$query	.= "(select nama from m_login where m_login.username=d.manar) as emanar ";
		$query	.= "FROM trans_perner a ";
		$query	.= "LEFT Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join mapping_city d ON a.area=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		//$query	.= "WHERE (a.skema=1 OR b.skema=1) AND a.nojo = '$njo' AND d.manar2 IN ($username) ";
		$query	.= "WHERE a.nojo = '$njo'  ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	function det_per_2($username, $njo){
		$data		= array();
		$query	= "SELECT a.*, b.*, d.city_name, e.nama as enamax, (select nama from m_login where jabatan='$jabatan' and layanan='$layanan' and level='2' limit 1) as enama, ";
		$query	.= "(select nama from m_login where m_login.username=d.manar) as emanar ";
		$query	.= "FROM trans_perner a ";
		$query	.= "LEFT Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join mapping_city d ON a.area=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		//$query	.= "WHERE (a.skema=1 OR b.skema=1) AND a.nojo = '$njo' AND d.manar='$username' ";
		$query	.= "WHERE a.nojo = '$njo' AND d.manar='$username' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	
	function det_per_id($username, $nid){
		$data		= array();
		$query	 = "SELECT a.*, b.*, d.city_name, e.nama as enama ";
		$query	.= "FROM trans_perner a ";
		$query	.= "LEFT Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join mapping_city d ON a.area=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		//$query	.= "WHERE (a.skema=1 OR b.skema=1) AND a.nojo = '$njo' AND d.manar2 IN ($username) ";
		$query	.= "WHERE a.id = '$nid'  ";
		// var_dump($query);die;
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	function det_per_2_id($username, $nid){
		$data		= array();
		$query	= "SELECT a.*, b.*, d.city_name, e.nama as enama ";
		$query	.= "FROM trans_perner a ";
		$query	.= "LEFT Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join mapping_city d ON a.area=d.city_id ";
		$query	.= "LEFT Join m_login e ON d.manar=e.username ";
		//$query	.= "WHERE (a.skema=1 OR b.skema=1) AND a.nojo = '$njo' AND d.manar='$username' ";
		$query	.= "WHERE a.id = '$nid' AND d.manar='$username' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	
	function xtrajo($njo){
		$data		= array();
		$query	= "SELECT a.n_area, a.n_perar, a.*, ";
		$query .= "(select value2 from saparea where saparea.value1=a.area) as new_narea, ";
		$query .= "(select value2 from sappersonalarea where sappersonalarea.value1=a.perar) as new_nperar ";
		$query	.= "FROM trans_skema a ";
		$query	.= "WHERE a.nojo = '$njo' ";
		// var_dump($query);die;
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	function trojan($zid){
		$data		= array();
		$query	= "SELECT b.nama, a.upd, a.lup, jml_user, jml_hr, jml_pkwt  ";
		$query	.= "FROM trans_req a ";
		$query	.= "Left Join m_login b ON a.upd=b.username ";
		$query	.= "WHERE a.nojo = '$zid' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	
	function ztrajo($njo){
		$data		= array();
		$query	= "SELECT a.komponen, a.komponen_bak, a.komponen_other ";
		$query	.= "FROM trans_jo a ";
		$query	.= "WHERE a.nojo = '$njo' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	function zproc($njo){
		$data		= array();
		$query	= "SELECT a.*, b.item_name ";
		$query	.= "FROM trans_proc a ";
		$query	.= "LEFT JOIN m_item b ON a.item_id=b.item_id ";
		$query	.= "WHERE a.nojo = '$njo' ";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	function zproc_edit($njo){
		$data		= array();
		$query	= "SELECT a.*, b.item_name ";
		$query	.= "FROM trans_proc a ";
		$query	.= "LEFT JOIN m_item b ON a.item_id=b.item_id ";
		$query	.= "WHERE LEFT(a.nojo,6)='$njo' ";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	
	
	
	function simpanjo_skip($njok){
		$update	= array (
			'approval_admin' => 1
		);
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_jo', $update);
	}	
	

	function inssimpantjo($njok, $keter, $tjo, $trep, $tjen){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 			= $session_data['username'];
		
		//var_dump($njok);var_dump($keter);var_dump($tjo);var_dump($trep);exit(); 
		//var_dump($tjen);exit();
		if($tjo==2)
		{
			if($trep==1)
			{
				$update	= array (
					'approval' => 1,
					'approval_admin' => 1,
					'ket_atasan' => $keter,
					'upd_atasan' => $data['username'],
					'lupapp_atasan' => date("Y-m-d H:i:s")	
				);
				
				$this->db->where('nojo',$njok);
				$this->db->update('trans_jo', $update);
				/*
				$this->db->where('nojo',$njok);
				$this->db->update('trans_jo', $update);
				
				if($tjen=='Rep'){
					$updatex = array (
						'flag_app'		 => 1
					);
					
					$this->db->where('nojo',$njok);
					$this->db->update('trans_perner', $updatex);
				} else {
					$updatex = array (
						'flag_app'		 => 1
					);
					
					$this->db->where('nojo',$njok);
					$this->db->update('trans_rincian', $updatex);
				}
				*/
			}
			else
			{
				$update	= array (
					'approval' => 1,
					'approval_admin' => 1,
					'ket_atasan' => $keter,
					'upd_atasan' => $data['username'],
					'lupapp_atasan' => date("Y-m-d H:i:s")					
				);
				
				$this->db->where('nojo',$njok);
				$this->db->update('trans_jo', $update);
			}
		}
		else
		{
			$update	= array (
				'approval' => 1,
				'approval_admin' => 1,
				'ket_atasan' => $keter, 
				'upd_atasan' => $data['username'],
				'lupapp_atasan' => date("Y-m-d H:i:s")
			);
			
			$this->db->where('nojo',$njok);
			$this->db->update('trans_jo', $update);
		}
		
	}	
	
	
	function m_inssimpantjo($nid,$keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_app' => 1,
			'upd_app'  => $data['username'],
			'ket_rej' => $keter
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_rincian', $update);
	}	
	
	
	function m_inssimpantjo_ra($nid,$keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_app' => 1,
			'upd_app'  => $data['username'],
			'ket_rej' => $keter
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_perner', $update);
	}	
	
	
	function m_inssimpantjo_ra2($nid,$keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_app' => 1,
			'upd_app'  => $data['username'],
			'ket_rej' => $keter
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_rincian', $update);
	}	
	
	
	function m_inssimpantjo_rasap($nid,$keter,$ruspm,$knci,$pilpks){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$tglnow = date('Y-m-d H:i:s');
		
		$update	= array (
			'skema' => 1,
			'ket_done' => $keter,
			'upd_skema' => $data['username'],
			'lup_skema' => $tglnow,
			'userpm'	=> $ruspm,
			'kunci_tgl_create' => $knci,
			'pilpks' => $pilpks
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_perner', $update);
	}	
	
	
	function m_inssimpantjo_rasap2($nid,$keter,$ruspm,$knci,$pilpks){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'skema' => 1,
			'ket_done' => $keter,
			'lup_skema' => $tglnow,
			'upd_skema' => $data['username'],
			'userpm'	=> $ruspm,
			'kunci_tgl_create' => $knci,
			'pilpks' => $pilpks
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_rincian', $update);
	}	
	
	
	function update_rpks($nojo,$pilpks,$dokpks){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'pilpks' => $pilpks,
			'dokpks' => $dokpks
		);
		
		$this->db->where('nojo',$nojo);
		$this->db->update('trans_jo', $update);
	}	
	
	
	
	function inssimpantjo1($njok, $keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['username'];
		$update	= array (
			'approval_admin' => 1
			//'ket_admin' => $keter
		);
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_jo', $update);

		$log = array(
			'nojo' => $njok,
			'approval' => 'approval_admin', 
			'upd' => $session_data['username'],
			'lup' => date("Y-m-d H:i:s")
			);
		$this->db->insert('log_approval',$log);
	}	
	
	function inssimpanskema($njo){
		$update	= array (
			'skema' => 1
		);
		
		$this->db->where('nojo',$njo);
		$this->db->update('trans_jo', $update);
	}	
	 
	
	function xinssimpanskemax($vid, $scancel, $mymy, $det_area, $jenisskill, $jenisjabatan, $jenislevel, $jenisproject, $zskema, $jpay, $ubab, $zparam, $username, $tglinp, $njab, $uspm, $knci, $jkontrak, $trfgb, $alasanrot, $udiv, $pilpks, $dokpks){
		$rec	= explode("-",$alasanrot);
		$update	= array (
			'skema' 			=> 1,
			'ket_done' 			=> $scancel,
			'level_sap' 		=> $jenislevel,
			'persa_sap' 		=> $mymy,
			'skill_sap' 		=> $jenisskill,
			'area_sap' 			=> $det_area,
			'jabatan_sap' 		=> $jenisjabatan,
			'jabatan_sap_nm' 	=> $njab,
			'jenis_pro_sap' 	=> $jenisproject,
			'skema_sap' 		=> $zskema,
			'abkrs_sap' 		=> $jpay,
			'hire_jabatan_sap' 	=> $ubab,
			// 'cttyp_sap' 		=> $jkontrak,
			// 'trfgb_sap' 		=> $trfgb,
			// 'kd_rotasi' 		=> $rec[1],
			// 'kd_reason' 		=> $rec[0],
			'zparam' 			=> $zparam,
			'lup_skema' 		=> $tglinp,
			'upd_skema' 		=> $username,
			'userpm' 			=> $uspm,
			'kunci_tgl_create' 	=> $knci,
			'divisi'		 	=> $udiv,
			'pilpks'		 	=> $pilpks,
			'dokpks'		 	=> $dokpks
		);
		
		$this->db->where('id',$vid);
		$this->db->update('trans_rincian', $update);
	}


		
	function xinssimpanskemax_inf($vid, $scancel, $mymy, $det_area, $jenisskill, $jenisjabatan, $jenislevel, $jenisproject, $zskema, $jpay, $ubab, $username, $tglinp, $njab, $uspm, $knci, $jkontrak, $trfgb, $alasanrot, $udiv, $pilpks){
		$rec	= explode("-",$alasanrot);
		$update	= array (
			'skema' 			=> 1,
			'ket_done' 			=> $scancel,
			'level_sap' 		=> $jenislevel,
			'persa_sap' 		=> $mymy,
			'skill_sap' 		=> $jenisskill,
			'area_sap' 			=> $det_area,
			'jabatan_sap' 		=> $jenisjabatan,
			'jabatan_sap_nm' 	=> $njab,
			'jenis_pro_sap' 	=> $jenisproject,
			'skema_sap' 		=> $zskema,
			'abkrs_sap' 		=> $jpay,
			'hire_jabatan_sap' 	=> $ubab,
			'cttyp_sap' 		=> $jkontrak,
			'trfgb_sap' 		=> $trfgb,
			'kd_rotasi' 		=> $rec[1],
			'kd_reason' 		=> $rec[0],
			'zparam' 			=> $zparam,
			'lup_skema' 		=> $tglinp,
			'upd_skema' 		=> $username,
			'userpm' 			=> $uspm,
			'kunci_tgl_create' 	=> $knci,
			'divisi'		 	=> $udiv,
			'pilpks'		 	=> $pilpks
		);
		
		$this->db->where('id',$vid);
		$this->db->update('trans_rincian', $update);
	}	
	
	
	
	function rejectjo($njok, $keter, $upd){
		$update	= array (
			'approval' => 2,
			'ket_atasan' => $keter,
			'upd_atasan' => $upd,
			'lupapp_atasan' => date("Y-m-d H:i:s")
		);
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_jo', $update);
	}	
	
	
	function m_rejectjo($nid, $keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_app' => 2,
			'upd_app'  => $data['username'],
			'ket_rej'  => $keter
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_rincian', $update);
	}	
	
	
	function m_rejectjo_rr($nid, $keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_app' => 2,
			'upd_app'  => $data['username'],
			'ket_rej'  => $keter
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_perner', $update);
	}	
	
	
	function m_rejectjo_rr2($nid, $keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_app' => 2,
			'upd_app'  => $data['username'],
			'ket_rej'  => $keter
		);
		
		$this->db->where('id',$nid);
		$this->db->update('trans_rincian', $update);
	}	
	
	
	function rejectjo1($njok, $keter){
		$update	= array (
			'approval_admin' => 2,
			'ket_admin' => $keter
		);
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_jo', $update);
	}

	function editjo($item){
		$this->db->insert('trans_req',$item);
	}	
	
	function deleterincian($iler){
		//$this->db->delete('trans_rincian',$item);
		$this->db->where('id', $iler);
  		$this->db->delete('trans_rincian');
	}	
	
	function editrincian($item,$item1){
		$this->db->where($item);
		$this->db->update('m_rincian',$item1);
	}
	
	function get_alljo(){
		
		$data			= array();
		$query = "SELECT count(nojo) as jml FROM trans_jo ";
		// $query = "SELECT count(1) as jml FROM trans_jo ";
		//$query .= "INNER JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		//$query .= "WHERE approval_admin = 1 ";
		//$query .= "GROUP BY b.id ORDER BY b.nojo";
		//$query .= "order by approval_admin, nojo ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result() as $row){
				// $data[] = $row;
				$data = $row->jml;
			}
		}
		return $data;		
	}
	
	
	function get_transjo(){
		$data			= array();
		$query = "SELECT a.`nojo`, c.id, b.id, a.project, a.latihan, current_date() as tgl_sekarang, b.jumlah, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) user, b.jabatan, a.tanggal, c.note, b.lokasi, datediff(a.latihan,current_date()) as selisih ";
		$query .= "FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON b.id = c.`nojo` ";	
		$query .= "WHERE a.approval_admin = 1 ";
		$query .= "GROUP BY b.id ";	
		//var_dump($query);
		//exit();		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_ontime(){
		
		$data			= array();
		$query = "SELECT COUNT(DISTINCT(b.`id`)) AS jml ";
		$query .= "FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON b.id = c.`nojo` ";	
		$query .= "WHERE a.approval_admin = 1 AND DATEDIFF(a.latihan,CURRENT_DATE()) < '0' AND b.jumlah<=(SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) ";
		//$query .= "WHERE a.approval_admin = 1 AND DATEDIFF(a.latihan,CURRENT_DATE()) < '0' AND ( b.jumlah=(SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) OR b.jumlah < (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) ) ";
		//$query .= "GROUP BY b.id ";	
		//var_dump($query);
		//exit();		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result() as $row){
				$data = $row->jml;
			}
		}
		return $data;		
	}
	
	function get_overdue(){
		
		$data			= array();
		$query = "SELECT COUNT(DISTINCT(b.`id`)) AS jml ";
		$query .= "FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON b.id = c.`nojo` ";	
		$query .= "WHERE a.approval_admin = 1 AND DATEDIFF(a.latihan,CURRENT_DATE()) < '0' AND b.jumlah > (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) ";
		//$query .= "WHERE a.approval_admin = 1 AND DATEDIFF(a.latihan,CURRENT_DATE()) < '0' AND ( b.jumlah > (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) OR c.jml_pkwt IS NULL )  ";
		//$query .= "GROUP BY b.id ";	
		//var_dump($query);
		//exit();		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result() as $row){
				$data = $row->jml;
			}
		}
		return $data;		
	}
	
	function get_alljoapp(){
		
		$data			= array();
		$query = "SELECT count(*) as jml FROM trans_jo WHERE flag_cancel='1' or flag_cancel_sap='1' ";
		//$query = "SELECT count(*) as jml FROM trans_jo WHERE approval='1' AND approval_admin='0' ";
		//$query .= "INNER JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		//$query .= "WHERE approval_admin = 1 ";
		//$query .= "GROUP BY b.id ORDER BY b.nojo";
		//$query .= "order by approval_admin, nojo ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result() as $row){
				$data = $row->jml;
			}
		}
		return $data;		
	}
	
	function get_topod(){
		
		$data			= array();
		// $query = "SELECT a.project, a.bekerja, b.jumlah, SUM(c.jml_pkwt) rekrut ";
		// $query .= "FROM trans_jo a ";
		// $query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		// $query .= "LEFT JOIN trans_req c ON b.id = c.`nojo` ";	
		// $query .= "WHERE a.approval_admin = 1 AND a.tanggal like '2019%' AND DATEDIFF(a.latihan,CURRENT_DATE()) < '0' AND b.jumlah > (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) ";
		// $query .= "GROUP BY b.id ORDER BY SUM(c.jml_pkwt) DESC LIMIT 10  ";	
		
		//$query .= "WHERE a.approval_admin = 1 AND DATEDIFF(a.latihan,CURRENT_DATE()) < '0' AND ( b.jumlah > (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) OR c.jml_pkwt IS NULL ) ";
		
		$query = "SELECT c.project, c.bekerja, b.jumlah, SUM(d.jml_pkwt) AS rekrut, c.flag_cancel_sap, ";
		$query .= "(SELECT value2 FROM sappersonalarea WHERE sappersonalarea.value1=c.project) AS npersa ";
		$query .= "FROM trans_rincian b ";
		$query .= "LEFT JOIN trans_jo c ON b.`nojo` = c.`nojo` ";
		$query .= "LEFT JOIN trans_req d ON b.id = d.`nojo` ";	
		$query .= "WHERE c.tanggal LIKE '%2019%' AND (c.approval=1 OR c.approval=5) AND DATEDIFF(c.latihan,CURRENT_DATE()) < '0' AND c.flag_cancel_sap!=1 ";
		$query .= "GROUP BY b.id  ";	
		$query .= "HAVING b.jumlah > (rekrut OR rekrut IS NULL) ";	
		$query .= "ORDER BY jumlah DESC, SUM(d.jml_pkwt) ASC LIMIT 10 ";	
		
				
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	/*
	function graph()
	{
		$data = $this->db->query(" SELECT lokasi, c.name_province, b.id as bid, b.city_name, c.`id`, count(*) AS jumlah From trans_rincian a left join city b on a.lokasi=b.id left join province c on b.province_id=c.id GROUP BY c.id ");
		return $data->result();
	}
	*/
	
	/*
	function graph()
	{
		$data = $this->db->query(" SELECT DISTINCT(a.lokasi), c.name_province, b.id AS bid, b.city_name, c.`id`,
									(SELECT COUNT(*) FROM trans_rincian WHERE trans_rincian.`lokasi`=a.`lokasi`) AS total, d.jml
									FROM trans_rincian a 
									LEFT JOIN city b ON a.lokasi=b.id 
									LEFT JOIN province c ON b.province_id=c.id 
									LEFT JOIN
									(
									SELECT COUNT(*) AS jml, h.`lokasi` FROM trans_rincian h LEFT JOIN city j ON h.lokasi=j.id LEFT JOIN province k ON j.province_id=k.id GROUP BY k.id
									) d ON a.lokasi=d.lokasi ");
		return $data->result();
	}
	*/
	
	function graph()
	{
		$data = $this->db->query(" SELECT d.layanan,
									(SELECT COUNT(*) FROM trans_rincian WHERE trans_rincian.`lokasi`=a.`lokasi`) AS total
									FROM trans_rincian a 
									LEFT JOIN mapping_city b ON a.lokasi=b.city_id 
									LEFT JOIN province c ON b.province_id=c.id 
									LEFT JOIN m_layanan d ON c.layanan=d.id 
									WHERE d.jabatan='J008' group by d.id ");
		return $data->result();
	}
	
	
	
	function campuran_perner($nojof, $file_name, $file_name2, $file_name3, $username){
		$this->db->trans_begin();
		$session_data			= $this->session->userdata('logged_in');
		$data['level']			= $session_data['level'];
		$data['regional']		= $session_data['level'];
		$data['username']		= $session_data['username'];
		$typere = $this->input->post('joborder[10]');
		
		if($data['level']=='1')
		//if( ($data['level']=='1') || (($data['level']=='2') && ($data['regional']=='1')) )
		{
			$kat = '';
			$uat = '';
			$lat = '';
			$sl=0;
			$ls=0;
			if($typere=='1')
			{
				$zx = 0;
			}
			else
			{
				$zx = 0;
			}
		}
		else if($data['level']=='2') {
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl=1;
			$ls=1;
			if($data['regional']=='1') {
				$zx = 0;
			}
			else {
				$zx = 1;
			}
		}
		else
		{
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl=1;
			$ls=1;
			if( ($data['level']=='5') || ($data['level']=='14') ){
				//$zx = 0;
				if($typere=='1')
				{
					$zx = 1;
				}
				else
				{
					$zx = 0;
				}
			}
			else 
			{
				if($typere=='1')
				{
					$zx = 1;
				}
				else
				{
					$zx = 0;
				}
			}
		}
		
		$rrr 		= $this->input->post('joborder[7]');
		if($rrr=='2')
		{
			$ab = 1;
			$ac = 1;
		}
		else
		{
			$ab = 0;
			$ac = 0;
		}
		
		$tgl_skrg = date('Y-m-d H:i:s');
		
		if($this->input->post('joborder[14]')=='INF'){
			$tperal = '1';
		} else {
			$tperal = '0';
		}
		
		$item = array (
			'nojo' => $nojof,
			// 'tanggal' => $this->input->post('joborder[0]'),
			'tanggal' => $tgl_skrg,
			'project' => '',
			'n_project' => '',
			'lama' => $this->input->post('joborder[1]'),
			'latihan' => $this->input->post('joborder[2]'),
			'bekerja' => $this->input->post('joborder[3]'),
			'komponen' => $file_name,
			'komponen_bak' => $file_name2,
			'komponen_other' => $file_name3,
			'type_jo' => $this->input->post('joborder[7]'),			
			'approval' => $sl,
			'approval_admin' => $ls,
			'jenis_project' => $this->input->post('joborder[8]'),
			'jenis_captive' => $this->input->post('joborder[13]'),
			'ket_atasan' => $kat,
			'upd_atasan' => $uat,
			'lupapp_atasan' => $lat,
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $username,	
			'type_replace' => $this->input->post('joborder[10]'),
			//'type_new' => $this->input->post('joborder[16]'),
			'no_bak' => $this->input->post('joborder[11]'),
			'kode_cust' => $this->input->post('joborder[15]'),
			'nama_cust' => $this->input->post('joborder[16]'),
			'flag_peralihan' => $tperal,
			'perner_norekrut' => $this->input->post('joborder[17]'),
		);
		
		$this->db->insert('trans_jo',$item);
		
		
		$rec 	= $this->input->post('joborder[12]');
		$rec	= explode(",",$rec);
		$loop = count($rec)/17;
		$loopx = $loop-1;
		if ($loopx){
			$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; $o = 8; $j = 9; $k = 10; $l = 11; $m = 12; $n = 13; $p = 14; $q = 15; $r = 16;
			for ($i=0; $i<$loopx; $i++){
				if (strpos($rec[$m], '1') !== false) {
					$ca = 1;
				} else {
					$ca = 0;
				}
				
				if (strpos($rec[$m], '2') !== false) {
					$cb = 1;
				} else {
					$cb = 0;
				}
				
				if (strpos($rec[$m], '3') !== false) {
					$cc = 1;
				} else {
					$cc = 0;
				}
				
				if (strpos($rec[$m], '4') !== false) {
					$cd = 1;
				} else {
					$cd = 0;
				}
				
				//$stxt = explode(" | ",$rec[$l]);
				$iteml = array(
					'nojo' => $nojof, 
					'perner' => $rec[$a],
					'nama' => $rec[$b],
					'area' => $rec[$h],
					'nm_area' => $rec[$c],
					'persa' => $rec[$o],
					'nm_persa' => $rec[$d], 
					'skilllayanan' => $rec[$j],
					'nm_skilllayanan' => $rec[$e],
					'level' => $rec[$k],
					'nm_level' => $rec[$g],
					'jabatan' => $rec[$q],
					'nm_jabatan' => $rec[$f],
					'abkrs' => $rec[$r],
					'skema' => '0',
					'upd' => $username,
					'lup' => date("Y-m-d H:i:s"),
					'flag_app' => '0',
					'tgl_resign' => $rec[$l],
					'train_soft' => $ca,
					'train_hard' => $cb,
					'tendem_pasif' => $cc,
					'tendem_aktif' => $cd,
					'rotasi_resign' => $rec[$p]
				);
				$this->db->insert('trans_perner',$iteml);
				
				$a = $a + 17;
				$b = $b + 17;
				$c = $c + 17;
				$d = $d + 17;
				$e = $e + 17;
				$f = $f + 17;
				$g = $g + 17;
				$h = $h + 17;
				$o = $o + 17;
				$j = $j + 17;
				$k = $k + 17;
				$l = $l + 17;
				$m = $m + 17;
				$n = $n + 17;
				$p = $p + 17;
				$q = $q + 17;
				$r = $r + 17;
			}
		}
		

		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo "Data Gagal Di Simpan, Coba Lagi..";
			return false;
		}
		else
		{
			$this->db->trans_commit();
			echo "Data Berhasil Di Simpan"; 
			return true;
		}
	}
	
	
	
	function campuran($nojof, $file_name, $file_name2, $file_name3, $username){
	
		$this->db->trans_begin();
		 
		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['level']			= $session_data['level'];
		$data['regional']			= $session_data['level'];
		$typere = $this->input->post('joborder[14]');
		
		if($data['level']=='1') 
		{
			$kat = '';
			$uat = '';
			$lat = '';
			$sl=0;
			$ls=0;
			if($typere=='1')
			{
				$zx = 0;
			}
			else
			{
				$zx = 0;
			}
		} 
		else if($data['level']=='2') {
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl=1; 
			$ls=1;
			if($data['regional']=='1') {
				$zx = 0;
			}
			else {
				$zx = 1;
			}
		}
		else
		{
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl=1; 
			$ls=1;
			if( ($data['level']=='5') || ($data['level']=='14') ){
				//$zx = 0;
				if($typere=='1')
				{
					$zx = 1;
				}
				else
				{
					$zx = 0;
				}
			}
			else {
				if($typere=='1')
				{
					$zx = 1;
				}
				else
				{
					$zx = 0;
				}
			}
			
		}
		
		$rrr 		= $this->input->post('joborder[10]');
		if($rrr=='2')
		{
			$ab = 1;
			$ac = 1;
		}
		else
		{
			$ab = 0;
			$ac = 0;
		}
		
		
		if($this->input->post('joborder[26]')=='INF'){
			$tperal = '1';
		} else {
			$tperal = '0';
		}
		
		
		$tgl_skrg = date('Y-m-d H:i:s');
		
		$item = array (
			'nojo' => $nojof,
			// 'tanggal' => $this->input->post('joborder[0]'),
			'tanggal' => $tgl_skrg,
			'project' => $this->input->post('joborder[1]'),
			'n_project' => $this->input->post('joborder[15]'),
			'syarat' => $this->input->post('joborder[2]'),
			'deskripsi' => $this->input->post('joborder[3]'),
			'lama' => $this->input->post('joborder[4]'),
			'latihan' => $this->input->post('joborder[5]'),
			'bekerja' => $this->input->post('joborder[6]'),
			'komponen' => $file_name,
			'komponen_bak' => $file_name2,
			'komponen_other' => $file_name3,
			'type_jo' => $this->input->post('joborder[10]'),			
			'approval' => $sl,
			'approval_admin' => $ls,
			'jenis_project' => $this->input->post('joborder[11]'),
			'jenis_captive' => $this->input->post('joborder[25]'),
			'ket_atasan' => $kat,
			'upd_atasan' => $uat,
			'lupapp_atasan' => $lat,
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $username,	
			'type_replace' => $this->input->post('joborder[14]'),
			'type_new' => $this->input->post('joborder[16]'),
			'no_bak' => $this->input->post('joborder[18]'),
			'tgl_gajian' => $this->input->post('joborder[21]'),
			'new_rekrut' => $this->input->post('joborder[22]'),
			'kode_cust' => $this->input->post('joborder[23]'),
			'nama_cust' => $this->input->post('joborder[24]'),
			'flag_peralihan' => $tperal,
			'perner_norekrut' => $this->input->post('joborder[27]')
		);
		
		$this->db->insert('trans_jo',$item);
		
		 
		
		$itemw = array (
			'nojo' => $nojof,
			//'doc_id' => $this->input->post('joborder[20]'),
			'doc_id' => $this->input->post('sapi'),
			'upd' => $username,
			'lup' => date("Y-m-d H:i:s")
		);
		
		$this->db->insert('trans_doc',$itemw);
		
		/*
		$putih = array (
			'nojo' => $nojof,
			'filename'	=> $file_name
		);
		
		$this->db->insert('trans_upload',$putih);
		*/
		
		$rec 	= $this->input->post('joborder[12]');
		$rec	= explode(",",$rec);
		$loop = count($rec)/19;
		$loopx = $loop-1;
		if ($loopx){
			$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; $o = 8; $j = 9; $k = 10; $l = 11; $m = 12; $n = 13; $p = 14; $q = 15; $r = 16; $s = 17; $t = 18;
			for ($i=0; $i<$loopx; $i++){
				//$ltxt = explode(" | ",$rec[$j]);
				if (strpos($rec[$s], '1') !== false) {
					$ca = 1;
				} else {
					$ca = 0;
				}
				
				if (strpos($rec[$s], '2') !== false) {
					$cb = 1;
				} else {
					$cb = 0;
				}
				
				if (strpos($rec[$s], '3') !== false) {
					$cc = 1;
				} else {
					$cc = 0;
				}
				
				if (strpos($rec[$s], '4') !== false) {
					$cd = 1;
				} else {
					$cd = 0;
				}
				
				$stxt = explode(" | ",$rec[$l]);
				$iteml = array(
					'nojo' => $nojof,
					'jenis_skema' => $rec[$t],
					'detail_komp' => $rec[$r],
					'jabatan' => $rec[$a],
					'gender' => $rec[$b],
					'pendidikan' => $rec[$c],
					'lokasi' => $rec[$d],
					'waktu' => $rec[$e],
					'atasan' => $rec[$f],
					'kontrak' => $rec[$g],
					'jumlah' => $rec[$h],
					'skema' => '0',
					'upd' => $username,
					'lup' => date("Y-m-d H:i:s"),
					'flag_app' => '0',
					'level' => $rec[$o],
					//'level_txt' => $ltxt[1],
					'skilllayanan' => $rec[$k],
					'skilllayanan_txt' => $stxt[0],
					'train_soft' => $ca,
					'train_hard' => $cb,
					'tendem_pasif' => $cc,
					'tendem_aktif' => $cd
				);
				$this->db->insert('trans_rincian',$iteml);
				
				$a = $a + 19;
				$b = $b + 19;
				$c = $c + 19;
				$d = $d + 19;
				$e = $e + 19;
				$f = $f + 19;
				$g = $g + 19;
				$h = $h + 19;
				$o = $o + 19;
				$j = $j + 19;
				$k = $k + 19;
				$l = $l + 19;
				$m = $m + 19;
				$n = $n + 19;
				$p = $p + 19;
				$q = $q + 19;
				$r = $r + 19;
				$s = $s + 19;
				$t = $t + 19;
			}
		}
		 

		//insert komponen
		$qwerty 	= $this->input->post('joborder[17]');
		if($qwerty!='X'){
			$reckom 	= $this->input->post('joborder[17]');
			$reckom		= explode(",",$reckom);
			$loops = count($reckom)/16;
			$loopsx = $loops-1;
			if ($loopsx){
				$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; $i = 8; $j = 9; $k = 10; $l = 11; $m = 12; $n = 13; $p = 14; $q = 15;
				for ($z=0; $z<$loopsx; $z++){
					$loks = explode(" | ",$reckom[$c]);
					$jabs = explode(" | ",$reckom[$a]);
					//$levs = explode(" | ",$reckom[$i]);
					$komps = explode(" | ",$reckom[$e]); 
					$xxxe = explode(" | ",$reckom[$p]);

					$iteml = array(
						'detail_komp' => $reckom[$q],
						'nojo' => $nojof,
						'area' => $reckom[$d],
						'area_txt' => $reckom[$c],
						'jabatan' => $reckom[$b],
						'jabatan_txt' => $reckom[$a],
						'level' => $reckom[$l],
						'level_txt' => $reckom[$m],
						'skill' => $reckom[$n],
						'skill_text' => $xxxe[0],
						//'level' => $reckom[$j],
						//'level_txt' => $levs[1],
						//'jumlah' => $rec[$b],
						'ump' => $reckom[$j],
						'komponen' => $reckom[$f],
						'komponen_txt' => $reckom[$e],
						'value' => $reckom[$g],
						'hk_pembagi' => $reckom[$i],
						'keterangan' => $reckom[$h],
						'persentase' => $reckom[$k],
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_komponen',$iteml);
					
					$a = $a + 16;
					$b = $b + 16;
					$c = $c + 16;
					$d = $d + 16;
					$e = $e + 16;
					$f = $f + 16;
					$g = $g + 16;
					$h = $h + 16;
					$i = $i + 16;
					$j = $j + 16;
					$k = $k + 16;
					$l = $l + 16;
					$m = $m + 16;
					$n = $n + 16;
					$p = $p + 16;
					$q = $q + 16;
				}
			}
		}
		
		$sssd = $this->input->post('joborder[19]');
		if($sssd!='X'){
			$recproc 	= $this->input->post('joborder[19]');
			$recproc		= explode(",",$recproc);
			$loopsy = count($recproc)/8;
			$loopsxy = $loopsy-1;
			if ($loopsxy){
				$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
				for ($z=0; $z<$loopsxy; $z++){
					$iteml = array(
						'nojo' => $nojof,
						'periode' => $recproc[$f],
						'tgl1' => $recproc[$g],
						'tgl2' => $recproc[$h],
						'item_id' => $recproc[$e],
						'qty' => $recproc[$b],
						'spec' => $recproc[$c],
						'budget' => $recproc[$d],
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_proc',$iteml);
					
					$a = $a + 8;
					$b = $b + 8;
					$c = $c + 8;
					$d = $d + 8;
					$e = $e + 8;
					$f = $f + 8;
					$g = $g + 8;
					$h = $h + 8;
				}
			}
		}
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo "Data Gagal Di Simpan, Coba Lagi..";
			return false;
		}
		else
		{
			$this->db->trans_commit();
			echo "Data Berhasil Di Simpan"; 
			return true;
		}
	}
	
	/*function campuran($nojof, $file_name, $file_name2, $file_name3, $username){
	
		$this->db->trans_begin();
		
		$session_data			= $this->session->userdata('logged_in');
		//$data['username']		= $session_data['username'];
		$data['level']			= $session_data['level'];
		$typere = $this->input->post('joborder[14]');
		
		if($data['level']=='1')
		{
			$sl=0;
			$ls=0;
			if($typere=='1')
			{
				$zx = 0;
			}
			else
			{
				$zx = 0;
			}
		}
		else
		{
			$sl=1;
			$ls=1;
			if($typere=='1')
			{
				$zx = 1;
			}
			else
			{
				$zx = 0;
			}
		}
		
		$rrr 		= $this->input->post('joborder[10]');
		if($rrr=='2')
		{
			$ab = 1;
			$ac = 1;
		}
		else
		{
			$ab = 0;
			$ac = 0;
		}
		
		
		
		 
		$item = array (
			'nojo' => $nojof,
			'tanggal' => $this->input->post('joborder[0]'),
			'project' => $this->input->post('joborder[1]'),
			'n_project' => $this->input->post('joborder[15]'),
			'syarat' => $this->input->post('joborder[2]'),
			'deskripsi' => $this->input->post('joborder[3]'),
			'lama' => $this->input->post('joborder[4]'),
			'latihan' => $this->input->post('joborder[5]'),
			'bekerja' => $this->input->post('joborder[6]'),
			//'komponen' => $this->input->post('joborder[11]'),
			'komponen' => $file_name,
			'komponen_bak' => $file_name2,
			'komponen_other' => $file_name3,
			//'komponen' => $this->input->post('joborder[7]'),
			'type_jo' => $this->input->post('joborder[10]'),			
			'approval' => $sl,
			'approval_admin' => $ls,
			'jenis_project' => $this->input->post('joborder[11]'),
			//'jenis_skema' => $this->input->post('joborder[11]'),
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $username,	
			'type_replace' => $this->input->post('joborder[14]'),
			'type_new' => $this->input->post('joborder[16]')
		);
		
		$this->db->insert('trans_jo',$item);
		
		
		//$putih = array (
		//	'nojo' => $nojof,
		//	'filename'	=> $file_name
		//);
		
		//$this->db->insert('trans_upload',$putih);
		
		
		$rec 	= $this->input->post('joborder[12]');
		
		$rec	= explode(",",$rec);
		$loop = count($rec)/9;
		if ($loop){
			$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
			for ($i=0; $i<$loop; $i++){
				$iteml = array(
					'nojo' => $nojof,
					'jabatan' => $rec[$a],
					'gender' => $rec[$b],
					'pendidikan' => $rec[$c],
					'lokasi' => $rec[$d],
					'waktu' => $rec[$e],
					'atasan' => $rec[$f],
					'kontrak' => $rec[$g],
					'jumlah' => $rec[$h],
					'skema' => '0',
					'upd' => $username,
					'lup' => date("Y-m-d H:i:s"),
					'flag_app' => $zx
				);
				$this->db->insert('trans_rincian',$iteml);
				
				$a = $a + 8;
				$b = $b + 8;
				$c = $c + 8;
				$d = $d + 8;
				$e = $e + 8;
				$f = $f + 8;
				$g = $g + 8;
				$h = $h + 8;
			}
		}
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo "Data Gagal Di Simpan, Coba Lagi..";
			return false;
		}
		else
		{
			$this->db->trans_commit();
			echo "Data Berhasil Di Simpan"; 
			return true;
		}
	}
	*/
	
	public function take_rin($nojo){	
		$this->db = $this->load->database('default',TRUE);	
		$data = array();
		$query	= "select a.id, a.jabatan, b.name_job_function FROM trans_rincian a LEFT JOIN job_function b ON a.jabatan=b.id WHERE nojo='$nojo' order by name_job_function";		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	function get_data($id){
		$this->db = $this->load->database('default',TRUE);
		$data		= array();
		$query		= "SELECT * FROM trans_jo a LEFT JOIN trans_rincian b ON a.nojo=b.nojo LEFT JOIN job_function c ON b.jabatan=c.id WHERE b.id='$id' ";
	
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		//var_dump($Q);exit();
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	function get_jpro(){
		$this->db = $this->load->database('default',TRUE);
		$data		= array();
		$query		= "SELECT * FROM m_jenis WHERE status='1' order by nama ";
	
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function get_tpro(){
		$this->db = $this->load->database('default',TRUE);
		$data		= array();
		$query		= "SELECT * FROM m_type WHERE status='1' order by nama ";
	
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function get_itemp(){
		$this->db = $this->load->database('default',TRUE);
		$data		= array();
		$query		= "SELECT * FROM m_item WHERE is_active='1' order by item_name ";
	
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	function get_docp(){
		$data			= array();
		$query		= "SELECT * FROM m_doc WHERE is_active='1' order by doc_name ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function rdoc(){
		$data			= array();
		$query		= "SELECT * FROM m_doc WHERE is_active='1' order by doc_name ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function s_rincian_simpanx($item){
		// $this->db = $this->load->database('default',TRUE);
		$this->db->insert('trans_skema',$item);
	}	
	
	
	
	
	function get_city_manar($njok){
		$data 	= array();
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT a.lokasi, d.nama as namad, c.nama, b.project from trans_rincian a left join trans_jo b ON a.nojo=b.nojo left join m_login c ON b.upd=c.username left join m_type d ON b.type_jo=d.id where a.nojo='$njok' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_city_manar_rep($njok){
		$data 	= array();
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT a.area as lokasi, d.nama as namad, c.nama, b.project from trans_perner a left join trans_jo b ON a.nojo=b.nojo left join m_login c ON b.upd=c.username left join m_type d ON b.type_jo=d.id where a.nojo='$njok' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	
	function get_detail_creater($njok){
		$data			= array();
		$query = "SELECT d.nama as namad, c.nama from trans_jo b left join m_login c ON b.upd=c.username left join m_type d ON b.type_jo=d.id where b.nojo='$njok' ";
		
		$Q		= $this->db->query($query);
		//if ($Q->num_rows() > 0){
			$data = $Q->row();
		//}
		return $data;
	}
	
	
	
	function get_detail_createrx($njok){
		$data			= array();
		$query = "SELECT c.nama from trans_skema b left join m_login c ON b.upd=c.username where b.nojo='$njok' ";
		
		$Q		= $this->db->query($query);
		//if ($Q->num_rows() > 0){
			$data = $Q->row();
		//}
		return $data;
	}
	
	
	
	
	function get_email_manar($city){
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a left join mapping_city b on a.username=b.manar ";
		$query		 .= "WHERE b.city_id='$city' and a.level='4' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	
	function get_email_manar_rep($city, $prov){
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a left join mapping_manar b on a.username=b.manar ";
		$query		 .= "WHERE b.areaid='$city'  ";
		if($prov!='-'){
			$query		 .= "AND b.personalareaid='$prov' ";
		}
		$query		 .= "GROUP BY email  ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_email_manar_repX($city, $prov){
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a left join mapping_city b on a.username=b.manar ";
		$query		 .= "WHERE b.city_id='$city' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_email_creater($upd){
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query	= "SELECT email from m_login where username='$upd' limit 1 ";
		$Q		= $this->db->query($query);
		$data   = $Q->row();
		return $data;
	}
	
	
	
	function get_email_enterprise($manops){
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login where username='$manops' limit 1 ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_email(){
		
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login where layanan='$layanan' and jabatan='$jabatan' and level='2' limit 1 ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function email_ppc_aja(){
		
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT group_concat(email) as email from m_login where level='5' and regional!='1' and type='PPC' and is_active='1' ";
		$Q		= $this->db->query($query);
		$data	= $Q->row();
		return $data;
	}
	
	
	function get_email_penerima($njok){
		
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a left join trans_jo b on a.username=b.upd where nojo='$njok' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	
	function get_email_sap(){
		
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login where level='5' and regional!='1' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	
	function get_nojo_type($sid){
		$data			= array();
		$query = "SELECT a.nojo, c.nama as cnama, a.komponen, a.komponen_bak, a.komponen_other FROM trans_jo a left join trans_rincian b ON a.nojo=b.nojo left join m_type c ON a.type_jo=c.id where b.id='$sid' GROUP BY b.id ";
		
		$Q		= $this->db->query($query);
		//if ($Q->num_rows() > 0){
			$data = $Q->row();
		//}
		return $data;
	}
	
	
	function get_nojo_edit($nojo){
		$data			= array();
		$query = "SELECT a.*, c.nama as cnama, d.nama as dnama, date_format(tanggal,'%Y-%m-%d') as tanggalcrt, (select nama from m_jenis_project where a.jenis_captive=m_jenis_project.id) as ncap, (SELECT MAX(detail_komp) FROM trans_rincian WHERE nojo=a.nojo) as maxdetkom FROM trans_jo a left join m_type c ON a.type_jo=c.id left join m_jenis d ON a.jenis_project=d.id where LEFT(a.nojo,6)='$nojo' GROUP BY a.nojo ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_nojo_psk($nojo){
		$data			= array();
		$query = "SELECT a.* FROM trans_skema a where LEFT(a.nojo,6)='$nojo' GROUP BY a.nojo ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_rinc_edit($nojo){
		$data			= array();
		$query = "SELECT a.*, a.level as alevel, b.name_job_function, c.city_name, d.hk_pembagi, e.level, d.ump, (select latihan from trans_jo where LEFT(nojo,6)='$nojo') as latihan, (select bekerja from trans_jo where LEFT(nojo,6)='$nojo') as bekerja, (select new_rekrut from trans_jo where LEFT(nojo,6)='$nojo') as newrek, IF(type_rekrut='1','No Rekrut', IF(type_rekrut='2','Rekrut', IF(type_rekrut='3','No Rekrut (Existing)',''))) AS typerek, (select perner_norekrut from trans_jo where LEFT(nojo,6)='$nojo') as pernorek, (select value2 from sapskilllayanan where value1=a.skilllayanan) nskill_sap FROM trans_rincian a ";
		$query .= "left join job_function b ON a.jabatan=b.id ";
		$query .= "left join mapping_city c ON a.lokasi=c.city_id ";
		$query .= "left join trans_komponen d ON a.nojo=d.nojo AND a.lokasi=d.area AND a.jabatan=d.jabatan AND a.level=d.level AND a.skilllayanan=d.skill ";
		$query .= "left join m_level_skema e ON a.level=e.id ";
		$query .= "where LEFT(a.nojo,6)='$nojo' and (a.skema!='1' OR a.skema='0' OR a.skema IS NULL) GROUP BY a.id ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_komp_edit($nojo){
		$data			= array();
		$query = "SELECT a.* FROM trans_komponen a ";
		// $query.= "LEFT JOIN trans_rincian b ON a.nojo=b.nojo AND a.detail_komp=b.detail_komp AND a.area=b.lokasi AND a.jabatan=b.jabatan AND a.level=b.level AND a.skill=b.skilllayanan ";
		$query.= "LEFT JOIN trans_rincian b ON a.nojo=b.nojo AND ((a.detail_komp=b.detail_komp) OR (a.area=b.lokasi AND a.jabatan=b.jabatan AND a.level=b.level AND a.skill=b.skilllayanan)) ";
		$query.= "WHERE LEFT(a.nojo,6)='$nojo' AND (b.skema!='1' OR b.skema='0' OR b.skema IS NULL) ";
		$query.= "GROUP BY a.id ";
		
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	function get_proc_edit($nojo){
		$data			= array();
		$query = "SELECT a.* FROM trans_proc a where LEFT(a.nojo,6)='$nojo' GROUP BY a.id ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_pernr_edit($nojo){
		$data			= array();
		$query  = "SELECT a.*, IF(type_rep='1','No Rekrut', IF(type_rep='2','Rekrut', IF(type_rep='3','No Rekrut (Existing)',''))) AS typerep, ";
		$query .= "(SELECT type_replace FROM trans_jo WHERE trans_jo.nojo=a.nojo) AS trep, (SELECT latihan FROM trans_jo WHERE trans_jo.nojo=a.nojo) AS latihan, (SELECT bekerja FROM trans_jo WHERE trans_jo.nojo=a.nojo) AS bekerja, (select reason From m_reason Where kode_z=a.kodez_rotres and kd_reason=a.alasan_rotres) as nm_alasan, ";
		$query .= "(select reason from m_reason z left join trans_perner_ganti w on z.kode_z=w.kodez_rotasi and z.kd_reason=w.alasan_rotasi where w.nojo=a.nojo and w.perner_resrot=a.perner and w.perner_ganti=a.perner_ganti GROUP BY z.kd_reason) as alasan_ganti ";
		$query .= "FROM trans_perner a where LEFT(a.nojo,6)='$nojo' and skema!='1' GROUP BY a.id ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_rinc_ps($nojo){
		$data			= array();
		$query  = "SELECT a.*, b.value2 as narea, c.value2 as nperar FROM trans_skema a ";
		$query .= "LEFT JOIN saparea b on a.area=b.value1 ";
		$query .= "LEFT JOIN sappersonalarea c on a.perar=c.value1 ";
		$query .= "where LEFT(a.nojo,6)='$nojo' GROUP BY a.id ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function del_dok($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_jo',$item1);
	}
	
	
	function del_dok_sk($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_skema',$item1);
	}
	
	
	
	function edit_skema($item, $item1){
		$this->db->where($item);
		$this->db->update('trans_jo',$item1);
	}
	
	
	function edit_skema_sk($item, $item1){
		$this->db->where($item);
		$this->db->update('trans_skema',$item1);
	}
	
	
	function simpan_jobs($sid,$usr){
		$update	= array (
			'flag_jobs' => 1,
			'upd_jobs'	=> $usr,
			'lup_jobs' 	=> date("Y-m-d H:i:s")
		);
		
		$this->db->where('id',$sid);
		$this->db->update('trans_rincian', $update);
	}	
	
	
	function skip_simpan_jobs($sid,$usr){
		$update	= array (
			'flag_jobs' => 1,
			'upd_jobs'	=> $usr,
			'lup_jobs' 	=> date("Y-m-d H:i:s")
		);
		
		$this->db->where('id',$sid);
		$this->db->update('trans_rincian', $update);
	}	
	
	
	
	function inssimpantjo_sk($njok,$keter,$wkwk){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		if($wkwk=='1'){
			$update	= array (
				'flag_approval' => 1,
				'ket_reject' => $keter,
				'upd_approval' => $data['username'],
				'lup_app' => date("Y-m-d H:i:s")
			);
		}
		else {
			$update	= array (
				'flag_approval' => 1,
				//'flag_manar' => 1,
				'lup_app' => date("Y-m-d H:i:s"),
				'ket_manar' => $keter,
				'upd_manar' => $data['username']
			);
		}
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_skema', $update);
		
	}	
	
	
	
	function ls_inssimpantjo_sk($njok,$keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_manar' => 1,
			'ket_manar' => $keter,
			'upd_manar' => $data['username']
		);
		
		$this->db->where('id',$njok);
		$this->db->update('trans_skema', $update);
	}	
	
	
	
	function rejectjo_sk($njok, $keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_approval' => 2,
			'ket_reject' 	=> $keter,
			'upd_approval' 	=> $data['username'],
			'lup_app' 		=> date("Y-m-d H:i:s")
		);
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_skema', $update);
	}	
	
	
	function lr_rejectjo_sk($njok, $keter){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'flag_manar' 	=> 2,
			'upd_manar' 	=> $data['username'],
			'ket_manar' 	=> $keter
		);
		
		$this->db->where('id',$njok);
		$this->db->update('trans_skema', $update);
	}	
	
	
	function get_email_penerima_sk($njok){
		
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a left join trans_skema b on a.username=b.upd where b.nojo='$njok' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	
	function get_email_penerima_sk_id($njok){
		
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a left join trans_skema b on a.username=b.upd where b.id='$njok' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	
	function get_email_penerima_sk_all($njok){
		
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a left join trans_skema b on a.username=b.upd where b.nojo='$njok' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	
	function get_transall_sap_sk(){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_done FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' ";
		$query .= "Group By a.nojo ";
		$query .= "Order By a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function view_sk_sk($area,$perar,$searchx){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_done FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' ";
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else
		{
			$query .= "";
		}
		
		if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		else
		{
			$query .= "";
		}
		
		if($searchx!='')
		{
			$query .= "AND (a.nojo like '%$searchx%' or b.nama like '%$searchx%') ";
		}
		else
		{
			$query .= "";
		}
		$query .= "Group By a.nojo ";
		$query .= "ORDER BY (a.flag_skema=0 OR a.flag_skema IS NULL) DESC, nojo DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
		
	
	function view_sk_sk_list_cr($area,$perar,$username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' AND b.username = '$username' ";
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else
		{
			$query .= "";
		}
		
		if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		else
		{
			$query .= "";
		}
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function view_sk_sk_list_mr($area,$perar,$username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id` ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' AND e.manar = '$username' ";
		
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		
		
		
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function view_sk_sk_list_mr_new($valu,$username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id` ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' AND e.manar = '$username' ";
		
		if($valu!='')
		{
			$query .= "AND (a.nojo like '%$area%' OR a.n_area like '%n_area%' OR a.n_perar like '%n_perar%') ";
		}
		
		
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function view_sk_sk_list_mr_2($area,$perar,$username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_manar e ON a.`area` = e.`areaid` and a.perar=e.personalareaid ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		//$query .= "WHERE a.flag_approval = '1' AND e.manar = '$username' ";
		$query .= "WHERE e.manar = '$username' ";
		
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		
		
		
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function view_sk_sk_list_mgr_enterprise($username){
		$this->db3 = $this->load->database('db_third',TRUE);
		$cekid_client = $this->db3->query("SELECT GROUP_CONCAT(id) as kumpid FROM ish_salesfunnel.new_customer WHERE manager_enterprise='$username' ")->row();
		
		$this->db = $this->load->database('default',TRUE);
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.flag_skema FROM trans_skema a ";
		$query .= "WHERE a.kd_cust IN ($cekid_client->kumpid) ";
		$query .= "Group By a.id ";
		$query .= "ORDER BY a.flag_approval, a.area, a.perar ASC, a.nojo DESC ";
		// var_dump($query);die;
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function vview_sk_sk_list_mgr_enterprise($username){
		$this->db3 = $this->load->database('db_third',TRUE);
		$cekid_client = $this->db3->query("SELECT GROUP_CONCAT(id) as kumpid FROM ish_salesfunnel.new_customer WHERE manager_enterprise='$username' ")->row();
		
		$this->db = $this->load->database('default',TRUE);
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "WHERE a.flag_approval='5' and variabel='1' and a.kd_cust IN ($cekid_client->kumpid) ";
		$query .= "ORDER BY a.id DESC ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function view_sk_sk_list_mr_2x($area,$perar,$username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.flag_skema FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_manar e ON a.`area` = e.`areaid` and a.perar=e.personalareaid ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		//$query .= "WHERE a.flag_approval = '1' AND e.manar = '$username' ";
		$query .= "WHERE e.manar = '$username' ";
		
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		$query .= "Group By a.id ";
		$query .= "ORDER BY a.flag_approval, a.area, a.perar ASC, a.nojo DESC ";
		// var_dump($query);die;
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function vview_sk_sk_list_mr_2x($area,$perar,$username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		//$query .= "LEFT JOIN mapping_manar e ON a.`area` = e.`areaid` and a.perar=e.personalareaid ";
		//$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		//$query .= "WHERE a.flag_approval = '1' AND e.manar = '$username' ";
		$query .= "WHERE a.flag_approval='5' and variabel='1' ";
		//$query .= "WHERE e.manar = '$username' and a.flag_approval='5' and variabel='1' ";
		
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		
		$query .= "ORDER BY a.id DESC ";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	

	
	function view_sk_sk_list($area,$perar,$daud,$jbt){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' AND b.layanan = '$daud' and b.jabatan = '$jbt' ";
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else
		{
			$query .= "";
		}
		
		if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		else
		{
			$query .= "";
		}
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function view_sk_sk_list_ops($area,$perar,$username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar  FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' AND b.username = '$username' ";
		if($area!='')
		{
			$query .= "AND a.area = '$area' ";
		}
		else
		{
			$query .= "";
		}
		
		if($perar!='')
		{
			$query .= "AND a.perar = '$perar' ";
		}
		else
		{
			$query .= "";
		}
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function inssimpanskema_sk($njo, $ket, $username){
		$update	= array (
			'flag_skema' 	=> 1,
			'upd_skema' 	=> $username,
			'lupapp_skema' 	=> date("Y-m-d H:i:s"),
			'ket_done' 		=> $ket
		);
		
		$this->db->where('nojo',$njo);
		$this->db->update('trans_skema', $update);
	}	
	
	
	
	function simpan_cancel_sap_sk($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_skema',$item1);
	}
	
	
	function get_nojo_type_sk($sid){
		$data			= array();
		$query = "SELECT a.* FROM trans_skema a where a.id='$sid' GROUP BY a.id ";
		
		$Q		= $this->db->query($query);
		//if ($Q->num_rows() > 0){
			$data = $Q->row();
		//}
		return $data;
	}
	
	
	function simpan_ket_rek($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_rincian',$item1);
	}
	
	
	function simpan_ket_rekrep($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_perner',$item1);
	}
	
	
	
	function get_list($length,$start,$search,$order,$dir)
	{
		$session_data 	= $this->session->userdata('logged_in');
		$username	 	= $session_data['perner'];
		$level			= $session_data['level'];
		
		$order_by="ORDER BY PERNR $dir";
		if($order!='0'){
			if($order=='1'){
				$order_by="ORDER BY CNAME $dir";
			}else if($order=='2'){
				$order_by="ORDER BY FASEX_TXT $dir";
			}else if($order=='3'){
				$order_by="ORDER BY FAMST_TXT $dir";
			}else if($order=='4'){
				$order_by="ORDER BY PLATX $dir";
			}else if($order=='5'){
				$order_by="ORDER BY WKTXT $dir";
			}else if($order=='6'){
				$order_by="ORDER BY BTRTX $dir";
			}else if($order=='7'){
				$order_by="ORDER BY SLART_TXT $dir";
			}else if($order=='8'){
				$order_by="ORDER BY DATDT $dir";
			}else if($order=='9'){
				$order_by="ORDER BY ARBER $dir";
			}else{
				$order_by="ORDER BY PERNR $dir";
			}
		}
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and CNAME like '%".$search."%' OR PERNR like '%".$search."%' OR FASEX_TXT like '%".$search."%' OR ICNUM like '%".$search."%' OR FAMST_TXT like '%".$search."%' OR PLATX like '%".$search."%' OR WKTXT like '%".$search."%' OR BTRTX like '%".$search."%' OR SLART_TXT like '%".$search."%' ";
		}
		
		$sql		= "SELECT PERNR,CNAME,FASEX_TXT,ICNUM,FAMST_TXT,PLATX,WKTXT,BTRTX,SLART_TXT,DATE(DATDT) as DATDT,DATE(ARBER) as ARBER
			FROM sapprofile1 
			where PERNR <> ''
			$where_clause 
			$order_by						
		";
		//var_dump($sql);exit();
		$query		= $this->dbsap->query($sql . " LIMIT $start, $length");
		$numrows	= $this->dbsap->query($sql);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $query->result_array(),
			"total_data" => $total
		);
	}
	
	
	function rinc_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('trans_rincian');
    }
	
	function komp_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('trans_komponen');
    }
	
	
	function pern_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('trans_perner');
    }
	
	function pernganti_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('trans_perner_ganti');
    }
	
	function proc_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('trans_proc');
    }
	
	
	function rinc_skema_hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('trans_skema');
    }
	
	function del_rin($nojo) {
        $this->db->where('nojo', $nojo);
        $this->db->delete('trans_rincian');
    }
	
	
	function edit_all($item, $item1){
		$this->db->where($item1);
		$this->db->update('trans_jo',$item);
	}
	
	function edit_all2($putih, $putih1){
		$this->db->where($putih1);
		$this->db->update('trans_perner',$putih);
	}
	
	function edit_all3($putihh, $putihh1){
		$this->db->where($putihh1);
		$this->db->update('trans_rincian',$putihh);
	}
	
	
	function edit_proc($itemw, $item1){
		$this->db->where($item1);
		$this->db->update('trans_doc',$itemw);
	}
	
	
	function simpan_pichi($item, $item2){
		$this->db->where($item);
		$this->db->update('trans_rincian',$item2);
	}
	
	
	
	function get_manar_pic($username){
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, h.nama as hnama, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, a.n_pic_hi, b.n_project, b.ket_done, a.pic_manar, a.n_pic_manar, a.pic_rekrut, a.n_pic_rekrut ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN m_jenis h ON b.jenis_project = h.id ";
		//$query .= "WHERE b.skema = 1 AND b.type_jo='1' AND e.manar='$username' ";
		$query .= "WHERE (a.skema = 1 OR b.skema=1) AND b.type_jo='1' AND e.manar='$username' ";
		$query .= "GROUP BY a.nojo ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_manar2_pic($username){
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, h.nama as hnama, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.ket_done, a.n_pic_hi, a.pic_manar, a.n_pic_manar, a.pic_rekrut, a.n_pic_rekrut ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN m_jenis h ON b.jenis_project = h.id ";
		//$query .= "WHERE b.skema = 1 AND b.type_jo='1' AND e.province_id IN ('1','2','3') ";
		$query .= "WHERE (a.skema = 1 OR b.skema = 1) AND (b.type_jo='1' and b.type_new='1') AND e.manar2 IN ($username) ";
		$query .= "GROUP BY a.nojo ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function cari_manar_pic($username, $search){
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, h.nama as hnama, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.ket_done, a.n_pic_hi, a.pic_manar, a.n_pic_manar, a.pic_rekrut, a.n_pic_rekrut ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN m_jenis h ON b.jenis_project = h.id ";
		$query .= "WHERE b.skema = 1 AND b.type_jo='1' AND e.manar='$username' AND (a.nojo like '%$search%' or b.project like '%$search%' or b.n_project like '%$search%') ";
		$query .= "GROUP BY a.nojo ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function cari_manar2_pic($username, $search){
		$data			= array();
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, h.nama as hnama, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.ket_done, a.n_pic_hi, a.pic_manar, a.n_pic_manar, a.pic_rekrut, a.n_pic_rekrut ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN m_jenis h ON b.jenis_project = h.id ";
		//$query .= "WHERE b.skema = 1 AND b.type_jo='1' AND e.province_id IN ('1','2','3') AND (a.nojo like '%$search%' or b.project like '%$search%' or b.n_project like '%$search%') ";
		$query .= "WHERE b.skema = 1 AND b.type_jo='1' AND e.manar2 IN ($username) AND (a.nojo like '%$search%' or b.project like '%$search%' or b.n_project like '%$search%') ";
		$query .= "GROUP BY a.nojo ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	
	function get_pichi_login(){
		$data			= array();
		$query = "SELECT a.* FROM m_login a where a.level='3' ORDER BY nama ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_email_picrek($picrek){
		
		$data 	= array();
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from m_login a where a.username='$picrek' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_jenis_project(){
		$data			= array();
		$query = "SELECT * FROM m_jenis_project ORDER BY nama ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_transall_opsX($length,$start,$search,$order,$dir,$cano,$cacli,$capro){ 
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.project like '%".$search."%' OR a.n_project like '%".$search."%' OR b.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		if($cano!=''){
			$where_clause .= " and a.nojo like '%".$cano."%' ";
		}
		
		if($cacli!=''){
			$where_clause .= " and a.nama_cust like '%".$cacli."%' ";
		}
		
		if($capro!=''){
			$where_clause .= " and a.project like '%".$capro."%' ";
		}
		
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, a.project, a.n_project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema as skemax, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap, c.nama as ntype, d.nama as dnama, b.pic_hi, a.ket_done, a.n_project, f.name_job_function, e.city_name as lokasi, b.atasan, b.kontrak, b.waktu, b.jumlah, b.id, b.lokasi as lokasix, b.skema, b.jabatan, b.skilllayanan, b.skilllayanan_txt, b.ket_done as bket_done, '-' as tanggalx, b.persa_sap, a.nama_cust FROM trans_rincian b ";
		//$query .= "INNER JOIN trans_doc u ON a.`nojo` = u.`nojo` ";  
		$query .= "LEFT JOIN trans_jo a ON a.`nojo` = b.`nojo` ";  
		$query .= "LEFT JOIN m_type c ON a.`type_jo` = c.`id` ";  
		$query .= "LEFT JOIN m_login d ON a.`upd` = d.`username` ";  
		$query .= "LEFT JOIN mapping_city e ON b.`lokasi` = e.`city_id` "; 
		$query .= "LEFT JOIN job_function f ON b.`jabatan` = f.`id` "; 
		//$query .= "WHERE approval_admin = 1 "; 
		// $query .= "WHERE approval = 5 and b.flag_app = 1 AND (b.skema='1' OR a.skema='1') and (a.type_jo='1' and a.type_new='1') AND (persa_sap IS NOT NULL AND persa_sap!='')  "; 
		$query .= "WHERE (a.approval = 5 OR a.approval = 1) AND (b.skema='1' OR a.skema='1') and (a.type_jo='1' and a.type_new='1') AND (persa_sap IS NOT NULL AND persa_sap!='')  "; 
		//$query .= "WHERE approval = 1 and b.flag_app = 1 AND (b.skema='1' OR a.skema='1') "; 
		$query .= "$where_clause "; 
		//$query .= "GROUP BY a.nojo ORDER BY (b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.nojo DESC ";
		$query .= "GROUP BY a.nojo, b.persa_sap ORDER BY a.nama_cust DESC, (b.skema=0 OR b.skema IS NULL) DESC, a.flag_cancel_sap ASC, b.persa_sap DESC ";
		//var_dump($query);exit();
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function get_datamapping($length,$start,$search,$order,$dir)
	{
		$session_data 	= $this->session->userdata('logged_in');
		$username	 	= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR h.nama like '%".$search."%' ";
		}
		
		$sql		= "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, h.nama as hnama, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.ket_done, a.n_pic_hi, a.pic_manar, a.n_pic_manar, a.pic_rekrut, a.n_pic_rekrut 			
		";
		$sql		.= "FROM trans_rincian a LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$sql		.= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$sql		.= "LEFT JOIN trans_req c ON a.id = c.nojo LEFT JOIN m_login d ON b.upd = d.username ";
		$sql		.= "LEFT JOIN m_type g ON b.type_jo = g.id	LEFT JOIN m_jenis h ON b.jenis_project = h.id  ";
		$sql		.= "WHERE (a.skema = 1 OR b.skema = 1) AND (b.type_jo='1' AND b.type_new='1') AND (a.persa_sap IS NOT NULL AND a.persa_sap!='') AND e.manar2 IN ($username) $where_clause GROUP BY a.nojo, a.persa_sap ORDER BY a.nojo desc ";
		
		//var_dump($sql);exit();
		$query		= $this->db->query($sql . " LIMIT $start, $length");
		$numrows	= $this->db->query($sql);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $query->result_array(),
			"total_data" => $total
		);
	}
	
	
	function get_datamapping_2($length,$start,$search,$order,$dir)
	{
		$session_data 	= $this->session->userdata('logged_in');
		$username	 	= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR h.nama like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, h.nama as hnama, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, a.n_pic_hi, b.n_project, b.ket_done, a.pic_manar, a.n_pic_manar, a.pic_rekrut, a.n_pic_rekrut, a.pendidikan ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN m_jenis h ON b.jenis_project = h.id ";
		//$query .= "WHERE b.skema = 1 AND b.type_jo='1' AND e.manar='$username' ";
		$query .= "WHERE (a.skema = 1 OR b.skema=1) AND b.type_jo='1' AND e.manar='$username' ";
		$query .= "$where_clause ";
		$query .= "GROUP BY a.nojo ORDER BY a.nojo desc";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);
		
	}
	
	
	
	function listorder_excel($centang){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];

		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.`project`, u.upd, 
		u.level, u.`tanggal`, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.`lokasi`, u.`bekerja`, u.atasan, u.rekrut, u.hr, u.jmluser, 
		u.training, u.note, u.city_name, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.nama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.bskema, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.lama, u.flag_jobs, u.kontrak, u.type_new, u.persa_sap, u.skill_sap, u.jabatan_sap, u.abkrs_sap, u.hire_jabatan_sap, u.tbekerja, u.tyrekrut  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.bekerja, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, h.nama AS ntype, a.pic_hi, b.n_project, b.skema AS bskema, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.lama, a.flag_jobs, a.kontrak, b.type_new, a.persa_sap, a.skill_sap, a.jabatan_sap, a.abkrs_sap, hire_jabatan_sap, a.tgl_bekerja as tbekerja, a.type_rekrut as tyrekrut ";
		$query .= "FROM trans_rincian a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id`  "; 
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` "; 
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN province g ON e.province_id = g.id ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username "; 
		$query .= "INNER JOIN m_type h ON b.type_jo = h.id ";
		//$query .= "WHERE b.approval = 5 and a.flag_app = 1 and ((b.type_jo = '1' AND b.new_rekrut='2') OR (b.type_jo = '2' AND type_replace='2') ) and g.layanan='$layanan' ";
		//$query .= "WHERE b.approval = 5 and a.flag_app = 1 and ( (b.type_jo = '1' AND b.type_new='2' AND (b.new_rekrut='2' OR b.`new_rekrut` IS NULL)) OR (b.type_jo = '2' AND type_replace='2') OR (b.type_jo = '1' AND b.type_new='1') ) ";
		// $query .= "WHERE (b.approval = 5 OR b.approval = 1) and a.flag_app = 1 and (b.type_jo = '1' OR b.type_jo = '2') ";
		$query .= "WHERE (b.approval = 5 OR b.approval = 1) and a.skema = 1 and (b.type_jo = '1' OR b.type_jo = '2') ";
		if($centang==0){
			$query .= "and g.layanan='$layanan' ";
		}
		
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, '' AS skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '' AS `jumlah`, a.nm_area AS `lokasi`, b.`bekerja`, '' AS atasan, '' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, e.city_name, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama, '' AS status_rekrut, '' AS ket_rekrut, h.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS bskema, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.lama, '' as flag_jobs, '' as kontrak, b.type_new, '' as persa_sap, '' as skill_sap, '' as jabatan_sap, '' as abkrs_sap, '' as hire_jabatan_sap, a.tglbekerja as tbekerja, a.type_rep as tyrekrut ";
		$query .= "FROM trans_perner a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  ";
		$query .= "LEFT JOIN province g ON e.province_id = g.id ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type h ON b.type_jo = h.id ";
		//$query .= "WHERE b.approval = 5 and a.flag_app = 1 and ( (b.type_jo = '1' AND b.new_rekrut='2') OR (b.type_jo = '2' AND type_replace='2') ) and g.layanan='$layanan' ";
		//$query .= "WHERE b.approval = 5 and a.flag_app = 1 and ( (b.type_jo = '1' AND b.type_new='2' AND (b.new_rekrut='2' OR b.`new_rekrut` IS NULL)) OR (b.type_jo = '2' AND type_replace='2') OR (b.type_jo = '1' AND b.type_new='1') ) ";
		// $query .= "WHERE (b.approval = 5 OR b.approval = 1) and a.flag_app = 1 and (b.type_jo = '1' OR b.type_jo = '2') ";
		$query .= "WHERE (b.approval = 5 OR b.approval = 1) and a.skema = 1 and (b.type_jo = '1' OR b.type_jo = '2') ";
		if($centang==0){
			$query .= "and g.layanan='$layanan' ";
		}
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		//$query .= "$where_clause ";
		$query .= "ORDER BY u.status_rekrut ASC, u.nojo DESC ";
		
		

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	
	function get_listorder3($length,$start,$search,$order,$dir,$parsearch){
		$session_data 	= $this->session->userdata('logged_in');
		$level	 		= $session_data['level'];
		$layanan	 	= $session_data['layanan'];
		$username 		= $session_data['username'];
		$parstatus		= $parsearch['status'];

		$where_clause="";
/*
		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR a.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
*/
		
		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.city_name like '%".$search."%' ";
		}
		
/*		
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_jobs, a.flag_app, a.ket_rej, b.type_jo, a.status_rekrut, a.ket_rekrut, h.nama as ntype, a.pic_hi, b.n_project, b.skema as bskema, a.pendidikan, a.kontrak, b.type_new, a.persa_sap, a.skill_sap, a.jabatan_sap, a.abkrs_sap, a.hire_jabatan_sap, b.lama ";  
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo "; 
		$query .= "LEFT JOIN province g ON e.province_id = g.id ";
		//$query .= "LEFT JOIN m_login d ON d.layanan = g.layanan ";
		$query .= "LEFT JOIN m_type h ON b.type_jo = h.id ";
		//$query .= "WHERE b.approval = 1 and a.flag_app = 1 and g.layanan='$layanan' $where_clause  ";
		$query .= "WHERE b.approval = 1 and a.flag_app = 1 and (b.type_jo = '1' OR (b.type_jo = '2' AND type_replace='2') ) and g.layanan='$layanan' $where_clause  ";
		//$query .= "$where_clause ";

		if($parstatus == '0'){
			$query .= "AND (a.status_rekrut = '$parstatus' OR a.status_rekrut = '' OR a.status_rekrut = NULL)  ";
		}
		else if($parstatus != ''){
			$query .= "AND a.status_rekrut = '$parstatus' ";
		}

		$query .= "GROUP BY a.id ORDER BY a.status_rekrut ASC, a.nojo DESC ";

		//var_dump($query);exit();
		$Q		= $this->db->query($query . " LIMIT $start, $length");
*/

		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.`project`, u.upd, 
		u.level, u.`tanggal`, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.`lokasi`, u.`bekerja`, u.atasan, u.rekrut, u.hr, u.jmluser, 
		u.training, u.note, u.city_name, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.nama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.bskema, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.lama, u.flag_jobs, u.kontrak, u.type_new, u.persa_sap, u.skill_sap, u.jabatan_sap, u.abkrs_sap, u.hire_jabatan_sap, u.type_replace, u.new_rekrut, u.lup_edit, u.jml_hire, u.tbekerja, u.tyrekrut, u.perner_ganti, u.flag_peralihan, u.rekrutx, u.jml_stop, u.status_pernernewjo  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.bekerja, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, h.nama AS ntype, a.pic_hi, b.n_project, b.skema AS bskema, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.lama, a.flag_jobs, a.kontrak, b.type_new, a.persa_sap, a.skill_sap, a.jabatan_sap, a.abkrs_sap, hire_jabatan_sap, b.type_replace, b.new_rekrut as rekrutx, b.lup_edit, p.jml as jml_hire, a.tgl_bekerja as tbekerja, a.type_rekrut as tyrekrut, '' as perner_ganti, b.flag_peralihan, b.new_rekrut, r.jumlah as jml_stop, (SELECT COUNT(1) FROM perner_newjo WHERE rincid=a.id AND flagrfc='6') AS status_pernernewjo ";
		$query .= "FROM trans_rincian a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id`  "; 
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";  
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo and b.type_jo=c.type_jo ";
		$query .= "LEFT JOIN province g ON e.province_id = g.id ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username "; 
		$query .= "LEFT JOIN m_type h ON b.type_jo = h.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		// $query .= "WHERE b.approval = 5 and a.flag_app = 1 and ((b.type_jo = '1' AND b.type_new='2' AND (b.new_rekrut='2' OR b.`new_rekrut` IS NULL)) OR (b.type_jo = '2' AND type_replace='2') OR (b.type_jo = '1' AND b.type_new='1') ) and g.layanan='$layanan' ";
		// $query .= "WHERE b.approval = 5 and a.flag_app = 1 and (b.type_jo = '1' OR b.type_jo = '2') and g.layanan='$layanan' ";
		// $query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and (b.type_jo = '1' OR b.type_jo = '2') and g.layanan='$layanan' ";
		if($level==18){
			$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' ";
		} else {
			if($username=='7508042' || $username=='8803092'){
				$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' ";
			} else {
				$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and g.layanan='$layanan' ";
			}
		}
		
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '' AS `jumlah`, a.nm_area AS `lokasi`, b.`bekerja`, '' AS atasan, SUM(c.jml_pkwt) AS rekrut, SUM(c.jml_hr) AS hr, SUM(c.jml_user) AS jmluser, SUM(c.jml_training) AS training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, nm_jabatan AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, h.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS bskema, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.lama, '' as flag_jobs, '' as kontrak, b.type_new, a.persa as persa_sap, a.skilllayanan as skill_sap, '' as jabatan_sap, '' as abkrs_sap, '' as hire_jabatan_sap, b.type_replace, b.new_rekrut, b.lup_edit, p.jml as jml_hire, a.tglbekerja as tbekerja, a.type_rep as tyrekrut, a.perner_ganti, b.flag_peralihan, b.type_replace as rekrutx, r.jumlah as jml_stop, a.flagrfc as status_pernernewjo ";
		$query .= "FROM trans_perner a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  ";
		$query .= "LEFT JOIN province g ON e.province_id = g.id ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo and b.type_jo=c.type_jo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type h ON b.type_jo = h.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		// $query .= "WHERE b.approval = 5 and a.flag_app = 1 and ( (b.type_jo = '1' AND b.type_new='2' AND (b.new_rekrut='2' OR b.`new_rekrut` IS NULL)) OR (b.type_jo = '2' AND type_replace='2') OR (b.type_jo = '1' AND b.type_new='1') ) and g.layanan='$layanan' ";
		// $query .= "WHERE b.approval = 5 and a.flag_app = 1 and (b.type_jo = '1' OR b.type_jo = '2') and g.layanan='$layanan' ";
		// $query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and (b.type_jo = '1' OR b.type_jo = '2') and g.layanan='$layanan' ";
		
		if($level==18){
			$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' ";
		} else {
			if($username=='7508042' || $username=='8803092'){
				$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' ";
			} else {
				$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and g.layanan='$layanan' ";
			}
		}
		
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		if($parstatus == '0'){
			$query .= "AND (u.status_rekrut = '$parstatus' OR u.status_rekrut = '' OR u.status_rekrut = NULL)  ";
		}
		else if($parstatus != ''){
			$query .= "AND u.status_rekrut = '$parstatus' ";
		}
		$query .= "ORDER BY u.status_rekrut ASC, u.nojo DESC ";

		//var_dump($query);exit();
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);
	}
	
	/*
	function get_listorder20($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR a.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.skema as bskema, a.pendidikan ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.layanan='$daud' ";
		$query .= "WHERE b.approval = 1 AND d.layanan='$layanan' and d.jabatan='$jabatan' ";
		$query .= "$where_clause ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);
	}
	*/
	
	/*
	function get_listorder20_2($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR a.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, i.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.skema as bskema, a.pendidikan ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN mapping_manar e ON a.`lokasi` = e.`areaid` and e.personalareaid=b.project ";
		$query .= "LEFT JOIN mapping_city i ON i.`city_id` = e.`areaid` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.username='$username' ";
		$query .= "WHERE b.approval = 1 AND e.manar='$username' and (b.type_jo='2' or b.type_jo='4') ";
		$query .= "$where_clause ";
		$query .= "GROUP BY a.id ORDER BY (a.flag_app=0 OR a.flag_app IS NULL) DESC, a.flag_app DESC ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);	
	}
	*/
	
	function get_listorder20($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.`project`, u.upd, 
		u.level, u.`tanggal`, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.`lokasi`, u.`bekerja`, u.atasan, u.rekrut, u.hr, u.jmluser, 
		u.training, u.note, u.city_name, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.nama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.bskema, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.lama, u.type_replace, u.new_rekrut, u.lup_edit, u.jml_hire, u.tbekerja, u.tyrekrut, u.perner_ganti, u.flag_peralihan, u.rekrutx, u.jml_stop, u.status_pernernewjo  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama AS ntype, a.pic_hi, b.n_project, b.skema AS bskema, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.lama, b.type_replace, b.new_rekrut as rekrutx, b.lup_edit, p.jml as jml_hire, a.tgl_bekerja as tbekerja, a.type_rekrut as tyrekrut, '' as perner_ganti, b.flag_peralihan, b.new_rekrut, r.jumlah as jml_stop, (SELECT COUNT(1) FROM perner_newjo WHERE rincid=a.id AND flagrfc='6') AS status_pernernewjo ";
		$query .= "FROM trans_rincian a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id`  "; 
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` "; 
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		$query .= "WHERE (b.approval = '1' OR b.approval = '5') AND (b.upd='$username' OR d.layanan='$layanan' and d.jabatan='$jabatan') ";
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, '' AS skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '' AS `jumlah`, a.nm_area AS `lokasi`, b.`bekerja`, '' AS atasan, '' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, e.city_name, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama, '' AS status_rekrut, '' AS ket_rekrut, g.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS bskema, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.lama, b.type_replace as rekrutx, b.new_rekrut, b.lup_edit, p.jml as jml_hire, a.tglbekerja as tbekerja, a.type_rep as tyrekrut, a.perner_ganti, b.flag_peralihan, b.type_replace, r.jumlah as jml_stop, a.flagrfc as status_pernernewjo ";
		$query .= "FROM trans_perner a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		$query .= "WHERE (b.approval = '1' OR b.approval = '5') AND (b.upd='$username' OR d.layanan='$layanan' and d.jabatan='$jabatan') ";
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		$query .= "ORDER BY u.nojo desc ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);
	}
	
	function get_listorder_mgrenterprise($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$this->db3 = $this->load->database('db_third',TRUE);
		$cekid_client = $this->db3->query("SELECT GROUP_CONCAT(id) as kumpid FROM ish_salesfunnel.new_customer WHERE manager_enterprise='$username' ")->row();
		
		$this->db = $this->load->database('default',TRUE);
		
		$where_clause="";
		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.city_name like '%".$search."%' OR u.tanggal like '%".$search."%' ";
		}
		
		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.`project`, u.upd, 
		u.level, u.tanggal, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.`lokasi`, u.`bekerja`, u.atasan, u.rekrut, u.hr, u.jmluser, 
		u.training, u.note, u.city_name, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.nama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.bskema, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.lama, u.type_replace, u.new_rekrut, u.lup_edit, u.jml_hire, u.tbekerja, u.tyrekrut, u.perner_ganti, u.flag_peralihan, u.rekrutx, u.jml_stop, u.status_pernernewjo  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, i.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama AS ntype, a.pic_hi, b.n_project, b.skema AS bskema, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.lama, b.type_replace, b.new_rekrut as rekrutx, b.lup_edit, p.jml as jml_hire, a.tgl_bekerja as tbekerja, a.type_rekrut as tyrekrut, '' as perner_ganti, b.flag_peralihan, b.new_rekrut, r.jumlah as jml_stop, (SELECT COUNT(1) FROM perner_newjo WHERE rincid=a.id AND flagrfc='6') AS status_pernernewjo ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN mapping_manar e ON a.`lokasi` = e.`areaid` and e.personalareaid=b.project ";
		$query .= "LEFT JOIN mapping_city i ON i.`city_id` = e.`areaid` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		// $query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		// $query .= "WHERE (b.approval = '1' OR b.approval = '5') AND e.manar='$username' and (b.type_jo='2' or b.type_jo='4') ";
		$query .= "WHERE (b.approval = '1' OR b.approval = '5') AND b.kode_cust IN ($cekid_client->kumpid) ";
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, '' AS skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '1' AS `jumlah`, a.nm_area AS `lokasi`, b.`bekerja`, '' AS atasan, '' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, i.city_name, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama, '' AS status_rekrut, '' AS ket_rekrut, g.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS bskema, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.lama, b.type_replace, b.new_rekrut, b.type_replace as rekrutx, b.lup_edit, p.jml as jml_hire, a.tglbekerja as tbekerja, a.type_rep as tyrekrut, a.perner_ganti, b.flag_peralihan, r.jumlah as jml_stop, a.flagrfc as status_pernernewjo ";
		$query .= "FROM trans_perner a  ";
		//$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN mapping_manar e ON a.`area` = e.`areaid` and e.personalareaid=b.project ";
		$query .= "LEFT JOIN mapping_city i ON i.`city_id` = e.`areaid` ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		$query .= "WHERE (b.approval = '1' OR b.approval = '5') AND b.kode_cust IN ($cekid_client->kumpid) ";
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		$query .= "Order By (u.flag_app=0 OR u.flag_app IS NULL) DESC, u.flag_app DESC ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);	
	}
	
	function get_listorder20_2($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.city_name like '%".$search."%' OR u.tanggal like '%".$search."%' ";
		}
		
		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.`project`, u.upd, 
		u.level, u.tanggal, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.`lokasi`, u.`bekerja`, u.atasan, u.rekrut, u.hr, u.jmluser, 
		u.training, u.note, u.city_name, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.nama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.bskema, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.lama, u.type_replace, u.new_rekrut, u.lup_edit, u.jml_hire, u.tbekerja, u.tyrekrut, u.perner_ganti, u.flag_peralihan, u.rekrutx, u.jml_stop, u.status_pernernewjo  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, i.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama AS ntype, a.pic_hi, b.n_project, b.skema AS bskema, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.lama, b.type_replace, b.new_rekrut as rekrutx, b.new_rekrut, b.lup_edit, p.jml as jml_hire, a.tgl_bekerja as tbekerja, a.type_rekrut as tyrekrut, '' as perner_ganti, r.jumlah as jml_stop, b.flag_peralihan, (SELECT COUNT(1) FROM perner_newjo WHERE rincid=a.id AND flagrfc='6') AS status_pernernewjo ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN mapping_manar e ON a.`lokasi` = e.`areaid` and e.personalareaid=b.project ";
		$query .= "LEFT JOIN mapping_city i ON i.`city_id` = e.`areaid` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		// $query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		// $query .= "WHERE (b.approval = '1' OR b.approval = '5') AND e.manar='$username' and (b.type_jo='2' or b.type_jo='4') ";
		$query .= "WHERE (b.approval = '1' OR b.approval = '5') AND (b.upd='$username' OR d.layanan='$layanan' and d.jabatan='$jabatan') ";
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, '' AS skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '' AS `jumlah`, a.nm_area AS `lokasi`, b.`bekerja`, '' AS atasan, '' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, i.city_name, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama, '' AS status_rekrut, '' AS ket_rekrut, g.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS bskema, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.lama, b.type_replace, b.type_replace as rekrutx, b.new_rekrut, b.lup_edit, p.jml as jml_hire, a.tglbekerja as tbekerja, a.type_rep as tyrekrut, a.perner_ganti, r.jumlah as jml_stop, b.flag_peralihan, a.flagrfc as status_pernernewjo ";
		$query .= "FROM trans_perner a  ";
		//$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN mapping_manar e ON a.`area` = e.`areaid` and e.personalareaid=b.project ";
		$query .= "LEFT JOIN mapping_city i ON i.`city_id` = e.`areaid` ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		$query .= "WHERE (b.approval = '1' OR b.approval = '5') AND (b.upd='$username' OR d.layanan='$layanan' and d.jabatan='$jabatan') ";
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		$query .= "Order By (u.flag_app=0 OR u.flag_app IS NULL) DESC, u.flag_app DESC ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);	
	}
	
	
	function get_listorder21($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR a.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.skema as bskema, a.pendidikan ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.layanan='$daud' ";
		$query .= "WHERE b.approval = 1 AND d.username='$username' ";
		$query .= "$where_clause ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	/*
	function get_listorder1($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR a.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.skema as bskema, a.pendidikan ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.username='$username' ";
		$query .= "WHERE b.approval = 1 AND d.username='$username' ";
		$query .= "$where_clause ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	*/
	
	
	function get_listorder1($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.`project`, u.upd, 
		u.level, u.`tanggal`, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.`lokasi`, u.bekerja, u.atasan, u.rekrut, u.hr, u.jmluser, 
		u.training, u.note, u.city_name, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.nama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.bskema, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.lama, u.type_replace, u.new_rekrut, u.lup_edit, u.jml_hire, u.tbekerja, u.tyrekrut, u.perner_ganti, u.flag_peralihan, u.rekrutx, u.jml_stop, u.type_new, u.status_pernernewjo  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, b.`nojo`, a.komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama AS ntype, a.pic_hi, b.n_project, b.skema AS bskema, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.lama, b.type_replace, b.new_rekrut as rekrutx, b.new_rekrut, b.lup_edit, p.jml as jml_hire, a.tgl_bekerja as tbekerja, a.type_rekrut as tyrekrut, '' as perner_ganti, r.jumlah as jml_stop, b.flag_peralihan, b.type_new, (SELECT COUNT(1) FROM perner_newjo WHERE rincid=a.id AND flagrfc='6') AS status_pernernewjo ";
		$query .= "FROM trans_jo b  ";
		$query .= "LEFT JOIN trans_rincian a ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id`  "; 
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` "; 
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		$query .= "WHERE (b.approval = '1' OR b.approval = '5') AND d.username='$username' ";
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		/* Awalnya '' as skema */
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, a.skema AS skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '' AS `jumlah`, a.nm_area AS `lokasi`, b.`bekerja`, '' AS atasan, '' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, e.city_name, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama, '' AS status_rekrut, '' AS ket_rekrut, g.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS bskema, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.lama, b.type_replace as rekrutx, b.type_replace, b.new_rekrut, b.lup_edit, p.jml as jml_hire, a.tglbekerja as tbekerja, a.type_rep as tyrekrut, a.perner_ganti, r.jumlah as jml_stop, b.flag_peralihan, b.type_new, a.flagrfc as status_pernernewjo ";
		$query .= "FROM trans_perner a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		$query .= "WHERE (b.approval = '1' OR b.approval = '5') AND d.username='$username' ";
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		$query .= "ORDER BY u.nojo desc ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function get_transall_craeter($username){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.username='$username' ";
		$query .= "WHERE b.approval = 1 AND d.username='$username' ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	/*
	function get_listorder4($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR a.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, b.skema as bskema, a.pendidikan ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		//$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON e.manar = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 AND d.username='$username' ";
		$query .= "WHERE b.approval = 1 AND e.manar='$username'  ";
		$query .= "$where_clause ";
		$query .= "GROUP BY a.id ORDER BY (a.flag_app=0 OR a.flag_app IS NULL) DESC, a.flag_app DESC ";
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	*/
	
	function get_listorder4($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND u.bnojo like '%".$search."%' OR u.project like '%".$search."%' OR u.lokasi like '%".$search."%' OR u.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT REPLACE(u.komponen, ' ', '_') AS komponen, u.id, u.`nojo`, u.komentar, u.skema, u.`project`, u.upd, 
		u.level, u.`tanggal`, u.latihan, u.`jabatan`, u.`gender`, u.`jumlah`, u.`lokasi`, u.`bekerja`, u.atasan, u.rekrut, u.hr, u.jmluser, 
		u.training, u.note, u.city_name, u.name_job_function, u.ket_cancel, u.flag_cancel, u.flag_cancel_sap, u.flag_app, u.ket_rej, u.type_jo, u.nama, u.status_rekrut, 
		u.ket_rekrut, u.ntype, u.pic_hi, u.n_project, u.bskema, u.pendidikan, u.perner, u.anama, u.area, u.nm_area, u.bnojo, u.lama, u.type_replace, u.new_rekrut, u.finish_view_manar, u.lup_edit, u.tbekerja, u.tyrekrut, u.perner_ganti, u.flag_peralihan, u.rekrutx, u.jml_stop, u.status_pernernewjo, u.jml_hire  ";
		$query .= "FROM ( ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req WHERE c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama AS ntype, a.pic_hi, b.n_project, b.skema AS bskema, a.pendidikan, '' AS perner, '' AS anama, '' AS AREA, '' AS nm_area, b.nojo AS bnojo, b.lama, b.type_replace, b.new_rekrut, a.finish_view_manar, b.lup_edit, a.tgl_bekerja as tbekerja, a.type_rekrut as tyrekrut, '' as perner_ganti, r.jumlah as jml_stop, b.flag_peralihan, b.new_rekrut as rekrutx, (SELECT COUNT(1) FROM perner_newjo WHERE rincid=a.id AND flagrfc='6') AS status_pernernewjo, p.jml as jml_hire  ";
		$query .= "FROM trans_rincian a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id`  "; 
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` "; 
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username "; 
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		// $query .= "WHERE b.approval = '5' AND e.manar='$username' ";
		if($username=='8608044' or $username=='7808046'){
			// $query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and (b.type_jo = '1' OR b.type_jo = '2') ";
			$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' ";
		} else {
			// $query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and (b.type_jo = '1' OR b.type_jo = '2') and e.manar='$username' ";
			$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and e.manar='$username' ";
		}
		
		$query .= "GROUP BY a.id ";
		$query .= "UNION ALL ";
		$query .= "SELECT REPLACE(b.komponen, ' ', '_') AS komponen, a.id, a.`nojo`, '' AS komentar, '' AS skema, b.`project`, (SELECT nama FROM m_login WHERE m_login.username=b.upd) AS upd, d.level, b.`tanggal`, b.latihan, '' AS `jabatan`, '' AS gender, '' AS `jumlah`, a.nm_area AS `lokasi`, b.`bekerja`, '' AS atasan, '' AS rekrut, '' AS hr, '' AS jmluser, '' AS training, '' AS note, e.city_name, '' AS name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, '' AS ket_rej, b.type_jo, d.nama, '' AS status_rekrut, '' AS ket_rekrut, g.nama AS ntype, '' AS pic_hi, a.nm_persa as n_project, b.skema AS bskema, '' AS pendidikan, a.perner, a.nama AS anama, a.area, a.nm_area, b.nojo AS bnojo, b.lama, b.type_replace, b.new_rekrut, a.finish_view_manar, b.lup_edit, a.tglbekerja as tbekerja, a.type_rep as tyrekrut, a.perner_ganti, r.jumlah as jml_stop, b.flag_peralihan, b.type_replace as rekrutx, a.flagrfc as status_pernernewjo, p.jml as jml_hire ";
		$query .= "FROM trans_perner a  ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id`  ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN m_login d ON b.upd = d.username ";
		$query .= "LEFT JOIN m_type g ON b.type_jo = g.id ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs p ON r.id=p.recruitreqid  ";
		// $query .= "WHERE b.approval = '5' AND e.manar='$username' ";
		if($username=='8608044' or $username=='7808046'){
			// $query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and (b.type_jo = '1' OR b.type_jo = '2') ";
			$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' ";
		} else {
			// $query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and (b.type_jo = '1' OR b.type_jo = '2') and e.manar='$username' ";
			$query .= "WHERE (b.approval = '5' OR b.approval = '1') and a.skema='1' and e.manar='$username' ";
		}
		
		$query .= "GROUP BY a.id ";
		$query .= ") AS u ";
		$query .= "WHERE u.bnojo!='' ";
		$query .= "$where_clause ";
		if($username=='8608044' or $username=='7808046'){
			$query .= "ORDER BY u.nojo DESC ";
		} else {
			$query .= "ORDER BY u.nojo DESC ";
			// $query .= "ORDER BY (u.flag_app=0 OR u.flag_app IS NULL) DESC, u.flag_app DESC ";
		}
		
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	
	/*
	function get_listorder_lain($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR b.project like '%".$search."%' OR b.n_project like '%".$search."%' OR a.lokasi like '%".$search."%' OR e.city_name like '%".$search."%' ";
		}
		
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, (select nama from m_login where m_login.username=b.upd) as upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, SUM(c.jml_training) training, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap, a.flag_app, a.ket_rej, b.type_jo, d.nama, a.status_rekrut, a.ket_rekrut, g.nama as ntype, a.pic_hi, b.n_project, a.pendidikan ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.username ";
		$query .= "INNER JOIN m_type g ON b.type_jo = g.id ";
		//$query .= "WHERE b.approval_admin = 1 ";
		$query .= "WHERE b.approval = 1 ";
		$query .= "$where_clause ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	*/
	
	function get_transall_sap_sk_app_ops($search, $username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') AND b.username='$username' ";
		
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		// var_dump($query);die;
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function vget_transall_sap_sk_app_ops($search, $username){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '5' AND b.username='$username' and variabel='1' ";
		
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_transall_sap_sk_app_ops_2($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.n_area like '%".$search."%' OR a.n_perar like '%".$search."%' ";
		}
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' AND b.username='$username' ";
		$query .= "$where_clause ";
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function get_transall_sap_sk_app($search, $daud, $jbt){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') AND b.layanan='$daud' and b.jabatan='$jbt' ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	function vget_transall_sap_sk_app($search, $daud, $jbt){
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '5' AND b.layanan='$daud' and b.jabatan='$jbt' and variabel='1' ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function get_transall_sap_sk_app_2($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.n_area like '%".$search."%' OR a.n_perar like '%".$search."%' ";
		}
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' AND b.layanan='$layanan' and b.jabatan='$jabatan' ";
		$query .= "$where_clause ";
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);		
	}
	
	
	function get_transall_sap_sk_manarenterprise($username){
		$this->db3 = $this->load->database('db_third',TRUE);
		$cekid_client = $this->db3->query("SELECT GROUP_CONCAT(id) as kumpid FROM ish_salesfunnel.new_customer WHERE manager_enterprise='$username' ")->row();
		
		$this->db = $this->load->database('default',TRUE);
		
		$data			= array();
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') and a.kd_cust IN ($cekid_client->kumpid) ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		//$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar=0 desc, a.flag_manar desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function get_transall_sap_sk_manar_2($search, $username){
		$data			= array();
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_manar e ON a.`area` = e.`areaid` and e.personalareaid=a.perar ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') and e.manar = '$username' ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		//$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar=0 desc, a.flag_manar desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	function vget_transall_sap_sk_manar_2($search, $username){
		$data			= array();
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_manar e ON a.`area` = e.`areaid` and e.personalareaid=a.perar ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		$query .= "WHERE a.flag_approval = '5' and e.manar = '$username' and variabel='1' ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		//$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar=0 desc, a.flag_manar desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function get_transall_sap_sk_manar_22($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.n_area like '%".$search."%' OR a.n_perar like '%".$search."%' ";
		}
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_manar e ON a.`area` = e.`areaid` and e.personalareaid=a.perar ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' and e.manar = '$username' ";
		$query .= "$where_clause ";
		//$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar=0 desc, a.flag_manar desc ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);	
	}
	
	
	
	function get_transall_sap_sk_creater($search, $username){
		$data			= array();
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') and b.username='$username' ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function vget_transall_sap_sk_creater($search, $username){
		$data			= array();
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '5' and b.username='$username' and variabel='1' ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function get_transall_sap_sk_creater2($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.n_area like '%".$search."%' OR a.n_perar like '%".$search."%' ";
		}
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' and b.username='$username' ";
		$query .= "$where_clause ";
		$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar, a.area, a.perar asc ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);		
	}
	
	
	
	function get_transall_sap_sk_manar($search, $username){
		$data			= array();
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id` ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		$query .= "WHERE (a.flag_approval = '5' OR a.flag_approval = '1') and a.flag_skema='1' and e.manar = '$username' AND variabel IS NULL ";
		// $query .= "WHERE e.manar = '$username' AND variabel IS NULL ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		//$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar=0 desc, a.flag_manar desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	function vget_transall_sap_sk_manar($search, $username){
		$data			= array();
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar, a.ket_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id` ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		$query .= "WHERE a.flag_approval = '5' and e.manar = '$username' and a.variabel='1' ";
		if($search!='')
		{
			$query .= "AND (a.nojo like '%$search%' OR a.n_area like '%$search%' OR a.n_perar like '%$search%') ";
		}
		//$query .= "Group By a.nojo ";
		$query .= "Order By a.id desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	
	
	
	function get_transall_sap_sk_manar2($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " and a.nojo like '%".$search."%' OR a.n_area like '%".$search."%' OR a.n_perar like '%".$search."%' ";
		}
		
		$query = "SELECT a.id, a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, (select nama from m_login where m_login.username=a.upd) as nama, a.lup, a.flag_approval, a.ket_reject, a.flag_skema, a.flag_cancel_sap, a.ket_cancel, a.flag_manar FROM trans_skema a ";
		$query .= "LEFT JOIN mapping_city e ON a.`area` = e.`city_id` ";
		$query .= "LEFT JOIN m_login b ON e.`manar` = b.`username` ";
		$query .= "WHERE a.flag_approval = '1' and e.manar = '$username' ";
		$query .= "$where_clause ";
		//$query .= "Group By a.nojo ";
		$query .= "Order By a.flag_manar=0 desc, a.flag_manar desc ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);		
	}
	
	
	function inssimpanskema_2($putih){
		//$this->db3 = $this->load->database('db_third',TRUE);
		$this->db->insert('trans_sap_hiring',$putih);
	}
	
	
	function simpan_data_emp($item){
		$this->db->insert('trans_gojobs',$item);
	}	
	
	
	function simpan_req($item1){
		$this->db->insert('trans_req',$item1);
	}	
	
	
	function edit_req($item2, $id){
		$this->db->where($id);
		$this->db->update('trans_req',$item2);
	}
	
	
	/*
	function detail_komp($anojo, $alokasi, $ajabatan){
		$data			= array();
		$query = "SELECT * FROM trans_komponen a ";
		$query .= "WHERE a.nojo = '$anojo' and a.area = '$alokasi' and a.jabatan='$ajabatan' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	}
	*/
	
	
	function save_dethr($item){
		$this->db->insert('detail_trans_hr',$item);
	}
	
	function edit_dethr($item, $putih){
		$this->db->where($putih);
		$this->db->update('detail_trans_hr',$item);
	}
	
	function save_dettrain($item){
		$this->db->insert('detail_trans_training',$item);
	}
	
	function edit_dettrain($item, $putih){
		$this->db->where($putih);
		$this->db->update('detail_trans_training',$item);
	}
	
	function save_detuser($item){
		$this->db->insert('detail_trans_user',$item);
	}
	
	function edit_detuser($item, $putih){
		$this->db->where($putih);
		$this->db->update('detail_trans_user',$item);
	}
	
	function inserttransops($item){
		$this->db->insert('trans_ops',$item);
	}
	
	function edittransops($item, $putih){
		$this->db->where($putih);
		$this->db->update('trans_ops',$item);
	}
	
	function app_ops($item, $putih){
		$this->db->where($putih);
		$this->db->update('trans_ops',$item);
	}
	
	function save_file($itemx){
		$this->db->insert('file_trans_ops',$itemx);
	}
	
	
	function update_file_pro($item, $putih){
		$this->db->where($putih);
		$this->db->update('trans_proc',$item);
	}
	
	
	function app_pro($item, $putih){
		$this->db->where($putih);
		$this->db->update('trans_proc',$item);
	}
	
	function save_lengkap_doc($item){
		$this->db->insert('trans_doc_lengkap',$item);
	}
	
	function save_pks($item){
		$this->db->insert('trans_pks',$item);
	}
	
	function inserttransfin($item){
		$this->db->insert('trans_fin',$item);
	}
	
	function save_file_fin($itemx){
		$this->db->insert('file_trans_fin',$itemx);
	}
	
	function save_lengkap_lpp($item){
		$this->db->insert('trans_doc_lengkap_lpp',$item);
	}
	
	function edit_lengkap_doc($item, $putih){
		$this->db->where($putih);
		$this->db->update('trans_doc_lengkap',$item);
	}
	
	function save_hire($putih){
		$this->db->insert('trans_hire',$putih);
	}
	
	
	
	function kompz_edit($putih,$putih1){
		$this->db->where($putih);
		$this->db->update('trans_komponen',$putih1);
	}
	
	
	function get_transappjopm($length,$start,$search,$order,$dir){
		$session_data 	= $this->session->userdata('logged_in');
		$layanan	 	= $session_data['layanan'];
		$jabatan	 	= $session_data['jabatan'];
		$username 		= $session_data['username'];
		
		$where_clause="";

		if($search != ""){
			$where_clause .= " AND (a.nojo like '%".$search."%' OR a.project like '%".$search."%' OR a.n_project like '%".$search."%') ";
		}
		//$data			= array();
		$query = "SELECT a.nojo, a.tanggal, a.project, a.syarat, a.deskripsi, a.bekerja, a.upd, a.lup, a.approval, a.approval_admin, a.komponen, ket_atasan, ket_admin, a.type_jo, a.type_replace, b.nama as nupd, a.type_new, a.n_project, c.nama as ntype_jo, (SELECT doc_id FROM trans_doc WHERE trans_doc.`nojo`=a.`nojo`) AS doc_id FROM trans_jo a ";
		//$query .= "LEFT JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "left JOIN m_type c ON a.`type_jo` = c.`id` ";
		$query .= "WHERE a.nojo!='' and (a.approval='1' OR a.approval='5' OR a.approval='2') ";
		$query .= "$where_clause ";
		$query .= "order by a.approval ASC, a.nojo DESC ";
		$Q		= $this->db->query($query . " LIMIT $start, $length");
		
		$numrows	= $this->db->query($query);
		$total		= $numrows->num_rows();
		
		return array(
			"data"		 => $Q->result_array(),
			"total_data" => $total
		);			
	}
	
	
	function inssimpantjo_pm($njok, $keter, $tjo, $trep, $tjen){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 			= $session_data['username'];
		
		//var_dump($njok);var_dump($keter);var_dump($tjo);var_dump($trep);exit(); 
		//var_dump($tjen);exit();
		if($tjo==2)
		{
			if($trep==1)
			{
				$update	= array (
					'approval' => 5,
					'approval_admin' => 1,
					'ket_atasan' => $keter 
				);
				
				$this->db->where('nojo',$njok);
				$this->db->update('trans_jo', $update);
				
				if($tjen=='Rep'){
					$updatex = array (
						'flag_app'		 => 1
					);
					
					$this->db->where('nojo',$njok);
					$this->db->update('trans_perner', $updatex);
				} else {
					$updatex = array (
						'flag_app'		 => 1
					);
					
					$this->db->where('nojo',$njok);
					$this->db->update('trans_rincian', $updatex);
				}
				
			}
			else
			{
				$update	= array (
					'approval' => 5,
					'approval_admin' => 1,
					'ket_atasan' => $keter 
				);
				
				$this->db->where('nojo',$njok);
				$this->db->update('trans_jo', $update);
			}
		}
		else
		{
			$update	= array (
				'approval' => 5,
				'approval_admin' => 1,
				'ket_atasan' => $keter 
			);
			
			$this->db->where('nojo',$njok);
			$this->db->update('trans_jo', $update);
		}
		
	}
	
	
	function get_email_pm(){
		$data 	= array();
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		// $query		  = "SELECT email from m_login a where a.type='PM' ";
		$query		  = "SELECT email from m_login where level='5' and regional!='1' and is_active='1' GROUP BY email ";
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		return $data;
	}
	
	
	function newget_email_pm(){
		$data 	= array();
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		// $query		  = "SELECT email from m_login a where a.type='PM' ";
		$query		  = "SELECT email from m_login where level='5' and type='PPC' and regional!='1' and is_active='1' GROUP BY email ";
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		return $data;
	}
	
	
	
	function get_transappjo_skemapm(){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_cancel_sap FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE (a.flag_approval = '1' OR a.flag_approval = '5' OR a.flag_approval = '2') AND variabel IS NULL  ";
		$query .= "group by a.nojo ";
		//$query .= "Order By a.flag_approval=0 desc, a.flag_approval desc";
		$query .= "Order By a.flag_approval asc, a.nojo desc";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function vget_transappjo_skemapm(){
		$data			= array();
		$query = "SELECT a.nojo, a.n_area, a.n_perar, a.area, a.perar, a.dokumen_skema as skema, a.dokumen_bak as bak, a.dokumen_other as other, b.nama, a.lup, a.flag_approval, a.ket_reject, a.flag_cancel_sap, a.flag_skema, a.lupapp_skema, a.tgl_input,  ";
		$query .= "(select nama from m_login where m_login.username=a.upd_skema) as npm ";
		$query .= "FROM trans_skema a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`username` ";
		$query .= "WHERE variabel='1'  ";
		$query .= "group by a.nojo ";
		//$query .= "Order By a.flag_approval=0 desc, a.flag_approval desc";
		$query .= "Order By a.flag_approval asc, a.nojo desc";
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function inssimpantjo_skpm($njok,$keter,$wkwk){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		if($wkwk=='1'){
			$update	= array (
				'flag_approval' => 5,
				'ket_reject' => $keter,
				'upd_approval' => $data['username']
			);
		}
		else {
			$update	= array (
				'flag_approval' => 5,
				'flag_manar' => 1,
				'ket_manar' => $keter,
				'upd_manar' => $data['username']
			);
		}
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_skema', $update);
		
	}

	
	function update_view($nid, $tipe){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		
		$update	= array (
			'finish_view_manar' => 1
		);
		
		$this->db->where('id',$nid);
		
		if($tipe==1){
			$this->db->update('trans_rincian', $update);
		} else {
			$this->db->update('trans_perner', $update);
		}
		
	}	
	
	
	function view_train($njo){
		$data			= array();
		$query = "SELECT a.train_soft, a.train_hard, a.tendem_pasif, a.tendem_aktif FROM trans_rincian a ";
		$query .= "WHERE a.id='$njo'  ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function erinc_edit($putih,$putih1){
		$this->db->where($putih);
		$this->db->update('trans_rincian',$putih1);
	}
	
	
	function report_excel($tgc1, $tgc2, $pm, $stat, $cnobak,$cpro,$clok,$ccre,$cnoj,$username,$level,$reg){
		$data			= array();
		$query = "Select u.nama_cust, u.project, u.n_project, u.nojo, u.no_bak, u.type_jo, u.type_new, u.type_replace, u.new_rekrut, u.city_name, u.nama, u.lup, u.tgl_create, ";
		$query .= "u.lama, u.jumlah, u.skema, u.approval, u.jenis_captive, u.lup_skema, u.flag_cancel_sap, u.skemax, u.flag_cancel, u.jabatan, u.jabatanx, u.id_hire, u.jml_hire, u.userpm, u.nuserpm, u.bekerja, u.zparam, u.lup_edit, u.lupapp_atasan, u.lup_newrej, u.alup_edit, u.kunci_tgl_create, u.fstatus_rekrut, u.jml_stop, u.id, u.atrek, u.bekerja_rincian, u.perner_ganti, u.status_pernernewjo, u.rfc_rotasi, u.jml_candidate, u.remarks  ";
		$query .= "From ( ";
		$query .= "SELECT d.nama_cust, d.project, d.n_project, d.nojo, d.no_bak, d.type_jo, d.type_new, d.type_replace, d.new_rekrut, c.value2 as city_name, e.nama, a.lup, ";
		$query .= "d.lama, a.jumlah, a.skema, d.approval, d.jenis_captive, a.lup_skema, d.flag_cancel_sap, d.skema as skemax, d.flag_cancel, a.jabatan as jabatanx, b.name_job_function as jabatan, a.id, f.id AS id_hire, g.jml as jml_hire, d.tanggal as tgl_create, a.userpm, (select nama from m_login where m_login.username=a.userpm) as nuserpm, d.bekerja, a.zparam, d.lup_edit, d.lupapp_atasan, a.lup_newrej, a.lup_edit as alup_edit, a.kunci_tgl_create, f.status_rekrut as fstatus_rekrut, f.jumlah as jml_stop, a.type_rekrut as atrek, a.tgl_bekerja as bekerja_rincian, '' as perner_ganti, (SELECT COUNT(1) FROM perner_newjo WHERE rincid=a.id AND flagrfc='6') AS status_pernernewjo, '' as rfc_rotasi, (select jml_candidate from rincian_gojobs where recruitreqid=f.id) as jml_candidate, (SELECT remarks FROM reason_stop_gojobs WHERE recruitreqid=f.id order by id_changerequestjo DESC LIMIT 1) AS remarks ";
		// $query .= "(SELECT id FROM trans_rincian_rekrut WHERE typejo='1' AND trans_rincian_rekrut.idpktable=a.id) AS id_hire  ";
		$query .= "FROM trans_rincian a  ";
		$query .= "LEFT JOIN job_function b ON a.jabatan=b.id  ";
		// $query .= "LEFT JOIN mapping_city c ON a.lokasi=c.city_id  ";
		$query .= "LEFT JOIN saparea c ON a.lokasi=c.value1  ";
		$query .= "LEFT JOIN trans_jo d ON a.nojo=d.nojo  ";
		// $query .= "LEFT JOIN m_login e ON a.upd=e.username  ";
		$query .= "LEFT JOIN m_login e ON a.upd=e.username  ";
		$query .= "LEFT JOIN (SELECT z.id, z.idpktable, z.status_rekrut, z.jumlah FROM trans_rincian_rekrut z WHERE typejo='1') f ON f.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs g ON f.id=g.recruitreqid  ";
		$query .= "WHERE d.approval IN (1,5)   ";
		if($level==1 || ($level==2 && $reg==1)){
			$query .= "AND a.upd='$username'   ";
		}
		if($level==2 && ($reg==0 || $reg==null) ){
			$query .= "AND e.layanan='$layanan' and e.jabatan='$jabatan'   ";
		}
		$query .= "GROUP BY a.id ";   
		$query .= "UNION ALL ";
		$query .= "SELECT d.nama_cust, a.nm_persa as project, d.n_project, d.nojo, d.no_bak, d.type_jo, d.type_new, d.type_replace, d.new_rekrut, a.nm_area as city_name, e.nama, a.lup, ";
		$query .= "d.lama, '1' as jumlah, a.skema, d.approval, d.jenis_captive, a.lup_skema, d.flag_cancel_sap, d.skema as skemax, d.flag_cancel, a.perner as jabatan, '' as jabatanx, a.id, f.id AS id_hire, g.jml as jml_hire, d.tanggal as tgl_create, a.userpm, (select nama from m_login where m_login.username=a.userpm) as nuserpm, d.bekerja, '-' as zparam, d.lup_edit, d.lupapp_atasan, a.lup_newrej, a.lup_edit as alup_edit, a.kunci_tgl_create, f.status_rekrut as fstatus_rekrut, f.jumlah as jml_stop, a.type_rep as atrek, a.tglbekerja as bekerja_rincian, a.perner_ganti, '' as status_pernernewjo, (select flagrfc from trans_perner_ganti Where nojo=a.nojo and perner_resrot=a.perner and perner_ganti=a.perner_ganti order by id asc limit 1) as rfc_rotasi, (select jml_candidate from rincian_gojobs where recruitreqid=f.id) as jml_candidate, (SELECT remarks FROM reason_stop_gojobs WHERE recruitreqid=f.id order by id_changerequestjo DESC LIMIT 1) AS remarks ";
		// $query .= "(SELECT id FROM trans_rincian_rekrut WHERE typejo='2' AND trans_rincian_rekrut.idpktable=a.id) AS id_hire  ";
		$query .= "FROM trans_perner a  ";
		$query .= "LEFT JOIN mapping_city c ON a.`area` = c.`city_id`  ";  
		$query .= "LEFT JOIN trans_jo d ON a.nojo=d.nojo  ";
		// $query .= "LEFT JOIN m_login e ON a.upd=e.username  ";
		$query .= "LEFT JOIN m_login e ON a.upd=e.username  ";
		$query .= "LEFT JOIN (SELECT z.id, z.idpktable, z.status_rekrut, z.jumlah FROM trans_rincian_rekrut z WHERE typejo='2') f ON f.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs g ON f.id=g.recruitreqid  ";
		$query .= "WHERE d.approval IN (1,5)   ";
		if($level==1 || ($level==2 && $reg==1)){
			$query .= "AND a.upd='$username' ";
		}
		if($level==2 && ($reg==0 || $reg==null) ){
			$query .= "AND e.layanan='$layanan' and e.jabatan='$jabatan'   ";
		}
		$query .= "GROUP BY a.id ";
		$query .= ") u ";
		$query .= "Where u.tgl_create between '$tgc1' and '$tgc2' ";
		
		if($stat!=''){
			if($stat==1){
				$query .= "AND (skema=1 OR skemax=1)  ";
			} else if($stat==3){
				$query .= "AND (flag_cancel=1 OR flag_cancel_sap=1) ";
			} else if($stat==2) {
				$query .= "AND (skema!=1 OR skemax!=1) AND (flag_cancel!=1 OR flag_cancel_sap!=1)  ";
			}
		}
		
		if($pm!=''){
			$query .= "AND u.userpm='$pm' ";
		}
		if($cnobak!=''){
			$query .= "AND u.no_bak like '%".$cnobak."%' ";
		}
		if($cpro!=''){
			$query .= "AND (u.n_project like '%".$cpro."%' OR u.project like '%".$cpro."%') ";
		}
		if($clok!=''){
			$query .= "AND u.city_name like '%".$clok."%' ";
		}
		if($ccre!=''){
			$query .= "AND u.nama like '%".$ccre."%' ";
		}
		
		// var_dump($query);die;
				
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		
		return $data;
	}
	
	
	function report_excelrek($tgc1, $tgc2, $pm, $stat, $cnobak,$cpro,$clok,$ccre,$cnoj){
		$data			= array();
		$query = "Select u.nama_cust, u.project, u.n_project, u.nojo, u.no_bak, u.type_jo, u.type_new, u.type_replace, u.new_rekrut, u.city_name, u.nama, u.lup, u.tgl_create, ";
		$query .= "u.lama, u.jumlah, u.skema, u.approval, u.jenis_captive, u.lup_skema, u.flag_cancel_sap, u.skemax, u.flag_cancel, u.jabatan, u.jabatanx, u.id_hire, u.jml_hire, u.userpm, u.nuserpm, u.bekerja, u.zparam, u.lup_edit, u.lupapp_atasan, u.lup_newrej, u.alup_edit, u.kunci_tgl_create, u.fstatus_rekrut, u.jml_stop  ";
		$query .= "From ( ";
		$query .= "SELECT d.nama_cust, d.project, d.n_project, d.nojo, d.no_bak, d.type_jo, d.type_new, d.type_replace, d.new_rekrut, c.city_name, e.nama, a.lup, ";
		$query .= "d.lama, a.jumlah, a.skema, d.approval, d.jenis_captive, a.lup_skema, d.flag_cancel_sap, d.skema as skemax, d.flag_cancel, a.jabatan as jabatanx, b.name_job_function as jabatan, a.id, f.id AS id_hire, g.jml as jml_hire, d.tanggal as tgl_create, a.userpm, (select nama from m_login where m_login.username=a.userpm) as nuserpm, d.bekerja, a.zparam, d.lup_edit, d.lupapp_atasan, a.lup_newrej, a.lup_edit as alup_edit, a.kunci_tgl_create, f.status_rekrut as fstatus_rekrut, f.jumlah as jml_stop  ";
		// $query .= "(SELECT id FROM trans_rincian_rekrut WHERE typejo='1' AND trans_rincian_rekrut.idpktable=a.id) AS id_hire  ";
		$query .= "FROM trans_rincian a  ";
		$query .= "LEFT JOIN job_function b ON a.jabatan=b.id  ";
		$query .= "LEFT JOIN mapping_city c ON a.lokasi=c.city_id  ";
		$query .= "LEFT JOIN trans_jo d ON a.nojo=d.nojo  ";
		$query .= "LEFT JOIN m_login e ON a.upd=e.username  ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='1') f ON f.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs g ON f.id=g.recruitreqid  ";
		$query .= "WHERE d.approval IN (1,5) and a.skema='1'   ";
		$query .= "GROUP BY a.id ";  
		$query .= "UNION ALL ";
		$query .= "SELECT d.nama_cust, a.nm_persa as project, d.n_project, d.nojo, d.no_bak, d.type_jo, d.type_new, d.type_replace, d.new_rekrut, a.nm_area as city_name, e.nama, a.lup, ";
		$query .= "d.lama, '1' as jumlah, a.skema, d.approval, d.jenis_captive, a.lup_skema, d.flag_cancel_sap, d.skema as skemax, d.flag_cancel, a.perner as jabatan, '' as jabatanx, a.id, f.id AS id_hire, g.jml as jml_hire, d.tanggal as tgl_create, a.userpm, (select nama from m_login where m_login.username=a.userpm) as nuserpm, d.bekerja, '-' as zparam, d.lup_edit, d.lupapp_atasan, a.lup_newrej, a.lup_edit as alup_edit, a.kunci_tgl_create, f.status_rekrut as fstatus_rekrut, f.jumlah as jml_stop ";
		// $query .= "(SELECT id FROM trans_rincian_rekrut WHERE typejo='2' AND trans_rincian_rekrut.idpktable=a.id) AS id_hire  ";
		$query .= "FROM trans_perner a  ";
		$query .= "LEFT JOIN mapping_city c ON a.`area` = c.`city_id`  ";  
		$query .= "LEFT JOIN trans_jo d ON a.nojo=d.nojo  ";
		$query .= "LEFT JOIN m_login e ON a.upd=e.username  ";
		$query .= "LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') f ON f.idpktable=a.id  ";
		$query .= "LEFT JOIN gojobs g ON f.id=g.recruitreqid  ";
		$query .= "WHERE d.approval IN (1,5) and a.skema='1'   ";
		$query .= "GROUP BY a.id ";
		$query .= ") u ";
		$query .= "Where u.tgl_create between '$tgc1' and '$tgc2' ";
		
		if($stat!=''){
			if($stat==1){
				$query .= "AND (skema=1 OR skemax=1)  ";
			} else if($stat==3){
				$query .= "AND (flag_cancel=1 OR flag_cancel_sap=1) ";
			} else if($stat==2) {
				$query .= "AND (skema!=1 OR skemax!=1) AND (flag_cancel!=1 OR flag_cancel_sap!=1)  ";
			}
		}
		
		if($pm!=''){
			$query .= "AND u.userpm='$pm' ";
		}
		if($cnobak!=''){
			$query .= "AND u.no_bak like '%".$cnobak."%' ";
		}
		if($cpro!=''){
			$query .= "AND (u.n_project like '%".$cpro."%' OR u.project like '%".$cpro."%') ";
		}
		if($clok!=''){
			$query .= "AND u.city_name like '%".$clok."%' ";
		}
		if($ccre!=''){
			$query .= "AND u.nama like '%".$ccre."%' ";
		}
		
		// var_dump($query);die;
				
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		
		return $data;
	}
	
	function simpan_stop($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_rincian',$item1);
	}
	
	public function get_pm(){		
		$data = array();
		$query	= "select a.username, a.nama from m_login a where a.level='5' and a.type='PM' and is_active='1' order by a.nama";		
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		
		return $data;
	}
	
	public function det_gorinc($nid){		
		$data = array();
		$query	= "SELECT jabatan, gender, pendidikan, (SELECT value2 FROM saparea WHERE saparea.value1=trans_rincian.lokasi) AS lokasi, kontrak, jumlah FROM trans_rincian WHERE id='$nid' ";		
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		
		return $data;
	}
	
	public function det_gorincrep($nid){		
		$data = array();
		$query	= "SELECT perner, nama, nm_area, nm_persa, nm_skilllayanan, nm_level, nm_jabatan FROM trans_perner WHERE id='$nid' ";		
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		
		return $data;
	}
	
	public function det_gojobs($nid){		
		$data = array();
		$query	= "SELECT b.*, c.jml, c.perner FROM trans_rincian_rekrut a ";		
		$query	.= "LEFT JOIN rincian_gojobs b ON a.id=b.recruitreqid ";		
		$query	.= "LEFT JOIN gojobs c ON a.id=c.recruitreqid ";		
		$query	.= "WHERE a.idpktable='$nid' ";		
		$Q		= $this->db->query($query);
		$data	= $Q->row();
		
		return $data;
	}
	
	function get_allpa(){
		$data			= array();
		$query = "SELECT a.value1 as kd_persa, a.value2 as persa From sappersonalarea a ";
		$query .= "ORDER BY a.value2 ";
		$Q		= $this->db->query($query);
		$data = $Q->result();
		
		return $data;	
	}
	
	
	function get_allar(){
		$data			= array();
		$query = "SELECT a.value1 as AREA, a.value2 as AREA_TEXT From saparea a ";
		$query .= "ORDER BY a.value2 ";
		$Q		= $this->db->query($query);
		$data = $Q->result();
		
		return $data;	
	}
	
	function get_allskill(){
		$data			= array();
		$query = "SELECT a.value1 as PERSK, a.value2 as PTEXT From sapskilllayanan a ";
		$query .= "ORDER BY a.value2 ";
		$Q		= $this->db->query($query);
		$data = $Q->result();
		
		return $data;	
	}
	
	function get_allpayar(){
		$data			= array();
		$query = "SELECT a.value1 as PAYROLL_AREA, a.value2 as PAYROLL_AREA_TEXT From sappayrollarea a ";
		$query .= "ORDER BY a.value2 ";
		$Q		= $this->db->query($query);
		$data = $Q->result();
		
		return $data;	
	}
	
	function get_alllevel(){
		$data			= array();
		$query = "SELECT a.value1 as TRFAR, a.value2 as TARTX From saplevel a ";
		$query .= "ORDER BY a.value2 ";
		$Q		= $this->db->query($query);
		$data = $Q->result();
		
		return $data;	
	}
	
	function get_allzskema(){
		$data			= array();
		$query = "SELECT a.value1 as ZSKEMA, a.value2 as ZSKEMATEXT From sapzskema a ";
		$query .= "ORDER BY a.value2 ";
		$Q		= $this->db->query($query);
		$data = $Q->result();
		
		return $data;	
	}
	
	function get_alljab(){
		$data			= array();
		$query = "SELECT a.value1 as OBJID, a.value2 as STEXT From sapjabatan a ";
		$query .= "ORDER BY a.value2 ";
		$Q		= $this->db->query($query);
		$data = $Q->result();
		
		return $data;	
	}
	
	function get_alljabc(){
		$data			= array();
		$query = "SELECT a.value1 as OBJID, a.value2 as STEXT From sapjob a ";
		$query .= "ORDER BY a.value2 ";
		$Q		= $this->db->query($query);
		$data = $Q->result();
		
		return $data;	
	}
	
	function get_reason($idx){
		if($idx==1){
			$abc = 'Z8';
		} else {
			$abc = 'Z2';
		}
		$data			= array();
		$query = "SELECT kd_reason, reason, nama_z, kode_z From m_reason  ";
		if($idx!=''){
			$query .= "Where kode_z='$abc' ";
		}
		$query .= "ORDER BY kode_z ";
		$Q		= $this->db->query($query);
		$data = $Q->result_array();
		
		return $data;	
	}
	
	function get_reasonganti(){
		$data			= array();
		$query = "SELECT kd_reason, reason, nama_z, kode_z From m_reason Where kode_z='Z2' ";
		$query .= "ORDER BY kode_z ";
		$Q		= $this->db->query($query);
		$data = $Q->result_array();
		
		return $data;	
	}
	
	function get_trfgb(){
		$data			= array();
		$query = "SELECT trfgb, trfgb_txt FROM sapinfotype8 GROUP BY trfgb ";
		$query .= "ORDER BY trfgb_txt ";
		$Q		= $this->db->query($query);
		$data = $Q->result_array();
		
		return $data;	
	}
	
	function get_cttyp(){
		$data			= array();
		$query = "SELECT kd_cttyp, nm_cttyp FROM m_cttyp ";
		$query .= "ORDER BY kd_cttyp ";
		$Q		= $this->db->query($query);
		$data = $Q->result_array(); 
		 
		return $data;	
	}
	
	function getdiv(){
		$data			= array();
		$query = "SELECT * FROM m_divisi ";
		$query .= "ORDER BY divisi ";
		$Q		= $this->db->query($query);
		$data = $Q->result_array();
		
		return $data;	
	}
	
	function update_divjo($vid,$udiv){
		$ceknoj	= $this->db->query("SELECT nojo From trans_rincian Where id='$vid' ")->row();
		$update	= array (
			'divisiid'		 	=> $udiv
		);
		
		$this->db->where('nojo',$ceknoj->nojo);
		$this->db->update('trans_jo', $update);
	}
	
	function doneslot($id_slot, $nojo_slot, $typejo_slot, $ket_slot){
		$update	= array (
			'flag_done_pm'	=> 1,
			'ket_done_pm'	=> $ket_slot
		);
		
		$this->db->where('id',$id_slot);
		
		if($typejo_slot=='2'){
			$this->db->update('trans_perner', $update);
		} else if($typejo_slot=='1'){
			$this->db->update('trans_rincian', $update);
		}
	}
	
	function save_transpks($nojo,$vid, $jns, $username, $userpm){
		$cekdet			= $this->db->query("SELECT * From trans_jo Where nojo='$nojo' ")->row();
		if($jns==1){
			$cekdet_rin		= $this->db->query("SELECT * From trans_rincian Where id='$vid'  ")->row();
		} else {
			$cekdet_rin		= $this->db->query("SELECT * From trans_perner Where id='$vid'  ")->row();
		}
		
		$cekada_nobak	= $this->db->query("SELECT * From trans_pks_new Where nobak='".$cekdet->no_bak."' ")->num_rows();
		if($cekdet->n_project=='' || $cekdet->n_project=='Pilih'){
			$pro = $cekdet->project;
		} else {
			$pro = $cekdet->n_project;
		}
		
		$merah	= array (
			'jenis_nojo'	=> $jns,
			'nobak'			=> $cekdet->no_bak,
			'id_rincian'	=> $vid,
			'nojo'			=> $nojo,
			'userpm'		=> $userpm,
			'upd'			=> $username,
			'lup'			=> date("Y-m-d H:i:s")
		);
		
		$this->db->insert('trans_nojopks',$merah);
		
		
		$putih	= array (
			'nobak'			=> $cekdet->no_bak,
			'customer'		=> $cekdet->nama_cust,
			'project'		=> $pro,
			'date_approved'	=> date("Y-m-d H:i:s"),
			'approved_pm'	=> $username,
			'created'		=> $cekdet_rin->upd,
			'lup'			=> date("Y-m-d H:i:s")
		);
		
		if($cekada_nobak<=0){
			$this->db->insert('trans_pks_new',$putih);
		}
	}

	function dok_peralihan($tcr1, $tcr2){
		$data 	= array();
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		//$query		  = "SELECT komponen_bak FROM trans_jo WHERE nojo IN ('015621/ISH/01010107/2020','015637/ISH/01010107/2020','015640/ISH/01010107/2020','015792/ISH/01010107/2020','015799/ISH/01010107/2020','015801/ISH/01010107/2020','015837/ISH/01010107/2020','015838/ISH/01010107/2020','015842/ISH/01010107/2020','015843/ISH/01010107/2020','015844/ISH/01010107/2020','015845/ISH/01010107/2020','015846/ISH/01010107/2020','015848/ISH/01010107/2020','015849/ISH/01010107/2020','015851/ISH/01010107/2020','015853/ISH/01010107/2020','015853/ISH/01010107/2020','015854/ISH/01010107/2020','015854/ISH/01010107/2020','015856/ISH/01010107/2020','015858/ISH/01010107/2020','015860/ISH/01010107/2020','015862/ISH/01010107/2020','015863/ISH/01010107/2020','015863/ISH/01010107/2020','015866/ISH/01010107/2020','015871/ISH/01010107/2020','015873/ISH/01010107/2020','015876/ISH/01010107/2020','015878/ISH/01010107/2020','015884/ISH/01010107/2020','015886/ISH/01010107/2020','015886/ISH/01010107/2020','015886/ISH/01010107/2020','015886/ISH/01010107/2020','015886/ISH/01010107/2020','015886/ISH/01010107/2020','015886/ISH/01010107/2020','015886/ISH/01010107/2020','015892/ISH/01010107/2020','015955/ISH/01010107/2020','015961/ISH/01010107/2020','015963/ISH/01010107/2020','015978/ISH/01010107/2020','015978/ISH/01010107/2020','015979/ISH/01010107/2020','015979/ISH/01010107/2020','015980/ISH/01010107/2020','015980/ISH/01010107/2020','016043/ISH/01010107/2020','016045/ISH/01010107/2020','016050/ISH/01010107/2020','016056/ISH/01010107/2020','016058/ISH/01010107/2020','016078/ISH/01010107/2020','016087/ISH/01010107/2020','016103/ISH/01010107/2020','016103/ISH/01010107/2020','016110/ISH/01010107/2020','016111/ISH/01010107/2020','016120/ISH/01010107/2020','016120/ISH/01010107/2020','016120/ISH/01010107/2020','016120/ISH/01010107/2020','016120/ISH/01010107/2020','016120/ISH/01010107/2020','016120/ISH/01010107/2020','016120/ISH/01010107/2020','016123/ISH/01010107/2020','016124/ISH/01010107/2020','016124/ISH/01010107/2020','016124/ISH/01010107/2020','016124/ISH/01010107/2020','016124/ISH/01010107/2020','016124/ISH/01010107/2020','016124/ISH/01010107/2020','016125/ISH/01010107/2020','016131/ISH/01010107/2020','016132/ISH/01010107/2020','016158/ISH/01010107/2020','016173/ISH/01010107/2020','016174/ISH/01010107/2020','016217/ISH/01010107/2020','016220/ISH/01010107/2020','016237/ISH/01010107/2020','016240/ISH/01010107/2020','016277/ISH/01010107/2020','016278/ISH/01010107/2020','016280/ISH/01010107/2020','016306/ISH/01010107/2020','016307/ISH/01010107/2020','016308/ISH/01010107/2020','016309/ISH/01010107/2020','016310/ISH/01010107/2020','016311/ISH/01010107/2020','016312/ISH/01010107/2020','016331/ISH/01010107/2020','016338/ISH/01010107/2020','016342/ISH/01010107/2020','016343/ISH/01010107/2020','016344/ISH/01010107/2020','016347/ISH/01010107/2020','016349/ISH/01010107/2020','016350/ISH/01010107/2020','016351/ISH/01010107/2020','016352/ISH/01010107/2020','016354/ISH/01010107/2020','016357/ISH/01010107/2020','016381/ISH/01010107/2020','016384/ISH/01010107/2020','016408/ISH/01010107/2020','016410/ISH/01010107/2020','016412/ISH/01010107/2020','016413/ISH/01010107/2020','016414/ISH/01010107/2020','016414/ISH/01010107/2020','016414/ISH/01010107/2020','016414/ISH/01010107/2020','016414/ISH/01010107/2020','016415/ISH/01010107/2020','015841/ISH/01010107/2020','016442/ISH/01010107/2020','016348/ISH/01010107/2020','016444/ISH/01010107/2020','016445/ISH/01010107/2020','016448/ISH/01010107/2020','016450/ISH/01010107/2020','016470/ISH/01010107/2020','016412/ISH/01010107/2020','016532/ISH/01010107/2020','016533/ISH/01010107/2020','016538/ISH/01010107/2020','016539/ISH/01010107/2020','016541/ISH/01010107/2020','016542/ISH/01010107/2020','016543/ISH/01010107/2020','016545/ISH/01010107/2020','016569/ISH/01010107/2020','016591/ISH/01010107/2020','016594/ISH/01010107/2020','016596/ISH/01010107/2020','016597/ISH/01010107/2020','016598/ISH/01010107/2020','016599/ISH/01010107/2020','016600/ISH/01010107/2020','016602/ISH/01010107/2020','016603/ISH/01010107/2020','016604/ISH/01010107/2020','016604/ISH/01010107/2020','016605/ISH/01010107/2020','016655/ISH/01010107/2020','016656/ISH/01010107/2020','016657/ISH/01010107/2020','016658/ISH/01010107/2020','016662/ISH/01010107/2020','016664/ISH/01010107/2020','016665/ISH/01010107/2020','016668/ISH/01010107/2020','016669/ISH/01010107/2020','016670/ISH/01010107/2020','016671/ISH/01010107/2020','016685/ISH/01010107/2020','016686/ISH/01010107/2020','016687/ISH/01010107/2020','016688/ISH/01010107/2020','016726/ISH/01010107/2020','016728/ISH/01010107/2020','016735/ISH/01010107/2020','016736/ISH/01010107/2020','016738/ISH/01010107/2020','016739/ISH/01010107/2020','016823/ISH/01010107/2020','016827/ISH/01010107/2020','016828/ISH/01010107/2020','016870/ISH/01010107/2020','016874/ISH/01010107/2020','016895/ISH/01010107/2020','016899/ISH/01010107/2020','016917/ISH/01010107/2020','016942/ISH/01010107/2020','016946/ISH/01010107/2020','016946/ISH/01010107/2020','016946/ISH/01010107/2020','016946/ISH/01010107/2020','016946/ISH/01010107/2020','016946/ISH/01010107/2020','016946/ISH/01010107/2020','016946/ISH/01010107/2020','016947/ISH/01010107/2020','016947/ISH/01010107/2020','016947/ISH/01010107/2020','016947/ISH/01010107/2020','016947/ISH/01010107/2020','016947/ISH/01010107/2020','016947/ISH/01010107/2020','016948/ISH/01010107/2020','016948/ISH/01010107/2020','016948/ISH/01010107/2020','016948/ISH/01010107/2020','016948/ISH/01010107/2020','016948/ISH/01010107/2020','016951/ISH/01010107/2020','016951/ISH/01010107/2020','016952/ISH/01010107/2020','016953/ISH/01010107/2020','016979/ISH/01010107/2020','016455/ISH/01010107/2020','016379/ISH/01010107/2020','016452/ISH/01010107/2020','016443/ISH/01010107/2020','016985/ISH/01010107/2020','016986/ISH/01010107/2020','016988/ISH/01010107/2020','017019/ISH/01010107/2020','017020/ISH/01010107/2020','016983/ISH/01010107/2020','017062/ISH/01010107/2020','017075/ISH/01010107/2020','017075/ISH/01010107/2020','017084/ISH/01010107/2020','017086/ISH/01010107/2020','017087/ISH/01010107/2020','017089/ISH/01010107/2020','017090/ISH/01010107/2020','017090/ISH/01010107/2020','017091/ISH/01010107/2020','017092/ISH/01010107/2020','017093/ISH/01010107/2020','017094/ISH/01010107/2020','017095/ISH/01010107/2020','017096/ISH/01010107/2020','017098/ISH/01010107/2020','017101/ISH/01010107/2020','017103/ISH/01010107/2020','017104/ISH/01010107/2020','017109/ISH/01010107/2020','017110/ISH/01010107/2020','017111/ISH/01010107/2020','017113/ISH/01010107/2020','017118/ISH/01010107/2020','017119/ISH/01010107/2020','017120/ISH/01010107/2020','017122/ISH/01010107/2020','017123/ISH/01010107/2020','017124/ISH/01010107/2020','017125/ISH/01010107/2020','017130/ISH/01010107/2020','017131/ISH/01010107/2020','017133/ISH/01010107/2020','017135/ISH/01010107/2020','017145/ISH/01010107/2020','017121/ISH/01010107/2020','017166/ISH/01010107/2020','017167/ISH/01010107/2020','017170/ISH/01010107/2020','017170/ISH/01010107/2020','017170/ISH/01010107/2020','017170/ISH/01010107/2020','017170/ISH/01010107/2020','017185/ISH/01010107/2020','017237/ISH/01010107/2020','016980/ISH/01010107/2020','016980/ISH/01010107/2020','017163/ISH/01010107/2020','017163/ISH/01010107/2020','017073/ISH/01010107/2020','017073/ISH/01010107/2020','017238/ISH/01010107/2020','017238/ISH/01010107/2020','017264/ISH/01010107/2020','017289/ISH/01010107/2020','017289/ISH/01010107/2020','016980/ISH/01010107/2020','017343/ISH/01010107/2020','017358/ISH/01010107/2020') ";
		
		// $query		  = "SELECT komponen_bak FROM trans_jo WHERE project like '%$caripro%' and date_format(tanggal,'%Y-%m-%d') between '$tcr1' and '$tcr2' ";
		$query		  = "SELECT komponen, komponen_bak, komponen_other FROM trans_jo WHERE date_format(tanggal,'%Y-%m-%d') between '$tcr1' and '$tcr2' ";
		// var_dump($query);die;
		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		return $data;
	}	
}

?>