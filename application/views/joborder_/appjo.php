<link href="<?echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function () {
		var option = {
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
		};
		
		xTable = $('#listrincian').dataTable(option);
		zTable = $('#listpola').dataTable(option);
		
		$(".btndetail").click(function(){
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/trajo";
			$.post(url, {data : vnojo}, function(res){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincian tbody').html(res);
				$('#listrincian').dataTable(option);
			})
		});
		
		
		$(".btnadd").click(function(){
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			if (btn == "Waiting Approval"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Waiting Approval Admin"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval Admin </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved Admin"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Rejected"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Rejected Admin"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approve"){
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label>');
				var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan">Approve</button>'
				$("#approvalbtn").html(appbtn);
				
				$("#btnsimpan").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Berhasil Di Approve');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})	
							
				$("#btnreject").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			} else {
			$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label>');
				var appbtn1 = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Approve Admin</button>'
				$("#approvalbtn").html(appbtn1);
				
				$("#btnsimpan1").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo1";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Berhasil Di Approve');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})	
							
				$("#btnreject1").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo1";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			}
			
		});
	
		zTable.on( 'draw.dt', function () {	
		$(".btndetail").click(function(){
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/trajo";
			$.post(url, {data : vnojo}, function(res){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincian tbody').html(res);
				$('#listrincian').dataTable(option);
			})
		})
		
		
		$(".btnadd").click(function(){
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			if (btn == "Waiting Approval"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Waiting Approval Admin"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval Admin </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved Admin"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Rejected"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Rejected Admin"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approve"){
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label>');
				var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan">Approve</button>'
				$("#approvalbtn").html(appbtn);
				
				$("#btnsimpan").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Berhasil Di Approve');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})	
							
				$("#btnreject").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			} else {
			$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label>');
				var appbtn1 = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Approve Admin</button>'
				$("#approvalbtn").html(appbtn1);
				
				$("#btnsimpan1").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo1";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Berhasil Di Approve');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})	
							
				$("#btnreject1").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo1";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			}
			
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
	
	
	function handle(e){
		var xTable = $('#listpola').dataTable({
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
			var url = "<?php echo base_url(); ?>" + "index.php/home/listappjo/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listpola tbody').html(response);
				$('#listpola').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
	}		
	
</script>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Job Order
              <small>Approval</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Job Order</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project Or Updater.." onkeypress="handle(event)"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
					<div class="box-body">
						<table id="listpola" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No JO</th>
									<th>Project</th>
									<th>Persyaratan</th>
									<th>Deskripsi</th>
									<th>Bekerja</th>
									<th>Creater</th>
									<th>Last Update</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
									if ($level == 'Administrator')
									{
										if ($list['approval_admin'] == 0){
												$btn = 'Approve Admin';
												$stat = 'btn-warning';
											} elseif ($list['approval_admin'] == 1) {
												$btn = 'Approved Admin';
												$stat = 'btn-success';
											} elseif ($list['approval_admin'] == 2) {
												$btn = 'Rejected Admin';
												$stat = 'btn-danger';
											} 
									}
									else
									{
										if ($layanan == '1'){
											if ($list['approval'] == 0){
												$btn = 'Approve';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
										} else {
											if ($list['approval'] == 0){
												$btn = 'Waiting Approval';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
										}
									}
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['upd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>
										<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button></td>";
										echo "</tr>";
									}
								}								
								?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
				<div class="modal fade" id="XmyModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listrincian" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Jabatan</th>
										<th>Gender</th>
										<th>Pendidikan</th>
										<th>Lokasi</th>
										<th>Atasan</th>
										<th>Kontrak</th>
										<th>Waktu</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan">Approve</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->						
						
				<div class="modal fade" id="myModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<div class="form-group">
										<div class="input-group">
											<div id="labeljo"></div>
										</div>
									</div><!-- /.form group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<div id="approvalbtn"></div>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				</div><!-- /.box -->
			</section><!-- /.content -->
		</div><!-- /.container -->
	</div><!-- /.content-wrapper -->
