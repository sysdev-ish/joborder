<?php
Class Payroll_model extends CI_Model
{
	function temptable_mapping($userid){
		$this->db->query(" DROP TEMPORARY TABLE IF EXISTS `temp_mapping_$userid` ; ");
		$this->db->query(" DROP TEMPORARY TABLE IF EXISTS `mapping_temp_$userid` ; ");
		$this->db->query("
			CREATE TEMPORARY TABLE `temp_mapping_$userid` (
				`kode_layanan`  char(7) NOT NULL ,
				`layanan`  char(7) NULL ,
				`kode_area`  char(7) NOT NULL ,
				`area`  char(7) NULL ,
				PRIMARY KEY (`kode_layanan`, `kode_area`)
			);
		");
		$this->db->query("
			CREATE TEMPORARY TABLE `mapping_temp_$userid` (
				`kode_layanan`  char(7) NOT NULL ,
				`layanan`  char(7) NULL ,
				`kode_area`  char(7) NOT NULL ,
				`area`  char(7) NULL ,
				PRIMARY KEY (`kode_layanan`, `kode_area`)
			);
		");

		$this->curl->create('http://192.168.88.5/service/index.php/mapping_sap/mappinglayanan');
		$this->curl->option('buffersize', 10);
		$this->curl->option('timeout', 0);

		$post['toket'] = '81657d176c99e76d9aea43507219110749467b55';
		$post['username'] = $userid;

		$this->curl->post($post);
		return json_decode($this->curl->execute(),true);
	}

	function get_projectnew($periode,$start,$length,$userid){
		$result = $this->temptable_mapping($userid);
		$sqlmapping = '';
		if($result <> '' or $result <> NULL){
			$this->db->insert_batch("`temp_mapping_$userid`", $result);
			$sqlmapping .= " INNER JOIN `temp_mapping_$userid` c ";
			$sqlmapping .= " ON c.kode_layanan = a.persa_sap ";
			$sqlmapping .= " AND c.kode_area = a.area_sap ";
		}

		if($periode <> ''){$where = "AND MONTH(a.lup) = MONTH('".$periode."-01') AND YEAR(a.lup) = YEAR('".$periode."-01') ";}
		else{$where = "AND MONTH(a.lup) = MONTH(NOW()) AND YEAR(a.lup) = YEAR(NOW()) ";}

		$sql  = "SELECT ".$this->get_total($periode)[0]['total']." as total, a.nojo,a.persa_sap,a.area_sap,a.abkrs_sap,a.lup,a.jumlah,sum(c.value) as thp ";
		$sql .= "FROM trans_rincian a,trans_jo b,trans_komponen c,komponen d ";
		$sql .= $sqlmapping;
		$sql .= "WHERE b.nojo = a.nojo AND a.SKEMA = 1 ";
		$sql .= "AND b.type_jo = 1 AND b.type_new = 1 ";
		$sql .= "AND a.persa_sap <> '' AND a.persa_sap IS NOT NULL ";
		$sql .= "AND a.area_sap <> '' AND a.area_sap IS NOT NULL ";
		$sql .= "AND a.abkrs_sap <> '' AND a.abkrs_sap IS NOT NULL ";

		$sql .= "AND a.nojo = c.nojo ";
		$sql .= "AND a.area_sap = c.area ";
		$sql .= "AND a.jabatan = c.jabatan ";
		$sql .= "AND a.level = c.level ";
		$sql .= "AND a.skilllayanan = c.skill ";

		$sql .= "AND c.komponen = d.kode ";

		$sql .= "AND d.jenis IN(2,4)";



		$sql .= $where;
		$sql .= "GROUP BY a.id ";
		$sql .= "ORDER BY a.lup DESC ";
		$sql .= "LIMIT ".$start.",".$length." ";

		// var_dump($this->get_total($periode));exit();
		$query	= $this->db->query($sql);
		return $query->result_array();
	}

	function get_total($periode){
		if($periode <> ''){$where = "AND MONTH(a.lup) = MONTH('".$periode."-01') AND YEAR(a.lup) = YEAR('".$periode."-01') ";}
		else{$where = "AND MONTH(a.lup) = MONTH(NOW()) AND YEAR(a.lup) = YEAR(NOW()) ";}
		$sql  = "SELECT count(1) as total ";
		$sql .= "FROM trans_rincian a,trans_jo b ";
		$sql .= "WHERE b.nojo = a.nojo AND a.SKEMA = 1 ";
		$sql .= "AND b.type_jo = 1 AND b.type_new = 1 ";
		$sql .= "AND a.persa_sap <> '' AND a.persa_sap IS NOT NULL ";
		$sql .= "AND a.area_sap <> '' AND a.area_sap IS NOT NULL ";
		$sql .= "AND a.abkrs_sap <> '' AND a.abkrs_sap IS NOT NULL ";
		$sql .= $where;
		$sql .= "ORDER BY a.lup DESC ";

		// var_dump($sql);exit();
		$query	= $this->db->query($sql);
		return $query->result_array();
	}


}
?>
