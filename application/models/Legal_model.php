<?php
class Legal_model extends CI_Model
{

	function get_listlegal($length, $start, $search, $order, $dir, $periode, $nobak, $customer, $project, $jenis)
	{
		$where_clause = "";
		if ($periode != "") {
			$where_clause .= "and a.date_approved like '%$periode%' ";
		}
		if ($nobak != "") {
			$where_clause .= "and a.nobak like '%$nobak%' ";
		}
		if ($customer != "") {
			$where_clause .= "and a.customer like '%$customer%' ";
		}
		if ($project != "") {
			$where_clause .= "and a.project like '%$project%' ";
		}
		if ($jenis != "") {
			$where_clause .= "and e.id = '$jenis' ";
		}

		$order_by = "ORDER BY a.date_approved desc";
		if ($order != '0') {
			if ($order == '1') {
				$order_by = "ORDER BY a.date_approved $dir";
			} else if ($order == '2') {
				$order_by = "ORDER BY a.nobak $dir";
			} else if ($order == '3') {
				$order_by = "ORDER BY a.customer $dir";
			} else if ($order == '4') {
				$order_by = "ORDER BY a.project $dir";
			} else if ($order == '5') {
				$order_by = "ORDER BY b.nilai_project $dir";
			} else if ($order == '6') {
				$order_by = "ORDER BY e.divisi $dir";
			}
		}

		$sql = "SELECT a.nobak,a.customer,a.project,a.date_approved,a.approved_pm,b.start_project,b.end_project,b.type_new,b.nilai_project,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=f.nobak,f.id_rincian ,NULL))) AS idnojo,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=b.no_bak,d.persa_sap ,NULL))) AS persa_nojo,b.upd,b.type_jo,b.divisiid,e.divisi,
			c.nama AS jenis_captive,b.lama,b.komponen_bak,b.dokpks,(SELECT jenis_pks FROM m_docpks WHERE m_docpks.id=b.dokpks) AS nm_docpks FROM trans_pks_new a  ";
		$sql .= "LEFT JOIN (SELECT * FROM trans_jo WHERE pilpks='Y') b ON b.no_bak=a.nobak ";
		$sql .= "LEFT JOIN m_jenis_project c ON c.id=b.jenis_captive ";
		$sql .= "LEFT JOIN trans_rincian d ON d.nojo=b.nojo ";
		$sql .= "LEFT JOIN m_divisi e ON e.id=b.divisiid ";
		$sql .= "LEFT JOIN trans_nojopks f ON f.nobak=a.nobak ";
		$sql .= "WHERE a.status_pks = 0 $where_clause ";
		$sql .= "GROUP BY a.nobak $order_by ";
		//var_dump($sql);exit();
		$query		= $this->db->query($sql . " LIMIT $start, $length");
		$numrows	= $this->db->query($sql);
		$total		= $numrows->num_rows();

		return array(
			"data"		 => $query->result_array(),
			"total_data" => $total
		);
	}

	function get_listlegalverifikasi($length, $start, $search, $order, $dir, $periode, $nobak, $customer, $project, $jenis)
	{
		$where_clause = "";
		if ($periode != "") {
			$where_clause .= "and a.date_approved like '%$periode%' ";
		}
		if ($nobak != "") {
			$where_clause .= "and a.nobak like '%$nobak%' ";
		}
		if ($customer != "") {
			$where_clause .= "and a.customer like '%$customer%' ";
		}
		if ($project != "") {
			$where_clause .= "and a.project like '%$project%' ";
		}
		if ($jenis != "") {
			$where_clause .= "and e.id = '$jenis' ";
		}

		$order_by = "ORDER BY a.date_approved desc";
		if ($order != '0') {
			if ($order == '1') {
				$order_by = "ORDER BY a.date_approved $dir";
			} else if ($order == '2') {
				$order_by = "ORDER BY a.nobak $dir";
			} else if ($order == '3') {
				$order_by = "ORDER BY a.customer $dir";
			} else if ($order == '4') {
				$order_by = "ORDER BY a.project $dir";
			} else if ($order == '5') {
				$order_by = "ORDER BY b.nilai_project $dir";
			} else if ($order == '6') {
				$order_by = "ORDER BY e.divisi $dir";
			}
		}

		$sql = "SELECT a.nobak,a.customer,a.project,a.date_approved,a.approved_pm,b.start_project,b.end_project,b.type_new,b.nilai_project,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=f.nobak,f.id_rincian ,NULL))) AS idnojo,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=b.no_bak,d.persa_sap ,NULL))) AS persa_nojo,b.upd,b.type_jo,b.divisiid,e.divisi,
			c.nama AS jenis_captive,b.lama,b.komponen_bak,b.dokpks,(SELECT jenis_pks FROM m_docpks WHERE m_docpks.id=b.dokpks) AS nm_docpks FROM trans_pks_new a  ";
		$sql .= "LEFT JOIN (SELECT * FROM trans_jo WHERE pilpks='Y') b ON b.no_bak=a.nobak ";
		$sql .= "LEFT JOIN m_jenis_project c ON c.id=b.jenis_captive ";
		$sql .= "LEFT JOIN trans_rincian d ON d.nojo=b.nojo ";
		$sql .= "LEFT JOIN m_divisi e ON e.id=b.divisiid ";
		$sql .= "LEFT JOIN trans_nojopks f ON f.nobak=a.nobak ";
		$sql .= "WHERE a.status_pks = 15 $where_clause ";
		$sql .= "GROUP BY a.nobak $order_by ";
		//var_dump($sql);exit();
		$query		= $this->db->query($sql . " LIMIT $start, $length");
		$numrows	= $this->db->query($sql);
		$total		= $numrows->num_rows();

		return array(
			"data"		 => $query->result_array(),
			"total_data" => $total
		);
	}

