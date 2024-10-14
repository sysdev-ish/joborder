<?php
Class User extends CI_Model
{
	
	function cekuser($username) {
		$this -> db -> select('id, username, password');
		$this -> db -> from('m_login');
		$this -> db -> where('username', $username);
		$this -> db -> limit(1);
		$cquery = $this -> db -> get();
		if ($cquery -> num_rows() == 1) {
			return $cquery->result();
		} else {
			return false;
		}
	}

	function login($username, $password) {
		$this -> db -> select('id, username, password, nama, level, layanan, jabatan');
		$this -> db -> from('m_login');
		$this -> db -> where('username', $username);
		$this -> db -> where('password', MD5($password));
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if ($query -> num_rows() == 1) {
			return $query->result();
		} else {
			return false;				
		}
	}

	function new_login($username, $password) {
		$this -> db -> select('perner');
		$this -> db -> from('m_karyawan');
		$this -> db -> where('perner', $username);
		$this -> db -> where('perner', $password);
		$this -> db -> limit(1);
		$xquery = $this -> db -> get();
		if ($xquery -> num_rows() == 1) {
			return $xquery->result();
		} else {
			return false;
		}		
	}
	
	function inslogin($item){
		$this->db->insert('m_login',$item);
	}
	
	function listlogin() {
		$query		 = "SELECT a.*, b.jabatan as jabat, c.layanan as layan  ";
		$query		.= "FROM m_login a ";
		$query		.= "LEFT JOIN m_jabatan b ON a.jabatan=b.id ";
		$query		.= "LEFT JOIN m_layanan c ON a.layanan=c.id ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function login_simpan($putih){
		$this->db->insert('m_login',$putih);
	}
	
	function get_login($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query		 = "SELECT a.*, b.jabatan as jabat, c.layanan as layan  ";
		$query		.= "FROM m_login a ";
		$query		.= "LEFT JOIN m_jabatan b ON a.jabatan=b.id ";
		$query		.= "LEFT JOIN m_layanan c ON a.layanan=c.id ";
		$query 		.= "WHERE a.nama like '%$search%' or b.jabatan like '%$search%'";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	
	
	function login_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('m_login',$putih);
	}
	
	function view_profile($perner) {
		$data = array();
		$this -> db -> select('nama,level');
		$this -> db -> from('m_login');
		$this -> db -> where('username', $perner);
		$this -> db -> limit(1);
		$zquery = $this -> db -> get();
		if ($zquery -> num_rows() == 1) {
			return $zquery->result();
		} else {
			return false;				
		}
	}
	
	function upd_login($item,$data){
		$this->db->where($item);
		$this->db->update('m_login',$data);
	}
	
	function listkontrak() {
		$query		 = "SELECT *  ";
		$query		.= "FROM m_kontrak ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	public function take_lay($kode_layanan){		
		$data = array();
		$query	= "select * from m_layanan where jabatan='$kode_layanan' and status='1' order by layanan";		
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	function get_jabat() {
		$query		 = "SELECT *  ";
		$query		.= "FROM m_jabatan ";
		$query		.= "WHERE login='1' ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function get_layan() {
		$query		 = "SELECT *  ";
		$query		.= "FROM m_layanan ";
		//$query		.= "WHERE login='1' ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function listlayanan() {
		$query		 = "SELECT a.*, b.jabatan as jabat  ";
		$query		.= "FROM m_layanan a ";
		$query		.= "LEFT JOIN m_jabatan b ON a.jabatan=b.id ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function layanan_simpan($putih){
		$this->db->insert('m_layanan',$putih);
	}
	
	function layanan_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('m_layanan',$putih);
	}
	
	function kontrak_simpan($putih){
		$this->db->insert('m_kontrak',$putih);
	}
	
	function kontrak_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('m_kontrak',$putih);
	}
	
	function get_kontrak($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM m_kontrak ";
		$query 		.= "WHERE jenis like '%$search%' ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function listlokasi() {
		$query		 = "SELECT *  ";
		$query		.= "FROM m_lokasi ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function lokasi_simpan($putih){
		$this->db->insert('m_lokasi',$putih);
	}
	
	function get_lokasi($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM m_lokasi ";
		$query 		.= "WHERE kota like '%$search%' OR area like '%$search%' ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function lokasi_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('m_lokasi',$putih);
	}
	
	function listjabatan() {
		$query		 = "SELECT *  ";
		$query		.= "FROM m_jabatan ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function get_jabatan($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM m_jabatan ";
		$query 		.= "WHERE jabatan like '%$search%' ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function get_layanan($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query		 = "SELECT a.*, b.jabatan as jabat  ";
		$query		.= "FROM m_layanan a ";
		$query		.= "LEFT JOIN m_jabatan b ON a.jabatan=b.id ";
		$query 		.= "WHERE b.jabatan like '%$search%' or a.layanan like '%$search%' ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function jabatan_simpan($putih){
		$this->db->insert('m_jabatan',$putih);
	}
	
	function jabatan_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('m_jabatan',$putih);
	}
	
	function listrincian($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$nojo 		= $this->input->post('dataarr');
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM trans_rincian ";
		$query 		.= "WHERE nojo like '%$nojo%' ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function change_pass(){
		
	}
}
?>