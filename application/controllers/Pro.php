<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Pro extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','user','skema_model','master_model'));
	}
	
	
	
	public function listorder_pro()
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
			$this->load->view('joborder/listorder_pro',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function data_listorder_pro()
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
			
			if($level==10){
				$data = $this->job_model->get_transall_pro($length,$start,$search,$order,$dir);
			}
			else if($level==11)
			{
				$data = $this->job_model->app_transall_pro($length,$start,$search,$order,$dir);
			}
			
			
			//var_dump($data);exit();
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				if($row['flag']==1)
				{
					//if($level==10){
						$btn = 'Waiting Approval';
						$stat = 'btn-warning';
					//} else {
						//$btn = 'Waiting Approval';
						//$stat = 'btn-warning';
					//}
				}
				else if($row['flag']==2)
				{
					$btn = 'Approved';
					$stat = 'btn-success';
				}
				else if($row['flag']==9)
				{
					$btn = 'Rejected';
					$stat = 'btn-danger';
				}
				else
				{
					$btn = 'Input Harga';
					$stat = 'btn-info';
				}
				
				
				if($row['n_project']!='')
				{
					$abc = $row['n_project']; 
				}
				else
				{
					$abc = $row['project']; 
				}
				 
				
				if($level==10){
					$fff = "<button type='button' class='btn ".$stat." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\", \"".$row['harga']."\", \"".$row['flag']."\", \"".$row['notes_app']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>".$btn."</button>";
				}
				else if($level==11)
				{
					//if($row['flag']==1){
						$fff = "<button type='button' class='btn ".$stat." btn-block btn-xs btnadd' onclick='javascript:xbadd(\"".$row['id']."\", \"".$row['nojo']."\", \"".$row['harga']."\", \"".$row['flag']."\", \"".$row['notes_app']."\");' id='btnadd' data-toggle='modal' data-target='#KmyModal'>".$btn."</button>";
					//} else if($row['flag']==2) {
						//$fff = "<button type='button' class='btn btn-danger btn-block btn-xs btnadd' onclick='javascript:xbadd(\"".$row['id']."\", \"".$row['nojo']."\", \"".$row['harga']."\", \"".$row['flag']."\");' id='btnadd' data-toggle='modal' data-target='#KmyModal'>".$btn."</button>";
					//} else {
						//$fff = "<button type='button' class='btn btn-info btn-block btn-xs btnadd' onclick='javascript:xbadd(\"".$row['id']."\", \"".$row['nojo']."\", \"".$row['harga']."\", \"".$row['flag']."\");' id='btnadd' data-toggle='modal' data-target='#KmyModal'>".$btn."</button>";
					//}
				}
				
				
				
				$output['data'][]=array( 
					$row['nojo'],					
					//$row['ntype'],
					$row['periode'],
					$abc,
					$row['tgl1'],
					$row['tgl2'],
					$row['item_name'],
					$row['qty'],
					$row['spec'],
					$row['budget'],
					$row['harga'],
					'<td><a href="'.base_url().'procurement/'.$row['filename'].'" >'. $row['filename'] .'</a></td>',
					//$row['filename'],
					//$def,
					//$row['lokasi'],
					//$row['atasan'], 
					//$row['kontrak'], 
					//$row['waktu'],
					//$row['jumlah'],
					$row['nama'],
					$row['item_id'],
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
	
	
	public function usave_pro() {
		$abc = 'procurement';
		
		$file_element_name = $this->input->post('att');
		$nojo = $this->input->post('nojokz');
		$cid = $this->input->post('rincidz');
		$harga = $this->input->post('hargaxz');
				
		$ext = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$file_name = $nojo . "." . $ext;
		$namax = $cid ."_". $abc . "." . $ext; 
		
        $config['upload_path'] = './procurement/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx|rar|zip';
		//$config['max_size']    = 1024 * 100;
		$config['file_name'] = $namax;
		
        $this->load->library('upload', $config);	
		$this->upload->do_upload('file');
		
		
		$putih = array (
			'id' => $cid
		);
		
		$item = array (
			'harga' => $harga,
			'filename' => $namax,
			'flag' => '1',
		);
		
		$this->job_model->update_file_pro($item, $putih);
		//redirect ('pro/data_listorder_pro','refresh');
	}	
	
	
	function app_pro(){
		if ($this->session->userdata('logged_in')){
			$ajk 	= $this->input->post('data');
			$aid 	= $ajk[0];
			$note 	= $ajk[1];
			
			$putih = array(
				'id' => $aid
			);
			
			$item = array(
				'flag' => '2',
				'notes_app' => $note
			);
			
			$this->job_model->app_pro($item, $putih);
		}
	}
	
	
	function rej_pro(){
		if ($this->session->userdata('logged_in')){
			$ajk 	= $this->input->post('data');
			$aid 	= $ajk[0];
			$note 	= $ajk[1];
			
			$putih = array(
				'id' => $aid
			);
			
			$item = array(
				'flag' => '9',
				'notes_app' => $note
			);
			
			$this->job_model->app_pro($item, $putih);
		}
	}
	
	
}