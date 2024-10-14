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
	//$(function () {
	$(document).ready(function(){
		$('#jkl').hide();
		$('#lkj').hide();
		
		
		$("#llevel").change(function(){
			var level = $('#llevel').val();
			if(level=='2')
			{
				$('#jkl').show();
			}
			else
			{
				$('#jkl').hide();
			}
		});
		
		
		$("#btn_simpan").click(function(){
			$('#overlay').show();
			var lnama 			= $('#lnama').val();
			var lnamaup			= lnama.toUpperCase(); 
			var lusername 		= $('#lusername').val();
			var lusernameup		= lusername.toUpperCase(); 
			var lpassword		= $('#lpassword').val();
			var llevel 			= $('#llevel').val();
			var ljabatan 		= $('#ljabatan').val();
			var llayanan 		= $('#llayanan').val();
			var lemail 			= $('#lemail').val();
			//var lstatz 			= document.getElementById("lstat").value;
			var lstatz 			= $('input#lstat:checked').val();
			//alert(lstatz);
			if (lstatz == 1)
			{
				var lstaty = 1;
			}
			else
			{
				var lstaty = 0;
			}
			
			
			if ((lemail.indexOf('@',0)==-1) || (lemail.indexOf('.',0)==-1)){
				alert("Email Kurang Tepat");
				return false;
			}
			
			$.ajax({
				url: '<?php echo base_url();?>index.php/login/checkUser',
				type: 'POST',
				//dataType	: "json",
				data: {perner : lusernameup},
				success: function (responsex) {
					if(responsex==1)
					{
						alert('Username ini sudah pernah di create !!');
						$('#overlay').hide();
						return false;
					}
					else
					{
						var url 			= "<?php echo base_url(); ?>index.php/login/login_simpan/";
						arrlogin			= [lusernameup, lpassword, lnamaup, llevel, ljabatan, llayanan, lstaty, lemail];
						$.post(url, {xlogin:arrlogin}, function(response){
								alert('Data berhasil di simpan');
								xTable.fnDestroy();
								$('#list_login tbody').html(response);
								$('#list_login').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
								$('#lnama').val("");
								$('#lusername').val("");
								$('#lpassword').val("");
								$('#llevel').val("");
								$('#ljabatan').val("");
								$('#llayanan').val("");
								$('#lemail').val("");
								$('input:checkbox:checked').val("");
						});	
					}
					
				}
			});
			
			
			
		});
		/*
		$("#ljabatan").change(function(){
			var jabatan = $('#ljabatan').val();
			var url = "<?php echo base_url(); ?>index.php/login/pilih_layanan";
			$.post(url, {data:jabatan}, function(response){
				$("#llayanan").html(response);
			})
		})
		
		$("#ijabatan").change(function(){
			var jabatan = $('#ijabatan').val();
			var url = "<?php echo base_url(); ?>index.php/login/pilih_layanan";
			$.post(url, {data:jabatan}, function(response){
				$("#ilayanan").html(response);
			})
		})
		*/
		$("#btn_save").click(function(){
			$('#overlay').show();
			var inama 			= $('#inama').val();
			var iid		 		= $('#iid').val();
			var ilevel 			= $('#ilevel').val();
			var ijabatan 		= $('#ijabatan').val();
			var ilayanan 		= $('#ilayanan').val();
			var iemail 			= $('#iemail').val();
			
			if ($("#istat").is(":checked")) {  
				var istaty = 1;
			} else {
				var istaty = 0;
			}
			
			
			if ((iemail.indexOf('@',0)==-1) || (iemail.indexOf('.',0)==-1)){
				alert("Email Kurang Tepat");
				return false;
			}
			
			var url 			= "<?php echo base_url(); ?>index.php/login/login_edit/";
			arrlogic			= [iid, inama, ilevel, ijabatan, ilayanan, iemail, istaty];
			
			$.post(url, {xlogic:arrlogic}, function(response){
				alert('Data berhasil di ubah');
					xTable.fnDestroy();
					$('#list_login tbody').html(response);
					$('#list_login').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
			});
		});
	
		var xTable = $('#list_login').dataTable({
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
		});
		
		xTable.on( 'draw.dt', function () {
		
			$(".btn").click(function(){
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var tnama	 	= $row.find(".tnama").text();
				var tid			= $row.find(".tid").text();
				var tlevel		= $row.find(".tlevel").text();
				var tjabatan	= $row.find(".tjabatan").text();
				var tlayanan	= $row.find(".tlayanan").text();
				var temail		= $row.find(".temail").text();
				var treg		= $row.find(".treg").text();
				
				if(tlevel != '2')
				{
					$('#lkj').hide();
				}
				else
				{
					$('#lkj').show();
					if(treg=='1')
					{
						//document.getElementById("istat").checked;
						//$('#istat').is(':checked');
						$('#istat').prop('checked', true);
					}
					else
					{
						$('#istat').prop('checked', false);
					}
				}
				
				$("#inama").val(tnama);
				$("#iid").val(tid);
				$("#ilevel").val(tlevel);
				$("#ijabatan").val(tjabatan);
				$("#ilayanan").val(tlayanan);
				$("#iemail").val(temail);
				$("#istat").val(treg);
			});
			
			
			$(".btnres").click(function(){
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var tid			= $row.find(".tid").text();
				
				var url 		= "<?php echo base_url(); ?>index.php/login/login_reset/";
				arres			= [tid];
				
				$.post(url, {arresx:arres}, function(response){
						alert('Password telah di reset');
				});
			});
		});	
		
		
		$(".btnres").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tid			= $row.find(".tid").text();
			
			var url 		= "<?php echo base_url(); ?>index.php/login/login_reset/";
			arres			= [tid];
			
			$.post(url, {arresx:arres}, function(response){
					alert('Password telah di reset');
			});
		});


		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tnama	 	= $row.find(".tnama").text();
			var tid			= $row.find(".tid").text();
			var tlevel		= $row.find(".tlevel").text();
			var tjabatan	= $row.find(".tjabatan").text();
			var tlayanan	= $row.find(".tlayanan").text();
			var temail		= $row.find(".temail").text();
			var treg		= $row.find(".treg").text();
			
			if(tlevel != '2')
			{
				$('#lkj').hide();
			}
			else
			{
				$('#lkj').show();
				if(treg=='1')
				{
					//document.getElementById("istat").checked;
					//$('#istat').is(':checked');
					$('#istat').prop('checked', true);
				}
				else
				{
					$('#istat').prop('checked', false);
				}
			}
				
			$("#inama").val(tnama);
			$("#iid").val(tid);
			$("#ilevel").val(tlevel);
			$("#ijabatan").val(tjabatan);
			$("#ilayanan").val(tlayanan);
			$("#iemail").val(temail);
			$("#istat").val(treg);
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
		<!-- 
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Create Login</h3>
				</div>
				
				<form role="form">
				<div class="box-body">
					<div class="form-group">
						<label>Nama Lengkap </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lnama" style="text-transform:uppercase">
						</div>
					</div>
					<div class="form-group">
						<label>username </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lusername" style="text-transform:uppercase"/>
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
						<label>Jabatan </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="ljabatan">  
								<option value=""> Pilih Jabatan</option>
								<?php echo $cmbjabat ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label>Layanan </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" id="llayanan">  
								<option value=""> Pilih Layanan</option>
									<?php echo $cmblayan ?>
							</select>
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
								<?php echo $cmblvl ?>
							</select>
						</div>
					</div>
					
					
					<div class="form-group" id="jkl">
						 <input type="checkbox" name="lstat" id="lstat" value="1"> Not Approval
					</div>
					
					
					<div class="form-group">
						<label>Email </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lemail"/>
						</div>
					</div>
					
				</div>
				<div class="box-footer">
					<button type="button" class="btn btn-primary" id="btn_simpan">Submit</button>
				</div>
				</form>
			</div>
		</div>
		-->
		
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<!--<h3 class="box-title">Create Login</h3>--> <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#XmyModal' id="btn_create"><i class="fa fa-file-text-o">&nbsp;Create Login</i></button>
				</div><!-- /.box-header -->
				<!-- form start -->
							
							<div class="input-group">
								<!--<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search username atau nama atau jabatan.." onkeypress="handle(event)"/>-->
							</div>
							
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_login" class="table table-bordered table-hover">
						<thead style="background-color: #dd4b39; color:white;">
							<tr>
								<th>Username</th>
								<th>Nama</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th>Jabatan</th>
								<th>Layanan</th>
								<th style="display:none" width="0">x</th>
								<th>Level</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($llogin)){
								foreach($llogin as $key => $list){
									echo "<tr>";
									echo "<td class='tusernama'>". $list['username'] ."</td>";
									echo "<td class='tnama'>". $list['nama'] ."</td>";
									echo "<td class='tjabatan' style='display:none'>". $list['jabatan'] ."</td>";
									echo "<td class='tlayanan' style='display:none'>". $list['layanan'] ."</td>";
									echo "<td class='tjabat' >". $list['jabat'] ."</td>";
									echo "<td class='tlayan' >". $list['layan'] ."</td>";
									echo "<td class='tlevel' style='display:none'>". $list['level'] ."</td>";
									echo "<td class='tdnama' >". $list['dnama'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
									echo "<td class='treg' style='display:none'>". $list['regional'] ."</td>";
									echo "<td class='temail' >". $list['email'] ."</td>";
									echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button><button type='button' class='btn btn-success btn-block btn-xs btnres' id='btnres'>Reset</button></td>";
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
					<h4 class="modal-title">Edit Data</h4>				
				</div>
				<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<div class="input-group">
								<div class="form-group col-md-6">
									<label for="payrollarea" class="control-label">Nama : </label>
									<div class="input-group col-md-12">
										<input type="hidden" class="form-control" id="iid">
										<input type="text" class="form-control" id="inama">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								<div class="form-group col-md-6">
									<label for="payrollarea" class="control-label">Jabatan : </label>
									<div class="input-group col-md-12">
										<select class="form-control" id="ijabatan">  
												<option value=""> Pilih Jabatan</option>
												<?php echo $cmbjabat ?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								<div class="form-group col-md-6">
									<label for="payrollarea" class="control-label">Layanan : </label>
									<div class="input-group col-md-12">
										<select class="form-control" id="ilayanan">  
												<option value=""> Pilih Layanan</option>
												<?php echo $cmblayan ?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group col-md-6">
									<label for="payrollarea" class="control-label">Level : </label>
									<div class="input-group col-md-12">
										<select class="form-control" id="ilevel">
												<option value=""> Pilih Level</option>
												<?php echo $cmblvl ?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								
								
								<div class="form-group col-md-6">
									<label for="payrollarea" class="control-label">Email :</label>
									<div class="input-group col-md-12">
										<input type="text" class="form-control" id="iemail"/>
									</div>
								</div>
								
								<div class="form-group col-md-6" id="lkj">
									<input type="checkbox" class='tf' name="istat" id="istat" style="margin-top:35px;"> Not Approval
								</div>
							</div>
						</div>
					</div>
				</div>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
					<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_save">Save</button>
				</div>
			 </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.example-modal -->
		
		
		
		<div class="modal fade" id="XmyModal">
		  <div class="modal-dialog modal-info" id="modal-alert">
			 <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Input Data</h4>				
				</div>
				<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
							<div class="input-group">
								<div class="form-group col-md-6">
									<label>Nama Lengkap </label>
									<div class="input-group col-md-12">
										<input type="text" class="form-control pull-right" id="lnama" style="text-transform:uppercase">
									</div>
								</div>
								<div class="form-group col-md-6">
									<label>username </label>
									<div class="input-group col-md-12">
										<input type="text" class="form-control pull-right" id="lusername" style="text-transform:uppercase"/>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label>Password </label>
									<div class="input-group col-md-12">
										<input type="text" class="form-control pull-right" id="lpassword"/>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label>Jabatan </label>
									<div class="input-group col-md-12">
										<select class="form-control" id="ljabatan">  
											<option value=""> Pilih Jabatan</option>
											<?php echo $cmbjabat ?>
										</select>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label>Layanan </label>
									<div class="input-group col-md-12">
										<select class="form-control" id="llayanan">  
											<option value=""> Pilih Layanan</option>
												<?php echo $cmblayan ?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-md-6">
									<label>Level </label>
									<div class="input-group col-md-12">
										<select class="form-control" id="llevel">
											<option value=""> Pilih Level</option>
											<?php echo $cmblvl ?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-md-6">
									<label>Email </label>
									<div class="input-group col-md-12">
										<input type="text" class="form-control pull-right" id="lemail"/>
									</div>
								</div>
								
								<div class="form-group col-md-6" id="jkl">
									 <input type="checkbox" name="lstat" id="lstat" value="1" style="margin-top:35px;"> Not Approval
								</div>
								
								
							</div>
						</div>
					</div>
				</div>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
					<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan">Submit</button>
				</div>
			 </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.example-modal -->
		
		
	</div><!-- /.row -->
</section>
</div>