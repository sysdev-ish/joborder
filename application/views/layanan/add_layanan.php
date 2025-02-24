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
		$("#btn_simpan").click(function(){
			$('#overlay').show();
			var llayan 			= $('#llayan').val();
			var lstatus 		= $('#lstatus').val();
			var ljabat	 		= $('#ljabat').val();
			var url 			= "<?php echo base_url(); ?>index.php/login/layanan_simpan/";
			arrlayan			= [llayan, lstatus, ljabat];
			
			$.post(url, {arrlayan:arrlayan}, function(response){
					alert('Data berhasil di simpan');
					xTable.fnDestroy();
					$('#list_layanan tbody').html(response);
					$('#list_layanan').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#ljabat').val("");
					$('#llayan').val("");					
					$('#lstatus').val("");
					
			});
		});

		$("#btn_save").click(function(){
			$('#overlay').show();
			var ilayan			= $('#ilayan').val();
			var iid		 		= $('#iid').val();
			var ijabat	 		= $('#ijabat').val();
			var istatus			= $('#istatus').val();
			var url 			= "<?php echo base_url(); ?>index.php/login/layanan_edit/";
			arrlay				= [iid, ilayan, istatus, ijabat];
			
			$.post(url, {arrlay:arrlay}, function(response){
				//custom_alert(response,"Informasi");
				//xTable.fnDestroy();
				alert('Data berhasil di Ubah');
					xTable.fnDestroy();
					$('#list_layanan tbody').html(response);
					$('#list_layanan').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
			});
		});
	
		var xTable = $('#list_layanan').dataTable({
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
		
		xTable.on( 'draw.dt', function () {
			$(".btn").click(function(){
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var tlayanan 	= $row.find(".tlayanan").text();
				var tjabatan	= $row.find(".tjabatan").text();
				var tid			= $row.find(".tid").text();
				var tstatus		= $row.find(".tstatus").text();
				
				$("#ilayan").val(tlayanan);
				$("#iid").val(tid);
				$("#ijabat").val(tjabatan);
				$("#istatus").val(tstatus);
			});
		});		

		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tlayanan	= $row.find(".tlayanan").text();
			var tjabatan	= $row.find(".tjabatan").text();
			var tid			= $row.find(".tid").text();
			var tstatus		= $row.find(".tstatus").text();
				
			$("#ilayan").val(tlayanan);
			$("#iid").val(tid);
			$("#ijabat").val(tjabatan);
			$("#istatus").val(tstatus);
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
	
	
	function handle(e){
		var xTable = $('#list_layanan').dataTable({
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
			var url = "<?php echo base_url(); ?>" + "index.php/login/listlayanan/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#list_layanan tbody').html(response);
				$('#list_layanan').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
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
					<h3 class="box-title">Form Create Layanan</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form">
				<div class="box-body">
					<div class="form-group">
						<label>Jabatan </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="ljabat">
								<option value=""> Pilih Jabatan</option>
								<?php echo $cmbjabat ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label>Nama Layanan </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="llayan">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group">
						<label>Status </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="lstatus">
								<option value=""> Pilih Status</option>
								<option value="1"> Aktif</option>
								<option value="0"> Tidak Aktif</option>
							</select>
						</div>
					</div>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<button type="button" class="btn btn-primary" id="btn_simpan">Submit</button>
				</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.box -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">List Layanan</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search layanan or jabatan.." onkeypress="handle(event)"/>
							</div>
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_layanan" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Jabatan</th>
								<th>Layanan</th>
								<th>Status</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($llayanan)){
								foreach($llayanan as $key => $list){
									echo "<tr>";
									echo "<td class='tjabat'>". $list['jabat'] ."</td>";
									echo "<td class='tlayanan'>". $list['layanan'] ."</td>";
									echo "<td class='tstatus'>". $list['status'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
									echo "<td class='tjabatan' style='display:none'>". $list['jabatan'] ."</td>";
									echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
									echo "</tr>";
								}
							}else{
								echo "<tr align=center><td colspan=3>No data to display</td></tr>";
							}
						?>
						</tbody>
					</table>
				</div><!-- /.box -->
		</div><!-- /.box -->
		<!-- modal form -->
		
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog modal-info" id="modal-alert">
			 <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Informasi</h4>				
				</div>
				<div class="modal-body">
				<div class="form-group">
						<label>Jabatan </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="ijabat">
								<option value=""> Pilih Jabatan</option>
								<?php echo $cmbjabat ?>
							</select>
						</div>
					</div>
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Nama Layanan : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="hidden" class="form-control" id="iid">
						<input type="text" class="form-control" id="ilayan">
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Status : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select class="form-control" id="istatus">
								<option value=""> Pilih Status</option>
								<option value="1"> Aktif</option>
								<option value="0"> Tidak Aktif</option>
							</select>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
					<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_save">Save</button>
				</div>
			 </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.example-modal -->
		
	</div><!-- /.row -->
</section>
</div>