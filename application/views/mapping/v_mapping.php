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

<script>
	$(function(){
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
		
		
		$("#btn_picsimpan").click(function(){
			var picid 		= $('#picid').val();
			var picman 		= $('#picman').val();
			var picop 		= $('#picop').val();
			var picrek 		= $('#picrek').val();			
			var n_picman 	= $('#picman :selected').text();
			var n_picop 	= $('#picop :selected').text();
			var n_picrek 	= $('#picrek :selected').text();	
						
			var url	= "<?php echo base_url();?>index.php/mapping/simpan_pichi";
			pichix = [picid, picman, n_picman, picop, n_picop, picrek, n_picrek];
			$.post(url, {pichix : pichix}, function(res){
				//alert('Terimakasih');
				alert(res);
				location.reload();
			})
		});

	});
	
	function test(nojo){
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
		var vnojo = nojo;
		var url	= "<?php echo base_url();?>index.php/home/trajo";
		$.post(url, {data : vnojo}, function(res){
			xTable.fnDestroy();
			$('#overlay').hide();
			$('#listrincian tbody').html(res);
			$('#listrincian').dataTable(option);
		})
	}
	
	
	function pilpic(nojo, ket_done){
		//var vnojo = nojo;
		$("#picid").val(nojo);
		//$("#ket_sap").val(ket_done);
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
				<div class="box box-default" id="tar1">
					<div class="box-header with-border">
					<!--
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project .." onkeypress="handle(event)"/>
							</div>
						</div>
					-->
					</div>
					<form role="form" id="formid">
					<div class="box-body">
						<table id="listpola" class="table table-bordered table-hover">
							<thead style="background-color: #dd4b39;">
								<tr>
									<th style="display:none">x</th>
									<th>No JO</th>
									<th>Project</th>
									<th>Type JO</th>
									<th>Jenis Project</th>
									<th>Creator</th>
									<th>PIC MANAR </th>
									<th>PIC OPERASIONAL </th>
									<th>PIC REKRUTER </th>
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								/*
								if (count($transjo)){
									foreach($transjo as $key => $list){
										echo "<tr>";
										echo "<td class='id' style='display:none'>". $list['id'] ."</td>";
										echo "<td class='nojo'>". $list['nojo'] ."</td>";
										if($list['n_project']!='')
										{
											echo "<td class='project'>". $list['n_project'] ."</td>";
										}
										else
										{
											echo "<td class='project'>". $list['project'] ."</td>";
										}
										
										echo "<td class='tjo'>". $list['ntype'] ."</td>";
										echo "<td class='tjo'>". $list['hnama'] ."</td>";
										echo "<td class='upd'>". $list['upd'] ."</td>";
										echo "<td class='pichi'>". $list['n_pic_manar'] ."</td>";
										echo "<td class='pichi'>". $list['n_pic_hi'] ."</td>";
										echo "<td class='pichi'>". $list['n_pic_rekrut'] ."</td>";
										echo "<td class='kdone' style='display:none'>". $list['ket_done'] ."</td>";
										echo "<td class='krek' style='display:none'>". $list['ket_rekrut'] ."</td>";
										echo "<td><button type='button' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>Detail</button>
										<button type='button' class='btn btn-success btn-block btn-xs btnpic' id='btnpic' data-toggle='modal' data-target='#PICModal'>Pilih PIC</button>";
										echo "</td>";				
										
																	
										echo "</tr>";
									}
								}	
								*/
								?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
					
					
					</form>
				<div class="modal fade" id="XmyModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert" style="width:820px;">
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
										<th>Status</th>
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
				
				
				
				<div class="modal fade" id="PICModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">PILIH PIC</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<!--<textarea class="form-control" rows="5" name="ket_sap" id="ket_sap" readonly /></textarea>-->
									
									<select class="form-control pull-right" id="picman" name="picman" style="padding-left:-150px;"/>
											<option value=""> Pilih MANAR</option>	
											<?php foreach($cmb_manar as $cmb_manar){
												echo "<option value='".$cmb_manar->usr_loginname."'>".$cmb_manar->usr_firstname." ".$cmb_manar->usr_lastname."</option>";	
											}?>
									</select>
									<br><br><br>
									<select class="form-control pull-right" id="picop" name="picop" style="padding-left:-150px;"/>
											<option value=""> Pilih OPERASIONAL</option>	
											<?php foreach($cmbpichi as $cmbpichi){
												echo "<option value='".$cmbpichi->usr_loginname."'>".$cmbpichi->usr_firstname." ".$cmbpichi->usr_lastname."</option>";	
											}?>	
									</select>
									<br><br><br>
									<select class="form-control pull-right" id="picrek" name="picrek" style="padding-left:-150px;"/>
											<option value=""> Pilih REKRUTER</option>	
											<?php echo $cmbpicrek; ?>	
									</select>
									<input type="hidden" class="form-control pull-right" id="picid" />
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" id="awal">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_picsimpan">Save</button>
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



<script>
	//var par = $("#formid").serialize();
$(function(){
	dataString = $("#formid").serializeArray();
	var xTable =
	$("#listpola").DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		bFilter: true,
		bLengthChange: false,
		scrollX: true,
		ordering: true,
		bSort : true,
		ajax: {
		  url 		: "<?php echo base_url().'index.php/mapping/data_mapping';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		},
		columnDefs: [
        { 
            "targets": [ 0,9,10 ], //first column / numbering column
            "bVisible": false, //set not orderable
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	
	
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
	
});

</script>


