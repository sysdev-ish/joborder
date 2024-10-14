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

<script type="text/javascript">
$(document).ready(function(){
	// $('#sdate').datepicker({format: "mm-yyyy", viewMode: "months", minViewMode: "months", autoclose:true});
	// $('#edate').datepicker({format: "mm-yyyy", viewMode: "months", minViewMode: "months", autoclose:true});
	$('#sdate').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	$('#edate').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	
	$("#btn_save").click(function(){
		$('#overlay').show();
		var ikota			= $('#ikota').val();
		var iprovince		= $('#iprovince').val();
		var imanar			= $('#imanar').val();
		var lkota_nama		= $('#ikota :selected').text();
		var iid		 		= $('#iid').val();
		
		if (imanar==""){
			alert("Manar tidak boleh kosong");
			return false;
		}
		
		if (ikota==""){
			alert("Kota tidak boleh kosong");
			return false;
		}
		
		 if (iprovince==""){
			alert("Provinsi tidak boleh kosong");
			return false;
		}
		
		var url 			= "<?php echo base_url(); ?>index.php/login/map_city_edit/";
		arrlok				= [iid, ikota, iprovince, imanar, lkota_nama];
		
		$.post(url, {xlok:arrlok}, function(response){
			alert('Data berhasil di Ubah');
			xTable.fnDestroy();
			$('#list_lokasi tbody').html(response);
			$('#list_lokasi').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
		});
	});
});
	

	
</script>
<title>PortalISH | <?php echo $title;?></title>
        <!-- Main content -->
<div class="content-wrapper">
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-5">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Download Dokumen</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/login/act_donlot/" enctype="multipart/form-data">
				<div class="box-body">
					<div class="col-md-12">
					<div class="form-group">
						<label>Start Date </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="sdate" name="sdate">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
					
					<div class="form-group">
						<label>End Date </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="edate" name="edate">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					</div>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary" id="btn_simpan">Submit</button>
				</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.box -->
		
	</div><!-- /.row -->
</section>
</div>