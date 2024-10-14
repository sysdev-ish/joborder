<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Service extends REST_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->library(array('curl'));
		$this->load->helper('url');
		date_default_timezone_set('Asia/Jakarta');
    }
	
	public function listbilling_post(){
		$periode = $this->input->post('periode');
		$id_ops = '';
		if($this->input->post('src') <> ''){
			$id_ops = $this->input->post('src');
		}
		// var_dump($this->input->post('periode'));exit();
		if($periode <> '' || $id_ops <> ''){
			$this->load->model(array('billing_model'));
			$data['result'] = $this->billing_model->get_listbilling($periode,$id_ops);
			// var_dump($data['result']);exit();
			if($data['result']){
				$this->set_response($data, REST_Controller::HTTP_OK);
			}else{
				$this->set_response(False, REST_Controller::HTTP_OK);
			}
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}
	
	public function listjo_post(){
		$periode = $this->input->post('periode');
		$id_ops = $this->input->post('src');
		$this->load->model(array('billing_model'));
		$data['result'] = $this->billing_model->get_listjo($periode, $id_ops);
		// var_dump($sql);exit();
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}	

	public function listlegal_post(){
		$periode = $this->input->post('periode');
		$nobak = $this->input->post('nobak');
		$customer = $this->input->post('customer');
		$project = $this->input->post('project');
		$jenis = $this->input->post('jenis');
		$length = $this->input->post('length');
		$start = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$dir = $this->input->post('dir');

		// $id_ops = $this->input->post('src');
		$this->load->model(array('legal_model'));
		$data['result'] = $this->legal_model->get_listlegal($length,$start,$search,$order,$dir,$periode,$nobak,$customer,$project,$jenis);
		;
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function listlegalverifikasi_post(){
		$periode = $this->input->post('periode');
		$nobak = $this->input->post('nobak');
		$customer = $this->input->post('customer');
		$project = $this->input->post('project');
		$jenis = $this->input->post('jenis');
		$length = $this->input->post('length');
		$start = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$dir = $this->input->post('dir');

		// $id_ops = $this->input->post('src');
		$this->load->model(array('legal_model'));
		$data['result'] = $this->legal_model->get_listlegalverifikasi($length,$start,$search,$order,$dir,$periode,$nobak,$customer,$project,$jenis);
		;
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function listlegalexport_post(){
		$periode = $this->input->post('periode');
		$nobak = $this->input->post('nobak');
		$customer = $this->input->post('customer');
		$project = $this->input->post('project');
		$jenis = $this->input->post('jenis');

		$this->load->model(array('legal_model'));
		$data['result'] = $this->legal_model->get_listlegalExport($periode,$nobak,$customer,$project,$jenis);
		;
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}
	
	public function list_tax_post(){
		$this->load->model(array('billing_model'));
		$data['result'] = $this->billing_model->get_listtax();
		// var_dump($sql);exit();
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function get_attachment_post(){
		$id_ops = $this->input->post('id_ops');
		// var_dump('sapi');exit();
		if($id_ops<>''){
			$this->load->model(array('billing_model'));
			$data['result'] = $this->billing_model->get_listattachment($id_ops);
			// var_dump($sql);exit();
			if($data['result']){
				$this->set_response($data, REST_Controller::HTTP_OK);
			}else{
				$this->set_response(False, REST_Controller::HTTP_OK);
			}
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function get_attachmentleg_post(){
		$periode = $this->input->post('periode');
		$nojo	 = $this->input->post('src');
		$kumdoc	 = $this->input->post('kumdoc');
		// var_dump('sapi');exit();
		if($kumdoc<>''){
			$this->load->model(array('billing_model'));
			$data['result'] = $this->billing_model->get_listattachment_leg($periode, $nojo, $kumdoc);
			// var_dump($sql);exit();
			if($data['result']){
				$this->set_response($data, REST_Controller::HTTP_OK);
			}else{
				$this->set_response(False, REST_Controller::HTTP_OK);
			}
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}
	
	
	function get_attachmentops_post(){
		$periode = $this->input->post('periode');
		$nojo	 = $this->input->post('src');
		$kumdoc	 = $this->input->post('kumdoc');
		if($kumdoc<>''){
			$this->load->model(array('billing_model'));
			$data['result'] = $this->billing_model->get_listattachment_ops($periode, $nojo, $kumdoc);
			// var_dump($sql);exit();
			if($data['result']){
				$this->set_response($data, REST_Controller::HTTP_OK);
			}else{
				$this->set_response(False, REST_Controller::HTTP_OK);
			}
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}	
	}	
	
	
	function get_attachmentfin_post(){
		$periode = $this->input->post('periode');
		$nojo	 = $this->input->post('src');
		$kumdoc	 = $this->input->post('kumdoc');
		if($kumdoc<>''){
			$this->load->model(array('billing_model'));
			$data['result'] = $this->billing_model->get_listattachment_fin($periode, $nojo, $kumdoc);
			// var_dump($sql);exit();
			if($data['result']){
				$this->set_response($data, REST_Controller::HTTP_OK);
			}else{
				$this->set_response(False, REST_Controller::HTTP_OK);
			}
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}	
	}	
	
	
	public function get_upload_payroll_post(){
		$this->load->model(array('billing_model'));
		$search = $this->input->post('idops');
		$abc = $this->db->query("SELECT doc_id from trans_doc WHERE nojo='$search' ")->row();
		if( (empty($abc->doc_id)) || ($abc->doc_id == '') ){
			$def = '';
		} else {
			$def = $abc->doc_id;
		}
			
		$data['result'] = $this->billing_model->get_attachment_payroll($def);
		// var_dump($sql);exit();
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function insDoc_payroll_post(){
		$this->load->model(array('billing_model'));
		$nojo = $this->input->post('nojo');
		$tanggal = $this->input->post('tanggal');
		$upd = $this->input->post('upd');
		$lup = $this->input->post('lup');
		$id_doc = $this->input->post('id_doc');
		$filename = $this->input->post('filename');

		$jmlDoc=count($id_doc);
		$item = array (
			'nojo' => $nojo,
			'tanggal' => $tanggal,
			'upd' => $upd,
			'lup' => date("Y-m-d H:i:s")
		);		

		$data['result'] = $this->billing_model->ins_attachment_payroll($item);
		$id = $this->db->insert_id();
		if ($jmlDoc){
			for ($i=0; $i<$jmlDoc; $i++){
				$item2 = array (
					'id_fin' => $id,
					'id_doc' => $id_doc[$i],
					'filename' => $filename[$i]
				);
				$this->billing_model->ins_attachment_payroll2($item2);
			}
		}
		
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function cekDoc_payroll_post(){
		$nojo = $this->input->post('nojo');
		$tanggal = $this->input->post('periode');
		$this->load->model(array('billing_model'));
		$data['result'] = $this->billing_model->cekdoc_payroll($nojo,$tanggal);
		// var_dump($sql);exit();
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}
	
}
