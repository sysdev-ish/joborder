<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">

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
	$(document).ready(function(){
		$(".select2").select2();
		$.fn.modal.Constructor.prototype.enforceFocus = $.noop;
		$('#tanggal').datepicker({format: 'yyyy-mm-dd',startDate : '0', autoclose:true});
		$('#latihan').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#bekerja').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#overlay').hide();
		$('#overlay1').hide();
		$('#divtre').hide();
		$('#divnrespa').hide();
		//$('#group_att1').hide();
		$('#group_att2').hide();
		//$('#group_att4').hide();
		$('#group_att5').hide();
		//$('#awwx').hide();
		//$('#akkx').hide();
		
		
		$("#spa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/searchar",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.personalarea+"#"+obj.karea, text: obj.personnal_area+" ("+obj.narea+")" };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		
		$("#xspa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/searchar",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.personalarea+"#"+obj.karea, text: obj.personnal_area+" ("+obj.narea+")" };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		
		$("#respa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
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
		
		$("#respa").change(function(){
			var group = $("#respa").select2('data')[0]['id'];
			var url = "<?php echo base_url(); ?>index.php/home/pilih_area";
			$.post(url, {data:group}, function(response){
				$("#lokasi").html(response);
			})
		});
		
		/*
		$("#spa").change(function(){
			var group = $("#spa").select2('data')[0]['id'];
			var url = "<?php echo base_url(); ?>index.php/home/pilih_area";
			$.post(url, {data:group}, function(response){
				$("#sare").html(response);
			})
		});
		*/
		
		$("#choosen").click(function(){
			$("#choosen option:selected").remove();
		});
		
		
		$("#spa").change(function(){
			var value = $("#spa").select2('data')[0]['id'];
			var text = $("#spa").select2('data')[0]['text'];
			//alert (value + " - " + text);
			var x = document.getElementById("choosen"); 
			var optionVal = new Array();
			for (i = 0; i < x.length; i++) { 
			    optionVal.push(x.options[i].value);
			}

			if ((optionVal.includes(value)) == true) {
				alert("Anda sudah memilih "+text);
				return false;
			}
			else{
				$("#choosen").append($('<option>',{
					value : value,
					text : text
				}));
			} 			
		})
		
		/*
		$("#spak").change(function(){
			var valkar = $("#spak").select2('data')[0]['id'];
			var splitkar = valkar.split("#");
			var filename = splitkar[1];

			if(filename == 0){
				$("#divnotice").hide();
			}
			else{
				$("#divnotice").show();
				document.getElementById('fotoperner').src = "<?php echo base_url(); ?>uploads/"+filename;
			}

			var text = $("#spak").select2('data')[0]['text'];
			//alert (value + " - " + text);
 			$("#perners").val(splitkar[0]);
 			$("#files").val(filename);
 			$("#namaperner").val(text);
		});
		*/
		
		
		
		
		/*
		$("#addmore").click(function(){
				$('#group_att1').show();
				$('#aww').hide();
				$('#awwx').show();
				//$("<div class='col-sm-12'><input type='file' class='form-control attachment' name='attachment[]'></div>").appendTo("#group_att");
		});
		*/
		
		$("#addmore1").click(function(){
				$('#group_att2').show();
				$('#aww').hide();
				$('#awwx').hide();
		});
		
		/*
		$("#addmore2").click(function(){
				$('#group_att4').show();
				$('#akk').hide();
				$('#akkx').show();
				//$("<div class='col-sm-12'><input type='file' class='form-control attachment' name='attachment[]'></div>").appendTo("#group_att");
		});
		*/
		
		$("#addmore3").click(function(){
				$('#group_att5').show();
				$('#akk').hide();
				$('#akkx').hide();
		});
		
		/*
		$("#sare").change(function(){
			var group = $('#sare').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_persa";
			$.post(url, {data:group}, function(response){
				$("#spa").html(response);
			})
		})
		*/
		
		
		$('body').on('click', '#btn_submit1', function(e){
				$('#overlay1').show();
				$('#ffgg').hide();
				var nojosk 			= $('#nojosk').val();  
				var spa 			= $('#spa :selected').text();
				var komponen1 		= $('#komponen1').val();
				var komponen2 		= $('#komponen2').val(); 
				var komponen3 		= $('#komponen3').val(); 
				$('#choosen option').prop('selected', true);
				
				
				if(spa=='')
				{
					alert('PersonalArea Harus Diisi');
					$('#overlay1').hide();
					$('#ffgg').show();
					return false;
				}
				else if(komponen1=='')
				{
					alert('Komponen Skema Harus Diisi');
					$('#overlay1').hide();
					$('#ffgg').show();
					return false;
				}
				else if(komponen2=='')
				{
					alert('Komponen BAK Harus Diisi');
					$('#overlay1').hide();
					$('#ffgg').show();
					return false;
				}
				else
				{
					e.preventDefault();
					var formData = new FormData($(this).parents('form')[0]);
					
					//alert(formData);
					//exit;

					$.ajax({
						url: '<?php echo base_url("index.php/home/edit_urincian_simpanx") ?>',
						//url: 'upload.php',
						type: 'POST',
						//dataType   : 'json',
						xhr: function() {
							var myXhr = $.ajaxSettings.xhr();
							return myXhr;
						},
						success: function (data) {
						
								$('#overlay1').hide();
								// alert(data);
								alert('Data Telah Di Edit');
								
								if(approv=='atasan')
								{
									location.href="<?php echo base_url();?>index.php/home/appjo/";
								}
								else
								{
									location.href="<?php echo base_url();?>index.php/home/listorderx/";
								}
								
								
						},
						data: formData,
						cache: false,
						contentType: false,
						processData: false
					});
					return false;
				}
		});
		
		
		$("#province").change(function(){
			var province = $('#province').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_lokasi";
			$.post(url, {data:province}, function(response){
				$("#lokasi").html(response);
			})
		})
		
		
		$("#kategori").change(function(){
			var kategori = $('#kategori').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_jabatan";
			$.post(url, {data:kategori}, function(response){
				$("#jabatan").html(response);
			})
		})
		

		$("#latihan").change(function(){
			var tanggal = new Date($("#tanggal").val());
			var latihan = new Date($("#latihan").val());
			if (tanggal > latihan){
				alert ('Tanggal Latihan harus sesudah Tanggal Penerimaan');
				$("#latihan").val($("#tanggal").val());
				return false;
			}
		});
		
		$("#bekerja").change(function(){
			var tanggal = new Date($("#tanggal").val());
			var bekerja = new Date($("#bekerja").val());
			if (tanggal > bekerja){
				alert ('Tanggal Bekerja harus sesudah Tanggal Penerimaan');
				$("#bekerja").val($("#tanggal").val());
				return false;
			}
		});
		
		$('#tmbhrincian').click(function(){
			document.getElementById("haha").reset();
			var tejo = $("#typejo").val();
			if (tejo == '2'){
				var group 	= $('#respa :selected').val();
				var url 	= "<?php echo base_url(); ?>index.php/home/pilih_area";
				$.post(url, {data:group}, function(response){
					$("#lokasi").html(response);
				});
			}
			else
			{
				var province = $('#province').val();
				var url = "<?php echo base_url(); ?>index.php/home/pilih_lokasi";
				$.post(url, {data:province}, function(response){
					$("#lokasi").html(response);
				})
			}
		});
		
		
		$(".btnedit_rinc").click(function(){
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#ridz").val($row.find(".cid").text());
		});
		
		
		$("#save_editrinc").click(function(){
			var ridz	= $('#ridz').val();
			var nojosk	= $('#nojosk').val();
			var value 	= $("#xspa").select2('data')[0]['id'];
			var text 	= $("#xspa").select2('data')[0]['text'];
			
			arrjab				= [ridz, value, text, nojosk];
			var url 			= "<?php echo base_url(); ?>index.php/home/erinc_editskema/";
			$.post(url, {xjab:arrjab}, function(response){
				alert('Sukses');
				// rTable.fnDestroy();
				$('#listrincianx tbody').html(response);
				// $('#listrincianx').dataTable({"bRetrieve": true, "bServerside": true, "bProcessing": true, "bPaginate": false, "bLengthChange": false, "bFilter": false, "bSort": true,"bInfo": false, "bAutoWidth": false,"bJQueryUI": false});
			});
		});
		
		
		
	});
	
	
	function delfile(nojo,komponen, jenis){
		$.ajax({
			  url: '<?php echo base_url(); ?>index.php/home/deletefile_sk/',
			  type: 'POST',
			  data: {file : komponen, nojoz : nojo, jenisz : jenis  },
			  success: function (response) {
					//alert(response);
					location.reload();
			  },
			  error: function () {
				 alert('error delete attachment');
			  }
		});
	}	
	
	
	function delete_Row(row,nid){
		$.ajax({
			  url: '<?php echo base_url(); ?>index.php/home/deleteperar/',
			  type: 'POST',
			  data: {bid : nid},
			  success: function (response) {
					
			  },
			  error: function () {
				 alert('error delete rincian');
			  }
		});
		
		var i=row.parentNode.parentNode.rowIndex;
		document.getElementById('listrincianx').deleteRow(i);
		//alert(nid);
	}	
	
	
	function custom_alert(output_msg, title_msg)
	{
		if (!title_msg)	title_msg = 'Alert';
		//if (!output_msg) output_msg = 'No Message to Display.';
		if (!output_msg) output_msg = 'Data Tersimpan.';
		$("<div></div>").html(output_msg).dialog({
			title: title_msg,
			resizable: false,
			modal: true,
			buttons: {
				"Ok": function() { $( this ).dialog( "close" );	}
			}
		});
	}		

</script>


<title>JobOrderISH | <?echo $title;?></title>
<!-- Main content -->
<div class="content-wrapper">
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<form class="form-horizontal" >
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Job Order</h3>
				</div><!-- /.box-header -->
			
				<div class="box-body">
					<div class="form-group" id="divproject">
						<label class="col-sm-3 control-label">Type Project</label>
						<div class="col-sm-9">
							<input type="text" class="form-control pull-right" id="typejo" name="typejo" value="<?php echo $ntjo; ?>" readonly />
							<input type="hidden" class="form-control pull-right" id="approv" name="approv" value="<?php echo $apps; ?>" readonly />								
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
				</div>
			</div>	
				
			
			
			
			
			<div class="box box-primary" id='yeyey'>
			<!-- form start -->
					<div class="box-body">
					
						<div class="form-group" id="divnojo">
							<label class="col-sm-3 control-label">Nojo</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nojosk" name="nojosk" value="<?php echo $noj; ?>" readonly />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="spa" name="spa" style="width:460px;"/>
								<option value="<?php echo $perar; ?>"><?php echo $nperar; ?></option>
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<!--
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="spa" name="spa"/>
											<option value="">Pilih PersonalArea</option>
											<?php //echo $cmbpera;?>									
								</select>		
							</div>
						</div>
						-->
						
						<!--
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Area</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="sare" name="sare"/>
											<option value="">Pilih Area</option>
											<?php //echo $cmbare;?>												
								</select>		
							</div>
						</div>
						-->
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9">
								<?php if($komponen_skema == '') { ?>
									<div id="dskem">
										<input type="file" class="form-control pull-right" name="komp[]" id="komponen1" />
										<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen11" value="skema"/>
									</div>
								<?php } else {
									$abc = 'skema'; ?>
									<input type="hidden" class="form-control pull-right" name="kompoly[]" id="komponen111" value="<?php echo $komponen_skema ?>"/>
									<input type="hidden" class="form-control pull-right" name="kompolx[]" id="komponen1111" value="skema"/>
									<label class='control-label' style='color:grey' value='<?php echo $komponen_skema ?>' name='kompak[]' id='kompak_skema'><?php echo $komponen_skema ?><button title='Delete Skema File' type='button' class='btn btn-box-tool' onclick='delfile("<?php echo $noj ?>","<?php echo $komponen_skema ?>", "<?php echo $abc ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br> 
									
								<?php } ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Dokumen BAK</label>
							<div class="col-sm-9">
								<?php if($komponen_bak == ''){ ?>
									<div id="dbak">
										<input type="file" class="form-control pull-right" name="komp[]" id="komponen2"/>
										<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen22" value="bak"/>
									</div>
								<?php } else { 
									$cde = 'bak'; ?>
									<input type="hidden" class="form-control pull-right" name="kompoly[]" id="komponen222" value="<?php echo $komponen_bak ?>"/>
									<input type="hidden" class="form-control pull-right" name="kompolx[]" id="komponen2222" value="bak"/>
									<label class='control-label' style='color:grey' value='<?php echo $komponen_bak ?>' name='kompak[]' id='kompak_bak'><?php echo $komponen_bak ?><button title='Delete BAK File' type='button' class='btn btn-box-tool' onclick='delfile("<?php echo $noj ?>","<?php echo $komponen_bak ?>", "<?php echo $cde ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br>
								<?php }?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Dokumen Lain</label>
							<div class="col-sm-9">
								<?php if($komponen_other == ''){ ?>
									<div id="doth">
										<input type="file" class="form-control pull-right" name="komp[]" id="komponen3"/>
										<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen33" value="other"/>
									</div>
								<?php } else {
									$fgh = 'other'; ?>
									<input type="hidden" class="form-control pull-right" name="kompoly[]" id="komponen333" value="<?php echo $komponen_other ?>"/>
									<input type="hidden" class="form-control pull-right" name="kompolx[]" id="komponen3333" value="other"/>
									<label class='control-label' style='color:grey' value='<?php echo $komponen_other ?>' name='kompak[]' id='kompak_other'><?php echo $komponen_other ?><button title='Delete Other File' type='button' class='btn btn-box-tool' onclick='delfile("<?php echo $noj ?>","<?php echo $komponen_other ?>", "<?php echo $fgh ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br>
									
								<?php } ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						<div class="box-footer" id="ffgg">
							<button type="button" class="btn btn-primary pull-right" id="btn_submit1">Submit</button>
						</div>
						
						<div class="overlay1" id="overlay1">
						  <!--<i class="fa fa-refresh fa-spin"></i>--> <img src="<?php echo base_url('uploads/loading1.gif');?>" height="100" width="100" class="pull-right" />
						</div>
						
					</div><!-- /.box-body -->
			</div><!-- /.box -->
			
		</div><!-- /.box -->
		
		
		<div class="col-md-6" id='lalay'>
			<div class="form-group">
				<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Personalarea</button>
				<select id="choosen" name="choosen[]" multiple class="form-control choosen" style="height:150px;"></select>
			</div>
			
			<div class="box box-primary">
				<div class="form-group" id="divrincian">
					<div class="col-sm-12">
						<button type='button' class='btn btn-info btn-block btn-sm'>Detail Rincian Existing</button>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<table id="listrincianx" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>PersonalArea</th>
							<th>Area</th>
							<th>Action</th>
							<th style="display:none">x</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach($bbb as $key => $list){ 
							echo "<tr>";
							if($list['n_perar']==''){
								echo "<td>". $list['nperar'] ."</td>";
							} else {
								echo "<td>". $list['n_perar'] ."</td>";
							}
							
							if($list['n_area']==''){
								echo "<td>". $list['narea'] ."</td>";
							} else {
								echo "<td>". $list['n_area'] ."</td>";
							}
							?>
							<td><button type='button' class='btn btn-box-tool btnedit_rinc' id='btnedit_rinc' data-toggle='modal' data-target='#ROPmyModal'><i class="glyphicon glyphicon-pencil"></i></button>   <button title='Delete Rincian' type='button' class='btn btn-box-tool' onclick='delete_Row(this,<?php echo $list['id'];?>)'><i class="glyphicon glyphicon-trash"></i></button>  </td>
							<?php
							echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
							echo "</tr>";
						}
					?>
					</tbody>
				</table>
			</div>
			
			<div class="modal fade" id="ROPmyModal" role="dialog" tabindex="-1">
			  <div class="modal-dialog" id="modal-alert">
				 <div class="modal-content">
					<div class="modal-header" style="background-color:blue; color:white;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Rincian</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="hbhb">
							<div class="box-body">
								<div class="form-group" id="divitem">
									<label class="col-sm-2 control-label">ID</label>
									<div class="col-sm-10">
										<input type="text" class="form-control pull-right" id="ridz" readOnly=readOnly>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								<br><br>
								<div class="form-group" id="divspec">
									<label class="col-sm-2 control-label">PersonalArea</label> 
									<div class="col-sm-10">
										<select class="form-control pull-right" id="xspa" name="xspa" style="width:460px;"/>
										<option value=""></option>
										</select>
									</div>
								</div>
								
							</div>
						</form>
					</div>
					<div class="modal-footer" style="background-color:blue; color:white;">
						<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
						<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="save_editrinc" >Save</button>					
					</div>
				 </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			
		</div>
		
		
		
	</div><!-- /.row -->
</section>
</div><!-- /.content-wrapper -->