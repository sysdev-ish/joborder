<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!--<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>-->

<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">
	$(function () {
		$(".select2").select2();
		$.fn.modal.Constructor.prototype.enforceFocus = $.noop;

	//$(document).ready(function(){
		$('#polo').hide();
		$('#zolo').hide();
		$('#xoverlay').hide();
		$('#overlayx').hide();
		$('#begda').datepicker({format: 'yyyy-mm-dd',startDate : '0', autoclose:true});
		
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
		
		kTable = $('#listrincianx').dataTable(option);
		yTable = $('#listrincian').dataTable(option);
		//xTable = $('#listorder').dataTable(option);
		zTable = $('#listdokumen').dataTable(option);
		dTable = $('#listdokumend').dataTable(option);
		vTable = $('#listpolar').dataTable(option);
		uTable = $('#listkomp').dataTable(option);
		$("#tar2").slideUp("slow");
		
		
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
			  if (ish == 'SKEMA'){
			  	 $("#tar1").slideUp("slow");
				 $("#tar2").slideDown("slow");
				 
				var url = "<?php echo base_url(); ?>" + "index.php/home/listjox/";
				var dataarr = $('#xsearch').val();
				$.post(url, {dataarr:dataarr}, function(response){
					vTable.fnDestroy(); 
					$('#overlay').hide();
					$('#listpolar tbody').html(response);
					$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
				})
			  }
			  else
			   if (ish == 'N/R'){
			  	 $("#tar1").slideDown("slow");
				 $("#tar2").slideUp("slow");
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
				$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			});
		});
		
		
		function load_search(){
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
				$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});			
			});
		}
		
		
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
		})
		
		
		
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
			"bFilter": false,
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
				$('#listpolar').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
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


