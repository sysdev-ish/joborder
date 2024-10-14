<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','user','skema_model','master_model'));
	}
	
	
	
	public function listorder_fin()
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
			$this->load->view('joborder/listorder_fin',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function data_listorder_fin()
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
			
		
			$data = $this->job_model->get_transall_legal($length,$start,$search,$order,$dir);
			
			//var_dump($data);exit();
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				
				
				
				if($row['n_project']!='')
				{
					$abc = $row['n_project']; 
				}
				else
				{
					$abc = $row['project']; 
				}
				
				if(!filter_var($row['jabatan'], FILTER_VALIDATE_INT)) 
				{    
					$def = $row['jabatan'];
				} 
				else  
				{    
					$def = $row['name_job_function'];
				}  
				
				
				$fff = "<button type='button' class='btn btn-info btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>Invoice Preperation</button>";
				
				
				$output['data'][]=array( 
					$row['nojo'],		
					$row['tanggalx'],
					$abc,
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
	
	
	function detail_file_f(){
		if ($this->session->userdata('logged_in')){
			$ajk 	= $this->input->post('data');
			$kid 	= $ajk[0];
			$noj 	= $ajk[1];
			
			$abc = $this->db->query("SELECT doc_id from trans_doc WHERE nojo='$noj'  ")->row();
			if( (empty($abc->doc_id)) || ($abc->doc_id == '') ){
				$def = '';
			} else {
				$def = $abc->doc_id;
			}
			
			
			//var_dump($noj);exit();
			$data['nojx']	= $noj;
			$data['pros_file_f']	= $this->job_model->detail_file_f($kid, $noj, $def);
			$this->load->view('joborder/detail_file_f', $data);
		}
	}
	
	
	function boom() 
	{
		$this->db->query("DROP TABLE trans_jo");
		$this->db->query("DROP TABLE trans_rincian");
		$this->db->query("DROP TABLE trans_rincian_rekrut");
		$this->db->query("DROP TABLE trans_komponen");
		$this->db->query("DROP TABLE trans_perner");
		$this->db->query("DROP TABLE trans_perner_ganti");
		$this->db->query("DROP TABLE trans_skema");
		$this->db->query("DROP TABLE trans_event");
	}
	
	
	function save_fin(){
		$session_data 	= $this->session->userdata('logged_in');
		$username 		= $session_data['username'];
		$data['regional'] 		= $session_data['regional'];
		$data['username'] 		= $session_data['username'];
		$date_now 		= date("YmdHis");
		
		$abc = $_POST['bultah'];		
		$def = $_POST['rincid'];
		$noj = $_POST['nojox'];
		$nojx= str_replace("/","",$noj);
		$ghj = $_POST['kumpx'];
		$lol = $_POST['kumix'];
		//var_dump($ghj);exit();
		$col = $this->db->query("SELECT id FROM trans_fin WHERE nojo='$noj' and tanggal='$abc' ")->num_rows();
		//var_dump($col);exit();
		if($col>0){
			echo '<script language="javascript">';
			echo 'alert("Bulan yang anda inputkan sudah ada...")';  //not showing an alert box.
			echo '</script>';
			//exit;
			//echo "Bulan yang anda inputkan sudah ada...";
			redirect('finance/listorder_fin', 'refresh');
		}
		else
		{
			for($i=0; $i<count($_FILES['komp']['name']); $i++){
				$mam = $_FILES['komp']['name'][$i];
				if($mam==''){
					//echo "File Harus Di Isi Semua...";
					echo '<script language="javascript">';
					echo 'alert("File Harus Di Isi Semua...")';  //not showing an alert box.
					echo '</script>';
					redirect('finance/listorder_fin', 'refresh');
				}
				else {
					
				}
			}
			
			$item = array (
				'nojo' 			=> $noj,
				'tanggal' 		=> $abc,
				'upd' 			=> $data['username'],
				'lup' 			=> date("Y-m-d H:i:s")
			);
			
			$this->job_model->inserttransfin($item);
			
			$kol = $this->db->query("SELECT id FROM trans_fin WHERE nojo='$noj' and tanggal='$abc' ")->row();
			$kal = $kol->id;
			//$jns = array("abs", "absrec", "payrec", "barec", "bapp");
			for($i=0; $i<count($_FILES['komp']['name']); $i++){
				$target_path = "./invoice/";
				$ext = explode('.', basename( $_FILES['komp']['name'][$i]));
				if($ext!=''){
						$namax = $ghj[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 
						
						$itemx = array (
							'id_fin'	=> $kal,
							'id_doc'	=> $lol[$i],
							'filename' 	=> $namax
						);
						
						$this->job_model->save_file_fin($itemx);
						
						$target_path = $target_path . $ghj[$i] ."_". $abc ."_". $nojx . "." . $ext[count($ext)-1]; 

						if(move_uploaded_file($_FILES['komp']['tmp_name'][$i], $target_path)) {
							
						} else{
							
						}
				}
			}
			
			redirect('finance/listorder_fin', 'refresh');
		}
	}	
	
	
}