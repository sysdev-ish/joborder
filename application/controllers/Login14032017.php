<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');	
		$this->load->model(array('user', 'job_model'));
	}

	function index() {
		$this->load->view('login/login_view');
	}
	
	function create_login() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Login";
			
			$layarray = $this->user->get_jabat();
				$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['jabatan'] ."</option>";
				}
			$data['cmbjabat']		= $select;
			
			$layarray = $this->user->get_layan();
				$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['layanan'] ."</option>";
				}
			$data['cmblayan']		= $select;
			
			$data['llogin']				= $this->user->listlogin();
			
						
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('pages/header',$data);
			$this->load->view('login/add_login');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	function pilih_layanan(){
		$varray				= $this->user->take_lay($this->input->post(data));
			$selectnama 	= "<option value=''>Pilih Layanan</option>";
			foreach($varray as $key => $list){
				$selectnama .= "<option value='". $list['id'] ."'>". $list['layanan'] ."</option>";
			}
		print_r($selectnama);
	}
	
	function login_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$loginx 			= $this->input->post('xlogin');
			$lusername	 		= $loginx[0];
			$lpassword			= $loginx[1];
			$lnama			 	= $loginx[2];
			$llevel 			= $loginx[3];
			$ljabatan 			= $loginx[4];
			$llayanan 			= $loginx[5];
			/*$k					= $this->user->cekperner($perner);
			if ($k -> num_rows() > 0) {
			//if ($cek_perner > 0){
  					echo "Perner sudah ada yang pakai. Ulangi lagi";
					
				}
			// Kalau username valid, inputkan data ke tabel users
			else{
					echo "Data Karyawan Berhasil Disimpan";
				}*/
			
			$putih = array (
				'username'		=> $lusername,
				'password'		=> MD5($lpassword),
				'nama'			=> $lnama,
				'jabatan'		=> $ljabatan,
				'level'			=> $llevel,
				'layanan'		=> $llayanan,
				
				'upd'				=> $data['nama'],
				'lup'				=> date("Y-m-d H:i:s")
			);
			$this->user->login_simpan($putih);
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			//print_r("Data Login Berhasil Disimpan");
			
			$data['llogin']				= $this->user->listlogin();
			$this->load->view('login/listlogin',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	public function listlogin()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Login";
			
			$data['llogin'] 		= $this->user->get_login($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('login/listlogin',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	function login_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$logicx 			= $this->input->post('xlogic');
			$iid		 		= $logicx[0];
			$inama		 		= $logicx[1];
			$ilevel				= $logicx[2];
			$ijabatan			= $logicx[3];
			$ilayanan			= $logicx[4];
			
			/*$k					= $this->user->cekperner($perner);
			if ($k -> num_rows() > 0) {
			//if ($cek_perner > 0){
  					echo "Perner sudah ada yang pakai. Ulangi lagi";
					
				}
			// Kalau username valid, inputkan data ke tabel users
			else{
					echo "Data Karyawan Berhasil Disimpan";
				}*/
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'nama'		=> $inama,
				'jabatan'	=> $ijabatan,
				'level'		=> $ilevel,
				'layanan'	=> $ilayanan,
				
				'upd'				=> $data['nama'],
				'lup'				=> date("Y-m-d H:i:s")
			);
			
			$this->user->login_edit($putih1,$putih);
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['llogin']				= $this->user->listlogin();
			$this->load->view('login/listlogin',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	function create_kontrak() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Kontrak";
			
			$data['lkontrak']				= $this->user->listkontrak();
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('pages/header',$data);
			$this->load->view('kontrak/add_kontrak');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	function layanan_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$arrlayanx 			= $this->input->post('arrlayan');
			$llayan	 			= $arrlayanx[0];
			$lstatus			= $arrlayanx[1];
			$ljabat				= $arrlayanx[2];
			
			$putih = array (
				'jabatan'	=> $ljabat,
				'layanan'	=> $llayan,
				'status'	=> $lstatus
			);
			$this->user->layanan_simpan($putih);
			//print_r("Data Login Berhasil Disimpan");
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['llayanan']		= $this->user->listlayanan();
			$this->load->view('layanan/listlayanan',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	function layanan_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$arrlayx	 		= $this->input->post('arrlay');
			$iid		 		= $arrlayx[0];
			$ilayan		 		= $arrlayx[1];
			$istatus			= $arrlayx[2];
			$ijabat				= $arrlayx[3];
			
			
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'jabatan'	=> $ijabat,
				'layanan'	=> $ilayan,
				'status'	=> $istatus
			);
			
			$this->user->layanan_edit($putih1,$putih);
			//print_r("Data Kontrak Berhasil Di Ubah");
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['llayanan']		= $this->user->listlayanan();
			$this->load->view('layanan/listlayanan',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	function kontrak_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$kontrakx 			= $this->input->post('xkontrak');
			$lkontrak	 		= $kontrakx[0];
			$lstatus			= $kontrakx[1];
			
			/*$k					= $this->user->cekperner($perner);
			if ($k -> num_rows() > 0) {
			//if ($cek_perner > 0){
  					echo "Perner sudah ada yang pakai. Ulangi lagi";
					
				}
			// Kalau username valid, inputkan data ke tabel users
			else{
					echo "Data Karyawan Berhasil Disimpan";
				}*/
			
			$putih = array (
				'jenis'		=> $lkontrak,
				'status'	=> $lstatus
			);
			$this->user->kontrak_simpan($putih);
			//print_r("Data Login Berhasil Disimpan");
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['lkontrak']		= $this->user->listkontrak();
			$this->load->view('kontrak/listkontrak',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	function kontrak_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$kosx	 			= $this->input->post('xkos');
			$iid		 		= $kosx[0];
			$ikontrak	 		= $kosx[1];
			$istatus			= $kosx[2];
			
			/*$k					= $this->user->cekperner($perner);
			if ($k -> num_rows() > 0) {
			//if ($cek_perner > 0){
  					echo "Perner sudah ada yang pakai. Ulangi lagi";
					
				}
			// Kalau username valid, inputkan data ke tabel users
			else{
					echo "Data Karyawan Berhasil Disimpan";
				}*/
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'jenis'		=> $ikontrak,
				'status'	=> $istatus
			);
			
			$this->user->kontrak_edit($putih1,$putih);
			//print_r("Data Kontrak Berhasil Di Ubah");
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['lkontrak']		= $this->user->listkontrak();
			$this->load->view('kontrak/listkontrak',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	public function listkontrak()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Kontrak";
			
			$data['lkontrak'] 		= $this->user->get_kontrak($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('kontrak/listkontrak',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	function create_lokasi() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Lokasi";
			
			$data['llokasi']				= $this->user->listlokasi();
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('pages/header',$data);
			$this->load->view('lokasi/add_lokasi');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	function lokasi_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$lokasix 			= $this->input->post('xlokasi');
			$lkota		 		= $lokasix[0];
			$larea		 		= $lokasix[1];
			$lstatus			= $lokasix[2];
			
			/*$k					= $this->user->cekperner($perner);
			if ($k -> num_rows() > 0) {
			//if ($cek_perner > 0){
  					echo "Perner sudah ada yang pakai. Ulangi lagi";
					
				}
			// Kalau username valid, inputkan data ke tabel users
			else{
					echo "Data Karyawan Berhasil Disimpan";
				}*/
			
			$putih = array (
				'kota'		=> $lkota,
				'area'		=> $larea,
				'status'	=> $lstatus,
				'upd'				=> $data['nama'],
				'lup'				=> date("Y-m-d H:i:s")
			);
			$this->user->lokasi_simpan($putih);
			//print_r("Data Login Berhasil Disimpan");
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['llokasi']		= $this->user->listlokasi();
			$this->load->view('lokasi/listlokasi',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	public function listlokasi()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Lokasi";
			
			$data['llokasi'] 		= $this->user->get_lokasi($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('lokasi/listlokasi',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	function lokasi_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$lokx	 			= $this->input->post('xlok');
			$iid		 		= $lokx[0];
			$ikota		 		= $lokx[1];
			$iarea		 		= $lokx[2];
			$istatus			= $lokx[3];
			
			/*$k					= $this->user->cekperner($perner);
			if ($k -> num_rows() > 0) {
			//if ($cek_perner > 0){
  					echo "Perner sudah ada yang pakai. Ulangi lagi";
					
				}
			// Kalau username valid, inputkan data ke tabel users
			else{
					echo "Data Karyawan Berhasil Disimpan";
				}*/
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'kota'		=> $ikota,
				'area'		=> $iarea,
				'status'	=> $istatus
			);
			
			$this->user->lokasi_edit($putih1,$putih);
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['llokasi']		= $this->user->listlokasi();
			$this->load->view('lokasi/listlokasi',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	function create_jabatan() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Jabatan";
			
			$data['ljabatan']				= $this->user->listjabatan();
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('pages/header',$data);
			$this->load->view('jabatan/add_jabatan');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	
	function create_layanan() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Jabatan";
			
			$data['llayanan']				= $this->user->listlayanan();
			
			$layarray = $this->user->get_jabat();
				$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['jabatan'] ."</option>";
				}
			$data['cmbjabat']		= $select;
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('pages/header',$data);
			$this->load->view('layanan/add_layanan');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	
	public function listlayanan()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Layanan";
			
			$data['llayanan'] 		= $this->user->get_layanan($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('layanan/listlayanan',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	public function listjabatan()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Jabatan";
			
			$data['ljabatan'] 		= $this->user->get_jabatan($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('jabatan/listjabatan',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	function jabatan_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jabatanx 			= $this->input->post('xjabatan');
			$ljabatan	 		= $jabatanx[0];
			$ljawab		 		= $jabatanx[1];
			$lstatus			= $jabatanx[2];
			$llogin				= $jabatanx[3];
			
			/*$k					= $this->user->cekperner($perner);
			if ($k -> num_rows() > 0) {
			//if ($cek_perner > 0){
  					echo "Perner sudah ada yang pakai. Ulangi lagi";
					
				}
			// Kalau username valid, inputkan data ke tabel users
			else{
					echo "Data Karyawan Berhasil Disimpan";
				}*/
			
			$putih = array (
				'jabatan'			=> $ljabatan,
				'status'			=> $lstatus,
				'tggjawab'			=> $ljawab,
				'login'				=> $llogin
			);
			$this->user->jabatan_simpan($putih);
			//print_r("Data Login Berhasil Disimpan");
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['ljabatan']		= $this->user->listjabatan();
			$this->load->view('jabatan/listjabatan',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	function jabatan_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jabx	 			= $this->input->post('xjab');
			$iid		 		= $jabx[0];
			$ijabatan		 	= $jabx[1];
			$istatus			= $jabx[2];
			$ijawab		 		= $jabx[3];
			$ilogin		 		= $jabx[4];
			
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'jabatan'		=> $ijabatan,
				'status'		=> $istatus,
				'tggjawab'		=> $ijawab,
				'login'			=> $ilogin
			);
			
			$this->user->jabatan_edit($putih1,$putih);
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else
			{
				$daud = $session_data['layanan'];
				$nama = $session_data['nama'];
				if($daud == '1')
				{
					$data['notification'] = $this->job_model->get_notif2($tes);
					$data['pesan'] = $this->job_model->get_pesan2($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else
				{ 
					$data['notification'] = $this->job_model->get_notif3($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$data['ljabatan']		= $this->user->listjabatan();
			$this->load->view('jabatan/listjabatan',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	function change_pass(){
		$this->load->view('login/change_password');		
	}
	
}

?>