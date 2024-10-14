<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skema extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation', 'curl'));
		$this->load->model(array('skema_model', 'job_model', 'master_model'));
	}


	public function form_skema()
	{
		if ($this->session->userdata('logged_in')) {
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


			//$dbpostgre = $this->load->database('db_third',TRUE);
			$varray = $this->skema_model->get_area_kontrak();
			$select = "";
			foreach ($varray as $key => $list) {
				$select .= "<option value='" . $list['area'] . "'>" . $list['personnal_subarea'] . "</option>";
			}
			$data['cmbar']		= $select;

			/*
			$tarray = $this->skema_model->get_pa_kontrak();
				$select = "";
				foreach($tarray as $key => $list){
					$select .= "<option value='". $list['personalarea'] ."'>". $list['personnal_area'] ."</option>";
				}
			$data['cmbpa']		= $select;
			*/

			$sarray = $this->skema_model->get_sl_kontrak();
			$select = "";
			foreach ($sarray as $key => $list) {
				$select .= "<option value='" . $list['skilllayanan'] . "'>" . $list['employee_subgroup'] . "</option>";
			}
			$data['cmbsl']		= $select;


			$jarray = $this->skema_model->get_jb_kontrak();
			$select = "";
			foreach ($jarray as $key => $list) {
				$select .= "<option value='" . $list['jabatan'] . "'>" . $list['jabatan'] . "</option>";
			}
			$data['cmbjb']		= $select;


			$iarray = $this->skema_model->get_komp_kontrak();
			$select = "";
			foreach ($iarray as $key => $list) {
				$select .= "<option value='" . $list['komponen'] . "'>" . $list['komponen'] . "</option>";
			}
			$data['cmbkompo']		= $select;

			$marray = $this->skema_model->get_lv_kontrak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['kd_level'] . "'>" . $list['level'] . "</option>";
			}
			$data['cmblv']		= $select;

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
			$data['cmbarea'] = json_decode($this->curl->execute());
			usort($data['cmbarea'], array($this, "sort_area"));


			//	$data['scema'] = $this->skema_model->get_skema();


			$nojoz = "";
			$noskema = $this->skema_model->get_idskemaz();
			if ($noskema == 0) {
				$new = '1';
				$nojoz = $new;
			} else {
				$nor = $noskema;
				$next = intval($nor) + 1;
				//$xnext = $this->hitung($next);
				$nojoz = $next;
			}
			$data['skemaz'] = $nojoz;


			$this->load->view('pages/header', $data);
			$this->load->view('skema/form_skema', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function form_skema_inf()
	{
		if ($this->session->userdata('logged_in')) {
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


			//$dbpostgre = $this->load->database('db_third',TRUE);
			$varray = $this->skema_model->get_area_kontrak();
			$select = "";
			foreach ($varray as $key => $list) {
				$select .= "<option value='" . $list['area'] . "'>" . $list['personnal_subarea'] . "</option>";
			}
			$data['cmbar']		= $select;

			/*
			$tarray = $this->skema_model->get_pa_kontrak();
				$select = "";
				foreach($tarray as $key => $list){
					$select .= "<option value='". $list['personalarea'] ."'>". $list['personnal_area'] ."</option>";
				}
			$data['cmbpa']		= $select;
			*/

			$sarray = $this->skema_model->get_sl_kontrakinf();
			$select = "";
			foreach ($sarray as $key => $list) {
				$select .= "<option value='" . $list['skilllayanan'] . "'>" . $list['employee_subgroup'] . "</option>";
			}
			$data['cmbsl']		= $select;


			$jarray = $this->skema_model->get_jb_kontrakinf();
			$select = "";
			foreach ($jarray as $key => $list) {
				$select .= "<option value='" . $list['jabatan'] . "'>" . $list['jabatan'] . "</option>";
			}
			$data['cmbjb']		= $select;


			$iarray = $this->skema_model->get_komp_kontrak();
			$select = "";
			foreach ($iarray as $key => $list) {
				$select .= "<option value='" . $list['komponen'] . "'>" . $list['komponen'] . "</option>";
			}
			$data['cmbkompo']		= $select;

			$marray = $this->skema_model->get_lv_kontrakinf();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['kd_level'] . "'>" . $list['level'] . "</option>";
			}
			$data['cmblv']		= $select;


			//	$data['scema'] = $this->skema_model->get_skema();


			$nojoz = "";
			$noskema = $this->skema_model->get_idskemaz();
			if ($noskema == 0) {
				$new = '1';
				$nojoz = $new;
			} else {
				$nor = $noskema;
				$next = intval($nor) + 1;
				//$xnext = $this->hitung($next);
				$nojoz = $next;
			}
			$data['skemaz'] = $nojoz;


			$this->load->view('pages/header', $data);
			$this->load->view('skema/form_skema_inf', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function cari_perar()
	{
		$perar 	= $_GET['q'];
		$data	= $this->skema_model->cari_pa_kontrak($perar);
		echo json_encode($data);
	}


	function cari_peraring()
	{
		$perar 	= $_GET['q'];
		$data	= $this->skema_model->cari_pa_kontrakinf($perar);
		echo json_encode($data);
	}


	function cari_area()
	{
		$varray				= $this->skema_model->cari_area($this->input->post(data));
		$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
		//$selectnama 	= "<option value=''>pilih</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['btrtl'] . "'>" . $list['btrtx'] . "</option>";
		}
		print_r($selectnama);
	}


	function cari_areaing()
	{
		$varray				= $this->skema_model->cari_areainf($this->input->post(data));
		$selectnama 	= "<option value='ALL'>SELECT ALL</option>";
		//$selectnama 	= "<option value=''>pilih</option>";
		foreach ($varray as $key => $list) {
			$selectnama .= "<option value='" . $list['btrtl'] . "'>" . $list['btrtx'] . "</option>";
		}
		print_r($selectnama);
	}


	function cari_jabat()
	{
		$jabat 	= $_GET['q'];
		$data	= $this->skema_model->cari_jb_kontrak($jabat);
		echo json_encode($data);
	}


	function rincian_skema_simpan()
	{
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];


		$arrskemx 		= $this->input->post('arrskem');
		$area		= $arrskemx[0];
		$pa			= $arrskemx[1];
		$sl			= $arrskemx[2];
		$jabatan	= $arrskemx[3];
		$level		= $arrskemx[4];
		$id_skema	= $arrskemx[5];
		$tpk		= $arrskemx[6];
		$tpaa		= $arrskemx[8];
		$tpab		= $arrskemx[9];
		$tpfa		= $arrskemx[10];
		$lwk		= $arrskemx[11];
		$abul		= $arrskemx[12];
		$aper		= $arrskemx[13];

		$putih = array(
			'id' 				=> $id_skema,
			'area' 				=> $area,
			'personalarea' 		=> $pa,
			'skilllayanan' 		=> $sl,
			'jabatan' 			=> $jabatan,
			'level' 			=> $level,
			'tgl_gajian'		=> $tpk,
			'periode_absensi_a'	=> $tpaa,
			'periode_absensi_b'	=> $tpab,
			'tanggal_absensi'	=> $tpfa,
			'waktu_kerja'		=> $lwk,
			'bulan'				=> $abul,
			'periode'			=> $aper
		);

		$this->skema_model->insertskemasatuplus($putih);

		$rec 	= $arrskemx[7];

		if ($rec != "") {
			$rec	= explode(",,", $rec);
			$loop = count($rec) / 3.5;
			if ($loop) {
				$a = 0;
				$b = 1;
				$c = 2;
				for ($i = 0; $i < $loop; $i++) {
					$item = array(
						'id_skema_plus' 	=> $id_skema,
						'komponen' 			=> $rec[$a],
						'value' 			=> $rec[$b],
						'keterangan' 		=> $rec[$c]
					);
					$this->skema_model->insertskemaduaplus($item);

					$a = $a + 3;
					$b = $b + 3;
					$c = $c + 3;
				}
			}
		}
	}



	function view_skema()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= "Job Order";

		$data 		= $this->input->post('larr');
		$area	 	= $data[0];
		$pa		 	= $data[1];
		$sl 		= $data[2];

		$data['scema']			= $this->skema_model->view_skema($area, $pa, $sl);

		$this->load->view('skema/view_skema', $data);
	}



	function edit_rincian_skema()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= "Job Order";

		$xarrskemx 		= $this->input->post('arrskemx');
		$eid			= $xarrskemx[0];
		$ekomponen		= $xarrskemx[1];
		$evalu			= $xarrskemx[2];
		$eket			= $xarrskemx[3];
		$gid			= $xarrskemx[4];

		if ($eid != '') {
			$item = array(
				'id' 	=> $eid,
			);

			$item1 = array(
				'komponen'		=> $ekomponen,
				'value'			=> $evalu,
				'keterangan'	=> $eket
			);

			$this->skema_model->update_skema($item, $item1);
		} else {
			$item = array(
				'id_skema_plus'	=> $gid,
				'komponen'		=> $ekomponen,
				'value'			=> $evalu,
				'keterangan'	=> $eket
			);

			$this->skema_model->tambah_skema($item);
		}
	}




	function del_all()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= "Job Order";

		$larrx 					= $this->input->post('larr');
		$checked 				= $larrx[0];


		$rec	= explode(",", $checked);


		$ccc 	= array($rec);
		$uu 	= $ccc[0];
		$temp 	= count($uu);
		//var_dump($temp);
		//exit();

		for ($i = 0; $i < $temp; $i++) {
			$this->skema_model->del_all2($uu[$i]);
		}
	}




	public function ket_skema_sap()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "Job Order";

			$tes = $session_data['level'];
			$daud = $session_data['layanan'];
			$username = $session_data['username'];



			//$dbpostgre = $this->load->database('db_third',TRUE);

			$varray = $this->skema_model->get_area_kontrak();
			$select = "";
			foreach ($varray as $key => $list) {
				$select .= "<option value='" . $list['area'] . "'>" . $list['personnal_subarea'] . "</option>";
			}
			$data['cmbar']		= $select;


			$tarray = $this->skema_model->get_pa_kontrak();
			$select = "";
			foreach ($tarray as $key => $list) {
				$select .= "<option value='" . $list['personalarea'] . "'>" . $list['personnal_area'] . "</option>";
			}
			$data['cmbpa']		= $select;

			$sarray = $this->skema_model->get_sl_kontrak();
			$select = "";
			foreach ($sarray as $key => $list) {
				$select .= "<option value='" . $list['skilllayanan'] . "'>" . $list['employee_subgroup'] . "</option>";
			}
			$data['cmbsl']		= $select;

			$jarray = $this->skema_model->get_jb_kontrak();
			$select = "";
			foreach ($jarray as $key => $list) {
				$select .= "<option value='" . $list['jabatan'] . "'>" . $list['nm_jabatan'] . "</option>";
			}
			$data['cmbjb']		= $select;

			$iarray = $this->skema_model->get_tunj_kontrak();
			$select = "";
			foreach ($iarray as $key => $list) {
				$select .= "<option value='" . $list['lgart'] . "'>" . $list['lgtxt'] . "</option>";
			}
			$data['cmbkompol']		= $select;

			$marray = $this->skema_model->get_lv_kontrak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['kd_level'] . "'>" . $list['level'] . "</option>";
			}
			$data['cmblv']		= $select;


			//	$data['scema'] = $this->skema_model->get_skema();



			$this->load->view('pages/header', $data);
			$this->load->view('skema/ket_skema_sap', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}




	function k_rincian_skema_simpan()
	{
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];

		$arrskemx 		= $this->input->post('arrskem');
		$ar				= $arrskemx[0];
		$pa				= $arrskemx[1];
		$sl				= $arrskemx[2];
		$jb				= $arrskemx[3];
		$lv			= $arrskemx[4];

		$this->db3 = $this->load->database('db_third', TRUE);
		$lulul = $this->db3->query("select b.ZPARAMETER as parameter from sapscheme1 b where b.BTRTL='$ar' and b.PERSA='$pa' and b.PERSK='$sl' and b.STEXT='$jb' and b.TRFAR='$lv' ")->row();

		$jkjk = $lulul->parameter;

		$rec 	= $arrskemx[5];

		$rec	= explode(",,", $rec);

		$loop = count($rec) / 3.5;
		//var_dump($rec);
		//exit();
		if ($loop) {
			$a = 0;
			$b = 1;
			$c = 2;
			for ($i = 0; $i < $loop; $i++) {
				$item = array(
					'PERSA'			 	=> $pa,
					'BTRTL'			 	=> $ar,
					'PERSK'			 	=> $sl,
					'TRFAR'			 	=> $lv,
					'STEXT'			 	=> $jb,
					'LGART' 			=> $rec[$a],
					'keterangan' 		=> $rec[$c],
					'ZPARAMETER'	 	=> $jkjk,
				);
				$this->skema_model->k_insertskemaduaplus($item);

				$a = $a + 3;
				$b = $b + 3;
				$c = $c + 3;
			}
		}
	}



	function k_view_skema()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= "Job Order";

		$data 		= $this->input->post('larr');
		$area	 	= $data[0];
		$pa		 	= $data[1];
		$sl 		= $data[2];

		//var_dump($area);var_dump($pa);var_dump($sl);exit();

		$data['scema']			= $this->skema_model->k_view_skema($area, $pa, $sl);

		$this->load->view('skema/k_view_skema', $data);
	}



	function k_edit_rincian_skema()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= "Job Order";

		$xarrskemx 		= $this->input->post('arrskemx');
		$eid			= $xarrskemx[0];
		$eket			= $xarrskemx[1];

		$item = array(
			'id' 	=> $eid,
		);

		$item1 = array(
			'keterangan'	=> $eket
		);

		$this->skema_model->k_update_skema($item, $item1);
	}



	function k_del_all()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['layanan'] 		= $session_data['layanan'];
		$data['regional'] 		= $session_data['regional'];
		$data['title'] 			= "Job Order";

		$larrx 					= $this->input->post('larr');
		$checked 				= $larrx[0];


		$rec	= explode(",", $checked);


		$ccc 	= array($rec);
		$uu 	= $ccc[0];
		$temp 	= count($uu);
		//var_dump($temp);
		//exit();

		for ($i = 0; $i < $temp; $i++) {
			$this->skema_model->k_del_all2($uu[$i]);
		}
	}





	public function fix_var()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['title'] 			= "Job Order";

			$data['lsuck']			= $this->skema_model->v_fix_var();

			$this->load->view('pages/header', $data);
			$this->load->view('skema/fix_var', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function n_client()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Create Nama Client";

			/*			
			$bayarray = $this->user->get_lvl();
				$selecty = "";
				foreach($bayarray as $key => $list){
					$selecty .= "<option value=". $list['id'] .">". $list['nama'] ."</option>";
				}
			$data['cmblvl']		= $selecty;
			*/

			$data['lclientx']				= $this->skema_model->listclient();


			$this->load->view('pages/header', $data);
			$this->load->view('skema/add_client');
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}



	function mpb()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Create Nama Client";

			$kde = '4015';
			$varray			= $this->master_model->get_sifatkomp($kde);
			$selectnama 	= "";
			$jenis 			= $this->comma_separated_to_array($varray);
			$i = 0;
			foreach ($jenis as $key => $list) {
				$selectnama .= "<option value='" . $list . "'>" . $list . "</option>";
				$i++;
			}

			$data['cmbpb']		= $selectnama;

			$data['lmpb']				= $this->skema_model->listmpb();

			$this->load->view('pages/header', $data);
			$this->load->view('skema/add_mpb');
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	function pilih_det()
	{
		$varray				= $this->master_model->get_sifatkomp($this->input->post(data));
		$selectnama 	= "";
		$jenis 			= $this->comma_separated_to_array($varray);
		$i = 0;
		foreach ($jenis as $key => $list) {
			$selectnama .= "<option value='" . $list . "'>" . $list . "</option>";
			$i++;
		}
		print_r($selectnama);
	}


	function comma_separated_to_array($string, $separator = ',')
	{
		//Explode on comma
		$vals = explode($separator, $string);

		//Trim whitespace
		foreach ($vals as $key => $val) {
			$vals[$key] = trim($val);
		}

		return array_diff($vals, array(""));
	}


	function mpb_simpan()
	{

		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['username']		= $session_data['username'];
			$loginx 			= $this->input->post('xlogin');
			$persa	 			= $loginx[0];
			$npersa				= $loginx[1];
			$area				= $loginx[2];
			$narea				= $loginx[3];
			$jml				= $loginx[4];
			$jmpb				= $loginx[5];
			$komp				= $loginx[6];
			$kompx				= $loginx[7];

			$putih = array(
				'komponen'		=> $komp,
				'n_komponen'	=> $kompx,
				'persa'			=> $persa,
				'n_persa'		=> $npersa,
				'area'			=> $area,
				'n_area'		=> $narea,
				'jml'			=> $jml,
				'jns'			=> $jmpb,
				'upd'			=> $data['username'],
				'lup'			=> date("Y-m-d H:i:s")
			);
			$this->skema_model->mpb_simpan($putih);


			$data['lmpb']				= $this->skema_model->listmpb();
			$this->load->view('skema/listmpb', $data);
		} else {
			redirect('login', 'refresh');
		}
	}



	function client_simpan()
	{

		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['username']		= $session_data['username'];
			$loginx 			= $this->input->post('xlogin');
			$lclient	 		= $loginx[0];
			$lpersa				= $loginx[1];
			$lpersax			= $loginx[2];


			$putih = array(
				'persa'			=> $lpersa,
				'n_persa'		=> $lpersax,
				'client'		=> $lclient
			);
			$this->skema_model->client_simpan($putih);


			$data['lclientx']				= $this->skema_model->listclient();
			$this->load->view('skema/listclient', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	function mpb_edit()
	{

		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['username']		= $session_data['username'];
			$loginx 			= $this->input->post('xlogic');
			$lid		 		= $loginx[0];
			$irespa				= $loginx[1];
			$irespax			= $loginx[2];
			$iarea				= $loginx[3];
			$iareax				= $loginx[4];
			$ijml				= $loginx[5];
			$ijns				= $loginx[6];
			$ikomp				= $loginx[7];
			$ikompx				= $loginx[8];

			$item = array(
				'id'			=> $lid,
			);

			$putih = array(
				'komponen'		=> $ikomp,
				'n_komponen'	=> $ikompx,
				'persa'			=> $irespa,
				'n_persa'		=> $irespax,
				'area'			=> $iarea,
				'n_area'		=> $iareax,
				'jml'			=> $ijml,
				'jns'			=> $ijns,
				'upd'			=> $data['username'],
				'lup'			=> date("Y-m-d H:i:s")
			);
			$this->skema_model->mpb_edit($item, $putih);


			$data['lmpb']				= $this->skema_model->listmpb();
			$this->load->view('skema/listmpb', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	function client_edit()
	{

		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$data['username']		= $session_data['username'];
			$loginx 			= $this->input->post('xlogic');
			$lid		 		= $loginx[0];
			$lnama				= $loginx[1];
			$lrespa				= $loginx[2];
			$lrespax			= $loginx[3];

			$item = array(
				'id'			=> $lid,
			);

			$putih = array(
				'persa'			=> $lrespa,
				'n_persa'		=> $lrespax,
				'client'		=> $lnama
			);
			$this->skema_model->client_edit($item, $putih);


			$data['lclientx']				= $this->skema_model->listclient();
			$this->load->view('skema/listclient', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function listclient()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Login";
			$aaa = $this->input->post('dataarr');
			//var_dump($aaa);exit();
			$data['lclientx'] 		= $this->skema_model->listclientx($aaa);

			$this->load->view('skema/listclient', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function skema_pb()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['regional'] 		= $session_data['regional'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['title'] 			= "Job Order";



			// $sarray = $this->skema_model->get_sl_kontrak();
			// 	$select = "";
			// 	foreach($sarray as $key => $list){
			// 		$select .= "<option value='". $list['skilllayanan'] ."'>". $list['employee_subgroup'] ."</option>";
			// 	}
			// $data['cmbsl']		= $select;


			$this->load->view('pages/header', $data);
			$this->load->view('skema/view_skema_pb', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	function viewListSkemaPB()
	{
		$postdata = file_get_contents("php://input");
		$postparam = $this->input->post();
		$session_data 	= $this->session->userdata('logged_in');
		$username 	= $session_data['username'];

		// $periode=isset($postparam['periode'])?$postparam['periode']:'';
		$filter	= array(
			"cari_perner"      	=> $postparam['cari_perner']
		);

		$list = $this->skema_model->get_list_skemapb($filter);
		$countlist = $this->skema_model->get_rows_skemapb($filter);

		$no = $_POST['start'];
		$dataviews = array();
		foreach ($list as $field) {
			$no++;

			if ($field['status'] == 1) {
				$status = 'ENABLE';
			} else {
				$status = 'DISABLE';
			}

			$tigasatu = array('01', '03', '05', '07', '08', '10', '12');
			$tigapuluh = array('04', '06', '09', '11');

			$start = explode('-', $field['smasa'])[1];

			if (in_array($start, $tigasatu)) {
				$sthari = explode('-', $field['smasa'])[2] + 1;
			} else if (in_array($start, $tigapuluh)) {
				$sthari = explode('-', $field['smasa'])[2] + 2;
			} else {
				$sthari = explode('-', $field['smasa'])[2] + 4;
			}



			// if ($start == '02') {
			// 	$sthari = explode('-', $field['smasa'])[2] + 2;
			// } else {
			// 	$sthari = explode('-', $field['smasa'])[2];
			// }

			$end = explode('-', $field['emasa'])[1];

			if (in_array($end, $tigasatu)) {
				$ethari = explode('-', $field['emasa'])[2] + 1;
			} else if (in_array($end, $tigapuluh)) {
				$ethari = explode('-', $field['emasa'])[2] + 2;
			} else {
				$ethari = explode('-', $field['emasa'])[2] + 4;
			}

			// if ($end == '02') {
			// 	$ethari = explode('-', $field['emasa'])[2] + 2;
			// } else {
			// 	$ethari = explode('-', $field['emasa'])[2];
			// }


			$cek_tanggal = $sthari - $ethari;

			if ($cek_tanggal == '30' || $cek_tanggal == '-30') {
				$lama_kontrak = $this->db->query("SELECT TIMESTAMPDIFF(MONTH,'" . $field['smasa'] . "','" . $field['emasa'] . "')+1 as selisih ")->row();
			} else {
				$lama_kontrak = $this->db->query("SELECT TIMESTAMPDIFF(MONTH,'" . $field['smasa'] . "','" . $field['emasa'] . "') as selisih ")->row();
			}

			$this->db3 = $this->load->database('db_third', TRUE);
			$ambil_zparameter_baru = $this->db3->query('select zparameter from new_kontrak where perner = "' . $field['perner'] . '" and start_date = "' . $field['smasa'] . '" and end_date = "' . $field['emasa'] . '" ')->row();

			$row = array();
			$row[] = $no;
			$row[] = $field['perner'];
			$row[] = $field['smasa'];
			$row[] = $field['emasa'];
			$row[] = $field['lzparameter'];
			$row[] = $lama_kontrak->selisih;
			$row[] = $ambil_zparameter_baru->zparameter;
			$row[] = $field['perkalian'];
			$row[] = $status;
			$row[] = '<a class="btn btn-warning m-btn m-btn--icon btn-sm m-btn--icon-only  m-btn--pill m-btn--air" href="javascript:void(0)" onclick="edit_data(\'' . $field['id'] . '\')" ><i class="fa fa-edit"></i></a>';

			$dataviews[] = $row;
		}

		$data	= $dataviews;
		$rtotal = $countlist;

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $countlist['total_data'],
			"recordsFiltered" => $countlist['total_data'],
			"data" => $data,
		);

		echo json_encode($output);
	}

	function xsearperner()
	{
		$perner 	= $_GET['q'];

		$data	= $this->skema_model->search_perner($perner);

		echo json_encode($data);
	}

	function getlastkontrak()
	{
		$session_data 	= $this->session->userdata('logged_in');

		$datarray	= $this->skema_model->get_detail_kontrak($this->input->post('perner'));

		foreach ($datarray as $list) {
			$tigasatu = array('01', '03', '05', '07', '08', '10', '12');
			$tigapuluh = array('04', '06', '09', '11');

			$start = explode('-', $list['start_date'])[1];

			if (in_array($start, $tigasatu)) {
				$sthari = explode('-', $list['start_date'])[2] + 1;
			} else if (in_array($start, $tigapuluh)) {
				$sthari = explode('-', $list['start_date'])[2] + 2;
			} else {
				$sthari = explode('-', $list['start_date'])[2] + 4;
			}

			$end = explode('-', $list['end_date'])[1];

			if (in_array($end, $tigasatu)) {
				$ethari = explode('-', $list['end_date'])[2] + 1;
			} else if (in_array($end, $tigapuluh)) {
				$ethari = explode('-', $list['end_date'])[2] + 2;
			} else {
				$ethari = explode('-', $list['end_date'])[2] + 4;
			}

			$cek_tanggal = $sthari - $ethari;

			if ($cek_tanggal == '30' || $cek_tanggal == '-30') {
				$lama_kontrak = $this->db->query("SELECT TIMESTAMPDIFF(MONTH,'" . $list['start_date'] . "','" . $list['end_date'] . "')+1 as selisih ")->row();
			} else {
				$lama_kontrak = $this->db->query("SELECT TIMESTAMPDIFF(MONTH,'" . $list['start_date'] . "','" . $list['end_date'] . "') as selisih ")->row();
			}
			$output['detail'][] = array(
				'id_kontrak' => $list['id'],
				'start_date' => $list['start_date'],
				'end_date' => $list['end_date'],
				'jmlbulan' => $lama_kontrak->selisih,
				'zparameter' => $list['zparameter']
			);
		}
		echo json_encode($output);
	}

	function add_uak_perner()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$level = $session_data['level'];

			$this->db3 = $this->load->database('db_third', TRUE);

			if (($this->input->post('zparameter') <> '') || ($this->input->post('lzparameter') <> $this->input->post('zparameter'))) {
				$this->db3->query('update new_kontrak set zparameter = "' . $this->input->post('zparameter') . '" where id = "' . $this->input->post('idkontrak') . '" ');
			}

			$item = array(
				'perner'		=> $this->input->post('perner'),
				'smasa'		=> $this->input->post('start'),
				'emasa'		=> $this->input->post('end'),
				'lzparameter'		=> $this->input->post('lzparameter'),
				'perkalian'		=> $this->input->post('jmlbulannew'),
				'upd'		=> $username,
				'created_at' 			=> date("Y-m-d H:i:s")
			);

			$a = $this->skema_model->simpan_data_uak($item);

			if ($a) {
				echo $result = "Sucess";
			} else {
				echo $result = "Failed";
			}
		} else {
			show_404('page');
		}
	}

	function edit_uak_perner()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 		= $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$level = $session_data['level'];

			$this->db3 = $this->load->database('db_third', TRUE);

			if (($this->input->post('zparameter') <> '') || ($this->input->post('lzparameter') <> $this->input->post('zparameter'))) {
				$this->db3->query('update new_kontrak set zparameter = "' . $this->input->post('zparameter') . '" where id = "' . $this->input->post('idkontrak') . '" ');
			}

			$item = array(
				'perner'		=> $this->input->post('perner'),
				'smasa'		=> $this->input->post('start'),
				'emasa'		=> $this->input->post('end'),
				'lzparameter'		=> $this->input->post('lzparameter'),
				'perkalian'		=> $this->input->post('jmlbulannew'),
				'upd'		=> $username,
				'updated_at' 			=> date("Y-m-d H:i:s")
			);

			$a = $this->skema_model->edit_data_uak($item);

			if ($a) {
				echo $result = "Sucess";
			} else {
				echo $result = "Failed";
			}
		} else {
			show_404('page');
		}
	}

	function ambil_detail_uak()
	{
		$session_data 	= $this->session->userdata('logged_in');

		$datarray	= $this->skema_model->get_detail_uak($this->input->post('id'));

		foreach ($datarray as $list) {
			$tigasatu = array('01', '03', '05', '07', '08', '10', '12');
			$tigapuluh = array('04', '06', '09', '11');

			$start = explode('-', $list['smasa'])[1];

			if (in_array($start, $tigasatu)) {
				$sthari = explode('-', $list['smasa'])[2] + 1;
			} else if (in_array($start, $tigapuluh)) {
				$sthari = explode('-', $list['smasa'])[2] + 2;
			} else {
				$sthari = explode('-', $list['smasa'])[2] + 4;
			}

			$end = explode('-', $list['emasa'])[1];

			if (in_array($end, $tigasatu)) {
				$ethari = explode('-', $list['emasa'])[2] + 1;
			} else if (in_array($end, $tigapuluh)) {
				$ethari = explode('-', $list['emasa'])[2] + 2;
			} else {
				$ethari = explode('-', $list['emasa'])[2] + 4;
			}

			$cek_tanggal = $sthari - $ethari;

			if ($cek_tanggal == '30' || $cek_tanggal == '-30') {
				$lama_kontrak = $this->db->query("SELECT TIMESTAMPDIFF(MONTH,'" . $list['smasa'] . "','" . $list['emasa'] . "')+1 as selisih ")->row();
			} else {
				$lama_kontrak = $this->db->query("SELECT TIMESTAMPDIFF(MONTH,'" . $list['smasa'] . "','" . $list['emasa'] . "') as selisih ")->row();
			}

			$this->db3 = $this->load->database('db_third', TRUE);
			$ambil_zparameter_baru = $this->db3->query('select id, zparameter from new_kontrak where perner = "' . $list['perner'] . '" and start_date = "' . $list['smasa'] . '" and end_date = "' . $list['emasa'] . '" ')->row();

			$output['detail'][] = array(
				'id_kontrak' => $ambil_zparameter_baru->id,
				'perner' => $list['perner'],
				'start_date' => $list['smasa'],
				'end_date' => $list['emasa'],
				'jmlbulan' => $lama_kontrak->selisih,
				'lzparameter' => $list['lzparameter'],
				'jmlbulannew' => $list['perkalian'],
				'zparameter' => $ambil_zparameter_baru->zparameter,
				'status' => $list['status'],
			);
		}
		echo json_encode($output);
	}
}
