<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>


<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<!--<link href="<?php echo base_url()?>adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>adminlte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />-->



<script type="text/javascript">
	$(function () {
	$(".select2").select2({
		containerCssClass : "form-control"
	});
	$.fn.modal.Constructor.prototype.enforceFocus = $.noop;

	$("#btnsearch").click(function(){	
		var dataString = $("#formsrc").serializeArray();
		//alert(dataString);
		$("#listorder").DataTable().destroy();		
		var mTable =
		$("#listorder").DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			bFilter: true,
			bLengthChange: false, 
			scrollX: true,
			ordering: true,
			bSort : true,
			ajax: {
			  url 		: "<?php echo base_url().'index.php/mapping/data_listorder3dup';?>",
			  type 		:'POST',
			  dataType	: "json",
			  data		: dataString
			}, 
			createdRow: function(row, data, index) {
				$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
			},
			columnDefs: [
	        { 
	            //"targets": [ 0,14,15,16,17,18,19  ], //first column / numbering column
				"targets": [ 0,16,17,18,19,20,21  ],
	            "bVisible": false, //set not orderable
	        },
	        ],
		});
		$('.dataTables_filter').addClass('pull-right'); 
		$('.dataTables_paginate').addClass('pull-right');

	});
	//$(document).ready(function(){
		/*
		dataString = $("#formid").serializeArray();
		var vTable =
		$("#listpolar").DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			ordering: true,
			bSort : true,
			ajax: {
			  url 		: "<?php echo base_url().'index.php/home/ajax_list';?>",
			  type 		:'POST',
			  dataType	: "json",
			  data		: dataString
			}
		});
		$('.dataTables_filter').addClass('pull-right'); 
		$('.dataTables_paginate').addClass('pull-right');
		*/
		
		$("#tar1").show();
		$("#tar2").hide();
		$('#overlayxy').hide();
		$('#zoverlay').hide();
		$("#tar3").slideUp("slow");
		$('#divkomponen').hide();
		$('#divkomponen1').hide();
		$('#divkomponen2').hide();
		$('#duedate').datepicker({format: 'yyyy-mm-dd', startDate : '0', autoclose : true});
		$('#duedate1').datepicker({format: 'yyyy-mm-dd', startDate : '0', autoclose : true});
		$('#tcr1').datepicker({format: 'yyyy-mm-dd', autoclose:true});
		$('#tcr2').datepicker({format: 'yyyy-mm-dd', autoclose:true});
		var moveLeft = -550;
		var moveDown = -200;
		
		
		//$("#tar2").slideUp("slow");
		
		var option = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": false,
			"scrollX": true,
			"bJQueryUI": false
		};
		
		var optionx = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			//"bAutoWidth": false,
			//"scrollX": true,
			"bJQueryUI": false 
		};
		
		//xTable = $('#listorder').dataTable(option);
		vTable = $('#listpolar').dataTable(option);
		mTable = $('#listpolarxy').dataTable(option);
		yTable = $('#listrincian').dataTable(option);
		kTable = $('#listrincianx').dataTable(option);
		dTable = $('#listrincianxy').dataTable(option);
		uTable = $('#listhr').dataTable(option);
		wTable = $('#listdokumen').dataTable(optionx);
		sTable = $('#listperner').dataTable(optionx);
		xTable = $('#listrincianw').dataTable(optionx);
		qTable = $('#listkomp').dataTable(optionx);
		pTable = $('#listproc').dataTable(optionx);
		rTable = $('#listrincianr').dataTable(optionx);
		iTable = $('#listkompr').dataTable(option);
		tTable = $('#listprocr').dataTable(optionx);
		goTable = $('#listdetail').dataTable(optionx);
		gojTable = $('#listgojobs').dataTable(optionx);
		go1Table = $('#listdetail').dataTable(optionx);
		gorTable = $('#listgojobs').dataTable(optionx);
		
		
		$(".btndetailx").click(function(){
			$('#listpolar').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".noj").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/xtrajox";
			$.post(url, {data : vnojo}, function(res){
				kTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincianx tbody').html(res);
				$('#listrincianx').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			})
		});
		
		
		$(".vbtndetailx").click(function(){
			$('#listpolarxy').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".noj").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/xtrajox";
			$.post(url, {data : vnojo}, function(res){
				bTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincianxy tbody').html(res);
				$('#listrincianxy').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			})
		});
		
		
		$('#btncancel').click(function(){
			$('#ZmyModal').hide();
			$("#VmyModal").show();
			$("#VmyModal").modal("show");
		});
		
		$('#dpn_cancel').click(function(){
			$('#ZmyModal').hide();
			$("#VmyModal").hide();
			$("#VmyModal").modal("hide");
			$("#ZmyModal").modal("hide");
		});
		
		
		$("#btn_excel").click(function(){
			var pbc		= document.getElementById('allar').checked;
			if (pbc == false)
			{
				var pjp		= "0";
			}
			else
			{
				var pjp		= '1';
			}
			
			var tglfrom  = $('#tglfrom').val();
			var tglto    = $('#tglto').val();
			var vtreg 	 = $('#vtreg').val();
			var vwitel	 = $('#vwitel').val();
			var vplasa	 = $('#vplasa').val();
			var lvx	 	 = $('#lvx').val();
			
			url = "<?php echo base_url(); ?>index.php/home/listorder_excel/"+pjp;
			window.open(url,'_blank');
			
		});


		$("#btn_excelrek").click(function(){
			// alert('Under Maintenance');
			// return false;
			var tcr1 	= $('#tcr1').val(); 
			var tcr2 	= $('#tcr2').val(); 
			var carpm 	= ''; 
			var cardone = ''; 
			var carnoj  = ''; 
			var carpro  = ''; 
			var carlok  = ''; 
			var carcreat= ''; 
			var carnobak= ''; 
			if(tcr1=='' || tcr2==''){
				alert("Range tanggal create harus di isi");return false;
			}
			// alert(carpm);
			url = "<?php echo base_url(); ?>index.php/home/report_excel/?cartgl1="+tcr1+"&cartgl2="+tcr2+"&caripm="+carpm+"&caridn="+cardone+"&carinbak="+carnobak+"&caripr="+carpro+"&carilk="+carlok+"&caricr="+carcreat+"&carinj="+carnoj;
			window.open(url,'_blank');
		});	

		
		$("#donlot_dok").click(function(){
			// alert('Under Maintenance');
			var tcr1	= $('#tcr1').val(); 
			var tcr2	= $('#tcr2').val(); 
			
			url = "<?php echo base_url(); ?>index.php/mapping/donlot_dokperal/?tcr1="+tcr1+"&tcr2="+tcr2;
			window.open(url,'_blank');
		});			
		
		
		$("#rbtn_simpan").click(function(){
			$('#zoverlay').show();
			var vnojo 	= $('#rnojo').val(); 
			var namaz 	= $('#rupd').val(); 
			var tjok 	= $('#rntype').val(); 
			var nid 	= $('#rid').val(); 
			var rket 	= $('#rket').val(); 
			/*
			var lperner=[];
			$('#listperner tbody tr').each(function(){
				var xperner 	= $(this).find(".perner").html();
				var xnama 		= $(this).find(".nama").html();
				lperner += [xperner, xnama];
				lperner += ',';
			});
				
			if(lperner==''){
				var lpernerz = '';
			}
			else {
				var lkomponenz=[];
				$('#listperner tbody tr').each(function(){
					var xperner 	= $(this).find(".txkdlevel").html();
					var xnama 		= $(this).find(".txump").html();
					lperner += [xperner, xnama];
					lpernerz += ',';
				});
			}
			*/
			var url	= "<?php echo base_url();?>index.php/home/m_simpantjo_ra";
			arrappjo = [vnojo, nid, rket, tjok, namaz];
			$.post(url, {arrappjo : arrappjo}, function(res){
				$('#zoverlay').hide();
				//alert(res);
				alert('Data Approved');
				location.reload();
			})
		});
		
		
		$("#rbtn_reject").click(function(){
			$('#overlay').show();
			var ket_status 		= $('#rket').val();			
			
			if(ket_status == ""){
				$('#overlay').hide();
				alert("Keterangan Status Reject Tidak Boleh Kosong !!");
				return false;
			}
			
			var vnojo 	= $('#rnojo').val(); 
			var namaz 	= $('#rupd').val(); 
			var tjok 	= $('#rntype').val(); 
			var nid 	= $('#rid').val(); 
			var rket 	= $('#rket').val(); 
			var url	= "<?php echo base_url();?>index.php/home/m_rejectjo_rr";
			arrappjo = [vnojo, nid, rket, tjok, namaz];
			$.post(url, {arrappjo : arrappjo}, function(res){
				$('#overlay').hide();
				//alert(res);
				alert('Data Rejected');
				location.reload();
			})
		})
		
		
		$("#nbtn_simpan").click(function(){
			$('#overlay').show();
			var vnojo 	= $('#nnojo').val(); 
			var namaz 	= $('#nupd').val(); 
			var tjok 	= $('#nntype').val(); 
			var nid 	= $('#nid').val(); 
			var nket 	= $('#nket').val(); 
			var url	= "<?php echo base_url();?>index.php/home/m_simpantjo";
			arrappjo = [vnojo, nid, nket, tjok, namaz];
			$.post(url, {arrappjo : arrappjo}, function(res){
				$('#overlay').hide();
				alert('Data Approved');
				//alert(res);
				location.reload();
			})
		});	
		
		
		$("#nbtn_reject").click(function(){
			$('#overlay').show();
			var ket_status 		= $('#nket').val();			
			
			if(ket_status == ""){
				$('#overlay').hide();
				alert("Keterangan Status Reject Tidak Boleh Kosong !!");
				return false;
			}
			
			var vnojo 	= $('#nnojo').val(); 
			var namaz 	= $('#nupd').val(); 
			var tjok 	= $('#nntype').val(); 
			var nid 	= $('#nid').val(); 
			var nket 	= $('#nket').val(); 
			var url	= "<?php echo base_url();?>index.php/home/m_rejectjo";
			arrappjo = [vnojo, nid, nket, tjok, namaz];
			$.post(url, {arrappjo : arrappjo}, function(res){
				$('#overlay').hide();
				alert('Data Rejected');
				//alert(res);
				location.reload();
			})
		})
		
		
		$("#didik").change(function(){
			$('#overlayx').show();
			$('#xoverlay').show();
			document.getElementById("didik").disabled = true; 
			document.getElementById("gender").disabled = true; 
			document.getElementById("lokas").disabled = true; 
			var abc = document.getElementById("didik").checked;
			var def = document.getElementById("gender").checked;
			var ghi = document.getElementById("lokas").checked;

			if(abc==true)
			{
				var jkl = 1;
			}
			else
			{
				var jkl = 0;
			}
			
			if(def==true)
			{
				var mno = 1;
			}
			else
			{
				var mno = 0;
			}
			
			if(ghi==true)
			{
				var pqr = 1;
			}
			else
			{
				var pqr = 0;
			}
		  
		  
			var type_emp	= $("#type_emp").val();
			var tyjo		= $("#tyjo").val();
			var id_emp 		= $("#id_emp").val();
			 
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/detail_hr_nodidik/');?>",
				//dataType	: "json",
				data		: {aid:id_emp, atype:type_emp, adidik:jkl, agender:mno , alokasi:pqr, tyjox:tyjo},
				success	: function(res){
					uTable.fnDestroy(); 
					$('#overlayx').hide();
					$('#xoverlay').hide();
					document.getElementById("didik").disabled = false; 
					document.getElementById("gender").disabled = false; 
					document.getElementById("lokas").disabled = false; 
					$('#listhr tbody').html(res);
					$('#listhr').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});		
				}
			})
		});
		
		
		
		$("#gender").change(function(){
			$('#overlayx').show();
			$('#xoverlay').show();
			document.getElementById("didik").disabled = true; 
			document.getElementById("gender").disabled = true; 
			document.getElementById("lokas").disabled = true; 
			var abc = document.getElementById("didik").checked;
			var def = document.getElementById("gender").checked;
			var ghi = document.getElementById("lokas").checked;

			if(abc==true)
			{
				var jkl = 1;
			}
			else
			{
				var jkl = 0;
			}
			
			if(def==true)
			{
				var mno = 1;
			}
			else
			{
				var mno = 0;
			}
			
			if(ghi==true)
			{
				var pqr = 1;
			}
			else
			{
				var pqr = 0;
			}
		  
		  
			var type_emp	= $("#type_emp").val();
			var tyjo		= $("#tyjo").val();
			var id_emp 		= $("#id_emp").val();
			 
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/detail_hr_nodidik/');?>",
				//dataType	: "json",
				data		: {aid:id_emp, atype:type_emp, adidik:jkl, agender:mno , alokasi:pqr, tyjox:tyjo},
				success	: function(res){
					uTable.fnDestroy(); 
					$('#overlayx').hide();
					$('#xoverlay').hide();
					document.getElementById("didik").disabled = false; 
					document.getElementById("gender").disabled = false; 
					document.getElementById("lokas").disabled = false; 
					$('#listhr tbody').html(res);
					$('#listhr').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});		
				}
			})
		});
		
		
		
		$("#lokas").change(function(){
			$('#overlayx').show();
			$('#xoverlay').show();
			document.getElementById("didik").disabled = true; 
			document.getElementById("gender").disabled = true; 
			document.getElementById("lokas").disabled = true; 
			var abc = document.getElementById("didik").checked;
			var def = document.getElementById("gender").checked;
			var ghi = document.getElementById("lokas").checked;

			if(abc==true)
			{
				var jkl = 1;
			}
			else
			{
				var jkl = 0;
			}
			
			if(def==true)
			{
				var mno = 1;
			}
			else
			{
				var mno = 0;
			}
			
			if(ghi==true)
			{
				var pqr = 1;
			}
			else
			{
				var pqr = 0;
			}
		  
		  
			var type_emp	= $("#type_emp").val();
			var tyjo		= $("#tyjo").val();
			var id_emp 		= $("#id_emp").val();
			 
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/detail_hr_nodidik/');?>",
				//dataType	: "json",
				data		: {aid:id_emp, atype:type_emp, adidik:jkl, agender:mno , alokasi:pqr, tyjox:tyjo},
				success	: function(res){
					uTable.fnDestroy(); 
					$('#overlayx').hide();
					$('#xoverlay').hide();
					document.getElementById("didik").disabled = false; 
					document.getElementById("gender").disabled = false; 
					document.getElementById("lokas").disabled = false; 
					$('#listhr tbody').html(res);
					$('#listhr').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});		
				}
			})
		});
		 
		
		
		$('#btn_simpan_emp').click(function(){
				var type_emp	= $("#type_emp").val();
				var id_emp 		= $("#id_emp").val();
				var tyjo 		= $("#tyjo").val();
				var jml_kebut	= $("#jml_kebut").val();
				var wew 		= $('[name="centang[]"]:checked').length;
				
				if(type_emp=='rekrut')
				{
					if(wew > jml_kebut)
					{
						alert ('Jumlah Pemenuhan sudah melebihi jumlah kebutuhan');
						return false;
					}
					
					if (confirm('Anda yakin ingin melakukan kontrak..?')) {
						var vcentang = new Array();
						var oTable = $('#listhr').dataTable();
						var rowcollection =  oTable.$(".active:checked", {"page": "all"});
						rowcollection.each(function(i){
							vcentang[i] = $(this).val();
						});
						var vcentang 	= vcentang.join(',');
						//alert(vcentang);
						
						var larr = [id_emp, type_emp, tyjo, vcentang];
						
						var url 	= "<?php echo base_url(); ?>" + "index.php/home/save_emp";
						$.post(url, {datatap:larr}, function(response){
							//if (response){
								alert("Data tersimpan");
								//alert(response);
								window.location = "<?php echo base_url(); ?>" + "index.php/home/listorder";
							//};
						});		
					}
					else
					{
						return false;
					}
				}
				else 
				{
					var vcentang = new Array();
					var oTable = $('#listhr').dataTable();
					var rowcollection =  oTable.$(".active:checked", {"page": "all"});
					rowcollection.each(function(i){
						vcentang[i] = $(this).val();
					});
					var vcentang 	= vcentang.join(',');
					//alert(vcentang);
					
					var larr = [id_emp, type_emp, tyjo, vcentang];
					
					var url 	= "<?php echo base_url(); ?>" + "index.php/home/save_emp";
					$.post(url, {datatap:larr}, function(response){
						//if (response){
							alert("Data tersimpan");
							//alert(response);
							window.location = "<?php echo base_url(); ?>" + "index.php/home/listorder";
						//};
					});	
				}
						
		});	
		
		 
		
		$("#typeapp").change(function(){
			  var ish 			= $('#typeapp').val();
			  if (ish == 'VARIABEL'){
				$('#overlayxy').show();  
				$("#tar1").hide(); 
				$("#tar2").hide();
				$("#tar3").show();  
				
				var url = "<?php echo base_url(); ?>" + "index.php/home/vxlistjox/";
				var dataarr = '';
				$.post(url, {dataarr:dataarr}, function(response){
					mTable.fnDestroy(); 
					$('#overlayxy').hide();
					$('#listpolarxy tbody').html(response);
					$('#listpolarxy').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
				})
				  
			  } else if (ish == 'SKEMA'){
				$('#overlayyx').show(); 
			  	// $("#tar1").slideUp("slow");
				// $("#tar2").slideDown("down");
				$("#tar1").hide();
				$("#tar2").show();
				$("#tar3").hide();
				
				//dataString = $("#formid").serializeArray();
				//var dataarr = $postparam['search']["value"];
				var url = "<?php echo base_url(); ?>" + "index.php/home/xlistjox/";
				var dataarr = $('#xsearch').val();
				$.post(url, {dataarr:dataarr}, function(response){
					//alert(response);
					vTable.fnDestroy(); 
					$('#overlayyx').hide(); 
					$('#overlay').hide();
					$('#listpolar tbody').html(response);
					$('#listpolar').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
				})
				
			  }
			  else
			   if (ish == 'N/R'){
			  	// $("#tar1").slideDown("slow");
				// $("#tar2").slideUp("slow");
				$("#tar1").show();
				$("#tar2").hide();
				$("#tar3").hide();
			  }
		});
		
		
		
		$("#btn_simpan").click(function(){
			var jumlah = $("#jumlah").val();
			var rekrut = eval($("#rekrut").val());
			
			var rekruting = eval($("#rekruting").val());
			var total = rekrut + rekruting ;
			if (total > jumlah)
			{
				alert ('Jumlah rekrut sudah melebihi kebutuhan');
				return false;
			}
			
			if (rekrut > jumlah)
			{
				alert ('Jumlah rekrut sudah melebihi kebutuhan');
				return false;
			}
			
			dataString = $("#fsimpan").serialize();
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url();?>index.php/home/editjo",
				dataType	: "json",
				data		: dataString,
				success	: function(res){
					   alert('Data Berhasil Disimpan');
					   $('#EModal').modal('hide');
					   location.reload();
				}
			})
		})
		
		
		
		$('.jumlah').hover(function(e) {
		  $('#XmyModal').show();
		  //$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var xid = $row.find(".id").text();
			var url	= "<?php echo base_url();?>index.php/home/trojan";
			$.post(url, {data : xid}, function(res){
				yTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincian tbody').html(res);
				$('#listrincian').dataTable({"bFilter": false, "bSort": false, "bInfo": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": false, "scrollX": false});	
			})
		  //.css('top', e.pageY + moveDown)
		  //.css('left', e.pageX + moveLeft)
		  //.appendTo('body');
		}, function() {
		  $('#XmyModal').hide();
		});
		
		$('.jumlah').mousemove(function(e) {
		  $("#XmyModal").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
		});
			
		
		
		$(".btnholderz").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#yrcancel").val($row.find(".ketcan").text());
		});
		
		
		$("#btn_search").click(function(){
			$('#overlay1').show();
			var ar3 	 = $('#ar3').val();
			var p3r 	 = $('#p3r').val();
			larr 		 = [ar3, p3r];
			var url = "<?php echo base_url(); ?>index.php/home/search_sk_sk_list/";
			$.post(url, {larr:larr}, function(response){
				vTable.fnDestroy();
				$('#overlay1').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			});
		});
		
		
		function load_search(){
			$('#overlay1').show();
			/*
			var ar3 	 = $('#ar3').val();
			var p3r 	 = $('#p3r').val();
			larr 		 = [ar3, p3r];
			var url = "<?php echo base_url(); ?>index.php/home/search_sk_sk_list_new/";
			$.post(url, {larr:larr}, function(response){
				//alert(response);
				vTable.fnDestroy();
				$('#overlay1').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			});
			*/
			var url = "<?php echo base_url(); ?>" + "index.php/home/xlistjox/";
			var dataarr = $('#xsearch').val();
			$.post(url, {dataarr:dataarr}, function(response){
				//alert(response);
				vTable.fnDestroy(); 
				$('#overlay').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		
		
		/*
		$(".btnapz").click(function(){
			$('#listorder').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			
			if (btn == "Waiting Approval MANAR"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval MANAR </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved MANAR"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove MANAR </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Rejected MANAR"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_2" name="ket_2"/></textarea>');
				
				$('#listorder').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var krej2 = $row.find(".krej").text();
				
				$("#ket_2").val(krej2);
				
				$("#approvalbtn").html("");
			} else if (btn == "Approve"){
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><br><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline btnsimpan" data-dismiss="modal" id="btnsimpan">Approve</button>'
				$("#approvalbtn").html(appbtn);
				
				$("#btnsimpan").click(function(){
					$('#overlay').show();
					var vnojo 	= $row.find(".nojo").text();
					var namaz 	= $row.find(".namz").text();
					var tjok 	= $row.find(".tjo").text();
					var nid 	= $row.find(".id").text();
					var ket 	= $('#ket').val(); 
					var url	= "<?php echo base_url();?>index.php/home/m_simpantjo";
					arrappjo = [vnojo, nid, ket, tjok, namaz];
					$.post(url, {arrappjo : arrappjo}, function(res){
						$('#overlay').hide();
						//alert('Data Berhasil Di Approve');
						alert(res);
						location.reload();
					})
				})	
							
				$("#btnreject").click(function(){
					$('#overlay').show();
					var ket_status 		= $('#ket').val();			
					
					if(ket_status == ""){
						$('#overlay').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}
					
					var vnojo 	= $row.find(".nojo").text();
					var namaz 	= $row.find(".namz").text();
					var tjok 	= $row.find(".tjo").text();
					var nid 	= $row.find(".id").text();
					var ket 	= $('#ket').val(); 
					var url	= "<?php echo base_url();?>index.php/home/m_rejectjo";
					arrappjo = [vnojo, nid, ket, tjok, namaz];
					$.post(url, {arrappjo : arrappjo}, function(res){
						$('#overlay').hide();
						alert(res);
						location.reload();
					})
				})
			} 
		});
		*/
		
		

		
		
		
		$("#btn_download").click(function(){
			window.location = $("#btn_download").val();			
		});
		
		$("#btn_download1").click(function(){
			window.location = $("#btn_download1").val();			
		});
		
		$("#btn_download2").click(function(){
			window.location = $("#btn_download2").val();			
		});
		
		$("#btndonlot").click(function(){
			window.location = $("#btndonlot").val();			
		});
		
		
		$("#btn_simpant").click(function(){
				var angka 		 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('ssalary').value))));
				var ssalary		 = angka ;
					
				var angka1 		 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('esalary').value))));
				var esalary		 = angka1 ;
				
				var sid 		= $('#sid').val();	
				var exper 		= $('#exper').val();	
				var level 		= $('#level').val();
				var job_skills 	= $('#job_skills').val();
				var job_benefits= $('#job_benefits').val();
				var duedate 	= $('#duedate').val();	
				var duedate1 	= $('#duedate1').val();				
				
				if( (ssalary == "") && (esalary == "") && (exper == "") && (level == "") && (job_skills == "") && (job_benefits == "") && (duedate == "") && (duedate1 == "") ) {
					alert("Silahkan input data berikut terlebih dahulu !!");
					return false;
				}
				else if((ssalary == "") || (esalary == "")){
					alert("Range Salary Tidak Boleh Kosong !!");
					return false;
				}
				else if(level == "") {
					alert("Level Tidak Boleh Kosong !!");
					return false;
				}
				else if(exper == "") {
					alert("Experience Tidak Boleh Kosong !!");
					return false;
				}
				else if(job_skills == "") {
					alert("Skills Tidak Boleh Kosong !!");
					return false;
				}
				
				else if( (duedate == "") || (duedate1 == "") ) {
					alert("Range Tanggal Posting Tidak Boleh Kosong !!");
					return false;
				}
				
				if(esalary < ssalary)
				{
					alert("Max Salary harus lebih besar dari Min Salary !!");
					return false;
				}
				
				//alert(sid);
				
				var url	= "<?php echo base_url();?>index.php/home/simpan_jobs";
				arrappjox = [sid, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
				$.post(url, {arrappjox : arrappjox}, function(res){
					alert('Success Publish In GoJobs');
					location.reload();
				})
		});
		
		
		
		$("#btn_skip").click(function(){
				var sid 		= $('#sid').val();	
							
				var url	= "<?php echo base_url();?>index.php/home/skip_simpan_jobs";
				arrappjox = [sid];
				$.post(url, {arrappjox : arrappjox}, function(res){
					alert('Terimakasih');
					location.reload();
				})
		});
		
		
		
		$("#btn_picsimpan").click(function(){
				var pichi 		= $('#pichi').val();	
				var n_pichi 	= $('#pichi :selected').text();
				var picid 		= $('#picid').val();	
							
				var url	= "<?php echo base_url();?>index.php/home/simpan_pichi";
				pichix = [pichi, n_pichi, picid];
				$.post(url, {pichix : pichix}, function(res){
					alert('Terimakasih');
					//alert(res);
					location.reload();
				})
		});
		
		
		
		
		
		
		
		
		$("#btn_kirim").click(function(){
			
			dataString = $("#ksimpan").serialize();
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url();?>index.php/home/simpan_komentar",
				dataType	: "json",
				data		: dataString,
				success	: function(res){
					
                               alert('Komentar Berhasil Disimpan');
							   $('#KModal').modal('hide');
							   xTable.fnDestroy();
							   $('#overlay').hide();
								//$('#listorder tbody').html(res);
								$('#listorder').dataTable(option);
								location.reload();
							
				}
			})
			
		})
		
		
		
		$("#btn_simpan_cancel").click(function(){
			
			dataString = $("#csimpan").serialize();
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url();?>index.php/home/simpan_cancel",
				dataType	: "json",
				data		: dataString,
				success	: function(res){
					
                               alert('Keterangan Berhasil Disimpan');
							   $('#EZModal').modal('hide');
							   xTable.fnDestroy();
							   $('#overlay').hide();
								//$('#listorder tbody').html(res);
								$('#listorder').dataTable(option);
								location.reload();
							
				}
			})
			
		})
		
		
		
		
		
		$(".btnkomentar").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			
			$("#snojo").val($row.find(".id").text());
			$("#skomentar").val($row.find(".komentar").text());
			
		})
		
		$(".btnhold").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#cnojo").val($row.find(".nojo").text());
			//$("#scancel").val($row.find(".cancel").text());
		})
		
		$(".btnholded").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			//$("#ynojo").val($row.find(".nojo").text());
			$("#ycancel").val($row.find(".cancel").text());
		});
		
		
		$(".btnpic").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#picid").val($row.find(".id").text());
		});
		
		
		
		$('#btn_saveitv').click(function(){
			var valid 			= $("#id_apply").val();
			var valremark 		= $("#remarkitv").val();
			var tyjo 			= $("#tyjo").val();
			
			var attacmtx 	= $('#filestop').val();
			if (attacmtx == ''){alert("File evidence tidak boleh kosong."); return false;}
			if (valremark == ''){alert("Keterangan harus diisi."); return false;}
			

			var fd = new FormData();    
			fd.append( 'filestop', $('#filestop')[0].files[0]);
			fd.append( 'valid', $('#id_apply').val());
			fd.append( 'tyjo', $('#tyjo').val());
			fd.append( 'valremark', $('#remarkitv').val());

			$.ajax({
				url: '<?php echo base_url("index.php/home/save_ket_rek") ?>',
				data: fd,
				processData: false,
				contentType: false,
				type: 'POST',
				success: function(data){
					alert(data);
					$('#MModal').modal('hide');
					location.reload();
				}
			});
			
			// var larr 	= [valradio, valid, valremark, tyjo];
			// var url 	= "<?php echo base_url(); ?>" + "index.php/home/save_ket_rek";
			// $.post(url, {dataitv:larr}, function(response){
			// });
		});	
		
		
		$(".btnapp").click(function(){
			//$('#listpolar').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var bar  = $row.find(".bar").text();
			var bpa  = $row.find(".bpa").text();
			var bare = $row.find(".bare").text();
			var pare = $row.find(".pare").text();
			var tejo = $row.find(".tejo").text();
			
			if (btn == "Approved MANAR"){
				$("#labeljoz").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn_sk").html("");
			} else if (btn == "Waiting Approval MANAR"){
				$("#labeljoz").html('<label class="control-label"> Waiting Approval MANAR </label>');
				
				$('#listpolar').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var keter = $row.find(".keter").text();
				
				$("#ket_app").val(keter);
				
				$("#approvalbtn_sk").html("");
			} else if (btn == "Rejected MANAR"){
				$("#labeljoz").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app"/></textarea>');
				
				$('#listpolar').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var keter = $row.find(".keter").text();
				
				$("#ket_app").val(keter);
				
				$("#approvalbtn_sk").html("");
			} else if (btn == "Approve"){
				$("#labeljoz").html('<label class="control-label"> Anda akan menyetujui Penyesuaian Skema '+ bar +' -> '+ bpa +'</label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnrez" id="btnrez">Reject</button><button type="button" class="btn btn-outline btnappro" id="btnappro">Approve</button>';
				$("#approvalbtn_sk").html(appbtn);
				
				$("#btnappro").click(function(){
					$('#overlay1').show();
					var tejo 		= $row.find(".tejo").text();
					var ket_appro 	= $('#ket_app').val(); 
					var bar  		= $row.find(".bar").text();
					var bpa  		= $row.find(".bpa").text();
					var bare 		= $row.find(".bare").text();
					var pare 		= $row.find(".pare").text();
					var url	= "<?php echo base_url();?>index.php/home/ls_sk";
					arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
					$.post(url, {arrappjol : arrappjol}, function(res){
						$('#overlay1').hide();
						alert('Data Berhasil Di Approve');
						$('#GmyModal').modal('hide');
						load_search();
					})
				});	
				
				
				$("#btnrez").click(function(){
					$('#overlay1').show();
					var ket_appro = $('#ket_app').val(); 
					if(ket_appro == ""){
						$('#overlay1').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}
					var tejo 		= $row.find(".tejo").text();
					var bar  		= $row.find(".bar").text();
					var bpa  		= $row.find(".bpa").text();
					var bare 		= $row.find(".bare").text();
					var nojk 		= $row.find(".nojk").text();
					var pare 		= $row.find(".pare").text();
					var url	= "<?php echo base_url();?>index.php/home/lr_sk";
					arrappjol = [tejo, ket_appro, bar, bpa, bare, pare, nojk];
					$.post(url, {arrappjol : arrappjol}, function(res){
						$('#overlay1').hide();
						alert('Data Berhasil Di Reject');
						$('#GmyModal').modal('hide');
						load_search();
					})
				});	
			}
		});
		
		
		$(".btndetkom").click(function(){
			$('#listrincianr').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var vjab = $row.find(".kjab").text();
			var vlok = $row.find(".klok").text();
			var klv = $row.find(".klv").text();
			var ksl = $row.find(".ksl").text();
			var dkomp = $row.find(".dkomp").text();
			var rid = $row.find(".rid").text();
			// console.log(vnojo);console.log(vjab);console.log(vlok);console.log(klv);console.log(ksl);
			larr 		 = [vnojo, vjab, vlok, klv, ksl, dkomp];
			var url	= "<?php echo base_url();?>index.php/home/detkom";
			$.post(url, {larrx : larr}, function(res){
				iTable.fnDestroy();
				$('#overlay').hide();
				$('#listkompr tbody').html(res);
				$('#listkompr').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
			});
			
			var url	= "<?php echo base_url();?>index.php/home/data_train";
			$.post(url, {data : rid}, function(res){
				$('#hide_train').html(res);
			})
		});
		
		
		rTable.on( 'draw.dt', function () {	
			$(".btndetkom").click(function(){
				$('#listrincianr').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var vnojo = $row.find(".nojo").text();
				var vjab = $row.find(".kjab").text();
				var vlok = $row.find(".klok").text();
				var klv = $row.find(".klv").text();
				var ksl = $row.find(".ksl").text();
				var dkomp = $row.find(".dkomp").text();
				var rid = $row.find(".rid").text();
				// console.log(vnojo);console.log(vjab);console.log(vlok);console.log(klv);console.log(ksl);
				larr 		 = [vnojo, vjab, vlok, klv, ksl, dkomp];
				var url	= "<?php echo base_url();?>index.php/home/detkom";
				$.post(url, {larrx : larr}, function(res){
					iTable.fnDestroy();
					$('#overlay').hide();
					$('#listkompr tbody').html(res);
					$('#listkompr').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
				});
				
				var url	= "<?php echo base_url();?>index.php/home/data_train";
				$.post(url, {data : rid}, function(res){
					$('#hide_train').html(res);
				})
			});
		});
		
		
		$(".btndetkomx").click(function(){
			$('#listrincianw').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var vjab = $row.find(".kjab").text();
			var vlok = $row.find(".klok").text();
			var klv = $row.find(".klv").text();
			var ksl = $row.find(".ksl").text();
			var dkomp = $row.find(".dkomp").text();
			var rid = $row.find(".rid").text();
			larr 		 = [vnojo, vjab, vlok, klv, ksl, dkomp];
			// console.log(vnojo);console.log(vjab);console.log(vlok);
			//larr 		 = [vnojo, vjab, vlok];
			var url	= "<?php echo base_url();?>index.php/home/detkom";
			$.post(url, {larrx : larr}, function(res){
				qTable.fnDestroy();
				$('#overlay').hide();
				$('#listkomp tbody').html(res);
				$('#listkomp').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
			});
			
			var url	= "<?php echo base_url();?>index.php/home/data_train";
			$.post(url, {data : rid}, function(res){
				$('#xhide_trainx').html(res);
			})
		});
		
		
		xTable.on( 'draw.dt', function () {	
			$(".btndetkomx").click(function(){
				$('#listrincianw').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var vnojo = $row.find(".nojo").text();
				var vjab = $row.find(".kjab").text();
				var vlok = $row.find(".klok").text();
				var klv = $row.find(".klv").text();
				var ksl = $row.find(".ksl").text();
				var dkomp = $row.find(".dkomp").text();
				var rid = $row.find(".rid").text();
				larr 		 = [vnojo, vjab, vlok, klv, ksl, dkomp];
				// console.log(vnojo);console.log(vjab);console.log(vlok);
				//larr 		 = [vnojo, vjab, vlok];
				var url	= "<?php echo base_url();?>index.php/home/detkom";
				$.post(url, {larrx : larr}, function(res){
					qTable.fnDestroy();
					$('#overlay').hide();
					$('#listkomp tbody').html(res);
					$('#listkomp').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
				});
				
				var url	= "<?php echo base_url();?>index.php/home/data_train";
				$.post(url, {data : rid}, function(res){
					$('#xhide_trainx').html(res);
				})
			});
		});
		
		
		mTable.on( 'draw.dt', function () {	
			$(".vbtndetailx").click(function(){
				$('#listpolarxy').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var vnojo = $row.find(".noj").text();
				$("#inojo").val(vnojo);
				var url	= "<?php echo base_url();?>index.php/home/xtrajox";
				$.post(url, {data : vnojo}, function(res){
					bTable.fnDestroy();
					$('#overlay').hide();
					$('#listrincianxy tbody').html(res);
					$('#listrincianxy').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
				})
			});
		});
		
		
		uTable.on( 'draw.dt', function () {	
			$(".btndet").click(function(){
				btn = $(this).html();
				var $row = $(this).closest("tr");
				$("#userid").val($row.find(".txid").text());
				$("#txidr").val($row.find(".txidr").text());
				$("#typex").val($row.find(".typex").text());
				var aua = $row.find(".txid").text();
				var bub = $row.find(".txidr").text();
				var cuc = $row.find(".typex").text();
				console.log(aua);console.log(bub);
				if(cuc=='hr'){
					$("#nama_type").html('<label>Recruitment Process – HR Process Result</label>');
				}
				else if(cuc=='training')
				{
					$("#nama_type").html('<label>Recruitment Process – Assessment Process Result</label>');
				}
				else if(cuc=='user')
				{
					$("#nama_type").html('<label>Recruitment Process – User Process Result</label>');
				}
				
				/*
				$.ajax({
					type 		: "POST", 
					url		: "<?php echo base_url('index.php/home/detail_emplo/');?>",
					dataType	: "json",
					data		: {aid:aua, bid:bub},
					success	: function(res){
						$("#des1").val(res.desk1);
						$('#h_des1').val(res.hasil1);
						$('#des2').val(res.desk2);
						$('#h_des2').val(res.hasil2);
						$('#des3').val(res.desk3);
						$('#h_des3').val(res.hasil3);
						$('#kesimpulan').val(res.kesimpulan);
						$('#status').val(res.status);
					}
				})
				*/
				larr 		 = [aua, bub, cuc];
				var url	= "<?php echo base_url();?>index.php/home/detail_emplo";
				$.post(url, {data : larr}, function(res){
					$("#polo").html(res);
				})
				
				$('#ZmyModal').modal({
					backdrop: 'static',
					keyboard: false
				});
				
				$('#VmyModal').hide();
				$("#ZmyModal").show();
				$("#ZmyModal").modal("show");
			});
			
			
			$("#btnsave_det").click(function(){
				var vdes = new Array();
				$('textarea[id=des]').each(function(i){
				  vdes[i] = $(this).val();
				});
				var vdes 	= vdes.join(';');
				
				var vhdes = new Array();
				$('select[id=h_des]').each(function(i){
				  vhdes[i] = $(this).val();
				});
				var vhdes 	= vhdes.join(';');
				
				var kdes = new Array();
				$('textarea[id=zdes]').each(function(i){
				  kdes[i] = $(this).val();
				});
				var kdes 	= kdes.join(';');
				
				var khdes = new Array();
				$('select[id=zh_des]').each(function(i){
				  khdes[i] = $(this).val();
				});
				var khdes 	= khdes.join(';');
				
				var kesimpulan 	= $('#kesimpulan').val(); 
				var status 		= $('#status').val(); 
				var userid 		= $('#userid').val(); 
				var txidr 		= $('#txidr').val(); 
				var typex 		= $('#typex').val(); 
				var xstatus		= $('#xstatus').val(); 
				var ases 		= $('#ases').val(); 
				var zkesimpulan = $('#zkesimpulan').val(); 
				var zstatus 	= $('#zstatus').val();  
				//console.log(vdes);console.log(vhdes);console.log(kesimpulan);console.log(status);console.log(userid);console.log(txidr);
				
				larr 		 = [userid, vdes, vhdes, kesimpulan, status, txidr, typex, xstatus, ases, kdes, khdes, zkesimpulan, zstatus];
				var url	= "<?php echo base_url();?>index.php/home/save_dethr";
				$.post(url, {larrx : larr}, function(res){
					if(typex=='hr'){
						if(status==1){
							document.getElementById(userid).setAttribute('checked', true);
						} else {
							document.getElementById(userid).setAttribute('checked', true);
						}
					}
					else if(typex=='training')
					{
						if(xstatus==1){
							document.getElementById(userid).setAttribute('checked', true);
						} else {
							document.getElementById(userid).setAttribute('checked', true);
						}
					}
					else if(typex=='user')
					{
						if(zstatus==1){
							document.getElementById(userid).setAttribute('checked', true);
						} else {
							document.getElementById(userid).setAttribute('checked', true);
						}
					}
					/*
					$('#ZmyModal').hide();
					$("#ZmyModal").modal("hide");
					$("#VmyModal").show();
					$("#VmyModal").modal("show");
					*/
				});
				$(".modal-content").parent().parent().css("overflow", "auto");
				$('#ZmyModal').hide();
				$("#VmyModal").show();
				$("#VmyModal").modal("show");
				
			});
		});
		
		
		
		vTable.on( 'draw.dt', function () {	
				$(".btndetailx").click(function(){
					$('#listpolar').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var vnojo = $row.find(".noj").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/xtrajox";
					$.post(url, {data : vnojo}, function(res){
						kTable.fnDestroy();
						$('#overlay').hide();
						$('#listrincianx tbody').html(res);
						$('#listrincianx').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
					})
				});
				
				
				$(".btnholderz").click(function(){
					btn = $(this).html();
					var $row = $(this).closest("tr");
					$("#yrcancel").val($row.find(".ketcan").text());
				});
				
				$(".btnapp").click(function(){
					$('#listpolar').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var bar  = $row.find(".bar").text();
					var bpa  = $row.find(".bpa").text();
					var bare = $row.find(".bare").text();
					var pare = $row.find(".pare").text();
					var tejo = $row.find(".tejo").text();
					
					if (btn == "Approved MANAR"){
						$("#labeljoz").html('<label class="control-label"> Sudah diapprove </label>');
						$("#approvalbtn_sk").html("");
					} else if (btn == "Waiting Approval MANAR"){
						$("#labeljoz").html('<label class="control-label"> Waiting Approval MANAR </label>');
						
						$('#listpolar').dataTable(option);
						btn = $(this).html();
						var $row = $(this).closest("tr");
						var keter = $row.find(".keter").text();
						
						$("#ket_app").val(keter);
						
						$("#approvalbtn_sk").html("");
					} else if (btn == "Rejected MANAR"){
						$("#labeljoz").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app"/></textarea>');
						
						$('#listpolar').dataTable(option);
						btn = $(this).html();
						var $row = $(this).closest("tr");
						var keter = $row.find(".keter").text();
						
						$("#ket_app").val(keter);
						
						$("#approvalbtn_sk").html("");
					} else if (btn == "Approve"){
						$("#labeljoz").html('<label class="control-label"> Anda akan menyetujui Penyesuaian Skema '+ bar +' -> '+ bpa +'</label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app" placeholder="Alasan Reject..."/></textarea>');
						var appbtn = '<button type="button" class="btn btn-outline btnrez" id="btnrez">Reject</button><button type="button" class="btn btn-outline btnappro" id="btnappro">Approve</button>';
						$("#approvalbtn_sk").html(appbtn);
						
						$("#btnappro").click(function(){
							$('#overlay1').show();
							var tejo 		= $row.find(".tejo").text();
							var ket_appro 	= $('#ket_app').val(); 
							var bar  		= $row.find(".bar").text();
							var bpa  		= $row.find(".bpa").text();
							var bare 		= $row.find(".bare").text();
							var pare 		= $row.find(".pare").text();
							var url	= "<?php echo base_url();?>index.php/home/ls_sk";
							arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
							$.post(url, {arrappjol : arrappjol}, function(res){
								$('#overlay1').hide();
								alert('Data Berhasil Di Approve');
								$('#GmyModal').modal('hide');
								load_search();
							})
						});	
						
						
						$("#btnrez").click(function(){
							$('#overlay1').show();
							var ket_appro = $('#ket_app').val(); 
							if(ket_appro == ""){
								$('#overlay1').hide();
								alert("Keterangan Status Tidak Boleh Kosong !!");
								return false;
							}
							var tejo 		= $row.find(".tejo").text();
							var bar  		= $row.find(".bar").text();
							var bpa  		= $row.find(".bpa").text();
							var bare 		= $row.find(".bare").text();
							var pare 		= $row.find(".pare").text();
							var nojk 		= $row.find(".nojk").text();
							var url	= "<?php echo base_url();?>index.php/home/lr_sk";
							arrappjol = [tejo, ket_appro, bar, bpa, bare, pare, nojk];
							$.post(url, {arrappjol : arrappjol}, function(res){
								$('#overlay1').hide();
								alert('Data Berhasil Di Reject');
								$('#GmyModal').modal('hide');
								load_search();
							})
						});	
					}
				});
		});
		
		
			
		
	});
	
	
	function handle(e){
		var xTable = $('#listorder').dataTable({
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false,
			"scrollX": true,
			"bJQueryUI": false  
		});

		if(e.keyCode === 13){
			var url = "<?php echo base_url(); ?>" + "index.php/home/listjo/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				//alert(response);
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listorder tbody').html(response);
				$('#listorder').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});		
				
			})
		}
		return false;
	}	



	function handle(e){
		var xTable = $('#listpolar').dataTable({
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false,
			"scrollX": true,
			"bJQueryUI": false  
		});

		if(e.keyCode === 13){
			/*
			var url = "<?php echo base_url(); ?>" + "index.php/home/search_sk_sk_list_new/";
			var dataarr = $('#xsearch').val();
			$.post(url, {dataarr:dataarr}, function(response){
				//alert(response);
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});		
				
			})
			*/
			var url = "<?php echo base_url(); ?>" + "index.php/home/xlistjox/";
			var dataarr = $('#xsearch').val();
			// console.log(dataarr);
			$.post(url, {dataarr:dataarr}, function(response){
				//alert(response);
				vTable.fnDestroy(); 
				$('#overlay').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
	}
	
	
</script>

<script type="text/javascript">
	function hire(ttl, fname, tname, lname, nojov, xid, religi, userid, status_married, bday, kontrak, tjos, tnews, gender, tloks, tpersa, tskill, tjab, tabk, hjab){
		//$(".modal-content").parent().parent().css("overflow", "auto");
		$('#OVERZAY').show();
		$("#OVERZAY").modal("show"); 
		//alert(tloks);
		
		var larr = [ttl, fname, tname, lname, nojov, xid, religi, userid, status_married, bday, kontrak, tjos, tnews, gender, tloks, tpersa, tskill, tjab, tabk, hjab];
		var url 	= "<?php echo base_url(); ?>" + "index.php/home/hiring";
		$.post(url, {datatap:larr}, function(response){
			//alert(response); 
			
			console.log(response);
			$('#OVERZAY').hide();
			$("#OVERZAY").modal("hide"); 
			$('#VmyModal').hide();
			$("#VmyModal").modal("hide");
			if(response){
				alert(response);
			}
			
		});		
		
	};
	
	function add_hr(id, kebut, gender, pendidikan, lokasi, type, jmlx, fnojof, jkontrak, tjo, tnew, lokq, persaq, skillq, jabq, abkrsq, hire_jab){
		//alert(hire_jab);
		//alert(type);
		//btn = $(this).html();
		//var $row = $(this).closest("tr");
		$('#overlayx').show();
		$('#xoverlay').show();
		if(type=='hr'){
			$('#det_rinc').show();
		} else {
			$('#det_rinc').hide();
		}
		
		if(type=='rekrut'){
			$('#btn_simpan_emp').hide();
		} else {
			$('#btn_simpan_emp').show();
		}
		
		document.getElementById("didik").disabled = true; 
		document.getElementById("gender").disabled = true; 
		document.getElementById("lokas").disabled = true; 
		
		var vid = id;
		var xtype = type;
		$("#id_emp").val(vid);  
		$("#nojov").val(fnojof);
		$("#tyjo").val(tjo);
		$("#type_emp").val(type);
		$("#jml_kebut").val(kebut);
		$("#jmls").val(jmlx);
		//$("#jns_lulus").val(type); 
		$("#jns_lulus").html('<label class="control-label">Proses '+ type +'</label>');
		$("#pil_gen").html('<label>'+ gender +'</label>');
		$("#pil_pen").html('<label>'+ pendidikan +'</label>');
		$("#pil_lok").html('<label>'+ lokasi +'</label>');
		 
		$.ajax({
			type 		: "POST",
			url		: "<?php echo base_url('index.php/home/detail_hr/');?>",
			//dataType	: "json",
			data		: {aid:id, atype:type, anojo:fnojof, jkon:jkontrak, tjox:tjo, tnewx:tnew, tlok:lokq, tpersa:persaq, tskill:skillq, tjab:jabq, tabkrs:abkrsq, xhire_jab:hire_jab},
			success	: function(res){
				uTable.fnDestroy(); 
				$('#overlayx').hide();
				$('#xoverlay').hide();
				document.getElementById("didik").checked = true; 
				document.getElementById("gender").checked = true; 
				document.getElementById("lokas").checked = true;
				document.getElementById("didik").disabled = false; 
				document.getElementById("gender").disabled = false; 
				document.getElementById("lokas").disabled = false; 
				$('#listhr tbody').html(res);
				$('#listhr').dataTable({"bFilter": true, "bSort": true, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true});		
			}			
		})
	};
	
	
	function detail(nojo, jbtn, jid, ketrej, ketcan, upd, ntype, cuk){
		//btn = $(this).html();
		//var $row = $(this).closest("tr");
		/*
		var vnojo = nojo;
		$.ajax({
			type 		: "POST", 
			url		: "<?php echo base_url('index.php/home/detailjo/');?>",
			dataType	: "json",
			data		: {anojo:nojo},
			success	: function(res){
				//xTable.fnDestroy();
				//$('#listorder').dataTable(option); 
				$('#overlay').hide();
				$("#inojo").val(vnojo);
				$('#tanggal').val(res.tanggal);
				$('#project').val(res.project);
				$('#syarat').val(res.syarat);
				$('#deskripsi').val(res.deskripsi);
				$('#jawab').val(res.jawab);
				$('#waktu').val(res.waktu);
				$('#lama').val(res.lama);
				$('#bekerja').val(res.bekerja);
				$('#btn_download').val('<?php echo base_url();?>uploads/'+ res.komponen);
				$('#btn_download1').val('<?php echo base_url();?>uploads/'+ res.komponen_bak);
				$('#btn_download2').val('<?php echo base_url();?>uploads/'+ res.komponen_other);
				if(res.komponen!='')
				{
					$('#divkomponen').show();
				}
				else
				{
					$('#divkomponen').hide();
				}
				
				if(res.komponen_bak!='')
				{
					$('#divkomponen1').show();
				}
				else
				{
					$('#divkomponen1').hide();
				} 
				
				if(res.komponen_other!='')
				{
					$('#divkomponen2').show();
				}
				else
				{
					$('#divkomponen2').hide();
				}
			}
		})
		*/
		
		var vnojo = 'a';
		var vjab = 'b';
		var vlok = 'c';
		larr 		 = [vnojo, vjab, vlok];
		var url	= "<?php echo base_url();?>index.php/home/detkom";
		$.post(url, {larrx : larr}, function(res){
			iTable.fnDestroy();
			$('#overlay').hide();
			$('#listkompr tbody').html(res);
			$('#listkompr').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
		})
		
		var vid = [jid, cuk];
		var url	= "<?php echo base_url();?>index.php/home/trajo_idx";
		$.post(url, {data : vid}, function(res){
			rTable.fnDestroy();
			$('#overlay').hide();
			$('#listrincianr tbody').html(res);
			$('#listrincianr').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});
		})
		
		var vnojo = nojo;
		var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		$.post(url, {data : vnojo}, function(res){
			wTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumen tbody').html(res);
			$('#listdokumen').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true});
		});
		
		var url	= "<?php echo base_url();?>index.php/home/zproc";
		$.post(url, {data : vnojo}, function(res){
			tTable.fnDestroy();
			$('#overlay').hide();
			$('#listprocr tbody').html(res);
			$('#listprocr').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true});
		});
		
		var url	= "<?php echo base_url();?>index.php/home/kokok";
		$.post(url, {data : vnojo}, function(res){
			$("#kokom").html(res);
		})
	};
	
	
	function detailk(nojo, jbtn, jid, ketrej, ketcan, upd, ntype){
		console.log(jbtn);	
		
		if (jbtn == "Waiting Approval MANAR"){
			// document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			$("#rket").val('');
		} else if (jbtn == "Approved MANAR"){
			// document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			$("#rket").val('');
		} else if (jbtn == "Rejected MANAR"){
			// document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			$("#rket").val(ketrej);
		} else if (jbtn == "Canceled SAP" || jbtn == "Returned SAP"){
			// document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			$("#rket").val(ketcan);
		} else if (jbtn == "Approve"){
			// document.getElementById('rbtn_simpan').removeAttribute("style");
			// document.getElementById('rbtn_reject').removeAttribute("style");
			$("#rket").val('');
		}
		
		$("#rnojo").val(nojo);
		$("#rupd").val(upd);
		$("#rntype").val(ntype);
		$("#rid").val(jid);
		
		
		var vid = jid;
		var url	= "<?php echo base_url();?>index.php/home/det_per_id";
		$.post(url, {data : vid}, function(res){
			sTable.fnDestroy();
			$('#overlay').hide();
			$('#listperner tbody').html(res);
			$('#listperner').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
		})	
		
		var vnojo = nojo;
		var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		$.post(url, {data : vnojo}, function(res){
			wTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumen tbody').html(res);
			$('#listdokumen').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
		})
	};
	
	
	function detailx(nojo, jbtn, jid, ketrej, ketcan, upd, ntype, lvlxy){
		console.log(ketcan);	
		
		if (jbtn == "Waiting Approval MANAR"){
			// document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			$("#rket").val('');
		} else if (jbtn == "Approved MANAR"){
			// document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			$("#rket").val('');
		} else if (jbtn == "Rejected MANAR"){
			// document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			$("#rket").val(ketrej);
		} else if (jbtn == "Canceled SAP" || jbtn == "Returned SAP"){
			// document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			$("#rket").val(ketcan);
		} else if (jbtn == "Approve"){
			// document.getElementById('rbtn_simpan').removeAttribute("style");
			// document.getElementById('rbtn_reject').removeAttribute("style");
			$("#rket").val('');
		}
		
		$("#rnojo").val(nojo);
		$("#rupd").val(upd);
		$("#rntype").val(ntype);
		$("#rid").val(jid);
		
		
		var vid = jid;
		var url	= "<?php echo base_url();?>index.php/home/det_per_id";
		$.post(url, {data : vid}, function(res){
			sTable.fnDestroy();
			$('#overlay').hide();
			$('#listperner tbody').html(res);
			$('#listperner').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
		});	
		
		var vnojo = nojo;
		var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		$.post(url, {data : vnojo}, function(res){
			wTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumen tbody').html(res);
			$('#listdokumen').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
		});
		
		reload_table();
	};
	
	function reload_table(){
		dataString = $("#formsrc").serializeArray();
		$("#listorder").DataTable().destroy();
		var mTable =
		$("#listorder").DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			bFilter: true,
			bLengthChange: false, 
			scrollX: true,
			ordering: true,
			bSort : true,
			ajax: {
			  url 		: "<?php echo base_url().'index.php/mapping/data_listorder3x';?>",
			  type 		:'POST',
			  dataType	: "json",
			  data		: dataString
			}, 
			createdRow: function(row, data, index) {
				$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
			},
			columnDefs: [
			{ 
				"targets": [ 0,14,15,16,17,18,19  ], //first column / numbering column
				"bVisible": false, //set not orderable
			},
			],
		});
		$('.dataTables_filter').addClass('pull-right'); 
		$('.dataTables_paginate').addClass('pull-right');
	}
	
	function detaily(nojo, jbtn, jid, ketrej, ketcan, upd, ntype, cuk, lvlxy){
		var vnojo = 'a';
		var vjab = 'b';
		var vlok = 'c';
		larr 		 = [vnojo, vjab, vlok];
		var url	= "<?php echo base_url();?>index.php/home/detkom";
		$.post(url, {larrx : larr}, function(res){
			qTable.fnDestroy();
			$('#overlay').hide();
			$('#listkomp tbody').html(res);
			$('#listkomp').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
		})
		
		console.log(jbtn);	
		if (jbtn == "Waiting Approval MANAR"){
			// document.getElementById('nbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('nbtn_reject').setAttribute("style","display:none;");
			$("#nket").val('');
		} else if (jbtn == "Approved MANAR"){
			// document.getElementById('nbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('nbtn_reject').setAttribute("style","display:none;");
			$("#nket").val('');
		} else if (jbtn == "Rejected MANAR"){
			// document.getElementById('nbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('nbtn_reject').setAttribute("style","display:none;");
			$("#nket").val(ketrej);
		} else if (jbtn == "Canceled SAP" || jbtn == "Returned SAP"){
			// document.getElementById('nbtn_simpan').setAttribute("style","display:none;");
			// document.getElementById('nbtn_reject').setAttribute("style","display:none;");
			$("#nket").val(ketcan);
		} else if (jbtn == "Approve"){
			// document.getElementById('nbtn_simpan').removeAttribute("style");
			// document.getElementById('nbtn_reject').removeAttribute("style");
			$("#nket").val('');
		}
		
		$("#nnojo").val(nojo);
		$("#nupd").val(upd);
		$("#nntype").val(ntype);
		$("#nid").val(jid);
		
		//var vid = jid;
		var vid = [jid, cuk];
		var url	= "<?php echo base_url();?>index.php/home/trajo_idx";
		$.post(url, {data : vid}, function(res){
			xTable.fnDestroy();
			$('#overlay').hide();
			$('#listrincianw tbody').html(res);
			$('#listrincianw').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});
		})
		
		var vnojo = nojo;
		var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		$.post(url, {data : vnojo}, function(res){
			wTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumen tbody').html(res);
			$('#listdokumen').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
		});
		
		var url	= "<?php echo base_url();?>index.php/home/zproc";
		$.post(url, {data : vnojo}, function(res){
			pTable.fnDestroy();
			$('#overlay').hide();
			$('#listproc tbody').html(res);
			$('#listproc').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
		});
		
		var url	= "<?php echo base_url();?>index.php/home/kokok";
		$.post(url, {data : vnojo}, function(res){
			$("#koko").html(res);
		})
		
		reload_table();
	};
	
	
	function edit(nojo, id, jabatan, gender, lokasi, jumlah, rekrut){
		document.getElementById("fsimpan").reset();
		
		$("#idnojo").val(id);
		$("#unojo").val(nojo);
		$("#jabatan").val(jabatan);
		$("#kelamin").val(gender);
		$("#lokasi").val(lokasi);
		$("#jumlah").val(jumlah);
		$("#rekruting").val(rekrut);
	}
	
	
	function bpros(id, ketrek, statid, tyjo){
		$("#remarkitv").val(ketrek);
		$("#id_apply").val(id);
		$("#tyjo").val(tyjo);
		if( (statid=='') || (statid=='0') ){
			$("#hradio").html('<div class="col-sm-6"><input type="radio" id="radio2" name="radios" class="resitv" value="1"><label for="radio2" class="radio-decline">Hold</label></div>');
		} else {
			$("#hradio").html('<div class="col-sm-6"><input type="radio" id="radio2" name="radios" class="resitv" value="0"><label for="radio2" class="radio-decline">UnHold</label></div>');
		}
	};
	
	
	function bigo(id){
		$("#sid").val(id);
	};
	
	
	function bappz(nojo, btn, ketrej, upd, ntype, id){
		//$('#listorder').dataTable(option);
		//btn = $(this).html();
		//var $row = $(this).closest("tr");
		var vnojo = nojo;
		
		if (btn == "Waiting Approval MANAR"){
			$("#labeljo").html('<label class="control-label"> Menunggu Approval MANAR </label>');
			$("#approvalbtn").html("");
		} else if (btn == "Approved MANAR"){
			$("#labeljo").html('<label class="control-label"> Sudah diapprove MANAR </label>');
			$("#approvalbtn").html("");
		} else if (btn == "Rejected MANAR"){
			$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_2" name="ket_2"/></textarea>');
			
			//$('#listorder').dataTable(option);
			//btn = $(this).html();
			//var $row = $(this).closest("tr");
			var krej2 = ketrej;
			
			$("#ket_2").val(krej2);
			
			$("#approvalbtn").html("");
		} else if (btn == "Approve"){
			$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><br><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
			var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline btnsimpan" data-dismiss="modal" id="btnsimpan">Approve</button>'
			$("#approvalbtn").html(appbtn);
			
			$("#btnsimpan").click(function(){
				$('#overlay').show();
				var vnojo 	= nojo;
				var namaz 	= upd;
				var tjok 	= ntype;
				var nid 	= id;
				var ket 	= $('#ket').val(); 
				var url	= "<?php echo base_url();?>index.php/home/m_simpantjo";
				arrappjo = [vnojo, nid, ket, tjok, namaz];
				$.post(url, {arrappjo : arrappjo}, function(res){
					$('#overlay').hide();
					//alert('Data Berhasil Di Approve');
					alert(res);
					location.reload();
				})
			})	
						
			$("#btnreject").click(function(){
				$('#overlay').show();
				var ket_status 		= $('#ket').val();			
				
				if(ket_status == ""){
					$('#overlay').hide();
					alert("Keterangan Status Tidak Boleh Kosong !!");
					return false;
				}
				
				var vnojo 	= nojo;
				var namaz 	= upd;
				var tjok 	= ntype;
				var nid 	= id;
				var ket 	= $('#ket').val(); 
				var url	= "<?php echo base_url();?>index.php/home/m_rejectjo";
				arrappjo = [vnojo, nid, ket, tjok, namaz];
				$.post(url, {arrappjo : arrappjo}, function(res){
					$('#overlay').hide();
					alert(res);
					location.reload();
				})
			})
		} 
	};
	
	
	function bhold(ketcan){
		$("#ycancel").val(ketcan);
	};
	
	
	function xtestx(perner){
		var ppp = document.getElementById("jmls").value;
		var oTable = $('#listhr').dataTable();
		var rowcollection =  oTable.$(".active:checked", {"page": "all"});
		var vcentang = new Array();
		rowcollection.each(function(i){
			vcentang[i] = $(this).val();
		});
		var vcentang 	= vcentang.join(',');
		var res = vcentang.split(",");
		
		var count = 0;
		for(var i = 0; i < res.length; ++i){
			//if(vcentang[i] == 2)
				count++;
		}
		
		$('#jmls').val(count);
	}
	
	
	function gojobs(xkid, tyjo){
		$.fn.dataTableExt.sErrMode = 'throw';
		$("#labelgojobs2").html('<center><label class="control-label"> Summary Data Gojobs </label><center>');
		if(tyjo==1){
			$('#overlayxg').show();
			$("#labelgojobs").html('<center><label class="control-label"> Rincian Permintaan/Kebutuhan </label><center>');
			$("#labelgojobs2").html('<center><label class="control-label"> Summary Data Gojobs </label><center>');
			var url	= "<?php echo base_url();?>index.php/home/det_gorinc";
			$.post(url, {data : xkid, jns:1}, function(res){
				goTable.fnDestroy();
				$('#overlayxg').hide();
				$('#listdetail tbody').html(res);
				$('#listdetail').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bInfo":false, "bPaginate": false});
			});
			
			var url	= "<?php echo base_url();?>index.php/home/det_gojobs";
			$.post(url, {data : xkid}, function(res){
				gojTable.fnDestroy();
				$('#listgojobs tbody').html(res);
				$('#listgojobs').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bInfo":false, "bPaginate": false});
			})
		}
		else 
		{
			$('#overlayxgg').show();
			$("#labelgojobs_rep").html('<center><label class="control-label"> Detail Permintaan/Kebutuhan Replace </label><center>');
			$("#labelgojobs_rep2").html('<center><label class="control-label"> Summary Data Gojobs </label><center>');
			var url	= "<?php echo base_url();?>index.php/home/det_gorinc";
			$.post(url, {data : xkid, jns:2}, function(res){
				go1Table.fnDestroy();
				$('#overlayxgg').hide();
				$('#listdetail_rep tbody').html(res);
				$('#listdetail_rep').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bInfo":false, "bPaginate": false});
			});	
			
			var url	= "<?php echo base_url();?>index.php/home/det_gojobs";
			$.post(url, {data : xkid}, function(res){
				gorTable.fnDestroy();
				$('#listgojobs_rep tbody').html(res);
				$('#listgojobs_rep').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bInfo":false, "bPaginate": false});
			})
		}
		
	};

	
