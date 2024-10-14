<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') or exit('No direct script access allowed');

class Mapping extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation', 'curl', 'zip'));
		$this->load->model(array('job_model', 'user', 'skema_model'));
	}


	public function v_mapping()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";

			$tes 		= $session_data['level'];
			$daud 		= $session_data['layanan'];
			$jbt 		= $session_data['jabatan'];
			$username 	= $session_data['username'];
			$typ 		= $session_data['type'];

			if ($tes == '4') {
				$data['transjo'] = $this->job_model->get_manar_pic($username);
			} else {
				$data['transjo'] = $this->job_model->get_manar2_pic($username);
			}

			/*
			$tjprorray = $this->skema_model->get_pichi();
			//$tjprorray = $this->job_model->get_pichi_login();
			$selectq = "";
			foreach($tjprorray as $key => $list){
				$selectq .= "<option value=". $list['usr_loginname'] .">". $list['usr_lastname'] . "</option>";
			}
			$data['cmbpichi']		= $selectq;
			
			
			*/

			$this->curl->create('http://192.168.88.5/service/index.php/master_login/list_manar');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$data['cmb_manar'] = json_decode($this->curl->execute());


			$this->curl->create('http://192.168.88.5/service/index.php/master_login/list_hrarea');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$data['cmbpichi'] = json_decode($this->curl->execute());


			$wjprorray = $this->job_model->get_pichi_login();
			$selectw = "";
			foreach ($wjprorray as $key => $list) {
				$selectw .= "<option value=" . $list['username'] . ">" . $list['nama'] . "</option>";
			}
			$data['cmbpicrek']		= $selectw;

			$this->load->view('pages/header', $data);
			$this->load->view('mapping/v_mapping', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}


	public function cek_perner_ganti()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";

			$tes 		= $session_data['level'];
			$daud 		= $session_data['layanan'];
			$jbt 		= $session_data['jabatan'];
			$username 	= $session_data['username'];
			$typ 		= $session_data['type'];

			$pergan = $this->input->post('data');
			$tglres = explode('-', $this->input->post('tglres'));
			$bultahres = $tglres[0] . '-' . $tglres[1];
			// $tglres = explode('', $this->input->post('tglres'));
			// $bultahres = $tglres[0];
			$cekiky	= $this->db->query("Select a.* from trans_perner_ganti a LEFT JOIN trans_perner b ON a.nojo=b.nojo AND a.perner_resrot=b.perner LEFT JOIN trans_jo c ON b.nojo=c.nojo Where b.perner_ganti='$pergan' AND c.flag_cancel_sap!='1' AND c.approval!='2' AND a.flagrfc!='6' AND (b.skema!='1' OR b.flag_app!='2') ");
			$cekik = $cekiky->num_rows();
			$cekuk = $cekiky->row();

			$cektglakt = $this->skema_model->cektglakt($pergan, $bultahres);

			if ($cekik > 0) {
				$hasil2 = 'GAGAL,' . $cekuk->nojo;
				echo $hasil2;
				exit();
			} else {
				//bultahres->bulantahunresign /cektglakt->cek tanggal aktif
				if ($bultahres <= $cektglakt->begda) {
					$hasil2 = 'GAGALX,' . $cekuk->nojo;
					echo $hasil2;
					exit();
				} else {
					$hasil2 = 'Sukses,' . $cekuk->nojo;
					echo $hasil2;
					exit();
				}
			}
		}
	}


	public function cek_perner_aktif()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['title'] 			= "Job Order";

			$tes 		= $session_data['level'];
			$daud 		= $session_data['layanan'];
			$jbt 		= $session_data['jabatan'];
			$username 	= $session_data['username'];
			$typ 		= $session_data['type'];

			$perner = $this->input->post('data');
			$statres = $this->input->post('trotresx');
			$cekiky	= $this->skema_model->cek_perner_sap($perner);
			$this->load->database('db_third', TRUE);
			$persax_sap = $cekiky->werks;
			$areax_sap = $cekiky->btrtl;
			$skillx_sap = $cekiky->persk;
			$lvlx_sap = $cekiky->trfar;
			$jbtnx_sap = $cekiky->platx;

			// if($statres==1){
			// $cekres  = $this->db->query("SELECT a.perner, a.nojo FROM trans_perner WHERE a.perner='$perner' AND massn='Z8' ");
			// $cekres1 = $cekres->num_rows();
			// $cekres2 = $cekres->row();
			// if($cekres1>0){
			// $hasil2='GAGAL,'.$cekuk->nojo;
			// echo $hasil2;exit();
			// }
			// }

			if ($statres == 1) {
				$cekres  = $this->db->query("SELECT a.perner, a.nojo FROM trans_perner a WHERE a.perner='$perner' and a.skema='1' and rotasi_resign='1' ");
				$cekres1 = $cekres->num_rows();
				$cekres2 = $cekres->row();
				if ($cekres1 > 0) {
					$hasil_res = 'GAGAL,1,' . $cekres2->nojo;
					echo $hasil_res;
					exit();
				}
			} else {
				$cekok = $this->db->query("SELECT a.perner, a.nojo, r.status_rekrut FROM trans_perner a left join trans_jo b ON a.nojo=b.nojo LEFT JOIN (SELECT id, idpktable, status_rekrut, jumlah FROM trans_rincian_rekrut WHERE typejo='2') r ON r.idpktable=a.id WHERE a.perner='$perner' AND b.flag_cancel_sap!='1' AND b.approval!='2' AND r.status_rekrut NOT IN (3,4) AND a.persa='$persax_sap' AND a.area='$areax_sap' AND a.skilllayanan='$skillx_sap' AND a.level='$lvlx_sap' AND a.nm_jabatan='$jbtnx_sap' AND (a.skema!='1' OR a.flag_app!='2') and rotasi_resign='2' ORDER BY a.id DESC LIMIT 1 ");
				$cekik = $cekok->num_rows();
				$cekuk = $cekok->row();
				if ($cekik > 0) {
					$hasil2 = 'GAGAL,2,' . $cekuk->nojo;
					echo $hasil2;
					exit();
				} else {
					$this->curl->create('http://192.168.88.5/service/index.php/joborder/cek_perner');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$post = array('token' => sha1("#ISH!@#"), 'perner' => $perner, 'bulan' => date("m"), 'tahun' => date("Y"));
					$this->curl->post($post);
					//$hasil = json_decode($this->curl->execute());
					$hasil2 = $this->curl->execute();
					echo $hasil2;
					exit();
				}
			}
		}
	}



	function detail_perner()
	{
		if ($this->session->userdata('logged_in')) {
			$perner = $this->input->post('anojo');
			$tresix = $this->input->post('tresi');
			//var_dump($perner);exit();
			$data	= $this->skema_model->detail_perner($perner, $tresix);

			//print_r ($_POST);
			//$this->output->enable_profiler(TRUE);
			echo json_encode($data);
		}
	}

	function detail_pernerx()
	{
		if ($this->session->userdata('logged_in')) {
			$perner = $this->input->post('anojo');
			$tresix = $this->input->post('tresi');
			$pgantix = $this->input->post('pgantix');
			// var_dump($pgantix);exit();
			$data['perrot']	= $this->skema_model->detail_pernery($perner, $tresix);
			if ($pgantix != '') {
				$data['pergan']	= $this->skema_model->detail_pernerx($pgantix, $tresix);
			}

			//print_r ($_POST);
			//$this->output->enable_profiler(TRUE);
			echo json_encode($data);
			die;
		}
	}




	public function data_mapping()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];

			$tes 		= $session['level'];

			if ($tes == '4') {
				$data =  $this->job_model->get_datamapping_2($length, $start, $search, $order, $dir);
			} else {
				$data =  $this->job_model->get_datamapping($length, $start, $search, $order, $dir);
			}

			//var_dump($data);exit();
			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				if ($row['n_project'] != '') {
					$abc = $row['n_project'];
				} else {
					$abc = $row['project'];
				}
				$output['data'][] = array(
					$row['id'],
					$row['nojo'],
					$abc,
					$row['ntype'],
					$row['hnama'],
					$row['upd'],
					$row['n_pic_manar'],
					$row['n_pic_hi'],
					$row['n_pic_rekrut'],
					$row['ket_done'],
					$row['ket_rekrut'],
					//base_url().'public/uploads/'.$row['file']
					'<td>
						<button type="button" class="btn btn-primary btn-block btn-xs btndetail" onclick="javascript:test(\'' . $row['nojo'] . '\');" id="btndetail" data-toggle="modal" data-target="#XmyModal">Detail</button>
						<button type="button" class="btn btn-success btn-block btn-xs btnpic" onclick="javascript:pilpic(\'' . $row['nojo'] . '\',\'' . $row['nojo'] . '\')" id="btnpic" data-toggle="modal" data-target="#PICModal">Pilih PIC</button>
					</td>'

					/*'<a href="'.base_url().'index.php/home/det_profile/'.$row['perner'].'">View Foto</a>'*/
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}



	function simpan_pichi()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$usr		 			= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['type'] 			= $session_data['type'];
			$data['regional'] 		= $session_data['regional'];
			$xpichi			= $this->input->post('pichix');
			$picid 			= $xpichi[0];
			$picman  		= $xpichi[1];
			$n_picman  		= $xpichi[2];
			$picop  		= $xpichi[3];
			$n_picop		= $xpichi[4];
			$picrek  		= $xpichi[5];
			$n_picrek  		= $xpichi[6];

			//var_dump($pichi);exit();

			if ($data['level'] == '4') {
				$cek_area 		= $this->db->query("SELECT a.id, b.project, b.n_project, a.lokasi, e.city_name FROM trans_rincian a LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` left join trans_jo b ON a.nojo=b.nojo WHERE a.nojo = '$picid' AND e.manar='$usr'  ")->result();
			} else {
				$cek_area 		= $this->db->query("SELECT a.id, b.project, b.n_project, a.lokasi, e.city_name FROM trans_rincian a LEFT JOIN mapping_city e ON a.`lokasi` = e.`city_id` left join trans_jo b ON a.nojo=b.nojo WHERE a.nojo = '$picid' AND e.manar2 IN ($usr)  ")->result();
			}

			//var_dump($picid);var_dump($usr);exit();

			foreach ($cek_area as $zar) {
				$mid = $zar->id;

				$item = array(
					'id'	=> $mid
				);

				$item2 = array(
					'pic_hi'		=> $picop,
					'n_pic_hi'		=> $n_picop,
					'pic_manar'		=> $picman,
					'n_pic_manar'	=> $n_picman,
					'pic_rekrut'	=> $picrek,
					'n_pic_rekrut'	=> $n_picrek
				);

				$this->job_model->simpan_pichi($item, $item2);
			}

			//$cek_detil 		= $this->db->query("SELECT b.project, a.lokasi FROM trans_rincian a left join trans_jo b ON a.nojo=b.nojo WHERE a.id = '$picid' ")->row();

			$check = $this->job_model->get_email_picrek($picrek);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}

			$data['skrg'] = date("d-m-Y H:i:s");
			//$data['proj'] = $zar->project;
			$data['noj']  = $picid;
			$data['cek_detil']  = $cek_area;
			$data['stat']  = 1;

			$message = $this->load->view('addjo/email_pic.php', $data, TRUE); // this will return you html data as message

			$hasilkirim1 = $this->emailsent_pic($test, 'soehartobaru@gmail.com', 'Notifikasi Pemilihan PIC', $message);
			echo $hasilkirim1;

			/*
			$check = $this->skema_model->get_email_pichi($picop);
			$test = array();
			foreach ($check as $val) {
				$test[] = $val['email'];
			}
			
			$data['skrg'] = date("d-m-Y H:i:s");
			$data['proj'] = $cek_detil->project;
			$data['lok']  = $cek_detil->lokasi;
			
			$message = $this->load->view('addjo/email_pic.php',$data,TRUE); // this will return you html data as message

			$hasilkirim2 = $this->emailsent_pic($test,'soehartobaru@gmail.com','Notifikasi Pemilihan PIC',$message);
			
			echo $hasilkirim2;
			*/
		}
	}


	public function emailsent_pic($vartoemail, $varccemail, $varsubject, $msgemail)
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



	public function list_mapping()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['regional'] 		= $session_data['regional'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "List Login";

			$tes 		= $session_data['level'];
			$daud 		= $session_data['layanan'];
			$jbt 		= $session_data['jabatan'];
			$data['type'] 		= $session_data['type'];
			$username 	= $session_data['username'];
			$typ 		= $session_data['type'];

			$search = $this->input->post('dataarr');

			if ($tes == '4') {
				$data['transjo'] = $this->job_model->cari_manar_pic($username, $search);
			} else {
				$data['transjo'] = $this->job_model->cari_manar2_pic($username, $search);
			}

			$this->load->view('mapping/list_mapping', $data);
		} else {
			redirect('login', 'refresh');
		}
	}



	public function data_listorder3dup()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"status"	=> $postparam['0']['value']
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

			if ($level == '2') {
				if ($regional == '1') {
					//$data['transjo'] 	= $this->job_model->get_transall_approval_ops($username);
					//$data['transjos'] 	= $this->job_model->get_transall_sap_sk_app_ops($username);
					//$data =  $this->job_model->get_listorder21($length,$start,$search,$order,$dir);
					$data =  $this->job_model->get_listorder1($length, $start, $search, $order, $dir);
				} else {
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					$lalalili =  $q_cek_pmanar->jml;
					if (($q_cek_pmanar->jml) <= 0) {
						//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
						//$data['transjos'] = $this->job_model->get_transall_sap_sk_app($daud,$jbt);
						$data =  $this->job_model->get_listorder20($length, $start, $search, $order, $dir);
					} else {
						//$data['transjo'] = $this->job_model->get_transall_manar_2($data['username']);
						//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar_2($data['username']);
						$data =  $this->job_model->get_listorder20_2($length, $start, $search, $order, $dir);
					}
				}
			} else if (($level == '1') || ($level == '14')) {
				//$data['transjo'] = $this->job_model->get_transall_craeter($username);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_creater($username);
				$data =  $this->job_model->get_listorder1($length, $start, $search, $order, $dir);
			} else if (($level == '3') || ($level == '15')) {
				//$data['transjo'] = $this->job_model->get_transall_rekrut($daud);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder3($length, $start, $search, $order, $dir, $parsearch);
			} else if ($level == '4') {
				//$data['transjo'] = $this->job_model->get_transall_manar($data['username']);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder4($length, $start, $search, $order, $dir);
			} else {
				//$data['transjo'] = $this->job_model->get_transall();
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder_lain($length, $start, $search, $order, $dir);
			}


			//var_dump($data);exit();
			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				if ($level == '4') {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else {
						if ($row['flag_app'] == 1) {
							$btn = 'Approved MANAR';
							$stat = 'btn-success';
						} elseif ($row['flag_app'] == 2) {
							$btn = 'Rejected MANAR';
							$stat = 'btn-danger';
						} else {
							$btn = 'Approve';
							$stat = 'btn-warning';
						}
					}
				} else if ($level == '2') {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else {
						if ($regional == '1') {
							if ($row['flag_app'] == 1) {
								$btn = 'Approved MANAR';
								$stat = 'btn-success';
							} elseif ($row['flag_app'] == 2) {
								$btn = 'Rejected MANAR';
								$stat = 'btn-danger';
							} else {
								$btn = 'Waiting Approval MANAR';
								$stat = 'btn-warning';
							}
						} else {
							if ($lalalili <= '0') {
								if ($row['flag_app'] == 1) {
									$btn = 'Approved MANAR';
									$stat = 'btn-success';
								} elseif ($row['flag_app'] == 2) {
									$btn = 'Rejected MANAR';
									$stat = 'btn-danger';
								} else {
									$btn = 'Waiting Approval MANAR';
									$stat = 'btn-warning';
								}
							} else {
								if ($row['flag_app'] == 1) {
									$btn = 'Approved MANAR';
									$stat = 'btn-success';
								} elseif ($row['flag_app'] == 2) {
									$btn = 'Rejected MANAR';
									$stat = 'btn-danger';
								} else {
									$btn = 'Approve';
									$stat = 'btn-warning';
								}
							}
						}
					}
				} else {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else {
						if ($row['flag_app'] == 1) {
							$btn = 'Approved MANAR';
							$stat = 'btn-success';
						} elseif ($row['flag_app'] == 2) {
							$btn = 'Rejected MANAR';
							$stat = 'btn-danger';
						} else {
							$btn = 'Waiting Approval MANAR';
							$stat = 'btn-warning';
						}
					}
				}

				//if($row['type_jo']==2){
				//$abc = '-';
				//} else {
				if ($row['n_project'] != '') {
					$abc = $row['n_project'];
				} else {
					$abc = $row['project'];
				}
				//} 


				if (!filter_var($row['lokasi'], FILTER_SANITIZE_STRING)) {
					$cde = $row['lokasi'];
				} else {
					$cde = $row['city_name'];
				}

				if ($row['type_jo'] == 2) {
					$fgh = $row['ntype'];
				} else {
					if (!filter_var($row['jabatan'], FILTER_VALIDATE_INT)) {
						$fgh = $row['jabatan'] . "(" . $row['gender'] . ") ";
					} else {
						$fgh = $row['name_job_function'] . "(" . $row['gender'] . ") ";
					}
				}

				$kont = json_encode($row['ket_rej']);
				$kont2 = json_encode($row['ket_cancel']);
				$kont3 = json_encode($row['ket_rekrut']);
				if (($level == 3) || ($level == 15)) {
					if ($row['flag_cancel'] == '1') {
						$ttt = '<button type="button" class="btn btn-danger btn-block btn-xs btnholded" onclick="javascript:bhold(\'' . $row['ket_cancel'] . '\');" id="btnholded" data-toggle="modal" data-target="#EVModal">Canceled SAP</button>';
					} else {
						$ttt = '';
					}

					if ($row['flag_cancel_sap'] == '1') {
						$uuu = '<button type="button" class="btn btn-danger btn-block btn-xs btnholded" onclick="javascript:bhold(\'' . $row['ket_cancel'] . '\');" id="btnholded" data-toggle="modal" data-target="#EVModal">Canceled SAP</button>';
					} else {
						$uuu = '';
					}


					if (($row['flag_jobs'] != 1) || ($row['flag_jobs'] == null)) {
						if ($row['status_rekrut'] == 1) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">Hold</button>';
							$jkl = '';
						} else if ($row['status_rekrut'] == 2) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">Done</button>';
							$jkl = '';
						} else {
							//if( ($row['skema']==1) || ($row['bskema']==1) )
							//{
							$www = '<button type="button" class="btn btn-warning btn-block btn-xs btnedit" onclick="javascript:edit(\'' . $row['nojo'] . '\',\'' . $row['id'] . '\',\'' . $fgh . '\',\'' . $row['gender'] . '\',\'' . $cde . '\',\'' . $row['jumlah'] . '\',\'' . $row['rekrut'] . '\');" id="btnedit" data-toggle="modal" data-target="#EModal">ADD</button>';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
							$jkl = "<a href='" . base_url() . 'index.php/mapping/input_hiring' . '/'  . $row['id'] . "' style='color:red;'><button type='button' class='btn bg-maroon btn-block btn-xs' style='margin-top:5px; margin-bottom:5px;'>Hiring</button></a>";
							//}
							//else
							//{
							//$www = '';
							//$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
							//}
						}
						//$yyy = '<button type="button" class="btn btn-success btn-block btn-xs btngo" onclick="javascript:bigo(\''.$row['id'].'\');" id="btngo" data-toggle="modal" data-target="#OModal">Publish</button>';
						$yyy = '';
					} else {
						if ($row['status_rekrut'] == 1) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">Hold</button>';
							$jkl = '';
						} else if ($row['status_rekrut'] == 2) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">Done</button>';
							$jkl = '';
						} else {
							//if( ($row['skema']==1) || ($row['bskema']==1) )
							//{
							$www = '<button type="button" class="btn btn-warning btn-block btn-xs btnedit" onclick="javascript:edit(\'' . $row['nojo'] . '\',\'' . $row['id'] . '\',\'' . $fgh . '\',\'' . $row['gender'] . '\',\'' . $cde . '\',\'' . $row['jumlah'] . '\',\'' . $row['rekrut'] . '\');" id="btnedit" data-toggle="modal" data-target="#EModal">ADD</button>';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
							$jkl = "<a href='" . base_url() . 'index.php/mapping/input_hiring' . '/'  . $row['id'] . "' style='color:red;'><button type='button' class='btn bg-maroon btn-block btn-xs' style='margin-top:5px; margin-bottom:5px;'>Hiring</button></a>";
							//}
							//else
							//{
							//$www = '';
							//$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
							//}
						}
						$yyy = '';
					}
				} else {
					$abcde = 'sap';
					if ($row['flag_cancel'] == '1') {
						$pap = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bhold(\"" . $row['ket_cancel'] . "\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>";

						if ($level == '1') {
							$pip = "<a href='" . base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
						} else {
							$pip = "";
						}
					} else if ($row['flag_cancel_sap'] == '1') {
						$pap = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bhold(\"" . $row['ket_cancel'] . "\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>";

						if ($level == '1') {
							$pip = "<a href='" . base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
						} else if ($level == 2) {
							if ($regional == 1) {
								$pip = "<a href='" . base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
							} else {
								$pip = "";
							}
						} else {
							$pip = "";
						}
					} else {
						//$str= "&#39;".$row['ket_rej']."&#39;";
						$pap = '<button type="button" class="btn ' . $stat . ' btn-block btn-xs btnapz" onclick="javascript:bappz(\'' . $row['nojo'] . '\',\'' . $btn . '\',\'' . $row['ket_rej'] . '\',\'' . $row['upd'] . '\',\'' . $row['ntype'] . '\',\'' . $row['id'] . '\');" id="btnapz" data-toggle="modal" data-target="#AmyModal">' . $btn . '</button>';
						//$sad = '<label>'.$row['ket_rej'].'</label>';
						//$pap = '<button type="button" class="btn '. $stat .' btn-block btn-xs btnapz" onclick="javascript:alert(\''.$sad.'\');" id="btnapz" data-toggle="modal" data-target="#AmyModal">' . $btn . '</button>';
						$pip = "";
					}
				}


				if (($level == 3) || ($level == 15)) {
					//$m3m = '<td><button type="button" class="btn btn-primary btn-block btn-xs btndetail" onclick="javascript:detail(\''.$row['nojo'].'\');" id="btndetail" data-toggle="modal" data-target="#myModal">Detail</button> '.$ttt.' '.$uuu.' '.$www.' '.$vvv.' '.$jkl.' '.$yyy.' </td>';
					/* Baru 15012018
					$m3m = '<td><button type="button" class="btn btn-primary btn-block btn-xs btndetail" onclick="javascript:detail(\''.$row['nojo'].'\');" id="btndetail" data-toggle="modal" data-target="#myModal">Detail</button> '.$ttt.' '.$uuu.' '.$vvv.' '.$yyy.' </td>';
					*/
					$cuk = 'lv3';
					if ($row['type_jo'] == 2) {
						$m3m = "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' onclick='javascript:detailk(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\");' id='btndetail' data-toggle='modal' data-target='#KVXmyModal'>Detail</button> " . $vvv . " " . $yyy . " </td>";
					} else {
						$m3m = "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' onclick='javascript:detail(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\", \"" . $cuk . "\");' id='btndetail' data-toggle='modal' data-target='#AVXmyModal'>Detail</button> " . $vvv . " " . $yyy . " </td>";
					}
				} else {
					//$m3m = '<td><button type="button" class="btn btn-primary btn-block btn-xs btndetail" onclick="javascript:detail(\''.$row['nojo'].'\');" id="btndetail" data-toggle="modal" data-target="#myModal">Detail</button> '.$pap.' '.$pip.' </td>';
					$cuk = 'lv2';
					if ($row['type_jo'] == 2) {
						$m3m = "<td><button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:detailx(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\");' id='btndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button> " . $pip . " </td>";
					} else {
						$m3m = "<td><button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:detaily(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\", \"" . $cuk . "\");' id='btndetail' data-toggle='modal' data-target='#LmyModal'>" . $btn . "</button> " . $pip . " </td>";
					}
				}

				/*
				if($row['rekrut']=='')
				{
					$gg = 0;
				}
				else 
				{
					$gg = $row['rekrut'];
				}
				*/

				if (($level == 3) || ($level == 15)) {
					if ($row['hr'] == '') {
						$wa = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'hr\',\'' . $row['hr'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnhr" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wa = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'hr\',\'' . $row['hr'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnhr" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['hr'] . '</td></a>';
					}

					if ($row['training'] == '') {
						$wd = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'training\',\'' . $row['training'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wd = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'training\',\'' . $row['training'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['training'] . '</td></a>';
					}

					if ($row['jmluser'] == '') {
						$wb = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'user\',\'' . $row['jmluser'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wb = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'user\',\'' . $row['jmluser'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['jmluser'] . '</td></a>';
					}

					if ($row['rekrut'] == '') {
						$wc = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'rekrut\',\'' . $row['rekrut'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnrekrut" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wc = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'rekrut\',\'' . $row['rekrut'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnrekrut" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['rekrut'] . '</td></a>';
					}
				}


				if ($row['type_jo'] == 2) {
					$qwq = '1';
				} else {
					$qwq = $row['jumlah'];
				}

				if ($row['type_jo'] == 2) {
					$ab = '-';
				} else {
					$ab = $row['hr'];
				}

				if ($row['type_jo'] == 2) {
					$ac = '-';
				} else {
					$ac = $row['training'];
				}

				if ($row['type_jo'] == 2) {
					$ad = '-';
				} else {
					$ad = $row['jmluser'];
				}

				if ($row['type_jo'] == 2) {
					$ae = '-';
				} else {
					$ae = $row['rekrut'];
				}

				if ($row['type_jo'] == 2) {
					$af = '-';
				} else {
					$af = $row['note'];
				}

				if (($level == 3) || ($level == 15)) {
					$output['data'][] = array(
						$row['id'],
						//"<td><a href='". base_url() . 'index.php/home/integrated' . '/'  . $row['id'] . '/' . $row['jumlah'] . '/' . $gg ."'>".$row['nojo']."</td></a>",
						$row['nojo'],
						$row['tanggal'],
						$row['upd'],
						$row['lama'] . ' bulan',
						$abc,
						$row['ntype'],
						$cde,
						$row['bekerja'],
						$fgh,
						$qwq,
						//$row['jumlah'],  
						//$row['hr'],
						//$row['jmluser'], 
						//$row['rekrut'],
						$wa,
						$wd,
						$wb,
						$wc,
						$row['ket_rekrut'],
						//$row['note'],
						$row['komentar'],
						$row['gender'],
						$row['ket_cancel'],
						$row['ket_rej'],
						$row['upd'],
						$row['ket_rekrut'],
						//base_url().'public/uploads/'.$row['file']
						$m3m
					);
				} else {
					$output['data'][] = array(
						$row['id'],
						$row['nojo'],
						$row['tanggal'],
						$row['upd'],
						$row['lama'] . ' bulan',
						$abc,
						$row['ntype'],
						$cde,
						$row['bekerja'],
						$fgh,
						$qwq,
						//$row['jumlah'], 
						//$row['hr'],
						//$row['training'],						
						//$row['jmluser'],
						//$row['rekrut'],
						//$row['note'],

						$ab,
						$ac,
						$ad,
						$ae,
						$af,
						/*
						$wa,
						$wd,						
						$wb,
						$wc,
						$af,
						*/
						$row['komentar'],
						$row['gender'],
						$row['ket_cancel'],
						$row['ket_rej'],
						$row['upd'],
						$row['ket_rekrut'],
						//base_url().'public/uploads/'.$row['file']
						$m3m
					);
				}

				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}



	public function data_listorder3()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"status"	=> ''
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

			if ($level == '2') {
				if ($regional == '1') {
					//$data['transjo'] 	= $this->job_model->get_transall_approval_ops($username);
					//$data['transjos'] 	= $this->job_model->get_transall_sap_sk_app_ops($username);
					//$data =  $this->job_model->get_listorder21($length,$start,$search,$order,$dir);
					$data =  $this->job_model->get_listorder1($length, $start, $search, $order, $dir);
				} else {
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					$lalalili =  $q_cek_pmanar->jml;
					if (($q_cek_pmanar->jml) <= 0) {
						//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
						//$data['transjos'] = $this->job_model->get_transall_sap_sk_app($daud,$jbt);
						$data =  $this->job_model->get_listorder20($length, $start, $search, $order, $dir);
					} else {
						//$data['transjo'] = $this->job_model->get_transall_manar_2($data['username']);
						//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar_2($data['username']);
						$data =  $this->job_model->get_listorder20_2($length, $start, $search, $order, $dir);
					}
				}
			} else if (($level == '1') || ($level == '14')) {
				//$data['transjo'] = $this->job_model->get_transall_craeter($username);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_creater($username);
				$data =  $this->job_model->get_listorder1($length, $start, $search, $order, $dir);
			} else if (($level == '3') || ($level == '15')) {
				//$data['transjo'] = $this->job_model->get_transall_rekrut($daud);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder3($length, $start, $search, $order, $dir, $parsearch);
			} else if ($level == '4') {
				//$data['transjo'] = $this->job_model->get_transall_manar($data['username']);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder4($length, $start, $search, $order, $dir);
			} else {
				//$data['transjo'] = $this->job_model->get_transall();
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder_lain($length, $start, $search, $order, $dir);
			}


			//var_dump($data);exit();
			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				if ($level == '4') {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else {
						if ($row['finish_view_manar'] == 1) {
							$btn = 'Finish';
							$stat = 'btn-success';
						} else {
							if ($row['flag_app'] == 1) {
								$btn = 'Finish';
								$stat = 'btn-success';
							} else {
								$btn = 'View';
								$stat = 'btn-warning';
							}
						}

						/*
						if ($row['flag_app'] == 1) {
							//$btn = 'Approved MANAR';
							$btn = 'View';
							$stat = 'btn-success';
						} elseif ($row['flag_app'] == 2) {
							$btn = 'Rejected MANAR';
							$stat = 'btn-danger';
						} else {
							// $btn = 'Approve';
							$btn = 'View';
							$stat = 'btn-warning';
						}
						*/
					}
				} else if ($level == '2') {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else {
						if ($regional == '1') {
							if ($row['skema'] == 1) {
								$btn = 'Approved PM';
								$stat = 'btn-success';
							} else {
								$btn = 'Waiting PM';
								$stat = 'btn-warning';
							}

							/*
							if ($row['flag_app'] == 1) {
								$btn = 'Approved MANAR';
								$stat = 'btn-success';
							} elseif ($row['flag_app'] == 2) {
								$btn = 'Rejected MANAR';
								$stat = 'btn-danger';
							} else {
								$btn = 'Waiting Approval MANAR';
								$stat = 'btn-warning';
							}
							*/
						} else {
							if ($lalalili <= '0') {
								$btn = 'View';
								$stat = 'btn-success';
								/*
								if ($row['flag_app'] == 1) {
									$btn = 'Approved MANAR';
									$stat = 'btn-success';
								} elseif ($row['flag_app'] == 2) {
									$btn = 'Rejected MANAR';
									$stat = 'btn-danger';
								} else {
									$btn = 'Waiting Approval MANAR';
									$stat = 'btn-warning';
								}
								*/
							} else {
								/*
								if ($row['flag_app'] == 1) {
									$btn = 'Approved MANAR';
									$stat = 'btn-success';
								} elseif ($row['flag_app'] == 2) {
									$btn = 'Rejected MANAR';
									$stat = 'btn-danger';
								} else {
									$btn = 'Approve';
									$stat = 'btn-warning';
								}
								*/
								$btn = 'View';
								$stat = 'btn-success';
							}
						}
					}
				} else {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else {
						if ($row['skema'] == 1) {
							$btn = 'Approved PM';
							$stat = 'btn-success';
						} else {
							$btn = 'Waiting PM';
							$stat = 'btn-warning';
						}

						// $btn = 'View';
						// $stat = 'btn-success';

						/*
						if ($row['flag_app'] == 1) {
							$btn = 'Approved MANAR';
							$stat = 'btn-success';
						} elseif ($row['flag_app'] == 2) {
							$btn = 'Rejected MANAR';
							$stat = 'btn-danger';
						} else {
							$btn = 'Waiting Approval MANAR';
							$stat = 'btn-warning';
						}
						*/
					}
				}

				//if($row['type_jo']==2){
				//$abc = '-';
				//} else {
				if (($row['n_project'] != '') && ($row['n_project'] != 'Pilih')) {
					$abc = $row['n_project'];
				} else {
					$abc = $row['project'];
				}
				//} 


				if (!filter_var($row['lokasi'], FILTER_SANITIZE_STRING)) {
					$cde = $row['lokasi'];
				} else {
					$cde = $row['city_name'];
				}

				if ($row['type_jo'] == 2) {
					$fgh = $row['ntype'];
				} else {
					if (!filter_var($row['jabatan'], FILTER_VALIDATE_INT)) {
						$fgh = $row['jabatan'] . "(" . $row['gender'] . ") ";
					} else {
						$fgh = $row['name_job_function'] . "(" . $row['gender'] . ") ";
					}
				}

				$kont = json_encode($row['ket_rej']);
				$kont2 = json_encode($row['ket_cancel']);
				$kont3 = json_encode($row['ket_rekrut']);
				if (($level == 3) || ($level == 15)) {
					if ($row['flag_cancel'] == '1') {
						$ttt = '<button type="button" class="btn btn-danger btn-block btn-xs btnholded" onclick="javascript:bhold(\'' . $row['ket_cancel'] . '\');" id="btnholded" data-toggle="modal" data-target="#EVModal">Canceled SAP</button>';
					} else {
						$ttt = '';
					}

					if ($row['flag_cancel_sap'] == '1') {
						$uuu = '<button type="button" class="btn btn-danger btn-block btn-xs btnholded" onclick="javascript:bhold(\'' . $row['ket_cancel'] . '\');" id="btnholded" data-toggle="modal" data-target="#EVModal">Canceled SAP</button>';
					} else {
						$uuu = '';
					}


					if (($row['flag_jobs'] != 1) || ($row['flag_jobs'] == null)) {
						if ($row['status_rekrut'] == 1) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\', \'' . $row['type_jo'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">Hold</button>';
							$jkl = '';
						} else if ($row['status_rekrut'] == 2) {
							$www = '';
							// $vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\', \''.$row['type_jo'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">Done</button>';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros">Done</button>';
							$jkl = '';
						} else {
							//if( ($row['skema']==1) || ($row['bskema']==1) )
							//{
							$www = '<button type="button" class="btn btn-warning btn-block btn-xs btnedit" onclick="javascript:edit(\'' . $row['nojo'] . '\',\'' . $row['id'] . '\',\'' . $fgh . '\',\'' . $row['gender'] . '\',\'' . $cde . '\',\'' . $row['jumlah'] . '\',\'' . $row['rekrut'] . '\');" id="btnedit" data-toggle="modal" data-target="#EModal">ADD</button>';
							// $vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\', \''.$row['type_jo'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
							// $vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\', \''.$row['type_jo'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">STOP</button>';
							$vvv = '';
							$jkl = "<a href='" . base_url() . 'index.php/mapping/input_hiring' . '/'  . $row['id'] . "' style='color:red;'><button type='button' class='btn bg-maroon btn-block btn-xs' style='margin-top:5px; margin-bottom:5px;'>Hiring</button></a>";
							//}
							//else
							//{
							//$www = '';
							//$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
							//}
						}
						//$yyy = '<button type="button" class="btn btn-success btn-block btn-xs btngo" onclick="javascript:bigo(\''.$row['id'].'\');" id="btngo" data-toggle="modal" data-target="#OModal">Publish</button>';
						$yyy = '';
					} else {
						if ($row['status_rekrut'] == 1) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\', \'' . $row['type_jo'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">Hold</button>';
							$jkl = '';
						} else if ($row['status_rekrut'] == 2) {
							$www = '';
							// $vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\', \''.$row['type_jo'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">Done</button>';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros">Done</button>';
							$jkl = '';
						} else {
							//if( ($row['skema']==1) || ($row['bskema']==1) )
							//{
							$www = '<button type="button" class="btn btn-warning btn-block btn-xs btnedit" onclick="javascript:edit(\'' . $row['nojo'] . '\',\'' . $row['id'] . '\',\'' . $fgh . '\',\'' . $row['gender'] . '\',\'' . $cde . '\',\'' . $row['jumlah'] . '\',\'' . $row['rekrut'] . '\');" id="btnedit" data-toggle="modal" data-target="#EModal">ADD</button>';
							// $vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\', \''.$row['type_jo'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
							// $vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\', \''.$row['type_jo'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">STOP</button>';
							$vvv = '';
							$jkl = "<a href='" . base_url() . 'index.php/mapping/input_hiring' . '/'  . $row['id'] . "' style='color:red;'><button type='button' class='btn bg-maroon btn-block btn-xs' style='margin-top:5px; margin-bottom:5px;'>Hiring</button></a>";
							//}
							//else
							//{
							//$www = '';
							//$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
							//}
						}
						$yyy = '';
					}
				} else {
					$abcde = 'sap';
					if ($row['flag_cancel'] == '1') {
						$pap = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bhold(\"" . $row['ket_cancel'] . "\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>";

						if (($level == '1') || ($level == '14')) {
							$pip = "<a href='" . base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
						} else {
							$pip = "";
						}
					} else if ($row['flag_cancel_sap'] == '1') {
						$pap = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bhold(\"" . $row['ket_cancel'] . "\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>";

						if (($level == '1') || ($level == '14')) {
							$pip = "<a href='" . base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
						} else if ($level == 2) {
							if ($regional == 1) {
								$pip = "<a href='" . base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
							} else {
								// $pip = "";
								$pip = "<a href='" . base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
							}
						} else {
							$pip = "";
						}
					} else {
						//$str= "&#39;".$row['ket_rej']."&#39;";
						$pap = '<button type="button" class="btn ' . $stat . ' btn-block btn-xs btnapz" onclick="javascript:bappz(\'' . $row['nojo'] . '\',\'' . $btn . '\',\'' . $row['ket_rej'] . '\',\'' . $row['upd'] . '\',\'' . $row['ntype'] . '\',\'' . $row['id'] . '\');" id="btnapz" data-toggle="modal" data-target="#AmyModal">' . $btn . '</button>';
						//$sad = '<label>'.$row['ket_rej'].'</label>';
						//$pap = '<button type="button" class="btn '. $stat .' btn-block btn-xs btnapz" onclick="javascript:alert(\''.$sad.'\');" id="btnapz" data-toggle="modal" data-target="#AmyModal">' . $btn . '</button>';
						$pip = "";
					}
				}


				if (($level == 3) || ($level == 15)) {
					//$m3m = '<td><button type="button" class="btn btn-primary btn-block btn-xs btndetail" onclick="javascript:detail(\''.$row['nojo'].'\');" id="btndetail" data-toggle="modal" data-target="#myModal">Detail</button> '.$ttt.' '.$uuu.' '.$www.' '.$vvv.' '.$jkl.' '.$yyy.' </td>';
					/* Baru 15012018
					$m3m = '<td><button type="button" class="btn btn-primary btn-block btn-xs btndetail" onclick="javascript:detail(\''.$row['nojo'].'\');" id="btndetail" data-toggle="modal" data-target="#myModal">Detail</button> '.$ttt.' '.$uuu.' '.$vvv.' '.$yyy.' </td>';
					*/
					$cuk = 'lv3';
					if ($row['type_jo'] == 2) {
						$m3m = "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' onclick='javascript:detailk(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\");' id='btndetail' data-toggle='modal' data-target='#KVXmyModal'>Detail</button> " . $vvv . " " . $yyy . " </td>";
					} else {
						$m3m = "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' onclick='javascript:detail(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\", \"" . $cuk . "\");' id='btndetail' data-toggle='modal' data-target='#AVXmyModal'>Detail</button> " . $vvv . " " . $yyy . " </td>";
					}
				} else {
					//$m3m = '<td><button type="button" class="btn btn-primary btn-block btn-xs btndetail" onclick="javascript:detail(\''.$row['nojo'].'\');" id="btndetail" data-toggle="modal" data-target="#myModal">Detail</button> '.$pap.' '.$pip.' </td>';
					$cuk = 'lv2';
					if ($row['type_jo'] == 2) {
						//$m3m = "<td><button type='button' class='btn ". $stat ." btn-block btn-xs btndetail' onclick='javascript:detailx(\"".$row['nojo']."\", \"".$btn."\", \"".$row['id']."\", ".$kont.", ".$kont2.", \"".$row['upd']."\",\"".$row['ntype']."\");' id='btndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button> ".$pip." </td>";
						$m3m = "<td><button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:detailx(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\", \"" . $level . "\");' id='btndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button> " . $pip . " </td>";
					} else {
						//$m3m = "<td><button type='button' class='btn ". $stat ." btn-block btn-xs btndetail' onclick='javascript:detaily(\"".$row['nojo']."\", \"".$btn."\", \"".$row['id']."\", ".$kont.", ".$kont2.", \"".$row['upd']."\",\"".$row['ntype']."\", \"".$cuk."\");' id='btndetail' data-toggle='modal' data-target='#LmyModal'>" . $btn . "</button> ".$pip." </td>";
						$m3m = "<td><button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:detaily(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\", \"" . $cuk . "\", \"" . $level . "\");' id='btndetail' data-toggle='modal' data-target='#LmyModal'>" . $btn . "</button> " . $pip . " </td>";
					}
				}

				/*
				if($row['rekrut']=='')
				{
					$gg = 0;
				}
				else 
				{
					$gg = $row['rekrut'];
				}
				*/

				if (($level == 3) || ($level == 15)) {
					if ($row['hr'] == '') {
						$wa = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'hr\',\'' . $row['hr'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnhr" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wa = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'hr\',\'' . $row['hr'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnhr" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['hr'] . '</td></a>';
					}

					if ($row['training'] == '') {
						$wd = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'training\',\'' . $row['training'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wd = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'training\',\'' . $row['training'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['training'] . '</td></a>';
					}

					if ($row['jmluser'] == '') {
						$wb = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'user\',\'' . $row['jmluser'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wb = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'user\',\'' . $row['jmluser'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['jmluser'] . '</td></a>';
					}

					if ($row['rekrut'] == '') {
						$wc = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'rekrut\',\'' . $row['rekrut'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnrekrut" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wc = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'rekrut\',\'' . $row['rekrut'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnrekrut" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['rekrut'] . '</td></a>';
					}
				}


				if ($row['type_jo'] == 2) {
					$qwq = '1';
				} else {
					$qwq = $row['jumlah'];
				}

				if ($row['type_jo'] == 2) {
					$ab = '-';
				} else {
					$ab = $row['hr'];
				}

				if ($row['type_jo'] == 2) {
					$ac = '-';
				} else {
					$ac = $row['training'];
				}

				if ($row['type_jo'] == 2) {
					$ad = '-';
				} else {
					$ad = $row['jmluser'];
				}

				if ($row['type_jo'] == 2) {
					$ae = '-';
				} else {
					$ae = $row['rekrut'];
				}

				if ($row['type_jo'] == 2) {
					$af = '-';
				} else {
					$af = $row['note'];
				}

				if ($row['type_jo'] == 1) {
					if ($row['new_rekrut'] == 1) {
						$ppk = 'No Rekrut';
					} else {
						$ppk = 'Rekrut';
					}
				}
				if ($row['type_jo'] == 2) {
					if ($row['type_replace'] == 1) {
						$ppk = 'No Rekrut';
					} else {
						$ppk = 'Rekrut';
					}
				}


				if ($row['type_jo'] == 1) {
					if ($row['type_new'] == 1) {
						$koiu = "New Project";
						if ($row['new_rekrut'] == 1) {
							$ghj = "No Rekrutment";
						} else if ($row['new_rekrut'] == 3) {
							$ghj = "No Rekrutment (Existing)";
						} else {
							$ghj = "Rekrutment";
						}
					} else {
						$koiu = "New Pengembangan";
						if ($row['new_rekrut'] == 1) {
							$ghj = "No Rekrutment";
						} else if ($row['new_rekrut'] == 3) {
							$ghj = "No Rekrutment (Existing)";
						} else {
							$ghj = "Rekrutment";
						}
					}
				} else {
					$koiu = "Replacement";
					if ($row['rotasi_resign'] != '') {
						if ($row['rotasi_resign'] == '2') {
							$jrr = 'Rotasi/Mutasi';
						} elseif ($row['rotasi_resign'] == '1') {
							$jrr = 'Resign';
						} else {
							$jrr = 'Data Lama';
						}
						if ($row['type_replace'] == 1) {
							$ghj = "No Rekrutment -" . $jrr;
						} else if ($row['type_replace'] == 3) {
							$ghj = "No Rekrutment (Existing) -" . $jrr;
						} else {
							$ghj = "Rekrutment -" . $jrr;
						}
					} else {
						if ($row['type_replace'] == 1) {
							$ghj = "No Rekrutment";
						} else if ($row['type_replace'] == 3) {
							$ghj = "No Rekrutment (Existing) -" . $jrr;
						} else {
							$ghj = "Rekrutment";
						}
					}
				}


				if ($row['lup_edit'] != null && $row['lup_edit'] != '') {
					$tglcr = $row['lup_edit'];
				} else {
					$tglcr = $row['tanggal'];
				}


				if ($row['jml_hire'] != '' or $row['jml_hire'] != null) {
					if ($row['type_jo'] == 1) {
						$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>" . $row['jml_hire'] . "</a></td>";
					} else {
						$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $row['jml_hire'] . "</a></td>";
					}
				} else {
					if ($row['type_jo'] == 1) {
						$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>0</a></td>";
					} else {
						$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
					}
				}


				if (($level == 3) || ($level == 15)) {
					$output['data'][] = array(
						$row['id'],
						//"<td><a href='". base_url() . 'index.php/home/integrated' . '/'  . $row['id'] . '/' . $row['jumlah'] . '/' . $gg ."'>".$row['nojo']."</td></a>",
						$row['nojo'],
						// $row['tanggal'],
						$tglcr,
						$row['upd'],
						$row['lama'] . ' bulan',
						$abc,
						// $row['ntype'],
						$koiu,
						// $ppk,
						$ghj,
						$cde,
						$row['bekerja'],
						$fgh,
						$qwq,
						$xxy,
						//$row['jumlah'],  
						//$row['hr'],
						//$row['jmluser'], 
						//$row['rekrut'],

						// $wa,
						// $wd,						
						// $wb,
						// $wc,

						$row['ket_rekrut'],
						//$row['note'],
						$row['komentar'],
						$row['gender'],
						$row['ket_cancel'],
						$row['ket_rej'],
						$row['upd'],
						$row['ket_rekrut'],
						//base_url().'public/uploads/'.$row['file']
						$m3m
					);
				} else {
					$output['data'][] = array(
						$row['id'],
						$row['nojo'],
						$row['tanggal'],
						$row['upd'],
						$row['lama'] . ' bulan',
						$abc,
						// $row['ntype'],
						$koiu,
						// $ppk,
						$ghj,
						$cde,
						$row['bekerja'],
						$fgh,
						$qwq,
						$xxy,
						//$row['jumlah'], 
						//$row['hr'],
						//$row['training'],						
						//$row['jmluser'],
						//$row['rekrut'],
						//$row['note'],

						// $ab,
						// $ac,
						// $ad,
						// $ae,

						$af,
						/*
						$wa,
						$wd,						
						$wb,
						$wc,
						$af,
						*/
						$row['komentar'],
						$row['gender'],
						$row['ket_cancel'],
						$row['ket_rej'],
						$row['upd'],
						$row['ket_rekrut'],
						//base_url().'public/uploads/'.$row['file']
						$m3m
					);
				}

				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	/*
	public function data_listorder3dup()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)){
			$postparam = $this->input->post();

			$parsearch	= array (
				"status"	=> $postparam['0']['value']
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
			
			if($level == '2')
			{
				if($regional=='1')
				{
					//$data['transjo'] 	= $this->job_model->get_transall_approval_ops($username);
					//$data['transjos'] 	= $this->job_model->get_transall_sap_sk_app_ops($username);
					$data =  $this->job_model->get_listorder21($length,$start,$search,$order,$dir);
				}
				else
				{
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					$lalalili =  $q_cek_pmanar->jml;
					if( ($q_cek_pmanar->jml) <= 0 ) 
					{
						//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
						//$data['transjos'] = $this->job_model->get_transall_sap_sk_app($daud,$jbt);
						$data =  $this->job_model->get_listorder20($length,$start,$search,$order,$dir);
					}
					else
					{
						//$data['transjo'] = $this->job_model->get_transall_manar_2($data['username']);
						//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar_2($data['username']);
						$data =  $this->job_model->get_listorder20_2($length,$start,$search,$order,$dir);
					}
				}
			}
			else if($level == '1')
			{
				//$data['transjo'] = $this->job_model->get_transall_craeter($username);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_creater($username);
				$data =  $this->job_model->get_listorder1($length,$start,$search,$order,$dir);
			}
			else if( ($level == '3') || ($level == '15') )
			{
				//$data['transjo'] = $this->job_model->get_transall_rekrut($daud);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder3($length,$start,$search,$order,$dir,$parsearch);
			}
			else if($level == '4')
			{
				//$data['transjo'] = $this->job_model->get_transall_manar($data['username']);
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder4($length,$start,$search,$order,$dir);
			}
			else
			{
				//$data['transjo'] = $this->job_model->get_transall();
				//$data['transjos'] = $this->job_model->get_transall_sap_sk_manar($data['username']);
				$data =  $this->job_model->get_listorder_lain($length,$start,$search,$order,$dir);
			}
			
			
			//var_dump($data);exit();
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				if($level == '4') 
				{
						if ($row['flag_app'] == 1) {
							$btn = 'Approved MANAR';
							$stat = 'btn-success';
						} elseif ($row['flag_app'] == 2) {
							$btn = 'Rejected MANAR';
							$stat = 'btn-danger';
						} else {
							$btn = 'Approve';
							$stat = 'btn-warning';
						}
						
				}
				else if($level == '2') 
				{
						if($regional == '1') 
						{
							if ($row['flag_app'] == 1) {
								$btn = 'Approved MANAR';
								$stat = 'btn-success';
							} elseif ($row['flag_app'] == 2) {
								$btn = 'Rejected MANAR';
								$stat = 'btn-danger';
							} else {
								$btn = 'Waiting Approval MANAR';
								$stat = 'btn-warning';
							}
						}
						else
						{
							if($lalalili <= '0')
							{
								if ($row['flag_app'] == 1) {
									$btn = 'Approved MANAR';
									$stat = 'btn-success';
								} elseif ($row['flag_app'] == 2) {
									$btn = 'Rejected MANAR';
									$stat = 'btn-danger';
								} else {
									$btn = 'Waiting Approval MANAR';
									$stat = 'btn-warning';
								}
							}
							else
							{
								if ($row['flag_app'] == 1) {
									$btn = 'Approved MANAR';
									$stat = 'btn-success';
								} elseif ($row['flag_app'] == 2) {
									$btn = 'Rejected MANAR';
									$stat = 'btn-danger';
								} else {
									$btn = 'Approve';
									$stat = 'btn-warning';
								}
							}
							
							
						}
				}
				else 
				{
						if ($row['flag_app'] == 1) {
							$btn = 'Approved MANAR';
							$stat = 'btn-success';
						} elseif ($row['flag_app'] == 2) {
							$btn = 'Rejected MANAR';
							$stat = 'btn-danger';
						} else {
							$btn = 'Waiting Approval MANAR';
							$stat = 'btn-warning';
						}
				} 	


				if($row['type_jo']==2){
					$abc = '-';
				} else {
					if($row['n_project']!='')
					{
						$abc = $row['n_project'];
					}
					else
					{
						$abc = $row['project'];
					}
				} 
				
				if(!filter_var($row['lokasi'], FILTER_SANITIZE_STRING)) 
				{    
					$cde = $row['lokasi']; 
				} 
				else 
				{    
					$cde = $row['city_name'];   
				}  
				
				if($row['type_jo']==2){
					$fgh = $row['ntype'];
				} else {
					if(!filter_var($row['jabatan'], FILTER_VALIDATE_INT)) 
					{    
						$fgh = $row['jabatan'] . "(". $row['gender'] .") ";
					} 
					else 
					{    
						$fgh = $row['name_job_function'] ."(". $row['gender'] .") ";
					} 
				}
				
				
				if($level==3)
				{
					if($row['flag_cancel']=='1') 
					{
						$ttt = '<button type="button" class="btn btn-danger btn-block btn-xs btnholded" onclick="javascript:bhold(\''.$row['ket_cancel'].'\');" id="btnholded" data-toggle="modal" data-target="#EVModal">Canceled SAP</button>';
					}
					else
					{
						$ttt = '';
					}
					
					if($row['flag_cancel_sap']=='1')
					{
						$uuu = '<button type="button" class="btn btn-danger btn-block btn-xs btnholded" onclick="javascript:bhold(\''.$row['ket_cancel'].'\');" id="btnholded" data-toggle="modal" data-target="#EVModal">Canceled SAP</button>';
					}
					else
					{
						$uuu = '';
					}
					
					
					if( ($row['flag_jobs']!=1) || ($row['flag_jobs']==null) ) 
					{
						if($row['status_rekrut']==1) 
						{
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">Hold</button>';
							$jkl = '';
						}
						else if($row['status_rekrut']==2) 
						{
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">Done</button>';
							$jkl = '';
						}
						else
						{
								$www = '<button type="button" class="btn btn-warning btn-block btn-xs btnedit" onclick="javascript:edit(\''.$row['nojo'].'\',\''.$row['id'].'\',\''.$fgh.'\',\''.$row['gender'].'\',\''.$cde.'\',\''.$row['jumlah'].'\',\''.$row['rekrut'].'\');" id="btnedit" data-toggle="modal" data-target="#EModal">ADD</button>';
								$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
								$jkl = "<a href='". base_url() . 'index.php/mapping/input_hiring' . '/'  . $row['id'] ."' style='color:red;'><button type='button' class='btn bg-maroon btn-block btn-xs' style='margin-top:5px; margin-bottom:5px;'>Hiring</button></a>";
						}
						$yyy = '';
					}
					else
					{
						if($row['status_rekrut']==1) 
						{
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">Hold</button>';
							$jkl = '';
						}
						else if($row['status_rekrut']==2) 
						{
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">Done</button>';
							$jkl = '';
						}
						else
						{
								$www = '<button type="button" class="btn btn-warning btn-block btn-xs btnedit" onclick="javascript:edit(\''.$row['nojo'].'\',\''.$row['id'].'\',\''.$fgh.'\',\''.$row['gender'].'\',\''.$cde.'\',\''.$row['jumlah'].'\',\''.$row['rekrut'].'\');" id="btnedit" data-toggle="modal" data-target="#EModal">ADD</button>';
								$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\''.$row['id'].'\',\''.$row['ket_rekrut'].'\',\''.$row['status_rekrut'].'\');" id="btnpros" data-toggle="modal" data-target="#MModal">OnProgress</button>';
								$jkl = "<a href='". base_url() . 'index.php/mapping/input_hiring' . '/'  . $row['id'] ."' style='color:red;'><button type='button' class='btn bg-maroon btn-block btn-xs' style='margin-top:5px; margin-bottom:5px;'>Hiring</button></a>";
						}
						$yyy = '';
					}
				}
				else
				{
					$abcde = 'sap';
					if($row['flag_cancel']=='1') 
					{
						$pap = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bhold(\"".$row['ket_cancel']."\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>";
						
						if ($level == '1'){
							$pip = "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
						} 
						else
						{
							$pip = "";
						}
					} 
					else if($row['flag_cancel_sap']=='1')
					{
						$pap = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bhold(\"".$row['ket_cancel']."\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>";
						
						if ($level == '1'){
							$pip = "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
						}
						else if ($level == 2)
						{
							if($regional==1)
							{
								$pip = "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
							}
							else
							{
								$pip = "";
							}
						}
						else
						{
							$pip = "";
						}
					}
					else
					{
						$pap = '<button type="button" class="btn '. $stat .' btn-block btn-xs btnapz" onclick="javascript:bappz(\''.$row['nojo'].'\',\''.$btn.'\',\''.$row['ket_rej'].'\',\''.$row['upd'].'\',\''.$row['ntype'].'\',\''.$row['id'].'\');" id="btnapz" data-toggle="modal" data-target="#AmyModal">' . $btn . '</button>';
						$pip = "";
					}
				}
				
				
				if($level==3)
				{
					$m3m = '<td><button type="button" class="btn btn-primary btn-block btn-xs btndetail" onclick="javascript:detail(\''.$row['nojo'].'\', \''.$btn.'\', \''.$row['id'].'\', \''.$row['ket_rej'].'\', \''.$row['ket_cancel'].'\', \''.$row['upd'].'\',\''.$row['ntype'].'\');" id="btndetail" data-toggle="modal" data-target="#AVXmyModal">Detail</button> '.$vvv.' '.$yyy.' </td>';
				}
				else
				{
					if($row['type_jo']==2){
						$m3m = '<td><button type="button" class="btn '. $stat .' btn-block btn-xs btndetail" onclick="javascript:detailx(\''.$row['nojo'].'\', \''.$btn.'\', \''.$row['id'].'\', \''.$row['ket_rej'].'\', \''.$row['ket_cancel'].'\', \''.$row['upd'].'\',\''.$row['ntype'].'\');" id="btndetail" data-toggle="modal" data-target="#VXmyModal">' . $btn . '</button> '.$pip.' </td>';
					} else {
						$m3m = '<td><button type="button" class="btn '. $stat .' btn-block btn-xs btndetail" onclick="javascript:detaily(\''.$row['nojo'].'\', \''.$btn.'\', \''.$row['id'].'\', \''.$row['ket_rej'].'\', \''.$row['ket_cancel'].'\', \''.$row['upd'].'\',\''.$row['ntype'].'\');" id="btndetail" data-toggle="modal" data-target="#LmyModal">' . $btn . '</button> '.$pip.' </td>';
					} 
				}
				
				
				if($row['hr']=='')
				{
					$wa = '<td><a href="#" onclick="javascript:add_hr(\''.$row['id'].'\',\''.$row['jumlah'].'\',\''.$row['gender'].'\',\''.$row['pendidikan'].'\',\''.$cde.'\',\'hr\',\''.$row['hr'].'\');" id="btnhr" data-toggle="modal" data-target="#VmyModal">0</td></a>';
				}
				else
				{
					$wa = '<td><a href="#" onclick="javascript:add_hr(\''.$row['id'].'\',\''.$row['jumlah'].'\',\''.$row['gender'].'\',\''.$row['pendidikan'].'\',\''.$cde.'\',\'hr\',\''.$row['hr'].'\');" id="btnhr" data-toggle="modal" data-target="#VmyModal">'.$row['hr'].'</td></a>';
				}
				 
				if($row['training']=='')
				{
					$wd = '<td><a href="#" onclick="javascript:add_hr(\''.$row['id'].'\',\''.$row['jumlah'].'\',\''.$row['gender'].'\',\''.$row['pendidikan'].'\',\''.$cde.'\',\'training\',\''.$row['training'].'\');" id="btnuser" data-toggle="modal" data-target="#VmyModal">0</td></a>';
				}
				else
				{
					$wd = '<td><a href="#" onclick="javascript:add_hr(\''.$row['id'].'\',\''.$row['jumlah'].'\',\''.$row['gender'].'\',\''.$row['pendidikan'].'\',\''.$cde.'\',\'training\',\''.$row['training'].'\');" id="btnuser" data-toggle="modal" data-target="#VmyModal">'.$row['training'].'</td></a>';
				}
				
				if($row['jmluser']=='')
				{
					$wb = '<td><a href="#" onclick="javascript:add_hr(\''.$row['id'].'\',\''.$row['jumlah'].'\',\''.$row['gender'].'\',\''.$row['pendidikan'].'\',\''.$cde.'\',\'user\',\''.$row['jmluser'].'\');" id="btnuser" data-toggle="modal" data-target="#VmyModal">0</td></a>';
				}
				else
				{
					$wb = '<td><a href="#" onclick="javascript:add_hr(\''.$row['id'].'\',\''.$row['jumlah'].'\',\''.$row['gender'].'\',\''.$row['pendidikan'].'\',\''.$cde.'\',\'user\',\''.$row['jmluser'].'\');" id="btnuser" data-toggle="modal" data-target="#VmyModal">'.$row['jmluser'].'</td></a>';
				}
				
				if($row['rekrut']=='')
				{
					$wc = '<td><a href="#" onclick="javascript:add_hr(\''.$row['id'].'\',\''.$row['jumlah'].'\',\''.$row['gender'].'\',\''.$row['pendidikan'].'\',\''.$cde.'\',\'rekrut\',\''.$row['rekrut'].'\');" id="btnrekrut" data-toggle="modal" data-target="#VmyModal">0</td></a>';
				}
				else
				{
					$wc = '<td><a href="#" onclick="javascript:add_hr(\''.$row['id'].'\',\''.$row['jumlah'].'\',\''.$row['gender'].'\',\''.$row['pendidikan'].'\',\''.$cde.'\',\'rekrut\',\''.$row['rekrut'].'\');" id="btnrekrut" data-toggle="modal" data-target="#VmyModal">'.$row['rekrut'].'</td></a>';
				}
				
				
				if($row['type_jo']==2){
					$qwq = '-';
				} else {
					$qwq = $row['jumlah'];
				} 
				
				if($row['type_jo']==2){
					$ab = '-';
				} else {
					$ab = $row['hr'];
				} 
				
				if($row['type_jo']==2){
					$ac = '-';
				} else {
					$ac = $row['training'];
				} 
				
				if($row['type_jo']==2){
					$ad = '-';
				} else {
					$ad = $row['jmluser'];
				} 
				
				if($row['type_jo']==2){
					$ae = '-';
				} else {
					$ae = $row['rekrut'];
				} 
				
				if($row['type_jo']==2){
					$af = '-';
				} else {
					$af = $row['note'];
				}
				
				
				if( ($level==3) || ($level==15) )
				{
					$output['data'][]=array( 
						$row['id'],					
						//"<td><a href='". base_url() . 'index.php/home/integrated' . '/'  . $row['id'] . '/' . $row['jumlah'] . '/' . $gg ."'>".$row['nojo']."</td></a>",
						$row['nojo'],
						$row['upd'],
						$abc,
						$row['ntype'],
						$cde,
						$row['bekerja'],
						$fgh,
						$qwq,
						$wa,
						$wd,						
						$wb,
						$wc,
						$row['ket_rekrut'],
						$row['komentar'],
						$row['gender'],
						$row['ket_cancel'],
						$row['ket_rej'],
						$row['upd'],
						$row['ket_rekrut'],
						$m3m
					);
				}
				else
				{
					$output['data'][]=array( 
						$row['id'],					
						$row['nojo'],
						$row['upd'],
						$abc,
						$row['ntype'],
						$cde,
						$row['bekerja'],
						$fgh,
						$qwq,
						$ab,
						$ac,
						$ad,
						$ae,
						$af,
						$row['komentar'],
						$row['gender'],
						$row['ket_cancel'],
						$row['ket_rej'],
						$row['upd'],
						$row['ket_rekrut'],
						$m3m
					);
				}
				
				$nomor_urut++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}
	*/



	public function data_listorder_sap()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"carhire"       => $postparam['carhire'],
				"cardone"       => $postparam['cardone'],
				"carpm"       	=> $postparam['carpm'],
				"carpro"       	=> $postparam['carpro'],
				"carlok"       	=> $postparam['carlok'],
				"carnoj"       	=> $postparam['carnoj'],
				"carzpar"       => $postparam['carzpar'],
				"carcreat"      => $postparam['carcreat'],
				"carnobak"      => $postparam['carnobak'],
				"cartglcr"      => $postparam['cartglcreat'],
				"cartglbek"     => $postparam['cartglbek']
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


			$data = $this->job_model->newget_transall_sap_2($length, $start, $search, $order, $dir, $parsearch);
			// if($session['type']=='PPC'){
			// $data = $this->job_model->newget_transall_sap_2($length,$start,$search,$order,$dir,$parsearch);
			// } else if($session['type']=='PM'){
			// $data = $this->job_model->newget_transall_sap_pm($length,$start,$search,$order,$dir,$parsearch);
			// }

			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_zparam');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$nnn = json_decode($this->curl->execute());
			$mmm = $nnn->ZPARAMETER;

			$kkk = substr("" . $mmm . "", 0, 1);

			$nor = substr($mmm, 1, 9);

			$next 			= intval($nor) + 1;
			$xnext 			= $this->hitung_param($next);
			$zparam 		= $kkk . $xnext;


			// var_dump($zparam);exit();
			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				if ($session['type'] == 'PPC' or $session['type'] == 'AVP' or $session['type'] == 'VP') {
					if ($row['rstatus_rekrut'] == 4) {
						$btn = 'Stop Fulfilled';
						$stat = 'btn-info';
						$tglstat = $row['lup_skema'];
						$tglstat_yes = $row['lup_skema'];
					} else if ($row['rstatus_rekrut'] == 3) {
						$btn = 'Stop Not Fulfilled';
						$stat = 'btn-info';
						$tglstat = $row['lup_skema'];
						$tglstat_yes = $row['lup_skema'];
					} else {
						if (($row['skema'] == 1) || ($row['skemax'] == 1)) {
							$btn = 'Done';
							$stat = 'btn-success';
							$tglstat = $row['lup_skema'];
							$tglstat_yes = $row['lup_skema'];
						} else {
							$tglstat_yes = '';
							if ($row['flag_cancel'] == '1') {
								$btn = 'Canceled';
								$stat = 'btn-danger';
								$tglstat = $row['lup_cancel_skema'];
							} else if ($row['flag_cancel_sap'] == '1') {
								$btn = 'Canceled';
								$stat = 'btn-danger';
								$tglstat = $row['lup_cancel_skema'];
							} else if ($row['flag_cancel_sap'] == '2') {
								$btn = 'Return';
								$stat = 'btn-danger';
								$tglstat = $row['lup_cancel_skema'];
							} else {
								$btn = 'OnProgress';
								$stat = 'btn-warning';
								$tglstat = $row['lup_cancel_skema'];
							}
						}
					}
				} else {
					$btn = 'Detail';
					$stat = 'btn-info';
					$tglstat = $row['lup_skema'];
					$tglstat_yes = $row['lup_skema'];
				}

				if ($row['flag_done_pm'] == '1') {
					$btn_pm  		= 'Done';
					$stat_pm_ppc  	= $row['nuserpm'] . "<br>status slot posisi : (<a href='' onclick='javascript:ceket_pm(\"" . $row['ket_done_pm'] . "\");' id='btncek' data-toggle='modal' data-target='#Modal_cekpm'>Done</a>)";
					$stat_pm 		= 'btn-success';
				} else {
					$btn_pm  		= 'OnProgress';
					if ($row['nuserpm'] == '') {
						$stat_pm_ppc  	= "";
					} else {
						$stat_pm_ppc  	= $row['nuserpm'] . '<br>status slot posisi : (OnProgress)';
					}
					$stat_pm 		= 'btn-warning';
				}

				/*
				if ($row['skema'] == 0){
					$btn = 'OnProgress';
					$stat = 'btn-warning';
				} elseif ($row['skema'] == 1) {
					$btn = 'Done';
					$stat = 'btn-success';
				} 	
				*/

				if (($row['n_project'] != '') && ($row['n_project'] != 'Pilih')) {
					$abc = $row['n_project'];
				} else {
					if ($row['project'] != '') {
						$abc = $row['project'];
					} else {
						$abc = '';
					}
				}


				if (!filter_var($row['jabatan'], FILTER_VALIDATE_INT)) {
					$def = $row['jabatan'];
				} else {
					$def = $row['name_job_function'];
				}


				if ((strpos($row['project'], '(PERALIHAN)') != false) || (strpos($row['project'], '(peralihan)') != false) || (strpos($row['project'], '( PERALIHAN )') != false)) {
					$drt = 'INF';
				} else {
					$drt = 'ISH';
				}


				//var_dump($row['level_sap']);
				$cuk = 'lv5';
				$kont = json_encode($row['bket_done']);
				$kont2 = json_encode($row['ket_cancel']);
				$pnorek = json_encode($row['perner_norekrut']);
				// $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
				// $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
				// $kont2Y = str_replace($escapers, $replacements, $value);
				//if($row['skema']==1)

				// var_dump($row['id']);
				// var_dump($row['nojo']);
				// var_dump($kont);
				// var_dump(project);
				// var_dump($row['id']);
				// var_dump($row['id']);
				// var_dump($row['id']);
				// var_dump($row['id']);

				if($row['legalitas'] == 1){
					$legalitas = "PKS";
				}else if($row['legalitas'] == 2){				
					$legalitas = "Amandamen";
				}else if($row['legalitas'] == 3){				
					$legalitas = "Addendum";
				}else if($row['legalitas'] == 4){				
					$legalitas = "MOU";
				}else{
					$legalitas = "Tidak ada permintaan legalitas.";
				}

				// var_dump($legalitas);die;

				if (($row['skema'] == 1) || ($row['skemax'] == 1)) {
					$aaa = "<button type='button' class='btn daud btn-block btn-xs btndok' onclick='javascript:bdok(\"" . $row['nojo'] . "\");' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>";
					$bbb = "";
					//$ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\",\"".$zparam."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
					//$ghgh = json_encode($row['level_sap']);
					if ($row['type_jo'] == 2) {
						$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\"," . $kont . ",\"" . $row['project'] . "\",\"" . $row['n_project'] . "\",\"" . $row['lokasi'] . "\",\"" . $row['lokasix'] . "\",\"" . $btn . "\",\"" . $zparam . "\",\"" . $row['jabatan'] . "\",\"" . $row['skilllayanan'] . "\"," . $kont2 . ", \"" . $row['type_jo'] . "\", \"" . $cuk . "\", \"" . $row['ntype'] . "\", \"" . $row['dnama'] . "\", \"" . $row['alev'] . "\", \"" . $row['level_sap'] . "\", \"" . $row['persa_sap'] . "\", \"" . $row['skill_sap'] . "\", \"" . $row['area_sap'] . "\", \"" . $row['jabatan_sap'] . "\", \"" . $row['skema_sap'] . "\", \"" . $row['abkrs_sap'] . "\", \"" . $row['jenis_pro_sap'] . "\", \"" . $row['kontrak'] . "\", \"" . $row['detail_komp'] . "\", \"" . $drt . "\", \"" . $row['type_rekrut'] . "\", \"" . $row['perner_norekrut'] . "\", \"" . $row['nreason'] . "\", \"" . $session['type'] . "\", \"" . $session['username'] . "\", \"" . $row['pilpks'] . "\", \"" . $row['dokpks'] . "\", \"" . $row['divisiid'] . "\", \"" . $legalitas . "\");' id='btnadd' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button>";
					} else {
						$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\"," . $kont . ",\"" . $row['project'] . "\",\"" . $row['n_project'] . "\",\"" . $row['lokasi'] . "\",\"" . $row['lokasix'] . "\",\"" . $btn . "\",\"" . $zparam . "\",\"" . $row['jabatan'] . "\",\"" . $row['skilllayanan'] . "\"," . $kont2 . ", \"" . $row['type_jo'] . "\", \"" . $cuk . "\", \"" . $row['ntype'] . "\", \"" . $row['dnama'] . "\", \"" . $row['alev'] . "\", \"" . $row['level_sap'] . "\", \"" . $row['persa_sap'] . "\", \"" . $row['skill_sap'] . "\", \"" . $row['area_sap'] . "\", \"" . $row['jabatan_sap'] . "\", \"" . $row['skema_sap'] . "\", \"" . $row['abkrs_sap'] . "\", \"" . $row['jenis_pro_sap'] . "\", \"" . $row['kontrak'] . "\", \"" . $row['detail_komp'] . "\", \"" . $drt . "\", \"" . $row['type_rekrut'] . "\", \"" . $row['perner_norekrut'] . "\", \"" . $row['nreason'] . "\", \"" . $session['type'] . "\", \"" . $session['username'] . "\", \"" . $row['pilpks'] . "\", \"" . $row['dokpks'] . "\", \"" . $row['divisiid'] . "\", \"" . $legalitas . "\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
					}
					$ddd = "";
				} else {
					$aaa = "<button type='button' class='btn daud btn-block btn-xs btndok' onclick='javascript:bdok(\"" . $row['nojo'] . "\");' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>";

					if ($row['flag_cancel'] == '1') {
						$bbb = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bdok(" . $kont2 . ");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>";
						//$ccc = "";
						//$ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\",\"".$zparam."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
						if ($row['type_jo'] == 2) {
							$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\"," . $kont . ",\"" . $row['project'] . "\",\"" . $row['n_project'] . "\",\"" . $row['lokasi'] . "\",\"" . $row['lokasix'] . "\",\"" . $btn . "\",\"" . $zparam . "\",\"" . $row['jabatan'] . "\",\"" . $row['skilllayanan'] . "\"," . $kont2 . ", \"" . $row['type_jo'] . "\", \"" . $cuk . "\", \"" . $row['ntype'] . "\", \"" . $row['dnama'] . "\", \"" . $row['alev'] . "\", \"" . $row['level_sap'] . "\", \"" . $row['persa_sap'] . "\", \"" . $row['skill_sap'] . "\", \"" . $row['area_sap'] . "\", \"" . $row['jabatan_sap'] . "\", \"" . $row['skema_sap'] . "\", \"" . $row['abkrs_sap'] . "\", \"" . $row['jenis_pro_sap'] . "\", \"" . $row['kontrak'] . "\", \"" . $row['detail_komp'] . "\", \"" . $drt . "\", \"" . $row['type_rekrut'] . "\", \"" . $row['perner_norekrut'] . "\", \"" . $row['nreason'] . "\", \"" . $session['type'] . "\", \"" . $session['username'] . "\", \"" . $row['pilpks'] . "\", \"" . $row['dokpks'] . "\", \"" . $row['divisiid'] . "\", \"" . $legalitas . "\");' id='btnadd' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button>";
						} else {
							$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\"," . $kont . ",\"" . $row['project'] . "\",\"" . $row['n_project'] . "\",\"" . $row['lokasi'] . "\",\"" . $row['lokasix'] . "\",\"" . $btn . "\",\"" . $zparam . "\",\"" . $row['jabatan'] . "\",\"" . $row['skilllayanan'] . "\"," . $kont2 . ", \"" . $row['type_jo'] . "\", \"" . $cuk . "\", \"" . $row['ntype'] . "\", \"" . $row['dnama'] . "\", \"" . $row['alev'] . "\", \"" . $row['level_sap'] . "\", \"" . $row['persa_sap'] . "\", \"" . $row['skill_sap'] . "\", \"" . $row['area_sap'] . "\", \"" . $row['jabatan_sap'] . "\", \"" . $row['skema_sap'] . "\", \"" . $row['abkrs_sap'] . "\", \"" . $row['jenis_pro_sap'] . "\", \"" . $row['kontrak'] . "\", \"" . $row['detail_komp'] . "\", \"" . $drt . "\", \"" . $row['type_rekrut'] . "\", \"" . $row['perner_norekrut'] . "\", \"" . $row['nreason'] . "\", \"" . $session['type'] . "\", \"" . $session['username'] . "\", \"" . $row['pilpks'] . "\", \"" . $row['dokpks'] . "\", \"" . $row['divisiid'] . "\", \"" . $legalitas . "\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
						}
						$ddd = "";
					} else if ($row['flag_cancel_sap'] == '1' || $row['flag_cancel_sap'] == '2') {
						$bbb = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bdok(" . $kont2 . ");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>";
						//$ccc = "";
						//$ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\",\"".$zparam."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
						if ($row['type_jo'] == 2) {
							$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\"," . $kont . ",\"" . $row['project'] . "\",\"" . $row['n_project'] . "\",\"" . $row['lokasi'] . "\",\"" . $row['lokasix'] . "\",\"" . $btn . "\",\"" . $zparam . "\",\"" . $row['jabatan'] . "\",\"" . $row['skilllayanan'] . "\"," . $kont2 . ", \"" . $row['type_jo'] . "\", \"" . $cuk . "\", \"" . $row['ntype'] . "\", \"" . $row['dnama'] . "\", \"" . $row['alev'] . "\", \"" . $row['level_sap'] . "\", \"" . $row['persa_sap'] . "\", \"" . $row['skill_sap'] . "\", \"" . $row['area_sap'] . "\", \"" . $row['jabatan_sap'] . "\", \"" . $row['skema_sap'] . "\", \"" . $row['abkrs_sap'] . "\", \"" . $row['jenis_pro_sap'] . "\", \"" . $row['kontrak'] . "\", \"" . $row['detail_komp'] . "\", \"" . $drt . "\", \"" . $row['type_rekrut'] . "\", \"" . $row['perner_norekrut'] . "\", \"" . $row['nreason'] . "\", \"" . $session['type'] . "\", \"" . $session['username'] . "\", \"" . $row['pilpks'] . "\", \"" . $row['dokpks'] . "\", \"" . $row['divisiid'] . "\", \"" . $legalitas . "\");' id='btnadd' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button>";
						} else {
							$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\"," . $kont . ",\"" . $row['project'] . "\",\"" . $row['n_project'] . "\",\"" . $row['lokasi'] . "\",\"" . $row['lokasix'] . "\",\"" . $btn . "\",\"" . $zparam . "\",\"" . $row['jabatan'] . "\",\"" . $row['skilllayanan'] . "\"," . $kont2 . ", \"" . $row['type_jo'] . "\", \"" . $cuk . "\", \"" . $row['ntype'] . "\", \"" . $row['dnama'] . "\", \"" . $row['alev'] . "\", \"" . $row['level_sap'] . "\", \"" . $row['persa_sap'] . "\", \"" . $row['skill_sap'] . "\", \"" . $row['area_sap'] . "\", \"" . $row['jabatan_sap'] . "\", \"" . $row['skema_sap'] . "\", \"" . $row['abkrs_sap'] . "\", \"" . $row['jenis_pro_sap'] . "\", \"" . $row['kontrak'] . "\", \"" . $row['detail_komp'] . "\", \"" . $drt . "\", \"" . $row['type_rekrut'] . "\", \"" . $row['perner_norekrut'] . "\", \"" . $row['nreason'] . "\", \"" . $session['type'] . "\", \"" . $session['username'] . "\", \"" . $row['pilpks'] . "\", \"" . $row['dokpks'] . "\", \"" . $row['divisiid'] . "\", \"" . $legalitas . "\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
						}
						$ddd = "";
					} else {
						$bbb = "";
						//$ccc = "<button type='button' class='btn ". $stat ." btn-block btn-xs btnadd' onclick='javascript:badd(\"".$row['id']."\",\"".$row['nojo']."\",\"".$row['bket_done']."\",\"".$row['project']."\",\"".$row['n_project']."\",\"".$row['lokasi']."\",\"".$row['lokasix']."\",\"".$btn."\",\"".$zparam."\",\"".$row['jabatan']."\",\"".$row['skilllayanan']."\",\"".$row['ket_cancel']."\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
						if ($row['type_jo'] == 2) {
							$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\"," . $kont . ",\"" . $row['project'] . "\",\"" . $row['n_project'] . "\",\"" . $row['lokasi'] . "\",\"" . $row['lokasix'] . "\",\"" . $btn . "\",\"" . $zparam . "\",\"" . $row['jabatan'] . "\",\"" . $row['skilllayanan'] . "\"," . $kont2 . ", \"" . $row['type_jo'] . "\", \"" . $cuk . "\", \"" . $row['ntype'] . "\", \"" . $row['dnama'] . "\", \"" . $row['alev'] . "\", \"" . $row['level_sap'] . "\", \"" . $row['persa_sap'] . "\", \"" . $row['skill_sap'] . "\", \"" . $row['area_sap'] . "\", \"" . $row['jabatan_sap'] . "\", \"" . $row['skema_sap'] . "\", \"" . $row['abkrs_sap'] . "\", \"" . $row['jenis_pro_sap'] . "\", \"" . $row['kontrak'] . "\", \"" . $row['detail_komp'] . "\", \"" . $drt . "\", \"" . $row['type_rekrut'] . "\", \"" . $row['perner_norekrut'] . "\", \"" . $row['nreason'] . "\", \"" . $session['type'] . "\", \"" . $session['username'] . "\", \"" . $row['pilpks'] . "\", \"" . $row['dokpks'] . "\", \"" . $row['divisiid'] . "\", \"" . $legalitas . "\");' id='btnadd' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button>";
						} else {
							// var_dump($row['id']);var_dump($kont);var_dump($row['project']);var_dump($row['n_project']);var_dump($row['lokasi']);var_dump($zparam);var_dump($kont2);die;
							$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\"," . $kont . ",\"" . $row['project'] . "\",\"" . $row['n_project'] . "\",\"" . $row['lokasi'] . "\",\"" . $row['lokasix'] . "\",\"" . $btn . "\",\"" . $zparam . "\",\"" . $row['jabatan'] . "\",\"" . $row['skilllayanan'] . "\"," . $kont2 . ", \"" . $row['type_jo'] . "\", \"" . $cuk . "\", \"" . $row['ntype'] . "\", \"" . $row['dnama'] . "\", \"" . $row['alev'] . "\", \"" . $row['level_sap'] . "\", \"" . $row['persa_sap'] . "\", \"" . $row['skill_sap'] . "\", \"" . $row['area_sap'] . "\", \"" . $row['jabatan_sap'] . "\", \"" . $row['skema_sap'] . "\", \"" . $row['abkrs_sap'] . "\", \"" . $row['jenis_pro_sap'] . "\", \"" . $row['kontrak'] . "\", \"" . $row['detail_komp'] . "\", \"" . $drt . "\", \"" . $row['type_rekrut'] . "\", \"" . $row['perner_norekrut'] . "\", \"" . $row['nreason'] . "\", \"" . $session['type'] . "\", \"" . $session['username'] . "\", \"" . $row['pilpks'] . "\", \"" . $row['dokpks'] . "\", \"" . $row['divisiid'] . "\", \"" . $legalitas . "\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
						}
						$ddd = "<button type='button' class='btn btn-success btn-block btn-xs btnhold' onclick='javascript:bhold(\"" . $row['nojo'] . "\");' id='btnhold' data-toggle='modal' data-target='#EZModal'>Cancel</button>";
					}
				}

				if ($row['type_jo'] == 1) {
					if ($row['type_new'] == 1) {
						if ($row['type_rekrut'] == '' and $row['type_rekrut'] == null) {
							if ($row['rekrutx'] == 1) {
								$ghj = "New Project - No Rekrutment";
							} else if ($row['rekrutx'] == 3) {
								$ghj = "New Project - No Rekrutment (Existing)";
							} else {
								$ghj = "New Project - Rekrutment";
							}
						} else {
							if ($row['type_rekrut'] == 1) {
								$ghj = "New Project - No Rekrutment";
							} else if ($row['type_rekrut'] == 3) {
								$ghj = "New Project - No Rekrutment (Existing)";
							} else {
								$ghj = "New Project - Rekrutment";
							}
						}
					} else {
						if ($row['type_rekrut'] == '' and $row['type_rekrut'] == null) {
							if ($row['rekrutx'] == 1) {
								$ghj = "New Pengembangan - No Rekrutment";
							} else if ($row['rekrutx'] == 3) {
								$ghj = "New Pengembangan - No Rekrutment (Existing)";
							} else {
								$ghj = "New Pengembangan - Rekrutment";
							}
						} else {
							if ($row['type_rekrut'] == 1) {
								$ghj = "New Pengembangan - No Rekrutment";
							} else if ($row['type_rekrut'] == 3) {
								$ghj = "New Pengembangan - No Rekrutment (Existing)";
							} else {
								$ghj = "New Pengembangan - Rekrutment";
							}
						}
					}
				} else {
					if ($row['rotasi_resign'] != '') {
						if ($row['rotasi_resign'] == '2') {
							$jrr = 'Rotasi/Mutasi';
						} elseif ($row['rotasi_resign'] == '1') {
							$jrr = 'Resign';
						} else {
							$jrr = 'Data Lama';
						}
						if ($row['type_rekrut'] == '' and $row['type_rekrut'] == null) {
							if ($row['type_replace'] == 1) {
								$ghj = $row['ntype'] . " - No Rekrutment -" . $jrr;
							} else if ($row['type_replace'] == 3) {
								$ghj = $row['ntype'] . " - No Rekrutment (Existing) -" . $jrr;
							} else {
								$ghj = $row['ntype'] . " - Rekrutment -" . $jrr;
							}
						} else {
							if ($row['type_rekrut'] == 1) {
								$ghj = $row['ntype'] . " - No Rekrutment -" . $jrr;
							} else if ($row['type_rekrut'] == 3) {
								$ghj = $row['ntype'] . " - No Rekrutment (Existing) -" . $jrr;
							} else {
								$ghj = $row['ntype'] . " - Rekrutment -" . $jrr;
							}
						}
					} else {
						if ($row['type_rekrut'] == '' and $row['type_rekrut'] == null) {
							if ($row['type_replace'] == 1) {
								$ghj = $row['ntype'] . " - No Rekrutment";
							} else if ($row['type_replace'] == 3) {
								$ghj = $row['ntype'] . " - No Rekrutment (Existing) -" . $jrr;
							} else {
								$ghj = $row['ntype'] . " - Rekrutment";
							}
						} else {
							if ($row['type_rekrut'] == 1) {
								$ghj = $row['ntype'] . " - No Rekrutment";
							} else if ($row['type_rekrut'] == 3) {
								$ghj = $row['ntype'] . " - No Rekrutment (Existing) -" . $jrr;
							} else {
								$ghj = $row['ntype'] . " - Rekrutment";
							}
						}
					}
				}



				$desknoj = json_encode($row['deskripsi']);
				$huhui = "<td><center><a href='' onclick='javascript:desk(\"" . $row['id'] . "\", " . $desknoj . ");' id='btndes' data-toggle='modal' data-target='#Modal_des'>view</a></center></td>";

				if ($row['type_jo'] == 1) {
					if ($row['type_rekrut'] == 3) {
						$hahai = "<td><center><a href='' onclick='javascript:cek(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btncek' data-toggle='modal' data-target='#Modal_cek'>cek</a></center></td>";
					} else {
						$hahai = "<td><center>-</center></td>";
					}
				} else {
					$hahai = "<td><center><a href='' onclick='javascript:cek(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btncek' data-toggle='modal' data-target='#Modal_cek'>cek</a></center></td>";
				}


				if ($row['kunci_tgl_create'] != '' && $row['kunci_tgl_create'] != null) {
					$tglcreate  = strtotime($row['kunci_tgl_create']);
					$appatas    = strtotime($row['lupapp_atasan']);
					if ($tglcreate > $appatas) {
						$tglcr = $row['kunci_tgl_create'];
					} else {
						$tglcr = $row['lupapp_atasan'];
					}
				} else {
					if ($row['alup_edit'] != '' && $row['alup_edit'] != null) {
						$appatas  = strtotime($row['lupapp_atasan']);
						$dateedit = strtotime($row['alup_edit']);
						if ($dateedit > $appatas) {
							$tglcr = $row['alup_edit'];
						} else {
							$tglcr = $row['lupapp_atasan'];
						}
						// $tglcr = $row['alup_edit'];
					} else {
						if ($row['lup_newrej'] != null && $row['lup_newrej'] != '') {
							$tglcr = $row['lup_newrej'];
						} else {
							if ($row['lup_edit'] != null && $row['lup_edit'] != '') {
								$appatas  = strtotime($row['lupapp_atasan']);
								$dateedit = strtotime($row['lup_edit']);
								if ($row['lupapp_atasan'] != null && $row['lupapp_atasan'] != '') {
									if ($dateedit > $appatas) {
										$tglcr = $row['lup_edit'];
									} else {
										$tglcr = $row['lupapp_atasan'];
									}
								} else {
									$tglcr = $row['lup_edit'];
								}
							} else {
								if ($row['lupapp_atasan'] != null && $row['lupapp_atasan'] != '') {
									$tglcr = $row['lupapp_atasan'];
								} else {
									$tglcr = $row['tanggal'];
								}
							}
						}
					}
				}


				if ($row['jml_stop'] == '') {
					$mrn = $row['jumlah'];
				} else {
					$mrn = $row['jml_stop'];
				}

				if ($row['rekrutx'] == 2) {
					if ($row['bekerja_edit'] == '' and $row['bekerja_edit'] == null) {
						if ($row['tgl_bekerja'] != '' and $row['tgl_bekerja'] != null) {
							$bkrj = $row['tgl_bekerja'];
							$testy = 'AA';
						} else {
							$bkrj = $row['bekerja'];
							$testy = 'BB';
						}
					} else {
						$bkrj = $row['bekerja_edit'];
						$testy = 'CC';
					}
				} else {
					if ($row['tgl_bekerja'] != '' and $row['tgl_bekerja'] != null) {
						$bkrj = $row['tgl_bekerja'];
						$testy = 'DD';
					} else {
						$bkrj = $row['bekerja'];
						$testy = 'EE';
					}
				}



				if ($row['flag_peralihan'] == 1 && $row['rekrutx'] == 1) {
					if ($row['type_jo'] == 1) {
						if ($row['type_rekrut'] == 3) {
							$xxy = $row['status_pernernewjo'];
							// if($row['status_pernernewjo']==6){
							// $xxy = "<td>1</td>";
							// } else {
							// $xxy = "<td>0</td>";
							// }
						} else {
							$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>" . $mrn . "</a></td>";
						}
					} else {
						if ($row['perner_ganti'] != '' and $row['perner_ganti'] != 'null' and !is_null($row['perner_ganti'])) {
							$xxy = "<td>1</td>";
						} else {
							$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $mrn . "</a></td>";
						}
					}
				} else {
					if ($row['jml_hire'] != '' or $row['jml_hire'] != null) {
						if ($row['type_jo'] == 1) {
							if ($row['type_rekrut'] == 3) {
								$xxy = $row['status_pernernewjo'];
								// if($row['status_pernernewjo']==6){
								// $xxy = "<td>1</td>";
								// $xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>".$row['jml_hire']."</a></td>";
								// } else {
								// $xxy = "<td>0</td>";
								// $xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>".$row['jml_hire']."</a></td>";
								// }
							} else {
								$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>" . $row['jml_hire'] . "</a></td>";
							}
						} else {
							if ($row['type_rekrut'] == 1) {
								if ($row['status_pernernewjo'] == 4) {
									// $xxy = "<td>1</td>";
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $row['jml_hire'] . "</a></td>";
								} else {
									// $xxy = "<td>0</td>";
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $row['jml_hire'] . "</a></td>";
								}
							} else {
								$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $row['jml_hire'] . "</a></td>";
							}
							// if($row['perner_ganti']!='' AND $row['perner_ganti']!='null' AND !is_null($row['perner_ganti'])){
							// $xxy = "<td>1</td>";
							// } else {
							// $xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>".$row['jml_hire']."</a></td>";
							// }
						}
					} else {
						if ($row['type_jo'] == 1) {
							if ($row['type_rekrut'] == 3) {
								$xxy = $row['status_pernernewjo'];
								// if($row['status_pernernewjo']==6){
								// $xxy = "<td>1</td>";
								// $xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>0</a></td>";
								// } else {
								// $xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>0</a></td>";
								// $xxy = "<td>0</td>";
								// }
							} else {
								$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>0</a></td>";
							}
						} else {
							// if($row['type_rekrut']==1){
							if ($row['type_rekrut'] == 1) {
								if ($row['status_pernernewjo'] == 4) {
									// $xxy = "<td>1</td>";
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
								} else {
									// $xxy = "<td>0</td>";
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
								}
							} else {
								// $xxy = "<td>0</td>";
								if ($row['type_rekrut'] == 3) {
									if ($row['rfc_rotasi'] == 6) {
										$xxy = "<td>1</td>";
									} else {
										$xxy = "<td>0</td>";
									}
								} else {
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
								}
							}
							// if($row['perner_ganti']!='' AND $row['perner_ganti']!='null' AND !is_null($row['perner_ganti'])){
							// $xxy = "<td>1</td>";
							// } else {
							// $xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
							// }
						}
					}
				}


				$buat_pm = $ccc . "<button type='button' class='btn " . $stat_pm . " btn-block btn-xs btnadd' onclick='javascript:actpm(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\",\"" . $row['ket_done_pm'] . "\",\"" . $row['type_jo'] . "\",\"" . $btn_pm . "\");' id='btnpm' data-toggle='modal' data-target='#modalpm'>" . $btn_pm . "</button>";


				if ($session['type'] == 'PPC' or $session['type'] == 'AVP' or $session['type'] == 'AVP') {
					$output['data'][] = array(
						$row['nojo'],
						//$row['ntype'],
						$ghj,
						$abc,
						$def,
						$row['lokasi'],
						// $row['atasan'], 
						$row['lama'],
						$row['kontrak'],
						// $row['bekerja'],
						$bkrj,
						// $testy,
						// $row['jumlah'],
						$mrn,
						$xxy,
						// $row['deskripsi'],
						$huhui,
						$row['bekerja'],
						$row['dnama'],
						// $row['blup'],
						// $row['tanggal'],
						$tglcr,
						$row['no_bak'],
						$row['ket_atasan'],
						$row['ket_admin'],
						$row['komentar'],
						$row['ket_cancel'],
						$row['ket_done'],
						$row['id'],
						$row['project'],
						$row['lokasix'],
						$row['zparam'],
						$tglstat_yes,
						// $row['nuserpm'],
						$stat_pm_ppc,
						$hahai,
						$row['nama_cust'],
						//base_url().'public/uploads/'.$row['file']
						//'<td> '.$aaa.' '.$bbb.' '.$ccc.' '.$ddd.' </td>',
						'<td> ' . $ccc . ' </td>',
						$row['skilllayanan']



						/*'<a href="'.base_url().'index.php/home/det_profile/'.$row['perner'].'">View Foto</a>'*/
					);
				} else if ($session['type'] == 'PM') {
					$output['data'][] = array(
						$row['nojo'],
						$ghj,
						$abc,
						$def,
						$row['lokasi'],
						$row['lama'],
						$row['kontrak'],
						$bkrj,
						$mrn,
						$xxy,
						$huhui,
						$row['bekerja'],
						$row['dnama'],
						$tglcr,
						$row['no_bak'],
						$row['ket_atasan'],
						$row['ket_admin'],
						$row['komentar'],
						$row['ket_cancel'],
						$row['ket_done'],
						$row['id'],
						$row['project'],
						$row['lokasix'],
						$row['zparam'],
						$tglstat_yes,
						$row['nuserpm'],
						$hahai,
						$row['nama_cust'],
						'<td> ' . $buat_pm . ' </td>',
						$row['skilllayanan']
					);
				}



				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}



	public function data_listorder_ops()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];
			$typex 	  = $session['type'];

			//var_dump($level);var_dump($typex);exit();

			if (($level == 1) && ($typex == 'OPS')) {
				$data = $this->job_model->get_transall_ops($length, $start, $search, $order, $dir);
			} else if ($level == 9) {
				$data = $this->job_model->app_transall_ops($length, $start, $search, $order, $dir);
			}


			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_zparam');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$nnn = json_decode($this->curl->execute());
			$mmm = $nnn->ZPARAMETER;

			$kkk = substr("" . $mmm . "", 0, 1);

			$nor = substr($mmm, 1, 9);

			$next 			= intval($nor) + 1;
			$xnext 			= $this->hitung_param($next);
			$zparam 		= $kkk . $xnext;


			//var_dump($data);exit();
			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {

				$ko_persa = $row['persa_sap'];
				if (($ko_persa != '') || ($ko_persa != null)) {
					$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$post = array('token' => sha1("#ISH!@#"), 'search' => $ko_persa);
					$this->curl->post($post);
					$nnnx = json_decode($this->curl->execute());
					$plk = $nnnx[0]->persa;
				} else {
					if ($row['n_project'] != '') {
						$plk = $row['n_project'];
					} else {
						$plk = $row['project'];
					}
				}



				if (($level == 1) && ($typex == 'OPS')) {
					$fff = "<button type='button' class='btn btn-info btn-block btn-xs btnadd' onclick='javascript:badd(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\");' id='btnadd' data-toggle='modal' data-target='#PmyModal'>Invoice Preparation</button>
					<button type='button' class='btn btn-success btn-block btn-xs btnpro' onclick='javascript:bpro(\"" . $row['id'] . "\",\"" . $row['nojo'] . "\");' id='btnpro' data-toggle='modal' data-target='#XmyModal'>Procurement</button>";
					$nnn = "<a href='#' onclick='javascript:baddy(\"" . $row['nojo'] . "\");' id='btnadd' data-toggle='modal' data-target='#CmyModal'>" . $row['nojo'] . "</a>";
				} else if ($level == 9) {
					/*
					if($row['flag']==1){
						$fff = "<button type='button' class='btn btn-success btn-block btn-xs btnadd' onclick='javascript:xbadd(\"".$row['nojo']."\",\"".$row['tanggal']."\");' id='btnadd' data-toggle='modal' data-target='#KmyModal'>Approved</button>";
					} else if($row['flag']==2) {
						$fff = "<button type='button' class='btn btn-danger btn-block btn-xs btnadd' onclick='javascript:xbadd(\"".$row['nojo']."\",\"".$row['tanggal']."\");' id='btnadd' data-toggle='modal' data-target='#KmyModal'>Rejected</button>";
					} else { */
					$fff = "<button type='button' class='btn btn-info btn-block btn-xs btnadd' onclick='javascript:xbadd(\"" . $row['nojo'] . "\",\"" . $row['tanggalx'] . "\");' id='btnadd' data-toggle='modal' data-target='#KmyModal'>Detail</button>";
					$nnn = $row['nojo'];
					//}
				}



				$output['data'][] = array(
					//$row['nojo'],		
					$nnn,
					//$row['tanggalx'],
					$plk,
					//$row['bekerja'],
					$row['dnama'],
					'<td> ' . $fff . ' </td>'

					/*'<a href="'.base_url().'index.php/home/det_profile/'.$row['perner'].'">View Foto</a>'*/
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}



	public function data_dashboard()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();
			$cano  = $this->input->post('is_carno');
			$cacli = $this->input->post('is_carcli');
			$capro = $this->input->post('is_carpro');

			$parsearch	= array(
				"cano"    => $postparam['cano']["value"],
				// "cacli"   => $postparam['cacli'],
				// "capro"   => $postparam['capro'],
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];
			// var_dump($cano);die;

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];
			$typex 	  = $session['type'];


			$data = $this->job_model->get_transall_opsX($length, $start, $search, $order, $dir, $cano, $cacli, $capro);


			$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_zparam');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$post = array('token' => sha1("#ISH!@#"));
			$this->curl->post($post);
			$nnn = json_decode($this->curl->execute());
			$mmm = $nnn->ZPARAMETER;

			$kkk = substr("" . $mmm . "", 0, 1);

			$nor = substr($mmm, 1, 9);

			$next 			= intval($nor) + 1;
			$xnext 			= $this->hitung_param($next);
			$zparam 		= $kkk . $xnext;


			//var_dump($data);exit();
			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				//$this->db3 = $this->load->database('db_third',TRUE);
				$ko_persa = $row['persa_sap'];

				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_persa');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"), 'search' => $ko_persa);
				$this->curl->post($post);
				$nnnx = json_decode($this->curl->execute());
				$plk = $nnnx[0]->persa;

				//var_dump($nnnx);var_dump($plk);exit();

				if (($row['n_project'] != '') and ($row['n_project'] != 'Pilih')) {
					$abc = $row['n_project'];
				} else {
					$abc = $row['project'];
				}

				$uyu = $row['nojo'];
				$aoa = $this->db->query("Select * from trans_pks where nojo='$uyu' ")->num_rows();
				if ($aoa <= 0) {
					$coc = "<font color='red'>PKS NOT DONE</font>";
				} else {
					$coc = 'PKS DONE';
				}

				$qoq = $this->db->query("Select * from ish_payroll.trans_invoice where invNumberJO='$uyu' ")->num_rows();
				//var_dump($qoq);var_dump($uyu);exit();
				if ($qoq <= 0) {
					$dod = "<font color='red'>INVOICE NOT DONE</font>";
				} else {
					$dod = 'INVOICE DONE';
				}


				$abcd = $this->db->query("SELECT doc_id from trans_doc WHERE nojo='$uyu' ")->row();
				if ((empty($abcd->doc_id)) || ($abcd->doc_id == '')) {
					$def = '';
				} else {
					$def = $abcd->doc_id;
				}


				$dataops	= $this->job_model->detail_file_opsX($def, $uyu);

				$databx = array();
				foreach ($dataops as $listxx) {
					//if($listxx['filename']!=''){$nono='DONE';}else{$nono='NOT YET';}
					//$databx[] = "<label'>".$listxx['doc_name']."=".$nono."</label>";
					$databx[] = "<label'>" . $listxx['doc_name'] . "</label>";
				}

				$bob = 'BAST = NOT YET';
				$eoe = '-';

				$fff = "<button type='button' class='btn btn-info btn-block btn-xs btnadd' onclick='javascript:xbadd(\"" . $row['nojo'] . "\",\"" . $row['tanggalx'] . "\");' id='btnadd' data-toggle='modal' data-target='#KmyModal'>Detail</button>";
				$nnn = $row['nojo'];


				$output['data'][] = array(
					//$row['nojo'],		
					$nnn,
					$row['nama_cust'],
					// $plk,
					$abc,
					$coc,
					$databx,
					$dod,
					$eoe
					/*'<a href="'.base_url().'index.php/home/det_profile/'.$row['perner'].'">View Foto</a>'*/
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}



	/*
	public function data_listorder_skema()
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
			
			if($level == '2')
			{
				if($regional=='1')
				{
					//$data['transjo'] 	= $this->job_model->get_transall_approval_ops($username);
					//$data['transjos'] 	= $this->job_model->get_transall_sap_sk_app_ops($username);
					$data 		= $this->job_model->get_transall_sap_sk_app_ops($length,$start,$search,$order,$dir);
				}
				else
				{
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					$data['lalalili'] =  $q_cek_pmanar->jml;
					if( ($q_cek_pmanar->jml) <= 0 ) 
					{
						//$data['transjo'] = $this->job_model->get_transall_approval($daud,$jbt);
						//$data['transjos'] = $this->job_model->get_transall_sap_sk_app($daud,$jbt);
						$data 		= $this->job_model->get_transall_sap_sk_app($length,$start,$search,$order,$dir);	
					}
					else
					{
						//$data['transjo'] = $this->job_model->get_transall_manar_2($data['username']);
						$data = $this->job_model->get_transall_sap_sk_manar_2($length,$start,$search,$order,$dir);
					}
				}
			}
			else if($level == '1')
			{
				//$data['transjo'] = $this->job_model->get_transall_craeter($username);
				$data = $this->job_model->get_transall_sap_sk_creater($length,$start,$search,$order,$dir);
			}
			else if($level == '3')
			{
				//$data['transjo'] = $this->job_model->get_transall_rekrut($daud);
				$data = $this->job_model->get_transall_sap_sk_manar($length,$start,$search,$order,$dir);
			}
			else if($level == '4')
			{
				//$data['transjo'] = $this->job_model->get_transall_manar($data['username']);
				$data = $this->job_model->get_transall_sap_sk_manar($length,$start,$search,$order,$dir);
			}
			else
			{
				//$data['transjo'] = $this->job_model->get_transall();
				$data = $this->job_model->get_transall_sap_sk_manar($length,$start,$search,$order,$dir);
			}
			
			
			//var_dump($data);exit();
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				if( ($level==4) || ($level==2) )
				{
					if ($row['flag_manar'] == 1) {
						$btn = 'Approved MANAR';
						$stat = 'btn-success';
					} elseif ($row['flag_manar'] == 2) {
						$btn = 'Rejected MANAR';
						$stat = 'btn-danger';
					} 
					else
					{
						$btn = 'Approve';
						$stat = 'btn-warning';
					}
				}
				else
				{
					if ($row['flag_manar'] == 1) {
						$btn = 'Approved MANAR';
						$stat = 'btn-success';
					} elseif ($row['flag_manar'] == 2) {
						$btn = 'Rejected MANAR';
						$stat = 'btn-danger';
					} 
					else
					{
						$btn = 'Waiting Approval MANAR';
						$stat = 'btn-warning';
					}
				}
				
				
				
				$output['data'][]=array( 
					$row['nojo'],					
					$row['n_area'],
					$row['n_perar'],
					$row['n_perar'],$row['n_perar'],$row['n_perar'],
					$row['nama'],
					$row['lup'], 
					$row['id'], 
					$row['nojo'],
					$row['ket_reject'],
					$row['ket_cancel'],
					$row['area'],
					$row['perar'],
					'<td><button type="submit" class="btn '. $stat .' btn-block btn-xs btnapp" id="btnapp" data-toggle="modal" data-target="#GmyModal">' . $btn . '</button></td>'
					
					

				);
				$nomor_urut++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}
	*/
	public function hitung_param($next)
	{
		$inext = strlen($next);
		switch ($inext) {
			case 1:
				$noj = "00000000" . $next;
				break;
			case 2:
				$noj = "0000000" . $next;
				break;
			case 3:
				$noj = "000000" . $next;
				break;
			case 4:
				$noj = "00000" . $next;
				break;
			case 5:
				$noj = "0000" . $next;
				break;
			case 6:
				$noj = "000" . $next;
				break;
			case 7:
				$noj = "00" . $next;
				break;
			case 8:
				$noj = "0" . $next;
				break;
			case 9:
				$noj = $next;
				break;
		}
		return $noj;
	}


	public function input_hiring($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 				= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			//var_dump($id);var_dump($bln);var_dump($jns);exit();
			$data['hid']		= $id;


			$this->load->view('pages/header', $data);
			$this->load->view('hiring/input_hiring', $data);
			$this->load->view('pages/footer', $data);
		} else {
			redirect('login', 'refresh');
		}
	}


	public function data_listappjox()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];
			$jabtn = $session['jabatan'];
			$lynn = $session['layanan'];

			if ($level == '4') {
			} else if ($level == '2') {
				if ($session['mgr_enterprise'] == '1') {
					$data			 		= $this->job_model->get_transappjo_enterprise($length, $start, $search, $order, $dir);
				} else {
					if ($regional == '1') {
						$data 					= $this->job_model->get_transappjo2($length, $start, $search, $order, $dir);
					} else {
						$data			 		= $this->job_model->get_transappjo($length, $start, $search, $order, $dir);
						$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
						if (($q_cek_pmanar->jml) <= 0) {
						} else {
							$area = '';
							$perar = '';
						}
					}
				}
			} else if (($level == '1') || ($level == '14')) {
				$data 		= $this->job_model->get_transappjo2($length, $start, $search, $order, $dir);
			} else {
				$data					= $this->job_model->get_transappjo3($length, $start, $search, $order, $dir);
			}

			$opl = $this->db->query("Select * from m_login where jabatan='$jabtn' and layanan='$lynn' and level='2' and (regional='0' OR regional is null) ")->row();

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				$this->db3 = $this->load->database('db_third', TRUE);
				$cekid_client = $this->db3->query("SELECT manager_enterprise FROM ish_salesfunnel.new_customer WHERE id='" . $row['kode_cust'] . "' ")->row();
				$this->db 	= $this->load->database('default', TRUE);
				$ceknm_mgr	= $this->db->query("SELECT nama FROM m_login WHERE username='" . $cekid_client->manager_enterprise . "' ")->row();

				if ($jabtn == 'J003' && $lynn == 'L021') {
					if ($ceknm_mgr->nama == '' and is_null($ceknm_mgr->nama)) {
						$nmapp = $opl->nama;
					} else {
						$nmapp = $ceknm_mgr->nama;
					}
				} else {
					$nmapp = $opl->nama;
				}


				if ($level == '2') {
					if ($regional == '1') {
						if ($row['approval'] == 0) {
							$btn  = 'Waiting Approval';
							// $btnx = 'Waiting Approval '.$opl->nama;
							$btnx = 'Waiting Approval ' . $nmapp;
							$stat = 'btn-warning';
						} elseif ($row['approval'] == 1) {
							$btn  = 'Approved';
							$btnx = 'Approved ' . $nmapp;
							$stat = 'btn-success';
						} elseif ($row['approval'] == 5) {
							$btn  = 'Approved';
							$btnx = 'Approved ' . $nmapp;
							$stat = 'btn-success';
						} elseif ($row['approval'] == 2) {
							$btn  = 'Rejected';
							$btnx = 'Rejected';
							$stat = 'btn-danger';
						}
					} else {
						if ($row['approval'] == 0) {
							$btn  = 'Approve';
							$btnx = 'Approve';
							$stat = 'btn-warning';
						} elseif ($row['approval'] == 1) {
							$btn  = 'Approved';
							$btnx = 'Approved';
							$stat = 'btn-success';
						} elseif ($row['approval'] == 5) {
							$btn  = 'Approved';
							$btnx = 'Approved ' . $nmapp;
							$stat = 'btn-success';
						} elseif ($row['approval'] == 2) {
							$btn  = 'Rejected';
							$btnx = 'Rejected';
							$stat = 'btn-danger';
						}
					}
				} else {
					if ($row['approval'] == 0) {
						$btn  = 'Waiting Approval';
						$btnx = 'Waiting Approval ' . $nmapp;
						$stat = 'btn-warning';
					} elseif ($row['approval'] == 1) {
						$btn  = 'Approved';
						$btnx = 'Approved ' . $nmapp;
						$stat = 'btn-success';
					} elseif ($row['approval'] == 5) {
						$btn  = 'Approved';
						$btnx = 'Approved ' . $nmapp;
						$stat = 'btn-success';
					} elseif ($row['approval'] == 2) {
						$btn  = 'Rejected';
						$btnx = 'Rejected' . $nmapp;
						$stat = 'btn-danger';
					}
				}


				if ($row['type_jo'] == 2) {
					$abc = '-';
				} else {
					if (($row['n_project'] != 'Pilih') && ($row['n_project'] != '')) {
						$abc = $row['n_project'];
					} else {
						$abc = $row['project'];
					}
				}

				if ($row['type_jo'] == 1) {
					if ($row['type_new'] == 1) {
						$ghj = $row['ntype_jo'] . " - New Project";
					} else if ($row['type_new'] == 2) {
						$ghj = $row['ntype_jo'] . " - Pengembangan";
					} else {
						$ghj = $row['ntype_jo'];
					}
				} else {
					if ($row['type_replace'] == 1) {
						$ghj = $row['ntype_jo'] . " - No Rekrutment";
					} else if ($row['type_replace'] == 2) {
						$ghj = $row['ntype_jo'] . " - Rekrutment";
					} else {
						$ghj = $row['ntype_jo'] . " - No Rekrutment (Existing)";
					}
				}


				if ($level == '6') {
					$war = "Atasan masing-masing";
				} else if ($level == '2') {
					$war = "Anda";
				} else {
					$war = $row['natasan'];
				}


				$kont = json_encode($row['ket_atasan']);
				if ($row['type_jo'] == 1) {
					$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:baddy(\"" . $row['nojo'] . "\",\"" . $btn . "\",\"" . $row['type_jo'] . "\",\"" . $row['type_replace'] . "\"," . $kont . ", \"" . $level . "\", \"" . $regional . "\");' id='btndetail' data-toggle='modal' data-target='#XmyModal'>" . $btnx . "</button>";
				} else {
					$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs vbtndetail' onclick='javascript:baddx(\"" . $row['nojo'] . "\",\"" . $btn . "\",\"" . $row['type_jo'] . "\",\"" . $row['type_replace'] . "\"," . $kont . ", \"" . $level . "\", \"" . $regional . "\");' id='vbtndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btnx . "</button>";
				}


				if (($level == '1') || ($level == '14') || ($level == '2' && $regional == '1')) {
					if ($row['approval'] == 2) {
						$abcde = 'atasan';
						$pop = "<a href='" . base_url() . 'index.php/home/edit_allx' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;' data-backdrop='static' data-keyboard='false'>Edit</button></a>";
					} else {
						$pop = "";
					}
				} else {
					$pop = "";
				}


				$output['data'][] = array(
					$row['approval'],
					$row['nojo'],
					$abc,
					// $ghj,
					$row['syarat'],
					$row['deskripsi'],
					//$row['bekerja'],
					$row['nupd'],
					$row['lup'],
					$row['type_jo'],
					$row['ket_atasan'],
					$row['ket_admin'],
					$war,
					$row['type_replace'],
					'<td> ' . $ccc . ' ' . $pop . ' </td>'
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}


	public function data_listappjo()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];
			$jabtn = $session['jabatan'];
			$lynn = $session['layanan'];

			if ($level == '4') {
				//$data['transjo'] 		= $this->job_model->get_transappjo1();
				//$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			} else if ($level == '2') {
				if ($regional == '1') {
					//$data['transjo'] 		= $this->job_model->get_transappjo_ops($username, $jbt, $daud);
					$data 					= $this->job_model->get_transappjo2($length, $start, $search, $order, $dir);
					// $data 					= $this->job_model->get_transappjo_ops($length,$start,$search,$order,$dir);
					//$data['transjos'] 		= $this->job_model->get_transappjo_skema_ops($username);
				} else {
					//$data['transjo'] 		= $this->job_model->get_transappjo($daud, $jbt);
					$data			 		= $this->job_model->get_transappjo($length, $start, $search, $order, $dir);
					//$data['transjos'] 		= $this->job_model->get_transappjo_skema($daud, $jbt);
					$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
					if (($q_cek_pmanar->jml) <= 0) {
						//$data['transjos']			= $this->job_model->get_transappjo_skema($daud, $jbt);
					} else {
						$area = '';
						$perar = '';
						//$data['transjos']			= $this->job_model->view_sk_sk_list_mr_2x($area,$perar,$username);
					}
				}
			} else if (($level == '1') || ($level == '14')) {
				$data 		= $this->job_model->get_transappjo2($length, $start, $search, $order, $dir);
				//$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			} else {
				//$data['transjo'] 		= $this->job_model->get_transappjo3();
				$data					= $this->job_model->get_transappjo3($length, $start, $search, $order, $dir);
				//$data['transjos'] 		= $this->job_model->get_transappjo_skema2($username);
			}

			//$data = $this->job_model->get_transall_sap_2($length,$start,$search,$order,$dir);

			$opl = $this->db->query("Select * from m_login where jabatan='$jabtn' and layanan='$lynn' and level='2' and (regional='0' OR regional is null) ")->row();


			//var_dump($data);exit();
			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				if ($level == '2') {
					if ($regional == '1') {
						if ($row['approval'] == 0) {
							$btn  = 'Waiting Approval';
							$btnx = 'Waiting Approval ' . $opl->nama;
							$stat = 'btn-warning';
						} elseif ($row['approval'] == 1) {
							$btn  = 'Approved';
							$btnx = 'Approved ' . $opl->nama;
							$stat = 'btn-success';
						} elseif ($row['approval'] == 5) {
							// $btn  = 'Approved PM';
							// $btnx = 'Approved PM';
							$btn  = 'Approved';
							$btnx = 'Approved ' . $opl->nama;
							$stat = 'btn-success';
						} elseif ($row['approval'] == 2) {
							$btn  = 'Rejected';
							$btnx = 'Rejected';
							$stat = 'btn-danger';
						}
					} else {
						if ($row['approval'] == 0) {
							$btn  = 'Approve';
							$btnx = 'Approve';
							$stat = 'btn-warning';
						} elseif ($row['approval'] == 1) {
							$btn  = 'Approved';
							// $btnx = 'Approved '.$opl->nama;
							$btnx = 'Approved';
							$stat = 'btn-success';
						} elseif ($row['approval'] == 5) {
							// $btn  = 'Approved PM';
							// $btnx = 'Approved PM';
							$btn  = 'Approved';
							$btnx = 'Approved ' . $opl->nama;
							$stat = 'btn-success';
						} elseif ($row['approval'] == 2) {
							$btn  = 'Rejected';
							$btnx = 'Rejected';
							$stat = 'btn-danger';
						}
					}
				} else {
					if ($row['approval'] == 0) {
						$btn  = 'Waiting Approval';
						$btnx = 'Waiting Approval ' . $opl->nama;
						$stat = 'btn-warning';
					} elseif ($row['approval'] == 1) {
						$btn  = 'Approved';
						$btnx = 'Approved ' . $opl->nama;
						$stat = 'btn-success';
					} elseif ($row['approval'] == 5) {
						// $btn  = 'Approved PM';
						// $btnx = 'Approved PM';
						$btn  = 'Approved';
						$btnx = 'Approved ' . $opl->nama;
						$stat = 'btn-success';
					} elseif ($row['approval'] == 2) {
						$btn  = 'Rejected';
						$btnx = 'Rejected' . $opl->nama;
						$stat = 'btn-danger';
					}
				}


				if ($row['type_jo'] == 2) {
					$abc = '-';
				} else {
					if (($row['n_project'] != 'Pilih') && ($row['n_project'] != '')) {
						$abc = $row['n_project'];
					} else {
						$abc = $row['project'];
					}
				}

				if ($row['type_jo'] == 1) {
					if ($row['type_new'] == 1) {
						$ghj = $row['ntype_jo'] . " - New Project";
					} else if ($row['type_new'] == 2) {
						$ghj = $row['ntype_jo'] . " - Pengembangan";
					} else {
						$ghj = $row['ntype_jo'];
					}
				} else {
					if ($row['type_replace'] == 1) {
						$ghj = $row['ntype_jo'] . " - No Rekrutment";
					} else if ($row['type_replace'] == 2) {
						$ghj = $row['ntype_jo'] . " - Rekrutment";
					} else {
						$ghj = $row['ntype_jo'];
					}
				}


				if ($level == '6') {
					$war = "Atasan masing-masing";
				} else if ($level == '2') {
					$war = "Anda";
				} else {
					$war = $row['natasan'];
				}


				$kont = json_encode($row['ket_atasan']);
				if ($row['type_jo'] == 1) {
					$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:baddy(\"" . $row['nojo'] . "\",\"" . $btn . "\",\"" . $row['type_jo'] . "\",\"" . $row['type_replace'] . "\"," . $kont . ", \"" . $level . "\", \"" . $regional . "\");' id='btndetail' data-toggle='modal' data-target='#XmyModal'>" . $btnx . "</button>";
				} else {
					$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs vbtndetail' onclick='javascript:baddx(\"" . $row['nojo'] . "\",\"" . $btn . "\",\"" . $row['type_jo'] . "\",\"" . $row['type_replace'] . "\"," . $kont . ", \"" . $level . "\", \"" . $regional . "\");' id='vbtndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btnx . "</button>";
				}


				if (($level == '1') || ($level == '14') || ($level == '2' && $regional == '1')) {
					if ($row['approval'] == 2) {
						$abcde = 'atasan';
						$pop = "<a href='" . base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;' data-backdrop='static' data-keyboard='false'>Edit</button></a>";
					} else {
						$pop = "";
					}
				} else {
					$pop = "";
				}


				$output['data'][] = array(
					$row['approval'],
					$row['nojo'],
					$abc,
					$ghj,
					$row['syarat'],
					$row['deskripsi'],
					$row['bekerja'],
					$row['nupd'],
					$row['lup'],
					$row['type_jo'],
					$row['ket_atasan'],
					$row['ket_admin'],
					$war,
					$row['type_replace'],
					'<td> ' . $ccc . ' ' . $pop . ' </td>'
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}



	public function data_listappjopm()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data			 		= $this->job_model->get_transappjopm($length, $start, $search, $order, $dir);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {

				if ($row['approval'] == 1) {
					$btn = 'Approve';
					$stat = 'btn-warning';
				} elseif ($row['approval'] == 5) {
					$btn = 'Approved';
					$stat = 'btn-success';
				} elseif ($row['approval'] == 2) {
					$btn = 'Rejected';
					$stat = 'btn-danger';
				}


				if ($row['type_jo'] == 2) {
					$abc = '-';
				} else {
					if (($row['n_project'] != '') && ($row['n_project'] != 'Pilih')) {
						$abc = $row['n_project'];
					} else {
						$abc = $row['project'];
					}
				}

				if ($row['type_jo'] == 1) {
					if ($row['type_new'] == 1) {
						$ghj = $row['ntype_jo'] . " - New Project";
					} else {
						$ghj = $row['ntype_jo'] . " - Pengembangan";
					}
				} else {
					if ($row['type_replace'] == 1) {
						$ghj = $row['ntype_jo'] . " - No Rekrutment";
					} else {
						$ghj = $row['ntype_jo'] . " - Rekrutment";
					}
				}


				if ($level == '6') {
					$war = "Atasan masing-masing";
				} else if ($level == '2') {
					$war = "Anda";
				} else {
					$war = $row['natasan'];
				}

				$kont = json_encode($row['ket_atasan']);
				if ($row['type_jo'] == 1) {
					$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:baddy(\"" . $row['nojo'] . "\",\"" . $btn . "\",\"" . $row['type_jo'] . "\",\"" . $row['type_replace'] . "\"," . $kont . ");' id='btndetail' data-toggle='modal' data-target='#XmyModal'>" . $btn . "</button>";
				} else {
					$ccc = "<button type='button' class='btn " . $stat . " btn-block btn-xs vbtndetail' onclick='javascript:baddx(\"" . $row['nojo'] . "\",\"" . $btn . "\",\"" . $row['type_jo'] . "\",\"" . $row['type_replace'] . "\"," . $kont . ");' id='vbtndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button>";
				}


				$output['data'][] = array(
					$row['approval'],
					$row['nojo'],
					$abc,
					$ghj,
					$row['syarat'],
					$row['deskripsi'],
					$row['bekerja'],
					$row['nupd'],
					$row['lup'],
					$row['type_jo'],
					$row['ket_atasan'],
					$row['ket_admin'],
					$war,
					$row['type_replace'],
					'<td> ' . $ccc . ' </td>'
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}


	public function data_listorder3x()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"status"	=> ''
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

			if ($level == '2') {
				if ($session['mgr_enterprise'] == '1') {
					$data			 		= $this->job_model->get_listorder_mgrenterprise($length, $start, $search, $order, $dir);
				} else {
					if ($regional == '1') {
						$data =  $this->job_model->get_listorder1($length, $start, $search, $order, $dir);
					} else {
						$q_cek_pmanar		= $this->db->query("SELECT count(manar) as jml FROM mapping_manar WHERE manar = '$username' ")->row();
						$lalalili =  $q_cek_pmanar->jml;
						if (($q_cek_pmanar->jml) <= 0) {
							$data =  $this->job_model->get_listorder20($length, $start, $search, $order, $dir);
						} else {
							$data =  $this->job_model->get_listorder20_2($length, $start, $search, $order, $dir);
						}
					}
				}
			} else if (($level == '1') || ($level == '14')) {
				$data =  $this->job_model->get_listorder1($length, $start, $search, $order, $dir);
			} else if (($level == '3') || ($level == '15') || ($level == '18')) {
				$data =  $this->job_model->get_listorder3($length, $start, $search, $order, $dir, $parsearch);
			} else if ($level == '4') {
				$data =  $this->job_model->get_listorder4($length, $start, $search, $order, $dir);
			} else {
				$data =  $this->job_model->get_listorder1($length, $start, $search, $order, $dir);
			}

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				if ($level == '4') {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						if ($row['skema'] == 1) {
							$btn = 'Approved PM';
							$stat = 'btn-success';
						} else {
							$btn = 'Canceled SAP';
							$stat = 'btn-danger';
						}
					} else if ($row['flag_cancel_sap'] == '2') {
						if ($row['skema'] == 1) {
							$btn = 'Approved PM';
							$stat = 'btn-success';
						} else {
							$btn = 'Returned SAP';
							$stat = 'btn-danger';
						}
					} else {
						if ($row['finish_view_manar'] == 1) {
							$btn = 'Finish';
							$stat = 'btn-success';
						} else {
							if ($row['flag_app'] == 1) {
								$btn = 'Finish';
								$stat = 'btn-success';
							} else {
								$btn = 'View';
								$stat = 'btn-warning';
							}
						}
					}
				} else if ($level == '2') {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						if ($row['skema'] == 1) {
							$btn = 'Approved PM';
							$stat = 'btn-success';
						} else {
							$btn = 'Canceled SAP';
							$stat = 'btn-danger';
						}
					} else if ($row['flag_cancel_sap'] == '2') {
						if ($row['skema'] == 1) {
							$btn = 'Approved PM';
							$stat = 'btn-success';
						} else {
							$btn = 'Returned SAP';
							$stat = 'btn-danger';
						}
					} else {
						if ($regional == '1') {
							if ($row['skema'] == 1) {
								$btn = 'Approved PM';
								$stat = 'btn-success';
							} else {
								$btn = 'Waiting PM';
								$stat = 'btn-warning';
							}
						} else {
							if ($lalalili <= '0') {
								$btn = 'View';
								$stat = 'btn-success';
							} else {
								$btn = 'View';
								$stat = 'btn-success';
							}
						}
					}
				} else {
					if ($row['flag_cancel'] == '1') {
						$btn = 'Canceled SAP';
						$stat = 'btn-danger';
					} else if ($row['flag_cancel_sap'] == '1') {
						if ($row['skema'] == 1) {
							$btn = 'Approved PM';
							$stat = 'btn-success';
						} else {
							$btn = 'Canceled SAP';
							$stat = 'btn-danger';
						}
					} else if ($row['flag_cancel_sap'] == '2') {
						if ($row['skema'] == 1) {
							$btn = 'Approved PM';
							$stat = 'btn-success';
						} else {
							$btn = 'Returned SAP';
							$stat = 'btn-danger';
						}
					} else {
						if ($row['skema'] == 1) {
							$btn = 'Approved PM';
							$stat = 'btn-success';
						} else {
							$btn = 'Waiting PM';
							$stat = 'btn-warning';
						}
					}
				}

				if (($row['n_project'] != '') && ($row['n_project'] != 'Pilih')) {
					$abc = $row['n_project'];
				} else {
					$abc = $row['project'];
				}

				if (!filter_var($row['lokasi'], FILTER_SANITIZE_STRING)) {
					$cde = $row['lokasi'];
				} else {
					$cde = $row['city_name'];
				}

				if ($row['type_jo'] == 2) {
					$fgh = $row['ntype'];
				} else {
					if (!filter_var($row['jabatan'], FILTER_VALIDATE_INT)) {
						$fgh = $row['jabatan'] . "(" . $row['gender'] . ") ";
					} else {
						$fgh = $row['name_job_function'] . "(" . $row['gender'] . ") ";
					}
				}

				$kont = json_encode($row['ket_rej']);
				$kont2 = json_encode($row['ket_cancel']);
				$kont3 = json_encode($row['ket_rekrut']);
				if (($level == 3) || ($level == 15) || ($level == 18)) {
					if ($row['flag_cancel'] == '1') {
						$ttt = '<button type="button" class="btn btn-danger btn-block btn-xs btnholded" onclick="javascript:bhold(\'' . $row['ket_cancel'] . '\');" id="btnholded" data-toggle="modal" data-target="#EVModal">Canceled SAP</button>';
					} else {
						$ttt = '';
					}

					if ($row['flag_cancel_sap'] == '1') {
						$uuu = '<button type="button" class="btn btn-danger btn-block btn-xs btnholded" onclick="javascript:bhold(\'' . $row['ket_cancel'] . '\');" id="btnholded" data-toggle="modal" data-target="#EVModal">Canceled SAP</button>';
					} else {
						$uuu = '';
					}


					if (($row['flag_jobs'] != 1) || ($row['flag_jobs'] == null)) {
						if ($row['status_rekrut'] == 1) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\', \'' . $row['type_jo'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">Hold</button>';
							$jkl = '';
						} else if ($row['status_rekrut'] == 2) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros">Done</button>';
							$jkl = '';
						} else {
							$www = '<button type="button" class="btn btn-warning btn-block btn-xs btnedit" onclick="javascript:edit(\'' . $row['nojo'] . '\',\'' . $row['id'] . '\',\'' . $fgh . '\',\'' . $row['gender'] . '\',\'' . $cde . '\',\'' . $row['jumlah'] . '\',\'' . $row['rekrut'] . '\');" id="btnedit" data-toggle="modal" data-target="#EModal">ADD</button>';
							$vvv = '';
							$jkl = "<a href='" . base_url() . 'index.php/mapping/input_hiring' . '/'  . $row['id'] . "' style='color:red;'><button type='button' class='btn bg-maroon btn-block btn-xs' style='margin-top:5px; margin-bottom:5px;'>Hiring</button></a>";
						}
						$yyy = '';
					} else {
						if ($row['status_rekrut'] == 1) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros" onclick="javascript:bpros(\'' . $row['id'] . '\',\'' . $row['ket_rekrut'] . '\',\'' . $row['status_rekrut'] . '\', \'' . $row['type_jo'] . '\');" id="btnpros" data-toggle="modal" data-target="#MModal">Hold</button>';
							$jkl = '';
						} else if ($row['status_rekrut'] == 2) {
							$www = '';
							$vvv = '<button type="button" class="btn bg-navy btn-block btn-xs btnpros">Done</button>';
							$jkl = '';
						} else {
							$www = '<button type="button" class="btn btn-warning btn-block btn-xs btnedit" onclick="javascript:edit(\'' . $row['nojo'] . '\',\'' . $row['id'] . '\',\'' . $fgh . '\',\'' . $row['gender'] . '\',\'' . $cde . '\',\'' . $row['jumlah'] . '\',\'' . $row['rekrut'] . '\');" id="btnedit" data-toggle="modal" data-target="#EModal">ADD</button>';
							$vvv = '';
							$jkl = "<a href='" . base_url() . 'index.php/mapping/input_hiring' . '/'  . $row['id'] . "' style='color:red;'><button type='button' class='btn bg-maroon btn-block btn-xs' style='margin-top:5px; margin-bottom:5px;'>Hiring</button></a>";
						}
						$yyy = '';
					}
				} else {
					$abcde = 'sap';
					if ($row['flag_cancel'] == '2') {
						$pap = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bhold(\"" . $row['ket_cancel'] . "\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>";

						if (($level == '1') || ($level == '14')) {
							if ($row['skema'] != 1) {
								$pip = "<a href='" . base_url() . 'index.php/home/edit_allx' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
							} else {
								$pip = "";
							}
						} else {
							$pip = "";
						}
					} else if ($row['flag_cancel_sap'] == '2') {
						$pap = "<button type='button' class='btn btn-danger btn-block btn-xs btnholded' onclick='javascript:bhold(\"" . $row['ket_cancel'] . "\");' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>";

						if (($level == '1') || ($level == '14')) {
							if ($row['skema'] != 1) {
								$pip = "<a href='" . base_url() . 'index.php/home/edit_allx' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
							} else {
								$pip = "";
							}
						} else if ($level == 2) {
							if ($regional == 1) {
								if ($row['skema'] != 1) {
									$pip = "<a href='" . base_url() . 'index.php/home/edit_allx' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
								} else {
									$pip = "";
								}
							} else {
								// $pip = "";
								if ($row['skema'] != 1) {
									$pip = "<a href='" . base_url() . 'index.php/home/edit_allx' . '/'  . $abcde . '/'  . $row['nojo'] . "'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
								} else {
									$pip = "";
								}
							}
						} else {
							$pip = "";
						}
					} else {
						$pap = '<button type="button" class="btn ' . $stat . ' btn-block btn-xs btnapz" onclick="javascript:bappz(\'' . $row['nojo'] . '\',\'' . $btn . '\',\'' . $row['ket_rej'] . '\',\'' . $row['upd'] . '\',\'' . $row['ntype'] . '\',\'' . $row['id'] . '\');" id="btnapz" data-toggle="modal" data-target="#AmyModal">' . $btn . '</button>';
						$pip = "";
					}
				}


				if (($level == 3) || ($level == 15) || ($level == 18)) {
					$cuk = 'lv3';
					if ($row['type_jo'] == 2) {
						$m3m = "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' onclick='javascript:detailk(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\");' id='btndetail' data-toggle='modal' data-target='#KVXmyModal'>Detail</button> " . $vvv . " " . $yyy . " </td>";
					} else {
						$m3m = "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' onclick='javascript:detail(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\", \"" . $cuk . "\");' id='btndetail' data-toggle='modal' data-target='#AVXmyModal'>Detail</button> " . $vvv . " " . $yyy . " </td>";
					}
				} else {
					$cuk = 'lv2';
					if ($row['type_jo'] == 2) {
						$m3m = "<td><button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:detailx(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\", \"" . $level . "\");' id='btndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button> " . $pip . " </td>";
					} else {
						$m3m = "<td><button type='button' class='btn " . $stat . " btn-block btn-xs btndetail' onclick='javascript:detaily(\"" . $row['nojo'] . "\", \"" . $btn . "\", \"" . $row['id'] . "\", " . $kont . ", " . $kont2 . ", \"" . $row['upd'] . "\",\"" . $row['ntype'] . "\", \"" . $cuk . "\", \"" . $level . "\");' id='btndetail' data-toggle='modal' data-target='#LmyModal'>" . $btn . "</button> " . $pip . " </td>";
					}
				}

				if (($level == 3) || ($level == 15) || ($level == 18)) {
					if ($row['hr'] == '') {
						$wa = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'hr\',\'' . $row['hr'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnhr" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wa = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'hr\',\'' . $row['hr'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnhr" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['hr'] . '</td></a>';
					}

					if ($row['training'] == '') {
						$wd = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'training\',\'' . $row['training'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wd = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'training\',\'' . $row['training'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['training'] . '</td></a>';
					}

					if ($row['jmluser'] == '') {
						$wb = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'user\',\'' . $row['jmluser'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wb = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'user\',\'' . $row['jmluser'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnuser" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['jmluser'] . '</td></a>';
					}

					if ($row['rekrut'] == '') {
						$wc = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'rekrut\',\'' . $row['rekrut'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnrekrut" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">0</td></a>';
					} else {
						$wc = '<td><a href="#" onclick="javascript:add_hr(\'' . $row['id'] . '\',\'' . $row['jumlah'] . '\',\'' . $row['gender'] . '\',\'' . $row['pendidikan'] . '\',\'' . $cde . '\',\'rekrut\',\'' . $row['rekrut'] . '\', \'' . $row['nojo'] . '\', \'' . $row['kontrak'] . '\', \'' . $row['type_jo'] . '\', \'' . $row['type_new'] . '\', \'' . $row['lokasi'] . '\', \'' . $row['persa_sap'] . '\', \'' . $row['skill_sap'] . '\', \'' . $row['jabatan_sap'] . '\', \'' . $row['abkrs_sap'] . '\', \'' . $row['hire_jabatan_sap'] . '\');" id="btnrekrut" data-toggle="modal" data-target="#VmyModal" data-backdrop="static" data-keyboard="false">' . $row['rekrut'] . '</td></a>';
					}
				}


				if ($row['type_jo'] == 2) {
					$qwq = '1';
				} else {
					$qwq = $row['jumlah'];
				}

				if ($row['type_jo'] == 2) {
					$ab = '-';
				} else {
					$ab = $row['hr'];
				}

				if ($row['type_jo'] == 2) {
					$ac = '-';
				} else {
					$ac = $row['training'];
				}

				if ($row['type_jo'] == 2) {
					$ad = '-';
				} else {
					$ad = $row['jmluser'];
				}

				if ($row['type_jo'] == 2) {
					$ae = '-';
				} else {
					$ae = $row['rekrut'];
				}

				if ($row['type_jo'] == 2) {
					$af = '-';
				} else {
					$af = $row['note'];
				}

				if ($row['type_jo'] == 1) {
					if ($row['new_rekrut'] == 1) {
						$ppk = 'No Rekrut';
					} else {
						$ppk = 'Rekrut';
					}
				}
				if ($row['type_jo'] == 2) {
					if ($row['type_replace'] == 1) {
						$ppk = 'No Rekrut';
					} else {
						$ppk = 'Rekrut';
					}
				}


				if ($row['tyrekrut'] != '') {
					if ($row['type_jo'] == 1) {
						if ($row['type_new'] == 1) {
							$koiu = "New Project";
						} else {
							$koiu = "New Pengembangan";
						}
					} else {
						$koiu = "Replacement";
					}

					if ($row['tyrekrut'] == 1) {
						$ghj = "No Rekrutment";
					} else if ($row['tyrekrut'] == 3) {
						$ghj = "No Rekrutment (Existing)";
					} else {
						$ghj = "Rekrutment";
					}
				} else {
					if ($row['type_jo'] == 1) {
						if ($row['type_new'] == 1) {
							$koiu = "New Project";
							if ($row['new_rekrut'] == 1) {
								$ghj = "No Rekrutment";
							} else if ($row['new_rekrut'] == 3) {
								$ghj = "No Rekrutment (Existing)";
							} else {
								$ghj = "Rekrutment";
							}
						} else {
							$koiu = "New Pengembangan";
							if ($row['new_rekrut'] == 1) {
								$ghj = "No Rekrutment";
							} else if ($row['new_rekrut'] == 3) {
								$ghj = "No Rekrutment (Existing)";
							} else {
								$ghj = "Rekrutment";
							}
						}
					} else {
						$koiu = "Replacement";
						if ($row['rotasi_resign'] != '') {
							if ($row['rotasi_resign'] == '2') {
								$jrr = 'Rotasi/Mutasi';
							} elseif ($row['rotasi_resign'] == '1') {
								$jrr = 'Resign';
							} else {
								$jrr = 'Data Lama';
							}
							if ($row['type_replace'] == 1) {
								$ghj = "No Rekrutment -" . $jrr;
							} else if ($row['type_replace'] == 3) {
								$ghj = "No Rekrutment (Existing) -" . $jrr;
							} else {
								$ghj = "Rekrutment -" . $jrr;
							}
						} else {
							if ($row['type_replace'] == 1) {
								$ghj = "No Rekrutment";
							} else if ($row['type_replace'] == 3) {
								$ghj = "No Rekrutment (Existing) -" . $jrr;
							} else {
								$ghj = "Rekrutment";
							}
						}
					}
				}



				if ($row['lup_edit'] != null && $row['lup_edit'] != '') {
					$tglcr = $row['lup_edit'];
				} else {
					$tglcr = $row['tanggal'];
				}

				if ($row['jml_stop'] == '') {
					$mrn = $row['jumlah'];
				} else {
					$mrn = $row['jml_stop'];
				}

				if ($row['flag_peralihan'] == 1 && $row['rekrutx'] == 1) {
					if ($row['type_jo'] == 1) {
						if ($row['tyrekrut'] == 3) {
							$xxy = $row['status_pernernewjo'];
						} else {
							$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>" . $mrn . "</a></td>";
						}
					} else {
						if ($row['perner_ganti'] != '' and $row['perner_ganti'] != 'null' and !is_null($row['perner_ganti'])) {
							$xxy = "<td>1</td>";
						} else {
							$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $mrn . "</a></td>";
						}
					}
				} else {
					if ($row['jml_hire'] != '' or $row['jml_hire'] != null) {
						if ($row['type_jo'] == 1) {
							if ($row['tyrekrut'] == 3) {
								$xxy = $row['status_pernernewjo'];
							} else {
								$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>" . $row['jml_hire'] . "</a></td>";
							}
						} else {
							if ($row['tyrekrut'] == 1) {
								if ($row['status_pernernewjo'] == 4) {
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $row['jml_hire'] . "</a></td>";
								} else {
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $row['jml_hire'] . "</a></td>";
								}
							} else {
								$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>" . $row['jml_hire'] . "</a></td>";
							}
							// if($row['perner_ganti']!='' AND $row['perner_ganti']!='null' AND !is_null($row['perner_ganti'])){
							// $xxy = "<td>1</td>";
							// } else {
							// $xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>".$row['jml_hire']."</a></td>";
							// }
						}
					} else {
						if ($row['type_jo'] == 1) {
							if ($row['tyrekrut'] == 3) {
								$xxy = $row['status_pernernewjo'];
							} else {
								$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>0</a></td>";
							}
						} else {
							if ($row['tyrekrut'] == 1) {
								if ($row['status_pernernewjo'] == 4) {
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
								} else {
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
								}
							} else {
								if ($row['tyrekrut'] == 3) {
									if ($row['rfc_rotasi'] == 6) {
										$xxy = "<td>1</td>";
									} else {
										$xxy = "<td>0</td>";
									}
								} else {
									$xxy = "<td><a href='' onclick='javascript:gojobs(\"" . $row['id'] . "\", \"" . $row['type_jo'] . "\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
								}
							}
							// if($row['perner_ganti']!='' AND $row['perner_ganti']!='null' AND !is_null($row['perner_ganti'])){
							// $xxy = "<td>1</td>";
							// } else {
							// $xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
							// }
						}
					}
				}

				/*
				if($row['jml_hire']!='' or $row['jml_hire']!=null){
					if($row['type_jo']==1){
						$xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>".$row['jml_hire']."</a></td>";
					} else {
						if($row['perner_ganti']!='' AND $row['perner_ganti']!='null' AND !is_null($row['perner_ganti'])){
							$xxy = "<td>1</td>";
						} else {
							$xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>".$row['jml_hire']."</a></td>";
						}
					}
				} else {
					if($row['type_jo']==1){
						$xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_go'>0</a></td>";
					} else {
						if($row['perner_ganti']!='' AND $row['perner_ganti']!='null' AND !is_null($row['perner_ganti'])){
							$xxy = "<td>1</td>";
						} else {
							$xxy = "<td><a href='' onclick='javascript:gojobs(\"".$row['id']."\", \"".$row['type_jo']."\");' id='btngojobs' data-toggle='modal' data-target='#Modal_gorep'>0</a></td>";
						}
					}
				}
				*/

				if ($row['tbekerja'] != '' and $row['tbekerja'] != '0000-00-00') {
					$tbek = $row['tbekerja'];
				} else {
					$tbek = $row['bekerja'];
				}


				if (($level == 3) || ($level == 15) || ($level == 18)) {
					$output['data'][] = array(
						$row['id'],
						$row['nojo'],
						$tglcr,
						$row['upd'],
						$row['lama'] . ' bulan',
						$abc,
						$koiu,
						$ghj,
						$cde,
						// $row['bekerja'],
						$tbek,
						$fgh,
						$qwq,
						$xxy,
						$row['ket_rekrut'],
						$row['komentar'],
						$row['gender'],
						$row['ket_cancel'],
						$row['ket_rej'],
						$row['upd'],
						$row['ket_rekrut'],
						$m3m
					);
				} else {
					$output['data'][] = array(
						$row['id'],
						$row['nojo'],
						$row['tanggal'],
						$row['upd'],
						$row['lama'] . ' bulan',
						$abc,
						$koiu,
						$ghj,
						$cde,
						// $row['bekerja'],
						$tbek,
						$fgh,
						$qwq,
						$xxy,
						$af,
						$row['komentar'],
						$row['gender'],
						$row['ket_cancel'],
						$row['ket_rej'],
						$row['upd'],
						$row['ket_rekrut'],
						$m3m
					);
				}

				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	public function donlot_dokperal()
	{
		$session = $this->session->userdata('logged_in');
		ini_set('memory_limit', '-1');
		$tcr1  = $_GET['tcr1'];
		$tcr2  = $_GET['tcr2'];
		$data['listjo'] 	= $this->job_model->dok_peralihan($tcr1, $tcr2);
		// var_dump($data['listjo']);die;
		foreach ($data['listjo'] as $list) {
			if ($list['komponen'] != '') {
				$filename_komponen = '/mnt/drobo/88.41/uploads/' . $list['komponen'];
				// header('Content-disposition: attachment; filename="'.$FileName.'"');
				// readfile($FileName);

				// $filename = dirname(APPPATH).'/uploads/'.$list['komponen_bak'];
				$this->zip->read_file($filename_komponen);
			}
			if ($list['komponen_bak'] != '') {
				$filename_bak = '/mnt/drobo/88.41/uploads/' . $list['komponen_bak'];
				// header('Content-disposition: attachment; filename="'.$FileName.'"');
				// readfile($FileName);

				// $filename = dirname(APPPATH).'/uploads/'.$list['komponen_bak'];
				$this->zip->read_file($filename_bak);
			}
			if ($list['komponen_other'] != '') {
				$filename_other = '/mnt/drobo/88.41/uploads/' . $list['komponen_other'];
				// header('Content-disposition: attachment; filename="'.$FileName.'"');
				// readfile($FileName);

				// $filename = dirname(APPPATH).'/uploads/'.$list['komponen_bak'];
				$this->zip->read_file($filename_other);
			}
		}

		$this->zip->download('donlot_dok.zip');
	}
}
