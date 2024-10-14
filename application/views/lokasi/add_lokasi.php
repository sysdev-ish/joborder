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
			var lkd_kota 		= $('#lkd_kota').val();
			var lkota	 		= $('#lkota').val();
			var larea	 		= $('#larea').val();
			
            if (lkd_kota==""){
                alert("Kode Kota tidak boleh kosong");
                return false;
            }
			
			if (lkota==""){
                alert("Kota tidak boleh kosong");
                return false;
            }
            
             if (larea==""){
                alert("Provinsi tidak boleh kosong");
                return false;
            }
            
            var url 			= "<?php echo base_url(); ?>index.php/login/lokasi_simpan/";
			arrlokasi			= [lkota, larea, lkd_kota];
            console.log(arrlokasi);
			$.post(url, {xlokasi:arrlokasi}, function(response){
				
					//custom_alert(response,"Informasi");
					alert('Data berhasil di simpan');
					xTable.fnDestroy();
					$('#list_lokasi tbody').html(response);
					$('#list_lokasi').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#lkota').val("");			
					$('#larea').val("");				
					$('#lstatus').val("");
					$('#lkd_kota').val("");
					
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
			var ikota			= $('#ikota').val();
			var ikd_kota		= $('#ikd_kota').val();
			var iarea			= $('#iarea').val();
			var iid		 		= $('#iid').val();
            
			if (ikd_kota==""){
                alert("Kode Kota tidak boleh kosong");
                return false;
            }
            
            if (ikota==""){
                alert("Kota tidak boleh kosong");
                return false;
            }
            
             if (iarea==""){
                alert("Provinsi tidak boleh kosong");
                return false;
            }
            
			var url 			= "<?php echo base_url(); ?>index.php/login/lokasi_edit/";
			arrlok				= [iid, ikota, iarea, ikd_kota];
            console.log(arrlok);
			
			$.post(url, {xlok:arrlok}, function(response){
				//custom_alert(response,"Informasi");
				//xTable.fnDestroy();
				alert('Data berhasil di Ubah');
					xTable.fnDestroy();
					$('#list_lokasi tbody').html(response);
					$('#list_lokasi').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
			});
		});
	
		var xTable = $('#list_lokasi').dataTable({
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
				var $row 	 = $(this).closest("tr");
				var tkota	 = $row.find(".tkota").text();
				var tarea	 = $row.find(".tareas").text();
				var tid		 = $row.find(".tid").text();
				var tkd_kota = $row.find(".tkd_kota").text();
				
				$("#ikota").val(tkota);
				$("#iarea").val(tarea);
				$("#ikd_kota").val(tkd_kota);
				$("#iid").val(tid);
			});
		});		

		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tkota	 = $row.find(".tkota").text();
			var tarea	 = $row.find(".tareas").text();
			var tid		 = $row.find(".tid").text();  
			var tkd_kota = $row.find(".tkd_kota").text();
				
			$("#ikota").val(tkota);
			$("#iarea").val(tarea);
            $("#ikd_kota").val(tkd_kota);
			$("#iid").val(tid);
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
		var xTable = $('#list_lokasi').dataTable({
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
			var url = "<?php echo base_url(); ?>" + "index.php/login/listlokasi/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
                var $row = $(this).closest("tr");
				var tkota	 = $row.find(".tkota").text();
				var tarea	 = $row.find(".tarea").text();
				var tid			= $row.find(".tid").text();
				
				$("#ikota").val(tkota);
				$("#iarea").val(tarea);
				$("#iid").val(tid);
                //alert(response);
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#list_lokasi tbody').html(response);
				$('#list_lokasi').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
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
					<h3 class="box-title">Form Create Location</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form">
				<div class="box-body">
					<div class="form-group">
						<label>Kode City </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lkd_kota">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group">
						<label>City </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="lkota">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group">
						<label>Province </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
<!--							<input type="text" class="form-control pull-right" id="larea">-->
                            <select class="form-control" name="" id="larea">
											<option value="">- Choose Province -</option>
											<?php echo @$listprovinsil;?>
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
					<h3 class="box-title">List Location</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search city or province.." onkeypress="handle(event)"/>
							</div>
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_lokasi" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Kode City</th>
								<th>City</th>
								<th>Province</th>
<!--								<th>Status</th>-->
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($llokasi)){
								foreach($llokasi as $key => $list){
//                                    $kd_area = $list['province_id'];
//									$area2 = $list['name_province'];
                                    
									echo "<tr>";
									echo "<td class='tkd_kota'>". $list['city_id'] ."</td>";
									echo "<td class='tkota'>". $list['city_name'] ."</td>";
									echo "<td class='tarea'>". $list['name_province'] ."</td>";
//									echo "<td class='tstatus'>". $list['status'] ."</td>";
									echo "<td class='tareas' style='display:none'>". $list['id'] ."</td>";
									echo "<td class='tid' style='display:none'>". $list['no'] ."</td>";
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
                </form>
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
					<label for="payrollarea" class="col-sm-4 control-label">Kode City : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control" id="ikd_kota">
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group">
					<label for="payrollarea" class="col-sm-4 control-label">City : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="hidden" class="form-control" id="iid">
						<input type="text" class="form-control" id="ikota">
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group">
					<label for="payrollarea" class="col-sm-4 control-label">Province : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						
<!--						<input type="text" class="form-control" id="iarea">-->
                        <select  class="form-control" id="iarea">
											<option value="">- Choose Province -</option>
											<?php echo @$listprovinsil;?>
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
        </div>
	</div><!-- /.row -->
</section>
</div>