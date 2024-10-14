<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>


<script type="text/javascript">
	$(function () {
		$(".select2").select2();
		$.fn.modal.Constructor.prototype.enforceFocus = $.noop;
		$.fn.dataTable.ext.errMode = 'none';
	//$(document).ready(function(){
		document.getElementById('expskm').setAttribute("style","display:none;");   
		$('#polo').hide();
		$('#zolo').hide();
		$('#xoverlay').hide();
		$('#overlayx').hide();
		$('#begda').datepicker({format: 'yyyy-mm-dd',startDate : '0', autoclose:true});
		$('#tcr1').datepicker({format: 'yyyy-mm-dd', autoclose:true});
		$('#tcr2').datepicker({format: 'yyyy-mm-dd', autoclose:true});
		$('#cartglcreat').datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months", autoclose:true});
		$('#cartglbek').datepicker({format: "mm-yyyy", startView: "months", minViewMode: "months", autoclose:true});
		
		var option = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": true,
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
		
		kTable = $('#listrincianx').dataTable(optionx);
		yTable = $('#listrincian').dataTable(option);
		eTable = $('#listrincianxy').dataTable(optionx);
		//xTable = $('#listorder').dataTable(option);
		zTable = $('#listdokumen').dataTable(option);
		dTable = $('#listdokumend').dataTable(option);
		vTable = $('#listpolar').dataTable(option);
		uTable = $('#listkomp').dataTable(option);
		luTable = $('#listpolarxy').dataTable(option);
		wTable = $('#listdokumenr').dataTable(optionx);
		sTable = $('#listperner').dataTable(optionx);
		pTable = $('#listproc').dataTable(optionx);  
		xTable = $('#listrincianw').dataTable(optionx);
		goTable = $('#listdetail').dataTable(optionx);
		go1Table = $('#listdetail_rep').dataTable(optionx);
		gojTable = $('#listgojobs').dataTable(optionx);
		gorTable = $('#listgojobs_rep').dataTable(optionx);
		rfcTable = $('#listdetailrfc').dataTable(optionx);
		rfcresTable = $('#listdetailrfc2').dataTable(optionx);
		// goTable = $('#listdeatil').dataTable(optionx);
		qTable = $('#listkompn').dataTable(option);
		ppTable = $('#listpolarpp').dataTable(option);
		$("#tar2").slideUp("slow");
		$("#tar3").slideUp("slow");
		$("#tar4").slideUp("slow");
		
		// $("#jenisskill").select2({
		// 	dropdownParent: $("#PmyModal"),
		// 	ajax: {
		// 		placeholder: "Cari Nama....",
		// 		allowClear: true,
		// 		url: "<?php echo base_url() ?>" + "index.php/home/xsearchar_skill",
		// 		dataType: 'json',
		// 		delay: 250,
		// 		data: function(params){
		// 			return {
		// 				q: params.term
		// 			};
		// 		},
		// 		processResults: function (data) {
		// 			 return {
		// 				  results: $.map(data, function(obj) {
		// 						//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
		// 						return { id: obj.PERSK, text: obj.PEKTX };
		// 				  })
		// 			 };
		// 		},
		// 	},
		// 	minimumInputLength: 2
		// });
		
		// $("#jenisjabatan").select2({
		// 	dropdownParent: $("#PmyModal"),
		// 	ajax: {
		// 		placeholder: "Cari Nama....",
		// 		allowClear: true,
		// 		url: "<?php echo base_url() ?>" + "index.php/home/xsearchar_jabatan",
		// 		dataType: 'json',
		// 		delay: 250,
		// 		data: function(params){
		// 			return {
		// 				q: params.term
		// 			};
		// 		},
		// 		processResults: function (data) {
		// 			 return {
		// 				  results: $.map(data, function(obj) {
		// 						//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
		// 						return { id: obj.kd_jabatan, text: obj.kd_jabatan+" ("+obj.jabatan+")" };
		// 				  })
		// 			 };
		// 		},
		// 	},
		// 	minimumInputLength: 2
		// });
		
		/*$("#jenislevel").select2({
			dropdownParent: $("#PmyModal"),
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar_level",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.TRFAR, text: obj.TRFAR_TXT };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});*/
		
		/*
		$("#jenisarea").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar_area",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.karea, text: obj.narea };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		
		$("#jenispersa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.personalarea, text: obj.personnal_area };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		*/
		
		
		$("#ar3").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar_area",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.karea, text: obj.narea };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		
		$("#p3r").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar_list",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.personalarea, text: obj.personnal_area };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		$("#btnexcel_skm").click(function(){
			var typeapp= $('#typeapp').val(); 
			url = "<?php echo base_url(); ?>index.php/home/reportexcel_skm/?typex="+typeapp;
			window.open(url,'_blank');
		});	
		
		$("#btn_excel").click(function(){
			// alert('Under Maintenance');
			// return false;
			var tcr1 	= $('#tcr1').val(); 
			var tcr2 	= $('#tcr2').val(); 
			var carpm 	= $('#carpm').val(); 
			var cardone = $('#cardone').val(); 
			var carnoj  = $('#carnoj').val(); 
			var carpro  = $('#carpro').val(); 
			var carlok  = $('#carlok').val(); 
			var carcreat= $('#carcreat').val(); 
			var carnobak= $('#carnobak').val(); 
			if(tcr1=='' || tcr2==''){
				alert("Range tanggal create harus di isi");return false;
			}
			// alert(carpm);
			url = "<?php echo base_url(); ?>index.php/home/report_excel/?cartgl1="+tcr1+"&cartgl2="+tcr2+"&caripm="+carpm+"&caridn="+cardone+"&carinbak="+carnobak+"&caripr="+carpro+"&carilk="+carlok+"&caricr="+carcreat+"&carinj="+carnoj;
			window.open(url,'_blank');
		});


		$("#donlot_dok").click(function(){
			// alert('Under Maintenance');
			var carpro  = $('#carpro').val(); 
			var carnobak= $('#carnobak').val(); 
			
			url = "<?php echo base_url(); ?>index.php/mapping/donlot_dokperal/?carinbak="+carnobak+"&caripr="+carpro;
			window.open(url,'_blank');
		});		
			
		
		
		$("#rbtn_simpan").click(function(){
			$('#overlay').show();
			var vnojo 	= $('#rnojo').val(); 
			var namaz 	= $('#rupd').val(); 
			var tjok 	= $('#rntype').val(); 
			var nid 	= $('#rid').val(); 
			var rket 	= $('#rket').val(); 
			var ruspm 	= $('#ruspm').val();
			var rdokpks = $('#rdokpks').val();
			var rpilpks = $('#rpilpks:checked').val();
			if(ruspm==''){
				$('#overlay').hide();
				alert("User PM harus di pilih, TerimaKasih");
				return false;
			}	
			var url	= "<?php echo base_url();?>index.php/home/m_simpantjo_rasap";
			arrappjo = [vnojo, nid, rket, tjok, namaz, ruspm, rpilpks, rdokpks];
			$.post(url, {arrappjo : arrappjo}, function(res){
				$('#overlay').hide();
				//alert(res);
				alert('Data Approved');
				location.reload();
			})
		});
		
		
		$("#rbtn_reject").click(function(){
			$('#overlay').show();
			var ket_status 	= $('#rket').val();			
			var rpilpks 	= $('#rpilpks:checked').val();
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
			var url	= "<?php echo base_url();?>index.php/home/m_rejectjo_rrsap";
			arrappjo = [vnojo, nid, rket, tjok, namaz, rpilpks];
			$.post(url, {arrappjo : arrappjo}, function(res){
				$('#overlay').hide();
				//alert(res);
				alert('Data Rejected');
				location.reload();
			})
		})
		
		
		
		
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
				$('#listrincianx').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});			
			})
		});
		
		
		$(".btnapp").click(function(){
			$('#listpolar').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var bar  = $row.find(".bar").text();
			var bpa  = $row.find(".bpa").text();
			var tejo = $row.find(".tejo").text();
			$("#xketx").val($row.find(".ketdon").text());
			
			if (btn == "Done"){
				$('#zolo').show();
				$("#labeljoz").html('<label class="control-label"> Sudah Ada Skema </label>');
				$("#approvalbtn_sk").html("");
			} 
			else 
			{
				$("#labeljoz").html('<label class="control-label"> Skema '+ bar +' -> '+ bpa +' sudah benar ?</label><textarea class="form-control" rows="3" id="ket_sk" name="ket_sk" placeholder="Keterangan..."/></textarea>');
				var appbtn1 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1_sk">Ya</button>'
				$("#approvalbtn_sk").html(appbtn1);
				
				$("#btnsimpan1_sk").click(function(){
					var tejo = $row.find(".noj").text();
					var ket 	= $('#ket_sk').val(); 
					var url	= "<?php echo base_url();?>index.php/home/simpan_skema_sk";
					arrappjo = [tejo, ket];
					$.post(url, {data : arrappjo}, function(res){
						alert('Data Sudah Mempunyai Skema');
						load_search();
					})
				})	
			}
		});
		
		
		$("#btn_simpan_cancel_sk").click(function(){
			if ($("#scancelz").val() == ""){alert ("Keterangan Cancel tidak boleh kosong"); return false;}
			dataString = $("#zsimpan").serialize();
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url();?>index.php/home/simpan_cancel_sap_sk",
				dataType	: "json",
				data		: dataString,
				success	: function(res){
					alert(res);
					$('#EGModal').modal('hide');
					load_search();
				}
			})
		})
				
		
		$("#typeapp").change(function(){
			  var ish 			= $('#typeapp').val();
			  if (ish == 'VARIABEL'){
				$('#overlayxy').show();
				document.getElementById('expskm').removeAttribute("style");	
				$("#tar1").slideUp("slow");
				$("#tar2").slideUp("slow");
				$("#tar3").slideDown("slow");
				
				var url = "<?php echo base_url(); ?>" + "index.php/home/vappjo_xlistjoxpm/";
				var dataarr = $('#xsearch').val();
				$.post(url, {dataarr:dataarr}, function(response){
					luTable.fnDestroy(); 
					$('#overlayxy').hide();
					$('#listpolarxy tbody').html(response);
					$('#listpolarxy').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
				})
				  
			  } else if (ish == 'SKEMA'){
				 $('#overlayyx').show();
				 document.getElementById('expskm').removeAttribute("style");	
			  	 $("#tar1").slideUp("slow");
				 $("#tar2").slideDown("slow");
				 $("#tar3").slideUp("slow");
				 
				var url = "<?php echo base_url(); ?>" + "index.php/home/listjox/";
				var dataarr = $('#xsearch').val();
				$.post(url, {dataarr:dataarr}, function(response){
					vTable.fnDestroy(); 
					$('#overlayyx').hide();
					$('#listpolar tbody').html(response);
					$('#listpolar').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
				})
			  } else if (ish == 'PP'){
				$('#ppoverlayxy').show();    
				document.getElementById('expskm').removeAttribute("style","display:none;");   
			  	$("#tar1").slideUp("slow");
				$("#tar2").slideUp("slow");
				$("#tar3").slideUp("slow");
				$("#tar4").slideDown("slow");
				
				var url = "<?php echo base_url(); ?>" + "index.php/rotasi/appjo_xlistjoppx/";
				var dataarr = $('#xsearch').val();
				$.post(url, {dataarr:dataarr}, function(response){
					ppTable.fnDestroy(); 
					$('#ppoverlayxy').hide();
					$('#listpolarpp tbody').html(response);
					$('#listpolarpp').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
				})
			  } else if (ish == 'N/R'){
				 document.getElementById('expskm').setAttribute("style","display:none;");   
			  	 $("#tar1").slideDown("slow");
				 $("#tar2").slideUp("slow");
				 $("#tar3").slideUp("slow");
			  }
		});
		
		
		$("#btn_search").click(function(){
			$('#overlay1').show();
			var ar3 	 = $('#ar3').val();
			var p3r 	 = $('#p3r').val();
			var searchx  = $('#xsearch').val();
			larr 		 = [ar3, p3r, searchx];
			var url = "<?php echo base_url(); ?>index.php/home/search_sk_sk/";
			$.post(url, {larr:larr}, function(response){
				vTable.fnDestroy();
				$('#overlay1').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			});
		});
		
		
		function load_search(){
			$('#overlay1').show();
			var ar3 	 = $('#ar3').val();
			var p3r 	 = $('#p3r').val();
			var t3r 	 = '1';
			var searchx  = $('#xsearch').val();
			larr 		 = [ar3, p3r, t3r];
			var url = "<?php echo base_url(); ?>index.php/home/search_sk_sk/";
			$.post(url, {larr:larr}, function(response){
				vTable.fnDestroy();
				$('#overlay1').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			});
		}
		
		// function vload_search(){
			// $('#overlayxy').show();
			// var ar3 	 = '';
			// var p3r 	 = '';
			// var t3r 	 = '2';
			// larr 		 = [ar3, p3r, t3r];
			// var url = "<?php echo base_url(); ?>index.php/home/search_sk/";
			// $.post(url, {larr:larr}, function(response){
				// luTable.fnDestroy();
				// $('#overlayxy').hide();
				// $('#listpolarxy tbody').html(response);
				// $('#listpolarxy').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			// });
		// }
		
		
		$("#btn_download").click(function(){
			window.location = $("#btn_download").val();			
		});
		
		$("#btndonlot").click(function(){
			window.location = $("#btndonlot").val();			
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
			if ($("#scancel").val() == ""){alert ("Keterangan Cancel tidak boleh kosong"); return false;}
			dataString = $("#csimpan").serialize();
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url();?>index.php/home/simpan_cancel_sap",
				dataType	: "json",
				data		: dataString,
				success	: function(res){
					   alert(res);
					   $('#EZModal').modal('hide');
					   $('#overlay').hide();
						location.reload();
				}
			})
		})
		
		
		$(".btnedit").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#idnojo").val($row.find(".id").text());
			$("#unojo").val($row.find(".nojo").text());
			$("#jabatan").val($row.find(".jabatan").text());
			$("#kelamin").val($row.find(".gender").text());
			$("#lokasi").val($row.find(".lokasi").text());
			$("#jumlah").val($row.find(".jumlah").text());
			$("#rekruting").val($row.find(".rekrut").text());
		})
		
		$(".btnkomentar").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#snojo").val($row.find(".nojo").text());
			$("#skomentar").val($row.find(".komentar").text());
		})
		
		
		$(".btndetail").click(function(){
			$('#listorder').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/trajo";
			$.post(url, {data : vnojo}, function(res){
				yTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincian tbody').html(res);
				$('#listrincian').dataTable(option);
			})
		});
		
		
		
		
		$(".btnholder").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#cnojoz").val($row.find(".noj").text());
			//$("#scancel").val($row.find(".cancel").text());
		});
		
		
		$(".btnholderz").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#yrcancel").val($row.find(".ketcan").text());
		});
		
		
		$(".vbtndetailx").click(function(){
			$('#listpolarxy').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".tejo").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/xtrajo";
			$.post(url, {data : vnojo}, function(res){
				eTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincianxy tbody').html(res);
				$('#listrincianxy').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});			
			})
		});
		
		
		$(".vbtnapp").click(function(){
				$('#listpolarxy').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var bar  = $row.find(".bar").text();
				var bpa  = $row.find(".bpa").text();
				var bare = $row.find(".bare").text();
				var pare = $row.find(".pare").text();
				var tejo = $row.find(".tejo").text();
				
				if (btn == "Approved"){
					$("#vlabeljoz").html('<label class="control-label"> Sudah diapprove </label>');
					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Waiting Approval"){
					$("#vlabeljoz").html('<label class="control-label"> Waiting Approval MANAR </label>');
					
					$('#listpolarxy').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var keter = $row.find(".keter").text();
					
					$("#ket_app").val(keter);
					
					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Rejected"){
					$("#vlabeljoz").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app"/></textarea>');
					
					$('#listpolarxy').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var keter = $row.find(".keter").text();
					
					$("#ket_app").val(keter);
					
					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Approve"){
					$("#vlabeljoz").html('<label class="control-label"> Anda akan menyetujui Penyesuaian Variabel '+ tejo +' </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app" placeholder="Alasan Reject..."/></textarea>');
					var appbtn = '<button type="button" class="btn btn-outline btnrez" id="btnrez">Reject</button><button type="button" class="btn btn-outline btnappro" id="btnappro">Approve</button>';
					$("#vapprovalbtn_sk").html(appbtn);
					
					$("#btnappro").click(function(){
						$('#overlayxy').show();
						var tejo 		= $row.find(".tejo").text();
						var ket_appro 	= $('#ket_app').val(); 
						var bar  		= $row.find(".bar").text();
						var bpa  		= $row.find(".bpa").text();
						var bare 		= $row.find(".bare").text();
						var pare 		= $row.find(".pare").text();
						var url	= "<?php echo base_url();?>index.php/home/s_skpm";
						arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
						$.post(url, {arrappjol : arrappjol}, function(res){
							$('#overlayxy').hide();
							alert('Data Berhasil Di Approve');
							$('#VGmyModal').modal('hide');
							// vload_search();
							location.reload();
						})
					});	
					
					
					$("#btnrez").click(function(){
						$('#overlayxy').show();
						var ket_appro = $('#ket_app').val(); 
						if(ket_appro == ""){
							$('#overlayxy').hide();
							alert("Keterangan Status Tidak Boleh Kosong !!");
							return false;
						}
						
						var tejo 		= $row.find(".tejo").text();
						var bar  		= $row.find(".bar").text();
						var bpa  		= $row.find(".bpa").text();
						var bare 		= $row.find(".bare").text();
						var pare 		= $row.find(".pare").text();
						var url	= "<?php echo base_url();?>index.php/home/r_sk";
						arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
						$.post(url, {arrappjol : arrappjol}, function(res){
							$('#overlayxy').hide();
							alert('Data Berhasil Di Reject');
							$('#VGmyModal').modal('hide');
							// vload_search();
							location.reload();
						})
					});	
				}
			});
			
		
		luTable.on( 'draw.dt', function () {	
			$(".vbtndetailx").click(function(){
				$('#listpolarxy').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var vnojo = $row.find(".tejo").text();
				$("#inojo").val(vnojo);
				var url	= "<?php echo base_url();?>index.php/home/xtrajo";
				$.post(url, {data : vnojo}, function(res){
					eTable.fnDestroy();
					$('#overlay').hide();
					$('#listrincianxy tbody').html(res);
					$('#listrincianxy').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});			
				})
			});
			
			$(".vbtnapp").click(function(){
				$('#listpolarxy').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var bar  = $row.find(".bar").text();
				var bpa  = $row.find(".bpa").text();
				var bare = $row.find(".bare").text();
				var pare = $row.find(".pare").text();
				var tejo = $row.find(".tejo").text();
				
				if (btn == "Approved"){
					$("#vlabeljoz").html('<label class="control-label"> Sudah diapprove </label>');
					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Waiting Approval"){
					$("#vlabeljoz").html('<label class="control-label"> Waiting Approval MANAR </label>');
					
					$('#listpolarxy').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var keter = $row.find(".keter").text();
					
					$("#ket_app").val(keter);
					
					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Rejected"){
					$("#vlabeljoz").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app"/></textarea>');
					
					$('#listpolarxy').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var keter = $row.find(".keter").text();
					
					$("#ket_app").val(keter);
					
					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Approve"){
					$("#vlabeljoz").html('<label class="control-label"> Anda akan menyetujui Penyesuaian Variabel '+ tejo +' </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app" placeholder="Alasan Reject..."/></textarea>');
					var appbtn = '<button type="button" class="btn btn-outline btnrez" id="btnrez">Reject</button><button type="button" class="btn btn-outline btnappro" id="btnappro">Approve</button>';
					$("#vapprovalbtn_sk").html(appbtn);
					
					$("#btnappro").click(function(){
						$('#overlayxy').show();
						var tejo 		= $row.find(".tejo").text();
						var ket_appro 	= $('#ket_app').val(); 
						var bar  		= $row.find(".bar").text();
						var bpa  		= $row.find(".bpa").text();
						var bare 		= $row.find(".bare").text();
						var pare 		= $row.find(".pare").text();
						var url	= "<?php echo base_url();?>index.php/home/s_skpm";
						arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
						$.post(url, {arrappjol : arrappjol}, function(res){
							$('#overlayxy').hide();
							alert('Data Berhasil Di Approve');
							$('#VGmyModal').modal('hide');
							// vload_search();
							location.reload();
						})
					});	
					
					
					$("#btnrez").click(function(){
						$('#overlayxy').show();
						var ket_appro = $('#ket_app').val(); 
						if(ket_appro == ""){
							$('#overlayxy').hide();
							alert("Keterangan Status Tidak Boleh Kosong !!");
							return false;
						}
						
						var tejo 		= $row.find(".tejo").text();
						var bar  		= $row.find(".bar").text();
						var bpa  		= $row.find(".bpa").text();
						var bare 		= $row.find(".bare").text();
						var pare 		= $row.find(".pare").text();
						var url	= "<?php echo base_url();?>index.php/home/r_sk";
						arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
						$.post(url, {arrappjol : arrappjol}, function(res){
							$('#overlayxy').hide();
							alert('Data Berhasil Di Reject');
							$('#VGmyModal').modal('hide');
							// vload_search();
							location.reload();
						})
					});	
				}
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
						$('#listrincianx').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});			
					})
				});
				
				$(".btnapp").click(function(){
					$('#listpolar').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var bar  = $row.find(".bar").text();
					var bpa  = $row.find(".bpa").text();
					var tejo = $row.find(".tejo").text();
					var yyy = $row.find(".ketdone").text();
					
					$("#xketx").val($row.find(".ketdon").text());
					
					if (btn == "Done"){
						$('#zolo').show();
						$("#labeljoz").html('<label class="control-label"> Sudah Ada Skema </label>');
						$("#approvalbtn_sk").html("");
					} 
					else 
					{
						$("#labeljoz").html('<label class="control-label"> Skema '+ bar +' -> '+ bpa +' sudah benar ?</label><br><textarea class="form-control" rows="3" id="ket_sk" name="ket_sk" placeholder="Keterangan..."/></textarea>');
						var appbtn1 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1_sk">Ya</button>'
						$("#approvalbtn_sk").html(appbtn1);
						
						$("#btnsimpan1_sk").click(function(){
							var tejo = $row.find(".noj").text();
							var ket 	= $('#ket_sk').val(); 
							var url	= "<?php echo base_url();?>index.php/home/simpan_skema_sk";
							arrappjo = [tejo, ket];
							$.post(url, {data : arrappjo}, function(res){
								alert('Data Sudah Mempunyai Skema');
								load_search();
							})
						})	
					}
				});
				
				
				$("#btn_simpan_cancel_sk").click(function(){
					if ($("#scancelz").val() == ""){alert ("Keterangan Cancel tidak boleh kosong"); return false;}
					dataString = $("#zsimpan").serialize();
					
					$.ajax({
						type 		: "POST",
						url		: "<?php echo base_url();?>index.php/home/simpan_cancel_sap_sk",
						dataType	: "json",
						data		: dataString,
						success	: function(res){
							alert(res);
							$('#EGModal').modal('hide');
							load_search();
						}
					})
				})
				
				
				$(".btnholder").click(function(){
					btn = $(this).html();
					var $row = $(this).closest("tr");
					$("#cnojoz").val($row.find(".noj").text());
					//$("#scancel").val($row.find(".cancel").text());
				});
				
				
				$(".btnholderz").click(function(){
					btn = $(this).html();
					var $row = $(this).closest("tr");
					$("#yrcancel").val($row.find(".ketcan").text());
				})
		});
		
		
		
		
		$(".btndetkomx").click(function(){
			$('#listrincianw').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var vjab = $row.find(".kjab").text();
			var vlok = $row.find(".klok").text();
			console.log(vnojo);console.log(vjab);console.log(vlok);
			larr 		 = [vnojo, vjab, vlok];
			var url	= "<?php echo base_url();?>index.php/home/detkom";
			$.post(url, {larrx : larr}, function(res){
				qTable.fnDestroy();
				$('#overlay').hide();                     
				$('#listkompn tbody').html(res);
				$('#listkompn').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
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
				console.log(vnojo);console.log(vjab);console.log(vlok);
				larr 		 = [vnojo, vjab, vlok];
				var url	= "<?php echo base_url();?>index.php/home/detkom";
				$.post(url, {larrx : larr}, function(res){
					qTable.fnDestroy();
					$('#overlay').hide();
					$('#listkompn tbody').html(res);
					$('#listkompn').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
				})
			});
		});
		
		
		$(".ppbtnapp").click(function(){
			$('#listpolarpp').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var ppid  	= $row.find(".ppid").text();
			var persaid = $row.find(".persaid").text();
			var ppnoj 	= $row.find(".noj").text();
			var ppbtn 	= $row.find(".ppbtn").text();
			var ket_ats	= $row.find(".ppk_atasan").text();
			var ket_pm	= $row.find(".ppk_pm").text();
			var cekapp	= $row.find(".cekapp").text();
			
			if (btn == "Approved"){
				$("#ppvlabeljoz").html('<label class="control-label"> '+ppbtn+' </label>');
				$("#ppapprovalbtn_sk").html("");
			} else if (btn == "Waiting Approval"){
				$("#ppvlabeljoz").html('<label class="control-label"> '+ppbtn+' </label>');
				$("#ppapprovalbtn_sk").html("");
			} else if (btn == "Rejected"){
				if(ppbtn=="Rejected PM"){
					$("#ppvlabeljoz").html('<label class="control-label"> JO ditolak PM </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app"/></textarea>');
				} else if(ppbtn=="Rejected Atasan") {
					$("#ppvlabeljoz").html('<label class="control-label"> JO ditolak Atasan </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app"/></textarea>');
				}
				
				if(ppbtn=="Rejected Atasan"){
					$("#ppket_app").val(ket_ats);
				} else if(ppbtn=="Rejected PM") {
					$("#ppket_app").val(ket_pm);
				}
				$("#ppapprovalbtn_sk").html("");
			} else if (btn == "Approve"){
				$("#ppvlabeljoz").html('<label class="control-label"> Anda akan menyetujui Perpanjangan Project '+ persaid +' </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline ppbtnrez" id="ppbtnrez">Reject</button><button type="button" class="btn btn-outline ppbtnappro" id="ppbtnappro">Approve</button>';
				$("#ppapprovalbtn_sk").html(appbtn);
				
				$("#ppbtnappro").click(function(){
					$('#ppoverlayxy').show();
					var ppid 		= $row.find(".ppid").text();
					var ppket_app 	= $('#ppket_app').val(); 
					if(ppket_app == ""){
						$('#ppoverlayxy').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}
					
					var url	= "<?php echo base_url();?>index.php/rotasi/spp";
					arrappjol = [ppid, ppket_app, persaid, ppnoj, cekapp];
					$.post(url, {arrappjol : arrappjol}, function(res){
						$('#ppoverlayxy').hide();
						alert('Data Berhasil Di Approve');
						$('#PPGmyModal').modal('hide');
						ppTable.fnDestroy(); 
						$('#ppoverlayxy').hide();
						$('#listpolarpp tbody').html(res);
						$('#listpolarpp').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});	
					})
				});	
				
				
				$("#ppbtnrez").click(function(){
					$('#ppoverlayxy').show();
					var ppid 		= $row.find(".ppid").text();
					var ppket_app = $('#ppket_app').val(); 
					if(ppket_app == ""){
						$('#ppoverlayxy').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}
					
					var url	= "<?php echo base_url();?>index.php/rotasi/rpp";
					arrappjol = [ppid, ppket_app, persaid, ppnoj, cekapp];
					$.post(url, {arrappjol : arrappjol}, function(res){
						$('#ppoverlayxy').hide();
						alert('Data Berhasil Di Reject');
						$('#PPGmyModal').modal('hide');
						ppTable.fnDestroy(); 
						$('#ppoverlayxy').hide();
						$('#listpolarpp tbody').html(res);
						$('#listpolarpp').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});	
					})
				});	
			}
		});
		
		ppTable.on( 'draw.dt', function () {	
			$(".ppbtnapp").click(function(){
				$('#listpolarpp').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var ppid  	= $row.find(".ppid").text();
				var persaid = $row.find(".persaid").text();
				var ppnoj 	= $row.find(".noj").text();
				var ppbtn 	= $row.find(".ppbtn").text();
				var ket_ats	= $row.find(".ppk_atasan").text();
				var ket_pm	= $row.find(".ppk_pm").text();
				var cekapp	= $row.find(".cekapp").text();
				
				if (btn == "Approved"){
					$("#ppvlabeljoz").html('<label class="control-label"> '+ppbtn+' </label>');
					$("#ppapprovalbtn_sk").html("");
				} else if (btn == "Waiting Approval"){
					$("#ppvlabeljoz").html('<label class="control-label"> '+ppbtn+' </label>');
					$("#ppapprovalbtn_sk").html("");
				} else if (btn == "Rejected"){
					if(ppbtn=="Rejected PM"){
						$("#ppvlabeljoz").html('<label class="control-label"> JO ditolak PM </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app"/></textarea>');
					} else if(ppbtn=="Rejected Atasan") {
						$("#ppvlabeljoz").html('<label class="control-label"> JO ditolak Atasan </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app"/></textarea>');
					}
					
					if(ppbtn=="Rejected Atasan"){
						$("#ppket_app").val(ket_ats);
					} else if(ppbtn=="Rejected PM") {
						$("#ppket_app").val(ket_pm);
					}
					$("#ppapprovalbtn_sk").html("");
				} else if (btn == "Approve"){
					$("#ppvlabeljoz").html('<label class="control-label"> Anda akan menyetujui Perpanjangan Project '+ persaid +' </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app" placeholder="Alasan Reject..."/></textarea>');
					var appbtn = '<button type="button" class="btn btn-outline ppbtnrez" id="ppbtnrez">Reject</button><button type="button" class="btn btn-outline ppbtnappro" id="ppbtnappro">Approve</button>';
					$("#ppapprovalbtn_sk").html(appbtn);
					
					$("#ppbtnappro").click(function(){
						$('#ppoverlayxy').show();
						var ppid 		= $row.find(".ppid").text();
						var ppket_app 	= $('#ppket_app').val(); 
						if(ppket_app == ""){
							$('#ppoverlayxy').hide();
							alert("Keterangan Status Tidak Boleh Kosong !!");
							return false;
						}
						
						var url	= "<?php echo base_url();?>index.php/rotasi/spp";
						arrappjol = [ppid, ppket_app, persaid, ppnoj, cekapp];
						$.post(url, {arrappjol : arrappjol}, function(res){
							$('#ppoverlayxy').hide();
							alert('Data Berhasil Di Approve');
							$('#PPGmyModal').modal('hide');
							ppTable.fnDestroy(); 
							$('#ppoverlayxy').hide();
							$('#listpolarpp tbody').html(res);
							$('#listpolarpp').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});	
						})
					});	
					
					
					$("#ppbtnrez").click(function(){
						$('#ppoverlayxy').show();
						var ppid 		= $row.find(".ppid").text();
						var ppket_app = $('#ppket_app').val(); 
						if(ppket_app == ""){
							$('#ppoverlayxy').hide();
							alert("Keterangan Status Tidak Boleh Kosong !!");
							return false;
						}
						
						var url	= "<?php echo base_url();?>index.php/rotasi/rpp";
						arrappjol = [ppid, ppket_app, persaid, ppnoj, cekapp];
						$.post(url, {arrappjol : arrappjol}, function(res){
							$('#ppoverlayxy').hide();
							alert('Data Berhasil Di Reject');
							$('#PPGmyModal').modal('hide');
							ppTable.fnDestroy(); 
							$('#ppoverlayxy').hide();
							$('#listpolarpp tbody').html(res);
							$('#listpolarpp').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});	
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
				xTable.fnDestroy(); 
				$('#overlay').hide();
				$('#listorder tbody').html(response);
				$('#listorder').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
	}	



	function handlex(e){
		var xTable = $('#listpolar').dataTable({
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": true,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false,
			"scrollX": true,
			"bJQueryUI": false  
		});

		if(e.keyCode === 13){
			var url = "<?php echo base_url(); ?>" + "index.php/home/listjox/";
			var dataarr = $('#xsearch').val();
			$.post(url, {dataarr:dataarr}, function(response){
				vTable.fnDestroy(); 
				$('#overlay').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
	}
	
</script>


<script type="text/javascript">
function bdok(nojo){
	var vnojo = nojo;
	var url	= "<?php echo base_url();?>index.php/home/ztrajo";
	$.post(url, {data : vnojo}, function(res){
		zTable.fnDestroy();
		$('#overlay').hide();
		$('#listdokumen tbody').html(res);
		$('#listdokumen').dataTable({"bRetrieve": true,"bServerside": true,"bProcessing": true,"bPaginate": true,"bLengthChange": false,"bFilter": false,"bSort": true,"bInfo": true,"bAutoWidth": false,"scrollX": true,"bJQueryUI": false});
	})
};


function bhold(nojo){
	$("#cnojo").val(nojo);
};


function bholded(ketcan){
	$("#ycancel").val(ketcan);
};


function desk(xkid, deskrip){
	document.getElementById("cekdesk").value = deskrip;
};


function cek(xkid, xtype){
	$('#rfcoverlayxgg').show();
	if(xtype==1){
		$('#datares').hide();
		var url	= "<?php echo base_url();?>index.php/home/detrfc";
		$.post(url, {data : xkid, xtypex : xtype}, function(res){
			rfcTable.fnDestroy();
			$('#rfcoverlayxgg').hide();
			$('#listdetailrfc tbody').html(res);
			$('#listdetailrfc').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bInfo":false, "bPaginate": false});
		});
	} else {
		$('#datares').show();
		var url	= "<?php echo base_url();?>index.php/home/detrfc";
		$.post(url, {data : xkid, xtypex : xtype}, function(res){
			rfcTable.fnDestroy();
			$('#rfcoverlayxgg').hide();
			$('#listdetailrfc tbody').html(res);
			$('#listdetailrfc').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bInfo":false, "bPaginate": false});
		});
		
		var url	= "<?php echo base_url();?>index.php/home/detrfc_res";
		$.post(url, {data : xkid, xtypex : xtype}, function(res){
			rfcresTable.fnDestroy();
			$('#rfcoverlayxgg').hide();
			$('#listdetailrfc2 tbody').html(res);
			$('#listdetailrfc2').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bInfo":false, "bPaginate": false});
		});
	}
	
};


function gojobs(xkid, tyjo){
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


function badd(xkid, xnojo, xkdone, xkpro, xknpro, xknlok, xklok, btn, zparam, xjabatan, xskill, ketcan, tyjo, cuk, ntype, upd, alev, lev_sap, persa_sap, skill_sap, area_sap, jab_sap, skema_sap, abkrs_sap, jpro_sap, kontrakh, dekomp, jnew, new_trep, pernernorek, nreason){
	// console.log(xkid);console.log(xnojo);console.log(xkdone);
	// console.log(xkpro);console.log(xknpro);console.log(xknlok);
	// console.log(xklok);console.log(btn);console.log(zparam);
	// console.log(xjabatan);console.log(xskill);console.log(ketcan);
	// console.log(tyjo);console.log(cuk);console.log(ntype);
	// console.log(upd);console.log(alev);console.log(lev_sap);
	// console.log(persa_sap);console.log(skill_sap);console.log(area_sap);
	// console.log(jab_sap);console.log(skema_sap);console.log(abkrs_sap);
	// console.log(jpro_sap);console.log(kontrakh);console.log(dekomp);
	// console.log(jnew);console.log(new_trep);console.log(pernernorek);
	// console.log(nreason);
	// alert('tes');
	// alert(btn);
	//console.log(anj);
	$('#overlayx').show();     
	$('#xoverlay').show();
	var vnojo = xkid;
	var gnojo = xnojo;
	//var abc = xkdone; 
	var kpro = xkpro; 
	var knpro = xknpro;
	var knlok = xknlok;
	var klok = xklok;
	var skill = xskill;
	
	
	if(tyjo==2){
		$("#rnojo").val(xnojo);
		$("#rupd").val(upd);
		$("#rntype").val(ntype);
		$("#rid").val(xkid);
	}
	else 
	{
		$("#nnojo").val(xnojo);
		$("#nupd").val(upd);
		$("#nntype").val(ntype);
		$("#nid").val(xkid);
	}
	
	
	if(tyjo==1){
		if(new_trep==3){
			$('#divpnorekrut').show();
			$('#divreason').show();
			$("#pnorek").val(pernernorek);
			$("#reasonv").val(nreason);
			// $('#divalasanrot').show();
			// $('#divtrfgb').show();
			// $('#divjk').show();
			$('#divalasanrot').hide();
			$('#divtrfgb').hide();
			$('#divjk').hide();
		} else {
			$('#divpnorekrut').hide();
			$('#divreason').hide();
			$('#divalasanrot').hide();
			$('#divtrfgb').hide();
			$('#divjk').hide();
		}
	}
	
	
	if(tyjo==2){
		var vid = xkid;
		var url	= "<?php echo base_url();?>index.php/home/det_per_id";
		$.post(url, {data : vid}, function(res){
			sTable.fnDestroy();
			$('#overlay').hide();
			$('#listperner tbody').html(res);
			$('#listperner').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
		})	
		
		var vnojo = xnojo;
		var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		$.post(url, {data : vnojo}, function(res){
			wTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumenr tbody').html(res);
			$('#listdokumenr').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
		})
	}
	else
	{
		// var vid = [xkid, cuk];
		// var url	= "<?php echo base_url();?>index.php/home/trajo_id";
		// $.post(url, {data : vid}, function(res){
			// xTable.fnDestroy();
			// $('#overlay').hide();
			// $('#listrincianw tbody').html(res);
			// $('#listrincianw').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
		// })
		
		// var vnojo = xnojo;
		// var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		// $.post(url, {data : vnojo}, function(res){
			// wTable.fnDestroy();
			// $('#overlay').hide();
			// $('#listdokumenr tbody').html(res);
			// $('#listdokumenr').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
		// });
		
		// var url	= "<?php echo base_url();?>index.php/home/zproc";
		// $.post(url, {data : vnojo}, function(res){
			// pTable.fnDestroy();
			// $('#overlay').hide();
			// $('#listproc tbody').html(res);
			// $('#listproc').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
		// });
		
		// var url	= "<?php echo base_url();?>index.php/home/kokok";
		// $.post(url, {data : vnojo}, function(res){
			// $("#koko").html(res);
		// });
		
		// var url	= "<?php echo base_url();?>index.php/home/data_train";
		// $.post(url, {data : xkid}, function(res){
			// $('#hide_train').html(res);
		// })
	}
	
	
	//alert(skill);
	$("#ketx").val(xkdone);
	$("#zparamet").val(zparam);
	if (btn == "Done" || btn == "Stop Fulfilled" || btn == "Stop Not Fulfilled"){
		$('#divstop').show();
		$('#polo').show();
		if(tyjo==2){
			$("#rket").val(xkdone);
		}
		else 
		{
			$("#oscancel").val(xkdone);
			// $("#jenispersa").val(persa_sap);
			// $("#jenispay").val(abkrs_sap);
			// $("#jenisskill").val(skill_sap);
			// $("#det_area").val(area_sap);
			// $("#jenisjabatan").val(jab_sap);
			// $("#jenislevel").val(lev_sap);
			// $("#jenisproject").val(jpro_sap);
			// $("#zskema").val(skema_sap);
		}
		
		$("#labeljo").html('<center><label class="control-label"> Sudah Ada Skema </label><center>');		
		document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
		document.getElementById('rbtn_reject').setAttribute("style","display:none;");
		$.ajax({
			type 		: "POST",
			url		: "<?php echo base_url('index.php/home/detail_komp/');?>",
			//dataType	: "json",
			data		: {anojo:xnojo, alokasi:xklok, ajabatan:xjabatan, alvl:alev, askill:xskill, adekomp:dekomp},
			success	: function(res){
				uTable.fnDestroy(); 
				$('#overlayx').hide();
				$('#xoverlay').hide();
				$('#listkomp tbody').html(res);
				$('#listkomp').dataTable({"bFilter": true, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});		
			}
		});
		
		var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		$.post(url, {data : gnojo}, function(res){
			dTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumend tbody').html(res);
			$('#listdokumend').dataTable({"bRetrieve": true,"bServerside": true,"bProcessing": true,"bPaginate": false,"bLengthChange": false,"bFilter": false,"bSort": true,"bInfo": false,"bJQueryUI": false});
		});
		
		
		$("#det_nojo").val(gnojo);
		$("#det_id").val(xkid);
		
		if(knpro=='')
		{
			$("#det_persa").val('');
		}
		else
		{
			$("#det_persa").val(kpro);
		}
		$("#det_area").val(klok).trigger('change');
		// $("#jenispersa").val(knpro);
		$('#jenisskill').val(skill).trigger('change');
		$("#jenispersa").val(persa_sap).trigger('change');
		$("#jenispay").val(abkrs_sap).trigger('change');
		$("#jenisskill").val(skill_sap).trigger('change');
		$("#det_area").val(area_sap).trigger('change');
		$("#jenisjabatan").val(jab_sap).trigger('change');
		$("#jenislevel").val(lev_sap).trigger('change');
		$("#jenisproject").val(jpro_sap).trigger('change');
		$("#zskema").val(skema_sap).trigger('change');
		if(knpro=='')
		{
			document.getElementById("jenispersa").removeAttribute("readonly");
		}
		else
		{
			document.getElementById("jenispersa").setAttribute("readonly", true);
		}
		
		var appbtn1 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnstop">Stop</button>';
		// $("#approvalbtn").html(appbtn1);
		$("#approvalbtn").html("");
		
		$("#btnstop").click(function(){
			if ($("#osstop").val() == ""){alert ("Keterangan Stop Pemenuhan tidak boleh kosong"); return false;}
			var vid 	= $('#det_id').val(); 
			var sstop	= $('#osstop').val(); 
			var url	= "<?php echo base_url();?>index.php/home/simpan_stop";
			arrappjo = [vid, sstop];
			$.post(url, {data : arrappjo}, function(res){
				alert('Data Stoped');
				location.reload();
			})
		});
		
	} 
	else if (btn == "Canceled"){
		$('#divstop').hide();
		$('#polo').show();
		if(tyjo==2){
			$("#rket").val(ketcan);
		}
		else 
		{
			$("#oscancel").val(ketcan);
		}
		
		$("#labeljo").html('<center><label class="control-label"> Skema Canceled </label><center>');
		$("#approvalbtn").html("");
		document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
		document.getElementById('rbtn_reject').setAttribute("style","display:none;");
		$.ajax({
			type 		: "POST",
			url		: "<?php echo base_url('index.php/home/detail_komp/');?>",
			//dataType	: "json",
			data		: {anojo:xnojo, alokasi:xklok, ajabatan:xjabatan, alvl:alev, askill:xskill, adekomp:dekomp},
			success	: function(res){
				uTable.fnDestroy(); 
				$('#overlayx').hide();
				$('#xoverlay').hide();
				$('#listkomp tbody').html(res);
				$('#listkomp').dataTable({"bFilter": true, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});		
			}
		});
		
		var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		$.post(url, {data : gnojo}, function(res){
			dTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumend tbody').html(res);
			$('#listdokumend').dataTable({"bRetrieve": true,"bServerside": true,"bProcessing": true,"bPaginate": false,"bLengthChange": false,"bFilter": false,"bSort": true,"bInfo": false,"bJQueryUI": false});
		});
		
		$("#det_nojo").val(gnojo);
		$("#det_id").val(xkid);
		
		if(knpro=='')
		{
			$("#det_persa").val('');
		}
		else
		{
			$("#det_persa").val(kpro);
		}
		$("#det_area").val(klok).trigger('change');
		$("#jenispersa").val(knpro);
		$('#jenisskill').val(skill).trigger('change');
		if(knpro=='')
		{
			document.getElementById("jenispersa").removeAttribute("readonly");
		}
		else
		{
			document.getElementById("jenispersa").setAttribute("readonly", true);
		}
	} 
	else 
	{
		$('#divstop').hide();
		$('#polo').show();
		$("#oscancel").val('');
		$("#rket").val('');
		document.getElementById('rbtn_simpan').removeAttribute("style");
		document.getElementById('rbtn_reject').removeAttribute("style");
		$.ajax({
			type 		: "POST",
			url		: "<?php echo base_url('index.php/home/detail_komp/');?>",
			//dataType	: "json",
			data		: {anojo:xnojo, alokasi:xklok, ajabatan:xjabatan, alvl:alev, askill:xskill, adekomp:dekomp},
			success	: function(res){
				uTable.fnDestroy(); 
				$('#overlayx').hide();
				$('#xoverlay').hide();
				$('#listkomp tbody').html(res);
				$('#listkomp').dataTable({"bFilter": true, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});		
			}
		})
		
		
		var url	= "<?php echo base_url();?>index.php/home/ztrajo";
		$.post(url, {data : gnojo}, function(res){ 
			dTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumend tbody').html(res);
			$('#listdokumend').dataTable({"bRetrieve": true,"bServerside": true,"bProcessing": true,"bPaginate": false,"bLengthChange": false,"bFilter": false,"bSort": true,"bInfo": false,"bJQueryUI": false});
		})
		
		
		$("#det_nojo").val(gnojo);
		$("#det_id").val(xkid);
		//$("#jenisarea").val(knlok);
		//alert(knlok);alert(klok);
		//$("#det_persa").val(kpro);
		
		if(knpro=='')
		{
			$("#det_persa").val('');
		}
		else
		{
			$("#det_persa").val(kpro);
		}
		$("#det_area").val(klok).trigger('change');
		// $("#jenispersa").val(knpro);
		$("#jenispersa").val(xkpro).trigger('change');
		$('#jenisskill').val(skill).trigger('change');
		if(knpro=='')
		{
			document.getElementById("jenispersa").removeAttribute("readonly");
		}
		else
		{
			document.getElementById("jenispersa").setAttribute("readonly", true);
		}
		
		$("#labeljo").html('<center><label class="control-label"> Anda telah membuat skema No '+ gnojo +'</label></center>');
		if(jnew=='INF'){
			var appbtn1 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan2">Go Rekrut</button>';
		} else {
			var appbtn1 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Done</button>';
		}
		
		$("#approvalbtn").html(appbtn1);
		
		$("#btnsimpan2").click(function(){
			var vnojo 			= $('#det_nojo').val(); 
			var vid 			= $('#det_id').val();

			var zskema 			= $('#zskema').val();  
			var det_area		= $('#det_area').val(); 
			var jenisarea 		= $('#det_area :selected').text();
			var jenispersa 		= $('#jenispersa').val(); 
			var det_persa		= $('#det_persa').val(); 
			var jenisskill 		= $('#jenisskill').val(); 
			var n_jenisskill	= $('#jenisskill :selected').text();
			var jenisjabatan 	= $('#jenisjabatan').val(); 
			var n_jenisjabatan	= $('#jenisjabatan :selected').text();
			var jenislevel	 	= $('#jenislevel').val(); 
			var n_jenislevel	= $('#jenislevel :selected').text();
			var jenisproject	= $('#jenisproject').val(); 
			var n_jenisproject	= $('#jenisproject :selected').text();
			var jenispay		= $('#jenispay').val(); 
			var scancel 		= $('#oscancel').val();
			var uspm	 		= $('#uspm').val();
			var jkontrak	 	= $('#jkontrak').val();
			var trfgb	 		= $('#trfgb').val();
			var alasanrot 		= $('#alasanrot').val();
			var udiv	 		= $('#udiv').val();
			var ndokpks	 		= $('#ndokpks').val();
			var npilpks 		= $('#npilpks:checked').val();
			/*
			if(jenispersa==''){
				alert('PersonalArea harus diisi..');
				return false;
			}
			
			if(jenispay==''){
				alert('PayrollArea harus diisi..');
				return false;
			}
			
			if(jenisskill==''){
				alert('Skilllayanan harus diisi..');
				return false;
			}
			
			if(jenislevel==''){
				alert('Level harus diisi..');
				return false;
			}
			
			if(jenisproject==''){
				alert('Jenis Project harus diisi..');
				return false;
			}
			*/
			
			if(det_area==''){
				alert('Level harus diisi..');
				return false;
			}
			
			if(jenisjabatan==''){
				alert('Jabatan harus diisi..');
				return false;
			}
			
			if(uspm==''){
				alert('User PM harus diisi..');
				return false;
			}
			
			if(udiv==''){
				alert('Divisi harus diisi..');
				return false;
			}
			
			// if(zskema==''){
				// alert('Skema harus diisi..');
				// return false;
			// }	

			var url	= "<?php echo base_url();?>index.php/home/simpan_skemainf";
			// arrappjo = [vnojo, vid, scancel];
			arrappjo = [vnojo, vid, jenisarea, det_area, jenispersa, det_persa, jenisskill, n_jenisskill, jenisjabatan, jenislevel, n_jenislevel, jenisproject, n_jenisproject, zskema, scancel, jenispay, n_jenisjabatan, uspm, jkontrak, trfgb, alasanrot, udiv, $npilpks, ndokpks];	
			$.post(url, {data : arrappjo}, function(res){
				alert('Sukses');
				location.reload();
			})
		})
		
		$("#btnsimpan1").click(function(){
			var lkomponen=[];
			$('#listkomp tbody tr').each(function(){
				var kkdlevel 	= $(this).find(".txkdlevel").html();
				var kump 		= $(this).find(".txump").html();
				var kkdkomp 	= $(this).find(".txkdkomp").html();
				var klevel 		= $(this).find(".txval").html();
				var kket 		= $(this).find(".txket").html();
				var khk 		= $(this).find(".txhk").html();
				var txper 		= $(this).find(".txper").html();
				/*
				var txkar 		= $(this).find(".txkar").html();
				var txjkk 		= $(this).find(".txjkk").html();
				var txjkm 		= $(this).find(".txjkm").html();
				var txjhtp 		= $(this).find(".txjhtp").html();
				var txjhtk 		= $(this).find(".txjhtk").html(); */
				//lkomponen += [kkdlevel, kump, kkdkomp, klevel, kket, khk, txper, txkar, txjkk, txjkm, txjhtp, txjhtk];
				lkomponen += [kkdlevel, kump, kkdkomp, klevel, kket, khk, txper];
				lkomponen += ',';
			});
			
			if (lkomponen == "" ) {
				var lkomponenx =  "";
			}
			else {
				var lkomponenx=[];
				$('#listkomp tbody tr').each(function(){
					var kkdlevel 	= $(this).find(".txkdlevel").html();
					var kump 		= $(this).find(".txump").html();
					var kkdkomp 	= $(this).find(".txkdkomp").html();
					var klevel 		= $(this).find(".txval").html();
					var kket 		= $(this).find(".txket").html();
					var khk 		= $(this).find(".txhk").html();
					var txper 		= $(this).find(".txper").html();
					/*
					var txkar 		= $(this).find(".txkar").html();
					var txjkk 		= $(this).find(".txjkk").html();
					var txjkm 		= $(this).find(".txjkm").html();
					var txjhtp 		= $(this).find(".txjhtp").html();
					var txjhtk 		= $(this).find(".txjhtk").html(); */
					//lkomponen += [kkdlevel, kump, kkdkomp, klevel, kket, khk, txper, txkar, txjkk, txjkm, txjhtp, txjhtk];
					lkomponenx += [kkdlevel, kump, kkdkomp, klevel, kket, khk, txper];
					lkomponenx += ',';
				});
			}
			
			// alert(lkomponen);alert(lkomponenx);
			//alert(lkomponenx);alert(xnojo);alert(xklok);alert(xjabatan);alert(alev);
			
			
			//var begda 			= $('#begda').val(); 
			var zskema 			= $('#zskema').val();  
			var vnojo 			= $('#det_nojo').val(); 
			var vid 			= $('#det_id').val(); 
			var det_area		= $('#det_area').val(); 
			var jenisarea 		= $('#det_area :selected').text();
			var jenispersa 		= $('#jenispersa').val(); 
			var det_persa		= $('#det_persa').val(); 
			var jenisskill 		= $('#jenisskill').val(); 
			var n_jenisskill	= $('#jenisskill :selected').text();
			var jenisjabatan 	= $('#jenisjabatan').val(); 
			var n_jenisjabatan	= $('#jenisjabatan :selected').text();
			var jenislevel	 	= $('#jenislevel').val(); 
			var n_jenislevel	= $('#jenislevel :selected').text();
			var jenisproject	= $('#jenisproject').val(); 
			var n_jenisproject	= $('#jenisproject :selected').text();
			var det_gaji		= $('#det_gaji').val(); 
			var det_absensi1	= $('#det_absensi1').val(); 
			var det_absensi2	= $('#det_absensi2').val(); 
			var det_kumpul		= $('#det_kumpul').val(); 
			var jenispay		= $('#jenispay').val(); 
			var scancel 		= $('#oscancel').val();  
			var zkontrakh		= $('#kontrakh').val(); 
			var uspm	 		= $('#uspm').val();
			var jkontrak	 	= $('#jkontrak').val();
			var trfgb	 		= $('#trfgb').val();
			var alasanrot 		= $('#alasanrot').val();
			var udiv	 		= $('#udiv').val();
			var ndokpks	 		= $('#ndokpks').val();
			var npilpks 		= $('#npilpks:checked').val();	
			
			if(jenispersa==''){
				alert('PersonalArea harus diisi..');
				return false;
			}
			
			if(jenispay==''){
				alert('PayrollArea harus diisi..');
				return false;
			}
			
			if(jenisskill==''){
				alert('Skilllayanan harus diisi..');
				return false;
			}
			
			if(jenislevel==''){
				alert('Level harus diisi..');
				return false;
			}
			
			if(det_area==''){
				alert('Level harus diisi..');
				return false;
			}
			
			if(jenisproject==''){
				alert('Jenis Project harus diisi..');
				return false;
			}
			
			if(jenisjabatan==''){
				alert('Jabatan harus diisi..');
				return false;
			}
			
			if(zskema==''){
				alert('Skema harus diisi..');
				return false;
			}
			
			if(uspm==''){
				alert('User PM harus diisi..');
				return false;
			}
			
			if(udiv==''){
				alert('Divisi harus diisi..');
				return false;
			}
			
			// if(tyjo==1){
				// if(new_trep==3){
					// if(jkontrak==''){
						// alert('Jenis Kontrak harus diisi..'); 
						// return false;
					// }
					
					// if(trfgb==''){
						// alert('TRFGB harus diisi..');
						// return false;
					// }
					 
					// if(alasanrot==''){
						// alert('Alasan Rotasi harus diisi..');
						// return false;
					// }
				// } 
			// }
			
			
			var url	= "<?php echo base_url();?>index.php/home/simpan_skema";
			arrappjo = [vnojo, vid, jenisarea, det_area, jenispersa, det_persa, jenisskill, n_jenisskill, jenisjabatan, jenislevel, n_jenislevel, jenisproject, n_jenisproject, zskema, lkomponenx, scancel, jenispay, n_jenisjabatan, xnojo, xklok, xjabatan, alev, zkontrakh, xskill, uspm, jkontrak, trfgb, alasanrot, udiv, npilpks, ndokpks, dekomp];
			
			$.post(url, {data : arrappjo}, function(res){
				// alert(res);
				alert('Sukses');
				location.reload();
			})
			
		});
		
		
		$("#btnreject1").click(function(){
			if ($("#oscancel").val() == ""){alert ("Keterangan Reject tidak boleh kosong"); return false;}
			var vnojo 	= $('#det_nojo').val(); 
			var scancel = $('#oscancel').val();
			var vid 	= $('#det_id').val();
			var npilpks = $('#npilpks:checked').val(); 			
			console.log(scancel);console.log(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/simpan_cancel_sap";
			arrappjo = [vnojo, scancel, vid, npilpks];
			$.post(url, {data : arrappjo}, function(res){
				alert('Data Rejected');
				location.reload();
			})
			
		});
		
	}
};
</script>


<style>
.daud
{
color:#FFFFFF;
background-color:#000033;

}

</style>
      <!-- Full Width Column -->
      <div class="content-wrapper">
	  
       <!-- <div class="container"> -->
		
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
			
				<div class="box box-default">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-2">
								<label>Jenis Approval</label>
								<div class="input-group">
									<select class="form-control pull-right" id="typeapp" name="typeapp" style="width:100%;"/>
										<option value="N/R">New Dan Replace</option>
										<option value="SKEMA">Penyesuaian Skema</option>	
										<option value="VARIABEL">Pembayaran Variabel</option>	
										<!--<option value="PP">Perpanjangan Project</option>-->
									</select>	
								</div><!-- /.input group -->
							</div>
							<div class="col-sm-6" id="expskm">
								<button type="button" class="btn btn-primary" id="btnexcel_skm" style="margin-top:25px;">Export xls</button>
							</div>
						</div><!-- /.form group -->
					</div>
				</div>
				
				<div class="box box-default" id="tar1">
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
								<button type="button" class="btn btn-primary" id="btn_excel" style="margin-top:25px;">Export xls</button>
								<button type="button" class="btn btn-primary" id="donlot_dok" style="margin-top:25px;">Donlot Dok</button>
							</div>
						</div><!-- /.form group -->
					</div>
					
					<form role="form" id="formid">	
					<div class="box-body">
						<table id="listorder" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39; color:white;">
								<tr>
									<th align="center">No JO</th>
									<th align="center">Type JO</th>
									<th align="center">Project</th>
									<th align="center">Jabatan</th>
									<th align="center">Lokasi</th>
									<!--<th align="center">Atasan</th>-->
									<th align="center">Lama Project</th>
									<th align="center">Kontrak</th>
									<th align="center">Tgl Bekerja</th>
									<th align="center">Pemintaan</th>
									<th align="center">Hiring</th>
									<th align="center">Deskripsi</th>
									<th align="center" style="display:none">Bekerja</th>
									<th align="center">Creater</th>
									<th align="center">Tgl Create</th>
									<th align="center">No BAK</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th>ZParameter</th>
									<th>Tanggal Done</th>
									<th>PM</th>
									<th>Message RFC</th>
									<th>Client</th>
									<th>Action</th>
								</tr>
								
								<tr>
									<!--<th><select name="carnojo" id="carnojo" class="form-control select2 pull-right" style="width:100%"><option value="">Cari Nojo</option>	<?php //echo $cmbnojo;?></select></th>-->
									<th align="center"><input type="text" id="carnoj" class="form-control" style="width:120px;"></th>
									<th align="center"></th>
									<th align="center"><input type="text" id="carpro" class="form-control" style="width:120px;"></th>
									<th align="center"></th>
									<th align="center"><input type="text" id="carlok" class="form-control" style="width:120px;"></th>
									<th align="center"></th>
									<th align="center"></th>
									<th align="center"><input type="text" id="cartglbek" class="form-control" style="width:120px;"></th>
									<th align="center"></th>
									<th align="center"><select name="carhire" id="carhire" class="form-control select2 pull-right" style="width:100%"><option value=""></option>	<?php echo $cmbjmlx;?></select></th>
									<th align="center"></th>
									<th align="center" style="display:none"></th>
									<th align="center"><input type="text" id="carcreat" class="form-control" style="width:120px;"></th>
									<th align="center"><input type="text" id="cartglcreat" class="form-control" style="width:120px;"></th>
									<th align="center"><input type="text" id="carnobak" class="form-control" style="width:120px;"></th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th><input type="text" id="carzpar" class="form-control" style="width:120px;"></th>
									<th></th>
									<th><select class="form-control select2 pull-right" id="carpm" name="carpm" style="width:100px;"><option value=""></option><?php echo $cmbpm; ?></select></th>
									<th></th>
									<th></th>
									<th><select name="cardone" id="cardone" class="form-control select2 pull-right" style="width:80px"><option value=""></option><option value="1">DONE</option><option value="2">OnProgress</option><option value="3">Reject</option></select></th>
								</tr>
								
							</thead>
							<tbody>
								<?php
								/*
								if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($list['skema'] == 0){
											$btn = 'OnProgress';
											$stat = 'btn-warning';
										} elseif ($list['skema'] == 1) {
											$btn = 'Done';
											$stat = 'btn-success';
										} 
									
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['ntype'] ."</td>";
										if($list['n_project']!='')
										{
											echo "<td class='knpro'>". $list['n_project'] ."</td>";
										}
										else
										{
											echo "<td>". $list['project'] ."</td>";
										}
										
										//echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['jabatan'] ."</td>";
										echo "<td class='knlok'>". $list['lokasi'] ."</td>";
										echo "<td>". $list['atasan'] ."</td>";
										echo "<td>". $list['kontrak'] ."</td>";
										echo "<td>". $list['waktu'] ."</td>";
										echo "<td>". $list['jumlah'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['dnama'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td class='atasan' style='display:none'>". $list['ket_atasan'] ."</td>";
										echo "<td class='admin' style='display:none'>". $list['ket_admin'] ."</td>";
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";
										echo "<td class='cancel' style='display:none'>". $list['ket_cancel'] ."</td>";	
										echo "<td class='kdone' style='display:none'>". $list['ket_done'] ."</td>";	
										echo "<td class='kid' style='display:none'>". $list['id'] ."</td>";	
										echo "<td class='kpro' style='display:none'>". $list['project'] ."</td>";	
										echo "<td class='klok' style='display:none'>". $list['lokasix'] ."</td>";	
										if($list['skema']==1)
										{
											echo "<td>
											<button type='button' class='btn daud btn-block btn-xs btndok' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>
											<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button></td>";
										}
										else
										{
											echo "<td>
												
												<button type='button' class='btn daud btn-block btn-xs btndok' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>";?>
												<!--<br /><a href="<?php //echo base_url().'uploads/';?><?php //echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php //echo base_url().'uploads/';?><?php //echo $list['komponen'];?>'>Download</button></a><br />-->
												 <?php 
												if($list['flag_cancel']=='1') 
												{
													echo "
													<button type='submit' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>
													";
												}
												else if($list['flag_cancel_sap']=='1')
												{
													echo "
													<button type='submit' class='btn btn-danger btn-block btn-xs btnholded' id='btnholded' data-toggle='modal' data-target='#EVModal'>Canceled</button>
													";
												}
												else
												{
													//echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
													echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button>";
													echo "<button type='submit' class='btn btn-success btn-block btn-xs btnhold' id='btnhold' data-toggle='modal' data-target='#EZModal'>Cancel</button></td>";
												}
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
					
					<div class="modal fade" id="XmyModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listrincian" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Jabatan</th>
										<th>Gender</th>
										<th>Pendidikan</th>
										<th>Lokasi</th>
										<th>Atasan</th>
										<th>Kontrak</th>
										<th>Waktu</th>
										<th>Jumlah</th>
										<th>Status</th>
										<!--<th>Dokumen Pendukung</th>-->
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan">Approve</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->	
				
				
				
				
				<div class="modal fade" id="ZmyModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert" style="width:800px;">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Dokumen Pendukung</h4>
						</div>
						<div class="modal-body">
							<table id="listdokumen" class="table table-bordered">
								<thead>
									<tr>
										<th style="width:300px;">Dokumen Skema</th>
										<th style="width:300px;">Dokumen BAK</th>
										<th style="width:300px;">Dokumen Lain</th>
										<!--<th>Dokumen Pendukung</th>-->
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan">Approve</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				 
				
				<div class="modal fade" id="VXmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:980px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listperner" class="table table-bordered table-hover"  style="width:950px;">
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
							
							<table id="listdokumenr" class="table table-bordered" style="width:950px;">
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
							<br>
							<div class="form-group col-md-6" id="divpm">
								<label class=" control-label">User PM</label>
								<div class=" ">
									<select class="form-control" id="ruspm" name="ruspm">
										<option value="">Pilih PM</option>
										<?php echo $cmbpm; ?>
									</select>		
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<br><br><br>
							<div class="form-group col-md-12" id="divrpks">
								<label class="control-label">Pilihan PKS</label>
								<div class=" ">
									<div class="col-sm-12">
										<div class="col-sm-2">
										<input type="radio" id="rpilpks" name="rpilpks" value="Y"> ADA PKS 
										</div>
										<div class="col-sm-6">
										<input type="radio" id="rpilpks" name="rpilpks" value="N" checked=checked> TIDAK ADA PKS
										</div>
									</div>	
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<br><br><br>
							<div class="form-group col-md-6" id="divrdokpks">
								<label class=" control-label">Dokumen PKS</label>
								<div class=" ">
									<select class="form-control" id="rdokpks" name="rdokpks">
										<option value="">Pilih Dokumen PKS</option>
										<?php echo $cmbdokpks; ?>
									</select>		
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<br><br><br><br><br>
							<input type="hidden" id="rnojo" name="rnojo">
							<input type="hidden" id="rupd" name="rupd">
							<input type="hidden" id="rntype" name="rntype">
							<input type="hidden" id="rid" name="rid">
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>-->
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="rbtn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="rbtn_simpan">Approve</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->


				<div class="modal fade" id="LmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:930px;">
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
														<th >Jabatan</th>
														<th >Gender</th>
														<th >Pendidikan</th>
														<th >Lokasi</th>
														<th >Atasan</th>
														<th >Kontrak</th>
														<th >Waktu</th>
														<th >Jumlah</th>
														<th >Status</th>
														<th >Detail</th>
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
											
											<table id="listkompn" class="table table-bordered table-hover" style="width:100%;" >
												<thead style="background-color:blue; color:white" >
													<tr>
														<th>Level</th>
														<th style="display:none">X</th>
														<th>UMP</th>
														<th>Komponen</th> 
														<th style="display:none">X</th> 
														<th>Value</th>
														<th>Persentase</th>
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
											<table id="listdokumenr" class="table table-bordered" style="width:900px;">
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
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="nbtn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="nbtn_simpan">Approve</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
					
					
					
				<div class="modal fade" id="myModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
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
										<label class="col-sm-3 control-label">Download Dokumen</label>
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
				
				
				
				<div class="modal fade" id="PmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<form class="">
								<div class="box-body">
									<div class="overlayx" id="overlayx">
									  <i class="fa fa-refresh fa-spin"></i>
									</div>
									<div>
										<div id="labeljo"></div>
									</div>
									
									<br>
									
									<table id="listdokumend" class="table table-bordered" style="width:850px;">
										<thead style="background-color:blue; color:white;">
											<tr>
												<th style="width:300px;">Dokumen Skema</th>
												<th style="width:300px;">Dokumen BAK</th>
												<th style="width:300px;">Dokumen Lain</th>
												<!--<th>Dokumen Pendukung</th>-->
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									 
									<br>
									
									<table id="listkomp" class="table table-bordered table-hover" style="width:850px;" >
										<thead style="background-color:blue; color:white;" >
											<tr>
												<!--<th>Level</th>
												<th style="display:none">X</th>
												<th>UMP</th>
												<th>Komponen</th> 
												<th style="display:none">X</th> 
												<th>Value</th>
												<th>Keterangan</th>
												<th>HK Pembagi</th>-->
												<th>Level</th>
												<th style="display:none">X</th>
												<th>UMP</th>
												<th>Komponen</th> 
												<th style="display:none">X</th> 
												<th>Value</th>
												<th>Persentase</th>
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
									
									<div class="xoverlay" id="xoverlay">
									  <i class="fa fa-refresh fa-spin"></i>
									</div>
									
									<br><br>
									
									
									<div class="form-group" id="divwaktu">
										<label class="col-sm-12 control-label">Training</label>
									</div>
									
									<div id="hide_train">
										<!--<div class="form-group" id="divwaktu">
											<div class="col-sm-12">
												<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
													<div class="col-md-3" style="margin-top:5px;">
														<input type="checkbox" name="kumtrain1" id="kumtrain1" value="1"> Softskill
													</div>
													<div class="col-md-3" style="margin-top:5px;">
														<input type="checkbox" name="kumtrain2" id="kumtrain2" value="2"> Hardskill
													</div>
													<div class="col-md-3" style="margin-top:5px;">
														<input type="checkbox" name="kumtrain3" id="kumtrain3" value="3"> Tendem Pasif
													</div>
													<div class="col-md-3" style="margin-top:5px;">
														<input type="checkbox" name="kumtrain4" id="kumtrain4" value="4"> Temdem Aktif
													</div>
												</div>
											</div>
										</div>-->
									</div>
									
									
									<div class="col-md-6 form-group" id="divproject">
										<label class=" control-label"></label>
										<div class="">
											<button type='button' id='btnref' style="width:50px; height:35px;"><i class="fa fa-refresh fa-spin"></i></button>		
										</div><!-- /.input group -->
									</div><!-- /.form group -->
											
									
									<div class="form-group">
									<div class="row">
										<div class="col-md-12">
										  <div class="input-group">
											
											<div id="polo">
											<!--<textarea class="form-control" rows="3" id="ketx" name="ketx" style="width:500px;"/></textarea>-->
												<!--<div class="col-md-6 form-group" id="divproject">
													<label class=" control-label">Start Date</label>
													<div class="">
														<input type="text" id="begda" name="begda" class="form-control" placeholder="Input Start Date">	
													</div>
												</div>-->
												
												<!--
												<div class="form-group col-md-12" id="divproject">
													<label class=" control-label">PersonalArea</label>
													<div class="">
														<input type="text" id="jenispersa" name="jenispersa" class="form-control" placeholder="Input Kode Personalarea">	
													</div>
												</div>
												-->
												
												<!--
												<div class="form-group" id="divpersa">
													<label class="col-sm-3 control-label">PersonalArea</label>
													<div class="col-sm-9">
														<select class="form-control pull-right" id="jenispersa" name="jenispersa" style="width:380px;"/>
																			
														</select>		
													</div>
												</div>
												-->
												
												<!--<div class="form-group col-md-6" id="divproject">
													<label class=" control-label">PersonalArea</label>
													<div class="">
														<input type="text" id="jenispersa" name="jenispersa" class="form-control" placeholder="Input Kode Personalarea">	
													</div>
												</div>-->
												
												<div class="col-md-6 form-group" id="divproject">
													<label class=" control-label">PersonalArea</label>
													<div class="">
														<select class="form-control select2 pull-right" id="jenispersa" name="jenispersa" style="width:100%;">
															<option value="">Pilih</option>
															<?php //array_multisort(json_decode($cmbpersax), SORT_ASC, SORT_STRING); 
															foreach($cmbpersax as $key => $list){ ?>			
															<option value="<?php echo $list->kd_persa; ?>"><?php echo $list->persa; ?></option>
															<?php } ?>							
														</select>		
													</div><!-- /.input group -->
												</div><!-- /.form group -->  
												
												
												<div class="col-md-6 form-group" id="divproject">
													<label class=" control-label">PayrollArea</label>
													<div class="">
														<select class="form-control select2 pull-right" id="jenispay" name="jenispay" style="width:100%;">
															<option value="">Pilih</option>
															<?php foreach($cmbabkrsx as $key => $list){ ?>			
															<option value="<?php echo $list->PAYROLL_AREA; ?>"><?php echo $list->PAYROLL_AREA_TEXT; ?></option>
															<?php } ?>								
														</select>		
													</div><!-- /.input group -->
												</div><!-- /.form group -->


												
												<div class="col-md-6 form-group" id="divproject">
													<label class=" control-label">Skilllayanan</label>
													<div class="">
														<select class="form-control select2 pull-right" id="jenisskill" name="jenisskill" style="width:100%;">
															<option value="">Pilih</option>
															<?php foreach($cmbskill as $key => $list){ ?>			
															<option value="<?php echo $list->PERSK; ?>"><?php echo $list->PTEXT; ?></option>
															<?php } ?>							
														</select>		
													</div><!-- /.input group -->
												</div><!-- /.form group -->

												<div class="form-group col-md-6" id="divproject">
													<label class=" control-label">Area</label>
													<div class="">
														<select class="form-control select2 pull-right" id="det_area" name="det_area" style="width:100%;">
															<option value="">Pilih</option>
															<?php foreach($cmbarea as $key => $list){ ?>			
															<option value="<?php echo $list->AREA; ?>"><?php echo $list->AREA_TEXT; ?></option>
															<?php } ?>							
														</select>

														<input type="hidden" id="det_nojo" name="det_nojo" class="form-control pull-right">
														<input type="hidden" id="det_id" name="det_id" class="form-control pull-right">
														<!-- <input type="hidden" id="det_area" name="det_area" class="form-control pull-right"> -->
														<input type="hidden" id="det_persa" name="det_persa" class="form-control pull-right">
														<input type="hidden" id="zparamet" name="zparamet" class="form-control pull-right">
														<!-- <input type="text" id="jenisarea" name="jenisarea" class="form-control" readonly> -->
													</div><!-- /.input group -->
												</div><!-- /.form group -->
												
												<div class="form-group col-md-6" id="divproject">
													<label class=" control-label">Jabatan</label>
													<div class="">
														<select class="form-control pull-right select2" id="jenisjabatan" name="jenisjabatan" style="width:100%;">
															<option value="">Pilih</option>
															<?php foreach($cmbjabatan as $key => $list){ ?>			
															<option value="<?php echo $list->OBJID; ?>"><?php echo $list->STEXT; ?></option>
															<?php } ?>
														</select>		
													</div><!-- /.input group -->
												</div><!-- /.form group -->
												
												<div class="col-md-6 form-group" id="divproject">
													<label class=" control-label">Level</label>
													<div class="">
														<select class="form-control pull-right select2" id="jenislevel" name="jenislevel" style="width:100%;">
															<option value="">Pilih</option>
															<?php foreach($cmblevel as $key => $list){ ?>			
															<option value="<?php echo $list->TRFAR; ?>"><?php echo $list->TARTX; ?></option>
															<?php } ?>									
														</select>		
													</div><!-- /.input group -->
												</div><!-- /.form group -->
												
												<div class="form-group col-md-6" id="divproject">
													<label class=" control-label">Jenis Project</label>
													<div class=" ">
														<select class="form-control" id="jenisproject" name="jenisproject">
															<option value="">Pilih Jenis Project</option>
															<?php echo $cmbjpro; ?>
														</select>		
													</div><!-- /.input group -->
												</div><!-- /.form group -->

												<div class="col-md-6 form-group" id="divproject">
													<label class="control-label">Skema</label>
													<div class="" style="border: 0.1px solid grey;">
														<select class="form-control pull-right select2" id="zskema" name="zskema" style="width:100%;">
															<option value="">Pilih Skema</option>	
															<?php foreach($cmbzskema as $key => $list){ ?>			
															<option value="<?php echo $list->ZSKEMA; ?>"><?php echo $list->ZSKEMA; ?> - <?php echo $list->ZSKEMATEXT; ?></option>
															<?php } ?>
														</select>		
													</div><!-- /.input group -->
												</div><!-- /.form group -->
												
												<div class="form-group col-md-6" id="divjk">
													<label class=" control-label">Jenis Kontrak</label>
													<div class=" ">
														<select class="form-control" id="jkontrak" name="jkontrak">
															<option value="">Pilih Jenis Kontrak</option>
															<?php echo $cmbcttyp; ?>
														</select>		
													</div>
												</div>
												
												<div class="form-group col-md-6" id="divtrfgb">
													<label class=" control-label">TRFGB</label>
													<div class=" ">
														<select class="form-control" id="trfgb" name="trfgb">
															<option value="">Pilih TRFGB</option>
															<?php echo $cmbtrfgb; ?>
														</select>		
													</div>
												</div>
												
												<div class="form-group col-md-6" id="divalasanrot">
													<label class=" control-label">Alasan Rotasi</label>
													<div class=" ">
														<select class="form-control" id="alasanrot" name="alasanrot">
															<option value="">Pilih Alasan</option>
															<?php echo $cmbreason; ?>
														</select>		
													</div>
												</div>
												
												
											<!--
												<div class="form-group" id="divproject">
													<label class="col-sm-5 control-label">Tgl Gajian</label>
													<div class="col-sm-7">
														<input type="text" id="det_gaji" name="det_gaji" class="form-control" style="width:280px;">	
													</div>
												</div>
												
												<div class="form-group" id="divproject">
													<label class="col-sm-5 control-label">Tgl Periode Absensi Awal</label>
													<div class="col-sm-7">
														<input type="text" id="det_absensi1" name="det_absensi1" class="form-control" style="width:280px;">	
													</div>
												</div>
												
												<div class="form-group" id="divproject">
													<label class="col-sm-5 control-label">Tgl Periode Absensi Akhir</label>
													<div class="col-sm-7">
														<input type="text" id="det_absensi2" name="det_absensi2" class="form-control" style="width:280px;">		
													</div>
												</div>
												
												<div class="form-group" id="divproject">
													<label class="col-sm-5 control-label">Tgl Pengumpulan Form Absensi</label>
													<div class="col-sm-7">
														<input type="text" id="det_kumpul" name="det_kumpul" class="form-control" style="width:280px;">	
													</div>
												</div>
											-->	
											</div>
										</div>
										</div>
									</div>
									</div><!-- /.form group -->
									<div class="input-group" id="divpnorekrut">
										<div class="input-group-addon">
											<i class="fa fa-desktop"></i>
										</div>
										<textarea class="form-control" rows="5" name="pnorek" id="pnorek" readonly=readonly/></textarea>
									</div>
									<div class="input-group" id="divreason">
										<div class="input-group-addon">
											<i class="fa fa-desktop"></i>
										</div>
										<textarea class="form-control" rows="5" name="reasonv" id="reasonv" readonly=readonly/></textarea>
									</div>
									<br>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-desktop"></i>
										</div>
										<input type="hidden" class="form-control pull-right" name="cnojo" id="cnojo">
										<textarea class="form-control" rows="5" name="oscancel" id="oscancel" placeholder="Keterangan Reject Project" /></textarea>
									</div><!-- /.input group -->
									<br>
									<div class="input-group" id="divstop">
										<div class="input-group-addon">
											<i class="fa fa-desktop"></i>
										</div>
										<textarea class="form-control" rows="5" name="osstop" id="osstop" placeholder="Keterangan Stop Kebutuhan Project" /></textarea>
									</div><!-- /.input group -->
									
									<div class="form-group col-md-6" id="divpm">
										<label class=" control-label">User PM</label>
										<div class=" ">
											<select class="form-control" id="uspm" name="uspm">
												<option value="">Pilih PM</option>
												<?php echo $cmbpm; ?>
											</select>		
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-6" id="divdiv">
										<label class=" control-label">Divisi</label>
										<div class=" ">
											<select class="form-control" id="udiv" name="udiv">
												<option value="">Pilih Divisi</option>
												<?php echo $cmbdiv; ?>
											</select>		
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									
									<div class="form-group col-md-12" id="divnpks">
										<label class="control-label">Pilihan PKS</label>
										<div class=" ">
											<div class="col-sm-12">
												<div class="col-sm-2">
												<input type="radio" id="npilpks" name="npilpks" value="Y"> ADA PKS 
												</div>
												<div class="col-sm-6">
												<input type="radio" id="npilpks" name="npilpks" value="N" checked=checked> TIDAK ADA PKS
												</div>
											</div>	
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-6" id="divdokpks">
										<label class=" control-label">Dokumen PKS</label>
										<div class=" ">
											<select class="form-control" id="ndokpks" name="ndokpks">
												<option value="">Pilih Dokumen PKS</option>
												<?php echo $cmbdokpks; ?>
											</select>		
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<div id="approvalbtn"></div>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
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
				
				
				
				
				<div class="modal fade" id="Modal_cek" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail Perner</h4>
						</div>
						<div class="modal-body">
							<form class="">
								<div class="box-body">
									<div class="rfcoverlayxgg" id="rfcoverlayxgg">
									  <i class="fa fa-refresh fa-spin"></i>
									</div>
									<div>
										<label><center>Data Perner Rotasi</center></label>
									</div>
									<table id="listdetailrfc" class="table table-bordered" style="width:850px;">
										<thead style="background-color:blue; color:white;">
											<tr>
												<th style="width:300px;">Perner</th>
												<th style="width:300px;">Message</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									
									<br>
									
									<div id="datares">
										<div>
											<label><center>Data Perner Resign</center></label>
										</div>
										<table id="listdetailrfc2" class="table table-bordered" style="width:850px;">
											<thead style="background-color:blue; color:white;">
												<tr>
													<th style="width:300px;">Perner</th>
													<th style="width:300px;">Message</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>	
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				
				<div class="modal fade" id="Modal_des" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:500px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Deskripsi</h4>
						</div>
						<div class="modal-body">
							<form class="">
								<div class="box-body">
									<textarea id="cekdesk" cols="55" rows="10"></textarea>
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
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
				
				
				
				
							
				<div class="modal fade" id="EModal" role="dialog">
				  <div class="modal-dialog modal-success" id="modal-alert">
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
					<!--
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="xsearch" placeholder="Search Project or NOJO or creater and then press enter.." onkeypress="handlex(event)"/>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<table>
									<tr>
										<td>
											<div class="form-group">
												<label class="col-sm-3 control-label" >Area</label>
												<div class="input-group" style="margin-left:+70px;">
													<select class="form-control" id="ar3" name="ar3" style="width:200px;">
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
													<select class="form-control" id="p3r" name="p3r" style="width:300px;">
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
						</div>
					</div>
					-->
					<div class="box-body">
						<div class="overlayyx" id="overlayyx">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
						<table id="listpolar" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39; color:white;">
								<tr>
									<th align="center">Nojo</th>
									<th align="center" style="display:none">Area</th>
									<th align="center" >PersonalArea</th>
									<th align="center">Dokumen Skema</th>
									<th align="center">Dokumen BAK</th>
									<th align="center">Dokumen Lain</th>
									<th align="center">Creater</th>
									<th align="center">Last Update</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th>Action</th>
									<th style="display:none">x</th>
								</tr>
							</thead>
							<tbody>
								<?php
								/*
								if (count($transjos)){
									foreach($transjos as $key => $list){
										if ($list['flag_skema'] != 1){
											$btn = 'OnProgress';
											$stat = 'btn-warning';
										} else {
											$btn = 'Done';
											$stat = 'btn-success';
										} 
										echo "<tr>";
										echo "<td class='noj'>". $list['nojo'] ."</td>";
										echo "<td class='bar' style='display:none'>". $list['n_area'] ."</td>";
										echo "<td class='bpa' >". $list['n_perar'] ."</td>";
										?>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['skema'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['skema']; ?> </a></td>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['bak'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['bak']; ?> </a></td>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['other'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['other']; ?> </a></td>
										<?php
										echo "<td>". $list['nama'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td class='tejo' style='display:none'>". $list['id'] ."</td>";
										echo "<td class='keter' style='display:none'>". $list['ket_reject'] ."</td>";
										echo "<td class='ketcan' style='display:none'>". $list['ket_cancel'] ."</td>";
										echo "<td class='ketdon' style='display:none'>". $list['ket_done'] ."</td>";
										if($list['flag_cancel_sap']=='1')
										{
											echo "<td>
											<button type='submit' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
											<button type='button' class='btn btn-danger btn-block btn-xs btnholderz' id='btnholderz' data-toggle='modal' data-target='#ERModal'>Canceled</button></td>";
										}
										else
										{
											if($list['flag_skema']==1)
											{
												echo "<td><button type='submit' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
												<button type='button' class='btn ". $stat ." btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btn . "</button></td>";
											}
											else
											{
												echo "<td><button type='submit' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
												<button type='button' class='btn ". $stat ." btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btn . "</button>
												<button type='button' class='btn btn-success btn-block btn-xs btnholder' id='btnholder' data-toggle='modal' data-target='#EGModal'>Cancel</button></td>";
											}
											
										}
										
										echo "</tr>";
									}
								}	
								*/
								?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
					
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
												<br>
												<div id="zolo">
												<textarea class="form-control" rows="3" id="xketx" name="xketx" style="width:500px;"/></textarea>
												</div>
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
								<table id="listrincianx" class="table table-bordered table-hover" style="width:100%">
									<thead>
										<tr>
											<th>Area</th>
											<th>PersonalArea</th>
											<!--<th>Status</th>-->
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
					
					
					
					<div class="modal fade" id="EGModal" role="dialog">
					  <div class="modal-dialog modal-info" id="modal-alert">
						 <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Keterangan Cancel</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" name="zsimpan" id="zsimpan" method="post">
									<div class="box-body">
										<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-desktop"></i>
													</div>
													<input type="hidden" class="form-control pull-right" name="cnojoz" id="cnojoz">
													<textarea class="form-control" rows="5" name="scancelz" id="scancelz" /></textarea>
													
										</div><!-- /.input group --> 
									</div><!-- /.box-body -->
								</form><!-- /.form-horizontal -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
								<button type="submit" class="btn btn-outline" id="btn_simpan_cancel_sk">Simpan</button>
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
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
					<div class="box-body">
						<div class="overlayxy" id="overlayxy">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
						<table id="listpolarxy" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39; color:white;">
								<tr>
									<th align="center">Nojo</th>
									<th align="center" style="display:none">Area</th>
									<th align="center">PersonalArea</th>
									<th align="center">Dokumen Skema</th>
									<th align="center">Dokumen BAK</th>
									<th align="center">Dokumen Lain</th>
									<th align="center">Creater</th>
									<th align="center">Last Update</th>
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
					
					<div class="modal fade" id="ZUmyModal" role="dialog">
					  <div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
						 <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Detail JO</h4>
							</div>
							<div class="modal-body">
								<table id="listrincianxy" class="table table-bordered table-hover" style="width:100%">
									<thead>
										<tr>
											<th>Area</th>
											<th>PersonalArea</th>
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
					
					<div class="modal fade" id="VGmyModal" role="dialog">
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
												<div id="vlabeljoz"></div>
										</div><!-- /.form group -->
									</div><!-- /.box-body -->
								</form><!-- /.form-horizontal -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclosed">Close</button>
								<div id="vapprovalbtn_sk"></div>
							</div>
						 </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.example-modal -->
				</div><!-- /.box -->
				
				
				
				<div class="box box-default" id="tar4">
					<div class="box-header with-border">
						
						<div class="form-group">
							<div class="input-group">
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
					<div class="box-body">
						<div class="ppoverlayxy" id="ppoverlayxy">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
						<table id="listpolarpp" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39; color:white;">
								<tr>
									<th align="center">Nojo</th>
									<th align="center">PersonalArea</th>
									<th align="center">Area</th>
									<th align="center">Skilllayanan</th>
									<th align="center">Jabatan</th>
									<th align="center">Level</th>
									<th align="center">Jumlah</th>
									<th align="center">Start Project</th>
									<th align="center">End Project</th>
									<th align="center">No Lampiran</th>
									<th align="center">Lampiran</th>
									<th align="center">Creater</th>
									<th align="center">Create Date</th>
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
					
					<div class="modal fade" id="PPGmyModal" role="dialog">
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
												<div id="ppvlabeljoz"></div>
										</div><!-- /.form group -->
									</div><!-- /.box-body -->
								</form><!-- /.form-horizontal -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclosed">Close</button>
								<div id="ppapprovalbtn_sk"></div>
							</div>
						 </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.example-modal -->
					
				</div><!-- /.box -->
				
				
				
			</section><!-- /.content -->
			
		<!-- </div> --><!-- /.container -->
		
	</div><!-- /.content-wrapper -->
	
	
<script>
	//var par = $("#formid").serialize();
$(function(){
	dataString = $("#formid").serializeArray();
	var xTable =
	$("#listorder").DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		bFilter: false,
		bAutoWidth: false,
		bLengthChange: false,
		scrollX: true,
		// ordering: true,
		bSort : true,
		ajax: {
		  url 		: "<?php echo base_url().'index.php/mapping/data_listorder_sap';?>",
		  type 		:'POST',
		  dataType	: "json",
		  // data		: dataString
		  data         : function (data) {
				data.carhire      	= $("#carhire").select2('data')[0]['id'];
				data.cardone      	= $("#cardone").select2('data')[0]['id'];
				data.carpm      	= $("#carpm").select2('data')[0]['id'];
				data.carpro      	= $("#carpro").val();
				data.carlok      	= $("#carlok").val();
				data.carnoj      	= $("#carnoj").val();
				data.carzpar      	= $("#carzpar").val();
				data.carnobak      	= $("#carnobak").val();
				data.carcreat      	= $("#carcreat").val();
				data.cartglcreat   	= $("#cartglcreat").val();
				data.cartglbek   	= $("#cartglbek").val();
		  }
		},
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		columnDefs: [
        { 
            "targets": [ 11,15,16,17,18,19,20,21,22  ], //first column / numbering column
            "bVisible": false, //set not orderable
        },
		{ 
            "targets": [ 0, 2, 4, 7, 9, 12, 13, 14, 23, 25, 28 ], //first column / numbering column
            "orderable": false,
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	$("#carhire").change(function(){
		xTable.ajax.reload();
	});
	
	$("#cardone").change(function(){
		xTable.ajax.reload();
	});
	
	$("#carpm").change(function(){
		xTable.ajax.reload();
	});
	
	$("#carpro").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#carlok").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#carnoj").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#carzpar").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#carnobak").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#carcreat").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#cartglcreat").change(function(){
		xTable.ajax.reload();
	});
	
	$("#cartglbek").change(function(){
		xTable.ajax.reload();
	});
	
});

</script>