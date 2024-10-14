<?php
Class Jobevent_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

//Faisal 30012018
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
public function hitung2($next){
	$inext = strlen($next);
	switch ($inext){
		case 1: $noj = "000" . $next; break;
		case 2: $noj = "00" . $next; break;
		case 3: $noj = "0" . $next; break;
		case 4: $noj = $next; break;
	}
	return $noj;
}
public function getUserDivCode($userID)
{
	$query = "call sp_divCodeShow('".$userID."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() <= 0){
		$nojoz = "-";
	} else {
		$row = $Q->row_array();
		$nojoz = $row['divCode'];
	}
	return $nojoz;
}
function getRFPNo(){
	$query = "SELECT MAX(rfpNo) as nojob FROM trans_rfp";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() <= 0){
		$nojoz = 0;
	} else {
		$row = $Q->row_array();
		$nor = substr($row['nojob'],8,4);
		$nojoz = $nor;
	}
	return $nojoz;
}
public function generateJOEventRFP($userID)
{
	$nojoz = "";
	$year = date('Y');

	$nojob = $this->getRFPNo();

	if ($nojob == 0){
		$nojoz = '0001';
	} else {
		$nor = $nojob;
		$next = intval($nor) + 1;
		$xnext = $this->hitung2($next);
		$nojoz = $xnext;
	}

	return "RFP/". $this->getUserDivCode($userID) . "/" . $nojoz . "/" . date("m") . "/" . date("Y");
}
function eraseNumericFormat($str)
{
    $temp       = trim($str);
    $result  = "";
    $pattern    = '/[^0-9]*/';
    $result     = preg_replace($pattern, '', $temp);

    return $result;
}
public function rfpAdd($jono,$rfpNo,$rfpDetail,$rpfValue,$transferInformation,$userIDs)
{
	$this->load->database('default',TRUE);
	$query = "call sp_rfpAdd('".$jono."','".$rfpNo."','".$rfpDetail."',".$rpfValue.",'".$transferInformation."',".$userIDs.")";
	$Q		= $this->db->query($query);
	return $query;

}
public function joEventDocUpload($jono,$docName)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joEventDocUpload('".$jono."','".$docName."')";
	$Q		= $this->db->query($query);
	return $query;

}
public function generateJOEventNo()
{
	$nojoz = "";
	$cons = 'ISH01010107';
	$year = date('Y');

	$nojob = $this->getEventNo();

	if ($nojob == 0){
		$new = '000001';
		$nojoz = $new . $cons . $year;
	} else {
		$nor = $nojob;
		$next = intval($nor) + 1;
		$xnext = $this->hitung($next);
		$nojoz = $xnext . $cons . $year;
	}
	return $nojoz;
}
function jobEventShow($criteriaData,$status,$insertBy,$types,$userlevel)
{
	$this->load->database('default',TRUE);
	$data			= array();

	$query = "call sp_joEventShow('".$criteriaData."','".$status."','".$insertBy."','".$types."','".$userlevel."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function jobEventApproveShow($criteriaData,$userID)
{
	$this->load->database('default',TRUE);
	$data			= array();

	$query = "call sp_joEventApproveShow('".$criteriaData."',$userID)";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function joReffNoShow($jono)
{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call sp_joEventReffDoc_Show('".$jono ."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id );
	return $data;
}

function jobEventOperationShow($criteriaData)
{
	$this->load->database('default',TRUE);
	$data			= array();

	$query = "call sp_joEventOperationShow('".$criteriaData."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function joEventOperationApproveShow($criteriaData,$userIDs)
{
	$this->load->database('default',TRUE);
	$data			= array();

	$query = "call sp_joEventOperationApproveShow('".$criteriaData."','".$userIDs."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function joEventApprove($jono,$userID)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joEventProcess('".$jono."',".$userID.")";
	$Q		= $this->db->query($query);
	return $query;
}
function joEventReject($jono,$userID,$reasons)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joEventReject('".$jono."',".$userID.",'".$reasons."')";
	$Q		= $this->db->query($query);
	return $query;
}
function joEventDetail($jono)
{
	$this->load->database('default',TRUE);
	$data			= array();

	$query = "call sp_joEventDetail('".$jono."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function joEventDoc($jono)
{
	$this->load->database('default',TRUE);
	$data			= array();

	$query = "call sp_joEventDoc('".$jonos."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function transJOEventRFPShow($jonos)
{
	//try{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call sp_rfp_show('".$jonos."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function transJOEventOperationApprove($jono,$userID)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joEventApproveOperationAction('".$jono."',".$userID.")";
	$Q		= $this->db->query($query);
	return $query;
}
function JSJOEventOperationReject($jono,$commantery,$userID)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joEventOperationReject('".$jono."',".$userID.",'".$commantery."')";
	$Q		= $this->db->query($query);
	return $query;
}
function transJOEventDocShow($jonos)
{
	//try{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call sp_joEventDocShow('".$jonos."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function transJOEventDocadd($jonos,$docIDs)
{
	//try{
	$this->load->database('default',TRUE);
	$query = "call sp_joEventDocAdd('".$jonos."',".$docIDs.",'')";
	$Q		= $this->db->query($query);
	return $query;
}
function joEventProcess($jonos,$userID)
{
	$query = "call sp_joEventProcess('".$jonos."','".$userID."')";
	$Q		= $this->db->query($query);
	return $query;
}
function getEventNo(){
	$query = "SELECT MAX(jono) as nojob FROM trans_jo_event";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() <= 0){
		$nojoz = 0;
	} else {
		$row = $Q->row_array();
		$nor = substr($row['nojob'],0,6);
		$nojoz = $nor;
	}
	return $nojoz;
}

function joEventAdd($jonos,$eventNames,$eventTypes,$eventVanue,$eventLocation,$eventCity,$eventDateFrom,$eventDateTo,$eventValue,$managementFee,$notes,$poNos,$poNames,$usernames)
{
	$query = "call sp_joEventAdd('".$jonos."','".$eventNames."','".$eventTypes."','".$eventVanue."','".$eventLocation."',".$eventCity.",'".$eventDateFrom."','".$eventDateTo."',".$eventValue.",".$managementFee.",'".$notes."','N','".$poNos."','".$poNames."',".$usernames.")";
	$Q		= $this->db->query($query);
	return $query;
}
function joEventDelete($jonos,$usernames)
{
	$query = "call sp_joEventDelete('".$jonos."','".$usernames."')";
	$Q		= $this->db->query($query);
	return $query;
}
}

?>
