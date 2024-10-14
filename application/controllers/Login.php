<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation','zip','curl'));	
		$this->load->model(array('user', 'job_model'));
	}

	function index() {
		$this->load->view('login/login_view');
	}
	
	function take_bak() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "TAKE BAK";
			
			$data['lbak']				= $this->user->listbak();
			
			$this->load->view('pages/header',$data);
			$this->load->view('login/take_bak');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	
	public function donlot_bak()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "TAKE BAK";
			
			$aw		= $this->input->post('kumbak'); 
			$az		= count($aw);
			// var_dump($aw);exit();
			for($i=0;$i<$az;$i++)
			{
				$filename = dirname(APPPATH).'/uploads/'.$aw[$i]; 
				//var_dump($filename);exit();
				$this->zip->read_file($filename);
			}
			
			$this->zip->download('donlot_bak.zip');
			
		} else {
			redirect('login', 'refresh');
		}
	}
	
	function create_login() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Create Login";
			
			$layarray = $this->user->get_jabat();
				$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['jabatan'] ."</option>";
				}
			$data['cmbjabat']		= $select;
			
			$layarray = $this->user->get_layan();
				$selectx = "";
				foreach($layarray as $key => $list){
					$selectx .= "<option value=". $list['id'] .">". $list['layanan'] ."</option>";
				}
			$data['cmblayan']		= $selectx;
			
			
			$bayarray = $this->user->get_lvl();
				$selecty = "";
				foreach($bayarray as $key => $list){
					$selecty .= "<option value=". $list['id'] .">". $list['nama'] ."</option>";
				}
			$data['cmblvl']		= $selecty;
			
			
			$data['llogin']				= $this->user->listlogin();
			
						
			$tes = $session_data['level'];
			
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
			$data['username']		= $session_data['username'];
			$loginx 			= $this->input->post('xlogin');
			$lusername	 		= $loginx[0];
			$lpassword			= $loginx[1];
			$lnama			 	= $loginx[2];
			$llevel 			= $loginx[3];
			$ljabatan 			= $loginx[4];
			$llayanan 			= $loginx[5];
			$lstat 				= $loginx[6];
			$lemail				= $loginx[7];
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
				'regional'		=> $lstat,
				'upd'			=> $data['username'],
				'lup'			=> date("Y-m-d H:i:s"),
				'email'			=> $lemail,
				'is_active'		=> 1
			);
			$this->user->login_simpan($putih);
			
			
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
			$iemail				= $logicx[5];
			$istat				= $logicx[6];
		
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'nama'		=> $inama,
				'jabatan'	=> $ijabatan,
				'level'		=> $ilevel,
				'layanan'	=> $ilayanan,
				'regional'	=> $istat,
				'upd'		=> $data['nama'],
				'lup'		=> date("Y-m-d H:i:s"),
				'email'		=> $iemail
			);
			
			$this->user->login_edit($putih1,$putih);
			
			$tes = $session_data['level'];
			
			
			$data['llogin']				= $this->user->listlogin();
			$this->load->view('login/listlogin',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	
	
	public function checkUser(){
        $pern = $this->input->post('perner');
		
		//var_dump($username);
		//var_dump($pkw);exit();
		
        $data    = $this->user->pernerExist($pern);
            if($data == true){
                $status = 1;
            }else{
                $status = 2;
            }
        echo json_encode($status);
			
    }
	
	
	
	function login_reset(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$xarres 			= $this->input->post('arresx');
			$tid		 		= $xarres[0];
			
			$putih1 = array (
				'id'		=> $tid,
			);
			
			$putih = array (
				'password'		=> md5('ish2016')
			);
			
			$this->user->login_reset($putih1,$putih);
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
			/*
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
			*/
			
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
			/*
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
			*/
			
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
			/*
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
			*/
			
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
			/*
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
			*/
			
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
			/*
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
			*/
			
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
            
            $arrprovinsil			= $this->user->get_provinsil();
			$selectnama = "- Pilih Provinsi -";
			foreach($arrprovinsil as $key => $list){
			$selectnama .= "<option value=". $list['province_id'] .">". $list['name_province'] ."</option>";
			}
			$data['listprovinsil']		= $selectnama;	
			
			$tes = $session_data['level'];
			/*
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
			*/
			
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
			$data['username'] 	= $session_data['username'];
			$lokasix 			= $this->input->post('xlokasi');
			$lkota		 		= $lokasix[0];
			$larea		 		= $lokasix[1];
			$lkd_kota	 		= $lokasix[2];
			
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
				'city_id'		=> $lkd_kota,
				'city_name'		=> $lkota,
				'province_id'	=> $larea,
				'upd'			=> $data['username'],
				'lup'			=> date("Y-m-d H:i:s")
			);
			$this->user->lokasi_simpan($putih);
			//print_r("Data Login Berhasil Disimpan");
			$tes = $session_data['level'];
			/*
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
			*/
			
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
			$data['title'] 			= "List location";
			
			$data['llokasi'] 		= $this->user->get_lokasi($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			/*
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
			*/
		
			$this->load->view('lokasi/listlokasi',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	function lokasi_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$data['username']	= $session_data['username'];
			$lokx	 			= $this->input->post('xlok');
			$iid		 		= $lokx[0];
			$ikota		 		= $lokx[1];
			$iarea		 		= $lokx[2];
			$ikd_kota	 		= $lokx[3];
			
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
				'city_id'		=> $ikd_kota,
				'city_name'		=> $ikota,
				'province_id'	=> $iarea,
				'upd'			=> $data['username'],
				'lup'			=> date("Y-m-d H:i:s")
			);
			
			$this->user->lokasi_edit($putih1,$putih);
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$data['llokasi']		= $this->user->listlokasi();
			$this->load->view('lokasi/listlokasi',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
    
    function create_provinsi() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Provinsi";
			
			$data['lprovinsi']				= $this->user->listprovinsi();
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$this->load->view('pages/header',$data);
			$this->load->view('provinsi/add_provinsi');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	
	function provinsi_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$provincex 			= $this->input->post('xprovince');
       
			$lprovince		 		= $provincex[0];
			
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
				'name_province'		=> $lprovince
			
			);
			$this->user->provinsi_simpan($putih);
			//print_r("Data Login Berhasil Disimpan");
			$tes = $session_data['level'];
			/*
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
			*/
			
			$data['lprovinsi']		= $this->user->listprovinsi();
			$this->load->view('provinsi/listprovinsi',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	public function listprovinsi()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Lokasi";
			
			$data['lprovinsi'] 		= $this->user->get_provinsi($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$this->load->view('provinsi/listprovinsi',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	function provinsi_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$provincex	 			= $this->input->post('xprovince');
			$iid		 		= $provincex[0];
			$iprovince		 		= $provincex[1];
			
			
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
				'name_province'		=> $iprovince,
			);
			
			$this->user->province_edit($putih1,$putih);
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$data['lprovinsi']		= $this->user->listprovinsi();
			$this->load->view('provinsi/listprovinsi',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
    
	function create_jobcategory() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Job Category";
			
			$data['ljobcategory']				= $this->user->listjobcategory();
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$this->load->view('pages/header',$data);
			$this->load->view('job_category/add_categoryjob');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	
	function jobcategory_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jobcategoryx 			= $this->input->post('xjobcategory');
       
			$ljobcategory		 		= $jobcategoryx[0];
			
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
				'name_job_function_category'		=> $ljobcategory
			
			);
			$this->user->jobcategory_simpan($putih);
			//print_r("Data Login Berhasil Disimpan");
			$tes = $session_data['level'];
			/*
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
			*/
			
			$data['ljobcategory']		= $this->user->listjobcategory();
			$this->load->view('job_category/listcategoryjob',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	public function listjobcategory()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Job Category";
			
			$data['ljobcategory'] 		= $this->user->get_jobcategory($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$this->load->view('job_category/listcategoryjob',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	function jobcategory_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jobcategoryx	 			= $this->input->post('xjobcategory');
			$iid		 		= $jobcategoryx[0];
			$ijobcategory		 		= $jobcategoryx[1];
			
			
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
				'name_job_function_category'		=> $ijobcategory,
			);
			
			$this->user->jobcategory_edit($putih1,$putih);
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$data['ljobcategory']		= $this->user->listjobcategory();
			$this->load->view('job_category/listcategoryjob',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	
	public function hitung($next){
		$inext = strlen($next);
		switch ($inext){
			case 1: $noj = "00" . $next; break;
			case 2: $noj = "0" . $next; break;
			case 3: $noj = $next; break;
		}
		return $noj;
	}	
	
	
	function create_jabatan_login() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Jabatan";
			
			$data['ljabatan']				= $this->user->listjabatan_login();
			
			$tes = $session_data['level'];
			
			$this->load->view('pages/header',$data);
			$this->load->view('jabatan_login/add_jabatan_login',$data);
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	
	
	function create_jabatan() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Create Jabatan";
			
            
			$data['ljabatan']				= $this->user->listjabatan();
            
            $arrjabatanl			= $this->user->get_jabatanl();
			$selectnama = "- Pilih Jabatan -";
			foreach($arrjabatanl as $key => $list){
			$selectnama .= "<option value=". $list['id'] .">". $list['name_job_function_category'] ."</option>";
			}
			$data['listjabatanl']		= $selectnama;	
			
			$tes = $session_data['level'];
			
			
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
			/*
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
			*/
			
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
			$lkategori		 	= $jabatanx[1];
		
			
			$putih = array (
				'function_category'			=> $lkategori,
				'name_job_function'			=> $ljabatan
			
			);
			$this->user->jabatan_simpan($putih);
			$tes = $session_data['level'];
			
			
			$data['ljabatan']		= $this->user->listjabatan();
			$this->load->view('jabatan/listjabatan',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	
	function jabatan_login_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jabatanx 			= $this->input->post('xjabatan');
			$ljabatan	 		= $jabatanx[0];
			$llogin			 	= $jabatanx[1];
			$lrinc			 	= $jabatanx[2];
			
			$idsk = "";
			$consk = 'J';
			$year = date('Y');
			
			$nojobsk = $this->user->get_insertid();
			if ($nojobsk == 0){
				$newsk = '001';
				$idsk = $consk . $newsk;			
			} else {
				$norsk    = $nojobsk;
				$nextsk   = intval($norsk) + 1;
				$xnextsk  = $this->hitung($nextsk);
				$idsk     = $consk . $xnextsk;
			}		
			$data['idsk'] = $idsk;
			
			$putih = array (
				'id'			=> $idsk,
				'jabatan'		=> $ljabatan,
				'login'			=> $llogin,
				'tggjawab'		=> $lrinc
			);
			$this->user->jabatan_login_simpan($putih);
			$tes = $session_data['level'];
			
			
			$data['ljabatan']		= $this->user->listjabatan_login();
			$this->load->view('jabatan_login/listjabatan_login',$data);
			
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
			$ikategori			= $jabx[2];

			
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'function_category'		=> $ikategori,
				'name_job_function'		=> $ijabatan				
			);
			
			//var_dump($putih1);var_dump($putih);
			//exit();
			
			$this->user->jabatan_edit($putih1,$putih);
			
			$tes = $session_data['level'];
			
			
			$data['ljabatan']		= $this->user->listjabatan();
			$this->load->view('jabatan/listjabatan',$data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	function change_pass(){
		$this->load->view('login/change_password');		
	}
	
	
	function create_mapping_city_manar() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Create Mapping City Manar";
			
			$layarray = $this->user->get_city();
				$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['city_id'] .">". $list['city_name'] ."</option>";
				}
			$data['listcity']		= $select;
			
			$layarray = $this->user->get_manar();
				$selectx = "";
				foreach($layarray as $key => $list){
					$selectx .= "<option value=". $list['username'] .">". $list['nama'] ."</option>";
				}
			$data['listmanar']		= $selectx;
			
			/*
			$arrprovinsil			= $this->user->get_provinsil();
			$selectnama = "- Pilih Provinsi -";
			foreach($arrprovinsil as $key => $list){
			$selectnama .= "<option value=". $list['province_id'] .">". $list['name_province'] ."</option>";
			}
			$data['listprovinsil']		= $selectnama;	
			*/
			
			$prorray = $this->job_model->get_province();
				$select = "";
				foreach($prorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['name_province'] . "</option>";
				}
			$data['cmbprovince']		= $select;
			
			
			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_area');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"), 'search' => '');
			$this->curl->post($post);
			$data['cmbarea'] =json_decode($this->curl->execute());
			usort($data['cmbarea'], array($this, "sort_area"));
			
			// $varray				= $this->skema_model->take_area23($this->input->post(data));
			$varray				= $data['cmbarea'];
				//$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
				$selectnama 	= "<option value=''>pilih</option>";
				foreach($varray as $key => $list){
					$selectnama .= "<option value='". $list->AREA ."'>". $list->AREA_TEXT ."</option>";
					// $selectnama .= "<option value='". $list['btrtl'] ."'>". $list['btrtx'] ."</option>";
				}
			$data['listcityx']		= $selectnama;
			
			
			$data['lmap_city']				= $this->user->listmap_city();
			
						
			$tes = $session_data['level'];
			
			$this->load->view('pages/header',$data);
			$this->load->view('map_manar/add_map_city');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	
	function map_city_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jabatanx 			= $this->input->post('xlokasi');
			$lkota		 		= $jabatanx[0];
			$lprovince		 	= $jabatanx[1];
			$lmanar			 	= $jabatanx[2];
			$lkota_nama		 	= $jabatanx[3];
		
			
			$putih = array (
				'city_id'				=> $lkota,
				'city_name'				=> $lkota_nama,
				'province_id'			=> $lprovince,
				'manar'					=> $lmanar
			);
			$this->user->map_city_simpan($putih);
			
			$data['lmap_city']				= $this->user->listmap_city();
			$this->load->view('map_manar/listmap_city',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	
	function map_city_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jabatanx 			= $this->input->post('xlok');
			$iid		 		= $jabatanx[0];
			$ikota			 	= $jabatanx[1];
			$iprovince		 	= $jabatanx[2];
			$imanar			 	= $jabatanx[3];
			$ikota_nama		 	= $jabatanx[4];
		
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'city_id'				=> $ikota,
				'city_name'				=> $ikota_nama,
				'province_id'			=> $iprovince,
				'manar'					=> $imanar
			);
			
			//var_dump($putih1);var_dump($putih);exit();
			
			$this->user->map_city_edit($putih1,$putih);
			
			$data['lmap_city']				= $this->user->listmap_city();
			$this->load->view('map_manar/listmap_city',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	
	public function listmap_city()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Mapping City";
			
			$data['lmap_city'] 		= $this->user->get_map_city($this->input->post('dataarr'));
			$this->load->view('map_manar/listmap_city',$data);
			//$tes = $session_data['level'];
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	function create_mapping_manar() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Create Mapping City Manar";
			
			$layarray = $this->user->get_city();
				$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['city_id'] .">". $list['city_name'] ."</option>";
				}
			$data['listcity']		= $select;
			
			$layarray = $this->user->get_manar();
				$selectx = "";
				foreach($layarray as $key => $list){
					$selectx .= "<option value=". $list['username'] .">". $list['nama'] ."</option>";
				}
			$data['listmanar']		= $selectx;
			
			
			$arrprovinsil			= $this->user->get_persa();
			$selectnama = "- Pilih Provinsi -";
			foreach($arrprovinsil as $key => $list){
			$selectnama .= "<option value=". $list['personalareaid'] .">". $list['personalarea'] ."</option>";
			}
			$data['listpersa']		= $selectnama;	
			
			
			$data['lmap_manar']				= $this->user->listmap_manar();
			
						
			$tes = $session_data['level'];
			
			$this->load->view('pages/header',$data);
			$this->load->view('map_manar/add_map_manar');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	
	function map_manar_simpan(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jabatanx 			= $this->input->post('xlokasi');
			$lkota		 		= $jabatanx[0];
			$lpersa			 	= $jabatanx[1];
			$lmanar			 	= $jabatanx[2];
			$lpersa_nama		= $jabatanx[3];
		
			
			$putih = array (
				'personalareaid'		=> $lpersa,
				'personalarea'			=> $lpersa_nama,
				'areaid'				=> $lkota,
				'manar'					=> $lmanar
			);
			$this->user->map_manar_simpan($putih);
			
			$data['lmap_manar']				= $this->user->listmap_manar();
			$this->load->view('map_manar/listmap_manar',$data);
			
		} else {
			redirect('login', 'refresh');
		}
	}
	
	
	function map_manar_edit(){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$jabatanx 			= $this->input->post('xlok');
			$iid		 		= $jabatanx[0];
			$ikota			 	= $jabatanx[1];
			$ipersa			 	= $jabatanx[2];
			$imanar			 	= $jabatanx[3];
			$ipersa_nama		= $jabatanx[4];
		
			$putih1 = array (
				'id'		=> $iid,
			);
			
			$putih = array (
				'personalareaid'		=> $ipersa,
				'personalarea'			=> $ipersa_nama,
				'areaid'				=> $ikota,
				'manar'					=> $imanar
			);
			
			//var_dump($putih1);var_dump($putih);exit();
			
			$this->user->map_manar_edit($putih1,$putih);
			
			$data['lmap_manar']				= $this->user->listmap_manar();
			$this->load->view('map_manar/listmap_manar',$data);
			
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	
	public function listmap_manar()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Mapping City";
			
			$data['lmap_manar'] 		= $this->user->get_map_manar($this->input->post('dataarr'));
			$this->load->view('map_manar/listmap_manar',$data);
			//$tes = $session_data['level'];
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	function donlot_dok() {
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Create Mapping City Manar";
			
			
			$this->load->view('pages/header',$data);
			$this->load->view('dokumen/donlot_dok');
			$this->load->view('pages/footer');
		}
		else {
			redirect ('login','refresh');
		}
	}
	
	public function act_donlot()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['typel'] 				= $session_data['type'];
			$data['title'] 			= "e-Contract";
			ini_set('memory_limit','-1');
			
			$sd		= $this->input->post('sdate');
			$ed		= $this->input->post('edate');
			
			$data['lreport'] 	= $this->user->actdon($sd, $ed);
			foreach($data['lreport'] as $list)
			{
				// var_dump($list['dokumen']);die;
				$filename = dirname(APPPATH).'/uploads/'.$list['komponen_bak'];
				$this->zip->read_file($filename);
			}
			
			$this->zip->download('donlot_dok.zip');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
}

?>