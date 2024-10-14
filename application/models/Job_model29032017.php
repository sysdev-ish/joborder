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
	
	
	function get_dashboard($nama){
//		$session_data = $this->session->userdata('logged_in');
		
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
	
	
	function get_appjo($search,$daud){
		//$search 	= $this->input->post('dataarr');
		$data			= array();
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE layanan = '$daud' and project like '%$search%' ";
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
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, upd, lup FROM trans_jo a ";
		//$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE a.approval = 1 and a.project like '%$search%' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;	
	
	}
	
	
	function get_appjo2($search,$username){
		//$search 	= $this->input->post('dataarr');
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, upd, lup FROM trans_jo a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE username ='$username' and a.project like '%$search%' ";
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
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup FROM trans_jo a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE a.project like '%$search%' ";
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
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, upd, lup, ket_atasan, ket_admin, a.type_jo FROM trans_jo a ";
		//$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		//, (select count(id) from trans_rincian where trans_rincian.nojo=a.nojo) as jml_rincian
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
	
	
	function get_transappjo2($username){
		$data			= array();
		$query = "SELECT a.nojo, a.tanggal, a.project, a.syarat, a.deskripsi, a.bekerja, a.upd, a.lup, a.approval, a.approval_admin, a.komponen, ket_atasan, ket_admin, a.type_jo FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE username = '$username' ";
		$query .= "Order By a.approval, a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_transappjo3(){
		$data			= array();
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, upd, lup, ket_atasan, ket_admin, a.type_jo FROM trans_jo ";
		//$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		//$query .= "WHERE approval = 1 ";
		$query .= "order by approval_admin, nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_transappjo($daud){
		$data			= array();
		$query = "SELECT a.nojo, a.tanggal, a.project, a.syarat, a.deskripsi, a.bekerja, a.upd, a.lup, a.approval, a.approval_admin, a.komponen, ket_atasan, ket_admin, a.type_jo FROM trans_jo a ";
		$query .= "LEFT JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE layanan = '$daud' ";
		$query .= "Order By a.approval, a.nojo desc ";
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
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
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
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
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
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.nama ";
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
	
	
	function get_transall_craeter($username){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.nama ";
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
	
	
	function get_transall_approval($daud){
		$data			= array();
		//$dbpostgre  = $this->load->database('db_second',TRUE);
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.nama ";
		//$query .= "WHERE b.approval_admin = 1 AND d.layanan='$daud' ";
		$query .= "WHERE b.approval = 1 AND d.layanan='$daud' ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc";
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
		$query = "SELECT Replace(komponen, ' ', '_') as komponen, a.nojo, tanggal, project, syarat, deskripsi, lama, latihan, bekerja, approval, approval_admin, a.upd, a.lup, ket_atasan, ket_admin, a.skema, a.komentar, a.ket_cancel, a.flag_cancel, a.flag_cancel_sap FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		//$query .= "WHERE approval_admin = 1 ";
		$query .= "WHERE approval = 1 ";
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
		$query .= "LEFT JOIN m_login d ON b.upd = d.nama ";
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
		$query .= "LEFT JOIN m_login d ON b.upd = d.nama ";
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

	
	function get_jo($search){
		
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, e.city_name, f.name_job_function, b.lup, b.syarat, b.deskripsi, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN city e ON a.`lokasi` = e.`id` ";
		$query .= "LEFT JOIN job_function f ON a.`jabatan` = f.`id` ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.nama ";
		$query .= "WHERE b.approval_admin = 1 and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY a.id ORDER BY a.nojo desc ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_josap($search){
		$data			= array();
		//$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, b.komponen, b.upd ";
		$query = "SELECT Replace(b.komponen, ' ', '_') as komponen, a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, d.level, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut, SUM(c.jml_hr) hr, SUM(c.jml_user) jmluser, (SELECT note FROM trans_req WHERE id=(SELECT MAX(id) FROM trans_req where c.nojo=trans_req.`nojo` GROUP BY nojo) AND c.nojo=trans_req.`nojo` GROUP BY nojo) AS note, b.lup, b.syarat, b.deskripsi, b.ket_cancel, b.flag_cancel, b.flag_cancel_sap ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "INNER JOIN m_login d ON b.upd = d.nama ";
		$query .= "WHERE b.approval_admin = 1 and (b.project like '%$search%' OR b.nojo like '%$search%' OR a.upd like '%$search%')  ";
		$query .= "GROUP BY b.nojo ORDER BY a.nojo desc ";
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
		$dbpostgre = $this->load->database('db_second',TRUE);
		$query = "SELECT id, job_name_level FROM job_level";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	public function getSkills(){
		$dbpostgre = $this->load->database('db_second',TRUE);
        $this->db->order_by('skill_name');
        return $this->db->get('skill');
    }
	
	public function getBenefits(){
		$dbpostgre = $this->load->database('db_second',TRUE);
        $this->db->order_by('name_benefits');
        return $this->db->get('benefits');
    }
	
	public function getEmploymentTypes(){
		$dbpostgre = $this->load->database('db_second',TRUE);
        return $this->db->get('employment_type');
    }
	
	function simpan_media($item){
		$dbpostgre = $this->load->database('db_second',TRUE);
		$this->db->insert('company_jobs',$item);
	}
	
	function simpan_mediax($item){
		$dbpostgre = $this->load->database('db_second',TRUE);
		$this->db->insert('company_jobs',$item);
	}
	
	public function take_lok($kode_province){		
		$data = array();
		//$dbpostgre = $this->load->database('db_second',TRUE);
		$query	= "select id,city_name from city where province_id='$kode_province' order by city_name";		
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
		$query	= "SELECT Replace(a.komponen, ' ', '_') as komponen, a.nojo, a.tanggal, a.project, a.syarat, a.deskripsi, a.lama, a.latihan, a.bekerja  ";
		$query	.= "FROM trans_jo a WHERE a.nojo = '$onjo' ";
		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data = $row;
			}
		}
		return $data;		
	}	
	

	function trajo($njo){
		$data		= array();
		$query	= "SELECT a.nojo, a.jabatan, a.gender, a.pendidikan, a.lokasi, a.atasan, a.kontrak, a.waktu, a.jumlah, b.komponen, c.name_job_function, d.city_name ";
		$query	.= "FROM trans_rincian a ";
		$query	.= "Inner Join trans_jo b ON a.nojo=b.nojo ";
		$query	.= "LEFT Join job_function c ON a.jabatan=c.id ";
		$query	.= "LEFT Join city d ON a.lokasi=d.id ";
		$query	.= "WHERE a.nojo = '$njo' ";
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
	

	function inssimpantjo($njok,$keter, $tjo){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['username'];
		
		if($tjo=='Replace')
		{
			$update	= array (
				'approval' => 1,
				'approval_admin' => 1,
				'ket_atasan' => $keter
			);
		}
		else
		{
			$update	= array (
				'approval' => 1,
				'approval_admin' => 1,
				'ket_atasan' => $keter
			);
		}
		

		
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_jo', $update);

		$log = array(
			'nojo' => $njok,
			'approval' => 'approval', 
			'upd' => $session_data['username'],
			'lup' => date("Y-m-d H:i:s")
			);
		$this->db->insert('log_approval',$log);
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
	
	function rejectjo($njok, $keter){
		$update	= array (
			'approval' => 2,
			'ket_atasan' => $keter
		);
		
		$this->db->where('nojo',$njok);
		$this->db->update('trans_jo', $update);
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
		$query = "SELECT count(*) as jml FROM trans_jo ";
		//$query .= "INNER JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		//$query .= "WHERE approval_admin = 1 ";
		//$query .= "GROUP BY b.id ORDER BY b.nojo";
		//$query .= "order by approval_admin, nojo ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
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
			foreach ($Q->result_array() as $row){
				$data[] = $row;
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
		$query .= "WHERE a.approval_admin = 1 AND DATEDIFF(a.latihan,CURRENT_DATE()) < '0' AND ( b.jumlah > (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) OR c.jml_pkwt IS NULL )  
 ";
		//$query .= "GROUP BY b.id ";	
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
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_topod(){
		
		$data			= array();
		$query = "SELECT a.project, a.bekerja, b.jumlah, SUM(c.jml_pkwt) rekrut ";
		$query .= "FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON b.id = c.`nojo` ";	
		$query .= "WHERE a.approval_admin = 1 AND DATEDIFF(a.latihan,CURRENT_DATE()) < '0' AND ( b.jumlah > (SELECT SUM(jml_pkwt) FROM trans_req WHERE trans_req.`nojo`=b.`id`) OR c.jml_pkwt IS NULL ) ";
		$query .= "GROUP BY b.id ORDER BY SUM(c.jml_pkwt) DESC LIMIT 10  ";	
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
	
	/*
	function graph()
	{
		$data = $this->db->query(" SELECT lokasi, c.name_province, b.id as bid, b.city_name, c.`id`, count(*) AS jumlah From trans_rincian a left join city b on a.lokasi=b.id left join province c on b.province_id=c.id GROUP BY c.id ");
		return $data->result();
	}
	*/
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
	
	
	function campuran($nojof, $file_name){
	
		$this->db->trans_begin();
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']		= $session_data['nama'];
		
		$rrr = $this->input->post('joborder[8]');
		if($rrr=='Replace')
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
			'syarat' => $this->input->post('joborder[2]'),
			'deskripsi' => $this->input->post('joborder[3]'),
			'lama' => $this->input->post('joborder[4]'),
			'latihan' => $this->input->post('joborder[5]'),
			'bekerja' => $this->input->post('joborder[6]'),
			//'komponen' => $this->input->post('joborder[11]'),
			'komponen' => $file_name,
			//'komponen' => $this->input->post('joborder[7]'),
			'type_jo' => $this->input->post('joborder[8]'),			
			'approval' => 0,
			'approval_admin' => 0,
			'jenis_project' => $this->input->post('joborder[9]'),
			//'jenis_skema' => $this->input->post('joborder[11]'),
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $data['nama']	
		);
		
		$this->db->insert('trans_jo',$item);
		
		$putih = array (
			'nojo' => $nojof,
			'filename'	=> $file_name
		);
		
		$this->db->insert('trans_upload',$putih);
		
		$rec 	= $this->input->post('joborder[10]');
		
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
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
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
	
	
	public function take_rin($nojo){		
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
	
	
	function s_rincian_simpanx($item){
		$this->db->insert('trans_skema',$item);
	}	
	
}

?>