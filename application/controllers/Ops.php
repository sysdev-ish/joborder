<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Ops extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','user','skema_model','master_model'));
	}
	
	
	public function listorder_ops()
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
			
			$nprorray = $this->job_model->get_itemp();
				$select = "";
				foreach($nprorray as $key => $list){
					$select .= "<option value=". $list['item_id'] .">". $list['item_name'] . "</option>";
				}
			$data['cmbitem']		= $select;
			
			$xjprorray = $this->skema_model->get_skill();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['PERSK'] .">". $list['PEKTX'] . "</option>";
			}
			$data['cmbskill']		= $select;
			//var_dump($data['cmbskill']);exit();

			$xjprorray = $this->skema_model->get_area();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['BTRTL'] .">". $list['BTRTX'] . "</option>";
			}
			$data['cmbarea']		= $select;

			$xjprorray = $this->skema_model->get_jabatan();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['kd_jabatan'] .">". $list['jabatan'] . "</option>";
			}
			$data['cmbjabatan']		= $select;


			$xjprorray = $this->skema_model->get_level();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['TRFAR'] .">". $list['TRFAR_TXT'] . "</option>";
			}
			$data['cmblevel']		= $select;

			$this->load->database('db_third',FALSE);	
			$this->load->database('default',TRUE);
			$xjprorray = $this->job_model->get_jenis_project();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
			}
			$data['cmbjpro']		= $select;
			
			
			$ojprorray = $this->job_model->get_mgm();
			$select = "";
			foreach($ojprorray as $key => $list){
				$select .= "<option value=". $list['id'] .">". $list['jabatan'] . "</option>";
			}
			$data['cmbgm']		= $select;
			
			
			//var_dump($zparam);exit();
			
			$xjprorray = $this->skema_model->get_zskema();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['zskema'] .">". $list['zskema'] . "</option>";
			}
			$data['cmbzskema']		= $select;
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/listorder_ops',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	function app_ops(){
		if ($this->session->userdata('logged_in')){
			$ajk 	= $this->input->post('data');
			$aid 	= $ajk[0];
			$note 	= $ajk[1];
			
			$putih = array(
				'id' => $aid
			);
			
			$item = array(
				'flag' => '1',
				'notes' => $note
			);
			
			$this->job_model->app_ops($item, $putih);
		}
	}
	
	
	function rej_ops(){
		if ($this->session->userdata('logged_in')){
			$ajk 	= $this->input->post('data');
			$aid 	= $ajk[0];
			$note 	= $ajk[1];
			
			$putih = array(
				'id' => $aid
			);
			
			$item = array(
				'flag' => '2',
				'notes' => $note
			);
			
			$this->job_model->app_ops($item, $putih);
		}
	}
	
	
	function ztrajo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$njo = $this->input->post('data');
			$data['zrincian']		= $this->job_model->ztrajo($njo);
			
			$data['nana'] = $this->db->query("select doc_id From trans_doc where nojo='$njo' ")->row();
			
			$tes = $session_data['level'];
			
			
			$this->load->view('joborder/zrincian', $data);
		}
	}
	
	
	function detail_file_b(){
		if ($this->session->userdata('logged_in')){
			$ajk 	= $this->input->post('data');
			$kid 	= $ajk[0];
			$noj 	= $ajk[1];
			
			$abc = $this->db->query("SELECT doc_id from trans_doc WHERE nojo='$noj' ")->row();
			if( (empty($abc->doc_id)) || ($abc->doc_id == '') ){
				$def = '';
			} else {
				$def = $abc->doc_id;
			}
			
			$aww	= $this->db->query("SELECT filename from trans_pks WHERE nojo='$noj' ")->row();
			
			if(!empty($aww)){
				$data['pks']	= $aww->filename;
			} 
			else
			{
				$data['pks']	= '';
			}
				
			
			//var_dump($noj);exit();
			$data['nojx']	= $noj;
			$data['pros_file_b']	= $this->job_model->detail_file_b($kid, $noj, $def);
			$data['pros_file_c']	= $this->job_model->detail_file_c($kid, $noj, $def);
			$this->load->view('joborder/detail_file_b', $data);
		}
	}
	
	
	function detail_file(){
		if ($this->session->userdata('logged_in')){
			$ajk 	= $this->input->post('data');
			$tglx 	= $ajk[0];
			$noj 	= $ajk[1];
			
			$abc = $this->db->query("SELECT doc_id from trans_doc WHERE nojo='$noj' ")->row();
			if( (empty($abc->doc_id)) || ($abc->doc_id == '') ){
				$def = '';
			} else {
				$def = $abc->doc_id;
			}
			//var_dump($def);exit();
			//$data['pros_file']		= $this->job_model->detail_file($tglx, $def, $noj);
			$data['pros_file_leg']	= $this->job_model->detail_file_leg($tglx, $def, $noj);
			$data['pros_file_ops']	= $this->job_model->detail_file_ops($tglx, $def, $noj);
			$data['pros_file_fin']	= $this->job_model->detail_file_fin($tglx, $def, $noj);
			$this->load->view('joborder/detail_file', $data);
			//echo json_encode($data);
		}
	}
	
	
	
	function detail_file_g(){
		if ($this->session->userdata('logged_in')){
			$ajk 	= $this->input->post('data');
			$noj 	= $ajk[0];
			
			$data['pros_file_g']	= $this->job_model->pros_file_g($noj);
			
			$this->load->view('joborder/detail_file_g', $data);
		}
	}
	
	
	public function preview1()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['username'] 	= $session_data['username'];
			$data['level'] 		= $session_data['level'];
			$this->load->library('pdfgenerator');
			
			$html=$this->load->view('dokumen/bapp', $data, true);
			
			$this->pdfgenerator->generate($html,'contoh', true);
			
		} 
	}	
	
	
	public function previ(){ 
		if ($this->session->userdata('logged_in')){
			$session_data 	= $this->session->userdata('logged_in');
			$data['username']		= $session_data['username'];
			$data['nama']			= $session_data['nama'];
			$data['level']			= $session_data['level'];
			$ajk 	= $this->input->post('data');
			$noj 	= $ajk[0];
			$nper 	= $ajk[1];
			$direk 	= $ajk[2];
			$nttd	= $ajk[3];
			$jttd 	= $ajk[4];
			$jish 	= $ajk[5];
			$unit 	= $ajk[6];
			$compose_textarea 	= $ajk[7];
			
			$abc = $this->db->query("SELECT id from trans_doc_lengkap WHERE nojo='$noj' ")->num_rows();
			if($abc<=0){
				$item = array(
					'nojo' 				=> $noj,
					'nama_perusahaan' 	=> $nper,
					'direktorat' 		=> $direk,
					'unit' 				=> $unit,
					'n_user' 			=> $nttd,
					'j_user' 			=> $jttd,
					'id_gm' 			=> $jish,
					'isi_dokumen'		=> $compose_textarea,
					'upd' 				=> $data['username'],
					'lup' 				=> date("Y-m-d H:i:s")
				);
				
				$this->job_model->save_lengkap_doc($item);
			} 
			else
			{
				$putih = array(
					'nojo' 				=> $noj,
				);
				
				$item = array(
					'nama_perusahaan' 	=> $nper,
					'direktorat' 		=> $direk,
					'unit' 				=> $unit,
					'n_user' 			=> $nttd,
					'j_user' 			=> $jttd,
					'id_gm' 			=> $jish,
					'isi_dokumen'		=> $compose_textarea,
					'upd' 				=> $data['username'],
					'lup' 				=> date("Y-m-d H:i:s")
				);
				
				$this->job_model->edit_lengkap_doc($item, $putih);
			}
			
			
			
		}		  
	}
	
	
	function cek_doc(){ 
		if ($this->session->userdata('logged_in')){
			$nojz 				= $this->input->post('data');
			
			$aaa = $this->db->query("SELECT id from trans_doc_lengkap WHERE nojo='$nojz' ")->num_rows();
			
			if($aaa<=0){
				$status = 0;
			}
			else {
				$status = 1;
			}
			
			//var_dump($status);exit();
			
			echo $status; exit();
		}		  
	}
	
	
	public function cetak($period, $nfile, $nojx){ 
		if ($this->session->userdata('logged_in')){
			$aaa = $this->db->query("SELECT * from trans_doc_lengkap WHERE nojo like '%$nojx%' ")->row();
		
			$data['nper'] 	= $aaa->nama_perusahaan;
			$data['direk'] 	= $aaa->direktorat;
			$data['period'] = $period;
			$data['nttd'] 	= $aaa->n_user;
			$data['jttd'] 	= $aaa->j_user;
			$data['nojx'] 	= $aaa->nojo;
			$data['unitx'] 	= $aaa->unit;
			$jish			= $aaa->id_gm;
			
			$data['nfile'] 	= $nfile;
			
			$ghj = $this->db->query("SELECT * from m_gm WHERE id='$jish' ")->row();
			
			$data['jish'] 	= $ghj->jabatan;
			$data['nish'] 	= $ghj->nama;
			
			$data['detkar']	= $this->job_model->detkar($nojx);
			$data['detpek']	= $this->job_model->detpek($nojx);
			$abc = 'dokumen/'.$nfile;
			$def = $nfile.'.pdf';
			
			$this->load->library('m_pdf');
			$html = $this->load->view($abc, $data, true);
			$pdffilepath = $nfile;
			$this->m_pdf->pdf->mPDF('utf-8','A4','','','20','20','35','25');
			$this->m_pdf->pdf->WriteHTML($html);
			$this->m_pdf->pdf->Output($pdffilepath, "I");
		}		  
	}
	
	
	
	public function previ_lpp(){ 
		if ($this->session->userdata('logged_in')){
			$session_data 	= $this->session->userdata('logged_in');
			$data['username']		= $session_data['username'];
			$data['nama']			= $session_data['nama'];
			$data['level']			= $session_data['level'];
			$ajk 				= $this->input->post('data');
			$jpks 				= $ajk[0];
			$nojxx 				= $ajk[1];
			$nfilex 			= $ajk[2];
			$nopks				= $ajk[3];
			$nilai_pks 			= $ajk[4];
			$compose_textarea 	= $ajk[5];
			$nttdx 				= $ajk[6];
			$jttdx 				= $ajk[7];
			$jishx 				= $ajk[8];
			$nperus				= $ajk[9];
			
			$item = array(
				'nojo' 				=> $nojxx,
				'n_perusahaan' 		=> $nperus,
				'judul_pks' 		=> $jpks,
				'no_pks_layanan'	=> $nopks,
				'nilai_pks'			=> $nilai_pks,
				'isi'	 			=> $compose_textarea,
				'n_user' 			=> $nttdx,
				'j_user' 			=> $jttdx,
				'id_gm' 			=> $jishx,
				'upd' 				=> $data['username'],
				'lup' 				=> date("Y-m-d H:i:s")
			);
			
			$this->job_model->save_lengkap_lpp($item);
			
		}		  
	}
	
	
	
	public function cetak_lpp($nfile, $nojxx){ 
		if ($this->session->userdata('logged_in')){
			$data['nfile'] 	= $nfile;
			
			$aaa = $this->db->query("SELECT * from trans_doc_lengkap WHERE nojo like '%$nojxx%' ")->row();
			//var_dump($aaa);exit();
			$data['n_perus'] = $aaa->nama_perusahaan;
			$data['direk'] 	= $aaa->direktorat;
			$data['period'] = $period;
			$data['nttd'] 	= $aaa->n_user;
			$data['jttd'] 	= $aaa->j_user;
			$data['nojx'] 	= $aaa->nojo;
			$data['unitx'] 	= $aaa->unit;
			$data['isi']	= $aaa->isi_dokumen;
			$jishx			= $aaa->id_gm;
			
			$qwe = $this->db->query("SELECT * from m_gm WHERE id='$jishx' ")->row();
			$aww = $this->db->query("SELECT * from trans_pks WHERE nojo like '%$nojxx%' ")->row();
			
			$data['jish'] 	= $qwe->jabatan;
			$data['nish'] 	= $qwe->nama;
			
			if(!empty($aww)){
				$data['jpks']	= $aww->judul_pks;
				$data['nopks']	= $aww->pks_cli;
				$data['nilpks']	= $aww->nilai_kontrak_pks;
			}
			else
			{
				$data['jpks']	= '';
				$data['nopks']	= '';
				$data['nilpks']	= '';
			}
			
			$abc = 'dokumen/'.$nfile;
			$def = $nfile.'.pdf';

			$this->load->library('m_pdf');
			$html = $this->load->view($abc, $data, true);
			$pdffilepath = $nfile;
			$this->m_pdf->pdf->mPDF('utf-8','A4','','','20','20','35','25');
			$this->m_pdf->pdf->WriteHTML($html);
			$this->m_pdf->pdf->Output($pdffilepath, "I");
		}		  
	}
	
	
	function pilih_gm(){
		$varray				= $this->job_model->get_mgm();
			$selectnama 	= "<option value=''>pilih</option>";
			foreach($varray as $key => $list){
				$selectnama .= "<option value='". $list['id'] ."'>". $list['jabatan'] ."</option>";
			}
		print_r($selectnama);
	}
	
}