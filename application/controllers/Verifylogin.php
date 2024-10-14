<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {
	function __construct()	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		
		if ($this->form_validation->run() == FALSE) {
			//Field validation failed.  User redirected to login page
			$this->load->view('login/login_view');				
		} elseif ($this->form_validation->run() == TRUE) {
			//Go to private area
			redirect('home', 'refresh');
		}
	}

	function check_database($password) {
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		//query the database
		$result = $this->user->login($username, $password);

		if ($result) {
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'id' 				=> $row->id,
					'username' 			=> $row->username,
					'nama' 				=> $row->nama,
					'jabatan' 			=> $row->jabatan,
					'level' 			=> $row->level,
					'type' 				=> $row->type,
					'layanan' 			=> $row->layanan,
					'regional' 			=> $row->regional,
					'jenis'				=> $row->jenis,
					'mgr_enterprise'	=> $row->mgr_enterprise
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		} else {
			$cresult = $this->user->cekuser($username);
			if ($cresult) {
				$this->form_validation->set_message('check_database', 'Invalid password');
			} else {
				$this->form_validation->set_message('check_database', 'Invalid username');
			}
			return FALSE;
		}
	}

	function new_password(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required'=>'You have not provided a %s.'));
		$this->form_validation->set_rules('npassword', 'Retype Password', 'trim|required|matches[password]', array('required'=>'You have not provided a %s.','matches'=>'Retype password not same with password'));
		
		if ($this->form_validation->run() == FALSE) {
			$data = array();
			$data['xusername'] = $this->input->post('username');
			$this->load->view('login/change_password', $data);			
		} else {
			$item = array(
				'id' => '',
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'nama' => '',
				'level' => '4',
				'area' => '',
				'layanan' => '',
				'upd' => 'System',
				'lup' => date("Y-m-d H:i:s")
			);
			$this->user->inslogin($item);
			
			$zresult = $this->user->view_profile($this->input->post('username'), $this->input->post('password'));
			if ($zresult) {
				$sess_array = array();
				foreach($zresult as $row) {
					$sess_array = array(
						'perner' => $row->perner,
						'nama' => $row->nama,
						'area' => $row->area,
						'personalarea' => $row->personalarea,
						'payrollarea' => $row->payrollarea,
						'jabatan' => $row->jabatan,
						'type' => $row->type,
						'skilllayanan' => $row->skilllayanan
					);
					$this->session->set_userdata('logged_in', $sess_array);
				}
			}
			redirect('home', 'refresh');			
		}
	}
	
	function change_password(){
		If (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip = $_SERVER['HTTP_CLIENT_IP']; }
		Elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
		Else { $ip = $_SERVER['REMOTE_ADDR']; }
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required'=>'You have not provided a %s.'));
		$this->form_validation->set_rules('npassword', 'Retype Password', 'trim|required|matches[password]', array('required'=>'You have not provided a %s.','matches'=>'Retype password not same with password'));
		
		if ($this->form_validation->run() == FALSE) {
			$data = array();
			$data['username'] = $this->input->post('username');
			$this->load->view('login/change_password', $data);			
		} else {
			//$username =$this->input->post('username');
			$data['username'] = $this->input->post('username');
			$item = array(
				
				'password' => md5($this->input->post('password')),
				
				'upd' => 'System',
				'lup' => date("Y-m-d H:i:s")
			);
			$this->user->upd_login($data,$item);
			
			$zresult = $this->user->view_profile($this->input->post('username'), $this->input->post('password'));
			
			if ($zresult) {
				$sess_array = array();
				foreach($zresult as $row) {
					$sess_array = array(
						'id' 		=> $row->id,
						'username' 	=> $row->username,
						'nama' 		=> $row->nama,
						'jabatan' 	=> $row->jabatan,
						'level' 	=> $row->level,
						'type' 		=> $row->type,
						'layanan' 	=> $row->layanan,
						'regional' 	=> $row->regional,
						'jenis'		=> $row->jenis
					);
					$this->session->set_userdata('logged_in', $sess_array);
				}
			}
			redirect('home', 'refresh');			
		}
	}
}

?>