</script>

<style>
.daud
{
color:#FFFFFF;
background-color:#000033;

}


.daud:hover {
    color: #FFFFFF;
	background-color:#003366;
}

 div#XmyModal {
	display: none;
	position: absolute;
	width: 520px;
	padding: 10px;
	background: #eeeeee;
	color: #000000;
	border: 1px solid #1a1a1a;
	font-size: 90%;
}

#VXmyModal {
     overflow-x: auto;
	 overflow-y: auto;
}

#LmyModal {
     overflow-x: auto;
	 overflow-y: auto;
}

</style>
      <!-- Full Width Column -->
      <div class="content-wrapper">
	  
		
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Job Order
              <small>List</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Job Order</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<?php if( ($level=='2') || ($level=='1') || ($level=='14') || ($level=='4') ) { ?>
				<div class="box box-default">
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<label class="col-sm-6 control-label">Jenis Approval</label>
								<div class="col-sm-6">
								<select class="form-control pull-right" id="typeapp" name="typeapp" style="width:300px;"/>
									<option value="N/R">New Dan Replace</option>
									<option value="SKEMA">Penyesuaian Skema</option>
									<?php if($level==4){  ?>
											<option value="VARIABEL">Pembayaran Variabel</option>		
									<?php } ?>
								</select>	
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?php } ?>
			
				<div class="box box-default" id="tar1">
					<!--
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project or NOJO or creater.." onkeypress="handle(event)"/>
							</div>
						</div>
					</div>
					-->
				<?php if($level == 3){ ?>
				<!--<div>
				<form role="form" name="formsrc" id="formsrc" method="post">		
					<div class="row box-body">			  
					  <div class="col-md-2">
					  	<label>Status</label>
					  	<div class="input-group">
					 		<select id='statusjo' name='statusjo' class='form-control'>
					 			<option value=''>- Pilih Status -</option>
					 			<option value='0'>On Progress</option>
					 			<option value='1'>Hold</option>
					 			<option value='2'>Done</option>
					 		</select>					 		
						</div>
					  </div>
					   <div class="col-md-2">
					   	&nbsp;
					  	<div class="input-group">
							<button type="button" class="btn btn-primary my" id="btnsearch" name="btnsearch">Search</button>	
						</div>
					  </div>
					</div>
				</form>
			</div>-->
			<?php } ?>
			
				<?php if($level == 15){ ?>
				<div>
					<div class="row box-body">			  
						<div class="col-md-2" style="margin-bottom:-10px;">
							<button type="button" class="btn btn-primary my" id="btn_excel" name="btn_excel">Download</button>&nbsp;&nbsp;&nbsp;<input type="checkbox" id="allar" name="allar" value="1"> All Area
						</div>
					</div>
				</div>
				<?php } else { ?>
				<div class="box-header with-border">
					<div class="row">
						<div class="col-sm-2">
							<label>Tanggal Create</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="tcr1" size="25" />
							</div>
						</div>
						<div class="col-sm-1"><label>&nbsp;</label><center>sd</center></div>
						<div class="col-sm-2">
							<label>Tanggal Create</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="tcr2" size="25" />
							</div>
						</div>
						<div class="col-sm-3">
							<button type="button" class="btn btn-primary" id="btn_excelrek" style="margin-top:25px;">Export xls</button>
							<button type="button" class="btn btn-primary" id="donlot_dok" style="margin-top:25px;">Donlot Dok</button>
						</div>
					</div><!-- /.form group -->
				</div>
				<?php } ?>

				<form role="form" id="formid">	
					<div class="box-body">
						<div class="zoverlay" id="zoverlay">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
						<table id="listorder" class="table table-bordered table-hover" style="width:100%">
							<thead style="background-color: #dd4b39; color:white;">
								<tr>
									<th style="display:none">x</th>
									<th>No JO</th>
									<th>Tgl Create</th>
									<th>Creater</th>
									<th>Lama Project</th>
									<th>Project</th>
									<th>Type JO</th>
									<th>Type Rekrut</th>
									<th>Lokasi</th>
									<th>Duedate</th>
									<th>Kebutuhan</th>
									<th>Jumlah</th>
									<th>Pemenuhan</th>
									<!--<th>Proses HR</th>
									<th>Proses Assessment</th>
									<th>Proses User</th>
									<th>Proses PKWT</th>-->
									<th>Notes</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								/*
								if (count($transjo)){
									foreach($transjo as $key => $list){
										if($level == '4') 
										{
												if ($list['flag_app'] == 1) {
													$btn = 'Approved MANAR';
													$stat = 'btn-success';
												} elseif ($list['flag_app'] == 2) {
													$btn = 'Rejected MANAR';
													$stat = 'btn-danger';
												} else {
													$btn = 'Approve';
													$stat = 'btn-warning';
												}
												
										}
										else if($level == '2') 
										{
												if($regional == '1') 
												{
													if ($list['flag_app'] == 1) {
														$btn = 'Approved MANAR';
														$stat = 'btn-success';
													} elseif ($list['flag_app'] == 2) {
														$btn = 'Rejected MANAR';
														$stat = 'btn-danger';
													} else {
														$btn = 'Waiting Approval MANAR';
														$stat = 'btn-warning';
													}
												}
												else
												{
													if($lalalili <= '0')
													{
														if ($list['flag_app'] == 1) {
															$btn = 'Approved MANAR';
															$stat = 'btn-success';
														} elseif ($list['flag_app'] == 2) {
															$btn = 'Rejected MANAR';
															$stat = 'btn-danger';
														} else {
															$btn = 'Waiting Approval MANAR';
															$stat = 'btn-warning';
														}
													}
													else
													{
														if ($list['flag_app'] == 1) {
															$btn = 'Approved MANAR';
															$stat = 'btn-success';
														} elseif ($list['flag_app'] == 2) {
															$btn = 'Rejected MANAR';
															$stat = 'btn-danger';
														} else {
															$btn = 'Approve';
															$stat = 'btn-warning';
														}
													}
													
													
												}
										}
										else 
										{
												if ($list['flag_app'] == 1) {
													$btn = 'Approved MANAR';
													$stat = 'btn-success';
												} elseif ($list['flag_app'] == 2) {
													$btn = 'Rejected MANAR';
													$stat = 'btn-danger';
												} else {
													$btn = 'Waiting Approval MANAR';
													$stat = 'btn-warning';
												}
										} 
										echo "<tr>";
										echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
										echo "<td class='nojo'>". $list['nojo'] ."</td>";
										echo "<td class='upd'>". $list['upd'] ."</td>";
										if($list['n_project']!='')
										{
											echo "<td class='project'>". $list['n_project'] ."</td>";
										}
										else
										{
											echo "<td class='project'>". $list['project'] ."</td>";
										}
										
										echo "<td class='tjo'>". $list['ntype'] ."</td>";
										//if(!filter_var($list['lokasi'], FILTER_VALIDATE_INT)) 
										if(!filter_var($list['lokasi'], FILTER_SANITIZE_STRING)) 
										{    
										 	echo "<td class='lokasi'>". $list['lokasi'] ."</td>"; 
										} 
										else 
										{    
											echo "<td class='lokasi'>". $list['city_name'] ."</td>";   
										}    
										echo "<td class='tanggal'>". $list['bekerja'] ."</td>";
										if(!filter_var($list['jabatan'], FILTER_VALIDATE_INT)) 
										{    
											echo "<td class='jabatan'>". $list['jabatan'] . " ( ". $list['gender'] ." )</td>";
										} 
										else 
										{    
											echo "<td class='jabatan'>". $list['name_job_function'] ." ( ". $list['gender'] ." )</td>";
										}  
										echo "<td align='center' class='jumlah'>". $list['jumlah'] ."</td>";
										echo "<td align='center' class='hr'>". $list['hr'] ."</td>";
										echo "<td align='center' class='jmluser'>". $list['jmluser'] ."</td>";
										echo "<td align='center' class='rekrut'>". $list['rekrut'] ."</td>";
										echo "<td class='notes'>". $list['note'] ."</td>";	
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";		
										echo "<td class='gender' style='display:none'>". $list['gender'] ."</td>";	
										echo "<td class='cancel' style='display:none'>". $list['ket_cancel'] ."</td>";	
										echo "<td class='krej' style='display:none'>". $list['ket_rej'] ."</td>";
										echo "<td class='namz' style='display:none'>". $list['upd'] ."</td>";
										echo "<td class='krek' style='display:none'>". $list['ket_rekrut'] ."</td>";
										
										echo "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#myModal'>Detail</button>";
										
										if ($level == '3'){
											if($list['flag_cancel']=='1') 
											{
												echo "
												<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
												";
											}
											else if($list['flag_cancel_sap']=='1')
											{
												echo "
												<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
												";
											}
											else
											{
												if($list['flag_jobs']!='1') 
												{
													if($list['status_rekrut']==1) 
													{
														echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Hold</button>";
													}
													else if($list['status_rekrut']==2) 
													{
														echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Done</button>";
													}
													else
													{
														if( ($list['skema']==1) || ($list['bskema']==1) )
														{
															echo "<button type='button' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>";
															echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>OnProgress</button>";
														}
														else
														{
															echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>OnProgress</button>";
														}
													}
													echo "<button type='button' class='btn btn-success btn-block btn-xs btngo' id='btngo' data-toggle='modal' data-target='#OModal'>Publish</button>";
												}
												else
												{
													if($list['status_rekrut']==1) 
													{
														echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Hold</button>";
													}
													else if($list['status_rekrut']==2) 
													{
														echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>Done</button>";
													}
													else
													{
														if( ($list['skema']==1) || ($list['bskema']==1) )
														{
															echo "<button type='button' class='btn btn-warning btn-block btn-xs btnedit' id='btnedit' data-toggle='modal' data-target='#EModal'>ADD</button>";
															echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>OnProgress</button>";
														}
														else
														{
															echo "<button type='button' class='btn bg-navy btn-block btn-xs btnpros' id='btnpros' data-toggle='modal' data-target='#MModal'>OnProgress</button>";
														}
													}
												}
											}
										} 
										else
										{
											$abcde = 'sap';
											if($list['flag_cancel']=='1') 
											{
												echo "
												<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
												";
												
												if ($level == '1'){
													//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
													echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
												} 
											} 
											else if($list['flag_cancel_sap']=='1')
											{
												echo "
												<button type='button' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled SAP</button>
												";
												
												if ($level == '1'){
													//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
													echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
												}
												
												if ($level == 2){
													if($regional==1)
													{
														//echo "<a href='". base_url() . 'index.php/home/edit_skema' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
														echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
													}
												}
											}
											else
											{
												echo "<button type='button' class='btn ". $stat ." btn-block btn-xs btnapz' id='btnapz' data-toggle='modal' data-target='#AmyModal'>" . $btn . "</button>";
												
												//echo "</td>";
											}
										}
										echo "</td>";				
										
																	
										echo "</tr>";
									}
								}	
								*/
								?>
							</tbody>
						</table>
						
					</div><!-- /.box-body -->
				</form>
					
				
				<div id="XmyModal">
					<h4>History Add Data</h4>
					<p>
						<table id="listrincian" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Lup</th>
									<th>HR</th>
									<th>USER</th>
									<th>PKWT</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</p>
				</div>

				
				<div class="modal fade" id="Modal_go" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail Gojobs</h4>
						</div>
						<div class="modal-body">
							<form class="">
								<div class="box-body">
									<div class="overlayxg" id="overlayxg">
									  <i class="fa fa-refresh fa-spin"></i>
									</div>
									<div>
										<div id="labelgojobs"></div>
									</div>
									<br>
									<div class="col-md-12">
									<table id="listdetail" class="table table-bordered">
										<thead style="background-color:blue; color:white;">
											<tr>
												<th style="width:300px;">Jabatan</th>
												<th style="width:300px;">Gender</th>
												<th style="width:300px;">Pendidikan</th>
												<th style="width:300px;">Kontrak</th>
												<th style="width:300px;">Lokasi</th>
												<th style="width:300px;">Jumlah</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									</div> 
									<br>
									
									<div>
										<div id="labelgojobs2"></div>
									</div>
									<table id="listgojobs" class="table table-bordered table-hover" style="width:100%;" >
										<thead style="background-color:blue; color:white;" >
											<tr>
												<th>Proses</th>
												<th>Peserta</th>
												<th>Lulus</th>
											</tr>
										</thead>
										<tbody style="color:#000000">
										
										</tbody>
									</table>
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				<div class="modal fade" id="Modal_gorep" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail Gojobs</h4>
						</div>
						<div class="modal-body">
							<form class="">
								<div class="box-body">
									<div class="overlayxgg" id="overlayxgg">
									  <i class="fa fa-refresh fa-spin"></i>
									</div>
									<div>
										<div id="labelgojobs_rep"></div>
									</div>
									<br>
									<table id="listdetail_rep" class="table table-bordered" style="width:850px;">
										<thead style="background-color:blue; color:white;">
											<tr>
												<th style="width:300px;">Perner</th>
												<th style="width:300px;">Nama</th>
												<th style="width:300px;">Area</th>
												<th style="width:300px;">Personalarea</th>
												<th style="width:300px;">Skilllayanan</th>
												<th style="width:300px;">Level</th>
												<th style="width:300px;">Jabatan</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									 
									<br>
									
									<div>
										<div id="labelgojobs_rep2"></div>
									</div>
									<table id="listgojobs_rep" class="table table-bordered table-hover" style="width:850px;" >
										<thead style="background-color:blue; color:white;" >
											<tr>
												<th>Proses</th>
												<th>Peserta</th>
												<th>Lulus</th>
											</tr>
										</thead>
										<tbody style="color:#000000">
										
										</tbody>
									</table>
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->	
				
				
				<div class="modal fade" id="VmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><div id="jns_lulus"></div></h4>
						</div>
						<div class="modal-body">
							<div class="overlayx" id="overlayx">
							  <i class="fa fa-refresh fa-spin"></i>
							</div>
							<input type="hidden" class="form-control pull-right" id="id_emp" name="id_emp" />
							<input type="hidden" class="form-control pull-right" id="nojov" name="nojov" />
							<input type="hidden" class="form-control pull-right" id="type_emp" name="type_emp" />
							<input type="hidden" class="form-control pull-right" id="jml_kebut" name="jml_kebut" />
							<input type="hidden" class="form-control pull-right" id="tyjo" name="tyjo" />
							<div id="det_rinc">
							<input type='checkbox' value='1' name='didik' id='didik' checked> Pendidikan (<label id="pil_pen"></label>) &nbsp;&nbsp;&nbsp;&nbsp;  <input type='checkbox' value='1' name='gender' id='gender' checked> Gender (<label id="pil_gen"></label>) &nbsp;&nbsp;&nbsp;&nbsp;  <input type='checkbox' value='1' name='lokas' id='lokas' checked> Lokasi (<label id="pil_lok"></label>)  &nbsp;&nbsp;&nbsp;&nbsp; <label>jumlah</label> : <input type="text" id="jmls" name="jmls" style="width:50px; color:black;" value="0">
							</div>
							<table id="listhr" class="table table-bordered table-hover" style="width:100%;">
								<thead style="background-color:blue; color:white;" style="width:100%;">
									<tr>
										<th><center>Pilih</center></th>
										<th>Name</th>
										<th>Gender</th>
										<th>Birthdate</th> 
										<th>Education</th>
										<th>Institution</th>
										<th>GPA</th>
										<th>Experience</th>
										<th style="display:none;">X</th>
										<th style="display:none;">X</th>
										<th style="display:none;">X</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody style="color:#000000">
								</tbody>
							</table>
							<div class="xoverlay" id="xoverlay">
							  <i class="fa fa-refresh fa-spin"></i>
							</div>
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="dpn_cancel">Close</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan_emp">Save</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->	
				
				
				<div class="modal fade" id="OVERZAY" role="dialog">
					<div class="modal-dialog" id="modal-alert" style="width:900px;">
						<div class="modal-content">
								<center><label><h2>LOADING...</h2></label></center> 
						</div>
					</div>
				</div>
				
				
				<div class="modal fade" id="ZmyModal" role="dialog" >
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><div id="nama_type"></div></h4>
						</div>
						<div class="modal-body">
							<form class="">
								<div class="box-body">
									<div>
										<div id="labeljo"></div>
									</div>
									
									<div class="form-group">
									<div class="row">
										<div class="col-md-12">
										  <div class="input-group">
											
											<div id="polo">
											<!--
												<div class="col-md-6 form-group" id="divdes1">
													<label class=" control-label">Description 1</label>
													<div class="">
														<input type="hidden" class="form-control pull-right" id="userid" name="userid" /> 
														<input type="hidden" class="form-control pull-right" id="txidr" name="txidr" />
														<textarea class="form-control" rows="2" name="des1" id="des1" placeholder="Desscription 1" /></textarea>	
													</div>
												</div>

												<div class="form-group col-md-6" id="divhdes1">
													<label class=" control-label">Hasil Description 1</label>
													<div class="">
														<select class="form-control pull-right" id="h_des1" name="h_des1" style="width:100%; margin-bottom:50px;">
															<option value="">Pilih</option>	
															<option value="1">Tinggi</option>
															<option value="2">Baik</option>	
															<option value="3">Cukup</option>	
															<option value="4">Kurang</option>	
														</select>
													</div>
												</div>
												
												<div class="col-md-6 form-group" id="divdes2">
													<label class=" control-label">Desscription 2</label>
													<div class="" >
														<textarea class="form-control" rows="2" name="des2" id="des2" placeholder="Desscription 1" /></textarea>	
													</div>
												</div>

												<div class="form-group col-md-6" id="divhdes2">
													<label class=" control-label">Hasil Description 2</label>
													<div class="">
														<select class="form-control pull-right" id="h_des2" name="h_des2" style="width:100%; margin-bottom:50px;">
															<option value="">Pilih</option>	
															<option value="1">Tinggi</option>
															<option value="2">Baik</option>	
															<option value="3">Cukup</option>	
															<option value="4">Kurang</option>	
														</select>
													</div>
												</div>
												
												<div class="col-md-6 form-group" id="divdes3">
													<label class=" control-label">Desscription 3</label>
													<div class="">
														<textarea class="form-control" rows="2" name="des3" id="des3" placeholder="Desscription 1" /></textarea>	
													</div>
												</div>

												<div class="form-group col-md-6" id="divhdes3">
													<label class=" control-label">Hasil Description 3</label>
													<div class="">
														<select class="form-control pull-right" id="h_des3" name="h_des3" style="width:100%; margin-bottom:50px;">
															<option value="">Pilih</option>	
															<option value="1">Tinggi</option>
															<option value="2">Baik</option>	
															<option value="3">Cukup</option>	
															<option value="4">Kurang</option>	
														</select>
													</div>
												</div>
											
											
												<div class="form-group col-md-12" id="divkesimpulan">
													<label class=" control-label">Kesimpulan Pewawancara</label>
													<div class="">
														<textarea id="kesimpulan" rows="5" name="kesimpulan" class="form-control" placeholder="Kesimpulan Pewawancara">	</textarea>
														<input type="hidden" class="form-control pull-right" id="userid" name="userid" /> 
														<input type="hidden" class="form-control pull-right" id="txidr" name="txidr" />
													</div>
												</div>
												
												<div class="form-group col-md-12" id="divstatus">
													<label class=" control-label">Status</label>
													<div class="">
														<select class="form-control pull-right" id="status" name="status" style="width:100%;">
															<option value="">Pilih</option>	
															<option value="1">Diterima</option>
															<option value="2">Dipertimbangkan</option>	
															<option value="3">Ditolak</option>		
														</select>
													</div>
												</div>
											-->
											</div>	
											
											<input type="hidden" class="form-control pull-right" id="userid" name="userid" /> 
											<input type="hidden" class="form-control pull-right" id="txidr" name="txidr" />
											<input type="hidden" class="form-control pull-right" id="typex" name="typex" />
										</div>
										</div>
									</div>
									</div><!-- /.form group -->
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" id="btncancel">Cancel</button>
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btnsave_det">Save</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
					
					
				<div class="modal fade" id="myModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert" >
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Rincian JO</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<div class="form-group">
										<label class="col-sm-3 control-label">NO JO</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-desktop"></i>
												</div>
												<input type="text" class="form-control pull-right" id="inojo" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divjabatan">
										<label class="col-sm-3 control-label">Tanggal</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="tanggal" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divjabatan">
										<label class="col-sm-3 control-label">Nama Project</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="project" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divjabatan">
										<label class="col-sm-3 control-label">Persyaratan</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="syarat" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divdeskripsi">
										<label class="col-sm-3 control-label">Deskripsi</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="deskripsi" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divlama">
										<label class="col-sm-3 control-label">Lama</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="lama" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divbekerja">
										<label class="col-sm-3 control-label">Tgl Bekerja</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="bekerja" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Dokumen Skema</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<button type="button" class="btn btn-outline" id="btn_download">Download Dokumen</button>
												<!--<input type="text" class="form-control pull-right" id="komponen" size="25" />-->
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divkomponen1">
										<label class="col-sm-3 control-label">Dokumen BAK</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<button type="button" class="btn btn-outline" id="btn_download1">Download Dokumen</button>
												<!--<input type="text" class="form-control pull-right" id="komponen" size="25" />-->
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divkomponen2">
										<label class="col-sm-3 control-label">Dokumen Lain</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<button type="button" class="btn btn-outline" id="btn_download2">Download Dokumen</button>
												<!--<input type="text" class="form-control pull-right" id="komponen" size="25" />-->
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan">Approve</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->	
				
				
				
				<div class="modal fade" id="LmyModal" role="dialog">
				  <div class="modal-dialog modal-lg" id="modal-alert" style="width:1130px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
								<div class="box-group" id="accordion">
									<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
									<div class="panel box box-primary">
									  <div class="box-header with-border">
										<h4 class="box-title">
										  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
											Rincian Dan Skema
										  </a>
										</h4>
									  </div>
									  <div id="collapseOne" class="panel-collapse collapse in">
										<div class="box-body">
											<table id="listrincianw" class="table table-bordered table-hover"  style="width:100%;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th >Pelatihan</th>
														<th >Bekerja</th>
														<th >Type Rekrut</th>
														<th >Jabatan</th>
														<th >Gender</th>
														<th >Pendidikan</th>
														<th >Lokasi</th>
														<th >Atasan</th>
														<th >Kontrak</th>
														<th >PKWT</th>
														<th >Waktu</th>
														<th >Jumlah</th>
														<th >Perner No Rekrut</th>
														<!--<th >Status</th>-->
														<th >Detail</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead>
												<tbody style="color:#000000;">
												</tbody>
											</table>
											
											<br><hr><br>
											
											<div class="form-group" id="divwaktu">
												<label class="col-sm-12 control-label">Skema</label>
											</div>
											<table id="listkomp" class="table table-bordered table-hover" style="width:100%;" >
												<thead style="background-color:blue; color:white" >
													<tr>
														<th>Level</th>
														<th style="display:none">X</th>
														<th>UMP</th>
														<th>Komponen</th> 
														<th style="display:none">X</th> 
														<th>Value</th>
														<th>Persentase</th>
														<th>Pengkali TK</th>
														<th>Pengkali Kes</th>
														<!--
														<th>Perusahaan</th>
														<th>Karyawan</th>
														<th>JKK</th>
														<th>JKM</th>
														<th>JHT Perusahaan</th>
														<th>JHT Karyawan</th>
														-->
														<th>Keterangan</th>
														<th>HK Pembagi</th>
													</tr>
												</thead>
												<tbody style="color:#000000">
												</tbody>
											</table>
											
											<br><hr><br>
											
											<div class="form-group" id="divwaktu">
												<label class="col-sm-12 control-label">Training</label>
											</div>
											<div id="xhide_trainx"></div>
											
											<br><hr><br>
											
										</div>
									  </div>
									</div>
									<div class="panel box box-danger">
									  <div class="box-header with-border">
										<h4 class="box-title">
										  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											Attachment
										  </a>
										</h4>
									  </div>
									  <div id="collapseTwo" class="panel-collapse collapse">
										<div class="box-body">
											<table id="listdokumen" class="table table-bordered" style="width:900px;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th>Dokumen Skema</th>
														<th>Dokumen BAK</th>
														<th>Dokumen Lain</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead>
												<tbody style="color:#000000;">
												</tbody>
											</table>
										</div>
									  </div>
									</div>
									<div class="panel box box-success">
									  <div class="box-header with-border">
										<h4 class="box-title">
										  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
											Doc Checklist
										  </a>
										</h4>
									  </div>
									  <div id="collapseThree" class="panel-collapse collapse">
										<div class="box-body">
											<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000; margin-bottom:20px;" id="koko">
											<?php foreach($rdoc as $list){ ?>
												<div class="col-md-4" style="margin-top:10px;">
													<input type="checkbox" <?php if(strpos($zit, $list['doc_id']) !== false) { echo 'checked'; } ?> name="kumdoc[]" id="kumdoc" value="<?php echo $list['doc_id'];?>"> <?php echo $list['doc_name'];?>
													<br><br>
												</div>
											<?php } ?>
											</div>
										</div>
									  </div>
									</div>
									<div class="panel box box-warning">
									  <div class="box-header with-border">
										<h4 class="box-title">
										  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
											Procurement
										  </a>
										</h4>
									  </div>
									  <div id="collapseFour" class="panel-collapse collapse">
										<div class="box-body">
											<table id="listproc" class="table table-bordered" style="width:900px;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th>Item</th>
														<th>Qty</th>
														<th>Spec</th>
														<th>Budget</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead>
												<tbody style="color:#000000;">
												</tbody>
											</table>
										</div>
									  </div>
									</div>
								 </div>
								
								<!--<br><hr><br>-->
								<br>
								
								<textarea class="form-control" rows="3" id="nket" name="nket" placeholder="Alasan Reject..."/></textarea>
								<input type="hidden" id="nnojo" name="nnojo">
								<input type="hidden" id="nupd" name="nupd">
								<input type="hidden" id="nntype" name="nntype">
								<input type="hidden" id="nid" name="nid">
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>-->
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="nbtn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="nbtn_simpan">Approve</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				<div class="modal fade" id="AVXmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:1130px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<div class="box-group" id="accordionx">
									<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
									<div class="panel box box-primary">
									  <div class="box-header with-border">
										<h4 class="box-title">
										  <a data-toggle="collapse" data-parent="#accordionx" href="#collapseFive">
											Rincian Dan Skema
										  </a>
										</h4>
									  </div>
									  <div id="collapseFive" class="panel-collapse collapse in">
										<div class="box-body">
											<table id="listrincianr" class="table table-bordered table-hover"  style="width:100%;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th >Pelatihan</th>
														<th >Bekerja</th>
														<th >Type Rekrut</th>
														<th >Jabatan</th>
														<th >Gender</th>
														<th >Pendidikan</th>
														<th >Lokasi</th>
														<th >Atasan</th>
														<th >Kontrak</th>
														<th >PKWT</th>
														<th >Waktu</th>
														<th >Jumlah</th>
														<th >Perner No Rekrut</th>
														<!--<th >Status</th>-->
														<th >Detail</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead>
												<tbody style="color:#000000;">
												</tbody>
											</table>
											
											<br><hr><br>
											
											<div class="form-group" id="divwaktu">
												<label class="col-sm-12 control-label">Skema</label>
											</div>
											<table id="listkompr" class="table table-bordered table-hover" style="width:100%;" >
												<thead style="background-color:blue; color:white" >
													<tr>
														<th>Level</th>
														<th style="display:none">X</th>
														<th>UMP</th>
														<th>Komponen</th> 
														<th style="display:none">X</th> 
														<th>Value</th>
														<th>Persentase</th>
														<th>Pengkali TK</th>
														<th>Pengkali Kes</th>
														<!--
														<th>Perusahaan</th>
														<th>Karyawan</th>
														<th>JKK</th>
														<th>JKM</th>
														<th>JHT Perusahaan</th>
														<th>JHT Karyawan</th>
														-->
														<th>Keterangan</th>
														<th>HK Pembagi</th>
													</tr>
												</thead>
												<tbody style="color:#000000">
												</tbody>
											</table>
											
											<br><hr><br>
											
											<div class="form-group" id="divwaktu">
												<label class="col-sm-12 control-label">Training</label>
											</div>
											<div id="hide_train"></div>
											
											<br><hr><br>
										</div>
									  </div>
									</div>
									<div class="panel box box-danger">
									  <div class="box-header with-border">
										<h4 class="box-title">
										  <a data-toggle="collapse" data-parent="#accordionx" href="#collapseSix">
											Attachment
										  </a>
										</h4>
									  </div>
									  <div id="collapseSix" class="panel-collapse collapse">
										<div class="box-body">
											<table id="listdokumen" class="table table-bordered" style="width:900px;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th>Dokumen Skema</th>
														<th>Dokumen BAK</th>
														<th>Dokumen Lain</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead>
												<tbody style="color:#000000;">
												</tbody>
											</table>
										</div>
									  </div>
									</div>
									<div class="panel box box-success">
									  <div class="box-header with-border">
										<h4 class="box-title">
										  <a data-toggle="collapse" data-parent="#accordionx" href="#collapseSeven">
											Doc Checklist
										  </a>
										</h4>
									  </div>
									  <div id="collapseSeven" class="panel-collapse collapse">
										<div class="box-body">
											<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000; margin-bottom:20px;" id="kokom">
							
											</div>
										</div>
									  </div>
									</div>
									<div class="panel box box-warning">
									  <div class="box-header with-border">
										<h4 class="box-title">
										  <a data-toggle="collapse" data-parent="#accordionx" href="#collapseEight">
											Procurement
										  </a>
										</h4>
									  </div>
									  <div id="collapseEight" class="panel-collapse collapse">
										<div class="box-body">
											<table id="listprocr" class="table table-bordered" style="width:900px;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th>Item</th>
														<th>Qty</th>
														<th>Spec</th>
														<th>Budget</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead> 
												<tbody style="color:#000000;">
												</tbody>
											</table>
										</div>
									  </div>
									</div>
							</div>
							
							<br>
							
							<!--<textarea class="form-control" rows="3" id="nket" name="nket" placeholder="Alasan Reject..."/></textarea>-->
							<input type="hidden" id="nnojo" name="nnojo">
							<input type="hidden" id="nupd" name="nupd">
							<input type="hidden" id="nntype" name="nntype">
							<input type="hidden" id="nid" name="nid">
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>-->
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				


				
				<div class="modal fade" id="VXmyModal" role="dialog">
				  <div class="modal-dialog modal-lg" id="modal-alert" style="width:1130px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listperner" class="table table-bordered table-hover"  style="width:100%;">
								<thead style="background-color:blue; color:white;">
									<tr>
										<th >Status</th>
										<th >Tanggal Status</th>
										<th >Type</th>
										<th >Perner</th>
										<th >Nama</th>
										<th >Area</th>
										<th >PersonalArea</th>
										<th >Skilllayanan</th>
										<th >Level</th>
										<th >Jabatan</th>
										<th >Perner Pengganti</th>
										<!--<th >Status</th>-->
										<th style="display:none">X</th>
										<th style="display:none">X</th>
									</tr>
								</thead>
								<tbody style="color:#000000;">
								</tbody>
							</table>
							
							<br><hr><br>
							
							<table id="listdokumen" class="table table-bordered" style="width:950px;">
								<thead style="background-color:blue; color:white;">
									<tr>
										<th>Dokumen Skema</th>
										<th>Dokumen BAK</th>
										<th>Dokumen Lain</th>
										<!--<th>Dokumen Pendukung</th>-->
									</tr>
								</thead>
								<tbody style="color:#000000;">
								</tbody>
							</table>
							
							<br><hr><br>
							
							<textarea class="form-control" rows="3" id="rket" name="rket" placeholder="Alasan Reject..."/></textarea>
							<input type="hidden" id="rnojo" name="rnojo">
							<input type="hidden" id="rupd" name="rupd">
							<input type="hidden" id="rntype" name="rntype">
							<input type="hidden" id="rid" name="rid">
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>-->
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="rbtn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="rbtn_simpan">Approve</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				
				<div class="modal fade" id="KVXmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:1130px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listperner" class="table table-bordered table-hover"  style="width:1100px;">
								<thead style="background-color:blue; color:white;">
									<tr>
										<th >Status</th>
										<th >Tanggal Status</th>
										<th >Type Rekrut</th>
										<th >Perner</th>
										<th >Nama</th>
										<th >Area</th>
										<th >PersonalArea</th>
										<th >Skilllayanan</th>
										<th >Level</th>
										<th >Jabatan</th>
										<th >Perner No Rekrut</th>
										<!--<th >Status</th>-->
										<th style="display:none">X</th>
										<th style="display:none">X</th>
									</tr>
								</thead>
								<tbody style="color:#000000;">
								</tbody>
							</table>
							
							<br><hr><br>
							
							<table id="listdokumen" class="table table-bordered" style="width:1100px;">
								<thead style="background-color:blue; color:white;">
									<tr>
										<th>Dokumen Skema</th>
										<th>Dokumen BAK</th>
										<th>Dokumen Lain</th>
										<!--<th>Dokumen Pendukung</th>-->
									</tr>
								</thead>
								<tbody style="color:#000000;">
								</tbody>
							</table>
							
							<br><hr><br>
							
							<textarea class="form-control" rows="3" id="rket" name="rket" placeholder="Alasan Reject..."/></textarea>
							<input type="hidden" id="rnojo" name="rnojo">
							<input type="hidden" id="rupd" name="rupd">
							<input type="hidden" id="rntype" name="rntype">
							<input type="hidden" id="rid" name="rid">
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>-->
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				
				<div class="modal fade" id="AmyModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Approval</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<div id="wew">
											<div class="form-group">
													<div id="labeljo"></div>
											</div><!-- /.form group -->
									</div>
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" id="awal">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<div id="approvalbtn"></div>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				<div class="modal fade" id="EVModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Keterangan Cancel</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" name="ysimpan" id="ysimpan" method="post">
								<div class="box-body">
									<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-desktop"></i>
												</div>
												<!--<input type="hidden" class="form-control pull-right" name="cnojo" id="cnojo">-->
												<textarea class="form-control" rows="5" name="ycancel" id="ycancel" /></textarea>
												
									</div><!-- /.input group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="submit" class="btn btn-outline" id="btn_simpan_cancel">Simpan</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->	
				
				
				
				
				<div class="modal fade" id="PICModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">PILIH PIC-HI</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<select class="form-control pull-right" id="pichi" name="pichi" style="padding-left:-150px;"/>
											<?php //echo $cmbpichi; ?>	
									</select>
									<input type="hidden" class="form-control pull-right" id="picid" />
								</div>
							</form>
						</div>
						<div class="modal-footer" id="awal">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_picsimpan">Save</button>
						</div>
					 </div>
				  </div>
				</div>
				
				
				
				
				<div class="modal fade" id="MModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Stop Recruitment</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" name="xsimpan" id="xsimpan" method="post" action="">
								<div class="box-body">
									<input type="hidden" id="id_apply" name="id_apply">
									<input type="hidden" id="tyjo" name="tyjo">
									<!--<div class="col-sm-12 radio-toolbarx">
										<center>
										  <div id="hradio"></div>
										  <div class="col-sm-6">
											<input type="radio" id="radio3" name="radios" class="resitv" value="2" >
											 <label for="radio3" class="radio-consider">Done</label>
											 <br><br>
										  </div>
										</center>
										<br><br>
									</div>-->
									  
									<div class="col-sm-12">
									  <label>Evidence</label>	
									  <div class="input-group">
										<input type="file" class="form-control pull-right" name="filestop" id="filestop" style="width:500px"/>	
									  </div>
									</div>
									<br><br><br><br>
									<div class="col-sm-12">
									  <div class="input-group">
										<textarea class="form-control pull-right" placeholder="Keterangan Stop Recruitment" id="remarkitv" style="width:500px"></textarea>		
									  </div>
									</div>
									  
								</div><!-- /.box-body -->
								<div class="modal-footer " style="background-color:#A80000">
									<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
									<button type="button" class="btn btn-outline" id="btn_saveitv">Save</button>
								</div>
							</form><!-- /.form-horizontal -->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				


				<div class="modal fade" id="OModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Publish In GoJobs</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									
							<div id="testing">		
									<div class="form-group">
										<label>Salary</label>
										<div class="input-group">
										<table> 
										<tr>
											<td width="300px"><input type="text" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="ssalary" placeholder="Min Salary"/></td>
											<td width="50px" align="center">To</td>
											<td width="300px"><input type="text" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="esalary" placeholder="Max Salary"/></td> 
										</tr>	
										</table>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<table border="0">
									<tr>
									<td>
										<div class="form-group">
											<label>Job Level</label>
											<div class="input-group">
											<input type="hidden" class="form-control pull-right" name="sid" id="sid">
											<select class="form-control" id="level">
												<option value=""> Pilih Job Level</option>
												<?php echo $cmblevel ?>
											</select>
											</div><!-- /.input group -->
										</div><!-- /.form group -->
									</td>
									
									<td width="80px"></td>
									
									<td> 
										<div class="form-group">
											<label>Experience</label>
											<div class="input-group">
											<select class="form-control" id="exper">
												<option value=""> Pilih Job Experience</option>
												<option value="1">1 tahun</option>
												<option value="2">2 tahun</option>
												<option value="3">3 tahun</option>
												<option value="4">4 tahun</option>
												<option value="5">5 tahun</option>
												<option value="6">6 tahun</option>
												<option value="7">7 tahun</option>
												<option value="8">8 tahun</option>
												<option value="9">9 tahun</option>
												<option value="10">10 tahun</option>
											</select>
											</div><!-- /.input group -->
										</div><!-- /.form group -->
									</td>
									</tr>
									</table>
									
									 <div class="form-group">
										<label for="job_skills">Skills Required</label>
										<input type="hidden" data-placeholder="Choose skills..." id="job_skills" 
											name="job_skills" style="width:100%;" class="select2-offscreen form-control"/>
									</div>
									
									<div class="form-group">
										<label for="job_skills">Benefits(optional)</label>
										<input type="hidden" data-placeholder="Choose Benefits..." id="job_benefits" 
											name="job_benefits" style="width:100%;" class="select2-offscreen form-control"/>
									</div>
									
									<div class="form-group">
										<label>Publish Start</label>
										<div class="input-group">
										<table>
										<tr>
											<td width="300px"><input type="text" class="form-control" id="duedate" placeholder="YYYY-mm-dd"/></td>
											<td width="50px" align="center">s/d</td>
											<td width="300px"><input type="text" class="form-control" id="duedate1" placeholder="YYYY-mm-dd"/></td> 
										</tr>	
										</table>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
						</div>
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<button type="button" class="btn btn-outline" id="btn_skip">Skip</button>
							<button type="button" class="btn btn-outline" id="btn_simpant">Simpan</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				<div class="modal fade" id="KModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Add Comment</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" name="ksimpan" id="ksimpan" method="post">
								<div class="box-body">
									<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-desktop"></i>
												</div>
												<input type="hidden" class="form-control pull-right" name="snojo" id="snojo">
												<textarea class="form-control" rows="5" name="skomentar" id="skomentar" /></textarea>
												
									</div><!-- /.input group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
							<button type="submit" class="btn btn-outline" id="btn_kirim">Simpan</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->		
				
				
				
				
				
				<div class="modal fade" id="EZModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Keterangan Cancel</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" name="csimpan" id="csimpan" method="post">
								<div class="box-body">
									<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-desktop"></i>
												</div>
												<input type="hidden" class="form-control pull-right" name="cnojo" id="cnojo">
												<textarea class="form-control" rows="5" name="scancel" id="scancel" /></textarea>
												
									</div><!-- /.input group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
							<button type="submit" class="btn btn-outline" id="btn_simpan_cancel">Simpan</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->	
				
				
				
				
							
				<div class="modal fade" id="EModal" role="dialog">
				  <div class="modal-dialog modal-success" id="modal-alert" >
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" name="fsimpan" id="fsimpan" method="post">
								<div class="box-body">
									<div class="form-group" id="divnojo">
										<label class="col-sm-3 control-label">No JO</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
											<input type="text" class="form-control pull-right" name="unojo" id="unojo" size="25" readonly >
											<input type="hidden" class="form-control pull-right" name="idnojo" id="idnojo">
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divjabatan">
										<label class="col-sm-3 control-label">Jabatan</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
											<input type="text" class="form-control pull-right" name="jabatan" id="jabatan" size="25" readonly >
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divkelamin">
										<label class="col-sm-3 control-label">Kelamin</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="kelamin" id="kelamin" size="25" readonly >
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divlokasi">
										<label class="col-sm-3 control-label">Lokasi</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="lokasi" id="lokasi" size="25" readonly >
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divlokasi">
										<label class="col-sm-3 control-label">Kebutuhan</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="jumlah" id="jumlah" size="25" readonly >
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divrekrut">									
									<label class="col-sm-3 control-label"></label>
									<div class="col-sm-9">
									<table width="100%" border="0">
									<tr>
										<td width="45%">
										Jumlah Lulus HR
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="hr" id="hr" size="25" >
												
										</div><!-- /.input group -->
										</td>
										
										<td width="10%"></td>
										
										<td width="45%">
										Jumlah Lulus User
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="user" id="user" size="25" >
												
										</div><!-- /.input group -->
										</td>
									</tr>
									
									<tr><td><label></label></td><td><label></label></td></tr>
									
									<tr>
										<td width="45%">
										Jumlah Lulus Training
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="training" id="training" size="25" >
												
										</div><!-- /.input group -->
										</td>
										
										<td width="10%"></td>
										
										<td width="45%">
										Jumlah Onboard/PKWT
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="rekrut" id="rekrut" size="25" >
												<input type="hidden" class="form-control pull-right" name="rekruting" id="rekruting" size="25" >
										</div><!-- /.input group -->
										</td>
									</tr>
									
									</table>
									</div>
									</div>
									<br/>
									<!--
									<div class="form-group" id="divrekrut">
										<label class="col-sm-3 control-label">Jml Onboard/PKWT</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="rekrut" id="rekrut" size="25" >
												<input type="hidden" class="form-control pull-right" name="rekruting" id="rekruting" size="25" >
											</div>
										</div>
									</div> -->
									<div class="form-group" id="divnote">
										<label class="col-sm-3 control-label">Notes</label>
										<div class="col-sm-9">
											<div class="input-group-addon">												
												<textarea class="form-control" rows="3" id="note" name="note" placeholder="Input Notes..."/></textarea>
											</div
										></div>
									</div> 
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
							<button type="submit" class="btn btn-outline" id="btn_simpan">Save</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->						
				</div><!-- /.box -->
				
				
				
				
				
				<div class="box box-default" id="tar2">
					<div class="box-header with-border">
						<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
									<input type="text" class="form-control pull-right" id="xsearch" placeholder="Search Area or NOJO or PersonalArea.." onkeypress="handle(event)"/>
								</div>
						<!--
							<div class="input-group">
								<table>
									<tr>
										<td>
											<div class="form-group">
												<label class="col-sm-3 control-label" >Area</label>
												<div class="input-group" style="margin-left:+70px;">
													<select class="form-control" id="ar3" name="ar3">
															<option value=''></option>
															<?php //foreach($cmb_area as $cmb_area){
																//echo "<option value='".$cmb_area->AREA."'>".$cmb_area->AREA_TEXT." | ".$cmb_area->AREA."</option>";	
															//}?>
													</select>
												</div>
											</div>
										</td>
										<td>
											<div class="form-group">
												<label class="col-sm-3 control-label" style="margin-left:60px;">PersonalArea</label>
												<div class="input-group" style="margin-left:+180px;">
													<select class="form-control" id="p3r" name="p3r">
															<option value=''></option>
															<?php //foreach($cmb_persa as $cmb_persa){
																//echo "<option value='".$cmb_persa->kd_persa."'>".$cmb_persa->persa." | ".$cmb_persa->kd_persa."</option>";	
															//}?>
													</select>
												</div>
											</div>
										</td>
										<td>
											<div class="form-group">
												<label class="col-sm-3 control-label" style="margin-left:20px;"></label>
												<div class="input-group" style="margin-left:+70px;">
													<button type="button" class="btn btn-primary" id="btn_search">Search</button>
												</div>
											</div>
										</td>
									</tr>							
								</table>
							</div>
						-->
						</div>
					</div>
					
					<form role="form" id="formid_skema">
					<div class="box-body">
						<div class="overlayyx" id="overlayyx">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
						<table id="listpolar" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39;">
								<tr>
									<th align="center">Nojo</th>
									<?php
									if( ($level==4) || ($level==2) ) { ?>
										<th align="center" >Area</th>
										<th align="center" >PersonalArea</th>
									<?php } else { ?>
										<th align="center">Area</th>
										<th align="center">PersonalArea</th>
									<?php } ?>
									<th align="center">Dokumen Skema</th>
									<th align="center">Dokumen BAK</th>
									<th align="center">Dokumen Lain</th>
									<th align="center">Creater</th>
									<th align="center">Last Update</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								/*
								if (count($transjos)){
									foreach($transjos as $key => $list){
										if( ($level==4) || ($level==2) )
										{
											if ($list['flag_manar'] == 1) {
												$btn = 'Approved MANAR';
												$stat = 'btn-success';
											} elseif ($list['flag_manar'] == 2) {
												$btn = 'Rejected MANAR';
												$stat = 'btn-danger';
											} 
											else
											{
												$btn = 'Approve';
												$stat = 'btn-warning';
											}
										}
										else
										{
											if ($list['flag_manar'] == 1) {
												$btn = 'Approved MANAR';
												$stat = 'btn-success';
											} elseif ($list['flag_manar'] == 2) {
												$btn = 'Rejected MANAR';
												$stat = 'btn-danger';
											} 
											else
											{
												$btn = 'Waiting Approval MANAR';
												$stat = 'btn-warning';
											}
										}
										echo "<tr>";
										echo "<td class='noj'>". $list['nojo'] ."</td>";
										if( ($level==4) || ($level==2) ) { 
											echo "<td class='bar' >". $list['n_area'] ."</td>";
											echo "<td class='bpa' >". $list['n_perar'] ."</td>";
										}
										else
										{
											echo "<td class='bar' style='display:none'>". $list['n_area'] ."</td>";
											echo "<td class='bpa' >". $list['n_perar'] ."</td>";
										}
										
										?>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['skema'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['skema']; ?> </a></td>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['bak'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['bak']; ?> </a></td>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['other'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['other']; ?> </a></td>
										<?php
										echo "<td>". $list['nama'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td class='tejo' style='display:none'>". $list['id'] ."</td>";
										echo "<td class='nojk' style='display:none'>". $list['nojo'] ."</td>";
										echo "<td class='keter' style='display:none'>". $list['ket_reject'] ."</td>";
										echo "<td class='ketcan' style='display:none'>". $list['ket_cancel'] ."</td>";
										echo "<td class='bare' style='display:none'>". $list['area'] ."</td>";
										echo "<td class='pare' style='display:none'>". $list['perar'] ."</td>";
										echo "
											<td>";
											if( ($level==4) || ($level==2) ) {
											echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btn . "</button>";
											}
											else
											{ ?>
												<button type='submit' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
											<?php }
											
										$abcde = 'sap';							
										if($list['flag_cancel_sap']=='1') 
										{
											echo "
											<button type='submit' class='btn btn-danger btn-block btn-xs btnholderz' id='btnholderz' data-toggle='modal' data-target='#ERModal'>Canceled SAP</button>
											";
											
											if ($level == 1){
												//echo "<a href='". base_url() . 'index.php/home/edit_skema_sk' . '/'  . $list['id'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
												echo "<a href='". base_url() . 'index.php/home/edit_all_skema' . '/' . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
											}
											
											if ($level == 2){
												if($regional==1)
												{
													echo "<a href='". base_url() . 'index.php/home/edit_all_skema' . '/' . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
												}
											}
											
											echo "</td>";
										}
										else
										{
											echo "</td>";
										}
										
										
										echo "</tr>";
									}
								}
								*/								
								?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
					</form>
					<!--
					<div class="overlay1" id="overlay1">
					  <i class="fa fa-refresh fa-spin"></i>
					</div>
					-->
					
					<div class="modal fade" id="GmyModal" role="dialog">
					  <div class="modal-dialog modal-info" id="modal-alert">
						 <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Approval</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal">
									<div class="box-body">
										<div class="form-group">
												<div id="labeljoz"></div>
										</div><!-- /.form group -->
									</div><!-- /.box-body -->
								</form><!-- /.form-horizontal -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclosed">Close</button>
								<div id="approvalbtn_sk"></div>
							</div>
						 </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.example-modal -->
					
					
					<div class="modal fade" id="UmyModal" role="dialog">
					  <div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
						 <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Detail JO</h4>
							</div>
							<div class="modal-body">
								<table id="listrincianx" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Area</th>
											<th>PersonalArea</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							</div>
						 </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.example-modal -->	
					
					
					
					
					
					<div class="modal fade" id="ERModal" role="dialog">
					  <div class="modal-dialog modal-info" id="modal-alert">
						 <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Keterangan Cancel</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" name="yrsimpan" id="yrsimpan" method="post">
									<div class="box-body">
										<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-desktop"></i>
													</div>
													<!--<input type="hidden" class="form-control pull-right" name="cnojo" id="cnojo">-->
													<textarea class="form-control" rows="5" name="yrcancel" id="yrcancel" /></textarea>
													
										</div><!-- /.input group -->
									</div><!-- /.box-body -->
								</form><!-- /.form-horizontal -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
								<!--<button type="submit" class="btn btn-outline" id="btn_simpan_cancel">Simpan</button>-->
							</div>
						 </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.example-modal -->	
				
				</div><!-- /.box -->
				
				
				
				
				<div class="box box-default" id="tar3">
					<!--<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="xsearchxy" placeholder="Search Area or NOJO or PersonalArea.." onkeypress="handle(event)"/>
							</div>
						</div>
					</div>-->
					
					<form role="form" id="formid_skema">
					<div class="box-body">
						<div class="overlayxy" id="overlayxy">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
						<table id="listpolarxy" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39;">
								<tr>
									<th align="center">Nojo</th>
									<?php
									if( ($level==4) || ($level==2) ) { ?>
										<th align="center" >Area</th>
										<th align="center" >PersonalArea</th>
									<?php } else { ?>
										<th align="center">Area</th>
										<th align="center">PersonalArea</th>
									<?php } ?>
									<th align="center">Dokumen Skema</th>
									<th align="center">Dokumen BAK</th>
									<th align="center">Dokumen Lain</th>
									<th align="center">Creater</th>
									<th align="center">Last Update</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div><!-- /.box-body -->
					</form>
					
					<div class="modal fade" id="VUmyModal" role="dialog">
					  <div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
						 <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Detail JO</h4>
							</div>
							<div class="modal-body">
								<table id="listrincianxy" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Area</th>
											<th>PersonalArea</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							</div>
						 </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.example-modal -->	
					
				</div><!-- /.box -->
				
				
				
				
			</section><!-- /.content -->
			
		<!-- </div> --><!-- /.container -->
		
	</div><!-- /.content-wrapper -->
	
	
	
