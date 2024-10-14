<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">
<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>	

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#csperiode').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	$('#ceperiode').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	
	$('#btnformadd').click(function(){
		var url = "<?php echo base_url(); ?>index.php/rotasi/cekform/";
		var	type 		= "POST";
		var mimeType    = "multipart/form-data";
		$.post(url, {arrlist:1}, function(resp){
			$('#formadd').html(resp); 
		});
	});
});

function vevent(id, flag){
	var url = "<?php echo base_url(); ?>index.php/event/cekform/";
	var	type 		= "POST";
	var mimeType    = "multipart/form-data";
	$.post(url, {arrlist:2, idx:id, flagx:flag}, function(resp){
		$('#boxadd').attr('class','box box-default box-solid');
		$('#formadd').html(resp);
	});
}
</script>
<title>PortalISH | <?php echo $title;?></title>
        <!-- Main content -->

<div class="content-wrapper">
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<div class="box box-default collapsed-box box-solid" id="boxadd">
				<div class="box-header with-border">
				  <h3 class="box-title">Form Add</h3>
				  <div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" id="btnformadd"><i class="fa fa-plus"></i></button>
				  </div>
				</div>
				<div class="box-body">
				<div id="formadd"></div>	
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="box box-default box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title">List Rotasi/Mutasi</h3>
				  <div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				  </div>
				</div>
				<div class="box-body">
					<table id="listpola" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Perner</th>
								<th>PersonalArea</th>
								<th>Area</th>
								<th>Skilllayanan</th>
								<th>Jabatan</th>
								<th>Level</th>
								<th>Lampiran</th>
								<th>Creater</th>
								<th>Date Create</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<tr>
								<th><input type="text" id="cperner" class="form-control" style="width:120px"></th>
								<th><input type="text" id="cpersa" class="form-control" style="width:150px"></th>
								<th><input type="text" id="carea" class="form-control" style="width:100px"></th>
								<th><input type="text" id="cskill" class="form-control" style="width:100px"></th>
								<th><input type="text" id="cjabatan" class="form-control" style="width:120px"></th>
								<th><input type="text" id="clevel" class="form-control" style="width:100px"></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>	
				</div>
			</div>
		</div>
	</div><!-- /.row -->
</section>
</div>


