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
		$('#overlay').hide();
		$('#overlay1').hide();
		$('#yeyey').hide();
		$('#group_att1').hide();
		$('#group_att2').hide();
		$('#group_att4').hide();
		$('#group_att5').hide();
		$('#awwx').hide();
		$('#akkx').hide();
		
		$("#typejo").change(function(){
			var tejo = $("#typejo").val();
			if (tejo == 'SKEMA'){
				$('#yeyey').show();
				$('#yuyuy').hide();
				$('#yayay').hide();
			}
			else
			{
				$('#yeyey').hide();
				$('#yuyuy').show();
				$('#yayay').show();
			}
		});
		
		
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
		
		
		$("#addmore2").click(function(){
				$('#group_att4').show();
				$('#akk').hide();
				$('#akkx').show();
				//$("<div class='col-sm-12'><input type='file' class='form-control attachment' name='attachment[]'></div>").appendTo("#group_att");
		});
		
		$("#addmore3").click(function(){
				$('#group_att5').show();
				$('#akk').hide();
				$('#akkx').hide();
		});
		
		
		
		$('body').on('click', '#btn_submit1', function(e){
				$('#overlay1').show();
				$('#ffgg').hide();
				var type_jo 		= $('#typejo').val(); 
				var sare	 		= $('#sare').val();
				var spa		 		= $('#spa').val(); 
				var komponen1 		= $('#komponen1').val();
				var komponen2 		= $('#komponen2').val(); 
				var komponen3 		= $('#komponen3').val(); 
				
				if(sare=='')
				{
					alert('Area Harus Diisi');
					return false;
				}
				else if(spa=='')
				{
					alert('PersonalArea Harus Diisi');
					return false;
				}
				else if(komponen1=='')
				{
					alert('Komponen Skema Harus Diisi');
					return false;
				}
				else
				{
					e.preventDefault();
					var formData = new FormData($(this).parents('form')[0]);

					$.ajax({
						url: '<?php echo base_url("index.php/home/urincian_simpanx") ?>',
						//url: 'upload.php',
						type: 'POST',
						//dataType   : 'json',
						xhr: function() {
							var myXhr = $.ajaxSettings.xhr();
							return myXhr;
						},
						success: function (data) {
						//success: function(json, status){
							//alert("Data Uploaded: "+data);
							//if(json.status==1)
							//{
								//alert('File Gagal Upload, Cobalah Cek File Anda');
								//return false;
							//}
							//else
							//{
								var url = "<?php echo base_url(); ?>index.php/home/rincian_simpanx/";
								var	type 		= "POST";
								var mimeType    = "multipart/form-data";
								arrjoborder = [sare, spa, komponen1, komponen2, komponen3];
								$.post(url, {joborder:arrjoborder}, function(resp){
									$('#overlay1').hide();
									//alert ('Data Tersimpan');
									custom_alert(resp);
									location.reload();
								});
							//}
						},
						data: formData,
						cache: false,
						contentType: false,
						processData: false
					});
					return false;
				}
		});
			
		
		
		$('#btn_submit').click(function( e ){
			$('#btn_submit').hide();
			$('#overlay').show();
			var nojok 			= $('#nojok').val(); 
			//var type_jo 		= "New";
			var type_jo 		= $('#typejo').val(); 
			var tanggal 		= $('#tanggal').val();
			var project 		= $('#project').val(); 
			var rincian 		= $('#rincian').val();
			var syarat 			= $('#syarat').val(); 
			var deskripsi 		= $('#deskripsi').val(); 
			var atasan 			= $('#atasan').val();
			var waktu 			= $('#waktu').val(); 
			var lama 			= $('#lama').val(); 
			var latihan 		= $('#latihan').val();
			var bekerja 		= $('#bekerja').val(); 
			var lokasi 			= $('#lokasi').val(); 
			var komponen 		= $('#komponen').val();
			var jenisproject 	= $('#jenisproject').val();
			
			
			if(tanggal == "" )
			{
				alert('Tanggal tidak boleh kosong');
				$('#overlay').hide();
					$('#btn_submit').show();
				$('#divtanggal').attr('class','form-group has-error'); return false;} else if (tanggal != ""){$('#divtanggal').attr('class','form-group')
			}
			
			if (jenisproject == "" )
			{
				alert('Jenis Project tidak boleh kosong');
				$('#overlay').hide();
				$('#btn_submit').show();
				$('#divproject').attr('class','form-group has-error'); return false;} else if (jenisproject != ""){$('#divproject').attr('class','form-group')
					
			}
			
			if (project == "" )
			{
				alert('Nama Project tidak boleh kosong');
				$('#overlay').hide();
				$('#btn_submit').show();
				$('#divnproject').attr('class','form-group has-error'); return false;} else if (project != ""){$('#divnproject').attr('class','form-group')
			}
			
			if (syarat == "" )
			{
				alert('Persyaratan khusus tidak boleh kosong');
				$('#overlay').hide();
				$('#btn_submit').show();
				$('#divsyarat').attr('class','form-group has-error'); return false;} else if (syarat != ""){$('#divsyarat').attr('class','form-group')
			}
			
			if (deskripsi == "" )
			{
				alert('Deskripsi tidak boleh kosong');
				$('#overlay').hide();
				$('#btn_submit').show();
				$('#divdeskripsi').attr('class','form-group has-error'); return false;} else if (deskripsi != ""){$('#divdeskripsi').attr('class','form-group')
			}
			
			if (lama == "" )
			{
				alert('Lama Project tidak boleh kosong');
				$('#overlay').hide();
				$('#btn_submit').show();
				$('#divlama').attr('class','form-group has-error'); return false;} else if (lama != ""){$('#divlama').attr('class','form-group')
			}
			
			if (latihan == "" )
			{
				alert('Tanggal Pelatihan tidak boleh kosong');
				$('#overlay').hide();
				$('#btn_submit').show();
				$('#divlatihan').attr('class','form-group has-error'); return false;} else if (latihan != ""){$('#divlatihan').attr('class','form-group')
			}
			
			if (bekerja == "" )
			{
				alert('Tanggal Bekerja tidak boleh kosong');
				$('#overlay').hide();$('#btn_submit').show();

				$('#divbekerja').attr('class','form-group has-error'); return false;} else if (bekerja != ""){$('#divbekerja').attr('class','form-group')
			}
			
			if (komponen == "" )
			{
				alert('Anda harus menyertakan dokumen pendukung');
				$('#overlay').hide();
				$('#btn_submit').show();
				$('#divkomponen').attr('class','form-group has-error'); return false;} else if (komponen != ""){$('#divkomponen').attr('class','form-group')
			}
			
			
			var lrincian=[];
			$('#listrincian tbody tr').each(function(){
				var ljabatan = $(this).find(".ljabatanz").html();
				var lgender = $(this).find(".lgender").html();
				var lpendidikan = $(this).find(".lpendidikan").html();
				var llokasi = $(this).find(".llokasiz").html();
				var lwaktu = $(this).find(".lwaktu").html();
				var latasan = $(this).find(".latasan").html();
				var lkontrak = $(this).find(".lkontrak").html();
				var ljumlah = $(this).find(".ljumlah").html();
				lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah];
				lrincian += ',';
			})
			
			
			if (lrincian == "" )
			{
				$('#overlay').hide();
				$('#btn_submit').show();
				alert('Anda harus menambahkan rincian');
				return false;
			}
			
			
			//var komponen = $('#komponen')[0].files[0];
			var file_data = $('#komponen').prop('files')[0];
			//var file_data1 = file_data.split(" ");
        	var form_data = new FormData();

        	form_data.append('file', file_data);
			form_data.append('komponenz', komponen);
			form_data.append('nojokz', nojok);
			$.ajax({
					url: '<?php echo base_url("index.php/home/urincian_simpan") ?>',
					data: form_data,
					processData: false,
					contentType: false,
					type	   : 'POST',
					dataType   : "json",
					success: function(json, status){
				    		/*if(data=="")
							{
								return true;
							}
							else
							{
								alert(data);
								return false;
							}
							*/
							//alert(data);
							
							if(json.status==1)
							{
								alert('File Gagal Upload, Cobalah Cek File Anda');
								return false;
							}
							else
							{
								var url = "<?php echo base_url(); ?>index.php/home/rincian_simpan/";
								var	type 		= "POST";
								var mimeType    = "multipart/form-data";
								arrjoborder = [tanggal, project, syarat, deskripsi, lama, latihan, bekerja, komponen, type_jo, jenisproject, lrincian];
								$.post(url, {joborder:arrjoborder}, function(resp){
									$('#overlay').hide();
									//alert ('Data Tersimpan');
									custom_alert(resp);
									location.reload();
								});
							}
							
				  	},
					
					error: function(data) {
						alert('File Gagal Upload');
					}
			});
			
			//alert(lrincian);
			/*
			var fd = new FormData();    
			fd.append( 'jabatan', $('#jabatan').val());
			fd.append( 'gender', $('#gender').val());
			fd.append( 'pendidikan', $('#pendidikan').val());
			fd.append( 'lokasi', $('#lokasi').val());
			fd.append( 'waktu', $('#waktu').val());
			fd.append( 'atasan', $('#atasan').val());
			fd.append( 'kontrak', $('#kontrak').val());
			fd.append( 'jumlah', $('#jumlah').val());
			*/	
			//fd.append( 'type_jo', $('#type_jo').val());
			//fd.append( 'lrincian', $('#listrincian tbody tr').each(function(){$('#jmlsakit').val());
			/*
			$.ajax({
					url: '<?php echo base_url("index.php/home/rincian_simpan") ?>',
					data: fd,
					processData: false,
					contentType: false,
					type: 'POST',
					success: function(data){
				    	alert(data);
						location.reload();
				  	}
				});
			
				*/
			
			/*
			var url = "<?php echo base_url(); ?>index.php/home/rincian_simpan/";
			var	type 		= "POST";
            var mimeType    = "multipart/form-data";
			arrjoborder = [tanggal, project, syarat, deskripsi, lama, latihan, bekerja, komponen, type_jo, jenisproject, lrincian];
			$.post(url, {joborder:arrjoborder}, function(resp){
				alert ('Data Tersimpan');
				location.reload();
			});
			*/
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
		});
		
		$('#addrincian').click(function(){
			//document.getElementById("haha").reset();
			var uraian 	= $('#uraian :selected').text();
			var uraianz 	= $('#uraian').val();
			var var_qty 		= $('#var_qty').val();
			
			var var_nominal 		= $('#var_nominal').val();
			var var_total 	= $('#var_total').val();
			var var_tujuan 		= $('#var_tujuan').val();
			
			if (uraianz == "" )
			{
				alert('Uraian tidak boleh kosong');
				$('#divuraian').attr('class','form-group has-error'); return false;} else if (uraianz != ""){$('#divuraian').attr('class','form-group')
			}
			
			if (var_qty == "" )
			{
				alert('qty tidak boleh kosong');
				$('#divvar_qty').attr('class','form-group has-error'); return false;} else if (var_qty != ""){$('#divvar_qty').attr('class','form-group')
			}
			
			
			
			if (var_nominal == "" )
			{
				alert('var_nominal tidak boleh kosong');
				$('#divvar_nominal').attr('class','form-group has-error'); return false;} else if (var_nominal != ""){$('#divvar_nominal').attr('class','form-group')
			}
			
			
			
			if (var_tujuan == "" )
			{
				alert('tujuan tidak boleh kosong');
				$('#divvar_tujuan').attr('class','form-group has-error'); return false;} else if (var_tujuan != ""){$('#divvar_tujuan').attr('class','form-group')
			}
			
			
			$('#listrincian > tbody:last-child').append('<tr><td class=luraian>'+ uraian +'</td><td class=lvar_qty>'+ var_qty +'</td><td class=lvar_nominal>'+ var_nominal +'</td><td class=lvar_total>'+ var_total +'</td><td class=lvar_tujuan>'+ var_tujuan +'</td><td class=luraianz style=display:none>'+ uraianz +'</td></tr>');
			/*
			var url = "<?php echo base_url(); ?>index.php/home/rincian_save/";
			arrrincian = [nojo,uraian, var_qty, pendidikan, lokasi, waktu, var_nominal, var_total, var_tujuan];
			$.post(url, {xrincian:arrrincian}, function(resp){
				alert('rincian berhasil di tambahkan');
			});
			*/
			//$('#kategori').val('');
			$('#uraian').val('');
			$('#var_qty').val('');
			//$('#province').val('');
			//$('#lokasi').val('');
			//$('#pendidikan').val('');
			//$('#waktu').val('');
			$('#var_nominal').val('');
			$('#var_total').val('');
			$('#var_tujuan').val('');
		})
		
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
			<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/home/rincian_simpan/" enctype="multipart/form-data">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Job Order</h3>
				</div><!-- /.box-header -->
			
				<div class="box-body">
					<div class="form-group" id="divproject">
						<label class="col-sm-3 control-label">Type Project</label>
						<div class="col-sm-9">
							<select class="form-control pull-right" id="typejo" name="typejo"/>
										<option value="">Pilih Type Project</option>
										<option value="Replace">Replacement</option>	
										<option value="New">New</option>
										<option value="SKEMA">Penyesuaian Skema</option>											
							</select>		
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
				</div>
			</div>	
				
			<div class="box box-primary" id='yuyuy'>
			<!-- form start -->
				<form class="form-horizontal">
					<div class="box-body">
					