<script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
$(".select2").select2();

$("#job_skills").select2({
	createSearchChoice:function(term, data) { 
		if ($(data).filter(function() { 
			return this.text.localeCompare(term)===0; 
		}).length===0) {
			return {id:term, text:term};
		} 
	},
	multiple: true,
	data: [
		<?php 
			foreach ($form_job_skills as $value) {
				echo "{id: ".$value->id.", text:'".$value->skill_name."'},";            
			}
		?>
	],
	separator: "|"
});

$("#job_benefits").select2({
	createSearchChoice:function(term, data) { 
		if ($(data).filter(function() { 
			return this.text.localeCompare(term)===0; 
		}).length===0) {
			return {id:term, text:term};
		} 
	},
	multiple: true,
	data: [
		<?php 
			foreach ($form_job_benefits as $value) {
				echo "{id: ".$value->id.", text:'".$value->name_benefits."'},";            
			}
		?>
	],
	separator: "|"
});
	
</script>

<script src="<?php echo base_url(); ?>public/plugins/datatables_new/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables_new/js/dataTables.bootstrap.min.js"></script>

<script>
	//var par = $("#formid").serialize();
$(function(){
	dataString = $("#formsrc").serializeArray();
	$("#listorder").DataTable().destroy();
	var mTable =
	$("#listorder").DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		bFilter: true,
		bLengthChange: false, 
		scrollX: true,
		ordering: true,
		bSort : true,
		ajax: {
		  url 		: "<?php echo base_url().'index.php/mapping/data_listorder3x';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		}, 
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		columnDefs: [
        { 
            "targets": [ 0,14,15,16,17,18,19  ], //first column / numbering column
            "bVisible": false, //set not orderable
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	
});

</script>
