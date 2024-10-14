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

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<script type="text/javascript">
	//$(function () {
	$(document).ready(function(){		
		
		$("#respa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term,
						k: ''
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.personalarea, text: obj.personnal_area };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		
		$("#irespa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term,
						k: ''
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.personalarea, text: obj.personnal_area };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		$("#btn_simpan").click(function(){
			$('#overlay').show();
			var lnama 			= $('#lnama').val();
			var lnamaup			= lnama.toUpperCase(); 
			var lrespa			= $('#respa :selected').val();
			var lrespax			= $('#respa :selected').text();
			
			if (lnama=='') {
				alert("Nama Client Harus Di isi");
				return false;
			}
			
			if (lrespax=='') {
				alert("Personalarea Harus Di isi");
				return false;
			}
			
			var url 			= "<?php echo base_url(); ?>index.php/skema/client_simpan/";
			arrlogin			= [lnamaup, lrespa, lrespax];
			$.post(url, {xlogin:arrlogin}, function(response){
					alert('Data berhasil di simpan');
					xTable.fnDestroy();
					$('#list_client tbody').html(response);
					$('#list_client').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#lnama').val("");
					$('#respa :selected').val("");
			});
		});
		
		
		$("#btn_save").click(function(){
			$('#overlay').show();
			var inama 			= $('#inama').val();
			var iid 			= $('#iid').val();
			var inamaup			= inama.toUpperCase(); 
			var irespa			= $('#irespa :selected').val();
			var irespax			= $('#irespa :selected').text();
			
			if (irespax=='') {
				alert("Personalarea Harus Di isi");
				return false;
			}
			
			if (inama=='') {
				alert("Nama Client Harus Di isi");
				return false;
			}
			
			var url 			= "<?php echo base_url(); ?>index.php/skema/client_edit/";
			arrlogic			= [iid, inamaup, irespa, irespax];
			
			$.post(url, {xlogic:arrlogic}, function(response){
				alert('Data berhasil di ubah');
					xTable.fnDestroy();
					$('#list_client tbody').html(response);
					$('#list_client').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#inama').val("");
					$('#irespa :selected').text("");
			});
		});
	
		var xTable = $('#list_client').dataTable({
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
		});
		
		xTable.on( 'draw.dt', function () {
		
			$(".btn").click(function(){
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var tclient	 	= $row.find(".tclient").text();
				var tid			= $row.find(".tid").text();
				var tpersa		= $row.find(".tpersa").text();
				var tnpersa		= $row.find(".tnpersa").text();
				
				$("#inama").val(tclient);
				$("#iid").val(tid);
				$('#irespa :selected').text(tnpersa);
				$('#irespa :selected').val(tpersa);
			});
			
			
		});	
		
		
		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tclient	 	= $row.find(".tclient").text();
			var tid			= $row.find(".tid").text();
			var tpersa		= $row.find(".tpersa").text();
			var tnpersa		= $row.find(".tnpersa").text();
			
			$("#inama").val(tclient);
			$("#iid").val(tid);
			$('#irespa :selected').text(tnpersa);
			$('#irespa :selected').val(tpersa);
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
		var xTable = $('#list_client').dataTable({
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
			var url = "<?php echo base_url(); ?>" + "index.php/skema/listclient/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#list_client tbody').html(response);
				$('#list_client').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
	}	

	
</script>
<title>JoborderISH | <?php echo $title;?></title>
        <!-- Main content -->
<div class="content-wrapper">
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Create Nama Client</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form">
				<div class="box-body">
					<div class="form-group">
						<label>PersonalArea </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control pull-right" id="respa" name="respa" style="width:460px;"/>
								
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
					
					<div class="form-group">
						<label>Nama Client </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lnama" style="text-transform:uppercase">
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
					<h3 class="box-title">List Nama Client</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search PersonalArea atau Client.." onkeypress="handle(event)"/>
							</div>
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_client" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>PersonalArea</th>
								<th style="display:none" width="0">x</th>
								<th>Nama Client</th>
								<th style="display:none" width="0">x</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($lclientx)){
								foreach($lclientx as $key => $list){
									echo "<tr>";
									echo "<td class='tnpersa'>". $list['n_persa'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
									echo "<td class='tclient' >". $list['client'] ."</td>";
									echo "<td class='tpersa' style='display:none'>". $list['persa'] ."</td>";
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
					<label for="payrollarea" class="col-sm-4 control-label">PersonalArea : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="hidden" class="form-control" id="iid">
						<select class="form-control pull-right" id="irespa" name="irespa" style="width:380px;"/>
						
						</select>	
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Nama Client : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control" id="inama">
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