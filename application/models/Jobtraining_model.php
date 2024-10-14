<?php
Class Jobtraining_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	/*function simpangojob($njok)
	{
		$data = $this->db->query(" Insert into company_jobs values('', '97', ) ");
		return $data->result();
	}*/


//Faisal 16012018
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

public function generateJOTrainingNo()
{
	$nojoz = "";
	$cons = 'ISH01010107';
	$year = date('Y');

	$nojob = $this->get_trainingNo();

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
function jobTrainingShow($criteriaData,$status,$projectType,$insertBy,$types)
{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call sp_joTraining_Show('".$criteriaData."','".$status."','".$projectType."','".$insertBy."',".$types.")";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id);
	return $data;
}
function transJOTrainingDocadd($jonos,$docIDs)
{
	//try{
	$this->load->database('default',TRUE);
	$query = "call sp_trans_jotrainingdoc_add('".$jonos."',".$docIDs.")";
	$Q		= $this->db->query($query);
	return $query;
}
function transJORecruitmentReject($jonos,$userIDs,$comments)
{

	$this->load->database('default',TRUE);
	$query = "call sp_joTrainingRecruitmentReject('".$jonos."',".$userIDs.",'".$comments."')";
	$Q		= $this->db->query($query);
	return $query;
}

function jobTrainingAdd($projectTypes,$trainingNames,$dateFroms,$dateTo,$vanues,$citys,$joValues,$descriptions,$durations,$inserBys)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joTraining_Add('".$this->generateJOTrainingNo()."','".$projectTypes."','".$trainingNames."','".$dateFroms."','".$dateTo."','".$vanues."','".$citys."',".$joValues.",'".$descriptions."',".$durations.",'".$inserBys."')";
  //echo $query;
	$Q		= $this->db->query($query);
	//mysqli_next_result( $this->db->conn_id);

	return $query;
}
function get_trainingNo(){
	$query = "SELECT MAX(jono) as nojob FROM trans_jo_training";
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

function jobTrainingAddProcess($projectTypes,$trainingNames,$dateFroms,$dateTo,$vanues,$citys,$joValues,$descriptions,$durations,$inserBys)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joTraining_AddAndProcess('".$this->generateJOTrainingNo()."','".$projectTypes."','".$trainingNames."','".$dateFroms."','".$dateTo."','".$vanues."','".$citys."',".$joValues.",'".$descriptions."',".$durations.",'".$inserBys."')";
  //echo $query;
	$Q		= $this->db->query($query);
	//mysqli_next_result( $this->db->conn_id);

	return $query;
}
function jobTrainingProcess($jono,$userID)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joTraining_process('".$jono."',".$userID.")";
	$Q		= $this->db->query($query);
		//mysqli_next_result( $this->db->conn_id );
	return $query;
}
function jobTrainingDelete($jono,$userName)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joTraining_delete('".$jono."','".$userName."')";
	$Q		= $this->db->query($query);
		//mysqli_next_result( $this->db->conn_id );
	return $query;
}
function jobTrainingReject($jono,$comment,$userID)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joTrainingReject('".$jono."','".$userID."','".$comment."')";
	$Q		= $this->db->query($query);
		//mysqli_next_result( $this->db->conn_id );
	return $query;
}
function jobTrainingDocUpload($jono,$docID,$docName)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joTrainingDocUpdate('".$jono."',".$docID.",'".$docName."')";
	$Q		= $this->db->query($query);
		//mysqli_next_result( $this->db->conn_id );
	return $query;

}
function jobTrainingRecruitmentApproval($userIDs)
{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call jo_trainingRecruitmentApprovalList('".$userIDs."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
		mysqli_next_result( $this->db->conn_id );
	}
	return $data;

}
function jobTrainingRecruitmentProcess($jono,$userID)
{
	$this->load->database('default',TRUE);
	$query = "call sp_joTrainingRecruitmentProcess('".$jono."',".$userID.")";
	$Q		= $this->db->query($query);
		//mysqli_next_result( $this->db->conn_id );
	return $query;

}
function jobTrainingApprovalLists($userName)
{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call sp_joTrainingApproveList('".$userName ."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
		mysqli_next_result( $this->db->conn_id );
	}
	return $data;
}
function joTrainingShowByTransID($transIDs)
{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call sp_joTrainingShowByTransID('".$transIDs ."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
		mysqli_next_result( $this->db->conn_id );
	}
	return $data;

}
function joReffNoShow($jono)
{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call sp_joTrainingReffdoc_show('".$jono ."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id );
	return $data;
}

function joTrainingRecruitmentShow($criteriaData)
{
	$this->load->database('default',TRUE);
	$data			= array();
	$query = "call sp_joTrainingRecruitment_show('".$criteriaData ."')";
	$Q		= $this->db->query($query);
	if ($Q->num_rows() > 0){
		foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
	}
	mysqli_next_result( $this->db->conn_id );
	return $data;
}
}

?>
