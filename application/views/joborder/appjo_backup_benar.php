<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/select2/select2-bootstrap.css" />

<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		
		<script src="<?php echo base_url(); ?>public/plugins/datepicker/my.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function () {
		
		var option = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": true,
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
		
		
		
		$('#duedate').datepicker({format: 'yyyy-mm-dd', startDate : '0', autoclose : true});
		$('#duedate1').datepicker({format: 'yyyy-mm-dd', startDate : '0', autoclose : true});
		
		$("#btn_download").click(function(){
			//var lkomponen = $row.find(".komponen").text();
			//$(".btn_download").val('<?php echo base_url();?>uploads/'+ lkomponen);
			window.location = $("#btn_download").val();			
		});
		
		
		$(".btnadd").click(function(){
			$('#ket').val(''); 
			$('#ssalary').val('');	
			$('#esalary').val('');	
			$('#exper').val('');	
			$('#level').val('');
			$('#job_skills').val('');
			$('#job_benefits').val('');
			$('#duedate').val('');	
			$('#duedate1').val('');	
			
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			
			$("#testing").slideUp("slow");
				
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
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_atasan" name="ket_atasan"/></textarea>');
				
				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var atasan = $row.find(".atasan").text();
				
				$("#ket_atasan").val(atasan);
				
				$("#approvalbtn").html("");
			} else if (btn == "Rejected Admin"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_admin" name="ket_admin"/></textarea>');
				
				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var admin = $row.find(".admin").text();
				
				$("#ket_admin").val(admin);
				
				$("#approvalbtn").html("");
			} else if (btn == "Approve"){
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><br><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan">Approve</button>'
				$("#approvalbtn").html(appbtn);
				
				$("#btnsimpan").click(function(){
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
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
					var ket_status 		= $('#ket').val();			
					
					if(ket_status == ""){
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}
				
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
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
			$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				var appbtn1 = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Approve Admin</button>'
				$("#approvalbtn").html(appbtn1);
				
				$("#btnsimpan1").click(function(){
				
					$("#testing").slideDown("slow");
					//var ssalary 	= $('#ssalary').val();	
					var angka 		 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('ssalary').value))));
					var ssalary		 = angka ;
					
					//var esalary 	= $('#esalary').val();	
					var angka1 		 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('esalary').value))));
					var esalary		 = angka1 ;
					
					var exper 		= $('#exper').val();	
					var level 		= $('#level').val();
					var job_skills 	= $('#job_skills').val();
					var job_benefits= $('#job_benefits').val();
					var duedate 	= $('#duedate').val();	
					var duedate1 	= $('#duedate1').val();				
					
					if( (ssalary == "") && (esalary == "") && (exper == "") && (level == "") && (job_skills == "") && (job_benefits == "") && (duedate == "") && (duedate1 == "") ) {
						alert("Silahkan input data berikut terlebih dahulu !!");
						return false;
					}
					else if((ssalary == "") || (esalary == "")){
						alert("Range Salary Tidak Boleh Kosong !!");
						return false;
					}
					else if(level == "") {
						alert("Level Tidak Boleh Kosong !!");
						return false;
					}
					else if(exper == "") {
						alert("Experience Tidak Boleh Kosong !!");
						return false;
					}
					else if(job_skills == "") {
						alert("Skills Tidak Boleh Kosong !!");
						return false;
					}
					
					else if( (duedate == "") || (duedate1 == "") ) {
						alert("Range Tanggal Posting Tidak Boleh Kosong !!");
						return false;
					}
					 
				
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo1";
					arrappjo = [vnojo, ket, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
					//arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
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
					var ket_status 		= $('#ket').val();			
					
					if(ket_status == ""){
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}
					
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo1";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
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
		
		$("#btn_download").click(function(){
			//var lkomponen = $row.find(".komponen").text();
			//$("#btn_download").val('<?php echo base_url();?>uploads/'+ lkomponen);
			window.location = $("#btn_download").val();			
		});
		
		
		$(".btnadd").click(function(){
			$('#ket').val(''); 
			$('#ssalary').val('');	
			$('#esalary').val('');	
			$('#exper').val('');	
			$('#level').val('');
			$('#job_skills').val('');
			$('#job_benefits').val('');
			$('#duedate').val('');	
			$('#duedate1').val('');	
			
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var atasan = $row.find(".atasan").text();
			var admin = $row.find(".admin").text();
			
			$("#ket_atasan").val(atasan);
			$("#ket_admin").val(admin);
			$("#testing").slideUp("slow");
			
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
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_atasan" name="ket_atasan"/></textarea>');
				
				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var atasan = $row.find(".atasan").text();
				
				$("#ket_atasan").val(atasan);
				
				$("#approvalbtn").html("");
			} else if (btn == "Rejected Admin"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_admin" name="ket_admin"/></textarea>');
				
				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var admin = $row.find(".admin").text();
				
				$("#ket_admin").val(admin);
				
				$("#approvalbtn").html("");
			} else if (btn == "Approve"){
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan">Approve</button>'
				$("#approvalbtn").html(appbtn);
				
				$("#btnsimpan").click(function(){
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
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
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
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
			$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				var appbtn1 = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Approve Admin</button>'
				$("#approvalbtn").html(appbtn1);
				
				
				$("#btnsimpan1").click(function(){
					
					$("#testing").slideDown("slow");
					//var ssalary 	= $('#ssalary').val();	
					var angka 		 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('ssalary').value))));
					var ssalary		 = angka ;
					
					//var esalary 	= $('#esalary').val();	
					var angka1 		 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('esalary').value))));
					var esalary		 = angka1 ;
					
					var exper 		= $('#exper').val();	
					var level 		= $('#level').val();
					var job_skills 	= $('#job_skills').val();
					var job_benefits= $('#job_benefits').val();
					var duedate 	= $('#duedate').val();	
					var duedate1 	= $('#duedate1').val();				
					
					if( (ssalary == "") && (esalary == "") && (exper == "") && (level == "") && (job_skills == "") && (job_benefits == "") && (duedate == "") && (duedate1 == "") ) {
						alert("Silahkan input data berikut terlebih dahulu !!");
						return false;
					}
					else if((ssalary == "") || (esalary == "")){
						alert("Range Salary Tidak Boleh Kosong !!");
						return false;
					}
					else if(level == "") {
						alert("Level Tidak Boleh Kosong !!");
						return false;
					}
					else if(exper == "") {
						alert("Experience Tidak Boleh Kosong !!");
						return false;
					}
					else if(job_skills == "") {
						alert("Skills Tidak Boleh Kosong !!");
						return false;
					}
					/*else if(job_benefits == "") {
						alert("Benefits Tidak Boleh Kosong !!");
						return false;
					}*/
					else if( (duedate == "") || (duedate1 == "") ) {
						alert("Range Tanggal Posting Tidak Boleh Kosong !!");
						return false;
					}
					
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo1";
					arrappjo = [vnojo, ket, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Approve');
						//alert();
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
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo1";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
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
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": true,
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
				$('#listpola').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
	}		
	
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
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project .." onkeypress="handle(event)"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
					<div class="box-body">
						<table id="listpola" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th align="center">No JO</th>
									<th align="center">Project</th>
									<th align="center">Persyaratan</th>
									<th align="center">Deskripsi</th>
									<th align="center">Bekerja</th>
									<th align="center">Creater</th>
									<th align="center">Last Update</th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
									if ($level == '4')
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
									else if ($level == '2')
									{
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
									}
									else 
									{
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
									
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['upd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td class='atasan' style='display:none'>". $list['ket_atasan'] ."</td>";
										echo "<td class='admin' style='display:none'>". $list['ket_admin'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";
										echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";
										if ($level == '4')
										{ ?><br />
										<a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btn_download' id='btn_download'>Download</button></a>
										 <?php } echo "</td>"; echo "</tr>";
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
										<!--<th>Dokumen Pendukung</th>-->
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
											<div id="labeljo"></div>
									</div><!-- /.form group -->
									
							<div id="testing">		
									<div class="form-group">
										<label>Salary</label>
										<div class="input-group">
										<table>
										<tr>
											<td width="300px"><input type="text" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="ssalary"/></td>
											<td width="50px" align="center">To</td>
											<td width="300px"><input type="text" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="esalary"/></td> 
										</tr>	
										</table>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<table border="0">
									<tr>
									<td>
										<div class="form-group">
											<label>Job Level</label>
											<div class="input-group">
											<select class="form-control" id="level">
												<option value=""> Pilih Job Level</option>
												<?php echo $cmblevel ?>
											</select>
											</div><!-- /.input group -->
										</div><!-- /.form group -->
									</td>
									
									<td width="80px"></td>
									
									<td> 
										<div class="form-group">
											<label>Experience</label>
											<div class="input-group">
											<select class="form-control" id="exper">
												<option value=""> Pilih Job Experience</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
											</select>
											</div><!-- /.input group -->
										</div><!-- /.form group -->
									</td>
									</tr>
									</table>
									
									 <div class="form-group">
										<label for="job_skills">Skills Required</label>
										<input type="hidden" data-placeholder="Choose skills..." id="job_skills" 
											name="job_skills" style="width:100%;" class="select2-offscreen form-control"/>
									</div>
									
									<div class="form-group">
										<label for="job_skills">Benefits(optional)</label>
										<input type="hidden" data-placeholder="Choose Benefits..." id="job_benefits" 
											name="job_benefits" style="width:100%;" class="select2-offscreen form-control"/>
									</div>
									
									<div class="form-group">
										<label>Publish Start</label>
										<div class="input-group">
										<table>
										<tr>
											<td width="300px"><input type="text" class="form-control" id="duedate"/></td>
											<td width="50px" align="center">s/d</td>
											<td width="300px"><input type="text" class="form-control" id="duedate1"/></td> 
										</tr>	
										</table>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
						</div>
									
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
	</div><!-- /.content-wrapper -->
	
<script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
$(".select2").select2();

$("#job_skills").select2({
	createSearchChoice:function(term, data) { 
		if ($(data).filter(function() { 
			return this.text.localeCompare(term)===0; 
		}).length===0) {
			return {id:term, text:term};
		} 
	},
	multiple: true,
	data: [
		<?php 
			foreach ($form_job_skills as $value) {
				echo "{id: ".$value->id.", text:'".$value->skill_name."'},";            
			}
		?>
	],
	separator: "|"
});

$("#job_benefits").select2({
	createSearchChoice:function(term, data) { 
		if ($(data).filter(function() { 
			return this.text.localeCompare(term)===0; 
		}).length===0) {
			return {id:term, text:term};
		} 
	},
	multiple: true,
	data: [
		<?php 
			foreach ($form_job_benefits as $value) {
				echo "{id: ".$value->id.", text:'".$value->name_benefits."'},";            
			}
		?>
	],
	separator: "|"
});
	
</script>
