<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Servicesrfc extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','skema_model'));
	}
	
	
	public function rotres($id)
	{
		$detrinc = $this->db->query("SELECT a.*, date_format(tgl_resign,'%Y%m%d') as tglres, date_format(tgl_resign,'%d.%m.%Y') as tglresx, date_format(tgl_resign,'%Y%m') as tglresy, date_format(tglbekerja,'%d.%m.%Y') as sbekerja, date_format(spro_date,'%m/%Y') as sbekerja2 FROM trans_perner_test a WHERE a.id='$id' ")->row();
		
		$detrinc_ganti = $this->db->query("SELECT a.*, date_format(arber,'%d.%m.%Y') as ebekerja FROM trans_perner_ganti a WHERE a.nojo='".$detrinc->nojo."' and a.perner_resrot='".$detrinc->perner."' and a.perner_ganti='".$detrinc->perner_ganti."' ")->row();
		
		if($detrinc->rotasi_resign=='1'){
			// $postx = array (
				// "token"		=> 'ish@2019!',
				// "ABKRS"		=> $detrinc->abkrs
			// );
			// $this->curl->create('http://192.168.88.5/service/index.php/Rfccekpayrollcontroll');
			// $this->curl->option('buffersize', 10);
			// $this->curl->http_login('devappish', 'devappish!@#');
			// $this->curl->post($postx);
			// $lll =json_decode($this->curl->execute());
			// $ppp = $lll->status;
			// if($ppp==1){
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
				// $this->curl->create('http://192.168.88.5/service/index.php/Rfcresign');
				// $this->curl->option('buffersize', 10);
				// $this->curl->http_login('devappish', 'devappish!@#');
				// $this->curl->post($posty);
				// $jjj =json_decode($this->curl->execute());
				// if($jjj->CODE=='S'){
					// $url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
					// $infotype = ['0041','0035'];
					// $request_data = [
						// [
						  // 'pernr'=> "$detrinc->perner",
						  // 'inftypList'=>$infotype,
						  // 'p00041List'=>[
							// [
							  // 'endda'=>'',
							  // 'begda'=> '',
							  // 'operation'=>'INS',
							  // 'pernr'=> "$detrinc->perner",
							  // 'infty'=>'0041',
							  // 'dar01'=> '01',
							  // 'dat01'=> '',
							  // 'dar02'=> '',
							  // 'dat02'=> ''
							// ]
						  // ],
						  
						  // 'p00035List'=>[
							// [
							  // 'endda'=>'31.12.9999',
							  // 'begda'=> $detrinc->tglresx,
							  // 'operation'=>'INS',
							  // 'pernr'=> $detrinc->perner,
							  // 'infty'=>'0035',
							  // 'subty'=>'Z8',
							  // 'itxex'=>'X',
							  // 'dat35'=> $detrinc->tglresx,
							// ]
						  // ],
						// ]
					// ];

					// $json = json_encode($request_data);

					// $headers  = [
					// 'Content-Type: application/json',
					// 'cache-control: no-cache"=',
					// ];


					// $ch = curl_init();

					// curl_setopt($ch, CURLOPT_URL, $url);
					// curl_setopt($ch, CURLOPT_POST, 1);
					// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					// curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
					// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

					// $response = curl_exec($ch);
					// curl_close($ch);
					// $ret = json_decode($response);
					// $log = array();
					// foreach ($ret as $key => $value) {
						// if ($value->success != 1){
						  // $log  = $value->message;
						// }
					// }
					// if($log){
						// $message = $log;
						// $retpos = ['status'=>"NOK",'message'=>$message];
						// print_r(json_encode($retpos));
					// }else{
						// $message = "successful Resign";
						// $retpos = ['status'=>"OK",'message'=>$message];
						// print_r(json_encode($retpos));
					// }
				// }
			// }
			
			if($detrinc->type_rep==3){
				$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/get_objidskm');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$post = array('token' => sha1("#ISH!@#"), 'PLANS' => $detrinc->jabatan );
				$this->curl->post($post);
				$xobjid =json_decode($this->curl->execute());
				$kobjid = $xobjid->STELL;
				
				var_dump($kobjid);die;
				
				$postz = array (
					"token"		=> 'ish@2019!',
					"STELL"		=> $kobjid,
					"WERKS"		=> $detrinc->persa,
					"PERSK"		=> $detrinc->skilllayanan,
					"BTRTL"		=> $detrinc->area,
					"ABKRS"		=> $detrinc->abkrs,
				);
				$this->curl->create('http://192.168.88.5/service/index.php/Rfccekposisi');
				$this->curl->option('buffersize', 10);
				$this->curl->http_login('devappish', 'devappish!@#');
				$this->curl->post($postz);
				$lll =json_decode($this->curl->execute());
				$ppp = $lll->CODE;
				if($ppp=='S'){
					$postx = array (
						"token"		=> 'ish@2019!',
						"ABKRS"		=> $detrinc->abkrs
					);
					$this->curl->create('http://192.168.88.5/service/index.php/Rfccekpayrollcontroll');
					$this->curl->option('buffersize', 10);
					$this->curl->http_login('devappish', 'devappish!@#');
					$this->curl->post($postx);
					$sss =json_decode($this->curl->execute());
					$yyy = $sss->status;
					if($yyy==1){
						$posty = array (
							"token"		=> 'ish@2019!',
							"STELL"		=> $kobjid,
							"PERNR"		=> $detrinc->perner_ganti,
							"BEGDA"		=> $detrinc->tglresy.'01',
							"MASSN"		=> $detrinc_ganti->kodez_rotasi,
							"MASSG"		=> $detrinc_ganti->alasan_rotasi,
							"WERKS"		=> $detrinc->persa,
							"PERSK"		=> $detrinc->skilllayanan,
							"BTRTL"		=> $detrinc->area,
							"ABKRS"		=> $detrinc->abkrs,
							"ANSVH"		=> $detrinc->ansvh,
						);
						$this->curl->create('http://192.168.88.5/service/index.php/Rfcrotasi');
						$this->curl->option('buffersize', 10);
						$this->curl->http_login('devappish', 'devappish!@#');
						$this->curl->post($posty);
						$jjj =json_decode($this->curl->execute());
						var_dump($jjj);
						if($jjj->CODE=='S'){
							$url = "http://192.168.88.60:8080/ish-rest/ZINFHRF_00025";
							$infotype = ['0041','0016','0035'];
							$request_data = [
								[
								  'pernr'=> "$detrinc->perner",
								  'inftypList'=>$infotype,
								  'p00041List'=>[
									[
									  'endda'=>'',
									  'begda'=> '',
									  'operation'=>'INS',
									  'pernr'=> "$detrinc->perner_ganti",
									  'infty'=>'0041',
									  'dar01'=> '01',
									  'dat01'=> '',
									  'dar02'=> '',
									  'dat02'=> ''
									]
								  ],
								  
								  'p00016List'=>[
									[
									  'endda'=>'31.12.9999',
									  'begda'=> $detrinc->sbekerja,
									  'operation'=>'INS',
									  'pernr'=> $detrinc->perner_ganti,
									  'infty'=>'0016',
									  'lfzfr'=>'',
									  'lfzzh'=>'',
									  'lfzso'=>'',
									  'kgzfr'=>'',
									  'kgzzh'=>'',
									  'prbzt'=>'',
									  'prbeh'=>'',
									  'kdgfr'=>'',
									  'kdgf2'=>'',
									  'arber'=> $detrinc_ganti->ebekerja,
									  'konsl'=>'59',
									  'cttyp'=> $detrinc_ganti->cttyp,
									  'zwrkpl'=>$detrinc->perner_ganti.'/'.$detrinc->sbekerja.'/ISH/'.$detrinc->persa.'/'.$detrinc_ganti->ansvh.'/'.$detrinc->sbekerja2,
									]
								  ],
								  
								  'p00035List'=>[
									[
									  'endda'=>'31.12.9999',
									  'begda'=> $detrinc->sbekerja,
									  'operation'=>'INS',
									  'pernr'=> $detrinc->perner_ganti,
									  'infty'=>'0035',
									  'subty'=>$detrinc_ganti->kodez_rotasi,
									  'itxex'=>'X',
									  'dat35'=> $detrinc->sbekerja,
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
							$log = array();
							foreach ($ret as $key => $value) { 
								if ($value->success != 1){
								  $log  = $value->message;
								}
							}
							if($log){
								$message = $log;
								$retpos = ['status'=>"NOK",'message'=>$message];
								print_r(json_encode($retpos));
							}else{
								$message = "successful Rotasi";
								$retpos = ['status'=>"OK",'message'=>$message];
								print_r(json_encode($retpos));
							}
						}
					}
				}
			}
		}		
	}
}