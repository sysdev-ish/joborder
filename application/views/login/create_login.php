<link rel="stylesheet" href="<? echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link href="<?php echo base_url(); ?>adminlte/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

<script src="<? echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>adminlte/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adminlte/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>adminlte/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#date_cuti').datepicker({dateFormat: 'yy-mm-dd'});
		$('#jcuti').change(function(){
			if ($('#jcuti').val()=="Cumil"){
				$('#jmlcuti').hide();
			}else if ($('#jcuti').val()=="Cuhid"){
				$('#jmlcuti').hide();
			}else if ($('#jcuti').val()=="Cutah"){
				$('#jmlcuti').show();
			}else if ($('#jcuti').val()=="Cudak"){
				$('#jmlcuti').show();
			}
		});
		
		$("#btn_cuti").click(function(){
			$('#overlay').show();
			var date_cuti 	= $('#date_cuti').val();
			var jcuti 		= $('#jcuti').val();
			var jmlcuti		= $('#jmlcuti').val();
			var alasan 		= $('#alasan').val();
			var url 			= "<?php echo base_url(); ?>index.php/cuti/cuti/";
			arrcuti			= [date_cuti, jmlcuti, alasan, jcuti];
			
			$.post(url, {xcuti:arrcuti}, function(response){
				custom_alert(response,"Informasi");
				$('#date_cuti').val("");
				$('#cuti').val("");
				$('#alasan').val("");
				
			});
		});
	});

	function custom_alert(output_msg, title_msg)
	{
		if (!title_msg)	title_msg = 'Alert';
		if (!output_msg) output_msg = 'No Message to Display.';
		$("<div></div>").html(output_msg).dialog({
			title: title_msg,
			resizable: false,
			modal: true,
			buttons: {
				"Ok": function() { $( this ).dialog( "close" );	}
			}
		});
	}		

	
</script>
<title>PortalISH | <?php echo $title;?></title>
        <!-- Main content -->
<div class="content-wrapper">
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Cuti</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form">
				<div class="box-body">
					<div class="form-group">
						<label>Date :</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="date_cuti"/>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group">
						<label>Jenis Cuti :</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="jcuti">
								<option value="Cutah"> Cuti Tahunan</option>
								<option value="Cudak"> Cuti Mendadak</option>
								<option value="Cumil"> Cuti Hamil</option>
								<option value="Cuhid"> Cuti Haid</option>
							</select>
						</div>
					</div>
					<div class="bootstrap-timepicker" id="jmlcuti">
						<div class="form-group">
							<label>Jumlah Hari Cuti :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<select class="form-control" id="cuti">
									<option value="1"> 1 Hari</option>
									<option value="2"> 2 Hari</option>
									<option value="3"> 3 Hari</option>
									<option value="4"> 4 Hari</option>
									<option value="5"> 5 Hari</option>
									<option value="6"> 6 Hari</option>
									<option value="7"> 7 Hari</option>
									<option value="8"> 8 Hari</option>
									<option value="9"> 9 Hari</option>
									<option value="10"> 10 Hari</option>
									<option value="11"> 11 Hari</option>
									<option value="12"> 12 Hari</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Alasan :</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<textarea class="form-control" rows="3" id="alasan" placeholder="Alasan ..."></textarea>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
				</div><!-- /.box-body -->
				<div class="box-footer">
					<button type="button" class="btn btn-primary" id="btn_cuti">Submit</button>
				</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.box -->
	</div><!-- /.box -->
</section>
</div>