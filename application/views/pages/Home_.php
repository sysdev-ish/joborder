<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library('form_validation');
		$this->load->model(array('job_model','user'));
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Job Order";
			$data['transjo'] 		= $this->job_model->get_transjo();
			

			$this->load->view('pages/header',$data);
			$this->load->view('pages/dashboard',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}

	

	public function listdashboard()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Login";
			
			$data['transjo'] 		= $this->job_model->get_dashboard($this->input->post('dataarr'));
			
			
			
			$this->load->view('pages/listdashboard',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}


	public function listappjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 			= "List Login";
			$tes = $session_data['level'];
			$search = $this->input->post('dataarr');
			$data['transjo'] 		= $this->job_model->get_appjo($search,$tes);
			
			
			
			$this->load->view('joborder/listappjo',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}


	public function listjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 			= "List Login";
			
			$search = $this->input->post('dataarr');
			$data['transjo'] 		= $this->job_model->get_jo($search);
			
			
			
			$this->load->view('joborder/listjo',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}




	public function appjo()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Job Order";
			$data['transjo'] 		= $this->job_model->get_transappjo();

			$this->load->view('pages/header',$data);
			$this->load->view('joborder/appjo',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}

	public function listorder()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] = "Job Order";
			$data['transjo'] = $this->job_model->get_transall();
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/listorder',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}

	public function joborder()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 		= $session_data['level'];
			$data['title'] 		= "Job Order";
			$nojo = "";
			$cons = '/ISH/01010107/';
			$year = date('Y');

			$nojob = $this->job_model->get_insertjo();
			if ($nojob == 0){
				$new = '000001';
				$nojo = $new . $cons . $year;			
			} else {
				$nor = $nojob;
				$next = intval($nor) + 1;
				$xnext = $this->hitung($next);
				$nojo = $xnext . $cons . $year;
			}		
			$data['nojo'] = $nojo;
			
			$jabatanrray = $this->job_model->get_jabatan();
				$selectjabatan = "";
				foreach($jabatanrray as $key => $list){
					$selectjabatan .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbjabatan']		= $selectjabatan;		

			$tggrray = $this->job_model->get_tgg();
				$select = "";
				foreach($tggrray as $key => $list){
					$select .= "<option value='". $list['jabatan'] ."'>". $list['jabatan'] ."</option>";
				}
			$data['cmbtgg']		= $select;

			$lokrray = $this->job_model->get_lokasi();
				$select = "";
				foreach($lokrray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['kota'] . " - " . $list['area'] ."</option>";
				}
			$data['cmblokasi']		= $select;

			$dikrray = $this->job_model->get_pendidikan();
				$select = "";
				foreach($dikrray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['pendidikan'] . "</option>";
				}
			$data['cmbpendidikan']		= $select;
			
			$konrray = $this->job_model->get_kontrak();
				$select = "";
				foreach($konrray as $key => $list){
					$select .= "<option value=". $list['jenis'] .">". $list['jenis'] . "</option>";
				}
			$data['cmbkontrak']		= $select;
			
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/addjoborder',$data);
			$this->load->view('pages/footer');
		} else {
			redirect ('login','refresh');
		}
	}

	function detailjo(){
		if ($this->session->userdata('logged_in')){
			$onjo = $this->input->post('anojo');
			$data	= $this->job_model->detailjo($onjo);
			//print_r ($_POST);
			//$this->output->enable_profiler(TRUE);
			echo json_encode($data);
		}
	}

	function trajo(){
		if ($this->session->userdata('logged_in')){
			$njo = $this->input->post('data');
			$data['rincian']		= $this->job_model->trajo($njo);
			$this->load->view('joborder/rincian', $data);
		}
	}

	function rejectjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$njo = $this->input->post('data');
			$this->job_model->rejectjo($njo);
			//$this->appjo();
			
			//$data['transjo'] 		= $this->job_model->get_transappjo();
			//$this->load->view('joborder/listapp',$data);
			redirect('home/appjo', 'refresh');
			//$this->load->view('joborder/appjo',$data);
		}
	}

	function simpantjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$njo = $this->input->post('data');
			$this->job_model->inssimpantjo($njo);
			
			
			//$data['transjo'] 		= $this->job_model->get_transappjo();
			//$this->load->view('joborder/listapp',$data);
			redirect('home/appjo', 'refresh');
			//$this->appjo();
		}
	}
	
	function editjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			
			//$rekrut = $this->input->post('rekrut');
			
			$item = array (
				'nojo' => $this->input->post('idnojo'),
				'jml' => $this->input->post('rekrut'),
				'upd' => $session_data['username'],
				'lup' => date("Y-m-d H:i:s")
			);
			$idnjo = $this->input->post('idnojo');
			//$this->job_model->editjo($item);
			
						
			$infomedia=$this->job_model->editjo($item);
			//$test=$this->load->view('joborder/listjob',$data);
			echo json_encode($infomedia);
			//echo json_encode($data['transjo'] = $this->job_model->get_transall());
			//echo json_encode($test);
			
			exit;
			redirect('home/listorder', 'refresh');
			//$data['transjo'] = $this->job_model->get_transall();
			//$this->load->view('joborder/listjob',$data);
			//$data['transjo'] = $this->job_model->get_transall();
			//$this->load->view('joborder/listjob',$data);
			
			//echo "Sukses";
			
		}
	}
	
	/*
	function editjo(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			
			$cokx	 			= $this->input->post('xcok');
			$idnojo		 		= $cokx[0];
			$rekrut		 		= $cokx[1];
			
			
			$item = array (
				'nojo' => $idnojo,
				'jml' => $rekrut,
				'upd' => $session_data['nama'],
				'lup' => date("Y-m-d H:i:s")
			);
			$idnjo = $this->input->post('idnojo');
			
						
			$this->job_model->editjo($item);
			
			
			redirect('home/listorder', 'refresh');
			//$data['transjo'] = $this->job_model->get_transall();
			//$this->load->view('joborder/listjob',$data);
			//$data['transjo'] = $this->job_model->get_transall();
			//$this->load->view('joborder/listjob',$data);
			
			//echo "Sukses";
			
		}
	}
	*/
	/*
	function rincian_simpan(){
		
		//$file_element_name = 'komponen';

        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx';
		$config['max_size']    = 1024 * 100;

			
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
		
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
	
		$item = array (
			'nojo' => $this->input->post('nojo'),
			'tanggal' => $this->input->post('tanggal'),
			'project' => $this->input->post('project'),
			'syarat' => $this->input->post('syarat'),
			'deskripsi' => $this->input->post('deskripsi'),
			'lama' => $this->input->post('lama'),
			'latihan' => $this->input->post('latihan'),
			'bekerja' => $this->input->post('bekerja'),
			'komponen' => $_FILES['komponen']['name'],
			'type_jo' => 'New',
			'approval' => '0',
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $data['nama']	
		);
		
		$this->job_model->inserttransjo($item);
		
		
		
		$putih = array (
			'nojo' => $this->input->post('nojo'),
			'filename'	=> $_FILES['komponen']['name']
			
		);
		
		$this->job_model->insert_file($putih);
		
		
		$rec 	= $joborderx[10];
		$rec	= explode(",",$rec);
		$loop = count($rec)/9;
		if ($loop){
			$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
			for ($i=0; $i<$loop; $i++){
				$iteml = array(
					'nojo' => $this->input->post('nojo'),
					'jabatan' => $rec[$a],
					'gender' => $rec[$b],
					'pendidikan' => $rec[$c],
					'lokasi' => $rec[$d],
					'waktu' => $rec[$e],
					'atasan' => $rec[$f],
					'kontrak' => $rec[$g],
					'jumlah' => $rec[$h],
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
				$this->job_model->inserttransrincian($iteml);
				
				$a = $a + 8;
				$b = $b + 8;
				$c = $c + 8;
				$d = $d + 8;
				$e = $e + 8;
				$f = $f + 8;
				$g = $g + 8;
				$h = $h + 8;
			}
		}
		
		//$this->do_upload();
		//echo "Sukses";
		

		redirect('home', 'refresh');
		
		
	}
	*/
	function rincian_simpan(){
		
		//$file_element_name = 'komponen';

        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xls|xlsx|doc|docx';
		$config['max_size']    = 1024 * 100;

			
        $this->load->library('upload', $config);
        //$this->upload->do_upload('file');
	$this->upload->do_upload(str_replace(' ', '-', 'file'));
	
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		$nojo	= $this->input->post('joborder[0]');
		$item = array (
			'nojo' => $this->input->post('joborder[0]'),
			'tanggal' => $this->input->post('joborder[1]'),
			'project' => $this->input->post('joborder[2]'),
			'syarat' => $this->input->post('joborder[3]'),
			'deskripsi' => $this->input->post('joborder[4]'),
			'lama' => $this->input->post('joborder[5]'),
			'latihan' => $this->input->post('joborder[6]'),
			'bekerja' => $this->input->post('joborder[7]'),
			'komponen' => $this->input->post('joborder[8]'),
			'type_jo' => $this->input->post('joborder[9]'),
			'approval' => '0',
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $data['nama']	
		);
		
		$this->job_model->inserttransjo($item);
		
		
		
		$putih = array (
			'nojo' => $this->input->post('joborder[0]'),
			'filename'	=> $this->input->post('joborder[8]')
			
		);
		
		$this->job_model->insert_file($putih);
		
		
		$rec 	= $this->input->post('joborder[10]');
		
		$rec	= explode(",",$rec);
		$loop = count($rec)/9;
		if ($loop){
			$a = 0; $b = 1; $c = 2; $d = 3; $e = 4; $f = 5; $g = 6; $h = 7;
			for ($i=0; $i<$loop; $i++){
				$iteml = array(
					'nojo' => $this->input->post('joborder[0]'),
					'jabatan' => $rec[$a],
					'gender' => $rec[$b],
					'pendidikan' => $rec[$c],
					'lokasi' => $rec[$d],
					'waktu' => $rec[$e],
					'atasan' => $rec[$f],
					'kontrak' => $rec[$g],
					'jumlah' => $rec[$h],
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
				$this->job_model->inserttransrincian($iteml);
				
				$a = $a + 8;
				$b = $b + 8;
				$c = $c + 8;
				$d = $d + 8;
				$e = $e + 8;
				$f = $f + 8;
				$g = $g + 8;
				$h = $h + 8;
			}
		}
		
		//$this->do_upload();
		//echo "Sukses";
		

		redirect('home', 'refresh');

/*		$data['title'] = "Job Order";
		$data['transjo'] = $this->job_model->get_transjo();

		$this->load->view('pages/header',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('pages/footer');
*/	}
	
	/*
	public function do_upload()
	{
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|xls|xlsx|pdf';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
			$putih = array (
				'nojo' => $this->input->post('nojo'),
				'filename' => $data['upload_data']['komponen']
			);
			
			$this->job_model->insert_file($putih);
			redirect ('home','refresh');
		}
	}
	*/
	
	function rincian_save()
	{
		
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		
		
		
		$rincianx 		= $this->input->post('xrincian');
		$nojo	= $rincianx[0];
		$jabatan	= $rincianx[1];
		$gender		= $rincianx[2];
		
		$pendidikan	= $rincianx[3];
		
		$lokasi	= $rincianx[4];
		
		$waktu	= $rincianx[5];
		
		$atasan	= $rincianx[6];
		
		$kontrak	= $rincianx[7];
		
		$jumlah	= $rincianx[8];
		
		
		$iteml = array(
					'nojo' => $nojo,
					'jabatan' => $jabatan,
					'gender' => $gender,
					'pendidikan' => $pendidikan,
					'lokasi' => $lokasi,
					'waktu' => $waktu,
					'atasan' => $atasan,
					'kontrak' => $kontrak,
					'jumlah' => $jumlah,
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
				
		$this->job_model->inserttransrincian($iteml);
		
		
		
		//$this->listrincian();
		//print_r ("rincian berhasil di tambahkan");
		
		
		
	}
	/*
	function rincian_edit()
	{
		
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		

		
		
		$logicx 		= $this->input->post('xlogic');
		$sid	= $logicx[0];
		$snojo	= $logicx[1];
		$sjabatan	= $logicx[2];
		$sgender		= $logicx[3];
		
		$spendidikan	= $logicx[4];
		
		$slokasi	= $logicx[5];
		
		$swaktu	= $logicx[6];
		
		$satasan	= $logicx[7];
		
		$skontrak	= $logicx[8];
		
		$sjumlah	= $logicx[9];
		
		
		$item = array(
					'id' => $sid,
				);
		
		$iteml = array(
					'nojo' => $snojo,
					'jabatan' => $sjabatan,
					'gender' => $sgender,
					'pendidikan' => $spendidikan,
					'lokasi' => $slokasi,
					'waktu' => $swaktu,
					'atasan' => $satasan,
					'kontrak' => $skontrak,
					'jumlah' => $sjumlah,
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
				
		$this->job_model->editrincian($iteml,$iteml);
		
		
		
		//$this->listrincian();
		//print_r ("rincian berhasil di tambahkan");
		
		
		
	}
	*/
	function rincian_cancel()
	{
		
		
		$session_data			= $this->session->userdata('logged_in');
		$data['nama']			= $session_data['nama'];
		$data['level']			= $session_data['level'];
		
		$iler = $this->input->post('data');
		$this->job_model->deleterincian($iler);
		//print_r ("rincian berhasil di hapus");
			
			
		/*
		$rincianx1		= $this->input->post('xrincian1');
		$id			= $rincianx1[0];
		$nojo		= $rincianx1[1];
		$jabatan	= $rincianx1[2];
		$gender		= $rincianx1[3];
		
		$pendidikan	= $rincianx1[4];
		
		$lokasi	= $rincianx1[5];
		
		$waktu	= $rincianx1[6];
		
		$atasan	= $rincianx1[7];
		
		$kontrak	= $rincianx1[8];
		
		$jumlah	= $rincianx1[9];
		
		$item = array (
					'id' => $id
		);
		
		$iteml = array(
					'nojo' => $nojo,
					'jabatan' => $jabatan,
					'gender' => $gender,
					'pendidikan' => $pendidikan,
					'lokasi' => $lokasi,
					'waktu' => $waktu,
					'atasan' => $atasan,
					'kontrak' => $kontrak,
					'jumlah' => $jumlah,
					'upd' => $data['nama'],
					'lup' => date("Y-m-d H:i:s")
				);
			
		$this->job_model->deleterincian($item);
		*/
		//print_r ("rincian berhasil di tambahkan");
		
		
		
	}
	
	
	public function listrincian()
	{
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['title'] 			= "List Rincian";
			
			$data['lrincian'] 		= $this->user->listrincian($this->input->post('dataarr'));
			
			
			
			$this->load->view('joborder/listrincian',$data);
			
		} else {
			redirect ('login','refresh');
		}
	}
	
	
	
	public function hitung($next){
		$inext = strlen($next);
		switch ($inext){
			case 1: $noj = "00000" . $next; break; 
			case 2: $noj = "0000" . $next; break;
			case 3: $noj = "000" . $next; break;
			case 4: $noj = "00" . $next; break;
			case 5: $noj = "0" . $next; break;
			case 6: $noj = $next; break;
		}
		return $noj;
	}	

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}
	
	public function change_password(){
		if($this->session->userdata('logged_in')){
			$session_data 		= $this->session->userdata('logged_in');
			$data['username'] 			= $session_data['username'];
			//$data['username'] 			= $session_data['username'];
			$this->load->view('login/change_password', $data);		
			} else {
			redirect('login', 'refresh');
		}
	}	
}
