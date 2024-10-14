<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">
<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
			var ljabatan 		= $('#ljabatan').val();
			var lkategori 		= $('#lkategori').val();
            
            if (ljabatan==""){
                alert("jabatan tidak boleh kosong");
                return false;
            }
            
             if (lkategori==""){
                alert(" jabatan kategori tidak boleh kosong");
                return false;
            }
            
//            console.log(lkategori);
//            return false;
			var url 			= "<?php echo base_url(); ?>index.php/login/jabatan_simpan/";
			arrjabatan			= [ljabatan, lkategori];
			
			$.post(url, {xjabatan:arrjabatan}, function(response){
				
					//custom_alert(response,"Informasi");
					alert('Data berhasil di simpan');
					xTable.fnDestroy();
					$('#list_jabatan tbody').html(response);
					$('#list_jabatan').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
					$('#ljabatan').val("");				
					$('#lkategori').val("");
					
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
			var ijabatan		= $('#ijabatan').val();
			var iid		 		= $('#iid').val();
			var ikategori		= $('#ikategori').val();
            
            if (ijabatan==""){
                alert("jabatan tidak boleh kosong");
                return false;
            }
            
             if (ikategori==""){
                alert(" jabatan kategori tidak boleh kosong");
                return false;
            }
            
           arrjab				= [iid, ijabatan, ikategori];
		   var url 			= "<?php echo base_url(); ?>index.php/login/jabatan_edit/";
			
			$.post(url, {xjab:arrjab}, function(response){
					//alert(response);
					alert('Data berhasil di Ubah');
					xTable.fnDestroy();
					$('#list_jabatan tbody').html(response);
					$('#list_jabatan').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});
			});
		});
	
		var xTable = $('#list_jabatan').dataTable({
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
				var tjabatan	 = $row.find(".tjabatan").text();
				var tid			 = $row.find(".tid").text();
				var tkategori	 = $row.find(".tkategoris").text();
					
				$("#ijabatan").val(tjabatan);
				$("#iid").val(tid);
				$("#ikategori").val(tkategori);
			});
		});		

		$(".btn").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var tjabatan	 = $row.find(".tjabatan").text();
			var tid			 = $row.find(".tid").text();
			var tkategori	 = $row.find(".tkategoris").text();
				
			$("#ijabatan").val(tjabatan);
			$("#iid").val(tid);
			$("#ikategori").val(tkategori);
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
		var xTable = $('#list_jabatan').dataTable({
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

		if(e.keyCode === 13){
			var url = "<?php echo base_url(); ?>" + "index.php/login/listjabatan/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
                //alert(response);
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#list_jabatan tbody').html(response);
				$('#list_jabatan').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
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
					<h3 class="box-title">Form Create Jabatan</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form">
				<div class="box-body">
					<div class="form-group">
						<label>Jabatan </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="ljabatan">
						</div><!-- /.input group -->
					</div><!-- /.form group -->
                    
                    <div class="form-group">
						<label>Jabatan Kategori </label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<select  class="form-control" id="lkategori">
											<option value="">- Pilih Jabatan -</option>
											<?php echo @$listjabatanl;?>
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
					<h3 class="box-title">List Jabatan</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search jabatan.." onkeypress="handle(event)"/>
							</div>
				
				<form class="form-horizontal">
				<div class="box-body">
					<table id="list_jabatan" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Jabatan</th>
								<th>Jabatan Kategori</th>
								<th style="display:none" width="0">x</th>
								<th style="display:none" width="0">x</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if (count($ljabatan)){
								foreach($ljabatan as $key => $list){
                                    $listjob = $list['id'];
                                    $listjob1 = $list['name_job_function_category'] ;
                                    
                                    
									echo "<tr>";
									echo "<td class='tjabatan'>". $list['name_job_function'] ."</td>";
									echo "<td class='tkategori'>". $list['name_job_function_category'] ."</td>";
//									//echo "<td class='tkategorijj1' style='display:none'>". $list['function_category'] ."</td>";
//                                    echo "<td class='tarea' style='display:none;'>". $list['kd_area'] ."</td>"; 
									echo "<td class='tkategoris' style='display:none'>". $list['id'] ."</td>";
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
					<label for="payrollarea" class="col-sm-4 control-label">Jabatan : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="hidden" class="form-control" id="iid">
						<input type="text" class="form-control" id="ijabatan">
					</div><!-- /.input group -->
				</div><!-- /.form group -->
                    
				<div class="form-group">
					<label for="payrollarea" class="col-sm-4 control-label">Jabatan Kategori : </label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select  class="form-control" type="text" id="ikategori">
<!--                            <option value="<?php //echo $listjob;?>"><?php //echo $listjob1;?></option>-->
											<option value="">- Pilih Jabatan -</option>
											<?php echo @$listjabatanl;?>
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