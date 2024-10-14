<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library('form_validation');
		$this->load->model(array('job_model','user','skema_model'));
	}
    
    public function get_alljo(){
        $alljo = $this->job_model->get_alljo();
        echo $alljo;
    }
    
    public function get_ontime(){
        $ontime = $this->job_model->get_ontime();
        echo $ontime;
    }    

    public function get_overdue(){
        $overdue = $this->job_model->get_overdue();
        echo $overdue;
    }    

    public function get_canceled(){
        $canceled = $this->job_model->get_alljoapp();
        echo $canceled;
    }    

    public function get_topod(){
        $ontime = $this->job_model->get_topod();
        echo $ontime;
    }    
}

?>