<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": false,
			"scrollX": true,
			"bJQueryUI": false
		};
		
		yTable = $('#listrincian').dataTable(option);
		xTable = $('#listorder').dataTable(option);
		/*
		$(".btndetail").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			$("#inojo").val(vnojo);
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/detailjo/');?>",
				dataType	: "json",
				data		: {anojo:vnojo},
				success	: function(res){
					//xTable.fnDestroy();
					$('#listorder').dataTable(option);
					$('#overlay').hide();
					$('#tanggal').val(res.tanggal);
					$('#project').val(res.project);
					$('#syarat').val(res.syarat);
					$('#deskripsi').val(res.deskripsi);
					$('#jawab').val(res.jawab);
					$('#waktu').val(res.waktu);
					$('#lama').val(res.lama);
					$('#bekerja').val(res.bekerja);
					$('#btn_download').val('<?php echo base_url();?>uploads/'+ res.komponen);
				}
			})
		})
		*/
		
		$("#btn_download").click(function(){
			window.location = $("#btn_download").val();			
		});
		
		$("#btndonlot").click(function(){
			window.location = $("#btndonlot").val();			
		});
		
		
		$("#btn_simpan").click(function(){
			
			var jumlah = $("#jumlah").val();
			var rekrut = eval($("#rekrut").val());
			
			var rekruting = eval($("#rekruting").val());
			var total = rekrut + rekruting ;
			if (total > jumlah)
			{
				alert ('Jumlah rekrut sudah melebihi kebutuhan');
				return false;
			}
			
			if (rekrut > jumlah)
			{
				alert ('Jumlah rekrut sudah melebihi kebutuhan');
				return false;
			}
			
			dataString = $("#fsimpan").serialize();
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url();?>index.php/home/editjo",
				dataType	: "json",
				data		: dataString,
				success	: function(res){
					
                               alert('Data Berhasil Disimpan');
							   $('#EModal').modal('hide');
							   xTable.fnDestroy();
							   $('#overlay').hide();
								//$('#listorder tbody').html(res);
								$('#listorder').dataTable(option);
								location.reload();
							
				}
			})
			
		})
		
		
		
		$("#btn_kirim").click(function(){
			
			dataString = $("#ksimpan").serialize();
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url();?>index.php/home/simpan_komentar",
				dataType	: "json",
				data		: dataString,
				success	: function(res){
					
                               alert('Komentar Berhasil Disimpan');
							   $('#KModal').modal('hide');
							   xTable.fnDestroy();
							   $('#overlay').hide();
								//$('#listorder tbody').html(res);
								$('#listorder').dataTable(option);
								location.reload();
							
				}
			})
			
		})
		
		
		$(".btnedit").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#idnojo").val($row.find(".id").text());
			$("#unojo").val($row.find(".nojo").text());
			$("#jabatan").val($row.find(".jabatan").text());
			$("#kelamin").val($row.find(".gender").text());
			$("#lokasi").val($row.find(".lokasi").text());
			$("#jumlah").val($row.find(".jumlah").text());
			$("#rekruting").val($row.find(".rekrut").text());
		})
		
		$(".btnkomentar").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			
			$("#snojo").val($row.find(".id").text());
			$("#skomentar").val($row.find(".komentar").text());
			
		})
		
		
		$(".btnadd").click(function(){
			$('#listorder').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var gnojo = $row.find(".nojo").text();
			if (btn == "Done"){
				$("#labeljo").html('<label class="control-label"> Sudah Ada Skema </label>');
				$("#approvalbtn").html("");
			} 
			else 
			{
			$("#labeljo").html('<label class="control-label"> Anda telah menyelesaikan order skema No '+ gnojo +'</label>');
				var appbtn1 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Ya</button>'
				$("#approvalbtn").html(appbtn1);
				
				$("#btnsimpan1").click(function(){
					var vnojo = $row.find(".nojo").text();
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpan_skema";
					$.post(url, {data : vnojo}, function(res){
						alert('Data Sudah Mempunyai Skema');
						location.reload();
						
					})
				})	
			}
		});
		
		$(".btndetail").click(function(){
			$('#listorder').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/trajo";
			$.post(url, {data : vnojo}, function(res){
				yTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincian tbody').html(res);
				$('#listrincian').dataTable(option);
			})
		});


			
		xTable.on( 'draw.dt', function () {
										/*
										$(".btndetail").click(function(){
												btn = $(this).html();
												var $row = $(this).closest("tr");
												var vnojo = $row.find(".nojo").text();
												$("#inojo").val(vnojo);
												$.ajax({
													type 		: "POST",
													url		: "<?php echo base_url('index.php/home/detailjo/');?>",
													dataType	: "json",
													data		: {anojo:vnojo},
													success	: function(res){
														//xTable.fnDestroy();
														$('#listorder').dataTable(option);
														$('#overlay').hide();
														$('#tanggal').val(res.tanggal);
														$('#project').val(res.project);
														$('#syarat').val(res.syarat);
														$('#deskripsi').val(res.deskripsi);
														$('#jawab').val(res.jawab);
														$('#waktu').val(res.waktu);
														$('#lama').val(res.lama);
														$('#bekerja').val(res.bekerja);
														$('#btn_download').val('<?php echo base_url();?>uploads/'+ res.komponen);
													}
												})
										})
										*/
										
										$(".btndetail").click(function(){
											$('#listorder').dataTable(option);
											btn = $(this).html();
											var $row = $(this).closest("tr");
											var vnojo = $row.find(".nojo").text();
											$("#inojo").val(vnojo);
											var url	= "<?php echo base_url();?>index.php/home/trajo";
											$.post(url, {data : vnojo}, function(res){
												yTable.fnDestroy();
												$('#overlay').hide();
												$('#listrincian tbody').html(res);
												$('#listrincian').dataTable(option);
											})
										});
										
										$("#btn_download").click(function(){
											window.location = $("#btn_download").val();
										})
										
										$("#btndonlot").click(function(){
											window.location = $("#btndonlot").val();			
										});
					
										
										$(".btnadd").click(function(){
												$('#listorder').dataTable(option);
												btn = $(this).html();
												var $row = $(this).closest("tr");
												var vnojo = $row.find(".nojo").text();
												var gnojo = $row.find(".nojo").text();
												if (btn == "Done"){
													$("#labeljo").html('<label class="control-label"> Sudah Ada Skema </label>');
													$("#approvalbtn").html("");
												} 
											else 
											{
											$("#labeljo").html('<label class="control-label"> Anda telah membuat skema No '+ gnojo +'</label>');
												var appbtn1 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Ya</button>'
												$("#approvalbtn").html(appbtn1);
												
												$("#btnsimpan1").click(function(){
													var vnojo = $row.find(".nojo").text();
													$("#inojo").val(vnojo);
													var url	= "<?php echo base_url();?>index.php/home/simpan_skema";
													$.post(url, {data : vnojo}, function(res){
														alert('Data Sudah Mempunyai Skema');
														location.reload();
														
													})
												})	
												
											}
										})
			
											
											$("#btn_kirim").click(function(){
										
												dataString = $("#ksimpan").serialize();
												
												$.ajax({
													type 		: "POST",
													url		: "<?php echo base_url();?>index.php/home/simpan_komentar",
													dataType	: "json",
													data		: dataString,
													success	: function(res){
														
																   alert('Komentar Berhasil Disimpan');
																   $('#KModal').modal('hide');
																   xTable.fnDestroy();
																   $('#overlay').hide();
																	//$('#listorder tbody').html(res);
																	$('#listorder').dataTable(option);
																	location.reload();
																
													}
												})
												
											})
			
			
											$(".btnedit").click(function(){
												btn = $(this).html();
												var $row = $(this).closest("tr");
												$("#idnojo").val($row.find(".id").text());
												$("#unojo").val($row.find(".nojo").text());
												$("#jabatan").val($row.find(".jabatan").text());
												$("#kelamin").val($row.find(".gender").text());
												$("#lokasi").val($row.find(".lokasi").text());
												$("#jumlah").val($row.find(".jumlah").text());
												$("#rekruting").val($row.find(".rekrut").text());
											})
											
											
			
											$(".btnkomentar").click(function(){
												btn = $(this).html();
												var $row = $(this).closest("tr");
												$("#snojo").val($row.find(".nojo").text());
												$("#skomentar").val($row.find(".komentar").text());
											})
			
			
			
		});
	});
	
	
	function handle(e){
		var xTable = $('#listorder').dataTable({
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
			var url = "<?php echo base_url(); ?>" + "index.php/home/listjo/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listorder tbody').html(response);
				$('#listorder').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
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
				<div class="box box-default">
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project.." onkeypress="handle(event)"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
					<div class="box-body">
						<table id="listorder" class="table table-bordered table-hover">
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
									<th style="display:none">x</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
										if ($list['skema'] == 0){
											$btn = 'OnProgress';
											$stat = 'btn-warning';
										} elseif ($list['skema'] == 1) {
											$btn = 'Done';
											$stat = 'btn-success';
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
										echo "<td class='komentar' style='display:none'>". $list['komentar'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";?>
										<br /><a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btndonlot' id='btndonlot' value='<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>'>Download</button></a><br />
										 <?php 
										 echo "<button type='submit' class='btn btn-warning btn-block btn-xs btnkomentar' id='btnkomentar' data-toggle='modal' data-target='#KModal'>Comment</button>";
										echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#PmyModal'>" . $btn . "</button></td>";
										 echo "</td>"; 
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
							<h4 class="modal-title">Rincian JO</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<div class="form-group">
										<label class="col-sm-3 control-label">NO JO</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-desktop"></i>
												</div>
												<input type="text" class="form-control pull-right" id="inojo" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divjabatan">
										<label class="col-sm-3 control-label">Tanggal</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="tanggal" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divjabatan">
										<label class="col-sm-3 control-label">Nama Project</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="project" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divjabatan">
										<label class="col-sm-3 control-label">Persyaratan</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="syarat" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divdeskripsi">
										<label class="col-sm-3 control-label">Deskripsi</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="deskripsi" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divlama">
										<label class="col-sm-3 control-label">Lama</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="lama" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divbekerja">
										<label class="col-sm-3 control-label">Tgl Bekerja</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="bekerja" size="25" />
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Download Dokumen</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<button type="button" class="btn btn-outline" id="btn_download">Download Dokumen</button>
												<!--<input type="text" class="form-control pull-right" id="komponen" size="25" />-->
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan">Approve</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->			
				
				
				
				<div class="modal fade" id="PmyModal" role="dialog">
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
				
				
				
				<div class="modal fade" id="KModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Add Comment</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" name="ksimpan" id="ksimpan" method="post">
								<div class="box-body">
									<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-desktop"></i>
												</div>
												<input type="hidden" class="form-control pull-right" name="snojo" id="snojo">
												<textarea class="form-control" rows="5" name="skomentar" id="skomentar" /></textarea>
												
									</div><!-- /.input group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
							<button type="submit" class="btn btn-outline" id="btn_kirim">Simpan</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->			
				
				
				
				
							
				<div class="modal fade" id="EModal" role="dialog">
				  <div class="modal-dialog modal-success" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" name="fsimpan" id="fsimpan" method="post">
								<div class="box-body">
									<div class="form-group" id="divnojo">
										<label class="col-sm-3 control-label">No JO</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
											<input type="text" class="form-control pull-right" name="unojo" id="unojo" size="25" readonly >
											<input type="hidden" class="form-control pull-right" name="idnojo" id="idnojo">
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divjabatan">
										<label class="col-sm-3 control-label">Jabatan</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
											<input type="text" class="form-control pull-right" name="jabatan" id="jabatan" size="25" readonly >
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divkelamin">
										<label class="col-sm-3 control-label">Kelamin</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="kelamin" id="kelamin" size="25" readonly >
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divlokasi">
										<label class="col-sm-3 control-label">Lokasi</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="lokasi" id="lokasi" size="25" readonly >
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divlokasi">
										<label class="col-sm-3 control-label">Kebutuhan</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="jumlah" id="jumlah" size="25" readonly >
											</div><!-- /.input group -->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group" id="divrekrut">									
									<label class="col-sm-3 control-label"></label>
									<div class="col-sm-9">
									<table width="100%" border="0">
									<tr>
										<td width="45%">
										Jumlah Lulus HR
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="hr" id="hr" size="25" >
												
										</div><!-- /.input group -->
										</td>
										
										<td width="10%"></td>
										
										<td width="45%">
										Jumlah Lulus User
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="user" id="user" size="25" >
												
										</div><!-- /.input group -->
										</td>
									</tr>
									
									<tr><td><label></label></td><td><label></label></td></tr>
									
									<tr>
										<td width="45%">
										Jumlah Lulus Training
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="training" id="training" size="25" >
												
										</div><!-- /.input group -->
										</td>
										
										<td width="10%"></td>
										
										<td width="45%">
										Jumlah Onboard/PKWT
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="rekrut" id="rekrut" size="25" >
												<input type="hidden" class="form-control pull-right" name="rekruting" id="rekruting" size="25" >
										</div><!-- /.input group -->
										</td>
									</tr>
									
									</table>
									</div>
									</div>
									<br/>
									<!--
									<div class="form-group" id="divrekrut">
										<label class="col-sm-3 control-label">Jml Onboard/PKWT</label>
										<div class="col-sm-9">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="rekrut" id="rekrut" size="25" >
												<input type="hidden" class="form-control pull-right" name="rekruting" id="rekruting" size="25" >
											</div>
										</div>
									</div> -->
									<div class="form-group" id="divnote">
										<label class="col-sm-3 control-label">Notes</label>
										<div class="col-sm-9">
											<div class="input-group-addon">												
												<textarea class="form-control" rows="3" id="note" name="note" placeholder="Input Notes..."/></textarea>
											</div
										></div>
									</div> 
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
							<button type="submit" class="btn btn-outline" id="btn_simpan">Save</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->						
				</div><!-- /.box -->
			</section><!-- /.content -->
			
		<!-- </div> --><!-- /.container -->
		
	</div><!-- /.content-wrapper -->
