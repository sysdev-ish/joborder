<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JobOrder extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'inflector'));
		$this->load->library(array('form_validation','zip'));
		$this->load->model(array('user', 'Jobtraining_model','settingModel'));
	}
//Job Training - Sales

  public function jobTraining()
  {
    if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['id']					= $session_data['id'];
			$data['username'] 	= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Job Order Training";

			$layarray = $this->settingModel->cityShow('');
				$select = "<option value='' selected>ALL</option>";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['city_name'] ."</option>";
				}
			$data['cmbCity']		= $select;
			$layarray = $this->settingModel->cityShow('');
			$select = "";
				foreach($layarray as $key => $list){
					$select .= "<option value=". $list['id'] .">". $list['city_name'] ."</option>";
				}
			$data['cmbCity2']		= $select;
			$layarray = $this->settingModel->reffDoc('2');
			$select = "";
			$i = 0;
				foreach($layarray as $key => $list){
					$i=$i+1;
					$select .= "<div class='col-md-4' style='margin-top:10px;''>  <input type='checkbox' name='chk' id='chk' value='".$list['doc_id']."'>". $list['doc_name'] ."								<br><br></div>";

				}
			$data['chkDetail']		= $select;


		  $selectx = $this->jobTrainingList('','N',$data['username'],$data['level']);
      //echo  "-" . $selectx;
			$data['approvalList']= $selectx;
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/jobOrderTraining');
			$this->load->view('pages/footer');
		}
		else {
			redirect('login', 'refresh');
		}
  }

	public function jobTrainingApproveList()
	{
		if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['id']					= $session_data['id'];
			$data['username'] 	= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Job Order Training";

			//echo $data['id'];

			$selectx = $this->jobTrainingApprovalList($data['id']);
			//echo  "-" . $selectx;
			$data['approvalList']= $selectx;
			$this->load->view('pages/header',$data);
			$this->load->view('joborder/jobTrainingApproveList');
			$this->load->view('pages/footer');
		}
		else {
			redirect('login', 'refresh');
		}
	}
	public function jobTrainingRecruitmentList()
	{
		if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['id']					= $session_data['id'];
			$data['username'] 	= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Job Order Training";

			//echo $data['id'];
			if (strcmp($data['level'],'3')==0)
			{
				$selectx = $this->joTrainingRecruitmentShow('');
				$data['approvalList']= $selectx;
				$this->load->view('pages/header',$data);
				$this->load->view('joborder/jobTrainingRecruitmentList');
				$this->load->view('pages/footer');
			}
			else {
				$msg = 'You dont have permission to access this page';
				//redirect('inisialisasi/inisialisasi', 'refresh');

				$redirect = site_url('/home/');
				echo "<script>javascript:alert('$msg'); window.location = '$redirect'</script>";
			}
		}
		else {
			redirect('login', 'refresh');
		}
	}
	public function joTrainingRecruitmentReject()
	{
		$session_data = $this->session->userdata('logged_in');
		$selectx = $this->Jobtraining_model->transJORecruitmentReject($this->input->post('jono'),$session_data['id'], $this->input->post('rejectComment'),$session_data['id']);
		$array = array('result' => $selectx );
		echo json_encode($array);
	}
	public function joTrainingReject()
	{
		$session_data = $this->session->userdata('logged_in');
		$selectx = $this->Jobtraining_model->jobTrainingReject($this->input->post('jono'),$this->input->post('rejectComment'),$session_data['id']);
		$array = array('result' => $selectx );
 	 	echo json_encode($array);
	}
	function joTrainingRecruitmentShow($criteriaData)
	{
		$layarrayz = $this->Jobtraining_model->joTrainingRecruitmentShow($criteriaData);

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
					$statusData = "WAITING FOR APPROVAL";
					break;
				case 'O':
					$statusData = "ONGOING";
					break;
				case 'C':
					$statusData = "CLOSE";
					break;
				case 'R':
					$statusData = "ISH ACADEMY";
					break;
				case 'B':
					$statusData = "BILLING";
					break;
				case 'D':
					$statusData = " ";
					break;
			}

			$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['trainingName'] ."</td>";
			$selectx.="<td>". date_format(date_create($list['dateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['dateTo']),"d M Y") ."</td>";
			$selectx.="<td>". strtoupper($list['vanue']) ."</td><td>". strtoupper($list['city_name']) ."</td>";
			$selectx.="<td style='text-align:right'>".number_format($list['joValue']) ."</td>";
			$selectx.="<td>". $list['duration'] ."</td>";
			$selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
			$selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['createBy'] ."</td>";
			$selectx.="<td> ". (strcmp($list['isStatus'],'O')==0 ? "<button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='Detail Data' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i> Detail Data</button>":"") ."	 </td></tr>";
		}

	// remove non-printable and other non-valid JSON chars

	return $selectx;
		return $selectx;
	}
  public function JSJobTrainingData()
  {
		$selectx = $this->jobTrainingList($this->input->post('criteriaData'),$this->input->post('status'),$this->input->post('username'),$this->input->post('level'));
		$array = array('result' => $selectx );
 	 	echo json_encode($array);
  }
	public function JSDeleteJOTraining()
	{
		$select = $this->Jobtraining_model->jobTrainingDelete($this->input->post('jono'),$this->input->post('deletedBy'));

		$array = array('result' => $select );
		echo json_encode($array);
	}
	public function JSProcessJOTraining()
	{
		$session_data = $this->session->userdata('logged_in');
		$select = $this->Jobtraining_model->jobTrainingProcess($this->input->post('jono'),$session_data['id']);
  //  $select="";
			// $selectx = $this->jobTrainingList($this->input->post('criteriaData'),$this->input->post('status'),$this->input->post('username'),$this->input->post('level'));
			$array = array('result' => $select );
  		echo json_encode($array);
	}
	public function JSSaveJOTraining()
	{
		$session_data = $this->session->userdata('logged_in');
		$jonoz = $this->Jobtraining_model->generateJOTrainingNo();
		$select = $this->Jobtraining_model->jobTrainingAdd($this->input->post('projectType'),$this->input->post('trainingName'),$this->input->post('dateFrom'),$this->input->post('dateTo'),$this->input->post('vanue'),$this->input->post('city'),$this->input->post('joValue'),$this->input->post('description'),$this->input->post('duration'),$session_data['id']);
		$strArr = explode("||",$this->input->post('chkData'));
		//$select = $strArr[0];
		for ($x = 0; $x < array_sum($strArr)-1; $x++) {
			$select = $this->Jobtraining_model->transJOTrainingDocadd($jonoz,$strArr[$x]);
			//$select = $x;
		}
		$array = array('result' => $select);
  		echo json_encode($array);
	}
	public function JSSaveJOTrainingGet()
	{
		$session_data = $this->session->userdata('logged_in');
		$jonoz = $this->Jobtraining_model->generateJOTrainingNo();
		$select = $this->Jobtraining_model->jobTrainingAdd($this->input->get('projectType'),$this->input->get('trainingName'),$this->input->get('dateFrom'),$this->input->get('dateTo'),$this->input->get('vanue'),$this->input->get('city'),$this->input->get('joValue'),$this->input->get('description'),$this->input->get('duration'),$session_data['id']);
		$strArr = explode("||",$this->input->get('chkData'));
		//$select = $strArr[0];
		for ($x = 0; $x < array_sum($strArr)-1; $x++) {
			$select = $this->Jobtraining_model->transJOTrainingDocadd($jonoz,$strArr[$x]);
			//$select = $x;
		}
		$array = array('result' => $select);
  		echo json_encode($array);
	}
	public function JSSaveAndProcessJOTraining()
	{
		$session_data = $this->session->userdata('logged_in');

		$strArr = explode("||",$this->input->post('chkData'));
		$jonoz = $this->Jobtraining_model->generateJOTrainingNo();

		$select = $this->Jobtraining_model->jobTrainingAddProcess($this->input->post('projectType'),$this->input->post('trainingName'),$this->input->post('dateFrom'),$this->input->post('dateTo'),$this->input->post('vanue'),$this->input->post('city'),$this->input->post('joValue'),$this->input->post('description'),$this->input->post('duration'),$session_data['id']);
//localhost:8088/joborder.ish.co.id/public_html/index.php/joborder/JSSaveAndProcessJOTraining?projectType=N&trainingName=sdasda&dateFrom=2018-01-01&dateTo=2018-02-02&vanue=Jkartaa&city=60&joValue=412312&description=231231&duration=1
		for ($x = 0; $x < array_sum($strArr)-1; $x++) {
			$select = $this->Jobtraining_model->transJOTrainingDocadd($jonoz,$strArr[$x]);
		}
		$array = array('result' => $select );
  		echo json_encode(array_sum($strArr));
	}
  function jobTrainingList($criteriaData,$status,$userName,$userLevel)
  {
		$layarray = $this->Jobtraining_model->jobTrainingShow($criteriaData,$status,'',$userName,$userLevel);

		$selectx = "";
		$statusData = "";
		$i = 0;
		foreach($layarray as $key => $list){
			$i=$i+1;
			$statusData = "";
			switch ($list['isStatus']) {
				case 'N':
					$statusData = "NEW";
					break;
				case 'W':
					$statusData = "WAITING FOR APPROVAL";
					break;
				case 'O':
					$statusData = "ONGOING";
					break;
				case 'C':
					$statusData = "CLOSE";
					break;
				case 'R':
					$statusData = "ISH ACADEMY";
					break;
				case 'B':
					$statusData = "BILLING";
					break;
				case 'D':
					$statusData = " ";
					break;
			}

			$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['trainingName'] ."</td>";
      $selectx.="<td>". date_format(date_create($list['dateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['dateTo']),"d M Y") ."</td>";
      $selectx.="<td>". strtoupper($list['vanue']) ."</td><td>". strtoupper($list['city_name']) ."</td>";
      $selectx.="<td style='text-align:right'>".number_format($list['joValue']) ."</td>";
      $selectx.="<td>". $list['duration'] ."</td>";
      $selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
      $selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['createBy'] ."</td>";
      $selectx.="<td> ". " <button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='Detail Data' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i></button> " . (strcmp($list['isStatus'],'N')==0?"<button class='btn btn-danger btn-xs'  onclick='deletes(".$i.")' title='Delete Data' type='button'><i class='fa fa-minus-circle'></i> </button>  <button class='btn btn-success btn-xs'  onclick='process(".$i.")' title='Process Data' type='button'><i class='fa fa-arrow-circle-right'></i></button>":"") ." </td></tr>";
		}

    return $selectx;
  }
	function jobOrderTrainingDetailApproval()
	{
		$checkList = "";
		$layarray = $this->Jobtraining_model->joReffNoShow($this->input->post('jonos'));

		foreach($layarray as $key => $list){
			$checkList .= "<div class='col-md-4' style='margin-top:10px;''>  ". $list['doc_name'] ."	<br><br></div>";
		}
		$layarray2 = $this->Jobtraining_model->joTrainingShowByTransID($this->input->post('jonos'));
		$selectx = "";
		$i = 0;
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>JO No :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['jono'] ."' class='form-control pull-right' id='jonoAdd'  readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Training / EO Name :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['trainingName'] ."' class='form-control pull-right' id='trainingNameAdd'  readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From :  </label><div class='input-group col-md-8'><input type='text' value='". date_format(date_create($list2['dateFrom']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date To :   </label><div class='input-group col-md-8'><input type='text' value='". date_format(date_create($list2['dateTo']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateToAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Vanue :   </label><div class='input-group col-md-8'><input type='text' value='". $list2['vanue'] ."' class='form-control pull-right' id='vanueAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>City :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['city_name'] ."' class='form-control pull-right' id='vanueAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Detail Description :  </label><div class='input-group col-md-8'><textarea rows='4' id='descriptionAdd' class='form-control pull-right' readonly>".$list2['description']."</textarea ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>JO Value : Rp. </label><div class='input-group col-md-8'><input type='text' value='".number_format($list2['joValue'])."' placeholder='0' class='form-control pull-right' id='joValueAdd' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Duration : (Month)</label><div class='input-group col-md-8'><input type='text' value='".$list2['duration']."' placeholder='0' class='form-control pull-right' id='durationAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-12'>Document Checklist : </label><div class='input-group col-md-12' style='width:100%;height:100%;border:1px solid #000;'>". $checkList."</div></div>";
		}
		$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='commentReject'  class='form-control pull-right' rows='4'></textarea></div></div>";

		$array = array('result'=>$selectx);
  	echo json_encode($array);
	}
	public function jobTrainingRecruitmentApprovalList()
	{
		if ($this->session->userdata('logged_in')){

			$session_data 			= $this->session->userdata('logged_in');
			$data['id']					= $session_data['id'];
			$data['username'] 	= $session_data['username'];
			$data['nama'] 			= $session_data['nama'];
			$data['level'] 			= $session_data['level'];
			$data['title'] 			= "Job Order Training";

			//echo $data['id'];
			if (strcmp($data['level'],'3')==0)
			{
				$selectx = $this->jobTrainingRecruitmentApproval($session_data['id']);
				$data['approvalList']= $selectx;
				$this->load->view('pages/header',$data);
				$this->load->view('joborder/jobTrainingRecruitmentApproval');
				$this->load->view('pages/footer');
			}
			else {
				$msg = 'You dont have permission to access this page';
				//redirect('inisialisasi/inisialisasi', 'refresh');

				$redirect = site_url('/home/');
				echo "<script>javascript:alert('$msg'); window.location = '$redirect'</script>";
			}
		}
		else {
			redirect('login', 'refresh');
		}
	}
	function JSjobTrainingRecruitmentApproval()
	{

			$layarrayz = $this->Jobtraining_model->jobTrainingRecruitmentApproval($this->input->post('userID'));

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
						$statusData = "WAITING FOR APPROVAL";
						break;
					case 'O':
						$statusData = "ONGOING";
						break;
					case 'C':
						$statusData = "CLOSE";
						break;
					case 'R':
						$statusData = "ISH ACADEMY";
						break;
					case 'B':
						$statusData = "BILLING";
						break;
					case 'D':
						$statusData = " ";
						break;
				}

				$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['trainingName'] ."</td>";
				$selectx.="<td>". date_format(date_create($list['dateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['dateTo']),"d M Y") ."</td>";
				$selectx.="<td>". strtoupper($list['vanue']) ."</td><td>". strtoupper($list['city_name']) ."</td>";
				$selectx.="<td style='text-align:right'>".number_format($list['joValue']) ."</td>";
				$selectx.="<td>". $list['duration'] ."</td>";
				$selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
				$selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['createBy'] ."</td>";
				$selectx.="<td> <button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='Detail Data' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i> Detail Data</button>  </td></tr>";
			}
			$array = array('result'=>$selectx);
			echo json_encode($array);
		// remove non-printable and other non-valid JSON chars

		return $selectx;
		}
	function jobTrainingRecruitmentApproval($userName)
	{

			$layarrayz = $this->Jobtraining_model->jobTrainingRecruitmentApproval($userName);

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
						$statusData = "WAITING FOR APPROVAL";
						break;
					case 'O':
						$statusData = "ONGOING";
						break;
					case 'C':
						$statusData = "CLOSE";
						break;
					case 'R':
						$statusData = "ISH ACADEMY";
						break;
					case 'B':
						$statusData = "BILLING";
						break;
					case 'D':
						$statusData = " ";
						break;
				}

				$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['trainingName'] ."</td>";
				$selectx.="<td>". date_format(date_create($list['dateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['dateTo']),"d M Y") ."</td>";
				$selectx.="<td>". strtoupper($list['vanue']) ."</td><td>". strtoupper($list['city_name']) ."</td>";
				$selectx.="<td style='text-align:right'>".number_format($list['joValue']) ."</td>";
				$selectx.="<td>". $list['duration'] ."</td>";
				$selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
				$selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['createBy'] ."</td>";
				$selectx.="<td> <button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='Detail Data' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i> Detail Data</button>  </td></tr>";
			}

		// remove non-printable and other non-valid JSON chars

		return $selectx;
		}
	function jobOrderTrainingDetailRecruitmentApproval()
	{
		$checkList = "";
		$layarray = $this->Jobtraining_model->joReffNoShow($this->input->post('jonos'));

		foreach($layarray as $key => $list){
			$checkList .="<button type='button' class='btn btn-primary btn-block ' onclick=window.open('". base_url() . "uploads/".$list['detailLocation']."')><i class='fa fa-download'></i>  ". $list['doc_name'] . " Download </button>  <br>	";
		}
		$layarray2 = $this->Jobtraining_model->joTrainingShowByTransID($this->input->post('jonos'));
		$selectx = "";
		$i = 0;
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>JO No :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['jono'] ."' class='form-control pull-right' id='jonoAdd'  readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Training / EO Name :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['trainingName'] ."' class='form-control pull-right' id='trainingNameAdd'  readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From :  </label><div class='input-group col-md-8'><input type='text' value='". date_format(date_create($list2['dateFrom']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date To :   </label><div class='input-group col-md-8'><input type='text' value='". date_format(date_create($list2['dateTo']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateToAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Vanue :   </label><div class='input-group col-md-8'><input type='text' value='". $list2['vanue'] ."' class='form-control pull-right' id='vanueAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>City :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['city_name'] ."' class='form-control pull-right' id='vanueAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Detail Description :  </label><div class='input-group col-md-8'><textarea rows='4' id='descriptionAdd' class='form-control pull-right' readonly>".$list2['description']."</textarea ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>JO Value : Rp. </label><div class='input-group col-md-8'><input type='text' value='".number_format($list2['joValue'])."' placeholder='0' class='form-control pull-right' id='joValueAdd' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Duration : (Month)</label><div class='input-group col-md-8'><input type='text' value='".$list2['duration']."' placeholder='0' class='form-control pull-right' id='durationAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-12'>Documents : </label><div class='input-group col-md-12'>". $checkList."</div></div>";
		}
		$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Commentary : <br> (Mandatory for reject data activity)  </label><div class='input-group col-md-8'><textarea id='commentReject'  class='form-control pull-right' rows='4'></textarea></div></div>";

		$array = array('result'=>$selectx);
  	echo json_encode($array);
	}
	function jobOrderTrainingDetails()
	{
		$checkList = "";
		$layarray = $this->Jobtraining_model->joReffNoShow($this->input->post('jonos'));

		foreach($layarray as $key => $list){
			$checkList .= "<div class='col-md-4' style='margin-top:10px;''>  ". $list['doc_name'] ."	<br><br></div>";
		}
		$layarray2 = $this->Jobtraining_model->joTrainingShowByTransID($this->input->post('jonos'));
		$selectx = "";
		$i = 0;
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>JO No :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['jono'] ."' class='form-control pull-right' id='jonoAdd'  readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Training / EO Name :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['trainingName'] ."' class='form-control pull-right' id='trainingNameAdd'  readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From :  </label><div class='input-group col-md-8'><input type='text' value='". date_format(date_create($list2['dateFrom']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date To :   </label><div class='input-group col-md-8'><input type='text' value='". date_format(date_create($list2['dateTo']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateToAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Vanue :   </label><div class='input-group col-md-8'><input type='text' value='". $list2['vanue'] ."' class='form-control pull-right' id='vanueAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>City :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['city_name'] ."' class='form-control pull-right' id='vanueAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Detail Description :  </label><div class='input-group col-md-8'><textarea rows='4' id='descriptionAdd' class='form-control pull-right' readonly>".$list2['description']."</textarea ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>JO Value : Rp. </label><div class='input-group col-md-8'><input type='text' value='".number_format($list2['joValue'])."' placeholder='0' class='form-control pull-right' id='joValueAdd' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Duration : (Month)</label><div class='input-group col-md-8'><input type='text' value='".$list2['duration']."' placeholder='0' class='form-control pull-right' id='durationAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-12'>Document Checklist : </label><div class='input-group col-md-12' style='width:100%;height:100%;border:1px solid #000;'>". $checkList."</div></div>";
		}

		$array = array('result'=>$selectx);
  	echo json_encode($array);
	}
	public function jobTrainingRecruitmentApprovalApprove()
	{
		$session_data = $this->session->userdata('logged_in');
		$selectx =$this->Jobtraining_model->jobTrainingRecruitmentProcess($this->input->post('jono'),$session_data['id']);
		$array = array('result' => $selectx );
 	 	echo json_encode($array);

	}
	public function joRecruitmentUpload()
  {
		try{
					$session_data 			= $this->session->userdata('logged_in');

					$jonos = $this->input->post('jonoAdd');

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
								$config['file_name'] = $jonos . "_" . $this->input->post($i.'labelID') . "_" . $this->input->post($i.'labelName') .".". pathinfo($_FILES[$i."uploadFile"]["name"])['extension']; //New Name
								if($this->upload->do_upload($i.'uploadFile',$config['file_name']))
								{
									$this->Jobtraining_model->jobTrainingDocUpload($jonos,$this->input->post($i.'labelID'),$config['file_name']);//Save Flag
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
						$this->Jobtraining_model->jobTrainingRecruitmentProcess($jonos,$session_data['id']);//Save Flag
						$redirect = site_url('/JobOrder/jobTrainingRecruitmentList');
						echo "<script>javascript:alert('Saving Data Successfully'); window.location = '$redirect'</script>";
					}
					else {
						$redirect = site_url('/JobOrder/jobTrainingRecruitmentList');
						echo "<script>javascript:alert('Some of document failed to upload, please check your document.'); window.location = '$redirect'</script>";
					}
					//$selectx = "true";
				}
				catch(Exception $ex)
				{
					$selectx = false;
				}


  }
	function jobOrderTrainingDetailRecruitment()
	{
		$checkList = "";
		$layarray = $this->Jobtraining_model->joReffNoShow($this->input->post('jonos'));
		$docs = 0;
		foreach($layarray as $key => $list){

			$checkList .= $list['doc_name']." : <input type='hidden' id='".$docs."labelID' name='".$docs."labelID' value='".$list['doc_id']."'><input type='hidden' id='".$docs."labelName' name='".$docs."labelName' value='".$list['doc_name']."'> <input type='file' id='".$docs."uploadFile' name='".$docs."uploadFile' onchange='btnChecker()'> <br>	";
			$docs = $docs + 1;
		}
		$layarray2 = $this->Jobtraining_model->joTrainingShowByTransID($this->input->post('jonos'));
		$selectx = "";
		$i = 0;
		foreach($layarray2 as $key => $list2){
			$i = $i+1;
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>JO No :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['jono'] ."' class='form-control pull-right' id='jonoAdd' name='jonoAdd'  readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Training / EO Name :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['trainingName'] ."' class='form-control pull-right' id='trainingNameAdd'  readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date From :  </label><div class='input-group col-md-8'><input type='text' value='". date_format(date_create($list2['dateFrom']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateFromAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Date To :   </label><div class='input-group col-md-8'><input type='text' value='". date_format(date_create($list2['dateTo']),"d M Y") ."' placeholder='ex 2017-01-01' class='form-control pull-right' id='dateToAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Vanue :   </label><div class='input-group col-md-8'><input type='text' value='". $list2['vanue'] ."' class='form-control pull-right' id='vanueAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>City :  </label><div class='input-group col-md-8'><input type='text' value='". $list2['city_name'] ."' class='form-control pull-right' id='vanueAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Detail Description :  </label><div class='input-group col-md-8'><textarea rows='4' id='descriptionAdd' class='form-control pull-right' readonly>".$list2['description']."</textarea ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>JO Value : Rp. </label><div class='input-group col-md-8'><input type='text' value='".number_format($list2['joValue'])."' placeholder='0' class='form-control pull-right' id='joValueAdd' readonly ></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-4'>Duration : (Month)</label><div class='input-group col-md-8'><input type='text' value='".$list2['duration']."' placeholder='0' class='form-control pull-right' id='durationAdd' readonly></div></div>";
			$selectx .= "<div class='form-group col-md-12'><label class='col-md-12'>Document Checklist : </label><div class='input-group col-md-12' style=''>". $checkList."</div></div>";
		}

		$array = array('result'=>$selectx,'totalDoc'=>$docs);
  	echo json_encode($array);
	}
	function jobTrainingApprovalList($userName)
	{
			$layarrayz = $this->Jobtraining_model->jobTrainingApprovalLists($userName);

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
						$statusData = "WAITING FOR APPROVAL";
						break;
					case 'O':
						$statusData = "ONGOING";
						break;
					case 'C':
						$statusData = "CLOSE";
						break;
					case 'R':
						$statusData = "ISH ACADEMY";
						break;
					case 'B':
						$statusData = "BILLING";
						break;
					case 'D':
						$statusData = " ";
						break;
				}

				$selectx .= "<tr><td>". $list['jono'] ."<input type='hidden' id='".$i."data' value='".$list['jono']."'> </td><td>". $list['trainingName'] ."</td>";
				$selectx.="<td>". date_format(date_create($list['dateFrom']),"d M Y") ."</td><td>". date_format(date_create($list['dateTo']),"d M Y") ."</td>";
				$selectx.="<td>". strtoupper($list['vanue']) ."</td><td>". strtoupper($list['city_name']) ."</td>";
				$selectx.="<td style='text-align:right'>".number_format($list['joValue']) ."</td>";
				$selectx.="<td>". $list['duration'] ."</td>";
				$selectx.="<td>". $list['lastApproveName'] ."</td><td>". $list['nextApproveName'] ."</td>";
				$selectx.="<td>" . $statusData  . (strcmp($list['isStatus'],'D')==0?"Deleted by " . $list['updateBy'] :"") . "</td><td>". $list['createBy'] ."</td>";
				$selectx.="<td> <button class='btn btn-info btn-xs'  onclick='listDetail(".$i.")' title='Detail Data' type='button'  data-toggle='modal' data-target='#myModal' ><i class='fa fa-info'></i></button> <button class='btn btn-success btn-xs'  onclick='processByNo(".$i.")' title='Process Data' type='button'><i class='fa fa-arrow-circle-right'></i></button> </td></tr>";
			}

		// remove non-printable and other non-valid JSON chars

		return $selectx;
		}
	}
?>
