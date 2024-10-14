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
class RequestPks extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('curl'));
		$this->load->helper('url');
		$this->load->model(array('legal_model'));
		date_default_timezone_set('Asia/Jakarta');
	}

	public function listMonitor_post()
	{
		$periode = $this->input->post('periode');
		$status = $this->input->post('status');
		$nobak = $this->input->post('nobak');
		$nopks = $this->input->post('nopks');
		$customer = $this->input->post('customer');
		$project = $this->input->post('project');
		$statusa = $this->input->post('statusa');
		$length = $this->input->post('length');
		$start = $this->input->post('start');
		$search = $this->input->post('search');
		$order = $this->input->post('order');
		$dir = $this->input->post('dir');

		$data['result'] = $this->legal_model->get_monitor($length, $start, $search, $order, $dir, $periode, $status, $nobak, $nopks, $customer, $project, $statusa);

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function dlegalNew_get()
	{
		$data = $this->legal_model->get_listlegalAll();
		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	// BARU 2023
	public function request_data_post()
	{
		$cari = $this->input->post('cari');
		$status = $this->input->post('status');

		$data['result'] = $this->legal_model->get_request_pks($cari, $status);

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function detail_data_pks_post()
	{
		$id = $this->input->post('id');

		$data['result'] = $this->legal_model->get_detail_pks($id);

		if ($data['result']) {
			$this->set_response($data, REST_Controller::HTTP_OK);
		} else {
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
	}

	public function update_data_pks_post()
	{
		$id_jo = $this->input->post('id_jo');
		$bak = $this->input->post('bak');
		$pks_no = $this->input->post('pks_no');
		$pks_file = $this->input->post('pks_file');
		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');

		$item = array(
			'nopks' => $pks_no,
			'pks_file' => $pks_file,
			'catatan' => $keterangan,
			'status_pks' => $status
		);

		$result = $this->legal_model->update_pks($id_jo, $item);

		if ($result) {
			$items['status'] = 1;
			$items['message'] = 'Berhasil';
			$items['data'] = $result;
		}else{
			$items['status'] = 0;
			$items['message'] = 'Gagal';
			$items['data'] = '';
		}

		$this->set_response($items, REST_Controller::HTTP_OK);
	}

	public function jml_data_post()
	{
		$cari = $this->input->post('cari');

		$result = $this->legal_model->count_data_pks($cari);

		if ($result) {
			$items['status'] = 1;
			$items['message'] = 'Berhasil';
			$items['data'] = $result;
		}else{
			$items['status'] = 0;
			$items['message'] = 'Gagal';
			$items['data'] = '';
		}

		$this->set_response($items, REST_Controller::HTTP_OK);
	}
}
