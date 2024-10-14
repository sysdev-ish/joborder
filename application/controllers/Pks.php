<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') or exit('No direct script access allowed');

class Pks extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation', 'curl'));
		$this->load->model(array('job_model', 'pks_model'));
	}

	//baru 2023
	public function verifikasi()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";


			$data['status'] 		= $this->pks_model->get_status_pks();

			$marray 						= $this->pks_model->get_allbak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['no_bak'] . "'>" . $list['no_bak'] . "</option>";
			}
			$data['cmbbak']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('pks/verifikasi', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function list_data_verifikasi()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"cari_project"       	=> $postparam['cari_project'],
				"cari_customer"       	=> $postparam['cari_customer'],
				"cari_status"       	=> $postparam['cari_status'],
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data = $this->pks_model->get_pks_verifikasi($length, $start, $search, $order, $dir, $parsearch);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			$path_detail = base_url() . 'index.php/pks/detail/';
			foreach ($data['data'] as $rows => $row) {				

				if ($row['project_type'] == 1) {
					$project_type = 'New Project';
				} else {
					$project_type = 'New Pengembangan';
				}

				if ($row['status_pks'] == 1) {
					$spks = '<span class="label label-default">Draft Internal</span>';
				} else if ($row['status_pks'] == 2) {
					$spks = '<span class="label label-default">Review Internal</span>';
				} else if ($row['status_pks'] == 3) {
					$spks = '<span class="label label-default">Review Eksternal</span>';
				} else if ($row['status_pks'] == 4) {
					$spks = '<span class="label label-default">Sirkuler Internal</span>';
				} else if ($row['status_pks'] == 5) {
					$spks = '<span class="label label-default">Sirkuler Eksternal</span>';
				} else if ($row['status_pks'] == 6) {
					$spks = '<span class="label label-warning">Return</span>';
				} else if ($row['status_pks'] == 7) {
					$spks = '<span class="label label-danger">Stop</span>';
				} else {
					$spks = '<span class="label label-primary">Dikirim ke Legal</span>';
				}				

				$output['data'][] = array(
					$nomor_urut,
					$row['project'] . '<br><br><b>'.$project_type.'</b><br><span class="label label-success">NO BAK : ' .$row['nobak']. '</span><hr> '. $row['project_start'].' s/d '. $row['project_end'].'<br><span class="label label-danger"> '.$row['project_long'].' bulan</span><hr>Created by : ' .explode('-', $row['project_created'])[1].' ('.explode('-', $row['project_created'])[0].')',
					explode('||',$row['customer'])[1],
					$row['project_approved_by'].'<br>'.$row['project_approved_at'],
					$row['nopks'],
					$spks,
					'<a class="btn btn-social-icon btn-github" href="' . $path_detail . $row['id'] . '"><i class="fa fa-eye"></i></a>'
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	public function draft()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";


			$data['status'] 		= $this->pks_model->get_status_pks();

			$marray 						= $this->pks_model->get_allbak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['no_bak'] . "'>" . $list['no_bak'] . "</option>";
			}
			$data['cmbbak']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('pks/draft', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function list_data_draft()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"cari_project"       	=> $postparam['cari_project'],
				"cari_customer"       	=> $postparam['cari_customer'],
				"cari_status"       	=> $postparam['cari_status'],
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data = $this->pks_model->get_pks_draft($length, $start, $search, $order, $dir, $parsearch);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			$path_detail = base_url() . 'index.php/pks/detail/';
			foreach ($data['data'] as $rows => $row) {				

				if ($row['project_type'] == 1) {
					$project_type = 'New Project';
				} else {
					$project_type = 'New Pengembangan';
				}

				if ($row['status_pks'] == 1) {
					$spks = '<span class="label label-default">Draft Internal</span>';
				} else if ($row['status_pks'] == 2) {
					$spks = '<span class="label label-default">Review Internal</span>';
				} else if ($row['status_pks'] == 3) {
					$spks = '<span class="label label-default">Review Eksternal</span>';
				} else if ($row['status_pks'] == 4) {
					$spks = '<span class="label label-default">Sirkuler Internal</span>';
				} else if ($row['status_pks'] == 5) {
					$spks = '<span class="label label-default">Sirkuler Eksternal</span>';
				} else if ($row['status_pks'] == 6) {
					$spks = '<span class="label label-warning">Return</span>';
				} else if ($row['status_pks'] == 7) {
					$spks = '<span class="label label-danger">Stop</span>';
				} else {
					$spks = '<span class="label label-primary">Dikirim ke Legal</span>';
				}				

				$output['data'][] = array(
					$nomor_urut,
					$row['project'] . '<br><br><b>'.$project_type.'</b><br><span class="label label-success">NO BAK : ' .$row['nobak']. '</span><hr> '. $row['project_start'].' s/d '. $row['project_end'].'<br><span class="label label-danger"> '.$row['project_long'].' bulan</span><hr>Created by : ' .explode('-', $row['project_created'])[1].' ('.explode('-', $row['project_created'])[0].')',
					explode('||',$row['customer'])[1],
					$row['project_approved_by'].'<br>'.$row['project_approved_at'],
					$row['nopks'],
					$spks,
					'<a class="btn btn-social-icon btn-github" href="' . $path_detail . $row['id'] . '"><i class="fa fa-eye"></i></a>'
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	public function sirkuler()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";


			$data['status'] 		= $this->pks_model->get_status_pks();

			$marray 						= $this->pks_model->get_allbak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['no_bak'] . "'>" . $list['no_bak'] . "</option>";
			}
			$data['cmbbak']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('pks/sirkuler', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function list_data_sirkuler()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"cari_project"       	=> $postparam['cari_project'],
				"cari_customer"       	=> $postparam['cari_customer'],
				"cari_status"       	=> $postparam['cari_status'],
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data = $this->pks_model->get_pks_sirkuler($length, $start, $search, $order, $dir, $parsearch);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			$path_detail = base_url() . 'index.php/pks/detail/';
			foreach ($data['data'] as $rows => $row) {				

				if ($row['project_type'] == 1) {
					$project_type = 'New Project';
				} else {
					$project_type = 'New Pengembangan';
				}

				if ($row['status_pks'] == 1) {
					$spks = '<span class="label label-default">Draft Internal</span>';
				} else if ($row['status_pks'] == 2) {
					$spks = '<span class="label label-default">Review Internal</span>';
				} else if ($row['status_pks'] == 3) {
					$spks = '<span class="label label-default">Review Eksternal</span>';
				} else if ($row['status_pks'] == 4) {
					$spks = '<span class="label label-default">Sirkuler Internal</span>';
				} else if ($row['status_pks'] == 5) {
					$spks = '<span class="label label-default">Sirkuler Eksternal</span>';
				} else if ($row['status_pks'] == 6) {
					$spks = '<span class="label label-warning">Return</span>';
				} else if ($row['status_pks'] == 7) {
					$spks = '<span class="label label-danger">Stop</span>';
				} else {
					$spks = '<span class="label label-primary">Dikirim ke Legal</span>';
				}				

				$output['data'][] = array(
					$nomor_urut,
					$row['project'] . '<br><br><b>'.$project_type.'</b><br><span class="label label-success">NO BAK : ' .$row['nobak']. '</span><hr> '. $row['project_start'].' s/d '. $row['project_end'].'<br><span class="label label-danger"> '.$row['project_long'].' bulan</span><hr>Created by : ' .explode('-', $row['project_created'])[1].' ('.explode('-', $row['project_created'])[0].')',
					explode('||',$row['customer'])[1],
					$row['project_approved_by'].'<br>'.$row['project_approved_at'],
					$row['nopks'],
					$spks,
					'<a class="btn btn-social-icon btn-github" href="' . $path_detail . $row['id'] . '"><i class="fa fa-eye"></i></a>'
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	public function selesai()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";


			$data['status'] 		= $this->pks_model->get_status_pks();

			$marray 						= $this->pks_model->get_allbak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['no_bak'] . "'>" . $list['no_bak'] . "</option>";
			}
			$data['cmbbak']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('pks/selesai', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function list_data_selesai()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"cari_project"       	=> $postparam['cari_project'],
				"cari_customer"       	=> $postparam['cari_customer'],
				"cari_status"       	=> $postparam['cari_status'],
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data = $this->pks_model->get_pks_selesai($length, $start, $search, $order, $dir, $parsearch);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			$path_detail = base_url() . 'index.php/pks/detail/';
			foreach ($data['data'] as $rows => $row) {				

				if ($row['project_type'] == 1) {
					$project_type = 'New Project';
				} else {
					$project_type = 'New Pengembangan';
				}

				$output['data'][] = array(
					$nomor_urut,
					$row['project'] . '<br><br><b>'.$project_type.'</b><br><span class="label label-success">NO BAK : ' .$row['nobak']. '</span><hr> '. $row['project_start'].' s/d '. $row['project_end'].'<br><span class="label label-danger"> '.$row['project_long'].' bulan</span><hr>Created by : ' .explode('-', $row['project_created'])[1].' ('.explode('-', $row['project_created'])[0].')',
					explode('||',$row['customer'])[1],
					$row['project_approved_by'].'<br>'.$row['project_approved_at'],
					$row['nopks'],
					'<a class="btn btn-social-icon btn-github" href="' . $path_detail . $row['id'] . '"><i class="fa fa-eye"></i></a>'
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	public function stop()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";


			$data['status'] 		= $this->pks_model->get_status_pks();

			$marray 						= $this->pks_model->get_allbak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['no_bak'] . "'>" . $list['no_bak'] . "</option>";
			}
			$data['cmbbak']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('pks/stop', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function list_data_stop()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"cari_project"       	=> $postparam['cari_project'],
				"cari_customer"       	=> $postparam['cari_customer'],
				"cari_status"       	=> $postparam['cari_status'],
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data = $this->pks_model->get_pks_stop($length, $start, $search, $order, $dir, $parsearch);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			$path_detail = base_url() . 'index.php/pks/detail/';
			foreach ($data['data'] as $rows => $row) {				

				if ($row['project_type'] == 1) {
					$project_type = 'New Project';
				} else {
					$project_type = 'New Pengembangan';
				}

				$output['data'][] = array(
					$nomor_urut,
					$row['project'] . '<br><br><b>'.$project_type.'</b><br><span class="label label-success">NO BAK : ' .$row['nobak']. '</span><hr> '. $row['project_start'].' s/d '. $row['project_end'].'<br><span class="label label-danger"> '.$row['project_long'].' bulan</span><hr>Created by : ' .explode('-', $row['project_created'])[1].' ('.explode('-', $row['project_created'])[0].')',
					explode('||',$row['customer'])[1],
					$row['project_approved_by'].'<br>'.$row['project_approved_at'],
					$row['nopks'],
					'<a class="btn btn-social-icon btn-github" href="' . $path_detail . $row['id'] . '"><i class="fa fa-eye"></i></a>'
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	function detail()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['type'] 			= $session_data['type'];

			$data['listData'] = $this->pks_model->detailDataPks($this->uri->segment(3));

			$post = array(
				'id'		=> $this->uri->segment(3),
			);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://192.168.88.88/legal/public/api/activityPks",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $post,
				CURLOPT_SSL_VERIFYPEER => false
			));

			$response = curl_exec($curl);
			$data['report'] = json_decode($response);
			curl_close($curl);

			// var_dump($data['report']);die;

			$this->load->view('pages/header', $data);
			$this->load->view('pks/detail', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function update_history()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$nama 			= $session_data['nama'];

			if($this->input->post('lampiran') <> ''){
				$filename = $_FILES['file']['name'];
			    $filedata = $_FILES['file']['tmp_name'];
			    $filesize = $_FILES['file']['size'];

			    $lampiran = "@$filedata";
			}else{
				$lampiran = '';
			}

			if($this->input->post('status') == '' || $this->input->post('status') == 'undefined'){
				$status = 0;
				$status_nm = 'Revisi';
			}else{
				$status = $this->input->post('status');
				$status_nm = $this->input->post('status');
			}

			$post = array(
				'id' =>  $this->input->post('id'),
				'keterangan' => $this->input->post('keterangan'),
				'lampiran' => $lampiran,
				'status' => $status,
				'status_nm' => $status_nm,
				'created' => $username.'-'.$nama
			);
			
			$headers  = array(
				'Content-Type: multipart/form-data',
			);

			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => "http://192.168.88.88/legal/public/api/updatePks",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => false,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $post,            
				CURLOPT_HTTPHEADER => $headers,
			));

			$response = curl_exec($ch);

			$res = json_decode($response);


			curl_close($ch);

			/**update tabel legal_pks*/
			$this->db->query("update legal_pks set status_pks = '".$status."', catatan='" . $this->input->post('keterangan') . "' where  id='" . $this->input->post('id') . "' ");

			if ($res->status_code == 1) {
				echo "Success";
			} else {
				echo "Failed";
			}
		} else {
			show_404('page');
		}
	}

	public function project_non_pks()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";


			$data['status'] 		= $this->pks_model->get_status_pks();

			$marray 						= $this->pks_model->get_allbak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['no_bak'] . "'>" . $list['no_bak'] . "</option>";
			}
			$data['cmbbak']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('pks/non_pks', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function list_data_project_non_pks()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"cari_project"       	=> $postparam['cari_project'],
				"cari_customer"       	=> $postparam['cari_customer'],
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data = $this->pks_model->get_project_non_pks($length, $start, $search, $order, $dir, $parsearch);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;

			$komponen_bak = "https://joborder.ish.co.id/uploads/";

			foreach ($data['data'] as $rows => $row) {				

				if ($row['type_jo'] == 1) {
					$project_type = 'New Project';
				} else {
					$project_type = 'New Pengembangan';
				}

				if ($row['n_project'] == '' || $row['n_project'] == 'Pilih') {
					$project = $row['project'];
				} else {
					$project = $row['n_project'];
				}

				if ($row['komponen_bak'] <> '') {
			      $komponen_bak = "<a href='https://joborder.ish.co.id/newbak/" . $row['komponen_bak'] . " ' target='_blank'><i class='fa fa-cloud-download-alt'></i> ".$row['komponen_bak']."</a>";
			    } else {
			      $komponen_bak = '';
			    }

				$output['data'][] = array(
					$nomor_urut,
					$project . '<br><br><b>'.$project_type.'</b><br><hr> '. $row['start_project'].' s/d '. $row['end_project'].'<br><span class="label label-danger"> '.$row['lama'].' bulan</span><hr>Created by : ' .$row['pembuat'],
					$row['no_bak'].'<hr>'.$komponen_bak,
					$row['nama_cust'],
					$row['jenis_captive'],
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	/**----------------------------------------------------------------------------------------------------------*/
	public function listpm()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			$marray 						= $this->pks_model->get_allbak();
			$select = "";
			foreach ($marray as $key => $list) {
				$select .= "<option value='" . $list['no_bak'] . "'>" . $list['no_bak'] . "</option>";
			}
			$data['cmbbak']		= $select;

			$this->load->view('pages/header', $data);
			$this->load->view('pks/listpm', $data);
			$this->load->view('pages/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function listdata_pks()
	{
		$session = $this->session->userdata('logged_in');
		if (isset($session)) {
			$postparam = $this->input->post();

			$parsearch	= array(
				"carnoj"       	=> $postparam['carnoj'],
				"carpro"       	=> $postparam['carpro'],
				"cartnew"       => $postparam['cartnew'],
				"cartbak"       => $postparam['cartbak'],
				"cartstatpks"   => $postparam['cartstatpks'],
				"carpks"   => $postparam['carpks'],
				"carapp"   => $postparam['carapp']
			);

			$draw = $postparam['draw'];
			$length = $postparam['length'];
			$start = $postparam['start'];
			$search = $postparam['search']["value"];

			$order = $postparam['order'][0]['column'];
			$dir = $postparam['order'][0]['dir'];
			$level 	  = $session['level'];
			$regional = $session['regional'];
			$username = $session['username'];

			$data = $this->pks_model->listdata_pks($length, $start, $search, $order, $dir, $parsearch);

			$output = array();
			$output['draw'] = $draw;
			$output['recordsTotal'] = $output['recordsFiltered'] = $data['total_data'];
			$output['data'] = array();
			$nomor_urut = $start + 1;
			foreach ($data['data'] as $rows => $row) {
				if ($row['type_new'] == 1) {
					$tne = 'New Project';
				} else {
					$tne = 'New Pengembangan';
				}

				// if($row['n_project']=='Pilih' or $row['n_project']=='') {
				// 	$npro = $row['project'];
				// } else {
				// 	$npro = $row['n_project'];
				// }


				if (!filter_var($row['lama'], FILTER_VALIDATE_INT)) {
					$def = $row['lama'];
				} else {
					$def = $row['lama'] . ' bulan';
				}

				if ($row['status_pks'] == 1) {
					$spks = 'Draft Internal';
				} else if ($row['status_pks'] == 7) {
					$spks = 'Review Internal';
				} else if ($row['status_pks'] == 6) {
					$spks = 'Review Ekternal';
				} else if ($row['status_pks'] == 13) {
					$spks = 'Sirkuler Internal';
				} else if ($row['status_pks'] == 14) {
					$spks = 'Sirkuler Eksternal';
				} else if ($row['status_pks'] == 10) {
					$spks = 'Done PKS';
				} else if ($row['status_pks'] == 9) {
					$spks = 'Review Internal by PM';
				} else if ($row['status_pks'] == 19) {
					$spks = "<a href='' onclick='javascript:returnData(\"" . $row['nobak'] . "\");' data-toggle='modal' data-target='#myModal5'>Return</a>";
				} else if ($row['status_pks'] == 15) {
					$spks = 'Verifikasi';
				} else if ($row['status_pks'] == 16) {
					$spks = 'Rejected';
				} else {
					$spks = 'Dikirim ke Legal';
				}

				if ($row['status_pks'] == 6) {
					$fff = "<td><a href='' onclick='javascript:rincid(\"" . $row['nobak'] . "\");' id='btnadd' data-toggle='modal' data-target='#XmyModal'>" . $spks . "</a></td>";
				} else {
					$fff = "<td>" . $spks . "</td>";
				}

				$ggg = "<td><a href='' onclick='javascript:vdok(\"" . $row['nobak'] . "\");' id='btnvdok' data-toggle='modal' data-target='#DXmyModal'>View Dokumen</a></td>";
				if ($row['status_pks'] <> 0) {
					$log = "<a href='' onclick='javascript:logDraft(\"" . $row['nobak'] . "\");' id='btnvnojo' data-toggle='modal' data-target='#myModal4'><i class='fa fa-eye' ></i> View</a>";
				} else {
					$log = '';
				}
				$output['data'][] = array(
					$row['nobak'],
					"<a href='' onclick='javascript:vnojo(\"" . $row['nobak'] . "\");' id='btnvnojo' data-toggle='modal' data-target='#myModal3'>View Nojo</a>",
					$row['nama_type'],
					$row['project'],
					$def,
					$row['nopks'],
					$row['approval'],
					$fff,
					// $row['doc_pks']
					$ggg,
					$log
				);
				$nomor_urut++;
			}
			echo json_encode($output);
		} else {
			redirect('login');
		}
	}

	public function excel()
	{
		$session_data = $this->session->userdata('logged_in');
		$username = $session_data['userid'];
		$level = $session_data['userlevel'];
		$data['level']		= $session_data['userlevel'];

		$cekNoBak = $this->db->query("SELECT nobak FROM trans_nojopks WHERE nojo='" . $_GET['carnoj'] . "' ")->row();

		$post = array(
			'token'		=> sha1("#ISH!@#"),
			'no_bak'		=> $_GET['cartbak'],
			'nojo'		=> $cekNoBak->nobak,
			'jenis_doc'		=> $_GET['cartnew'],
			'no_pks'		=> $_GET['carpks'],
			'app_pm'		=> $_GET['carapp'],
			'status'		=> $_GET['cartstatpks'],
		);

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://legal.ish.co.id/index.php/api/updateflag/historydraftDownload",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $post,
			CURLOPT_SSL_VERIFYPEER => false
		));

		$response = curl_exec($curl);
		$data['excelReport'] = json_decode($response);

		$this->load->view('pks/excel', $data);
	}

	/*
	function app_pks(){
		if ($this->session->userdata('logged_in')){
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$nama	 	= $session_data['nama'];
			$tes 		= $session_data['level'];
			
			$listsave	= $this->input->post('data');
			$type_app	= $this->input->post('typex');
			if($type_app==1){
				$flagpks = 13;	
			} else {
				$flagpks = 9;
			}
			
			$postx = array(
				'token'		=> sha1("#ISH!@#"),
				'no_bak'	=> $listsave[0],
				'username'	=> $username,
				'flagpks'	=> $flagpks,
				'ketapp'	=> $listsave[1]
			);
			 
			$curl = curl_init();
			
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://legal.ish.co.id/index.php/api/updateflag",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $postx,
			  CURLOPT_SSL_VERIFYPEER => false
			));

			$responsex = curl_exec($curl);
			$abc = json_decode($responsex);
			if($abc=="Sukses"){
				$item = array (
					'no_bak' 			=> $listsave[0]
				);
				
				$putih = array (
					'flag_pks' 		=> $flagpks,
					'ketapp_pks'	=> $listsave[1],
					'updapp_pks'	=> $nama,
					'dateapp_pks'	=> date("Y-m-d H:i:s")
				);
				$this->pks_model->update_pks($item, $putih);
				echo "Sukses";die;
			} else {
				echo "Gagal";die;
			}
		}
	}
	*/

	function app_pks()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$username 	= $session_data['username'];
			$nama	 	= $session_data['nama'];
			$tes 		= $session_data['level'];
			$date = date("Ymdis");
			// var_dump($_FILES['filesnbak']['name']);

			$jml_newbak = $this->db->query("SELECT new_bak FROM trans_jo WHERE new_bak IS NOT NULL OR new_bak!='' ")->num_rows();
			$cekid = $this->db->query("SELECT id FROM trans_pks_new WHERE nobak='" . $_POST['nobak'] . "' ")->row();

			if ($_POST['newbak'] != '') {
				$target_aman = "./newbak/";
				$ext = explode('.', basename($_FILES['filesnbak']['name']));
				$nm_newbak = $cekid->id . "_" . $date . "_NEWBAK." . $ext[count($ext) - 1];
				$target_aman = $target_aman . $cekid->id . "_" . $date . "_NEWBAK." . $ext[count($ext) - 1];
				if (move_uploaded_file($_FILES['filesnbak']['tmp_name'], $target_aman)) {
					// $type_app	= $_POST['status'];
					// if($type_app==1){
					// 	$flagpks = 13;	
					// } else {
					// 	$flagpks = 9;
					// }

					$postx = array(
						'token'		=> sha1("#ISH!@#"),
						'no_bak'	=> $_POST['nobak'],
						'username'	=> $nama,
						'flagpks'	=> $_POST['status'],
						'nilai'	=> str_replace('.', '', $_POST['nilai']),
						'doc_lampiran'		=> $nm_newbak,
						'ketapp'	=> $_POST['kapp']
					);

					$curl = curl_init();

					curl_setopt_array($curl, array(
						CURLOPT_URL => "https://legal.ish.co.id/index.php/api/updateflag",
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "POST",
						CURLOPT_POSTFIELDS => $postx,
						CURLOPT_SSL_VERIFYPEER => false
					));

					$responsex = curl_exec($curl);
					$abc = json_decode($responsex);
					if ($abc == "Sukses") {
						$item = array(
							'nobak' 			=> $_POST['nobak']
						);

						$putih = array(
							'status_pks' 		=> $_POST['status'],
							// 'ketapp_pks'	=> $_POST['kapp'],
							'approval_draft'	=> $username,
							'lup_draft'	=> date("Y-m-d H:i:s"),
							'doc_lampiran_pm'		=> $nm_newbak
						);
						$this->pks_model->update_pks($item, $putih);
						echo "Sukses";
						die;
					} else {
						echo "Gagal";
						die;
					}
				} else {
					echo "Gagal Upload File New BAK";
					die;
				}
			} else {
				// $type_app	= $_POST['typex'];
				// if($type_app==1){
				// 	$flagpks = 13;	
				// } else {
				// 	$flagpks = 9;
				// }

				$postx = array(
					'token'		=> sha1("#ISH!@#"),
					'no_bak'	=> $_POST['nobak'],
					'username'	=> $nama,
					'nilai'	=> str_replace('.', '', $_POST['nilai']),
					'flagpks'	=> $_POST['status'],
					'ketapp'	=> $_POST['kapp']
				);

				$curl = curl_init();

				curl_setopt_array($curl, array(
					CURLOPT_URL => "https://legal.ish.co.id/index.php/api/updateflag",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => $postx,
					CURLOPT_SSL_VERIFYPEER => false
				));

				$responsex = curl_exec($curl);
				$abc = json_decode($responsex);
				if ($abc == "Sukses") {
					$item = array(
						'nobak' 			=> $_POST['nobak']
					);

					$putih = array(
						'status_pks' 		=> $_POST['status'],
						// 'ketapp_pks'	=> $_POST['kapp'],
						'approval_draft'	=> $username,
						'lup_draft'	=> date("Y-m-d H:i:s")
					);
					$this->pks_model->update_pks($item, $putih);
					echo "Sukses";
					die;
				} else {
					echo "Gagal";
					die;
				}
			}
		}
	}

	public function varrdok()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			// $postx = array(
			// 	'token'		=> sha1("#ISH!@#"),
			// 	'no_bak'		=> $this->input->post('nobakx')
			// );

			// $curl = curl_init();

			// curl_setopt_array($curl, array(
			//   CURLOPT_URL => "https://legal.ish.co.id/index.php/api/updateflag/historydok",
			//   CURLOPT_RETURNTRANSFER => true,
			//   CURLOPT_ENCODING => "",
			//   CURLOPT_MAXREDIRS => 10,
			//   CURLOPT_TIMEOUT => 0,
			//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			//   CURLOPT_CUSTOMREQUEST => "POST",
			//   CURLOPT_POSTFIELDS => $postx,
			//   CURLOPT_SSL_VERIFYPEER => false
			// ));

			// $responsex = curl_exec($curl);
			// $data['listdok'] = json_decode($responsex);
			$data['listdok'] = $this->pks_model->list_document($this->input->post('nobakx'));

			$this->load->view('pks/listdok', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function varnojo()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			$data['viewNojo'] = $this->pks_model->listdata_nojo($this->input->post('nobak'));

			$this->load->view('pks/listnojo', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function varlogDraft()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			$post = array(
				'token'		=> sha1("#ISH!@#"),
				'no_bak'		=> $this->input->post('nobak')
			);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://legal.ish.co.id/index.php/api/updateflag/historydraft",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $post,
				CURLOPT_SSL_VERIFYPEER => false
			));

			$response = curl_exec($curl);
			$data['viewlog'] = json_decode($response);

			$this->load->view('pks/listlog', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function varNoteReturn()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];
			$data['level'] 			= $session_data['level'];
			$data['layanan'] 		= $session_data['layanan'];
			$data['regional'] 		= $session_data['regional'];
			$data['type'] 			= $session_data['type'];
			$data['id'] 			= $session_data['id'];
			$data['title'] 			= "Job Order";

			$post = array(
				'token'		=> sha1("#ISH!@#"),
				'no_bak'		=> $this->input->post('nobak')
			);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://legal.ish.co.id/index.php/api/updateflag/historydraftreturn",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $post,
				CURLOPT_SSL_VERIFYPEER => false
			));

			$response = curl_exec($curl);
			$data = json_decode($response);

			foreach ($data as $row => $list) {

				$output['detail'][] = array(
					'nobak' => $list->bak,
					'note' => $list->update
				);
			}

			echo json_encode($output);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function revisi_pks()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['username'] 		= $session_data['username'];

			if ($this->input->post('flag') == 15) {
				$flag = 0;	
			} else {
				$flag = $this->input->post('flag');
			}
			
			$post = array(
				'token'		=> sha1("#ISH!@#"),
				'no_bak'		=> $this->input->post('nobak'),
				'flagpks'		=> $flag,
				'ketapp'		=> $this->input->post('ket'),
				'lup_update'	=> date("Y-m-d H:i:s"),
				'username'	=> $data['nama'],
			);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://legal.ish.co.id/index.php/api/updateflag",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $post,
				CURLOPT_SSL_VERIFYPEER => false
			));

			$response = curl_exec($curl);
			$data = json_decode($response);

			$item = array(
				'note'	=> $this->input->post('ket'),
				'status_pks'	=> $flag,
				'approval_draft'	=> $data['username'],
				'lup_draft'	=> date("Y-m-d H:i:s")
			);
			// var_dump($item);die;
			$this->pks_model->update_revisi($this->input->post('nobak'), $item);
		} else {
			redirect('login', 'refresh');
		}
	}
}
