<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation','zip'));
		$this->load->model(array('user', 'settingModel'));
	}


  function approvalManagement()
	{
		if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Approval Management";
			$layarray = $this->settingModel->taskID('');
				$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['taskID'] .">". $list['taskName'] ."</option>";
				}
			$data['cmbTask']		= $select;

			$layarray = $this->settingModel->cityShow('');
				$select = "<option value='' selected>ALL</option>";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['city_name'] ."</option>";
				}
			$data['cmbCity']		= $select;

			$layarray = $this->settingModel->taskDetail('1','');
				$selectx = "";
				foreach($layarray as $key => $list){
					$selectx .= "<option value=". $list['taskDetailID'] .">". $list['taskDetailName'] ."</option>";
				}
			$data['cmbTaskDetail']		= $selectx;
			foreach($layarray as $key => $list){
				$selectx .= "<option value=". $list['taskDetailID'] .">". $list['taskDetailName'] ."</option>";
			}

		$layarray = $this->settingModel->userShow('');
			$selectx = "";
			foreach($layarray as $key => $list){
				$selectx .= "<option value=". $list['id'] .">". $list['userName'] ." - ". $list['fullName'] ."</option>";
			}
		$data['cmbUser']		= $selectx;

		$selectx = $this->getApprovalList(1,1,'');

			$data['approvalList']= $selectx;


			$this->load->view('pages/header',$data);
			$this->load->view('setting/approvalManagement');
			$this->load->view('pages/footer');
		}
		else {
			redirect('login', 'refresh');
		}
	}
	public function JSapproveUserAdd()
	{
		$a = $this->settingModel->approveUserAdd($this->input->post('taskID'),$this->input->post('taskDetailID'),$this->input->post('userID'),$this->input->post('levelNo'),$this->input->post('valueMin'),$this->input->post('cityID'));
		header('Content-Type: application/json');

		echo json_encode("");
	}
	public function JSapproveUserDelete()
	{

		$a = $this->settingModel->approveUserDelete($this->input->post('taskID'),$this->input->post('taskDetailID'),$this->input->post('userID'),$this->input->post('cityID'));
		header('Content-Type: application/json');

		echo json_encode("");
	}
	public function JStaskDetail()
	{
		$layarray = $this->settingModel->taskDetail($this->input->post('taskID'),'');
		$selectx = $this->input->post('taskID');
		foreach($layarray as $key => $list){
			$selectx .= "<option value=". $list['taskDetailID'] .">". $list['taskDetailName'] ."</option>";
		}
		header('Content-Type: application/json');

		echo json_encode($selectx);
	}
	function getApprovalList($taskID,$taskDetailID,$city)
	{
		$totalData = 0;
		$layarray =  $this->settingModel->approvalList($taskID,$taskDetailID,'',$city);
		$selectx = "";
					foreach($layarray as $key => $list){
						$totalData = $totalData+1;
						$selectx .= "<tr><td>". $list['city_name'] ."</td><td>". $list['userID'] ." - ". $list['username'] ."</td><td>". $list['fullName'] ."</td>";
						$selectx .= "<td>". $list['levelNo'] ."</td><td style='text-align:right'>". number_format($list['valueMin'])."</td>";
						$selectx .= "<td><button class='btn btn-danger btn-xs'  onclick='deleteData(".$taskID.",".$taskDetailID.",".$list['userID'].",".$list['cityID'].")' title='Delete Data' type='button'><i class='fa fa-minus-circle'></i></button></td></tr>";
					}
					if($totalData<1)
					{
						$selectx = "<tr><td colspan=5 align='text-align:center'>No Data</td></tr>";

					}
					return $selectx;
	}
	public function JSApprovalData()
	{
		/*$layarray =  $this->settingModel->approvalList($this->input->post('taskID'),$this->input->post('taskDetailID'),'');
		$selectx = "";
					foreach($layarray as $key => $list){
						$selectx .= "<tr><td>". $list['userID'] ." - ". $list['username'] ."</td><td>". $list['fullName'] ."</td>";
						$selectx .= "<td>". $list['levelNo'] ."</td><td style='text-align:right'>". number_format($list['valueMin'])."</td>";
						$selectx .= "<td><button class='btn btn-danger btn-xs'  onclick='deleteData(".$this->input->post('taskID').",".$this->input->post('taskDetailID').",".$list['userID'].")' title='Delete Data' type='button'><i class='fa fa-minus-circle'></i></button></td></tr>";
					}
*/
			$selectx = $this->getApprovalList($this->input->post('taskID'),$this->input->post('taskDetailID'),$this->input->post('cityID'));
			header('Content-Type: application/json');

			echo json_encode($selectx);
	}
}
?>
