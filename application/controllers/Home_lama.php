<?php   
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");



class Home extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library('form_validation');
		$this->load->model(array('job_model','user'));
	}

	/*
	public function index()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['title'] 		= "Job Order";
			$data['transjo'] 		= $this->job_model->get_transjo();
			
			$tes = $session_data['level'];
			if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif($tes);
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1($tes);
			}
			
			$daud = $session_data['layanan'];
			if($daud == '1')
			{
				$data['notification'] = $this->job_model->get_notif2();
			}
			else
			{
				$data['notification'] = $this->job_model->get_notif3();
			}
			
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
					//$data['notification'] = $this->job_model->get_notif4($nama);
					$data['pesan'] = $this->job_model->get_pesan3($nama);
					//$data['pesan'] = $this->job_model->get_pesan4($nama);
					$data['eek'] = 'Telah di Reject' ;
				}
			}
			
			$this->load->view('pages/header',$data);
			$this->load->view('pages/dashboard1',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}
	*/
	
	public function index()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['title'] 			= "Job Order";
			
			$data['transjo'] 		= $this->job_model->get_transjo();
			$data['telkomgroup'] 	= $this->job_model->get_alljo();
			$data['infomedia'] 		= $this->job_model->get_ontime();
			$data['telkom'] 		= $this->job_model->get_alljoapp();
			$data['wew'] 			= $this->job_model->get_topod();
			$data['group'] 			= $this->job_model->get_overdue();
			
			$data['graph'] 			= $this->job_model->graph();
			
			//$tes = $session_data['level'];
			/*if($tes == 'Administrator')
			{
				$data['notification'] = $this->job_model->get_notif($tes);
			}
			else if($tes == 'Recruter')
			{
				$data['notification'] = $this->job_model->get_notif1($tes);
			}
			
			$daud = $session_data['layanan'];
			if($daud == '1')
			{
				$data['notification'] = $this->job_model->get_notif2();
			}
			else
			{
				$data['notification'] = $this->job_model->get_notif3();
			}
			*/
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			
			$this->load->view('pages/header',$data);
			$this->load->view('pages/dashboard_grafik',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}
	
	public function listdashboard()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Login";
			
			$data['transjo'] 		= $this->job_model->get_dashboard($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			
			$this->load->view('pages/listdashboard',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	
	public function listjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 			= "List Login";
			
			$search = $this->input->post('dataarr');
			$data['transjo'] 		= $this->job_model->get_jo($search);
			
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			
			$this->load->view('joborder/listjo',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	public function listappjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 			= "List Login";
			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			$search = $this->input->post('dataarr');
			
			
			if ($tes1 == '4') 
			{
				$data['transjo'] 		= $this->job_model->get_appjo1($search,$tes1);
				
			}
			else if ($tes1 == '2') 
			{
				$data['transjo'] 		= $this->job_model->get_appjo($search,$daud);
				
			}
			else if ($tes1 == '1') 
			{
				$data['transjo'] 		= $this->job_model->get_appjo2($search,$username);
			}
			else
			{
				$data['transjo'] 		= $this->job_model->get_appjo2($search);
			}
			
			
			
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			
			$this->load->view('joborder/listappjo',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}

	public function appjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			//$data['approval'] 		= $session_data['approval'];			
			$data['title'] 		= "Job Order";
			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			if ($tes1 == '4') 
			{
				$data['transjo'] 		= $this->job_model->get_transappjo1();
				
				//$dbpostgre = $this->load->database('db_second',TRUE);
				//$jabatanrray = $dbpostgre->query("select id, job_name_level from job_level")->row();
			}
			else if ($tes1 == '2') 
			{
				$data['transjo'] 		= $this->job_model->get_transappjo($daud);
				
			}
			else if ($tes1 == '1') 
			{
				$data['transjo'] 		= $this->job_model->get_transappjo2($username);
			}
			else
			{
				$data['transjo'] 		= $this->job_model->get_transappjo3();
			}
			
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			
			$jabatanrray = $this->job_model->get_level_name();
			$selectlevel = "";
			foreach($jabatanrray as $key => $list){
				$selectlevel .= "<option value='". $list['id'] ."'>". $list['job_name_level'] ."</option>";
			}
			$data['cmblevel']		= $selectlevel;	
			
			$data['form_job_skills'] = $this->job_model->getSkills()->result();
			
			$data['form_job_benefits'] = $this->job_model->getBenefits()->result();
			

			$this->load->view('pages/header',$data);
			$this->load->view('joborder/appjo',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}

	public function listorder()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] = "Job Order";
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			
			if($tes != '5')
			{
				//$data['transjo'] = $this->job_model->get_transall();
				if($tes == '2')
				{
					$data['transjo'] = $this->job_model->get_transall_approval($daud);
				}
				else if($tes == '1')
				{
					$data['transjo'] = $this->job_model->get_transall_craeter($username);
				}
				else
				{
					$data['transjo'] = $this->job_model->get_transall();
				}
				
				if($tes == '4')
				{
					$data['notification'] = $this->job_model->get_notif();
					$data['pesan'] = $this->job_model->get_pesan($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else if($tes == '3')
				{
					$data['notification'] = $this->job_model->get_notif1();
					$data['pesan'] = $this->job_model->get_pesan1();
					$data['eek'] = 'Baru' ;
				}
				else if($tes == '2')
				{
					$daud = $session_data['layanan'];
					
					$data['notification'] = $this->job_model->get_notif2($daud);
					$data['pesan'] = $this->job_model->get_pesan2($daud);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else if($tes == '1')
				{
					$username = $session_data['username'];
					
					$data['notification'] = $this->job_model->get_notif3($username);
					$data['pesan'] = $this->job_model->get_pesan3($username);
					$data['eek'] = 'Telah di Reject' ;
				}
				else
				{
					$username = $session_data['username'];
					
					$data['notification'] = $this->job_model->get_notif3($username);
					$data['pesan'] = $this->job_model->get_pesan3($username);
					$data['eek'] = 'Telah di Reject' ;
				}
				
				
				$this->load->view('pages/header',$data);
				$this->load->view('joborder/listorder',$data);
				$this->load->view('pages/footer');
			}
			else
			{
				$data['transjo'] = $this->job_model->get_transall_sap();
				
				if($tes == '4')
				{
					$data['notification'] = $this->job_model->get_notif();
					$data['pesan'] = $this->job_model->get_pesan($tes);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else if($tes == '3')
				{
					$data['notification'] = $this->job_model->get_notif1();
					$data['pesan'] = $this->job_model->get_pesan1();
					$data['eek'] = 'Baru' ;
				}
				else if($tes == '2')
				{
					$daud = $session_data['layanan'];
					
					$data['notification'] = $this->job_model->get_notif2($daud);
					$data['pesan'] = $this->job_model->get_pesan2($daud);
					$data['eek'] = 'Menunggu Approval' ;
				}
				else if($tes == '1')
				{
					$username = $session_data['username'];
					
					$data['notification'] = $this->job_model->get_notif3($username);
					$data['pesan'] = $this->job_model->get_pesan3($username);
					$data['eek'] = 'Telah di Reject' ;
				}
				else
				{
					$username = $session_data['username'];
					
					$data['notification'] = $this->job_model->get_notif3($username);
					$data['pesan'] = $this->job_model->get_pesan3($username);
					$data['eek'] = 'Telah di Reject' ;
				}
				
				
				$this->load->view('pages/header',$data);
				$this->load->view('joborder/listorder_sap',$data);
				$this->load->view('pages/footer');
			}
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	/*
	public function joborder()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Job Order";
			$nojo = "";
			$cons = '/ISH/01010107/';
			$year = date('Y');

			$nojob = $this->job_model->get_insertjo();
			if ($nojob == 0){
				$new = '000001';
				$nojo = $new . $cons . $year;			
			} else {
				$nor = $nojob;
				$next = intval($nor) + 1;
				$xnext = $this->hitung($next);
				$nojo = $xnext . $cons . $year;
			}		
			$data['nojo'] = $nojo;
			
			$jabatanrray = $this->job_model->get_jabatan();
				$selectjabatan = "";
				foreach($jabatanrray as $key => $list){
					$selectjabatan .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbjabatan']		= $selectjabatan;		

			$tggrray = $this->job_model->get_tgg();
				$select = "";
				foreach($tggrray as $key => $list){
					$select .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbtgg']		= $select;

			$lokrray = $this->job_model->get_lokasi();
				$select = "";
				foreach($lokrray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['kota'] . " - " . $list['area'] ."</option>";
				}
			$data['cmblokasi']		= $select;

			$dikrray = $this->job_model->get_pendidikan();
				$select = "";
				foreach($dikrray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['pendidikan'] . "</option>";
				}
			$data['cmbpendidikan']		= $select;
			
			$konrray = $this->job_model->get_kontrak();
				$select = "";
				foreach($konrray as $key => $list){
					$select .= "<option value=". $list['jenis'] .">". $list['jenis'] . "</option>";
				}
			$data['cmbkontrak']		= $select;
			
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
			$this->load->view('joborder/addjoborder',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}
	*/
	
	public function joborder()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Job Order";
			
			$nojo = "";
			$cons = '/ISH/01010107/';
			$year = date('Y');
			
			$nojob = $this->job_model->get_insertjo();
			if ($nojob == 0){
				$new = '000001';
				$nojo = $new . $cons . $year;			
			} else {
				$nor = $nojob;
				$next = intval($nor) + 1;
				$xnext = $this->hitung($next);
				$nojo = $xnext . $cons . $year;
			}		
			$data['nojo'] = $nojo;
			
			$jabatanrray = $this->job_model->get_jabatan();
				$selectjabatan = "";
				foreach($jabatanrray as $key => $list){
					$selectjabatan .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbjabatan']		= $selectjabatan;		

			$tggrray = $this->job_model->get_tgg();
				$select = "";
				foreach($tggrray as $key => $list){
					$select .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbtgg']		= $select;

			$lokrray = $this->job_model->get_lokasi();
				$select = "";
				foreach($lokrray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['kota'] . "  " . $list['area'] ."</option>";
				}
			$data['cmblokasi']		= $select;
			
			$dikrray = $this->job_model->get_pendidikan();
				$select = "";
				foreach($dikrray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['pendidikan'] . "</option>";
				}
			$data['cmbpendidikan']		= $select;
			
			$konrray = $this->job_model->get_kontrak();
				$select = "";
				foreach($konrray as $key => $list){
					$select .= "<option value=". $list['jenis'] .">". $list['jenis'] . "</option>";
				}
			$data['cmbkontrak']		= $select;
			
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			
			$prorray = $this->job_model->get_province();
				$select = "";
				foreach($prorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['name_province'] . "</option>";
				}
			$data['cmbprovince']		= $select;
			
			$katerray = $this->job_model->get_kategori();
				$select = "";
				foreach($katerray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['name_job_function_category'] . "</option>";
				}
			$data['cmbkategori']		= $select;
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/addjoborder',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}

	function detailjo(){
		if ($this->session->userdata('logged_in')){
			$onjo = $this->input->post('anojo');
			$data	= $this->job_model->detailjo($onjo);
			
			
			//print_r ($_POST);
			//$this->output->enable_profiler(TRUE);
			echo json_encode($data);
			
		}
	}

	function trajo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$data['rincian']		= $this->job_model->trajo($njo);
			
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			
			$this->load->view('joborder/rincian', $data);
		}
	}

	function rejectjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$keter = $njo[1];
			$this->job_model->rejectjo($njok, $keter);
			//$this->appjo();
			
			//$data['transjo'] 		= $this->job_model->get_transappjo();
			//$this->load->view('joborder/listapp',$data);
			redirect('home/appjo', 'refresh');
			//$this->load->view('joborder/appjo',$data);
		}
	}
	
	function rejectjo1(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$keter = $njo[1];
			$this->job_model->rejectjo1($njok, $keter);
			//$this->appjo();
			
			//$data['transjo'] 		= $this->job_model->get_transappjo();
			//$this->load->view('joborder/listapp',$data);
			redirect('home/appjo', 'refresh');
			//$this->load->view('joborder/appjo',$data);
		}
	}

	function simpantjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$keter = $njo[1];
			$this->job_model->inssimpantjo($njok,$keter);
			
			
			//$data['transjo'] 		= $this->job_model->get_transappjo();
			//$this->load->view('joborder/listapp',$data);
			redirect('home/appjo', 'refresh');
			//$this->appjo();
		}
	}
	
	function simpantjo1(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$njo   			= $this->input->post('arrappjo');
			$njok  			= $njo[0];
			$keter 			= $njo[1];
			$ssalary 		= $njo[2];
			$esalary 		= $njo[3];
			$exper 			= $njo[4];
			$level 			= $njo[5];
			$job_skills 	= $njo[6];
			$job_benefits	= $njo[7];
			$duedate 		= $njo[8];
			$duedate1 		= $njo[9];
			$this->job_model->inssimpantjo1($njok,$keter);
			
			/*
			$dbpostgre = $this->load->database('db_second',TRUE);
			$q = $dbpostgre->get('mahasiswa');
			return $q->result();
			*/
			
			$cek_nojo = $this->db->query("SELECT * FROM trans_jo a left join trans_rincian b on a.nojo=b.nojo left join job_function c on b.jabatan=c.id where b.nojo='".$njok."' ")->result();
			
			
			
			$i = 0;
			foreach ($cek_nojo as $s) {
				//$gg = $s->nojo;
				$ds = $s->deskripsi;
				$su = '["'.$s->jabatan.'"]';
				$job_data['company_id'] = '97';
				//$ja = $s->jabatan;
				if(!filter_var($s->jabatan, FILTER_VALIDATE_INT)) 
				{    
					$ja = $s->jabatan;
				} 
				else 
				{    
					$ja = $s->name_job_function;
				}  
				
				
				
				if(!filter_var($s->lokasi, FILTER_VALIDATE_INT)) 
				{    
					$dz = 411;
				} 
				else 
				{    
					$dz = $s->lokasi;
				} 
				
				
			
				if( ($s->gender) == 'Pria-Wanita')
				{
					$ish = -1 ;
				}
				elseif( ($s->gender) == 'Pria')
				{
					$ish = 1 ;
				}
				elseif( ($s->gender) == 'Wanita')
				{
					$ish = 2 ;
				}
			
			
			
				if( ( ($s->pendidikan) == 'D3') || ( ($s->pendidikan) == 'D2') || ( ($s->pendidikan) == 'D1') )
				{
					$ishi = 2 ;
				}
				elseif( ($s->pendidikan) == 'SMA')
				{
					$ishi = 1 ;
				}
				elseif( ( ($s->pendidikan) == 'S1') || ( ($s->pendidikan) == 'S2') )
				{
					$ishi = 3 ;
				}
				
				
				if( ($s->kontrak) == 'PKWT')
				{
					$ishis = '["1"]' ;
				}
				elseif( ($s->kontrak) == 'Kemitraan')
				{
					$ishis = '["1"]' ;
				}
				elseif( (($s->kontrak) == 'Part') || (($s->kontrak) == 'Part Time') )
				{
					$ishis = '["2"]' ;
				}
				elseif( ($s->kontrak) == 'Magang')
				{
					$ishis = '["6"]' ;
				}
				
				//$skills = $job_skills ;
				//$skills = $job_skills;
				
				$skills = explode("|", $job_skills);
				
				$temp_skill = array();
				
				foreach ($skills as $value) {
					if (is_numeric($value)) {
						//$dbpostgre = $this->load->database('db_second',TRUE);
						array_push($temp_skill, $this->job_model->getSkill($value));
					} else {
						$skill_data['skill_name'] = $value;
						$skill_data['is_publish'] = '0';
						//$dbpostgre = $this->load->database('db_second',TRUE);
						array_push($temp_skill, $this->job_model->addSkill($skill_data));
					}
				}
				
				//$benefits = $job_benefits ;
				$benefits = explode("|", $job_benefits);
				
				$temp_benefit = array();
				
				foreach ($benefits as $value) {
					if (is_numeric($value)) {
						//$dbpostgre = $this->load->database('db_second',TRUE);
						array_push($temp_benefit, $this->job_model->getBenefit($value));
					} else {
						$benefit_data['name_benefits'] = $value;
						//$benefit_data['is_publish'] = '0';
						//$dbpostgre = $this->load->database('db_second',TRUE);
						array_push($temp_benefit, $this->job_model->addBenefit($benefit_data));
					}
				}
			
				 $data['company_job_skill'] = $temp_skill;
				 
				 $temp_skill = array();

				 foreach ($data['company_job_skill'] as $key => $value) {
					array_push($temp_skill, $value->id);
				 }
				 
				 
				 $data['company_job_benefit'] = $temp_benefit;
				 
				 $temp_benefit = array();

				 foreach ($data['company_job_benefit'] as $key => $value) {
					array_push($temp_benefit, $value->id);
				 }
			 
			
				//$dbpostgre = $this->load->database('db_second',TRUE);
				//$dbpostgre->query("INSERT INTO company_jobs(company_id, job_title, job_description, job_gender, job_education, job_job_level, job_experience, job_is_freshgraduate, job_skills, job_employment_type, job_salary_type, job_salary_min, job_salary_max, job_salary_negotiable, job_salary_is_show, job_city, job_benefit, job_job_function, job_publish_start, job_publish_end, job_is_publish, job_status, job_is_draft, job_view_count, job_member_click, job_non_member_click, job_total_click) VALUES ('97', '$ja', '$ds', '$ish', '$ishi', '".$level."', '".$exper."', '1', '1', '".$level."')");
				
				$i++;
				
				$item = array (
				'company_id' 					=> $job_data['company_id'],
				'job_title' 					=> $ja,
				'job_description' 				=> $ds,
				'job_gender' 					=> $ish,
				'job_education' 				=> $ishi,
				'job_job_level' 				=> $level,
				'job_experience' 				=> $exper,
				'job_is_freshgraduate' 			=> '1',
				'job_skills' 					=> json_encode($temp_skill),
				'job_employment_type' 			=> $ishis,
				'job_salary_type' 				=> 'Monthly',
				'job_salary_min' 				=> $ssalary,
				'job_salary_max' 				=> $esalary,
				'job_salary_negotiable' 		=> '1',
				'job_salary_is_show' 			=> '1',
				'job_city' 						=> $dz,
				'job_benefit' 					=> json_encode($temp_benefit),
				'job_job_function' 				=> $su,
				'job_publish_start' 			=> $duedate,
				'job_publish_end' 				=> $duedate1,
				'job_is_publish' 				=> '0',
				'job_status' 					=> '0',
				'job_created_at' 				=> date("Y-m-d H:i:s"),
				'job_token' 					=> md5(time() . $ja . $job_data['company_id'] . mt_rand(0, 1000)),
				'job_is_draft' 					=> '0',
				'job_view_count'				=> '0',
				'job_member_click' 				=> '0',
				'job_non_member_click' 			=> '0',
				'job_total_click' 				=> '0',
				'job_remarks' 					=> ''
				);
				
				$dbpostgre = $this->load->database('db_second',TRUE);
				$this->job_model->simpan_media($item);
			
			}
			
			
			
			
			
			$msg = 'Data Berhasil Di Approve';
			//redirect('inisialisasi/inisialisasi', 'refresh');
			
			$redirect = site_url('/home/joborder/');
			echo "<script>javascript:alert('$msg'); window.location = '$redirect'</script>";
			
			//$data['transjo'] 		= $this->job_model->get_transappjo();
			//$this->load->view('joborder/listapp',$data);
			//redirect('home/appjo', 'refresh');
			//$this->appjo();
			
			
		}
	}
	
	function simpan_skema(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$njo = $this->input->post('data');
			$this->job_model->inssimpanskema($njo);
			
			
			//$data['transjo'] 		= $this->job_model->get_transappjo();
			//$this->load->view('joborder/listapp',$data);
			redirect('home/listorder', 'refresh');
			//$this->appjo();
		}
	}
	
	function editjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			
			//$rekrut = $this->input->post('rekrut');
			
			$item = array (
				'nojo' => $this->input->post('idnojo'),
				'jml_pkwt' => $this->input->post('rekrut'),
				'jml_training' => $this->input->post('training'),
				'jml_user' => $this->input->post('user'),
				'jml_hr' => $this->input->post('hr'),
				'note' => $this->input->post('note'),
				'upd' => $session_data['username'],
				'lup' => date("Y-m-d H:i:s")
			);
			/*
			$idnjo = $this->input->post('idnojo');
			$this->job_model->editjo($item);
			*/
			$infomedia = $this->job_model->editjo($item);	
			echo json_encode($infomedia);
			exit;
			redirect('home/listorder', 'refresh');
			//$this->load->view('joborder/rincian_listjo', $data);
			
		}
	}
	
	
	function simpan_komentar(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			
			$item = array (
				'nojo' => $this->input->post('snojo'),
			);
			
			$item1 = array (
				'komentar' => $this->input->post('skomentar')
			);
					
			$infomedia=$this->job_model->simpan_komentar($item,$item1);
			
			echo json_encode($infomedia);
			
			exit;
			redirect('home/listorder', 'refresh');
			
		}
	}
	
	/*
	function editjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			
			$cokx	 			= $this->input->post('xcok');
			$idnojo		 		= $cokx[0];
			$rekrut		 		= $cokx[1];
			
			
			$item = array (
				'nojo' => $idnojo,
				'jml' => $rekrut,
				'upd' => $session_data['nama'],
				'lup' => date("Y-m-d H:i:s")
			);
			$idnjo = $this->input->post('idnojo');
			
						
			$this->job_model->editjo($item);
			
			
			redirect('home/listorder', 'refresh');
			//$data['transjo'] = $this->job_model->get_transall();
			//$this->load->view('joborder/listjob',$data);
			//$data['transjo'] = $this->job_model->get_transall();
			//$this->load->view('joborder/listjob',$data);
			
			//echo "Sukses";
			
		}
	}
	*/
	/*
	function rincian_simpan(){
		
		//$file_element_name = 'komponen';

        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx';
		$config['max_size']    = 1024 * 100;

			
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
		
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
	
		$item = array (
			'nojo' => $this->input->post('nojo'),
			'tanggal' => $this->input->post('tanggal'),
			'project' => $this->input->post('project'),
			'syarat' => $this->input->post('syarat'),
			'deskripsi' => $this->input->post('deskripsi'),
			'lama' => $this->input->post('lama'),
			'latihan' => $this->input->post('latihan'),
			'bekerja' => $this->input->post('bekerja'),
			'komponen' => $_FILES['komponen']['name'],
			'type_jo' => 'New',
			'approval' => '0',
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $data['nama']	
		);
		
		$this->job_model->inserttransjo($item);
		
		
		
		$putih = array (
			'nojo' => $this->input->post('nojo'),
			'filename'	=> $_FILES['komponen']['name']
			
		);
		
		$this->job_model->insert_file($putih);
		
		
		$rec 	= $joborderx[10];
		$rec	= explode(",",$rec);
		$loop = count($rec)/9;
		if ($loop){
			$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
			for ($i=0; $i<$loop; $i++){
				$iteml = array(
					'nojo' => $this->input->post('nojo'),
					'jabatan' => $rec[$a],
					'gender' => $rec[$b],
					'pendidikan' => $rec[$c],
					'lokasi' => $rec[$d],
					'waktu' => $rec[$e],
					'atasan' => $rec[$f],
					'kontrak' => $rec[$g],
					'jumlah' => $rec[$h],
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
				$this->job_model->inserttransrincian($iteml);
				
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
		
		//$this->do_upload();
		//echo "Sukses";
		

		redirect('home', 'refresh');
		
		
	}
	*/
	
	function urincian_simpan(){
		
		//$file_element_name = 'komponen';
		//str_replace(" ", "-", file);
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$date_now 		= date("YmdHis");
		
		//$file_element_name = 'file';
		
		/*
		$nojo = "";
		$cons = '-ISH-01010107-';
		$year = date('Y');

		$nojob = $this->job_model->get_insertjo();
		if ($nojob == 0){
			$new = '000001';
			$nojo = $new . $cons . $year;			
		} else {
			$nor = $nojob;
			$next = intval($nor) + 1;
			$xnext = $this->hitung($next);
			$nojo = $xnext . $cons . $year;
		}		
		$data['nojo'] = $nojo;
		*/
		
		
		$file_element_name = $this->input->post('komponenz');
		$nojo = $this->input->post('nojokz');
		//$file_element_name = $_GET['file'];		
		$ext = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$file_name = $nojo . "." . $ext;
		
		//var_dump($nojo);
		//exit();
		
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx|rar|zip';
		$config['max_size']    = 1024 * 100;
		$config['file_name'] = $file_name;
		
        $this->load->library('upload', $config);	
		$this->upload->do_upload('file');
		//echo "Data Berhasil Tersimpan ";
		
        //$this->upload->do_upload(str_replace(' ', '-', 'file'));
		/*if (!$this->upload->do_upload($file))
        {
        	//redirect('sakit/sakit', 'refresh');
        	// var_dump($this->upload->display_errors());
        	echo "Data Tidak Berhasil Tersimpan ";
        }
        else
        {
			$this->upload->data();
			echo "Data Berhasil Tersimpan ";
		}
		*/
		//$employee_data = $this->input->post();
		//$data_file = $this->upload->data();
        //$employee_data['picture'] = $data_file['file_name'];
		
	}


	/*
	function rincian_simpan(){
		
		//$file_element_name = 'komponen';
		//str_replace(" ", "-", file);
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx';
		$config['max_size']    = 1024 * 100;
		
			
        $this->load->library('upload', $config);
        $this->upload->do_upload(str_replace(' ', '-', 'file'));
	
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$nojo	= $this->input->post('joborder[0]');
		$daud = $this->input->post('joborder[8]');
		
		$item = array (
			'nojo' => $this->input->post('joborder[0]'),
			'tanggal' => $this->input->post('joborder[1]'),
			'project' => $this->input->post('joborder[2]'),
			'syarat' => $this->input->post('joborder[3]'),
			'deskripsi' => $this->input->post('joborder[4]'),
			'lama' => $this->input->post('joborder[5]'),
			'latihan' => $this->input->post('joborder[6]'),
			'bekerja' => $this->input->post('joborder[7]'),
			'komponen' => $this->input->post('joborder[8]'),
			'type_jo' => $this->input->post('joborder[9]'),			
			'approval' => '0',
			'approval_admin' => '0',
			'jenis_project' => $this->input->post('joborder[10]'),
			//'jenis_skema' => $this->input->post('joborder[11]'),
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $data['nama']	
		);
		
		$this->job_model->inserttransjo($item);
		
		
		
		$putih = array (
			'nojo' => $this->input->post('joborder[0]'),
			'filename'	=> $this->input->post('joborder[8]')
			
		);
		
		$this->job_model->insert_file($putih);
		
		
		$rec 	= $this->input->post('joborder[11]');
		
		$rec	= explode(",",$rec);
		$loop = count($rec)/9;
		if ($loop){
			$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
			for ($i=0; $i<$loop; $i++){
				$iteml = array(
					'nojo' => $this->input->post('joborder[0]'),
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
				$this->job_model->inserttransrincian($iteml);
				
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
		
		//$this->do_upload();
		echo "Sukses";
		

		redirect('home', 'refresh');

		$data['title'] = "Job Order";
		$data['transjo'] = $this->job_model->get_transjo();

		$this->load->view('pages/header',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('pages/footer');
	}*/



	function rincian_simpan(){
		
		//$file_element_name = 'komponen';
		//str_replace(" ", "-", file);
		/*
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx';
		$config['max_size']    = 1024 * 100;
		$config['encrypt_name'] = true;
			
        $this->load->library('upload', $config);
        $this->upload->do_upload(str_replace(' ', '-', 'file'));
		
		$data_file = $this->upload->data();
        $dokumenz = $data_file['file_name'];
		*/
	
		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']		= $session_data['nama'];
		$data['level']			= $session_data['level'];
		//$nojo	= $this->input->post('joborder[0]');
		$daud = $this->input->post('joborder[8]');
		
			$nojo = "";
			$cons = '/ISH/01010107/';
			$year = date('Y');

			$nojob = $this->job_model->get_insertjo();
			if ($nojob == 0){
				$new = '000001';
				$nojo = $new . $cons . $year;			
			} else {
				$nor = $nojob;
				$next = intval($nor) + 1;
				$xnext = $this->hitung($next);
				$nojo = $xnext . $cons . $year;
			}		
			$data['nojo'] = $nojo;
			
			
			
			$nojoz = "";
			$cons = 'ISH01010107';
			$year = date('Y');
	
			$nojob = $this->job_model->get_insertjoz();
			if ($nojob == 0){
				$new = '000001';
				$nojoz = $new . $cons . $year;			
			} else {
				$nor = $nojob;
				$next = intval($nor) + 1;
				$xnext = $this->hitung($next);
				$nojoz = $xnext . $cons . $year;
			}		
			$data['nojoz'] = $nojoz;
			
			
			$file_element_name = $this->input->post('joborder[7]');	
			$ext = pathinfo($file_element_name, PATHINFO_EXTENSION);
			$file_name = $nojoz . "." . $ext;
			
			
			
			/*
			$nojos = $this->input->post('joborder[0]');
			$nojos = $nojo;
			*/
		$item = array (
			'nojo' => $nojo,
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
			'approval' => '0',
			'approval_admin' => '0',
			'jenis_project' => $this->input->post('joborder[9]'),
			//'jenis_skema' => $this->input->post('joborder[11]'),
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $data['nama']	
		);
		
		$this->job_model->inserttransjo($item);
		
		
		
		$putih = array (
			'nojo' => $nojo,
			'filename'	=> $file_name
			
		);
		
		$this->job_model->insert_file($putih);
		
		
		$rec 	= $this->input->post('joborder[10]');
		
		$rec	= explode(",",$rec);
		$loop = count($rec)/9;
		if ($loop){
			$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
			for ($i=0; $i<$loop; $i++){
				$iteml = array(
					'nojo' => $nojo,
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
				$this->job_model->inserttransrincian($iteml);
				
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
		
		//$this->do_upload();
		//echo "Sukses";
		

		redirect('home', 'refresh');

/*		$data['title'] = "Job Order";
		$data['transjo'] = $this->job_model->get_transjo();

		$this->load->view('pages/header',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('pages/footer');
*/	}

	
	/*
	public function do_upload()
	{
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|xls|xlsx|pdf';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
			$putih = array (
				'nojo' => $this->input->post('nojo'),
				'filename' => $data['upload_data']['komponen']
			);
			
			$this->job_model->insert_file($putih);
			redirect ('home','refresh');
		}
	}
	*/
	
	function rincian_save()
	{
		
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		
		
		
		$rincianx 		= $this->input->post('xrincian');
		$nojo	= $rincianx[0];
		$jabatan	= $rincianx[1];
		$gender		= $rincianx[2];
		
		$pendidikan	= $rincianx[3];
		
		$lokasi	= $rincianx[4];
		
		$waktu	= $rincianx[5];
		
		$atasan	= $rincianx[6];
		
		$kontrak	= $rincianx[7];
		
		$jumlah	= $rincianx[8];
		
		
		$iteml = array(
					'nojo' => $nojo,
					'jabatan' => $jabatan,
					'gender' => $gender,
					'pendidikan' => $pendidikan,
					'lokasi' => $lokasi,
					'waktu' => $waktu,
					'atasan' => $atasan,
					'kontrak' => $kontrak,
					'jumlah' => $jumlah,
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
				
		$this->job_model->inserttransrincian($iteml);
		
		
		
		//$this->listrincian();
		//print_r ("rincian berhasil di tambahkan");
		
		
		
	}
	/*
	function rincian_edit()
	{
		
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		

		
		
		$logicx 		= $this->input->post('xlogic');
		$sid	= $logicx[0];
		$snojo	= $logicx[1];
		$sjabatan	= $logicx[2];
		$sgender		= $logicx[3];
		
		$spendidikan	= $logicx[4];
		
		$slokasi	= $logicx[5];
		
		$swaktu	= $logicx[6];
		
		$satasan	= $logicx[7];
		
		$skontrak	= $logicx[8];
		
		$sjumlah	= $logicx[9];
		
		
		$item = array(
					'id' => $sid,
				);
		
		$iteml = array(
					'nojo' => $snojo,
					'jabatan' => $sjabatan,
					'gender' => $sgender,
					'pendidikan' => $spendidikan,
					'lokasi' => $slokasi,
					'waktu' => $swaktu,
					'atasan' => $satasan,
					'kontrak' => $skontrak,
					'jumlah' => $sjumlah,
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
				
		$this->job_model->editrincian($iteml,$iteml);
		
		
		
		//$this->listrincian();
		//print_r ("rincian berhasil di tambahkan");
		
		
		
	}
	*/
	function rincian_cancel()
	{
		
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		
		$iler = $this->input->post('data');
		$this->job_model->deleterincian($iler);
		//print_r ("rincian berhasil di hapus");
			
			
		/*
		$rincianx1		= $this->input->post('xrincian1');
		$id			= $rincianx1[0];
		$nojo		= $rincianx1[1];
		$jabatan	= $rincianx1[2];
		$gender		= $rincianx1[3];
		
		$pendidikan	= $rincianx1[4];
		
		$lokasi	= $rincianx1[5];
		
		$waktu	= $rincianx1[6];
		
		$atasan	= $rincianx1[7];
		
		$kontrak	= $rincianx1[8];
		
		$jumlah	= $rincianx1[9];
		
		$item = array (
					'id' => $id
		);
		
		$iteml = array(
					'nojo' => $nojo,
					'jabatan' => $jabatan,
					'gender' => $gender,
					'pendidikan' => $pendidikan,
					'lokasi' => $lokasi,
					'waktu' => $waktu,
					'atasan' => $atasan,
					'kontrak' => $kontrak,
					'jumlah' => $jumlah,
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
			
		$this->job_model->deleterincian($item);
		*/
		//print_r ("rincian berhasil di tambahkan");
		
		
		
	}
	
	
	public function listrincian()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Rincian";
			
			$data['lrincian'] 		= $this->user->listrincian($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			
			$this->load->view('joborder/listrincian',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function hitung($next){
		$inext = strlen($next);
		switch ($inext){
			case 1: $noj = "00000" . $next; break; 
			case 2: $noj = "0000" . $next; break;
			case 3: $noj = "000" . $next; break;
			case 4: $noj = "00" . $next; break;
			case 5: $noj = "0" . $next; break;
			case 6: $noj = $next; break;
		}
		return $noj;
	}	

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}
	
	public function change_password(){
		if($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['username'] 			= $session_data['username'];
			
			$tes = $session_data['level'];
			if($tes == '4')
			{
				$data['notification'] = $this->job_model->get_notif();
				$data['pesan'] = $this->job_model->get_pesan($tes);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '3')
			{
				$data['notification'] = $this->job_model->get_notif1();
				$data['pesan'] = $this->job_model->get_pesan1();
				$data['eek'] = 'Baru' ;
			}
			else if($tes == '2')
			{
				$daud = $session_data['layanan'];
				
				$data['notification'] = $this->job_model->get_notif2($daud);
				$data['pesan'] = $this->job_model->get_pesan2($daud);
				$data['eek'] = 'Menunggu Approval' ;
			}
			else if($tes == '1')
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['username'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			//$data['username'] 			= $session_data['username'];
			$this->load->view('login/change_password', $data);		
			} else {
			redirect('login', 'refresh');
		}
	}	
	
	function pilih_lokasi(){
		$varray				= $this->job_model->take_lok($this->input->post(data));
			$selectnama 	= "<option value=''>Pilih Lokasi</option>";
			foreach($varray as $key => $list){
				$selectnama .= "<option value='". $list['id'] ."'>". $list['city_name'] ."</option>";
			}
		print_r($selectnama);
	}
	
	function pilih_jabatan(){
		$varray				= $this->job_model->take_jab($this->input->post(data));
			$selectnama 	= "<option value=''>Pilih Jabatan</option>";
			foreach($varray as $key => $list){
				$selectnama .= "<option value='". $list['id'] ."'>". $list['name_job_function'] ."</option>";
			}
		print_r($selectnama);
	}
}
