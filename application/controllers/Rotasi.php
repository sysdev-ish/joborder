<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') or exit('No direct script access allowed');
include_once(dirname(__FILE__) . "/Home.php");

class Rotasi extends Home
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation', 'curl'));
		$this->load->model(array('job_model', 'user', 'skema_model', 'event_model', 'master_model'));
	}



	public function formadd()
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

			// var_dump(date ( 'Y-m-d' , strtotime ( '14 weekdays' ) ) );

			$this->load->view('pages/header', $data);
			$this->load->view('rotasi/formadd', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	public function cekform()
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
			/*
			$ctjprorray = $this->job_model->get_allpa();
				$select = "";
				foreach($ctjprorray as $key => $list){
					$select .= "<option value=". $list->kd_persa .">". $list->persa . "</option>";
				}
			$data['cmbpersa']		= $select;
			
			$ctjprorray1 = $this->job_model->get_allar();
				$select = "";
				foreach($ctjprorray1 as $key => $list){
					$select .= "<option value=". $list->AREA .">". $list->AREA_TEXT . "</option>";
				}
			$data['cmbarea']		= $select;
			
			$ctjprorray2 = $this->job_model->get_allskill();
				$select = "";
				foreach($ctjprorray2 as $key => $list){
					$select .= "<option value=". $list->PERSK .">". $list->PTEXT . "</option>";
				}
			$data['cmbskill']		= $select;
			
			$ctjprorray3 = $this->job_model->get_alljab();
				$select = "";
				foreach($ctjprorray3 as $key => $list){
					$select .= "<option value=". $list->OBJID .">". $list->STEXT . "</option>";
				}
			$data['cmbjab']		= $select;
			
			$ctjprorray4 = $this->job_model->get_alllevel();
				$select = "";
				foreach($ctjprorray4 as $key => $list){
					$select .= "<option value=". $list->TRFAR .">". $list->TARTX . "</option>";
				}
			$data['cmblvl']		= $select;
			*/
			$ctjprorray5 = $this->event_model->get_nojnorek();
			$select = "";
			foreach ($ctjprorray5 as $key => $list) {
				$select .= "<option value=" . $list->nojo . ">" . $list->nojo . "</option>";
			}
			$data['cmbnoj']		= $select;

			$sid = $this->input->post("idx");
			$aa  = $this->input->post("arrlist");
			$data['fl']  = $this->input->post("flagx");
			if ($aa == 1) {
				$this->load->view('rotasi/addform', $data);
			} else {
				$this->load->view('rotasi/editform', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}


	public function cariarea_pp()
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
			$persaid = $this->input->post("data");

			$ctjprorray = $this->skema_model->cariarea_pp($persaid);
			$select  = "<option value=''>Pilih</option>";
			$select .= "<option value='ALL'>Select All</option>";
			foreach ($ctjprorray as $key => $list) {
				$select .= "<option value=" . $list['btrtl'] . ">" . $list['btrtx'] . "</option>";
			}
			$data['cmbarea']		= $select;

			print_r($select);
		}
	}

	public function cariskill_pp()
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
			$persaid = $this->input->post("data");
			$areaid  = $this->input->post("areax");

			$ctjprorray = $this->skema_model->cariskill_pp($persaid, $areaid);
			$select  = "<option value=''>Pilih</option>";
			$select .= "<option value='ALL'>Select All</option>";
			if ($areaid != 'ALL' && $areaid != '') {
				foreach ($ctjprorray as $key => $list) {
					$select .= "<option value=" . $list['persk'] . ">" . $list['pektx'] . "</option>";
				}
			}
			$data['cmbskill']		= $select;

			print_r($select);
		}
	}

	public function carijab_pp()
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
			$persaid = $this->input->post("data");
			$areaid  = $this->input->post("areax");
			$skillid  = $this->input->post("skillx");

			$ctjprorray = $this->skema_model->carijab_pp($persaid, $areaid, $skillid);
			$select  = "<option value=''>Pilih</option>";
			$select .= "<option value='ALL'>Select All</option>";
			if ($skillid != 'ALL' && $skillid != '') {
				foreach ($ctjprorray as $key => $list) {
					$select .= "<option value=" . $list['plans'] . "-" . $list['platx'] . ">" . $list['platx'] . "</option>";
				}
			}
			$data['cmbjab']		= $select;

			print_r($select);
		}
	}

	public function carilevel_pp()
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
			$persaid = $this->input->post("data");
			$areaid  = $this->input->post("areax");
			$skillid  = $this->input->post("skillx");
			$jabtext  = $this->input->post("jabx");

			$ctjprorray = $this->skema_model->carilevel_pp($persaid, $areaid, $skillid, $jabtext);
			$select  = "<option value=''>Pilih</option>";
			$select .= "<option value='ALL'>Select All</option>";
			if ($jabtext != 'ALL' && $jabtext != '') {
				foreach ($ctjprorray as $key => $list) {
					$select .= "<option value=" . $list['trfar'] . ">" . $list['trfar_txt'] . "</option>";
				}
			}
			$data['cmblevel']		= $select;

			print_r($select);
		}
	}

	public function cariarea()
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
			$nojox = $this->input->post("datax");

			$ctjprorray = $this->event_model->get_allarx($nojox);
			$select = "<option value=''>Pilih</option>";
			foreach ($ctjprorray as $key => $list) {
				$select .= "<option value=" . $list['lokasi'] . ">" . $list['nlokasi'] . "</option>";
			}
			$data['cmbpersa']		= $select;

			print_r($select);
		}
	}


	public function caripersa()
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
			$idarea = $this->input->post("datax");
			$nojoid = $this->input->post("datanojo");

			$ctjprorray = $this->skema_model->get_allpax($idarea, $nojoid);
			$select = "<option value=''>Pilih</option>";
			foreach ($ctjprorray as $key => $list) {
				$select .= "<option value=" . $list['persa_sap'] . ">" . $list['npersa_sap'] . "</option>";
			}
			$data['cmbpersa']		= $select;

			print_r($select);
		}
	}


	public function carijab()
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
			$idpersa = $this->input->post("datax");
			$idarea = $this->input->post("areax");
			$idnojo = $this->input->post("nojox");

			$ctjprorray = $this->skema_model->get_alljabx($idpersa, $idarea, $idnojo);
			$select = "<option value=''>Pilih</option>";
			foreach ($ctjprorray as $key => $list) {
				$select .= "<option value=" . $list['jabatan_sap'] . ">" . $list['njabatan_sap'] . "</option>";
			}
			$data['cmbjab']		= $select;

			print_r($select);
		}
	}

	public function cariskill()
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
			$idjab = $this->input->post("datax");

			$ctjprorray = $this->skema_model->get_allskillx($idjab);
			$select = "";
			foreach ($ctjprorray as $key => $list) {
				$select .= "<option value=" . $list['persk'] . ">" . $list['pektx'] . "</option>";
			}
			$data['cmbskill']		= $select;

			print_r($select);
		}
	}



	public function listdata_event()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"cnoevent"       => $postparam['cnoevent'],
				"cnmevent"       => $postparam['cnmevent'],
				"cjevent"        => $postparam['cjevent'],
				"csperiode"      => $postparam['csperiode'],
				"ceperiode"      => $postparam['ceperiode'],
				"ccustomer"      => $postparam['ccustomer']
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data = $this->event_model->getdata_event($length, $start, $search, $order, $dir, $parsearch, $level, $username);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				if ($row['flag'] == '1') {
					$stat = 'Waiting Approval PM';
				} else if ($row['flag'] == '2') {
					$stat = 'Done PM';
				} else if ($row['flag'] == '9') {
					$stat = 'Rejected';
				} else {
					$stat = 'Waiting Approval Atasan';
				}

				// $ketx = json_encode($row['capp']);
				// $ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['perner']."\",\"".$row['sapp']."\",".$ketx.",\"".$typez."\");' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";

				// $ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\");' id='btnadd' data-toggle='modal' data-target='#myModal'>Waiting</button>";

				$huhui = "<td><a href='#' id='btndes'>" . $stat . "</a></td>";
				$lamp  = "<td><a href='" . base_url() . 'event/' . $row['lampiran'] . "' style='color:red;' target='_blank'>" . $row['lampiran'] . "</a></td>";

				$acti  = "<td>";
				$acti .= "<center><button type='button' class='btn btn-box-tool btnadd_komp' id='btnadd_komp' onclick='javascript:vevent(\"" . $row['id'] . "\",\"" . $row['flag'] . "\");'><i class='glyphicon glyphicon-eye-open'></i></button>";
				$acti .= "</td>";

				$output['data'][] = array(
					$row['no_event'],
					$row['nama_event'],
					$row['startperiode'],
					$row['endperiode'],
					$row['customer'],
					$row['jenisevent'],
					$lamp,
					$row['nama'],
					$row['lup'],
					$huhui,
					$acti
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}


	function save_lampiran()
	{
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

		$sid = $this->input->post('eid');
		if ($sid != '') {
			$filelamp = $this->db->query("Select lampiran, no_event FROM trans_event WHERE id='$sid' ")->row();
			if ($_FILES['lampiran']['name'] != '') {
				$this->event_model->dellamp($filelamp->lampiran);
			}
			$nama_file = str_replace("/", "", $filelamp->no_event);
		} else {
			$nama_file = str_replace("/", "", $data['nojo']);
		}

		if ($_FILES['lampiran']['name'] != '') {
			$target_path = "./event/";
			$ext = explode('.', basename($_FILES['lampiran']['name']));
			$target_path = $target_path . $nama_file . "." . $ext[count($ext) - 1];
			// var_dump($nama_file);die;

			if (move_uploaded_file($_FILES['lampiran']['tmp_name'], $target_path)) {
			} else {
			}
		}
	}


	function save_all()
	{
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
		$nama_file = str_replace("/", "", $data['nojo']);

		$file_element_name = $this->input->post('arrlist[15]');
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		if ($ext == '') {
			$file_name  = "";
		} else {
			$file_name = $nama_file . "." . $ext;
		}

		$item = array(
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
			'lampiran' 		=> $file_name,
			'upd' 			=> $data['username'],
			'lup' 			=> date("Y-m-d H:i:s"),
		);

		$this->event_model->simpanevent($item);
	}

	function edit_all()
	{
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
		if ($ext == '') {
			$file_name  = $filelamp->lampiran;
		} else {
			$nama_file = str_replace("/", "", $filelamp->no_event);
			$file_name = $nama_file . "." . $ext;
		}

		$item1 = array(
			'id' 	=> $this->input->post('arrlist[15]'),
		);

		$item = array(
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
			'lampiran' 		=> $file_name,
			'upd' 			=> $data['username'],
			'lup_edited' 	=> date("Y-m-d H:i:s")
		);

		$putih = array(
			'eventid' 	=> $this->input->post('arrlist[15]'),
			'flag' 		=> '0',
			'ket' 		=> '',
			'upd' 		=> $data['username'],
			'lup' 		=> date("Y-m-d H:i:s")
		);
		$this->event_model->ubahevent($item, $item1);
		$this->event_model->saveapp_event($putih);
	}

	function appevent()
	{
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

		$idx = $this->input->post('arrlist[0]');
		$jenapp = $this->input->post('xstatx');
		$cek = $this->db->query("Select flag From trans_eventapp Where eventid='$idx' Order By id DESC Limit 1 ")->row();
		if ($jenapp == 2) {
			$bpk = 9;
		} else {
			if ($cek->flag == null or $cek->flag == 0) {
				$bpk = 1;
			} else if ($cek->flag == 1) {
				$bpk = 2;
			}
		}

		$putih = array(
			'eventid' 	=> $this->input->post('arrlist[0]'),
			'flag' 		=> $bpk,
			'ket' 		=> $this->input->post('arrlist[1]'),
			'upd' 		=> $data['username'],
			'lup' 		=> date("Y-m-d H:i:s")
		);
		$this->event_model->saveapp_event($putih);
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

	function carialasan()
	{
		$idx = $this->input->post('data');
		$reasray = $this->job_model->get_reason($idx);
		$selectnama 	= "<option value=''>Pilih</option>";
		foreach ($reasray as $key => $list) {
			$selectnama .= "<option value=" . $list['kd_reason'] . "-" . $list['kode_z'] . ">" . $list['reason'] . " (" . $list['nama_z'] . ")</option>";
		}
		print_r($selectnama);
	}

	public function joborderx_lama()
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
				$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
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
			$this->load->view('joborder/addjoborderx', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	// public function buattes()
	public function joborderx()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['username']		= $session_data['username'];
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

			$jkonrray = $this->job_model->get_jpkwt('');
			$select = "";
			foreach ($jkonrray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
			}
			$data['cmbjpkwt']		= $select;

			$tes = $session_data['level'];


			$prorray = $this->job_model->get_province();
			$select = "";
			foreach ($prorray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_province'] . "</option>";
			}
			$data['cmbprovince']		= $select;

			$katerray = $this->job_model->get_kategori();
			$select = "";
			// $select 	= "<option value=''>Pilih Kategori</option>";
			foreach ($katerray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_job_function_category'] . "</option>";
			}
			$data['cmbkategori']		= $select;

			$detkaterray = $this->job_model->get_detailkategori();
			$select = "";
			foreach ($detkaterray as $key => $list) {
				$select .= "<option value=" . $list['id'] . ">" . $list['name_job_function'] . "</option>";
			}
			$data['cmbdetailkategori']		= $select;

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
				$select .= "<option value=" . $list['id'] . ">" . $list['nama'] . "</option>";
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


			$data['rdoc']		= $this->job_model->get_docp();


			$skkomp = $this->skema_model->search_skill();
			$selects = "";
			foreach ($skkomp as $key => $list) {
				$selects .= "<option value=" . $list['persk'] . ">" . $list['pektx'] . "</option>";
			}
			$data['cmb_skill']		= $selects;
			$this->load->database('default', TRUE);

			// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
			// $this->curl->option('buffersize', 10);
			// $this->curl->http_login('devappish', 'devappish!@#');
			// $post = array('token' => sha1("#ISH!@#"));
			// $this->curl->post($post);
			// $data['cmbpersax'] =json_decode($this->curl->execute());
			// usort($data['cmbpersax'], array($this, "sort_persa"));
			$data['cmbpersax'] = $this->job_model->get_allpa();

			// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_area');
			// $this->curl->option('buffersize', 10);
			// $this->curl->http_login('devappish', 'devappish!@#');			
			// $post = array('token' => sha1("#ISH!@#"));
			// $this->curl->post($post);
			// $larea =json_decode($this->curl->execute());
			// $data['cmb_area'] = $larea;
			$data['cmbarea'] = $this->job_model->get_allar();

			//
			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$lpersa = json_decode($this->curl->execute());
			$data['cmb_persa'] = $lpersa;

			// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_jabatan');
			// $this->curl->option('buffersize', 10);
			// $this->curl->http_login('devappish', 'devappish!@#');			
			// $post = array('token' => sha1("#ISH!@#"));
			// $this->curl->post($post);
			// $ljab =json_decode($this->curl->execute());
			// $data['cmb_jabatan'] = $ljab;
			$data['cmbjabatan'] = $this->job_model->get_alljabc();

			// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_level');
			// $this->curl->option('buffersize', 10);
			// $this->curl->http_login('devappish', 'devappish!@#');			
			// $post = array('token' => sha1("#ISH!@#"));
			// $this->curl->post($post);
			// $llevel =json_decode($this->curl->execute());
			// $data['cmb_level'] = $llevel;
			$data['cmblevel'] = $this->job_model->get_alllevel();
			//var_dump($data['cmb_level']);exit();

			// $this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_skema');
			// $this->curl->option('buffersize', 10);
			// $this->curl->http_login('devappish', 'devappish!@#');			
			// $post = array('token' => sha1("#ISH!@#"));
			// $this->curl->post($post);
			// $lskema =json_decode($this->curl->execute());
			// $data['cmb_skema'] = $lskema;
			$data['cmbzskema'] = $this->job_model->get_allzskema();
			//var_dump($data['cmb_skema']);exit();

			$this->load->view('pages/header', $data);
			$this->load->view('testing/buattes', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
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

		$this->skema_model->campuran($nojof, $file_name, $file_name2, $file_name3, $data['username']);
		// $this->skema_model->campuran_new($nojof, $file_name, $file_name2, $file_name3, $data['username']);

		/*DIMATIKAN KARENA GANGGUAN EMAIl ISH */
		$typenew = $this->input->post('joborder[16]');
		$rrr 	= $this->input->post('joborder[10]');
		if (($rrr == '2') || ($rrr == '4')) {
			if ($typenew == '1') {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->db3 = $this->load->database('db_third', TRUE);
					$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $this->input->post('joborder[23]') . "' ")->row();
					$this->db 	= $this->load->database('default', TRUE);

					// if($cekid_client->manager_enterprise=='' AND is_null($cekid_client->manager_enterprise) ){
					$check = $this->job_model->get_email();
					// } else {
					// $check = $this->job_model->get_email_enterprise($cekid_client->manager_enterprise);
					// }

					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[13]');

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO New', $message);

					//echo $hasilkirim; 
				} else {

					$check = $this->job_model->newget_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO New', $message);

						echo "Data Telah Di Approve";
					}
				}
			} else {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->db3 = $this->load->database('db_third', TRUE);
					$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $this->input->post('joborder[23]') . "' ")->row();
					$this->db 	= $this->load->database('default', TRUE);

					if ($cekid_client->manager_enterprise == '' and is_null($cekid_client->manager_enterprise)) {
						$check = $this->job_model->get_email();
					} else {
						$check = $this->job_model->get_email_enterprise($cekid_client->manager_enterprise);
					}

					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[13]');

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO New', $message);

					//echo $hasilkirim;
				} else {
					$check = $this->job_model->newget_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");

						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

						$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO New', $message);

						echo "Data Telah Di Approve";
					}
				}
			}
		} else {
			if ($data['level'] == '1') {
				$this->load->database('db_second', FALSE);
				$this->db3 = $this->load->database('db_third', TRUE);
				$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $this->input->post('joborder[23]') . "' ")->row();
				$this->db 	= $this->load->database('default', TRUE);

				if ($cekid_client->manager_enterprise == '' and is_null($cekid_client->manager_enterprise)) {
					$check = $this->job_model->get_email();
				} else {
					$check = $this->job_model->get_email_enterprise($cekid_client->manager_enterprise);
				}

				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				$data['type'] = $this->input->post('joborder[13]');
				$data['per_text'] = $this->input->post('joborder[15]');

				$data['skrg'] = date("d-m-Y H:i:s");

				$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

				$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO New', $message);
			} else {
				$check = $this->job_model->newget_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$checkox = $this->job_model->get_detail_creater($nojof);
					$data['type']  	  = $checkox->namad;
					$data['nama']  	  = $checkox->nama;
					$data['nojoz'] 	  = $nojof;

					$data['skrg'] = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message

					$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO New', $message);

					echo "Data Telah Di Approve";
				}
			}
		}
	}




	function rincian_simpan_buattes()
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

		// $this->skema_model->campuran($nojof, $file_name, $file_name2, $file_name3, $data['username']);
		$this->skema_model->campuran_new($nojof, $file_name, $file_name2, $file_name3, $data['username']);

		/*DIMATIKAN KARENA GANGGUAN EMAIl ISH */
		$typenew = $this->input->post('joborder[16]');
		$rrr 	= $this->input->post('joborder[10]');
		if (($rrr == '2') || ($rrr == '4')) {
			if ($typenew == '1') {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->db3 = $this->load->database('db_third', TRUE);
					$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $this->input->post('joborder[23]') . "' ")->row();
					$this->db 	= $this->load->database('default', TRUE);

					// if($cekid_client->manager_enterprise=='' AND is_null($cekid_client->manager_enterprise) ){
					$check = $this->job_model->get_email();
					// } else {
					// $check = $this->job_model->get_email_enterprise($cekid_client->manager_enterprise);
					// }

					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[13]');
					$data['skrg'] = date("d-m-Y H:i:s");
					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
					$subject = 'Notifikasi Pengajuan JO New';

					$this->sendmail($test, $message, $subject);

					// $post = array(
					// 'token'			=> 'ish@!notif',
					// 'appsenderid'	=> '9',
					// 'to'			=> $test,
					// 'subject'		=> 'Notifikasi Pengajuan JO New',
					// 'body'			=> $message
					// );

					// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
					// $this->curl->post($post);
					// $response = json_decode($this->curl->execute());
				} else {

					$check = $this->job_model->newget_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");
						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
						$subject = 'Notifikasi Pengajuan JO New';

						$this->sendmail($test, $message, $subject);

						// $post = array(
						// 'token'			=> 'ish@!notif',
						// 'appsenderid'	=> '9',
						// 'to'			=> $test,
						// 'subject'		=> 'Notifikasi Pengajuan JO New',
						// 'body'			=> $message
						// );

						// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
						// $this->curl->post($post);
						// $response = json_decode($this->curl->execute());

						echo "Data Telah Di Approve";
					}
				}
			} else {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->db3 = $this->load->database('db_third', TRUE);
					$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $this->input->post('joborder[23]') . "' ")->row();
					$this->db 	= $this->load->database('default', TRUE);

					if ($cekid_client->manager_enterprise == '' and is_null($cekid_client->manager_enterprise)) {
						$check = $this->job_model->get_email();
					} else {
						$check = $this->job_model->get_email_enterprise($cekid_client->manager_enterprise);
					}

					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[13]');
					$data['skrg'] = date("d-m-Y H:i:s");
					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
					$subject = 'Notifikasi Pengajuan JO New';

					$this->sendmail($test, $message, $subject);

					// $post = array(
					// 'token'			=> 'ish@!notif',
					// 'appsenderid'	=> '9',
					// 'to'			=> $test,
					// 'subject'		=> 'Notifikasi Pengajuan JO New',
					// 'body'			=> $message
					// );

					// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
					// $this->curl->post($post);
					// $response = json_decode($this->curl->execute());
				} else {
					$check = $this->job_model->newget_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");
						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
						$subject = 'Notifikasi Pengajuan JO New';

						$this->sendmail($test, $message, $subject);

						// $post = array(
						// 'token'			=> 'ish@!notif',
						// 'appsenderid'	=> '9',
						// 'to'			=> $test,
						// 'subject'		=> 'Notifikasi Pengajuan JO New',
						// 'body'			=> $message
						// );

						// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
						// $this->curl->post($post);
						// $response = json_decode($this->curl->execute());

						echo "Data Telah Di Approve";
					}
				}
			}
		} else {
			if ($data['level'] == '1') {
				$this->load->database('db_second', FALSE);
				$this->db3 = $this->load->database('db_third', TRUE);
				$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $this->input->post('joborder[23]') . "' ")->row();
				$this->db 	= $this->load->database('default', TRUE);

				if ($cekid_client->manager_enterprise == '' and is_null($cekid_client->manager_enterprise)) {
					$check = $this->job_model->get_email();
				} else {
					$check = $this->job_model->get_email_enterprise($cekid_client->manager_enterprise);
				}

				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}

				$data['type'] = $this->input->post('joborder[13]');
				$data['per_text'] = $this->input->post('joborder[15]');
				$data['skrg'] = date("d-m-Y H:i:s");
				$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
				$subject = 'Notifikasi Pengajuan JO New';

				$this->sendmail($test, $message, $subject);

				// $post = array(
				// 'token'			=> 'ish@!notif',
				// 'appsenderid'	=> '9',
				// 'to'			=> $test,
				// 'subject'		=> 'Notifikasi Pengajuan JO New',
				// 'body'			=> $message
				// );

				// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
				// $this->curl->post($post);
				// $response = json_decode($this->curl->execute());
			} else {
				$check = $this->job_model->newget_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];

					$checkox = $this->job_model->get_detail_creater($nojof);
					$data['type']  	  = $checkox->namad;
					$data['nama']  	  = $checkox->nama;
					$data['nojoz'] 	  = $nojof;

					$data['skrg'] = date("d-m-Y H:i:s");
					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
					$subject = 'Notifikasi Pengajuan JO New';

					$this->sendmail($test, $message, $subject);

					// $post = array(
					// 'token'			=> 'ish@!notif',
					// 'appsenderid'	=> '9',
					// 'to'			=> $test,
					// 'subject'		=> 'Notifikasi Pengajuan JO New',
					// 'body'			=> $message
					// );

					// $this->curl->create("http://192.168.88.70/notification/web/api/sendmail");	
					// $this->curl->post($post);
					// $response = json_decode($this->curl->execute());

					echo "Data Telah Di Approve";
				}
			}
		}
	}


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

		// var_dump($this->input->post('joborder[12]'));die;

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

		$this->skema_model->campuran_perner($nojof, $file_name, $file_name2, $file_name3, $data['username']);

		/*DIMATIKAN KARENA MASALAH EMAIL GANGGUAN */
		$typere = $this->input->post('joborder[10]');
		$rrr 	= $this->input->post('joborder[7]');
		if (($rrr == '2') || ($rrr == '4')) {
			if ($typere == '1') {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->db3 = $this->load->database('db_third', TRUE);
					$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $this->input->post('joborder[15]') . "' ")->row();
					$this->db 	= $this->load->database('default', TRUE);

					if ($cekid_client->manager_enterprise == '' and is_null($cekid_client->manager_enterprise)) {
						$check = $this->job_model->get_email();
					} else {
						$check = $this->job_model->get_email_enterprise($cekid_client->manager_enterprise);
					}

					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[9]');
					$data['skrg'] = date("d-m-Y H:i:s");
					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
					$subject = 'Notifikasi Pengajuan JO Replacement';

					$this->sendmail($test, $message, $subject);

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
				} else {
					$check = $this->job_model->newget_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");
						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
						$subject = 'Notifikasi Pengajuan JO Replacement';

						$this->sendmail($test, $message, $subject);

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

						echo "Data Telah Di Approve";
					}
				}
			} else {
				if ($data['level'] == '1') {
					$this->load->database('db_second', FALSE);
					$this->db3 = $this->load->database('db_third', TRUE);
					$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $this->input->post('joborder[15]') . "' ")->row();
					$this->db 	= $this->load->database('default', TRUE);

					if ($cekid_client->manager_enterprise == '' and is_null($cekid_client->manager_enterprise)) {
						$check = $this->job_model->get_email();
					} else {
						$check = $this->job_model->get_email_enterprise($cekid_client->manager_enterprise);
					}

					$test = array();
					foreach ($check as $val) {
						$test[] = $val['email'];
					}

					$data['type'] = $this->input->post('joborder[9]');
					$data['skrg'] = date("d-m-Y H:i:s");
					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
					$subject = 'Notifikasi Pengajuan JO Replacement';

					$this->sendmail($test, $message, $subject);

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
				} else {
					$check = $this->job_model->newget_email_pm();
					foreach ($check as $val) {
						$test = $val['email'];

						$checkox = $this->job_model->get_detail_creater($nojof);
						$data['type']  	  = $checkox->namad;
						$data['nama']  	  = $checkox->nama;
						$data['nojoz'] 	  = $nojof;

						$data['skrg'] = date("d-m-Y H:i:s");
						$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
						$subject = 'Notifikasi Pengajuan JO Replacement';

						$this->sendmail($test, $message, $subject);

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

						echo "Data Telah Di Approve";
					}
				}
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


	function simpan_pp()
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
		$conskl = '/PERPANJANGAN-ISH/01010107/';
		$year = date('Y');

		$nojobskl = $this->skema_model->get_insertjopp();
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
		$consk = 'PERPANJANGANISH01010107';
		$year = date('Y');

		$nojobsk = $this->skema_model->get_insertjopp();
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


		$file_element_name  = $_FILES['pplam']['name'][0];
		$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
		if ($ext == '') {
			$file_name  = "";
		} else {
			$file_name  = "lampiran_" . $nojosk . "." . $ext;
		}


		$target_path = "./lampiranpp/";
		$ext = explode('.', basename($_FILES['pplam']['name'][0]));
		$target_path = $target_path . "lampiran_" . $nojosk . "." . $ext[count($ext) - 1];

		if (move_uploaded_file($_FILES['pplam']['tmp_name'][0], $target_path)) {
		} else {
		}

		$pisjab = explode("-", $_POST['ppjab']);

		$item = array(
			'nojo' 			=> $nojoskl,
			'persa' 		=> $_POST['pppersa'],
			'area' 			=> $_POST['pparea'],
			'skilllayanan' 	=> $_POST['ppskill'],
			'kd_jabatan' 	=> $pisjab[0],
			'jabatan' 		=> $pisjab[1],
			'level' 		=> $_POST['pplevel'],
			'jml' 			=> $_POST['ppjml'],
			'start_project' => $_POST['ppsp'],
			'end_project' 	=> $_POST['ppep'],
			'no_lampiran' 	=> $_POST['ppnolam'],
			'lampiran' 		=> $file_name,
			'upd' 			=> $data['username'],
			'lup' 			=> date("Y-m-d H:i:s")
		);

		$this->skema_model->simpan_pp($item);


		if ($data['level'] == '1') {
			$check = $this->job_model->get_email();
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['type']  	  = 'Perpanjangan Project';
			$data['nojoz']  = $nojoskl;
			$data['skrg'] = date("d-m-Y H:i:s");

			$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
			$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO - Perpanjangan Project', $message);
		} else {
			$check = $this->job_model->get_email_pm();
			foreach ($check as $val) {
				$test = $val['email'];
				$data['type']  	  = 'Perpanjangan Project';
				$data['nojoz'] 	  = $nojoskl;
				$data['skrg'] 	  = date("d-m-Y H:i:s");

				$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
				$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO - Perpanjangan Project', $message);
			}
		}
	}

	public function appjo_xlistjoppx()
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

			if ($tes1 == '2') {
				$cekapp = 'atasan';
				if ($data['regional'] == '1') {
					$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
				} else {
					$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
				}
			} else if (($tes1 == '1') || ($tes1 == '14')) {
				$cekapp = 'atasan';
				$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
			} else if ($tes1 == '5') {
				$cekapp = 'pm';
				$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
			} else {
				$cekapp = 'atasan';
				$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
			}

			$this->load->view('joborder/appjo_listpp', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	function spp()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['namaz'] 		= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['regional'] 	= $session_data['regional'];
			$tes1 				= $session_data['level'];
			$daud 				= $session_data['layanan'];
			$typ 				= $session_data['type'];
			$jbt 				= $session_data['jabatan'];
			$username 			= $session_data['username'];

			$njo    = $this->input->post('arrappjol');
			$nid    = $njo[0];
			$keter  = $njo[1];
			$npersa = $njo[2];
			$ppnoj  = $njo[3];
			$cekapp = $njo[4];
			$this->skema_model->spp($nid, $keter, $cekapp);

			if ($cekapp == 'atasan') {
				$ceknama = $this->db->query("Select nama from m_login a left join trans_perpanjangan b ON a.username=b.upd where b.id='$nid' ")->row();
				$check = $this->job_model->get_email_pm();
				foreach ($check as $val) {
					$test = $val['email'];
					$data['type']  	  = 'Perpanjangan Project';
					$data['nojoz'] 	  = $ppnoj;
					$data['nama'] 	  = $ceknama->nama;
					$data['skrg'] 	  = date("d-m-Y H:i:s");

					$message = $this->load->view('addjo/email_new.php', $data, TRUE); // this will return you html data as message
					$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Pengajuan JO - Perpanjangan Project', $message);
				}
			} else {
				$check = $this->job_model->get_email_penerima_pp($nid);
				$test = array();
				foreach ($check as $val) {
					$test[] = $val['email'];
				}
				$data['skrg']   = date("d-m-Y H:i:s");
				$data['nojoz']  = $ppnoj;
				$data['nama'] 	= $session_data['nama'];
				$data['npersa'] = $npersa;
				$data['ktr']    = $keter;
				$message = $this->load->view('addjo/email_done_pp.php', $data, TRUE);
				$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Done JO - Perpanjangan Project', $message);
			}


			if ($tes1 == '2') {
				if ($data['regional'] == '1') {
					$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
				} else {
					$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
				}
			} else if (($tes1 == '1') || ($tes1 == '14')) {
				$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
			} else {
				$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
			}

			$this->load->view('joborder/appjo_listpp', $data);
		}
	}


	function rpp()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['nama'] 		= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['regional'] 	= $session_data['regional'];
			$tes1 				= $session_data['level'];
			$daud 				= $session_data['layanan'];
			$typ 				= $session_data['type'];
			$jbt 				= $session_data['jabatan'];
			$username 			= $session_data['username'];

			$njo    = $this->input->post('arrappjol');
			$nid    = $njo[0];
			$keter  = $njo[1];
			$npersa = $njo[2];
			$ppnoj  = $njo[3];
			$cekapp = $njo[4];
			$this->skema_model->rpp($nid, $keter, $cekapp);

			$check = $this->job_model->get_email_penerima_pp($nid);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['skrg']   = date("d-m-Y H:i:s");
			$data['nojoz']  = $ppnoj;
			$data['npersa'] = $npersa;
			$data['ktr']    = $keter;

			$message = $this->load->view('addjo/email_rej_pp.php', $data, TRUE);
			$hasilkirim = $this->emailsent($test, 'soehartobaru@gmail.com', 'Notifikasi Reject JO - Perpanjangan Project', $message);

			if ($tes1 == '2') {
				if ($data['regional'] == '1') {
					$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
				} else {
					$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
				}
			} else if (($tes1 == '1') || ($tes1 == '14')) {
				$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
			} else {
				$data['transjos'] 		= $this->skema_model->get_jopp($username, $tes1, $data['regional'], $jbt, $daud);
			}

			$this->load->view('joborder/appjo_listpp', $data);
		}
	}

	public function edit_pp($appr, $nid)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";

			$data['apps']  = $appr;

			$aaa = $this->skema_model->get_detpp($nid);
			foreach ($aaa as $key => $list) {
				$data['enid'] 			= $list['id'];
				$data['noj'] 			= $list['nojo'];
				$data['persa'] 			= $list['persa'];
				$data['npersa'] 		= $list['npersa'];
				$data['area']  			= $list['area'];
				$data['narea']  		= $list['narea'];
				$data['skill']  		= $list['skilllayanan'];
				$data['nskill']  		= $list['nskill'];
				$data['kd_jabatan']  	= $list['kd_jabatan'];
				$data['jabatan']  		= $list['jabatan'];
				$data['level']    		= $list['level'];
				$data['nlevel']    		= $list['nlevel'];
				$data['jml'] 			= $list['jml'];
				$data['start_project'] 	= $list['start_project'];
				$data['end_project'] 	= $list['end_project'];
				$data['no_lampiran'] 	= $list['no_lampiran'];
				$data['lampiran'] 		= $list['lampiran'];
			}

			$vjprorray = $this->skema_model->get_pa_kontrak();
			$select = "<option value=" . $data['persa'] . ">" . $data['npersa'] . "</option>";
			foreach ($vjprorray as $key => $list) {
				$select .= "<option value=" . $list['personalarea'] . ">" . $list['personnal_area'] . "</option>";
			}
			$data['cmbpera']		= $select;

			$ctjprorray = $this->skema_model->cariarea_pp($data['persa']);
			if ($data['area'] == 'ALL') {
				$select  = "<option value='ALL'>Select All</option>";
			} else {
				$select  = "<option value=" . $data['area'] . ">" . $data['narea'] . "</option>";
				$select .= "<option value='ALL'>Select All</option>";
			}
			foreach ($ctjprorray as $key => $list) {
				$select .= "<option value=" . $list['btrtl'] . ">" . $list['btrtx'] . "</option>";
			}
			$data['cmbarea']		= $select;

			$ctjprorray = $this->skema_model->cariskill_pp($data['persa'], $data['area']);
			if ($data['skill'] == 'ALL') {
				$select = "<option value='ALL'>Select All</option>";
			} else {
				$select  = "<option value=" . $data['skill'] . ">" . $data['nskill'] . "</option>";
				$select .= "<option value='ALL'>Select All</option>";
			}
			if ($data['area'] != 'ALL') {
				foreach ($ctjprorray as $key => $list) {
					$select .= "<option value=" . $list['persk'] . ">" . $list['pektx'] . "</option>";
				}
			}
			$data['cmbskill']		= $select;

			$ctjprorray = $this->skema_model->carijab_pp($data['persa'], $data['area'], $data['skill']);
			if ($data['kd_jabatan'] == 'ALL') {
				$select = "<option value='ALL'>Select All</option>";
			} else {
				$select  = "<option value=" . $data['kd_jabatan'] . "-" . $list['jabatan'] . ">" . $data['jabatan'] . "</option>";
				$select .= "<option value='ALL'>Select All</option>";
			}
			if ($data['skill'] != 'ALL') {
				foreach ($ctjprorray as $key => $list) {
					$select .= "<option value=" . $list['plans'] . "-" . $list['platx'] . ">" . $list['platx'] . "</option>";
				}
			}
			$data['cmbjab']		= $select;

			$ctjprorray = $this->skema_model->carilevel_pp($data['persa'], $data['area'], $data['skill'], $data['kd_jabatan']);
			if ($data['level'] == 'ALL') {
				$select = "<option value='ALL'>Select All</option>";
			} else {
				$select  = "<option value=" . $data['level'] . ">" . $data['nlevel'] . "</option>";
				$select .= "<option value='ALL'>Select All</option>";
			}
			if ($data['kd_jabatan'] != 'ALL') {
				foreach ($ctjprorray as $key => $list) {
					$select .= "<option value=" . $list['trfar'] . ">" . $list['trfar_txt'] . "</option>";
				}
			}
			$data['cmblevel']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('joborder/edit_pp', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function deletefilepp()
	{

		$nmfile = $this->input->post('file');
		$nid    = $this->input->post('nidz');
		$item1 = array(
			'lampiran' => ''
		);
		$this->skema_model->del_dok_pp($nid, $item1);
		unlink("lampiranpp/" . $nmfile);
	}


	function edit_jopp()
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
		$nid      = $_POST['nidx'];
		$nojx     = $_POST['nojosk'];
		$asdf     = $_POST['approv'];
		$lkj = str_replace("/", "", $nojx);
		$hgf = str_replace("-", "", $lkj);

		if ($_POST['kompoly'] == '') {
			$file_element_name  = $_FILES['pplam']['name'][0];
			$ext  = pathinfo($file_element_name, PATHINFO_EXTENSION);
			if ($ext == '') {
				$file_name  = "";
			} else {
				$file_name  = "lampiran_" . $hgf . "." . $ext;
			}
		} else {
			$file_name  = $_POST['kompoly'];
		}


		$target_path = "./lampiranpp/";
		$ext = explode('.', basename($_FILES['pplam']['name'][0]));
		if ($ext[count($ext) - 1] != '') {
			$target_path = $target_path . "lampiran_" . $hgf . "." . $ext[count($ext) - 1];
			if (move_uploaded_file($_FILES['pplam']['tmp_name'][0], $target_path)) {
			} else {
			}
		}

		if ($level != '1') {
			$poy = 1;
		} else {
			$poy = 0;
		}

		$pisjab = explode("-", $_POST['ppjab']);

		if ($asdf == 'atasan') {
			$item1 = array(
				'persa' 			=> $_POST['pppersa'],
				'area' 				=> $_POST['pparea'],
				'skilllayanan' 		=> $_POST['ppskill'],
				'kd_jabatan' 		=> $pisjab[0],
				'jabatan' 			=> $pisjab[1],
				'level' 			=> $_POST['pplevel'],
				'jml' 				=> $_POST['ppjml'],
				'start_project' 	=> $_POST['ppsp'],
				'end_project' 		=> $_POST['ppep'],
				'no_lampiran' 		=> $_POST['ppnolam'],
				'lampiran' 			=> $file_name,
				'approval_atasan' 	=> $poy,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $username,
				'lup_edit' 			=> date("Y-m-d H:i:s")
			);
		} else {
			$item1 = array(
				'persa' 			=> $_POST['pppersa'],
				'area' 				=> $_POST['pparea'],
				'skilllayanan' 		=> $_POST['ppskill'],
				'kd_jabatan' 		=> $pisjab[0],
				'jabatan' 			=> $pisjab[1],
				'level' 			=> $_POST['pplevel'],
				'jml' 				=> $_POST['ppjml'],
				'start_project' 	=> $_POST['ppsp'],
				'end_project' 		=> $_POST['ppep'],
				'no_lampiran' 		=> $_POST['ppnolam'],
				'lampiran' 			=> $file_name,
				'approval_pm' 		=> 0,
				'flag_edit' 		=> 1,
				'upd_edit' 			=> $username,
				'lup_edit' 			=> date("Y-m-d H:i:s")
			);
		}

		$item = array(
			'id' => $nid
		);

		$this->skema_model->edit_jopp($item, $item1);
	}
}
