<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JobOrderEvent extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation','zip'));
		$this->load->model(array('user', 'Jobevent_model','settingModel'));
	}
//Job Training - Sales
#BEGIN REGION Job Event Iniate
  public function index()
  {
    if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['id']					= $session_data['id'];
			$data['username'] 	= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Job Order Event / OTC";

			$layarray = $this->settingModel->cityShow('');
				$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['city_name'] ."</option>";
				}
			$data['cmbCity']		= $select;

			$layarray = $this->settingModel->reffDoc('3');
			$select = "";
			$i = 0;
				foreach($layarray as $key => $list){
					$i=$i+1;
					$select .= "<div class='col-md-4' style='margin-top:10px;''>  <input type='checkbox' name='".$list['doc_id']."chk' id='chk' value='".$list['doc_id']."'>". $list['doc_name'] ."								<br><br></div>";
				}

			$data['chkDetail'] = $select;
		  $selectx = $this->jobEventList('','N','Event');
			$data['jobOrderList']= $selectx;
			$this->load->view('pages/header',$data);
			$this->load->view('JobOrderEvent/jobOrderEvent');
			$this->load->view('pages/footer');
		}
		else {
			redirect('login', 'refresh');
		}
  }
	function JSGetEventList()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$datas = $this->jobEventList($this->input->post('criteriaData'),$this->input->post('status'),$this->input->post('types'));
		$array = array('result' => $datas );
		echo json_encode($array);
	}
	function jobEventList($criteriaData,$status='N',$types)
	{
		$session_data 			= $this->session->userdata('logged_in');
		if(strcmp($session_data['level'],'1')==0)
		{
			$layarrayz = $this->Jobevent_model->jobEventShow($criteriaData,$status,$session_data['id'],$types,$session_data['level']);
		}
		else {
			$layarrayz = $this->Jobevent_model->jobEventShow($criteriaData,$status,$session_data['id'],$types,'0');
		}
		$selectx = "";
		$statusData = "";
		$i = 0;
		foreach($layarrayz as $key => $list){
			$i=$i+1;
			$statusData = "";
			switch ($list['isStatus']) {
				case 'N':
					$statusData = "NEW";
					break;
				case 'W':
					$statusData = "WAITING FOR SLS APPROVAL";
					break;
				case 'O':
					$statusData = "OPERATION";
					break;
				case 'A':
					$statusData = "WAITING FOR OPR APPROVAL ";
					break;
				case 'F':
					$statusData = "FINANCE";
					break;
				case 'B':
					$statusData = "BILLING";
					break;
				case 'Y':
					$statusData = "COLLECTION";
					break;
				case 'R':
					$statusData = "RECEIVED BY CLIENT";
					break;
				case 'C':
					$statusData = "CLOSE";
					break;


			}
			$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['eventName'] ."</td>";
			$selectx.="<td>". date_format(date_create($list['eventDateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['eventDateTo']),"d M Y") ."</td>";
			$selectx.="<td>". strtoupper($list['eventVanue']) ."</td><td>". strtoupper($list['cityName']) ."</td>";
			$selectx.="<td style='text-align:right'>".number_format($list['eventValue']) ."</td><td>". strtoupper($list['managementFee']) ."</td>";
			$selectx.="<td>". $list['poNo'] ."</td>";
			$selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
			$selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['insertByName'] ."</td>";
			$selectx.="<td> <button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='Detail Data' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i> Detail Data</button>	";
			$selectx.="</td></tr>";
		}

		return $selectx;
	}

	function jobEventDetail()
	{

		$layarray2 = $this->Jobevent_model->joEventDetail($this->input->post('jonos'));
		$selectx = "";
		$i = 0;
		$status = "";
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Jo No :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['jono']."' class='form-control pull-right' id='jonoDetail' name='jonoDetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event / OTC Name :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventName']."' class='form-control pull-right' id='eventNamedetail' name='eventNamedetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From :  </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateFrom']),"d M Y")."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromdetail' name='dateFromdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date To :   </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateTo']),"d M Y")."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateTodetail' name='dateTodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event Type :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventType']."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateTodetail' name='dateTodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Vanue :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventVanue']."' class='form-control pull-right' id='vanuedetail' name='vanuedetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Location :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventLocation']."' class='form-control pull-right' id='locationdetail' name='locationdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>City :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['cityName']."' class='form-control pull-right' id='eventCitydetail' name='eventCitydetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Notes :  </label><div class='input-group col-md-8'><textarea rows='4' id='eventNotesdetail' class='form-control pull-right' readonly>".$list2['eventNotes']."</textarea></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Value : Rp. </label><div class='input-group col-md-8'><input type='text'  class='form-control pull-right' id='eventValuedetail' name='eventValuedetail' value='".number_format($list2['eventValue'])."' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Management Fee : % </label><div class='input-group col-md-8'><input type='text' maxlength='2' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".$list2['managementFee']."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Management Fee : Rp </label><div class='input-group col-md-8'><input type='text' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".number_format(($list2['eventValue'] * ($list2['managementFee']/100))) ."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Total Invoice : Rp </label><div class='input-group col-md-8'><input type='text' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".number_format(($list2['eventValue'] * ($list2['managementFee']/100))+$list2['eventValue']) ."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>PO No : </label><div class='input-group col-md-8'><input type='text'    value='".$list2['poNo']."'  placeholder='0' class='form-control pull-right' id='poNodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>PO : </label><div class='input-group col-md-8'><button type='button' class='btn btn-primary btn-block ' onclick=window.open('". base_url() . "uploads/".$list2['poName']."')><i class='fa fa-download'></i>  Download </button> </div></div>";
			$status = $list2['isStatus'];
		}

		$array = array('result'=>$selectx,'status' =>$status);
  	echo json_encode($array);
	}
	public function joOrderEventProcess()
	{
		 $session_data = $this->session->userdata('logged_in');
		 $datas = $this->Jobevent_model->joEventProcess($this->input->post('jono'),$session_data['id']);
		 $array = array('result'=>$datas);
   	 echo json_encode($array);
	}
	public function joOrderEventDelete()
	{
		 $session_data = $this->session->userdata('logged_in');
		 $datas = $this->Jobevent_model->joEventDelete($this->input->post('jono'),$session_data['nama']);
		 $array = array('result'=>$datas);
   	 echo json_encode($array);
	}
	public function joOrderEventAdd()
	{
		try{
					$session_data 			= $this->session->userdata('logged_in');

					$jonos = $this->Jobevent_model->generateJOEventNo();

					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = 'pdf';
					// $config['allowed_types']        = '*';
					$config['max_size']             = '1024 * 10';

					// $this->load->library('upload', $config);
					$this->load->library('upload'); 
					$this->upload->initialize($config);

					$config['file_name'] = $jonos . "_PO.". pathinfo($_FILES["poNameAdd"]["name"])['extension']; //New Name
					//echo $config['file_name'];
					if($this->upload->do_upload('poNameAdd',$config['file_name']))
					{
						//Save Data
						$this->Jobevent_model->joEventAdd($jonos,$this->input->post('eventNameAdd'),$this->input->post('eventTypeAdd'),$this->input->post('vanueAdd'),$this->input->post('locationAdd'),$this->input->post('cityID'),$this->input->post('dateFromAdd'),$this->input->post('dateToAdd'),$this->input->post('eventValueAdd'),$this->input->post('eventManagementAdd'),$this->input->post('eventNotesAdd'),$this->input->post('poNoAdd'),$config['file_name'],$session_data['id']);
						//Rename File
						rename($this->upload->data('full_path'),$this->upload->data('file_path').$config['file_name']); //Let it uploaded then rename it

						$layarray = $this->settingModel->reffDoc('3');
						foreach($layarray as $key => $list){
								//echo $this->input->post($list['doc_id']."chk") ;

								if(strlen($this->input->post($list['doc_id']."chk"))>0)
								{
									$this->Jobevent_model->transJOEventDocadd($jonos,$list['doc_id']);
								}
							}
						$redirect = site_url('/jobOrderEvent');
						echo "<script>javascript: window.location = '$redirect'</script>";
					}
					else
					{
						echo $this->upload->display_errors('<p>', '</p>');exit();
						 $redirect = site_url('/jobOrderEvent');
						 echo "<script>javascript:alert('Some of document failed to upload, please check your document.'); window.location = '$redirect'</script>";

					}



					//$selectx = "true";
				}
				catch(Exception $ex)
				{
					$selectx = false;
				}


	}

	#END REGION Job Event Iniate
	#BEGIN REGION Job Event APPROVAL
	public function joOrderEventApprove()
  {
    if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['id']					= $session_data['id'];
			$data['username'] 	= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Job Order Event / OTC";


		  $selectx = $this->jobEventApproveList('');
      //echo  "-" . $data['level'] . ' ' . $selectx . ' ' .$data['id'];
			$data['jobOrderList']= $selectx;
			$this->load->view('pages/header',$data);
			$this->load->view('JobOrderEvent/jobOrderEventApprove');
			$this->load->view('pages/footer');
		}
		else {
			redirect('login', 'refresh');
		}
  }
	function JSGetEventApproveList()
	{
		//$session_data 			= $this->session->userdata('logged_in');
		$datas = $this->jobEventApproveList($this->input->post('criteriaData'));
		$array = array('result' => $datas );
		echo json_encode($array);
	}
	function joOrderEventApproveProcess()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$datas = $this->Jobevent_model->joEventApprove($this->input->post('jono'),$session_data['id']);
		$array = array('result' => $datas );
		echo json_encode($array);
	}
	function joOrderEventRejectProcess()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$datas = $this->Jobevent_model->joEventReject($this->input->post('jono'),$session_data['id'],$this->input->post('rejects'));
		$array = array('result' => $datas );
		echo json_encode($array);
	}
	function jobEventApproveList($criteriaData)
	{
		$session_data 			= $this->session->userdata('logged_in');
		$layarrayz = $this->Jobevent_model->jobEventApproveShow($criteriaData,$session_data['id']);

		$selectx = "";
		$statusData = "";
		$i = 0;
		foreach($layarrayz as $key => $list){
			$i=$i+1;
			$statusData = "";
			switch ($list['isStatus']) {
				case 'N':
					$statusData = "NEW";
					break;
				case 'W':
					$statusData = "WAITING FOR SLS APPROVAL";
					break;
				case 'O':
					$statusData = "OPERATION";
					break;
				case 'A':
					$statusData = "WAITING FOR OPR APPROVAL ";
					break;
				case 'F':
					$statusData = "FINANCE";
					break;
				case 'B':
					$statusData = "BILLING";
					break;
				case 'Y':
					$statusData = "COLLECTION";
					break;
				case 'R':
					$statusData = "RECEIVED BY CLIENT";
					break;
				case 'C':
					$statusData = "CLOSE";
					break;
			}
			$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['eventType'] ."</td><td>". $list['eventName'] ."</td>";
			$selectx.="<td>". date_format(date_create($list['eventDateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['eventDateTo']),"d M Y") ."</td>";
			$selectx.="<td>". strtoupper($list['eventVanue']) ."</td><td>". strtoupper($list['cityName']) ."</td>";
			$selectx.="<td style='text-align:right'>".number_format($list['eventValue']) ."</td><td>". strtoupper($list['managementFee']) ."</td>";
			$selectx.="<td>". $list['poNo'] ."</td>";
			$selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
			$selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['insertByName'] ."</td>";
			$selectx.="<td> <button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='Detail Data' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i> Detail Data</button>	";
			//$selectx.= (strcmp($list['isStatus'],'N')==0?"<button class='btn btn-primary btn-xs'  onclick='process(".$i.")' title='Process Data' type='button' ><i class='fa fa-info'></i> Detail Data</button> </td></tr>":"");
			$selectx.="</td></tr>";
		}

		return $selectx;
	}

	function jobEventApproveDetail()
	{

		$layarray2 = $this->Jobevent_model->joEventDetail($this->input->post('jonos'));
		$selectx = "";
		$i = 0;
		$status = "";
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Jo No :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['jono']."' class='form-control pull-right' id='jonoDetail' name='jonoDetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event / OTC Name :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventName']."' class='form-control pull-right' id='eventNamedetail' name='eventNamedetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From :  </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateFrom']),"d M Y")."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromdetail' name='dateFromdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date To :   </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateTo']),"d M Y")."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateTodetail' name='dateTodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event Type :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventType']."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateTodetail' name='dateTodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Vanue :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventVanue']."' class='form-control pull-right' id='vanuedetail' name='vanuedetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Location :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventLocation']."' class='form-control pull-right' id='locationdetail' name='locationdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>City :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['cityName']."' class='form-control pull-right' id='eventCitydetail' name='eventCitydetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Notes :  </label><div class='input-group col-md-8'><textarea rows='4' id='eventNotesdetail' class='form-control pull-right' readonly>".$list2['eventNotes']."</textarea></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Value : Rp. </label><div class='input-group col-md-8'><input type='text'  class='form-control pull-right' id='eventValuedetail' name='eventValuedetail' value='".number_format($list2['eventValue'])."' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Management Fee : % </label><div class='input-group col-md-8'><input type='text' maxlength='2' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".$list2['managementFee']."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Management Fee : Rp </label><div class='input-group col-md-8'><input type='text' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".number_format(($list2['eventValue'] * ($list2['managementFee']/100))) ."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Total Invoice : Rp </label><div class='input-group col-md-8'><input type='text' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".number_format(($list2['eventValue'] * ($list2['managementFee']/100))+$list2['eventValue']) ."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>PO No : </label><div class='input-group col-md-8'><input type='text'    value='".$list2['poNo']."'  placeholder='0' class='form-control pull-right' id='poNodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>PO : </label><div class='input-group col-md-8'><button type='button' class='btn btn-primary btn-block ' onclick=window.open('". base_url() . "uploads/".$list2['poName']."')><i class='fa fa-eye'></i>  View </button> </div></div>";

			$status = $list2['isStatus'];
		}
		$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='rejectsDetail'  name='rejectsDetail'  class='form-control pull-right' rows='4'></textarea></div></div>";

		//$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='commentReject'  class='form-control pull-right' rows='4'></textarea></div></div>";

		$array = array('result'=>$selectx,'status' =>$status);
  	echo json_encode($array);
	}
	#END REGION Job Event APPROVAL
	#BEGIN REGION Job Event Operation
	public function joOrderEventOperation()
	{
		if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['id']					= $session_data['id'];
			$data['username'] 	= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Job Order Event / OTC";


			$selectx = $this->jobEventOperationList('');
			//echo  "-" . $data['level'] . ' ' . $selectx . ' ' .$data['id'];
			$data['jobOrderList']= $selectx;
			$this->load->view('pages/header',$data);
			$this->load->view('JobOrderEvent/jobOrderEventOperation');
			$this->load->view('pages/footer');
		}
		else {
			redirect('login', 'refresh');
		}
	}
	function JSGetEventOperationList()
	{
		//$session_data 			= $this->session->userdata('logged_in');
		$datas = $this->jobEventOperationList($this->input->post('criteriaData'));
		$array = array('result' => $datas );
		echo json_encode($array);
	}
	function jobEventOperationList($criteriaData)
	{
		$session_data 			= $this->session->userdata('logged_in');
		if(strcmp($session_data['level'],'1')==0)
		{
			$layarrayz = $this->Jobevent_model->jobEventOperationShow($criteriaData);
		}
		else {
			$layarrayz = $this->Jobevent_model->jobEventOperationShow($criteriaData);
		}
		$selectx = "";
		$statusData = "";
		$i = 0;
		foreach($layarrayz as $key => $list){
			$i=$i+1;
			$statusData = "";
			switch ($list['isStatus']) {
				case 'N':
					$statusData = "NEW";
					break;
				case 'W':
					$statusData = "WAITING FOR SLS APPROVAL";
					break;
				case 'O':
					$statusData = "OPERATION";
					break;
				case 'A':
					$statusData = "WAITING FOR OPR APPROVAL ";
					break;
				case 'F':
					$statusData = "FINANCE";
					break;
				case 'B':
					$statusData = "BILLING";
					break;
				case 'Y':
					$statusData = "COLLECTION";
					break;
				case 'R':
					$statusData = "RECEIVED BY CLIENT";
					break;
				case 'C':
					$statusData = "CLOSE";
					break;
			}
			$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['eventType'] ."</td><td>". $list['eventName'] ."</td>";
			$selectx.="<td>". date_format(date_create($list['eventDateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['eventDateTo']),"d M Y") ."</td>";
			$selectx.="<td>". strtoupper($list['eventVanue']) ."</td><td>". strtoupper($list['cityName']) ."</td>";
			$selectx.="<td style='text-align:right'>".number_format($list['eventValue']) ."</td><td>". strtoupper($list['managementFee']) ."</td>";
			$selectx.="<td>". $list['poNo'] ."</td>";
			$selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
			$selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['insertByName'] ."</td>";
			$selectx.="<td> <button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='Detail Data' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i> Detail Data</button>	";
			//$selectx.= (strcmp($list['isStatus'],'N')==0?"<button class='btn btn-primary btn-xs'  onclick='process(".$i.")' title='Process Data' type='button' ><i class='fa fa-info'></i> Detail Data</button> </td></tr>":"");
			$selectx.="</td></tr>";
		}

		return $selectx;
	}
	function jobEventOperationPreparation()
	{
		$checkList = "";
		$session_data 			= $this->session->userdata('logged_in');
		$layarray = $this->Jobevent_model->joReffNoShow($this->input->post('jonos'));
		$docs = 0;
		foreach($layarray as $key => $list){

			$checkList .= $list['doc_name']." : <input type='hidden' id='".$docs."labelID' name='".$docs."labelID' value='".$list['doc_id']."'><input type='hidden' id='".$docs."labelName' name='".$docs."labelName' value='".$list['doc_name']."'> <input type='file' id='".$docs."uploadFile' name='".$docs."uploadFile' onchange='btnChecker()'> <br>	";
			$docs = $docs + 1;
		}

		$layarray2 = $this->Jobevent_model->joEventDetail($this->input->post('jonos'));

		$rfpNo =  $this->Jobevent_model->generateJOEventRFP($session_data['id']);
		$selectx = "";
		$i = 0;
		$status = "";
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>RFP No : </label><div class='input-group col-md-8'><input type='text'  class='form-control pull-right' id='rfpDetail' name='rfpDetail' value='".$rfpNo."' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Jo No :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['jono']."' class='form-control pull-right' id='jonoDetail2' name='jonoDetail2' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event / OTC Name :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventName']."' class='form-control pull-right' id='eventNamedetail' name='eventNamedetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From - To :  </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateFrom']),"d M Y") . " - " . date_format(date_create($list2['eventDateTo']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromdetail' name='dateFromdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Value : Rp. </label><div class='input-group col-md-8'><input type='text'  class='form-control pull-right' id='eventValuedetail' name='eventValuedetail' value='".number_format($list2['eventValue'])."' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-12'>Document Checklist : </label><div class='input-group col-md-12' style=''>". $checkList."</div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Transfer Information : <br> [Exp] <br> Bank BNI <br> 12344556 an Fulan <br> Cabang Fatmawati </label><div class='input-group col-md-8'><textarea rows='4' id='transferInformation' name='transferInformation' class='form-control pull-right' ></textarea></div></div>";

			$status = $list2['isStatus'];
		}
		//$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='rejectsDetail'  name='rejectsDetail'  class='form-control pull-right' rows='4'></textarea></div></div>";

		//$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='commentReject'  class='form-control pull-right' rows='4'></textarea></div></div>";

		$array = array('result'=>$selectx,'totalDoc' =>$docs);
		echo json_encode($array);
	}
	function jobEventOperationDetail()
	{

		$layarray2 = $this->Jobevent_model->joEventDetail($this->input->post('jonos'));
		$selectx = "";
		$i = 0;
		$status = "";
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Jo No :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['jono']."' class='form-control pull-right' id='jonoDetail' name='jonoDetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event / OTC Name :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventName']."' class='form-control pull-right' id='eventNamedetail' name='eventNamedetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From :  </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateFrom']),"d M Y")."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromdetail' name='dateFromdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date To :   </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateTo']),"d M Y")."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateTodetail' name='dateTodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event Type :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventType']."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateTodetail' name='dateTodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Vanue :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventVanue']."' class='form-control pull-right' id='vanuedetail' name='vanuedetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Location :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventLocation']."' class='form-control pull-right' id='locationdetail' name='locationdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>City :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['cityName']."' class='form-control pull-right' id='eventCitydetail' name='eventCitydetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Notes :  </label><div class='input-group col-md-8'><textarea rows='4' id='eventNotesdetail' class='form-control pull-right' readonly>".$list2['eventNotes']."</textarea></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Value : Rp. </label><div class='input-group col-md-8'><input type='text'  class='form-control pull-right' id='eventValuedetail' name='eventValuedetail' value='".number_format($list2['eventValue'])."' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Management Fee : % </label><div class='input-group col-md-8'><input type='text' maxlength='2' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".$list2['managementFee']."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Management Fee : Rp </label><div class='input-group col-md-8'><input type='text' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".number_format(($list2['eventValue'] * ($list2['managementFee']/100))) ."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Total Invoice : Rp </label><div class='input-group col-md-8'><input type='text' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".number_format(($list2['eventValue'] * ($list2['managementFee']/100))+$list2['eventValue']) ."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>PO No : </label><div class='input-group col-md-8'><input type='text'    value='".$list2['poNo']."'  placeholder='0' class='form-control pull-right' id='poNodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>PO : </label><div class='input-group col-md-8'><button type='button' class='btn btn-primary btn-block ' onclick=window.open('". base_url() . "uploads/".$list2['poName']."')><i class='fa fa-eye'></i>  View </button> </div></div>";

			$status = $list2['isStatus'];
		}
		//$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='rejectsDetail'  name='rejectsDetail'  class='form-control pull-right' rows='4'></textarea></div></div>";

		//$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='commentReject'  class='form-control pull-right' rows='4'></textarea></div></div>";

		$array = array('result'=>$selectx,'status' =>$status);
  	echo json_encode($array);
	}
	function joRFPAdd()
	{
		try{
					$session_data 			= $this->session->userdata('logged_in');

					$jonos = $this->input->post('jonoDetail2');

					$config['upload_path']          = './uploads/';
					$config['allowed_types']        = 'pdf|PDF';
					$config['max_size']             = 1024;

					$totalData = $this->input->post('totalDoc');
					$selectx = false;
					$this->load->library('upload', $config);
					if($totalData>0)
					{
							for($i=0;$i<$totalData;$i++)
							{
								$selectx = true;
								//echo pathinfo($_FILES[$i."uploadFile"]["name"])['extension'];
								$config['file_name'] = $jonos . "_" . $this->input->post($i.'labelID') . "_" . $this->input->post($i.'labelName') .".". pathinfo($_FILES[$i."uploadFile"]["name"])['extension']; //New Name
								//echo "==> " . $config['file_name'];
								if($this->upload->do_upload($i.'uploadFile',$config['file_name']))
								{
									$this->Jobevent_model->joEventDocUpload($jonos,$config['file_name']);//Save Flag
									rename($this->upload->data('full_path'),$this->upload->data('file_path').$config['file_name']); //Let it uploaded then rename it
								}
								else {
									$selectx = false;
								}
							}
						}
						else {
							$selectx = true;
						}
					if($selectx)
					{
						$datas = $this->Jobevent_model->rfpAdd($this->input->post('jonoDetail2'),$this->input->post('rfpDetail'),$this->input->post('eventNamedetail'),$this->Jobevent_model->eraseNumericFormat($this->input->post('eventValuedetail')),$this->input->post('transferInformation'),$session_data['id']);
						$redirect = site_url('/JobOrderEvent/joOrderEventOperation');
						echo "<script>javascript: window.location = '$redirect'</script>";
					}
					else {
						$redirect = site_url('/JobOrderEvent/joOrderEventOperation');
						echo "<script>javascript:alert('Some of document failed to upload, please check your document.'); window.location = '$redirect'</script>";
					}
					//$selectx = "true";
				}
				catch(Exception $ex)
				{
					$selectx = false;
				}


	}
	#END REGION Job Training Operation
	#BEGIN REGION Job Event OperationApprove
	public function joOrderEventOperationApprove()
	{
		if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['id']					= $session_data['id'];
			$data['username'] 	= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Job Order Event / OTC";


			$selectx = $this->jobEventOperationApproveList('');
			//echo  "-" . $data['level'] . ' ' . $selectx . ' ' .$data['id'];
			$data['jobOrderList']= $selectx;
			$this->load->view('pages/header',$data);
			$this->load->view('JobOrderEvent/jobOrderEventOperationApprove');
			$this->load->view('pages/footer');
		}
		else {
			redirect('login', 'refresh');
		}
	}
	function JSGetEventOperationApproveList()
	{
		//$session_data 			= $this->session->userdata('logged_in');
		$datas = $this->jobEventOperationApproveList($this->input->post('criteriaData'));
		$array = array('result' => $datas );
		echo json_encode($array);
	}
	function JSJOEventOperationApprove()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$datas = $this->Jobevent_model->transJOEventOperationApprove($this->input->post('jonos'),$session_data['id']);
		$array = array('result' => $datas );
		echo json_encode($array);
	}
	function JSJOEventOperationReject()
	{
		$session_data 			= $this->session->userdata('logged_in');
		$datas = $this->Jobevent_model->JSJOEventOperationReject($this->input->post('jonos'),$this->input->post('commentary'),$session_data['id']);
		$array = array('result' => $datas );
		echo json_encode($array);
	}
	function jobEventOperationApproveList($criteriaData)
	{
		$session_data 			= $this->session->userdata('logged_in');

			$layarrayz = $this->Jobevent_model->joEventOperationApproveShow($criteriaData,$session_data['id']);

		$selectx = "";
		$statusData = "";
		$i = 0;
		foreach($layarrayz as $key => $list){
			$i=$i+1;
			$statusData = "";
			switch ($list['isStatus']) {
				case 'N':
					$statusData = "NEW";
					break;
				case 'W':
					$statusData = "WAITING FOR SLS APPROVAL";
					break;
				case 'O':
					$statusData = "OPERATION";
					break;
				case 'A':
					$statusData = "WAITING FOR OPR APPROVAL ";
					break;
				case '':
					$statusData = "CLOSE";
					break;
				case 'F':
					$statusData = "FINANCE";
					break;
				case 'B':
					$statusData = "BILLING";
					break;
				case 'Y':
					$statusData = "COLLECTION";
					break;
				case 'R':
					$statusData = "RECEIVED BY CLIENT";
					break;
				case 'C':
					$statusData = "CLOSE";
					break;

			}
			$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['eventType'] ."</td><td>". $list['eventName'] ."</td>";
			$selectx.="<td>". date_format(date_create($list['eventDateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['eventDateTo']),"d M Y") ."</td>";
			$selectx.="<td>". strtoupper($list['eventVanue']) ."</td><td>". strtoupper($list['cityName']) ."</td>";
			$selectx.="<td style='text-align:right'>".number_format($list['eventValue']) ."</td><td>". strtoupper($list['managementFee']) ."</td>";
			$selectx.="<td>". $list['poNo'] ."</td>";
			$selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
			$selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['insertByName'] ."</td>";
			$selectx.="<td> <button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='JO Event Detail' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i> </button>	";
			$selectx.= "<button class='btn btn-warning btn-xs'  onclick='rfpDetail(".$i.")' title='RFP Detail' type='button'  data-toggle='modal' data-target='#myModal3' ><i class='fa fa-file-text-o'></i> </button>";
			$selectx.="</td></tr>";
		}

		return $selectx;
	}
	function JSjobEventOperationRFPShow()
	{
		$checkList = "";
		$session_data 			= $this->session->userdata('logged_in');
		$jos = $this->input->post('jonos');
		$layarray = $this->Jobevent_model->transJOEventDocShow($jos);
		$docs = 0;
		//echo $this->input->get('jonos');
		foreach($layarray as $key => $list){
			$checkList .= "<button type='button' class='btn btn-primary btn-block ' onclick=window.open('". base_url() . "uploads/".$list['doc_name']."')><i class='fa fa-eye'></i>  ". $list['docsName'] . " View </button>  <br>	";
			$docs = $docs + 1;
		}

		$layarray2 = $this->Jobevent_model->transJOEventRFPShow($jos);

		$selectx = "";
		$i = 0;
		$status = "";
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>RFP No : </label><div class='input-group col-md-8'><input type='text'  class='form-control pull-right' id='rfpDetail' name='rfpDetail' value='".$list2['rfpNo']."' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Jo No :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['jono']."' class='form-control pull-right' id='jonoDetail2' name='jonoDetail2' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event / OTC Name :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['rfpDetail']."' class='form-control pull-right' id='eventNamedetail' name='eventNamedetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From - To :  </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateFrom']),"d M Y") . " - " . date_format(date_create($list2['eventDateTo']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromdetail' name='dateFromdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Value : Rp. </label><div class='input-group col-md-8'><input type='text'  class='form-control pull-right' id='eventValuedetail' name='eventValuedetail' value='".number_format($list2['rfpValue'])."' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-12'>Document Checklist : </label><div class='input-group col-md-12' style=''>". $checkList."</div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Transfer Information : </label><div class='input-group col-md-8'><textarea rows='4' id='transferInformation' name='transferInformation' class='form-control pull-right' readonly>".$list2['transferInformation']."</textarea></div></div>";

			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='rejectsDetail'  name='rejectsDetail'  class='form-control pull-right' rows='4'></textarea></div></div>";

			$status = $list2['isStatus'];
		}
		//$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='rejectsDetail'  name='rejectsDetail'  class='form-control pull-right' rows='4'></textarea></div></div>";

		//$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='commentReject'  class='form-control pull-right' rows='4'></textarea></div></div>";

		$array = array('result'=>$selectx,'totalDoc' =>$docs);
		echo json_encode($array);
	}
	function jobEventOperationApproveDetail()
	{

		$layarray2 = $this->Jobevent_model->joEventDetail($this->input->post('jonos'));
		$selectx = "";
		$i = 0;
		$status = "";
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Jo No :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['jono']."' class='form-control pull-right' id='jonoDetail' name='jonoDetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event / OTC Name :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventName']."' class='form-control pull-right' id='eventNamedetail' name='eventNamedetail' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From :  </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateFrom']),"d M Y")."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromdetail' name='dateFromdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date To :   </label><div class='input-group col-md-8'><input type='text' value='".date_format(date_create($list2['eventDateTo']),"d M Y")."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateTodetail' name='dateTodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Event Type :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventType']."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateTodetail' name='dateTodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Vanue :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventVanue']."' class='form-control pull-right' id='vanuedetail' name='vanuedetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Location :   </label><div class='input-group col-md-8'><input type='text' value='".$list2['eventLocation']."' class='form-control pull-right' id='locationdetail' name='locationdetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>City :  </label><div class='input-group col-md-8'><input type='text' value='".$list2['cityName']."' class='form-control pull-right' id='eventCitydetail' name='eventCitydetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Notes :  </label><div class='input-group col-md-8'><textarea rows='4' id='eventNotesdetail' class='form-control pull-right' readonly>".$list2['eventNotes']."</textarea></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Value : Rp. </label><div class='input-group col-md-8'><input type='text'  class='form-control pull-right' id='eventValuedetail' name='eventValuedetail' value='".number_format($list2['eventValue'])."' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Management Fee : % </label><div class='input-group col-md-8'><input type='text' maxlength='2' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".$list2['managementFee']."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Management Fee : Rp </label><div class='input-group col-md-8'><input type='text' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".number_format(($list2['eventValue'] * ($list2['managementFee']/100))) ."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Total Invoice : Rp </label><div class='input-group col-md-8'><input type='text' class='form-control pull-right' id='eventManagementdetail' name='eventManagementdetail'   value='".number_format(($list2['eventValue'] * ($list2['managementFee']/100))+$list2['eventValue']) ."' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>PO No : </label><div class='input-group col-md-8'><input type='text'    value='".$list2['poNo']."'  placeholder='0' class='form-control pull-right' id='poNodetail' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>PO : </label><div class='input-group col-md-8'><button type='button' class='btn btn-primary btn-block ' onclick=window.open('". base_url() . "uploads/".$list2['poName']."')><i class='fa fa-eye'></i>  View </button> </div></div>";

			$status = $list2['isStatus'];
		}
		$array = array('result'=>$selectx,'status' =>$status);
		echo json_encode($array);
	}
#END REGION OPERATION
	}
?>