function badd(xkid, xnojo, xkdone, xkpro, xknpro, xknlok, xklok, btn, zparam, xjabatan, xskill, ketcan){
	//alert(xjabatan);
	$('#overlayx').show();
	$('#xoverlay').show();
	var vnojo = xkid;
	var gnojo = xnojo;
	var abc = xkdone; 
	var kpro = xkpro; 
	var knpro = xknpro;
	var knlok = xknlok;
	var klok = xklok;
	var skill = xskill;
	//alert(skill);
	$("#ketx").val(xkdone);
	$("#zparamet").val(zparam);
	if (btn == "Done"){
		$('#polo').show();
		$("#oscancel").val(xkdone);
		$("#labeljo").html('<center><label class="control-label"> Sudah Ada Skema </label><center>');
		$("#approvalbtn").html("");
		$.ajax({
			type 		: "POST",
			url		: "<?php echo base_url('index.php/home/detail_komp/');?>",
			//dataType	: "json",
			data		: {anojo:xnojo, alokasi:xklok, ajabatan:xjabatan},
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
		$("#det_id").val(vnojo);
		
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
	else if (btn == "Canceled"){
		$('#polo').show();
		$("#oscancel").val(ketcan);
		$("#labeljo").html('<center><label class="control-label"> Skema Canceled </label><center>');
		$("#approvalbtn").html("");
		$.ajax({
			type 		: "POST",
			url		: "<?php echo base_url('index.php/home/detail_komp/');?>",
			//dataType	: "json",
			data		: {anojo:xnojo, alokasi:xklok, ajabatan:xjabatan},
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
		$("#det_id").val(vnojo);
		
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
		$('#polo').show();
		$("#oscancel").val('');

		$.ajax({
			type 		: "POST",
			url		: "<?php echo base_url('index.php/home/detail_komp/');?>",
			//dataType	: "json",
			data		: {anojo:xnojo, alokasi:xklok, ajabatan:xjabatan},
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
		$("#det_id").val(vnojo);
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
		
		$("#labeljo").html('<center><label class="control-label"> Anda telah membuat skema No '+ gnojo +'</label></center>');
		var appbtn1 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Done</button>'
		$("#approvalbtn").html(appbtn1);
		
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
			
		if(lkomponen==''){
			var lkomponenz = '';
		}
		else {
			var lkomponenz=[];
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
				lkomponenz += [kkdlevel, kump, kkdkomp, klevel, kket, khk, txper];
				lkomponenz += ',';
			});
		}
			
			
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
			var scancel = $('#oscancel').val(); 
			
			var url	= "<?php echo base_url();?>index.php/home/simpan_skema";
			arrappjo = [vnojo, vid, jenisarea, det_area, jenispersa, det_persa, jenisskill, n_jenisskill, jenisjabatan, jenislevel, n_jenislevel, jenisproject, n_jenisproject, zskema, lkomponenz, scancel, jenispay, n_jenisjabatan];
			//alert(arrappjo);return false;
			$.post(url, {data : arrappjo}, function(res){
				//alert(res);
				alert('Sukses');
				location.reload();
			})
		});
		
		
		$("#btnreject1").click(function(){
			if ($("#oscancel").val() == ""){alert ("Keterangan Reject tidak boleh kosong"); return false;}
			var vnojo 	= $('#det_nojo').val(); 
			var scancel = $('#oscancel').val(); 
			console.log(scancel);console.log(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/simpan_cancel_sap";
			arrappjo = [vnojo, scancel];
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
						<div class="form-group">
							<div class="input-group">
								<label class="col-sm-6 control-label">Jenis Approval</label>
								<div class="col-sm-6">
								<select class="form-control pull-right" id="typeapp" name="typeapp" style="width:400px;"/>
									<option value="N/R">New Dan Replace</option>
									<option value="SKEMA">Penyesuaian Skema</option>											
								</select>	
								</div>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
				</div>
				
				<div class="box box-default" id="tar1">
					<div class="box-header with-border">
						<div class="form-group">
							<!--
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project or NOJO or creater.." onkeypress="handle(event)"/>
							</div>
							-->
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
									<th align="center">Atasan</th>
									<th align="center">Kontrak</th>
									<th align="center">Waktu</th>
									<th align="center">Jumlah</th>
									<!--<th align="center">Persyaratan</th>-->
									<th align="center">Deskripsi</th>
									<th align="center">Bekerja</th>
									<th align="center">Creater</th>
									<th align="center">Last Update</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
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
													<div class="" style="border: 0.1px solid grey;">
														<select class="form-control select2 pull-right" id="jenispersa" name="jenispersa" style="width:100%;">
															<option value="">Pilih</option>
															<?php foreach($cmbpersax as $key => $list){ ?>			
															<option value="<?php echo $list->kd_persa; ?>"><?php echo $list->persa; ?></option>
															<?php } ?>							
														</select>		
													</div><!-- /.input group -->
												</div><!-- /.form group -->  
												
												
												<div class="col-md-6 form-group" id="divproject">
													<label class=" control-label">PayrollArea</label>
													<div class="" style="border: 0.1px solid grey;">
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
													<div class="" style="border: 0.1px solid grey;">
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
													<div class="" style="border: 0.1px solid grey;">
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
													<div class="" style="border: 0.1px solid grey;">
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
													<div class="" style="border: 0.1px solid grey;">
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
									
									<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-desktop"></i>
												</div>
												<input type="hidden" class="form-control pull-right" name="cnojo" id="cnojo">
												<textarea class="form-control" rows="5" name="oscancel" id="oscancel" placeholder="Keterangan Reject Project" /></textarea>
									</div><!-- /.input group -->
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Cancel</button>
							<div id="approvalbtn"></div>
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
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="xsearch" placeholder="Search Project or NOJO or creater and then press enter.." onkeypress="handlex(event)"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
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
												</div><!-- /.input group -->
											</div><!-- /.form group -->
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
												</div><!-- /.input group -->
											</div><!-- /.form group -->
										</td>
										<td>
											<div class="form-group">
												<label class="col-sm-3 control-label" style="margin-left:20px;"></label>
												<div class="input-group" style="margin-left:+70px;">
													<button type="button" class="btn btn-primary" id="btn_search">Search</button>
												</div><!-- /.input group -->
											</div><!-- /.form group -->
										</td>
									</tr>							
								</table>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
					<div class="box-body">
						<table id="listpolar" class="table table-bordered table-hover">
							<thead>
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
		bFilter: true,
		bLengthChange: false,
		scrollX: true,
		ordering: true,
		bSort : true,
		ajax: {
		  url 		: "<?php echo base_url().'index.php/mapping/data_listorder_sap';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		},
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		columnDefs: [
        { 
            "targets": [ 13,14,15,16,17,18,19,20  ], //first column / numbering column
            "bVisible": false, //set not orderable
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	
});

</script>