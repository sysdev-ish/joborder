<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','bast_model'));
	}
	
	
	
	public function listorderx()
	{
		if ($this->session->userdata('logged_in')){
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
			
			$this->load->database('db_third',FALSE);	
			$this->load->database('default',TRUE);
			$xjprorray = $this->job_model->get_jenis_project();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
			}
			$data['cmbjpro']		= $select;
			
			$xjprorrayp = $this->job_model->get_pm();
			$selectp = "";
			foreach($xjprorrayp as $key => $list){
				$selectp .= "<option value=". $list['username'] .">". $list['nama'] . "</option>";
			}
			$data['cmbpm']		= $selectp;
			
			
			$djprorrayp = $this->job_model->getdiv();
			$dselectp = "";
			foreach($djprorrayp as $key => $list){
				$dselectp .= "<option value=". $list['id'] .">". $list['divisi'] . "</option>";
			}
			$data['cmbdiv']		= $dselectp;
			
			
			$xjprorraypy = $this->db->query("SELECT jml FROM gojobs GROUP BY jml ")->result_array();
			$selectpy = "";
			$selectpy .= "<option value='0'>0</option>";
			foreach($xjprorraypy as $key => $list){
				$selectpy .= "<option value=". $list['jml'] .">". $list['jml'] . "</option>";
			}
			$data['cmbjmlx']		= $selectpy;
			
			
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
				foreach($reasrayx as $key => $list){
					$selectreasx .= "<option value=". $list['kd_reason'] ."-". $list['kode_z'] .">". $list['reason'] . " (".$list['nama_z'].")</option>";
				}
			$data['cmbreason']		= $selectreasx;	
			
			$reasrayxz = $this->job_model->get_trfgb();
				$selectreasxz = "";
				foreach($reasrayxz as $key => $list){
					$selectreasxz .= "<option value=". $list['trfgb'] .">". $list['trfgb_txt'] . "</option>";
				}
			$data['cmbtrfgb']		= $selectreasxz;
			
			$reasrayxzx = $this->job_model->get_cttyp();
				$selectreasxzx = "";
				foreach($reasrayxzx as $key => $list){
					$selectreasxzx .= "<option value=". $list['kd_cttyp'] .">". $list['nm_cttyp'] . "</option>";
				}
			$data['cmbcttyp']		= $selectreasxzx;

			$vreasrayxzx = $this->job_model->get_dokpks();
				$vselectreasxzx = "";
				foreach($vreasrayxzx as $key => $list){
					$vselectreasxzx .= "<option value=". $list['id'] .">". $list['jenis_pks'] . "</option>";
				}
			$data['cmbdokpks']		= $vselectreasxzx;		
			
			$this->load->view('pages/header',$data);
			$this->load->view('testing/listorder_sap',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	public function hitung_param($next){
		$inext = strlen($next);
		switch ($inext){
			case 1: $noj = "00000000" . $next; break; 
			case 2: $noj = "0000000" . $next; break;
			case 3: $noj = "000000" . $next; break;
			case 4: $noj = "00000" . $next; break;
			case 5: $noj = "0000" . $next; break;
			case 6: $noj = "000" . $next; break;
			case 7: $noj = "00" . $next; break;
			case 8: $noj = "0" . $next; break;
			case 9: $noj = $next; break;
		}
		return $noj;
	}	
	
	
	
}