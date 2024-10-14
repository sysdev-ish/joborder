<?php    
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('skema_model','master_model'));
	}
	

	public function komponen()
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
			
			$varray = $this->master_model->get_jeniskomponen();
				$select = "";
				foreach($varray as $key => $list){
					$select .= "<option value='". $list['id'] ."'>". $list['jenis'] ."</option>";
				}
			$data['cmbjeniskomp']	= $select;	

			// Start session (also wipes existing/previous sessions)
			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_component');
			// Option & Options
			$this->curl->option('buffersize', 10);
			// Login to HTTP user authentication
			$this->curl->http_login('devappish', 'devappish!@#');
			// Post - If you do not use post, it will just run a GET request
			
			$post = array('token' => sha1("#ISH!@#"));

			$this->curl->post($post);
			// Execute - returns responce
			$lkomp =json_decode($this->curl->execute());
			$data['token'] =sha1("#ISH!@#");

			$data['cmb_komp'] = $lkomp;		

			$sarray = $this->master_model->get_sifatkomponen();
				$select = "";
				foreach($sarray as $key => $list){
					$select .= "<option value='". $list['sifat'] ."'>". $list['sifat'] ."</option>";
				}
			$data['cmbsifatkomp']	= $select;			
			
			$this->load->view('pages/header',$data);
			$this->load->view('master/vmaster_komponen',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function bpjs()
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
			
			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$data['cmbpersax'] =json_decode($this->curl->execute());
			usort($data['cmbpersax'], array($this, "sort_persa"));	
			
			$this->load->view('pages/header',$data);
			$this->load->view('master/vmaster_bpjs',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	public function listkomponen()
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
			
			$data = $this->master_model->listkomponen($length,$start,$search,$order,$dir);

			//var_dump($data);exit();
			
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$i=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				/*if ($row['skema'] == 0){
					$btn = 'OnProgress';
					$stat = 'btn-warning';
				} elseif ($row['skema'] == 1) {
					$btn = 'Done';
					$stat = 'btn-success';
				} 	


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
				
				if($row['skema']==1)
				{
					$aaa = "<button type='button' class='btn daud btn-block btn-xs btndok' onclick='javascript:bdok(\"".$row['nojo']."\");' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>";
					$bbb = "";
					$ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['ket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
					$ddd = "";
				}
				else
				{
					$aaa = "<button type='button' class='btn daud btn-block btn-xs btndok' onclick='javascript:bdok(\"".$row['nojo']."\");' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>";
					
					if($row['flag_cancel']=='1') 
					{
						$bbb = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bdok(\"".$row['ket_cancel']."\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>";
						$ccc = "";
						$ddd = "";
					}
					else if($row['flag_cancel_sap']=='1')
					{
						$bbb = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bdok(\"".$row['ket_cancel']."\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>";
						$ccc = "";
						$ddd = "";
					}
					else
					{
						$bbb = "";
						$ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['ket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
						$ddd = "<button type='button' class='btn btn-success btn-block btn-xs btnhold' onclick='javascript:bhold(\"".$row['nojo']."\");' id='btnhold' data-toggle='modal' data-target='#EZModal'>Cancel</button>";
					}
				}
				*/

				/*$param= $row['kode'].",".$row['komponen'].",".$row['idjenis'].",".$row['idstat'];
				$par = "a".','."b";*/
				//var_dump($param);exit();
				
				if($row['mandatory']==1){
					$aabb = 'Yes';
				} else {
					$aabb = 'No';
				}
				
				$output['data'][]=array( 
					'<td>'.$i.'</td>',		
					'<td>'.$row['kode'].'</td>',			
					'<td>'.$row['komponen'].'</td>',
					'<td>'.$row['jenis'].'</td>',
					'<td style="display:none">'.$row['idjenis'].'</td>',
					'<td>'.$row['sifat'].'</td>',
					'<td>'.$aabb.'</td>',
					'<td>'.$row['status'].'</td>',
					'<td>'.$row['idstat'].'</td>',
					'<td><button type="button" class="btn btn-primary btn-xs" onclick="javascript:getedit(\''.$row['kode'].'\',\''.$row['komponen'].'\',\''.$row['idjenis'].'\',\''.$row['sifat'].'\',\''.$row['idstat'].'\',\''.$row['idkomp'].'\');" data-toggle="modal" data-target="#EModal">Edit</button></td>'
				);
				$i++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}


	function komponen_update(){
		if ($this->session->userdata('logged_in')){
			$session 	 		= $this->session->userdata('logged_in');
			$username		 	= $session['username'];
			//$data['perner']	= $perner;
			$item = array (
				'jenis'		=> strtoupper($this->input->post('data[1]')),
				'sifat'		=> strtoupper($this->input->post('data[3]')),
				'flag'		=> strtoupper($this->input->post('data[2]')),
				'upd'		=> $username,
				'lup'		=> date('Y-m-d H:m:s')
			);
			
			$where = array('id' => $this->input->post('data[0]'));

			$this->master_model->komponen_update($item, $where);
			//$this->status();
		} else {
			redirect('login', 'refresh');
		}	
	}

	public function komponensap()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)){
		 	// Start session (also wipes existing/previous sessions)
			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_component');
			// Option & Options
			$this->curl->option('buffersize', 10);
			// Login to HTTP user authentication
			$this->curl->http_login('devappish', 'devappish!@#');
			// Post - If you do not use post, it will just run a GET request
			$se 	= $_GET['q'];
			$post = array(
				'token' => sha1("#ISH!@#"),
				'search' => $se
			);

			$this->curl->post($post);
			// Execute - returns responce
			$lkomp =json_decode($this->curl->execute());
			$data['token'] =sha1("#ISH!@#");

			$data['cmb_komp'] = $lkomp;

			//echo json_encode($lkomp);
		}else{
			redirect('login');
		}
	}

	function save_komponen()
	{
		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];		
		
		$arrs 		= $this->input->post('arrs');
		$komponen	= $arrs[0];
		$jenis		= $arrs[1];
		$status		= $arrs[2];
		$sifat		= $arrs[3];
		$mandat		= $arrs[4];

		//var_dump($arrs);exit();
		
		$komps = explode("||",$komponen);
		$kodekom = $komps[0];
		$namakom = $komps[1];
		
		for($i=1;$i<=5;$i++){
			$datas = array(
				'kode' 				=> $kodekom,
				'nama'				=> $namakom,
				'jenis'	 			=> $jenis,
				'keterangan'		=> $sifat,
				'status_kontrak'	=> $i,
				'mandatory'			=> $mandat,
				'flag' 				=> $status,
				'upd'	 			=> $data['username'],
				'lup'	 			=> date("Y-m-d H:i:s")
			);
					
			$this->master_model->insert_komponen($datas);		
		}
		
		
	}
	
}
?>