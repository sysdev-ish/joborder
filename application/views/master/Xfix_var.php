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
		$('#tanggal').datepicker({format: 'yyyy-mm-dd',startDate : '0', autoclose:true});
		$('#latihan').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#bekerja').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#overlay').hide();
		$('#overlay1').hide();
		
		$("#spa").select2({
			ajax: {
				placeholder: "Cari PersonalArea....",
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
		
		$("#xspa").select2({
			ajax: {
				placeholder: "Cari Komponen....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/searchar_komp",
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
								//return { id: obj.personalarea+"#"+obj.karea, text: obj.personnal_area+" ("+obj.narea+")" };
								return { id: obj.wage_type, text: obj.nama };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		
		
		$("#choosen").click(function(){
			$("#choosen option:selected").remove();
		});
		
		
		$("#xspa").change(function(){
			var value = $("#xspa").select2('data')[0]['id'];
			var text = $("#xspa").select2('data')[0]['text'];
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
		
		
		
		
		$('body').on('click', '#btn_submit1', function(e){
				$('#overlay1').show();
				$('#ffgg').hide();
				var xspa 			= $('#xspa :selected').text();
				var spa 			= $('#spa :selected').text();
				$('#choosen option').prop('selected', true);
				
				
				if(spa=='')
				{
					alert('PersonalArea Harus Diisi');
					$('#overlay1').hide();
					$('#ffgg').show();
					return false;
				}
				else if(xspa=='')
				{
					alert('Koomponen Harus Diisi');
					$('#overlay1').hide();
					$('#ffgg').show();
					return false;
				}
				else
				{
					e.preventDefault();
					var formData = new FormData($(this).parents('form')[0]);
					
					$.ajax({
						url: '<?php echo base_url("index.php/home/xurincian_simpanx") ?>',
						//url: 'upload.php',
						type: 'POST',
						//dataType   : 'json',
						xhr: function() {
							var myXhr = $.ajaxSettings.xhr();
							return myXhr;
						},
						success: function (data) {
								$('#overlay1').hide();
								//alert(data);
								alert('Data Tersimpan');
								location.reload();
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
			
			<div class="box box-primary" id='yeyey'>
			<!-- form start -->
					<div class="box-body">
					
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="spa" name="spa" style="width:460px;"/>
								
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Komponen Not Allowed</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="xspa" name="xspa" style="width:460px;"/>
								
								</select>		
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
				<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Komponen Not Allowed</button>
				<select id="choosen" name="choosen[]" multiple class="form-control choosen" style="height:400px;"></select>
			</div>
		</div>
		
		
		
	</div><!-- /.row -->
</section>
</div><!-- /.content-wrapper -->