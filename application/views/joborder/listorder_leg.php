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
									<th align="center">No JO</th>
									<!--<th align="center">Periode</th>-->
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
									<th align="center">Dok BAK</th>
									<th align="center">Dok PKS</th>
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
							<h4 class="modal-title">Legal - PKS</h4>
						</div>
						<div class="modal-body">
								<div class="box-body">
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">No PKS Client</label>
										<div class="">
											<input type="text" id="pks_client" name="pks_client" class="form-control">	
											<input type="hidden" id="nojox" name="nojox" class="form-control">	
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">No PKS ISH</label>
										<div class="">
											<input type="text" id="pks_ish" name="pks_ish" class="form-control" >	
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Judul PKS</label>
										<div class="">
											<input type="text" id="jud_pks" name="jud_pks" class="form-control" >	
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Nilai Kontrak PKS</label>
										<div class="">
											<input type="text" id="nilai_pks" name="nilai_pks" class="form-control" >	
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Tanggal Kontrak</label>
										<div class="">
											<input type="text" id="tgl_kontpks" name="tgl_kontpks" class="form-control" >	
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group col-md-12" id="divprojectX">
										<label class=" control-label">Upload PKS</label>
										<div class="">
											<input type="file" class="form-control pull-right" name="komp_pks" id="komp_pks"/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
								</div><!-- /.box-body -->
							
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
							<button type="button" class="btn btn-outline pull-right" id="save_pks">Save</button>
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
		  url 		: "<?php echo base_url().'index.php/legal/data_listorder_leg';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		},
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		columnDefs: [
        { 
            "targets": [ 4,5,6,7,8,9,10,11], //first column / numbering column
            "bVisible": false, //set not orderable
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

			if(komp_pks==''){
				alert('File harus di upload.');
				return false;
			} else if(pks_client==''){
				alert('No PKS harus diisi.');
				return false;
			}	
			
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