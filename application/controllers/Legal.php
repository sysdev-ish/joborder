<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Legal extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','user','skema_model','master_model'));
	}
	
	
	
	public function listorder_leg()
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
			
			
			//var_dump($zparam);exit();
			
			$xjprorray = $this->skema_model->get_zskema();
			$select = "";
			foreach($xjprorray as $key => $list){
				$select .= "<option value=". $list['zskema'] .">". $list['zskema'] . "</option>";
			}
			$data['cmbzskema']		= $select;
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/listorder_leg',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function data_listorder_leg()
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
			
			if($level==12){
				$data = $this->job_model->get_transall_legal($length,$start,$search,$order,$dir);
			}
			
			
			//var_dump($data);exit();
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				if($row['jml_pks']==1)
				{
					$btn = 'Done';
					$stat = 'btn-success';
				}
				else 
				{
					$btn = 'Upload PKS';
					$stat = 'btn-info';
				}
				
				$ko_persa = $row['persa_sap'];
				if(($ko_persa!='') || ($ko_persa!=null)){
					$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$post = array('token' => sha1("#ISH!@#"), 'search' => $ko_persa);
					$this->curl->post($post);
					$nnnx =json_decode($this->curl->execute());
					$plk = $nnnx[0]->persa;
				}
				else {
					if($row['n_project']!='')
					{
						$plk = $row['n_project']; 
					}
					else
					{
						$plk = $row['project']; 
					}
				}
				
				
				if(!filter_var($row['jabatan'], FILTER_VALIDATE_INT)) 
				{    
					$def = $row['jabatan'];
				} 
				else  
				{    
					$def = $row['name_job_function'];
				}   
				
				if($level==12){
					if($row['jml_pks']==1){
						$fff = "<button type='button' class='btn ".$stat." btn-block btn-xs' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\", \"".$row['jml_pks']."\", \"".$row['pks_cli']."\", \"".$row['pks_ish']."\", \"".$row['judul_pks']."\", \"".$row['nilai_kontrak_pks']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>". $btn ."</button>";
					}
					else {
						$fff = "<button type='button' class='btn ".$stat." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\", \"".$row['jml_pks']."\", \"".$row['pks_cli']."\", \"".$row['pks_ish']."\", \"".$row['judul_pks']."\", \"".$row['nilai_kontrak_pks']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>". $btn ."</button>";
					}
				}
				
				
				$output['data'][]=array( 
					$row['nojo'],		
					//$row['tanggalx'],
					$plk,
					$row['bekerja'],
					$row['dnama'],
					$row['ket_atasan'],
					$row['ket_admin'],
					$row['komentar'],
					$row['ket_cancel'],
					$row['ket_done'],
					$row['id'],
					$row['project'],
					$row['lokasix'],
					//$row['komponen_bak'],
					'<td><a href="'.base_url().'uploads/'.$row['komponen_bak'].'" target="_blank">'.$row['komponen_bak'].'</a></td>',
					'<td><a href="'.base_url().'invoice/'.$row['filename'].'" target="_blank">'.$row['filename'].'</a></td>',
					'<td> '.$fff.' </td>'
					
					

					/*'<a href="'.base_url().'index.php/home/det_profile/'.$row['perner'].'">View Foto</a>'*/
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}
	
	
	public function save_pks() {
		if ($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['username'] 	= $session_data['username'];
			
			$abc = 'pks';
			
			$file_element_name = $this->input->post('att');
			$nojo = $this->input->post('nojokz');
			$nojov = str_replace('/','',$nojo);
			$pksish = $this->input->post('pksish');
			$pksclient = $this->input->post('pksclient');
			$judpks = $this->input->post('judpks');
			$nilpks = $this->input->post('nilpks');
			$tglkontpks = $this->input->post('tglkontpks');
					
			$ext = pathinfo($file_element_name, PATHINFO_EXTENSION);
			$file_name = $nojo . "." . $ext;
			$namax = $nojov ."_". $abc . "." . $ext; 
			
			$config['upload_path'] = './invoice/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx|rar|zip';
			$config['max_size']    = '5120000';
			$config['file_name'] = $namax;
			
			$this->load->library('upload', $config);	
			$this->upload->do_upload('file');
			
			
			$item = array (
				'nojo' 					=> $nojo,
				'pks_cli' 				=> $pksclient,
				'pks_ish' 				=> $pksish,
				'filename' 				=> $namax,
				'docid' 				=> 1,
				'judul_pks'				=> $judpks,
				'nilai_kontrak_pks' 	=> $nilpks,
				'tgl_kontrak' 			=> $tglkontpks,
				'upd' 					=> $data['username'],
				'lup' 					=> date("Y-m-d H:i:s")
			);
			
			$this->job_model->save_pks($item);
			//redirect ('pro/data_listorder_pro','refresh');
		}
	}	
	
	
	
	
	
}