	function get_listlegalExport($periode, $nobak, $customer, $project, $jenis)
	{
		$where_clause = "";
		if ($periode != "") {
			$where_clause .= "and a.date_approved like '%$periode%' ";
		}
		if ($nobak != "") {
			$where_clause .= "and a.nobak like '%$nobak%' ";
		}
		if ($customer != "") {
			$where_clause .= "and a.customer like '%$customer%' ";
		}
		if ($project != "") {
			$where_clause .= "and a.project like '%$project%' ";
		}
		if ($jenis != "") {
			$where_clause .= "and e.id like '%$jenis%' ";
		}

		$sql = "SELECT a.nobak,a.customer,a.project,a.date_approved,a.approved_pm,b.start_project,b.end_project,b.nilai_project,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=f.nobak,f.id_rincian ,NULL))) AS idnojo,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=b.no_bak,d.persa_sap ,NULL))) AS persa_nojo,b.upd,b.type_jo,b.divisiid,e.divisi,
			c.nama AS jenis_captive,b.lama,b.komponen_bak,b.dokpks,(SELECT jenis_pks FROM m_docpks WHERE m_docpks.id=b.dokpks) AS nm_docpks FROM trans_pks_new a  ";
		$sql .= "LEFT JOIN (SELECT * FROM trans_jo WHERE pilpks='Y') b ON b.no_bak=a.nobak ";
		$sql .= "LEFT JOIN m_jenis_project c ON c.id=b.jenis_captive ";
		$sql .= "LEFT JOIN trans_rincian d ON d.nojo=b.nojo ";
		$sql .= "LEFT JOIN m_divisi e ON e.id=b.divisiid ";
		$sql .= "LEFT JOIN trans_nojopks f ON f.nobak=a.nobak ";
		$sql .= "WHERE a.status_pks = 0 $where_clause ";
		$sql .= "GROUP BY a.nobak ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_listlegals($length, $start, $search, $order, $dir, $periode, $nobak, $customer, $project, $jenis)
	{
		$where_clause = "";
		if ($periode != "") {
			$where_clause .= "and c.lup_skema like '%$periode%' ";
		}
		if ($nobak != "") {
			$where_clause .= "and b.no_bak like '%$nobak%' ";
		}
		if ($customer != "") {
			$where_clause .= "and b.nama_cust like '%$customer%' ";
		}
		if ($project != "") {
			$where_clause .= "and IF(b.n_project='' || b.n_project='pilih',b.project,b.n_project) like '%$project%' ";
		}
		if ($jenis != "") {
			$where_clause .= "and d.nama like '%$jenis%' ";
		}

		// $order_by="ORDER BY c.lup_skema $dir";
		// if($order!='0'){
		// 	if($order=='1'){
		// 		$order_by="ORDER BY c.lup_skema $dir";
		// 	}else if($order=='2'){
		// 		$order_by="ORDER BY b.no_bak $dir";
		// 	}else if($order=='4'){
		// 		$order_by="ORDER BY b.nama_cust $dir";
		// 	}else if($order=='5'){
		// 		$order_by="ORDER BY IF(b.n_project='' || b.n_project='pilih',b.project,b.n_project) $dir";
		// 	}else if($order=='6'){
		// 		$order_by="ORDER BY b.tanggal $dir";
		// 	}else if($order=='7'){
		// 		$order_by="ORDER BY b.lama $dir";
		// 	}else if($order=='8'){
		// 		$order_by="ORDER BY d.nama $dir";
		// 	}
		// }

		$sql = "SELECT c.lup_skema,b.tanggal,b.start_project,b.end_project,b.nilai_project,b.no_bak,b.upd,GROUP_CONCAT(DISTINCT(IF(b.no_bak=b.no_bak AND type_jo=1,b.nojo ,NULL))) AS nojo,
				b.nama_cust,d.nama AS jenis_captive,IF(b.n_project='' || b.n_project='pilih',b.project,b.n_project) AS project,b.lama,b.komponen_bak
				FROM trans_rincian_rekrut a  ";
		$sql .= "LEFT JOIN trans_jo b ON a.nojo = b.nojo ";
		$sql .= "LEFT JOIN trans_rincian c ON a.nojo = c.nojo ";
		$sql .= "LEFT JOIN m_jenis_project d ON d.id=b.jenis_captive ";
		$sql .= "WHERE type_new IN (1,2) and b.flag_pks=0 $where_clause ";
		$sql .= "GROUP BY b.no_bak order by c.lup_skema desc ";
		//var_dump($sql);exit();
		$query		= $this->db->query($sql . " LIMIT $start, $length");
		$numrows	= $this->db->query($sql);
		$total		= $numrows->num_rows();

		return array(
			"data"		 => $query->result_array(),
			"total_data" => $total
		);
	}

	function get_listlegalExports($periode, $nobak, $customer, $project, $jenis)
	{
		$where_clause = "";
		if ($periode != "") {
			$where_clause .= "and c.lup_skema like '%$periode%' ";
		}
		if ($nobak != "") {
			$where_clause .= "and b.no_bak like '%$nobak%' ";
		}
		if ($customer != "") {
			$where_clause .= "and and b.nama_cust like '%$customer%' ";
		}
		if ($project != "") {
			$where_clause .= "and IF(b.n_project='' || b.n_project='pilih',b.project,b.n_project) like '%$project%' ";
		}
		if ($jenis != "") {
			$where_clause .= "and d.nama like '%$jenis%' ";
		}

		$sql = "SELECT c.lup_skema,b.tanggal,b.no_bak,b.upd,GROUP_CONCAT(DISTINCT(IF(b.no_bak=b.no_bak AND type_jo=1,b.nojo ,NULL))) AS nojo,
				b.nama_cust,d.nama AS jenis_captive,IF(b.n_project='' || b.n_project='pilih',b.project,b.n_project) AS project,b.lama,b.komponen_bak
				FROM trans_rincian_rekrut a  ";
		$sql .= "LEFT JOIN trans_jo b ON a.nojo = b.nojo ";
		$sql .= "LEFT JOIN trans_rincian c ON a.nojo = c.nojo ";
		$sql .= "LEFT JOIN m_jenis_project d ON d.id=b.jenis_captive ";
		$sql .= "WHERE type_new IN (1,2) and b.flag_pks=0 $where_clause ";
		$sql .= "GROUP BY b.no_bak $order_by ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function get_dashlegal($periode)
	{

		$sql = "
				SELECT  (
				        SELECT COUNT(*)
				        FROM trans_pks_new WHERE status_pks = 0
				        ) AS new,
				        (
				        SELECT COUNT(*)
				        FROM   trans_pks_new WHERE status_pks = 15
				        ) AS verifikasi,
				        (
				        SELECT COUNT(*)
				        FROM trans_pks_new WHERE status_pks = 19
				        ) AS retur,
				        (
				        SELECT COUNT(*) 
				        FROM  trans_pks_new WHERE status_pks IN(13,14)
				        ) AS sirkulir,
				        (
				        SELECT COUNT(*) 
				        FROM  trans_pks_new WHERE status_pks IN(1,6,7,9)
				        ) AS draft
				FROM DUAL  
			";
		// var_dump($sql);die;
		$data = $this->db->query($sql);
		return $data->result_array();
	}

	public function upd_statuslegal($no_bak, $data)
	{
		$this->db->where('nobak', $no_bak);
		$this->db->update('trans_pks_new', $data);
	}


	public function get_diagramlegal()
	{
		$sql = "SELECT 'Data masuk' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 0) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0)
			UNION ALL
			SELECT 'Verifikasi' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 15) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0)
			UNION ALL
			SELECT 'Return' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 19) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0)
			UNION ALL
			SELECT 'Draft Internal' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 1) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0)
			UNION ALL
			SELECT 'Review Internal' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 7) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0)
			UNION ALL
			SELECT 'Review Ekternal' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 6) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0)
			UNION ALL
			SELECT 'Review Internal by PM' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 9) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0)
			UNION ALL
			SELECT 'Sirkuler Internal' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 13) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0)
			UNION ALL
			SELECT 'Sirkuler Eksternal' AS nama,(SELECT COUNT(*) FROM trans_pks_new WHERE status_pks = 14) AS jml
			FROM trans_pks_new 
			GROUP BY (SELECT COUNT(1) FROM trans_pks_new WHERE status_pks = 0) ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function get_diagramlegalList($status)
	{
		$sql = " select a.nobak,a.nopks,a.customer,a.project
		from trans_pks_new a where  a.status_pks = $status
		 ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_monitor($length, $start, $search, $order, $dir, $start_date, $end_date, $fstatus, $nobak, $customer, $project, $nilai, $kategori, $status, $nopks)
	{
		// $tgl = "01-" . $periode;
		// $bln = date("Y-m", strtotime($tgl));
		// $tahun = date("Y");

		$where_clause = "";
		// if ($periode != "") {
		// 	$where_clause .= "and date_format(a.date_approved,'%Y-%m') = '$bln' ";
		// }
		if ($start_date != "" && $end_date != "") {
			$where_clause .= "and ( a.date_approved between  '$start_date 00:00:00' and '$end_date 23:59:59') ";
		}
		if ($nobak != "") {
			$where_clause .= "and a.nobak like '%$nobak%' ";
		}
		if ($nopks != "") {
			$where_clause .= "and a.nopks like '%$nopks%' ";
		}
		if ($customer != "") {
			$where_clause .= "and a.customer like '%$customer%' ";
		}
		if ($project != "") {
			$where_clause .= "and a.project like '%$project%' ";
		}
		if ($fstatus != "") {
			$where_clause .= "and a.status_pks = '$fstatus' ";
		}
		if ($status != "") {
			$where_clause .= "and a.status_pks = '$status' ";
		}
		if ($nilai != "") {
			$where_clause .= "and b.nilai_project like '%$nilai%' ";
		}
		if ($kategori != "") {
			$where_clause .= "and b.divisiid = '$kategori' ";
		}


		$order_by = "ORDER BY a.date_approved desc";
		if ($order != '0') {
			if ($order == '1') {
				$order_by = "ORDER BY a.nobak $dir";
			} else if ($order == '2') {
				$order_by = "ORDER BY a.customer $dir";
			} else if ($order == '3') {
				$order_by = "ORDER BY a.project $dir";
			} else if ($order == '4') {
				$order_by = "ORDER BY b.nilai_project $dir";
			} else if ($order == '5') {
				$order_by = "ORDER BY e.divisi $dir";
			} else if ($order == '6') {
				$order_by = "ORDER BY a.status_pks $dir";
			} else if ($order == '7') {
				$order_by = "ORDER BY a.nopks $dir";
			}
		}

		$sql = "SELECT a.nobak,a.nopks,a.customer,a.project,a.status_pks,a.date_approved,a.approved_pm,b.start_project,b.end_project,b.type_new,b.nilai_project,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=f.nobak,f.id_rincian ,NULL))) AS idnojo,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=b.no_bak,d.persa_sap ,NULL))) AS persa_nojo,b.upd,b.type_jo,b.divisiid,e.divisi,
			c.nama AS jenis_captive,b.lama,b.komponen_bak,b.dokpks,(SELECT jenis_pks FROM m_docpks WHERE m_docpks.id=b.dokpks) AS nm_docpks FROM trans_pks_new a  ";
		$sql .= "LEFT JOIN (SELECT * FROM trans_jo WHERE pilpks='Y') b ON b.no_bak=a.nobak ";
		$sql .= "LEFT JOIN m_jenis_project c ON c.id=b.jenis_captive ";
		$sql .= "LEFT JOIN trans_rincian d ON d.nojo=b.nojo ";
		$sql .= "LEFT JOIN m_divisi e ON e.id=b.divisiid ";
		$sql .= "LEFT JOIN trans_nojopks f ON f.nobak=a.nobak ";
		$sql .= "WHERE a.nobak <> '' $where_clause ";
		$sql .= "GROUP BY a.nobak $order_by ";

		$query		= $this->db->query($sql . " LIMIT $start, $length");
		$numrows	= $this->db->query($sql);
		$total		= $numrows->num_rows();

		return array(
			"data"		 => $query->result_array(),
			"total_data" => $total
		);
	}

	function get_monitordownload($start_date, $end_date, $fstatus)
	{
		$where_clause = "";
		if ($start_date != "" && $end_date != "") {
			$where_clause .= "and ( a.date_approved between  '$start_date 00:00:00' and '$end_date 23:59:59') ";
		}
		if ($fstatus != "") {
			$where_clause .= "and a.status_pks = '$fstatus' ";
		}

		$sql = "SELECT a.nobak,a.nopks,a.customer,a.project,a.status_pks,a.date_approved,a.approved_pm,b.start_project,b.end_project,b.type_new,b.nilai_project,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=f.nobak,f.id_rincian ,NULL))) AS idnojo,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=b.no_bak,d.persa_sap ,NULL))) AS persa_nojo,b.upd,b.type_jo,b.divisiid,e.divisi,
			c.nama AS jenis_captive,b.lama,b.komponen_bak,b.dokpks,(SELECT jenis_pks FROM m_docpks WHERE m_docpks.id=b.dokpks) AS nm_docpks FROM trans_pks_new a  ";
		$sql .= "LEFT JOIN (SELECT * FROM trans_jo WHERE pilpks='Y') b ON b.no_bak=a.nobak ";
		$sql .= "LEFT JOIN m_jenis_project c ON c.id=b.jenis_captive ";
		$sql .= "LEFT JOIN trans_rincian d ON d.nojo=b.nojo ";
		$sql .= "LEFT JOIN m_divisi e ON e.id=b.divisiid ";
		$sql .= "LEFT JOIN trans_nojopks f ON f.nobak=a.nobak ";
		$sql .= "WHERE a.nobak <> '' $where_clause ";
		$sql .= "GROUP BY a.nobak ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_monitorDetail($bak)
	{
		$sql = "SELECT a.nobak,a.nopks,a.customer,a.project,a.status_pks,a.draft,a.sirkulir_e,a.sirkulir_i,a.doc_pks,a.date_approved,a.approved_pm,a.lup,b.start_project,b.end_project,b.type_new,b.nilai_project,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=f.nobak,f.id_rincian ,NULL))) AS idnojo,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=b.no_bak,d.persa_sap ,NULL))) AS persa_nojo,b.upd,b.type_jo,b.divisiid,e.divisi,
			c.nama AS jenis_captive,b.lama,b.komponen_bak,b.dokpks,(SELECT jenis_pks FROM m_docpks WHERE m_docpks.id=b.dokpks) AS nm_docpks, (select nama from m_login where m_login.username=a.approved_pm) as nm_pm,(SELECT nama FROM m_login WHERE m_login.username=f.userpm) AS pm 
			FROM trans_pks_new a  ";
		$sql .= "LEFT JOIN (SELECT * FROM trans_jo WHERE pilpks='Y') b ON b.no_bak=a.nobak ";
		$sql .= "LEFT JOIN m_jenis_project c ON c.id=b.jenis_captive ";
		$sql .= "LEFT JOIN trans_rincian d ON d.nojo=b.nojo ";
		$sql .= "LEFT JOIN m_divisi e ON e.id=b.divisiid ";
		$sql .= "LEFT JOIN trans_nojopks f ON f.nobak=a.nobak ";
		$sql .= "WHERE a.nobak ='$bak' ";
		$sql .= "GROUP BY a.nobak ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_monitorExports($periode, $status, $nobak, $nopks, $customer, $project, $statusa)
	{
		$tgl = "01-" . $periode;
		$bln = date("Y-m", strtotime($tgl));
		$where_clause = "";
		if ($periode != "") {
			$where_clause .= "and date_format(a.date_approved,'%Y-%m') = '$bln' ";
		}
		if ($nobak != "") {
			$where_clause .= "and a.nobak like '%$nobak%' ";
		}
		if ($nopks != "") {
			$where_clause .= "and a.nopks like '%$nopks%' ";
		}
		if ($customer != "") {
			$where_clause .= "and a.customer like '%$customer%' ";
		}
		if ($project != "") {
			$where_clause .= "and a.project like '%$project%' ";
		}
		if ($status != "") {
			$where_clause .= "and a.status_pks = '$status' ";
		}
		if ($statusa != "") {
			$where_clause .= "and a.status_pks = '$statusa' ";
		}

		$sql = "SELECT a.nobak,a.nopks,a.customer,a.project,a.status_pks,a.date_approved,a.approved_pm,b.start_project,b.end_project,b.type_new,b.nilai_project,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=f.nobak,f.id_rincian ,NULL))) AS idnojo,
			GROUP_CONCAT(DISTINCT(IF(a.nobak=b.no_bak,d.persa_sap ,NULL))) AS persa_nojo,b.upd,b.type_jo,b.divisiid,e.divisi,
			c.nama AS jenis_captive,b.lama,b.komponen_bak,b.dokpks,(SELECT jenis_pks FROM m_docpks WHERE m_docpks.id=b.dokpks) AS nm_docpks FROM trans_pks_new a  ";
		$sql .= "LEFT JOIN (SELECT * FROM trans_jo WHERE pilpks='Y') b ON b.no_bak=a.nobak ";
		$sql .= "LEFT JOIN m_jenis_project c ON c.id=b.jenis_captive ";
		$sql .= "LEFT JOIN trans_rincian d ON d.nojo=b.nojo ";
		$sql .= "LEFT JOIN m_divisi e ON e.id=b.divisiid ";
		$sql .= "LEFT JOIN trans_nojopks f ON f.nobak=a.nobak ";
		$sql .= "WHERE a.nobak <> '' $where_clause ";
		$sql .= "GROUP BY a.nobak ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	//BARU 2023
	function get_request_pks($cari, $status)
	{
		$where_clause = "";
		if ($cari != "") {
			$where_clause .= "and a.nobak like '%$cari%' || a.project like '%$cari%' || a.customer like '%$cari%' ";
		}

		if($status != ""){
			$where_clause .= "and a.status_pks = '".$status."' ";
		}
		
		$sql = "select a.id, a.nobak, a.file_bak, a.customer, a.project, a.project_type, a.project_divisi, a.project_start, a.project_end, a.project_long, a.project_nilai, a.project_approved_at, a.project_approved_by, a.project_created, a.status_pks, b.divisi
		 from legal_pks a  ";
		$sql .= "left join m_divisi b on b.id=a.project_divisi ";
		$sql .= "where a.status_pks not in (1,2,3,4,5,7) $where_clause ";
		$sql .= "group by a.nobak order by a.id desc ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	function get_detail_pks($id)
	{		
		$sql = "select a.id, a.nobak, a.file_bak, a.customer, a.project, a.project_type, a.project_divisi, a.project_start, a.project_end, a.project_long, a.project_nilai, a.project_approved_at, a.project_approved_by, a.project_created, a.status_pks, b.divisi
		 from legal_pks a  ";
		$sql .= "left join m_divisi b on b.id=a.project_divisi ";
		$sql .= "where a.id = $id ";
		$sql .= "group by a.nobak ";

		$Q		= $this->db->query($sql);
		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function update_pks($id, $item)
    {
        $update = array(
            'id' => $id
        );
        
        $this->db->where($update);
        $q = $this->db->update('legal_pks', $item);
        return $q;
    }

    function count_data_pks()
    {
        $session_data   = $this->session->userdata('logged_in');
        $username       = $session_data['username'];

        $sql = "
                SELECT  (
					SELECT COUNT(*)	FROM legal_pks
					) AS jml,
                	(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 0
					) AS dikirim,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 6
					) AS dikembalikan,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 7
					) AS berhenti,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 9
					) AS return_draft,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 1
					) AS draft_internal,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 2
					) AS review_internal,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 3
					) AS review_eksternal,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 4
					) AS sirkuler_internal,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 5
					) AS sirkuler_eksternal,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks = 9
					) AS return_draft,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks IN(1,2,3,4,5)
					) AS progres,
					(
					SELECT COUNT(*)	FROM legal_pks WHERE status_pks IN(1,2,3)
					) AS draft
				FROM DUAL
            ";

        // var_dump($sql);die;
        $data = $this->db->query($sql);
        return $data->result_array();
    }

}
