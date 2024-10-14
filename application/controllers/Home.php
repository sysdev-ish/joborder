<?php //symlink('/var/www/html/jo-dev.ish.co.id/uploads', '/mnt/drobo/88.41/uploads'); 
?>
<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector', 'path', 'file'));
		$this->load->library(array('form_validation', 'curl'));
		$this->load->model(array('job_model', 'user', 'skema_model', 'master_model', 'ump_model'));
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


	public function buattes_error()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "List Login";

			$FileName = '/mnt/drobo/88.41/uploads/bak_022128ISH010101072021.pdf';
			header('Content-disposition: attachment; filename="' . $FileName . '"');
			readfile($FileName);

			// $non_existent_file = '/mnt /drobo/88.41/uploads/bak_022120ISH010101072021.pdf'; 
			// echo set_realpath($non_existent_file, FALSE);
			// echo readlink($non_existent_file);
			// echo read_file('/mnt /drobo/88.41/uploads/bak_019879ISH010101072021.pdf');
			// $handle = fopen("/mnt /drobo/88.41/uploads/bak_019879ISH010101072021.pdf", "r");
			// echo $handle;


		}
	}


	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['type'] 		= $session_data['type'];
			$data['title'] 			= "Job Order";

			$data['transjo'] 		= $this->job_model->get_transjo();
			$data['telkomgroup'] 	= ''; //$this->job_model->get_alljo();
			$data['infomedia'] 		= ''; //$this->job_model->get_ontime();
			$data['telkom'] 		= ''; //$this->job_model->get_alljoapp();
			$data['wew'] 			= $this->job_model->get_topod();
			$data['group'] 			= ''; //$this->job_model->get_overdue();

			$data['graph'] 			= $this->job_model->graph();
			//$data = $this->job_model->app_transall_ops($length,$start,$search,$order,$dir);

			$tes = $session_data['level'];

			$this->load->view('pages/header', $data);
			$this->load->view('pages/dashboard_grafik', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}



	public function listdashboard()
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('pages/listdashboard', $data);
		} else {
			redirect('login', 'refresh');
		}
	}




	public function dashboard_cancel()
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/dashboard_cancel', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	public function listjo_cancel()
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('joborder/listjocancel', $data);


			//$this->load->view('joborder/listjo',$data);

		} else {
			redirect('login', 'refresh');
		}
	}



	public function dashboard_newjo()
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/dashboard_newjo', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}




	public function listjo_newjo()
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('joborder/listjonewjo', $data);


			//$this->load->view('joborder/listjo',$data);

		} else {
			redirect('login', 'refresh');
		}
	}



	public function dashboard_ontime()
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/dashboard_ontime', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	public function dashboard_over()
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/dashboard_over', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}



	public function listappjo()
	{
		if ($this->session->userdata('logged_in')) {
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


			if ($tes1 == '4') {
				$data['transjo'] 		= $this->job_model->get_appjo1($search, $tes1);
			} else if ($tes1 == '2') {
				if ($data['regional'] == '1') {
					$data['transjo'] 		= $this->job_model->get_appjo_ops($search, $username, $jbt, $daud);
				} else {
					$data['transjo'] 		= $this->job_model->get_appjo($search, $daud, $jbt);
				}
			} else if ($tes1 == '1') {
				$data['transjo'] 		= $this->job_model->get_appjo2($search, $username, $jbt, $daud);
			} else {
				$data['transjo'] 		= $this->job_model->get_appjo3($search);
			}



			$tes = $session_data['level'];


			$this->load->view('joborder/listappjo', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function listorder()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['type'] 		= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			$tes 		= $session_data['level'];
			$daud 		= $session_data['layanan'];
			$jbt 		= $session_data['jabatan'];
			$username 	= $session_data['username'];
			$typ 		= $session_data['type'];

			if ($tes != '5') {
				if ($tes == '2') {
					if ($data['regional'] == '1') {
						//$data['transjo'] 	= $this->job_model->get_transall_approval_ops($username);
						//$data['transjos'] 	= $this->job_model->get_transall_sap_sk_app_ops($username);
					} else {
						$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
						$data['lalalili'] =  $q_cek_pmanar->jml;
						if (($q_cek_pmanar->jml) <= 0) {
							//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
							//$data['transjos'] = $this->job_model->get_transall_sap_sk_app($daud,$jbt);
						} else {
							//$data['transjo'] = $this->job_model->get_transall_manar_2($data['username']);
							//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar_2($data['username']);
						}
					}
				} else if ($tes == '1') {
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					//$data['transjos'] = $this->job_model->get_transall_sap_sk_creater($username);
				} else if ($tes == '3') {
					//$data['transjo'] = $this->job_model->get_transall_rekrut($daud);
					//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				} else if ($tes == '4') {
					//$data['transjo'] = $this->job_model->get_transall_manar($data['username']);
					//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				} else {
					//$data['transjo'] = $this->job_model->get_transall();
					//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				}


				/*
				$tjprorray = $this->skema_model->get_pichi();
				$selectq = "";
				foreach($tjprorray as $key => $list){
					$selectq .= "<option value=". $list['usr_loginname'] .">". $list['usr_lastname'] . "</option>";
				}
				$data['cmbpichi']		= $selectq;
				*/


				$jabatanrray = $this->job_model->get_level_name();
				$selectlevel = "";
				foreach ($jabatanrray as $key => $list) {
					$selectlevel .= "<option value='" . $list['id'] . "'>" . $list['job_name_level'] . "</option>";
				}
				$data['cmblevel']		= $selectlevel;



				/*
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_area');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"));
				$this->curl->post($post);
				$data['cmb_area'] =json_decode($this->curl->execute());
				
				
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"));
				$this->curl->post($post);
				$data['cmb_persa'] =json_decode($this->curl->execute());
				*/
				/*
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
				*/

				$data['form_job_skills'] = $this->job_model->getSkills()->result();

				$data['form_job_benefits'] = $this->job_model->getBenefits()->result();


				$this->load->view('pages/header', $data);
				$this->load->view('joborder/listorder', $data);
				$this->load->view('pages/footer');
			} else {
				//$data['transjo'] = $this->job_model->get_transall_sap();
				//$data['transjos'] = $this->job_model->get_transall_sap_sk();
				/*
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_area');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"));
				$this->curl->post($post);
				$data['cmb_area'] =json_decode($this->curl->execute());
				
				
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"));
				$this->curl->post($post);
				$data['cmb_persa'] =json_decode($this->curl->execute());
				*/
				/*
				$xjprorray = $this->skema_model->get_skill();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['PERSK'] .">". $list['PEKTX'] . "</option>";
				}
				$data['cmbskill']		= $select;
				*/
				//var_dump($data['cmbskill']);exit();

				/*
				$xjprorray = $this->skema_model->get_area();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['BTRTL'] .">". $list['BTRTX'] . "</option>";
				}
				$data['cmbarea']		= $select;
				*/

				/*
				$xjprorray = $this->skema_model->get_jabatan();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['kd_jabatan'] .">". $list['jabatan'] . "</option>";
				}
				$data['cmbjabatan']		= $select;
				*/

				//var_dump($data['cmbjbatan']);exit();
				/*
				$xjprorray = $this->skema_model->get_level();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['TRFAR'] .">". $list['TRFAR_TXT'] . "</option>";
				}
				$data['cmblevel']		= $select;
				*/

				$this->load->database('db_third', FALSE);
				$this->load->database('default', TRUE);
				$xjprorray = $this->job_model->get_jenis_project();
				$select = "";
				foreach ($xjprorray as $key => $list) {
					$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
				}
				$data['cmbjpro']		= $select;

				$xjprorrayp = $this->job_model->get_pm();
				$selectp = "";
				foreach ($xjprorrayp as $key => $list) {
					$selectp .= "<option value=" . $list['username'] . ">" . $list['nama'] . "</option>";
				}
				$data['cmbpm']		= $selectp;

				$xjprorraypy = $this->db->query("SELECT jml FROM gojobs GROUP BY jml ")->result_array();
				$selectpy = "";
				$selectpy .= "<option value='0'>0</option>";
				foreach ($xjprorraypy as $key => $list) {
					$selectpy .= "<option value=" . $list['jml'] . ">" . $list['jml'] . "</option>";
				}
				$data['cmbjmlx']		= $selectpy;


				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_zparam');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"));
				$this->curl->post($post);
				$nnn = json_decode($this->curl->execute());
				$mmm = $nnn->ZPARAMETER;

				$kkk = substr("" . $mmm . "", 0, 1);

				$nor = substr($mmm, 1, 9);

				$next 			= intval($nor) + 1;
				$xnext 			= $this->hitung_param($next);
				$data['zparam'] = $kkk . $xnext;

				//var_dump($zparam);exit();
				/*
				$xjprorray = $this->skema_model->get_zskema();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['zskema'] .">". $list['zskema'] . "</option>";
				}
				$data['cmbzskema']		= $select;
				*/
				/*
				$xjprorray = $this->skema_model->get_persax();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['werks'] .">". $list['werks'] . "-" . $list['wktxt'] ."</option>";
				}
				$data['cmbpersax']		= $select;
				
				
				$xjprorray = $this->skema_model->get_abkrsx();
				$select = "";
				foreach($xjprorray as $key => $list){
					$select .= "<option value=". $list['abkrs'] .">". $list['abkrs'] . "-" . $list['abtxt'] ."</option>";
				}
				$data['cmbabkrsx']		= $select;
				*/

				/*
				$vjprorray = $this->skema_model->get_pa_kontrak();
					$select = "";
					foreach($vjprorray as $key => $list){
						$select .= "<option value=". $list['personalarea'] .">". $list['personnal_area'] . "</option>";
					}
				$data['cmbpera']		= $select;
				*/

				// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
				// $this->curl->option('buffersize', 10);
				// $this->curl->http_login('devappish', 'devappish!@#');
				// $post = array('token' => sha1("#ISH!@#"));
				// $this->curl->post($post);
				// $data['cmbpersax'] =json_decode($this->curl->execute());
				// usort($data['cmbpersax'], array($this, "sort_persa"));
				//var_dump($data['cmbpersax']);

				$data['cmbpersax'] = $this->job_model->get_allpa();

				// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_area');
				// $this->curl->option('buffersize', 10);
				// $this->curl->http_login('devappish', 'devappish!@#');
				// $post = array('token' => sha1("#ISH!@#"));
				// $this->curl->post($post);
				// $data['cmbarea'] =json_decode($this->curl->execute());
				// usort($data['cmbarea'], array($this, "sort_area"));

				$data['cmbarea'] = $this->job_model->get_allar();

				// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_payrollarea');
				// $this->curl->option('buffersize', 10);
				// $this->curl->http_login('devappish', 'devappish!@#');
				// $post = array('token' => sha1("#ISH!@#"));
				// $this->curl->post($post);
				// $data['cmbabkrsx'] =json_decode($this->curl->execute());

				$data['cmbabkrsx'] = $this->job_model->get_allpayar();

				// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_skill');
				// $this->curl->option('buffersize', 10);
				// $this->curl->http_login('devappish', 'devappish!@#');
				// $post = array('token' => sha1("#ISH!@#"));
				// $this->curl->post($post);
				// $data['cmbskill'] =json_decode($this->curl->execute());
				// usort($data['cmbskill'], array($this, "sort_skill"));

				$data['cmbskill'] = $this->job_model->get_allskill();

				// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_skema');
				// $this->curl->option('buffersize', 10);
				// $this->curl->http_login('devappish', 'devappish!@#');
				// $post = array('token' => sha1("#ISH!@#"));
				// $this->curl->post($post);
				// $data['cmbzskema'] =json_decode($this->curl->execute());

				$data['cmbzskema'] = $this->job_model->get_allzskema();

				// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_jabatan');
				// $this->curl->option('buffersize', 10);
				// $this->curl->http_login('devappish', 'devappish!@#');
				// $post = array('token' => sha1("#ISH!@#"));
				// $this->curl->post($post);
				// $data['cmbjabatan'] =json_decode($this->curl->execute());
				// usort($data['cmbjabatan'], array($this, "sort_jab"));

				$data['cmbjabatan'] = $this->job_model->get_alljab();
				/* nanti di pakai saat naikin rfc rotasi resign
				$data['cmbjabatan'] = $this->job_model->get_alljabc();
				*/

				// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_level');
				// $this->curl->option('buffersize', 10);
				// $this->curl->http_login('devappish', 'devappish!@#');
				// $post = array('token' => sha1("#ISH!@#"));
				// $this->curl->post($post);
				// $data['cmblevel'] =json_decode($this->curl->execute());
				// usort($data['cmblevel'], array($this, "sort_lev"));

				$data['cmblevel'] = $this->job_model->get_alllevel();

				$reasrayx = $this->job_model->get_reasonganti();
				$selectreasx = "";
				foreach ($reasrayx as $key => $list) {
					$selectreasx .= "<option value=" . $list['kd_reason'] . "-" . $list['kode_z'] . ">" . $list['reason'] . " (" . $list['nama_z'] . ")</option>";
				}
				$data['cmbreason']		= $selectreasx;

				$reasrayxz = $this->job_model->get_trfgb();
				$selectreasxz = "";
				foreach ($reasrayxz as $key => $list) {
					$selectreasxz .= "<option value=" . $list['trfgb'] . ">" . $list['trfgb_txt'] . "</option>";
				}
				$data['cmbtrfgb']		= $selectreasxz;

				$reasrayxzx = $this->job_model->get_cttyp();
				$selectreasxzx = "";
				foreach ($reasrayxzx as $key => $list) {
					$selectreasxzx .= "<option value=" . $list['kd_cttyp'] . ">" . $list['nm_cttyp'] . "</option>";
				}
				$data['cmbcttyp']		= $selectreasxzx;

				$this->load->view('pages/header', $data);
				$this->load->view('joborder/listorder_sap', $data);
				$this->load->view('pages/footer');
			}
		} else {
			redirect('login', 'refresh');
		}
	}


	function doneslot_pm()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   	= $this->input->post('arrappjo');
			$id_slot  	= $njo[0];
			$nojo_slot  = $njo[1];
			$typejo_slot = $njo[2];
			$ket_slot 	= $njo[3];
			$this->job_model->doneslot($id_slot, $nojo_slot, $typejo_slot, $ket_slot);
		}
	}


	public function listorderx()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			$tes 		= $session_data['level'];
			$daud 		= $session_data['layanan'];
			$jbt 		= $session_data['jabatan'];
			$username 	= $session_data['username'];
			$typ 		= $session_data['type'];

			if ($tes != '5') {
				if ($tes == '2') {
					if ($data['regional'] == '1') {
					} else {
						$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
						$data['lalalili'] =  $q_cek_pmanar->jml;
						if (($q_cek_pmanar->jml) <= 0) {
						} else {
						}
					}
				} else if ($tes == '1') {
				} else if ($tes == '3') {
				} else if ($tes == '4') {
				} else {
				}


				$jabatanrray = $this->job_model->get_level_name();
				$selectlevel = "";
				foreach ($jabatanrray as $key => $list) {
					$selectlevel .= "<option value='" . $list['id'] . "'>" . $list['job_name_level'] . "</option>";
				}
				$data['cmblevel']		= $selectlevel;

				// $data['form_job_skills'] = $this->job_model->getSkills()->result();
				$data['form_job_skills'] = '';

				// $data['form_job_benefits'] = $this->job_model->getBenefits()->result();
				$data['form_job_benefits'] = '';


				$this->load->view('pages/header', $data);
				$this->load->view('joborder/listorderx', $data);
				$this->load->view('pages/footer');
			} else {
				$this->load->database('db_third', FALSE);
				$this->load->database('default', TRUE);
				$xjprorray = $this->job_model->get_jenis_project();
				$select = "";
				foreach ($xjprorray as $key => $list) {
					$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
				}
				$data['cmbjpro']		= $select;

				$xjprorrayp = $this->job_model->get_pm();
				$selectp = "";
				foreach ($xjprorrayp as $key => $list) {
					$selectp .= "<option value=" . $list['username'] . ">" . $list['nama'] . "</option>";
				}
				$data['cmbpm']		= $selectp;


				$djprorrayp = $this->job_model->getdiv();
				$dselectp = "";
				foreach ($djprorrayp as $key => $list) {
					$dselectp .= "<option value=" . $list['id'] . ">" . $list['divisi'] . "</option>";
				}
				$data['cmbdiv']		= $dselectp;


				$xjprorraypy = $this->db->query("SELECT jml FROM gojobs GROUP BY jml ")->result_array();
				$selectpy = "";
				$selectpy .= "<option value='0'>0</option>";
				foreach ($xjprorraypy as $key => $list) {
					$selectpy .= "<option value=" . $list['jml'] . ">" . $list['jml'] . "</option>";
				}
				$data['cmbjmlx']		= $selectpy;

				/*
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_zparam');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"));
				$this->curl->post($post);
				$nnn =json_decode($this->curl->execute());
				$mmm = $nnn->ZPARAMETER;
				
				$kkk = substr("".$mmm."", 0, 1);
				
				$nor = substr($mmm,1,9);
				
				$next 			= intval($nor) + 1;
				$xnext 			= $this->hitung_param($next);
				$data['zparam'] = $kkk . $xnext;
				*/

				$data['cmbpersax'] = $this->job_model->get_allpa();

				$data['cmbarea'] = $this->job_model->get_allar();

				$data['cmbabkrsx'] = $this->job_model->get_allpayar();

				$data['cmbskill'] = $this->job_model->get_allskill();

				$data['cmbzskema'] = $this->job_model->get_allzskema();

				// $data['cmbjabatan'] = $this->job_model->get_alljab();
				$data['cmbjabatan'] = $this->job_model->get_alljabc();

				$data['cmblevel'] = $this->job_model->get_alllevel();

				$reasrayx = $this->job_model->get_reasonganti();
				$selectreasx = "";
				foreach ($reasrayx as $key => $list) {
					$selectreasx .= "<option value=" . $list['kd_reason'] . "-" . $list['kode_z'] . ">" . $list['reason'] . " (" . $list['nama_z'] . ")</option>";
				}
				$data['cmbreason']		= $selectreasx;

				$reasrayxz = $this->job_model->get_trfgb();
				$selectreasxz = "";
				foreach ($reasrayxz as $key => $list) {
					$selectreasxz .= "<option value=" . $list['trfgb'] . ">" . $list['trfgb_txt'] . "</option>";
				}
				$data['cmbtrfgb']		= $selectreasxz;

				$reasrayxzx = $this->job_model->get_cttyp();
				$selectreasxzx = "";
				foreach ($reasrayxzx as $key => $list) {
					$selectreasxzx .= "<option value=" . $list['kd_cttyp'] . ">" . $list['nm_cttyp'] . "</option>";
				}
				$data['cmbcttyp']		= $selectreasxzx;

				$vreasrayxzx = $this->job_model->get_dokpks();
				$vselectreasxzx = "";
				foreach ($vreasrayxzx as $key => $list) {
					$vselectreasxzx .= "<option value=" . $list['id'] . ">" . $list['jenis_pks'] . "</option>";
				}
				$data['cmbdokpks']		= $vselectreasxzx;

				$this->load->view('pages/header', $data);
				$this->load->view('joborder/listorder_sap', $data);
				$this->load->view('pages/footer');
			}
		} else {
			redirect('login', 'refresh');
		}
	}


	private function sort_skill($a, $b)
	{
		return trim($a->PTEXT) > trim($b->PTEXT);
	}

	private function sort_persa($a, $b)
	{
		return trim($a->persa) > trim($b->persa);
	}

	private function sort_area($a, $b)
	{
		return trim($a->AREA_TEXT) > trim($b->AREA_TEXT);
	}

	private function sort_jab($a, $b)
	{
		return trim($a->STEXT) > trim($b->STEXT);
	}

	private function sort_lev($a, $b)
	{
		return trim($a->TARTX) > trim($b->TARTX);
	}

	public function appjo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['type'] 			= $session_data['type'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 		= "Job Order";
			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];
			if ($tes1 == '4') {
				//$data['transjo'] 		= $this->job_model->get_transappjo1();
				//$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);

				//$dbpostgre = $this->load->database('db_second',TRUE);
				//$jabatanrray = $dbpostgre->query("select id, job_name_level from job_level")->row();
			} else if ($tes1 == '2') {
				if ($data['regional'] == '1') {
					//$data['transjo'] 		= $this->job_model->get_transappjo_ops($username, $jbt, $daud);
					//$data['transjos'] 		= $this->job_model->get_transappjo_skema_ops($username);
				} else {
					//$data['transjo'] 		= $this->job_model->get_transappjo($daud, $jbt);
					//$data['transjos'] 		= $this->job_model->get_transappjo_skema($daud, $jbt);
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					if (($q_cek_pmanar->jml) <= 0) {
						//$data['transjos']			= $this->job_model->get_transappjo_skema($daud, $jbt);
					} else {
						$area = '';
						$perar = '';
						//$data['transjos']			= $this->job_model->view_sk_sk_list_mr_2x($area,$perar,$username);
					}
				}
			} else if ($tes1 == '1') {
				//$data['transjo'] 		= $this->job_model->get_transappjo2($username, $jbt, $daud);
				//$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			} else {
				//$data['transjo'] 		= $this->job_model->get_transappjo3();
				//$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			}

			$tes = $session_data['level'];

			$data['rdoc']		= $this->job_model->get_docp();

			/*
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
			*/

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/appjo', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	public function appjox()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['type'] 			= $session_data['type'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 		= "Job Order";
			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];

			$tes = $session_data['level'];

			$data['rdoc']		= $this->job_model->get_docp();

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/appjox', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	public function listorder_app()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['type'] 			= $session_data['type'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 		= "Job Order";
			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];

			$tes = $session_data['level'];

			$data['rdoc']		= $this->job_model->get_docp();


			$this->load->view('pages/header', $data);
			$this->load->view('joborder/app_pm', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	function search_sk()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= 'Job Order';

		$datax 		= $this->input->post('larr');
		$area 		= $datax[0];
		$perar	 	= $datax[1];
		$tyer	 	= $datax[2];
		$daud		= $session_data['layanan'];
		$jbt		= $session_data['jabatan'];
		$tes		= $session_data['level'];
		$username	= $session_data['username'];

		$data['cekik'] = $tyer;

		if ($tes == 2) {
			if ($data['regional'] == 1) {
				$data['transjos']			= $this->job_model->view_sk_ops($area, $perar, $username);
			} else {
				$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
				if (($q_cek_pmanar->jml) <= 0) {
					$data['transjos']			= $this->job_model->view_sk($area, $perar, $daud, $jbt);
				} else {
					$data['transjos']			= $this->job_model->view_sk_sk_list_mr_2x($area, $perar, $username);
				}
			}
		} else if ($tes == 5) {
			$data['transjos']			= $this->job_model->get_transappjo_skemapm();
		} else {
			$data['transjos']			= $this->job_model->view_sk_cr($area, $perar, $username);
		}

		$this->load->view('joborder/view_sk', $data);
	}


	function search_sk_sk()
	{
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

		$data['transjos']			= $this->job_model->view_sk_sk($area, $perar, $searchx);

		$this->load->view('joborder/view_sk_sk', $data);
	}


	public function listjo()
	{
		if ($this->session->userdata('logged_in')) {
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

			if ($tes != '5') {
				$search = $this->input->post('dataarr');

				if ($tes == '2') {
					//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
					if ($data['regional'] == '1') {
						$data['transjo'] 		= $this->job_model->get_jo_approval_ops($username, $search);
					} else {
						$data['transjo'] 		= $this->job_model->get_jo_approval($daud, $jbt, $search);
					}
				} else if ($tes == '1') {
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					$data['transjo'] 		= $this->job_model->get_jo_creater($username, $search);
				} else if ($tes == '3') {
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					//$data['transjo'] 		= $this->job_model->get_jo_rekrut($daud, $search);
				} else if ($tes == '4') {
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					$data['transjo'] 		= $this->job_model->get_jo_manar($username, $search);
					//var_dump($search);
					//exit();
				} else if ($tes == '7') {
					//$data['transjo'] = $this->job_model->get_transall_craeter($username);
					$data['transjo'] 		= $this->job_model->get_jo_manar2($search);
				} else {
					$data['transjo'] 		= $this->job_model->get_jo($search);
				}



				$this->load->view('joborder/listjo', $data);
			} else {
				$search = $this->input->post('dataarr');
				$data['transjo'] 		= $this->job_model->get_josap($search);



				$this->load->view('joborder/listjosap', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}




	public function listjox()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['type'] 			= $session_data['type'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "List JO";

			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$typ = $session_data['type'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];


			$search = $this->input->post('dataarr');
			$data['transjos'] 		= $this->job_model->xget_josap($search, $data['level'], $data['type']);

			$this->load->view('joborder/xlistjosap', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function xlistjox()
	{
		if ($this->session->userdata('logged_in')) {
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

			//$postparam = $this->input->post();

			//$search=$postparam['search']["value"];

			$search = $this->input->post('dataarr');
			//var_dump($search);exit();

			if ($tes == '2') {
				if ($session_data['mgr_enterprise'] == '1') {
					$data			 		= $this->job_model->get_transall_sap_sk_manarenterprise($username);
				} else {
					if ($data['regional'] == '1') {
						//$data['transjo'] 	= $this->job_model->get_transall_approval_ops($username);
						//$data['transjos'] 	= $this->job_model->get_transall_sap_sk_app_ops($username);
						$data['transjos'] 		= $this->job_model->get_transall_sap_sk_app_ops($search, $username);
					} else {
						$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
						$data['lalalili'] =  $q_cek_pmanar->jml;
						if (($q_cek_pmanar->jml) <= 0) {
							//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
							//$data['transjos'] = $this->job_model->get_transall_sap_sk_app($daud,$jbt);
							$data['transjos'] 		= $this->job_model->get_transall_sap_sk_app($search, $daud, $jbt);
						} else {
							//$data['transjo'] = $this->job_model->get_transall_manar_2($data['username']);
							$data['transjos'] = $this->job_model->get_transall_sap_sk_manar_2($search, $username);
						}
					}
				}
			} else if (($tes == '1') || ($tes == '14')) {
				//$data['transjo'] = $this->job_model->get_transall_craeter($username);
				$data['transjos'] = $this->job_model->get_transall_sap_sk_creater($search, $username);
			} else if ($tes == '3') {
				//$data['transjo'] = $this->job_model->get_transall_rekrut($daud);
				$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($search, $username);
			} else if ($tes == '4') {
				//$data['transjo'] = $this->job_model->get_transall_manar($data['username']);
				$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($search, $username);
			} else {
				//$data['transjo'] = $this->job_model->get_transall();
				$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($search, $username);
			}

			$data['typer'] = '1';
			$this->load->view('joborder/xlistjosapx', $data);
		} else {
			redirect('login', 'refresh');
		}
	}



	public function vxlistjox()
	{
		if ($this->session->userdata('logged_in')) {
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

			//$postparam = $this->input->post();

			//$search=$postparam['search']["value"];

			$search = $this->input->post('dataarr');
			//var_dump($search);exit();

			if ($tes == '2') {
				if ($data['regional'] == '1') {
					//$data['transjo'] 	= $this->job_model->get_transall_approval_ops($username);
					//$data['transjos'] 	= $this->job_model->get_transall_sap_sk_app_ops($username);
					$data['transjos'] 		= $this->job_model->vget_transall_sap_sk_app_ops($search, $username);
				} else {
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					$data['lalalili'] =  $q_cek_pmanar->jml;
					if (($q_cek_pmanar->jml) <= 0) {
						//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
						//$data['transjos'] = $this->job_model->get_transall_sap_sk_app($daud,$jbt);
						$data['transjos'] 		= $this->job_model->vget_transall_sap_sk_app($search, $daud, $jbt);
					} else {
						//$data['transjo'] = $this->job_model->get_transall_manar_2($data['username']);
						$data['transjos'] = $this->job_model->vget_transall_sap_sk_manar_2($search, $username);
					}
				}
			} else if (($tes == '1') || ($tes == '14')) {
				//$data['transjo'] = $this->job_model->get_transall_craeter($username);
				$data['transjos'] = $this->job_model->vget_transall_sap_sk_creater($search, $username);
			} else if ($tes == '3') {
				//$data['transjo'] = $this->job_model->get_transall_rekrut($daud);
				$data['transjos'] = $this->job_model->vget_transall_sap_sk_manar($search, $username);
			} else if ($tes == '4') {
				//$data['transjo'] = $this->job_model->get_transall_manar($data['username']);
				$data['transjos'] = $this->job_model->vget_transall_sap_sk_manar($search, $username);
			} else {
				//$data['transjo'] = $this->job_model->get_transall();
				$data['transjos'] = $this->job_model->vget_transall_sap_sk_manar($search, $username);
			}

			$data['typer'] = '2';
			$this->load->view('joborder/xlistjosapx', $data);
		} else {
			redirect('login', 'refresh');
		}
	}



	public function vappjo_xlistjox()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "List JO";

			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$typ = $session_data['type'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];

			//$postparam = $this->input->post();

			//$search=$postparam['search']["value"];

			$search = $this->input->post('dataarr');
			//var_dump($search);exit();

			if ($tes1 == '4') {
				//$data['transjo'] 		= $this->job_model->get_transappjo1();
				$data['transjos'] 		= $this->job_model->vget_transappjo_skema2($username);
			} else if ($tes1 == '2') {
				if ($session_data['mgr_enterprise'] == '1') {
					$data			 		= $this->job_model->vview_sk_sk_list_mgr_enterprise($username);
				} else {
					if ($data['regional'] == '1') {
						//$data['transjo'] 		= $this->job_model->get_transappjo_ops($username, $jbt, $daud);
						$data['transjos'] 		= $this->job_model->vget_transappjo_skema2($username);
						// $data['transjos'] 		= $this->job_model->vget_transappjo_skema_ops($username);
					} else {
						//$data['transjo'] 		= $this->job_model->get_transappjo($daud, $jbt);
						//$data['transjos'] 		= $this->job_model->get_transappjo_skema($daud, $jbt);
						$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
						if (($q_cek_pmanar->jml) <= 0) {
							$data['transjos']			= $this->job_model->vget_transappjo_skema($daud, $jbt);
						} else {
							$area = '';
							$perar = '';
							$data['transjos']			= $this->job_model->vview_sk_sk_list_mr_2x($area, $perar, $username);
						}
					}
				}
			} else if (($tes1 == '1') || ($tes1 == '14')) {
				//$data['transjo'] 		= $this->job_model->get_transappjo2($username, $jbt, $daud);
				$data['transjos'] 		= $this->job_model->vget_transappjo_skema2($username);
			} else {
				//$data['transjo'] 		= $this->job_model->get_transappjo3();
				$data['transjos'] 		= $this->job_model->vget_transappjo_skema2($username);
			}

			$data['xyxy'] = '2';
			$this->load->view('joborder/appjo_xlistjosapx', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function appjo_xlistjox()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "List JO";

			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$typ = $session_data['type'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];

			//$postparam = $this->input->post();

			//$search=$postparam['search']["value"];

			$search = $this->input->post('dataarr');
			//var_dump($search);exit();

			if ($tes1 == '4') {
				//$data['transjo'] 		= $this->job_model->get_transappjo1();
				// $data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			} else if ($tes1 == '2') {
				if ($session_data['mgr_enterprise'] == '1') {
					$data			 		= $this->job_model->view_sk_sk_list_mgr_enterprise($username);
				} else {
					if ($data['regional'] == '1') {
						//$data['transjo'] 		= $this->job_model->get_transappjo_ops($username, $jbt, $daud);
						// $data['transjos'] 		= $this->job_model->get_transappjo_skema_ops($username);
						$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
					} else {
						//$data['transjo'] 		= $this->job_model->get_transappjo($daud, $jbt);
						//$data['transjos'] 		= $this->job_model->get_transappjo_skema($daud, $jbt);
						$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
						if (($q_cek_pmanar->jml) <= 0) {
							$data['transjos']			= $this->job_model->get_transappjo_skema($daud, $jbt);
						} else {
							$area = '';
							$perar = '';
							$data['transjos']			= $this->job_model->view_sk_sk_list_mr_2x($area, $perar, $username);
						}
					}
				}
			} else if (($tes1 == '1') || ($tes1 == '14')) {
				//$data['transjo'] 		= $this->job_model->get_transappjo2($username, $jbt, $daud);
				$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			} else {
				//$data['transjo'] 		= $this->job_model->get_transappjo3();
				$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			}

			$data['xyxy'] = '1';
			$this->load->view('joborder/appjo_xlistjosapx', $data);
		} else {
			redirect('login', 'refresh');
		}
	}



	public function search_sk_sk_list()
	{
		if ($this->session->userdata('logged_in')) {
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

			if ($tes == '4') {
				$data['transjos']			= $this->job_model->view_sk_sk_list_mr($area, $perar, $username);
			} else if ($tes == '2') {
				if ($data['regional'] == '1') {
					$data['transjos']			= $this->job_model->view_sk_sk_list_ops($area, $perar, $username);
				} else {
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					if (($q_cek_pmanar->jml) <= 0) {
						$data['transjos']			= $this->job_model->view_sk_sk_list($area, $perar, $daud, $jbt);
					} else {
						$data['transjos']			= $this->job_model->view_sk_sk_list_mr_2($area, $perar, $username);
					}
				}
			} else {
				$data['transjos']			= $this->job_model->view_sk_sk_list_cr($area, $perar, $username);
			}

			$this->load->view('joborder/view_sk_sk_list', $data);
		} else {
			redirect('login', 'refresh');
		}
	}



	public function search_sk_sk_list_new()
	{
		if ($this->session->userdata('logged_in')) {
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
			$valu 		= $datax[0];
			$daud		= $session_data['layanan'];
			$jbt		= $session_data['jabatan'];
			$tes		= $session_data['level'];
			$username	= $session_data['username'];

			if ($tes == '4') {
				$data['transjos']			= $this->job_model->view_sk_sk_list_mr($valu, $username);
			} else if ($tes == '2') {
				if ($data['regional'] == '1') {
					$data['transjos']			= $this->job_model->view_sk_sk_list_ops($valu, $username);
				} else {
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					if (($q_cek_pmanar->jml) <= 0) {
						$data['transjos']			= $this->job_model->view_sk_sk_list($valu, $daud, $jbt);
					} else {
						$data['transjos']			= $this->job_model->view_sk_sk_list_mr_2($valu, $username);
					}
				}
			} else {
				$data['transjos']			= $this->job_model->view_sk_sk_list_cr($valu, $username);
			}

			$this->load->view('joborder/view_sk_sk_list', $data);
		} else {
			redirect('login', 'refresh');
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

	// public function joborder()
	// {
	// 	if ($this->session->userdata('logged_in')){
	// 		$session_data 			= $this->session->userdata('logged_in');
	// 		$data['nama'] 			= $session_data['nama'];
	// 		$data['level'] 			= $session_data['level'];
	// 		$data['regional'] 		= $session_data['regional'];
	// 		$data['title'] 			= "Job Order";

	// 		$nojo = "";
	// 		$cons = '/ISH/01010107/';
	// 		$year = date('Y');

	// 		$nojob = $this->job_model->get_insertjo();
	// 		if ($nojob == 0){
	// 			$new = '000001';
	// 			$nojo = $new . $cons . $year;			
	// 		} else {
	// 			$nor = $nojob;
	// 			$next = intval($nor) + 1;
	// 			$xnext = $this->hitung($next);
	// 			$nojo = $xnext . $cons . $year;
	// 		}		
	// 		$data['nojo'] = $nojo;




	// 		$nojosk = "";
	// 		$consk = '/SKEMA-ISH/01010107/';
	// 		$year = date('Y');

	// 		$nojobsk = $this->job_model->get_insertjosk();
	// 		if ($nojobsk == 0){
	// 			$newsk = '000001';
	// 			$nojosk = $newsk . $consk . $year;			
	// 		} else {
	// 			$norsk    = $nojobsk;
	// 			$nextsk   = intval($norsk) + 1;
	// 			$xnextsk  = $this->hitung($nextsk);
	// 			$nojosk   = $xnextsk . $consk . $year;
	// 		}		
	// 		$data['nojosk'] = $nojosk;

	// 		/*
	// 		$jabatanrray = $this->job_model->get_jabatan();
	// 			$selectjabatan = "";
	// 			foreach($jabatanrray as $key => $list){
	// 				$selectjabatan .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
	// 			}
	// 		$data['cmbjabatan']		= $selectjabatan;	
	// 		*/			

	// 		$tggrray = $this->job_model->get_tgg();
	// 			$select = "";
	// 			foreach($tggrray as $key => $list){
	// 				$select .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
	// 			}
	// 		$data['cmbtgg']		= $select;

	// 		$lokrray = $this->job_model->get_lokasi();
	// 			$select = "";
	// 			foreach($lokrray as $key => $list){
	// 				$select .= "<option value=". $list['id'] .">". $list['kota'] . "  " . $list['area'] ."</option>";
	// 			}
	// 		$data['cmblokasi']		= $select;

	// 		$dikrray = $this->job_model->get_pendidikan();
	// 			$select = "";
	// 			foreach($dikrray as $key => $list){
	// 				$select .= "<option value=". $list['id'] .">". $list['pendidikan'] . "</option>";
	// 			}
	// 		$data['cmbpendidikan']		= $select;

	// 		$konrray = $this->job_model->get_kontrak();
	// 			$select = "";
	// 			foreach($konrray as $key => $list){
	// 				$select .= "<option value=". $list['jenis'] .">". $list['jenis'] . "</option>";
	// 			}
	// 		$data['cmbkontrak']		= $select;

	// 		$tes = $session_data['level'];


	// 		$prorray = $this->job_model->get_province();
	// 			$select = "";
	// 			foreach($prorray as $key => $list){
	// 				$select .= "<option value=". $list['id'] .">". $list['name_province'] . "</option>";
	// 			}
	// 		$data['cmbprovince']		= $select;

	// 		$katerray = $this->job_model->get_kategori();
	// 			$select = "";
	// 			foreach($katerray as $key => $list){
	// 				$select .= "<option value=". $list['id'] .">". $list['name_job_function_category'] . "</option>";
	// 			}
	// 		$data['cmbkategori']		= $select;

	// 		$jprorray = $this->job_model->get_jpro();
	// 			$select = "";
	// 			foreach($jprorray as $key => $list){
	// 				$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
	// 			}
	// 		$data['cmbjpro']		= $select;


	// 		$tprorray = $this->job_model->get_tpro();
	// 			$select = "";
	// 			foreach($tprorray as $key => $list){
	// 				$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
	// 			}
	// 		$data['cmbtpro']		= $select;


	// 		$xjprorray = $this->skema_model->get_area_kontrak();
	// 			$select = "";
	// 			foreach($xjprorray as $key => $list){
	// 				$select .= "<option value=". $list['area'] .">". $list['personnal_subarea'] . "</option>";
	// 			}
	// 		$data['cmbare']		= $select;

	// 		$vjprorray = $this->skema_model->get_pa_kontrak();
	// 			$select = "";
	// 			foreach($vjprorray as $key => $list){
	// 				$select .= "<option value=". $list['personalarea'] .">". $list['personnal_area'] . "</option>";
	// 			}
	// 		$data['cmbpera']		= $select;

	// 		$this->load->view('pages/header',$data);
	// 		$this->load->view('joborder/addjoborder',$data);
	// 		$this->load->view('pages/footer');
	// 	} else {
	// 		redirect ('login','refresh');
	// 	}
	// }

	public function joborder()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['jenis'] 			= $session_data['jenis'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";

			$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
			$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));

			$nojo = "";
			$cons = '/ISH/01010107/';
			$year = date('Y');

			$nojob = $this->job_model->get_insertjo();
			if ($nojob == 0) {
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
			if ($nojobsk == 0) {
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
			foreach ($tggrray as $key => $list) {
				$select .= "<option value='" . $list['jabatan'] . "'>" . $list['jabatan'] . "</option>";
			}
			$data['cmbtgg']		= $select;

			$lokrray = $this->job_model->get_lokasi();
			$select = "";
			foreach ($lokrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['kota'] . "  " . $list['area'] . "</option>";
			}
			$data['cmblokasi']		= $select;

			$dikrray = $this->job_model->get_pendidikan();
			$select = "";
			foreach ($dikrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['pendidikan'] . "</option>";
			}
			$data['cmbpendidikan']		= $select;

			$konrray = $this->job_model->get_kontrak();
			$select = "";
			foreach ($konrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['jenis'] . "</option>";
			}
			$data['cmbkontrak']		= $select;

			$tes = $session_data['level'];


			$prorray = $this->job_model->get_province();
			$select = "";
			foreach ($prorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_province'] . "</option>";
			}
			$data['cmbprovince']		= $select;

			$katerray = $this->job_model->get_kategori();
			$select = "";
			foreach ($katerray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_job_function_category'] . "</option>";
			}
			$data['cmbkategori']		= $select;

			$jprorray = $this->job_model->get_jpro();
			$select = "";
			foreach ($jprorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
			}
			$data['cmbjpro']		= $select;


			$jcaparray = $this->job_model->get_jenis_project();
			$select = "";
			foreach ($jcaparray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
			}
			$data['cmbjcapt']		= $select;


			$tprorray = $this->job_model->get_tpro();
			$select = "";
			foreach ($tprorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
			}
			$data['cmbtpro']		= $select;


			$nprorray = $this->job_model->get_itemp();
			$select = "";
			foreach ($nprorray as $key => $list) {
				$select .= "<option value=" . $list['item_id'] . ">" . $list['item_name'] . "</option>";
			}
			$data['cmbitem']		= $select;


			$xjprorray = $this->skema_model->get_area_kontrak();
			$select = "";
			foreach ($xjprorray as $key => $list) {
				$select .= "<option value=" . $list['area'] . ">" . $list['personnal_subarea'] . "</option>";
			}
			$data['cmbare']		= $select;

			$vjprorray = $this->skema_model->get_pa_kontrak();
			$select = "";
			foreach ($vjprorray as $key => $list) {
				$select .= "<option value=" . $list['personalarea'] . ">" . $list['personnal_area'] . "</option>";
			}
			$data['cmbpera']		= $select;


			$ctjprorray = $this->skema_model->get_customer();
			$select = "";
			foreach ($ctjprorray as $key => $list) {
				$select .= "<option value=" . $list['id_customer'] . ">" . $list['nama_customer'] . "</option>";
			}
			$data['cmbcust']		= $select;

			//var_dump($data['cmbpera']);exit();

			$this->load->database('default', TRUE);

			$vkomp = $this->master_model->get_komponen();
			$select = "";
			foreach ($vkomp as $key => $list) {
				$select .= "<option value=" . $list['kode'] . ">" . $list['komponen'] . "</option>";
			}
			$data['cmbkomp']		= $select;
			//var_dump($data['cmbkomp']);exit();


			$zkomp = $this->master_model->get_lskema();
			$select = "";
			foreach ($zkomp as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['level'] . "</option>";
			}
			$data['cmblskema']		= $select;


			$data['rdoc']		= $this->job_model->get_docp();


			$skkomp = $this->skema_model->search_skill();
			$selects = "";
			foreach ($skkomp as $key => $list) {
				$selects .= "<option value=" . $list['persk'] . ">" . $list['pektx'] . "</option>";
			}
			$data['cmb_skill']		= $selects;
			$this->load->database('default', TRUE);

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$data['cmbpersax'] = json_decode($this->curl->execute());
			usort($data['cmbpersax'], array($this, "sort_persa"));

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_area');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$larea = json_decode($this->curl->execute());
			//$data['token'] =sha1("#ISH!@#");
			$data['cmb_area'] = $larea;

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$lpersa = json_decode($this->curl->execute());
			$data['cmb_persa'] = $lpersa;

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_jabatan');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$ljab = json_decode($this->curl->execute());
			$data['cmb_jabatan'] = $ljab;

			/* sementara krn SAP mati -------
			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_skill');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');			
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$lskill =json_decode($this->curl->execute());
			$data['cmb_skill'] = $lskill;
			*/

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_level');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$llevel = json_decode($this->curl->execute());
			$data['cmb_level'] = $llevel;
			//var_dump($data['cmb_level']);exit();

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_skema');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$lskema = json_decode($this->curl->execute());
			$data['cmb_skema'] = $lskema;
			//var_dump($data['cmb_skema']);exit();

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/addjoborder', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	function detailjo()
	{
		if ($this->session->userdata('logged_in')) {
			$onjo = $this->input->post('anojo');
			$data	= $this->job_model->detailjo($onjo);


			//print_r ($_POST);
			//$this->output->enable_profiler(TRUE);
			echo json_encode($data);
		}
	}

	function kokok()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$rrr = $this->db->query("select doc_id From trans_doc where nojo='$njo' ")->row();

			if (($rrr != '') || !empty($rrr)) {
				$data['nana'] = $rrr->doc_id;
			} else {
				$data['nana'] = '0;0';
			}

			$data['rdoc']		= $this->job_model->get_docp();

			$tes = $session_data['level'];


			$this->load->view('joborder/rdoc', $data);
		}
	}

	function detail_emplo()
	{
		if ($this->session->userdata('logged_in')) {
			$ajk = $this->input->post('data');
			$aid = $ajk[0];
			$bid = $ajk[1];
			$typex = $ajk[2];


			if ($typex == 'hr') {
				$data['pros_hr']	= $this->job_model->detail_emplo($aid, $bid);
				$data['data_ada']	= $this->job_model->detail_isian_emplo($aid, $bid);

				$this->load->view('joborder/detail_emplo', $data);
			} else if ($typex == 'training') {
				$data['pros_train']	= $this->job_model->detail_emplo_train($aid, $bid);

				$this->load->view('joborder/detail_emplo_training', $data);
			} else if ($typex == 'user') {
				$data['pros_user']	= $this->job_model->detail_emplo($aid, $bid);
				$data['data_adax']	= $this->job_model->detail_isian_emplo_user($aid, $bid);

				$this->load->view('joborder/detail_emplo_user', $data);
			}

			//echo json_encode($data);
		}
	}



	function detail_file()
	{
		if ($this->session->userdata('logged_in')) {
			$ajk 	= $this->input->post('data');
			$kid 	= $ajk[0];
			$tglx 	= $ajk[1];
			$aid 	= $ajk[2];
			$noj 	= $ajk[3];

			$abc = $this->db->query("SELECT doc_id from trans_doc WHERE nojo='$noj' ")->row();
			if ((empty($abc->doc_id)) || ($abc->doc_id == '')) {
				$def = '';
			} else {
				$def = $abc->doc_id;
			}

			$data['pros_file']	= $this->job_model->detail_file($kid, $tglx, $aid, $def);
			$this->load->view('joborder/detail_file', $data);
			//echo json_encode($data);
		}
	}



	function detail_file_b()
	{
		if ($this->session->userdata('logged_in')) {
			$ajk 	= $this->input->post('data');
			$kid 	= $ajk[0];
			$noj 	= $ajk[1];

			$abc = $this->db->query("SELECT doc_id from trans_doc WHERE nojo='$noj' ")->row();
			if ((empty($abc->doc_id)) || ($abc->doc_id == '')) {
				$def = '';
			} else {
				$def = $abc->doc_id;
			}

			//var_dump($noj);exit();
			$data['pros_file_b']	= $this->job_model->detail_file_b($kid, $noj, $def);
			$this->load->view('joborder/detail_file_b', $data);
		}
	}



	function cek_ump()
	{
		if ($this->session->userdata('logged_in')) {
			$alokz  = $this->input->post('alok');
			$akerjaz  	= $this->input->post('akerja');
			$atgaji  	= $this->input->post('atgaji');

			$bk = explode('-', $akerjaz);

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_ump');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			// $post = array('token' => sha1("#ISH!@#"), 'search' => $alokz, 'tahun' => $bk[0]);
			$post = array('token' => sha1("#ISH!@#"), 'search' => $alokz, 'tahun' => $atgaji);
			$this->curl->post($post);
			$xdatax   = json_decode($this->curl->execute());

			if ($xdatax) {
				foreach ($xdatax as $key => $list) {
					$abc = ($list->ZAMOUNT) * 100;
				}
			} else {
				$abc = 0;
			}

			//var_dump($data);exit();

			echo $abc;
		}
	}

	function cek_ump_local(){
		if ($this->session->userdata('logged_in')) {

			$abc = 0;
			$alokz  = $this->input->post('alok');
			$akerjaz  	= $this->input->post('akerja');
			$atgaji  	= $this->input->post('atgaji');

			$xdatax = $this->ump_model->get_data($akerjaz, $atgaji, $alokz);
			if ($xdatax) {
				if(isset($xdatax)){
					foreach($xdatax as $d){
						//$abc = ($d['amount']) * 100;
						$abc = $d['amount'];
					}
				}
			}

			echo $abc;
		}
	}


	function cek_mandat()
	{
		if ($this->session->userdata('logged_in')) {
			$kontz  = $this->input->post('kont');
			$jpkwt  = $this->input->post('jpkwt');
			if ($kontz == 6) {
				$kontzx = 1;
			} else {
				$kontzx = $kontz;
			}

			if ($jpkwt == '2' || $jpkwt == '4') {
				$def = $this->db->query("SELECT GROUP_CONCAT(DISTINCT(kode)) AS mandat FROM komponen WHERE (mandatory='1' AND status_kontrak='$kontzx') OR kode='4078' ")->row();
			} else {
				$def = $this->db->query("SELECT GROUP_CONCAT(DISTINCT(kode)) AS mandat FROM komponen WHERE mandatory='1' AND status_kontrak='$kontzx' ")->row();
			}
			// $def = $this->db->query("SELECT GROUP_CONCAT(DISTINCT(kode)) AS mandat FROM komponen WHERE mandatory='1' AND status_kontrak='$kontzx' ")->row();

			echo $def->mandat;
		}
	}


	function cek_nm_mandat()
	{
		if ($this->session->userdata('logged_in')) {
			$kontz  = $this->input->post('kont');
			$jpkwt  = $this->input->post('jpkwt');
			if ($kontz == 6) {
				$kontzx = 1;
			} else {
				$kontzx = $kontz;
			}

			if ($jpkwt == '2' || $jpkwt == '4') {
				$def = $this->db->query("SELECT GROUP_CONCAT(DISTINCT(nama)) AS mandat FROM komponen WHERE (mandatory='1' AND status_kontrak='$kontzx') OR kode='4078' ")->row();
			} else {
				$def = $this->db->query("SELECT GROUP_CONCAT(DISTINCT(nama)) AS mandat FROM komponen WHERE mandatory='1' AND status_kontrak='$kontzx' ")->row();
			}
			// $def = $this->db->query("SELECT GROUP_CONCAT(nama) AS mandat FROM komponen WHERE mandatory='1' AND status_kontrak='$kontzx' ")->row();

			echo $def->mandat;
		}
	}


	function cek_fixed()
	{
		if ($this->session->userdata('logged_in')) {
			$kontz  = $this->input->post('kont');
			if ($kontz == 6) {
				$kontzx = 1;
			} else {
				$kontzx = $kontz;
			}

			$def = $this->db->query("SELECT GROUP_CONCAT(kode) AS fixed FROM komponen WHERE jenis='4' AND status_kontrak='$kontzx' ")->row();

			echo $def->fixed;
		}
	}


	function detkom()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$njo 		= $this->input->post('larrx');
			$noj 		= $njo[0];
			$jab 		= $njo[1];
			$lok 		= $njo[2];
			$llv 		= $njo[3];
			$lsl 		= $njo[4];
			$dkp 		= $njo[5];

			$data['vkomp']		= $this->job_model->detkom($noj, $jab, $lok, $llv, $lsl, $dkp);

			$this->load->view('joborder/rincian_detkom', $data);
		}
	}


	function detail_komp()
	{
		if ($this->session->userdata('logged_in')) {
			$anojo 		= $this->input->post('anojo');
			$alokasi 	= $this->input->post('alokasi');
			$ajabatan 	= $this->input->post('ajabatan');
			$alevel 	= $this->input->post('alvl');
			$askill 	= $this->input->post('askill');
			$adekomp 	= $this->input->post('adekomp');
			//var_dump($anojo);var_dump($alokasi);var_dump($ajabatan);exit();

			$data['vkomp']	= $this->job_model->detail_komp($anojo, $alokasi, $ajabatan, $alevel, $askill, $adekomp);

			$this->load->view('joborder/v_komp', $data);
		}
	}


	function trajox()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$njo 		= $this->input->post('data');
			// var_dump($njo);die;
			if ($tes == '4') {
				$data['rincian']		= $this->job_model->trajo_2($username, $njo);
			} else {
				$data['rincian']		= $this->job_model->trajo($username, $njo);
			}

			$data['lvl'] 		= $session_data['level'];

			$this->load->view('joborder/rincianx', $data);
		}
	}


	function trajo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$njo 		= $this->input->post('data');
			// var_dump($njo);die;
			if ($tes == '4') {
				$data['rincian']		= $this->job_model->trajo_2($username, $njo);
			} else {
				$data['rincian']		= $this->job_model->trajo($username, $njo);
			}

			$data['lvl'] 		= $session_data['level'];

			$this->load->view('joborder/rincian', $data);
		}
	}


	function trajo_id()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$nid 		= $this->input->post('data');
			$nad 		= $nid[0];
			$nod 		= $nid[1];

			$data['lvl'] 		= $session_data['level'];

			$data['nid'] = $nod;

			if ($tes == '4') {
				$this->job_model->update_view($nad, 1);
				$data['rincian']		= $this->job_model->trajo_2_id($username, $nad);
			} else {
				$data['rincian']		= $this->job_model->trajo_id($username, $nad);
			}

			if ($nod == 'lv3') {
				$this->load->view('joborder/rincian', $data);
			} else {
				$this->load->view('joborder/rincianr', $data);
			}
		}
	}


	function trajo_idx()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$nid 		= $this->input->post('data');
			$nad 		= $nid[0];
			$nod 		= $nid[1];

			$data['lvl'] 		= $session_data['level'];

			$data['nid'] = $nod;

			if ($tes == '4') {
				$this->job_model->update_view($nad, 1);
				$data['rincian']		= $this->job_model->trajo_2_id($username, $nad);
			} else {
				$data['rincian']		= $this->job_model->trajo_id($username, $nad);
			}

			if ($nod == 'lv3') {
				$this->load->view('joborder/rincianx', $data);
			} else {
				$this->load->view('joborder/rincianrx', $data);
			}
		}
	}


	function det_perx()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$layanan 	= $session_data['layanan'];
			$jabatan 	= $session_data['jabatan'];
			$tes 		= $session_data['level'];
			$njo 		= $this->input->post('data');

			//var_dump($njo);exit();
			if ($tes == '4') {
				$data['rincian']		= $this->job_model->det_per_2($username, $njo);
			} else {
				$data['rincian']		= $this->job_model->det_per($username, $njo, $layanan, $jabatan);
			}


			$this->load->view('joborder/rincian_pernerx', $data);
		}
	}


	function det_per()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$layanan 	= $session_data['layanan'];
			$jabatan 	= $session_data['jabatan'];
			$tes 		= $session_data['level'];
			$njo 		= $this->input->post('data');

			//var_dump($njo);exit();
			if ($tes == '4') {
				$data['rincian']		= $this->job_model->det_per_2($username, $njo);
			} else {
				$data['rincian']		= $this->job_model->det_per($username, $njo, $layanan, $jabatan);
			}


			$this->load->view('joborder/rincian_perner', $data);
		}
	}


	function det_per_id()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$nid 		= $this->input->post('data');
			if ($tes == '4') {
				$this->job_model->update_view($nid, 2);
				$data['rincian']		= $this->job_model->det_per_2_id($username, $nid);
			} else {
				$data['rincian']		= $this->job_model->det_per_id($username, $nid);
			}


			$this->load->view('joborder/rincian_perner', $data);
		}
	}


	function det_gorinc()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$nid 		= $this->input->post('data');
			$jns 		= $this->input->post('jns');
			if ($jns == 1) {
				$data['rincian']		= $this->job_model->det_gorinc($nid);
				$this->load->view('joborder/rincian_go', $data);
			} else {
				$data['rincian']		= $this->job_model->det_gorincrep($nid);
				$this->load->view('joborder/rincian_gorep', $data);
			}
		}
	}


	function det_gojobs()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$nid 		= $this->input->post('data');
			$data['rincian']		= $this->job_model->det_gojobs($nid);

			$this->load->view('joborder/rincian_gojobs', $data);
		}
	}


	function detrfc()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$nid 		= $this->input->post('data');
			$xtypex		= $this->input->post('xtypex');
			$data['status'] = $xtypex;
			if ($xtypex == 1) {
				$data['rincian'] = $this->job_model->detrfc_new($nid);
			} else {
				$data['rincian'] = $this->job_model->detrfc_rep($nid);
			}

			$this->load->view('joborder/detrfc', $data);
		}
	}


	function detrfc_res()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$nid 		= $this->input->post('data');
			$xtypex		= $this->input->post('xtypex');
			$data['status'] = $xtypex;
			$data['rincian'] = $this->job_model->detrfc_res($nid);

			$this->load->view('joborder/detrfc_res', $data);
		}
	}


	function xtrajo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$data['rincianx']		= $this->job_model->xtrajo($njo);

			$tes = $session_data['level'];

			$this->load->view('joborder/xrincian', $data);
		}
	}



	function xtrajox()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			//var_dump($njo);
			//exit();

			$data['xrincianx']		= $this->job_model->xtrajo($njo);

			$tes = $session_data['level'];

			$this->load->view('joborder/xrincianx', $data);
		}
	}



	function ztrajo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$data['zrincian']		= $this->job_model->ztrajo($njo);

			$data['nana'] = $this->db->query("select doc_id From trans_doc where nojo='$njo' ")->row();

			$tes = $session_data['level'];


			$this->load->view('joborder/zrincian', $data);
		}
	}


	function zproc()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$data['zproc']		= $this->job_model->zproc($njo);

			$data['nana'] = $this->db->query("select doc_id From trans_doc where nojo='$njo' ")->row();

			$tes = $session_data['level'];


			$this->load->view('joborder/zproc', $data);
		}
	}



	function rejectjo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['username'] 		= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$keter = $njo[1];
			$tjo   = $njo[2];
			$trep  = $njo[3];
			$tjen  = $njo[4];
			$this->job_model->rejectjo($njok, $keter, $data['username']);
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

			$message = $this->load->view('addjo/email_rej.php', $data, TRUE);

			$hasilkirim = $this->emailsent_rej($test, 'Notifikasi Reject JO - Penyesuaian Skema', $message);
			//commentby kaha 04/04/23
			// $hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Reject JO - Penyesuaian Skema', $message);

			echo $hasilkirim;

			redirect('home/appjo', 'refresh');
		}
	}


	function m_rejectjo()
	{
		if ($this->session->userdata('logged_in')) {
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

			$message = $this->load->view('addjo/email_rej.php', $data, TRUE);

			$hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Reject JO', $message);

			echo $hasilkirim;

			redirect('home/appjo', 'refresh');
		}
	}


	function m_rejectjo_rr()
	{
		if ($this->session->userdata('logged_in')) {
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

			$aws = $this->db->query("SELECT id FROM trans_rincian Where nojo='$njok' ")->num_rows();

			if ($aws <= 0) {
				$this->job_model->m_rejectjo_rr($nid, $keter);
			} else {
				$this->job_model->m_rejectjo_rr2($nid, $keter);
			}



			$check = $this->job_model->get_email_penerima($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['ktr']   = $keter;

			$message = $this->load->view('addjo/email_rej.php', $data, TRUE);

			$hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Reject JO', $message);

			echo $hasilkirim;

			redirect('home/appjo', 'refresh');
		}
	}



	function m_simpantjo_rasap()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['username'] 		= $session_data['username'];
			$data['nama'] 		= $session_data['nama'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$nid   = $njo[1];
			$keter = $njo[2];
			$tjok  = $njo[3];
			$namz  = $njo[4];
			$ruspm = $njo[5];
			$pilpks = $njo[6];
			$dokpks = $njo[7];
			//var_dump($njok);var_dump($nid);var_dump($keter);var_dump($tjok);var_dump($namz);exit();
			$aws = $this->db->query("SELECT id FROM trans_rincian Where nojo='$njok' ")->num_rows();

			$noob = $this->db->query("Select tanggal, lup_edit, pks From trans_jo Where nojo='$njok' ")->row();
			if ($noob->lup_edit != '' && $noob->lup_edit != null) {
				$gook = $noob->lup_edit;
			} else {
				$gook = $noob->tanggal;
			}

			if ($aws <= 0) {
				$this->job_model->m_inssimpantjo_rasap($nid, $keter, $ruspm, $gook, $pilpks);
				$this->job_model->update_rpks($njok, $pilpks, $dokpks);

				if ($noob->pks > 0) {
					$this->job_model->save_transpks($njok, $nid, 2, $data['username'], $ruspm);
				}

				$awsk = $this->db->query("SELECT area, userpm FROM trans_perner Where id='$nid' ")->row();
				$bwk  = $this->db->query("SELECT a.*,b.email, c.layanan FROM mapping_city a LEFT JOIN m_login b ON a.manar=b.username LEFT JOIN province c ON a.province_id = c.id WHERE city_id='" . $awsk->area . "' ")->row();

				// $awskr = $this->db->query("SELECT a.layanan FROM province a LEFT JOIN mapping_city b ON a.id=b.province_id LEFT JOIN trans_rincian c ON b.city_id=c.lokasi WHERE c.id='$nid' ")->row();
				$awskr = $this->db->query("SELECT a.layanan FROM province a LEFT JOIN mapping_city b ON a.id=b.province_id LEFT JOIN trans_perner c ON b.city_id=c.area WHERE c.id='$nid' ")->row();
				$awskg = $this->db->query("SELECT * FROM m_login WHERE layanan='" . $awskr->layanan . "' AND LEVEL='3' ")->result_array();
				foreach ($awskg as $val) {
					$test = $val['email'];

					$checkox = $this->job_model->get_detail_creater($njok);
					$data['type']  	  = $checkox->namad;
					$data['nama']  	  = $checkox->nama;
					$data['nojoz'] 	  = $njok;

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new_rekrut.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Done JO Replacement', $message);
				}
			} else {
				$this->job_model->m_inssimpantjo_rasap2($nid, $keter, $ruspm, $gook, $pilpks);
				$this->job_model->update_rpks($njok, $pilpks, $dokpks);

				if ($noob->pks > 0) {
					$this->job_model->save_transpks($njok, $nid, 2, $data['username'], $ruspm);
				}

				$awsk = $this->db->query("SELECT lokasi, userpm FROM trans_rincian Where id='$nid' ")->row();
				$bwk  = $this->db->query("SELECT a.*,b.email, c.layanan FROM mapping_city a LEFT JOIN m_login b ON a.manar=b.username LEFT JOIN province c ON a.province_id = c.id WHERE city_id='" . $awsk->lokasi . "' ")->row();

				$awskr = $this->db->query("SELECT a.layanan FROM province a LEFT JOIN mapping_city b ON a.id=b.province_id LEFT JOIN trans_rincian c ON b.city_id=c.lokasi WHERE c.id='$nid' ")->row();
				$awskg = $this->db->query("SELECT * FROM m_login WHERE layanan='" . $awskr->layanan . "' AND LEVEL='3' ")->result_array();
				foreach ($awskg as $val) {
					$test = $val['email'];

					$checkox = $this->job_model->get_detail_creater($njok);
					$data['type']  	  = $checkox->namad;
					$data['nama']  	  = $checkox->nama;
					$data['nojoz'] 	  = $njok;

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new_rekrut.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Done JO Replacement', $message);
				}
			}

			$cek_detil = $this->db->query("SELECT a.nama FROM m_login a left join trans_perner b ON a.username=b.upd WHERE b.id = '$nid'")->row();

			/*
			$cek_detil = $this->db->query("SELECT a.nama FROM m_login a left join trans_perner b ON a.username=b.upd WHERE b.id = '$nid'")->row();
			$check = $this->job_model->get_email_sap();
			foreach ($check as $val) {
				$test = $val['email'];
			
				$data['nojoz']    = $njok;
				$data['nama']     = $cek_detil->nama;
				$data['type']     = $tjok;
				$data['eeee'] 	  = 1;
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$message = $this->load->view('addjo/email_new_sap.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO',$message);
				
				echo $hasilkirim;
			}
			*/



			$check = $this->job_model->get_email_penerima($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['keter'] = $keter;
			$data['nama']  = $session_data['nama'];
			$data['abcd'] = 2;
			$messagey = $this->load->view('addjo/email_done.php', $data, TRUE);
			$hasilkirimy = $this->emailsent_sap($test, $bwk->email, 'Notifikasi Done JO Replacement', $messagey);

			//notifikasi untuk PM
			$email_ppc = $this->job_model->email_ppc_aja();
			$email_pm  = $this->db->query("SELECT email FROM m_login Where username='" . $awsk->userpm . "' ")->row();
			$messagex  = $this->load->view('addjo/email_done_kepm.php', $data, TRUE);
			$hasilkirimx = $this->emailsent_sap($email_pm->email, $email_ppc->email, 'Notifikasi Done JO Replacement', $messagex);


			//notifikasi untuk Legal
			$cekdet			= $this->db->query("SELECT * From trans_jo Where nojo='$njok' ")->row();
			
			if ($pilpks == 'Y') {

				// $this->job_model->save_transpks($njok, $nid, 2, $data['username'], $ruspm);

				$cekada_nobak	= $this->db->query("SELECT * From trans_pks_new Where nobak='" . $cekdet->no_bak . "' ")->num_rows();

				if ($cekada_nobak <= 0) {
					$data['detdata'] = $cekdet;
					$data['ndok']    = $this->db->query("SELECT * From m_docpks Where id='" . $dokpks . "' ")->row();
					$cek_div	     = $this->db->query("SELECT * From trans_jo Where no_bak='" . $cekdet->no_bak . "' and type_jo='1' order by nojo desc limit 1 ")->row();
					$data['ndiv']    = $this->db->query("SELECT * From m_divisi Where id='" . $cek_div->divisi_id . "' ")->row();
					$messagez  = $this->load->view('addjo/email_legal.php', $data, TRUE);
					$hasilkirimz = $this->emailsent('legal@ish.co.id', 'khusnul.hisyam@ish.co.id', 'Notifikasi Permintaan PKS', $messagez);
				}
			}

			// echo $hasilkirimz;
		}
	}



	function m_rejectjo_rrsap()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   	  = $this->input->post('arrappjo');
			$njok  	  = $njo[0];
			$nid   	  = $njo[1];
			$keter 	  = $njo[2];
			$tjok  	  = $njo[3];
			$namz  	  = $njo[4];
			$pilpks   = $njo[5];
			$flagstat = $njo[6];
			$this->job_model->m_rejectjo_rrsap($njok, $keter, $pilpks, $flagstat);
			$this->job_model->m_rejectjo_rrsap2($nid, $keter, $pilpks, $flagstat);


			/*
			$check = $this->job_model->get_email_penerima($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['ktr']   = $keter;
		
			$message = $this->load->view('addjo/email_rej.php',$data,TRUE); 

			$hasilkirim = $this->emailsent_rej($test,'khusnul.hisyam@ish.co.id','Notifikasi Reject JO',$message);
			
			echo $hasilkirim;
			
			redirect('home/appjo', 'refresh');
			*/

			if ($flagstat == 1) {
				$subject = 'Notifikasi Reject JO Replacement';
			} else {
				$subject = 'Notifikasi Return JO Replacement';
			}

			$check = $this->job_model->get_email_penerima($njok);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njok;
			$data['ktr']   = $keter;

			$message = $this->load->view('addjo/email_rej.php', $data, TRUE);

			$hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', $subject, $message);
			echo $hasilkirim;

			redirect('home/listorder', 'refresh');
		}
	}


	function rejectjo1()
	{
		if ($this->session->userdata('logged_in')) {
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


	function m_simpantjo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$nid   = $njo[1];
			$keter = $njo[2];
			$tjok  = $njo[3];
			$namz  = $njo[4];
			$this->job_model->m_inssimpantjo($nid, $keter);

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

				$message = $this->load->view('addjo/email_new_sap.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

				echo $hasilkirim;
			}
		}
	}



	function m_simpantjo_ra()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$nid   = $njo[1];
			$keter = $njo[2];
			$tjok  = $njo[3];
			$namz  = $njo[4];
			$xlper = $njo[5];
			//var_dump($njok);var_dump($nid);var_dump($keter);var_dump($tjok);var_dump($namz);exit();
			$aws = $this->db->query("SELECT id FROM trans_rincian Where nojo='$njok' ")->num_rows();

			if ($aws <= 0) {
				$this->job_model->m_inssimpantjo_ra($nid, $keter);
			} else {
				$this->job_model->m_inssimpantjo_ra2($nid, $keter);
			}



			$cek_detil = $this->db->query("SELECT a.nama FROM m_login a left join trans_perner b ON a.username=b.upd WHERE b.id = '$nid'")->row();

			$check = $this->job_model->get_email_sap();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];

				$data['nojoz']    = $njok;
				$data['nama']     = $cek_detil->nama;
				$data['type']     = $tjok;
				$data['eeee'] 	  = 1;

				$data['skrg'] = date("d-m-Y H:i:s");

				$message = $this->load->view('addjo/email_new_sap.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

				echo $hasilkirim;
			}
		}
	}


	function simpanrincian_skip()
	{
		if ($this->session->userdata('logged_in')) {
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

	function simpantjo1()
	{
		if ($this->session->userdata('logged_in')) {
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
			$this->job_model->inssimpantjo1($njok, $keter);

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


	function simpan_skemainf()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username']		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			$njob = $this->input->post('data');
			$njo 				= $njob[0];
			$vid 				= $njob[1];

			$jenisarea 			= $njob[2];
			$det_area	 		= $njob[3];
			$jenispersa			= $njob[4];
			$det_persa		 	= $njob[5];
			$jenisskill 		= $njob[6];
			$n_jenisskill	 	= $njob[7];
			$jenisjabatan 		= $njob[8];
			$jenislevel 		= $njob[9];
			$n_jenislevel	 	= $njob[10];
			$jenisproject	 	= $njob[11];
			$n_jenisproject	 	= $njob[12];
			//$begda			 	= $njob[13];
			$zskema			 	= $njob[13];
			$scancel		 	= $njob[14];
			$jpay			 	= $njob[15];
			$njab			 	= $njob[16];
			$uspm			 	= $njob[17];
			$jkontrak		 	= $njob[18];
			$trfgb			 	= $njob[19];
			$alasanrot		 	= $njob[20];
			$udiv			 	= $njob[21];

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_job');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"), 'search' => $njab);
			$this->curl->post($post);
			$ibab = json_decode($this->curl->execute());
			$ubab = $ibab->OBJID;

			if ($det_persa == '') {
				$mymy = $jenispersa;
			} else {
				$mymy = $det_persa;
			}

			$tglinp = date("Y-m-d H:i:s");
			// $this->job_model->xinssimpanskemax_inf($vid, $data['username'], $tglinp);

			$noob = $this->db->query("Select tanggal, lup_edit From trans_jo Where nojo='$njo' ")->row();
			if ($noob->lup_edit != '' && $noob->lup_edit != null) {
				$gook = $noob->lup_edit;
			} else {
				$gook = $noob->tanggal;
			}
			$this->job_model->xinssimpanskemax_inf($vid, $scancel, $jenispersa, $det_area, $jenisskill, $jenisjabatan, $jenislevel, $jenisproject, $zskema, $jpay, $ubab, $data['username'], $tglinp, $njab, $uspm, $gook, $jkontrak, $trfgb, $alasanrot, $udiv);

			$this->job_model->update_divjo($vid, $udiv);

			$awskr = $this->db->query("SELECT a.layanan FROM province a LEFT JOIN mapping_city b ON a.id=b.province_id LEFT JOIN trans_rincian c ON b.city_id=c.lokasi WHERE c.id='$vid' ")->row();
			$awskg = $this->db->query("SELECT * FROM m_login WHERE layanan='" . $awskr->layanan . "' AND LEVEL='3' ")->result_array();
			foreach ($awskg as $val) {
				$test = $val['email'];

				$checkox = $this->job_model->get_detail_creater($njo);
				$data['type']  	  = $checkox->namad;
				$data['nama']  	  = $checkox->nama;
				$data['nojoz'] 	  = $njo;

				$data['skrg'] = date("d-m-Y H:i:s");

				$message = $this->load->view('addjo/email_new_rekrut.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);
			}

			$awsk = $this->db->query("SELECT lokasi FROM trans_rincian Where id='$vid' ")->row();
			$bwk  = $this->db->query("SELECT a.*,b.email, c.layanan FROM mapping_city a LEFT JOIN m_login b ON a.manar=b.username LEFT JOIN province c ON a.province_id = c.id WHERE city_id='" . $awsk->lokasi . "' ")->row();

			$this->load->database('default', TRUE);
			$check = $this->job_model->get_email_penerima($njo);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njo;
			$data['keter'] = $scancel;
			$data['abcd'] = 2;

			$message = $this->load->view('addjo/email_done.php', $data, TRUE);

			$hasilkirim = $this->emailsent_sap($test, $bwk->email, 'Notifikasi Done Skema JO', $message);
		}
	}


	function simpan_skema()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username']		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njob = $this->input->post('data');
			$njo 				= $njob[0];
			$vid 				= $njob[1];
			$jenisarea 			= $njob[2];
			$det_area	 		= $njob[3];
			$jenispersa			= $njob[4];
			$det_persa		 	= $njob[5];
			$jenisskill 		= $njob[6];
			$n_jenisskill	 	= $njob[7];
			$jenisjabatan 		= $njob[8];
			$jenislevel 		= $njob[9];
			$n_jenislevel	 	= $njob[10];
			$jenisproject	 	= $njob[11];
			$n_jenisproject	 	= $njob[12];
			//$begda			 	= $njob[13];
			$zskema			 	= $njob[13];
			$lkomponen		 	= $njob[14];
			$scancel		 	= $njob[15];
			$jpay			 	= $njob[16];
			$njab			 	= $njob[17];
			$yay_nojo		 	= $njob[18];
			$yay_lok		 	= $njob[19];
			$yay_jab		 	= $njob[20];
			$yay_lev		 	= $njob[21];
			$kontrakh		 	= $njob[22];
			$yay_skill		 	= $njob[23];
			$uspm		 		= $njob[24];
			$jkontrak		 	= $njob[25];
			$trfgb			 	= $njob[26];
			$alasanrot		 	= $njob[27];
			$udiv			 	= $njob[28];
			$pilpks			 	= $njob[29];
			$dokpks			 	= $njob[30];
			$dekomp			 	= $njob[31];

			// var_dump($jenisskill);var_dump($det_area);var_dump($jenislevel);var_dump($det_persa);var_dump($jenispersa);var_dump($jenisjabatan);var_dump($zskema);die;
			// var_dump($jenisjabatan);die;
			$abcdefgh	= $this->job_model->detail_komp($yay_nojo, $yay_lok, $yay_jab, $yay_lev, $yay_skill, $dekomp);


			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_job');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"), 'search' => $njab);
			$this->curl->post($post);
			$ibab = json_decode($this->curl->execute());
			$ubab = $ibab->OBJID;

			// var_dump($ubab);exit();

			//$bulan_awal		= new datetime($begda);
			//$namabulan_awal	= $bulan_awal->format('Ymd');

			if ($det_persa == '') {
				$mymy = $jenispersa;
			} else {
				$mymy = $det_persa;
			}

			/* Yang Lama
			$putih = array (
				'area' 					=> $det_area,
				'personalarea'			=> $mymy,
				'skilllayanan' 			=> $jenisskill,
				'jabatan' 				=> $jenisjabatan,
				'level' 				=> $jenislevel,
				'tgl_gajian' 			=> $det_gaji,
				'periode_absensi_a' 	=> $det_absensi1,
				'periode_absensi_b' 	=> $det_absensi2,
				'tanggal_absensi' 		=> $det_kumpul,
				'jenis_project' 		=> $jenisproject,
				'n_jenis_project' 		=> $n_jenisproject,
				'nojo' 					=> $njo,
				'id_rinc' 				=> $vid
			);
			*/

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_zparam');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$nnn = json_decode($this->curl->execute());
			$mmm = $nnn->ZPARAMETER;

			// var_dump($mmm);exit();

			$kkk = substr("" . $mmm . "", 0, 1);

			$nor = substr($mmm, 1, 9);
			//$kkk = 'S';
			//$nor = '000000001';

			$next 			= intval($nor) + 1;
			$xnext 			= $this->hitung_param($next);
			$zparam 		= $kkk . $xnext;

			// var_dump($ubab);var_dump($mmm);var_dump($next);var_dump($zparam);exit();
			// var_dump($zparam);exit();

			$mocl	= explode(",", $lkomponen);
			$thum   = $mocl[1];
			$thumr  = $mocl[0];
			$thuml  = $mocl[2];
			// var_dump($jenispersa);var_dump($det_area);
			// var_dump($jenisskill);var_dump($jenislevel);var_dump($zskema);
			// var_dump($mocl[5]);var_dump($mocl[1] / 100);
			// exit();

			// var_dump($thumr);
			// var_dump($thuml);
			// exit();

			if (($thumr != '') && ($thuml != '')) {
				// if($thum!=''){
				$zparamka = $zparam;
			} else {
				$zparamka = 0;
			}

			$tglinp = date("Y-m-d H:i:s");

			$noob = $this->db->query("Select tanggal, lup_edit, pks From trans_jo Where nojo='$njo' ")->row();
			if ($noob->lup_edit != '' && $noob->lup_edit != null) {
				$gook = $noob->lup_edit;
			} else {
				$gook = $noob->tanggal;
			}


			$this->job_model->xinssimpanskemax($vid, $scancel, $jenispersa, $det_area, $jenisskill, $jenisjabatan, $jenislevel, $jenisproject, $zskema, $jpay, $ubab, $zparamka, $data['username'], $tglinp, $njab, $uspm, $gook, $jkontrak, $trfgb, $alasanrot, $udiv, $pilpks, $dokpks);

			$this->job_model->update_rpks($njo, $pilpks, $dokpks);

			$this->job_model->update_divjo($vid, $udiv);

			// if ($pilpks == 'Y') {
			if ($noob->pks > 0) {
				$this->job_model->save_transpks($njo, $vid, 1, $data['username'], $uspm);
			}


			//$mocl	= explode(",",$lkomponen);
			//$thum   = $mocl[1]; 

			if ($thum != '') {
				$rec	= explode(",", $lkomponen);
				//$loop = count($rec)/13;
				//var_dump($zparam);exit();
				$xump 	= $rec[1] / 100;
				$hkpem 	= $rec[5];

				$bn = substr($xump, 0, -2);
				$bk = substr($xump, -2);
				$bj = $bn . "," . $bk;

				if ($kontrakh == 'KEMITRAAN') {
					$pow = $this->db->query("SELECT a.*, c.id as blvl, c.level as blvl_txt, b.skilllayanan, b.skilllayanan_txt FROM trans_komponen a LEFT JOIN trans_rincian b ON a.nojo=b.nojo and a.jabatan=b.jabatan and a.area=b.lokasi AND a.level=b.level LEFT JOIN m_level_skema c ON b.level=c.id WHERE a.nojo = '$yay_nojo' and a.area = '$yay_lok' and a.jabatan='$yay_jab' and (a.level='$yay_lev' OR a.level is null) AND komponen IN (4066,4058) GROUP BY a.komponen ")->num_rows();
					if ($pow < 2) {
						$tolo = '';
					} else {
						$tolo = $xump;
					}
				} else {
					$tolo = $xump;
				}


				// INI NANTI BUAT KALO SEMUA UDAH JALANIN YANG BARU ROTASI RESIGN (di list ganti OBJID => $kobjid)
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_objidc');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"), 'JOB' => $jenisjabatan);
				$this->curl->post($post);
				$xobjid = json_decode($this->curl->execute());
				$kobjid = $xobjid->OBJID;

				$this->curl->create('http://192.168.88.5/service/index.php/skema/table1');
				$post_tabel1 = array(
					'token' 			=> sha1("#ISH!@#"),
					'ZPARAMETER' 		=> $zparam,
					'ENDDA' 			=> '99991231',
					//'BEGDA' 			=> $namabulan_awal,
					'BEGDA' 			=> date("Ymd"),
					//'PERSA'				=> $mymy,
					'PERSA'				=> $jenispersa,
					'BTRTL' 			=> $det_area,
					// 'OBJID' 			=> $jenisjabatan,
					'OBJID' 			=> $kobjid,
					'PERSK' 			=> $jenisskill,
					'TRFAR' 			=> $jenislevel,
					'ZSKEMA' 			=> $zskema,
					'TRFGR' 			=> $jenislevel,
					'HKPEMBAGI' 		=> $hkpem,
					//'UMP' 				=> $xump,
					'UMP' 				=> $tolo,
					'WAERS' 			=> '',
					'FLAGREFUMP' 		=> '',
					'AEDAT' 			=> date("Ymd"),
					'AENAM' 			=> 'HR_ADMIN',
				);
				$this->curl->post($post_tabel1);
				$result = json_decode($this->curl->execute());

				/*
					$this->curl->create('http://192.168.88.5/service/index.php/skema/table1');
					// $this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$post = array(
					'token' 			=> sha1("#ISH!@#"),
					'ZPARAMETER' 		=> $zparam,
					'ENDDA' 			=> '99991231',  
					//'BEGDA' 			=> $namabulan_awal,
					'BEGDA' 			=> date("Ymd"),
					//'PERSA'				=> $mymy,
					'PERSA'				=> $jenispersa,
					'BTRTL' 			=> $det_area,
					// 'OBJID' 			=> $jenisjabatan,
					'OBJID' 			=> $kobjid,
					'PERSK' 			=> $jenisskill,
					'TRFAR' 			=> $jenislevel,
					'ZSKEMA' 			=> $zskema,
					'TRFGR' 			=> $jenislevel,
					'HKPEMBAGI' 		=> $hkpem,
					//'UMP' 				=> $xump,
					'UMP' 				=> $tolo,
					'WAERS' 			=> '',
					'FLAGREFUMP' 		=> '',
					'AEDAT' 			=> date("Ymd"),
					'AENAM' 			=> 'HR_ADMIN',
					);
					
					$this->curl->post($post);
					$result =json_decode($this->curl->execute());
					// var_dump($result);die;
					*/

				foreach ($abcdefgh as $key => $listx) {
					$this->curl->create('http://192.168.88.5/service/index.php/skema/table2');
					// $this->curl->option('buffersize', 10);
					// $this->curl->http_login('devappish', 'devappish!@#');

					$bq = substr($listx['value'], 0, -2);
					$bz = substr($listx['value'], -2);
					$bp = $bq . "," . $bz;
					$blm = $listx['value'] / 100;

					$post_tabel2 = array(
						'token' 			=> sha1("#ISH!@#"),
						'MANDT' 			=> '',
						'ZPARAMETER' 		=> $zparam,
						'LGART' 			=> $listx['komponen'],
						'ENDDA'				=> '99991231',
						//'BEGDA' 			=> $namabulan_awal,
						'BEGDA' 			=> date("Ymd"),
						'ZAMOUNT' 			=> $blm,
						'WAERS' 			=> '',
						'AEDAT' 			=> date("Ymd"),
						'AENAM' 			=> 'HR_ADMIN',
					);
					$this->curl->post($post_tabel2);
					$resultx = json_decode($this->curl->execute());
				}

				/*
					$loop = count($rec)/8;
					if ($loop){
						$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; 
						for ($v=0; $v<$loop; $v++){
							$this->curl->create('http://192.168.88.5/service/index.php/skema/table2');
							$this->curl->option('buffersize', 10);
							$this->curl->http_login('devappish', 'devappish!@#');
							
							if( ($rec[$c]=='6666') || ($rec[$c]=='7777') ) {
								if($rec[$i]!=''){
									$post = array(
									'token' 			=> sha1("#ISH!@#"),
									'MANDT' 			=> '',
									'ZPARAMETER' 		=> $zparam,  
									'LGART' 			=> '/3r1',
									'ENDDA'				=> '99991231', 
									//'BEGDA' 			=> $namabulan_awal,
									'BEGDA' 			=> date("Ymd"),
									'ZAMOUNT' 			=> $rec[$i],
									'WAERS' 			=> '',
									'AEDAT' 			=> date("Ymd"),
									'AENAM' 			=> 'HR_ADMIN',
									);
									$this->curl->post($post);
									$resultx =json_decode($this->curl->execute());
								} 
								else if($rec[$j]!='')
								{
									$post = array(
									'token' 			=> sha1("#ISH!@#"),
									'MANDT' 			=> '',
									'ZPARAMETER' 		=> $zparam,  
									'LGART' 			=> '/3r3',
									'ENDDA'				=> '99991231', 
									//'BEGDA' 			=> $namabulan_awal,
									'BEGDA' 			=> date("Ymd"),
									'ZAMOUNT' 			=> $rec[$j],
									'WAERS' 			=> '',
									'AEDAT' 			=> date("Ymd"),
									'AENAM' 			=> 'HR_ADMIN',
									);
									$this->curl->post($post);
									$resultx =json_decode($this->curl->execute());
								}
								else if($rec[$k]!='')
								{
									$post = array(
									'token' 			=> sha1("#ISH!@#"),
									'MANDT' 			=> '',
									'ZPARAMETER' 		=> $zparam,  
									'LGART' 			=> '/3r2',
									'ENDDA'				=> '99991231', 
									//'BEGDA' 			=> $namabulan_awal,
									'BEGDA' 			=> date("Ymd"),
									'ZAMOUNT' 			=> $rec[$k],
									'WAERS' 			=> '',
									'AEDAT' 			=> date("Ymd"),
									'AENAM' 			=> 'HR_ADMIN',
									);
									$this->curl->post($post);
									$resultx =json_decode($this->curl->execute());
								}
								else if($rec[$l]!='')
								{
									$post = array(
									'token' 			=> sha1("#ISH!@#"),
									'MANDT' 			=> '',
									'ZPARAMETER' 		=> $zparam,  
									'LGART' 			=> '/3e2',
									'ENDDA'				=> '99991231', 
									//'BEGDA' 			=> $namabulan_awal,
									'BEGDA' 			=> date("Ymd"),
									'ZAMOUNT' 			=> $rec[$l],
									'WAERS' 			=> '',
									'AEDAT' 			=> date("Ymd"),
									'AENAM' 			=> 'HR_ADMIN',
									);
									$this->curl->post($post);
									$resultx =json_decode($this->curl->execute());
								}
							}
							else
							{
								$bq = substr($rec[$d],0,-2);
								$bz = substr($rec[$d],-2);
								$bp = $bq.",".$bz;
								$blm = $rec[$d] / 100;
								
								$post = array(
								'token' 			=> sha1("#ISH!@#"),
								'MANDT' 			=> '',
								'ZPARAMETER' 		=> $zparam,  
								'LGART' 			=> $rec[$c],
								'ENDDA'				=> '99991231', 
								//'BEGDA' 			=> $namabulan_awal,
								'BEGDA' 			=> date("Ymd"),
								'ZAMOUNT' 			=> $blm,
								'WAERS' 			=> '',
								'AEDAT' 			=> date("Ymd"),
								'AENAM' 			=> 'HR_ADMIN',
								);
								$this->curl->post($post);
								$resultx =json_decode($this->curl->execute());
							}
							
							$a = $a + 7;
							$b = $b + 7;
							$c = $c + 7;
							$d = $d + 7;
							$e = $e + 7;
							$f = $f + 7;
							$g = $g + 7;
						}
					}
					*/
			}



			/* Yang Baru
			$putih = array (
				'nojo' 					=> $njo,
				'id_rinc' 				=> $vid,
				'area'					=> $det_area,
				'n_area' 				=> $jenisarea,
				'personalarea' 			=> $mymy,
				'n_personalarea' 		=> '',
				'skilllayanan' 			=> $jenisskill,
				'n_skilllayanan' 		=> $n_jenisskill,
				'jabatan' 				=> $jenisjabatan,
				'level' 				=> $jenislevel,
				'n_level' 				=> $n_jenislevel,
				'jenis_project' 		=> $jenisproject,
				'n_jenis_project' 		=> $n_jenisproject,
				'upd'					=> $data['username'],
				'lup'					=> date("Y-m-d H:i:s")
			);
			
			$this->job_model->inssimpanskema_2($putih);
			$this->job_model->xinssimpanskemax($vid);
			*/

			$awskr = $this->db->query("SELECT a.layanan FROM province a LEFT JOIN mapping_city b ON a.id=b.province_id LEFT JOIN trans_rincian c ON b.city_id=c.lokasi WHERE c.id='$vid' ")->row();
			$awskg = $this->db->query("SELECT * FROM m_login WHERE layanan='" . $awskr->layanan . "' AND LEVEL='3' ")->result_array();
			foreach ($awskg as $val) {
				$test = $val['email'];

				$checkox = $this->job_model->get_detail_creater($njo);
				$data['type']  	  = $checkox->namad;
				$data['nama']  	  = $checkox->nama;
				$data['nojoz'] 	  = $njo;
				$data['skrg'] = date("d-m-Y H:i:s");

				$message = $this->load->view('addjo/email_new_rekrut.php', $data, TRUE); // this will return you html data as message

				if ($val['layanan'] == 'L018') {
					$hasilkirim = $this->emailsent_sap($test, 'recruitment.jabar@ish.co.id', 'Notifikasi Done JO New', $message);
				} else {
					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Done JO New', $message);
				}
			}

			$awsk = $this->db->query("SELECT lokasi, userpm FROM trans_rincian Where id='$vid' ")->row();
			$bwk  = $this->db->query("SELECT a.*,b.email, c.layanan FROM mapping_city a LEFT JOIN m_login b ON a.manar=b.username LEFT JOIN province c ON a.province_id = c.id WHERE city_id='" . $awsk->lokasi . "' ")->row();

			$this->load->database('default', TRUE);
			$check = $this->job_model->get_email_penerima($njo);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njo;
			$data['keter'] = $scancel;
			$data['abcd'] = 2;

			$message = $this->load->view('addjo/email_done.php', $data, TRUE);
			$hasilkirim = $this->emailsent_sap($test, $bwk->email, 'Notifikasi Done JO New', $message);

			//notifikasi untuk PM
			$email_ppc = $this->job_model->email_ppc_aja();
			$email_pm  = $this->db->query("SELECT email FROM m_login Where username='" . $awsk->userpm . "' ")->row();
			$messagex  = $this->load->view('addjo/email_done_kepm.php', $data, TRUE);
			$hasilkirimx = $this->emailsent_sap($email_pm->email, $email_ppc->email, 'Notifikasi Done JO New', $messagex);

			//notifikasi untuk Legal
			$cekdet			= $this->db->query("SELECT * From trans_jo Where nojo='$njo' ")->row();
			if ($pilpks == 'Y') {

				// $this->job_model->save_transpks($njo, $vid, 1, $data['username'], $uspm);

				$cekada_nobak	= $this->db->query("SELECT * From trans_pks_new Where nobak='" . $cekdet->no_bak . "' ")->num_rows();

				if ($cekada_nobak <= 0) {

					$data['detdata'] = $cekdet;
					$data['ndok']    = $this->db->query("SELECT * From m_docpks Where id='" . $dokpks . "' ")->row();
					$data['ndiv']    = $this->db->query("SELECT * From m_divisi Where id='" . $udiv . "' ")->row();
					$messagez  = $this->load->view('addjo/email_legal.php', $data, TRUE);
					$hasilkirimz = $this->emailsent('legal@ish.co.id', 'khusnul.hisyam@ish.co.id', 'Notifikasi Permintaan PKS', $messagez);
				}
			}
		}
	}

	function editjo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			//$rekrut = $this->input->post('rekrut');

			$item = array(
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


	function simpan_komentar()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			$item = array(
				'nojo' => $this->input->post('snojo'),
			);

			$item1 = array(
				'komentar' => $this->input->post('skomentar')
			);

			$infomedia = $this->job_model->simpan_komentar($item, $item1);

			echo json_encode($infomedia);

			exit;
			redirect('home/listorder', 'refresh');
		}
	}


	function simpan_cancel()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			$item = array(
				'nojo' => $this->input->post('cnojo'),
			);

			$item1 = array(
				'flag_cancel' 		=> '1',
				'upd_cancel_rekrut' => $data['username'],
				'ket_cancel' 		=> $this->input->post('scancel')
			);

			$infomedia = $this->job_model->simpan_cancel($item, $item1);

			echo json_encode($infomedia);

			exit;
			redirect('home/listorder', 'refresh');
		}
	}


	function simpan_stop()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			$njob = $this->input->post('data');
			$nid 				= $njob[0];
			$sstop	 			= $njob[1];

			$item = array(
				'id' => $nid,
			);

			$item1 = array(
				'flag_stop' 		=> 1,
				'ket_stop'			=> $sstop,
				'upd_stop' 			=> $data['username'],
				'lup_stop' 			=> date('Y-m-d')
			);

			$this->job_model->simpan_stop($item, $item1);

			exit;

			// $check = $this->job_model->get_email_penerima($njo);
			// $test = array();
			// foreach ($check as $val) {
			// $test[] = $val['email'];
			// }

			// $data['skrg']  = date("d-m-Y H:i:s");
			// $data['nojoz'] = $njo;
			// $data['ktr']   = $scancel;

			// $message = $this->load->view('addjo/email_rej.php',$data,TRUE); 

			// $hasilkirim = $this->emailsent_rej($test,'khusnul.hisyam@ish.co.id','Notifikasi Reject JO - Penyesuaian Skema',$message);

			// echo json_encode($hasilkirim);
			// exit;

			// redirect('home/listorder', 'refresh');
		}
	}


	function simpan_cancel_sap()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			$njob = $this->input->post('data');
			$njo 				= $njob[0];
			$scancel 			= $njob[1];
			$vid 				= $njob[2];
			$pilpks 			= $njob[3];
			$flagstat 			= $njob[4];

			$item = array(
				'nojo' => $njo,
			);

			$item1 = array(
				'upd_cancel_rekrut' => $data['username'],
				'flag_cancel_sap'	=> $flagstat,
				'ket_cancel' 		=> $scancel,
				'lup_cancel_skema'  => date("Y-m-d H:i:s"),
				'pilpks'  			=> $pilpks
			);

			$putih = array(
				'id' => $vid,
			);

			$putih1	= array(
				'flag_rej'  	=> $flagstat,
				'upd_rej' 		=> $data['username'],
				'lup_rej'  		=> date("Y-m-d H:i:s"),
				'ket_rej_pm'  	=> $scancel,
				'pilpks'  		=> $pilpks
			);

			//$infomedia=$this->job_model->simpan_cancel_sap($item,$item1);
			$this->job_model->simpan_cancel_sap($item, $item1);
			$this->job_model->simpan_cancel_sap2($putih, $putih1);

			//echo json_encode($infomedia);

			//exit;

			//$njok = $this->input->post('cnojo');
			//$keter = $this->input->post('scancel');

			if ($flagstat == 1) {
				$subject = 'Notifikasi Reject JO New';
			} else {
				$subject = 'Notifikasi Return JO New';
			}

			$check = $this->job_model->get_email_penerima($njo);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['skrg']  = date("d-m-Y H:i:s");
			$data['nojoz'] = $njo;
			$data['ktr']   = $scancel;

			// $cekjo	= $this->db->query("Select * from trans_jo Where nojo='$njo' ")->row();
			// if($cekjo->type_jo==1){
			// $subj_email = 'Notifikasi Reject JO New';
			// } else {
			// $subj_email = 'Notifikasi Reject JO Replacement';
			// }

			$message = $this->load->view('addjo/email_rej.php', $data, TRUE);

			$hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', $subject, $message);

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



	function urincian_simpan()
	{
		// ini_set('display_errors', 1);
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

		$xdatex = date('dm');

		$nojoz = "";
		$consx = 'ISH' . $xdatex;
		$cons = 'ISH01010107';
		$year = date('Y');

		$nojob = $this->job_model->get_insertjoz();
		if ($nojob == 0) {
			$new = '000001';
			$nojoz = $new . $cons . $year;
		} else {
			$nor = $nojob;
			$next = intval($nor) + 1;
			$xnext = $this->hitung($next);
			$nojoz = $xnext . $cons . $year;
		}
		$data['nojoz'] = $nojoz;

		// var_dump('AAA');die;

		//$nojo  = $_POST['nojok'];
		$hjk = array("bak", "other");
		for ($i = 0; $i < count($_FILES['userfiles']['name']); $i++) {
			// $target_path = "./uploads/";
			$target_path = "/mnt/drobo/88.41/uploads/";
			$ext = explode('.', basename($_FILES['userfiles']['name'][$i]));
			//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 
			$target_path = $target_path . $hjk[$i] . "_" . $nojoz . "." . $ext[count($ext) - 1];

			if (move_uploaded_file($_FILES['userfiles']['tmp_name'][$i], $target_path)) {
				//echo "The file has been uploaded successfully <br />";
			} else {
				//echo "There was an error uploading the file, please try again! <br />";
			}
		}
	}


	function usave_inv()
	{
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['regional'] 		= $session_data['regional'];
		$data['username'] 		= $session_data['username'];
		$date_now 		= date("YmdHis");

		$abc = $_POST['bultah'];
		$def = $_POST['rincid'];
		$noj = $_POST['nojox'];
		$nojx = str_replace("/", "", $noj);
		$ghj = $_POST['kumpx'];
		$lol = $_POST['kumix'];
		//var_dump($ghj);exit();
		$col = $this->db->query("SELECT id FROM trans_ops WHERE nojo='$noj' and tanggal='$abc' ")->num_rows();
		//var_dump($col);exit();
		if ($col > 0) {
			echo '<script language="javascript">';
			echo 'alert("Bulan yang anda inputkan sudah ada...")';  //not showing an alert box.
			echo '</script>';
			//exit;
			//echo "Bulan yang anda inputkan sudah ada...";
			redirect('ops/listorder_ops', 'refresh');
		} else {
			for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
				$mam = $_FILES['komp']['name'][$i];
				if ($mam == '') {
					//echo "File Harus Di Isi Semua...";
					echo '<script language="javascript">';
					echo 'alert("File Harus Di Isi Semua...")';  //not showing an alert box.
					echo '</script>';
					redirect('ops/listorder_ops', 'refresh');
				} else {
				}
			}

			$item = array(
				'nojo' 			=> $noj,
				'tanggal' 		=> $abc,
				'rinc_id' 		=> $def,
				'upd' 			=> $data['username'],
				'lup' 			=> date("Y-m-d H:i:s")
			);

			$this->job_model->inserttransops($item);

			$kol = $this->db->query("SELECT id FROM trans_ops WHERE nojo='$noj' and tanggal='$abc' ")->row();
			$kal = $kol->id;
			//$jns = array("abs", "absrec", "payrec", "barec", "bapp");
			for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
				$target_path = "./invoice/";
				$ext = explode('.', basename($_FILES['komp']['name'][$i]));
				if ($ext != '') {
					$namax = $ghj[$i] . "_" . $abc . "_" . $nojx . "." . $ext[count($ext) - 1];

					$itemx = array(
						'id_ops'	=> $kal,
						'id_doc'	=> $lol[$i],
						'filename' 	=> $namax
					);

					$this->job_model->save_file($itemx);

					$target_path = $target_path . $ghj[$i] . "_" . $abc . "_" . $nojx . "." . $ext[count($ext) - 1];

					if (move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
					} else {
					}
				}
			}

			redirect('ops/listorder_ops', 'refresh');
		}
	}



	/*
	function usave_inv(){
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['regional'] 		= $session_data['regional'];
		$data['username'] 		= $session_data['username'];
		$date_now 		= date("YmdHis");
		
		$abc = $_POST['bultah'];
		$def = $_POST['rincid'];
		$noj = $_POST['nojox'];
		$nojx= str_replace("/","",$noj);
		$ghj = $_FILES['komp']['name'][0];
		//var_dump($nojx);exit();
		
		$item = array (
			'nojo' 			=> $noj,
			'tanggal' 		=> $abc,
			'rinc_id' 		=> $def,
			'upd' 			=> $data['username'],
			'lup' 			=> date("Y-m-d H:i:s")
		);
		
		$this->job_model->inserttransops($item);
		
		$jns = array("abs", "absrec", "payrec", "barec", "bapp");
		for($i=0; $i<count($_FILES['komp']['name']); $i++){
			$target_path = "./invoice/";
			$ext = explode('.', basename( $_FILES['komp']['name'][$i]));
			if($ext!=''){
				if($i==0){
					$putih = array (
						'nojo' 			=> $noj,
						'tanggal' 		=> $abc
					);
					
					$namax = $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 
					
					$item = array (
						'f_abs' 		=> $namax
					);
					
					$this->job_model->edittransops($item, $putih);
					
					$target_path = $target_path . $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 

					if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
						
					} else{
						
					}
				}
				else if($i==1){
					$putih = array (
						'nojo' 			=> $noj,
						'tanggal' 		=> $abc,
					);
					
					$namax = $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 
					
					$item = array (
						'f_abs_rec' 	=> $namax
					);
					
					$this->job_model->edittransops($item, $putih);
					
					$target_path = $target_path . $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 

					if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
						
					} else{
						
					}
				}
				else if($i==2){
					$putih = array (
						'nojo' 			=> $noj,
						'tanggal' 		=> $abc,
					);
					
					$namax = $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 
					
					$item = array (
						'f_pay_rec' 	=> $namax
					);
					
					$this->job_model->edittransops($item, $putih);
					
					$target_path = $target_path . $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 

					if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
						
					} else{
						
					}
				}
				else if($i==3){
					$putih = array (
						'nojo' 			=> $noj,
						'tanggal' 		=> $abc,
					);
					
					$namax = $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 
					
					$item = array (
						'f_ba_recon' 	=> $namax
					);
					
					$this->job_model->edittransops($item, $putih);
					
					$target_path = $target_path . $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 

					if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
						
					} else{
						
					}
				}
				else if($i==4) {
					$putih = array (
						'nojo' 			=> $noj,
						'tanggal' 		=> $abc,
					);
					
					$namax = $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 
					
					$item = array (
						'f_bapp' 	=> $namax
					);
					
					$this->job_model->edittransops($item, $putih);
					
					$target_path = $target_path . $jns[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 

					if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
						
					} else{
						
					}
				}
			}
		}
		
		redirect('home/listorder_ops', 'refresh');
		
	}
	*/

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

	function perner_simpan()
	{
		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']		    = $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];

		$xdatex = date('dm');

		$nojo = "";
		$consx = '/ISH/' . $xdatex . '/';
		$cons = '/ISH/01010107/';
		$year = date('Y');

		$nojob = $this->job_model->get_insertjo();
		if ($nojob == 0) {
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
		$consy = 'ISH' . $xdatex;
		$cons = 'ISH01010107';
		$year = date('Y');

		$nojob = $this->job_model->get_insertjoz();
		if ($nojob == 0) {
			$new = '000001';
			$nojoz = $new . $cons . $year;
		} else {
			$nor = $nojob;
			$next = intval($nor) + 1;
			$xnext = $this->hitung($next);
			$nojoz = $xnext . $cons . $year;
		}
		$data['nojoz'] = $nojoz;


		$file_element_name  = $this->input->post('joborder[4]');
		$file_element_name2 = $this->input->post('joborder[5]');
		$file_element_name3 = $this->input->post('joborder[6]');
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$ext2 = pathinfo($file_element_name2, PATHINFO_EXTENSION);
		$ext3 = pathinfo($file_element_name3, PATHINFO_EXTENSION);
		if ($ext == '') {
			$file_name  = "";
		} else {
			$file_name = "skema_" . $nojoz . "." . $ext;
		}


		if ($ext2 == '') {
			$file_name2  = "";
		} else {
			$file_name2 = "bak_" . $nojoz . "." . $ext2;
		}


		if ($ext3 == '') {
			$file_name3  = "";
		} else {
			$file_name3 = "other_" . $nojoz . "." . $ext3;
		}

		$this->job_model->campuran_perner($nojof, $file_name, $file_name2, $file_name3, $data['username']);

		/*DIMATIKAN KARENA MASALAH EMAIL GANGGUAN */
		$typere = $this->input->post('joborder[10]');
		$rrr 	= $this->input->post('joborder[7]');
		if (($rrr == '2') || ($rrr == '4')) {
			if ($typere == '1') {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->load->database('default', TRUE);
					$check = $this->job_model->get_email();
					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[9]');

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

					//echo $hasilkirim;
				} else {
					$check = $this->job_model->get_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

						echo "Data Telah Di Approve";
					}
					/*
						$this->load->database('db_second',FALSE);
						$this->load->database('default',TRUE);
						$check = $this->job_model->get_email_sap();
						//$test = array();
						foreach ($check as $val) {
							$test = $val['email'];
						
							$data['type']     = $this->input->post('joborder[9]');
							$data['eeee'] 	  = 1;
							
							$data['skrg'] = date("d-m-Y H:i:s");
							
							$message = $this->load->view('addjo/email_new_sap.php',$data,TRUE); // this will return you html data as message

							$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO',$message);
						}
						*/
				}
			} else {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->load->database('default', TRUE);
					$check = $this->job_model->get_email();
					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[9]');

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);
				} else {
					$check = $this->job_model->get_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

						echo "Data Telah Di Approve";
					}
					/*
						$rec 	= $this->input->post('joborder[12]');
						$rec	= explode(",",$rec);
						$loop = count($rec)/12;
						if ($loop){
							$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; $o = 8; $j = 9; $k = 10; 
							for ($i=0; $i<$loop; $i++){
								$city = $rec[$h];
								$prov = $rec[$o];
								$this->load->database('db_second',FALSE);
								$this->load->database('default',TRUE);
								$check = $this->job_model->get_email_manar_rep($city, $prov);
								$test = array();
								foreach ($check as $val) {
									$test[] = $val['email'];
								}
								
								$data['type'] = $this->input->post('joborder[9]');
								
								$data['skrg'] = date("d-m-Y H:i:s");
								
								$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

								$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO',$message);
								
								$h = $h + 11;
								$o = $o + 11;
							}
						}
						*/
				}
			}
		}
	}



	function rincian_simpan()
	{

		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']		    = $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];

		//$abc = $this->input->post('joborder[20]');	
		//var_dump($abc);exit();

		$xdatex = date('dm');

		$nojo = "";
		$consx = '/ISH/' . $xdatex . '/';
		$cons = '/ISH/01010107/';
		$year = date('Y');

		$nojob = $this->job_model->get_insertjo();
		if ($nojob == 0) {
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
		$consy = 'ISH' . $xdatex;
		$cons = 'ISH01010107';
		$year = date('Y');

		$nojob = $this->job_model->get_insertjoz();
		if ($nojob == 0) {
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
		if ($ext == '') {
			$file_name  = "";
		} else {
			$file_name = "skema_" . $nojoz . "." . $ext;
		}


		if ($ext2 == '') {
			$file_name2  = "";
		} else {
			$file_name2 = "bak_" . $nojoz . "." . $ext2;
		}


		if ($ext3 == '') {
			$file_name3  = "";
		} else {
			$file_name3 = "other_" . $nojoz . "." . $ext3;
		}

		$this->job_model->campuran($nojof, $file_name, $file_name2, $file_name3, $data['username']);

		$rec 	= $this->input->post('joborder[12]');
		$rec	= explode(",", $rec);
		$loop = count($rec) / 17;
		if ($loop) {
			$a = 0;
			$b = 1;
			$c = 2;
			$d = 3;
			$e = 4;
			$f = 5;
			$g = 6;
			$h = 7;
			$o = 8;
			$j = 9;
			$k = 10;
			$l = 11;
			$m = 12;
			$n = 13;
			$p = 14;
			$q = 15;
			for ($i = 0; $i < $loop; $i++) {
				$job_data['company_id'] = '97';
				if ($rec[$b] == 'Pria-Wanita') {
					$ish = -1;
				} elseif ($rec[$b] == 'Pria') {
					$ish = 1;
				} elseif ($rec[$b] == 'Wanita') {
					$ish = 2;
				}

				if (($rec[$c] == 'D3') || ($rec[$c] == 'D2') || ($rec[$c] == 'D1')) {
					$ishi = 2;
				} elseif ($rec[$c] == 'SMA') {
					$ishi = 1;
				} elseif (($rec[$c] == 'S1') || ($rec[$c] == 'S2')) {
					$ishi = 3;
				}

				if ($rec[$g] == 'PKWT') {
					$ishis = '["1"]';
				} elseif ($rec[$g] == 'Kemitraan') {
					$ishis = '["1"]';
				} elseif (($rec[$g] == 'Part') || ($rec[$g] == 'Part Time')) {
					$ishis = '["2"]';
				} elseif ($rec[$g] == 'Magang') {
					$ishis = '["6"]';
				}

				$su = '["' . $rec[$a] . '"]';


				$item = array(
					'company_id' 					=> $job_data['company_id'],
					'job_title' 					=> $rec[$m],
					'job_description' 				=> $this->input->post('joborder[3]'),
					'job_gender' 					=> $ish,
					'job_education' 				=> $ishi,
					'job_job_level' 				=> $rec[$o],
					'job_experience' 				=> '',
					'job_is_freshgraduate' 			=> '1',
					'job_skills' 					=> '',
					'job_employment_type' 			=> $ishis,
					'job_salary_type' 				=> 'Monthly',
					'job_salary_min' 				=> $rec[$p],
					'job_salary_max' 				=> $rec[$q],
					'job_salary_negotiable' 		=> '1',
					'job_salary_is_show' 			=> '1',
					'job_city' 						=> $rec[$d],
					'job_city_name'					=> $rec[$n],
					'job_benefit' 					=> '',
					'job_job_function' 				=> $su,
					'job_publish_start' 			=> $this->input->post('joborder[0]'),
					'job_publish_end' 				=> $this->input->post('joborder[6]'),
					'job_is_publish' 				=> '0',
					'job_status' 					=> '0',
					'job_created_at' 				=> date("Y-m-d H:i:s"),
					'job_token' 					=> md5(time() . $rec[$m] . $job_data['company_id'] . mt_rand(0, 1000)),
					'job_is_draft' 					=> '0',
					'job_view_count'				=> '0',
					'job_member_click' 				=> '0',
					'job_non_member_click' 			=> '0',
					'job_total_click' 				=> '0',
					'job_remarks' 					=> ''
				);

				$this->job_model->simpan_media($item);

				$a = $a + 16;
				$b = $b + 16;
				$c = $c + 16;
				$d = $d + 16;
				$e = $e + 16;
				$f = $f + 16;
				$g = $g + 16;
				$h = $h + 16;
				$o = $o + 16;
				$j = $j + 16;
				$k = $k + 16;
				$l = $l + 16;
				$m = $m + 16;
				$n = $n + 16;
				$p = $p + 16;
				$q = $q + 16;
			}
		}

		/*DIMATIKAN KARENA GANGGUAN EMAIl ISH */
		$typere = $this->input->post('joborder[14]');
		$rrr 	= $this->input->post('joborder[10]');
		if (($rrr == '2') || ($rrr == '4')) {
			if ($typere == '1') {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->load->database('default', TRUE);
					$check = $this->job_model->get_email();
					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[13]');

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

					//echo $hasilkirim; 
				} else {
					/*
						$this->load->database('db_second',FALSE);
						$this->load->database('default',TRUE);
						$check = $this->job_model->get_email_sap();
						
						foreach ($check as $val) {
							$test = $val['email'];
						
							$data['type']     = $this->input->post('joborder[13]');
							$data['eeee'] 	  = 1;
							
							$data['skrg'] = date("d-m-Y H:i:s");
							
							$message = $this->load->view('addjo/email_new_sap.php',$data,TRUE); // this will return you html data as message

							$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO',$message);
						}
						*/
					$check = $this->job_model->get_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

						echo "Data Telah Di Approve";
					}
				}
			} else {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->load->database('default', TRUE);
					$check = $this->job_model->get_email();
					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[13]');

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

					//echo $hasilkirim;
				} else {
					$check = $this->job_model->get_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

						echo "Data Telah Di Approve";
					}
					/*
						$rec 	= $this->input->post('joborder[12]');
						$rec	= explode(",",$rec);
						$loop = count($rec)/9;
						if ($loop){
							$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
							for ($i=0; $i<$loop; $i++){
								$city = $rec[$d];
								$prov = $this->input->post('joborder[1]');
								$this->load->database('db_second',FALSE);
								$this->load->database('default',TRUE);
								$check = $this->job_model->get_email_manar_rep($city, $prov);
								$test = array();
								foreach ($check as $val) {
									$test[] = $val['email'];
								}
								
								$data['type'] = $this->input->post('joborder[13]');
								
								$data['skrg'] = date("d-m-Y H:i:s");
								
								$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

								$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO',$message);
								
								$d = $d + 8;
							}
						}
						*/
				}
			}
		} else {
			if ($data['level'] == '1') {
				$this->load->database('db_second', FALSE);
				$this->load->database('default', TRUE);
				$check = $this->job_model->get_email();
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				$data['type'] = $this->input->post('joborder[13]');
				$data['per_text'] = $this->input->post('joborder[15]');

				$data['skrg'] = date("d-m-Y H:i:s");

				$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

				//echo $hasilkirim;
			} else {
				$check = $this->job_model->get_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$checkox = $this->job_model->get_detail_creater($nojof);
					$data['type']  	  = $checkox->namad;
					$data['nama']  	  = $checkox->nama;
					$data['nojoz'] 	  = $nojof;

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

					echo "Data Telah Di Approve";
				}
				/*
					$rec 	= $this->input->post('joborder[12]');
					$rec	= explode(",",$rec);
					$loop = count($rec)/9;
					if ($loop){
						$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
						for ($i=0; $i<$loop; $i++){
							$city = $rec[$d];
							$this->load->database('db_second',FALSE);
							$this->load->database('default',TRUE);
							$check = $this->job_model->get_email_manar($city);
							$test = array();
							foreach ($check as $val) {
								$test[] = $val['email'];
							}
							
							$data['type'] = $this->input->post('joborder[13]');
							
							$data['skrg'] = date("d-m-Y H:i:s");
							
							$message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message

							$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO',$message);
						}
						$d = $d + 8;
					}
					*/
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
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('joborder/listrincian', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function hitung_param($next)
	{
		$inext = strlen($next);
		switch ($inext) {
			case 1:
				$noj = "00000000" . $next;
				break;
			case 2:
				$noj = "0000000" . $next;
				break;
			case 3:
				$noj = "000000" . $next;
				break;
			case 4:
				$noj = "00000" . $next;
				break;
			case 5:
				$noj = "0000" . $next;
				break;
			case 6:
				$noj = "000" . $next;
				break;
			case 7:
				$noj = "00" . $next;
				break;
			case 8:
				$noj = "0" . $next;
				break;
			case 9:
				$noj = $next;
				break;
		}
		return $noj;
	}


	public function hitung($next)
	{
		$inext = strlen($next);
		switch ($inext) {
			case 1:
				$noj = "00000" . $next;
				break;
			case 2:
				$noj = "0000" . $next;
				break;
			case 3:
				$noj = "000" . $next;
				break;
			case 4:
				$noj = "00" . $next;
				break;
			case 5:
				$noj = "0" . $next;
				break;
			case 6:
				$noj = $next;
				break;
		}
		return $noj;
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}

	public function change_password()
	{
		if ($this->session->userdata('logged_in')) {
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

	function pilih_lokasi()
	{
		$varray				= $this->job_model->take_lok($this->input->post(data));
		$selectnama 	= "<option value=''>Pilih Lokasi</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['city_id'] . "'>" . $list['city_name'] . "</option>";
		}
		print_r($selectnama);
	}

	function pilih_lokasi_local()
	{
		$varray				= $this->job_model->take_lok_local();
		$selectnama 	= "<option value=''>Pilih Lokasi</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['city_id'] . "'>" . $list['city_name'] . "</option>";
		}
		print_r($selectnama);
	}

	function pilih_jabatan()
	{
		$varray				= $this->job_model->take_jab($this->input->post(data));
		$selectnama 	= "<option value=''>Pilih Jabatan</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['id'] . "'>" . $list['name_job_function'] . "</option>";
		}
		print_r($selectnama);
	}

	function pilih_kategori_jabatan()
	{
		$varray				= $this->job_model->take_kat($this->input->post(data));
		$selectnama 	= "<option value=''>Pilih</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['id'] . "'>" . $list['name_job_function_category'] . "</option>";
		}
		print_r($selectnama);
	}

	function pilih_rincian()
	{
		$varray				= $this->job_model->take_rin($this->input->post(data));
		//$selectnama 	= "<option value=''>Pilih</option>";
		$selectnama 	= "<option value=''> Pilih Rincian Jabatan</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['id'] . "'>" . $list['name_job_function'] . "</option>";
		}
		print_r($selectnama);
	}

	function pilih_sifatkomp()
	{
		$varray			= $this->master_model->get_sifatkomp($this->input->post(data), $this->input->post(jenkom), $this->input->post(pilkon));
		//var_dump(comma_separated_to_array($varray));exit();
		//$selectnama 	= "<option value=''>Pilih</option>";
		$selectnama 	= "";
		$jenis 			= $this->comma_separated_to_array($varray);
		$i = 0;
		foreach ($jenis as $key => $list) {
			$selectnama .= "<option value='" . $list . "'>" . $list . "</option>";
			$i++;
		}

		print_r($selectnama);
	}


	function pilih_sifatkomp2()
	{
		//$selectnama 	= "<option value=''>Pilih</option>";
		$selectnama = "<option value='1'>PERUSAHAAN</option>";
		$selectnama .= "<option value='2'>KARYAWAN SEBAGIAN</option>";

		print_r($selectnama);
	}

	function simpanrincian()
	{
		if ($this->session->userdata('logged_in')) {
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
			$rec	= explode(",", $rec);
			$xxxx = count($rec);
			$loop = count($rec) / 9;


			//var_dump($loop);
			//exit();

			if ($loop) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7; //$k = 8;
				for ($i = 0; $i < 2; $i++) {
					//$getdata = $this->job_model->get_data($rec[$a]);
					//foreach ($getdata as $value) {
					//	$za = $value['deskripsi'];
					//}	

					//var_dump($rec[$a]);
					//var_dump($a);
					$eee = $rec[$a];
					$this->load->database('default', TRUE);
					$ppp = $this->db->query("SELECT * FROM trans_jo a LEFT JOIN trans_rincian b ON a.nojo=b.nojo LEFT JOIN job_function c ON b.jabatan=c.id WHERE b.id='" . $rec[$a] . "' ")->result();
					foreach ($ppp as $s) {
						//$gg = $s->nojo;
						$ds = $s->deskripsi;
						$su = '["' . $s->jabatan . '"]';

						//$ja = $s->jabatan;
						if (!filter_var($s->jabatan, FILTER_VALIDATE_INT)) {
							$ja = $s->jabatan;
						} else {
							$ja = $s->name_job_function;
						}



						if (!filter_var($s->lokasi, FILTER_VALIDATE_INT)) {
							$dz = 411;
						} else {
							$dz = $s->lokasi;
						}



						if (($s->gender) == 'Pria-Wanita') {
							$ish = -1;
						} elseif (($s->gender) == 'Pria') {
							$ish = 1;
						} elseif (($s->gender) == 'Wanita') {
							$ish = 2;
						}



						if ((($s->pendidikan) == 'D3') || (($s->pendidikan) == 'D2') || (($s->pendidikan) == 'D1')) {
							$ishi = 2;
						} elseif (($s->pendidikan) == 'SMA') {
							$ishi = 1;
						} elseif ((($s->pendidikan) == 'S1') || (($s->pendidikan) == 'S2')) {
							$ishi = 3;
						}


						if (($s->kontrak) == 'PKWT') {
							$ishis = '["1"]';
						} elseif (($s->kontrak) == 'Kemitraan') {
							$ishis = '["1"]';
						} elseif ((($s->kontrak) == 'Part') || (($s->kontrak) == 'Part Time')) {
							$ishis = '["2"]';
						} elseif (($s->kontrak) == 'Magang') {
							$ishis = '["6"]';
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


					$item = array(
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

					$dbpostgre = $this->load->database('db_second', TRUE);
					$this->job_model->simpan_mediax($item);

					$dbpostgre = $this->load->database('db_second', FALSE);



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
				} //FOR

				//exit();
			} //IF


			//exit();

		}
	}





	function urincian_simpanx()
	{
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$session_data 	= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['jabatan'] 		= $session_data['jabatan'];
		$data['regional'] 		= $session_data['regional'];
		$date_now 		= date("YmdHi");

		//$asi = $_POST['choosen'];
		//var_dump($asi);exit();

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

		$xdatex = date('dm');

		$nojoskl = "";
		$consklx = '/SKEMA-ISH/' . $xdatex . '/';
		$conskl = '/SKEMA-ISH/01010107/';
		$year = date('Y');

		$nojobskl = $this->job_model->get_insertjosk();
		if ($nojobskl == 0) {
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
		$conskx = 'SKEMAISH' . $xdatex;
		$consk = 'SKEMAISH01010107';
		$year = date('Y');

		$nojobsk = $this->job_model->get_insertjosk();
		if ($nojobsk == 0) {
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

		if ($ext == '') {
			$file_name  = "";
		} else {
			$file_name  = "skema_" . $nojosk . "_" . $date_now . "." . $ext;
		}


		if ($ext2 == '') {
			$file_name2  = "";
		} else {
			$file_name2 = "bak_" . $nojosk . "_" . $date_now . "." . $ext2;
		}


		if ($ext3 == '') {
			$file_name3  = "";
		} else {
			$file_name3 = "other_" . $nojosk . "_" . $date_now . "." . $ext3;
		}





		//$bvc = $_POST['choosen'];
		$hjk   = array("skema", "bak", "other");
		//$abc = $_FILES['komp']['name'][0];
		//var_dump($cho);exit();
		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			$target_path = "/mnt/drobo/88.41/uploads/";
			$ext = explode('.', basename($_FILES['komp']['name'][$i]));
			//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 
			$target_path = $target_path . $hjk[$i] . "_" . $nojosk . "_" . $date_now . "." . $ext[count($ext) - 1];

			if (move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
				//echo "The file has been uploaded successfully <br />";
			} else {
				//echo "There was an error uploading the file, please try again! <br />";
			}
		}


		foreach ($_POST['choosen'] as $key => $list) {
			$cho   = $list;
			$chos  = explode("#", $cho);
			$perar = $chos[0];
			$arear = $chos[1];


			$level = $session_data['level'];
			if ($level != '1') {
				$lll = 1;
				$uapp = $data['username'];
				$kapp = 'Karena Untuk Creater Area langsung ke PM';
				$lapp = date("Y-m-d H:i:s");
			} else {
				$lll = 1;
				$uapp = '';
				$kapp = '';
				$lapp = '';
			}


			$cek_detil_ar = $this->skema_model->nama_arper($perar, $arear);

			//var_dump($cek_detil_ar->BTRTX);var_dump($cek_detil_ar->WKTXT);exit();

			$item = array(
				'nojo'				=> $nojoskl,
				'area' 				=> $arear,
				'n_area' 			=> $cek_detil_ar->btrtx,
				'perar' 			=> $perar,
				'n_perar' 			=> $cek_detil_ar->wktxt,
				'dokumen_skema' 	=> $file_name,
				'dokumen_bak' 		=> $file_name2,
				'dokumen_other' 	=> $file_name3,
				'upd' 				=> $data['username'],
				'lup' 				=> date("Y-m-d H:i:s"),
				'flag_approval' 	=> $lll,
				'ket_reject' 		=> $kapp,
				'upd_approval' 		=> $uapp,
				'lup_app' 			=> $lapp,
				'no_bak' 			=> $_POST['nobak'],
				'tgl_input' 		=> date('Y-m-d H:i:s'),
				'kd_cust' 			=> $_POST['sncust']
			);

			//var_dump($item);exit();
			// $this->load->database('db_third',false);
			$this->load->database('default', TRUE);
			$this->job_model->s_rincian_simpanx($item);



			if ($level == '1') {
				$check = $this->job_model->get_email();
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				//$wawak = $this->skema_model->nama_area($sar);
				//$wawaw = $this->skema_model->nama_pas($spa);

				$dfd = $cek_detil_ar->BTRTX;
				$cfd = $cek_detil_ar->WKTXT;

				$data['sar']  	= $dfd;
				$data['spa']  	= $cfd;
				$data['nojop']  = $nojoskl;

				//var_dump($data['sar']);
				//exit();

				$data['skrg'] = date("d-m-Y H:i:s");
				$message = $this->load->view('addjo/email.php', $data, TRUE); // this will return you html data as message
				$subject = 'Notifikasi Pengajuan JO - Penyesuaian Skema';

				// $post = array(
				// 'token'			=> 'ish@!notif',
				// 'appsenderid'	=> '9',
				// 'to'			=> $test,
				// 'subject'		=> $subject,
				// 'body'			=> $message
				// );

				// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
				// $this->curl->post($post);
				// $response = json_decode($this->curl->execute());

				$this->sendmail($test, $message, $subject);

				// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);

				//echo $hasilkirim;
			}
			// else
			// {
			//echo "Data Tersimpan";


			/*
				$check = $this->job_model->get_email_manar_rep($arear, $perar);
				if(empty($check)){
					$chuck = $this->job_model->get_email_manar_repX($arear, $perar);
					
					$tust = array();
					foreach ($chuck as $val) {
						$tust[] = $val['email'];
					}
					
					$dfd = $cek_detil_ar->BTRTX;
					$cfd = $cek_detil_ar->WKTXT;
					
					$data['sar']  	= $dfd; 
					$data['spa']  	= $cfd;
					$data['nojop']  = $nojoskl;
					
					$data['skrg'] = date("d-m-Y H:i:s");
					
					$message = $this->load->view('addjo/email.php',$data,TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($tust,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
				}
				else {
					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}
					
					$dfd = $cek_detil_ar->BTRTX;
					$cfd = $cek_detil_ar->WKTXT;
					
					$data['sar']  	= $dfd; 
					$data['spa']  	= $cfd;
					$data['nojop']  = $nojoskl;
					
					$data['skrg'] = date("d-m-Y H:i:s");
					
					$message = $this->load->view('addjo/email.php',$data,TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
				}
				*/

			// $check = $this->job_model->get_email_pm();
			// foreach ($check as $val) {
			// $test = $val['email'];

			// $checkox = $this->job_model->get_detail_createrx($nojoskl);
			// $data['type']  	  = 'Penyesuaian Skema';
			// $data['nama']  	  = $checkox->nama; 
			// $data['nojoz'] 	  = $nojoskl;

			// $data['skrg'] = date("d-m-Y H:i:s");
			// $message = $this->load->view('addjo/email_new.php',$data,TRUE); // this will return you html data as message
			// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO',$message);
			// echo "Data Telah Di Approve";
			// }
			// }
		}

		if ($data['level'] != '1') {
			$check = $this->job_model->newget_email_pm();
			foreach ($check as $valx => $val) {
				$test = $val['email'];

				$checkox = $this->job_model->get_detail_createrx($nojoskl);
				$data['type']  	  = 'Penyesuaian Skema';
				$data['nama']  	  = $checkox->nama;
				$data['nojoz'] 	  = $nojoskl;

				$data['skrg'] = date("d-m-Y H:i:s");
				$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
				$subject = 'Notifikasi Pengajuan JO - Penyesuaian Skema';

				// $post = array(
				// 'token'			=> 'ish@!notif',
				// 'appsenderid'	=> '9',
				// 'to'			=> $test,
				// 'subject'		=> 'Notifikasi Pengajuan JO - Penyesuaian Skema',
				// 'body'			=> $message
				// );

				// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
				// $this->curl->post($post);
				// $response = json_decode($this->curl->execute());

				$this->sendmail($test, $message, $subject);

				// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO - Penyesuaian Skema',$message);
			}
		}
	}





	function urincian_simpanxxx()
	{
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$session_data 	= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['jabatan'] 		= $session_data['jabatan'];
		$data['regional'] 		= $session_data['regional'];
		$date_now 		= date("YmdHi");

		$xdatex = date('dm');

		$nojoskl = "";
		$consklx = '/SKEMA-ISH/' . $xdatex . '/';
		$conskl = '/SKEMA-ISH/01010107/';
		$year = date('Y');

		$nojobskl = $this->job_model->get_insertjosk();
		if ($nojobskl == 0) {
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
		$conskx = 'SKEMAISH' . $xdatex;
		$consk = 'SKEMAISH01010107';
		$year = date('Y');

		$nojobsk = $this->job_model->get_insertjosk();
		if ($nojobsk == 0) {
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

		if ($ext == '') {
			$file_name  = "";
		} else {
			$file_name  = "skema_" . $nojosk . "_" . $date_now . "." . $ext;
		}

		if ($ext2 == '') {
			$file_name2  = "";
		} else {
			$file_name2 = "bak_" . $nojosk . "_" . $date_now . "." . $ext2;
		}

		if ($ext3 == '') {
			$file_name3  = "";
		} else {
			$file_name3 = "other_" . $nojosk . "_" . $date_now . "." . $ext3;
		}


		//$bvc = $_POST['choosen'];
		$hjk   = array("skema", "bak", "other");
		//$abc = $_FILES['komp']['name'][0];
		//var_dump($cho);exit();
		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			$target_path = "/mnt/drobo/88.41/uploads/";
			$ext = explode('.', basename($_FILES['komp']['name'][$i]));
			//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 
			$target_path = $target_path . $hjk[$i] . "_" . $nojosk . "_" . $date_now . "." . $ext[count($ext) - 1];

			if (move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
				//echo "The file has been uploaded successfully <br />";
			} else {
				//echo "There was an error uploading the file, please try again! <br />";
			}
		}


		foreach ($_POST['choosen'] as $key => $list) {
			$cho   = $list;
			$chos  = explode("#", $cho);
			$perar = $chos[0];
			$arear = $chos[1];

			$cek_detil_ar = $this->skema_model->nama_arper($perar, $arear);

			//var_dump($cek_detil_ar->BTRTX);var_dump($cek_detil_ar->WKTXT);exit();

			$item = array(
				'nojo'				=> $nojoskl,
				'area' 				=> $arear,
				'n_area' 			=> $cek_detil_ar->btrtx,
				'perar' 			=> $perar,
				'n_perar' 			=> $cek_detil_ar->wktxt,
				'dokumen_skema' 	=> $file_name,
				'dokumen_bak' 		=> $file_name2,
				'dokumen_other' 	=> $file_name3,
				'upd' 				=> $data['username'],
				'lup' 				=> date("Y-m-d H:i:s"),
				'flag_approval' 	=> 1,
				'no_bak' 			=> $_POST['nobak'],
				'variabel' 			=> 1,
				'nama_pembayaran'	=> $_POST['nmbay'],
				'tgl_input' 		=> date('Y-m-d'),
				'kd_cust' 			=> $_POST['sncust']
			);

			//var_dump($item);exit();
			$this->load->database('db_third', false);
			$this->load->database('default', TRUE);
			$this->job_model->s_rincian_simpanx($item);


			$check = $this->job_model->newget_email_pm();
			foreach ($check as $val) {
				$test = $val['email'];

				$checkox = $this->job_model->get_detail_createrx($nojoskl);
				$data['type']  	  = 'Penyesuaian Skema';
				$data['nama']  	  = $checkox->nama;
				$data['nojoz'] 	  = $nojoskl;

				$data['skrg'] = date("d-m-Y H:i:s");
				$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
				$subject = 'Notifikasi Pengajuan JO Replacement';
				// $post = array(
				// 'token'			=> 'ish@!notif',
				// 'appsenderid'	=> '9',
				// 'to'			=> $test,
				// 'subject'		=> 'Notifikasi Pengajuan JO Replacement',
				// 'body'			=> $message
				// );

				// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
				// $this->curl->post($post);
				// $response = json_decode($this->curl->execute());	

				$this->sendmail($test, $message, $subject);

				// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO - Penyesuaian Variabel',$message);
				echo "Data Telah Di Approve";
			}
		}
	}



	function s_edit_simpan_allx()
	{

		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['username'] = $session_data['username'];
		$nama	 		= $session_data['nama'];
		$data['regional'] 		= $session_data['regional'];
		$data['nama'] 	= $session_data['nama'];
		$data['level'] 	= $session_data['level'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		// $rec 	= $this->input->post('joborder[8]');
		// var_dump($rec);exit();
		$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
		$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));



		if ($this->input->post('joborder[7]') == 2) {
			$tglbek = date('Y-m-d', strtotime('5 weekdays'));
		} else {
			$tglbek = date('Y-m-d', strtotime('14 weekdays'));
		}

		$cek_rinc = $this->job_model->cek_rinc_edit($this->input->post('joborder[10]'));
		if ($cek_rinc <= 0) {
			if ($this->input->post('joborder[8]') == 'X') {
				echo "Gagal";
				die;
			}
		}

		$typere = $this->input->post('joborder[9]');
		if ($data['level'] == '1') {
			$sl = 0;
			$ls = 0;
			if ($typere == '1') {
				$zx = 0;
			} else {
				$zx = 0;
			}
		} else {
			$sl = 1;
			$ls = 1;
			if ($typere == '1') {
				$zx = 1;
			} else {
				$zx = 0;
			}
		}

		$item1 = array(
			'nojo' => $this->input->post('joborder[10]')
		);

		$tyu = $this->input->post('joborder[7]');
		$tne = $this->input->post('joborder[14]');
		if (($tyu == 2) || ($tyu == 4)) {
			$qwep = $this->input->post('joborder[12]');
			$lalalili = $this->input->post('joborder[13]');
		} else if ($tyu == 1) {
			if ($tne == 1) {
				$qwep = $this->input->post('joborder[1]');
				$lalalili = '';
			} else {
				$qwep = $this->input->post('joborder[12]');
				$lalalili = $this->input->post('joborder[13]');
			}
		}

		if ($this->input->post('joborder[22]') == 'INF') {
			$tperal = '1';
		} else {
			$tperal = '0';
		}

		$tgl_skrg = date('Y-m-d');

		$asdf = $this->input->post('joborder[11]');
		if ($asdf == 'atasan') {
			if ($this->input->post('joborder[12]') != '') {
				$ilangtitik = str_replace('.', '', $this->input->post('joborder[26]'));
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'start_project' => $this->input->post('joborder[24]'),
					'end_project' => $this->input->post('joborder[25]'),
					// 'nilai_project' => $this->input->post('joborder[26]'),
					'nilai_project' => $ilangtitik,
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					// 'latihan' 	=> $this->input->post('joborder[5]'),
					// 'bekerja' 	=> $this->input->post('joborder[6]'),		
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'lup' 		=> date("Y-m-d H:i:s"),
					'flag_edit' => '1',
					'upd_edit' => $data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					// 'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					// 'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'flag_peralihan' => $tperal
				);
			} else {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'start_project' => $this->input->post('joborder[24]'),
					'end_project' => $this->input->post('joborder[25]'),
					'nilai_project' => $this->input->post('joborder[26]'),
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					// 'latihan' 	=> $this->input->post('joborder[5]'),
					// 'bekerja' 	=> $this->input->post('joborder[6]'),	
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'lup' 		=> date("Y-m-d H:i:s"),
					'flag_edit' => '1',
					'upd_edit' => $data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					// 'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'flag_peralihan' => $tperal
				);
			}
		} else {
			if ($this->input->post('joborder[12]') != '') {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'start_project' => $this->input->post('joborder[24]'),
					'end_project' => $this->input->post('joborder[25]'),
					'nilai_project' => $this->input->post('joborder[26]'),
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					// 'latihan' 	=> $this->input->post('joborder[5]'),
					// 'bekerja' 	=> $this->input->post('joborder[6]'),
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1,
					'upd_edit' 			=> $session_data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					// 'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'flag_peralihan' => $tperal
				);
			} else {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'start_project' => $this->input->post('joborder[24]'),
					'end_project' => $this->input->post('joborder[25]'),
					'nilai_project' => $this->input->post('joborder[26]'),
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					// 'latihan' 	=> $this->input->post('joborder[5]'),
					// 'bekerja' 	=> $this->input->post('joborder[6]'),
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1,
					'upd_edit' 			=> $session_data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					// 'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'flag_peralihan' => $tperal
				);
			}
		}


		$this->job_model->edit_all($item, $item1);

		$putihh1 = array(
			'nojo' 		=> $this->input->post('joborder[10]'),
			'flag_rej'	=> 1
		);

		$putihh = array(
			'flag_rej'	=> 2,
			'flag_edit'	=> 1,
			'upd_edit'	=> $session_data['username'],
			'lup_edit'	=> date("Y-m-d H:i:s")
		);

		$this->job_model->edit_all3($putihh, $putihh1);


		$itemw = array(
			'doc_id' => $this->input->post('joborder[18]'),
			'upd' => $username,
			'lup' => date("Y-m-d H:i:s")
		);

		$this->job_model->edit_proc($itemw, $item1);


		//var_dump($item1);var_dump($item);
		//exit();
		$cekskem = $this->db->query("SELECT detail_komp FROM trans_rincian WHERE nojo='" . $this->input->post('joborder[10]') . "' ORDER BY detail_komp DESC LIMIT 1")->row();
		if (is_null($cekskem->detail_komp) || $cekskem->detail_komp == 0) {
			$mulaiskem = 1;
		} else {
			$mulaiskem = $cekskem->detail_komp;
		}

		$rec 	= $this->input->post('joborder[8]');
		if ($rec != 'X') {
			$rec	= explode(",", $rec);
			$loop = count($rec) / 25;
			$loopx = $loop - 1;
			if ($loopx) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$o = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				$r = 16;
				$s = 17;
				$t = 18;
				$u = 19;
				$v = 20;
				$w = 21;
				$x = 22;
				$y = 23;
				$z = 24;
				for ($i = 0; $i < $loopx; $i++) {
					$mulaiskem += 1;

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

					$aabb	= explode("-", $rec[$y]);

					$stxt = explode(" | ", $rec[$l]);
					$iteml = array(
						'nojo' => $this->input->post('joborder[10]'),
						'jenis_skema' => $rec[$x],
						'detail_komp' => $rec[$z],
						// 'detail_komp' => $mulaiskem,
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
						'kd_rotasi' => $aabb[1],
						'kd_reason' => $aabb[0],
						'train_soft' => $ca,
						'train_hard' => $cb,
						'tendem_pasif' => $cc,
						'tendem_aktif' => $cd,
						'tgl_latihan' => $rec[$t],
						'tgl_bekerja' => $rec[$u],
						'perner_norekrut' => $rec[$w],
						'type_rekrut' => $rec[$v]
					);
					$this->db->insert('trans_rincian', $iteml);

					$a = $a + 25;
					$b = $b + 25;
					$c = $c + 25;
					$d = $d + 25;
					$e = $e + 25;
					$f = $f + 25;
					$g = $g + 25;
					$h = $h + 25;
					$o = $o + 25;
					$j = $j + 25;
					$k = $k + 25;
					$l = $l + 25;
					$m = $m + 25;
					$n = $n + 25;
					$p = $p + 25;
					$q = $q + 25;
					$r = $r + 25;
					$s = $s + 25;
					$t = $t + 25;
					$u = $u + 25;
					$v = $v + 25;
					$w = $w + 25;
					$x = $x + 25;
					$y = $y + 25;
					$y = $y + 25;
					$z = $z + 25;
				}
			}
		}


		$reckom 	= $this->input->post('joborder[16]');
		if ($reckom != '') {
			$reckom	= explode(",", $reckom);
			$loops = count($reckom) / 16;
			$loopsx = $loops - 1;
			if ($loopsx) {
				//$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; $i = 8; $j = 9; $k = 10; 
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$i = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				for ($z = 0; $z < $loopsx; $z++) {
					$mulaiskem += 1;

					$loks = explode(" | ", $reckom[$c]);
					$jabs = explode(" | ", $reckom[$a]);
					//$levs = explode(" | ",$reckom[$i]);
					$komps = explode(" | ", $reckom[$e]);
					$xxxe = explode(" | ", $reckom[$p]);

					if (($reckom[$q] != '') and ($reckom[$q] != 'NULL') and $reckom[$q] <= 500) {
						$iteml = array(
							'detail_komp' => $reckom[$q],
							// 'detail_komp' => $mulaiskem,
							'nojo' => $this->input->post('joborder[10]'),
							'area' => $reckom[$d],
							'area_txt' => $reckom[$c],
							'jabatan' => $reckom[$b],
							'jabatan_txt' => $reckom[$a],
							'level' => $reckom[$l],
							'level_txt' => $reckom[$m],
							'skill' => $reckom[$n],
							'skill_text' => $xxxe[1],
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
					} else {
						$iteml = array(
							'detail_komp' => $reckom[$q],
							'nojo' => $this->input->post('joborder[10]'),
							'area' => $reckom[$d],
							'area_txt' => $reckom[$c],
							'jabatan' => $reckom[$b],
							'jabatan_txt' => $reckom[$a],
							'level' => $reckom[$l],
							'level_txt' => $reckom[$m],
							'skill' => $reckom[$n],
							'skill_text' => $xxxe[1],
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
					}


					$this->db->insert('trans_komponen', $iteml);

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


		$recproc 	= $this->input->post('joborder[17]');
		if ($recproc != '') {
			$recproc		= explode(",", $recproc);
			$loops = count($recproc) / 9;
			if ($loops) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				for ($z = 0; $z < $loops; $z++) {
					if ($recproc[$e] != '') {
						$iteml = array(
							'nojo' => $this->input->post('joborder[10]'),
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
						$this->db->insert('trans_proc', $iteml);

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
		}


		$asdf = $this->input->post('joborder[11]');
		if ($asdf == 'atasan') {
			if ($data['level'] == 1) {
				$check = $this->job_model->get_email();
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				$data['nojoz'] = $this->input->post('joborder[10]');
				$data['nama']   = $session_data['nama'];
				$data['skrg'] = date("d-m-Y H:i:s");

				$data['abcd'] = 2;

				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);
				echo $hasilkirim;
			} else {
				$check = $this->job_model->newget_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$data['nojoz'] = $this->input->post('joborder[8]');
					$data['nama']   = $session_data['nama'];
					$data['skrg'] = date("d-m-Y H:i:s");

					$data['abcd'] = 2;

					$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);
					echo $hasilkirim;
				}
			}
		} else {
			$check = $this->job_model->newget_email_pm();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];

				$data['nojoz']  = $this->input->post('joborder[10]');
				$data['nama']   = $session_data['nama'];

				$data['skrg'] = date("d-m-Y H:i:s");

				$data['abcd'] = 2;

				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);

				echo $hasilkirim;
			}
		}
	}



	function new_s_edit_simpan_allx()
	{

		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['username'] = $session_data['username'];
		$nama	 		= $session_data['nama'];
		$data['regional'] 		= $session_data['regional'];
		$data['nama'] 	= $session_data['nama'];
		$data['level'] 	= $session_data['level'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		// $rec 	= $this->input->post('joborder[8]');
		// var_dump($rec);exit();
		$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
		$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));



		if ($this->input->post('joborder[7]') == 2) {
			$tglbek = date('Y-m-d', strtotime('5 weekdays'));
		} else {
			$tglbek = date('Y-m-d', strtotime('14 weekdays'));
		}

		$cek_rinc = $this->job_model->cek_rinc_edit($this->input->post('joborder[10]'));
		if ($cek_rinc <= 0) {
			if ($this->input->post('joborder[8]') == 'X') {
				echo "Gagal";
				die;
			}
		}

		$typere = $this->input->post('joborder[9]');
		if ($data['level'] == '1') {
			$sl = 0;
			$ls = 0;
			if ($typere == '1') {
				$zx = 0;
			} else {
				$zx = 0;
			}
		} else {
			$sl = 1;
			$ls = 1;
			if ($typere == '1') {
				$zx = 1;
			} else {
				$zx = 0;
			}
		}

		$item1 = array(
			'nojo' => $this->input->post('joborder[10]')
		);

		$tyu = $this->input->post('joborder[7]');
		$tne = $this->input->post('joborder[14]');
		if (($tyu == 2) || ($tyu == 4)) {
			$qwep = $this->input->post('joborder[12]');
			$lalalili = $this->input->post('joborder[13]');
		} else if ($tyu == 1) {
			if ($tne == 1) {
				$qwep = $this->input->post('joborder[1]');
				$lalalili = '';
			} else {
				$qwep = $this->input->post('joborder[12]');
				$lalalili = $this->input->post('joborder[13]');
			}
		}

		if ($this->input->post('joborder[22]') == 'INF') {
			$tperal = '1';
		} else {
			$tperal = '0';
		}

		$tgl_skrg = date('Y-m-d');

		$asdf = $this->input->post('joborder[11]');
		if ($asdf == 'atasan') {
			if ($this->input->post('joborder[12]') != '') {
				$ilangtitik = str_replace('.', '', $this->input->post('joborder[26]'));
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'start_project' => $this->input->post('joborder[24]'),
					'end_project' => $this->input->post('joborder[25]'),
					// 'nilai_project' => $this->input->post('joborder[26]'),
					'nilai_project' => $ilangtitik,
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					// 'latihan' 	=> $this->input->post('joborder[5]'),
					// 'bekerja' 	=> $this->input->post('joborder[6]'),		
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'lup' 		=> date("Y-m-d H:i:s"),
					'flag_edit' => '1',
					'upd_edit' => $data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					// 'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					// 'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'pks' => $this->input->post('joborder[27]'),
					'flag_peralihan' => $tperal
				);
			} else {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'start_project' => $this->input->post('joborder[24]'),
					'end_project' => $this->input->post('joborder[25]'),
					'nilai_project' => $this->input->post('joborder[26]'),
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					// 'latihan' 	=> $this->input->post('joborder[5]'),
					// 'bekerja' 	=> $this->input->post('joborder[6]'),	
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'lup' 		=> date("Y-m-d H:i:s"),
					'flag_edit' => '1',
					'upd_edit' => $data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					// 'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'pks' => $this->input->post('joborder[27]'),
					'flag_peralihan' => $tperal
				);
			}
		} else {
			if ($this->input->post('joborder[12]') != '') {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'start_project' => $this->input->post('joborder[24]'),
					'end_project' => $this->input->post('joborder[25]'),
					'nilai_project' => $this->input->post('joborder[26]'),
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					// 'latihan' 	=> $this->input->post('joborder[5]'),
					// 'bekerja' 	=> $this->input->post('joborder[6]'),
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1,
					'upd_edit' 			=> $session_data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					// 'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'pks' => $this->input->post('joborder[27]'),
					'flag_peralihan' => $tperal
				);
			} else {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'start_project' => $this->input->post('joborder[24]'),
					'end_project' => $this->input->post('joborder[25]'),
					'nilai_project' => $this->input->post('joborder[26]'),
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					// 'latihan' 	=> $this->input->post('joborder[5]'),
					// 'bekerja' 	=> $this->input->post('joborder[6]'),
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1,
					'upd_edit' 			=> $session_data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					// 'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'pks' => $this->input->post('joborder[27]'),
					'flag_peralihan' => $tperal
				);
			}
		}


		$this->job_model->edit_all($item, $item1);

		$putihh1 = array(
			'nojo' 		=> $this->input->post('joborder[10]'),
			'flag_rej'	=> 1
		);

		$putihh = array(
			'flag_rej'	=> 2,
			'flag_edit'	=> 1,
			'upd_edit'	=> $session_data['username'],
			'lup_edit'	=> date("Y-m-d H:i:s")
		);

		$this->job_model->edit_all3($putihh, $putihh1);


		$itemw = array(
			'doc_id' => $this->input->post('joborder[18]'),
			'upd' => $username,
			'lup' => date("Y-m-d H:i:s")
		);

		$this->job_model->edit_proc($itemw, $item1);


		//var_dump($item1);var_dump($item);
		//exit();
		$cekskem = $this->db->query("SELECT detail_komp FROM trans_rincian WHERE nojo='" . $this->input->post('joborder[10]') . "' ORDER BY detail_komp DESC LIMIT 1")->row();
		if (is_null($cekskem->detail_komp) || $cekskem->detail_komp == 0) {
			$mulaiskem = 1;
		} else {
			$mulaiskem = $cekskem->detail_komp;
		}

		$rec 	= $this->input->post('joborder[8]');
		if ($rec != 'X') {
			$rec	= explode(",", $rec);
			$loop = count($rec) / 26;
			$loopx = $loop - 1;
			if ($loopx) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$o = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				$r = 16;
				$s = 17;
				$t = 18;
				$u = 19;
				$v = 20;
				$w = 21;
				$x = 22;
				$y = 23;
				$z = 24;
				$aa = 25;
				for ($i = 0; $i < $loopx; $i++) {
					$mulaiskem += 1;

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

					$aabb	= explode("-", $rec[$y]);

					$stxt = explode(" | ", $rec[$l]);
					$iteml = array(
						'nojo' => $this->input->post('joborder[10]'),
						'jenis_skema' => $rec[$x],
						'detail_komp' => $rec[$z],
						// 'detail_komp' => $mulaiskem,
						'jabatan' => $rec[$a],
						'gender' => $rec[$b],
						'pendidikan' => $rec[$c],
						'lokasi' => $rec[$d],
						'waktu' => $rec[$e],
						'atasan' => $rec[$f],
						'kontrak' => $rec[$g],
						'jenis_pkwt' => $rec[$aa],
						'jumlah' => $rec[$h],
						'skema' => '0',
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s"),
						'flag_app' => '0',
						'level' => $rec[$o],
						//'level_txt' => $ltxt[1],
						'skilllayanan' => $rec[$k],
						'skilllayanan_txt' => $stxt[0],
						'kd_rotasi' => $aabb[1],
						'kd_reason' => $aabb[0],
						'train_soft' => $ca,
						'train_hard' => $cb,
						'tendem_pasif' => $cc,
						'tendem_aktif' => $cd,
						'tgl_latihan' => $rec[$t],
						'tgl_bekerja' => $rec[$u],
						'perner_norekrut' => $rec[$w],
						'type_rekrut' => $rec[$v]
					);
					$this->db->insert('trans_rincian', $iteml);

					$a = $a + 26;
					$b = $b + 26;
					$c = $c + 26;
					$d = $d + 26;
					$e = $e + 26;
					$f = $f + 26;
					$g = $g + 26;
					$h = $h + 26;
					$o = $o + 26;
					$j = $j + 26;
					$k = $k + 26;
					$l = $l + 26;
					$m = $m + 26;
					$n = $n + 26;
					$p = $p + 26;
					$q = $q + 26;
					$r = $r + 26;
					$s = $s + 26;
					$t = $t + 26;
					$u = $u + 26;
					$v = $v + 26;
					$w = $w + 26;
					$x = $x + 26;
					$y = $y + 26;
					$y = $y + 26;
					$z = $z + 26;
					$aa = $aa + 26;
				}
			}
		}


		$reckom 	= $this->input->post('joborder[16]');
		if ($reckom != '') {
			$reckom	= explode(",", $reckom);
			$loops = count($reckom) / 18;
			$loopsx = $loops - 1;
			if ($loopsx) {
				//$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; $i = 8; $j = 9; $k = 10; 
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$i = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				$r = 16;
				$s = 17;
				for ($z = 0; $z < $loopsx; $z++) {
					$mulaiskem += 1;

					$loks = explode(" | ", $reckom[$c]);
					$jabs = explode(" | ", $reckom[$a]);
					//$levs = explode(" | ",$reckom[$i]);
					$komps = explode(" | ", $reckom[$e]);
					$xxxe = explode(" | ", $reckom[$p]);

					if (($reckom[$q] != '') and ($reckom[$q] != 'NULL') and $reckom[$q] <= 500) {
						$iteml = array(
							'detail_komp' => $reckom[$q],
							// 'detail_komp' => $mulaiskem,
							'nojo' => $this->input->post('joborder[10]'),
							'area' => $reckom[$d],
							'area_txt' => $reckom[$c],
							'jabatan' => $reckom[$b],
							'jabatan_txt' => $reckom[$a],
							'level' => $reckom[$l],
							'level_txt' => $reckom[$m],
							'skill' => $reckom[$n],
							'skill_text' => $xxxe[1],
							//'jumlah' => $rec[$b],
							'ump' => $reckom[$j],
							'komponen' => $reckom[$f],
							'komponen_txt' => $reckom[$e],
							'value' => $reckom[$g],
							'hk_pembagi' => $reckom[$i],
							'keterangan' => $reckom[$h],
							'persentase' => $reckom[$k],
							'pengkali_tk' => $reckom[$r],
							'pengkali_kes' => $reckom[$s],
							'upd' => $username,
							'lup' => date("Y-m-d H:i:s")
						);
					} else {
						$iteml = array(
							'detail_komp' => $reckom[$q],
							'nojo' => $this->input->post('joborder[10]'),
							'area' => $reckom[$d],
							'area_txt' => $reckom[$c],
							'jabatan' => $reckom[$b],
							'jabatan_txt' => $reckom[$a],
							'level' => $reckom[$l],
							'level_txt' => $reckom[$m],
							'skill' => $reckom[$n],
							'skill_text' => $xxxe[1],
							//'jumlah' => $rec[$b],
							'ump' => $reckom[$j],
							'komponen' => $reckom[$f],
							'komponen_txt' => $reckom[$e],
							'value' => $reckom[$g],
							'hk_pembagi' => $reckom[$i],
							'keterangan' => $reckom[$h],
							'persentase' => $reckom[$k],
							'pengkali_tk' => $reckom[$r],
							'pengkali_kes' => $reckom[$s],
							'upd' => $username,
							'lup' => date("Y-m-d H:i:s")
						);
					}


					$this->db->insert('trans_komponen', $iteml);

					$a = $a + 18;
					$b = $b + 18;
					$c = $c + 18;
					$d = $d + 18;
					$e = $e + 18;
					$f = $f + 18;
					$g = $g + 18;
					$h = $h + 18;
					$i = $i + 18;
					$j = $j + 18;
					$k = $k + 18;
					$l = $l + 18;
					$m = $m + 18;
					$n = $n + 18;
					$p = $p + 18;
					$q = $q + 18;
					$r = $r + 18;
					$s = $s + 18;
				}
			}
		}


		$recproc 	= $this->input->post('joborder[17]');
		if ($recproc != '') {
			$recproc		= explode(",", $recproc);
			$loops = count($recproc) / 9;
			if ($loops) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				for ($z = 0; $z < $loops; $z++) {
					if ($recproc[$e] != '') {
						$iteml = array(
							'nojo' => $this->input->post('joborder[10]'),
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
						$this->db->insert('trans_proc', $iteml);

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
		}


		$asdf = $this->input->post('joborder[11]');
		if ($asdf == 'atasan') {
			if ($data['level'] == 1) {
				$check = $this->job_model->get_email();
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				$data['nojoz'] = $this->input->post('joborder[10]');
				$data['nama']   = $session_data['nama'];
				$data['skrg'] = date("d-m-Y H:i:s");

				$data['abcd'] = 2;
				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
				$subject = 'Notifikasi Edit JO';
				// $post = array(
				// 'token'			=> 'ish@!notif',
				// 'appsenderid'	=> '9',
				// 'to'			=> $test,
				// 'subject'		=> 'Notifikasi Edit JO',
				// 'body'			=> $message
				// );

				// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
				// $this->curl->post($post);
				// $response = json_decode($this->curl->execute());

				$this->sendmail($test, $message, $subject);

				// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Edit JO',$message);
				// echo $hasilkirim;
			} else {
				$check = $this->job_model->newget_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$data['nojoz'] = $this->input->post('joborder[8]');
					$data['nama']   = $session_data['nama'];
					$data['skrg'] = date("d-m-Y H:i:s");

					$data['abcd'] = 2;
					$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
					$subject = 'Notifikasi Edit JO';
					// $post = array(
					// 'token'			=> 'ish@!notif',
					// 'appsenderid'	=> '9',
					// 'to'			=> $test,
					// 'subject'		=> 'Notifikasi Edit JO',
					// 'body'			=> $message
					// );

					// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
					// $this->curl->post($post);
					// $response = json_decode($this->curl->execute());

					$this->sendmail($test, $message, $subject);

					// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Edit JO',$message);
					// echo $hasilkirim;
				}
			}
		} else {
			$check = $this->job_model->newget_email_pm();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];

				$data['nojoz']  = $this->input->post('joborder[10]');
				$data['nama']   = $session_data['nama'];

				$data['skrg'] = date("d-m-Y H:i:s");
				$data['abcd'] = 2;
				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
				$subject = 'Notifikasi Edit JO';
				// $post = array(
				// 'token'			=> 'ish@!notif',
				// 'appsenderid'	=> '9',
				// 'to'			=> $test,
				// 'subject'		=> 'Notifikasi Edit JO',
				// 'body'			=> $message
				// );

				// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
				// $this->curl->post($post);
				// $response = json_decode($this->curl->execute());

				$this->sendmail($test, $message, $subject);

				// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Edit JO',$message);
				// echo $hasilkirim;
			}
		}
	}



	function s_edit_simpan_all()
	{

		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['username'] = $session_data['username'];
		$nama	 		= $session_data['nama'];
		$data['regional'] 		= $session_data['regional'];
		$data['nama'] 	= $session_data['nama'];
		$data['level'] 	= $session_data['level'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		//$rec 	= $this->input->post('joborder[8]');
		//var_dump($rec);exit();
		$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
		$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));

		if ($this->input->post('joborder[7]') == 2) {
			$tglbek = date('Y-m-d', strtotime('5 weekdays'));
		} else {
			$tglbek = date('Y-m-d', strtotime('14 weekdays'));
		}

		$typere = $this->input->post('joborder[9]');
		if ($data['level'] == '1') {
			$sl = 0;
			$ls = 0;
			if ($typere == '1') {
				$zx = 0;
			} else {
				$zx = 0;
			}
		} else {
			$sl = 1;
			$ls = 1;
			if ($typere == '1') {
				$zx = 1;
			} else {
				$zx = 0;
			}
		}

		$item1 = array(
			'nojo' => $this->input->post('joborder[10]')
		);

		$tyu = $this->input->post('joborder[7]');
		$tne = $this->input->post('joborder[14]');
		if (($tyu == 2) || ($tyu == 4)) {
			$qwep = $this->input->post('joborder[12]');
			$lalalili = $this->input->post('joborder[13]');
		} else if ($tyu == 1) {
			if ($tne == 1) {
				$qwep = $this->input->post('joborder[1]');
				$lalalili = '';
			} else {
				$qwep = $this->input->post('joborder[12]');
				$lalalili = $this->input->post('joborder[13]');
			}
		}

		if ($this->input->post('joborder[22]') == 'INF') {
			$tperal = '1';
		} else {
			$tperal = '0';
		}

		$tgl_skrg = date('Y-m-d');

		$asdf = $this->input->post('joborder[11]');
		if ($asdf == 'atasan') {
			if ($this->input->post('joborder[12]') != '') {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					'latihan' 	=> $this->input->post('joborder[5]'),
					'bekerja' 	=> $this->input->post('joborder[6]'),
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'lup' 		=> date("Y-m-d H:i:s"),
					'flag_edit' => '1',
					'upd_edit' => $data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'flag_peralihan' => $tperal
				);
			} else {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					'latihan' 	=> $this->input->post('joborder[5]'),
					'bekerja' 	=> $this->input->post('joborder[6]'),
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'lup' 		=> date("Y-m-d H:i:s"),
					'flag_edit' => '1',
					'upd_edit' => $data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'flag_peralihan' => $tperal
				);
			}
		} else {
			if ($this->input->post('joborder[12]') != '') {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					'latihan' 	=> $this->input->post('joborder[5]'),
					'bekerja' 	=> $this->input->post('joborder[6]'),
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1,
					'upd_edit' 			=> $session_data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'flag_peralihan' => $tperal
				);
			} else {
				$item = array(
					// 'tanggal' 	=> $this->input->post('joborder[0]'),
					// 'tanggal' 	=> $tgl_skrg,
					'project' 	=> $qwep,
					'n_project' => $lalalili,
					'syarat' 	=> $this->input->post('joborder[2]'),
					'deskripsi' => $this->input->post('joborder[3]'),
					'lama' 		=> $this->input->post('joborder[4]'),
					'latihan' 	=> $this->input->post('joborder[5]'),
					'bekerja' 	=> $this->input->post('joborder[6]'),
					'bekerja_edit' 	=> $data['tgbekerja'],
					'approval' 	=> $sl,
					'jenis_captive' 	=> $this->input->post('joborder[23]'),
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1,
					'upd_edit' 			=> $session_data['username'],
					'lup_edit' => date("Y-m-d H:i:s"),
					'type_replace' => $this->input->post('joborder[9]'),
					'type_new' => $this->input->post('joborder[14]'),
					'no_bak'   => $this->input->post('joborder[15]'),
					'new_rekrut' => $this->input->post('joborder[21]'),
					'kode_cust' => $this->input->post('joborder[19]'),
					'nama_cust' => $this->input->post('joborder[20]'),
					'flag_peralihan' => $tperal
				);
			}
		}


		$this->job_model->edit_all($item, $item1);

		$putihh1 = array(
			'nojo' 		=> $this->input->post('joborder[10]'),
			'flag_rej'	=> 1
		);

		$putihh = array(
			'flag_rej'	=> 2,
			'flag_edit'	=> 1,
			'upd_edit'	=> $session_data['username'],
			'lup_edit'	=> date("Y-m-d H:i:s")
		);

		$this->job_model->edit_all3($putihh, $putihh1);


		$itemw = array(
			'doc_id' => $this->input->post('joborder[18]'),
			'upd' => $username,
			'lup' => date("Y-m-d H:i:s")
		);

		$this->job_model->edit_proc($itemw, $item1);


		//var_dump($item1);var_dump($item);
		//exit();


		$rec 	= $this->input->post('joborder[8]');
		if ($rec != '') {
			$rec	= explode(",", $rec);
			$loop = count($rec) / 17;
			$loopx = $loop - 1;
			if ($loopx) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$o = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				$r = 16;
				for ($i = 0; $i < $loopx; $i++) {
					if (strpos($rec[$r], '1') !== false) {
						$ca = 1;
					} else {
						$ca = 0;
					}

					if (strpos($rec[$r], '2') !== false) {
						$cb = 1;
					} else {
						$cb = 0;
					}

					if (strpos($rec[$r], '3') !== false) {
						$cc = 1;
					} else {
						$cc = 0;
					}

					if (strpos($rec[$r], '4') !== false) {
						$cd = 1;
					} else {
						$cd = 0;
					}

					$stxt = explode(" | ", $rec[$l]);
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
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s"),
						'flag_app' => $zx,
						'level' => $rec[$o],
						//'level_txt' => $ltxt[1],
						'skilllayanan' => $rec[$k],
						'skilllayanan_txt' => $stxt[1],
						'train_soft' => $ca,
						'train_hard' => $cb,
						'tendem_pasif' => $cc,
						'tendem_aktif' => $cd,
						'flag_newrej' => 1,
						'lup_newrej' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_rincian', $iteml);

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
		}


		$reckom 	= $this->input->post('joborder[16]');
		if ($reckom != '') {
			$reckom	= explode(",", $reckom);
			$loops = count($reckom) / 16;
			$loopsx = $loops - 1;
			if ($loopsx) {
				//$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; $i = 8; $j = 9; $k = 10; 
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$i = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				for ($z = 0; $z < $loopsx; $z++) {
					$loks = explode(" | ", $reckom[$c]);
					$jabs = explode(" | ", $reckom[$a]);
					//$levs = explode(" | ",$reckom[$i]);
					$komps = explode(" | ", $reckom[$e]);
					$xxxe = explode(" | ", $reckom[$p]);

					if (($reckom[$q] != '') and ($reckom[$q] != 'NULL')) {
						$iteml = array(
							'detail_komp' => $reckom[$q],
							'nojo' => $this->input->post('joborder[10]'),
							'area' => $reckom[$d],
							'area_txt' => $reckom[$c],
							'jabatan' => $reckom[$b],
							'jabatan_txt' => $reckom[$a],
							'level' => $reckom[$l],
							'level_txt' => $reckom[$m],
							'skill' => $reckom[$n],
							'skill_text' => $xxxe[1],
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
					} else {
						$iteml = array(
							'nojo' => $this->input->post('joborder[10]'),
							'area' => $reckom[$d],
							'area_txt' => $reckom[$c],
							'jabatan' => $reckom[$b],
							'jabatan_txt' => $reckom[$a],
							'level' => $reckom[$l],
							'level_txt' => $reckom[$m],
							'skill' => $reckom[$n],
							'skill_text' => $xxxe[1],
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
					}


					$this->db->insert('trans_komponen', $iteml);

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


		$recproc 	= $this->input->post('joborder[17]');
		if ($recproc != '') {
			$recproc		= explode(",", $recproc);
			$loops = count($recproc) / 9;
			if ($loops) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				for ($z = 0; $z < $loops; $z++) {
					if ($recproc[$e] != '') {
						$iteml = array(
							'nojo' => $this->input->post('joborder[10]'),
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
						$this->db->insert('trans_proc', $iteml);

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
		}


		$asdf = $this->input->post('joborder[11]');
		if ($asdf == 'atasan') {
			if ($data['level'] == 1) {
				$check = $this->job_model->get_email();
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				$data['nojoz'] = $this->input->post('joborder[10]');
				$data['nama']   = $session_data['nama'];
				$data['skrg'] = date("d-m-Y H:i:s");

				$data['abcd'] = 2;

				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);
				echo $hasilkirim;
			} else {
				$check = $this->job_model->get_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$data['nojoz'] = $this->input->post('joborder[8]');
					$data['nama']   = $session_data['nama'];
					$data['skrg'] = date("d-m-Y H:i:s");

					$data['abcd'] = 2;

					$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);
					echo $hasilkirim;
				}
			}
		} else {
			$check = $this->job_model->get_email_sap();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];

				$data['nojoz']  = $this->input->post('joborder[10]');
				$data['nama']   = $session_data['nama'];

				$data['skrg'] = date("d-m-Y H:i:s");

				$data['abcd'] = 2;

				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);

				echo $hasilkirim;
			}
		}
	}



	function s_perner_simpanx()
	{

		$session_data 		= $this->session->userdata('logged_in');
		$username 			= $session_data['username'];
		$data['username'] 	= $session_data['username'];
		$nama	 			= $session_data['nama'];
		$data['regional'] 	= $session_data['regional'];
		$data['nama'] 		= $session_data['nama'];
		$data['level'] 		= $session_data['level'];
		$date_now 			= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
		$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));

		if ($this->input->post('joborder[4]') == 2) {
			$tglbek = date('Y-m-d', strtotime('5 weekdays'));
		} else {
			$tglbek = date('Y-m-d', strtotime('14 weekdays'));
		}

		$typere = $this->input->post('joborder[5]');
		if ($data['level'] == '1') {
			$lat = '';
			$uat = '';
			$jkp = 0;
			if ($typere == '1') {
				$zx = 0;
			} else {
				$zx = 0;
			}
		} else {
			$lat = date("Y-m-d H:i:s");
			$uat = $data['username'];
			$jkp = 1;
			if ($typere == '1') {
				$zx = 1;
			} else {
				$zx = 0;
			}
		}

		$item1 = array(
			'nojo' => $this->input->post('joborder[8]')
		);

		if ($this->input->post('joborder[10]') == 'INF') {
			$tperal = '1';
		} else {
			$tperal = '0';
		}


		$tgl_skrg = date('Y-m-d');
		$asdf = $this->input->post('joborder[7]');
		if ($asdf == 'atasan') {
			$item = array(
				// 'tanggal' 	=> $this->input->post('joborder[0]'),
				// 'tanggal' 	=> $tgl_skrg,
				'project'	 		=> '',
				'n_project' 		=> '',
				'lama' 				=> $this->input->post('joborder[1]'),
				// 'latihan' 			=> $this->input->post('joborder[2]'),
				// 'bekerja' 			=> $this->input->post('joborder[3]'),
				'bekerja_edit' 		=> $data['tgbekerja_rep'],
				'jenis_captive' 	=> $this->input->post('joborder[11]'),
				'approval' 			=> $jkp,
				'upd_atasan' 		=> $uat,
				'lupapp_atasan' 	=> $lat,
				'lup' 				=> date("Y-m-d H:i:s"),
				'flag_edit' 		=> '1',
				'upd_edit' 			=> $data['username'],
				'lup_edit' 			=> date("Y-m-d H:i:s"),
				// 'type_replace' 		=> $this->input->post('joborder[5]'),
				'no_bak'   			=> $this->input->post('joborder[6]'),
				'kode_cust' 		=> $this->input->post('joborder[12]'),
				'nama_cust' 		=> $this->input->post('joborder[13]'),
				'flag_peralihan' 	=> $tperal,
				'pks' 		=> $this->input->post('joborder[15]'),
			);
		} else {
			$item = array(
				// 'tanggal' 	=> $this->input->post('joborder[0]'),
				// 'tanggal' 	=> $tgl_skrg,
				'project' 			=> '',
				'n_project' 		=> '',
				'lama' 				=> $this->input->post('joborder[1]'),
				// 'latihan' 			=> $this->input->post('joborder[2]'),
				// 'bekerja' 			=> $this->input->post('joborder[3]'),
				'bekerja_edit' 		=> $data['tgbekerja_rep'],
				'jenis_captive' 	=> $this->input->post('joborder[11]'),
				'flag_cancel_sap' 	=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $session_data['username'],
				'lup_edit' 			=> date("Y-m-d H:i:s"),
				// 'type_replace' 		=> $this->input->post('joborder[5]'),
				'no_bak'   			=> $this->input->post('joborder[6]'),
				'kode_cust' 		=> $this->input->post('joborder[12]'),
				'nama_cust' 		=> $this->input->post('joborder[13]'),
				'flag_peralihan' 	=> $tperal,
				'pks' 		=> $this->input->post('joborder[15]'),
			);
		}

		$this->job_model->edit_all($item, $item1);

		$putih1 = array(
			'nojo' 		=> $this->input->post('joborder[8]'),
			'flag_rej'	=> 1
		);

		$putih = array(
			'flag_rej'	=> 2,
			'flag_edit'	=> 1,
			'upd_edit'	=> $session_data['username'],
			'lup_edit'	=> date("Y-m-d H:i:s")
		);

		// $this->job_model->edit_all2($putih, $putih1);
		$noobx = date("Y-m-d H:i:s");
		$nojobo = $this->input->post('joborder[8]');
		$this->db->query("Update trans_rincian Set flag_rej='2',flag_edit='1',upd_edit='" . $session_data['username'] . "',lup_edit='$noobx' WHERE nojo='$nojobo' AND (skema='0' OR skema!='1') ");


		$rec 	= $this->input->post('joborder[9]');
		if ($rec != '') {
			$rec	= explode(",", $rec);
			$loop = count($rec) / 26;
			$loopx = $loop - 1;
			if ($loopx) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$o = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				$r = 16;
				$s = 17;
				$t = 18;
				$u = 19;
				$v = 20;
				$w = 21;
				$x = 22;
				$y = 23;
				$z = 24;
				$az = 25;
				for ($i = 0; $i < $loopx; $i++) {
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
					$kdz = explode("-", $rec[$w]);

					$iteml = array(
						'nojo' => $this->input->post('joborder[8]'),
						'tgllatihan' => $rec[$s],
						'tglbekerja' => $rec[$t],
						'perner_ganti' => $rec[$r],
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
						'jabatan' => $rec[$u],
						'nm_jabatan' => $rec[$f],
						'abkrs' => $rec[$v],
						'cttyp' => $rec[$y],
						'ansvh' => $rec[$x],
						'trfgb' => $rec[$z],
						'skema' => '0',
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s"),
						'flag_app' => $zx,
						'tgl_resign' => $rec[$l],
						'train_soft' => $ca,
						'train_hard' => $cb,
						'tendem_pasif' => $cc,
						'tendem_aktif' => $cd,
						'rotasi_resign' => $rec[$p],
						'kodez_rotres' => $kdz[1],
						'alasan_rotres' => $kdz[0],
						'flag_newrej' => 1,
						'lup_newrej' => date("Y-m-d H:i:s"),
						'type_rep' => $rec[$q],
						'massn' => $rec[$az]
					);
					$this->db->insert('trans_perner', $iteml);

					$a  = $a + 26;
					$b  = $b + 26;
					$c  = $c + 26;
					$d  = $d + 26;
					$e  = $e + 26;
					$f  = $f + 26;
					$g  = $g + 26;
					$h  = $h + 26;
					$o  = $o + 26;
					$j  = $j + 26;
					$k  = $k + 26;
					$l  = $l + 26;
					$m  = $m + 26;
					$n  = $n + 26;
					$p  = $p + 26;
					$q  = $q + 26;
					$r  = $r + 26;
					$s  = $s + 26;
					$t  = $t + 26;
					$u  = $u + 26;
					$v  = $v + 26;
					$w  = $w + 26;
					$x  = $x + 26;
					$y  = $y + 26;
					$z  = $z + 26;
					$az = $az + 26;
				}
			}
		}


		$rec 	= $this->input->post('joborder[14]');
		$rec	= explode(",", $rec);
		$loop = count($rec) / 17;
		$loopx = $loop - 1;
		if ($loopx) {
			$a = 0;
			$b = 1;
			$c = 2;
			$d = 3;
			$e = 4;
			$f = 5;
			$g = 6;
			$h = 7;
			$o = 8;
			$j = 9;
			$k = 10;
			$l = 11;
			$m = 12;
			$n = 13;
			$p = 14;
			$q = 15;
			$r = 16;
			for ($i = 0; $i < $loopx; $i++) {
				//$stxt = explode(" | ",$rec[$l]);
				$kdzg = explode("-", $rec[$m]);

				$itemy = array(
					'nojo' => $this->input->post('joborder[8]'),
					'perner_resrot' => $rec[$a],
					'perner_ganti' => $rec[$b],
					'kodez_rotasi' => $kdzg[1],
					'alasan_rotasi' => $kdzg[0],
					'nama' => $rec[$c],
					'area' => $rec[$o],
					'nm_area' => $rec[$d],
					'persa' => $rec[$j],
					'nm_persa' => $rec[$e],
					'skilllayanan' => $rec[$k],
					'nm_skilllayanan' => $rec[$f],
					'level' => $rec[$l],
					'nm_level' => $rec[$h],
					'jabatan' => $rec[$g],
					'nm_jabatan' => $rec[$g],
					'cttyp' => $rec[$n],
					'ansvh' => $rec[$p],
					'trfgb' => $rec[$r],
					'arber' => $rec[$q],
					'upd' => $username,
					'lup' => date("Y-m-d H:i:s")
				);
				$this->db->insert('trans_perner_ganti', $itemy);

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


		$asdf = $this->input->post('joborder[7]');
		if ($asdf == 'atasan') {
			if ($data['level'] == 1) {
				$check = $this->job_model->get_email();
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				$data['nojoz'] = $this->input->post('joborder[8]');
				$data['nama']   = $session_data['nama'];
				$data['skrg'] = date("d-m-Y H:i:s");
				$data['abcd'] = 2;
				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
				$subject = 'Notifikasi Edit JO Replace';
				// $post = array(
				// 'token'			=> 'ish@!notif',
				// 'appsenderid'	=> '9',
				// 'to'			=> $test,
				// 'subject'		=> 'Notifikasi Edit JO Replace',
				// 'body'			=> $message
				// );

				// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
				// $this->curl->post($post);
				// $response = json_decode($this->curl->execute());

				$this->sendmail($test, $message, $subject);

				// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Edit JO',$message);
				// echo $hasilkirim;
			} else {
				$check = $this->job_model->newget_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$data['nojoz'] = $this->input->post('joborder[8]');
					$data['nama']   = $session_data['nama'];
					$data['skrg'] = date("d-m-Y H:i:s");

					$data['abcd'] = 2;
					$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
					$subject = 'Notifikasi Edit JO Replace';
					// $post = array(
					// 'token'			=> 'ish@!notif',
					// 'appsenderid'	=> '9',
					// 'to'			=> $test,
					// 'subject'		=> 'Notifikasi Edit JO Replace',
					// 'body'			=> $message
					// );

					// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
					// $this->curl->post($post);
					// $response = json_decode($this->curl->execute());

					$this->sendmail($test, $message, $subject);

					// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Edit JO',$message);
					// echo $hasilkirim;
				}
			}
		} else {
			$check = $this->job_model->newget_email_pm();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];

				$data['nojoz']  = $this->input->post('joborder[8]');
				$data['nama']   = $session_data['nama'];

				$data['skrg'] = date("d-m-Y H:i:s");
				$data['abcd'] = 2;
				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
				$subject = 'Notifikasi Edit JO Replace';
				// $post = array(
				// 'token'			=> 'ish@!notif',
				// 'appsenderid'	=> '9',
				// 'to'			=> $test,
				// 'subject'		=> 'Notifikasi Edit JO Replace',
				// 'body'			=> $message
				// );

				// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
				// $this->curl->post($post);
				// $response = json_decode($this->curl->execute());

				$this->sendmail($test, $message, $subject);

				// $hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Edit JO',$message);
				// echo $hasilkirim;
			}
		}
	}



	function s_perner_simpan()
	{

		$session_data 		= $this->session->userdata('logged_in');
		$username 			= $session_data['username'];
		$data['username'] 	= $session_data['username'];
		$nama	 			= $session_data['nama'];
		$data['regional'] 	= $session_data['regional'];
		$data['nama'] 		= $session_data['nama'];
		$data['level'] 		= $session_data['level'];
		$date_now 			= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

		$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
		$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));

		if ($this->input->post('joborder[4]') == 2) {
			$tglbek = date('Y-m-d', strtotime('5 weekdays'));
		} else {
			$tglbek = date('Y-m-d', strtotime('14 weekdays'));
		}

		$typere = $this->input->post('joborder[5]');
		if ($data['level'] == '1') {
			$lat = '';
			$uat = '';
			$jkp = 0;
			if ($typere == '1') {
				$zx = 0;
			} else {
				$zx = 0;
			}
		} else {
			$lat = date("Y-m-d H:i:s");
			$uat = $data['username'];
			$jkp = 1;
			if ($typere == '1') {
				$zx = 1;
			} else {
				$zx = 0;
			}
		}

		$item1 = array(
			'nojo' => $this->input->post('joborder[8]')
		);

		if ($this->input->post('joborder[10]') == 'INF') {
			$tperal = '1';
		} else {
			$tperal = '0';
		}


		$tgl_skrg = date('Y-m-d');
		$asdf = $this->input->post('joborder[7]');
		if ($asdf == 'atasan') {
			$item = array(
				// 'tanggal' 	=> $this->input->post('joborder[0]'),
				// 'tanggal' 	=> $tgl_skrg,
				'project'	 		=> '',
				'n_project' 		=> '',
				'lama' 				=> $this->input->post('joborder[1]'),
				'latihan' 			=> $this->input->post('joborder[2]'),
				'bekerja' 			=> $this->input->post('joborder[3]'),
				'bekerja_edit' 		=> $data['tgbekerja_rep'],
				'jenis_captive' 	=> $this->input->post('joborder[11]'),
				'approval' 			=> $jkp,
				'upd_atasan' 		=> $uat,
				'lupapp_atasan' 	=> $lat,
				'lup' 				=> date("Y-m-d H:i:s"),
				'flag_edit' 		=> '1',
				'upd_edit' 			=> $data['username'],
				'lup_edit' 			=> date("Y-m-d H:i:s"),
				'type_replace' 		=> $this->input->post('joborder[5]'),
				'no_bak'   			=> $this->input->post('joborder[6]'),
				'kode_cust' 		=> $this->input->post('joborder[12]'),
				'nama_cust' 		=> $this->input->post('joborder[13]'),
				'flag_peralihan' 	=> $tperal
			);
		} else {
			$item = array(
				// 'tanggal' 	=> $this->input->post('joborder[0]'),
				// 'tanggal' 	=> $tgl_skrg,
				'project' 			=> '',
				'n_project' 		=> '',
				'lama' 				=> $this->input->post('joborder[1]'),
				'latihan' 			=> $this->input->post('joborder[2]'),
				'bekerja' 			=> $this->input->post('joborder[3]'),
				'bekerja_edit' 		=> $data['tgbekerja_rep'],
				'jenis_captive' 	=> $this->input->post('joborder[11]'),
				'flag_cancel_sap' 	=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $session_data['username'],
				'lup_edit' 			=> date("Y-m-d H:i:s"),
				'type_replace' 		=> $this->input->post('joborder[5]'),
				'no_bak'   			=> $this->input->post('joborder[6]'),
				'kode_cust' 		=> $this->input->post('joborder[12]'),
				'nama_cust' 		=> $this->input->post('joborder[13]'),
				'flag_peralihan' 	=> $tperal
			);
		}

		$this->job_model->edit_all($item, $item1);

		$putih1 = array(
			'nojo' 		=> $this->input->post('joborder[8]'),
			'flag_rej'	=> 1
		);

		$putih = array(
			'flag_rej'	=> 2,
			'flag_edit'	=> 1,
			'upd_edit'	=> $session_data['username'],
			'lup_edit'	=> date("Y-m-d H:i:s")
		);

		// $this->job_model->edit_all2($putih, $putih1);
		$noobx = date("Y-m-d H:i:s");
		$nojobo = $this->input->post('joborder[8]');
		$this->db->query("Update trans_rincian Set flag_rej='2',flag_edit='1',upd_edit='" . $session_data['username'] . "',lup_edit='$noobx' WHERE nojo='$nojobo' AND (skema='0' OR skema!='1') ");

		/*
		$rec 	= $this->input->post('joborder[9]');
		if($rec!='')
		{
			$rec	= explode(",",$rec);
			$loop = count($rec)/13;
			if ($loop){
				$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7; $o = 8; $j = 9; $k = 10; $l = 11; 
				for ($i=0; $i<$loop; $i++){
					//$stxt = explode(" | ",$rec[$l]);
					$iteml = array(
						'nojo' => $this->input->post('joborder[8]'), 
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
						'nm_jabatan' => $rec[$f],
						'skema' => '0',
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s"),
						'flag_app' => $zx,
						'tgl_resign' => $rec[$l],
						'flag_newrej' => 1,
						'lup_newrej' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_perner',$iteml);
					
					$a = $a + 12;
					$b = $b + 12;
					$c = $c + 12;
					$d = $d + 12;
					$e = $e + 12;
					$f = $f + 12;
					$g = $g + 12;
					$h = $h + 12;
					$o = $o + 12;
					$j = $j + 12;
					$k = $k + 12;
					$l = $l + 12;
				}
			}
		}
		*/

		$rec 	= $this->input->post('joborder[9]');
		if ($rec != '') {
			$rec	= explode(",", $rec);
			$loop = count($rec) / 15;
			$loopx = $loop - 1;
			if ($loopx) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$o = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				for ($i = 0; $i < $loopx; $i++) {
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
						'nojo' => $this->input->post('joborder[8]'),
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
						'nm_jabatan' => $rec[$f],
						'skema' => '0',
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s"),
						'flag_app' => $zx,
						'tgl_resign' => $rec[$l],
						'train_soft' => $ca,
						'train_hard' => $cb,
						'tendem_pasif' => $cc,
						'tendem_aktif' => $cd,
						'rotasi_resign' => $rec[$p],
						'flag_newrej' => 1,
						'lup_newrej' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_perner', $iteml);

					$a = $a + 15;
					$b = $b + 15;
					$c = $c + 15;
					$d = $d + 15;
					$e = $e + 15;
					$f = $f + 15;
					$g = $g + 15;
					$h = $h + 15;
					$o = $o + 15;
					$j = $j + 15;
					$k = $k + 15;
					$l = $l + 15;
					$m = $m + 15;
					$n = $n + 15;
					$p = $p + 15;
				}
			}
		}


		$asdf = $this->input->post('joborder[7]');
		if ($asdf == 'atasan') {
			if ($data['level'] == 1) {
				$check = $this->job_model->get_email();
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				$data['nojoz'] = $this->input->post('joborder[8]');
				$data['nama']   = $session_data['nama'];
				$data['skrg'] = date("d-m-Y H:i:s");

				$data['abcd'] = 2;

				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);
				echo $hasilkirim;
			} else {
				$check = $this->job_model->get_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$data['nojoz'] = $this->input->post('joborder[8]');
					$data['nama']   = $session_data['nama'];
					$data['skrg'] = date("d-m-Y H:i:s");

					$data['abcd'] = 2;

					$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message
					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);
					echo $hasilkirim;
				}
			}
		} else {
			$check = $this->job_model->get_email_sap();
			//$test = array();
			foreach ($check as $val) {
				$test = $val['email'];

				$data['nojoz']  = $this->input->post('joborder[8]');
				$data['nama']   = $session_data['nama'];

				$data['skrg'] = date("d-m-Y H:i:s");

				$data['abcd'] = 2;

				$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit JO', $message);

				echo $hasilkirim;
			}
		}
	}


	function erinc_editskema()
	{
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$nama	 		= $session_data['nama'];
		$level			= $session_data['level'];

		$arrid    = $this->input->post("xjab[0]");
		$arrval   = $this->input->post("xjab[1]");
		$arrnoj   = $this->input->post("xjab[3]");
		$parrval  = explode("#", $arrval);

		$cek_detil_ar = $this->skema_model->nama_arper($parrval[0], $parrval[1]);

		$item = array(
			'id' => $arrid
		);

		$item1 = array(
			'area' 		=> $parrval[1],
			'n_area' 	=> $cek_detil_ar->btrtx,
			'perar' 	=> $parrval[0],
			'n_perar' 	=> $cek_detil_ar->wktxt
		);

		$this->job_model->edit_skema_sk($item, $item1);

		$data['bbb'] = $this->job_model->get_rinc_ps($arrnoj);
		$this->load->view('joborder/listedit_rincskema', $data);
	}



	function edit_urincian_simpanx()
	{
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$nama	 		= $session_data['nama'];
		$level			= $session_data['level'];
		$data['username'] = $session_data['username'];
		$data['regional'] 		= $session_data['regional'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$nid      = $_POST['nojosk'];
		$persa    = $_POST['spa'];
		$asdf     = $_POST['approv'];
		$lkj = str_replace("/", "", $nid);
		$hgf = str_replace("-", "", $lkj);

		// var_dump(count($_POST['kompolx'])); var_dump($_POST['kompoly'][0]); var_dump($hgf); var_dump(count($_FILES['komp']['name'])); var_dump($_POST['kompol'][0]); var_dump(explode('.', basename( $_FILES['komp']['name'][0]))); var_dump(explode('.', basename( $_FILES['komp']['name'][1]))); die;
		$hjk = array("skema", "bak", "other");
		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			// $target_path = "./uploads/";
			$target_path = "/mnt/drobo/88.41/uploads/";
			$ext = explode('.', basename($_FILES['komp']['name'][$i]));
			if ($ext[count($ext) - 1] != '') {
				if ($_POST['kompol'][$i] == 'skema') {
					$target_path = $target_path . "skema_" . $hgf . "_" . $date_now . "." . $ext[count($ext) - 1];
				} else if ($_POST['kompol'][$i] == 'bak') {
					$target_path = $target_path . "bak_" . $hgf . "_" . $date_now . "." . $ext[count($ext) - 1];
				} else {
					$target_path = $target_path . "other_" . $hgf . "_" . $date_now . "." . $ext[count($ext) - 1];
				}


				if (move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
				} else {
				}
			}
		}

		// $yth = $this->db->query("SELECT * FROM trans_skema WHERE nojo = '$nid' GROUP BY nojo ")->row();
		// $dsk = $yth->dokumen_skema;
		// $dbk = $yth->dokumen_bak;
		// $dot = $yth->dokumen_other;

		if ($level != '1') {
			$poy = 1;
		} else {
			$poy = 1;
		}

		if ($asdf == 'atasan') {
			$item1 = array(
				'flag_approval' 	=> $poy,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $username,
				'lup_edit' 			=> date("Y-m-d H:i:s")
			);
		} else {
			$item1 = array(
				'flag_cancel_sap' 	=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $username,
				'lup_edit' 			=> date("Y-m-d H:i:s")
			);
		}

		$item = array(
			'nojo' => $nid
		);

		$this->job_model->edit_skema_sk($item, $item1);


		if ($_POST['choosen'] != '') {
			foreach ($_POST['choosen'] as $key => $list) {
				$data['username'] = $session_data['username'];
				$cho   = $list;
				$chos  = explode("#", $cho);
				$perar = $chos[0];
				$arear = $chos[1];

				$level = $session_data['level'];

				if ($level != '1') {
					$uatz = $data['username'];
					$latz = date("Y-m-d H:i:s");
					$lll = 1;
				} else {
					$uatz = '';
					$latz = '';
					$lll = 0;
				}

				$cek_detil_ar = $this->skema_model->nama_arper($perar, $arear);

				$dsk = "";
				$dbk = "";
				$dot = "";
				for ($i = 0; $i < count($_POST['kompoly']); $i++) {
					if ($_POST['kompolx'][$i] == 'skema') {
						$dsk .= $_POST['kompoly'][$i];
					} else if ($_POST['kompolx'][$i] == 'bak') {
						$dbk .= $_POST['kompoly'][$i];
					} else {
						$dot .= $_POST['kompoly'][$i];
					}
				}

				if ($asdf == 'atasan') {
					$item = array(
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
						'flag_approval' 	=> $lll,
						'upd_approval' 		=> $uatz,
						'lup_app' 			=> $latz,
						'tgl_input' 		=> date('Y-m-d H:i:s'),
						'flag_newrej' 		=> 1,
						'lup_newrej' 		=> date('Y-m-d H:i:s')
					);
				} else {
					$item = array(
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
						'upd_approval' 		=> $data['username'],
						'lup_app' 			=> date("Y-m-d H:i:s"),
						'flag_cancel_sap' 	=> '0',
						'tgl_input' 		=> date('Y-m-d H:i:s'),
						'flag_newrej' 		=> 1,
						'lup_newrej' 		=> date('Y-m-d H:i:s')
					);
				}

				$this->job_model->s_rincian_simpanx($item);
			}
		}



		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			// $target_path = "./uploads/";
			$target_path = "/mnt/drobo/88.41/uploads/";
			$ext  = pathinfo($_FILES['komp']['name'][$i], PATHINFO_EXTENSION);
			$level = $session_data['level'];
			if ($level != '1') {
				$poy = 1;
			} else {
				$poy = 0;
			}

			if ($ext != '') {
				if ($_POST['kompol'][$i] == 'skema') {
					$file_name = "skema_" . $hgf . "_" . $date_now . "." . $ext;

					if ($asdf == 'atasan') {
						$item1 = array(
							'dokumen_skema' 	=> $file_name,
							'flag_approval' 	=> $poy,
							'flag_edit' 		=> 1
						);
					} else {
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
				} else if ($_POST['kompol'][$i] == 'bak') {
					$file_name2 = "bak_" . $hgf . "_" . $date_now . "." . $ext;

					if ($asdf == 'atasan') {
						$item1 = array(
							'dokumen_bak' 		=> $file_name2,
							'flag_approval' 	=> $poy,
							'flag_edit' 		=> 1
						);
					} else {
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
				} else {
					$file_name3 = "other_" . $hgf . "_" . $date_now . "." . $ext;

					if ($asdf == 'atasan') {
						$item1 = array(
							'dokumen_other' 	=> $file_name3,
							'flag_approval' 	=> $poy,
							'flag_edit' 		=> 1
						);
					} else {
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
		}


		/*
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

			$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Edit JO',$message);
			
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

				$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Edit JO',$message);
				
				echo $hasilkirim;
			}
		}
		*/
	}



	function rincian_simpanx()
	{

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
		if ($nojobsk == 0) {
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
		if ($ext == '') {
			$file_name  = "";
		} else {
			$file_name  = "skema_" . $nojosk . $date_now . "." . $ext;
		}


		if ($ext2 == '') {
			$file_name2  = "";
		} else {
			$file_name2 = "bak_" . $nojosk . "_" . $date_now . "." . $ext2;
		}


		if ($ext3 == '') {
			$file_name3  = "";
		} else {
			$file_name3 = "other_" . $nojosk . "_" . $date_now . "." . $ext3;
		}

		$level = $session_data['level'];
		if ($level != '1') {
			$lll = 1;
		} else {
			$lll = 0;
		}

		if ($sar == 'ALL') {
			$jkl = 'ALL AREA';
		} else {
			$jkl = $this->input->post('joborder[4]');
		}


		$item = array(
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



		if ($level == '1') {
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

			$message = $this->load->view('addjo/email.php', $data, TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO - Penyesuaian Skema', $message);

			echo $hasilkirim;
		} else {
			//echo "Data Tersimpan";
			if ($sar == 'ALL') {
				$checko = $this->skema_model->cek_area_all($spa);
				$this->load->database('default', TRUE);
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

					$message = $this->load->view('addjo/email.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);
				}

				echo "Data Tersimpan";
			} else {
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

				$message = $this->load->view('addjo/email.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO - Penyesuaian Skema', $message);

				echo $hasilkirim;
			}
		}
	}




	public function emailsent($vartoemail, $varccemail, $varsubject, $msgemail)
	{

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://mail.ish.co.id',
			'smtp_port' => 465,
			'smtp_user' => 'no-reply@ish.co.id', // change it to yours
			'smtp_pass' => 'cgdv2oleflDIdTId', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$notif = "";

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->clear(TRUE);
		$this->email->set_newline("\r\n");
		$this->email->from('no-reply@ish.co.id'); // change it to yours
		$this->email->to($vartoemail); // change it to yours
		//$this->email->cc($varccemail);
		$this->email->subject($varsubject);
		$this->email->message($msgemail);

		if ($this->email->send()) {
			$notif = "Data Tersimpan";
		} else {
			show_error($this->email->print_debugger());
			$notif = "Data Gagal Tersimpan";
		}
		return $notif;
	}




	public function emailsent_rej($vartoemail, $varccemail, $varsubject, $msgemail)
	{

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://mail.ish.co.id',
			'smtp_port' => 465,
			'smtp_user' => 'no-reply@ish.co.id', // change it to yours
			'smtp_pass' => 'cgdv2oleflDIdTId', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$notif = "";

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->clear(TRUE);
		$this->email->set_newline("\r\n");
		$this->email->from('no-reply@ish.co.id'); // change it to yours
		$this->email->to($vartoemail); // change it to yours
		// $this->email->cc('joborder@ish.co.id');
		//$this->email->cc($varccemail);
		$this->email->subject($varsubject);
		$this->email->message($msgemail);

		if ($this->email->send()) {
			$notif = "Data Telah Di Reject";
		} else {
			show_error($this->email->print_debugger());
			$notif = "Data Gagal Di Reject";
		}
		return $notif;
	}



	public function emailsent_sap($vartoemail, $varccemail, $varsubject, $msgemail)
	{

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://mail.ish.co.id',
			'smtp_port' => 465,
			'smtp_user' => 'no-reply@ish.co.id', // change it to yours
			// 'smtp_pass' => '0PaxU14a+AswU_ova_rO', // change it to yours
			'smtp_pass' => 'cgdv2oleflDIdTId', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$notif = "";

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->clear(TRUE);
		$this->email->set_newline("\r\n");
		$this->email->from('no-reply@ish.co.id'); // change it to yours
		$this->email->to($vartoemail); // change it to yours
		// $this->email->cc('joborder@ish.co.id');
		$this->email->cc($varccemail);
		$this->email->subject($varsubject);
		$this->email->message($msgemail);

		if ($this->email->send()) {
			$notif = "Data Telah Di Reject";
		} else {
			show_error($this->email->print_debugger());
			$notif = "Data Gagal Di Reject";
		}
		return $notif;
	}





	public function edit_skema($sid)
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/edit_skema', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}



	public function edit_allx_lama($appr, $nojo)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";

			$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
			$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));

			$tes = $session_data['level'];
			$data['apps']  = $appr;

			$aaa = $this->job_model->get_nojo_edit($nojo);

			foreach ($aaa as $key => $list) {
				$data['sproject'] 		= $list['start_project'];
				$data['eproject'] 		= $list['end_project'];
				$data['nil_pro'] 		= $list['nilai_project'];
				$data['ntjo'] 			= $list['cnama'];
				$data['tjo']  			= $list['type_jo'];
				$data['noj']  			= $list['nojo'];
				$data['nproj']  		= $list['project'];
				$data['nama_proj']  	= $list['n_project'];
				$data['tanggal']    	= $list['tanggalcrt'];
				$data['tre']    		= $list['type_replace'];
				$data['tynew']    		= $list['type_new'];
				$data['tynew_rek'] 		= $list['new_rekrut'];
				$data['jpro']    		= $list['dnama'];
				$data['jcap']    		= $list['jenis_captive'];
				$data['syaratx']    	= $list['syarat'];
				$data['deskripsix'] 	= $list['deskripsi'];
				$data['lproj']    		= $list['lama'];
				$data['pelatihan']  	= $list['latihan'];
				$data['bekerja']    	= $list['bekerja'];
				$data['komponen_skema'] = $list['komponen'];
				$data['komponen_bak'] 	= $list['komponen_bak'];
				$data['komponen_other'] = $list['komponen_other'];
				$data['nobak'] 			= $list['no_bak'];
				$data['ncust'] 			= $list['nama_cust'];
				$data['kcust'] 			= $list['kode_cust'];
				$data['flag_peral'] 	= $list['flag_peralihan'];

				if (is_null($list['maxdetkom']) && $list['maxdetkom'] == 0) {
					$data['detkompnew'] = 1;
				} else {
					$data['detkompnew'] = $list['maxdetkom'] + 1;
				}

				$ctjprorray = $this->skema_model->get_customer();
				$select = "";
				if (($list['kode_cust'] != null) and ($list['kode_cust'] != '')) {
					$select .= "<option value=" . $list['kode_cust'] . ">" . $list['nama_cust'] . "</option>";
				}
				foreach ($ctjprorray as $key => $listx) {
					$select .= "<option value=" . $listx['id'] . ">" . $listx['nama'] . "</option>";
				}
				$data['cmbcust']		= $select;

				$xctjprorray = $this->skema_model->get_sappersonalarea();
				$selectx = "";
				if (($list['n_project'] != null) and ($list['n_project'] != '')) {
					$selectx .= "<option value=" . $list['project'] . ">" . $list['n_project'] . "</option>";
				}
				foreach ($xctjprorray as $key => $listx) {
					$selectx .= "<option value=" . $listx['value1'] . ">" . $listx['value2'] . "</option>";
				}
				$data['cmbpersa_all']		= $selectx;


				$nama_proj = $list['project'];

				if (($list['type_jo'] == 2) || ($list['type_jo'] == 4)) {
					$qwerty = $this->skema_model->get_rinc_pro($nama_proj);
					//$data['nsap'] = $qwerty->WKTXT;
					$this->load->database('default', TRUE);
				} else {
					if ($list['type_new'] == 2) {
						$qwerty = $this->skema_model->get_rinc_pro($nama_proj);
						$data['nsap'] = $qwerty->WKTXT;
						$this->load->database('default', TRUE);
					}
				}

				if ($list['type_jo'] == 2) {
					$data['ppp'] = $this->job_model->get_pernr_edit($nojo);
				} else {
					$data['bbb'] = $this->job_model->get_rinc_edit($nojo);
					$data['ccc'] = $this->job_model->get_komp_edit($nojo);
					$data['ddd'] = $this->job_model->zproc_edit($nojo);
					$data['rdoc'] = $this->job_model->get_docp();
					$rrr = $this->db->query("select doc_id From trans_doc where nojo like '%$nojo%' ")->row();

					if (($rrr != '') || !empty($rrr)) {
						$data['nana'] = $rrr->doc_id;
					} else {
						$data['nana'] = '0;0';
					}
				}
			}

			$nprorray = $this->job_model->get_itemp();
			$select = "";
			foreach ($nprorray as $key => $list) {
				$select .= "<option value=" . $list['item_id'] . ">" . $list['item_name'] . "</option>";
			}
			$data['cmbitem']		= $select;

			$katerray = $this->job_model->get_kategori();
			$select = "";
			foreach ($katerray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_job_function_category'] . "</option>";
			}
			$data['cmbkategori']		= $select;

			$tggrray = $this->job_model->get_tgg();
			$select = "";
			foreach ($tggrray as $key => $list) {
				$select .= "<option value='" . $list['jabatan'] . "'>" . $list['jabatan'] . "</option>";
			}
			$data['cmbtgg']		= $select;

			$dikrray = $this->job_model->get_pendidikan();
			$select = "";
			foreach ($dikrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['pendidikan'] . "</option>";
			}
			$data['cmbpendidikan']		= $select;

			$konrray = $this->job_model->get_kontrak();
			$select = "";
			foreach ($konrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['jenis'] . "</option>";
			}
			$data['cmbkontrak']		= $select;

			$prorray = $this->job_model->get_province();
			$select = "";
			foreach ($prorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_province'] . "</option>";
			}
			$data['cmbprovince']		= $select;

			$zkomp = $this->master_model->get_lskema();
			$select = "";
			foreach ($zkomp as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['level'] . "</option>";
			}
			$data['cmblskema']		= $select;

			$skkomp = $this->skema_model->search_skill();
			$selects = "";
			foreach ($skkomp as $key => $list) {
				$selects .= "<option value=" . $list['persk'] . ">" . $list['pektx'] . "</option>";
			}
			$data['cmb_skill']		= $selects;

			$reasrayx = $this->job_model->get_reason(1);
			$selectreasx = "";
			foreach ($reasrayx as $key => $list) {
				$selectreasx .= "<option value=" . $list['kd_reason'] . "-" . $list['kode_z'] . ">" . $list['reason'] . " (" . $list['nama_z'] . ")</option>";
			}
			$data['cmbreason']		= $selectreasx;

			$reasray = $this->job_model->get_reasonganti();
			$selectreas = "";
			foreach ($reasray as $key => $list) {
				$selectreas .= "<option value=" . $list['kd_reason'] . "-" . $list['kode_z'] . ">" . $list['reason'] . " (" . $list['nama_z'] . ")</option>";
			}
			$data['cmbreason_ganti']		= $selectreas;

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$data['cmbpersax'] = json_decode($this->curl->execute());
			usort($data['cmbpersax'], array($this, "sort_persa"));

			$this->load->database('default', TRUE);

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/edit_allx', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	public function edit_allx($appr, $nojo)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";

			$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
			$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));

			$tes = $session_data['level'];
			$data['apps']  = $appr;

			$aaa = $this->job_model->get_nojo_edit($nojo);

			foreach ($aaa as $key => $list) {
				$data['sproject'] 		= $list['start_project'];
				$data['eproject'] 		= $list['end_project'];
				$data['nil_pro'] 		= $list['nilai_project'];
				$data['ntjo'] 			= $list['cnama'];
				$data['tjo']  			= $list['type_jo'];
				$data['noj']  			= $list['nojo'];
				$data['nproj']  		= $list['project'];
				$data['nama_proj']  	= $list['n_project'];
				$data['tanggal']    	= $list['tanggalcrt'];
				$data['tre']    		= $list['type_replace'];
				$data['tynew']    		= $list['type_new'];
				$data['tynew_rek'] 		= $list['new_rekrut'];
				$data['jpro']    		= $list['dnama'];
				$data['jcap']    		= $list['jenis_captive'];
				$data['syaratx']    	= $list['syarat'];
				$data['deskripsix'] 	= $list['deskripsi'];
				$data['lproj']    		= $list['lama'];
				$data['pelatihan']  	= $list['latihan'];
				$data['bekerja']    	= $list['bekerja'];
				$data['komponen_skema'] = $list['komponen'];
				$data['komponen_bak'] 	= $list['komponen_bak'];
				$data['komponen_other'] = $list['komponen_other'];
				$data['nobak'] 			= $list['no_bak'];
				$data['ncust'] 			= $list['nama_cust'];
				$data['kcust'] 			= $list['kode_cust'];
				$data['flag_peral'] 	= $list['flag_peralihan'];
				$data['legalitas'] 	= $list['pks'];

				if (is_null($list['maxdetkom']) && $list['maxdetkom'] == 0) {
					$data['detkompnew'] = 1;
				} else {
					$data['detkompnew'] = $list['maxdetkom'] + 1;
				}

				$ctjprorray = $this->skema_model->get_customer();
				$select = "";
				if (($list['kode_cust'] != null) and ($list['kode_cust'] != '')) {
					$select .= "<option value=" . $list['kode_cust'] . ">" . $list['nama_cust'] . "</option>";
				}
				foreach ($ctjprorray as $key => $listx) {
					$select .= "<option value=" . $listx['id'] . ">" . $listx['nama'] . "</option>";
				}
				$data['cmbcust']		= $select;

				$xctjprorray = $this->skema_model->get_sappersonalarea();
				$selectx = "";
				if (($list['n_project'] != null) and ($list['n_project'] != '')) {
					$selectx .= "<option value=" . $list['project'] . ">" . $list['n_project'] . "</option>";
				}
				foreach ($xctjprorray as $key => $listx) {
					$selectx .= "<option value=" . $listx['value1'] . ">" . $listx['value2'] . "</option>";
				}
				$data['cmbpersa_all']		= $selectx;


				$nama_proj = $list['project'];

				if (($list['type_jo'] == 2) || ($list['type_jo'] == 4)) {
					$qwerty = $this->skema_model->get_rinc_pro($nama_proj);
					//$data['nsap'] = $qwerty->WKTXT;
					$this->load->database('default', TRUE);
				} else {
					if ($list['type_new'] == 2) {
						$qwerty = $this->skema_model->get_rinc_pro($nama_proj);
						$data['nsap'] = $qwerty->WKTXT;
						$this->load->database('default', TRUE);
					}
				}

				if ($list['type_jo'] == 2) {
					$data['ppp'] = $this->job_model->get_pernr_edit($nojo);
				} else {
					$data['bbb'] = $this->job_model->get_rinc_edit($nojo);
					$data['ccc'] = $this->job_model->get_komp_edit($nojo);
					$data['ddd'] = $this->job_model->zproc_edit($nojo);
					$data['rdoc'] = $this->job_model->get_docp();
					$rrr = $this->db->query("select doc_id From trans_doc where nojo like '%$nojo%' ")->row();

					if (($rrr != '') || !empty($rrr)) {
						$data['nana'] = $rrr->doc_id;
					} else {
						$data['nana'] = '0;0';
					}
				}
			}

			$nprorray = $this->job_model->get_itemp();
			$select = "";
			foreach ($nprorray as $key => $list) {
				$select .= "<option value=" . $list['item_id'] . ">" . $list['item_name'] . "</option>";
			}
			$data['cmbitem']		= $select;

			$katerray = $this->job_model->get_kategori();
			$select = "";
			foreach ($katerray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_job_function_category'] . "</option>";
			}
			$data['cmbkategori']		= $select;

			$detkaterray = $this->job_model->get_detailkategori();
				$select = "";
				foreach($detkaterray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['name_job_function'] ."</option>";
				}
			$data['cmbdetailkategori']		= $select;

			$tggrray = $this->job_model->get_tgg();
			$select = "";
			foreach ($tggrray as $key => $list) {
				$select .= "<option value='" . $list['jabatan'] . "'>" . $list['jabatan'] . "</option>";
			}
			$data['cmbtgg']		= $select;

			$dikrray = $this->job_model->get_pendidikan();
			$select = "";
			foreach ($dikrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['pendidikan'] . "</option>";
			}
			$data['cmbpendidikan']		= $select;

			$konrray = $this->job_model->get_kontrak();
			$select = "";
			foreach ($konrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['jenis'] . "</option>";
			}
			$data['cmbkontrak']		= $select;

			$jkonrray = $this->job_model->get_jpkwt();
			$select = "";
			foreach ($jkonrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
			}
			$data['cmbjpkwt']		= $select;

			$prorray = $this->job_model->get_province();
			$select = "";
			foreach ($prorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_province'] . "</option>";
			}
			$data['cmbprovince']		= $select;

			$zkomp = $this->master_model->get_lskema();
			$select = "";
			foreach ($zkomp as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['level'] . "</option>";
			}
			$data['cmblskema']		= $select;

			$skkomp = $this->skema_model->search_skill();
			$selects = "";
			foreach ($skkomp as $key => $list) {
				$selects .= "<option value=" . $list['persk'] . ">" . $list['pektx'] . "</option>";
			}
			$data['cmb_skill']		= $selects;

			$reasrayx = $this->job_model->get_reason(1);
			$selectreasx = "";
			foreach ($reasrayx as $key => $list) {
				$selectreasx .= "<option value=" . $list['kd_reason'] . "-" . $list['kode_z'] . ">" . $list['reason'] . " (" . $list['nama_z'] . ")</option>";
			}
			$data['cmbreason']		= $selectreasx;

			$reasray = $this->job_model->get_reasonganti();
			$selectreas = "";
			foreach ($reasray as $key => $list) {
				$selectreas .= "<option value=" . $list['kd_reason'] . "-" . $list['kode_z'] . ">" . $list['reason'] . " (" . $list['nama_z'] . ")</option>";
			}
			$data['cmbreason_ganti']		= $selectreas;

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$data['cmbpersax'] = json_decode($this->curl->execute());
			usort($data['cmbpersax'], array($this, "sort_persa"));

			$this->load->database('default', TRUE);

			$this->load->view('pages/header', $data);
			$this->load->view('testing/edit_allx_new', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}



	public function edit_all($appr, $nojo)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";

			$data['tgbekerja'] = date('Y-m-d', strtotime('14 weekdays'));
			$data['tgbekerja_rep'] = date('Y-m-d', strtotime('5 weekdays'));

			$tes = $session_data['level'];
			$data['apps']  = $appr;

			$aaa = $this->job_model->get_nojo_edit($nojo);

			foreach ($aaa as $key => $list) {
				$data['ntjo'] 			= $list['cnama'];
				$data['tjo']  			= $list['type_jo'];
				$data['noj']  			= $list['nojo'];
				$data['nproj']  		= $list['project'];
				$data['tanggal']    	= $list['tanggalcrt'];
				$data['tre']    		= $list['type_replace'];
				$data['tynew']    		= $list['type_new'];
				$data['tynew_rek'] 		= $list['new_rekrut'];
				$data['jpro']    		= $list['dnama'];
				$data['jcap']    		= $list['jenis_captive'];
				$data['syaratx']    	= $list['syarat'];
				$data['deskripsix'] 	= $list['deskripsi'];
				$data['lproj']    		= $list['lama'];
				$data['pelatihan']  	= $list['latihan'];
				$data['bekerja']    	= $list['bekerja'];
				$data['komponen_skema'] = $list['komponen'];
				$data['komponen_bak'] 	= $list['komponen_bak'];
				$data['komponen_other'] = $list['komponen_other'];
				$data['nobak'] 			= $list['no_bak'];
				$data['ncust'] 			= $list['nama_cust'];
				$data['kcust'] 			= $list['kode_cust'];
				$data['flag_peral'] 	= $list['flag_peralihan'];

				$ctjprorray = $this->skema_model->get_customer();
				$select = "";
				if (($list['kode_cust'] != null) and ($list['kode_cust'] != '')) {
					$select .= "<option value=" . $list['kode_cust'] . ">" . $list['nama_cust'] . "</option>";
				}
				foreach ($ctjprorray as $key => $listx) {
					$select .= "<option value=" . $listx['id_customer'] . ">" . $listx['nama_customer'] . "</option>";
				}
				$data['cmbcust']		= $select;

				$nama_proj = $list['project'];;

				if (($list['type_jo'] == 2) || ($list['type_jo'] == 4)) {
					$qwerty = $this->skema_model->get_rinc_pro($nama_proj);
					//$data['nsap'] = $qwerty->WKTXT;
					$this->load->database('default', TRUE);
				} else {
					if ($list['type_new'] == 2) {
						$qwerty = $this->skema_model->get_rinc_pro($nama_proj);
						$data['nsap'] = $qwerty->WKTXT;
						$this->load->database('default', TRUE);
					}
				}


				if ($list['type_jo'] == 2) {
					$data['ppp'] = $this->job_model->get_pernr_edit($nojo);
				} else {
					$data['bbb'] = $this->job_model->get_rinc_edit($nojo);
					$data['ccc'] = $this->job_model->get_komp_edit($nojo);
					$data['ddd'] = $this->job_model->zproc_edit($nojo);
					$data['rdoc'] = $this->job_model->get_docp();
					$rrr = $this->db->query("select doc_id From trans_doc where nojo like '%$nojo%' ")->row();

					//var_dump($rrr);exit();

					if (($rrr != '') || !empty($rrr)) {
						$data['nana'] = $rrr->doc_id;
					} else {
						$data['nana'] = '0;0';
					}
				}
			}

			$nprorray = $this->job_model->get_itemp();
			$select = "";
			foreach ($nprorray as $key => $list) {
				$select .= "<option value=" . $list['item_id'] . ">" . $list['item_name'] . "</option>";
			}
			$data['cmbitem']		= $select;

			$katerray = $this->job_model->get_kategori();
			$select = "";
			foreach ($katerray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_job_function_category'] . "</option>";
			}
			$data['cmbkategori']		= $select;

			$tggrray = $this->job_model->get_tgg();
			$select = "";
			foreach ($tggrray as $key => $list) {
				$select .= "<option value='" . $list['jabatan'] . "'>" . $list['jabatan'] . "</option>";
			}
			$data['cmbtgg']		= $select;

			$dikrray = $this->job_model->get_pendidikan();
			$select = "";
			foreach ($dikrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['pendidikan'] . "</option>";
			}
			$data['cmbpendidikan']		= $select;

			$konrray = $this->job_model->get_kontrak();
			$select = "";
			foreach ($konrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['jenis'] . "</option>";
			}
			$data['cmbkontrak']		= $select;

			$prorray = $this->job_model->get_province();
			$select = "";
			foreach ($prorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_province'] . "</option>";
			}
			$data['cmbprovince']		= $select;

			$zkomp = $this->master_model->get_lskema();
			$select = "";
			foreach ($zkomp as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['level'] . "</option>";
			}
			$data['cmblskema']		= $select;

			$skkomp = $this->skema_model->search_skill();
			$selects = "";
			foreach ($skkomp as $key => $list) {
				$selects .= "<option value=" . $list['persk'] . ">" . $list['pektx'] . "</option>";
			}
			$data['cmb_skill']		= $selects;



			$this->load->database('default', TRUE);



			/*
			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_skill');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');			
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$lskill =json_decode($this->curl->execute());
			$data['cmb_skill'] = $lskill;
			*/
			$this->load->view('pages/header', $data);
			$this->load->view('joborder/edit_all', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}




	public function edit_all_skema($appr, $nojo)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";


			$tes = $session_data['level'];
			$data['apps']  = $appr;

			$aaa = $this->job_model->get_nojo_psk($nojo);

			foreach ($aaa as $key => $list) {
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
			foreach ($katerray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_job_function_category'] . "</option>";
			}
			$data['cmbkategori']		= $select;

			$tggrray = $this->job_model->get_tgg();
			$select = "";
			foreach ($tggrray as $key => $list) {
				$select .= "<option value='" . $list['jabatan'] . "'>" . $list['jabatan'] . "</option>";
			}
			$data['cmbtgg']		= $select;

			$dikrray = $this->job_model->get_pendidikan();
			$select = "";
			foreach ($dikrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['pendidikan'] . "</option>";
			}
			$data['cmbpendidikan']		= $select;

			$konrray = $this->job_model->get_kontrak();
			$select = "";
			foreach ($konrray as $key => $list) {
				$select .= "<option value=" . $list['jenis'] . ">" . $list['jenis'] . "</option>";
			}
			$data['cmbkontrak']		= $select;

			$prorray = $this->job_model->get_province();
			$select = "";
			foreach ($prorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_province'] . "</option>";
			}
			$data['cmbprovince']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/edit_all_skema', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}



	function deletefile()
	{

		$nmfile = $this->input->post('file');
		$nojo   = $this->input->post('nojoz');
		$jenis  = $this->input->post('jenisz');

		//var_dump($nmfile);var_dump($nojo);var_dump($jenis);exit();

		$item = array(
			'nojo' => $nojo
		);

		if ($jenis == 'skema') {
			$item1 = array(
				'komponen' => ''
			);
		} else if ($jenis == 'bak') {
			$item1 = array(
				'komponen_bak' => ''
			);
		} else if ($jenis == 'other') {
			$item1 = array(
				'komponen_other' => ''
			);
		}

		$this->job_model->del_dok($item, $item1);
		unlink("/mnt/drobo/88.41/uploads/" . $nmfile);
	}



	function deletefile_sk()
	{

		$nmfile = $this->input->post('file');
		$nojo   = $this->input->post('nojoz');
		$jenis  = $this->input->post('jenisz');

		//var_dump($nmfile);var_dump($nojo);var_dump($jenis);exit();

		$item = array(
			'nojo' => $nojo
		);

		if ($jenis == 'skema') {
			$item1 = array(
				'dokumen_skema' => ''
			);
		} else if ($jenis == 'bak') {
			$item1 = array(
				'dokumen_bak' => ''
			);
		} else if ($jenis == 'other') {
			$item1 = array(
				'dokumen_other' => ''
			);
		}

		$this->job_model->del_dok_sk($item, $item1);
		unlink("uploads/" . $nmfile);
	}



	function s_edit_skema()
	{

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

		$hjk = array("skema", "bak", "other");
		//for($i=0; $i<count($_FILES['komp']['name']); $i++){
		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			if ($_FILES['komp']['name'][$i] != '') {
				$target_path = "./uploads/";
				$ext = explode('.', basename($_FILES['komp']['name'][$i]));
				if ($_POST['kompol'][$i] == 'skema') {
					//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1];  
					//$target_path = $target_path . $hjk[$i] ."_". $nojof . "." . $ext[count($ext)-1];
					$target_path = $target_path . "skema_" . $nojof . "." . $ext[count($ext) - 1];
				} else if ($_POST['kompol'][$i] == 'bak') {
					$target_path = $target_path . "bak_" . $nojof . "." . $ext[count($ext) - 1];
				} else {
					$target_path = $target_path . "other_" . $nojof . "." . $ext[count($ext) - 1];
				}


				if (move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
					//echo "The file has been uploaded successfully <br />";
				} else {
					//echo "There was an error uploading the file, please try again! <br />";
				}
			}
		}


		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			if ($_FILES['komp']['name'][$i] != '') {
				$ext  = pathinfo($_FILES['komp']['name'][$i], PATHINFO_EXTENSION);
				if ($_POST['kompol'][$i] == 'skema') {
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
				} else if ($_POST['kompol'][$i] == 'bak') {
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
				} else {
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

			$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit Skema/BAK JO', $message);

			echo $hasilkirim;
		}
	}

	function s_edit_allx()
	{
		$session_data 		= $this->session->userdata('logged_in');
		$username 			= $session_data['username'];
		$data['regional'] 	= $session_data['regional'];
		$nama	 			= $session_data['nama'];
	}


	function s_edit_all()
	{

		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['regional'] 		= $session_data['regional'];
		$nama	 		= $session_data['nama'];
		$date_now 		= date("YmdHi");
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		//$nojo  = $_POST['nojok'];
		$nojo  = $this->input->post('nojok');
		$nojof = str_replace("/", "", $nojo);

		$hjk = array("skema", "bak", "other");
		//for($i=0; $i<count($_FILES['komp']['name']); $i++){
		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			if ($_FILES['komp']['name'][$i] != '') {
				// $target_path = "./uploads/";
				$target_path = "/mnt/drobo/88.41/uploads/";
				$ext = explode('.', basename($_FILES['komp']['name'][$i]));
				if ($_POST['kompol'][$i] == 'skema') {
					//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1];  
					//$target_path = $target_path . $hjk[$i] ."_". $nojof . "." . $ext[count($ext)-1];
					$target_path = $target_path . "skema_" . $nojof . "." . $ext[count($ext) - 1];
				} else if ($_POST['kompol'][$i] == 'bak') {
					$target_path = $target_path . "bak_" . $nojof . "." . $ext[count($ext) - 1];
				} else {
					$target_path = $target_path . "other_" . $nojof . "." . $ext[count($ext) - 1];
				}


				if (move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
					//echo "The file has been uploaded successfully <br />";
				} else {
					//echo "There was an error uploading the file, please try again! <br />";
				}
			}
		}


		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			if ($_FILES['komp']['name'][$i] != '') {
				$ext  = pathinfo($_FILES['komp']['name'][$i], PATHINFO_EXTENSION);
				if (($ext != '') && ($_POST['kompol'][$i] == 'skema')) {
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
				} else if (($ext != '') && ($_POST['kompol'][$i] == 'bak')) {
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
				} else if (($ext != '') && ($_POST['kompol'][$i] == 'other')) {
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



	function s_edit_skema_sk()
	{

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

		$hjk = array("skema", "bak", "other");
		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			$target_path = "./uploads/";
			$ext = explode('.', basename($_FILES['komp']['name'][$i]));
			if ($_POST['kompol'][$i] == 'skema') {
				//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1];  
				//$target_path = $target_path . $hjk[$i] ."_". $nojof . "." . $ext[count($ext)-1];
				$target_path = $target_path . "skema_" . $area . "_" . $perar . "_" . $date_now . "." . $ext[count($ext) - 1];
			} else if ($_POST['kompol'][$i] == 'bak') {
				$target_path = $target_path . "bak_" . $area . "_" . $perar . "_" . $date_now . "." . $ext[count($ext) - 1];
			} else {
				$target_path = $target_path . "other_" . $area . "_" . $perar . "_" . $date_now . "." . $ext[count($ext) - 1];
			}


			if (move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
				//echo "The file has been uploaded successfully <br />";
			} else {
				//echo "There was an error uploading the file, please try again! <br />";
			}
		}


		for ($i = 0; $i < count($_FILES['komp']['name']); $i++) {
			$target_path = "./uploads/";
			$ext  = pathinfo($_FILES['komp']['name'][$i], PATHINFO_EXTENSION);
			if ($_POST['kompol'][$i] == 'skema') {
				$file_name = "skema_" . $area . "_" . $perar . "_" . $date_now . "." . $ext;

				$item1 = array(
					'dokumen_skema' 	=> $file_name,
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1
				);

				$item = array(
					'id' => $nid
				);

				$this->job_model->edit_skema_sk($item, $item1);
			} else if ($_POST['kompol'][$i] == 'bak') {
				$file_name2 = "bak_" . $area . "_" . $perar . "_" . $date_now . "." . $ext;

				$item1 = array(
					'dokumen_bak' 		=> $file_name2,
					'flag_cancel_sap' 	=> 0,
					'flag_edit' 		=> 1
				);

				$item = array(
					'id' => $nid
				);

				$this->job_model->edit_skema_sk($item, $item1);
			} else {
				$file_name3 = "other_" . $area . "_" . $perar . "_" . $date_now . "." . $ext;

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

			$message = $this->load->view('addjo/email_sap.php', $data, TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Edit Skema/BAK JO', $message);

			echo $hasilkirim;
		}
	}



	function simpan_jobs()
	{
		if ($this->session->userdata('logged_in')) {
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
			$this->job_model->simpan_jobs($sid, $usr);



			$cek_nojo = $this->db->query("SELECT * FROM trans_jo a left join trans_rincian b on a.nojo=b.nojo left join job_function c on b.jabatan=c.id where b.id='" . $sid . "' ")->result();



			$i = 0;
			foreach ($cek_nojo as $s) {
				//$gg = $s->nojo;
				$ds = $s->deskripsi;
				$su = '["' . $s->jabatan . '"]';
				$job_data['company_id'] = '97';
				//$ja = $s->jabatan;
				if (!filter_var($s->jabatan, FILTER_VALIDATE_INT)) {
					$ja = $s->jabatan;
				} else {
					$ja = $s->name_job_function;
				}



				if (!filter_var($s->lokasi, FILTER_VALIDATE_INT)) {
					$dz = 411;
				} else {
					$dz = $s->lokasi;
				}



				if (($s->gender) == 'Pria-Wanita') {
					$ish = -1;
				} elseif (($s->gender) == 'Pria') {
					$ish = 1;
				} elseif (($s->gender) == 'Wanita') {
					$ish = 2;
				}



				if ((($s->pendidikan) == 'D3') || (($s->pendidikan) == 'D2') || (($s->pendidikan) == 'D1')) {
					$ishi = 2;
				} elseif (($s->pendidikan) == 'SMA') {
					$ishi = 1;
				} elseif ((($s->pendidikan) == 'S1') || (($s->pendidikan) == 'S2')) {
					$ishi = 3;
				}


				if (($s->kontrak) == 'PKWT') {
					$ishis = '["1"]';
				} elseif (($s->kontrak) == 'Kemitraan') {
					$ishis = '["1"]';
				} elseif ((($s->kontrak) == 'Part') || (($s->kontrak) == 'Part Time')) {
					$ishis = '["2"]';
				} elseif (($s->kontrak) == 'Magang') {
					$ishis = '["6"]';
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

				$item = array(
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



	function skip_simpan_jobs()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$usr		 			= $session_data['username'];
			$data['regional'] 		= $session_data['regional'];
			$data['level'] 			= $session_data['level'];
			$njo   			= $this->input->post('arrappjox');
			$sid  			= $njo[0];
			//var_dump($sid);
			//exit();
			$this->job_model->skip_simpan_jobs($sid, $usr);
		}
	}



	function simpan_pichi()
	{
		if ($this->session->userdata('logged_in')) {
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

			$item = array(
				'id'	=> $picid
			);

			$item2 = array(
				'pic_hi'	=> $pichi,
				'n_pic_hi'	=> $n_pichi
			);
			//var_dump($sid);
			//exit();
			$this->job_model->simpan_pichi($item, $item2);
		}
	}


	function ls_sk()
	{
		if ($this->session->userdata('logged_in')) {
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
			$this->job_model->ls_inssimpantjo_sk($njok, $keter);

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

				$message = $this->load->view('addjo/email_new_sap.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO - Penyesuaian Skema', $message);

				echo $hasilkirim;
			}
		}
	}




	function lr_sk()
	{
		if ($this->session->userdata('logged_in')) {
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

			$message = $this->load->view('addjo/email_rej_sk.php', $data, TRUE);

			$hasilkirim = $this->emailsent_rej($test, 'Notifikasi Reject JO - Penyesuaian Skema', $message);
			//commentby kaha 04/04/23
			// $hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Reject JO - Penyesuaian Skema', $message);

			echo $hasilkirim;

			redirect('home/appjo', 'refresh');
		}
	}

	function s_sk()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjol');
			$njok  = $njo[0];
			$keter = $njo[1];
			$bar   = $njo[2];
			$bpa   = $njo[3];
			$bare  = $njo[4];
			$pare  = $njo[5];

			$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' and areaid='$bare' and personalareaid='$pare' ")->num_rows();

			if (($q_cek_pmanar->jml) <= 0) {
				$this->job_model->inssimpantjo_sk($njok, $keter, '1');
			} else {
				$this->job_model->inssimpantjo_sk($njok, $keter, '2');
			}


			$cek_detil = $this->db->query("SELECT a.nama FROM m_login a left join trans_skema b ON a.username=b.upd WHERE nojo = '$njok'")->row();

			// $check = $this->job_model->get_email_manar($bare);
			$check = $this->job_model->get_email_pm();
			// $check = $this->job_model->get_email_penerima();
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}


			$data['sar']  = $bar;
			$data['spa']  = $bpa;
			$data['nojop'] = $njok;
			$data['nama'] = $cek_detil->nama;

			//var_dump($data['sar']);
			//exit();

			$data['skrg'] = date("d-m-Y H:i:s");

			$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent_rej($test, 'Notifikasi Pengajuan JO - Penyesuaian Skema', $message);
			//commentby kaha 04/04/23
			// $hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO - Penyesuaian Skema', $message);

			echo $hasilkirim;
		}
	}


	function r_sk()
	{
		if ($this->session->userdata('logged_in')) {
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

			$message = $this->load->view('addjo/email_rej_sk.php', $data, TRUE);

			$hasilkirim = $this->emailsent_rej($test, 'Notifikasi Reject JO - Penyesuaian Variabel', $message);
			//commentby kaha 04/04/23
			// $hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Reject JO - Penyesuaian Variabel', $message);

			echo $hasilkirim;

			redirect('home/appjo', 'refresh');
		}
	}



	function simpan_skema_sk()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njob = $this->input->post('data');
			$njo = $njob[0];
			$ket = $njob[1];
			$this->job_model->inssimpanskema_sk($njo, $ket, $data['username']);


			$check = $this->job_model->get_email_penerima_sk_all($njo);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$cek_detil 		= $this->db->query("SELECT * FROM trans_skema WHERE nojo = '$njo' group by nojo ")->row();
			$data['nareaz'] = $cek_detil->n_area;
			$data['nperarz'] = $cek_detil->n_perar;
			$data['nojoz']  = $njo;
			$data['keter']  = $ket;
			$data['skrg']  	= date("d-m-Y H:i:s");
			$data['abcd'] 	= 2;

			$bwk  = $this->db->query("SELECT a.*,b.email, c.layanan FROM mapping_city a LEFT JOIN m_login b ON a.manar=b.username LEFT JOIN province c ON a.province_id = c.id WHERE city_id='" . $cek_detil->n_area . "' ")->row();

			$message = $this->load->view('addjo/email_done.php', $data, TRUE);

			$hasilkirim = $this->emailsent_sap($test, $bwk->email, 'Notifikasi Done JO - Penyesuaian Skema', $message);
		}
	}


	function simpan_cancel_sap_sk()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			$item = array(
				'nojo' => $this->input->post('cnojoz'),
			);

			$item1 = array(
				'upd_skema'			=> $data['username'],
				'lupapp_skema'		=> date("Y-m-d H:i:s"),
				'flag_cancel_sap'	=> '1',
				'ket_cancel' 		=> $this->input->post('scancelz')
			);

			$this->job_model->simpan_cancel_sap_sk($item, $item1);


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

			$message = $this->load->view('addjo/email_rej_sk.php', $data, TRUE);

			$hasilkirim = $this->emailsent_rej($test, 'Notifikasi Reject JO - Penyesuaian Skema', $message);
			//commentby kaha 04/04/23
			// $hasilkirim = $this->emailsent_rej($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Reject JO - Penyesuaian Skema', $message);

			echo json_encode($hasilkirim);
			exit;

			redirect('home/listorder', 'refresh');
		}
	}



	public function edit_skema_sk($sid)
	{
		if ($this->session->userdata('logged_in')) {
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

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/edit_skema_sk', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}



	function save_ket_rek()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			$id 	= $this->input->post('valid');
			$keter 	= $this->input->post('valremark');
			$tyjo 	= $this->input->post('tyjo');

			$file_element_name = 'filestop';
			$file_element_name3 = $_FILES['filestop']['name'];
			$ext  = pathinfo($file_element_name3, PATHINFO_EXTENSION);
			$file_name = $data['username'] . "_" . $id . "_" . $tyjo . "." . $ext;

			$config['upload_path'] 		= './eviden';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|pdf';
			$config['file_name'] 		= $file_name;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload($file_element_name)) {
				echo "Data tidak berhasil tersimpan, File bermasalah. ";
				die;
			} else {
				$dt = $this->upload->data();
				$attacmt = $dt["file_name"];
				if ($tyjo == '2') {
					$item = array(
						'id' => $id,
					);

					$item1 = array(
						'status_rekrut'		=> 9,
						'ket_rekrut' 		=> $keter,
						'upd_rekrut' 		=> $data['username'],
						'lup_rekrut' 		=> date('Y-m-d'),
						'evd_rekrut' 		=> $file_name
					);

					$this->job_model->simpan_ket_rekrep($item, $item1);
				} else {
					$item = array(
						'id' => $id,
					);

					$item1 = array(
						'status_rekrut'		=> 9,
						'ket_rekrut' 		=> $keter,
						'upd_rekrut' 		=> $data['username'],
						'lup_rekrut' 		=> date('Y-m-d'),
						'evd_rekrut' 		=> $file_name
					);

					$this->job_model->simpan_ket_rek($item, $item1);
				}

				echo "Rincian Stopped Recruitment..";
				die;
			}

			// $kk 	= $this->input->post('dataitv');
			// $valid 	= $kk[0];
			// $id 	= $kk[1];
			// $keter 	= $kk[2];
			// $tyjo 	= $kk[3];

			// if($tyjo=='2'){
			// $item = array (
			// 'id' => $id,
			// );

			// $item1 = array (
			// 'status_rekrut'		=> $valid,
			// 'ket_rekrut' 		=> $keter,
			// 'upd_rekrut' 		=> $data['username']
			// );

			// $this->job_model->simpan_ket_rekrep($item,$item1);
			// }
			// else {
			// $item = array (
			// 'id' => $id,
			// );

			// $item1 = array (
			// 'status_rekrut'		=> $valid,
			// 'ket_rekrut' 		=> $keter,
			// 'upd_rekrut' 		=> $data['username']
			// );

			// $this->job_model->simpan_ket_rek($item,$item1);
			// }
		}
	}



	function pilih_area()
	{
		$varray				= $this->skema_model->take_area($this->input->post(data));
		//$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
		$selectnama 	= "<option value=''>pilih</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['btrtl'] . "'>" . $list['btrtx'] . "</option>";
		}
		print_r($selectnama);
	}

	function pilih_area_2()
	{
		$varray				= $this->skema_model->take_area2();
		$selectnama 	= "<option value=''>pilih</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['btrtl'] . "'>" . $list['btrtx'] . "</option>";
		}
		print_r($selectnama);
	}

	function pilih_area2()
	{
		$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_area');
		$this->curl->option('buffersize', 10);
		$this->curl->http_login('devappish', 'devappish!@#');
		$post = array('token' => sha1("#ISH!@#"), 'search' => '');
		$this->curl->post($post);
		$data['cmbarea'] = json_decode($this->curl->execute());
		usort($data['cmbarea'], array($this, "sort_area"));

		// $varray				= $this->skema_model->take_area23($this->input->post(data));
		$varray				= $data['cmbarea'];
		//$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
		$selectnama 	= "<option value=''>pilih</option>";
		foreach ($varray as $key => $list) {
			if ($list->AREA != 'I652' and $list->AREA != 'I595' and $list->AREA != 'I112') {
				$selectnama .= "<option value='" . $list->AREA . "'>" . $list->AREA_TEXT . "</option>";
			}
			// $selectnama .= "<option value='". $list['btrtl'] ."'>". $list['btrtx'] ."</option>";
		}
		print_r($selectnama);
	}


	function pilih_kompon_fixed()
	{
		//echo $abc;
		$varray				= $this->job_model->take_kompon($this->input->post('data'));
		//$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
		$selectnama 	= "<option value=''>pilih</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['kode'] . "'>" . $list['komponen'] . "</option>";
		}
		print_r($selectnama);
	}


	function pilih_kompon_variabel()
	{
		$varray				= $this->job_model->take_kompon_variabel($this->input->post('data'));
		//$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
		$selectnama 	= "<option value=''>pilih</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['kode'] . "'>" . $list['komponen'] . "</option>";
		}
		print_r($selectnama);
	}


	function pilih_kompon_benefit()
	{
		$varray				= $this->job_model->take_kompon_benefit($this->input->post('data'));
		//$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
		$selectnama 	= "<option value=''>pilih</option>";
		//$selectnama 	= "";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['kode'] . "'>" . $list['komponen'] . "</option>";
		}
		print_r($selectnama);
	}



	function trojan()
	{
		if ($this->session->userdata('logged_in')) {
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


	function searchar()
	{
		$perar 	= $_GET['q'];
		$type 	= $_GET['k'];
		//if($type==1)
		//{
		$data	= $this->skema_model->searchar($perar);
		//}
		//else
		//{
		//$data	= $this->skema_model->searchar_2($perar);
		//}
		echo json_encode($data);
	}


	function xsearchar()
	{
		$perar 	= $_GET['q'];
		$type 	= $_GET['k'];

		// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
		// $this->curl->option('buffersize', 10);
		// $this->curl->http_login('devappish', 'devappish!@#');
		// $post = array('token' => sha1("#ISH!@#"));
		// $this->curl->post($post);
		// $data['cmbpersax'] =json_decode($this->curl->execute());
		// usort($data['cmbpersax'], array($this, "sort_persa"));

		if ($type == 1) {
			// $data	= $this->skema_model->xsearchar($perar);
			$data	= $this->skema_model->searchar($perar);
		} else {
			// $data	= $this->skema_model->xsearchar_2($perar);
			$data	= $this->skema_model->searchar($perar);
		}

		echo json_encode($data);
	}


	function perner_search()
	{
		$perner  = $_GET['q'];
		$pembeda = $_GET['p'];
		//$type 	= $_GET['k'];

		$data	= $this->skema_model->perner_search($perner, $pembeda);

		echo json_encode($data);
	}


	function xsearchar_list()
	{
		$perar 	= $_GET['q'];

		$data	= $this->skema_model->xsearchar_list($perar);

		echo json_encode($data);
	}


	function xsearchar_2()
	{
		$perar 	= $_GET['q'];
		$data	= $this->skema_model->xsearchar_2($perar);
		echo json_encode($data);
	}


	function xsearchar_area()
	{
		$area 	= $_GET['q'];
		$data	= $this->skema_model->xsearchar_area($area);
		echo json_encode($data);
	}

	function xsearchar_level()
	{
		$level 	= $_GET['q'];
		$data	= $this->skema_model->xsearchar_level($level);
		echo json_encode($data);
	}

	function xsearchar_jabatan()
	{
		$jabatan 	= $_GET['q'];
		$data	= $this->skema_model->xsearchar_jabatan($jabatan);
		echo json_encode($data);
	}


	function xsearchar_skill()
	{
		$skill 	= $_GET['q'];
		$data	= $this->skema_model->xsearchar_skill($skill);
		echo json_encode($data);
	}


	function searchar_komp()
	{
		$perar 	= $_GET['q'];
		$data	= $this->skema_model->searchar_komp($perar);
		echo json_encode($data);
	}


	function xsearchar_are()
	{
		$area 	= $_GET['q'];
		$persa 	= $_GET['k'];
		//var_dump($area);var_dump($persa);exit();
		$data	= $this->skema_model->xsearchar_are($area, $persa);
		echo json_encode($data);
	}


	public function ajax_list()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			// $params = $this->uri->segment(4); 
			$postparam = $this->input->post();

			// $tgls 			= $postparam['0']['value'];
			// $tgle 			= $postparam['1']['value'];
			// $personalarea 	= $postparam['2']['value'];
			// $area 			= $postparam['3']['value'];
			// $skilllayanan  	= $postparam['4']['value'];

			$parsearch	= array(
				"tgls"			=> $postparam['0']['value'],
				"tgle"			=> $postparam['1']['value'],
				"personalarea"	=> $postparam['2']['value'],
				"area"			=> $postparam['3']['value'],
				"skilllayanan"	=> $postparam['4']['value']
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];

			//$data =  $this->user_profile_model->get_profile($length,$start,$search,$order,$dir,$parsearch);
			$data =  $this->job_model->get_list($length, $start, $search, $order, $dir);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				$output['data'][] = array(
					$row['PERNR'],
					'<a href="' . base_url() . 'index.php/home/profile/' . $row['PERNR'] . '">' . $row['CNAME'] . '</a>',
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
		} else {
			redirect('login');
		}
	}


	function rinc_hapus($id)
	{

		if ($this->session->userdata('logged_in')) {
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



	function deleterinc()
	{
		$nid = $this->input->post('bid');
		$this->job_model->rinc_hapus($nid);
	}


	function deleterinc_komp()
	{
		$nid = $this->input->post('bid');
		$this->job_model->komp_hapus($nid);
	}


	function deleterinc_pern()
	{
		$nid = $this->input->post('bid');
		$this->job_model->pern_hapus($nid);
	}

	function deleterinc_pernx()
	{
		$nid = $this->input->post('bid');
		$cek = $this->db->query("Select nojo, perner, perner_ganti From trans_perner Where id='$nid' ")->row();
		$cekganti = $this->db->query("Select id From trans_perner_ganti Where nojo='" . $cek->nojo . "' and perner_resrot='" . $cek->perner . "' and perner_ganti='" . $cek->perner_ganti . "' ")->row();
		if (!empty($cekganti->id)) {
			$this->job_model->pernganti_hapus($cekganti->id);
		}
		$this->job_model->pern_hapus($nid);
	}


	function deleterinc_proc()
	{
		$nid = $this->input->post('bid');
		$this->job_model->proc_hapus($nid);
	}


	function rinc_skema_hapus($id)
	{

		if ($this->session->userdata('logged_in')) {
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


	function deleteperar()
	{
		$nid = $this->input->post('bid');
		$this->job_model->rinc_skema_hapus($nid);
	}



	function xurincian_simpanx()
	{
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$session_data 	= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['jabatan'] 		= $session_data['jabatan'];
		$data['regional'] 		= $session_data['regional'];
		$date_now 		= date("YmdHi");

		$xyz = $_POST['spa'];
		$abc = $_POST['choosen'];
		$cde = count($abc);

		$result = '';
		$i = 0;

		foreach ($abc as $sub_array) {
			$result .= $sub_array . ',';
			$i++;
		}
		//$result = substr($result, -2);
		$lol = rtrim($result, ", ");

		//var_dump($lol);exit();

		$item = array(
			'personalarea'		=> $xyz,
			'komponen' 			=> $lol,
			'upd' 				=> $data['username'],
			'lup' 				=> date("Y-m-d H:i:s")
		);

		$this->skema_model->xs_rincian_simpanx($item);
	}



	public function integrated($id, $jml, $lolos)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 				= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			//var_dump($id);var_dump($bln);var_dump($jns);exit();
			$data['hid']		= $id;
			$data['jum']		= $jml;
			$data['jum_lolos']	= $lolos;

			$abc = $this->db->query("SELECT b.name_job_function, a.gender, a.jabatan FROM trans_rincian a LEFT JOIN job_function b ON a.jabatan=b.id WHERE a.id='$id' ")->row();
			if (!filter_var($abc->jabatan, FILTER_VALIDATE_INT)) {
				$data['kebut']		= $abc->jabatan . "(" . $abc->gender . ") ";
			} else {
				$data['kebut']		= $abc->name_job_function . "(" . $abc->gender . ") ";
			}


			$vjprorray = $this->skema_model->get_jpencarian();
			$select = "";
			foreach ($vjprorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
			}
			$data['cmbfind']		= $select;


			$this->load->view('pages/header', $data);
			$this->load->view('hiring/integrated', $data);
			$this->load->view('pages/footer', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function cari_integrated()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 				= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";


			$elevel = $this->input->post('larr[0]');
			$data['vrincian']		= $this->skema_model->cari_integrated($elevel);

			$this->load->view('hiring/view_integrated', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	function simpan_data_emp()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];

			$sid 	= $this->input->post('arrrinc[0]');

			$rec 	= $this->input->post('arrrinc[1]');

			$rec	= explode(",", $rec);
			$loop   = count($rec) / 6.5;
			$hrCount = 0;
			$userCount = 0;
			$trainCount = 0;
			$pkwtCount = 0;
			//var_dump($loop);exit();
			if ($loop) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				for ($i = 0; $i < $loop; $i++) {
					$item1 = array(
						'user_id' 		=> $rec[$d],
						'rinc_id' 		=> $sid,
						'nama' 			=> $rec[$a],
						'birthdate' 	=> $rec[$b],
						'education' 	=> $rec[$c],
						'institution' 	=> '',
						'kd_status' 	=> $rec[$e],
						'kd_name' 		=> $rec[$f],
						'upd' 			=> $session_data['username'],
						'lup' 			=> date("Y-m-d H:i:s")
					);
					$this->job_model->simpan_data_emp($item1);

					if ($rec[$e] == 1) {
						$hrCount++;
					} else if ($rec[$e] == 2) {
						$userCount++;
					} else if ($rec[$e] == 3) {
						$trainCount++;
					} else if ($rec[$e] == 4) {
						$pkwtCount++;
					}

					$a = $a + 6;
					$b = $b + 6;
					$c = $c + 6;
					$d = $d + 6;
					$e = $e + 6;
					$f = $f + 6;
				}
			}

			$item = array(
				'nojo' 			=> $sid,
				'jml_pkwt' 		=> $pkwtCount,
				'jml_training' 	=> $trainCount,
				'jml_user' 		=> $userCount,
				'jml_hr' 		=> $hrCount,
				'note' 			=> '',
				'upd' 			=> $session_data['username'],
				'lup' 			=> date("Y-m-d H:i:s")
			);

			$this->job_model->editjo($item);
			//var_dump($hrCount);var_dump($userCount);var_dump($trainCount);var_dump($pkwtCount);exit();
		}
	}



	function detail_hr()
	{
		if ($this->session->userdata('logged_in')) {
			$aid 	= $this->input->post('aid');
			$atype 	= $this->input->post('atype');
			$anojo 	= $this->input->post('anojo');
			$jkon 	= $this->input->post('jkon');
			$tjox 	= $this->input->post('tjox');
			$tnewx 	= $this->input->post('tnewx');
			$lokq 	= $this->input->post('tlok');
			$tper 	= $this->input->post('tpersa');
			$tskil 	= $this->input->post('tskill');
			$tja 	= $this->input->post('tjab');
			$tab 	= $this->input->post('tabkrs');
			$hjab 	= $this->input->post('xhire_jab');

			$data['xidx']		= $aid;
			$data['typex']		= $atype;
			$data['nojov']		= $anojo;
			$data['jkontrak']	= $jkon;
			$data['tjos']		= $tjox;
			$data['tnews']		= $tnewx;
			$data['tloks']		= $lokq;

			$data['tperv']		= $tper;
			$data['tskilv']		= $tskil;
			$data['tjabv']		= $tja;
			$data['tabv']		= $tab;
			$data['hjabv']		= $hjab;

			$emp 			= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tjox' and kd_status='hr' ")->row();
			$emp_training 	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tjox' and kd_status='training' ")->row();
			$emp_user 		= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tjox' and kd_status='user' ")->row();
			$emp_rekrut		= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE kd_status='rekrut' and type_jo='$tjox' AND rinc_id NOT IN ($aid) ")->row();
			if ($tjox == 1) {
				$integ			= $this->db->query("SELECT a.jabatan, a.gender, a.pendidikan, a.lokasi, b.city_name FROM trans_rincian a LEFT JOIN mapping_city b ON a.lokasi=b.city_id WHERE a.id='$aid' ")->row();

				if ($integ->gender == 'Pria-Wanita') {
					$gen = '1,2';
				} else if ($integ->gender == 'Wanita') {
					$gen = '1';
				} else if ($integ->gender == 'Pria') {
					$gen = '2';
				} else {
					$gen = '000';
				}


				if ($integ->pendidikan == 'SMA') {
					$pen = '1,2,3,4,5';
				} else if (($integ->pendidikan == 'D1') || ($integ->pendidikan == 'D2') || ($integ->pendidikan == 'D3')) {
					$pen = '2,3,4,5';
				} else if ($integ->pendidikan == 'S1') {
					$pen = '3,4,5';
				} else if ($integ->pendidikan == 'S2') {
					$pen = '4,5';
				} else if ($integ->pendidikan == 'S3') {
					$pen = '5';
				} else {
					$pen = '1,2,3,4,5';
				}

				$city = $integ->city_name;
			} else {
				$integ			= $this->db->query("SELECT a.area, a.nm_area FROM trans_perner a WHERE a.id='$aid' ")->row();
				$gen = '1,2';
				$pen = '1,2,3,4,5';
				$city = $integ->nm_area;
			}



			//var_dump($pen);var_dump($city);var_dump($gen);exit(); 

			if ($atype == 'hr') {
				$data['vrincian']	= $this->skema_model->detail_hr($aid, $atype, $gen, $pen, $city, $emp_rekrut->emplo);
				$this->load->database('db_second', false);
				$this->load->database('default', TRUE);
				$data['vcentang']	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tjox' and kd_status='hr' ")->result();
			} else if ($atype == 'training') {
				$data['vrincian']	= $this->skema_model->detail_training($aid, $atype, $emp->emplo);
				$this->load->database('db_second', false);
				$this->load->database('default', TRUE);
				$data['vcentang']	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tjox' and kd_status='training' ")->result();
			} else if ($atype == 'user') {
				$data['vrincian']	= $this->skema_model->detail_user($aid, $atype, $emp_training->emplo);
				$this->load->database('db_second', false);
				$this->load->database('default', TRUE);
				$data['vcentang']	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tjox' and kd_status='user' ")->result();
			} else if ($atype == 'rekrut') {
				$data['vrincian']	= $this->skema_model->detail_rekrut($aid, $atype, $emp_user->emplo);
				$this->load->database('db_second', false);
				$this->load->database('default', TRUE);
				$data['vcentang']	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tjox' and kd_status='rekrut' ")->result();
			}

			//var_dump($data['vrincian']);exit();

			$this->load->view('hiring/v_hr', $data);
		}
	}




	function detail_hr_nodidik()
	{
		if ($this->session->userdata('logged_in')) {
			$aid 	= $this->input->post('aid');
			$atype 	= $this->input->post('atype');
			$adidik	= $this->input->post('adidik');
			$agender = $this->input->post('agender');
			$alokasi = $this->input->post('alokasi');
			$tyjox	= $this->input->post('tyjox');


			$emp 			= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tyjox' and kd_status='hr' ")->row();
			$emp_training 	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tyjox' and kd_status='training' ")->row();
			$emp_user 		= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tyjox' and kd_status='user' ")->row();
			$emp_rekrut		= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE kd_status='rekrut' and type_jo='$tyjox' AND rinc_id NOT IN ($aid) ")->row();

			if ($tyjox == 1) {
				$integ			= $this->db->query("SELECT a.jabatan, a.gender, a.pendidikan, a.lokasi, b.city_name FROM trans_rincian a LEFT JOIN mapping_city b ON a.lokasi=b.city_id WHERE a.id='$aid' ")->row();

				if ($integ->gender == 'Pria-Wanita') {
					$gen = '1,2';
				} else if ($integ->gender == 'Wanita') {
					$gen = '1';
				} else if ($integ->gender == 'Pria') {
					$gen = '2';
				} else {
					$gen = '000';
				}

				if ($integ->pendidikan == 'SMA') {
					$pen = '1,2,3,4,5';
				} else if (($integ->pendidikan == 'D1') || ($integ->pendidikan == 'D2') || ($integ->pendidikan == 'D3')) {
					$pen = '2,3,4,5';
				} else if ($integ->pendidikan == 'S1') {
					$pen = '3,4,5';
				} else if ($integ->pendidikan == 'S2') {
					$pen = '4,5';
				} else if ($integ->pendidikan == 'S3') {
					$pen = '5';
				} else {
					$pen = '1,2,3,4,5';
				}

				$city = $integ->city_name;
			} else {
				$integ			= $this->db->query("SELECT a.area, a.nm_area FROM trans_perner a WHERE a.id='$aid' ")->row();
				$gen = '1,2';
				$pen = '1,2,3,4,5';
				$city = $integ->nm_area;
			}


			//var_dump($pen);var_dump($city);var_dump($gen);exit(); 

			if ($atype == 'hr') {
				$data['vrincian']	= $this->skema_model->detail_hr_nodidik($aid, $atype, $gen, $pen, $city, $adidik, $agender, $alokasi, $emp_rekrut->emplo);
				$this->load->database('db_second', false);
				$this->load->database('default', TRUE);
				$data['vcentang']	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tyjox' and kd_status='hr' ")->result();
			} else if ($atype == 'training') {
				$data['vrincian']	= $this->skema_model->detail_training_nodidik($aid, $atype, $adidik, $agender, $alokasi, $emp->emplo);
				$this->load->database('db_second', false);
				$this->load->database('default', TRUE);
				$data['vcentang']	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tyjox' and kd_status='training' ")->result();
			} else if ($atype == 'user') {
				$data['vrincian']	= $this->skema_model->detail_user_nodidik($aid, $atype, $adidik, $agender, $alokasi, $emp_training->emplo);
				$this->load->database('db_second', false);
				$this->load->database('default', TRUE);
				$data['vcentang']	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tyjox' and kd_status='user' ")->result();
			} else if ($atype == 'rekrut') {
				$data['vrincian']	= $this->skema_model->detail_rekrut_nodidik($aid, $atype, $adidik, $agender, $alokasi, $emp_user->emplo);
				$this->load->database('db_second', false);
				$this->load->database('default', TRUE);
				$data['vcentang']	= $this->db->query("SELECT GROUP_CONCAT(user_id) as emplo FROM trans_gojobs WHERE rinc_id='$aid' and type_jo='$tyjox' and kd_status='rekrut' ")->result();
			}

			//var_dump($data['vrincian']);exit();

			$this->load->view('hiring/v_hr', $data);
		}
	}




	function save_emp()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];

		$emp          	= $this->input->post('datatap');

		$id_rinc   			= $emp[0];
		$type_emp  			= $emp[1];
		$tyjo           	= $emp[2];
		$id_emp           	= $emp[3];
		//var_dump($id_emp);exit();
		$pisah				= explode(",", $id_emp);
		$loop   			= count($pisah);

		$this->db->query("Delete From trans_gojobs Where rinc_id='$id_rinc' and kd_status='$type_emp' and type_jo='$tyjo' ");

		$abc = $this->db->query("SELECT id, jml_hr, jml_user, jml_training, jml_pkwt FROM trans_req WHERE nojo='$id_rinc' and type_jo='$tyjo' and status_pemenuhan='1' ORDER BY id DESC LIMIT 1 ")->row();
		if ($type_emp == 'hr') {
			$loopx	= $loop + $abc->jml_hr;
			$jns	= 'jml_hr';
		} else if ($type_emp == 'training') {
			$loopx	= $loop + $abc->jml_training;
			$jns	= 'jml_training';
		} else if ($type_emp == 'user') {
			$loopx	= $loop + $abc->jml_user;
			$jns	= 'jml_user';
		} else if ($type_emp == 'rekrut') {
			$loopx	= $loop + $abc->jml_pkwt;
			$jns	= 'jml_pkwt';
		}

		//var_dump($loop);exit();

		$item = array(
			'type_jo' 			=> $tyjo,
			'user_id'      		=> $id_emp,
			'rinc_id'         	=> $id_rinc,
			'kd_status'         => $type_emp,
			'upd' 				=> $session_data['username'],
			'lup' 				=> date("Y-m-d H:i:s")
		);

		$item1 = array(
			'type_jo' 			=> $tyjo,
			'nojo' 				=> $id_rinc,
			"" . $jns . "" 			=> $loop,
			'status_pemenuhan'	=> '1',
			'note' 				=> '',
			'upd' 				=> $session_data['username'],
			'lup' 				=> date("Y-m-d H:i:s")
		);

		//var_dump($item1);exit(); 

		$item2 = array(
			'nojo' 			=> $id_rinc,
			"" . $jns . ""	 	=> $loop,
			//'note' 			=> '',
			'upd' 			=> $session_data['username'],
			'lup' 			=> date("Y-m-d H:i:s")
		);

		$id = array(
			'id'        	  	=> $abc->id,
			'type_jo' 			=> $tyjo,
			'status_pemenuhan'  => '1',
		);


		if ((empty($abc)) || ($abc == '')) {
			$this->job_model->simpan_req($item1);
		} else {
			$this->job_model->edit_req($item2, $id);
		}

		$this->job_model->simpan_data_emp($item);
	}

	function comma_separated_to_array($string, $separator = ',')
	{
		//Explode on comma
		$vals = explode($separator, $string);

		//Trim whitespace
		foreach ($vals as $key => $val) {
			$vals[$key] = trim($val);
		}
		//Return empty array if no items found
		//http://php.net/manual/en/function.explode.php#114273
		return array_diff($vals, array(""));
	}


	function save_dethr()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['username'] 		= $session_data['username'];
			$wew   			= $this->input->post('larrx');
			$abc = $wew[0];
			$def = $wew[5];
			$typ = $wew[6];

			if ($typ == 'hr') {
				$cekcek = $this->db->query("Select * from detail_trans_hr where user_id='$abc' and id_rincian='$def' ")->num_rows();
				if ($cekcek <= 0) {
					$item = array(
						'id_rincian' => $wew[5],
						'user_id' 	=> $wew[0],
						'desk' 		=> $wew[1],
						'hasil' 	=> $wew[2],
						'kesimpulan' => $wew[3],
						'status' 	=> $wew[4],
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);

					$this->job_model->save_dethr($item);
				} else {
					$putih = array(
						'id_rincian' => $wew[5],
						'user_id' 	=> $wew[0],
					);

					$item = array(
						'desk' 		=> $wew[1],
						'hasil' 	=> $wew[2],
						'kesimpulan' => $wew[3],
						'status' 	=> $wew[4],
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);

					$this->job_model->edit_dethr($item, $putih);
				}
			} else if ($typ == 'training') {
				$cekcek = $this->db->query("Select * from detail_trans_training where user_id='$abc' and id_rincian='$def' ")->num_rows();
				if ($cekcek <= 0) {
					$item = array(
						'id_rincian' => $wew[5],
						'user_id' 	=> $wew[0],
						'penilaian'	=> $wew[8],
						'status' 	=> $wew[7],
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);

					$this->job_model->save_dettrain($item);
				} else {
					$putih = array(
						'id_rincian' => $wew[5],
						'user_id' 	=> $wew[0],
					);

					$item = array(
						'penilaian'	=> $wew[8],
						'status' 	=> $wew[7],
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);

					$this->job_model->edit_dettrain($item, $putih);
				}
			} else if ($typ == 'user') {
				$cekcek = $this->db->query("Select * from detail_trans_user where user_id='$abc' and id_rincian='$def' ")->num_rows();
				if ($cekcek <= 0) {
					$item = array(
						'id_rincian' => $wew[5],
						'user_id' 	=> $wew[0],
						'desk' 		=> $wew[9],
						'hasil' 	=> $wew[10],
						'kesimpulan' => $wew[11],
						'status' 	=> $wew[12],
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);

					$this->job_model->save_detuser($item);
				} else {
					$putih = array(
						'id_rincian' => $wew[5],
						'user_id' 	=> $wew[0],
					);

					$item = array(
						'desk' 		=> $wew[9],
						'hasil' 	=> $wew[10],
						'kesimpulan' => $wew[11],
						'status' 	=> $wew[12],
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);

					$this->job_model->edit_detuser($item, $putih);
				}
			}
		}
	}



	function hiring()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['username'] 		= $session_data['username'];
			$ggg = $this->input->post('datatap');
			$ab = $ggg[0];
			$ac = $ggg[1];
			$ad = $ggg[2];
			$ae = $ggg[3];
			$af = $ggg[4];
			$ag = $ggg[5];
			$ah = $ggg[6];
			$ai = $ggg[7];
			$aj = $ggg[8];
			$ak = $ggg[9];
			$al = $ggg[10];
			$am = $ggg[11];
			$an = $ggg[12];
			$ao = $ggg[13];
			$ap = $ggg[14];

			$aq = $ggg[15];
			$ar = $ggg[16];
			$as = $ggg[17];
			$at = $ggg[18];
			$au = $ggg[19];

			//var_dump($ap);exit();
			$gbi = date("Y.m.d");

			$wa = $ac . ' ' . $ad . ' ' . $ae;

			if ($ah == 1) {
				$wb = '05';
			} else if ($ah == 2) {
				$wb = '03';
			} else if ($ah == 3) {
				$wb = '02';
			} else if ($ah == 4) {
				$wb = '04';
			} else if ($ah == 5) {
				$wb = '01';
			} else if ($ah == 6) {
				$wb = '06';
			}

			if ($aj = 1) {
				$wc = '0';
			} else if ($aj = 2) {
				$wc = '1';
			}

			$wd = str_replace("-", ".", $ak);

			if ($al == 'PKWT') {
				$we = '01';
			} else if ($al == 'Kemitraan') {
				$we = '06';
			} else if ($al == 'Magang') {
				$we = '05';
			} else if ($al == 'THL') {
				$we = '04';
			} else if (($al == 'Part') || ($al == 'Part Time')) {
				$we = '03';
			}

			if ($am == '1') {
				if ($an == '1') {
					$wf = '01';
				} else if ($am == '2') {
					$wf = '02';
				}
			} else if ($am == '2') {
				$wf = '03';
			}

			if ($ao == '0') {
				$wg = '1';
			} else if ($ao == '1') {
				$wg = '2';
			}

			$myObj = new \stdClass();
			/*
			$myObj->begda = $gbi;
			$myObj->endda = "9999.12.31";
			$myObj->massn = "Z1"; //(fix)
			$myObj->massg = $wf; 
			$myObj->werks = $aq;
			$myObj->persg = "8"; //(fix)
			$myObj->persk = $ar;
			$myObj->btrtl = $ap;
			$myObj->abkrs = $at;
			$myObj->ansvh = $we;
			$myObj->stell = $as;
			$myObj->cname = $wa;
			$myObj->anred = $wg;
			$myObj->sprsl = "ID";
			$myObj->gbpas = $wd;
			$myObj->gbort = $ab;
			$myObj->natio = "ID";
			$myObj->gblnd = "ID";
			$myObj->famst = $wc;
			$myObj->konfe = $wb;
			*/
			$myObj->begda = $gbi;
			$myObj->endda = "9999.12.31";
			$myObj->massn = "Z1"; //(fix)
			$myObj->massg = $wf;
			$myObj->werks = $aq;
			$myObj->persg = "8"; //(fix)
			$myObj->persk = $ar;
			$myObj->btrtl = $ap;
			$myObj->abkrs = $at;
			$myObj->ansvh = $we;
			$myObj->stell = $au;
			$myObj->cname = $wa;
			$myObj->anred = $wg;
			$myObj->sprsl = "ID";
			$myObj->gbpas = $wd;
			$myObj->gbort = $ab;
			$myObj->natio = "ID";
			$myObj->gblnd = "ID";
			$myObj->famst = $wc;
			$myObj->konfe = $wb;

			$myJSON = json_encode($myObj);
			//echo $myJSON; exit(); 

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_PORT => "8080",
				CURLOPT_URL => "http://192.168.88.105:8080/ish-rest/hiring/insert",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $myJSON,
				CURLOPT_HTTPHEADER => array(
					"Cache-Control: no-cache",
					"Content-Type: application/json",
					"Postman-Token: 2f72a84e-edce-f4f1-5f1e-aaab383799bc"
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				//echo $response;

				$mek = json_decode($response);
				if ($mek->pernr == null) {
					echo "Belum dibuatkan slot, silahkan konfirmasi ke Tim SAP";
				} else {
					$putih = array(
						'nojo'		=> $af,
						'rincid' 	=> $ag,
						'perner' 	=> $mek->pernr,
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);

					$this->job_model->save_hire($putih);

					//$this->db->query("Delete From trans_gojobs Where rinc_id='$ag' and kd_status='rekrut' ");

					$abc = $this->db->query("SELECT id, jml_pkwt FROM trans_req WHERE nojo='$ag' and status_pemenuhan='1' ORDER BY id DESC LIMIT 1 ")->row();
					$loop = 1;
					$loopx	= $loop + $abc->jml_pkwt;
					$jns	= 'jml_pkwt';

					$item = array(
						'user_id'      		=> $ai,
						'rinc_id'         	=> $ag,
						'kd_status'         => 'rekrut',
						'upd' 				=> $session_data['username'],
						'lup' 				=> date("Y-m-d H:i:s")
					);

					$item1 = array(
						'nojo' 				=> $ag,
						"" . $jns . "" 			=> $loop,
						'status_pemenuhan'	=> '1',
						'note' 				=> '',
						'upd' 				=> $session_data['username'],
						'lup' 				=> date("Y-m-d H:i:s")
					);

					$item2 = array(
						'nojo' 			=> $ag,
						"" . $jns . ""	 	=> $loopx,
						'upd' 			=> $session_data['username'],
						'lup' 			=> date("Y-m-d H:i:s")
					);

					$id = array(
						'id'        	  	=> $abc->id,
						'status_pemenuhan'  => '1',
					);


					if ((empty($abc)) || ($abc == '')) {
						$this->job_model->simpan_req($item1);
					} else {
						$this->job_model->edit_req($item2, $id);
					}

					$this->job_model->simpan_data_emp($item);
					echo "Sukses, perner anak ini adalah '" . $mek->pernr . "' ";
				}
			}
		}
	}


	public function listorder_excel($centang)
	{
		ini_set('memory_limit', '-1');
		$session_data 				= $this->session->userdata('logged_in');
		$data['level'] 				= $session_data['level'];
		$data['perner'] 			= $session_data['perner'];
		$data['bodi']				= '';
		$data['title'] 				= 'Alexa';
		$data['aktif'] 				= 'class="active treemenu"';
		$data['xaktif'] 			= 'class="active"';

		$data['listall'] 	= $this->job_model->listorder_excel($centang);

		$this->load->view('joborder/listorder_excel', $data);
	}


	function cekval()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$aww 			= $this->input->post('arrlist');
			$idz	 	= $aww[0];
			$nojoz		= $aww[1];
			$persz		= $aww[2];
			$lop  = str_replace(",", ".", $persz);
			$lopx = str_replace("%", "", $lop);
			$aa = $this->db->query("Select * from trans_komponen where id='$idz' and komponen IN (4066,4065,4058,8002) ")->row();
			if (!empty($aa->komponen)) {
				$ab = $this->db->query("Select SUM(DISTINCT(a.value)) AS jmlfix from trans_komponen a LEFT JOIN komponen b ON a.komponen=b.kode where a.nojo='$nojoz' and a.area='" . $aa->area . "' and a.jabatan='" . $aa->jabatan . "' and a.level='" . $aa->level . "' and a.skill='" . $aa->skill . "' and b.jenis='4'  ")->row();
				$lopy = ($lopx / 100) * $ab->jmlfix;
				echo $lopy;
				die;
			}
		}
	}


	function kompz_edit()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$aww 			= $this->input->post('xjab');
			$idz	 	= $aww[0];
			$valz		= $aww[1];
			$nojoz		= $aww[2];
			$persz		= $aww[3];

			$lop = str_replace(",", ".", $persz);
			$lopx = str_replace("%", "", $lop);
			$putih = array(
				'id'			=> $idz
			);

			$putih1 = array(
				'value'			=> $valz,
				'persentase'	=> $lopx
			);

			$this->job_model->kompz_edit($putih, $putih1);
			$tes = $session_data['level'];


			$data['ccc'] = $this->job_model->get_komp_edit($nojoz);
			$this->load->view('joborder/listedit', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	function erinc_edit()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama']		= $session_data['nama'];
			$aww 			= $this->input->post('xjab');
			$idz	 	= $aww[0];
			$kumtrain	= $aww[1];
			$nojoz		= $aww[2];
			$ejml		= $aww[3];

			if (strpos($kumtrain, '1') !== false) {
				$ca = 1;
			} else {
				$ca = 0;
			}

			if (strpos($kumtrain, '2') !== false) {
				$cb = 1;
			} else {
				$cb = 0;
			}

			if (strpos($kumtrain, '3') !== false) {
				$cc = 1;
			} else {
				$cc = 0;
			}

			if (strpos($kumtrain, '4') !== false) {
				$cd = 1;
			} else {
				$cd = 0;
			}


			$putih = array(
				'id'			=> $idz
			);

			$putih1 = array(
				'jumlah' 		=> $ejml,
				'train_soft' 	=> $ca,
				'train_hard' 	=> $cb,
				'tendem_pasif' 	=> $cc,
				'tendem_aktif' 	=> $cd
			);

			$this->job_model->erinc_edit($putih, $putih1);


			$data['bbb'] = $this->job_model->get_rinc_edit($nojoz);
			$this->load->view('joborder/listedit_rinc', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	function simpantjo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$keter = $njo[1];
			$tjo   = $njo[2];
			$trep  = $njo[3];
			$tjen  = $njo[4];

			//var_dump($tjen);exit();

			//var_dump($njok);var_dump($keter);var_dump($tjo);exit();
			$this->job_model->inssimpantjo($njok, $keter, $tjo, $trep, $tjen);


			if ($tjo == '2') {
				if ($trep == '1') {
					/*
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

						$hasilkirim = $this->emailsent($test,'khusnul.hisyam@ish.co.id','Notifikasi Pengajuan JO',$message);
						
						echo "Data Telah Di Approve";
					}
					*/
					$check = $this->job_model->get_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($njok);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $njok;

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

						echo "Data Telah Di Approve";
					}
				} else {
					$check = $this->job_model->newget_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($njok);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $njok;

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

						echo "Data Telah Di Approve";
					}
				}
			} else {
				$check = $this->job_model->newget_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$checkox = $this->job_model->get_detail_creater($njok);
					$data['type']  	  = $checkox->namad;
					$data['nama']  	  = $checkox->nama;
					$data['nojoz'] 	  = $njok;

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

					echo "Data Telah Di Approve";
				}
			}
		}
	}


	function simpantjo_pm()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjo');
			$njok  = $njo[0];
			$keter = $njo[1];
			$tjo   = $njo[2];
			$trep  = $njo[3];
			$tjen  = $njo[4];

			$this->job_model->inssimpantjo_pm($njok, $keter, $tjo, $trep, $tjen);

			if ($tjo == '2') {
				if ($trep == '1') {
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

						$message = $this->load->view('addjo/email_new_sap.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);

						echo "Data Telah Di Approve";
					}
				} else {
					if ($tjen == 'Rep') {
						$checko = $this->job_model->get_city_manar_rep($njok);
					} else {
						$checko = $this->job_model->get_city_manar($njok);
					}

					foreach ($checko as $valu) {
						$testing  = $valu['lokasi'];
						if ($tjen == 'Rep') {
							$testing2 = '-';
						} else {
							$testing2 = $valu['project'];
						}

						$check 	  = $this->job_model->get_email_manar_rep($testing, $testing2);
						$test 	  = array();
						foreach ($check as $val) {
							$test[] = $val['email'];
						}

						$data['type']  = $valu['namad'];
						$data['nojoz'] = $njok;
						$data['nama']  = $valu['nama'];

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Pengajuan JO', $message);
					}

					echo "Data Telah Di Approve";
				}
			} else {
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

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'joborder@ish.co.id', 'Notifikasi Pengajuan JO', $message);
				}

				echo "Data Telah Di Approve";
			}
		}
	}


	public function vappjo_xlistjoxpm()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "List JO";

			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$typ = $session_data['type'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];

			$search = $this->input->post('dataarr');

			$data['transjos']			= $this->job_model->vget_transappjo_skemapm();
			$data['cekik'] = 'VAR';

			$this->load->view('joborder/appjo_xlistjosapxpm', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function appjo_xlistjoxpm()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "List JO";

			$tes1 = $session_data['level'];
			$daud = $session_data['layanan'];
			$typ = $session_data['type'];
			$jbt = $session_data['jabatan'];
			$username = $session_data['username'];

			$search = $this->input->post('dataarr');

			$data['transjos']			= $this->job_model->get_transappjo_skemapm();
			$data['cekik'] = 'SKM';

			$this->load->view('joborder/appjo_xlistjosapxpm', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	function s_skpm()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$njo   = $this->input->post('arrappjol');
			$njok  = $njo[0];
			$keter = $njo[1];
			$bar   = $njo[2];
			$bpa   = $njo[3];
			$bare  = $njo[4];
			$pare  = $njo[5];

			$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' and areaid='$bare' and personalareaid='$pare' ")->num_rows();

			if (($q_cek_pmanar->jml) <= 0) {
				$this->job_model->inssimpantjo_skpm($njok, $keter, '1');
			} else {
				$this->job_model->inssimpantjo_skpm($njok, $keter, '2');
			}


			$cek_detil = $this->db->query("SELECT a.nama FROM m_login a left join trans_skema b ON a.username=b.upd WHERE nojo = '$njok'")->row();

			$check = $this->job_model->get_email_manar_rep($bare, $pare);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}


			$data['sar']  = $bar;
			$data['spa']  = $bpa;
			$data['nojop'] = $njok;
			$data['nama'] = $cek_detil->nama;

			$data['skrg'] = date("d-m-Y H:i:s");

			$message = $this->load->view('addjo/email.php', $data, TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test, 'khusnul.hisyam@ish.co.id', 'Notifikasi Done JO - Penyesuaian Variabel', $message);

			echo $hasilkirim;
		}
	}

	function data_train()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$data['disa'] = $this->input->post('disa');
			$data['det_train']		= $this->job_model->view_train($njo);

			$this->load->view('joborder/view_train', $data);
		}
	}

	function report_excel()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['jabatan'] 		= $session_data['jabatan'];

		$tgc1 			= $_GET['cartgl1'];
		$tgc2 			= $_GET['cartgl2'];
		$pm 			= $_GET['caripm'];
		$stat 			= $_GET['caridn'];
		$cnobak 		= $_GET['carinbak'];
		$cpro			= $_GET['caripr'];
		$clok			= $_GET['carilk'];
		$ccre			= $_GET['caricr'];
		$cnoj			= $_GET['carinj'];

		ini_set('memory_limit', '-1');
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['allrep']		= $this->job_model->report_excel($tgc1, $tgc2, $pm, $stat, $cnobak, $cpro, $clok, $ccre, $cnoj, $data['username'], $data['level'], $data['regional'], $data['layanan'], $data['jabatan']);
			// var_dump($tgc1);var_dump($tgc2);die;
			$this->load->view('joborder/report_excel', $data);
		}
	}

	function report_excelrek()
	{
		$tgc1 			= $_GET['cartgl1'];
		$tgc2 			= $_GET['cartgl2'];
		$pm 			= $_GET['caripm'];
		$stat 			= $_GET['caridn'];
		$cnobak 		= $_GET['carinbak'];
		$cpro			= $_GET['caripr'];
		$clok			= $_GET['carilk'];
		$ccre			= $_GET['caricr'];
		$cnoj			= $_GET['carinj'];

		ini_set('memory_limit', '-1');
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['allrep']		= $this->job_model->report_excelrek($tgc1, $tgc2, $pm, $stat, $cnobak, $cpro, $clok, $ccre, $cnoj);
			// var_dump($tgc1);var_dump($tgc2);die;
			$this->load->view('joborder/report_excel', $data);
		}
	}

	function reportexcel_skm()
	{
		$typex 			= $_GET['typex'];
		// var_dump($typex);die;

		ini_set('memory_limit', '-1');
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['typesk'] = $typex;
			if ($typex == 'SKEMA') {
				$data['allrep']		= $this->job_model->reportexcel_skm();
			} else {
				$data['allrep']		= $this->job_model->vget_transappjo_skemapm();
			}

			$this->load->view('joborder/reportexcel_skm', $data);
		}
	}

	public function downloadfile($nfile)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "List JO";

			force_download('uploads/' . $nfile, NULL);
		} else {
			redirect('login', 'refresh');
		}
	}

	// public function downloadnas($nfile)
	public function downloadnas()
	{
		$token = $_GET['token'];
		$nfile = $_GET['nfile'];
		// $FileName = '/mnt/drobo/88.41/uploads/'.$nfile; 
		//var_dump($FileName);die;

		// if(file_exists($FileName)){
		// die('disini');
		// }die('no');

		// if($token=='munaf'){
		// if ($this->session->userdata('logged_in')){
		// } 
		// $session_data 			= $this->session->userdata('logged_in');
		// $data['nama'] 			= $session_data['nama'];
		// $data['level'] 			= $session_data['level'];
		// $data['regional'] 		= $session_data['regional'];
		// $data['id'] 			= $session_data['id'];
		// $data['title'] 			= "List JO";

		$FileName = '/mnt/drobo/88.41/uploads/' . $nfile;
		header('Content-disposition: attachment; filename="' . $FileName . '"');
		readfile($FileName);

		// if($token=='munaf'){
		// } else {
		// redirect ('login','refresh');
		// }
		// }			
	}

	function pilih_jpkwt()
	{
		$varray				= $this->job_model->get_jpkwt($this->input->post(data));
		$selectnama 	= "<option value=''>Pilih Jenis Kompensasi</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['id'] . "'>" . $list['nama'] . "</option>";
		}
		print_r($selectnama);
	}

	function sendmail($email, $message, $subject)
	{
		$post = array(
			'from'			=> 'no-reply@ish.co.id',
			'to[]'			=> $email,
			'body'			=> $message,
			'subject'		=> $subject,
			'token'			=> 'ish@cipete',
			'cc'			=> '',
		);

		$this->curl->create("http://192.168.88.27/mailgateway/send");
		$this->curl->post($post);
		$response = json_decode($this->curl->execute());
		return $response;
	}
}
