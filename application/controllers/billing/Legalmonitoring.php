<?php

defined('BASEPATH') or exit('No direct script access allowed');

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
class Legalmonitoring extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('curl'));
		$this->load->helper('url');
		$this->load->model(array('legal_model'));
		date_default_timezone_set('Asia/Jakarta');
	}

	public function dlegalNew_post()
	{
		$periode = $this->input->post('periode');
		$data = $this->legal_model->get_dashlegal($periode);

		if ($data) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function updstatuslegal_post()
	{
		$no_bak = $this->input->post('no_bak');
		$no_pks = $this->input->post('no_pks');
		$flag_pks = $this->input->post('flag_pks');
		$doc_pks = $this->input->post('doc_pks');
		$draft_pks = $this->input->post('draft_pks');
		$sirkuler_i = $this->input->post('sirkuler_i');
		$sirkuler_e = $this->input->post('sirkuler_e');

		if ($doc_pks <> '') {
			$item = array(
				'status_pks' => $flag_pks,
				'sirkulir_e' => $sirkuler_e,
				'doc_pks' => $doc_pks,
				'nopks' => $no_pks
			);
		} else if ($draft_pks <> '') {
			$item = array(
				'status_pks' => $flag_pks,
				'draft' => $draft_pks,
				'nopks' => $no_pks
			);
		} else if ($sirkuler_i <> '') {
			$item = array(
				'status_pks' => $flag_pks,
				'sirkulir_i' => $sirkuler_i,
				'nopks' => $no_pks
			);
		}
		// else if($sirkuler_e<>''){
		// 	$item = array (
		// 		'status_pks' => $flag_pks,
		// 		'sirkulir_e' => $sirkuler_e
		// 	);	
		// }
		else {
			$item = array(
				'status_pks' => $flag_pks
			);
		}

		$data['result'] = $this->legal_model->upd_statuslegal($no_bak, $item);

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function listMonitor_post()
	{
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$fstatus = $this->input->post('fstatus');
		$nobak = $this->input->post('nobak');
		$customer = $this->input->post('customer');
		$project = $this->input->post('project');
		$nilai = $this->input->post('nilai');
		$kategori = $this->input->post('kategori');
		$status = $this->input->post('status');
		$nopks = $this->input->post('nopks');
		$length = $this->input->post('length');
		$start = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$dir = $this->input->post('dir');

		$data['result'] = $this->legal_model->get_monitor($length, $start, $search, $order, $dir, $start_date, $end_date, $fstatus, $nobak, $customer, $project, $nilai, $kategori, $status, $nopks);

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function listMonitorDownload_post()
	{
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$fstatus = $this->input->post('fstatus');

		$data['result'] = $this->legal_model->get_monitordownload($start_date, $end_date, $fstatus);

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function listMonitorDetail_post()
	{
		$nobak = $this->input->post('id');

		$data['result'] = $this->legal_model->get_monitorDetail($nobak);

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function listlegalAll_post()
	{
		$data['result'] = $this->legal_model->get_listlegalAll();
		// var_dump($sql);exit();
		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function diagramlegal_get()
	{
		$data['result'] = $this->legal_model->get_diagramlegal();

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function diagramLegalList_post()
	{
		$status = $this->input->post('status');
		$data['result'] = $this->legal_model->get_diagramlegalList($status);

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}
}