<script>
$(function(){
	dataString = $("#formid").serializeArray();
	var xTable =
	$("#listpola").DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		bFilter: false,
		bLengthChange: false,
		bAutoWidth: true,
		scrollX: true,
		// ordering: true,
		bSort : true,
		ajax: {
		  // url 		: "<?php echo base_url().'index.php/event/listdata_event';?>",
		  type 		:'POST',
		  dataType	: "json",
		  // data		: dataString
		   data         : function (data) {
				data.cnoevent      	= $("#cnoevent").val();
				data.ccustomer      = $("#ccustomer").val();
				data.cjevent      	= $("#cjevent").val();
				data.cnmevent       = $("#cnmevent").val();
				data.csperiode      = $("#csperiode").val();
				data.ceperiode      = $("#ceperiode").val();
				// data.carman      	= $("#carman").select2('data')[0]['id'];
				// data.carsou      	= $("#carsou").select2('data')[0]['id'];
		  }
		},
		createdRow: function(row, data, index) {
			// $('td', row).eq(8).addClass('jumlah'); 
		},
		columnDefs: [
        { 
            "targets": [ 0,1,2,3,4,5], 
            "orderable": false, 
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	$("#cnoevent").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#ccustomer").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#cjevent").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#cnmevent").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#csperiode").change(function(){
		xTable.ajax.reload();
	});
	
	$("#ceperiode").change(function(){
		xTable.ajax.reload();
	});
	
	$('body').on('click', '#btnadd', function(e){
		var nevent 		= $('#nevent').val(); 
		var speriode 	= $('#speriode').val(); 
		var eperiode 	= $('#eperiode').val(); 
		var customer 	= $('#customer').val();
		var ncustomer 	= $('#customer :selected').text();			
		var jevent 		= $('#jevent:checked').val();
		var negara 		= $('#negara').val();
		var nnegara 	= $('#negara :selected').text(); 		
		var kota 		= $('#kota').val();
		var nkota	 	= $('#kota :selected').text();	
		var jmlpeserta	= $('#jmlpeserta').val(); 		
		var biaya		= $('#biaya').val(); 		
		var mfee		= $('#mfee').val(); 		
		var lokasi		= $('#lokasi').val(); 		
		var sab			= $('#sab').val(); 		
		var lampiran	= $('#lampiran').val(); 		
		
		if(nevent==''){alert("Nama Event harus diisi, TerimaKasih.");return false;}
		if(lampiran==''){alert("Lampiran harus diisi, TerimaKasih.");return false;}
		if(speriode==''){alert("Tanggal Periode harus diisi, TerimaKasih.");return false;}
		if(eperiode==''){alert("Tanggal Periode harus diisi, TerimaKasih.");return false;}
		
		e.preventDefault();
		var formData = new FormData($(this).parents('form')[0]); 
		
		$.ajax({
			url: '<?php echo base_url("index.php/event/save_lampiran") ?>', 
			type: 'POST',
			xhr: function() {
				var myXhr = $.ajaxSettings.xhr();
				return myXhr;   
			},
			success: function (data) {
				var url = "<?php echo base_url(); ?>index.php/event/save_all/";
				var	type 		= "POST";
				var mimeType    = "multipart/form-data";
				arrlist = [nevent, speriode, eperiode, customer, ncustomer, jmlpeserta, jevent, lokasi, negara, nnegara, kota, nkota, biaya, mfee, sab, lampiran];
				$.post(url, {arrlist:arrlist}, function(resp){
					alert('Data Tersimpan');
					reset();
					xTable.ajax.reload();
				});
			},
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		});
	});
	
	
	$('body').on('click', '#btnedit', function(e){
		var eid 		= $('#eid').val(); 
		var nevent 		= $('#nevent').val(); 
		var speriode 	= $('#speriode').val(); 
		var eperiode 	= $('#eperiode').val(); 
		var customer 	= $('#customer').val();
		var ncustomer 	= $('#customer :selected').text();			
		var jevent 		= $('#jevent:checked').val();
		var negara 		= $('#negara').val();
		var nnegara 	= $('#negara :selected').text(); 		
		var kota 		= $('#kota').val();
		var nkota	 	= $('#kota :selected').text();	
		var jmlpeserta	= $('#jmlpeserta').val(); 		
		var biaya		= $('#biaya').val(); 		
		var mfee		= $('#mfee').val(); 		
		var lokasi		= $('#lokasi').val(); 		
		var sab			= $('#sab').val(); 		
		var lampiran	= $('#lampiran').val(); 		
		
		if(nevent==''){alert("Nama Event harus diisi, TerimaKasih.");return false;}
		if(speriode==''){alert("Tanggal Periode harus diisi, TerimaKasih.");return false;}
		if(eperiode==''){alert("Tanggal Periode harus diisi, TerimaKasih.");return false;}
		
		e.preventDefault();
		var formData = new FormData($(this).parents('form')[0]); 
		
		$.ajax({
			url: '<?php echo base_url("index.php/event/save_lampiran") ?>',
			type: 'POST',
			xhr: function() {
				var myXhr = $.ajaxSettings.xhr();
				return myXhr;   
			},
			success: function (data) {
				var url = "<?php echo base_url(); ?>index.php/event/edit_all/";
				var	type 		= "POST";
				var mimeType    = "multipart/form-data";
				arrlist = [nevent, speriode, eperiode, customer, ncustomer, jmlpeserta, jevent, lokasi, negara, nnegara, kota, nkota, biaya, mfee, sab, eid, lampiran];
				$.post(url, {arrlist:arrlist}, function(resp){
					alert('Data Tersimpan');
					$('#boxadd').attr('class','box box-default collapsed-box box-solid');
					xTable.ajax.reload();
				});
			},
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		});
	});
	
	$('body').on('click', '#btnapp', function(e){
		var eid 		= $('#eid').val(); 
		var kapp 		= $('#ketapp').val();	
		
		if(kapp==''){alert("Keterangan harus diisi, TerimaKasih.");return false;}
		
		var url = "<?php echo base_url(); ?>index.php/event/appevent/";
		var	type 		= "POST";
		var mimeType    = "multipart/form-data";
		arrlist = [eid, kapp];
		$.post(url, {arrlist:arrlist, xstatx:1}, function(resp){
			alert('Data Approved');
			$('#boxadd').attr('class','box box-default collapsed-box box-solid');
			xTable.ajax.reload();
		});
	});	
	
	$('body').on('click', '#btnrej', function(e){
		var eid 		= $('#eid').val(); 
		var kapp 		= $('#ketapp').val();	
		
		if(kapp==''){alert("Keterangan harus diisi, TerimaKasih.");return false;}
		
		var url = "<?php echo base_url(); ?>index.php/event/appevent/";
		var	type 		= "POST";
		var mimeType    = "multipart/form-data";
		arrlist = [eid, kapp];
		$.post(url, {arrlist:arrlist, xstatx:2}, function(resp){
			alert('Data Rejected');
			$('#boxadd').attr('class','box box-default collapsed-box box-solid');
			xTable.ajax.reload();
		});
	});	
	
	function reset(){
		$('#nevent').val(""); 
		$('#lampiran').val(""); 
		$('#speriode').val(""); 
		$('#eperiode').val(""); 
		$("#customer").select2("val", ""); 
		$("#negara").select2("val", ""); 
		$("#kota").select2("val", ""); 
		$('#jmlpeserta').val(""); 
		$('#biaya').val(""); 
		$('#mfee').val(""); 
		$('#lokasi').val("");	
		$("#sab").select2("val", ""); 		
	}	
	
});

</script>
