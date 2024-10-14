<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Servicesrfc extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation', 'curl'));
		$this->load->model(array('job_model', 'skema_model'));
	}


	public function resign($id)
	{
		//untuk services nya
		//$query = $this->db->query("SELECT id FROM trans_perner a WHERE a.skema='1' and rotasi_resign='1' and flagrfc IN (1,2,3) ")->result_array();

		//$query = $this->db->query("SELECT id FROM trans_perner a WHERE a.skema='1' AND rotasi_resign='1' AND type_rep IS NOT NULL AND (flagrfc IN (1,2,3) OR flagrfc IS NULL) ")->result_array();

		$detrinc = $this->db->query("SELECT a.*, date_format(tgl_resign,'%Y%m%d') as tglres, date_format(tgl_resign,'%d.%m.%Y') as tglresx, date_format(tgl_resign,'%Y%m') as tglresy, date_format(tglbekerja,'%d.%m.%Y') as sbekerja, date_format(tglbekerja,'%m/%Y') as sbekerja2, date_format(tglbekerja,'%m.%Y') as sbekerjax, date_format(tglbekerja,'%Y%m%d') as sbekerja_limit, date_format(tglbekerja,'%Y-%m') as mlimit, a.massn FROM trans_perner a WHERE a.id='$id' ")->row();

		$detrinc_ganti = $this->db->query("SELECT a.*, date_format(arber,'%d.%m.%Y') as ebekerja FROM trans_perner_ganti a WHERE a.nojo='" . $detrinc->nojo . "' and a.perner_resrot='" . $detrinc->perner . "' and a.perner_ganti='" . $detrinc->perner_ganti . "' ")->row();

		$this->db70 = $this->load->database('db70', TRUE);
		$cekhiring  = $this->db70->query("SELECT userid, recruitreqid FROM recruitment.hiring WHERE perner='" . $detrinc->perner . "' ")->row();

		$tglm = explode('-', $detrinc->mlimit);
		$tgls = $tglm[1] - 1;
		$tgla = $this->lastOfMonth($tglm[0], $tgls);

		$nowx = date("Y-m-d H:i:s");

		// $posty = array (
		// "token"		=> 'ish@2019!',
		// "PERNR"		=> $detrinc->perner,
		// "BEGDA"		=> $detrinc->tglres,
		// "ENDDA"		=> '99991231',
		// "MASSN"		=> 'Z8',
		// "MASSG"		=> $detrinc->alasan_rotres,
		// "WERKS"		=> $detrinc->persa,
		// "PERSG"		=> '5',
		// "PERSK"		=> $detrinc->skilllayanan,
		// "BTRTL"		=> $detrinc->area,
		// "ABKRS"		=> $detrinc->abkrs,
		// "ANSVH"		=> $detrinc->ansvh,
		// "PLANS"		=> $detrinc->jabatan
		// );

		// var_dump($posty);die;

		// if($detrinc->rotasi_resign=='1'){

		if ($detrinc->massn == 'Z8') {
			$message = "successful Resign";
			$this->db->query("Update trans_perner set flagrfc='4',message_rfc='$message',tgl_rfc='$nowx' Where id='$id' ");
			$this->db70->query("Update recruitment.hiring set statushiring='7' Where perner='" . $detrinc->perner . "' ");
			$this->db70->query("Update recruitment.recruitmentcandidate set status='26' Where userid='" . $cekhiring->userid . "' and recruitreqid='" . $cekhiring->recruitreqid . "' ");
			$retpos = ['status' => "OK", 'message' => $message];
			print_r(json_encode($retpos));
		} else {
			$postx = array(
				"token"		=> 'ish@2019!',
				"ABKRS"		=> $detrinc->abkrs
			);
			$this->curl->create('http://192.168.88.5/service/index.php/Rfccekpayrollcontroll');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$this->curl->post($postx);
			$lllx = json_decode($this->curl->execute());
			$pppx = $lllx->status;
			if ($pppx == 1) {
				$posty = array(
					"token"		=> 'ish@2019!',
					"PERNR"		=> $detrinc->perner,
					"BEGDA"		=> $detrinc->tglres,
					"ENDDA"		=> '99991231',
					"MASSN"		=> 'Z8',
					"MASSG"		=> $detrinc->alasan_rotres,
					"WERKS"		=> $detrinc->persa,
					"PERSG"		=> '5',
					"PERSK"		=> $detrinc->skilllayanan,
					"BTRTL"		=> $detrinc->area,
					"ABKRS"		=> $detrinc->abkrs,
					"ANSVH"		=> $detrinc->ansvh,
					"PLANS"		=> $detrinc->jabatan
				);
				// var_dump($posty);die();
				$this->curl->create('http://192.168.88.5/service/index.php/Rfcresign');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$this->curl->post($posty);
				$jjjx = json_decode($this->curl->execute());

				// var_dump($jjjx);die;

				if ($jjjx->CODE == 'S') {
					$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
					$infotype = ['0041', '0035'];
					$request_data = [
						[
							'pernr' => "$detrinc->perner",
							'inftypList' => $infotype,
							'p00041List' => [
								[
									'endda' => '',
									'begda' => '',
									'operation' => 'INS',
									'pernr' => $detrinc->perner,
									'infty' => '0041',
									'dar01' => '',
									'dat01' => '',
									'dar02' => '',
									'dat02' => '',
								]
							],

							'p00035List' => [
								[
									'endda' => '31.12.9999',
									'begda' => $detrinc->tglresx,
									'operation' => 'INS',
									'pernr' => $detrinc->perner,
									'infty' => '0035',
									'subty' => 'Z8',
									'itxex' => 'X',
									'dat35' => $detrinc->tglresx,
								]
							],
						]
					];

					$json = json_encode($request_data);

					$headers  = [
						'Content-Type: application/json',
						'cache-control: no-cache"=',
					];

					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

					$response = curl_exec($ch);
					curl_close($ch);
					$ret = json_decode($response);

					// var_dump($ret);die;

					$log = array();
					foreach ($ret as $key => $value) {
						if ($value->success != 1) {
							$log  = $value->message;
						}
					}
					if ($log) {
						$message = $log;
						$this->db->query("Update trans_perner set flagrfc='3',message_rfc='$message',tgl_rfc='$nowx' Where id='$id' ");
						$retpos = ['status' => "NOK", 'message' => "$message"];
						print_r(json_encode($retpos));
					} else {
						$message = "successful Resign";
						$this->db->query("Update trans_perner set flagrfc='4',message_rfc='$message',tgl_rfc='$nowx' Where id='$id' ");
						$this->db70->query("Update recruitment.hiring set statushiring='7' Where perner='" . $detrinc->perner . "' ");
						$this->db70->query("Update recruitment.recruitmentcandidate set status='26' Where userid='" . $cekhiring->userid . "' and recruitreqid='" . $cekhiring->recruitreqid . "' ");
						$retpos = ['status' => "OK", 'message' => $message];
						print_r(json_encode($retpos));
					}
				} else {
					$message = $jjjx->MESSAGE;
					$this->db->query("Update trans_perner set flagrfc='2',message_rfc='$message',tgl_rfc='$nowx' Where id='$id' ");
					$retpos = ['status' => "NOK", 'message' => "$message"];
					print_r(json_encode($retpos));
				}
			} else {
				$this->db->query("Update trans_perner set flagrfc='1',message_rfc='Error CekPayrollControl',tgl_rfc='$nowx' Where id='$id' ");
				$retpos = ['status' => "NOK", 'message' => "Error CekPayrollControl"];
				print_r(json_encode($retpos));
			}
		}
		// }
	}


	function rotasi($id)
	{
		//untuk services nya
		//$query = $this->db->query("SELECT id FROM trans_perner a WHERE a.skema='1' and rotasi_resign='1' and a.type_rep='3' and a.flagrfc='4' ")->result_array();

		//$query = $this->db->query("SELECT id FROM trans_perner a WHERE a.skema='1' AND a.type_rep='3' ")->result_array();

		$cekrot = $this->db->query("SELECT rotasi_resign FROM trans_perner a WHERE a.id='$id' ")->row();
		if ($cekrot->rotasi_resign == 1) {
			$detrinc = $this->db->query("SELECT a.*, date_format(tgl_resign,'%Y%m%d') as tglres, date_format(tgl_resign,'%d.%m.%Y') as tglresx, date_format(tglbekerja,'%Y%m') as tglresy, date_format(tglbekerja,'%d.%m.%Y') as sbekerja, date_format(tglbekerja,'%m/%Y') as sbekerja2, date_format(tglbekerja,'%m.%Y') as sbekerjax, date_format(tglbekerja,'%Y%m%d') as sbekerja_limit, date_format(tglbekerja,'%Y-%m') as mlimit FROM trans_perner a WHERE a.id='$id' and flagrfc='4' ")->row();
		} else if ($cekrot->rotasi_resign == 2) {
			$detrinc = $this->db->query("SELECT a.*, date_format(tgl_resign,'%Y%m%d') as tglres, date_format(tgl_resign,'%d.%m.%Y') as tglresx, date_format(tglbekerja,'%Y%m') as tglresy, date_format(tglbekerja,'%d.%m.%Y') as sbekerja, date_format(tglbekerja,'%m/%Y') as sbekerja2, date_format(tglbekerja,'%m.%Y') as sbekerjax, date_format(tglbekerja,'%Y%m%d') as sbekerja_limit, date_format(tglbekerja,'%Y-%m') as mlimit FROM trans_perner a WHERE a.id='$id' ")->row();
		}


		$detrinc_ganti = $this->db->query("SELECT a.*, date_format(arber,'%d.%m.%Y') as ebekerja FROM trans_perner_ganti a WHERE a.nojo='" . $detrinc->nojo . "' and a.perner_resrot='" . $detrinc->perner . "' and a.perner_ganti='" . $detrinc->perner_ganti . "' and (flagrfc NOT IN (6) OR flagrfc IS NULL)  ")->row();

		$nowx = date("Y-m-d H:i:s");

		if (!empty($detrinc->id)) {
			if (!empty($detrinc_ganti->id)) {
				$id_ganti = $detrinc_ganti->id;

				// $tglm = explode('-',$detrinc->mlimit);
				// $tgls = $tglm[1]-1;
				// $tgla = $this->lastOfMonth($tglm[0],$tgls);

				$tglm = explode('-', $detrinc->mlimit);
				if ($tglm[1] == '01') {
					$tgls = 12;
					$tglt = $tglm[0] - 1;
				} else {
					$tgly = $tglm[1] - 1;
					if ($tgly >= 10) {
						$tgls = $tglm[1] - 1;
					} else {
						$tgls = '0' . strval($tglm[1] - 1);
					}
					$tglt = $tglm[0];
				}
				$tgla = $this->lastOfMonth($tglt, $tgls);

				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_objidskm');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"), 'PLANS' => $detrinc->jabatan);
				$this->curl->post($post);
				$xobjid = json_decode($this->curl->execute());
				$kobjid = $xobjid->STELL;

				if ($$detrinc_ganti->flagrfc == '' or $$detrinc_ganti->flagrfc == null or $$detrinc_ganti->flagrfc == 1) {
					$postz = array(
						"token"		=> 'ish@2019!',
						"STELL"		=> "$kobjid",
						"WERKS"		=> $detrinc->persa,
						"PERSK"		=> $detrinc->skilllayanan,
						"BTRTL"		=> $detrinc->area,
						"ABKRS"		=> $detrinc->abkrs,
					);

					$this->curl->create('http://192.168.88.5/service/index.php/Rfccekposisi');
					$this->curl->option('buffersize', 10);
					$options = array(
						// 'URL'             => $url,
						'HEADER'          => 0,
						'AUTOREFERER'     => true,
						'FOLLOWLOCATION'  => true,
						'TIMEOUT'         => 1000,
						'RETURNTRANSFER'  => 1,
					);
					$this->curl->http_login('devappish', 'devappish!@#');
					$this->curl->post($postz, $options);
					$lll = json_decode($this->curl->execute());
					$ppp = $lll->CODE;
					// var_dump($lll);var_dump($ppp);
					if ($ppp == 'S') {
						$this->db->query("Update trans_perner_ganti set posisi='" . $lll->MESSAGE . "',tgl_rfc='$nowx' Where id='" . $detrinc_ganti->id . "' ");
						$postx = array(
							"token"		=> 'ish@2019!',
							"ABKRS"		=> $detrinc->abkrs
						);
						$this->curl->create('http://192.168.88.5/service/index.php/Rfccekpayrollcontroll');
						$this->curl->option('buffersize', 10);
						$this->curl->http_login('devappish', 'devappish!@#');
						$this->curl->post($postx);
						$sss = json_decode($this->curl->execute());
						$yyy = $sss->status;
						// var_dump($yyy);
						if ($yyy == 1) {
							$posty = array(
								"token"		=> 'ish@2019!',
								"STELL"		=> $kobjid,
								"PERNR"		=> $detrinc->perner_ganti,
								"BEGDA"		=> $detrinc->tglresy . '01',
								"MASSN"		=> $detrinc_ganti->kodez_rotasi,
								"MASSG"		=> $detrinc_ganti->alasan_rotasi,
								"WERKS"		=> $detrinc->persa,
								"PERSK"		=> $detrinc->skilllayanan,
								"BTRTL"		=> $detrinc->area,
								"ABKRS"		=> $detrinc->abkrs,
								"ANSVH"		=> $detrinc->ansvh,
								"POSISI"	=> $lll->MESSAGE,
							);
							$this->curl->create('http://192.168.88.5/service/index.php/Rfcrotasi');
							$this->curl->option('buffersize', 10);
							$this->curl->http_login('devappish', 'devappish!@#');
							$this->curl->post($posty);
							$jjj = json_decode($this->curl->execute());
							// var_dump($jjj->CODE);
							if ($jjj->CODE == 'S') {
								$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
								$infotype = ['0041', '0008', '0016', '0035'];
								$request_data = [
									[
										'pernr' => "$detrinc->perner_ganti",
										'inftypList' => $infotype,
										'p00041List' => [
											[
												'endda' => '',
												'begda' => '',
												'operation' => 'INS',
												'pernr' => "$detrinc->perner_ganti",
												'infty' => '0041',
												'dar01' => '',
												'dat01' => '',
												'dar02' => '',
												'dat02' => '',
											]
										],

										'p00008List' => [
											[
												'endda' => '31.12.9999',
												'begda' => '01.' . $detrinc->sbekerjax,
												'operation' => 'INS',
												'pernr' => "$detrinc->perner_ganti",
												'infty' => '0008',
												'trfar' => "$detrinc->level",
												'trfgb' => "$detrinc->trfgb",
												'trfgr' => "$detrinc->level",
												'trfst' => '01', //default
												'waers' => 'IDR',
											]
										],

										'p00016List' => [
											[
												'endda' => '31.12.9999',
												'begda' => '01.' . $detrinc->sbekerjax,
												'operation' => 'INS',
												'pernr' => $detrinc->perner_ganti,
												'infty' => '0016',
												'lfzfr' => '',
												'lfzzh' => '',
												'lfzso' => '',
												'kgzfr' => '',
												'kgzzh' => '',
												'prbzt' => '',
												'prbeh' => '',
												'kdgfr' => '',
												'kdgf2' => '',
												'arber' => $detrinc_ganti->ebekerja,
												'konsl' => '59',
												'cttyp' => $detrinc->cttyp,
												'zwrkpl' => $detrinc->perner_ganti . '/' . $detrinc->sbekerja . '/ISH/' . $detrinc->persa . '/' . $detrinc->ansvh . '/' . $detrinc->sbekerja2,
											]
										],

										'p00035List' => [
											[
												'endda' => '31.12.9999',
												'begda' => '01.' . $detrinc->sbekerjax,
												'operation' => 'INS',
												'pernr' => $detrinc->perner_ganti,
												'infty' => '0035',
												'subty' => $detrinc_ganti->kodez_rotasi,
												'itxex' => 'X',
												'dat35' => $detrinc->sbekerja,
											]
										],
									]
								];

								// var_dump($request_data);

								$json = json_encode($request_data);

								$headers  = [
									'Content-Type: application/json',
									'cache-control: no-cache"=',
								];


								$ch = curl_init();

								curl_setopt($ch, CURLOPT_URL, $url);
								curl_setopt($ch, CURLOPT_POST, 1);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
								curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
								curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


								$response = curl_exec($ch);
								curl_close($ch);
								// var_dump($response);
								$ret = json_decode($response);
								$log = array();
								foreach ($ret as $key => $value) {
									if ($value->success != 1) {
										$log  = $value->message;
									}
								}
								if ($log) {
									$message = $log;
									$this->db->query("Update trans_perner_ganti set flagrfc='4',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
									$retpos = ['status' => "NOK", 'message' => $message];
									print_r(json_encode($retpos));
								} else {
									$postx = array(
										"PERNR"		=> $detrinc->perner_ganti,
										"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
										"token"		=> 'ish@2019!',
									);
									$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
									$this->curl->option('buffersize', 10);
									$this->curl->http_login('devappish', 'devappish!@#');
									$this->curl->post($postx);
									$bbb = json_decode($this->curl->execute());
									// var_dump($bbb);
									if ($bbb->TYPE == 'S') {
										$message = "Succesful Delimit";
										$this->db->query("Update trans_perner_ganti set flagrfc='6',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
										$retpos = ['status' => "OK", 'message' => $message];
										print_r(json_encode($retpos));
									} else {
										$message = $bbb->MESSAGE;
										$this->db->query("Update trans_perner_ganti set flagrfc='5',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
										$retpos = ['status' => "NOK", 'message' => $message];
										print_r(json_encode($retpos));
									}
								}
							} else {
								$message = $jjj->MESSAGE;
								$this->db->query("Update trans_perner_ganti set flagrfc='3',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
								$retpos = ['status' => "NOK", 'message' => "$message"];
								print_r(json_encode($retpos));
							}
						} else {
							$this->db->query("Update trans_perner_ganti set flagrfc='2',message_rfc='Error CekPayrollControl',tgl_rfc='$nowx' Where id='$id_ganti' ");
							$retpos = ['status' => "NOK", 'message' => "Error CekPayrollControl"];
							print_r(json_encode($retpos));
						}
					} else {
						$message = $lll->MESSAGE;
						$this->db->query("Update trans_perner_ganti set flagrfc='1',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
						$retpos = ['status' => "NOK", 'message' => "$message"];
						print_r(json_encode($retpos));
					}
				}




				if ($$detrinc_ganti->flagrfc == 2) {
					$postx = array(
						"token"		=> 'ish@2019!',
						"ABKRS"		=> $detrinc->abkrs
					);
					$this->curl->create('http://192.168.88.5/service/index.php/Rfccekpayrollcontroll');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$this->curl->post($postx);
					$sss = json_decode($this->curl->execute());
					$yyy = $sss->status;
					// var_dump($yyy);
					if ($yyy == 1) {
						$posty = array(
							"token"		=> 'ish@2019!',
							"STELL"		=> $kobjid,
							"PERNR"		=> $detrinc->perner_ganti,
							"BEGDA"		=> $detrinc->tglresy . '01',
							"MASSN"		=> $detrinc_ganti->kodez_rotasi,
							"MASSG"		=> $detrinc_ganti->alasan_rotasi,
							"WERKS"		=> $detrinc->persa,
							"PERSK"		=> $detrinc->skilllayanan,
							"BTRTL"		=> $detrinc->area,
							"ABKRS"		=> $detrinc->abkrs,
							"ANSVH"		=> $detrinc->ansvh,
							"POSISI"	=> $detrinc_ganti->posisi,
						);
						$this->curl->create('http://192.168.88.5/service/index.php/Rfcrotasi');
						$this->curl->option('buffersize', 10);
						$this->curl->http_login('devappish', 'devappish!@#');
						$this->curl->post($posty);
						$jjj = json_decode($this->curl->execute());
						// var_dump($jjj->CODE);
						if ($jjj->CODE == 'S') {
							$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
							$infotype = ['0041', '0008', '0016', '0035'];
							$request_data = [
								[
									'pernr' => "$detrinc->perner_ganti",
									'inftypList' => $infotype,
									'p00041List' => [
										[
											'endda' => '',
											'begda' => '',
											'operation' => 'INS',
											'pernr' => "$detrinc->perner_ganti",
											'infty' => '0041',
											'dar01' => '',
											'dat01' => '',
											'dar02' => '',
											'dat02' => '',
										]
									],

									'p00008List' => [
										[
											'endda' => '31.12.9999',
											'begda' => '01.' . $detrinc->sbekerjax,
											'operation' => 'INS',
											'pernr' => "$detrinc->perner_ganti",
											'infty' => '0008',
											'trfar' => "$detrinc->level",
											'trfgb' => "$detrinc->trfgb",
											'trfgr' => "$detrinc->level",
											'trfst' => '01', //default
											'waers' => 'IDR',
										]
									],

									'p00016List' => [
										[
											'endda' => '31.12.9999',
											'begda' => '01.' . $detrinc->sbekerjax,
											'operation' => 'INS',
											'pernr' => $detrinc->perner_ganti,
											'infty' => '0016',
											'lfzfr' => '',
											'lfzzh' => '',
											'lfzso' => '',
											'kgzfr' => '',
											'kgzzh' => '',
											'prbzt' => '',
											'prbeh' => '',
											'kdgfr' => '',
											'kdgf2' => '',
											'arber' => $detrinc_ganti->ebekerja,
											'konsl' => '59',
											'cttyp' => $detrinc->cttyp,
											'zwrkpl' => $detrinc->perner_ganti . '/' . $detrinc->sbekerja . '/ISH/' . $detrinc->persa . '/' . $detrinc->ansvh . '/' . $detrinc->sbekerja2,
										]
									],

									'p00035List' => [
										[
											'endda' => '31.12.9999',
											'begda' => '01.' . $detrinc->sbekerjax,
											'operation' => 'INS',
											'pernr' => $detrinc->perner_ganti,
											'infty' => '0035',
											'subty' => $detrinc_ganti->kodez_rotasi,
											'itxex' => 'X',
											'dat35' => $detrinc->sbekerja,
										]
									],
								]
							];

							// var_dump($request_data);

							$json = json_encode($request_data);

							$headers  = [
								'Content-Type: application/json',
								'cache-control: no-cache"=',
							];


							$ch = curl_init();

							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


							$response = curl_exec($ch);
							curl_close($ch);
							// var_dump($response);
							$ret = json_decode($response);
							$log = array();
							foreach ($ret as $key => $value) {
								if ($value->success != 1) {
									$log  = $value->message;
								}
							}
							if ($log) {
								$message = $log;
								$this->db->query("Update trans_perner_ganti set flagrfc='4',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
								$retpos = ['status' => "NOK", 'message' => $message];
								print_r(json_encode($retpos));
							} else {
								$postx = array(
									"PERNR"		=> $detrinc->perner_ganti,
									"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
									"token"		=> 'ish@2019!',
								);
								$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
								$this->curl->option('buffersize', 10);
								$this->curl->http_login('devappish', 'devappish!@#');
								$this->curl->post($postx);
								$bbb = json_decode($this->curl->execute());
								// var_dump($bbb);
								if ($bbb->TYPE == 'S') {
									$message = "Succesful Delimit";
									$this->db->query("Update trans_perner_ganti set flagrfc='6',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
									$retpos = ['status' => "OK", 'message' => $message];
									print_r(json_encode($retpos));
								} else {
									$message = $bbb->MESSAGE;
									$this->db->query("Update trans_perner_ganti set flagrfc='5',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
									$retpos = ['status' => "NOK", 'message' => $message];
									print_r(json_encode($retpos));
								}
							}
						} else {
							$message = $jjj->MESSAGE;
							$this->db->query("Update trans_perner_ganti set flagrfc='3',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
							$retpos = ['status' => "NOK", 'message' => "$message"];
							print_r(json_encode($retpos));
						}
					} else {
						$this->db->query("Update trans_perner_ganti set flagrfc='2',message_rfc='Error CekPayrollControl',tgl_rfc='$nowx' Where id='$id_ganti' ");
						$retpos = ['status' => "NOK", 'message' => "Error CekPayrollControl"];
						print_r(json_encode($retpos));
					}
				}





				if ($$detrinc_ganti->flagrfc == 3) {
					$posty = array(
						"token"		=> 'ish@2019!',
						"STELL"		=> $kobjid,
						"PERNR"		=> $detrinc->perner_ganti,
						"BEGDA"		=> $detrinc->tglresy . '01',
						"MASSN"		=> $detrinc_ganti->kodez_rotasi,
						"MASSG"		=> $detrinc_ganti->alasan_rotasi,
						"WERKS"		=> $detrinc->persa,
						"PERSK"		=> $detrinc->skilllayanan,
						"BTRTL"		=> $detrinc->area,
						"ABKRS"		=> $detrinc->abkrs,
						"ANSVH"		=> $detrinc->ansvh,
						"POSISI"	=> $detrinc_ganti->posisi,
					);
					$this->curl->create('http://192.168.88.5/service/index.php/Rfcrotasi');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$this->curl->post($posty);
					$jjj = json_decode($this->curl->execute());
					// var_dump($jjj->CODE);
					if ($jjj->CODE == 'S') {
						$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
						$infotype = ['0041', '0008', '0016', '0035'];
						$request_data = [
							[
								'pernr' => "$detrinc->perner_ganti",
								'inftypList' => $infotype,
								'p00041List' => [
									[
										'endda' => '',
										'begda' => '',
										'operation' => 'INS',
										'pernr' => "$detrinc->perner_ganti",
										'infty' => '0041',
										'dar01' => '',
										'dat01' => '',
										'dar02' => '',
										'dat02' => '',
									]
								],

								'p00008List' => [
									[
										'endda' => '31.12.9999',
										'begda' => '01.' . $detrinc->sbekerjax,
										'operation' => 'INS',
										'pernr' => "$detrinc->perner_ganti",
										'infty' => '0008',
										'trfar' => "$detrinc->level",
										'trfgb' => "$detrinc->trfgb",
										'trfgr' => "$detrinc->level",
										'trfst' => '01', //default
										'waers' => 'IDR',
									]
								],

								'p00016List' => [
									[
										'endda' => '31.12.9999',
										'begda' => '01.' . $detrinc->sbekerjax,
										'operation' => 'INS',
										'pernr' => $detrinc->perner_ganti,
										'infty' => '0016',
										'lfzfr' => '',
										'lfzzh' => '',
										'lfzso' => '',
										'kgzfr' => '',
										'kgzzh' => '',
										'prbzt' => '',
										'prbeh' => '',
										'kdgfr' => '',
										'kdgf2' => '',
										'arber' => $detrinc_ganti->ebekerja,
										'konsl' => '59',
										'cttyp' => $detrinc->cttyp,
										'zwrkpl' => $detrinc->perner_ganti . '/' . $detrinc->sbekerja . '/ISH/' . $detrinc->persa . '/' . $detrinc->ansvh . '/' . $detrinc->sbekerja2,
									]
								],

								'p00035List' => [
									[
										'endda' => '31.12.9999',
										'begda' => '01.' . $detrinc->sbekerjax,
										'operation' => 'INS',
										'pernr' => $detrinc->perner_ganti,
										'infty' => '0035',
										'subty' => $detrinc_ganti->kodez_rotasi,
										'itxex' => 'X',
										'dat35' => $detrinc->sbekerja,
									]
								],
							]
						];

						// var_dump($request_data);

						$json = json_encode($request_data);

						$headers  = [
							'Content-Type: application/json',
							'cache-control: no-cache"=',
						];


						$ch = curl_init();

						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


						$response = curl_exec($ch);
						curl_close($ch);
						// var_dump($response);
						$ret = json_decode($response);
						$log = array();
						foreach ($ret as $key => $value) {
							if ($value->success != 1) {
								$log  = $value->message;
							}
						}
						if ($log) {
							$message = $log;
							$this->db->query("Update trans_perner_ganti set flagrfc='4',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
							$retpos = ['status' => "NOK", 'message' => $message];
							print_r(json_encode($retpos));
						} else {
							$postx = array(
								"PERNR"		=> $detrinc->perner_ganti,
								"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
								"token"		=> 'ish@2019!',
							);
							$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
							$this->curl->option('buffersize', 10);
							$this->curl->http_login('devappish', 'devappish!@#');
							$this->curl->post($postx);
							$bbb = json_decode($this->curl->execute());
							// var_dump($bbb);
							if ($bbb->TYPE == 'S') {
								$message = "Succesful Delimit";
								$this->db->query("Update trans_perner_ganti set flagrfc='6',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
								$retpos = ['status' => "OK", 'message' => $message];
								print_r(json_encode($retpos));
							} else {
								$message = $bbb->MESSAGE;
								$this->db->query("Update trans_perner_ganti set flagrfc='5',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
								$retpos = ['status' => "NOK", 'message' => $message];
								print_r(json_encode($retpos));
							}
						}
					} else {
						$message = $jjj->MESSAGE;
						$this->db->query("Update trans_perner_ganti set flagrfc='3',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
						$retpos = ['status' => "NOK", 'message' => "$message"];
						print_r(json_encode($retpos));
					}
				}





				if ($$detrinc_ganti->flagrfc == 4) {
					$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
					$infotype = ['0041', '0008', '0016', '0035'];
					$request_data = [
						[
							'pernr' => "$detrinc->perner_ganti",
							'inftypList' => $infotype,
							'p00041List' => [
								[
									'endda' => '',
									'begda' => '',
									'operation' => 'INS',
									'pernr' => "$detrinc->perner_ganti",
									'infty' => '0041',
									'dar01' => '',
									'dat01' => '',
									'dar02' => '',
									'dat02' => '',
								]
							],

							'p00008List' => [
								[
									'endda' => '31.12.9999',
									'begda' => '01.' . $detrinc->sbekerjax,
									'operation' => 'INS',
									'pernr' => "$detrinc->perner_ganti",
									'infty' => '0008',
									'trfar' => "$detrinc->level",
									'trfgb' => "$detrinc->trfgb",
									'trfgr' => "$detrinc->level",
									'trfst' => '01', //default
									'waers' => 'IDR',
								]
							],

							'p00016List' => [
								[
									'endda' => '31.12.9999',
									'begda' => '01.' . $detrinc->sbekerjax,
									'operation' => 'INS',
									'pernr' => $detrinc->perner_ganti,
									'infty' => '0016',
									'lfzfr' => '',
									'lfzzh' => '',
									'lfzso' => '',
									'kgzfr' => '',
									'kgzzh' => '',
									'prbzt' => '',
									'prbeh' => '',
									'kdgfr' => '',
									'kdgf2' => '',
									'arber' => $detrinc_ganti->ebekerja,
									'konsl' => '59',
									'cttyp' => $detrinc->cttyp,
									'zwrkpl' => $detrinc->perner_ganti . '/' . $detrinc->sbekerja . '/ISH/' . $detrinc->persa . '/' . $detrinc->ansvh . '/' . $detrinc->sbekerja2,
								]
							],

							'p00035List' => [
								[
									'endda' => '31.12.9999',
									'begda' => '01.' . $detrinc->sbekerjax,
									'operation' => 'INS',
									'pernr' => $detrinc->perner_ganti,
									'infty' => '0035',
									'subty' => $detrinc_ganti->kodez_rotasi,
									'itxex' => 'X',
									'dat35' => $detrinc->sbekerja,
								]
							],
						]
					];

					// var_dump($request_data);

					$json = json_encode($request_data);

					$headers  = [
						'Content-Type: application/json',
						'cache-control: no-cache"=',
					];


					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


					$response = curl_exec($ch);
					curl_close($ch);
					// var_dump($response);
					$ret = json_decode($response);
					$log = array();
					foreach ($ret as $key => $value) {
						if ($value->success != 1) {
							$log  = $value->message;
						}
					}
					if ($log) {
						$message = $log;
						$this->db->query("Update trans_perner_ganti set flagrfc='4',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
						$retpos = ['status' => "NOK", 'message' => $message];
						print_r(json_encode($retpos));
					} else {
						$postx = array(
							"PERNR"		=> $detrinc->perner_ganti,
							"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
							"token"		=> 'ish@2019!',
						);
						$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
						$this->curl->option('buffersize', 10);
						$this->curl->http_login('devappish', 'devappish!@#');
						$this->curl->post($postx);
						$bbb = json_decode($this->curl->execute());
						// var_dump($bbb);
						if ($bbb->TYPE == 'S') {
							$message = "Succesful Delimit";
							$this->db->query("Update trans_perner_ganti set flagrfc='6',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
							$retpos = ['status' => "OK", 'message' => $message];
							print_r(json_encode($retpos));
						} else {
							$message = $bbb->MESSAGE;
							$this->db->query("Update trans_perner_ganti set flagrfc='5',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
							$retpos = ['status' => "NOK", 'message' => $message];
							print_r(json_encode($retpos));
						}
					}
				}






				if ($$detrinc_ganti->flagrfc == 5) {
					$postx = array(
						"PERNR"		=> $detrinc->perner_ganti,
						"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
						"token"		=> 'ish@2019!',
					);
					$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$this->curl->post($postx);
					$bbb = json_decode($this->curl->execute());
					// var_dump($bbb);
					if ($bbb->TYPE == 'S') {
						$message = "Succesful Delimit";
						$this->db->query("Update trans_perner_ganti set flagrfc='6',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
						$retpos = ['status' => "OK", 'message' => $message];
						print_r(json_encode($retpos));
					} else {
						$message = $bbb->MESSAGE;
						$this->db->query("Update trans_perner_ganti set flagrfc='5',message_rfc='$message',tgl_rfc='$nowx' Where id='$id_ganti' ");
						$retpos = ['status' => "NOK", 'message' => $message];
						print_r(json_encode($retpos));
					}
				}
			} else {
				$retpos = ['status' => "OK", 'message' => 'Succesful Delimit'];
				print_r(json_encode($retpos));
			}
		} else {
			$retpos = ['status' => "OK", 'message' => 'Succesful Delimit'];
			print_r(json_encode($retpos));
		}
	}

	function rotasi_newjo($id)
	{
		// ini_set('max_execution_time', 0);
		//untuk services nya
		//$query = $this->db->query("SELECT a.id FROM perner_newjo a WHERE flagrfc NOT IN (6) OR flagrfc IS NULL ")->result_array();
		$cekdata = $this->db->query("SELECT perner, rincid, flagrfc, posisi FROM perner_newjo a WHERE id='$id' ")->row();

		$detrinc = $this->db->query("SELECT a.*, date_format(tgl_bekerja,'%Y%m') as tglresy, date_format(tgl_bekerja,'%d.%m.%Y') as sbekerja, date_format(tgl_bekerja,'%m/%Y') as sbekerja2, date_format(tgl_bekerja,'%m.%Y') as sbekerjax, date_format(tgl_bekerja,'%Y%m%d') as sbekerja_limit, date_format(tgl_bekerja,'%Y-%m') as mlimit FROM trans_rincian a WHERE a.id='" . $cekdata->rincid . "' ")->row();

		$this->db5 = $this->load->database('db_five', TRUE);
		$detrinc_ganti = $this->db5->query("Select date_format(arber,'%d.%m.%Y') as ebekerja From sapprofile1 Where pernr='" . $cekdata->perner . "' ")->row();
		$this->load->database('db_five', False);

		$cekansvh = $this->db->query("Select kdsap_ansvh, kd_cttyp From m_kontrak Where jenis='" . $detrinc->kontrak . "' ")->row();

		$nowx = date("Y-m-d H:i:s");


		$tglm = explode('-', $detrinc->mlimit);
		if ($tglm[1] == '01') {
			$tgls = 12;
			$tglt = $tglm[0] - 1;
		} else {
			$tgly = $tglm[1] - 1;
			if ($tgly >= 10) {
				$tgls = $tglm[1] - 1;
			} else {
				$tgls = '0' . strval($tglm[1] - 1);
			}
			$tglt = $tglm[0];
		}
		$tgla = $this->lastOfMonth($tglt, $tgls);


		if ($cekdata->flagrfc == '' or $cekdata->flagrfc == null or $cekdata->flagrfc == 1) {
			$postz = array(
				"token"		=> 'ish@2019!',
				"STELL"		=> $detrinc->jabatan_sap,
				"WERKS"		=> $detrinc->persa_sap,
				"PERSK"		=> $detrinc->skill_sap,
				"BTRTL"		=> $detrinc->area_sap,
				"ABKRS"		=> $detrinc->abkrs_sap
			);
			// var_dump($postz);die;
			// $url =
			$this->curl->create('http://192.168.88.5/service/index.php/Rfccekposisi');
			$this->curl->option('buffersize', 10);
			$options = array(
				// 'URL'             => $url,
				'HEADER'          => 0,
				'AUTOREFERER'     => true,
				'FOLLOWLOCATION'  => true,
				'TIMEOUT'         => 1000,
				'RETURNTRANSFER'  => 1,
			);
			$this->curl->http_login('devappish', 'devappish!@#');
			$this->curl->post($postz, $options);
			$lll = json_decode($this->curl->execute());
			// $lll =$this->curl->execute();
			// var_dump($lll);die;
			$ppp = $lll->CODE;
			// var_dump($ppp);
			if ($ppp == 'S') {
				// var_dump('AAA');
				$this->db->query("Update perner_newjo set posisi='" . $lll->MESSAGE . "',tgl_rfc='$nowx' Where id='$id' ");
				$postx = array(
					"token"		=> 'ish@2019!',
					"ABKRS"		=> $detrinc->abkrs_sap
				);
				$this->curl->create('http://192.168.88.5/service/index.php/Rfccekpayrollcontroll');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$this->curl->post($postx);
				$sss = json_decode($this->curl->execute());
				$yyy = $sss->status;
				// var_dump($yyy);
				if ($yyy == 1) {
					$posty = array(
						"token"		=> 'ish@2019!',
						// "STELL"		=> $kobjid,
						"STELL"		=> $detrinc->jabatan_sap,
						"PERNR"		=> $cekdata->perner,
						"BEGDA"		=> $detrinc->tglresy . '01',
						"MASSN"		=> $detrinc->kd_rotasi,
						"MASSG"		=> $detrinc->kd_reason,
						"WERKS"		=> $detrinc->persa_sap,
						"PERSK"		=> $detrinc->skill_sap,
						"BTRTL"		=> $detrinc->area_sap,
						"ABKRS"		=> $detrinc->abkrs_sap,
						"ANSVH"		=> $cekansvh->kdsap_ansvh,
						"POSISI"	=> $lll->MESSAGE,
					);
					$this->curl->create('http://192.168.88.5/service/index.php/Rfcrotasi');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$this->curl->post($posty);
					$jjj = json_decode($this->curl->execute());
					// $jjj =$this->curl->execute();
					// var_dump($jjj);die;
					// var_dump($jjj->CODE);
					if ($jjj->CODE == 'S') {
						$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
						$infotype = ['0041', '0008', '0016', '0035'];
						$request_data = [
							[
								'pernr' => "$cekdata->perner",
								'inftypList' => $infotype,
								'p00041List' => [
									[
										'endda' => '',
										'begda' => '',
										'operation' => 'INS',
										'pernr' => "$cekdata->perner",
										'infty' => '0041',
										'dar01' => '',
										'dat01' => '',
										'dar02' => '',
										'dat02' => '',
									]
								],

								'p00008List' => [
									[
										'endda' => '31.12.9999',
										'begda' => '01.' . $detrinc->sbekerjax,
										'operation' => 'INS',
										'pernr' => "$cekdata->perner",
										'infty' => '0008',
										'trfar' => "$detrinc->level_sap",
										// 'trfgb'=> "$detrinc->trfgb_sap",
										'trfgb' => "Z1",
										'trfgr' => "$detrinc->level_sap",
										'trfst' => '01', //default
										'waers' => 'IDR',
									]
								],

								'p00016List' => [
									[
										'endda' => '31.12.9999',
										'begda' => '01.' . $detrinc->sbekerjax,
										'operation' => 'INS',
										'pernr' => $cekdata->perner,
										'infty' => '0016',
										'lfzfr' => '',
										'lfzzh' => '',
										'lfzso' => '',
										'kgzfr' => '',
										'kgzzh' => '',
										'prbzt' => '',
										'prbeh' => '',
										'kdgfr' => '',
										'kdgf2' => '',
										'arber' => $detrinc_ganti->ebekerja,
										'konsl' => '59',
										'cttyp' => $cekansvh->kd_cttyp,
										'zwrkpl' => $cekdata->perner . '/' . $detrinc->sbekerja . '/ISH/' . $detrinc->persa_sap . '/' . $cekansvh->kdsap_ansvh . '/' . $detrinc->sbekerja2,
									]
								],

								'p00035List' => [
									[
										'endda' => '31.12.9999',
										'begda' => '01.' . $detrinc->sbekerjax,
										'operation' => 'INS',
										'pernr' => $cekdata->perner,
										'infty' => '0035',
										'subty' => 'Z2',
										'itxex' => 'X',
										'dat35' => $detrinc->sbekerja,
									]
								],
							]
						];

						// var_dump($request_data);

						$json = json_encode($request_data);

						// print_r($json);
          	// die;

						$headers  = [
							'Content-Type: application/json',
							'cache-control: no-cache"=',
						];


						$ch = curl_init();

						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


						$response = curl_exec($ch);
						curl_close($ch);
						// var_dump($response);
						$ret = json_decode($response);
						$log = array();
						foreach ($ret as $key => $value) {
							if ($value->success != 1) {
								$log  = $value->message;
							}
						}
						if ($log) {
							$message = $log;
							$this->db->query("Update perner_newjo set flagrfc='4',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
							$retpos = ['status' => "NOK", 'message' => $message];
							print_r(json_encode($retpos));
						} else {
							$postx = array(
								"PERNR"		=> $cekdata->perner,
								"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
								"token"		=> 'ish@2019!',
							);
							$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
							$this->curl->option('buffersize', 10);
							$this->curl->http_login('devappish', 'devappish!@#');
							$this->curl->post($postx);
							$bbb = json_decode($this->curl->execute());
							// var_dump($bbb);die();
							if ($bbb->TYPE == 'S') {
								$message = "Succesful Delimit";
								$this->db->query("Update perner_newjo set flagrfc='6',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
								$retpos = ['status' => "OK", 'message' => $message];
								print_r(json_encode($retpos));
							} else {
								$message = $bbb->MESSAGE;
								$this->db->query("Update perner_newjo set flagrfc='5',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
								$retpos = ['status' => "NOK", 'message' => $message];
								print_r(json_encode($retpos));
							}
						}
					} else {
						$message = $jjj->MESSAGE;
						$this->db->query("Update perner_newjo set flagrfc='3',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
						$retpos = ['status' => "NOK", 'message' => "$message"];
						print_r(json_encode($retpos));
					}
				} else {
					$this->db->query("Update perner_newjo set flagrfc='2',messagerfc='Error CekPayrollControl',tgl_rfc='$nowx' Where id='$id' ");
					$retpos = ['status' => "NOK", 'message' => "Error CekPayrollControl"];
					print_r(json_encode($retpos));
				}
			} else {
				// var_dump('BBB');
				$message = $lll->MESSAGE;
				$this->db->query("Update perner_newjo set flagrfc='1',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
				$retpos = ['status' => "NOK", 'message' => "$message"];
				print_r(json_encode($retpos));
			}
		}






		if ($cekdata->flagrfc == 2) {
			$postx = array(
				"token"		=> 'ish@2019!',
				"ABKRS"		=> $detrinc->abkrs_sap
			);
			$this->curl->create('http://192.168.88.5/service/index.php/Rfccekpayrollcontroll');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$this->curl->post($postx);
			$sss = json_decode($this->curl->execute());
			$yyy = $sss->status;
			// var_dump($yyy);
			if ($yyy == 1) {
				$posty = array(
					"token"		=> 'ish@2019!',
					// "STELL"		=> $kobjid,
					"STELL"		=> $detrinc->jabatan_sap,
					"PERNR"		=> $cekdata->perner,
					"BEGDA"		=> $detrinc->tglresy . '01',
					"MASSN"		=> $detrinc->kd_rotasi,
					"MASSG"		=> $detrinc->kd_reason,
					"WERKS"		=> $detrinc->persa_sap,
					"PERSK"		=> $detrinc->skill_sap,
					"BTRTL"		=> $detrinc->area_sap,
					"ABKRS"		=> $detrinc->abkrs_sap,
					"ANSVH"		=> $cekansvh->kdsap_ansvh,
					"POSISI"	=> $cekdata->posisi,
				);
				$this->curl->create('http://192.168.88.5/service/index.php/Rfcrotasi');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$this->curl->post($posty);
				$jjj = json_decode($this->curl->execute());
				// $jjj =$this->curl->execute();
				// var_dump($jjj);die;
				// var_dump($jjj->CODE);
				if ($jjj->CODE == 'S') {
					$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
					$infotype = ['0041', '0008', '0016', '0035'];
					$request_data = [
						[
							'pernr' => "$cekdata->perner",
							'inftypList' => $infotype,
							'p00041List' => [
								[
									'endda' => '',
									'begda' => '',
									'operation' => 'INS',
									'pernr' => "$cekdata->perner",
									'infty' => '0041',
									'dar01' => '',
									'dat01' => '',
									'dar02' => '',
									'dat02' => '',
								]
							],

							'p00008List' => [
								[
									'endda' => '31.12.9999',
									'begda' => '01.' . $detrinc->sbekerjax,
									'operation' => 'INS',
									'pernr' => "$cekdata->perner",
									'infty' => '0008',
									'trfar' => "$detrinc->level_sap",
									// 'trfgb'=> "$detrinc->trfgb_sap",
									'trfgb' => "Z1",
									'trfgr' => "$detrinc->level_sap",
									'trfst' => '01', //default
									'waers' => 'IDR',
								]
							],

							'p00016List' => [
								[
									'endda' => '31.12.9999',
									'begda' => '01.' . $detrinc->sbekerjax,
									'operation' => 'INS',
									'pernr' => $cekdata->perner,
									'infty' => '0016',
									'lfzfr' => '',
									'lfzzh' => '',
									'lfzso' => '',
									'kgzfr' => '',
									'kgzzh' => '',
									'prbzt' => '',
									'prbeh' => '',
									'kdgfr' => '',
									'kdgf2' => '',
									'arber' => $detrinc_ganti->ebekerja,
									'konsl' => '59',
									'cttyp' => $cekansvh->kd_cttyp,
									'zwrkpl' => $cekdata->perner . '/' . $detrinc->sbekerja . '/ISH/' . $detrinc->persa_sap . '/' . $cekansvh->kdsap_ansvh . '/' . $detrinc->sbekerja2,
								]
							],

							'p00035List' => [
								[
									'endda' => '31.12.9999',
									'begda' => '01.' . $detrinc->sbekerjax,
									'operation' => 'INS',
									'pernr' => $cekdata->perner,
									'infty' => '0035',
									'subty' => 'Z2',
									'itxex' => 'X',
									'dat35' => $detrinc->sbekerja,
								]
							],
						]
					];

					// var_dump($request_data);

					$json = json_encode($request_data);

					$headers  = [
						'Content-Type: application/json',
						'cache-control: no-cache"=',
					];


					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


					$response = curl_exec($ch);
					curl_close($ch);
					// var_dump($response);
					$ret = json_decode($response);
					$log = array();
					foreach ($ret as $key => $value) {
						if ($value->success != 1) {
							$log  = $value->message;
						}
					}
					if ($log) {
						$message = $log;
						$this->db->query("Update perner_newjo set flagrfc='4',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
						$retpos = ['status' => "NOK", 'message' => $message];
						print_r(json_encode($retpos));
					} else {
						$postx = array(
							"PERNR"		=> $cekdata->perner,
							"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
							"token"		=> 'ish@2019!',
						);
						$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
						$this->curl->option('buffersize', 10);
						$this->curl->http_login('devappish', 'devappish!@#');
						$this->curl->post($postx);
						$bbb = json_decode($this->curl->execute());
						// var_dump($bbb);
						if ($bbb->TYPE == 'S') {
							$message = "Succesful Delimit";
							$this->db->query("Update perner_newjo set flagrfc='6',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
							$retpos = ['status' => "OK", 'message' => $message];
							print_r(json_encode($retpos));
						} else {
							$message = $bbb->MESSAGE;
							$this->db->query("Update perner_newjo set flagrfc='5',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
							$retpos = ['status' => "NOK", 'message' => $message];
							print_r(json_encode($retpos));
						}
					}
				} else {
					$message = $jjj->MESSAGE;
					$this->db->query("Update perner_newjo set flagrfc='3',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
					$retpos = ['status' => "NOK", 'message' => "$message"];
					print_r(json_encode($retpos));
				}
			} else {
				$this->db->query("Update perner_newjo set flagrfc='2',messagerfc='Error CekPayrollControl',tgl_rfc='$nowx' Where id='$id' ");
				$retpos = ['status' => "NOK", 'message' => "Error CekPayrollControl"];
				print_r(json_encode($retpos));
			}
		}


		if ($cekdata->flagrfc == 3) {
			$posty = array(
				"token"		=> 'ish@2019!',
				// "STELL"		=> $kobjid,
				"STELL"		=> $detrinc->jabatan_sap,
				"PERNR"		=> $cekdata->perner,
				"BEGDA"		=> $detrinc->tglresy . '01',
				"MASSN"		=> $detrinc->kd_rotasi,
				"MASSG"		=> $detrinc->kd_reason,
				"WERKS"		=> $detrinc->persa_sap,
				"PERSK"		=> $detrinc->skill_sap,
				"BTRTL"		=> $detrinc->area_sap,
				"ABKRS"		=> $detrinc->abkrs_sap,
				"ANSVH"		=> $cekansvh->kdsap_ansvh,
				"POSISI"	=> $cekdata->posisi,
			);
			$this->curl->create('http://192.168.88.5/service/index.php/Rfcrotasi');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$this->curl->post($posty);
			$jjj = json_decode($this->curl->execute());
			// var_dump($posty);die();
			// $jjj =$this->curl->execute();
			// var_dump($jjj);die;
			// var_dump($jjj->CODE);
			if ($jjj->CODE == 'S') {
				$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
				$infotype = ['0041', '0008', '0016', '0035'];
				$request_data = [
					[
						'pernr' => "$cekdata->perner",
						'inftypList' => $infotype,
						'p00041List' => [
							[
								'endda' => '',
								'begda' => '',
								'operation' => 'INS',
								'pernr' => "$cekdata->perner",
								'infty' => '0041',
								'dar01' => '',
								'dat01' => '',
								'dar02' => '',
								'dat02' => '',
							]
						],

						'p00008List' => [
							[
								'endda' => '31.12.9999',
								'begda' => '01.' . $detrinc->sbekerjax,
								'operation' => 'INS',
								'pernr' => "$cekdata->perner",
								'infty' => '0008',
								'trfar' => "$detrinc->level_sap",
								// 'trfgb'=> "$detrinc->trfgb_sap",
								'trfgb' => "Z1",
								'trfgr' => "$detrinc->level_sap",
								'trfst' => '01', //default
								'waers' => 'IDR',
							]
						],

						'p00016List' => [
							[
								'endda' => '31.12.9999',
								'begda' => '01.' . $detrinc->sbekerjax,
								'operation' => 'INS',
								'pernr' => $cekdata->perner,
								'infty' => '0016',
								'lfzfr' => '',
								'lfzzh' => '',
								'lfzso' => '',
								'kgzfr' => '',
								'kgzzh' => '',
								'prbzt' => '',
								'prbeh' => '',
								'kdgfr' => '',
								'kdgf2' => '',
								'arber' => $detrinc_ganti->ebekerja,
								'konsl' => '59',
								'cttyp' => $cekansvh->kd_cttyp,
								'zwrkpl' => $cekdata->perner . '/' . $detrinc->sbekerja . '/ISH/' . $detrinc->persa_sap . '/' . $cekansvh->kdsap_ansvh . '/' . $detrinc->sbekerja2,
							]
						],

						'p00035List' => [
							[
								'endda' => '31.12.9999',
								'begda' => '01.' . $detrinc->sbekerjax,
								'operation' => 'INS',
								'pernr' => $cekdata->perner,
								'infty' => '0035',
								'subty' => 'Z2',
								'itxex' => 'X',
								'dat35' => $detrinc->sbekerja,
							]
						],
					]
				];

				// var_dump($request_data);

				$json = json_encode($request_data);

				$headers  = [
					'Content-Type: application/json',
					'cache-control: no-cache"=',
				];


				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


				$response = curl_exec($ch);
				curl_close($ch);
				// var_dump($response);
				$ret = json_decode($response);
				$log = array();
				foreach ($ret as $key => $value) {
					if ($value->success != 1) {
						$log  = $value->message;
					}
				}
				if ($log) {
					$message = $log;
					$this->db->query("Update perner_newjo set flagrfc='4',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
					$retpos = ['status' => "NOK", 'message' => $message];
					print_r(json_encode($retpos));
				} else {
					$postx = array(
						"PERNR"		=> $cekdata->perner,
						"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
						"token"		=> 'ish@2019!',
					);
					$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$this->curl->post($postx);
					$bbb = json_decode($this->curl->execute());
					// var_dump($bbb);
					if ($bbb->TYPE == 'S') {
						$message = "Succesful Delimit";
						$this->db->query("Update perner_newjo set flagrfc='6',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
						$retpos = ['status' => "OK", 'message' => $message];
						print_r(json_encode($retpos));
					} else {
						$message = $bbb->MESSAGE;
						$this->db->query("Update perner_newjo set flagrfc='5',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
						$retpos = ['status' => "NOK", 'message' => $message];
						print_r(json_encode($retpos));
					}
				}
			} else {
				$message = $jjj->MESSAGE;
				$this->db->query("Update perner_newjo set flagrfc='3',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
				$retpos = ['status' => "NOK", 'message' => "$message"];
				print_r(json_encode($retpos));
			}
		}



		if ($cekdata->flagrfc == 4) {
			$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
			$infotype = ['0041', '0008', '0016', '0035'];
			$request_data = [
				[
					'pernr' => "$cekdata->perner",
					'inftypList' => $infotype,
					'p00041List' => [
						[
							'endda' => '',
							'begda' => '',
							'operation' => 'INS',
							'pernr' => "$cekdata->perner",
							'infty' => '0041',
							'dar01' => '',
							'dat01' => '',
							'dar02' => '',
							'dat02' => '',
						]
					],

					'p00008List' => [
						[
							'endda' => '31.12.9999',
							'begda' => '01.' . $detrinc->sbekerjax,
							'operation' => 'INS',
							'pernr' => "$cekdata->perner",
							'infty' => '0008',
							'trfar' => "$detrinc->level_sap",
							// 'trfgb'=> "$detrinc->trfgb_sap",
							'trfgb' => "Z1",
							'trfgr' => "$detrinc->level_sap",
							'trfst' => '01', //default
							'waers' => 'IDR',
						]
					],

					'p00016List' => [
						[
							'endda' => '31.12.9999',
							'begda' => '01.' . $detrinc->sbekerjax,
							'operation' => 'INS',
							'pernr' => $cekdata->perner,
							'infty' => '0016',
							'lfzfr' => '',
							'lfzzh' => '',
							'lfzso' => '',
							'kgzfr' => '',
							'kgzzh' => '',
							'prbzt' => '',
							'prbeh' => '',
							'kdgfr' => '',
							'kdgf2' => '',
							'arber' => $detrinc_ganti->ebekerja,
							'konsl' => '59',
							'cttyp' => $cekansvh->kd_cttyp,
							'zwrkpl' => $cekdata->perner . '/' . $detrinc->sbekerja . '/ISH/' . $detrinc->persa_sap . '/' . $cekansvh->kdsap_ansvh . '/' . $detrinc->sbekerja2,
						]
					],

					'p00035List' => [
						[
							'endda' => '31.12.9999',
							'begda' => '01.' . $detrinc->sbekerjax,
							'operation' => 'INS',
							'pernr' => $cekdata->perner,
							'infty' => '0035',
							'subty' => 'Z2',
							'itxex' => 'X',
							'dat35' => $detrinc->sbekerja,
						]
					],
				]
			];

			// var_dump($request_data);

			$json = json_encode($request_data);

			$headers  = [
				'Content-Type: application/json',
				'cache-control: no-cache"=',
			];


			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


			$response = curl_exec($ch);
			curl_close($ch);
			// var_dump($response);
			$ret = json_decode($response);
			$log = array();
			foreach ($ret as $key => $value) {
				if ($value->success != 1) {
					$log  = $value->message;
				}
			}
			if ($log) {
				$message = $log;
				$this->db->query("Update perner_newjo set flagrfc='4',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
				$retpos = ['status' => "NOK", 'message' => $message];
				print_r(json_encode($retpos));
			} else {
				$postx = array(
					"PERNR"		=> $cekdata->perner,
					"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
					"token"		=> 'ish@2019!',
				);
				$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$this->curl->post($postx);
				$bbb = json_decode($this->curl->execute());
				// var_dump($bbb);
				if ($bbb->TYPE == 'S') {
					$message = "Succesful Delimit";
					$this->db->query("Update perner_newjo set flagrfc='6',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
					$retpos = ['status' => "OK", 'message' => $message];
					print_r(json_encode($retpos));
				} else {
					$message = $bbb->MESSAGE;
					$this->db->query("Update perner_newjo set flagrfc='5',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
					$retpos = ['status' => "NOK", 'message' => $message];
					print_r(json_encode($retpos));
				}
			}
		}


		if ($cekdata->flagrfc == 5) {
			$postx = array(
				"PERNR"		=> $cekdata->perner,
				"ENDDA"		=> $tglt . '' . $tgls . '' . $tgla,
				"token"		=> 'ish@2019!',
			);
			
			// var_dump($postx);die();
			$this->curl->create('http://192.168.88.5/service/index.php/Rfcdelimit');
			$this->curl->option('buffersize', 10);
			$this->curl->http_login('devappish', 'devappish!@#');
			$this->curl->post($postx);
			$bbb = json_decode($this->curl->execute());
			// var_dump($bbb);
			if ($bbb->TYPE == 'S') {
				$message = "Succesful Delimit";
				$this->db->query("Update perner_newjo set flagrfc='6',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
				$retpos = ['status' => "OK", 'message' => $message];
				print_r(json_encode($retpos));
			} else {
				$message = $bbb->MESSAGE;
				$this->db->query("Update perner_newjo set flagrfc='5',messagerfc='$message',tgl_rfc='$nowx' Where id='$id' ");
				$retpos = ['status' => "NOK", 'message' => $message];
				print_r(json_encode($retpos));
			}
		}
	}


	public function lastOfMonth($year, $month)
	{
		return date("d", strtotime('-1 second', strtotime('+1 month', strtotime($month . '/01/' . $year . ' 00:00:00'))));
	}
}
