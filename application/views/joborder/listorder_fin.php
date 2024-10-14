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


function badd(xkid, xnojo, xkdone, xkpro, xknpro, xknlok, xklok, xjabatan, xskill, ketcan){
	$("#rincid").val(xkid);
	$("#nojox").val(xnojo);
	
	larr 		 = [xkid, xnojo];
	var url	= "<?php echo base_url();?>index.php/finance/detail_file_f";
	$.post(url, {data : larr}, function(res){
		$('#overlayx').hide();
		$('#bbb').html(res);
	});
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
									<th align="center">No JO</th>
									<th align="center">Periode</th>
									<th align="center">Project</th>
									<!--<th align="center">Persyaratan</th>-->
									<th align="center">Bekerja</th>
									<th align="center">Creater</th>
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
							</tbody>
						</table>
					</div><!-- /.box-body -->
					
						
				<div class="modal fade" id="PmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Finance - Upload Dokumen</h4>
						</div>
						<form action="<?php echo base_url(); ?>index.php/finance/save_fin/" method="post" enctype="multipart/form-data" >
						<div class="modal-body">
								<div class="box-body">
									<div class="form-group col-md-12">
										<div class="form-group col-md-3" id="divproject">
											<label class=" control-label">Bulan/Tahun</label>
											<div class="">
												<input type="text" id="bultah" name="bultah" class="form-control">	
												<input type="hidden" id="rincid" name="rincid" class="form-control">	
												<input type="hidden" id="nojox" name="nojox" class="form-control">
											</div><!-- /.input group -->
										</div><!-- /.form group -->
									</div>
									
									<br>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12" id="bbb">
											
											</div>
										</div>
									</div>
									
								</div><!-- /.box-body -->
							
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
							<button type="submit" class="btn btn-outline pull-right" id="save_fin">Save</button>
						</div>
						</form>
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
		  url 		: "<?php echo base_url().'index.php/finance/data_listorder_fin';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		},
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		columnDefs: [
        { 
            "targets": [ 5,6,7,8,9,10,11,12], //first column / numbering column
            "bVisible": false, //set not orderable
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	
	$("#btnfile1").click(function(){
		window.location = $("#btnfile1").val();			
	});
	
	
	
	
});

</script>