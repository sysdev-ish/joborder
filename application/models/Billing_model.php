<?php
Class Billing_model extends CI_Model
{
	
	function get_listbilling($periode,$id_ops){
		if($id_ops <> ''){$where = "AND a.id = $id_ops ";}
		else{$where = "AND a.tanggal = '$periode'";}
		$sql = "SELECT a.id,a.tanggal as periode,a.nojo,b.project,b.lama,b.bekerja,a.notes,a.upd,c.nama,a.flag ";
		$sql .= "FROM trans_ops a,trans_jo b,m_login c ";
		$sql .= "WHERE b.nojo = a.nojo ";
		$sql .= "AND c.username = b.upd AND a.flag = 1 ";
		//$sql .= "AND b.type_jo = 1 ";
		$sql .= "AND (b.type_jo='1' and type_new='1') ";
		$sql .= "$where ";
		// var_dump($sql);exit();
		$query	= $this->db->query($sql);
		// var_dump($sql);exit();
		return $query->result_array();
	}
	
	function get_listjo($periode,$id_ops){
		if($id_ops <> ''){$where = "AND a.nojo = '$id_ops' ";}else{$where = "";}
		$sql = "SELECT a.nojo, a.project, a.bekerja, a.upd, b.persa_sap, c.nama, a.lama, d.doc_id FROM trans_jo a LEFT JOIN trans_rincian b ON a.nojo=b.nojo LEFT JOIN m_login c ON a.upd=c.username LEFT JOIN trans_doc d ON a.nojo=d.nojo ";
		$sql .= "WHERE a.approval = 1 and b.flag_app = 1 AND (b.skema='1' OR a.skema='1') and (a.type_jo='1' and a.type_new='1') AND (persa_sap IS NOT NULL AND persa_sap!='')  "; 
		$sql .= "$where ";
		$sql .= "GROUP BY a.nojo, b.persa_sap ORDER BY a.nojo ";
		//var_dump($sql);exit();
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	
	
	function get_listtax(){
		$query = "SELECT a.nojo, a.lama, a.no_bak, b.persa_sap, b.abkrs_sap, u.pks_ish, u.tgl_kontrak, c.nama_perusahaan, b.n_pic_hi, u.nilai_kontrak_pks FROM trans_jo a ";
		$query .= "LEFT JOIN trans_rincian b ON a.`nojo` = b.`nojo` ";  
		$query .= "LEFT JOIN trans_doc_lengkap c ON a.`nojo` = c.`id` ";  
		$query .= "LEFT JOIN trans_pks u ON b.`nojo` = u.`nojo` "; 
		//$query .= "WHERE approval_admin = 1 "; 
		$query .= "WHERE approval = 1 and b.flag_app = 1 and (b.skema='1' OR a.skema='1') and (a.type_jo='1' and a.type_new='1') AND (persa_sap IS NOT NULL AND persa_sap!='') "; 
		$query .= "GROUP BY a.nojo, b.persa_sap ORDER BY a.nojo DESC ";
		//var_dump($query);exit();
		$sql	= $this->db->query($query);
		return $sql->result_array();
	}

	
	function get_listattachment($id_ops){
		$sql  = "SELECT c.doc_id,c.doc_name,b.filename ";
		$sql .= "FROM trans_ops a,file_trans_ops b,m_doc c ";
		$sql .= "WHERE b.id_ops and a.id ";
		$sql .= "AND c.doc_id = b.id_doc ";
		//$sql .= "AND a.id = $id_ops ";
		$sql .= "AND a.nojo = '$id_ops' ";
		// var_dump($sql);exit();
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	
	
	function get_listattachment_leg($tgl, $noj, $docid){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_id, a.doc_name, a.nama_file, a.source_data, (SELECT filename FROM trans_pks WHERE trans_pks.`docid`=a.doc_id AND trans_pks.docid='$a' AND nojo='$noj') AS filename ";
			$query .= "From m_doc a  ";
			$query .= "Where doc_id='$a' and access='1' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	function get_listattachment_ops($tgl, $noj, $docid){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
			$query = "SELECT a.doc_id, a.doc_name, a.nama_file, a.source_data, (SELECT filename FROM file_trans_ops e LEFT JOIN trans_ops f ON e.id_ops=f.id WHERE a.doc_id=e.id_doc AND a.doc_id='$a' AND f.nojo='$noj' AND tanggal='$tgl') AS filename  ";
			$query .= "From m_doc a  ";
			$query .= "Where doc_id='$a' and access='3' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	
	
	function get_listattachment_fin($tgl, $noj, $docid){
		$data			= array();
		$docid = explode( ';', $docid);
		for ($i = 0; $i < sizeof($docid); $i++) {
			$a =$docid[$i];
					
			$query = "SELECT a.doc_id, a.doc_name, a.nama_file, a.source_data, (SELECT filename FROM file_trans_fin e LEFT JOIN trans_fin f ON e.id_fin=f.id WHERE a.doc_id=e.id_doc AND a.doc_id='$a' AND f.nojo='$noj' AND tanggal='$tgl') AS filename ";
			$query .= "From m_doc a  ";
			$query .= "Where doc_id='$a' AND access='4' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;		
	}	


	function invoiceNo()
	{
		$nojob = $this->get_trainingNo();
		if ($nojob == 0){
			$new = '001';
			return date("y") ."/ISH/INV/" . $this->romawi(date("m")) . "/" . $new;
		} else {
			$nor = $nojob;
			$next = intval($nor) + 1;
			$xnext = $this->hitung($next);
			return date("y") ."/ISH/INV/" . $this->romawi(date("m")) . "/" . $xnext;
		}

	}

	function romawi($n){
		$hasil = "";
		$iromawi = array("","I","II","III","IV","V","VI","VII","VIII","IX","X",20=>"XX",30=>"XXX",40=>"XL",50=>"L",
		60=>"LX",70=>"LXX",80=>"LXXX",90=>"XC",100=>"C",200=>"CC",300=>"CCC",400=>"CD",500=>"D",600=>"DC",700=>"DCC",
		800=>"DCCC",900=>"CM",1000=>"M",2000=>"MM",3000=>"MMM");
		if(array_key_exists($n,$iromawi)){
			$hasil = $iromawi[$n];
		}elseif($n >= 11 && $n <= 99){
			$i = $n % 10;
			$hasil = $iromawi[$n-$i] . $this->romawi($n % 10);
		}elseif($n >= 101 && $n <= 999){
			$i = $n % 100;
			$hasil = $iromawi[$n-$i] . $this->romawi($n % 100);
		}else{
			$i = $n % 1000;
			$hasil = $iromawi[$n-$i] . $this->romawi($n % 1000);
		}
		return $hasil;
	}
	
	function get_attachment_payroll($def){
		/*
		$sql  = "SELECT doc_id,doc_name, nama_file FROM m_doc where access = '4' ";	
		$query	= $this->db->query($sql);
		return $query->result_array();
		*/
		$data			= array();
		$def = explode( ';', $def);
		for ($i = 0; $i < sizeof($def); $i++) {
			$a =$def[$i];
					
			$query = "SELECT a.doc_name, a.nama_file, a.doc_id, a.source_data ";
			$query .= "From m_doc a  ";
			$query .= "Where doc_id='$a' and access='4' ";
			
			$Q		= $this->db->query($query);
			if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$data[] = $row;
				}
			}
		}

		return $data;	
	}

	function ins_attachment_payroll($item){
		$this->db->insert('trans_fin', $item);
		$id = $this->db->insert_id();
		return $id;
	}

	function ins_attachment_payroll2($item){
		$this->db->insert('file_trans_fin', $item);
	}

	function cekdoc_payroll($nojo,$periode){
		$sql = "SELECT nojo,tanggal from trans_fin where nojo='$nojo' and tanggal='$periode' ";		
		$query	= $this->db->query($sql);
		return $query->result_array();
	}


	
}
?>