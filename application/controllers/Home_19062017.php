<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library('form_validation');
		$this->load->model(array('job_model','user','skema_model'));
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
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "Job Order";
			
			$data['transjo'] 		= $this->job_model->get_transjo();
			$data['telkomgroup'] 	= $this->job_model->get_alljo();
			$data['infomedia'] 		= $this->job_model->get_ontime();
			$data['telkom'] 		= $this->job_model->get_alljoapp();
			$data['wew'] 			= $this->job_model->get_topod();
			$data['group'] 			= $this->job_model->get_overdue();
			
			$data['graph'] 			= $this->job_model->graph();
			
			
			$tes = $session_data['level'];
			/*
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
				$username = $session_data['nama'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			else
			{
				$username = $session_data['nama'];
				
				$data['notification'] = $this->job_model->get_notif3($username);
				$data['pesan'] = $this->job_model->get_pesan3($username);
				$data['eek'] = 'Telah di Reject' ;
			}
			*/
			
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
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "List Login";
			
			$data['transjo'] 		= $this->job_model->get_dashboard($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$this->load->view('pages/listdashboard',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	
	public function dashboard_cancel()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['regional'] 		= $session_data['regional'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['title'] 			= "Job Order";
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			
			$data['transjo'] = $this->job_model->get_dashboard_cancel();
			
			/*
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
			*/
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/dashboard_cancel',$data);
			$this->load->view('pages/footer');
			
			
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	public function listjo_cancel()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['regional'] 		= $session_data['regional'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 			= "List Login";
			
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			
			
			$search = $this->input->post('dataarr');
			$data['transjo'] = $this->job_model->get_dashboard_cancel_search($search);
				
				/*
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
				*/
				
			$this->load->view('joborder/listjocancel',$data);
			
			
			//$this->load->view('joborder/listjo',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function dashboard_newjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "Job Order";
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			
			$data['transjo'] = $this->job_model->get_dashboard_newjo();
			
			/*
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
			*/
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/dashboard_newjo',$data);
			$this->load->view('pages/footer');
			
			
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	
	public function listjo_newjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "List Login";
			
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			
			
			$search = $this->input->post('dataarr');
			$data['transjo'] = $this->job_model->get_dashboard_newjo_search($search);
				
				/*
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
				*/
				
				$this->load->view('joborder/listjonewjo',$data);
			
			
			//$this->load->view('joborder/listjo',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function dashboard_ontime()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "Job Order";
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			
			$data['transjo'] = $this->job_model->get_dashboard_ontime();
			
			/*
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
			*/
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/dashboard_ontime',$data);
			$this->load->view('pages/footer');
			
			
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	public function dashboard_over()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['title'] 			= "Job Order";
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];
			
			$data['transjo'] = $this->job_model->get_dashboard_over();
			
			/*
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
			*/
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/dashboard_over',$data);
			$this->load->view('pages/footer');
			
			
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function listappjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['regional'] 		= $session_data['regional'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "List Login";
			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];
			$search = $this->input->post('dataarr');
			
			
			if ($tes1 == '4') 
			{
				$data['transjo'] 		= $this->job_model->get_appjo1($search,$tes1);
				
			}
			else if ($tes1 == '2') 
			{
				if($data['regional']=='1')
				{
					$data['transjo'] 		= $this->job_model->get_appjo_ops($search,$username, $jbt, $daud);
				}
				else
				{
					$data['transjo'] 		= $this->job_model->get_appjo($search,$daud,$jbt);
				}
				
			}
			else if ($tes1 == '1') 
			{
				$data['transjo'] 		= $this->job_model->get_appjo2($search,$username, $jbt, $daud);
			}
			else
			{
				$data['transjo'] 		= $this->job_model->get_appjo3($search);
			}
			
			
			
			$tes = $session_data['level'];
			
			
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
			$data['regional'] 		= $session_data['regional'];		
			$data['title'] 		= "Job Order";
			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];
			if ($tes1 == '4') 
			{
				$data['transjo'] 		= $this->job_model->get_transappjo1();
				$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
				
				//$dbpostgre = $this->load->database('db_second',TRUE);
				//$jabatanrray = $dbpostgre->query("select id, job_name_level from job_level")->row();
			}
			else if ($tes1 == '2') 
			{
				if($data['regional']=='1')
				{
					$data['transjo'] 		= $this->job_model->get_transappjo_ops($username, $jbt, $daud);
					$data['transjos'] 		= $this->job_model->get_transappjo_skema_ops($username);
				}
				else
				{
					$data['transjo'] 		= $this->job_model->get_transappjo($daud, $jbt);
					$data['transjos'] 		= $this->job_model->get_transappjo_skema($daud, $jbt);
				}
			}
			else if ($tes1 == '1') 
			{
				$data['transjo'] 		= $this->job_model->get_transappjo2($username, $jbt, $daud);
				$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			}
			else
			{
				$data['transjo'] 		= $this->job_model->get_transappjo3();
				$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			}
			
			$tes = $session_data['level'];
			
			
			$jabatanrray = $this->job_model->get_level_name();
			$selectlevel = "";
			foreach($jabatanrray as $key => $list){
				$selectlevel .= "<option value='". $list['id'] ."'>". $list['job_name_level'] ."</option>";
			}
			$data['cmblevel']		= $selectlevel;	
			
			$xjprorray = $this->skema_model->get_area_kontrak();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['area'] .">". $list['personnal_subarea'] . "</option>";
				}
			$data['cmbare']		= $select;
			
			$vjprorray = $this->skema_model->get_pa_kontrak();
				$select = "";
				foreach($vjprorray as $key => $list){
					$select .= "<option value=". $list['personalarea'] .">". $list['personnal_area'] . "</option>";
				}
			$data['cmbpera']		= $select;	
			
			$data['form_job_skills'] = $this->job_model->getSkills()->result();
			
			$data['form_job_benefits'] = $this->job_model->getBenefits()->result();
			

			$this->load->view('pages/header',$data);
			$this->load->view('joborder/appjo',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	function search_sk(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= 'Job Order';
		
		$datax 		= $this->input->post('larr');
		$area 		= $datax[0]; 
		$perar	 	= $datax[1]; 
		$daud		= $session_data['layanan'];
		$jbt		= $session_data['jabatan'];
		$tes		= $session_data['level'];
		$username	= $session_data['username'];
		
		if($tes==2)
		{
			if($data['regional']==1)
			{
				$data['transjos']			= $this->job_model->view_sk_ops($area,$perar,$username);
			}
			else
			{
				$data['transjos']			= $this->job_model->view_sk($area,$perar,$daud,$jbt);
			}
		}
		else
		{
			$data['transjos']			= $this->job_model->view_sk_cr($area,$perar,$username);
		}
		
		$this->load->view('joborder/view_sk', $data);
	}
	
	
	function search_sk_sk(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= 'Job Order';
		
		$data 		= $this->input->post('larr');
		$area 		= $data[0]; 
		$perar	 	= $data[1]; 
		$searchx 	= $data[2]; 
		$daud		= $session_data['layanan'];
		$jbt		= $session_data['jabatan'];
		
		$data['transjos']			= $this->job_model->view_sk_sk($area,$perar,$searchx);
		
		$this->load->view('joborder/view_sk_sk', $data);
	}
	

	public function listorder()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";
			
			$tes 		= $session_data['level'];
			$daud 		= $session_data['layanan'];
			$jbt 		= $session_data['jabatan'];
			$username 	= $session_data['username'];
			$typ 		= $session_data['type'];
			
			if($tes != '5')
			{
				if($tes == '2')
				{
					if($data['regional']=='1')
					{
						$data['transjo'] = $this->job_model->get_transall_approval_ops($username);
						$data['transjos'] = $this->job_model->get_transall_sap_sk_app_ops($username);
					}
					else
					{
						$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
						$data['transjos'] = $this->job_model->get_transall_sap_sk_app($daud,$jbt);
					}
				}
				else if($tes == '1')
				{
					$data['transjo'] = $this->job_model->get_transall_craeter($username);
					$data['transjos'] = $this->job_model->get_transall_sap_sk_creater($username);
				}
				else if($tes == '3')
				{
					$data['transjo'] = $this->job_model->get_transall_rekrut($daud);
					$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				}
				else if($tes == '4')
				{
					$data['transjo'] = $this->job_model->get_transall_manar($data['username']);
					$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				}
				else
				{
					$data['transjo'] = $this->job_model->get_transall();
					$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				}
				
				
				
				$tjprorray = $this->skema_model->get_pichi();
				$selectq = "";
				foreach($tjprorray as $key => $list){
					$selectq .= "<option value=". $list['usr_loginname'] .">". $list['usr_lastname'] . "</option>";
				}
				$data['cmbpichi']		= $selectq;
				
				
				$jabatanrray = $this->job_model->get_level_name();
				$selectlevel = "";
				foreach($jabatanrray as $key => $list){
					$selectlevel .= "<option value='". $list['id'] ."'>". $list['job_name_level'] ."</option>";
				}
				$data['cmblevel']		= $selectlevel;	
				
				$xjprorray = $this->skema_model->get_area_kontrak();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['area'] .">". $list['personnal_subarea'] . "</option>";
				}
				$data['cmbare']		= $select;
				
				$vjprorray = $this->skema_model->get_pa_kontrak();
					$select = "";
					foreach($vjprorray as $key => $list){
						$select .= "<option value=". $list['personalarea'] .">". $list['personnal_area'] . "</option>";
					}
				$data['cmbpera']		= $select;
			
				$data['form_job_skills'] = $this->job_model->getSkills()->result();
			
				$data['form_job_benefits'] = $this->job_model->getBenefits()->result();
				
				
				$this->load->view('pages/header',$data);
				$this->load->view('joborder/listorder',$data);
				$this->load->view('pages/footer');
			}
			else
			{
				$data['transjo'] = $this->job_model->get_transall_sap();
				$data['transjos'] = $this->job_model->get_transall_sap_sk();
				
				
				$xjprorray = $this->skema_model->get_area_kontrak();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['area'] .">". $list['personnal_subarea'] . "</option>";
				}
				$data['cmbare']		= $select;
				
				$vjprorray = $this->skema_model->get_pa_kontrak();
					$select = "";
					foreach($vjprorray as $key => $list){
						$select .= "<option value=". $list['personalarea'] .">". $list['personnal_area'] . "</option>";
					}
				$data['cmbpera']		= $select;
				
				
				$this->load->view('pages/header',$data);
				$this->load->view('joborder/listorder_sap',$data);
				$this->load->view('pages/footer');
			}
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function listjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "List JO";
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$typ = $session_data['type'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];
			
			if($tes != '5')
			{
				$search = $this->input->post('dataarr');
				
				if($tes == '2')
				{
					//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
					if($data['regional']=='1')
					{
						$data['transjo'] 		= $this->job_model->get_jo_approval_ops($username,$search);
					}
					else
					{
						$data['transjo'] 		= $this->job_model->get_jo_approval($daud,$jbt,$search);
					}
				}
				else if($tes == '1')
				{
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					$data['transjo'] 		= $this->job_model->get_jo_creater($username, $search);
				}
				else if($tes == '3')
				{
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					$data['transjo'] 		= $this->job_model->get_jo_rekrut($daud, $search);
				}
				else if($tes == '4')
				{
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					$data['transjo'] 		= $this->job_model->get_jo_manar($username, $search);
					//var_dump($search);
					//exit();
				}
				else if($tes == '7')
				{
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					$data['transjo'] 		= $this->job_model->get_jo_manar2($search);
				}
				else
				{
					$data['transjo'] 		= $this->job_model->get_jo($search);
				}
				
				
				
				$this->load->view('joborder/listjo',$data);
			}
			else
			{
				$search = $this->input->post('dataarr');
				$data['transjo'] 		= $this->job_model->get_josap($search);
				
				
				
				$this->load->view('joborder/listjosap',$data);
			}
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	
	public function listjox()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "List JO";
			
			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$typ = $session_data['type'];
			$jbt = $session_data['jabatan']; 
			$username = $session_data['username'];
			
			
			$search = $this->input->post('dataarr');
			$data['transjos'] 		= $this->job_model->xget_josap($search);			
			
			$this->load->view('joborder/xlistjosap',$data);
		
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function search_sk_sk_list(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['username'] 		= $session_data['username'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= 'Job Order';
			
			//var_dump($data['level']);
			//exit();
			
			$datax 		= $this->input->post('larr');
			$area 		= $datax[0]; 
			$perar	 	= $datax[1]; 
			$daud		= $session_data['layanan'];
			$jbt		= $session_data['jabatan'];
			$tes		= $session_data['level'];
			$username	= $session_data['username'];
			
			if($tes=='4')
			{
				$data['transjos']			= $this->job_model->view_sk_sk_list_mr($area,$perar,$username);
			}
			else if($tes=='2')
			{
				if($data['regional']=='1')
				{
					$data['transjos']			= $this->job_model->view_sk_sk_list_ops($area,$perar,$username);
				}
				else
				{
					$data['transjos']			= $this->job_model->view_sk_sk_list($area,$perar,$daud,$jbt);
				}
			}
			else
			{
				$data['transjos']			= $this->job_model->view_sk_sk_list_cr($area,$perar,$username);
			}
			
			$this->load->view('joborder/view_sk_sk_list', $data);
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
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "Job Order";
			
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
			
			
			
			
			$nojosk = "";
			$consk = '/SKEMA-ISH/01010107/';
			$year = date('Y');
			
			$nojobsk = $this->job_model->get_insertjosk();
			if ($nojobsk == 0){
				$newsk = '000001';
				$nojosk = $newsk . $consk . $year;			
			} else {
				$norsk    = $nojobsk;
				$nextsk   = intval($norsk) + 1;
				$xnextsk  = $this->hitung($nextsk);
				$nojosk   = $xnextsk . $consk . $year;
			}		
			$data['nojosk'] = $nojosk;
			
			/*
			$jabatanrray = $this->job_model->get_jabatan();
				$selectjabatan = "";
				foreach($jabatanrray as $key => $list){
					$selectjabatan .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbjabatan']		= $selectjabatan;	
			*/			

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
			
			$jprorray = $this->job_model->get_jpro();
				$select = "";
				foreach($jprorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
				}
			$data['cmbjpro']		= $select;
			
			
			$tprorray = $this->job_model->get_tpro();
				$select = "";
				foreach($tprorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
				}
			$data['cmbtpro']		= $select;
			
			 
			$xjprorray = $this->skema_model->get_area_kontrak();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['area'] .">". $list['personnal_subarea'] . "</option>";
				}
			$data['cmbare']		= $select;
			
			$vjprorray = $this->skema_model->get_pa_kontrak();
				$select = "";
				foreach($vjprorray as $key => $list){
					$select .= "<option value=". $list['personalarea'] .">". $list['personnal_area'] . "</option>";
				}
			$data['cmbpera']		= $select;
			
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
			
			$this->load->view('joborder/rincian', $data);
		}
	}
	
	
	function xtrajo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$data['rincianx']		= $this->job_model->xtrajo($njo);
			
			$tes = $session_data['level'];
			
			$this->load->view('joborder/xrincian', $data);
		}
	}
	
	
	
	function xtrajox(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			//var_dump($njo);
			//exit();
			
			$data['xrincianx']		= $this->job_model->xtrajo($njo);
			
			$tes = $session_data['level'];
			
			$this->load->view('joborder/xrincianx', $data);
		}
	}
	
	
	
	function ztrajo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$data['zrincian']		= $this->job_model->ztrajo($njo);
			
			$tes = $session_data['level'];
			
			
			$this->load->view('joborder/zrincian', $data);
		}
	}
	

	function rejectjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$keter = $njo[1];
			$tjo   = $njo[2];
			$trep  = $njo[3];
			$this->job_model->rejectjo($njok, $keter);
			//$this->appjo();
			
			//$data['transjo'] 		= $this->job_model->get_transappjo();
			//$this->load->view('joborder/listapp',$data);
			
			$check = $this->job_model->get_email_penerima($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['ktr']   = $keter;
		
			$message = $this->load->view('addjo/email_rej.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'soehartobaru@gmail.com','Notifikasi Reject JO - Penyesuaian Skema',$message);
			
			echo $hasilkirim;
			
			redirect('home/appjo', 'refresh');
		}
	}
	
	
	function m_rejectjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$nid   = $njo[1];
			$keter = $njo[2];
			$tjok  = $njo[3];
			$namz  = $njo[4];
			$this->job_model->m_rejectjo($nid, $keter);
			
			$check = $this->job_model->get_email_penerima($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['ktr']   = $keter;
		
			$message = $this->load->view('addjo/email_rej.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'soehartobaru@gmail.com','Notifikasi Reject JO',$message);
			
			echo $hasilkirim;
			
			redirect('home/appjo', 'refresh');
		}
	}
	
	
	function rejectjo1(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
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
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$keter = $njo[1];
			$tjo   = $njo[2];
			$trep  = $njo[3];
			
			//var_dump($njok);var_dump($keter);var_dump($tjo);exit();
			$this->job_model->inssimpantjo($njok, $keter, $tjo, $trep);
			
			if($tjo=='2')
			{
				if($trep=='1')
				{
					$check = $this->job_model->get_email_sap();
					//$test = array();
					foreach ($check as $val) {
						$test = $val['email'];
					
						$checkox = $this->job_model->get_detail_creater($njok);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama; 
						$data['nojoz'] 	  = $njok;
						$data['eeee'] 	  = 1;
						
						$data['skrg'] = date("d-m-Y H:i:s");
						
						$message = $this->load->view('addjo/email_new_sap.php',$data,TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
						
						echo "Data Telah Di Approve";
					}
				}
				else
				{
					$checko = $this->job_model->get_city_manar($njok);
					foreach ($checko as $valu) {
						$testing = $valu['lokasi'];
						$check 	 = $this->job_model->get_email_manar($testing);
						$test 	 = array();
						foreach ($check as $val) {
							$test[] = $val['email'];
						}
						
						$data['type']  = $valu['namad'];
						$data['nojoz'] = $njok;
						$data['nama']  = $valu['nama']; 
						
						$data['skrg'] = date("d-m-Y H:i:s");
						
						$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
					}
					
					echo "Data Telah Di Approve";
				}
			}
			else
			{
				$checko = $this->job_model->get_city_manar($njok);
				foreach ($checko as $valu) {
					$testing = $valu['lokasi'];
					$check 	 = $this->job_model->get_email_manar($testing);
					$test 	 = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}
					
					$data['type']  = $valu['namad'];
					$data['nojoz'] = $njok;
					$data['nama']  = $valu['nama']; 
					
					$data['skrg'] = date("d-m-Y H:i:s");
					
					$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
				}
				
				echo "Data Telah Di Approve";
			}
			
			
				
		}
	}
	
	
	
	function m_simpantjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$nid   = $njo[1];
			$keter = $njo[2];
			$tjok  = $njo[3];
			$namz  = $njo[4];
			$this->job_model->m_inssimpantjo($nid,$keter);
			
			$cek_detil = $this->db->query("SELECT a.nama FROM m_login a left join trans_rincian b ON a.username=b.upd WHERE b.id = '$nid'")->row();
			
			$check = $this->job_model->get_email_sap();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];
			
				$data['nojoz']    = $njok;
				$data['nama']     = $cek_detil->nama;
				$data['type']     = $tjok;
				$data['eeee'] 	  = 1;
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$message = $this->load->view('addjo/email_new_sap.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
				
				echo $hasilkirim;
			}
			
		}
	}
	
	
	
	
	
	function simpanrincian_skip(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$xarrrin   = $this->input->post('arrrinx');
			$njok  = $xarrrin[0];
			$this->job_model->simpanjo_skip($njok);
			
			
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
			$data['regional'] 		= $session_data['regional'];
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
			
			/*
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
			
			*/
			
			
			
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
			$data['regional'] 		= $session_data['regional'];
			$njob = $this->input->post('data');
			$njo = $njob[0];
			$ket = $njob[1];
			$this->job_model->inssimpanskema($njo,$ket);
			
			
			$check = $this->job_model->get_email_penerima($njo);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njo;
			$data['keter'] = $ket;
			$data['abcd'] = 2;
		
			$message = $this->load->view('addjo/email_done.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'soehartobaru@gmail.com','Notifikasi Done Skema JO',$message);
			
		}
	}
	
	function editjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			
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
			$data['regional'] 		= $session_data['regional'];
			
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
	
	
	function simpan_cancel(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			
			$item = array (
				'nojo' => $this->input->post('cnojo'),
			);
			
			$item1 = array (
				'flag_cancel' 		=> '1',
				'upd_cancel_rekrut' => $data['username'],
				'ket_cancel' 		=> $this->input->post('scancel')
			);
					
			$infomedia=$this->job_model->simpan_cancel($item,$item1);
			
			echo json_encode($infomedia);
			
			exit;
			redirect('home/listorder', 'refresh');
			
		}
	}
	
	function simpan_cancel_sap(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			
			$item = array (
				'nojo' => $this->input->post('cnojo'),
			);
			
			$item1 = array (
				'upd_cancel_rekrut' => $data['username'],
				'flag_cancel_sap'	=> '1',
				'ket_cancel' 		=> $this->input->post('scancel')
			);
					
			//$infomedia=$this->job_model->simpan_cancel_sap($item,$item1);
			$this->job_model->simpan_cancel_sap($item,$item1);
			
			//echo json_encode($infomedia);
			
			//exit;
			
			$njok = $this->input->post('cnojo');
			$keter = $this->input->post('scancel');
			$check = $this->job_model->get_email_penerima($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['ktr']   = $keter;
		
			$message = $this->load->view('addjo/email_rej.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'soehartobaru@gmail.com','Notifikasi Reject JO - Penyesuaian Skema',$message);
			
			echo json_encode($hasilkirim);
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
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['regional'] 		= $session_data['regional'];
		$date_now 		= date("YmdHis");
		
		/*
		$file_element_name = $this->input->post('komponenz');
		$nojo = $this->input->post('nojokz');
		//$file_element_name = $_GET['file'];		
		$ext = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$file_name = $nojo . "." . $ext;
		
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx|rar|zip|pptx';
		//$config['max_size']    = 1024 * 100;
		$config['file_name'] = $file_name;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')){
			
			$status = 1;
			
		}
		else{
			
			$status = 2;
		}
		
		echo json_encode($status);
		*/	
		
		//$noj = $_FILES['userfiles']['name'][0];
		//var_dump($noj);
		//exit();
		
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
		
		$nojo  = $_POST['nojok'];
		$hjk = array("skema","bak","other");
		for($i=0; $i<count($_FILES['userfiles']['name']); $i++){
			$target_path = "./uploads/";
			$ext = explode('.', basename( $_FILES['userfiles']['name'][$i]));
			//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 
			$target_path = $target_path . $hjk[$i] ."_". $nojoz . "." . $ext[count($ext)-1]; 

			if(move_uploaded_file($_FILES['userfiles']['tmp_name'][$i], $target_path)) {
				//echo "The file has been uploaded successfully <br />";
			} else{
				//echo "There was an error uploading the file, please try again! <br />";
			}
		}
		
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
		
		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']		    = $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];
		
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
		//$data['nojo'] = $nojo;
		$nojof = $nojo;
		
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
		
		/*
		$file_element_name = $this->input->post('joborder[7]');	
		$ext = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$file_name = $nojoz . "." . $ext;
		*/
		
		$file_element_name  = $this->input->post('joborder[7]');	
		$file_element_name2 = $this->input->post('joborder[8]');	
		$file_element_name3 = $this->input->post('joborder[9]');	
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$ext2 = pathinfo($file_element_name2, PATHINFO_EXTENSION);
		$ext3 = pathinfo($file_element_name3, PATHINFO_EXTENSION);
		if($ext=='')
		{
			$file_name  = "";
		}
		else
		{
			$file_name = "skema_" . $nojoz . "." . $ext;
		}
		
		
		if($ext2=='')
		{
			$file_name2  = "";
		}
		else
		{
			$file_name2 = "bak_" . $nojoz . "." . $ext2;
		}
		
		
		if($ext3=='')
		{
			$file_name3  = "";
		}
		else
		{
			$file_name3 = "other_" . $nojoz . "." . $ext3;
		}
		
		$this->job_model->campuran($nojof, $file_name, $file_name2, $file_name3, $data['username']);	
		
		$typere = $this->input->post('joborder[14]');
		$rrr 	= $this->input->post('joborder[10]');
		if($rrr=='2')
		{
				if($typere=='1')
				{
					if($data['level']=='1')
					{
						$check = $this->job_model->get_email();
						$test = array();
						foreach ($check as $val) {
							$test[] = $val['email'];
						}
						
						$data['type'] = $this->input->post('joborder[13]');
						
						$data['skrg'] = date("d-m-Y H:i:s");
						
						$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
						
						//echo $hasilkirim;
					}
					else
					{
						$check = $this->job_model->get_email_sap();
						//$test = array();
						foreach ($check as $val) {
							$test = $val['email'];
						
							$data['type']     = $this->input->post('joborder[13]');
							$data['eeee'] 	  = 1;
							
							$data['skrg'] = date("d-m-Y H:i:s");
							
							$message = $this->load->view('addjo/email_new_sap.php',$data,TRUE); // this will return you html data as message

							$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
						}
						//echo $hasilkirim;
					}
				}
				else
				{
					if($data['level']=='1')
					{
						$check = $this->job_model->get_email();
						$test = array();
						foreach ($check as $val) {
							$test[] = $val['email'];
						}
						
						$data['type'] = $this->input->post('joborder[13]');
						
						$data['skrg'] = date("d-m-Y H:i:s");
						
						$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
						
						//echo $hasilkirim;
					}
					else
					{
						$rec 	= $this->input->post('joborder[12]');
						$rec	= explode(",",$rec);
						$loop = count($rec)/9;
						if ($loop){
							$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
							for ($i=0; $i<$loop; $i++){
								$city = $rec[$d];
								$check = $this->job_model->get_email_manar($city);
								$test = array();
								foreach ($check as $val) {
									$test[] = $val['email'];
								}
								
								$data['type'] = $this->input->post('joborder[13]');
								
								$data['skrg'] = date("d-m-Y H:i:s");
								
								$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

								$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
								
								$d = $d + 8;
							}
						}
					}
				}
		}
		else
		{
				if($data['level']=='1')
				{
					$check = $this->job_model->get_email();
					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}
					
					$data['type'] = $this->input->post('joborder[13]');
					$data['per_text'] = $this->input->post('joborder[15]');
					
					$data['skrg'] = date("d-m-Y H:i:s");
					
					$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
					
					//echo $hasilkirim;
				}
				else
				{
					$rec 	= $this->input->post('joborder[12]');
					$rec	= explode(",",$rec);
					$loop = count($rec)/9;
					if ($loop){
						$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
						for ($i=0; $i<$loop; $i++){
							$city = $rec[$d];
							$check = $this->job_model->get_email_manar($city);
							$test = array();
							foreach ($check as $val) {
								$test[] = $val['email'];
							}
							
							$data['type'] = $this->input->post('joborder[13]');
							
							$data['skrg'] = date("d-m-Y H:i:s");
							
							$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

							$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
							
							$d = $d + 8;
						}
					}
				}
		}
		
	}

	
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
		$data['regional'] 		= $session_data['regional'];
		
		
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
		$data['regional'] 		= $session_data['regional'];
		
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
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "List Rincian";
			
			$data['lrincian'] 		= $this->user->listrincian($this->input->post('dataarr'));
			
			$tes = $session_data['level'];
			/*
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
			*/
			
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
			$data['regional'] 		= $session_data['regional'];
			
			$tes = $session_data['level'];
			/*
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
			*/
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
				$selectnama .= "<option value='". $list['city_id'] ."'>". $list['city_name'] ."</option>";
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
	
	function pilih_rincian(){
		$varray				= $this->job_model->take_rin($this->input->post(data));
			//$selectnama 	= "<option value=''>Pilih</option>";
			$selectnama 	= "<option value=''> Pilih Rincian Jabatan</option>";
			foreach($varray as $key => $list){
				$selectnama .= "<option value='". $list['id'] ."'>". $list['name_job_function'] ."</option>";
			}
		print_r($selectnama);
	}
	
	function simpanrincian(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$www   			= $this->input->post('arrrin');
			$njok  			= $www[0];
			//$rincian		= $www[1];
			//$this->job_model->inssimpantjo1($njok,$keter);
			//var_dump($rincian);
		   // exit();
			$this->job_model->inssimpantjo1($njok);
			
			
			
			
			$rec 	= $www[1];
			//var_dump($rec);
			//exit();
			$rec	= explode(",",$rec);
			$xxxx = count($rec);
			$loop = count($rec)/9;
			
			
			//var_dump($loop);
			//exit();
			
			if ($loop){
				$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; //$k = 8;
				for ($i=0; $i<2; $i++){
					//$getdata = $this->job_model->get_data($rec[$a]);
					//foreach ($getdata as $value) {
					//	$za = $value['deskripsi'];
					//}	
					
					//var_dump($rec[$a]);
					//var_dump($a);
					$eee = $rec[$a];
					$this->load->database('default',TRUE);
					$ppp = $this->db->query("SELECT * FROM trans_jo a LEFT JOIN trans_rincian b ON a.nojo=b.nojo LEFT JOIN job_function c ON b.jabatan=c.id WHERE b.id='".$rec[$a]."' ")->result();
					foreach ($ppp as $s) {
						//$gg = $s->nojo;
						$ds = $s->deskripsi;
						$su = '["'.$s->jabatan.'"]';
						
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
						
					}
					//$dbpostgre = $this->load->database('default',FALSE);
					//exit;
					
					//$qqq = $ds;
					$job_data['company_id'] = '97';
					
					$skills = explode("|", $rec[$e]);
				
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
					$benefits = explode("|", $rec[$f]);
					
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
					
					
					$item = array (
							'company_id' 					=> $job_data['company_id'],
							'job_title' 					=> $ja,
							'job_description' 				=> $ds,
							'job_gender' 					=> $ish,
							'job_education' 				=> $ishi,
							'job_job_level' 				=> $rec[$d],
							'job_experience' 				=> '1',
							'job_is_freshgraduate' 			=> '1',
							'job_skills' 					=> json_encode($temp_skill),
							'job_employment_type' 			=> $ishis,
							'job_salary_type' 				=> 'Monthly',
							'job_salary_min' 				=> $rec[$b],
							'job_salary_max' 				=> $rec[$c],
							'job_salary_negotiable' 		=> '1',
							'job_salary_is_show' 			=> '1',
							'job_city' 						=> $dz,
							'job_benefit' 					=> json_encode($temp_benefit),
							'job_job_function' 				=> $su,
							'job_publish_start' 			=> $rec[$g],
							'job_publish_end' 				=> $rec[$h],
							'job_is_publish' 				=> '0',
							'job_status' 					=> '0',
							'job_created_at' 				=> date("Y-m-d H:i:s"),
							'job_token' 					=> md5(time() . $ja . $job_data['company_id'] . mt_rand(0, 1000)),
							'job_is_draft' 					=> '0',
							'job_view_count'				=> '0',
							'job_member_click' 				=> '0',
							'job_non_member_click' 			=> '0',
							'job_total_click' 				=> '0',
							'job_remarks' 					=> '',
							'job_other_email'				=> ''
							);
							
							
							//var_dump($item);
							//exit();
							
							$dbpostgre = $this->load->database('db_second',TRUE);
							$this->job_model->simpan_mediax($item);
							
							$dbpostgre = $this->load->database('db_second',FALSE);
							
							
					
							$a = $a + 8;
							$b = $b + 8;
							$c = $c + 8;
							$d = $d + 8;
							$e = $e + 8;
							$f = $f + 8;
							$g = $g + 8;
							$h = $h + 8;
							
							//var_dump($rec[$a]);
							//exit();
				}//FOR
				
				//exit();
			}//IF
			
			
			//exit();
			
		}
	}
	
	
	
	
	
	function urincian_simpanx(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
		$session_data 	= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['jabatan'] 		= $session_data['jabatan'];
		$data['regional'] 		= $session_data['regional'];
		$date_now 		= date("YmdHi");
		
		/*
		$file_element_name = $this->input->post('komponen1');
		$nojo = 'nana';
		//$file_element_name = $_GET['file'];		
		$ext = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$file_name = $nojo . "." . $ext;
		
		//var_dump($nojo);
		//exit();
		
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx|rar|zip|pptx';
		//$config['max_size']    = 1024 * 100;
		$config['file_name'] = $file_name;
		
		$this->load->library('upload', $config);

		if ( ( ! $this->upload->do_upload('file_1')) || ( ! $this->upload->do_upload('file_2')) || ( ! $this->upload->do_upload('file_3')) ){
			
			$status = 1;
			
		}
		else if ( ( $this->upload->do_upload('file_1')) || ( $this->upload->do_upload('file_2')) || ( $this->upload->do_upload('file_3')) ){
			
			$status = 2;
		}
		
		echo json_encode($status);
		*/
		
		/*
		$noj = $_FILES['userfiles']['name'][0];
		var_dump($noj);
		exit();
		*/
		$nojoskl = "";
		$conskl = '/SKEMA-ISH/01010107/';
		$year = date('Y');
		
		$nojobskl = $this->job_model->get_insertjosk();
		if ($nojobskl == 0){
			$newskl = '000001';
			$nojoskl = $newskl . $conskl . $year;			
		} else {
			$norskl    = $nojobskl;
			$nextskl   = intval($norskl) + 1;
			$xnextskl  = $this->hitung($nextskl);
			$nojoskl   = $xnextskl . $conskl . $year;
		}		
		$data['nojoskl'] = $nojoskl;
		
		$nojosk = "";
		$consk = 'SKEMAISH01010107';
		$year = date('Y');
		
		$nojobsk = $this->job_model->get_insertjosk();
		if ($nojobsk == 0){
			$newsk = '000001';
			$nojosk = $newsk . $consk . $year;			
		} else {
			$norsk    = $nojobsk;
			$nextsk   = intval($norsk) + 1;
			$xnextsk  = $this->hitung($nextsk);
			$nojosk   = $xnextsk . $consk . $year;
		}		
		$data['nojosk'] = $nojosk;
		
		
		
		
		//$nojox = $_POST['nojosk'];
		$file_element_name  = $_FILES['komp']['name'][0];	
		$file_element_name2 = $_FILES['komp']['name'][1];	
		$file_element_name3 = $_FILES['komp']['name'][2];

		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$ext2 = pathinfo($file_element_name2, PATHINFO_EXTENSION);
		$ext3 = pathinfo($file_element_name3, PATHINFO_EXTENSION);	
		
		if($ext=='')
		{
			$file_name  = "";
		}
		else
		{
			$file_name  = "skema_" . $nojosk ."_". $date_now . "." . $ext;
		}
		
		
		if($ext2=='')
		{
			$file_name2  = "";
		}
		else
		{
			$file_name2 = "bak_" . $nojosk ."_". $date_now . "." . $ext2;
		}
		
		
		if($ext3=='')
		{
			$file_name3  = "";
		}
		else
		{
			$file_name3 = "other_" . $nojosk ."_". $date_now . "." . $ext3;
		}
		
		
		
		
		
		//$bvc = $_POST['choosen'];
		$hjk   = array("skema","bak","other");
		//$abc = $_FILES['komp']['name'][0];
		//var_dump($cho);exit();
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			$target_path = "./uploads/";
			$ext = explode('.', basename( $_FILES['komp']['name'][$i]));
			//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 
			$target_path = $target_path . $hjk[$i] ."_". $nojosk ."_". $date_now . "." . $ext[count($ext)-1]; 

			if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
				//echo "The file has been uploaded successfully <br />";
			} else{
				//echo "There was an error uploading the file, please try again! <br />";
			}
		}
		
		
		foreach($_POST['choosen'] as $key => $list){
			$cho   = $list;
			$chos  = explode("#",$cho);
			$perar = $chos[0];
			$arear = $chos[1];
			
			
			$level=$session_data['level'];
			if($level!='1')
			{
				$lll = 1;
			}
			else
			{
				$lll = 0;
			}
			
			
			$cek_detil_ar = $this->skema_model->nama_arper($perar, $arear);
			
			//var_dump($cek_detil_ar->BTRTX);var_dump($cek_detil_ar->WKTXT);exit();
			
			$item = array (
			'nojo'				=> $nojoskl,
			'area' 				=> $arear,
			'n_area' 			=> $cek_detil_ar->BTRTX,
			'perar' 			=> $perar,
			'n_perar' 			=> $cek_detil_ar->WKTXT,
			'dokumen_skema' 	=> $file_name,
			'dokumen_bak' 		=> $file_name2,
			'dokumen_other' 	=> $file_name3,
			'upd' 				=> $data['username'],
			'lup' 				=> date("Y-m-d H:i:s"),
			'flag_approval' 	=> $lll				
			);
			
			//var_dump($item);exit();
			
			$this->job_model->s_rincian_simpanx($item);
			
			
			
			if($level=='1')
			{
				$check = $this->job_model->get_email();
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}
				
				//$wawak = $this->skema_model->nama_area($sar);
				//$wawaw = $this->skema_model->nama_pas($spa);
				
				$dfd = $cek_detil_ar->BTRTX;
				$cfd = $cek_detil_ar->WKTXT;
				
				$data['sar']  = $dfd;
				$data['spa']  = $cfd;
				
				//var_dump($data['sar']);
				//exit();
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$message = $this->load->view('addjo/email.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
				
				//echo $hasilkirim;
			}
			else
			{
				//echo "Data Tersimpan";
				$check = $this->job_model->get_email_manar($arear);
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}
				
				//$wawak = $this->skema_model->nama_area($sar);
				//$wawaw = $this->skema_model->nama_pas($spa);
				
				$dfd = $cek_detil_ar->BTRTX;
				$cfd = $cek_detil_ar->WKTXT;
				
				$data['sar']  = $dfd;
				$data['spa']  = $cfd;
				
				//var_dump($data['sar']);
				//exit();
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$message = $this->load->view('addjo/email.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
				
				//echo $hasilkirim;
				
			}
		}
		
		
	}
	
	
	
	
	function s_edit_simpan_all(){
		
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['username'] = $session_data['username'];
		$nama	 		= $session_data['nama'];
		$data['regional'] 		= $session_data['regional'];
		$data['nama'] 	= $session_data['nama'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		
		$item1 = array (
			'nojo' => $this->input->post('joborder[10]')
		);
		
		$tyu = $this->input->post('joborder[7]');
		if($tyu == 2)
		{
			$qwep = $this->input->post('joborder[12]');
		}
		else
		{
			$qwep = $this->input->post('joborder[1]');
		}
		
		$asdf = $this->input->post('joborder[11]');
		if($asdf == 'atasan')
		{
			$item = array (
				'tanggal' 	=> $this->input->post('joborder[0]'),
				'project' 	=> $qwep,
				'n_project' => $this->input->post('joborder[13]'),
				'syarat' 	=> $this->input->post('joborder[2]'),
				'deskripsi' => $this->input->post('joborder[3]'),
				'lama' 		=> $this->input->post('joborder[4]'),
				'latihan' 	=> $this->input->post('joborder[5]'),
				'bekerja' 	=> $this->input->post('joborder[6]'),		
				'approval' 	=> '0',	
				'lup' 		=> date("Y-m-d H:i:s"),
				'flag_edit' => '1',
				'upd_edit' => $data['username'],
				'type_replace' => $this->input->post('joborder[9]')
			);		
		}
		else
		{
			$item = array (
				'tanggal' 	=> $this->input->post('joborder[0]'),
				'project' 	=> $qwep,
				'n_project' => $this->input->post('joborder[13]'),
				'syarat' 	=> $this->input->post('joborder[2]'),
				'deskripsi' => $this->input->post('joborder[3]'),
				'lama' 		=> $this->input->post('joborder[4]'),
				'latihan' 	=> $this->input->post('joborder[5]'),
				'bekerja' 	=> $this->input->post('joborder[6]'),		
				'flag_cancel_sap' 	=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $session_data['username'],
				'type_replace' => $this->input->post('joborder[9]')
			);		
		}
		
		
		
		$this->job_model->edit_all($item, $item1);
		
		//var_dump($item1);var_dump($item);
		//exit();
		
		
		$rec 	= $this->input->post('joborder[8]');
		if($rec!='')
		{
			$rec	= explode(",",$rec);
			$loop = count($rec)/9;
			if ($loop){
				$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
				for ($i=0; $i<$loop; $i++){
					$iteml = array(
						'nojo' => $this->input->post('joborder[10]'),
						'jabatan' => $rec[$a],
						'gender' => $rec[$b],
						'pendidikan' => $rec[$c],
						'lokasi' => $rec[$d],
						'waktu' => $rec[$e],
						'atasan' => $rec[$f],
						'kontrak' => $rec[$g],
						'jumlah' => $rec[$h],
						'skema' => '0',
						'upd' => $data['username'],
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
		}
		
		
		$asdf = $this->input->post('joborder[11]');
		if($asdf == 'atasan')
		{
			$check = $this->job_model->get_email();
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['nojoz'] = $this->input->post('joborder[10]');
			$data['nama']   = $session_data['nama'];
			$data['skrg'] = date("d-m-Y H:i:s");
			
			$data['abcd'] = 2;
			
			$message = $this->load->view('addjo/email_sap.php',$data,TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Edit JO',$message);
			
			echo $hasilkirim;
		}
		else
		{
			$check = $this->job_model->get_email_sap();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];
			
				$data['nojoz']  = $this->input->post('joborder[10]');
				$data['nama']   = $session_data['nama'];
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$data['abcd'] = 2;
				
				$message = $this->load->view('addjo/email_sap.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Edit JO',$message);
				
				echo $hasilkirim;
			}
		}
		
	}
	
	
	
	
	
	function edit_urincian_simpanx(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$nama	 		= $session_data['nama'];
		$data['regional'] 		= $session_data['regional'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$nid      = $_POST['nojosk'];
		$persa    = $_POST['spa'];
		$asdf     = $_POST['approv'];
		$lkj = str_replace("/","",$nid);
		$hgf = str_replace("-","",$lkj);
		
		/*
		$pop = count($_FILES['komp']['name']);
		$popi = $_FILES['komp']['name'][0];
		$popk = $_POST['kompol'][0];
		$pops = $_POST['kompol'][1];
		var_dump($pop);var_dump($popi);var_dump($popk);var_dump($pops);
		exit();
		*/
		
		$hjk = array("skema","bak","other");
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			$target_path = "./uploads/";
			$ext = explode('.', basename( $_FILES['komp']['name'][$i]));
			if($_POST['kompol'][$i]=='skema')
			{
				$target_path = $target_path . "skema_". $hgf ."_". $date_now .".". $ext[count($ext)-1];
			}
			else if($_POST['kompol'][$i]=='bak')
			{
				$target_path = $target_path . "bak_". $hgf ."_". $date_now .".". $ext[count($ext)-1];
			}
			else
			{
				$target_path = $target_path . "other_". $hgf ."_". $date_now .".". $ext[count($ext)-1];
			}
			

			if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
				
			} else{
				
			}
		}
		
		
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			$target_path = "./uploads/";
			$ext  = pathinfo($_FILES['komp']['name'][$i], PATHINFO_EXTENSION);
			
			if($_POST['kompol'][$i]=='skema')
			{
				$file_name = "skema_" . $hgf ."_". $date_now . "." . $ext;
				
				if($asdf == 'atasan')
				{
					$item1 = array(
						'dokumen_skema' 	=> $file_name,
						'flag_approval' 	=> 0,
						'flag_edit' 		=> 1
					);
				}
				else
				{
					$item1 = array(
						'dokumen_skema' 	=> $file_name,
						'flag_cancel_sap' 	=> 0,
						'flag_edit' 		=> 1
					);
				}
				
				$item = array( 
					'nojo' => $nid
				);
				
				$this->job_model->edit_skema_sk($item, $item1);
			}
			else if($_POST['kompol'][$i]=='bak')
			{
				$file_name2 = "bak_" . $hgf ."_". $date_now . "." . $ext;
				
				if($asdf == 'atasan')
				{
					$item1 = array(
						'dokumen_bak' 		=> $file_name2,
						'flag_approval' 	=> 0,
						'flag_edit' 		=> 1
					);
				}
				else
				{
					$item1 = array(
						'dokumen_bak' 		=> $file_name2,
						'flag_cancel_sap' 	=> 0,
						'flag_edit' 		=> 1
					);
				}
				
				$item = array( 
				
					'nojo' => $nid
				);
				
				$this->job_model->edit_skema_sk($item, $item1);
			}
			else 
			{
				$file_name3 = "other_" . $hgf ."_". $date_now . "." . $ext;
				
				if($asdf == 'atasan')
				{
					$item1 = array(
						'dokumen_other' 	=> $file_name3,
						'flag_approval' 	=> 0,
						'flag_edit' 		=> 1
					);
				}
				else
				{
					$item1 = array(
						'dokumen_other' 	=> $file_name3,
						'flag_cancel_sap' 	=> 0,
						'flag_edit' 		=> 1
					);
				}
				
				
				$item = array( 
					'nojo' => $nid
				);
				
				$this->job_model->edit_skema_sk($item, $item1);
			}
			
		}
		
		$yth = $this->db->query("SELECT * FROM trans_skema WHERE nojo = '$nid' GROUP BY nojo ")->row();
		$dsk = $yth->dokumen_skema;
		$dbk = $yth->dokumen_bak;
		$dot = $yth->dokumen_other;
		
		if($_POST['choosen']!='')
		{
				foreach($_POST['choosen'] as $key => $list){
					$data['username'] = $session_data['username'];
					$cho   = $list;
					$chos  = explode("#",$cho);
					$perar = $chos[0];
					$arear = $chos[1];
					
					
					$level=$session_data['level'];
					
					
					if($level!='1')
					{
						$lll = 1;
					}
					else
					{
						$lll = 0;
					}
					
					
					$cek_detil_ar = $this->skema_model->nama_arper($perar, $arear);
					
					$ext00   = pathinfo($_FILES['komp']['name'][0], PATHINFO_EXTENSION);
					$ext11  = pathinfo($_FILES['komp']['name'][1], PATHINFO_EXTENSION);
					$ext22  = pathinfo($_FILES['komp']['name'][2], PATHINFO_EXTENSION);
					if(($ext00!='')&&($_POST['kompol'][0]=='skema'))
					{
						$file_name00 = "skema_" . $hgf ."_". $date_now . "." . $ext;
					}
					else if(($ext11!='')&&($_POST['kompol'][1]=='bak'))
					{
						$file_name11 = "bak_" . $hgf ."_". $date_now . "." . $ext;
					}
					else if(($ext22!='')&&($_POST['kompol'][2]=='other'))
					{
						$file_name22 = "other_" . $hgf ."_". $date_now . "." . $ext;
					}
					
					//var_dump($cek_detil_ar->BTRTX);var_dump($cek_detil_ar->WKTXT);exit();
					if($asdf == 'atasan')
					{
						$item = array (
						'nojo'				=> $nid,
						'area' 				=> $arear,
						'n_area' 			=> $cek_detil_ar->BTRTX,
						'perar' 			=> $perar,
						'n_perar' 			=> $cek_detil_ar->WKTXT,
						'dokumen_skema' 	=> $dsk,
						'dokumen_bak' 		=> $dbk,
						'dokumen_other' 	=> $dot,
						'upd' 				=> $data['username'],
						'lup' 				=> date("Y-m-d H:i:s"),
						'flag_approval' 	=> $lll
						);
					}
					else
					{
						$item = array (
						'nojo'				=> $nid,
						'area' 				=> $arear,
						'n_area' 			=> $cek_detil_ar->BTRTX,
						'perar' 			=> $perar,
						'n_perar' 			=> $cek_detil_ar->WKTXT,
						'dokumen_skema' 	=> $dsk,
						'dokumen_bak' 		=> $dbk,
						'dokumen_other' 	=> $dot,
						'upd' 				=> $data['username'],
						'lup' 				=> date("Y-m-d H:i:s"),
						'flag_approval' 	=> '1',
						'flag_cancel_sap' 	=> '0'	
						);
					}
					
					
					$this->job_model->s_rincian_simpanx($item);
					
				}
		}
		
		
		
		if($asdf == 'atasan')
		{
			$check = $this->job_model->get_email();
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['nojoz'] = $nid;
			$data['nama']   = $session_data['nama'];
			$data['skrg'] = date("d-m-Y H:i:s");
			
			$data['abcd'] = 2;
			
			$message = $this->load->view('addjo/email_sap.php',$data,TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Edit JO',$message);
			
			echo $hasilkirim;
		}
		else
		{
			$check = $this->job_model->get_email_sap();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];
			
				$data['nojoz']  = $nid;
				$data['nama']   = $session_data['nama'];
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$data['abcd'] = 2;
				
				$message = $this->load->view('addjo/email_sap.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Edit JO',$message);
				
				echo $hasilkirim;
			}
		}
	
	}
	
	
	
	function rincian_simpanx(){
		
		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['jabatan'] 		= $session_data['jabatan'];
		//$nojo	= $this->input->post('joborder[0]');
		$date_now 		= date("YmdHi");
		
		$file_element_name  = $this->input->post('joborder[0]');	
		$file_element_name2 = $this->input->post('joborder[1]');	
		$file_element_name3 = $this->input->post('joborder[2]');	
		$noj   		= $this->input->post('joborder[3]');
		$larray   	= $this->input->post('joborder[4]');
		
		//var_dump($larray);
		//exit();
		
		$nojosk = "";
		$consk = '/SKEMA-ISH/01010107/';
		$year = date('Y');
		
		$nojobsk = $this->job_model->get_insertjosk();
		if ($nojobsk == 0){
			$newsk = '000001';
			$nojosk = $newsk . $consk . $year;			
		} else {
			$norsk    = $nojobsk;
			$nextsk   = intval($norsk) + 1;
			$xnextsk  = $this->hitung($nextsk);
			$nojosk   = $xnextsk . $consk . $year;
		}		
		$data['nojosk'] = $nojosk;
		
		//$spa  = $this->input->post('joborder[0]');
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$ext2 = pathinfo($file_element_name2, PATHINFO_EXTENSION);
		$ext3 = pathinfo($file_element_name3, PATHINFO_EXTENSION);
		if($ext=='')
		{
			$file_name  = "";
		}
		else
		{
			$file_name  = "skema_" . $nojosk . $date_now . "." . $ext;
		}
		
		
		if($ext2=='')
		{
			$file_name2  = "";
		}
		else
		{
			$file_name2 = "bak_" . $nojosk . "_" . $date_now . "." . $ext2;
		}
		
		
		if($ext3=='')
		{
			$file_name3  = "";
		}
		else
		{
			$file_name3 = "other_" . $nojosk . "_" . $date_now . "." . $ext3;
		}
		
		$level=$session_data['level'];
		if($level!='1')
		{
			$lll = 1;
		}
		else
		{
			$lll = 0;
		}
		
		if($sar=='ALL')
		{
			$jkl = 'ALL AREA';
		}
		else
		{
			$jkl = $this->input->post('joborder[4]');
		}
		
		
		$item = array (
			'nojo'				=> $nojosk,
			'area' 				=> $sar,
			'n_area' 			=> $jkl,
			'perar' 			=> $spa,
			'n_perar' 			=> $this->input->post('joborder[5]'),
			'dokumen_skema' 	=> $file_name,
			'dokumen_bak' 		=> $file_name2,
			'dokumen_other' 	=> $file_name3,
			'upd' 				=> $data['username'],
			'lup' 				=> date("Y-m-d H:i:s"),
			'flag_approval' 	=> $lll				
		);
		
		
		//var_dump($item);
		//exit();
		
		$this->job_model->s_rincian_simpanx($item);
		
		
		
		if($level=='1')
		{
			$check = $this->job_model->get_email();
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$wawak = $this->skema_model->nama_area($sar);
			$wawaw = $this->skema_model->nama_pas($spa);
			
			$dfd = $wawak->nama_ar;
			$cfd = $wawaw->nama_pa;
			
			$data['sar']  = $dfd;
			$data['spa']  = $cfd;
			
			//var_dump($data['sar']);
			//exit();
			
			$data['skrg'] = date("d-m-Y H:i:s");
			
			$message = $this->load->view('addjo/email.php',$data,TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
			
			echo $hasilkirim;
		}
		else
		{
			//echo "Data Tersimpan";
			if($sar=='ALL')
			{
				$checko = $this->skema_model->cek_area_all($spa);
				$this->load->database('default',TRUE);
				foreach ($checko as $valu) {
					$testing = $valu['btrtl'];
					$check 	 = $this->job_model->get_email_manar($testing);
					$test 	 = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}
					
					$data['sar']  = 'Semua Area';
					$data['spa']  = $this->input->post('joborder[6]');
					
					$data['skrg'] = date("d-m-Y H:i:s");
					
					$message = $this->load->view('addjo/email.php',$data,TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
				}
				
				echo "Data Tersimpan";
			}
			else
			{
				$check = $this->job_model->get_email_manar($sar);
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}
				
				$wawak = $this->skema_model->nama_area($sar);
				$wawaw = $this->skema_model->nama_pas($spa);
				
				$dfd = $wawak->nama_ar;
				$cfd = $wawaw->nama_pa;
				
				$data['sar']  = $dfd;
				$data['spa']  = $cfd;
				
				//var_dump($data['sar']);
				//exit();
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$message = $this->load->view('addjo/email.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
				
				echo $hasilkirim;
			}
			
		}
		
	}
	
	
	
	
	public function emailsent($vartoemail,$varccemail,$varsubject,$msgemail){

 			$config = Array(
 				 'protocol' => 'smtp',
  				 'smtp_host' => 'ssl://mail.ish.co.id',
  				 'smtp_port' => 465,
  				 'smtp_user' => 'no-reply@ish.co.id', // change it to yours
  				 'smtp_pass' => 'NoReplyISH2016', // change it to yours
  				 'mailtype' => 'html',
  				 'charset' => 'iso-8859-1',
  				 'wordwrap' => TRUE
									);
 				$notif ="";

		        $this->load->library('email', $config);
		        $this->email->initialize($config);
		        $this->email->clear(TRUE);
		      	$this->email->set_newline("\r\n");
		      	$this->email->from('no-reply@ish.co.id'); // change it to yours
		      	$this->email->to($vartoemail);// change it to yours
		     	//$this->email->cc($varccemail);
		      	$this->email->subject($varsubject);
		      	$this->email->message($msgemail);

	      	   if($this->email->send())
			     {
			     $notif = "Data Tersimpan";
			     }
			     else
			    {
				 show_error($this->email->print_debugger());
			        $notif = "Data Gagal Tersimpan";
			    }
			    return $notif;
	} 
	
	
	
	
	public function emailsent_rej($vartoemail,$varccemail,$varsubject,$msgemail){

 			$config = Array(
 				 'protocol' => 'smtp',
  				 'smtp_host' => 'ssl://mail.ish.co.id',
  				 'smtp_port' => 465,
  				 'smtp_user' => 'no-reply@ish.co.id', // change it to yours
  				 'smtp_pass' => 'NoReplyISH2016', // change it to yours
  				 'mailtype' => 'html',
  				 'charset' => 'iso-8859-1',
  				 'wordwrap' => TRUE
									);
 				$notif ="";

		        $this->load->library('email', $config);
		        $this->email->initialize($config);
		        $this->email->clear(TRUE);
		      	$this->email->set_newline("\r\n");
		      	$this->email->from('no-reply@ish.co.id'); // change it to yours
		      	$this->email->to($vartoemail);// change it to yours
		     	//$this->email->cc($varccemail);
		      	$this->email->subject($varsubject);
		      	$this->email->message($msgemail);

	      	   if($this->email->send())
			     {
			     $notif = "Data Telah Di Reject";
			     }
			     else
			    {
				 show_error($this->email->print_debugger());
			        $notif = "Data Gagal Di Reject";
			    }
			    return $notif;
	} 
	
	
	
	
	
	public function edit_skema($sid)
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['regional'] 		= $session_data['regional'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Job Order";
			
			
			$tes = $session_data['level'];
			
			
			$aaa = $this->job_model->get_nojo_type($sid);
			
			$data['nojo'] 			= $aaa->nojo;
			$data['type_jo'] 		= $aaa->cnama;
			$data['komponen_skema'] = $aaa->komponen;
			$data['komponen_bak'] 	= $aaa->komponen_bak;
			$data['komponen_other'] = $aaa->komponen_other;
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/edit_skema',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function edit_all($appr, $nojo)
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "Job Order";
			
			
			$tes = $session_data['level'];
			$data['apps']  = $appr;
			
			$aaa = $this->job_model->get_nojo_edit($nojo);
			
			foreach($aaa as $key => $list){ 
				$data['ntjo'] 			= $list['cnama'];
				$data['tjo']  			= $list['type_jo'];
				$data['noj']  			= $list['nojo'];
				$data['nproj']  		= $list['project'];
				$data['tanggal']    	= $list['tanggal'];
				$data['tre']    		= $list['type_replace'];
				$data['jpro']    		= $list['dnama'];
				$data['syaratx']    	= $list['syarat'];
				$data['deskripsix'] 	= $list['deskripsi'];
				$data['lproj']    		= $list['lama'];
				$data['pelatihan']  	= $list['latihan'];
				$data['bekerja']    	= $list['bekerja'];
				$data['komponen_skema'] = $list['komponen'];
				$data['komponen_bak'] 	= $list['komponen_bak'];
				$data['komponen_other'] = $list['komponen_other'];
				
				$nama_proj = $list['project'];;
				
				if($list['type_jo']==2)
				{
					$qwerty = $this->skema_model->get_rinc_pro($nama_proj);
					$data['nsap'] = $qwerty->WKTXT;
					$this->load->database('default',TRUE);
				}
			}
			
			
			$data['bbb'] = $this->job_model->get_rinc_edit($nojo);
			
			$katerray = $this->job_model->get_kategori();
				$select = "";
				foreach($katerray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['name_job_function_category'] . "</option>";
				}
			$data['cmbkategori']		= $select;
			
			$tggrray = $this->job_model->get_tgg();
				$select = "";
				foreach($tggrray as $key => $list){
					$select .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbtgg']		= $select;
			
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
			
			$prorray = $this->job_model->get_province();
				$select = "";
				foreach($prorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['name_province'] . "</option>";
				}
			$data['cmbprovince']		= $select;
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/edit_all',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	
	public function edit_all_skema($appr, $nojo)
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "Job Order";
			
			
			$tes = $session_data['level'];
			$data['apps']  = $appr;
			
			$aaa = $this->job_model->get_nojo_psk($nojo);
			
			foreach($aaa as $key => $list){ 
				$data['area'] 			= $list['area'];
				$data['narea']  		= $list['n_area'];
				$data['noj']  			= $list['nojo'];
				$data['perar']  		= $list['perar'];
				$data['nperar']    		= $list['n_perar'];
				$data['komponen_skema'] = $list['dokumen_skema'];
				$data['komponen_bak'] 	= $list['dokumen_bak'];
				$data['komponen_other'] = $list['dokumen_other'];
				
			}
			
			$data['ntjo'] 			= 'Penyesuaian Skema';
			
			$data['bbb'] = $this->job_model->get_rinc_ps($nojo);
			
			$katerray = $this->job_model->get_kategori();
				$select = "";
				foreach($katerray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['name_job_function_category'] . "</option>";
				}
			$data['cmbkategori']		= $select;
			
			$tggrray = $this->job_model->get_tgg();
				$select = "";
				foreach($tggrray as $key => $list){
					$select .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbtgg']		= $select;
			
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
			
			$prorray = $this->job_model->get_province();
				$select = "";
				foreach($prorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['name_province'] . "</option>";
				}
			$data['cmbprovince']		= $select;
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/edit_all_skema',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	function deletefile(){

		$nmfile = $this->input->post('file');
		$nojo   = $this->input->post('nojoz');
		$jenis  = $this->input->post('jenisz');
		
		//var_dump($nmfile);var_dump($nojo);var_dump($jenis);exit();
	
		$item = array(
				'nojo' => $nojo
		);
		
		if($jenis=='skema')
		{
			$item1 = array(
				'komponen' => ''
			);
		}
		else if($jenis=='bak')
		{
			$item1 = array(
				'komponen_bak' => ''
			);
		}
		else if($jenis=='other')
		{
			$item1 = array(
				'komponen_other' => ''
			);
		}
		
		$this->job_model->del_dok($item, $item1);
		unlink("uploads/".$nmfile);
		
	}
	
	
	
	function deletefile_sk(){

		$nmfile = $this->input->post('file');
		$nojo   = $this->input->post('nojoz');
		$jenis  = $this->input->post('jenisz');
		
		//var_dump($nmfile);var_dump($nojo);var_dump($jenis);exit();
	
		$item = array(
				'nojo' => $nojo
		);
		
		if($jenis=='skema')
		{
			$item1 = array(
				'dokumen_skema' => ''
			);
		}
		else if($jenis=='bak')
		{
			$item1 = array(
				'dokumen_bak' => ''
			);
		}
		else if($jenis=='other')
		{
			$item1 = array(
				'dokumen_other' => ''
			);
		}
		
		$this->job_model->del_dok_sk($item, $item1);
		unlink("uploads/".$nmfile);
	}
	
	
	
	function s_edit_skema(){
		
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['regional'] 		= $session_data['regional'];
		$nama	 		= $session_data['nama'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		//$nojo  = $_POST['nojok'];
		$nojo  = $this->input->post('nojok');
		$nojof = str_replace("/", "", $nojo);
		//$abcd  = $_POST['kompol'][0];
		
		//$qwe = $_FILES['komp']['name'][0];
		//$qwz = $_FILES['komp']['name'][1];
		//var_dump($qwe);var_dump($qwz);
		//exit();
		
		$hjk = array("skema","bak","other");
		//for($i=0; $i<count($_FILES['komp']['name']); $i++){
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			if($_FILES['komp']['name'][$i]!='')
			{
				$target_path = "./uploads/";
				$ext = explode('.', basename( $_FILES['komp']['name'][$i]));
				if($_POST['kompol'][$i]=='skema')
				{
					//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1];  
					//$target_path = $target_path . $hjk[$i] ."_". $nojof . "." . $ext[count($ext)-1];
					$target_path = $target_path . "skema_". $nojof . "." . $ext[count($ext)-1];
				}
				else if($_POST['kompol'][$i]=='bak')
				{
					$target_path = $target_path . "bak_". $nojof . "." . $ext[count($ext)-1];
				}
				else
				{
					$target_path = $target_path . "other_". $nojof . "." . $ext[count($ext)-1];
				}
				

				if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
					//echo "The file has been uploaded successfully <br />";
				} else{
					//echo "There was an error uploading the file, please try again! <br />";
				}
			}				
		}
		
		
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			if($_FILES['komp']['name'][$i]!='')
			{
				$ext  = pathinfo($_FILES['komp']['name'][$i], PATHINFO_EXTENSION);
				if($_POST['kompol'][$i]=='skema')
				{
					$file_name = "skema_" . $nojof . "." . $ext;
				
					$item1 = array(
						'komponen' 			=> $file_name,
						'flag_cancel_sap' 	=> 0,
						'flag_edit' 		=> 1,
						'upd_edit' 			=> $session_data['username']
					);
					
					$item = array( 
						'nojo' => $nojo
					);
					
					$this->job_model->edit_skema($item, $item1);
				}
				else if($_POST['kompol'][$i]=='bak')
				{
					$file_name2 = "bak_" . $nojof . "." . $ext;
				
					$item1 = array(
						'komponen_bak' 		=> $file_name2,
						'flag_cancel_sap' 	=> 0,
						'flag_edit' 		=> 1,
						'upd_edit' 			=> $session_data['username']
					);
					
					$item = array( 
						'nojo' => $nojo
					);
					
					$this->job_model->edit_skema($item, $item1);
				}
				else 
				{
					$file_name3 = "other_" . $nojof . "." . $ext;
				
					$item1 = array(
						'komponen_other' 	=> $file_name3,
						'flag_cancel_sap' 	=> 0,
						'flag_edit' 		=> 1,
						'upd_edit' 			=> $session_data['username']
					);
					$item = array( 
						'nojo' => $nojo
					);
					
					$this->job_model->edit_skema($item, $item1);
				}
			}
		}
		
		/*
		$abab  = $_FILES['komp']['name'][0];
		$acab  = $_FILES['komp']['name'][1];
		$adab  = $_FILES['komp']['name'][2];
		
		$ext  = pathinfo($abab, PATHINFO_EXTENSION);
		$ext2 = pathinfo($acab, PATHINFO_EXTENSION);
		$ext3 = pathinfo($adab, PATHINFO_EXTENSION);
		
		//var_dump($ext);var_dump($ext2);var_dump($ext3);exit();
		
		
		if( ($ext!='') && ($ext2=='') && ($ext3=='') )
		{
			$file_name = "skema_" . $nojof . "." . $ext;
			
			$item1 = array(
				'komponen' 			=> $file_name,
				'flag_cancel_sap' 	=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $session_data['username']
			);
		}
		else if( ($ext=='') && ($ext2!='') && ($ext3=='') )
		{
			$file_name2 = "bak_" . $nojof . "." . $ext2;
			
			$item1 = array(
				'komponen_bak' 		=> $file_name2,
				'flag_cancel_sap' 	=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $session_data['username']
			);
		}
		else if( ($ext=='') && ($ext2=='') && ($ext3!='') )
		{
			$file_name3 = "other_" . $nojof . "." . $ext3;
			
			$item1 = array(
				'komponen_other' 	=> $file_name3,
				'flag_cancel_sap' 	=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $session_data['username']
			);
		}
		else if( ($ext!='') && ($ext2!='') && ($ext3!='') )
		{
			$file_name = "skema_" . $nojof . "." . $ext;
			$file_name2 = "bak_" . $nojof . "." . $ext2;
			$file_name3 = "other_" . $nojof . "." . $ext3;
			
			$item1 = array(
				'komponen' 			=> $file_name,
				'komponen_bak' 		=> $file_name2,
				'komponen_other' 	=> $file_name3,
				'flag_cancel_sap' 	=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $session_data['username']
			);
		}
		*/
		
		
		
		$check = $this->job_model->get_email_sap();
		//$test = array();
		foreach ($check as $val) {
			$test = $val['email'];
		
			$data['nojoz']  = $nojo;
			$data['nama']   = $session_data['nama'];
			
			$data['skrg'] = date("d-m-Y H:i:s");
			
			$data['abcd'] = 2;
			
			$message = $this->load->view('addjo/email_sap.php',$data,TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Edit Skema/BAK JO',$message);
			
			echo $hasilkirim;
		}
		
	}
	
	
	
	
	function s_edit_all(){
		
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['regional'] 		= $session_data['regional'];
		$nama	 		= $session_data['nama'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		//$nojo  = $_POST['nojok'];
		$nojo  = $this->input->post('nojok');
		$nojof = str_replace("/", "", $nojo);
		
		$hjk = array("skema","bak","other");
		//for($i=0; $i<count($_FILES['komp']['name']); $i++){
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			if($_FILES['komp']['name'][$i]!='')
			{
				$target_path = "./uploads/";
				$ext = explode('.', basename( $_FILES['komp']['name'][$i]));
				if($_POST['kompol'][$i]=='skema')
				{
					//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1];  
					//$target_path = $target_path . $hjk[$i] ."_". $nojof . "." . $ext[count($ext)-1];
					$target_path = $target_path . "skema_". $nojof . "." . $ext[count($ext)-1];
				}
				else if($_POST['kompol'][$i]=='bak')
				{
					$target_path = $target_path . "bak_". $nojof . "." . $ext[count($ext)-1];
				}
				else
				{
					$target_path = $target_path . "other_". $nojof . "." . $ext[count($ext)-1];
				}
				

				if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
					//echo "The file has been uploaded successfully <br />";
				} else{
					//echo "There was an error uploading the file, please try again! <br />";
				}
			}				
		}
		
		
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			if($_FILES['komp']['name'][$i]!='')
			{
				$ext  = pathinfo($_FILES['komp']['name'][$i], PATHINFO_EXTENSION);
				if(($ext!='') && ($_POST['kompol'][$i]=='skema'))
				{
					$file_name = "skema_" . $nojof . "." . $ext;
				
					$item1 = array(
						'komponen' 			=> $file_name
						//'flag_cancel_sap' 	=> 0,
						//'flag_edit' 		=> 1,
						//'upd_edit' 			=> $session_data['username']
					);
					
					$item = array( 
						'nojo' => $nojo
					);
					
					$this->job_model->edit_skema($item, $item1);
				}
				else if(($ext!='') && ($_POST['kompol'][$i]=='bak'))
				{
					$file_name2 = "bak_" . $nojof . "." . $ext;
				
					$item1 = array(
						'komponen_bak' 		=> $file_name2
						//'flag_cancel_sap' 	=> 0,
						//'flag_edit' 		=> 1,
						//'upd_edit' 			=> $session_data['username']
					);
					
					$item = array( 
						'nojo' => $nojo
					);
					
					$this->job_model->edit_skema($item, $item1);
				}
				else if(($ext!='') && ($_POST['kompol'][$i]=='other'))
				{
					$file_name3 = "other_" . $nojof . "." . $ext;
				
					$item1 = array(
						'komponen_other' 	=> $file_name3
						//'flag_cancel_sap' 	=> 0,
						//'flag_edit' 		=> 1,
						//'upd_edit' 			=> $session_data['username']
					);
					$item = array( 
						'nojo' => $nojo
					);
					
					$this->job_model->edit_skema($item, $item1);
				}
			}
		}
		
		
		
		
	}
	
	
	
	function s_edit_skema_sk(){
		
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$nama	 		= $session_data['nama'];
		$data['regional'] 		= $session_data['regional'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$nid     = $_POST['nid'];
		$nojo    = $_POST['nojok'];
		$narea   = $_POST['n_area'];
		$nperar  = $_POST['n_perar'];
		$area    = $_POST['area'];
		$perar   = $_POST['perar'];
		//$nojof = str_replace("/", "", $nojo);
		//$abcd  = $_POST['kompol'][0];
		
		//var_dump($nojo);var_dump($narea);var_dump($nperar);var_dump($area);var_dump($perar);exit();
		
		$hjk = array("skema","bak","other");
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			$target_path = "./uploads/";
			$ext = explode('.', basename( $_FILES['komp']['name'][$i]));
			if($_POST['kompol'][$i]=='skema')
			{
				//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1];  
				//$target_path = $target_path . $hjk[$i] ."_". $nojof . "." . $ext[count($ext)-1];
				$target_path = $target_path . "skema_". $area ."_". $perar ."_". $date_now .".". $ext[count($ext)-1];
			}
			else if($_POST['kompol'][$i]=='bak')
			{
				$target_path = $target_path . "bak_". $area ."_". $perar ."_". $date_now .".". $ext[count($ext)-1];
			}
			else
			{
				$target_path = $target_path . "other_". $area ."_". $perar ."_". $date_now .".". $ext[count($ext)-1];
			}
			

			if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
				//echo "The file has been uploaded successfully <br />";
			} else{
				//echo "There was an error uploading the file, please try again! <br />";
			}
		}
		
		
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			$target_path = "./uploads/";
			$ext  = pathinfo($_FILES['komp']['name'][$i], PATHINFO_EXTENSION);
			if($_POST['kompol'][$i]=='skema')
			{
				$file_name = "skema_" . $area ."_". $perar ."_". $date_now . "." . $ext;
			
				$item1 = array(
					'dokumen_skema' 	=> $file_name,
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1
				);
				
				$item = array( 
					'id' => $nid
				);
				
				$this->job_model->edit_skema_sk($item, $item1);
			}
			else if($_POST['kompol'][$i]=='bak')
			{
				$file_name2 = "bak_" . $area ."_". $perar ."_". $date_now . "." . $ext;
			
				$item1 = array(
					'dokumen_bak' 		=> $file_name2,
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1
				);
				
				$item = array( 
					'id' => $nid
				);
				
				$this->job_model->edit_skema_sk($item, $item1);
			}
			else 
			{
				$file_name3 = "other_" . $area ."_". $perar ."_". $date_now . "." . $ext;
			
				$item1 = array(
					'dokumen_other' 	=> $file_name3,
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1
				);
				$item = array( 
					'id' => $nid
				);
				
				$this->job_model->edit_skema_sk($item, $item1);
			}
			
		}
		
		
		
		$check = $this->job_model->get_email_sap();
		//$test = array();
		foreach ($check as $val) {
			//$test[] = $val['email'];
			$test = $val['email'];
		
			$data['nojoz']    = $nojo;
			$data['nama']     = $session_data['nama'];
			$data['nareaz']   = $_POST['n_area'];
			$data['nperarz']  = $_POST['n_perar'];
			
			$data['skrg'] = date("d-m-Y H:i:s");
			
			$data['abcd'] = 1;
			
			$message = $this->load->view('addjo/email_sap.php',$data,TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Edit Skema/BAK JO',$message);
			
			echo $hasilkirim;
		}
		
	}
	
	
	
	function simpan_jobs(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$usr		 			= $session_data['username'];
			$data['regional'] 		= $session_data['regional'];
			$data['level'] 			= $session_data['level'];
			$njo   			= $this->input->post('arrappjox');
			$sid  			= $njo[0];
			$ssalary 		= $njo[1];
			$esalary 		= $njo[2];
			$exper 			= $njo[3];
			$level 			= $njo[4];
			$job_skills 	= $njo[5];
			$job_benefits	= $njo[6];
			$duedate 		= $njo[7];
			$duedate1 		= $njo[8];
			//var_dump($sid);
			//exit();
			$this->job_model->simpan_jobs($sid,$usr);
			
			
			
			$cek_nojo = $this->db->query("SELECT * FROM trans_jo a left join trans_rincian b on a.nojo=b.nojo left join job_function c on b.jabatan=c.id where b.id='".$sid."' ")->result();
			
			
			
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
				
				//$dbpostgre = $this->load->database('db_second',TRUE);
				$this->job_model->simpan_media($item);
			
			}
			
			//$msg = 'Data Berhasil Di Approve';
			
			//$redirect = site_url('/home/joborder/');
			//echo "<script>javascript:alert('$msg'); window.location = '$redirect'</script>";
			
		}
	}
	
	
	
	function skip_simpan_jobs(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$usr		 			= $session_data['username'];
			$data['regional'] 		= $session_data['regional'];
			$data['level'] 			= $session_data['level'];
			$njo   			= $this->input->post('arrappjox');
			$sid  			= $njo[0];
			//var_dump($sid);
			//exit();
			$this->job_model->skip_simpan_jobs($sid,$usr);
			
		}
	}
	
	
	
	function simpan_pichi(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$usr		 			= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$xpichi			= $this->input->post('pichix');
			$pichi 			= $xpichi[0];
			$n_pichi  		= $xpichi[1];
			$picid  		= $xpichi[2];
			
			//var_dump($pichi);exit();
			
			$item = array (
				'id'	=> $picid
			);
			
			$item2 = array (
				'pic_hi'	=> $pichi,
				'n_pic_hi'	=> $n_pichi
			);
			//var_dump($sid);
			//exit();
			$this->job_model->simpan_pichi($item,$item2);
			
		}
	}
	
	
	function ls_sk(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjol');
			$njok  = $njo[0];
			$keter = $njo[1];
			$bar   = $njo[2];
			$bpa   = $njo[3];
			$bare  = $njo[4];
			$pare  = $njo[5];
			$this->job_model->ls_inssimpantjo_sk($njok,$keter);
			
			$cek_detil = $this->db->query("SELECT a.nama FROM m_login a left join trans_skema b ON a.username=b.upd WHERE b.id = '$njok'")->row();
			
			$check = $this->job_model->get_email_sap();
			//foreach($check)
			//$test = array();
			foreach ($check as $val) {
				//$test[] = $val['email'];
				$test = $val['email'];
			
				$data['sar']  = $bar;
				$data['spa']  = $bpa;
				$data['nama'] = $cek_detil->nama;
				$data['type'] = 'Penyesuaian Skema';
				$data['eeee'] = 2;
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$message = $this->load->view('addjo/email_new_sap.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
				
				echo $hasilkirim;
			}
			
		}
	}
	
	
	
	
	function lr_sk(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjol');
			$njok  = $njo[0];
			$keter = $njo[1];
			$bar   = $njo[2];
			$bpa   = $njo[3];
			$bare  = $njo[4];
			$pare  = $njo[5];
			$nojk  = $njo[6];
			$this->job_model->lr_rejectjo_sk($njok, $keter);
			
			$check = $this->job_model->get_email_penerima_sk_id($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $nojk;
			$data['ktr']   = $keter;
			$data['sar']   = $bar;
			$data['spa']   = $bpa;
		
			$message = $this->load->view('addjo/email_rej_sk.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'soehartobaru@gmail.com','Notifikasi Reject JO - Penyesuaian Skema',$message);
			
			echo $hasilkirim;
			
			redirect('home/appjo', 'refresh');
		}
	}
	
	
	
	
	function s_sk(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjol');
			$njok  = $njo[0];
			$keter = $njo[1];
			$bar   = $njo[2];
			$bpa   = $njo[3];
			$bare  = $njo[4];
			$pare  = $njo[5];
			$this->job_model->inssimpantjo_sk($njok,$keter);
			
			$cek_detil = $this->db->query("SELECT a.nama FROM m_login a left join trans_skema b ON a.username=b.upd WHERE nojo = '$njok'")->row();
			
			$check = $this->job_model->get_email_manar($bare);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			
			$data['sar']  = $bar;
			$data['spa']  = $bpa;
			$data['nama'] = $cek_detil->nama;
			
			//var_dump($data['sar']);
			//exit();
			
			$data['skrg'] = date("d-m-Y H:i:s");
			
			$message = $this->load->view('addjo/email.php',$data,TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
			
			echo $hasilkirim;
		}
	}
	
	
	function r_sk(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjol');
			$njok  = $njo[0];
			$keter = $njo[1];
			$bar   = $njo[2];
			$bpa   = $njo[3];
			$bare  = $njo[4];
			$pare  = $njo[5];
			$this->job_model->rejectjo_sk($njok, $keter);
			
			$check = $this->job_model->get_email_penerima_sk($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['ktr']   = $keter;
			$data['sar']   = $bar;
			$data['spa']   = $bpa; 
		
			$message = $this->load->view('addjo/email_rej_sk.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'soehartobaru@gmail.com','Notifikasi Reject JO - Penyesuaian Skema',$message);
			
			echo $hasilkirim;
			
			redirect('home/appjo', 'refresh');
		}
	}
	
	
	
	function simpan_skema_sk(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njob = $this->input->post('data');
			$njo = $njob[0];
			$ket = $njob[1];
			$this->job_model->inssimpanskema_sk($njo, $ket);
			
			
			$check = $this->job_model->get_email_penerima_sk_all($njo);
			$test = array();
			foreach ($check as $val) { 
				$test[] = $val['email'];
			}
			
			$cek_detil 		= $this->db->query("SELECT * FROM trans_skema WHERE nojo = '$njo' group by nojo ")->row();
			$data['nareaz'] = $cek_detil->n_area;
			$data['nperarz']= $cek_detil->n_perar;
			$data['nojoz']  = $njo;
			$data['keter']  = $ket;
			$data['skrg']  	= date("d-m-Y H:i:s");
			$data['abcd'] 	= 2;
		
			$message = $this->load->view('addjo/email_done.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'soehartobaru@gmail.com','Notifikasi Done Skema JO - Penyesuaian Skema',$message);
		}
	}
	
	
	function simpan_cancel_sap_sk(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			
			$item = array (
				'nojo' => $this->input->post('cnojoz'),
			);
			
			$item1 = array (
				'flag_cancel_sap'	=> '1',
				'ket_cancel' 		=> $this->input->post('scancelz')
			);
			
			$this->job_model->simpan_cancel_sap_sk($item,$item1);
			
			
			$njok = $this->input->post('cnojoz');
			$keter = $this->input->post('scancelz');
			
			$cek_detil 		= $this->db->query("SELECT * FROM trans_skema WHERE nojo = '$njok' group by nojo ")->row();
			$data['sar'] = $cek_detil->n_area;
			$data['spa'] = $cek_detil->n_perar;
			
			
			$check = $this->job_model->get_email_penerima_sk_all($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['ktr']   = $keter;
		
			$message = $this->load->view('addjo/email_rej_sk.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'soehartobaru@gmail.com','Notifikasi Reject JO - Penyesuaian Skema',$message);
			
			echo json_encode($hasilkirim);
			exit;
			
			redirect('home/listorder', 'refresh');
			
		}
	}
	
	
	
	public function edit_skema_sk($sid)
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 		= "Job Order";
			
			
			$tes = $session_data['level'];
			/*
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
			*/
			
			$aaa = $this->job_model->get_nojo_type_sk($sid);
			
			$data['id'] 			= $aaa->id;
			$data['nojo'] 			= $aaa->nojo;
			$data['area'] 			= $aaa->area;
			$data['perar'] 			= $aaa->perar;
			$data['n_area'] 		= $aaa->n_area;
			$data['n_perar'] 		= $aaa->n_perar;
			$data['type_jo'] 		= 'Penyesuaian Skema';
			$data['dokumen_skema']  = $aaa->dokumen_skema;
			$data['dokumen_bak'] 	= $aaa->dokumen_bak;
			$data['dokumen_other']  = $aaa->dokumen_other;
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/edit_skema_sk',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	function save_ket_rek(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			
			$kk 	= $this->input->post('dataitv');
			$valid 	= $kk[0];
			$id 	= $kk[1];
			$keter 	= $kk[2];
			
			$item = array (
				'id' => $id,
			);
			
			$item1 = array (
				'status_rekrut'		=> $valid,
				'ket_rekrut' 		=> $keter,
				'upd_rekrut' 		=> $data['username']
			);
			
			$this->job_model->simpan_ket_rek($item,$item1);
			
		}
	}
	
	
	
	function pilih_area(){
		$varray				= $this->skema_model->take_area($this->input->post(data));
			//$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
			$selectnama 	= "<option value=''>pilih</option>";
			foreach($varray as $key => $list){
				$selectnama .= "<option value='". $list['btrtl'] ."'>". $list['btrtx'] ."</option>";
			}
		print_r($selectnama);
	}
	
	
	
	function trojan(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$zid = $this->input->post('data');
			$data['vrincian']		= $this->job_model->trojan($zid);
			
			/*
			if(empty($lala))
			{
				$data['vrincian']		= $this->job_model->trojan($zid);
			}
			*/
			$tes = $session_data['level'];
			
			
			$this->load->view('joborder/vrincian', $data);
		}
	}
	
	
	function searchar(){
		$perar 	= $_GET['q'];
		$data	= $this->skema_model->searchar($perar);
		echo json_encode($data);
	}
	
	
	function xsearchar(){
		$perar 	= $_GET['q'];
		$data	= $this->skema_model->xsearchar($perar);
		echo json_encode($data);
	}
	
	
	public function ajax_list()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)){
			 // $params = $this->uri->segment(4); 
			$postparam = $this->input->post();

			// $tgls 			= $postparam['0']['value'];
			// $tgle 			= $postparam['1']['value'];
			// $personalarea 	= $postparam['2']['value'];
			// $area 			= $postparam['3']['value'];
			// $skilllayanan  	= $postparam['4']['value'];

			$parsearch	= array (
				"tgls"			=> $postparam['0']['value'],
				"tgle"			=> $postparam['1']['value'],
				"personalarea"	=> $postparam['2']['value'],
				"area"			=> $postparam['3']['value'],
				"skilllayanan"	=> $postparam['4']['value']
			);

			$draw=$postparam['draw'];
			$length=$postparam['length'];
			$start=$postparam['start'];
			$search=$postparam['search']["value"];
			
			$order=$postparam['order'][0]['column'];
			$dir=$postparam['order'][0]['dir'];
			
			//$data =  $this->user_profile_model->get_profile($length,$start,$search,$order,$dir,$parsearch);
			$data =  $this->job_model->get_list($length,$start,$search,$order,$dir);
	
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {	
				$output['data'][]=array( 
					$row['PERNR'],
					'<a href="'.base_url().'index.php/home/profile/'.$row['PERNR'].'">'.$row['CNAME'].'</a>', 
					$row['FASEX_TXT'],
					$row['ICNUM'],
					$row['PLATX'],
					$row['WKTXT'],
					$row['DATDT'],
					$row['ARBER']
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}
	
	
	function rinc_hapus($id){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$data['regional'] 		= $session_data['regional'];
			
			$this->job_model->rinc_hapus($id);
			
			//$sss  = $this->db->query("SELECT nojo FROM trans_rincian WHERE id = '$id'")->row();
			//$nojo = $sss->nojo;
			
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-warning\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
			//redirect('mappingan/v_mapping');
			
			//$data['bbb'] = $this->job_model->get_rinc_edit($nojo);
			//$this->load->view('joborder/e_rincian', $data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	
	
	function deleterinc(){
		$nid = $this->input->post('bid');
		$this->job_model->rinc_hapus($nid);
	}
	
	
	
	function rinc_skema_hapus($id){
	
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$data['regional'] 		= $session_data['regional'];
			
			$this->job_model->rinc_skema_hapus($id);
			
			//$sss  = $this->db->query("SELECT nojo FROM trans_rincian WHERE id = '$id'")->row();
			//$nojo = $sss->nojo;
			
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-warning\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil dihapus</div>");
			//redirect('mappingan/v_mapping');
			
			//$data['bbb'] = $this->job_model->get_rinc_edit($nojo);
			//$this->load->view('joborder/e_rincian', $data);
		} else {
			redirect('login', 'refresh');
		}
		
	}
	
	
	function deleteperar(){
		$nid = $this->input->post('bid');
		$this->job_model->rinc_skema_hapus($nid);
	}
	
}
