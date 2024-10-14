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
			var lmanar 			= $('#lmanar').val();
			var lkota	 		= $('#lkota').val();
			var larea	 		= $('#larea').val();
			var larea_nama		= $('#larea :selected').text();
			
            if (lmanar==""){
                alert("Manar tidak boleh kosong");
                return false;
            }
			
			if (lkota==""){
                alert("Kota tidak boleh kosong");
                return false;
            }
            
             if (larea==""){
                alert("PersonalArea tidak boleh kosong");
                return false;
            }
            
            var url 			= "<?php echo base_url(); ?>index.php/login/map_manar_simpan/";
			arrlokasi			= [lkota, larea, lmanar, larea_nama];
            //console.log(arrlokasi);
			$.post(url, {xlokasi:arrlokasi}, function(response){
				
					//custom_alert(response,"Informasi");
					alert('Data berhasil di simpan');
					xTable.fnDestroy();
					$('#list_lokasi tbody').html(response);
					$('#list_lokasi').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#lkota').val("");			
					$('#larea').val("");				
					$('#lstatus').val("");
					$('#lmanar').val("");
					
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
			var ipersa			= $('#ipersa').val();
			var imanar			= $('#imanar').val();
			var ipersa_nama		= $('#ipersa :selected').text();
			var iid		 		= $('#iid').val();
            
			if (imanar==""){
                alert("Manar tidak boleh kosong");
                return false;
            }
            
            if (ikota==""){
                alert("Kota tidak boleh kosong");
                return false;
            }
            
             if (ipersa==""){
                alert("PersonalArea tidak boleh kosong");
                return false;
            }
            
			var url 			= "<?php echo base_url(); ?>index.php/login/map_manar_edit/";
			arrlok				= [iid, ikota, ipersa, imanar, ipersa_nama];
            //console.log(arrlok);
			
			$.post(url, {xlok:arrlok}, function(response){
				//custom_alert(response,"Informasi");
				//alert(response);
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
				var tusername= $row.find(".tusername").text();
				var tarea_id = $row.find(".tarea_id").text();
				var tid		 = $row.find(".tid").text();
				var tper_id  = $row.find(".tper_id").text();
				
				$("#ikota").val(tarea_id);
				$("#ipersa").val(tper_id);
				$("#imanar").val(tusername);
				$("#iid").val(tid);
			});
		});		

		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tusername= $row.find(".tusername").text();
			var tarea_id = $row.find(".tarea_id").text();
			var tid		 = $row.find(".tid").text();
			var tper_id  = $row.find(".tper_id").text();
				
			$("#ikota").val(tarea_id);
			$("#ipersa").val(tper_id);
			$("#imanar").val(tusername);
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
			var url = "<?php echo base_url(); ?>" + "index.php/login/listmap_manar/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
                
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
					<h3 class="box-title">Form Create Mapping Manar</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form">
				<div class="box-body">
					
					<div class="form-group">
						<label>City </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select class="form-control" name="" id="lkota">
								<option value="">- Choose City -</option>
								<?php echo @$listcity;?>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
					<div class="form-group">
						<label>PersonalArea </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
<!--							<input type="text" class="form-control pull-right" id="larea">-->
                            <select class="form-control" name="" id="larea">
								<option value="">- Choose PersonalArea -</option>
								<?php echo @$listpersa;?>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
					
					<div class="form-group">
						<label>Manar </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
<!--							<input type="text" class="form-control pull-right" id="larea">-->
                            <select class="form-control" name="" id="lmanar">
											<option value="">- Choose Manar -</option>
											<?php echo @$listmanar;?>
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
					<h3 class="box-title">List Mapping Manar</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search city or personalarea.." onkeypress="handle(event)"/>
							</div>
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_lokasi" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>PersonalArea</th>
								<th>City</th>
								<th>Manar</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($lmap_manar)){
								foreach($lmap_manar as $key => $list){
//                                    $kd_area = $list['province_id'];
//									$area2 = $list['name_province'];
									echo "<tr>";
									echo "<td class='tkota'>". $list['personalarea'] ."</td>";
									echo "<td class='tarea'>". $list['city_name'] ."</td>";
									echo "<td class='tmanar'>". $list['nama'] ."</td>";
									echo "<td class='tarea_id' style='display:none'>". $list['city_id'] ."</td>";
									echo "<td class='tper_id' style='display:none'>". $list['personalareaid'] ."</td>";
									echo "<td class='tusername' style='display:none'>". $list['username'] ."</td>";
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
					<label for="payrollarea" class="col-sm-4 control-label">City : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="hidden" class="form-control" id="iid">
						<select class="form-control" name="" id="ikota">
							<option value="">- Choose City -</option>
							<?php echo @$listcity;?>
						</select>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group">
					<label for="payrollarea" class="col-sm-4 control-label">PersonalArea : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						
<!--						<input type="text" class="form-control" id="iarea">-->
                        <select  class="form-control" id="ipersa">
											<option value="">- Choose PersonalArea -</option>
											<?php echo @$listpersa;?>
										</select>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				
				<div class="form-group">
					<label for="payrollarea" class="col-sm-4 control-label">Manar : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						
<!--						<input type="text" class="form-control" id="iarea">-->
                        <select  class="form-control" id="imanar">
											<option value="">- Choose Manar -</option>
											<?php echo @$listmanar;?>
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