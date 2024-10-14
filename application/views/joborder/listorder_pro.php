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
		
		
	});
	
	

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


function badd(xkid, xnojo, harga, flag, notes){
	$("#rincid").val(xkid);
	$("#nojox").val(xnojo);
	$("#hargax").val(harga);
	$("#notes").val(notes);
	//$("#att").val(filename);
	
	if(flag==1) {
		$("#save_pro").hide();
	}
};


function xbadd(xkid, xnojo, harga, flag, notes){
	$('#overlayx').show();
	$("#rincidx").val(xkid);
	$("#nojoz").val(xnojo);
	$("#notesx").val(notes);
	
	if(flag==2) {
		$("#wazu").html('<center><label class="control-label"> Approved JO '+xnojo+' </label><center>');
		$("#btnapprove").hide();
		$("#btndecline").hide();
	} else if(flag==9) {
		$("#wazu").html('<center><label class="control-label"> Rejected JO '+xnojo+' </label><center>');
		$("#btnapprove").hide();
		$("#btndecline").hide();
	} else {
		$("#wazu").html('<center><label class="control-label"> Anda akan menyetujui permintaan JO '+xnojo+' </label><center>');
		$("#btnapprove").show();
		$("#btndecline").show();
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
			
				
				<div class="box box-default" id="tar1">
						
					<div class="box-body">
						<table id="listorder" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39; color:white;">
								<tr>
									<th align="center">No JO</th>
									<th align="center">Periode</th>
									<th align="center">Project</th>
									<th align="center">Tanggal 1</th>
									<th align="center">Tanggal 2</th>
									<th align="center">Nama Item</th>
									<th align="center">Qty</th>
									<th align="center">Spec</th>
									<th align="center">Budget</th>
									<th align="center">Harga</th>
									<th align="center">Attachment</th>
									<th align="center">Creater</th>
									<th align="center" style="display:none">X</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div><!-- /.box-body -->
					
						
				<div class="modal fade" id="PmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Procurement - Creater</h4>
						</div>
						<!--<form action="<?php //echo base_url(); ?>index.php/pro/usave_pro/" method="post" enctype="multipart/form-data" >-->
						<div class="modal-body">
								<div class="box-body">
								
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Harga</label>
										<div class="">
											<input type="text" id="hargax" name="hargax" class="form-control">	
											<input type="hidden" id="rincid" name="rincid" class="form-control">	
											<input type="hidden" id="nojox" name="nojox" class="form-control">
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Attachment</label>
										<div class="">
											<input type="file" id="att" name="att" class="form-control">	
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Notes Approval</label>
										<div class="">
											<textarea id="notes" rows="5" name="notes" class="form-control" placeholder="Notes" readonly=readonly></textarea>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									
								</div><!-- /.box-body -->
							
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Cancel</button>
							<button type="button" class="btn btn-outline pull-right" id="save_pro">Save</button>
						</div>
						<!--</form> /.form-horizontal -->
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				<div class="modal fade" id="KmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Operation - Approval</h4>
						</div>
						<!--<form action="<?php //echo base_url(); ?>index.php/home/usave_inv/" method="post" enctype="multipart/form-data" >-->
						<div class="modal-body">
								<div class="box-body">
								
									<p id="wazu"></p>
									
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Notes</label>
										<div class="">
											<input type="hidden" id="rincidx" name="rincidx" class="form-control">	
											<input type="hidden" id="nojoz" name="nojoz" class="form-control">
											<textarea id="notesx" rows="5" name="notesx" class="form-control" placeholder="Notes"></textarea>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
								</div><!-- /.box-body -->
							
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Cancel</button>
							<button type="button" class="btn btn-outline pull-right" id="btnapprove">Approve</button>
							<button type="button" class="btn btn-outline pull-right" id="btndecline">Decline</button>
						</div>
						<!--</form> /.form-horizontal -->
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
		  url 		: "<?php echo base_url().'index.php/pro/data_listorder_pro';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		},
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		columnDefs: [
        { 
            "targets": [ 12 ], //first column / numbering column
            "bVisible": false, //set not orderable
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	
	$("#btnfile1").click(function(){
		window.location = $("#btnfile1").val();			 
	});
	
	
	$("#btnapprove").click(function(){
		var aid 	= $('#rincidx').val(); 
		var notes 	= $('#notesx').val();
		arrappjo = [aid, notes];
		var url	= "<?php echo base_url();?>index.php/pro/app_pro";
		$.post(url, {data : arrappjo}, function(res){
			alert('Data Approved');
			$("#KmyModal").modal("hide");
			xTable.ajax.reload();
		})
	});
	
	$("#btndecline").click(function(){
		var aid 	= $('#rincidx').val(); 
		var notes 	= $('#notesx').val();
		arrappjo = [aid, notes];
		var url	= "<?php echo base_url();?>index.php/pro/rej_pro";
		$.post(url, {data : arrappjo}, function(res){
			alert('Data Rejected');
			$("#KmyModal").modal("hide");
			xTable.ajax.reload();
		})
	});
	
	
	$('#save_pro').click(function( e ){
			var hargax = $('#hargax').val(); 
			var rincid = $('#rincid').val();
			var nojox = $('#nojox').val(); 
			var notes = $('#notes').val(); 
			var komp = $('#att').val(); 
			
			
			var file_data = $('#att').prop('files')[0];
        	var form_data = new FormData();

        	form_data.append('file', file_data);
			form_data.append('att', komp);
			form_data.append('nojokz', nojox);
			form_data.append('rincidz', rincid);
			form_data.append('hargaxz', hargax);
			$.ajax({
					url: '<?php echo base_url("index.php/pro/usave_pro") ?>',
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