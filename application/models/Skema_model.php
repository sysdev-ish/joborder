<?php
class Skema_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function get_insertjopp()
	{
		$query = "SELECT MAX(nojo) as nojob FROM trans_perpanjangan";
		$Q		= $this->db->query($query);
		if ($Q->num_rows() <= 0) {
			$nojo = 0;
		} else {
			$row = $Q->row_array();
			$nor = substr($row['nojob'], 0, 6);
			$nojo = $nor;
		}
		return $nojo;
	}

	function cektglakt($perner, $bultahres)
	{
		$data			= array();
		$this->db5 = $this->load->database('db_five', TRUE);
		$query = "SELECT DATE_FORMAT(BEGDA_00,'%Y-%m') AS begda FROM sapprofile1 WHERE PERNR='$perner'  ";

		$Q		= $this->db5->query($query);
		$data	= $Q->row();
		return $data;
	}

	function cariarea_pp($persaid)
	{
		$data			= array();
		$this->db5 = $this->load->database('db_five', TRUE);
		$query = "SELECT btrtl, btrtx  ";
		$query .= "FROM sapprofile1 ";
		$query .= "WHERE werks = '$persaid'  ";
		$query .= "Group By btrtl  ";

		$Q		= $this->db5->query($query);
		$data	= $Q->result_array();
		return $data;
	}

	function cariskill_pp($persaid, $areaid)
	{
		$data			= array();
		$this->db5 = $this->load->database('db_five', TRUE);
		$query  = "SELECT persk, pektx  ";
		$query .= "FROM sapprofile1 ";
		$query .= "WHERE werks = '$persaid'  ";
		if ($areaid != 'ALL' && $areaid != '') {
			$query .= "AND btrtl = '$areaid'  ";
		}
		$query .= "Group By persk  ";

		$Q		= $this->db5->query($query);
		$data	= $Q->result_array();
		return $data;
	}

	function carijab_pp($persaid, $areaid, $skillid)
	{
		$data			= array();
		$this->db5 = $this->load->database('db_five', TRUE);
		$query  = "SELECT plans, platx  ";
		$query .= "FROM sapprofile1 ";
		$query .= "WHERE werks = '$persaid'  ";
		if ($areaid != 'ALL' && $areaid != '') {
			$query .= "AND btrtl = '$areaid'  ";
		}
		if ($skillid != 'ALL' && $skillid != '') {
			$query .= "AND persk = '$skillid'  ";
		}
		$query .= "Group By platx  ";

		$Q		= $this->db5->query($query);
		$data	= $Q->result_array();
		return $data;
	}

	function carilevel_pp($persaid, $areaid, $skillid, $jabtext)
	{
		$data			= array();
		$this->db5 = $this->load->database('db_five', TRUE);
		$query  = "SELECT trfar, trfar_txt  ";
		$query .= "FROM sapprofile5 ";
		$query .= "WHERE persa = '$persaid'  ";
		if ($areaid != 'ALL' && $areaid != '') {
			$query .= "AND btrtl = '$areaid'  ";
		}
		$query .= "Group By trfar  ";

		$Q		= $this->db5->query($query);
		$data	= $Q->result_array();
		return $data;
	}

	function get_tunj_kontrak()
	{
		$data			= array();
		//$this->db3 = $this->load->database('db_third',TRUE);
		$this->db3 = $this->load->database('db_third', TRUE);

		//$query = "SELECT lgart, lgtxt FROM sapscheme2 a LEFT JOIN m_skema b ON a.`LGART`=b.wage_type WHERE TYPE='Variabel' GROUP BY lgart ORDER BY lgtxt  ";

		//baru181021019
		$query = "SELECT lgart, lgtxt FROM sapscheme2 a LEFT JOIN m_skema b ON a.`LGART`=b.wage_type GROUP BY lgart ORDER BY lgtxt  ";
		// $query = "SELECT lgart, lgtxt
		// FROM
		// (
		// SELECT lgart, lgtxt FROM sapscheme2 a 
		// UNION 
		// SELECT b.wage_type AS lgart, b.nama AS lgtxt FROM m_skema b 
		// ) c
		// GROUP BY lgart ORDER BY lgtxt ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_area_kontrak()
	{
		$data			= array();
		$query = "SELECT value1 as area, value2 as personnal_subarea FROM saparea GROUP BY value1 order by value2 ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_pa_kontrak()
	{
		$data			= array();
		$query = "SELECT value1 as personalarea, value2 as personnal_area FROM sappersonalarea GROUP BY value1 order by value2 ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function cari_pa_kontrak($perar)
	{
		$data			= array();
		$query = "SELECT value1 as personalarea, value2 as personnal_area FROM sappersonalarea where value1 like '%$perar%' OR value2 like '%$perar%' GROUP BY value1 order by value2 ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function cari_pa_kontrakinf($perar)
	{
		$data			= array();
		$this->db4 = $this->load->database('db_four', TRUE);
		$query = "SELECT WERKS as personalarea, WKTXT as personnal_area FROM sapprofile1 where WKTXT like '%$perar%' OR WERKS like '%$perar%' GROUP BY WERKS order by WKTXT ";

		$Q		= $this->db4->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_sl_kontrak()
	{
		$data			= array();
		$query = "SELECT value1 as skilllayanan, value2 as employee_subgroup FROM sapskilllayanan GROUP BY value1 order by value2 ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}



	function get_sl_kontrakinf()
	{
		$data			= array();
		$this->db4 = $this->load->database('db_four', TRUE);
		//$query = "SELECT DISTINCT(skilllayanan) as skilllayanan, employee_subgroup FROM data_sap where employment_status='Active' order by employee_subgroup ";
		$query = "SELECT PERSK as skilllayanan, PEKTX as employee_subgroup FROM sapprofile1 GROUP BY PERSK order by PEKTX ";

		$Q		= $this->db4->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_jb_kontrak()
	{
		$data			= array();
		$query = "SELECT value1 as jabatan, value2 as nm_jabatan FROM sapjob WHERE value2 <> ' AGENT' GROUP BY value2 order by value2 ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_jb_kontrakinf()
	{
		$data			= array();
		$this->db4 = $this->load->database('db_four', TRUE);
		//$query = "SELECT DISTINCT(jabatan) as jabatan, job FROM data_sap where employment_status='Active' order by job ";
		$query = "SELECT PLATX as jabatan, PLATX FROM sapprofile1 WHERE PLATX <> ' AGENT' GROUP BY PLATX order by PLATX ";

		$Q		= $this->db4->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function cari_jb_kontrak($jabat)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT PLATX as jabatan, PLATX FROM sapprofile1 where PLATX like '%$jabat%' GROUP BY PLATX order by PLATX ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_komp_kontrak()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT DISTINCT(komponen) as komponen FROM skema_dua_plus order by komponen ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_lv_kontrak()
	{
		$data			= array();
		$query = "SELECT value1 as kd_level, value2 as level FROM saplevel GROUP BY value1 order by value2 ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_lv_kontrakinf()
	{
		$data			= array();
		$this->db4 = $this->load->database('db_four', TRUE);
		//$query = "SELECT DISTINCT(kd_level) as kd_level, level FROM data_sap order by level ";
		$query = "SELECT TRFAR as kd_level, TRFAR_TXT as level FROM sapprofile5 GROUP BY TRFAR order by TRFAR_TXT ";

		$Q		= $this->db4->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_idskemaz()
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT MAX(id) as noskema FROM skema_satu_plus ";
		$Q		= $this->db3->query($query);
		if ($Q->num_rows() <= 0) {
			$nojoz = 0;
		} else {
			$row = $Q->row_array();
			$nor = $row['noskema'];
			$nojoz = $nor;
		}
		return $nojoz;
	}

	function insertskemasatuplus($putih)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->insert('skema_satu_plus', $putih);
	}

	function tambah_skema($item)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->insert('skema_dua_plus', $item);
	}

	function insertskemaduaplus($item)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->insert('skema_dua_plus', $item);
	}

	function k_insertskemaduaplus($item)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->insert('m_ket', $item);
	}

	function get_skema()
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		//$query = "SELECT a.*, b.*, b.id as bid, (SELECT personnal_subarea FROM data_sap WHERE data_sap.`area`=a.area GROUP BY AREA) AS carea, (SELECT personnal_area FROM data_sap WHERE data_sap.`personalarea`=a.personalarea GROUP BY personalarea) AS cpa, (SELECT employee_subgroup FROM data_sap WHERE data_sap.`skilllayanan`=a.skilllayanan GROUP BY skilllayanan) AS csl, (SELECT job FROM data_sap WHERE data_sap.`jabatan`=a.jabatan GROUP BY jabatan) AS cjb ";
		$query = "SELECT a.*, b.*, b.id as bid, (SELECT BTRTX FROM sapprofile1 WHERE sapprofile1.`BTRTL`=a.area GROUP BY BTRTL) AS carea, (SELECT WKTXT FROM sapprofile1 WHERE sapprofile1.`WERKS`=a.personalarea GROUP BY WERKS) AS cpa, (SELECT PEKTX FROM sapprofile1 WHERE sapprofile1.`PERSK`=a.skilllayanan GROUP BY PERSK) AS csl, (SELECT PLATX FROM sapprofile1 WHERE sapprofile1.`PLATX`=a.jabatan GROUP BY jabatan) AS cjb ";
		$query .= "FROM skema_satu_plus a  ";
		$query .= "LEFT JOIN skema_dua_plus b ON a.id=b.id_skema_plus ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function v_fix_var()
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT a.*, (SELECT nama FROM m_skema b WHERE a.komponen=b.wage_type GROUP BY b.wage_type) AS bnama, (SELECT wktxt FROM sapprofile11 c WHERE a.personalarea=c.werks GROUP BY c.werks) AS wktxt ";
		$query .= "FROM m_skema_plus a  ";
		// $query .= "LEFT JOIN m_skema b ON a.komponen=b.wage_type ";
		// $query .= "LEFT JOIN sapprofile1 c ON a.personalarea=c.werks ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function k_view_skema($area, $pa, $sl)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT a.*, (SELECT BTRTX FROM sapprofile1 WHERE sapprofile1.`BTRTL`=a.BTRTL GROUP BY BTRTL) AS carea, (SELECT WKTXT FROM sapprofile1 WHERE sapprofile1.`WERKS`=a.PERSA GROUP BY WERKS) AS cpa, (SELECT PEKTX FROM sapprofile1 WHERE sapprofile1.`PERSK`=a.PERSK GROUP BY PERSK) AS csl, (SELECT PLATX FROM sapprofile1 WHERE sapprofile1.`PLATX`=a.STEXT GROUP BY PLATX) AS cjb, (SELECT LGTXT FROM sapscheme2 WHERE sapscheme2.`LGART`=a.LGART GROUP BY LGART) AS nko, (SELECT ZAMOUNT FROM sapscheme2 WHERE sapscheme2.`LGART`=a.LGART GROUP BY LGART) AS nkz ";
		$query .= "FROM m_ket a  ";
		//$query .= "Where a.BTRTL='$area' and a.PERSA='$pa' and a.PERSK='$sl' ";
		$query .= "Where a.PERSA='$pa' ";
		/*if( ($area!='') || ($area!='ALL') )
		{
			$query .= "AND a.BTRTL='$area' ";
		}
		else*/
		if ($area != 'ALL') {
			$query .= "AND a.BTRTL='$area' ";
		} else if ($area == 'ALL') {
			$query .= "";
		} else if ($area != '') {
			$query .= "AND a.BTRTL='$area' ";
		} else if ($area == '') {
			$query .= "";
		}

		if ($sl != 'ALL') {
			$query .= "AND a.PERSK='$sl' ";
		} else if ($sl == 'ALL') {
			$query .= "";
		} else if ($sl != '') {
			$query .= "AND a.PERSK='$sl' ";
		} else if ($sl == '') {
			$query .= "";
		}

		// var_dump($query);exit();

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function view_skema($area, $pa, $sl)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		//$query = "SELECT a.*, b.*, b.id as bid, (SELECT personnal_subarea FROM data_sap WHERE data_sap.`area`=a.area GROUP BY AREA) AS carea, (SELECT personnal_area FROM data_sap WHERE data_sap.`personalarea`=a.personalarea GROUP BY personalarea) AS cpa, (SELECT employee_subgroup FROM data_sap WHERE data_sap.`skilllayanan`=a.skilllayanan GROUP BY skilllayanan) AS csl, (SELECT job FROM data_sap WHERE data_sap.`jabatan`=a.jabatan GROUP BY jabatan) AS cjb ";
		$query = "SELECT a.*, a.id as aid, b.*, b.id as bid, (SELECT BTRTX FROM sapprofile1 WHERE sapprofile1.`BTRTL`=a.area GROUP BY BTRTL) AS carea, (SELECT WKTXT FROM sapprofile1 WHERE sapprofile1.`WERKS`=a.personalarea GROUP BY WERKS) AS cpa, (SELECT PEKTX FROM sapprofile1 WHERE sapprofile1.`PERSK`=a.skilllayanan GROUP BY PERSK) AS csl, (SELECT PLATX FROM sapprofile1 WHERE sapprofile1.`PLATX`=a.jabatan GROUP BY jabatan) AS cjb ";
		$query .= "FROM skema_satu_plus a  ";
		$query .= "LEFT JOIN skema_dua_plus b ON a.id=b.id_skema_plus ";
		$query .= "Where a.personalarea='$pa' ";
		// if( ($area!='') || ($area!='ALL') )
		// {
		// 	$query .= "AND a.area='$area' ";
		// }


		if (($area == 'ALL') && ($sl == 'ALL')) {
			$query .= "AND a.area = 'ALL' ";
			$query .= "AND a.skilllayanan = 'ALL' ";
		} else if (($area == 'ALL') && ($sl != 'ALL')) {
			$query .= "AND a.area = 'ALL' ";
			$query .= "AND a.skilllayanan = '$sl' ";
		} else if (($area != 'ALL') && ($sl != 'ALL')) {
			$query .= "AND a.area = '$area' ";
			$query .= "AND a.skilllayanan = '$sl' ";
		} else {
			// $query .= "AND a.area = ";
			// $query .= "AND a.skilllayanan = ";			
		}
		// var_dump($query);die;

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}



	function update_skema($item, $item1)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->where($item);
		$this->db3->update('skema_dua_plus', $item1);
	}


	function del_all2($idx)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->where('id', $idx);
		$this->db3->delete('skema_dua_plus');
	}





	function k_update_skema($item, $item1)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->where($item);
		$this->db3->update('m_ket', $item1);
	}


	function k_del_all2($idx)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->where('id', $idx);
		$this->db3->delete('m_ket');
	}

	function nama_area($sar)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT BTRTX as nama_ar FROM sapprofile1 where btrtl='$sar' GROUP BY btrtl order by BTRTX ";

		$Q		= $this->db3->query($query);
		//if ($Q->num_rows() > 0){
		$data = $Q->row();
		//}
		return $data;
	}


	function nama_pas($spa)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT WKTXT as nama_pa FROM sapprofile1 where werks='$spa' GROUP BY WERKS order by WKTXT ";

		$Q		= $this->db3->query($query);
		//if ($Q->num_rows() > 0){
		$data = $Q->row();
		//}
		return $data;
	}


	function nama_arper($perar, $arear)
	{
		$data			= array();
		// $this->db = $this->load->database('db_third',TRUE);
		$query = "SELECT 
			(SELECT value2 FROM sappersonalarea WHERE value1='$perar' GROUP BY value1) AS wktxt,
			(SELECT value1 FROM sappersonalarea WHERE value1='$perar' GROUP BY value1) AS werks,
			(SELECT value2 FROM saparea WHERE value1='$arear' GROUP BY value1) AS btrtx,
			(SELECT value1 FROM saparea WHERE value1='$arear' GROUP BY value1) AS btrtl  ";

		$Q		= $this->db->query($query);
		//if ($Q->num_rows() > 0){
		$data = $Q->row();
		//}
		return $data;
	}



	function get_rinc_pro($werks)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT WKTXT FROM sapprofile1 WHERE werks = '$werks' GROUP BY werks ";

		$Q		= $this->db3->query($query);
		//if ($Q->num_rows() > 0){
		$data = $Q->row();
		//}
		return $data;
	}


	function get_sappersonalarea()
	{
		$data			= array();
		$query = "SELECT * FROM sappersonalarea  ";

		$Q		= $this->db->query($query);
		//if ($Q->num_rows() > 0){
		$data = $Q->result_array();
		//}
		return $data;
	}



	function take_area($persa)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		//$query = "SELECT btrtl, btrtx FROM sapprofile1 where werks='$persa' GROUP BY btrtl order by btrtx ";
		$query = "SELECT u.btrtl,u.btrtx ";
		$query .= "FROM (SELECT a.werks,a.wktxt, a.btrtl, a.btrtx FROM sapprofile1 a UNION SELECT c.werks,c.wktxt, c.btrtl, c.btrtx FROM sapprofile11 c UNION SELECT d.persa as werks,d.name1 as wktxt, d.btrtl, d.btext as btrtx FROM sapscheme1 d) AS u ";
		$query .= "WHERE u.werks = '$persa' GROUP BY u.btrtl order by u.btrtx ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function take_area2($persa)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		//$query = "SELECT btrtl, btrtx FROM sapprofile1 where werks='$persa' GROUP BY btrtl order by btrtx ";
		$query = "SELECT u.btrtl,u.btrtx ";
		$query .= "FROM (SELECT a.werks,a.wktxt, a.btrtl, a.btrtx FROM sapprofile1 a UNION SELECT c.werks,c.wktxt, c.btrtl, c.btrtx FROM sapprofile11 c UNION SELECT d.persa as werks,d.name1 as wktxt, d.btrtl, d.btext as btrtx FROM sapscheme1 d) AS u ";
		$query .= "GROUP BY u.btrtl order by u.btrtx ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function take_area23($persa)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		//$query = "SELECT btrtl, btrtx FROM sapprofile1 where werks='$persa' GROUP BY btrtl order by btrtx ";
		$query = "SELECT u.btrtl,u.btrtx ";
		$query .= "FROM (SELECT a.werks,a.wktxt, a.btrtl, a.btrtx FROM sapprofile1 a UNION SELECT c.werks,c.wktxt, c.btrtl, c.btrtx FROM sapprofile11 c UNION SELECT d.persa as werks,d.name1 as wktxt, d.btrtl, d.btext as btrtx FROM sapscheme1 d) AS u ";
		//$query .= "WHERE u.werks='$persa' GROUP BY u.btrtl order by u.btrtx ";
		$query .= "GROUP BY u.btrtl order by u.btrtx ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function cari_area($persa)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT btrtl, btrtx FROM sapprofile1 where werks='$persa' GROUP BY btrtl order by btrtx ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function cari_areainf($persa)
	{
		$data			= array();
		$this->db4 = $this->load->database('db_four', TRUE);
		$query = "SELECT btrtl, btrtx FROM sapprofile1 where werks='$persa' GROUP BY btrtl order by btrtx ";

		$Q		= $this->db4->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function searchar($perar)
	{
		$data			= array();
		//$this->db3 = $this->load->database('db_third',TRUE);
		$this->db3 = $this->load->database('db_third', TRUE);

		//$query = "SELECT WERKS as personalarea, WKTXT as personnal_area, btrtl as karea, btrtx as narea FROM sapprofile1 WHERE WERKS like '%$perar%' OR WKTXT like '%$perar%' GROUP BY werks, btrtl order by WKTXT ";
		$query = "SELECT u.WERKS as personalarea, u.WKTXT as personnal_area, u.BTRTL as karea, u.BTRTX as narea ";
		$query .= "FROM (SELECT a.WERKS,a.WKTXT,a.BTRTL,a.BTRTX FROM sapprofile1 a GROUP BY a.WERKS, a.btrtl UNION SELECT c.WERKS,c.WKTXT,c.BTRTL,c.BTRTX FROM sapprofile11 c GROUP BY c.WERKS, c.btrtl UNION SELECT d.persa AS WERKS,d.name1 AS WKTXT,d.BTRTL,d.btext AS BTRTX FROM sapscheme1 d GROUP BY d.persa, d.btrtl) AS u ";
		//$query .= "FROM sapprofile1 AS u ";
		$query .= "WHERE u.WERKS like '%$perar%' OR u.WKTXT like '%$perar%' GROUP BY u.WERKS, u.btrtl order by WKTXT ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function searchar_2($perar)
	{
		$data			= array();
		//$this->db3 = $this->load->database('db_third',TRUE);
		$this->db3 = $this->load->database('db_third', TRUE);

		//$query = "SELECT WERKS as personalarea, WKTXT as personnal_area, btrtl as karea, btrtx as narea FROM sapprofile1 WHERE WERKS like '%$perar%' OR WKTXT like '%$perar%' GROUP BY werks, btrtl order by WKTXT ";
		$query = "SELECT u.PERSA as personalarea, u.NAME1 as personnal_area, u.BTRTL as karea, u.btext as narea ";
		//$query .= "FROM (SELECT a.WERKS,a.WKTXT,a.BTRTL,a.BTRTX FROM sapprofile1 a GROUP BY a.WERKS, a.btrtl UNION SELECT c.WERKS,c.WKTXT,c.BTRTL,c.BTRTX FROM sapprofile11 c GROUP BY c.WERKS, c.btrtl) AS u ";
		$query .= "FROM sapscheme1 AS u ";
		$query .= "WHERE u.PERSA like '%$perar%' OR u.NAME1 like '%$perar%' GROUP BY u.PERSA, u.btrtl order by btext ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function xsearchar($perar)
	{
		$data			= array();
		//$this->db3 = $this->load->database('db_third',TRUE);
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT PERSA as personalarea, NAME1 as personnal_area, btrtl as karea, btext as narea FROM sapscheme1 WHERE PERSA like '%$perar%' OR NAME1 like '%$perar%' GROUP BY PERSA order by NAME1 ";
		//$query = "SELECT u.WERKS as personalarea, u.WKTXT as personnal_area, u.BTRTL as karea, u.BTRTX as narea ";
		//$query .= "FROM (SELECT a.WERKS,a.WKTXT,a.BTRTL,a.BTRTX FROM sapprofile1 a GROUP BY a.WERKS, a.btrtl UNION SELECT c.WERKS,c.WKTXT,c.BTRTL,c.BTRTX FROM sapprofile11 c GROUP BY c.WERKS, c.btrtl) AS u ";
		//$query .= "WHERE u.WERKS like '%$perar%' OR u.WKTXT like '%$perar%' group by werks order by WKTXT ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}



	function xsearchar_are($area, $perar)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT PERSA as personalarea, NAME1 as personnal_area, btrtl as karea, btext as narea FROM sapscheme1 WHERE PERSA='$perar' AND (btrtl like '%$area%' OR btext like '%$area%') GROUP BY btrtl order by btext ";

		//var_dump($query);exit();

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}



	function perner_search($perner, $pembeda)
	{
		$data			= array();
		$this->db5 = $this->load->database('db_five', TRUE);

		if ($pembeda == 1) {
			$query = "SELECT pernr, werks, btrtl, platx, persk FROM sapprofile11 WHERE pernr like '%$perner%' GROUP BY pernr order by pernr ";
			// // addbykaha 02-10-2023
			// if (!$query) {
			// 	$query = "SELECT pernr, werks, btrtl, platx, persk FROM sapprofile1 WHERE pernr like '%$perner%' GROUP BY pernr order by pernr ";
			// } else {
			// 	$query = $query;
			// }
		} else {
			$query = "SELECT pernr, werks, btrtl, platx, persk FROM sapprofile1 WHERE pernr like '%$perner%' GROUP BY pernr order by pernr ";
		}
		

		$Q		= $this->db5->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				//$this->db = $this->load->database('default',TRUE); 
				//$query = "SELECT perner FROM trans_perner WHERE perner = '".$row['pernr']."' GROUP BY pernr order by pernr ";
				$data[] = $row;
			}
		}
		return $data;
	}


	function cek_perner_sap($perner)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		// $query = "SELECT pernr, werks, btrtl, platx, persk FROM sapprofile11 WHERE pernr like '%$perner%' GROUP BY pernr order by pernr ";
		$query = "SELECT a.pernr, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.platx, a.persk, a.pektx, b.trfar FROM sapprofile11 a left JOIn sapprofile55 b ON a.PERNR=b.PERNR WHERE a.PERNR = '$perner'  ";
		$Q		= $this->db3->query($query);
		$abc = $Q->row();
		return $abc;
	}


	function detail_perner($perner, $tresix)
	{
		$this->db5 = $this->load->database('db_five', TRUE);
		$cek_rot = $this->db5->query("SELECT * FROM sapinfotype00 WHERE pernr='$perner' AND massn='Z2' HAVING MAX(endda) ")->row();
		$cek_asli = $this->db5->query("SELECT * FROM sapinfotype00 WHERE pernr='$perner' AND endda < '" . $cek_rot->ENDDA . "' LIMIT 1 ")->row();
		$data			= array();
		// if($tresix!='1'){
		// $this->db = $this->load->database('default',TRUE);
		// $queryz = $this->db->query("SELECT MAX(begda) as stgl FROM sapinfotype1 WHERE pernr='$perner' AND endda NOT LIKE ('%9999%') ")->row();
		// $queryx = $this->db->query("SELECT * FROM sapinfotype1 WHERE pernr='$perner' AND begda='".$queryz->stgl."' ")->row();
		// $queryp = $this->db->query("SELECT value2 FROM sapjob WHERE value1='".$queryx->STELL."' ")->row();

		// $query = "SELECT a.PERNR, a.cname, '".$queryx->WERKS."' as werks, (Select wktxt from sapprofile11 Where werks='".$queryx->WERKS."' group by werks) as wktxt, '".$queryx->BTRTL."' as btrtl, (Select btrtx from sapprofile11 Where btrtl='".$queryx->BTRTL."' group by btrtl) as btrtx, '".$queryp->value2."' as platx, a.persk, a.pektx, b.trfar FROM sapprofile11 a left JOIn sapprofile55 b ON a.PERNR=b.PERNR WHERE a.PERNR = '$perner'  ";
		// } else {
		// $query = "SELECT a.PERNR, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.platx, a.persk, a.pektx, b.trfar FROM sapprofile11 a left JOIn sapprofile55 b ON a.PERNR=b.PERNR WHERE a.PERNR = '$perner'  ";
		// }

		//$query = "SELECT a.PERNR, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.platx, a.persk, a.pektx, b.trfar, b.trfar_txt FROM sapprofile11 a left JOIn sapprofile55 b ON a.PERNR=b.PERNR WHERE a.PERNR = '$perner'  ";

		if ($tresix == '1') {
			$query = "SELECT a.PERNR, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.plans as stell, a.platx, a.persk, a.pektx, b.trfar, b.trfar_txt, a.abkrs, a.ansvh, a.cttyp, date_format(arber,'%Y-%m-%d') as arber, c.trfgb  ";
			$query .= "FROM sapprofile11 a left JOIN sapprofile55 b ON a.PERNR=b.PERNR  ";
			$query .= "LEFT JOIN (SELECT endda_08, pernr, trfgb FROM sapinfotype8 WHERE pernr='$perner' HAVING endda_08=(SELECT MAX(endda_08) FROM sapinfotype8 WHERE pernr='$perner')) c on a.pernr=c.pernr  ";
			$query .= "WHERE a.PERNR = '$perner'  ";
		} else {
			$query = "SELECT a.PERNR, werks, btrtl, a.plans as stell, a.stell as stellx, persk, endda, abkrs, (select cname from sapprofile1 where a.pernr=sapprofile1.pernr) as cname, (select value2 from sappersonalarea where a.werks=sappersonalarea.value1) as wktxt, (select value2 from saparea where a.btrtl=saparea.value1) as btrtx, (select value2 from sapjob where a.stell=sapjob.value1) as platx, (select value2 from sapskilllayanan where a.persk=sapskilllayanan.value1) as pektx, b.trfar, b.trfar_txt, (select ansvh from sapprofile1 where pernr='$perner' group by ansvh) as ansvh, (select cttyp from sapprofile1 where pernr='$perner' group by cttyp) as cttyp, (select date_format(arber,'%Y-%m-%d') as arber from sapprofile1 where pernr='$perner') as arber, b.trfgb  ";
			$query .= "FROM sapinfotype1 a  ";
			$query .= "LEFT JOIN (SELECT trfar, trfar_txt, endda_08, pernr, trfgb FROM sapinfotype8 WHERE pernr='$perner' AND endda_08='" . $cek_asli->ENDDA . "' AND begda_08='" . $cek_asli->BEGDA . "') b on a.pernr=b.pernr  ";
			$query .= "WHERE a.pernr='$perner' AND a.endda='" . $cek_asli->ENDDA . "' AND a.begda='" . $cek_asli->BEGDA . "' ";
		}

		//var_dump($query);
		$Q		= $this->db5->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data = $row;
			}
		}
		return $data;
	}



	function detail_pernery($perner, $tresix)
	{
		$this->db5 = $this->load->database('db_five', TRUE);
		$cek_rot = $this->db5->query("SELECT * FROM sapinfotype00 WHERE pernr='$perner' AND massn='Z2' HAVING MAX(endda) ")->row();
		// var_dump($cek_rot);die();
		// $cek_rot = $this->db5->query("SELECT * FROM sapinfotype00 WHERE pernr='$perner' AND massn IN ('Z2', 'Z7') HAVING MAX(endda) ")->row();
		$cek_asli = $this->db5->query("SELECT * FROM sapinfotype00 WHERE pernr='$perner' AND endda < '" . $cek_rot->ENDDA . "' LIMIT 1 ")->row();
		// var_dump($cek_asli);die();
		// change by kaha 08-28 change < to <= on $cek_asli
		
		$cek_rot2 = $this->db5->query("SELECT MAX(begda) FROM sapinfotype00 WHERE pernr='$perner' ")->row();
		$cek_asli2 = $this->db5->query("SELECT MAX(begda_08) as BEGDA FROM sapinfotype8 WHERE pernr='$perner' AND endda_08 NOT LIKE '9999%' ")->row();
		$data			= array();
		if ($tresix == '1') {
			$query = "SELECT a.PERNR, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.plans as stell, a.platx, a.persk, a.pektx, b.trfar, b.trfar_txt, a.abkrs, a.ansvh, a.cttyp, date_format(arber,'%Y-%m-%d') as arber, c.trfgb, a.massn  ";
			$query .= "FROM sapprofile11 a left JOIN sapprofile55 b ON a.PERNR=b.PERNR  ";
			$query .= "LEFT JOIN (SELECT endda_08, pernr, trfgb FROM sapinfotype8 WHERE pernr='$perner' HAVING endda_08=(SELECT MAX(endda_08) FROM sapinfotype8 WHERE pernr='$perner')) c on a.pernr=c.pernr  ";
			$query .= "WHERE a.PERNR = '$perner'  ";
		} else {
			// var_dump($cek_rot->endda);die;
			$query = "SELECT a.PERNR, werks, btrtl, a.plans as stell, a.stell as stellx, persk, endda, abkrs, (select cname from sapprofile1 where a.pernr=sapprofile1.pernr) as cname, (select value2 from sappersonalarea where a.werks=sappersonalarea.value1) as wktxt, (select value2 from saparea where a.btrtl=saparea.value1) as btrtx, (select value2 from sapjob where a.stell=sapjob.value1) as platx, (select value2 from sapskilllayanan where a.persk=sapskilllayanan.value1) as pektx, b.trfar, b.trfar_txt, (select ansvh from sapprofile1 where pernr='$perner' group by ansvh) as ansvh, (select cttyp from sapprofile1 where pernr='$perner' group by cttyp) as cttyp, (select date_format(arber,'%Y-%m-%d') as arber from sapprofile1 where pernr='$perner') as arber, b.trfgb  ";
			$query .= "FROM sapinfotype1 a  ";
			// $query .= "LEFT JOIN (SELECT trfar, trfar_txt, endda_08, pernr, trfgb FROM sapinfotype8 WHERE pernr='$perner' AND endda_08='".$cek_asli->ENDDA."' AND begda_08='".$cek_asli->BEGDA."') b on a.pernr=b.pernr  ";
			$query .= "LEFT JOIN (SELECT trfar, trfar_txt, endda_08, pernr, trfgb FROM sapinfotype8 WHERE pernr='$perner' AND begda_08='" . $cek_asli2->BEGDA . "') b on a.pernr=b.pernr  ";
			$query .= "WHERE a.pernr='$perner' AND a.endda='" . $cek_asli->ENDDA . "' AND a.begda='" . $cek_asli->BEGDA . "' ";
			// $query .= "WHERE a.pernr='$perner' HAVING endda=(SELECT MAX(endda) FROM sapinfotype1 WHERE pernr='$perner' AND endda NOT LIKE '%9999%') ";
		}

		// $query = "SELECT a.PERNR, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.platx, a.persk, a.pektx, b.trfar, b.trfar_txt FROM sapprofile11 a left JOIn sapprofile55 b ON a.PERNR=b.PERNR WHERE a.PERNR = '$perner'  ";


		$Q		= $this->db5->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data = $row;
			}
		}
		// var_dump($data);die;
		return $data;
	}


	function detail_pernerx($perner, $tresix)
	{
		$data			= array();
		$this->db5 = $this->load->database('db_five', TRUE);
		// if($tresix!='1'){
		// $this->db = $this->load->database('default',TRUE);
		// $queryz = $this->db->query("SELECT MAX(begda) as stgl FROM sapinfotype1 WHERE pernr='$perner' AND endda NOT LIKE ('%9999%') ")->row();
		// $queryx = $this->db->query("SELECT * FROM sapinfotype1 WHERE pernr='$perner' AND begda='".$queryz->stgl."' ")->row();
		// $queryp = $this->db->query("SELECT value2 FROM sapjob WHERE value1='".$queryx->STELL."' ")->row();

		// $query = "SELECT a.PERNR, a.cname, '".$queryx->WERKS."' as werks, (Select wktxt from sapprofile11 Where werks='".$queryx->WERKS."' group by werks) as wktxt, '".$queryx->BTRTL."' as btrtl, (Select btrtx from sapprofile11 Where btrtl='".$queryx->BTRTL."' group by btrtl) as btrtx, '".$queryp->value2."' as platx, a.persk, a.pektx, b.trfar FROM sapprofile11 a left JOIn sapprofile55 b ON a.PERNR=b.PERNR WHERE a.PERNR = '$perner'  ";
		// } else {
		// $query = "SELECT a.PERNR, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.platx, a.persk, a.pektx, b.trfar FROM sapprofile11 a left JOIn sapprofile55 b ON a.PERNR=b.PERNR WHERE a.PERNR = '$perner'  ";
		// }

		// $query = "SELECT a.PERNR, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.plans as stell, a.platx, a.persk, a.pektx, b.trfar, b.trfar_txt, a.abkrs, a.ansvh, a.cttyp, date_format(arber,'%Y-%m-%d') as arber FROM sapprofile11 a left JOIn sapprofile55 b ON a.PERNR=b.PERNR WHERE a.PERNR = '$perner'  ";

		$query = "SELECT a.PERNR, a.cname, a.werks, a.wktxt, a.btrtl, a.btrtx, a.plans as stell, a.platx, a.persk, a.pektx, b.trfar, b.trfar_txt, a.abkrs, a.ansvh, a.cttyp, date_format(arber,'%Y-%m-%d') as arber, c.trfgb  ";
		$query .= "FROM sapprofile1 a left JOIN sapprofile5 b ON a.PERNR=b.PERNR  ";
		$query .= "LEFT JOIN (SELECT endda_08, pernr, trfgb FROM sapinfotype8 WHERE pernr='$perner' HAVING endda_08=(SELECT MAX(endda_08) FROM sapinfotype8 WHERE pernr='$perner')) c on a.pernr=c.pernr  ";
		$query .= "WHERE a.PERNR = '$perner'  ";

		//var_dump($query);
		$Q		= $this->db5->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data = $row;
			}
		}
		return $data;
	}



	function xsearchar_list($perar)
	{
		$data			= array();
		//$this->db3 = $this->load->database('db_third',TRUE);
		$this->db3 = $this->load->database('db_third', TRUE);

		//$query = "SELECT WERKS as personalarea, WKTXT as personnal_area, btrtl as karea, btrtx as narea FROM sapprofile1 WHERE WERKS like '%$perar%' OR WKTXT like '%$perar%' GROUP BY werks order by WKTXT ";
		$query = "SELECT u.WERKS as personalarea, u.WKTXT as personnal_area, u.BTRTL as karea, u.BTRTX as narea ";
		$query .= "FROM (SELECT a.WERKS,a.WKTXT,a.BTRTL,a.BTRTX FROM sapprofile1 a GROUP BY a.WERKS, a.btrtl UNION SELECT c.WERKS,c.WKTXT,c.BTRTL,c.BTRTX FROM sapprofile11 c GROUP BY c.WERKS, c.btrtl) AS u ";
		$query .= "WHERE u.WERKS like '%$perar%' OR u.WKTXT like '%$perar%' group by werks order by WKTXT ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function xsearchar_2($perar)
	{
		$data			= array();
		//$this->db3 = $this->load->database('db_third',TRUE);
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT persa as personalarea, name1 as personnal_area, btrtl as karea, btext as narea FROM sapscheme1 WHERE persa like '%$perar%' OR name1 like '%$perar%' GROUP BY persa order by name1 ";
		//$query = "SELECT u.WERKS as personalarea, u.WKTXT as personnal_area, u.BTRTL as karea, u.BTRTX as narea ";
		//$query .= "FROM (SELECT a.WERKS,a.WKTXT,a.BTRTL,a.BTRTX FROM sapprofile1 a GROUP BY a.WERKS, a.btrtl UNION SELECT c.WERKS,c.WKTXT,c.BTRTL,c.BTRTX FROM sapprofile11 c GROUP BY c.WERKS, c.btrtl) AS u ";
		//$query .= "WHERE u.WERKS like '%$perar%' OR u.WKTXT like '%$perar%' group by werks order by WKTXT ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function xsearchar_area($area)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT u.WERKS as personalarea, u.WKTXT as personnal_area, u.BTRTL as karea, u.BTRTX as narea ";
		$query .= "FROM (SELECT a.WERKS,a.WKTXT,a.BTRTL,a.BTRTX FROM sapprofile1 a GROUP BY a.WERKS, a.btrtl UNION SELECT c.WERKS,c.WKTXT,c.BTRTL,c.BTRTX FROM sapprofile11 c GROUP BY c.WERKS, c.btrtl) AS u ";
		$query .= "WHERE u.BTRTL like '%$area%' OR u.BTRTX like '%$area%' group by BTRTL order by BTRTX ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function xsearchar_level($level)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT TRFAR, TRFAR_TXT FROM sapprofile5 ";
		$query .= "WHERE TRFAR like '%$level%' OR TRFAR_TXT like '%$level%' group by TRFAR order by TRFAR_TXT ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function xsearchar_jabatan($jabatan)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT u.PLATX as jabatan, u.PLANS as kd_jabatan ";
		$query .= "FROM (SELECT a.PLATX, a.PLANS FROM sapprofile1 a GROUP BY a.PLATX UNION SELECT c.PLATX, c.PLANS FROM sapprofile11 c GROUP BY c.PLATX) AS u ";
		$query .= "WHERE u.PLATX like '%$jabatan%' group by PLATX order by PLATX ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}



	function xsearchar_skill($skill)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT PERSK, PEKTX FROM sapprofile1 ";
		$query .= "WHERE PERSK like '%$skill%' OR PEKTX like '%$skill%' group by PERSK order by PEKTX ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function searchar_komp($perar)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT * From m_skema ";
		$query .= "WHERE wage_type like '%$perar%' OR nama like '%$perar%' OR type like '%$perar%' group by wage_type order by nama ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function cek_area_all($persa)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		//$query = "SELECT DISTINCT(personalarea) as personalarea, personnal_area FROM data_sap where employment_status='Active' order by personnal_area ";
		$query = "SELECT btrtl, btrtx FROM sapprofile1 where werks='$persa' GROUP BY btrtl order by btrtx ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	/*
	function get_pichi(){
		$data			= array();
		$this->db4 = $this->load->database('db_empat',TRUE);
		//$query = "SELECT DISTINCT(personalarea) as personalarea, personnal_area FROM data_sap where employment_status='Active' order by personnal_area ";
		$query = "SELECT * FROM sec_user order by usr_lastname ";
		
		$Q		= $this->db4->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	function get_email_manar($city, $prov){
		$data 	= array();
		$this->db4 = $this->load->database('db_empat',TRUE);
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from sec_user a left join sec_user_mappings b on a.usr_id=b.USER_ID ";
		$query		 .= "WHERE b.AREA='$city' and a.CLIENT_LAYANAN='$prov' ";
		$Q		= $this->db4->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	
	
	
	function get_email_pichi($pichi){
		$data 	= array();
		$this->db4 = $this->load->database('db_empat',TRUE);
		
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];
		
		$query		  = "SELECT email from sec_user b ";
		$query		 .= "WHERE b.usr_loginname='$pichi' ";
		$Q		= $this->db4->query($query);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		return $data;
	}
	*/

	function xs_rincian_simpanx($item)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->insert('m_skema_plus', $item);
	}

	function client_simpan($putih)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->insert('m_client', $putih);
	}


	function get_customer()
	{
		$data 	= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query		  = "SELECT * from ish_salesfunnel.new_customer ";
		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}



	function listclient()
	{
		$data 	= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query		  = "SELECT * from m_client ";
		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function listclientx($search)
	{
		$data 	= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query		  = "SELECT * from m_client where n_persa like '%$search%' or client like '%$search%' ";
		//var_dump($query);exit();
		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function client_edit($item, $putih)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->where($item);
		$this->db3->update('m_client', $putih);
	}


	function inssimpanskema_2($putih)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->insert('skema_satu_plus', $putih);
	}


	function get_jpencarian()
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		$query = "SELECT * ";
		$query .= "FROM m_pencarian ";
		//$query .= "WHERE u.werks = '$persa' GROUP BY u.btrtl order by u.btrtx ";

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function cari_integrated($elevel)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa,
(SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name,
(SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id,
(SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query .= "FROM user_employee AS a  ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`id` ";
		$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		$query .= "WHERE c.`education_level` LIKE '%$elevel%' GROUP BY a.id ";

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function detail_hr($aid, $atype, $gender, $pendidikan, $kota, $emp)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		//$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa, (SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name, (SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id, (SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query = "SELECT a.*, b.gpa, b.`institution_name`, (SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, b.`education_id` ";
		$query .= "FROM user_employee AS a  ";
		//$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`id` ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`user_id` ";
		//$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		//$query .= "WHERE c.`education_level` LIKE '%MAGISTER%' AND a.gender IN ($gender) and b.`education_id` IN ($pendidikan)  ";
		$query .= "WHERE a.gender IN ($gender) and b.`education_id` IN ($pendidikan) and a.address LIKE '%$kota%'  ";
		if ((empty($emp)) || ($emp == '')) {
			$query .= "AND a.user_id NOT IN (000) ";
		} else {
			$query .= "AND a.user_id NOT IN ($emp) ";
		}
		$query .= "GROUP BY a.id ";

		//var_dump($query);exit();

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function detail_training($aid, $atype, $emp)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa,
(SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name,
(SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id,
(SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query .= "FROM user_employee AS a  ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`user_id` ";
		$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		if ((empty($emp)) || ($emp == '')) {
			$query .= "WHERE a.user_id IN (000) GROUP BY a.id ";
		} else {
			$query .= "WHERE a.user_id IN ($emp) GROUP BY a.id ";
		}

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function detail_user($aid, $atype, $emp)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa,
(SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name,
(SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id,
(SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query .= "FROM user_employee AS a  ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`user_id` ";
		$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		if ((empty($emp)) || ($emp == '')) {
			$query .= "WHERE a.user_id IN (000) GROUP BY a.id ";
		} else {
			$query .= "WHERE a.user_id IN ($emp) GROUP BY a.id ";
		}

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function detail_rekrut($aid, $atype, $emp)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa,
(SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name,
(SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id,
(SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query .= "FROM user_employee AS a  ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`user_id` ";
		$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		if ((empty($emp)) || ($emp == '')) {
			$query .= "WHERE a.user_id IN (000) GROUP BY a.id ";
		} else {
			$query .= "WHERE a.user_id IN ($emp) GROUP BY a.id ";
		}

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}




	function detail_hr_nodidik($aid, $atype, $gender, $pendidikan, $kota, $sdidik, $sgender, $slokasi, $emp)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		//$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa, (SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name, (SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id, (SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query = "SELECT a.*, b.gpa, b.`institution_name`, (SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, b.`education_id` ";
		$query .= "FROM user_employee AS a  ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`id` ";
		//$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		//$query .= "WHERE c.`education_level` LIKE '%MAGISTER%' AND a.gender IN ($gender) and b.`education_id` IN ($pendidikan)  ";
		$query .= "WHERE a.id > 0 ";
		if ($sdidik != 0) {
			$query .= "AND b.`education_id` IN ($pendidikan) ";
		}

		if ($sgender != 0) {
			$query .= "AND a.gender IN ($gender) ";
		}

		if ($slokasi != 0) {
			$query .= "AND a.address LIKE '%$kota%'  ";
		}

		if ((empty($emp)) || ($emp == '')) {
			$query .= "AND a.user_id NOT IN (000) ";
		} else {
			$query .= "AND a.user_id NOT IN ($emp) ";
		}
		$query .= "GROUP BY a.id ";

		//var_dump($query);exit();

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}



	function detail_training_nodidik($aid, $atype, $sdidik, $sgender, $slokasi, $emp)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa,
(SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name,
(SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id,
(SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query .= "FROM user_employee AS a  ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`id` ";
		$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		if ((empty($emp)) || ($emp == '')) {
			$query .= "WHERE a.user_id IN (000) GROUP BY a.id ";
		} else {
			$query .= "WHERE a.user_id IN ($emp) GROUP BY a.id ";
		}

		if ($sdidik != 0) {
			$query .= "AND b.`education_id` IN ($pendidikan) ";
		}

		if ($sgender != 0) {
			$query .= "AND a.gender IN ($gender) ";
		}

		if ($slokasi != 0) {
			$query .= "AND a.address LIKE '%$kota%'  ";
		}

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function detail_user_nodidik($aid, $atype, $sdidik, $sgender, $slokasi, $emp)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa,
(SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name,
(SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id,
(SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query .= "FROM user_employee AS a  ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`id` ";
		$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		if ((empty($emp)) || ($emp == '')) {
			$query .= "WHERE a.user_id IN (000) GROUP BY a.id ";
		} else {
			$query .= "WHERE a.user_id IN ($emp) GROUP BY a.id ";
		}

		if ($sdidik != 0) {
			$query .= "AND b.`education_id` IN ($pendidikan) ";
		}

		if ($sgender != 0) {
			$query .= "AND a.gender IN ($gender) ";
		}

		if ($slokasi != 0) {
			$query .= "AND a.address LIKE '%$kota%'  ";
		}

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function detail_rekrut_nodidik($aid, $atype, $sdidik, $sgender, $slokasi, $emp)
	{
		$data			= array();
		$this->db2 = $this->load->database('db_second', TRUE);
		$query = "SELECT a.*, (SELECT gpa FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS gpa,
(SELECT institution_name FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS institution_name,
(SELECT education_id FROM employee_education WHERE employee_education.employee_id=a.`id` ORDER BY education_id DESC LIMIT 1) AS education_id,
(SELECT COUNT(*) AS jml FROM employee_experience WHERE employee_experience.employee_id=a.`id`) AS exper, c.education_level ";
		$query .= "FROM user_employee AS a  ";
		$query .= "LEFT JOIN employee_education b ON b.employee_id=a.`id` ";
		$query .= "LEFT JOIN education c ON b.education_id=c.id ";
		if ((empty($emp)) || ($emp == '')) {
			$query .= "WHERE a.user_id IN (000) GROUP BY a.id ";
		} else {
			$query .= "WHERE a.user_id IN ($emp) GROUP BY a.id ";
		}

		if ($sdidik != 0) {
			$query .= "AND b.`education_id` IN ($pendidikan) ";
		}

		if ($sgender != 0) {
			$query .= "AND a.gender IN ($gender) ";
		}

		if ($slokasi != 0) {
			$query .= "AND a.address LIKE '%$kota%'  ";
		}

		$Q		= $this->db2->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}



	function get_zskema()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT zskema FROM sapscheme1 GROUP BY zskema ORDER BY zskema ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_persax()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT werks, wktxt FROM sapprofile1 GROUP BY werks ORDER BY wktxt ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_abkrsx()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$query = "SELECT abkrs, abtxt FROM sapprofile1 GROUP BY abkrs ORDER BY wktxt ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_skill()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT PERSK, PEKTX FROM sapprofile1 ";
		$query .= "GROUP by PERSK order by PEKTX ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_area()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT BTRTL, BTRTX FROM sapprofile1 ";
		$query .= "GROUP by BTRTL order by BTRTX ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_jabatan()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT u.PLATX as jabatan, u.PLANS as kd_jabatan ";
		$query .= "FROM (SELECT a.PLATX, a.PLANS FROM sapprofile1 a GROUP BY a.PLATX UNION SELECT c.PLATX, c.PLANS FROM sapprofile11 c GROUP BY c.PLATX) AS u ";
		$query .= "Group by PLATX order by PLATX ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_level()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT TRFAR, TRFAR_TXT FROM sapprofile5 ";
		$query .= "Group by TRFAR order by TRFAR_TXT ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function listmpb()
	{
		$data 	= array();
		$this->db3 = $this->load->database('db_third', TRUE);
		$session_data   = $this->session->userdata('logged_in');
		$layanan		= $session_data['layanan'];
		$jabatan        = $session_data['jabatan'];

		//$query		  = "SELECT a.*, b.nama from m_pb a LEFT JOIN komponen b ON a.komponen=b.kode GROUP BY komponen, AREA, persa ";
		$query		  = "SELECT a.* from m_pb a ";
		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function mpb_simpan($putih)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->insert('m_pb', $putih);
	}

	function mpb_edit($item, $putih)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$this->db3->where($item);
		$this->db3->update('m_pb', $putih);
	}


	function search_skill()
	{
		$data			= array();
		$query = "SELECT value1 as persk, value2 as pektx FROM sapskilllayanan GROUP BY value1 ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function listkota()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT * FROM kota Order BY nama ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function listnegara()
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT * FROM negara Order BY nama ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}


	function get_allpax($area, $nojox)
	{
		$data			= array();
		$query = "SELECT a.persa_sap, (select value2 from sappersonalarea where value1=a.persa_sap) as npersa_sap FROM trans_rincian a Where nojo='$nojox' and area_sap='$area' and skema='1' group by persa_sap ";

		$Q		= $this->db->query($query);
		$data 	= $Q->result_array();
		return $data;
	}

	function get_alljabx($idpersa, $areax, $nojox)
	{
		$data			= array();
		$query = "SELECT a.jabatan_sap, (select value2 from sapjabatan where value1=a.jabatan_sap) as njabatan_sap FROM trans_rincian a Where nojo='$nojox' and area_sap='$areax' and persa_sap='$idpersa' and skema='1' group by jabatan_sap ";

		$Q		= $this->db->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_allskillx($id)
	{
		$data			= array();
		$this->db3 = $this->load->database('db_third', TRUE);

		$query = "SELECT persk, pektx FROM sapprofile1 Where plans='$id' group by persk Order BY pektx ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}





	function campuran($nojof, $file_name, $file_name2, $file_name3, $username)
	{
		// $this->db->trans_begin();

		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['level']			= $session_data['level'];
		$data['regional']			= $session_data['level'];
		$typere = $this->input->post('joborder[14]');

		if ($data['level'] == '1') {
			$kat = '';
			$uat = '';
			$lat = '';
			$sl = 0;
			$ls = 0;
			if ($typere == '1') {
				$zx = 0;
			} else {
				$zx = 0;
			}
		} else if ($data['level'] == '2') {
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl = 1;
			$ls = 1;
			if ($data['regional'] == '1') {
				$zx = 0;
			} else {
				$zx = 1;
			}
		} else {
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl = 1;
			$ls = 1;
			if (($data['level'] == '5') || ($data['level'] == '14')) {
				//$zx = 0;
				if ($typere == '1') {
					$zx = 1;
				} else {
					$zx = 0;
				}
			} else {
				if ($typere == '1') {
					$zx = 1;
				} else {
					$zx = 0;
				}
			}
		}

		$rrr 		= $this->input->post('joborder[10]');
		if ($rrr == '2') {
			$ab = 1;
			$ac = 1;
		} else {
			$ab = 0;
			$ac = 0;
		}


		if ($this->input->post('joborder[26]') == 'INF') {
			$tperal = '1';
		} else {
			$tperal = '0';
		}


		$tgl_skrg = date('Y-m-d H:i:s');
		$ilangtitik = str_replace('.', '', $this->input->post('joborder[29]'));

		$item = array(
			'nojo' => $nojof,
			// 'tanggal' => $this->input->post('joborder[0]'),
			'start_project' => $this->input->post('joborder[27]'),
			'end_project' => $this->input->post('joborder[28]'),
			// 'nilai_project' => $this->input->post('joborder[29]'),
			'nilai_project' => $ilangtitik,
			'tanggal' => $tgl_skrg,
			'project' => $this->input->post('joborder[1]'),
			'n_project' => $this->input->post('joborder[15]'),
			'syarat' => $this->input->post('joborder[2]'),
			'deskripsi' => $this->input->post('joborder[3]'),
			'lama' => $this->input->post('joborder[4]'),
			// 'latihan' => $this->input->post('joborder[5]'),
			// 'bekerja' => $this->input->post('joborder[6]'),
			'komponen' => $file_name,
			'komponen_bak' => $file_name2,
			'komponen_other' => $file_name3,
			'type_jo' => $this->input->post('joborder[10]'),
			'approval' => $sl,
			'approval_admin' => $ls,
			'jenis_project' => $this->input->post('joborder[11]'),
			'jenis_captive' => $this->input->post('joborder[25]'),
			'ket_atasan' => $kat,
			'upd_atasan' => $uat,
			'lupapp_atasan' => $lat,
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $username,
			'type_replace' => $this->input->post('joborder[14]'),
			'type_new' => $this->input->post('joborder[16]'),
			'no_bak' => $this->input->post('joborder[18]'),
			'tgl_gajian' => $this->input->post('joborder[21]'),
			'new_rekrut' => 0,
			'kode_cust' => $this->input->post('joborder[23]'),
			'nama_cust' => $this->input->post('joborder[24]'),
			'flag_peralihan' => $tperal
		);

		$this->db->insert('trans_jo', $item);



		// $itemw = array (
		// 'nojo' => $nojof,
		// 'doc_id' => $this->input->post('sapi'),
		// 'upd' => $username,
		// 'lup' => date("Y-m-d H:i:s")
		// );

		// $this->db->insert('trans_doc',$itemw);

		/*
		$putih = array (
			'nojo' => $nojof,
			'filename'	=> $file_name
		);
		
		$this->db->insert('trans_upload',$putih);
		*/

		$rec 	= $this->input->post('joborder[12]');
		$rec	= explode(",", $rec);
		$loop = count($rec) / 24;
		$loopx = $loop - 1;
		if ($loopx) {
			$a = 0;
			$b = 1;
			$c = 2;
			$d = 3;
			$e = 4;
			$f = 5;
			$g = 6;
			$h = 7;
			$o = 8;
			$j = 9;
			$k = 10;
			$l = 11;
			$m = 12;
			$n = 13;
			$p = 14;
			$q = 15;
			$r = 16;
			$s = 17;
			$t = 18;
			$u = 19;
			$v = 20;
			$w = 21;
			$x = 22;
			$y = 23;
			for ($i = 0; $i < $loopx; $i++) {
				//$ltxt = explode(" | ",$rec[$j]);
				if (strpos($rec[$s], '1') !== false) {
					$ca = 1;
				} else {
					$ca = 0;
				}

				if (strpos($rec[$s], '2') !== false) {
					$cb = 1;
				} else {
					$cb = 0;
				}

				if (strpos($rec[$s], '3') !== false) {
					$cc = 1;
				} else {
					$cc = 0;
				}

				if (strpos($rec[$s], '4') !== false) {
					$cd = 1;
				} else {
					$cd = 0;
				}


				$aabb = explode("-", $rec[$y]);
				$iteml = array(
					'nojo' => $nojof,
					'jenis_skema' => $rec[$x],
					'detail_komp' => $rec[$r],
					'jabatan' => $rec[$a],
					'gender' => $rec[$b],
					'pendidikan' => $rec[$c],
					'lokasi' => $rec[$d],
					'waktu' => $rec[$e],
					'atasan' => $rec[$f],
					'kontrak' => $rec[$g],
					'jumlah' => $rec[$h],
					'skema' => '0',
					'upd' => $username,
					'lup' => date("Y-m-d H:i:s"),
					'flag_app' => '0',
					'level' => $rec[$o],
					//'level_txt' => $ltxt[1],
					'skilllayanan' => $rec[$k],
					'skilllayanan_txt' => $stxt[0],
					'kd_rotasi' => $aabb[1],
					'kd_reason' => $aabb[0],
					'train_soft' => $ca,
					'train_hard' => $cb,
					'tendem_pasif' => $cc,
					'tendem_aktif' => $cd,
					'tgl_latihan' => $rec[$t],
					'tgl_bekerja' => $rec[$u],
					'perner_norekrut' => $rec[$w],
					'type_rekrut' => $rec[$v]
				);
				$this->db->insert('trans_rincian', $iteml);

				$a = $a + 24;
				$b = $b + 24;
				$c = $c + 24;
				$d = $d + 24;
				$e = $e + 24;
				$f = $f + 24;
				$g = $g + 24;
				$h = $h + 24;
				$o = $o + 24;
				$j = $j + 24;
				$k = $k + 24;
				$l = $l + 24;
				$m = $m + 24;
				$n = $n + 24;
				$p = $p + 24;
				$q = $q + 24;
				$r = $r + 24;
				$s = $s + 24;
				$t = $t + 24;
				$u = $u + 24;
				$v = $v + 24;
				$w = $w + 24;
				$x = $x + 24;
				$y = $y + 24;
			}
		}


		//insert komponen
		$qwerty 	= $this->input->post('joborder[17]');
		if ($qwerty != 'X') {
			$reckom 	= $this->input->post('joborder[17]');
			$reckom		= explode(",", $reckom);
			$loops = count($reckom) / 16;
			$loopsx = $loops - 1;
			if ($loopsx) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$i = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				for ($z = 0; $z < $loopsx; $z++) {
					$loks = explode(" | ", $reckom[$c]);
					$jabs = explode(" | ", $reckom[$a]);
					//$levs = explode(" | ",$reckom[$i]);
					$komps = explode(" | ", $reckom[$e]);
					$xxxe = explode(" | ", $reckom[$p]);

					$iteml = array(
						'detail_komp' => $reckom[$q],
						'nojo' => $nojof,
						'area' => $reckom[$d],
						'area_txt' => $reckom[$c],
						'jabatan' => $reckom[$b],
						'jabatan_txt' => $reckom[$a],
						'level' => $reckom[$l],
						'level_txt' => $reckom[$m],
						'skill' => $reckom[$n],
						'skill_text' => $xxxe[0],
						//'level' => $reckom[$j],
						//'level_txt' => $levs[1],
						//'jumlah' => $rec[$b],
						'ump' => $reckom[$j],
						'komponen' => $reckom[$f],
						'komponen_txt' => $reckom[$e],
						'value' => $reckom[$g],
						'hk_pembagi' => $reckom[$i],
						'keterangan' => $reckom[$h],
						'persentase' => $reckom[$k],
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_komponen', $iteml);

					$a = $a + 16;
					$b = $b + 16;
					$c = $c + 16;
					$d = $d + 16;
					$e = $e + 16;
					$f = $f + 16;
					$g = $g + 16;
					$h = $h + 16;
					$i = $i + 16;
					$j = $j + 16;
					$k = $k + 16;
					$l = $l + 16;
					$m = $m + 16;
					$n = $n + 16;
					$p = $p + 16;
					$q = $q + 16;
				}
			}
		}


		$sssd = $this->input->post('joborder[19]');
		if ($sssd != 'X') {
			$recproc 	= $this->input->post('joborder[19]');
			$recproc		= explode(",", $recproc);
			$loopsy = count($recproc) / 8;
			$loopsxy = $loopsy - 1;
			if ($loopsxy) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				for ($z = 0; $z < $loopsxy; $z++) {
					$iteml = array(
						'nojo' => $nojof,
						'periode' => $recproc[$f],
						'tgl1' => $recproc[$g],
						'tgl2' => $recproc[$h],
						'item_id' => $recproc[$e],
						'qty' => $recproc[$b],
						'spec' => $recproc[$c],
						'budget' => $recproc[$d],
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_proc', $iteml);

					$a = $a + 8;
					$b = $b + 8;
					$c = $c + 8;
					$d = $d + 8;
					$e = $e + 8;
					$f = $f + 8;
					$g = $g + 8;
					$h = $h + 8;
				}
			}
		}

		// if ($this->db->trans_status() === FALSE)
		// {
		// $this->db->trans_rollback();
		// echo "Data Gagal Di Simpan, Coba Lagi..";
		// return false;
		// }
		// else
		// {
		// $this->db->trans_commit();
		// echo "Data Berhasil Di Simpan"; 
		// return true;
		// }
	}



	function campuran_new($nojof, $file_name, $file_name2, $file_name3, $username)
	{
		$session_data			= $this->session->userdata('logged_in');
		$data['username']		= $session_data['username'];
		$data['level']			= $session_data['level'];
		$data['regional']			= $session_data['level'];
		$typere = $this->input->post('joborder[14]');

		if ($data['level'] == '1') {
			$kat = '';
			$uat = '';
			$lat = '';
			$sl = 0;
			$ls = 0;
			if ($typere == '1') {
				$zx = 0;
			} else {
				$zx = 0;
			}
		} else if ($data['level'] == '2') {
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl = 1;
			$ls = 1;
			if ($data['regional'] == '1') {
				$zx = 0;
			} else {
				$zx = 1;
			}
		} else {
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl = 1;
			$ls = 1;
			if (($data['level'] == '5') || ($data['level'] == '14')) {
				//$zx = 0;
				if ($typere == '1') {
					$zx = 1;
				} else {
					$zx = 0;
				}
			} else {
				if ($typere == '1') {
					$zx = 1;
				} else {
					$zx = 0;
				}
			}
		}

		$rrr 		= $this->input->post('joborder[10]');
		if ($rrr == '2') {
			$ab = 1;
			$ac = 1;
		} else {
			$ab = 0;
			$ac = 0;
		}


		if ($this->input->post('joborder[26]') == 'INF') {
			$tperal = '1';
		} else {
			$tperal = '0';
		}


		$tgl_skrg = date('Y-m-d H:i:s');
		$ilangtitik = str_replace('.', '', $this->input->post('joborder[29]'));

		$item = array(
			'nojo' => $nojof,
			'start_project' => $this->input->post('joborder[27]'),
			'end_project' => $this->input->post('joborder[28]'),
			'nilai_project' => $ilangtitik,
			'tanggal' => $tgl_skrg,
			'project' => $this->input->post('joborder[1]'),
			'n_project' => $this->input->post('joborder[15]'),
			'syarat' => $this->input->post('joborder[2]'),
			'deskripsi' => $this->input->post('joborder[3]'),
			'lama' => $this->input->post('joborder[4]'),
			'komponen' => $file_name,
			'komponen_bak' => $file_name2,
			'komponen_other' => $file_name3,
			'type_jo' => $this->input->post('joborder[10]'),
			'approval' => $sl,
			'approval_admin' => $ls,
			'jenis_project' => $this->input->post('joborder[11]'),
			'jenis_captive' => $this->input->post('joborder[25]'),
			'ket_atasan' => $kat,
			'upd_atasan' => $uat,
			'lupapp_atasan' => $lat,
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $username,
			'type_replace' => $this->input->post('joborder[14]'),
			'type_new' => $this->input->post('joborder[16]'),
			'no_bak' => $this->input->post('joborder[18]'),
			'tgl_gajian' => $this->input->post('joborder[21]'),
			'new_rekrut' => 0,
			'kode_cust' => $this->input->post('joborder[23]'),
			'nama_cust' => $this->input->post('joborder[24]'),
			'pks' => $this->input->post('joborder[30]'),
			'flag_peralihan' => $tperal
		);

		$this->db->insert('trans_jo', $item);

		$rec 	= $this->input->post('joborder[12]');
		$rec	= explode(",", $rec);
		$loop = count($rec) / 25;
		$loopx = $loop - 1;
		if ($loopx) {
			$a = 0;
			$b = 1;
			$c = 2;
			$d = 3;
			$e = 4;
			$f = 5;
			$g = 6;
			$h = 7;
			$o = 8;
			$j = 9;
			$k = 10;
			$l = 11;
			$m = 12;
			$n = 13;
			$p = 14;
			$q = 15;
			$r = 16;
			$s = 17;
			$t = 18;
			$u = 19;
			$v = 20;
			$w = 21;
			$x = 22;
			$y = 23;
			$z = 24;
			for ($i = 0; $i < $loopx; $i++) {
				if (strpos($rec[$s], '1') !== false) {
					$ca = 1;
				} else {
					$ca = 0;
				}

				if (strpos($rec[$s], '2') !== false) {
					$cb = 1;
				} else {
					$cb = 0;
				}

				if (strpos($rec[$s], '3') !== false) {
					$cc = 1;
				} else {
					$cc = 0;
				}

				if (strpos($rec[$s], '4') !== false) {
					$cd = 1;
				} else {
					$cd = 0;
				}


				$aabb = explode("-", $rec[$y]);
				$iteml = array(
					'nojo' => $nojof,
					'jenis_skema' => $rec[$x],
					'detail_komp' => $rec[$r],
					'jabatan' => $rec[$a],
					'gender' => $rec[$b],
					'pendidikan' => $rec[$c],
					'lokasi' => $rec[$d],
					'waktu' => $rec[$e],
					'atasan' => $rec[$f],
					'kontrak' => $rec[$g],
					'jenis_pkwt' => $rec[$z],
					'jumlah' => $rec[$h],
					'skema' => '0',
					'upd' => $username,
					'lup' => date("Y-m-d H:i:s"),
					'flag_app' => '0',
					'level' => $rec[$o],
					'skilllayanan' => $rec[$k],
					'skilllayanan_txt' => $stxt[0],
					'kd_rotasi' => $aabb[1],
					'kd_reason' => $aabb[0],
					'train_soft' => $ca,
					'train_hard' => $cb,
					'tendem_pasif' => $cc,
					'tendem_aktif' => $cd,
					'tgl_latihan' => $rec[$t],
					'tgl_bekerja' => $rec[$u],
					'perner_norekrut' => $rec[$w],
					'type_rekrut' => $rec[$v]
				);
				$this->db->insert('trans_rincian', $iteml);

				$a = $a + 25;
				$b = $b + 25;
				$c = $c + 25;
				$d = $d + 25;
				$e = $e + 25;
				$f = $f + 25;
				$g = $g + 25;
				$h = $h + 25;
				$o = $o + 25;
				$j = $j + 25;
				$k = $k + 25;
				$l = $l + 25;
				$m = $m + 25;
				$n = $n + 25;
				$p = $p + 25;
				$q = $q + 25;
				$r = $r + 25;
				$s = $s + 25;
				$t = $t + 25;
				$u = $u + 25;
				$v = $v + 25;
				$w = $w + 25;
				$x = $x + 25;
				$y = $y + 25;
				$z = $z + 25;
			}
		}

		//insert komponen
		$qwerty 	= $this->input->post('joborder[17]');
		if ($qwerty != 'X') {
			$reckom 	= $this->input->post('joborder[17]');
			$reckom		= explode(",", $reckom);
			$loops = count($reckom) / 18;
			$loopsx = $loops - 1;
			if ($loopsx) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				$i = 8;
				$j = 9;
				$k = 10;
				$l = 11;
				$m = 12;
				$n = 13;
				$p = 14;
				$q = 15;
				$r = 16;
				$s = 17;
				for ($z = 0; $z < $loopsx; $z++) {
					$loks = explode(" | ", $reckom[$c]);
					$jabs = explode(" | ", $reckom[$a]);
					$komps = explode(" | ", $reckom[$e]);
					$xxxe = explode(" | ", $reckom[$p]);

					$iteml = array(
						'detail_komp' => $reckom[$q],
						'nojo' => $nojof,
						'area' => $reckom[$d],
						'area_txt' => $reckom[$c],
						'jabatan' => $reckom[$b],
						'jabatan_txt' => $reckom[$a],
						'level' => $reckom[$l],
						'level_txt' => $reckom[$m],
						'skill' => $reckom[$n],
						'skill_text' => $xxxe[0],
						'ump' => $reckom[$j],
						'komponen' => $reckom[$f],
						'komponen_txt' => $reckom[$e],
						'value' => $reckom[$g],
						'hk_pembagi' => $reckom[$i],
						'keterangan' => $reckom[$h],
						'persentase' => $reckom[$k],
						'pengkali_tk' => $reckom[$r],
						'pengkali_kes' => $reckom[$s],
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_komponen', $iteml);

					$a = $a + 18;
					$b = $b + 18;
					$c = $c + 18;
					$d = $d + 18;
					$e = $e + 18;
					$f = $f + 18;
					$g = $g + 18;
					$h = $h + 18;
					$i = $i + 18;
					$j = $j + 18;
					$k = $k + 18;
					$l = $l + 18;
					$m = $m + 18;
					$n = $n + 18;
					$p = $p + 18;
					$q = $q + 18;
					$r = $r + 18;
					$s = $s + 18;
				}
			}
		}


		$sssd = $this->input->post('joborder[19]');
		if ($sssd != 'X') {
			$recproc 	= $this->input->post('joborder[19]');
			$recproc		= explode(",", $recproc);
			$loopsy = count($recproc) / 8;
			$loopsxy = $loopsy - 1;
			if ($loopsxy) {
				$a = 0;
				$b = 1;
				$c = 2;
				$d = 3;
				$e = 4;
				$f = 5;
				$g = 6;
				$h = 7;
				for ($z = 0; $z < $loopsxy; $z++) {
					$iteml = array(
						'nojo' => $nojof,
						'periode' => $recproc[$f],
						'tgl1' => $recproc[$g],
						'tgl2' => $recproc[$h],
						'item_id' => $recproc[$e],
						'qty' => $recproc[$b],
						'spec' => $recproc[$c],
						'budget' => $recproc[$d],
						'upd' => $username,
						'lup' => date("Y-m-d H:i:s")
					);
					$this->db->insert('trans_proc', $iteml);

					$a = $a + 8;
					$b = $b + 8;
					$c = $c + 8;
					$d = $d + 8;
					$e = $e + 8;
					$f = $f + 8;
					$g = $g + 8;
					$h = $h + 8;
				}
			}
		}

		// $cek_no_bak = $this->db->query('select * from legal_pks where nobak = "' . $this->input->post('joborder[18]') . '"  ')->row();

		// if ($this->input->post('joborder[30]') == 1 && empty($cek_no_bak)) {

		// 	$item_pks = array(
		// 		'nobak' => $this->input->post('joborder[18]'),
		// 		'customer' => $this->input->post('joborder[23]') . '||' . $this->input->post('joborder[24]'),
		// 		'project' => $this->input->post('joborder[1]') . '||' . $this->input->post('joborder[15]'),
		// 		'project_start' => $this->input->post('joborder[27]'),
		// 		'project_end' => $this->input->post('joborder[28]'),
		// 		'project_nilai' => $ilangtitik,
		// 		'project_type' => $this->input->post('joborder[6]'),
		// 		'file_bak' => $file_name2,
		// 		'created' => $username,
		// 		'created_at' => date("Y-m-d H:i:s"),
		// 	);

		// 	$this->db->insert('legal_pks', $item_pks);
		// }
	}



	function campuran_perner($nojof, $file_name, $file_name2, $file_name3, $username)
	{
		$session_data			= $this->session->userdata('logged_in');
		$data['level']			= $session_data['level'];
		$data['regional']		= $session_data['level'];
		$data['username']		= $session_data['username'];
		$typere = $this->input->post('joborder[10]');

		if ($data['level'] == '1')
		//if( ($data['level']=='1') || (($data['level']=='2') && ($data['regional']=='1')) )
		{
			$kat = '';
			$uat = '';
			$lat = '';
			$sl = 0;
			$ls = 0;
			if ($typere == '1') {
				$zx = 0;
			} else {
				$zx = 0;
			}
		} else if ($data['level'] == '2') {
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl = 1;
			$ls = 1;
			if ($data['regional'] == '1') {
				$zx = 0;
			} else {
				$zx = 1;
			}
		} else {
			$kat = 'Skip untuk Creater Area';
			$uat = $data['username'];
			$lat = date("Y-m-d H:i:s");
			$sl = 1;
			$ls = 1;
			if (($data['level'] == '5') || ($data['level'] == '14')) {
				//$zx = 0;
				if ($typere == '1') {
					$zx = 1;
				} else {
					$zx = 0;
				}
			} else {
				if ($typere == '1') {
					$zx = 1;
				} else {
					$zx = 0;
				}
			}
		}

		$rrr 		= $this->input->post('joborder[7]');
		if ($rrr == '2') {
			$ab = 1;
			$ac = 1;
		} else {
			$ab = 0;
			$ac = 0;
		}

		$tgl_skrg = date('Y-m-d H:i:s');

		if ($this->input->post('joborder[14]') == 'INF') {
			$tperal = '1';
		} else {
			$tperal = '0';
		}

		if($this->input->post('joborder[18]') == 1){
			$pks = 1;
		}else{
			$pks = 0;
		}

		$item = array(
			'nojo' => $nojof,
			// 'tanggal' => $this->input->post('joborder[0]'),
			'tanggal' => $tgl_skrg,
			'project' => '',
			'n_project' => '',
			'lama' => $this->input->post('joborder[1]'),
			'latihan' => $this->input->post('joborder[2]'),
			'bekerja' => $this->input->post('joborder[3]'),
			'komponen' => $file_name,
			'komponen_bak' => $file_name2,
			'komponen_other' => $file_name3,
			'type_jo' => $this->input->post('joborder[7]'),
			'approval' => $sl,
			'approval_admin' => $ls,
			'jenis_project' => $this->input->post('joborder[8]'),
			'jenis_captive' => $this->input->post('joborder[13]'),
			'ket_atasan' => $kat,
			'upd_atasan' => $uat,
			'lupapp_atasan' => $lat,
			'lup' => date("Y-m-d H:i:s"),
			'upd' => $username,
			// 'type_replace' => $this->input->post('joborder[10]'),
			'type_replace' => 0,
			//'type_new' => $this->input->post('joborder[16]'),
			'no_bak' => $this->input->post('joborder[11]'),
			'kode_cust' => $this->input->post('joborder[15]'),
			'nama_cust' => $this->input->post('joborder[16]'),
			'pks' => $this->input->post('joborder[18]'),
			'flag_peralihan' => $tperal,
		);

		$this->db->insert('trans_jo', $item);


		$rec 	= $this->input->post('joborder[12]');
		$rec	= explode(",", $rec);
		$loop = count($rec) / 26;
		$loopx = $loop - 1;
		if ($loopx) {
			$a = 0;
			$b = 1;
			$c = 2;
			$d = 3;
			$e = 4;
			$f = 5;
			$g = 6;
			$h = 7;
			$o = 8;
			$j = 9;
			$k = 10;
			$l = 11;
			$m = 12;
			$n = 13;
			$p = 14;
			$q = 15;
			$r = 16;
			$s = 17;
			$t = 18;
			$u = 19;
			$v = 20;
			$w = 21;
			$x = 22;
			$y = 23;
			$z = 24;
			$az = 25;
			for ($i = 0; $i < $loopx; $i++) {
				if (strpos($rec[$m], '1') !== false) {
					$ca = 1;
				} else {
					$ca = 0;
				}

				if (strpos($rec[$m], '2') !== false) {
					$cb = 1;
				} else {
					$cb = 0;
				}

				if (strpos($rec[$m], '3') !== false) {
					$cc = 1;
				} else {
					$cc = 0;
				}

				if (strpos($rec[$m], '4') !== false) {
					$cd = 1;
				} else {
					$cd = 0;
				}

				//$stxt = explode(" | ",$rec[$l]);
				$kdz = explode("-", $rec[$w]);

				$iteml = array(
					'nojo' => $nojof,
					'tgllatihan' => $rec[$s],
					'tglbekerja' => $rec[$t],
					'perner_ganti' => $rec[$r],
					'perner' => $rec[$a],
					'nama' => $rec[$b],
					'area' => $rec[$h],
					'nm_area' => $rec[$c],
					'persa' => $rec[$o],
					'nm_persa' => $rec[$d],
					'skilllayanan' => $rec[$j],
					'nm_skilllayanan' => $rec[$e],
					'level' => $rec[$k],
					'nm_level' => $rec[$g],
					'jabatan' => $rec[$u],
					'nm_jabatan' => $rec[$f],
					'abkrs' => $rec[$v],
					'cttyp' => $rec[$y],
					'ansvh' => $rec[$x],
					'trfgb' => $rec[$z],
					'skema' => '0',
					'upd' => $username,
					'lup' => date("Y-m-d H:i:s"),
					'flag_app' => '0',
					'tgl_resign' => $rec[$l],
					'train_soft' => $ca,
					'train_hard' => $cb,
					'tendem_pasif' => $cc,
					'tendem_aktif' => $cd,
					'rotasi_resign' => $rec[$p],
					'kodez_rotres' => $kdz[1],
					'alasan_rotres' => $kdz[0],
					'type_rep' => $rec[$q],
					'massn' => $rec[$az]
				);
				$this->db->insert('trans_perner', $iteml);

				$a  = $a + 26;
				$b  = $b + 26;
				$c  = $c + 26;
				$d  = $d + 26;
				$e  = $e + 26;
				$f  = $f + 26;
				$g  = $g + 26;
				$h  = $h + 26;
				$o  = $o + 26;
				$j  = $j + 26;
				$k  = $k + 26;
				$l  = $l + 26;
				$m  = $m + 26;
				$n  = $n + 26;
				$p  = $p + 26;
				$q  = $q + 26;
				$r  = $r + 26;
				$s  = $s + 26;
				$t  = $t + 26;
				$u  = $u + 26;
				$v  = $v + 26;
				$w  = $w + 26;
				$x  = $x + 26;
				$y  = $y + 26;
				$z  = $z + 26;
				$az = $az + 26;
			}
		}


		$rec 	= $this->input->post('joborder[17]');
		$rec	= explode(",", $rec);
		$loop = count($rec) / 17;
		$loopx = $loop - 1;
		if ($loopx) {
			$a = 0;
			$b = 1;
			$c = 2;
			$d = 3;
			$e = 4;
			$f = 5;
			$g = 6;
			$h = 7;
			$o = 8;
			$j = 9;
			$k = 10;
			$l = 11;
			$m = 12;
			$n = 13;
			$p = 14;
			$q = 15;
			$r = 16;
			for ($i = 0; $i < $loopx; $i++) {
				//$stxt = explode(" | ",$rec[$l]);
				$kdzg = explode("-", $rec[$m]);

				$itemy = array(
					'nojo' => $nojof,
					'perner_resrot' => $rec[$a],
					'perner_ganti' => $rec[$b],
					'kodez_rotasi' => $kdzg[1],
					'alasan_rotasi' => $kdzg[0],
					'nama' => $rec[$c],
					'area' => $rec[$o],
					'nm_area' => $rec[$d],
					'persa' => $rec[$j],
					'nm_persa' => $rec[$e],
					'skilllayanan' => $rec[$k],
					'nm_skilllayanan' => $rec[$f],
					'level' => $rec[$l],
					'nm_level' => $rec[$h],
					'jabatan' => $rec[$g],
					'nm_jabatan' => $rec[$g],
					'cttyp' => $rec[$n],
					'ansvh' => $rec[$p],
					'trfgb' => $rec[$r],
					'arber' => $rec[$q],
					'upd' => $username,
					'lup' => date("Y-m-d H:i:s")
				);
				$this->db->insert('trans_perner_ganti', $itemy);

				$a = $a + 17;
				$b = $b + 17;
				$c = $c + 17;
				$d = $d + 17;
				$e = $e + 17;
				$f = $f + 17;
				$g = $g + 17;
				$h = $h + 17;
				$o = $o + 17;
				$j = $j + 17;
				$k = $k + 17;
				$l = $l + 17;
				$m = $m + 17;
				$n = $n + 17;
				$p = $p + 17;
				$q = $q + 17;
				$r = $r + 17;
			}
		}

	}

	function simpan_pp($item)
	{
		$this->db->insert('trans_perpanjangan', $item);
	}

	function get_jopp($username, $level, $regional, $jbt, $lay)
	{
		$data			= array();
		$query = "SELECT a.*, a.id as aid, (select value2 from sappersonalarea where value1=a.persa) as npersa, (select value2 from saparea where value1=a.area) as narea,  ";
		$query .= "(select value2 from sapskilllayanan where value1=a.skilllayanan) as nskill, (select value2 from saplevel where value1=a.level) as nlevel,  ";
		$query .= "(select nama from m_login where username=a.upd) as nupd   ";
		$query .= "FROM trans_perpanjangan a ";
		if ($level == 2) {
			$query .= "LEFT JOIN m_login b on a.upd=b.username ";
		}
		$query .= "WHERE a.nojo !=''  ";
		if (($level == 1) || ($level == 2 && $regional == 1)) {
			$query .= "AND a.upd='$username'  ";
		}

		if ($level == 2 && ($regional == 0 || $regional == null)) {
			$query .= "AND b.layanan='$lay' AND b.jabatan='$jbt'  ";
		}

		if ($level == 5) {
			$query .= "AND a.approval_atasan='1'  ";
		}

		$query .= "Group By a.nojo  ";
		$query .= "Order By a.nojo Desc  ";

		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		return $data;
	}

	function spp($nid, $keter, $cekapp)
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];

		if ($cekapp == 'atasan') {
			$update	= array(
				'approval_atasan' 	=> 1,
				'ket_atasan' 		=> $keter,
				'upd_approval' 		=> $data['username'],
				'lup_approval' 		=> date("Y-m-d H:i:s")
			);
		} else {
			$update	= array(
				'approval_pm' 		=> 1,
				'ket_pm' 			=> $keter,
				'upd_pm' 			=> $data['username'],
				'lup_pm' 			=> date("Y-m-d H:i:s")
			);
		}

		$this->db->where('id', $nid);
		$this->db->update('trans_perpanjangan', $update);
	}

	function rpp($nid, $keter, $cekapp)
	{
		$session_data 			= $this->session->userdata('logged_in');
		$data['username'] 		= $session_data['username'];
		if ($cekapp == 'atasan') {
			$update	= array(
				'approval_atasan' 	=> 2,
				'ket_atasan' 		=> $keter,
				'upd_approval' 		=> $data['username'],
				'lup_approval' 		=> date("Y-m-d H:i:s")
			);
		} else {
			$update	= array(
				'approval_pm' 		=> 2,
				'ket_pm' 			=> $keter,
				'upd_pm' 			=> $data['username'],
				'lup_pm' 			=> date("Y-m-d H:i:s")
			);
		}

		$this->db->where('id', $nid);
		$this->db->update('trans_perpanjangan', $update);
	}

	function get_detpp($nid)
	{
		$data			= array();
		$query = "SELECT a.*, (select value2 from sappersonalarea where value1=a.persa) as npersa, (select value2 from saparea where value1=a.area) as narea,  ";
		$query .= "(select value2 from sapskilllayanan where value1=a.skilllayanan) as nskill, (select value2 from saplevel where value1=a.level) as nlevel,  ";
		$query .= "(select nama from m_login where username=a.upd) as nupd   ";
		$query .= "FROM trans_perpanjangan a ";
		$query .= "Where a.id='$nid' ";

		$Q		= $this->db->query($query);
		$data	= $Q->result_array();
		return $data;
	}

	function del_dok_pp($nid, $item1)
	{
		$this->db->where('id', $nid);
		$this->db->update('trans_perpanjangan', $item1);
	}

	function edit_jopp($item, $item1)
	{
		$this->db->where($item);
		$this->db->update('trans_perpanjangan', $item1);
	}

	public function get_list_skemapb($filter)
	{

		$session_data   = $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];
		$data['layanan'] 		= $session_data['layanan'];

		$this->db3 = $this->load->database('db_third', TRUE);

		// var_dump($_POST['search']['value']);
		// die;

		$order = $_POST['order'][0]['column'];
		$dir = $_POST['order'][0]['dir'];

		$order_by = "a.id desc";
		if ($order != '0') {
			if ($order == '1') {
				$order_by = "a.perner $dir";
			} else if ($order == '2') {
				$order_by = "a.smasa $dir";
			} else if ($order == '3') {
				$order_by = "a.emasa $dir";
			} else if ($order == '4') {
				$order_by = "a.lzparameter $dir";
			} else if ($order == '5') {
				$order_by = "a.perkalian $dir";
			} else if ($order == '6') {
				$order_by = "a.perkalian $dir";
			} else if ($order == '7') {
				$order_by = "a.status $dir";
			}
		}

		$where_clause = " a.id <> '' ";

		if ($filter['cari_perner'] != '') {
			$where_clause .= "and a.perner like '%" . $filter['cari_perner'] . "%' ";
		}

		$this->db3->select('a.id, a.perner, a.smasa, a.emasa, a.lzparameter, a.perkalian, a.status ');
		$this->db3->from('m_uak_perner a');
		// $this->db->join("(select item_name,kode from m_variable where item_type = 'form_proposal') b", 'b.kode = a.typeproposal', 'left');
		$this->db3->where($where_clause);
		if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
		{
			$this->db->group_start();
			$this->db->like('a.perner', $_POST['search']['value']);
			$this->db->group_end();
		}
		$this->db3->limit($_POST['length'], $_POST['start']);
		$this->db3->order_by($order_by);

		$sql = $this->db3->get();
		foreach ($sql->result_array() as $key => $row) {
			$dataview[] = $row;
		}
		$total      = $sql->num_rows();
		// var_dump($dataview);die;
		return $dataview;
	}

	public function get_rows_skemapb($filter)
	{
		$session_data   = $this->session->userdata('logged_in');
		$data['nama'] 			= $session_data['nama'];
		$data['username'] 		= $session_data['username'];
		$data['level'] 			= $session_data['level'];
		$data['regional'] 		= $session_data['regional'];
		$data['layanan'] 		= $session_data['layanan'];

		$this->db3 = $this->load->database('db_third', TRUE);

		$where_clause = " a.id <> '' ";

		if ($filter['cari_perner'] != '') {
			$where_clause .= "and a.perner like '%" . $filter['cari_perner'] . "%' ";
		}

		$this->db3->select('a.id ');
		$this->db3->from('m_uak_perner a');
		// $this->db->join("(select item_name,kode from m_variable where item_type = 'form_proposal') b", 'b.kode = a.typeproposal', 'left');
		$this->db3->where($where_clause);
		if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
		{
			$this->db->group_start();
			$this->db->like('a.perner', $_POST['search']['value']);
			$this->db->group_end();
		}
		$sql = $this->db3->get();
		foreach ($sql->result_array() as $key => $row) {
			$dataview[] = $row;
		}
		$total      = $sql->num_rows();
		// return $this->db->count_all_results();
		// return $total;
		return array(
			"data"       => $dataview,
			"total_data" => $total
		);
	}

	function search_perner($perner)
	{
		$data			= array();

		$this->db3 = $this->load->database('db_third', TRUE);


		$query = "select perner from new_kontrak where perner like '%" . $perner . "%' ";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_detail_kontrak($perner)
	{
		$data			= array();

		$this->db3 = $this->load->database('db_third', TRUE);


		$query = "select id, perner, start_date, end_date, zparameter from new_kontrak where perner = $perner order by id desc limit 1";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_detail_uak($id)
	{
		$data			= array();

		$this->db3 = $this->load->database('db_third', TRUE);


		$query = "select a.id, a.perner, a.smasa, a.emasa, a.lzparameter, a.perkalian, a.status 
			from m_uak_perner a 
			where a.id = $id 
		";

		$Q		= $this->db3->query($query);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function simpan_data_uak($item)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$q = $this->db3->insert('m_uak_perner', $item);
		return $q;
	}

	public function edit_data_uak($id, $item)
	{
		$this->db3 = $this->load->database('db_third', TRUE);
		$update = array(
			'id' => $id
		);
		$this->db3->where($update);
		$q = $this->db3->update('m_uak_perner', $item);
		return $q;
	}
}
