<?php
Class Billing_model extends CI_Model
{
	
	function get_listbilling($periode,$id_ops){
		if($id_ops <> ''){$where = "AND a.id = $id_ops ";}
		else{$where = "AND a.tanggal = '$periode'";}
		$sql = "SELECT a.id,a.tanggal as periode,a.nojo,b.project,b.lama,b.bekerja,a.notes,a.upd,c.nama,a.flag ";
		$sql .= "FROM `trans_ops` a,trans_jo b,m_login c ";
		$sql .= "WHERE b.nojo = a.nojo ";
		$sql .= "AND c.username = b.upd AND a.flag = 1 ";
		$sql .= "AND b.type_jo = 1 ";
		$sql .= "$where ";
		// var_dump($sql);exit();
		$query	= $this->db->query($sql);
		return $query->result_array();
	}
	
	function get_listattachment($id_ops){
		$sql  = "SELECT c.doc_id,c.doc_name,b.filename ";
		$sql .= "FROM trans_ops a,file_trans_ops b,m_doc c ";
		$sql .= "WHERE b.id_ops and a.id ";
		$sql .= "AND c.doc_id = b.id_doc ";
		$sql .= "AND a.id = $id_ops ";
		// var_dump($sql);exit();
		$query	= $this->db->query($sql);
		return $query->result_array();
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
	
	function get_listjo(){
		$sql = "SELECT nojo,project,bekerja,upd FROM trans_jo ";		
		$query	= $this->db->query($sql);
		return $query->result_array();
	}

	function get_attachment_payroll(){
		$sql  = "SELECT doc_id,doc_name, nama_file FROM m_doc where access = '4' ";	
		$query	= $this->db->query($sql);
		return $query->result_array();
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