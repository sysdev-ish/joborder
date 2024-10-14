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
<script src="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminlte/plugins/datepicker/my.js" type="text/javascript"></script>


<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<script src="<?php echo base_url()?>public/plugins/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
	//$(function () {
	$(document).ready(function(){
		$(".select2").select2();
		$.fn.modal.Constructor.prototype.enforceFocus = $.noop;
		
		//CKEDITOR.replace('compose_textarea');
		//CKEDITOR.config.autoParagraph = false;

	//$(document).ready(function(){
		$('#polo').hide();
		$('#zolo').hide();
		$('#xoverlay').hide();
		$('#overlayx').hide();
		$('#begda').datepicker({format: 'yyyy-mm-dd',startDate : '0', autoclose:true});
		$('#bultah').datepicker({format: "mm-yyyy", viewMode: "months", minViewMode: "months", autoclose:true});
		$('#bultahx').datepicker({format: "mm-yyyy", viewMode: "months", minViewMode: "months", autoclose:true});
		$('#period').datepicker({format: "mm-yyyy", viewMode: "months", minViewMode: "months", autoclose:true});
		$('#ptgl1').datepicker({format: 'yyyy-mm-dd', autoclose:true});
		$('#ptgl2').datepicker({format: 'yyyy-mm-dd', autoclose:true});
		
		
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
		
		kTable = $('#listrincianx').dataTable(option);
		yTable = $('#listrincian').dataTable(option);
		//xTable = $('#listorder').dataTable(option);
		zTable = $('#listdokumen').dataTable(option);
		dTable = $('#listdokumend').dataTable(option);
		vTable = $('#listpolar').dataTable(option);
		uTable = $('#listkomp').dataTable(option);
		lTable = $('#listpro').dataTable(option);
		$("#tar2").slideUp("slow");
		
		
		$('#dpn_cancel').click(function(){
			$('#BmyModal').hide();
			$('#CmyModal').hide();
			$("#PmyModal").hide();
			$("#PmyModal").modal("hide");
			$("#BmyModal").modal("hide");
			$("#CmyModal").modal("hide");
		});
		
		$('#btncancelx').click(function(){
			$('#BmyModal').hide();
			$("#PmyModal").show();
			$("#PmyModal").modal("show");
		});
		
		$('#btncancelxx').click(function(){
			$('#CmyModal').hide();
			$("#PmyModal").show();
			$("#PmyModal").modal("show");
		});
		
		$("#pper").change(function(){
			var jper = $("#pper").val();
			if(jper=='1') {
				document.getElementById("ptgl2").disabled = true;
				$("#tgl2").val('');
			} else {
				document.getElementById("ptgl2").disabled = false;
			}
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
	if(nfile=='bapp'){
		$("#nojx").val(nojx);
		$("#nfile").val(nfile);
		
		$('#PmyModal').hide();
		$("#BmyModal").show();
		$("#BmyModal").modal("show");
	}
	else //if(nfile=='lpp')
	{
		$("#nojx").val(nojx);
		window.open("<?php echo base_url(); ?>index.php/ops/cetak_lpp/"+nfile+"/"+nojx,"_blank");
		/*
		$("#nojxx").val(nojx);
		$("#nfilex").val(nfile);
		
		$('#PmyModal').hide();
		$("#CmyModal").show();
		$("#CmyModal").modal("show");
		*/
	}
};


function bhold(nojo){
	$("#cnojo").val(nojo);
};


function bholded(ketcan){
	$("#ycancel").val(ketcan);
};


function baddy(xnojo){
	$('#xoverlayx').show();
	$("#nojxx").val(xnojo);
	
	larr 		 = [xnojo];
	var url	= "<?php echo base_url();?>index.php/ops/detail_file_g";
	$.post(url, {data : larr}, function(res){
		$('#ggg').html(res);
		var url = "<?php echo base_url(); ?>index.php/ops/pilih_gm";
		$.post(url, {data:larr}, function(response){
			$('#xoverlayx').hide();
			$("#jishx").html(response);
		})
	});
	
	
};


function badd(xkid, xnojo){
	$("#rincid").val(xkid);
	$("#nojox").val(xnojo);
	
	larr 		 = [xkid, xnojo];
	var url	= "<?php echo base_url();?>index.php/ops/detail_file_b";
	$.post(url, {data : larr}, function(res){
		$('#overlayx').hide();
		$('#bbb').html(res);
	});
};


function bpro(xkid, xnojo){
	$("#pnojx").val(xnojo);
	document.getElementById("ptgl2").disabled = true;
	
	$("#simpan_pro").click(function(){
		$('#overlay').show();
		var pnojx 			= $('#pnojx').val();
		var pbar	 		= $('#pbar').val();
		var pqty	 		= $('#pqty').val();
		var pper	 		= $('#pper').val();
		var ptgl1	 		= $('#ptgl1').val();
		var ptgl2	 		= $('#ptgl2').val();
		var pdes	 		= $('#pdes').val();
		var phar	 		= $('#phar').val();
		var url 			= "<?php echo base_url(); ?>index.php/ops/pro_simpan/";
		arrlayan			= [pnojx, pbar, pqty, pper, ptgl1, ptgl2, pdes, phar];
		
		$.post(url, {arrpro:arrpro}, function(response){
				lTable.fnDestroy();
				$('#listpro tbody').html(response);
				$('#listpro').dataTable({"bFilter": true, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
				$('#pnojx').val("");
				$('#pbar').val("");					
				$('#pqty').val("");
				$('#pper').val("1");
				$('#ptgl1').val("");
				$('#ptgl2').val("");
				$('#pdes').val("");
				$('#phar').val("");
		});
	});
};


function xbadd(xnojo, tglx){
	$('#overlayx').show();
	$("#bultahx").val(tglx);
	//$("#aid").val(aid);
	/*
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
	*/
	larr 		 = [tglx, xnojo];
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
									<th align="center">Creater</th>
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
							<h4 class="modal-title">Operation - Creater</h4>
						</div>
						<form action="<?php echo base_url(); ?>index.php/home/usave_inv/" method="post" enctype="multipart/form-data" >
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
												<!--
												<div class="form-group col-md-3">
													<label class="control-label">Absence</label>
												</div>
												
												<div class="form-group col-md-4" id="group_att1">
													<div class="">
														<button type='button' class='form-control btn-success' id='btnkomentar'>Generate and Download From Saphire</button>
													</div>
												</div>
												
												<div class="form-group col-md-5">
													<input type="file" class="form-control pull-right" name="komp[]" id="komponen1"/>
												</div>
												
												<div class="form-group col-md-3">
													<label class="control-label">Absence Rekapitulation</label>
												</div>
												
												<div class="form-group col-md-4" id="group_att1">
													<div class="">
														<button type='button' class='form-control btn-success' id='btnkomentar'>Generate and Download From Saphire</button>
													</div>
												</div>
												
												<div class="form-group col-md-5">
													<input type="file" class="form-control pull-right" name="komp[]" id="komponen2"/>
												</div>
												
												<div class="form-group col-md-3">
													<label class="control-label">Payroll Rekapitulation</label>
												</div>
												
												<div class="form-group col-md-4" id="group_att1">
													<div class="">
														<button type='button' class='form-control btn-success' id='btnkomentar'>Generate and Download From SAP</button>
													</div>
												</div>
												
												<div class="form-group col-md-5">
													<input type="file" class="form-control pull-right" name="komp[]" id="komponen3"/>
												</div>
												
												<div class="form-group col-md-3">
													<label class="control-label">BA Recon</label>
												</div>
												
												<div class="form-group col-md-4" id="group_att1">
													<div class="">
														<button type='button' class='form-control btn-success' id='btnkomentar'>Generate and Download From SAP</button>
													</div>
												</div>
												
												<div class="form-group col-md-5">
													<input type="file" class="form-control pull-right" name="komp[]" id="komponen4"/>
												</div>
												
												<div class="form-group col-md-3">
													<label class="control-label">BAPP</label>
												</div>
												
												<div class="form-group col-md-4" id="group_att1">
													<div class="">
														
													</div>
												</div>
												
												<div class="form-group col-md-5">
													<input type="file" class="form-control pull-right" name="komp[]" id="komponen5"/>
												</div>
												-->
											</div>
										</div>
									</div>	
									
								</div><!-- /.box-body -->
							
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
							<button type="submit" class="btn btn-outline pull-right">Save</button>
						</div>
						</form><!-- /.form-horizontal -->
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				<div class="modal fade" id="KmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">All Dokumen Checklist - Detail</h4>
						</div>
						<form action="<?php echo base_url(); ?>index.php/home/usave_inv/" method="post" enctype="multipart/form-data" >
						<div class="modal-body">
								<div class="box-body">
								
									<div class="form-group col-md-3" id="divproject">
										<label class=" control-label">Bulan/Tahun</label>
										<div class="">
											<input type="text" id="bultahx" name="bultahx" class="form-control" readonly=readonly>	
											<input type="hidden" id="rincidx" name="rincidx" class="form-control">	
											<!--<input type="hidden" id="aid" name="aid" class="form-control">	-->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<br>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-12" id="aaa">
												
											</div>
										</div>
									</div>	
									
									
									<!--<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Notes</label>
										<div class="">
											<textarea id="notes" rows="5" name="notes" class="form-control" placeholder="Notes"></textarea>
										</div>
									</div> -->
									
								</div><!-- /.box-body -->
							
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btnclose">Cancel</button>
							<!--<button type="button" class="btn btn-outline pull-right" id="btnapprove">Approve</button>
							<button type="button" class="btn btn-outline pull-right" id="btndecline">Decline</button>-->
						</div>
						</form><!-- /.form-horizontal -->
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				
				<div class="modal fade" id="BmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Kelengkapan Dokumen BAPP</h4>
						</div>
						<div class="modal-body">
								<div class="box-body">
									<input type="hidden" id="nojx" name="nojx" class="form-control">	
									<input type="hidden" id="nfile" name="nfile" class="form-control">	
									<div class="form-group col-md-12" id="divproject">
										<label class=" control-label col-md-3">Periode</label>
										<div class="col-md-9">
											<input type="text" id="period" name="period" class="form-control">	
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
								</div><!-- /.box-body -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-left" id="btncancelx">Cancel</button> 
							<button type="button" class="btn btn-outline pull-right" id="btngenerate">Generate</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				
				<div class="modal fade" id="XmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Procurement</h4>
						</div>
						<div class="modal-body">
								<div class="box-body">
									<div class="col-md-12" style="width:700px;">
										 <div class="input-group">
											<div class="col-md-6 form-group" id="divproject">
												<label class=" control-label">Nojo</label>
												<input type="text" id="pnojx" name="pnojx" class="form-control" style="width:300px;" readonly=readonly>	
											</div><!-- /.form group -->  
												
											<div class="col-md-6 form-group" id="divproject">
												<label class=" control-label">Barang</label>
												<select class="form-control" id="pbar" style="width:300px;">
													<option value="">Pilih Barang</option>
													<?php echo $cmbitem;?>
												</select>	
											</div><!-- /.form group -->
										</div>
										
										<div class="input-group">
											<div class="col-md-6 form-group" id="divproject">
												<label class=" control-label">Qty</label>
												<input type="text" id="pqty" name="pqty" class="form-control" style="width:300px;">	
											</div><!-- /.form group -->  
												
											<div class="col-md-6 form-group" id="divproject">
												<label class=" control-label">Periode</label>
												<select class="form-control" id="pper" style="width:300px;">
													<option value="1">1</option>
													<option value="2">2</option>
												</select>	
											</div><!-- /.form group -->
										</div>
										
										<div class="input-group">
											<div class="col-md-6 form-group" id="divproject">
												<label class=" control-label">Tanggal 1</label>
												<input type="text" id="ptgl1" name="ptgl1" class="form-control" style="width:300px;">	
											</div><!-- /.form group -->  
												
											<div class="col-md-6 form-group" id="divproject">
												<label class=" control-label">Tanggal 2</label>
												<input type="text" id="ptgl2" name="ptgl2" class="form-control" style="width:300px;">	
											</div><!-- /.form group --> 
										</div>
										
										<div class="input-group">
											<div class="col-md-6 form-group" id="divproject">
												<label class=" control-label">Deskripsi</label>
												<textarea id="pdes" name="pdes" class="form-control" style="width:300px;"></textarea>	
											</div><!-- /.form group -->  
											
											<div class="col-md-6 form-group" id="divproject">
												<label class=" control-label">Harga</label>
												<input type="text" id="phar" name="phar" class="form-control" style="width:300px;">		
											</div><!-- /.form group -->											
										</div>
										
										<div class="input-group">
											<div class="col-md-6 form-group" id="divproject">
												<button type="submit" class="btn btn-info" id="simpan_pro">Simpan</button>	
											</div><!-- /.form group -->  
										</div>
									</div>
									
									<table id="listpro" class="table table-bordered table-hover" style="width:850px;" >
										<thead style="background-color:blue; color:white;" >
											<tr>
												<th>Periode</th>
												<th>Barang</th>
												<th>Qty</th> 
												<th>Deskripsi</th>
												<th>Harga</th>
												<th>Tgl1</th>
												<th>Tgl2</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody style="color:#000000">
										</tbody>
									</table>
								</div><!-- /.box-body -->
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btnclose">Close</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				
				
				<div class="modal fade" id="CmyModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert" style="width:900px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Kelengkapan Dokumen</h4>
						</div>
						<div class="modal-body">
								<div class="box-body">
									<div class="xoverlayx" id="xoverlayx">
									  <i class="fa fa-refresh fa-spin"></i>
									</div>
									<input type="hidden" id="nojxx" name="nojxx" class="form-control">	
									
									<!--<div class="form-group col-md-12" id="divproject">
										<label class=" control-label">Isi Dokumen (LPP)</label>
										<div class="">
											<textarea id="compose_textarea" class="form-control" style="height: 300px" name="compose_textarea"></textarea>
										</div>
									</div>-->
									<div class="form-group">
										<div class="row">
											<div class="col-md-12" id="ggg">
												
											</div>
										</div>
									</div>
									
								</div><!-- /.box-body -->
							
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!--<button type="button" class="btn btn-outline pull-left" id="btncancelxx">Cancel</button> -->
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Cancel</button>
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btnsimpan">Submit</button>
							<!--<button type="button" class="btn btn-outline pull-right" id="btngeneratex">Submit</button>-->
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
		  url 		: "<?php echo base_url().'index.php/mapping/data_listorder_ops';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		},
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		/*
		columnDefs: [
        { 
            "targets": [ 5,6,7,8,9,10,11,12], //first column / numbering column
            "bVisible": false, //set not orderable
        },
        ],
		*/
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	
	$("#btnfile1").click(function(){
		window.location = $("#btnfile1").val();			
	});
	
	
	$("#btnapprove").click(function(){
		var aid 	= $('#aid').val(); 
		var notes 	= $('#notes').val();
		arrappjo = [aid, notes];
		var url	= "<?php echo base_url();?>index.php/ops/app_ops";
		$.post(url, {data : arrappjo}, function(res){
			alert('Data Approved');
			$("#KmyModal").modal("hide");
			xTable.ajax.reload();
		})
	});
	
	$("#btndecline").click(function(){
		var aid 	= $('#aid').val(); 
		var notes 	= $('#notes').val();
		arrappjo = [aid, notes];
		var url	= "<?php echo base_url();?>index.php/ops/rej_ops";
		$.post(url, {data : arrappjo}, function(res){
			alert('Data Rejected');
			$("#KmyModal").modal("hide");
			xTable.ajax.reload();
		})
	});  
	
	$("#btngenerate").click(function(){
		var period		= $('#period').val();
		var nojx		= $('#nojx').val();
		var nfile		= $('#nfile').val();
		
		// alert(nojx);
		
		$.ajax({
			url: '<?php echo base_url("index.php/ops/cek_doc") ?>',
			data: {data:nojx},
			type	   : 'POST',
			success	: function(res){
				//alert(res);
				if(res==1)
				{
					$('#BmyModal').hide();
					$("#PmyModal").show();
					$("#PmyModal").modal("show");
					xTable.ajax.reload();
					window.open("<?php echo base_url(); ?>index.php/ops/cetak/"+period+"/"+nfile+"/"+nojx,"_blank");
					$('#period').val('');
				}
				else
				{
					alert('Data belum lengkap, silahkan isi dengan cara klik NOJO.. ');
					return false;
				}
			}
		})
		
	});  
	
	
	$("#btngeneratex").click(function(){
		var jpks					= $('#jpks').val();
		var nojxx					= $('#nojxx').val();
		var nfilex					= $('#nfilex').val();
		var nopks					= $('#nopks').val();
		var nilai_pks				= $('#nilai_pks').val();
		//var compose_textarea		= $('#compose_textarea').val();
		var nttdx					= $('#nttdx').val();
		var jttdx					= $('#jttdx').val();
		var jishx					= $('#jishx').val(); 
		var nperus					= $('#nperus').val();
		var compose_textarea 		= CKEDITOR.instances.compose_textarea.getData();
		
		//alert(editorText);
		
		larr 		 = [jpks, nojxx, nfilex, nopks, nilai_pks, compose_textarea, nttdx, jttdx, jishx, nperus];
		var url	= "<?php echo base_url();?>index.php/ops/previ_lpp";
		$.post(url, {data : larr}, function(res){
			$('#CmyModal').hide();
			$("#PmyModal").show();
			$("#PmyModal").modal("show");
			xTable.ajax.reload();
			window.open("<?php echo base_url(); ?>index.php/ops/cetak_lpp/"+nfilex+"/"+jishx+"/"+nojxx,"_blank");
		});
		
	});  
	
	
	$("#btnsimpan").click(function(){
		var nperus					= $('#nperus').val();
		var nojxx					= $('#nojxx').val();
		var direk					= $('#direk').val();
		var unit					= $('#unit').val();
		var nttdx					= $('#nttdx').val();
		var jttdx					= $('#jttdx').val();
		var jishx					= $('#jishx').val(); 
		var compose_textarea 		= CKEDITOR.instances.compose_textarea.getData();
		
		larr 		 = [nojxx, nperus, direk, nttdx, jttdx, jishx, unit, compose_textarea];
		var url	= "<?php echo base_url();?>index.php/ops/previ";
		$.post(url, {data : larr}, function(res){
			$('#CmyModal').hide();
			xTable.ajax.reload();
			//window.open("<?php echo base_url(); ?>index.php/ops/cetak_lpp/"+nfilex+"/"+jishx+"/"+nojxx,"_blank");
		});
		
	}); 
	
	
});

</script>