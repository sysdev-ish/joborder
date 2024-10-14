<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">
<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<? echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/moment.min.js" type="text/javascript"></script>
<script src="<? echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_simpan").click(function(){
			$('#overlay').show();
			var ljabatan 		= $('#ljabatan').val();
			var ljawab	 		= $('#ljawab').val();
			var lstatus 		= $('#lstatus').val();
			var llogin 			= $('#llogin').val();
			var url 			= "<?php echo base_url(); ?>index.php/login/jabatan_simpan/";
			arrjabatan			= [ljabatan, ljawab, lstatus, llogin];
			
			$.post(url, {xjabatan:arrjabatan}, function(response){
				
					//custom_alert(response,"Informasi");
					alert('Data berhasil di simpan');
					xTable.fnDestroy();
					$('#list_jabatan tbody').html(response);
					$('#list_jabatan').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#ljabatan').val("");			
					$('#ljawab').val("");				
					$('#lstatus').val("");
					$('#llogin').val("");
					
				//custom_alert(response,"Informasi");
				//$('#lperner').val("");
				/*$('#lnama').val("");
				$('#larea').val("");
				$('#lperar').val("");
				$('#lpayar').val("");
				$('#ldivisi').val("");
				$('#ljabat').val("");
				$('#llevel').val("");*/
				
			});
		});

		$("#btn_save").click(function(){
			$('#overlay').show();
			var ijabatan		= $('#ijabatan').val();
			var ijawab			= $('#ijawab').val();
			var iid		 		= $('#iid').val();
			var istatus			= $('#istatus').val();
			var ilogin			= $('#ilogin').val();
			var url 			= "<?php echo base_url(); ?>index.php/login/jabatan_edit/";
			arrjab				= [iid, ijabatan, istatus, ijawab, ilogin];
			
			$.post(url, {xjab:arrjab}, function(response){
				//custom_alert(response,"Informasi");
				//xTable.fnDestroy();
				alert('Data berhasil di Ubah');
					xTable.fnDestroy();
					$('#list_jabatan tbody').html(response);
					$('#list_jabatan').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
			});
		});
	
		var xTable = $('#list_jabatan').dataTable({
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
				var tjabatan	 = $row.find(".tjabatan").text();
				var tjawab	 	= $row.find(".tjawab").text();
				var tid			= $row.find(".tid").text();
				var tstatus		= $row.find(".tstatus").text();
				var tlogin		= $row.find(".tlogin").text();
					
				$("#ijabatan").val(tjabatan);
				$("#ijawab").val(tjawab);
				$("#iid").val(tid);
				$("#istatus").val(tstatus);
				$("#ilogin").val(tlogin);
			});
		});		

		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tjabatan	 = $row.find(".tjabatan").text();
			var tjawab	 	= $row.find(".tjawab").text();
			var tid			= $row.find(".tid").text();
			var tstatus		= $row.find(".tstatus").text();
			var tlogin		= $row.find(".tlogin").text();
				
			$("#ijabatan").val(tjabatan);
			$("#ijawab").val(tjawab);
			$("#iid").val(tid);
			$("#istatus").val(tstatus);
			$("#ilogin").val(tlogin);
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
		var xTable = $('#list_jabatan').dataTable({
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
			var url = "<?php echo base_url(); ?>" + "index.php/login/listjabatan/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#list_jabatan tbody').html(response);
				$('#list_jabatan').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
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
					<h3 class="box-title">Form Create Jabatan</h3>
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
							<input type="text" class="form-control pull-right" id="ljabatan">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group">
						<label>Status Jabatan </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="lstatus">
								<option value=""> Pilih Status Jabatan</option>
								<option value="1"> Aktif</option>
								<option value="0"> Tidak Aktif</option>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group">
						<label>Tanggung jawab / Atasan </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="ljawab">
								<option value=""> Pilih Status Tanggung jawab / Atasan</option>
								<option value="1"> Aktif</option>
								<option value="0"> Tidak Aktif</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label>Login </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="llogin">
								<option value=""> Pilih Status Untuk Login</option>
								<option value="1"> Aktif</option>
								<option value="0"> Tidak Aktif</option>
							</select>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
					
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
					<h3 class="box-title">List Jabatan</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search jabatan.." onkeypress="handle(event)"/>
							</div>
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_jabatan" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Jabatan</th>
								<th>Status</th>
								<th>Tanggung jawab / Atasan</th>
								<th>Login</th>
								<th style="display:none" width="0">x</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($ljabatan)){
								foreach($ljabatan as $key => $list){
									echo "<tr>";
									echo "<td class='tjabatan'>". $list['jabatan'] ."</td>";
									echo "<td class='tstatus'>". $list['status'] ."</td>";
									echo "<td class='tjawab'>". $list['tggjawab'] ."</td>";
									echo "<td class='tlogin'>". $list['login'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
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
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Jabatan : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="hidden" class="form-control" id="iid">
						<input type="text" class="form-control" id="ijabatan">
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				<div class="form-group>" 
					<label for="payrollarea" class="col-sm-4 control-label">Status Jabatan : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select class="form-control" id="istatus">
								<option value=""> Pilih Status Jabatan</option>
								<option value="1"> Aktif</option>
								<option value="0"> Tidak Aktif</option>
							</select>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Tanggung jawab / Atasan : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select class="form-control" id="ijawab">
								<option value=""> Pilih Status Tanggung jawab / Atasan</option>
								<option value="1"> Aktif</option>
								<option value="0"> Tidak Aktif</option>
							</select>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Login : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select class="form-control" id="ilogin">
								<option value=""> Pilih Status Untuk Login</option>
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