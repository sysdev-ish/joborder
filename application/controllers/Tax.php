<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','user','skema_model','master_model'));
	}
	
	
	
	public function listorder_tax()
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
			
			
			$xjprorray = $this->skema_model->get_skill();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['PERSK'] .">". $list['PEKTX'] . "</option>";
			}
			$data['cmbskill']		= $select;
			

			$this->load->database('db_third',FALSE);	
			$this->load->database('default',TRUE);
			$xjprorray = $this->job_model->get_jenis_project();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
			}
			$data['cmbjpro']		= $select;
			
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/listorder_tax',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function data_listorder_tax()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)){
			$postparam = $this->input->post();

			$draw=$postparam['draw'];
			$length=$postparam['length'];
			$start=$postparam['start'];
			$search=$postparam['search']["value"];
			
			$order=$postparam['order'][0]['column'];
			$dir=$postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];
			
			if($level==17){
				$data = $this->job_model->get_transall_tax($length,$start,$search,$order,$dir);
			}
			
			
			//var_dump($data);exit();
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				$ko_persa = $row['persa_sap'];
				$ko_abkrs = $row['abkrs_sap'];
				
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"), 'search' => $ko_persa);
				$this->curl->post($post);
				$nnnx =json_decode($this->curl->execute());
				$plk = $nnnx[0]->persa;
				
				
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_payrollarea');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"), 'search' => $ko_abkrs);
				$this->curl->post($post);
				$nnny =json_decode($this->curl->execute());
				$klp = $nnny[0]->PAYROLL_AREA_TEXT;
				
				$totkon = round($row['nilai_kontrak_pks']/12);
				
				/*
				if($level==17){
					if($row['jml_pks']==1){
						$fff = "<button type='button' class='btn ".$stat." btn-block btn-xs' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\", \"".$row['jml_pks']."\", \"".$row['pks_cli']."\", \"".$row['pks_ish']."\", \"".$row['judul_pks']."\", \"".$row['nilai_kontrak_pks']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>". $btn ."</button>";
					}
					else {
						$fff = "<button type='button' class='btn ".$stat." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\", \"".$row['jml_pks']."\", \"".$row['pks_cli']."\", \"".$row['pks_ish']."\", \"".$row['judul_pks']."\", \"".$row['nilai_kontrak_pks']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>". $btn ."</button>";
					}
				}
				*/
				$kk = '-';
				
				$output['data'][]=array( 
					$plk,
					$klp,
					$row['nojo'],		
					$row['no_bak'],
					$row['pks_ish'],
					$row['tgl_kontrak'],
					$row['lama'],
					$row['nama_perusahaan'],
					$kk, 
					$row['n_pic_hi'],
					$totkon
					
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}
	
	public function test_tanggal()
	{
		$abc = '2020-02';
		$tglm = explode('-',$abc);
		if($tglm[1]=='01'){
			$tgls = 12;
			$tglt = $tglm[0]-1;
		} else {
			$tgly = $tglm[1]-1;
			if($tgly<10){
				$tgls = '0'.$tglm[1]-1;
			} else {
				$tgls = $tglm[1]-1;
			}
			$tglt = $tglm[0];
		}
		$tgla = $this->lastOfMonth($tglt,$tgls);
		var_dump($tgls);
		var_dump($tglt);
		var_dump($tgla);die;
	}
	
	public function lastOfMonth($year,$month) {
		return date("d", strtotime('-1 second', strtotime('+1 month',strtotime($month . '/01/' . $year. ' 00:00:00'))));
	}
	
}