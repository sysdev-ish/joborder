<?php
Class Ump_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	function get_data($persaId = null, $year = null, $persaName = null){
		$data = array();

		$this->db = $this->load->database('default',TRUE);
		//$sql = 'SELECT * FROM m_ump WHERE persa_id = "' . $persaId . '" AND fiscal_year = "' . $year . '" AND persa_name = "' . $persaName . '"';
		$sql = 'SELECT * FROM m_ump WHERE persa_id = "' . $persaName . '" AND fiscal_year = "' . $year . '"';
		$Q = $this->db->query($sql);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}

		return $data;
	}

}