<!--					
						<div class="form-group" id="divnojo">
							<label class="col-sm-3 control-label">Nojo</label>
							<div class="col-sm-9">
							<input type="text" class="form-control pull-right" id="nojok" name="nojok" value="<?php //echo $nojo ?>" readonly />
							</div>
						</div>
-->
						<div class="form-group" id="divnojo">
							<label class="col-sm-3 control-label">Nojo</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nojok" name="nojok" value="<?php echo $nojo ?>" readonly />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divtanggal">
							<label class="col-sm-3 control-label">Tanggal</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" placeholder="Masukkan tanggal sekarang.."/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
<!--						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Type Project</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="typejo" name="typejo"/>
											<option value="">Pilih Type Project</option>
											<option value="Replace">Replacement</option>	
											<option value="New">New</option>
											<option value="SKEMA">Penyesuaian Skema</option>											
								</select>		
							</div>
						</div>
-->
						
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Jenis Project</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="jenisproject" name="jenisproject"/>
											<option value="">Pilih Jenis Project</option>
											<?php echo $cmbjpro;?>									
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						<div class="form-group" id="divnproject">
							<label class="col-sm-3 control-label">Nama Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="project" name="project" placeholder="Masukkan nama project.."/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divsyarat">
							<label class="col-sm-3 control-label">Persyaratan Khusus</label>
							<div class="col-sm-9">
								<textarea class="form-control" rows="3" id="syarat" name="syarat" placeholder="Persyaratan Khusus Jabatan..."/></textarea>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="divdeskripsi">
							<label class="col-sm-3 control-label">Deskripsi Pekerjaan</label>
							<div class="col-sm-9">
								<textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" placeholder="Deskripsi Pekerjaan Jabatan..."/></textarea>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="divlama">
							<label class="col-sm-3 control-label">Lama Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="lama" name="lama" placeholder="Satuan bulan..."/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="divlatihan">
							<label class="col-sm-3 control-label">Tanggal Pelatihan</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="latihan" name="latihan" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="divbekerja">
							<label class="col-sm-3 control-label">Tanggal Bekerja</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="bekerja" name="bekerja"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="group_att3">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="komponen[]" id="komponen4"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att4">
							<label class="col-sm-3 control-label">Dokumen BAK</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="komponen[]" id="komponen5"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att5">
							<label class="col-sm-3 control-label">Dokumen Lain</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="komponen[]" id="komponen6"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div id='akk'>
							<button type="button" class="btn btn-default btn-sm" id="addmore2">Add more attachment</button>
						</div>
						<div id='akkx'>
							<button type="button" class="btn btn-default btn-sm" id="addmore3">Add more attachment</button>
						</div>
						
						<div class="overlay" id="overlay">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
						
					</div><!-- /.box-body -->
				</form>
			</div><!-- /.box -->
			
			
			
			
			<div class="box box-primary" id='yeyey'>
			<!-- form start -->
				<form class="form-horizontal">
					<div class="box-body" enctype="multipart/form-data">
					
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Area</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="sare" name="sare"/>
											<option value="">Pilih Area</option>
											<?php echo $cmbare;?>									
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="spa" name="spa"/>
											<option value="">Pilih PersonalArea</option>
											<?php echo $cmbpera;?>									
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="file[]" id="komponen1"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att1">
							<label class="col-sm-3 control-label">Dokumen BAK</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="file[]" id="komponen2"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att2">
							<label class="col-sm-3 control-label">Dokumen Lain</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="file[]" id="komponen3"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div id='aww'>
							<button type="button" class="btn btn-default btn-sm" id="addmore">Add more attachment</button>
						</div>
						<div id='awwx'>
							<button type="button" class="btn btn-default btn-sm" id="addmore1">Add more attachment</button>
						</div>
						
						<div class="box-footer" id="ffgg">
							<button type="button" class="btn btn-primary pull-right" id="btn_submit1">Submit</button>
						</div>
						
						<div class="overlay1" id="overlay1">
						  <!--<i class="fa fa-refresh fa-spin"></i>--> <img src="<?php echo base_url('uploads/loading1.gif');?>" height="100" width="100" class="pull-right" />
						</div>
						
					</div><!-- /.box-body -->
				</form>
			</div><!-- /.box -->
			
			
			
			</form>
		</div><!-- /.box -->
		
		
		<div class="col-md-6" id='yayay'>
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Job Order</h3>
				</div><!-- /.box-header -->
				<form class="form-horizontal">
					<div class="box-body">
						<div class="form-group" id="divrincian">
							<label class="col-sm-3 control-label">Rincian Kebutuhan</label>
							<div class="col-sm-9">
								<button type='button' class='btn btn-info btn-block btn-sm' data-toggle='modal' data-target='#myModal' id="tmbhrincian">Tambah Rincian Kebutuhan</button>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<table id="listrincian" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Jabatan</th>
									<th>Kelamin</th>
									<th>Pendidikan</th>
									<th>Lokasi</th>
									<th>Waktu</th>
									<th>Atasan</th>
									<th>Kontrak</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
						<div class="box-footer">
							<button type="button" class="btn btn-primary pull-right" id="btn_submit">Submit</button>
							
						</div>
				</form>
			</div><!-- /.box -->
			<div class="modal fade" id="myModal" role="dialog">
			  <div class="modal-dialog" id="modal-alert">
				 <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Rincian Kebutuhan</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="haha">
							<div class="box-body">
								<div class="form-group" id="divcategory">
									<label class="col-sm-3 control-label">Kategori Jabatan</label>
									<div class="col-sm-9">
										<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
										<select class="form-control pull-right" id="kategori"/>
											<option value="">Pilih Kategori</option>
											<?php echo $cmbkategori;?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								
								<div class="form-group" id="divjabatan">
									<label class="col-sm-3 control-label">Jabatan</label>
									<div class="col-sm-9">
										<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
										<select class="form-control pull-right" id="jabatan"/>
											<option value="">Pilih Jabatan</option>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								<div class="form-group" id="divgender">
									<label class="col-sm-3 control-label">Gender</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="gender"/>
											<option value="">Pilih Kelamin</option>
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>
											<option value="Pria-Wanita">Pria-Wanita</option>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								<div class="form-group" id="divpendidikan">
									<label class="col-sm-3 control-label">Pendidikan</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="pendidikan"/>
											<option value="">Pilih Pendidikan</option>
											<?php echo $cmbpendidikan; ?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								
								<div class="form-group" id="divpropinsi">
									<label class="col-sm-3 control-label">Province</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="province"/>
											<option value="">Pilih Province</option>
											<?php echo $cmbprovince; ?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								
								<div class="form-group" id="divlokasi">
									<label class="col-sm-3 control-label">Lokasi Kerja</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="lokasi"/>
											<option value="">Pilih Lokasi</option>
											
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								<div class="form-group" id="divwaktu">
									<label class="col-sm-3 control-label">Waktu Kerja</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="waktu"/>
											<option value="">Pilihan</option>
											<option value="shifting">Shifting</option>
											<option value="office_hour">Office Hour</option>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								<div class="form-group" id="divatasan">
									<label class="col-sm-3 control-label">Atasan</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="atasan"/>
											<option value="">Pilih Atasan</option>
											<?php echo $cmbtgg; ?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								<div class="form-group" id="divkontrak">
									<label class="col-sm-3 control-label">Jenis Kontrak</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="kontrak"/>
											<option value="">Pilih Kontrak</option>
											<?php echo $cmbkontrak; ?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								<div class="form-group" id="divjumlah">
									<label class="col-sm-3 control-label">Jumlah</label>
									<div class="col-sm-9">
										<input type="text" class="form-control pull-right" id="jumlah"/>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button>						
					</div>
				 </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div><!-- /.box -->
	</div><!-- /.row -->
</section>
</div><!-- /.content-wrapper -->