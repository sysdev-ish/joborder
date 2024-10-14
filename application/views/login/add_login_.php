<link rel="stylesheet" href="<? echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">
<link href="<?echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
			var lnama 			= $('#lnama').val();
			var lusername 		= $('#lusername').val();
			var lpassword		= $('#lpassword').val();
			var llevel 			= $('#llevel').val();
			var ltype 			= $('#ltype').val();
			var url 			= "<?php echo base_url(); ?>index.php/login/login_simpan/";
			arrlogin			= [lusername, lpassword, lnama, llevel, ltype];
			
			$.post(url, {xlogin:arrlogin}, function(response){
				
					//custom_alert(response,"Informasi");
					alert('Data berhasil di simpan');
					xTable.fnDestroy();
					$('#list_login tbody').html(response);
					$('#list_login').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#lnama').val("");
					$('#lusername').val("");
					$('#lpassword').val("");
					$('#llevel').val("Pilih Level");
					
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
			var inama 			= $('#inama').val();
			var iid		 		= $('#iid').val();
			var ilevel 			= $('#ilevel').val();
			var itype 			= $('#itype').val();
			var url 			= "<?php echo base_url(); ?>index.php/login/login_edit/";
			arrlogic			= [iid, inama, ilevel, itype];
			
			$.post(url, {xlogic:arrlogic}, function(response){
				alert('Data berhasil di ubah');
					xTable.fnDestroy();
					$('#list_login tbody').html(response);
					$('#list_login').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
			});
		});
	
		var xTable = $('#list_login').dataTable({
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
				var tnama	 	= $row.find(".tnama").text();
				var tid			= $row.find(".tid").text();
				var tlevel		= $row.find(".tlevel").text();
				var ttype		= $row.find(".ttype").text();
				
				$("#inama").val(tnama);
				$("#iid").val(tid);
				$("#ilevel").val(tlevel);
				$("#itype").val(ttype);
			});
		});		

		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tnama	 	= $row.find(".tnama").text();
			var tid			= $row.find(".tid").text();
			var tlevel		= $row.find(".tlevel").text();
			var ttype		= $row.find(".ttype").text();
				
			$("#inama").val(tnama);
			$("#iid").val(tid);
			$("#ilevel").val(tlevel);
			$("#itype").val(ttype);
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
		var xTable = $('#list_login').dataTable({
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
			var url = "<?php echo base_url(); ?>" + "index.php/login/listlogin/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#list_login tbody').html(response);
				$('#list_login').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
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
					<h3 class="box-title">Form Create Login</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form">
				<div class="box-body">
					<div class="form-group">
						<label>Nama Lengkap </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lnama" style="text-transform:uppercase">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group">
						<label>username </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lusername"/>
						</div>
					</div>
					<div class="form-group">
						<label>Password </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lpassword"/>
						</div>
					</div>
					<div class="form-group">
						<label>Level </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="llevel">
								<option value=""> Pilih Level</option>
								<option value="Administrator"> Administrator</option>
								<option value="PM"> PM</option>
								<option value="Approval"> Approval</option>
								<option value="Recruter"> Recruter</option>
								<option value="Corporate_Infomedia"> Corporate Infomedia</option>
								<option value="IOC"> IOC</option>
								<option value="OPS_CRM"> OPS CRM</option>
								<option value="AdminSAP"> Admin SAP</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label>Status Level </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="ltype">
								<option value=""> Pilih Status</option>
								<option value="0"> Bukan Approval</option>
								<option value="1"> Approval</option>
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
					<h3 class="box-title">List Login</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search nama atau level.." onkeypress="handle(event)"/>
							</div>
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_login" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Level</th>
								<th>Status Level</th>
								<th style="display:none" width="0">x</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($llogin)){
								foreach($llogin as $key => $list){
									echo "<tr>";
									echo "<td class='tnama'>". $list['nama'] ."</td>";
									echo "<td class='tlevel'>". $list['level'] ."</td>";
									echo "<td class='ttype'>". $list['layanan'] ."</td>";
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
					<label for="payrollarea" class="col-sm-4 control-label">Nama : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="hidden" class="form-control" id="iid">
						<input type="text" class="form-control" id="inama">
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Level : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select class="form-control" id="ilevel">
								<option value=""> Pilih Level</option>
								<option value="Administrator"> Administrator</option>
								<option value="PM"> PM</option>
								<option value="Approval"> Approval</option>
								<option value="Recruter"> Recruter</option>
								<option value="Marketing"> Marketing</option>
								<option value="IOC"> IOC</option>
								<option value="OPS"> OPS</option>
								<option value="AdminSAP"> Admin SAP</option>
							</select>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Status Level : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select class="form-control" id="itype">
								<option value=""> Pilih Status</option>
								<option value="0"> Bukan Approval</option>
								<option value="1"> Approval</option>
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