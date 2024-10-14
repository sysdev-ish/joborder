<?php
Class Job_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
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
	
	function get_dashboard($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query = "SELECT a.`nojo`, c.id, b.id, a.project, a.latihan, current_date() as tgl_sekarang, b.jumlah, SUM(c.jml_pkwt) rekrut, b.jabatan, a.tanggal, c.note, b.lokasi, datediff(a.latihan,current_date()) as selisih ";
		$query .= "FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON b.id = c.`nojo` ";	
		$query .= "WHERE project like '%$search%' ";
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
	
	
	function get_appjo($search,$tes){
		//$search 	= $this->input->post('dataarr');
		$data			= array();
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE level = '$tes' and (project like '%$search%' or upd like '%$search%') ";
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
		$query = "SELECT a.id, a.`nojo`, b.`project`, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut ";
		$query .= "FROM trans_rincian a ";
		$query .= "LEFT JOIN trans_jo b ON a.`nojo` = b.`nojo` ";
		$query .= "LEFT JOIN trans_req c ON a.id = c.nojo ";
		$query .= "WHERE b.approval = 1 and b.project like '%$search%' ";
		$query .= "GROUP BY a.id ORDER BY a.nojo";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_transappjo1($tes1){
		$data			= array();
		$query = "SELECT * FROM trans_jo ";
		//$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE approval = 1 ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	
	function get_transappjo($tes1){
		$data			= array();
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE level = '$tes1' ";
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
	
	function get_pesan2($tes){
		$data			= array();
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE level = '$tes' and approval = 0 ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;		
	}
	
	function get_notif2($tes){
		/*		
		$this->db->where("level",$tes);
		$this->db->where("approval","0");
		$Q		= $this->db->get('trans_jo');
		*/
		$query = "SELECT a.* FROM trans_jo a ";
		$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE level = '$tes' and approval = 0 ";
		$Q		= $this->db->query($query);
		$jml  = $Q->num_rows();

		return $jml;
	}
	
	function get_pesan3($nama){
		$data			= array();
		$query = "SELECT * FROM trans_jo  ";
		//$query .= "INNER JOIN m_login b ON a.`upd` = b.`nama` ";
		$query .= "WHERE upd = '$nama' and (approval = 2 OR approval_admin = 2) ";
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
		
	function get_notif3($nama){		
		//$this->db->where("approval","2");
		/*
		$this->db->where("upd",$nama);
		$this->db->where("approval_admin","2");
		$Q		= $this->db->get('trans_jo');
		*/
		$query = "SELECT * FROM trans_jo  ";
		$query .= "WHERE upd = '$nama' and (approval = 2 OR approval_admin = 2) ";
		$Q		= $this->db->query($query);
		$jml  = $Q->num_rows();

		return $jml;
	}
	
	function simpan_komentar($item,$item1){
		$this->db->where($item);
		$this->db->update('trans_rincian',$item1);
	}
	
	function get_transall(){
		$data			= array();
		$query = "SELECT a.id, a.`nojo`, a.komentar, a.skema, b.`project`, b.upd, b.`tanggal`, b.latihan, a.`jabatan`, a.`gender`, a.`jumlah`, a.`lokasi`, b.`bekerja`, a.atasan, SUM(c.jml_pkwt) rekrut ";
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
		$query	= "SELECT nojo, jabatan, gender, pendidikan, lokasi, atasan, kontrak, waktu, jumlah ";
		$query	.= "FROM trans_rincian ";
		$query	.= "WHERE nojo = '$njo' ";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}	

	function inssimpantjo($njo){
		$update	= array (
			'approval' => 1
		);
		
		$this->db->where('nojo',$njo);
		$this->db->update('trans_jo', $update);
	}	
	
	function inssimpantjo1($njo){
		$update	= array (
			'approval_admin' => 1
		);
		
		$this->db->where('nojo',$njo);
		$this->db->update('trans_jo', $update);
	}	
	
	function inssimpanskema($njo){
		$update	= array (
			'skema' => 1
		);
		
		$this->db->where('id',$njo);
		$this->db->update('trans_rincian', $update);
	}	
	
	function rejectjo($njo){
		$update	= array (
			'approval' => 2
		);
		
		$this->db->where('nojo',$njo);
		$this->db->update('trans_jo', $update);
	}	
	
	function rejectjo1($njo){
		$update	= array (
			'approval_admin' => 2
		);
		
		$this->db->where('nojo',$njo);
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
	
}

?>