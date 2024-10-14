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
		$('#bultah').datepicker({format: "mm-yyyy", viewMode: "months", minViewMode: "months", autoclose:true});
		$('#bultahx').datepicker({format: "mm-yyyy", viewMode: "months", minViewMode: "months", autoclose:true});
		$('#period').datepicker({format: "mm-yyyy", viewMode: "months", minViewMode: "months", autoclose:true});
		$('#tgl_kontpks').datepicker({format: "yyyy-mm-dd", autoclose:true});
		
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
		
		
		$('#dpn_cancel').click(function(){
			$('#BmyModal').hide();
			$("#PmyModal").hide();
			$("#PmyModal").modal("hide");
			$("#BmyModal").modal("hide");
		});
		
		$('#btncancelx').click(function(){
			$('#BmyModal').hide();
			$("#PmyModal").show();
			$("#PmyModal").modal("show");
		});
		
		
	});
	
	

</script>


<script type="text/javascript">
function bdok(nojo){
	var vnojo = nojo;
	var url	= "<?php echo base_url();?>index.php/ops/ztrajo";
	$.post(url, {data : vnojo}, function(res){
		zTable.fnDestroy();
		$('#overlay').hide();
		$('#listdokumen tbody').html(res);
		$('#listdokumen').dataTable({"bRetrieve": true,"bServerside": true,"bProcessing": true,"bPaginate": true,"bLengthChange": false,"bFilter": false,"bSort": true,"bInfo": true,"bAutoWidth": false,"scrollX": true,"bJQueryUI": false});
	})
};


function previ(nfile, nojx){
	//alert(nojx);
	$("#nojx").val(nojx);
	$("#nfile").val(nfile);
	
	$('#PmyModal').hide();
	$("#BmyModal").show();
	$("#BmyModal").modal("show");
	
};


function bhold(nojo){
	$("#cnojo").val(nojo);
};


function bholded(ketcan){
	$("#ycancel").val(ketcan);
};


function badd(xkid, xnojo, xkdone, xkpro, xknpro, xknlok, xklok, btn, xjabatan, xskill, ketcan, jmlpks, pkscli, pksish, judpks, nilpks){
	$("#rincid").val(xkid);
	$("#nojox").val(xnojo);
	
	if(jmlpks==1){
		document.getElementById('save_pks').setAttribute("style","display:none;"); 
		document.getElementById('divprojectX').setAttribute("style","display:none;");
		$("#pks_client").val(pkscli);
		$("#pks_ish").val(pksish);
		$("#jud_pks").val(judpks);
		$("#nilai_pks").val(nilpks);
	}
	else {
		document.getElementById('save_pks').removeAttribute("style");		
		document.getElementById('divprojectX').removeAttribute("style");	
	}
};


function xbadd(xkid, tglx, aid, notes, flag, xnojo){
	$('#overlayx').show();
	$("#rincidx").val(xkid);
	$("#bultahx").val(tglx);
	$("#aid").val(aid);
	$("#notes").val(notes);
	
	if(flag==1) {
		$("#btnapprove").hide();
		$("#btndecline").hide();
	} else if(flag==2) {
		$("#btnapprove").hide();
		$("#btndecline").hide();
	} else {
		$("#btnapprove").show();
		$("#btndecline").show();
	}
	
	larr 		 = [xkid, tglx, aid, xnojo];
	var url	= "<?php echo base_url();?>index.php/ops/detail_file";
	$.post(url, {data : larr}, function(res){
		$('#overlayx').hide();
		$('#aaa').html(res);
	});
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
			
				
				<div class="box box-default" id="tar1">
						
					<div class="box-body">
						<table id="listorder" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39; color:white;">
								<tr>
									<th align="center">PersonalArea</th>
									<th align="center">PayrollArea</th>
									<th align="center">NOJO</th>
									<th align="center">NO BAK</th>
									<th align="center">NO PKS</th>
									<th align="center">Tanggal Kontrak</th>
									<th align="center">Jangka Waktu Kontrak</th>
									<th align="center">Nama Perusahaan</th>
									<th align="center">PIC Sales</th>
									<th align="center">PIC Operational</th>
									<th align="center">Nominal Kontrak Per Bulan</th>
									<!--<th style="display:none">x</th> -->
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div><!-- /.box-body -->
					
						
				
				
				
				
				
							
										
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
		  url 		: "<?php echo base_url().'index.php/tax/data_listorder_tax';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		},
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		columnDefs: [
        { 
           // "targets": [ 5,6,7,8,9,10,11,12], //first column / numbering column
            //"bVisible": false, //set not orderable
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	
	$("#btnfile1").click(function(){
		window.location = $("#btnfile1").val();			
	});
	
	
	$('#save_pks').click(function( e ){
			var pks_ish = $('#pks_ish').val(); 
			var pks_client 	= $('#pks_client').val();
			var nojox 		= $('#nojox').val(); 
			var komp_pks 	= $('#komp_pks').val(); 
			var jud_pks 	= $('#jud_pks').val(); 
			var nilai_pks 	= $('#nilai_pks').val(); 
			var tgl_kontpks = $('#tgl_kontpks').val(); 
			
			var file_data = $('#komp_pks').prop('files')[0];
        	var form_data = new FormData();

        	form_data.append('file', file_data);
			form_data.append('att', komp_pks);
			form_data.append('nojokz', nojox);
			form_data.append('pksish', pks_ish);
			form_data.append('pksclient', pks_client);
			form_data.append('judpks', jud_pks);
			form_data.append('nilpks', nilai_pks);
			form_data.append('tglkontpks', tgl_kontpks);
			$.ajax({
					url: '<?php echo base_url("index.php/legal/save_pks") ?>',
					data: form_data,
					processData: false,
					contentType: false,
					type: 'POST',
					success: function(data){
				    		alert('Data Saved');
							$("#PmyModal").modal("hide");
							xTable.ajax.reload();
				  	}
			});
	});
	
	
});

</script>