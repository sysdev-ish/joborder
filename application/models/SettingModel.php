<?php
Class Settingmodel extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
//Faisal 16012018


	function taskID($criteriaData){

    			$this->load->database('default',TRUE);
		$data			= array();
		$query = "call sp_taskShow('".$criteriaData."')";
		//$query = "select * from m_task";
		$Q		= $this->db->query($query);
    mysqli_next_result( $this->db->conn_id );
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}

	function taskDetail($taskID,$criteriaData){

    $this->load->database('default',TRUE);
		$data			= array();
		$query = "call sp_taskDetailShow('".$taskID."','".$criteriaData."')";
    //$query = "select * from m_taskDetail";

		$Q		= $this->db->query($query);
    mysqli_next_result( $this->db->conn_id );
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}

		}
		return $data;
	}
	function userShow(){

    $this->load->database('default',TRUE);
		$data			= array();

		$query = "call sp_user_show('')";
		//$query = "select * from m_login";
		$Q		= $this->db->query($query);
    mysqli_next_result( $this->db->conn_id);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	function cityShow(){

    $this->load->database('default',TRUE);
		$data			= array();

		$query = "call sp_city_Show('')";
		//$query = "select * from m_login";
		$Q		= $this->db->query($query);
    mysqli_next_result( $this->db->conn_id);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	function reffDoc($taskID){

		$this->load->database('default',TRUE);
		$data			= array();

		$query = "call sp_reffDoc_show($taskID)";
		//$query = "select * from m_login";
		$Q		= $this->db->query($query);
		mysqli_next_result( $this->db->conn_id);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	function approveUserAdd($taskID,$taskDetailID,$userID,$levelNo,$valueMin,$city){
    		$this->load->database('default',TRUE);

					$query = "call sp_approval_add(".$taskID.",".$taskDetailID.",".$userID.",".$levelNo.",".$valueMin.",".$city.")";
					//$query = "select * from m_task";

					$Q		= $this->db->query($query);
					mysqli_next_result( $this->db->conn_id );
				return true;
	}
	function approveUserDelete($taskID,$taskDetailID,$userID,$city){
				$this->load->database('default',TRUE);

					$query = "call sp_approval_delete(".$taskID.",".$taskDetailID.",".$userID.",".$city.")";
					//$query = "select * from m_task";

					$Q		= $this->db->query($query);
					mysqli_next_result( $this->db->conn_id );
				return true;
	}
	function approvalList($taskID,$taskDetailID,$criteriaData,$city){

    $this->load->database('default',TRUE);
		$data			= array();
		$query = "call sp_approval_show('".$taskID."','".$taskDetailID."','".$criteriaData."','".$city."')";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
}
?>
