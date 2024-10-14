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
		$this->load->model(array('legal_model'));
		date_default_timezone_set('Asia/Jakarta');
    }
	
	public function listMonitor_post(){				
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

		$data['result'] = $this->legal_model->get_monitor($length,$start,$search,$order,$dir,$periode,$status,$nobak,$nopks,$customer,$project,$statusa);
		
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
		
	}

	// public function dlegalNew_post(){
	// 	$data['result'] = $this->legal_model->get_listlegalAll();
	// 	if($data['result']){
	// 		$this->set_response($data, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->set_response(False, REST_Controller::HTTP_OK);
	// 	}
	// }

	public function dlegalNew_get(){
		$data = $this->legal_model->get_listlegalAll();
		if($data['result']){
			$this->set_response($data, REST_Controller::HTTP_OK);
		}else{
			$this->set_response(False, REST_Controller::HTTP_OK);
		}
		
		
	}

	
}
