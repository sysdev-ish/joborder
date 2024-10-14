<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">

<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tanggal').datepicker({format: 'yyyy-mm-dd',startDate : '0', autoclose:true});
		$('#latihan').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#bekerja').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#overlay1').hide();
		
		//$('#group_att1').hide();
		//$('#group_att2').hide();
		//$('#awwx').hide();
		//$('#akkx').hide();
		
		/*
		$("#addmore").click(function(){
				$('#group_att1').show();
				$('#aww').hide();
				$('#awwx').show();
				//$("<div class='col-sm-12'><input type='file' class='form-control attachment' name='attachment[]'></div>").appendTo("#group_att");
		});
		
		$("#addmore1").click(function(){
				$('#group_att2').show();
				$('#aww').hide();
				$('#awwx').hide();
		});
		*/
		
		$('body').on('click', '#btn_submit1', function(e){
				$('#overlay1').show();
				$('#ffgg').hide();
				var type_jo 		= $('#typejo').val(); 
				var nojo	 		= $('#nojok').val(); 
				var komponen1 		= $('#komponen1').val();
				var komponen2 		= $('#komponen2').val(); 
				var komponen3 		= $('#komponen3').val(); 
				
				//alert(komponen1,komponen2,komponen3);
				if(komponen1=='')
				{
					alert('Komponen Skema Harus Diisi');
					$('#overlay1').hide();
					$('#ffgg').show();
					return false;
					
				}
				
				e.preventDefault();
				var formData = new FormData($(this).parents('form')[0]);
				
				$.ajax({
					url: '<?php echo base_url("index.php/home/s_edit_skema") ?>',
					type: 'POST',
					//dataType   : 'json',
					xhr: function() {
						var myXhr = $.ajaxSettings.xhr();
						return myXhr;
					},
					success: function (data) {
						$('#overlay1').hide();
						alert(data);
						//alert('Data Telah Di Edit');
						location.href="<?php echo base_url();?>index.php/home/listorder/";
					},
					data: formData,
					cache: false,
					contentType: false,
					processData: false
				});
				return false;
				
		});
		
		
		
		
		$('#tmbhrincian').click(function(){
			document.getElementById("haha").reset();
		});
		
		
	});
	
	
	
	function delfile(nojo,komponen, jenis){
		$.ajax({
			  url: '<?php echo base_url(); ?>index.php/home/deletefile/',
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
					<h3 class="box-title">Edit Dokumen Skema/BAK </h3>
				</div><!-- /.box-header -->
			
				<div class="box-body">
					<div class="form-group" id="divproject">
						<label class="col-sm-3 control-label">Type Project</label>
						<div class="col-sm-9">
							<input type="text" class="form-control pull-right" id="typejo" name="typejo" value="<?php echo $type_jo ?>" readonly />
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
								<input type="text" class="form-control pull-right" id="nojok" name="nojok" value="<?php echo $nojo ?>" readonly />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<?php
							/*
							foreach($aapproval as $key => $list){
								$att = $list['attachment'];
								if($revisi=='1'){
									$attc = explode("#",$list['attachment']);
								}
								else{
									$attc = explode("temp#",$list['attachment']);
								}
								$attc1 = $attc[0];
								$attc2 = $attc[1];
								echo "<label class='control-label' style='color:grey' value='$attc[1]' name='attachmentdr[]'>" .$attc[1] ."<button title='Delete Attachment' type='button' class='btn btn-box-tool' onclick='delfile(\"$att\",$revisi);this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br>
									<input type='hidden' name='attachmentdr[]' value='$list[attachment]'>
								";
							}
							*/
						?>
						
						<div class="form-group" id="group_att">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9">
							<?php if($komponen_skema == '') { ?>
								<input type="file" class="form-control pull-right" name="komp[]" id="komponen1" />
								<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen11" value="skema"/>
							<?php } else {
								$abc = 'skema'; ?>
								<label class='control-label' style='color:grey' value='<?php echo $komponen_skema ?>' name='kompak[]' id='kompak_skema'><?php echo $komponen_skema ?><button title='Delete Skema File' type='button' class='btn btn-box-tool' onclick='delfile("<?php echo $nojo ?>","<?php echo $komponen_skema ?>", "<?php echo $abc ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br> 
							<?php } ?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att1">
							<label class="col-sm-3 control-label">Dokumen BAK</label>
							<div class="col-sm-9">
							<?php 
							if($komponen_bak == '')
							{ ?>
								<input type="file" class="form-control pull-right" name="komp[]" id="komponen2"/>
								<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen22" value="bak"/>
							<?php } else { 
								$cde = 'bak'; ?>
								<label class='control-label' style='color:grey' value='<?php echo $komponen_bak ?>' name='kompak[]' id='kompak_bak'><?php echo $komponen_bak ?><button title='Delete BAK File' type='button' class='btn btn-box-tool' onclick='delfile("<?php echo $nojo ?>","<?php echo $komponen_bak ?>", "<?php echo $cde ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br>
							<?php }
							?>
								
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att2">
							<label class="col-sm-3 control-label">Dokumen Lain</label>
							<div class="col-sm-9">
							<?php 
							if($komponen_other == '')
							{ ?>
								<input type="file" class="form-control pull-right" name="komp[]" id="komponen3"/>
								<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen33" value="other"/>
							<?php } else {
								$fgh = 'other'; ?>
								<label class='control-label' style='color:grey' value='<?php echo $komponen_other ?>' name='kompak[]' id='kompak_other'><?php echo $komponen_other ?><button title='Delete Other File' type='button' class='btn btn-box-tool' onclick='delfile("<?php echo $nojo ?>","<?php echo $komponen_other ?>", "<?php echo $fgh ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br>
							<?php }
							?>
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
			</form>
		</div><!-- /.box -->
		
		
		
	</div><!-- /.row -->
</section>
</div><!-- /.content-wrapper -->