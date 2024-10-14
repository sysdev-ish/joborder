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
		$('#ppsp').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#ppep').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#overlay').hide();
		$('#ppoverlay').hide();
		$('#divtre').hide();
		$('#divnrespa').hide();
		//$('#group_att1').hide();
		$('#group_att2').hide();
		//$('#group_att4').hide();
		$('#group_att5').hide();
		
		
		$('body').on('click', '#btn_submit2', function(e){
				$('#ppoverlay').show();
				$('#ffggpp').hide();
				var approv 		= $('#approv').val();  
				var nojosk 		= $('#nojosk').val();  
				var pppersa		= $('#pppersa').val();
				var lampiran 	= $('#pplampiran').val();
				var pparea 		= $('#pparea').val(); 
				var ppskill 	= $('#ppskill').val(); 
				var ppjab 		= $('#ppjab').val(); 
				var pplevel 	= $('#pplevel').val();
				var ppjml 		= $('#ppjml').val();
				var ppsp 		= $('#ppsp').val();
				var ppep 		= $('#ppep').val();
				var ppnolam 	= $('#ppnolam').val();
				
				if(pppersa=='')
				{
					alert('PersonalArea Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else if(pparea=='')
				{
					alert('Area Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else if(ppskill=='')
				{
					alert('Skilllayanan Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				if(ppjab=='')
				{
					alert('Jabatan Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else if(pplevel=='')
				{
					alert('Level Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else if(ppjml=='')
				{
					alert('Jumlah Pekerja Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else if(ppsp=='')
				{
					alert('Start Project Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else if(ppep=='')
				{
					alert('End Project Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else if(ppnolam=='')
				{
					alert('No Lampiran Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else if(lampiran=='')
				{
					alert('Lampiran Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				else
				{
					e.preventDefault();
					var formData = new FormData($(this).parents('form')[0]);
					
					$.ajax({
						url: '<?php echo base_url("index.php/rotasi/edit_jopp") ?>',
						//url: 'upload.php',
						type: 'POST',
						//dataType   : 'json',
						xhr: function() {
							var myXhr = $.ajaxSettings.xhr();
							return myXhr;
						},
						success: function (data) {
							$('#ppoverlay').hide();
							// alert(data);
							alert('Data Telah Di Edit');
							location.href="<?php echo base_url();?>index.php/home/appjox/";
						},
						data: formData,
						cache: false,
						contentType: false,
						processData: false
					});
					return false;
				}
		});
		
	});
	
	
	function delfilepp(nid, komponen){
		$.ajax({
			  url: '<?php echo base_url(); ?>index.php/rotasi/deletefilepp/',
			  type: 'POST',
			  data: {file : komponen, nidz : nid},
			  success: function (response) {
					location.reload();
			  },
			  error: function () {
				 alert('error delete lampiran');
			  }
		});
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

	
	function cariarea(persa)
	{
		var url = "<?php echo base_url(); ?>index.php/rotasi/cariarea_pp";
		$.post(url, {data:persa}, function(response){
			$("#pparea").html(response);
		})
	}

	function cariskill(area)
	{
		var persa = $('#pppersa').val();
		var url = "<?php echo base_url(); ?>index.php/rotasi/cariskill_pp";
		$.post(url, {data:persa, areax:area}, function(response){
			$("#ppskill").html(response);
		})
	}

	function carijab(skill)
	{
		var persa = $('#pppersa').val();
		var area = $('#pparea').val();
		var url = "<?php echo base_url(); ?>index.php/rotasi/carijab_pp";
		$.post(url, {data:persa, areax:area, skillx:skill}, function(response){
			$("#ppjab").html(response);
		})
	}

	function carilevel(jab)
	{
		var persa = $('#pppersa').val();
		var area = $('#pparea').val();
		var skill = $('#ppskill').val();
		var url = "<?php echo base_url(); ?>index.php/rotasi/carilevel_pp";
		$.post(url, {data:persa, areax:area, skillx:skill, jabx:jab}, function(response){
			$("#pplevel").html(response);
		})
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
							<input type="text" class="form-control pull-right" id="typejo" name="typejo" value="Perpanjangan Project" readonly />
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
								<input type="hidden" class="form-control pull-right" id="nidx" name="nidx" value="<?php echo $enid; ?>" readonly />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="pppersa" name="pppersa" onchange="cariarea(this.value)" style="width:100%;"/>
									<?php echo $cmbpera ?>	
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Area</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="pparea" name="pparea" onchange="cariskill(this.value)" style="width:100%;"/>
									<?php echo $cmbarea ?>	
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Skilllayanan</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="ppskill" name="ppskill" onchange="carijab(this.value)" style="width:100%;"/>
									<?php echo $cmbskill ?>			
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Jabatan</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="ppjab" name="ppjab" onchange="carilevel(this.value)" style="width:100%;"/>
									<?php echo $cmbjab ?>	
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Level</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="pplevel" name="pplevel" style="width:100%;"/>
									<?php echo $cmblevel ?>	
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">Jml Pekerja</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="ppjml" name="ppjml" value="<?php echo $jml ?>" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">Start Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="ppsp" name="ppsp" value="<?php echo $start_project ?>" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">End Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="ppep" name="ppep" value="<?php echo $end_project ?>" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">No Lampiran</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="ppnolam" name="ppnolam" value="<?php echo $no_lampiran ?>" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						 
						<div class="form-group" id="group_att">
							<label class="col-sm-3 control-label">Lampiran</label>
							<div class="col-sm-9">
								<?php if($lampiran == '') { ?>
								<input type="file" class="form-control pull-right" name="pplam[]" id="pplampiran"/>
								<label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
								<?php } else { ?>
									<input type="hidden" class="form-control pull-right" name="kompoly" id="komponen111" value="<?php echo $lampiran ?>"/>
									<label class='control-label' style='color:grey' value='<?php echo $lampiran ?>' name='kompak[]' id='kompak_skema'><?php echo $lampiran ?><button title='Delete Lampiran File' type='button' class='btn btn-box-tool' onclick='delfilepp("<?php echo $enid ?>","<?php echo $lampiran ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br> 
									
								<?php } ?>
							</div>
						</div>
						
						
						<div class="box-footer" id="ffggpp">
							<button type="button" class="btn btn-primary pull-right" id="btn_submit2">Submit</button>
						</div>
						
						<div class="ppoverlay" id="ppoverlay">
						  <!--<i class="fa fa-refresh fa-spin"></i>--> <img src="<?php echo base_url('uploads/loading1.gif');?>" height="100" width="100" class="pull-right" />
						</div>
						
					</div><!-- /.box-body -->
			</div><!-- /.box -->
			
		</div><!-- /.box -->
		
		
		
		
		
	</div><!-- /.row -->
</section>
</div><!-- /.content-wrapper -->