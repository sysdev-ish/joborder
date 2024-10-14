<?php   
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class Bast extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper(array('form', 'url', 'inflector'));  
		$this->load->library(array('form_validation','curl'));
		$this->load->model(array('job_model','bast_model'));
	}
	
	
	
	public function listpm()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";
			
			$data['rdoc']	= $this->bast_model->listdoc();
			
			$this->load->view('pages/header',$data);
			$this->load->view('bast/listpm',$data);
			$this->load->view('pages/footer');
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function listdata_bast()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)){
			$postparam = $this->input->post();
			
			$parsearch	= array (
				"carnoj"       	=> $postparam['carnoj'],
				"carpro"       	=> $postparam['carpro'],
				"cartnew"       => $postparam['cartnew']
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
			
			$data = $this->bast_model->listdata_bast($length,$start,$search,$order,$dir,$parsearch);
			
			//var_dump($data);exit();
			$output=array();
			$output['draw']=$draw;
			$output['recordsTotal']=$output['recordsFiltered']=$data['total_data'];
			$output['data']=array();
			$nomor_urut=$start+1;
			foreach ($data['data'] as $rows =>$row) {
				$btn = 'Bast';
				$stat = 'btn-info';
				
				if($row['type_new']==1) {
					$tne = 'New Project';
				} else {
					$tne = 'New Pengembangan';
				}
				
				if($row['n_project']=='Pilih' or $row['n_project']=='') {
					$npro = $row['project'];
				} else {
					$npro = $row['n_project'];
				}
				
				$desknoj = json_encode($row['deskripsi']);
				$huhui = "<td><center><a href='' onclick='javascript:desk(\"".$row['nojo']."\", ".$desknoj.");' id='btndes' data-toggle='modal' data-target='#Modal_des'>view</a></center></td>";
				
				if(!filter_var($row['lama'], FILTER_VALIDATE_INT)) {    
					$def = $row['lama'];
				} else  {    
					$def = $row['lama'].' bulan';
				}   
				
				$fff = "<button type='button' class='btn ".$stat." btn-block btn-xs btnadd' onclick='javascript:rincid(\"".$row['nojo']."\");' id='btnadd' data-toggle='modal' data-target='#XmyModal'>". $btn ."</button>";
				
				$output['data'][]=array( 
					$row['nojo'],			
					$tne,
					$npro,
					// $row['lama'],
					$def,
					$row['bekerja'],
					$huhui,
					$row['no_bak'],
					'<td> '.$fff.' </td>'
					
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		}else{
			redirect('login');
		}
	}
	
	
	function listrinc(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$tes 		= $session_data['level'];
			$njo 		= $this->input->post('data');
			$data['rincian']		= $this->bast_model->trajo($njo);
			
			$this->load->view('bast/rincbast', $data);
		}
	}
	
	
	
	
}