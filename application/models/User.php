<?php
Class User extends CI_Model
{
	
	function listbak() {
		$query		 = "SELECT nojo, komponen_bak FROM trans_jo WHERE type_jo='1' AND komponen_bak IS NOT NULL ";
		$query		.= "ORDER BY nojo ASC ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	
	function cekuser($username) {
		$this -> db -> select('id, username, password');
		$this -> db -> from('m_login');
		$this -> db -> where('username', $username);
		$this -> db -> where('is_active', 1);
		$this -> db -> limit(1);
		$cquery = $this -> db -> get();
		if ($cquery -> num_rows() == 1) {
			return $cquery->result();
		} else {
			return false;
		}
	}

	function login($username, $password) {
		$this -> db -> select('id, username, password, nama, level, layanan, jabatan, type, regional, jenis, mgr_enterprise');
		$this -> db -> from('m_login');
		$this -> db -> where('username', $username);
		$this -> db -> where('password', MD5($password));
		$this -> db -> where('is_active', 1);
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
		$query		 = "SELECT a.*, b.jabatan as jabat, c.layanan as layan, d.nama as dnama  ";
		$query		.= "FROM m_login a ";
		$query		.= "LEFT JOIN m_jabatan b ON a.jabatan=b.id ";
		$query		.= "LEFT JOIN m_layanan c ON a.layanan=c.id ";
		$query		.= "LEFT JOIN m_level d ON a.level=d.id ";
		$query		.= "ORDER BY a.id DESC ";
		
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
		$query 		.= "WHERE a.nama like '%$search%' or b.jabatan like '%$search%' or a.username like '%$search%' ";
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
	
	
	
	function login_reset($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('m_login',$putih);
	}
	
	
	
	
	function view_profile($perner) {
		$data = array();
		$this -> db -> select('id, username, password, nama, level, layanan, jabatan, type, regional, jenis');
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
	
	
	function get_lvl() {
		$query		 = "SELECT *  ";
		$query		.= "FROM m_level where status='1' ";
		//$query		.= "WHERE login='1' ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	
	function get_stat() {
		$query		 = "SELECT *  ";
		$query		.= "FROM m_status where status='1' ";
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
		$query		.= "LEFT JOIN m_jabatan b ON a.jabatan=b.id ORDER BY a.id DESC ";
		
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
	
	/*
	 function listlokasi() {
		$query		 = "SELECT a.*, b.*, a.id as no  ";
		$query		.= "FROM city a ";
		$query		.= "left join province b on a.province_id = b.id ";
		$query		.= "order By a.province_id ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	*/
	function listlokasi() {
		$query		 = "SELECT a.*, b.*, a.id as no  ";
		$query		.= "FROM sap_city a ";
		$query		.= "left join province b on a.province_id = b.id ";
		$query		.= "order By a.province_id ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
    function get_provinsil() {
		$query		 = "SELECT DISTINCT(a.province_id) , b.name_province  ";
		$query		.= "FROM city a ";
		$query		.= "left join province b on a.province_id = b.id ";
		$query		.= "order By name_province";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	 function get_jabatanl() {
		$query		 = "SELECT DISTINCT(a.id) , a.name_job_function_category  ";
		$query		.= "FROM job_function_category a ";
		//$query		.= "FROM job_function a ";
		//$query		.= "left join job_function_category b on a.function_category = b.id ";
		$query		.= "order By name_job_function_category ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	/*
	function lokasi_simpan($putih){
		$this->db->insert('city',$putih);
	}
	*/
	function lokasi_simpan($putih){
		$this->db->insert('sap_city',$putih);
	}
	
	function get_lokasi($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
        //var_dump($search);exit();
		$data		= array();
		$query		 = "SELECT a.* , b.* , a.id as no ";
		$query		.= "FROM sap_city a ";
        $query		.= "left join province b on a.province_id = b.id ";
		$query 		.= "WHERE a.city_name like '%$search%' or b.name_province like '%$search%' ";
        
        
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function lokasi_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('sap_city',$putih);
	}
    
    function listprovinsi() {
		$query		 = "SELECT *  ";
		$query		.= "FROM province ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
    
    function provinsi_simpan($putih){
		$this->db->insert('province',$putih);
	}
    function province_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('province',$putih);
	}
	
    
    function get_provinsi($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM province ";
		$query 		.= "WHERE name_province like '%$search%' ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
    function listjobcategory() {
		$query		 = "SELECT *  ";
		$query		.= "FROM job_function_category ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
    
	function jobcategory_simpan($putih){
		$this->db->insert('job_function_category',$putih);
	}
    function jobcategory_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('job_function_category',$putih);
	}
	
    
    function get_jobcategory($nama){
//		$session_data = $this->session->userdata('logged_in');
		
		$search 	= $this->input->post('dataarr');
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM job_function_category ";
		$query 		.= "WHERE name_job_function_categorylike '%$search%' ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
    
//    function list() {
//		$query		 = "SELECT *  ";
//		$query		.= "FROM job_function_category ";
//		
//		$Q		= $this->db->query($query);
//		if ($Q -> num_rows() > 0) {
//			return $Q->result_array();
//		} else {
//			return false;
//		}
//	}
//    
//	
//	
	
	function listjabatan() {
        $query		 = "SELECT a.*, b.*, a.id as no  ";
		$query		.= "FROM job_function a ";
		$query		.= "left join job_function_category b on a.function_category = b.id ";
		$query		.= "order By a.id desc ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	
	function get_insertid(){
		$query = "SELECT MAX(id) as nid FROM m_jabatan";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() <= 0){
			$nojo = 0;
		} else {
			$row = $Q->row_array();
			//$nor = substr($row['nid'],0,6);
			$nor = substr($row['nid'],1);
			$nojo = $nor;
		}
		return $nojo;
	}
	
	
	function listjabatan_login() {
        $query		 = "SELECT *  ";
		$query		.= "FROM m_jabatan a ";
		$query		.= "order By a.id desc ";
		
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
		/*
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM m_jabatan ";
		$query 		.= "WHERE jabatan like '%$search%' ";
		*/
        
        $data		= array();
		$query		 = "SELECT a.* , b.*, a.id as no ";
		$query		.= "FROM job_function a ";
        $query		.= "left join job_function_category b on a.function_category = b.id ";
		$query 		.= "WHERE a.name_job_function like '%$search%' or b.name_job_function_category like '%$search%' order by a.id desc ";
        
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
		$this->db->insert('job_function',$putih);
	}
	
	function jabatan_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('job_function',$putih);
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
	
	function jabatan_login_simpan($putih){
		$this->db->insert('m_jabatan',$putih);
	}
	
	
	function pernerExist($pern){
		$query = "select * ";
		$query .= "From m_login ";
		$query .= "WHERE username='$pern' ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			 return true;
        }else{
            return false;
        }
	}
	
	
	function listmap_city() {
		$query		 = "SELECT a.*, b.*, c.*, a.id as no  ";
		$query		.= "FROM mapping_city a ";
		$query		.= "left join province b on a.province_id = b.id ";
		$query		.= "left join m_login c on a.manar = c.username ";
		$query		.= "order By a.province_id ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	
	function get_city(){
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM sap_city ";
		$query 		.= "Order BY city_name ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	
	function get_manar(){
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM m_login ";
		$query 		.= "Order BY nama ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function map_city_simpan($putih){
		$this->db->insert('mapping_city',$putih);
	}
	
	function map_city_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('mapping_city',$putih);
	}
	
	
	function get_map_city($nama) {
		$query		 = "SELECT a.*, b.*, c.*, a.id as no  ";
		$query		.= "FROM mapping_city a ";
		$query		.= "left join province b on a.province_id = b.id ";
		$query		.= "left join m_login c on a.manar = c.username ";
		$query 		.= "WHERE a.city_name like '%$nama%' OR b.name_province like '%$nama%' ";
		$query		.= "order By a.province_id ";
		
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function get_persa(){
		$data		= array();
		$query		 = "SELECT * ";
		$query		.= "FROM mapping_manar ";
		$query 		.= "Group By personalareaid Order BY personalarea ";
		$Q			= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	
	function listmap_manar() {
		$query		 = "SELECT a.*, b.*, c.*  ";
		// $query		 = "SELECT a.*, b.*, c.*, a.id as no  ";
		$query		.= "FROM mapping_manar a ";
		$query		.= "left join sap_city b on a.areaid = b.city_id ";
		$query		.= "left join m_login c on a.manar = c.username ";
		// $query		.= "order By a.id desc ";
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	function map_manar_simpan($putih){
		$this->db->insert('mapping_manar',$putih);
	}
	
	function map_manar_edit($putih1,$putih){
		$this->db->where($putih1);
		$this->db->update('mapping_manar',$putih);
	}
	
	
	function get_map_manar($nama) {
		$query		 = "SELECT a.*, b.*, c.*, a.id as no  ";
		$query		.= "FROM mapping_manar a ";
		$query		.= "left join sap_city b on a.areaid = b.city_id ";
		$query		.= "left join m_login c on a.manar = c.username ";
		$query 		.= "WHERE a.personalarea like '%$nama%' OR b.city_name like '%$nama%' ";
		$query		.= "order By a.id desc ";
		
		//var_dump($query);exit();
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
	
	
	function actdon($sd,$ed) {
		$query		 = "SELECT komponen_bak  ";
		$query		.= "FROM trans_jo ";
		// $query		.= "Where date_format(tanggal,'%m-%Y') between '$sd' and '$ed' ";
		$query		.= "Where tanggal between '$sd' and '$ed' ";
		// var_dump($query);die;
		
		$Q		= $this->db->query($query);
		if ($Q -> num_rows() > 0) {
			return $Q->result_array();
		} else {
			return false;
		}
	}
}
?>