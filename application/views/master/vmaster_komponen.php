		<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/plugins/datepicker/my.js" type="text/javascript"></script>

		<!-- Select2 -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
		<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>
		
		<!--<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">-->
		<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!--<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
		<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>-->

<script type="text/javascript">
	$(function () {$.fn.dataTable.ext.errMode = 'none';
		$("#nana").slideUp("slow");
		$("#xxx").slideUp("slow");
		$('#overlay').hide();
				
		// $("#lkomp").select2({
		// 	ajax: {
		// 		placeholder: "Cari Komponen....",
		// 		allowClear: true,
		// 		url: "<?php echo base_url() ?>" + "index.php/master/komponensap",
		// 		dataType: 'json',
		// 		delay: 250,
		// 		data: function(params){
		// 			return {
		// 				q: params.term
		// 			};
		// 		},
		// 		processResults: function (data) {
		// 			 return {
		// 				  results: $.map(data, function(obj) {
		// 						return { id: obj.LGART+'||'+obj.LGTXT, text: obj.LGTXT+' | '+ obj.LGART};
		// 				  })
		// 			 };
		// 		},
		// 	},
		// 	minimumInputLength: 2
		// });
		
		
		$('#btn_submit').click(function( e ){
			var komponen 		= $('#lkomp').val();
			var sifat	 		= $('#sifat').val();
			var jenis	 		= $('#jenis').val();
			var status		 	= $('#status').val();
			var aaa 			= document.getElementById("mandat").checked;
			if(aaa==true){
				var abb = 1;
			} else {
				var abb = 0;
			}
			//alert(sifat);return false;
			
			if(komponen == "" )
			{
				alert('Komponen tidak boleh kosong');return false;
			}
			/*if(sifat == "" )
			{
				alert('Sifat komponen tidak boleh kosong');return false;
			}*/
			if(jenis == "" )
			{
				alert('Jenis komponen tidak boleh kosong');return false;
			}
			if(status == "" )
			{
				alert('Silakan pilih status');return false;
			}

			if(sifat != '' && sifat != null){
				sifat = sifat.toString();
			}			
						
			var url = "<?php echo base_url(); ?>index.php/master/save_komponen/";
			var	type 		= "POST";
			var mimeType    = "multipart/form-data";
			arrs = [komponen, jenis, status, sifat, abb];
			//alert(arrs);return false;
			$.post(url, {arrs:arrs}, function(resp){
				alert ('Data Tersimpan');
				//$("#listkomponen").DataTable().destroy();
				//$('#overlay').hide();
				//dataString = $("#formid").serializeArray();

				/*$("#listkomponen").DataTable({
					processing: true,
					serverSide: true,
					responsive: true,
					bFilter: true,
					bLengthChange: false,
					scrollX: true,
					ordering: true,
					bSort : true,
					ajax: {
					  url 		: "<?php echo base_url().'index.php/master/listkomponen';?>",
					  type 		:'POST',
					  dataType	: "json",
					  data		: dataString
					},
					columnDefs: [
			        { 
			            "targets": [6],
			            "bVisible": false, //set not orderable
			        },
			        ],
				});*/
				//alert (resp);
				location.reload();
			});
					
		});
				
		$("#add_data").click(function(){
			$('#lperner').val('');
			$('#lnama').val('');
			$('#lpass').val('');
			$('#llvl').val('');
			$('#lreg').val('');
			$('#lwitel').val('');
			$('#lplasa').val('');
			$("#nana").slideDown("slow");
			
		});
		
		$("#cancelz").click(function(){
			$("#nana").slideUp("slow");
		});

		$("#btn_edit").click(function(){
			$('#overlay').show();
			var ekodekomp = $("#ekodekomp").val();
			var enamakomp = $("#enamakomp").val();
			var ejenis = $("#ejenis").val();
			var esifat = $("#esifat").val();
			var estatus = $("#estatus").val();
			var eidkomp = $("#eidkomp").val();

			if(esifat != '' && esifat != null){
				esifat = esifat.toString();
			}	

			var url 		= "<?php echo base_url(); ?>index.php/master/komponen_update/";
			
			$.post(url, {data : [eidkomp,ejenis,estatus,esifat]}, function(response){
				//$('#xarea').val("");
				alert("Data berhasil di edit")
				location.reload();
			});
		});
		
		// $(".btn").click(function(){
		// 	btn = $(this).html();
		// 	var $row = $(this).closest("tr");
		// 	$("#ekomponen").val($row.find(".tkomp").text());
		// 	$("#evalu").val($row.find(".tval").text());
		// 	$("#eket").val($row.find(".tket").text());
		// 	$("#eid").val($row.find(".tbid").text());
		// 	$("#gid").val($row.find(".taid").text());
		// 	$("#ear").val($row.find(".tar").text());
		// 	$("#epa").val($row.find(".tpa").text());
		// 	$("#esl").val($row.find(".tsl").text());
		// 	$("#ejb").val($row.find(".tjb").text());
		// 	$("#elv").val($row.find(".tlv").text());
		// })		
		
		
			
		/*xTable.on( 'draw.dt', function () {
				$(".btn").click(function(){
					btn = $(this).html();
					var $row = $(this).closest("tr");
					$("#ekomponen").val($row.find(".tkomp").text());
					$("#evalu").val($row.find(".tval").text());
					$("#eket").val($row.find(".tket").text());
					$("#eid").val($row.find(".tbid").text());
					$("#gid").val($row.find(".taid").text());
					$("#ear").val($row.find(".tar").text());
					$("#epa").val($row.find(".tpa").text());
					$("#esl").val($row.find(".tsl").text());
					$("#ejb").val($row.find(".tjb").text());
					$("#elv").val($row.find(".tlv").text());
				})			
		});*/
		$("#listkomponen").on( 'draw.dt', function () {
			$(".btnedit").click(function(){
				//alert("tes2");
				/*btn = $(this).html();
				var $row 	= $(this).closest("tr");
				var tnama	= $row.find(".tnama").text();
				
				$("#inama").val(tnama);*/
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var kode 		= $row.find(".kode").text();
				var komponen	= $row.find(".komponen").text();
				var jenis		= $row.find(".jenis").text();
				var sifat		= $row.find(".sifat").text();
				var nmstatus	= $row.find(".nmstatus").text();
				var status		= $row.find(".status").text();
				alert(jenis);
				//alert(komponen);
				$("#ekodekomp").val(kode);
				$("#enamakomp").val(komponen);
				$("#ejenis").val(jenis);
				$("#esifat").val(sifat);
				$("#estatus").val(status);
			});
		});		

		$(".btnedit").click(function(){
			//alert("tesss");
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var kode 		= $row.find(".kode").text();
			var komponen	= $row.find(".komponen").text();
			var jenis		= $row.find(".jenis").text();
			var sifat		= $row.find(".esifat").text();
			var nmstatus	= $row.find(".nmstatus").text();
			var status		= $row.find(".status").text();

			alert(sifat);
			
			$("#ekodekomp").val(kode);
			$("#enamakomp").val(komponen);
			$("#ejenis").val(jenis);
			$("#esifat").val(sifat);
			$("#estatus").val(status);
		});
	});

	function validAngka(a)
	{
		if(!/^[0-9.]+$/.test(a.value))
		{
		a.value = a.value.substring(0,a.value.length-1000);
		}
	}

	function getedit(kode,komponen,idjenis,sifat,idstat,idkomp){ 
		//alert(kode);
		$("#ekodekomp").val(kode);
		$("#enamakomp").val(komponen);
		$("#ejenis").val(idjenis);
		$("#esifat").val(sifat);
		$("#estatus").val(idstat);
		$("#eidkomp").val(idkomp);
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
              Master Komponen
              <small>List</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Master Komponen</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<div class="box box-default">
					
					<div class="box-footer">		
						<button type='buttton' class='btn btn-danger'  id='add_data'>Add Komponen</button>
					</div>
					
					<div id="nana">
						<form role="form">
							<div class="box-body"> 
							<table border="0"> 
								<tr>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Komponen </label>
											<div class="input-group" style="margin-bottom:15px">
												<!-- <input type="text" class="form-control pull-right" id="kode"> -->
												<!-- <select class="form-control" id="lkomp" name="lkomp" style="width:400px;">
													<option value=""> Pilih Komponen </option>
												</select> -->
												<select name="lkomp" id="lkomp" class="form-control select2" style="width:400px;">
													<option value=''></option>
													<?php foreach($cmb_komp as $cmb_komp){
														echo "<option value='".$cmb_komp->LGART."||".$cmb_komp->LGTXT."'>".$cmb_komp->LGTXT." | ".$cmb_komp->LGART."</option>";	
													}?>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>									
								</tr>
								<!-- <tr>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Nama Komponen </label>
											<div class="input-group" style="margin-bottom:15px">
												<input type="text" class="form-control pull-right" id="nama">
											</div><!-- /.input group 
										</div>
									</th>									
								</tr> -->
								<tr>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Sifat </label>
											<div class="input-group" style="margin-bottom:15px">
												<!-- <input type="text" class="form-control" id="sifat" style="width:400px;"> -->
												<select name="sifat[]" id="sifat" class="form-control select2" multiple="multiple" data-placeholder="Select a Project" style="width:400px;">
													<option value="">--Pilih Project -- </option>
													<?php /*foreach($cmbsifatkomp as $cmbsifatkomp){
														echo "<option value='".$cmbsifatkomp['id']."'>".$cmbsifatkomp['nama_project']."</option>";}*/
														echo $cmbsifatkomp;
													?>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>									
								</tr>
								<tr>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Jenis Komponen </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control pull-right" id="jenis" name="jenis" style="width:400px;">
													<option value=""> Pilih Jenis Komponen</option>
													<?php echo $cmbjeniskomp; ?>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>									
								</tr>
								<tr>
									<th>
										<div class="form-group" id="divare">
											<div class="input-group" style="margin-bottom:15px">
												<div class="col-sm-12">
													<input type="checkbox" id="mandat" name="mandat" value="1"> Mandatory 
												</div>
											</div><!-- /.input group -->
										</div>
									</th>									
								</tr>
								<tr>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Status</label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control pull-right" id="status" name="status" style="width:400px;">
													<option value=""> Pilih Jenis Komponen</option>
													<option value="1"> Aktif</option>
													<option value="0"> Tidak Aktif</option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>									
								</tr>	
							</table>   
								
							</div> <!-- /.box-body -->  
							<div class="box-footer">
								<button type="button" class="btn btn-primary" id="btn_submit">Simpan</button>
								<button type="button" class="btn btn-primary" id="cancelz">Cancel</button>
							</div>
						</form>
						
					</div>
					
					<form role="form" id="formid">
					<div class="box-body">
						<!-- <button type="button" class="btn btn-primary pull-right" style="margin-right:5px;" id="btndel">Delete</button> -->
						<table id="listkomponen" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> No</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Kode</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Komponen</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Jenis</font></th>
									<th style="display:none">x</th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Sifat</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Mandatory</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Status</font></th>
									<th style="display:none">x</th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Action</font></th>
								</tr>
							</thead>
							<tbody>
								<?php
								/*
										if (count($scema)){
											foreach($scema as $key => $list){
												echo "<tr>";
												echo "<td class='tar'>". $list['carea'] ."</td>";
												echo "<td class='tpa'>". $list['cpa'] ."</td>";
												echo "<td class='tsl'>". $list['csl'] ."</td>";
												echo "<td class='tjb'>". $list['cjb'] ."</td>";
												echo "<td class='tlv'>". $list['level'] ."</td>";
												echo "<td class='tkomp'>". $list['komponen'] ."</td>";
												echo "<td class='tval'>". $list['value'] ."</td>";
												echo "<td class='tket'>". $list['keterangan'] ."</td>";
												echo "<td class='tgaji'>". $list['tgl_gajian'] ."</td>";
												echo "<td class='tbid' style='display:none'>". $list['bid'] ."</td>";
												echo "<td><button type='button' class='btn btn-info btn-block btn-xs' data-toggle='modal' data-target='#EModal'>Edit</button></td>";
												echo "</tr>";
											}
										}else{
											echo "<tr align=center><td colspan=10>No data to display</td></tr>";
										}	
								*/
								?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
					</form>

					<div class="overlay" id="overlay">
					  <i class="fa fa-refresh fa-spin"></i>
					</div>				
				
							
				<div class="modal fade" id="EModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:#CC0000; color:#FFFFFF;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Edit Komponen</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" id="haha">
								<div class="box-body">
									<!--<div class="form-group" id="divare">
										<label class="control-label">Komponen </label>
										<div class="input-group" style="margin-bottom:15px">
											<select name="lkomp" id="lkomp" class="form-control select2" style="width:400px;">
												<option value=''></option>
												<?php foreach($cmb_komp as $cmb_komp){
													echo "<option value='".$cmb_komp->LGART."||".$cmb_komp->LGTXT."'>".$cmb_komp->LGTXT." | ".$cmb_komp->LGART."</option>";	
												}?>
											</select>
										</div><!-/.input group 
									</div>

									<div class="form-group" id="divare">
										<label class="control-label">Sifat </label>
										<div class="input-group" style="margin-bottom:15px">
											<select name="sifat[]" id="sifat" class="form-control select2" multiple="multiple" data-placeholder="Select a Project" style="width:400px;">
												<option value="">--Pilih Project - </option>
												<?php
													echo $cmbsifatkomp;
												?>
											</select>
										</div><.input group 
									</div>-->

									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Kode Komponen</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="ekodekomp" readonly>
											<input type="hidden" class="form-control pull-right" id="eidkomp" readonly>
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Nama Komponen</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="enamakomp" readonly>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
	
									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Jenis Komponen </label>
										<div class="col-sm-9">
											<select class="form-control pull-right" id="ejenis" name="ejenis">
												<option value=""> Pilih Jenis Komponen</option>
												<?php echo $cmbjeniskomp; ?>
											</select>
										</div>
									</div>

									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Sifat </label>
										<div class="col-sm-9">
											<select name="sifat[]" id="esifat" class="form-control pull-right select2" multiple="multiple" style="width:400px;">
												<option value="">Pilih Sifat</option>
												<?php
													echo $cmbsifatkomp;
												?>
											</select>
										</div>
									</div>
											
									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Status</label>
										<div class="col-sm-9">
											<select class="form-control pull-right" id="estatus" name="estatus" style="width:400px;">
												<option value=""> Pilih Jenis Komponen</option>
												<option value="1"> Aktif</option>
												<option value="0"> Tidak Aktif</option>
											</select>
										</div>
									</div>							
									<!--<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Personal Area</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="epa" readonly/>
										</div><!-- /.input group -
									</div><!-- /.form group -
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Skill Layanan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="esl" readonly/>
										</div><!-- /.input group -
									</div><!-- /.form group -
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Jabatan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="ejb" readonly/>
										</div><!-- /.input group -
									</div><!-- /.form group -
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Level</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="elv" readonly/>
										</div><!-- /.input group -
									</div><!-- /.form group -->							
																		
									<!--<div class="form-group" id="divket">
										<label class="col-sm-3 control-label">Keterangan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="eket"/>
										</div><!-- /.input group -
									</div><!-- /.form group -->
								</div>
							</form>
						</div>
						<div class="modal-footer" style="background-color:#CC0000;">
							<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_edit">Save changes</button>						
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->	
				
										
				</div><!-- /.box -->
			</section><!-- /.content -->
			
		<!-- </div> --><!-- /.container -->
		
	</div><!-- /.content-wrapper -->


<script>
$(".select2").select2({
		containerCssClass : "form-control"
	});

	//var par = $("#formid").serialize();
$(function(){
	//alert('tess');
	dataString = $("#formid").serializeArray();
	//dataString = '';
	var xTable =
	$("#listkomponen").DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		bFilter: true,
		bLengthChange: false,
		scrollX: true,
		ordering: true,
		bSort : true,
		ajax: {
		  url 		: "<?php echo base_url().'index.php/master/listkomponen';?>",
		  type 		:'POST',
		  dataType	: "json",
		  data		: dataString
		},
		/*createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},*/
		// aoColumns: [
		//     {"className":"no"},
		//     {"className":"kode"},
		//     {"className":"komponen"},
		//     {"className":"nmjenis"},
		//     {"className":"jenis"},
		//     {"className":"sifat"},
		//     {"className":"nmstatus"},
		//     {"className":"status"},
		//     {"className":"btn"}
	 //    ],
		aoColumnDefs: [
        { 
            "targets": [4,8],
            "bVisible": false, //set not orderable
        }],
        
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	
});
</script>