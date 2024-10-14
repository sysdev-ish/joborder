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
		
		
		$("#larea").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar_are",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term,
						k: $("#respa").val()
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.karea, text: obj.narea };
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
		
		
		$("#iarea").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar_are",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term,
						k: $("#irespa").val()
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.karea, text: obj.narea };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		
		$("#lkomp").change(function(){
			var lkomp = $('#lkomp').val();
			var url = "<?php echo base_url(); ?>index.php/skema/pilih_det";
			$.post(url, {data:lkomp}, function(response){
				$("#ljnspb").html(response);
			})
		})
		
		
		$("#btn_simpan").click(function(){
			$('#overlay').show();
			var ljnspb 			= $('#ljnspb').val();
			var ljml 			= $('#ljml').val();
			var lkomp 			= $('#lkomp').val();
			var lkompx			= $('#lkomp :selected').text();
			//var lnamaup			= lnama.toUpperCase(); 
			var lrespa			= $('#respa :selected').val();
			var lrespax			= $('#respa :selected').text();
			var larea			= $('#larea :selected').val();
			var lareax			= $('#larea :selected').text();
			
			if (ljml=='') {
				alert("Jumlah Harus Di isi");
				return false;
			}
			
			if (ljnspb=='') {
				alert("Jenis Pengali Harus Di isi");
				return false;
			}
			
			var url 			= "<?php echo base_url(); ?>index.php/skema/mpb_simpan/";
			arrlogin			= [lrespa, lrespax, larea, lareax, ljml, ljnspb, lkomp, lkompx];
			$.post(url, {xlogin:arrlogin}, function(response){
					alert('Data berhasil di simpan');
					xTable.fnDestroy();
					$('#list_client tbody').html(response);
					$('#list_client').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#ljml').val("");
					$('#ljnspb').val("");
					$('#respa :selected').val("");
					$('#respa :selected').text("");
					$('#larea :selected').val("");
					$('#larea :selected').text("");
			});
		});
		
		
		$("#btn_save").click(function(){
			$('#overlay').show();
			var iid 			= $('#iid').val();
			var ikomp 			= $('#ikomp').val();
			var ikompx			= $('#ikomp :selected').text();
			var ijnspb 			= $('#ijnspb').val();
			var ijml 			= $('#ijml').val();
			//var lnamaup			= lnama.toUpperCase(); 
			var irespa			= $('#irespa :selected').val();
			var irespax			= $('#irespa :selected').text();
			var iarea			= $('#iarea :selected').val();
			var iareax			= $('#iarea :selected').text();
			
			if (ijml=='') {
				alert("Jumlah Harus Di isi");
				return false;
			}
			
			if (ijnspb=='') {
				alert("Jenis Pengali Harus Di isi");
				return false;
			}
			
			var url 			= "<?php echo base_url(); ?>index.php/skema/mpb_edit/";
			arrlogic			= [iid, irespa, irespax, iarea, iareax, ijml, ijnspb, ikomp, ikompx];
			
			$.post(url, {xlogic:arrlogic}, function(response){
				alert('Data berhasil di ubah');
					xTable.fnDestroy();
					$('#list_client tbody').html(response);
					$('#list_client').dataTable({"bFilter": true, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#ijml').val("");
					$('#ijnspb').val("");
					$('#irespa :selected').val("");
					$('#irespa :selected').text("");
					$('#iarea :selected').val("");
					$('#iarea :selected').text("");
			});
		});
	
		var xTable = $('#list_client').dataTable({
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
				var tjml	 	= $row.find(".tjml").text();
				var tjns	 	= $row.find(".tjns").text();
				var tid			= $row.find(".tid").text();
				var tpersa		= $row.find(".tpersa").text();
				var tnpersa		= $row.find(".tnpersa").text();
				var tarea		= $row.find(".tarea").text();
				var tnarea		= $row.find(".tnarea").text();
				var tkomp		= $row.find(".tkomp").text();
				
				$("#ijml").val(tjml);
				$("#ijnspb").val(tjns);
				$("#iid").val(tid);
				$('#irespa :selected').text(tnpersa);
				$('#irespa :selected').val(tpersa);
				$('#iarea :selected').text(tnarea);
				$('#iarea :selected').val(tarea);
				$("#ikomp").val(tkomp);
			});
		});	
		
		
		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tjml	 	= $row.find(".tjml").text();
			var tjns	 	= $row.find(".tjns").text();
			var tid			= $row.find(".tid").text();
			var tpersa		= $row.find(".tpersa").text();
			var tnpersa		= $row.find(".tnpersa").text();
			var tarea		= $row.find(".tarea").text();
			var tnarea		= $row.find(".tnarea").text();
			var tkomp		= $row.find(".tkomp").text();
			
			$("#ijml").val(tjml);
			$("#ijnspb").val(tjns);
			$("#iid").val(tid);
			$('#irespa :selected').text(tnpersa);
			$('#irespa :selected').val(tpersa);
			$('#iarea :selected').text(tnarea);
			$('#iarea :selected').val(tarea);
			$("#ikomp").val(tkomp);
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
			"bFilter": true,
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
				$('#list_client').dataTable({"bFilter": true, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
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
		<div class="col-md-5">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Create Rumus PB</h3>
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
							<select class="form-control pull-right" id="respa" name="respa" style="width:100%;"/>
								
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
					<div class="form-group">
						<label>Area </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control pull-right" id="larea" name="larea" style="width:100%;"/>
								
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
					<div class="form-group">
						<label>Komponen </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control pull-right" id="lkomp" name="lkomp" style="width:100%;"/>
								<option value="">Pilih</option>
								<option value="4015">THR</option>
								<option value="4078">UAK</option>
								<option value="4017">TAT</option>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
					<div class="row">
					<div class="col-md-12">
						<div class="col-md-3">
							<label>jumlah</label>
							<input type="text" class="form-control" id="ljml" name="ljml"> 
						</div><!-- /.input group -->
						<div class="col-md-2">
							<label>&nbsp;</label>
							<input type="button" class="form-control" value="X">
						</div><!-- /.input group -->
						<div class="col-md-7">
							<label>Pengali</label>
							<select class="form-control pull-right" id="ljnspb" name="ljnspb" style="width:100%;"/>
								<option value="">Pilih</option>
								<?php //echo $cmbpb; ?>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					</div>
					
					
				</div><!-- /.box-body -->
				<div class="box-footer">
					<button type="button" class="btn btn-primary" id="btn_simpan">Submit</button>
				</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.box -->
		<div class="col-md-7">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">List Rumus PB</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				
							
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_client" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Komponen</th>
								<th>PersonalArea</th>
								<th>Area</th>
								<th>Jumlah</th>
								<th>Pengali</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($lmpb)){
								foreach($lmpb as $key => $list){
									echo "<tr>";
									echo "<td class='tnkomp'>". $list['n_komponen'] ."</td>";
									echo "<td class='tnpersa'>". $list['n_persa'] ."</td>";
									echo "<td class='tnarea'>". $list['n_area'] ."</td>";
									echo "<td class='tjml' >". $list['jml'] ."</td>";
									echo "<td class='tjns' >". $list['jns'] ."</td>";
									echo "<td class='tpersa' style='display:none'>". $list['persa'] ."</td>";
									echo "<td class='tarea' style='display:none'>". $list['area'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['id'] ."</td>";
									echo "<td class='tkomp' style='display:none'>". $list['komponen'] ."</td>";
									echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#myModal'>Edit</button></td>";
									echo "</tr>";
								}
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
						<select class="form-control pull-right" id="irespa" name="irespa" style="width:100%;"/>
						
						</select>	
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				<div class="form-group>"
					<label for="payrollarea" class="col-sm-4 control-label">Area : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select class="form-control pull-right" id="iarea" name="iarea" style="width:100%;"/>
						
						</select>	
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				<div class="form-group">
						<label>Komponen </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control pull-right" id="ikomp" name="ikomp" style="width:100%;"/>
								<option value="">Pilih</option>
								<option value="4015">THR</option>
								<option value="4078">UAK</option>
								<option value="4017">TAT</option>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-5">
							<label>jumlah</label>
							<input type="text" class="form-control" id="ijml" name="ijml"> 
						</div><!-- /.input group -->
						<div class="col-md-2">
							<label>&nbsp;</label>
							<input type="button" class="form-control" value="X">
						</div><!-- /.input group -->
						<div class="col-md-5">
							<label>Bedasarkan</label>
							<select class="form-control pull-right" id="ijnspb" name="ijnspb" style="width:100%;"/>
								<option value="">Pilih</option>
								<?php echo $cmbpb; ?>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
				</div>
				
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