<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Home.php");

class Event extends Home {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','user','skema_model','event_model'));
	}
	
	
	
	public function formadd()
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
			
			$this->load->view('pages/header',$data);
			$this->load->view('event/formadd',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	public function formadd_new()
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
			
			$this->load->view('pages/header',$data);
			$this->load->view('event/formadd_new',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	public function cekform()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level']	 		= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";
			
			$ctjprorray = $this->skema_model->get_customer();
				$select = "";
				foreach($ctjprorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
				}
			$data['cmbcust']		= $select;
			
			$ctjprorray = $this->job_model->get_allar();
				$select = "";
				foreach($ctjprorray as $key => $list){
					$select .= "<option value=". $list->AREA .">". $list->AREA_TEXT . "</option>";
				}
			$data['cmbkota']		= $select;
			
			$ctjprorray = $this->skema_model->listnegara();
				$select = "";
				foreach($ctjprorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
				}
			$data['cmbneg']		= $select;
			
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
			
			$sid = $this->input->post("idx");
			$aa  = $this->input->post("arrlist");
			$data['fl']  = $this->input->post("flagx");
			$data['listedit'] = $this->event_model->listedit($sid);
			$data['npm'] 	  = $this->db->query("Select nama from m_login where username='".$data['listedit']->userpm."' ")->row();
			$data['ndiv'] 	  = $this->db->query("Select divisi from m_divisi where id='".$data['listedit']->divisi."' ")->row();
			if($aa==1){
				$this->load->view('event/addform',$data);
			} else {
				$this->load->view('event/editform',$data);
			}
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	public function cekform_new()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level']	 		= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";
			
			$ctjprorray = $this->skema_model->get_customer();
				$select = "";
				foreach($ctjprorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
				}
			$data['cmbcust']		= $select;
			
			$ctjprorray = $this->job_model->get_allar();
				$select = "";
				foreach($ctjprorray as $key => $list){
					$select .= "<option value=". $list->AREA .">". $list->AREA_TEXT . "</option>";
				}
			$data['cmbkota']		= $select;
			
			$ctjprorray = $this->skema_model->listnegara();
				$select = "";
				foreach($ctjprorray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['nama'] . "</option>";
				}
			$data['cmbneg']		= $select;
			
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
			
			$sid = $this->input->post("idx");
			$aa  = $this->input->post("arrlist");
			$data['fl']  = $this->input->post("flagx");
			$data['listedit'] = $this->event_model->listedit($sid);
			$data['npm'] 	  = $this->db->query("Select nama from m_login where username='".$data['listedit']->userpm."' ")->row();
			$data['ndiv'] 	  = $this->db->query("Select divisi from m_divisi where id='".$data['listedit']->divisi."' ")->row();
			if($aa==1){
				$this->load->view('event/addform_new',$data);
			} else {
				$this->load->view('event/editform_new',$data);
			}
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	public function listdata_event()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)){
			$postparam = $this->input->post();
            
			$parsearch	= array (
				"cnoevent"       => $postparam['cnoevent'],
				"cnmevent"       => $postparam['cnmevent'],
				"cjevent"        => $postparam['cjevent'],
				"csperiode"      => $postparam['csperiode'],
				"ceperiode"      => $postparam['ceperiode'],
				"ccustomer"      => $postparam['ccustomer'],
				"ctevent"      	 => $postparam['ctevent']
			);

			$draw=$postparam['draw'];
			$length=$postparam['length'];
			$start=$postparam['start'];
			$search=$postparam['search']["value"];
			
			$order=$postparam['order'][0]['column'];
			$dir=$postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];
			
			$data = $this->event_model->getdata_event($length,$start,$search,$order,$dir,$parsearch,$level,$username);
			
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				if($row['flag']=='1'){
					$stat = 'Waiting Approval PPC';
				}
				else if($row['flag']=='2'){
					$stat = 'Done PPC';
				}
				else if($row['flag']=='3'){
					$stat = 'Done PM';
				}
				else if($row['flag']=='9'){
					$stat = 'Rejected';
				} else {
					$stat = 'Waiting Approval Atasan';
				}
				
				// $ketx = json_encode($row['capp']);
				// $ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['perner']."\",\"".$row['sapp']."\",".$ketx.",\"".$typez."\");' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";
				
				// $ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\");' id='btnadd' data-toggle='modal' data-target='#myModal'>Waiting</button>";
				
				$huhui = "<td><a href='#' id='btndes'>".$stat."</a></td>";
				$lamp  = "<td><a href='". base_url() . 'event/' . $row['lampiran'] ."' style='color:red;' target='_blank'>".$row['lampiran']."</a></td>";
				
				$acti  = "<td>";
				$acti .= "<center><button type='button' class='btn btn-box-tool btnadd_komp' id='btnadd_komp' onclick='javascript:vevent(\"".$row['id']."\",\"".$row['flag']."\");'><i class='glyphicon glyphicon-eye-open'></i></button>";
				$acti .= "</td>";
				
				if($row['flag_pengadaan']=='1'){
					$fp = 'Pengadaan';	
				} else {
					$fp = 'Insentive';	
				}
				
				if($row['lup_app']==''){
					$tgl = $row['lup'];
				} else {
					$tgl = $row['lup_app'];
				}
				
				$output['data'][]=array( 				
					$fp,	
					$row['no_event'],	
					$row['nama_event'],	
					$row['startperiode'],	
					$row['endperiode'],	
					$row['customer'],	
					$row['jenisevent'],
					$lamp,
					$row['nama'],
					$tgl,
					$huhui,
					$acti
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}
	
	
	public function listdata_event_new()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)){
			$postparam = $this->input->post();
            
			$parsearch	= array (
				"cnoevent"       => $postparam['cnoevent'],
				"cnmevent"       => $postparam['cnmevent'],
				"cjevent"        => $postparam['cjevent'],
				"csperiode"      => $postparam['csperiode'],
				"ceperiode"      => $postparam['ceperiode'],
				"ccustomer"      => $postparam['ccustomer'],
				"ctevent"      	 => $postparam['ctevent'],
				"cpengadaan"	 => $postparam['cpengadaan']
			);

			$draw=$postparam['draw'];
			$length=$postparam['length'];
			$start=$postparam['start'];
			$search=$postparam['search']["value"];
			
			$order=$postparam['order'][0]['column'];
			$dir=$postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];
			
			$data = $this->event_model->getdata_event($length,$start,$search,$order,$dir,$parsearch,$level,$username);
			
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				if($row['flag']=='1'){
					$stat = 'Waiting Approval PPC';
				}
				else if($row['flag']=='2'){
					$stat = 'Done PPC';
				}
				else if($row['flag']=='3'){
					$stat = 'Done PM';
				}
				else if($row['flag']=='9'){
					$stat = 'Rejected';
				} else {
					$stat = 'Waiting Approval Atasan';
				}
				
				// $ketx = json_encode($row['capp']);
				// $ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['perner']."\",\"".$row['sapp']."\",".$ketx.",\"".$typez."\");' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";
				
				// $ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\");' id='btnadd' data-toggle='modal' data-target='#myModal'>Waiting</button>";
				
				$huhui = "<td><a href='#' id='btndes'>".$stat."</a></td>";
				$lamp  = "<td><a href='". base_url() . 'event/' . $row['lampiran'] ."' style='color:red;' target='_blank'>".$row['lampiran']."</a></td>";
				
				$acti  = "<td>";
				$acti .= "<center><button type='button' class='btn btn-box-tool btnadd_komp' id='btnadd_komp' onclick='javascript:vevent(\"".$row['id']."\",\"".$row['flag']."\");'><i class='glyphicon glyphicon-eye-open'></i></button>";
				$acti .= "</td>";
				
				if($row['flag_pengadaan']=='1'){
					$fp = 'Pengadaan';	
				} else {
					$fp = 'Insentive';	
				}
				
				if($row['type_pengadaan']=='1'){
					$tp = 'Pembayaran';	
				} else if($row['type_pengadaan']=='2'){
					$tp = 'Barang';	
				} else {
					$tp = '-';	
				}
				
				if($row['lup']==''){
					$tgl = $row['lup_app'];
				} else {
					$tgl = $row['lup'];
				}
				
				$output['data'][]=array( 				
					$fp,	
					$tp,	
					$row['no_event'],	
					$row['nama_event'],	
					$row['startperiode'],	
					$row['endperiode'],	
					$row['customer'],	
					$row['jenisevent'],
					$lamp,
					$row['nama'],
					$tgl,
					$huhui,
					$acti
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}
	
	
	function save_lampiran(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['type'] 			= $session_data['type'];
		$data['id'] 			= $session_data['id'];
		$data['title'] 			= "Job Order";
		$date_now 		= date("YmdHis");
		
		$nojo = "";
		$cons = '/ISH/01010107/';
		$year = date('Y');
		
		$nojob = $this->event_model->get_insertjo();
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
		
		$sid = $this->input->post('eid');
		if($sid!=''){
			$filelamp = $this->db->query("Select lampiran, no_event FROM trans_event WHERE id='$sid' ")->row();
			if($_FILES['lampiran']['name']!=''){
				$this->event_model->dellamp($filelamp->lampiran);
			}
			$nama_file = str_replace("/","",$filelamp->no_event);
		} else {
			$nama_file = str_replace("/","",$data['nojo']);
		}
		
		if($_FILES['lampiran']['name']!=''){
			$target_path = "./event/";
			$ext = explode('.', basename( $_FILES['lampiran']['name']));
			$target_path = $target_path . $nama_file . "." . $ext[count($ext)-1]; 
			// var_dump($nama_file);die;

			if(move_uploaded_file($_FILES['lampiran']['tmp_name'], $target_path)) {
				
			} else{
				 
			}
		}	
	}
	
	
	function save_all(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['typex'] 			= $session_data['type'];
		$data['id'] 			= $session_data['id'];
		$data['title'] 			= "Job Order";
		$date_now 		= date("YmdHis");
		
		$nojo = "";
		$cons = '/ISH/01010107/';
		$year = date('Y');
		$nojob = $this->event_model->get_insertjo();
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
		$nama_file = str_replace("/","",$data['nojo']);
		
		$file_element_name = $this->input->post('arrlist[15]');	
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		if($ext=='')
		{
			$file_name  = "";
		}
		else
		{
			$file_name = $nama_file . "." . $ext;
		}
		
		$item = array (
			'no_event' 		=> $data['nojo'],
			'nama_event' 	=> $this->input->post('arrlist[0]'),
			'startperiode' 	=> $this->input->post('arrlist[1]'),
			'endperiode' 	=> $this->input->post('arrlist[2]'),
			'kd_customer' 	=> $this->input->post('arrlist[3]'),
			'customer' 		=> $this->input->post('arrlist[4]'),
			'peserta' 		=> $this->input->post('arrlist[5]'),
			'jenisevent' 	=> $this->input->post('arrlist[6]'),
			'lokasi' 		=> $this->input->post('arrlist[7]'),
			'kdnegara' 		=> $this->input->post('arrlist[8]'),
			'negara' 		=> $this->input->post('arrlist[9]'),
			'kdkota' 		=> $this->input->post('arrlist[10]'),
			'kota' 			=> $this->input->post('arrlist[11]'),
			'sumberalokasi'	=> $this->input->post('arrlist[14]'),
			'biaya' 		=> $this->input->post('arrlist[12]'),
			'mfee' 			=> $this->input->post('arrlist[13]'),
			'flag_pengadaan' => $this->input->post('arrlist[16]'),
			'lampiran' 		=> $file_name,
			'upd' 			=> $data['username'],
			'lup' 			=> date("Y-m-d H:i:s"),
		);

		$this->event_model->simpanevent($item);

		if($data['level']=='1')
		{
			$check = $this->job_model->get_email();
			
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['nojoz'] 	  = $data['nojo'];
			
			$data['skrg'] = date("d-m-Y H:i:s");
			
			$message = $this->load->view('addjo/email_new_event.php',$data,TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
			
		}
		else
		{
			$check = $this->job_model->newget_email_pm();
			foreach ($check as $val) {
				$test = $val['email'];
			
				$data['nojoz'] 	  = $data['nojo'];
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$message = $this->load->view('addjo/email_new_event.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
				
				echo "Data Telah Di Approve";
			}
		}	
	}
	
	function save_all_new(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['typex'] 			= $session_data['type'];
		$data['id'] 			= $session_data['id'];
		$data['title'] 			= "Job Order";
		$date_now 		= date("YmdHis");
		
		$nojo = "";
		$cons = '/ISH/01010107/';
		$year = date('Y');
		$nojob = $this->event_model->get_insertjo();
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
		$nama_file = str_replace("/","",$data['nojo']);
		
		$file_element_name = $this->input->post('arrlist[15]');	
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		if($ext=='')
		{
			$file_name  = "";
		}
		else
		{
			$file_name = $nama_file . "." . $ext;
		}
		
		$item = array (
			'no_event' 		=> $data['nojo'],
			'nama_event' 	=> $this->input->post('arrlist[0]'),
			'startperiode' 	=> $this->input->post('arrlist[1]'),
			'endperiode' 	=> $this->input->post('arrlist[2]'),
			'kd_customer' 	=> $this->input->post('arrlist[3]'),
			'customer' 		=> $this->input->post('arrlist[4]'),
			'peserta' 		=> $this->input->post('arrlist[5]'),
			'jenisevent' 	=> $this->input->post('arrlist[6]'),
			'lokasi' 		=> $this->input->post('arrlist[7]'),
			'kdnegara' 		=> $this->input->post('arrlist[8]'),
			'negara' 		=> $this->input->post('arrlist[9]'),
			'kdkota' 		=> $this->input->post('arrlist[10]'),
			'kota' 			=> $this->input->post('arrlist[11]'),
			'sumberalokasi'	=> $this->input->post('arrlist[14]'),
			'biaya' 		=> str_replace('.','',$this->input->post('arrlist[12]')),
			'mfee' 			=> $this->input->post('arrlist[13]'),
			'flag_pengadaan' => $this->input->post('arrlist[16]'),
			'type_pengadaan' => $this->input->post('arrlist[17]'),
			'jenis_lampiran' 	=> $this->input->post('arrlist[18]'),
			'no_lampiran' 		=> $this->input->post('arrlist[19]'),
			'nominal_lampiran' => str_replace('.','',$this->input->post('arrlist[20]')),
			'lampiran' 		=> $file_name,
			'upd' 			=> $data['username'],
			'lup' 			=> date("Y-m-d H:i:s"),
		);

		$this->event_model->simpanevent($item);

		if($data['level']=='1')
		{
			$check = $this->job_model->get_email();
			
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['nojoz'] 	  = $data['nojo'];
			
			$data['skrg'] = date("d-m-Y H:i:s");
			
			$message = $this->load->view('addjo/email_new_event.php',$data,TRUE); // this will return you html data as message

			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
			
		}
		else
		{
			$check = $this->job_model->newget_email_pm();
			foreach ($check as $val) {
				$test = $val['email'];
			
				$data['nojoz'] 	  = $data['nojo'];
				
				$data['skrg'] = date("d-m-Y H:i:s");
				
				$message = $this->load->view('addjo/email_new_event.php',$data,TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
				
				echo "Data Telah Di Approve";
			}
		}	
	}
	
	function edit_all(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['type'] 			= $session_data['type'];
		$data['id'] 			= $session_data['id'];
		$data['title'] 			= "Job Order";
		$date_now 		= date("YmdHis");
		
		$kid = $this->input->post('arrlist[15]');
		$file_element_name = $this->input->post('arrlist[16]');	
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$filelamp = $this->db->query("Select lampiran, no_event FROM trans_event WHERE id='$kid' ")->row();
		if($ext=='')
		{
			$file_name  = $filelamp->lampiran;
		}
		else
		{
			$nama_file = str_replace("/","",$filelamp->no_event);
			$file_name = $nama_file . "." . $ext;
		}
		
		$item1 = array (
			'id' 	=> $this->input->post('arrlist[15]'),
		);
		
		$item = array (
			'nama_event' 	=> $this->input->post('arrlist[0]'),
			'startperiode' 	=> $this->input->post('arrlist[1]'),
			'endperiode' 	=> $this->input->post('arrlist[2]'),
			'kd_customer' 	=> $this->input->post('arrlist[3]'),
			'customer' 		=> $this->input->post('arrlist[4]'),
			'peserta' 		=> $this->input->post('arrlist[5]'),
			'jenisevent' 	=> $this->input->post('arrlist[6]'),
			'lokasi' 		=> $this->input->post('arrlist[7]'),
			'kdnegara' 		=> $this->input->post('arrlist[8]'),
			'negara' 		=> $this->input->post('arrlist[9]'),
			'kdkota' 		=> $this->input->post('arrlist[10]'),
			'kota' 			=> $this->input->post('arrlist[11]'),
			'sumberalokasi'	=> $this->input->post('arrlist[14]'),
			'biaya' 		=> $this->input->post('arrlist[12]'),
			'mfee' 			=> $this->input->post('arrlist[13]'),
			'flag_pengadaan' => $this->input->post('arrlist[17]'),
			'lampiran' 		=> $file_name,
			'upd' 			=> $data['username'],
			'lup_edited' 	=> date("Y-m-d H:i:s")
		);
		
		$putih = array (
			'eventid' 	=> $this->input->post('arrlist[15]'),
			'flag' 		=> '0',
			'ket' 		=> '',
			'upd' 		=> $data['username'],
			'lup' 		=> date("Y-m-d H:i:s")
		);
		$this->event_model->ubahevent($item, $item1);	
		$this->event_model->saveapp_event($putih);
		
		$ide = $this->input->post('arrlist[15]');
		$cek_no = $this->db->query("Select no_event From trans_event Where id='$ide' ")->row();	
		
		if($data['level']=='1')
		{
			$check = $this->job_model->get_email();
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['nojoz'] 	  = $cek_no->no_event;
			$data['skrg'] = date("d-m-Y H:i:s");
			$message = $this->load->view('addjo/email_new_event.php',$data,TRUE); // this will return you html data as message
			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
			
		}
		else
		{
			$check = $this->job_model->newget_email_pm();
			foreach ($check as $val) {
				$test = $val['email'];
				$data['nojoz'] 	  = $cek_no->no_event;
				$data['skrg'] = date("d-m-Y H:i:s");
				$message = $this->load->view('addjo/email_new_event.php',$data,TRUE); // this will return you html data as message
				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
				echo "Data Telah Di Approve";
			}
		}	
	}
	
	function edit_all_new(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['type'] 			= $session_data['type'];
		$data['id'] 			= $session_data['id'];
		$data['title'] 			= "Job Order";
		$date_now 		= date("YmdHis");
		
		$kid = $this->input->post('arrlist[15]');
		$file_element_name = $this->input->post('arrlist[16]');	
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		$filelamp = $this->db->query("Select lampiran, no_event FROM trans_event WHERE id='$kid' ")->row();
		if($ext=='')
		{
			$file_name  = $filelamp->lampiran;
		}
		else
		{
			$nama_file = str_replace("/","",$filelamp->no_event);
			$file_name = $nama_file . "." . $ext;
		}
		
		$item1 = array (
			'id' 	=> $this->input->post('arrlist[15]'),
		);
		
		$item = array (
			'nama_event' 	=> $this->input->post('arrlist[0]'),
			'startperiode' 	=> $this->input->post('arrlist[1]'),
			'endperiode' 	=> $this->input->post('arrlist[2]'),
			'kd_customer' 	=> $this->input->post('arrlist[3]'),
			'customer' 		=> $this->input->post('arrlist[4]'),
			'peserta' 		=> $this->input->post('arrlist[5]'),
			'jenisevent' 	=> $this->input->post('arrlist[6]'),
			'lokasi' 		=> $this->input->post('arrlist[7]'),
			'kdnegara' 		=> $this->input->post('arrlist[8]'),
			'negara' 		=> $this->input->post('arrlist[9]'),
			'kdkota' 		=> $this->input->post('arrlist[10]'),
			'kota' 			=> $this->input->post('arrlist[11]'),
			'sumberalokasi'	=> $this->input->post('arrlist[14]'),
			'biaya' 		=> str_replace('.','',$this->input->post('arrlist[12]')),
			'mfee' 			=> $this->input->post('arrlist[13]'),
			'flag_pengadaan' => $this->input->post('arrlist[17]'),
			'type_pengadaan' => $this->input->post('arrlist[18]'),
			'jenis_lampiran' 	=> $this->input->post('arrlist[19]'),
			'no_lampiran' 		=> $this->input->post('arrlist[20]'),
			'nominal_lampiran' => str_replace('.','',$this->input->post('arrlist[21]')),
			'lampiran' 		=> $file_name,
			'upd' 			=> $data['username'],
			'lup_edited' 	=> date("Y-m-d H:i:s")
		);
		
		$putih = array (
			'eventid' 	=> $this->input->post('arrlist[15]'),
			'flag' 		=> '0',
			'ket' 		=> '',
			'upd' 		=> $data['username'],
			'lup' 		=> date("Y-m-d H:i:s")
		);
		$this->event_model->ubahevent($item, $item1);	
		$this->event_model->saveapp_event($putih);
		
		$ide = $this->input->post('arrlist[15]');
		$cek_no = $this->db->query("Select no_event From trans_event Where id='$ide' ")->row();	
		
		if($data['level']=='1')
		{
			$check = $this->job_model->get_email();
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['nojoz'] 	  = $cek_no->no_event;
			$data['skrg'] = date("d-m-Y H:i:s");
			$message = $this->load->view('addjo/email_new_event.php',$data,TRUE); // this will return you html data as message
			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
			
		}
		else
		{
			$check = $this->job_model->newget_email_pm();
			foreach ($check as $val) {
				$test = $val['email'];
				$data['nojoz'] 	  = $cek_no->no_event;
				$data['skrg'] = date("d-m-Y H:i:s");
				$message = $this->load->view('addjo/email_new_event.php',$data,TRUE); // this will return you html data as message
				$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
				echo "Data Telah Di Approve";
			}
		}	
	}
	
	function appevent(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['namax'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['type'] 			= $session_data['type'];
		$data['id'] 			= $session_data['id'];
		$data['title'] 			= "Job Order";
		$date_now 		= date("YmdHis");
		
		$idx = $this->input->post('arrlist[0]');
		$jenapp = $this->input->post('xstatx');
		$cek = $this->db->query("Select flag From trans_eventapp Where eventid='$idx' Order By id DESC Limit 1 ")->row();
		if($jenapp==2){
			$bpk = 9;
		} else {
			if($cek->flag==null OR $cek->flag==0){
				$bpk = 1;
			} else if($cek->flag==1){
				$bpk = 2;
			}
		}	
		
		$putih = array (
			'eventid' 	=> $this->input->post('arrlist[0]'),
			'flag' 		=> $bpk,
			'ket' 		=> $this->input->post('arrlist[1]'),
			'upd' 		=> $data['username'],
			'lup' 		=> date("Y-m-d H:i:s")
		);	
		// var_dump($putih);die;
		$this->event_model->saveapp_event($putih);
		
		$ide = $this->input->post('arrlist[0]');
		$cek_no = $this->db->query("Select no_event,upd From trans_event Where id='$ide' ")->row();
		$cek_nama = $this->db->query("Select nama From m_login Where username='".$cek_no->upd."' ")->row();
		
		if($jenapp==2){
			$bpk = 9;
			$check = $this->job_model->get_email_creater($cek_no->upd);
			$test = $check->email;
			$data['nojoz'] 	  = $cek_no->no_event;
			$data['skrg'] 	  = date("d-m-Y H:i:s");
			$message = $this->load->view('addjo/email_reject_event.php',$data,TRUE); // this will return you html data as message
			$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
		} else {
			if($cek->flag==null OR $cek->flag==0){
				$check = $this->job_model->newget_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];
					$data['nojoz'] 	= $cek_no->no_event;
					$data['skrg'] 	= date("d-m-Y H:i:s");
					$data['nama'] 	= $cek_nama->nama;
					$message = $this->load->view('addjo/email_app_event.php',$data,TRUE); // this will return you html data as message
					$hasilkirim = $this->emailsent($test,'soehartobaru@gmail.com','Notifikasi Pengajuan JO',$message);
				}
			} else if($cek->flag==1){
				$item1 = array (
					'id' 	=> $this->input->post('arrlist[0]'),
				);

				$item = array (
					'userpm' 	=> $this->input->post('arrlist[2]'),
					'divisi' 	=> $this->input->post('arrlist[3]'),
					'lup_ppc' 	=> date("d-m-Y H:i:s")
				);		
				$this->event_model->ubahevent($item,$item1);
				
				$email_ppc = $this->job_model->email_ppc_aja();
				$email_pm  = $this->db->query("SELECT email FROM m_login Where username='".$this->input->post('arrlist[2]')."' ")->row();		
				$messagex = $this->load->view('addjo/email_app_event.php',$data,TRUE); // this will return you html data as message
				$hasilkirimx = $this->emailsent($email_pm->email,$email_ppc->email,'Notifikasi Done Event JO',$messagex);
			}
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
	
	public function hitung_pro($next){
		$inext = strlen($next);
		switch ($inext){
			case 1: $noj = "0000000" . $next; break; 
			case 2: $noj = "000000" . $next; break;
			case 3: $noj = "00000" . $next; break;
			case 4: $noj = "0000" . $next; break; 
			case 5: $noj = "000" . $next; break;
			case 6: $noj = "00" . $next; break;
			case 7: $noj = "0" . $next; break;
			case 8: $noj = $next; break;
		}
		return $noj;
	}

		
	public function emailsent($vartoemail,$varccemail,$varsubject,$msgemail){
		$post = array(
			'from'			=> 'no-reply@ish.co.id',
			'to[]'			=> $vartoemail,
			'body'			=> $msgemail,
			'subject'		=> $varsubject,
			'token'			=> 'ish@cipete',
			'cc'			=> '',
		);
		
		$this->curl->create("http://192.168.88.27/mailgateway/send");					
		$this->curl->post($post);
		$response = json_decode($this->curl->execute());
		/*
		$config = Array(
		 'protocol' => 'smtp',
		 'smtp_host' => 'ssl://mail.ish.co.id',
		 'smtp_port' => 465,
		 'smtp_user' => 'no-reply@ish.co.id', // change it to yours
		 'smtp_pass' => 'cgdv2oleflDIdTId', // change it to yours
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
		*/
	} 	
	

	function upload_proposal(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['type'] 			= $session_data['type'];
		$data['id'] 			= $session_data['id'];
		$data['title'] 			= "Job Order";
		$date_now 				= date("YmdHis");
		
		$sid = $this->input->post('eid');
		$filelamp = $this->db->query("Select * FROM trans_event WHERE id='$sid' ")->row();
		$nama_filex = str_replace("/","",$filelamp->no_event);
		$nama_file_proposal = $nama_filex.'_proposal';
		$nama_file_skema 	= $nama_filex.'_skema';
		
		if($_FILES['proposal']['name']!=''){
			// $target_path = "/mnt/drobo/88.70/proposal/";
			$target_path = "./proposal_event/";
			$ext = explode('.', basename( $_FILES['proposal']['name']));
			$target_path = $target_path . $nama_file_proposal . "." . $ext[count($ext)-1]; 

			if(move_uploaded_file($_FILES['proposal']['tmp_name'], $target_path)) {
				$item1 = array (
					'id' 	=> $this->input->post('eid')
				);	
				
				$item = array (
					'proposal_pm' 	=> $nama_file_proposal,
					'lup_proposal' 	=> date("Y-m-d H:i:s")
				);	
				$this->event_model->ubahevent($item,$item1);
				
				/* nanti saat aplikasi proposal digunakan
				$target_path_skema = "./proposal_event/";
				$ext_skema = explode('.', basename( $_FILES['skema']['name']));
				$target_path_skema = $target_path_skema . $nama_file_proposal . "." . $ext_skema[count($ext_skema)-1]; 
				
				if(move_uploaded_file($_FILES['skema']['tmp_name'], $target_path)) {
					$merahx = array (
						'id' 	=> $this->input->post('eid')
					);	
					
					$merah = array (
						'skema_pm' 			=> $nama_file_skema,
						'duedate_pengadaan' => $this->input->post('duedate'),
						'nominal_proposal'	=> $this->input->post('nominal_proposal'),
						'lup_proposal' 		=> date("d-m-Y H:i:s")
					);	
					$this->event_model->ubahevent($merah,$merahx);
					
					$putih = array (
						'eventid' 	=> $this->input->post('eid'),
						'flag' 		=> 3,
						'ket' 		=> 'Done PM',
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);	
					$this->event_model->saveapp_event($putih);
					
					
					if($filelamp->flag_pengadaan==1){
						$ijo = array (
							'typeproposal' 		=> $filelamp->type_pengadaan,
							'typerevenue' 		=> 1,
							'bak' 				=> $filelamp->no_lampiran,
							'nominalbak'		=> $filelamp->nominal_lampiran,
							'attcmtbak' 		=> $filelamp->lampiran,
							'id_client'			=> $filelamp->kd_customer,
							'nm_client'			=> $filelamp->customer,
							'judul'				=> $filelamp->nama_event,
							'tglbuat'			=> date("Y-m-d H:i:s"),
							'nominalproposal'	=> $this->input->post('nominal_proposal'),
							'datepengadaan'		=> $this->input->post('duedate'),
							'attcmtproposal'	=> $nama_file_proposal,
							'statusrecuring'	=> 2,
							'recuring'			=> 2,
							'attmctrecuring'	=> 3,
							'flag'				=> 0,
							'created'			=> $data['username'],
							'id_event'			=> $this->input->post('eid'),
							'lup'				=> date("Y-m-d H:i:s")
						);	
						$this->event_model->saveto_dbproposal($ijo);
					}
					
					echo "Proposal Tersimpan";die;
				} else {
					echo "Gagal Upload File Skema";die;
				}
				*/
			} else{
				echo "Gagal Upload File Proposal";die;
			}
		}
	}

	function upload_proposal_new(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['type'] 			= $session_data['type'];
		$data['id'] 			= $session_data['id'];
		$data['title'] 			= "Job Order";
		$date_now 				= date("YmdHis");
		
		$sid = $this->input->post('eid');
		$filelamp = $this->db->query("Select * FROM trans_event WHERE id='$sid' ")->row();
		$nama_filex = str_replace("/","",$filelamp->no_event);
		$nama_file_proposalx 	= $nama_filex.'_proposal';
		$nama_file_skemax 		= $nama_filex.'_skema';
		
		if($_FILES['proposal']['name']!=''){
			$target_path = "/mnt/drobo/88.70/proposal/";
			// $target_path = "./proposal_event/";
			$ext = explode('.', basename( $_FILES['proposal']['name']));
			$target_path 			= $target_path . $nama_file_proposalx . "." . $ext[count($ext)-1];
			$nama_file_proposal 	= $nama_filex.'_proposal.'.$ext[count($ext)-1];			

			if(move_uploaded_file($_FILES['proposal']['tmp_name'], $target_path)) {
				$item1 = array (
					'id' 	=> $this->input->post('eid')
				);	
				
				$item = array (
					'proposal_pm' 	=> $nama_file_proposal,
					'lup_proposal' 	=> date("Y-m-d H:i:s")
				);	
				$this->event_model->ubahevent($item,$item1);
				
				/* nanti saat aplikasi proposal digunakan */
				$target_path_skema = "/mnt/drobo/88.70/proposal/";
				// $target_path_skema = "./proposal_event/";
				$ext_skema = explode('.', basename( $_FILES['skema']['name']));
				$target_path_skema = $target_path_skema . $nama_file_skemax . "." . $ext_skema[count($ext_skema)-1];
				$nama_file_skema 	= $nama_filex.'_skema'. $ext_skema[count($ext_skema)-1];				
				
				if(move_uploaded_file($_FILES['skema']['tmp_name'], $target_path_skema)) {
					$merahx = array (
						'id' 	=> $this->input->post('eid')
					);	
					
					$merah = array (
						'skema_pm' 			=> $nama_file_skema,
						'duedate_pengadaan' => $this->input->post('duedate'),
						'nominal_proposal'	=> $this->input->post('nominal_proposal'),
						'lup_proposal' 		=> date("Y-m-d H:i:s")
					);	
					$this->event_model->ubahevent($merah,$merahx);
					
					$putih = array (
						'eventid' 	=> $this->input->post('eid'),
						'flag' 		=> 3,
						'ket' 		=> 'Done PM',
						'upd' 		=> $data['username'],
						'lup' 		=> date("Y-m-d H:i:s")
					);	
					$this->event_model->saveapp_event($putih);
					
					
					if($filelamp->flag_pengadaan==1){
						$nmr_pro 	= "";
						$cons 		= '/PM/';
						$bultah 	= date('mY');
						
						$nopro = $this->event_model->cek_nmrpro();
						if ($nopro == 0){
							$new = '00000001';
							$nmr_pro = $new . $cons . $bultah;			
						} else {
							$nor = $nopro;
							$next = intval($nor) + 1;
							$xnext = $this->hitung_pro($next);
							$nmr_pro = $xnext . $cons . $bultah;
						}		
						
						$ijo = array (
							'typeproposal' 		=> $filelamp->type_pengadaan,
							'typerevenue' 		=> 1,
							'typeskema' 		=> $filelamp->jenis_lampiran,
							'nmr_skema' 		=> $filelamp->no_lampiran,
							'nominalskema'		=> str_replace('.','',$filelamp->nominal_lampiran),
							'attcmtskema' 		=> $nama_file_skema,
							'id_client'			=> $filelamp->kd_customer,
							'nm_client'			=> $filelamp->customer,
							'nmrproposal'		=> $nmr_pro,
							'judul'				=> $filelamp->nama_event,
							'tglbuat'			=> date("Y-m-d H:i:s"),
							'tglpengajuan'		=> date("Y-m-d H:i:s"),
							'nominalproposal'	=> str_replace('.','',$this->input->post('nominal_proposal')),
							'datepengadaan'		=> $this->input->post('duedate'),
							'attcmtproposal'	=> $nama_file_proposal,
							'statusrecuring'	=> 1,
							'recuring'			=> 1,
							'flag'				=> 1,
							'created'			=> $data['username'],
							'divisi'			=> 'PM',
							'approval'			=> $data['username'],
							'id_event'			=> $this->input->post('eid'),
							'upd'				=> $data['username'],
							'lup'				=> date("Y-m-d H:i:s")
						
							// 'typeproposal' 		=> $filelamp->type_pengadaan,
							// 'typerevenue' 		=> 1,
							// 'bak' 				=> $filelamp->no_lampiran,
							// 'nominalbak'		=> $filelamp->nominal_lampiran,
							// 'attcmtbak' 		=> $filelamp->lampiran,
							// 'id_client'			=> $filelamp->kd_customer,
							// 'nm_client'			=> $filelamp->customer,
							// 'judul'				=> $filelamp->nama_event,
							// 'tglbuat'			=> date("Y-m-d H:i:s"),
							// 'nominalproposal'	=> $this->input->post('nominal_proposal'),
							// 'datepengadaan'		=> $this->input->post('duedate'),
							// 'attcmtproposal'	=> $nama_file_proposal,
							// 'statusrecuring'	=> 2,
							// 'recuring'			=> 2,
							// 'attmctrecuring'	=> 3,
							// 'flag'				=> 0,
							// 'created'			=> $data['username'],
							// 'id_event'			=> $this->input->post('eid'),
							// 'lup'				=> date("Y-m-d H:i:s")
						);	
						$this->event_model->saveto_dbproposal($ijo);
					}
					
					echo "Proposal Tersimpan";die;
				} else {
					echo "Gagal Upload File Skema";die;
				}
				/* tutup */  
			} else{
				echo "Gagal Upload File Proposal";die;
			}
		}
	}	
	
	function report_excel(){
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['jabatan'] 		= $session_data['jabatan'];
		
		$ctevent 			= $_GET['ctevent'];
		$cnoevent 			= $_GET['cnoevent'];
		$ccustomer 			= $_GET['ccustomer'];
		$cjevent 			= $_GET['cjevent'];
		$cnmevent 			= $_GET['cnmevent'];
		$csperiode			= $_GET['csperiode'];
		$ceperiode			= $_GET['ceperiode'];
		
		$data['allrep']		= $this->event_model->getdata_event_xls($ctevent,$cnoevent,$ccustomer,$cjevent,$cnmevent,$csperiode,$ceperiode);
		
		$this->load->view('event/report_excel', $data);
	}
}