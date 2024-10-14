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
	
	public function get_newproject_post(){
		$periode = date("Y-m");$start = 0;$length = 10;
		if($this->input->post('periode') <> ''){$periode = $this->input->post('periode');}
		if($this->input->post('start') <> ''){$start = $this->input->post('start');}
		if($this->input->post('length') <> ''){$length = $this->input->post('length');}
		if($this->input->post('username') <> ''){$username = $this->input->post('username');}
		
		$this->load->model(array('payroll_model'));
		$data['result'] = $this->payroll_model->get_projectnew($periode,$start,$length,$username);
		$this->set_response($data, REST_Controller::HTTP_OK);
	}
	
}
