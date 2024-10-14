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
<script src="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminlte/plugins/datepicker/my.js" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>

<style>
 .divlistrincian{ overflow-x: scroll; }
 .listrincian{margin:40px auto 0px auto; }

 .divlistkomponen{ overflow-x: scroll; }
 .listkomponen{margin:40px auto 0px auto; }
 
 .divlistproc{ overflow-x: scroll; }
 .listproc{margin:40px auto 0px auto; }
 
 .divperner{ overflow-x: scroll; }
 .listperner{margin:40px auto 0px auto; }
 
 .divpernerganti{ overflow-x: scroll; }
 .listpernerganti{margin:40px auto 0px auto; }
</style>
<!-- Select2 -->
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>-->

<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>

<script language="JavaScript" type="text/javascript">
	window.onbeforeunload = function(){
		return 'Are you sure you want to leave?';
		//return false;
	};
</script>
		
<script type="text/javascript">
	
		/*$(".select2").select2({
			containerCssClass : "form-control"
		});*/
	$(document).ready(function(){
		$(".select2").select2();
		$.fn.modal.Constructor.prototype.enforceFocus = $.noop;
		// $('#tanggal').datepicker({format: 'yyyy-mm-dd',startDate : '0', autoclose:true});
		$('#latihan').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#latihan_n').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#bekerja').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#bekerja_n').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#sdateskem').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#edateskem').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#tgl1').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#tgl2').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#resign').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#ppsp').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#ppep').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#sproject').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#eproject').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#overlay').hide();
		$('#zoverlayz').hide();
		$('#overlay1').hide();
		$('#ppoverlay').hide();
		$('#yeyey').hide();
		$('#yzyzy').hide();
		$('#lalay').hide();
		$('#divtre').hide();
		$('#divnrespa').hide();
		$('#divreptrain').hide();
		$('#divnper').hide();
		$('#divnperganti').hide();
		$('#divresign').hide();
		$('#divtrotres').hide();
		$('#lalax').hide();  
		$('#Aoverlayz').hide();
		//$('#divtpeng').hide();
		//$('#group_att1').hide();
		$('#group_att2').hide();
		//$('#group_att4').hide();
		$('#group_att5').hide();
		$('#divpnorek').hide();
		$('#divalasanrot').hide();
		$('#divlatihan').hide();
		$('#divbekerja').hide();
		$('#btsrep').hide();
		$("#infox").hide();
		document.getElementById("tgl2").disabled = true;
		document.getElementById("ypernery").disabled = true;
		document.getElementById("alasan_ganti").disabled = true;
		
		var rupiahvtagihan 		= document.getElementById("nilpro");
		rupiahvtagihan.addEventListener("keyup", function(e) {
		  rupiahvtagihan.value = formatRupiah(this.value, "");
		});
		
		
		var optionx = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": false,
			//"bAutoWidth": false,
			//"scrollX": true,
			"bJQueryUI": false  
		};
		
		eTable = $('#tkomp').dataTable(optionx);
		vTable = $('#tkomp_var').dataTable(optionx);
		bTable = $('#tkomp_ben').dataTable(optionx);

		$("#addmorekomp").click(function(){
			//s$("<div class='col-sm-12'><input type='file' class='form-control attachment' name='attachment[]'></div>").appendTo("#divmorekomp");

			var komplength = $('.kompx');
			var ckomp = komplength.length + 1;
			var idket = 'ketx'+ckomp;
			var idval = 'valuex'+ckomp;
			var idkom = 'kompx'+ckomp;
			var iddivkom = 'divkompx'+ckomp;
			var iddivval = 'divvaluex'+ckomp;
			var iddivket = 'divketx'+ckomp;
			//alert(ckomp);

			$("<hr><div class='form-group' id="+iddivkom+"><label class='col-sm-3 control-label'>Komponen</label><div class='col-sm-9'><select name="+idkom+" id="+idkom+" class='kompx form-control select2' style='width:400px;' onchange='getsifat(this,"+ckomp+")'><option value=''></option> <?php //echo $cmbkomp;?> </select></div></div><div class='form-group' id="+iddivval+"><label class='col-sm-3 control-label'>Value</label><div class='col-sm-9'><input type='text' class='form-control pull-right' id="+idval+"></div></div><div class='form-group' id="+iddivket+"><label class='col-sm-3 control-label'>Keterangan</label><div class='col-sm-9'><select class='form-control pull-right' id="+idket+"><option value=''>Pilih Keterangan</option></select></div></div>").appendTo("#divmorekomp");
		});
		


		
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
						//k: $("#xspax").val()
					};
				},
				processResults: function (data, params) {
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
		
		
		$("#xspax").change(function(){
				$("#spa").select2("val", "");
		});
		
		
		/*
		$("#xrespax").change(function(){
				$("#respa").select2("val", "");
		});
		
		
		
		$("#respa").select2({
			ajax: {
				//data: form_data,
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term,
						k: $("#xrespax").val()
					};
				},
				processResults: function (data, params) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.personalarea, text: obj.personnal_area };
								// return { id: obj.kd_persa, text: obj.persa };
						  })
					 };
					 console.log(params);
				},
			},
			minimumInputLength: 2
		});
		*/
		
		$("#ypernery").select2({
			ajax: {
				//data: form_data,
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/perner_search",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term,
						k: $("#xrespax").val(),
						p:2
					};
				},
				processResults: function (data, params) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.pernr, text: obj.pernr };
						  })
					 };
					 console.log(params);
				},
			},
			minimumInputLength: 2
		});
		
		
		$("#ypernery").change(function(){
			var pganti 		= $("#ypernery").val();
			var tglresign 	= $("#resign").val();
			// if(tglresign==''){
				// alert('Tgl Resign Harus di isi terlebih dahulu, TerimaKasih');
				// return false;
				
			// }
			var url = "<?php echo base_url(); ?>index.php/mapping/cek_perner_ganti";
			$.post(url, {data:pganti,tglres:tglresign}, function(response){
				var res = response.split(",");
				if(res[0]=='GAGAL'){
					alert('Perner sudah pernah di input pada nojo '+res[1]+', dan belum di proses !!');
					$("#ypernery").select2("val", "");
					return false;
				} else if(res[0]=='GAGALX'){
					alert('Bulan tahun rotasi tidak boleh sama atau sebelum status action terakhir !!');
					$("#ypernery").select2("val", "");
					return false;
				} 
			});
		});
		
		
		$("#xpernerx").select2({
			ajax: {
				//data: form_data,
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/perner_search",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term,
						k: $("#xrespax").val(),
						p:1
					};
				},
				processResults: function (data, params) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.pernr, text: obj.pernr };
						  })
					 };
					 console.log(params);
				},
			},
			minimumInputLength: 2
		});
		
		
		
		$("#xpernerx").change(function(){
			// var r = confirm("Apakah Anda Yakin tidak ada training untuk replace perner ini ?");
			// if (r == true) {
				var value = $("#xpernerx").select2('data')[0]['id'];
				var text = $("#xpernerx").select2('data')[0]['text'];
				document.getElementById("xpernerx").disabled = true;
				var pganti = $("#ypernery").val();
				
				var tresign = $("#resign").val();
				var tlatihan = $("#latihan").val();
				var tbekerja = $("#bekerja").val();
				var alasan_ganti = $("#alasan_ganti").val();
				var talasan_ganti  = $('#alasan_ganti :selected').text();
				var alasan = $("#alasan").val();
				var talasan  = $('#alasan :selected').text();
				var typere = $("#typere").val();
				var ntypere  = $('#typere :selected').text();
				var trotres 	= $('#trotres:checked').val();
				if(trotres==1){
					var ntrotres 	= 'Resign';
				} else {
					var ntrotres 	= 'Rotasi-Mutasi';
				}
				
				document.getElementById("xpernerx").disabled = true;
				// alert(typere);
				
				var vkumtrain = [];
				var vkumtraint = [];
				$('#rep_kumtrain:checked').each(function(i){
				  vkumtrain[i] = $(this).val();
				  if($(this).val()==1){vkumtraint[i]='Softskill';}else if($(this).val()==2){vkumtraint[i]='Hardskill';}else if($(this).val()==3){vkumtraint[i]='Tandem Pasif';}else if($(this).val()==4){vkumtraint[i]='Tandem Aktif';}
				});
				var vkumtrainx 		= vkumtrain.join(';');
				var vkumtraintx 	= vkumtraint.join(';');	
				
				if(tresign==''){
					alert('Tanggal Resign/Rotasi tidak boleh kosong..');
					document.getElementById("xpernerx").disabled = false;
					$("#xpernerx").select2("val", "");
					return false;
				}
				
				if(tlatihan==''){
					alert('Tanggal Pelatihan tidak boleh kosong..');
					document.getElementById("xpernerx").disabled = false;
					$("#xpernerx").select2("val", "");
					return false;
				}
				
				if(tbekerja==''){
					alert('Tanggal Bekerja tidak boleh kosong..');
					document.getElementById("xpernerx").disabled = false;
					$("#xpernerx").select2("val", "");
					return false;
				}
				
				if(alasan==''){
					alert('Alasan resign/rotasi harus dipilih..');
					document.getElementById("xpernerx").disabled = false;
					$("#xpernerx").select2("val", "");
					return false;
				}
				
				if(typere=='3'){
					if(pganti==null){
						alert('Perner Pengganti harus diisi..');
						document.getElementById("xpernerx").disabled = false;
						$("#xpernerx").select2("val", "");
						return false;
					}
					
					if(alasan_ganti==''){
						alert('Alasan Rotasi Pengganti harus dipilih..');
						document.getElementById("xpernerx").disabled = false;
						$("#xpernerx").select2("val", "");
						return false;
					}
				}
				
				var url = "<?php echo base_url(); ?>index.php/mapping/cek_perner_aktif";
				$.post(url, {data:value, trotresx:trotres}, function(response){
					var res = response.split(",");
					// var abc = response.length;
					// if(abc==1){
						// $("#txt_alamat").val(res[0]);
					// }
					// else {
						// $("#txt_alamat").val(res[0]);
						// $("#pup").html(res[1]);
					// }
					//alert(response);
					
					if(res[0]=='GAGAL'){
						alert('Data sudah pernah di input pada nojo '+res[1]+', dan belum di proses !!');
						document.getElementById("xpernerx").disabled = false;
						$("#xpernerx").select2("val", "");
						return false;
					}
					else if(res[0]=='false'){
						$.ajax({
							type 		: "POST",
							url		: "<?php echo base_url('index.php/mapping/detail_pernerx/');?>",
							dataType	: "json",
							data		: {anojo:value,tresi:trotres,pgantix:pganti},
							success	: function(res){
								document.getElementById("xpernerx").disabled = false;
								if(res.perrot.cname==null){
									alert('Perner '+value+' tidak ditemukan/Perner '+value+' Sudah tidak aktif/Perner '+value+' belum di rotasi / mutasi');
									$("#xpernerx").select2("val", "");
									return false;
								}
								var tfgk = res.perrot.cname;
								var anjk = tfgk.replace(",", ".");
								$('#listperner> tbody:last-child').append('<tr><td class=ntres>'+tresign+'</td><td>'+talasan+'</td><td class=ntlatihan>'+tlatihan+'</td><td class=ntbekerja>'+tbekerja+'</td><td class=ntrrxy>'+ntypere+'</td><td class=ntrr>'+ntrotres+'</td><td class=npernergn>'+pganti+'</td><td class=nperner>'+res.perrot.PERNR+'</td><td class=nnama>'+anjk+'</td><td class=narea>'+res.perrot.btrtx+'</td><td class=npersa>'+res.perrot.wktxt+'</td><td class=nskill>'+res.perrot.pektx+'</td><td class=njabatan>'+res.perrot.platx+'</td><td class=nlevel>'+res.perrot.trfar_txt+'</td><td class=ktrep_train>'+vkumtraintx+'</td><td><button class="btn btn-box-tool btnDelete" onclick="hapuslist(this,'+value+')"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>'+res.perrot.btrtl+'</td><td class=kpersa style=display:none>'+res.perrot.werks+'</td><td class=kskill style=display:none>'+res.perrot.persk+'</td><td class=klevel style=display:none>'+res.perrot.trfar+'</td><td class=kjabatan style=display:none>'+res.perrot.stell+'</td><td class=kabkrs style=display:none>'+res.perrot.abkrs+'</td><td class=kansvh style=display:none>'+res.perrot.ansvh+'</td><td class=nalasan style=display:none>'+alasan+'</td><td class=kkrep_train style=display:none>'+vkumtrainx+'</td><td class=krr style=display:none>'+trotres+'</td><td class=mntrrxy style=display:none>'+typere+'</td><td class=kcttyp style=display:none>'+res.perrot.cttyp+'</td><td class=ktrfgb style=display:none>'+res.perrot.trfgb+'</td><td class=kmassn style=display:none>'+res.perrot.massn+'</td></tr>');
								
								if(typere=='3'){
									$('#listpernerganti> tbody:last-child').append('<tr id='+value+'><td class=npernergx>'+value+'</td><td>'+talasan_ganti+'</td><td class=npernergy>'+pganti+'</td><td class=nnamagy>'+res.pergan.cname+'</td><td class=nareagy>'+res.pergan.btrtx+'</td><td class=npersagy>'+res.pergan.wktxt+'</td><td class=nskillgy>'+res.pergan.pektx+'</td><td class=njabatangy>'+res.pergan.platx+'</td><td class=nlevelgy>'+res.pergan.trfar_txt+'</td><td class=kareagy style=display:none>'+res.pergan.btrtl+'</td><td class=kpersagy style=display:none>'+res.pergan.werks+'</td><td class=kskillgy style=display:none>'+res.pergan.persk+'</td><td class=klevelgy style=display:none>'+res.pergan.trfar+'</td><td class=kgalasan style=display:none>'+alasan_ganti+'</td><td class=kgcttyp style=display:none>'+res.pergan.cttyp+'</td><td class=kgansvh style=display:none>'+res.pergan.ansvh+'</td><td class=kgtrfgb style=display:none>'+res.pergan.trfgb+'</td><td class=kgarber style=display:none>'+res.pergan.arber+'</td></tr>');
								}
																
								$("#resign").val("");
								$("#latihan").val("");
								$("#alasan").val("");
								$("#alasan_ganti").val("");
								$("#bekerja").val("");
								$("#ypernery").select2("val", "");	
								$("#xpernerx").select2("val", "");
							}
						})
					}
					else
					{
						//alert('Data belum diresignkan !!');
						//return false;
						$.ajax({
							type 		: "POST",
							url		: "<?php echo base_url('index.php/mapping/detail_pernerx/');?>",
							dataType	: "json",
							data		: {anojo:value,tresi:trotres,pgantix:pganti},
							success	: function(res){
								document.getElementById("xpernerx").disabled = false;
								if(res.perrot.cname==null){
									// alert('Perner '+value+' tidak ditemukan/Perner '+value+' Sudah tidak aktif');
									alert('Perner '+value+' tidak ditemukan/Perner '+value+' Sudah tidak aktif/Perner '+value+' belum di rotasi / mutasi');
									$("#xpernerx").select2("val", "");
									return false;
								}
								var tfgk = res.perrot.cname;
								var anjk = tfgk.replace(",", ".");
								// $('#listperner> tbody:last-child').append('<tr><td class=ntres>'+tresign+'</td><td class=nperner>'+res.PERNR+'</td><td class=nnama>'+anjk+'</td><td class=narea>'+res.btrtx+'</td><td class=npersa>'+res.wktxt+'</td><td class=nskill>'+res.pektx+'</td><td class=njabatan>'+res.platx+'</td>'+'</td><td class=nlevel>'+res.trfar+'</td><td class=ktrep_train>'+vkumtraintx+'</td><td><button class="btn btn-box-tool btnDelete"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>'+res.btrtl+'</td><td class=kpersa style=display:none>'+res.werks+'</td><td class=kskill style=display:none>'+res.persk+'</td><td class=klevel style=display:none>'+res.persk+'</td><td class=kkrep_train style=display:none>'+vkumtrainx+'</td></tr>');
								
								//$('#listperner> tbody:last-child').append('<tr><td class=ntres>'+tresign+'</td><td class=ntrr>'+ntrotres+'</td><td class=nperner>'+res.PERNR+'</td><td class=nnama>'+anjk+'</td><td class=narea>'+res.btrtx+'</td><td class=npersa>'+res.wktxt+'</td><td class=nskill>'+res.pektx+'</td><td class=njabatan>'+res.platx+'</td>'+'</td><td class=nlevel>'+res.trfar+'</td><td class=ktrep_train>'+vkumtraintx+'</td><td><button class="btn btn-box-tool btnDelete"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>'+res.btrtl+'</td><td class=kpersa style=display:none>'+res.werks+'</td><td class=kskill style=display:none>'+res.persk+'</td><td class=klevel style=display:none>'+res.persk+'</td><td class=kkrep_train style=display:none>'+vkumtrainx+'</td><td class=krr style=display:none>'+trotres+'</td></tr>');
								
								$('#listperner> tbody:last-child').append('<tr><td class=ntres>'+tresign+'</td><td>'+talasan+'</td><td class=ntlatihan>'+tlatihan+'</td><td class=ntbekerja>'+tbekerja+'</td><td class=ntrrxy>'+ntypere+'</td><td class=ntrr>'+ntrotres+'</td><td class=npernergn>'+pganti+'</td><td class=nperner>'+res.perrot.PERNR+'</td><td class=nnama>'+anjk+'</td><td class=narea>'+res.perrot.btrtx+'</td><td class=npersa>'+res.perrot.wktxt+'</td><td class=nskill>'+res.perrot.pektx+'</td><td class=njabatan>'+res.perrot.platx+'</td><td class=nlevel>'+res.perrot.trfar_txt+'</td><td class=ktrep_train>'+vkumtraintx+'</td><td><button class="btn btn-box-tool btnDelete" onclick="hapuslist(this,'+value+')"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>'+res.perrot.btrtl+'</td><td class=kpersa style=display:none>'+res.perrot.werks+'</td><td class=kskill style=display:none>'+res.perrot.persk+'</td><td class=klevel style=display:none>'+res.perrot.trfar+'</td><td class=kjabatan style=display:none>'+res.perrot.stell+'</td><td class=kabkrs style=display:none>'+res.perrot.abkrs+'</td><td class=kansvh style=display:none>'+res.perrot.ansvh+'</td><td class=nalasan style=display:none>'+alasan+'</td><td class=kkrep_train style=display:none>'+vkumtrainx+'</td><td class=krr style=display:none>'+trotres+'</td><td class=mntrrxy style=display:none>'+typere+'</td><td class=kcttyp style=display:none>'+res.perrot.cttyp+'</td><td class=ktrfgb style=display:none>'+res.perrot.trfgb+'</td><td class=kmassn style=display:none>'+res.perrot.massn+'</td></tr>');
								
								if(typere=='3'){
									$('#listpernerganti> tbody:last-child').append('<tr id='+value+'><td class=npernergx>'+value+'</td><td>'+talasan_ganti+'</td><td class=npernergy>'+pganti+'</td><td class=nnamagy>'+res.pergan.cname+'</td><td class=nareagy>'+res.pergan.btrtx+'</td><td class=npersagy>'+res.pergan.wktxt+'</td><td class=nskillgy>'+res.pergan.pektx+'</td><td class=njabatangy>'+res.pergan.platx+'</td><td class=nlevelgy>'+res.pergan.trfar_txt+'</td><td class=kareagy style=display:none>'+res.pergan.btrtl+'</td><td class=kpersagy style=display:none>'+res.pergan.werks+'</td><td class=kskillgy style=display:none>'+res.pergan.persk+'</td><td class=klevelgy style=display:none>'+res.pergan.trfar+'</td><td class=kgalasan style=display:none>'+alasan_ganti+'</td><td class=kgcttyp style=display:none>'+res.pergan.cttyp+'</td><td class=kgansvh style=display:none>'+res.pergan.ansvh+'</td><td class=kgtrfgb style=display:none>'+res.pergan.trfgb+'</td><td class=kgarber style=display:none>'+res.pergan.arber+'</td></tr>');
								}					
									
								$("#resign").val("");
								$("#latihan").val("");
								$("#alasan").val("");
								$("#alasan_ganti").val("");
								$("#bekerja").val("");
								$("#ypernery").select2("val", "");	
								$("#xpernerx").select2("val", "");
							}
						})
					}
				})	
			// } else {
				// return false;
			// }		
		});
		
		
		// $("#listperner").on('click','.btnDelete',function(){
			// $(this).closest('tr').remove();
			// $("#1013").remove();
		// });
		
		
		
		
		$("#periode").change(function(){
			var jper = $("#periode").val();
			if(jper=='1') {
				document.getElementById("tgl2").disabled = true;
				$("#tgl2").val('');
			} else {
				document.getElementById("tgl2").disabled = false;
			}
		});
		
		
		
		$("#respa").change(function(){
			/*
			var group = $("#respa").select2('data')[0]['id'];
			var url = "<?php echo base_url(); ?>index.php/home/pilih_area";
			$.post(url, {data:group}, function(response){
				$("#lokasi").html(response);
			})
			*/
		});
		
		
		$("#jskema").change(function(){
			var jskema = $("#jskema").val();
			if(jskema==1){
				$('#allskema').show();
				$("#tkomp").find("tr:gt(1)").remove();
				$("#tkomp_var").find("tr:gt(1)").remove();
				//$("#tkomp_ben").find("tr:gt(7)").remove();
				$("#valuex1").val('');
				$("#vvaluex1").val('');
				$("#bvaluex1").val('');
				$("#kompx1").val('');
				$("#vkompx1").val('');
				$("#bkompx1").val('');
				$("#ketx1").val('');
				$("#vketx1").val('');
				$("#bketx1").val('');
			}
			else {
				$('#allskema').hide();
				$("#tkomp").find("tr:gt(0)").remove();
				$("#tkomp_var").find("tr:gt(0)").remove();
				$("#tkomp_ben").find("tr:gt(0)").remove();
			}
			
		});
		
		
		
		$("#jpbpjs").change(function(){
			var jpbpjs = $("#jpbpjs").val();
			var kodekont = $("#kodekont").val();
			var arr 	= document.getElementsByName('valuex');
			
			var tot=0;
			for(var i=0;i<arr.length;i++){
				//if(parseFloat(arr[i].value))
					//tot += parseFloat(arr[i].value);
				if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}
			
			if(kodekont==1){
				if(jpbpjs==1){
					$("#pbtkp1").val('9.24');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 9.24;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 5;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				else if(jpbpjs==2){
					$("#pbtkp1").val('9.54');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 9.54;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 5;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				else if(jpbpjs==3){
					$("#pbtkp1").val('9.89');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 9.89;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 5;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				else if(jpbpjs==4){
					$("#pbtkp1").val('10.27');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 10.27;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 5;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				else if(jpbpjs==5){
					$("#pbtkp1").val('10.74');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 10.74;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 5;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				
				$("#vbtkp2").val('0');
				$("#vbtkp4").val('0');
			}
			else 
			{
				if(jpbpjs==1){
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 0;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				else if(jpbpjs==2){
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 0;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				else if(jpbpjs==3){
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 0;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				else if(jpbpjs==4){
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 0;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				else if(jpbpjs==5){
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp1").val(yaya);
					
					var pbtkp3 = 0;
					var ghj3 = (pbtkp3/100)*tot;
					var yaya3   = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}
				
				$("#vbtkp2").val('0');
				$("#vbtkp4").val('0');
			}
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
		$("#pbtkp1").change(function(){
			var pbtkp = $("#pbtkp1").val();
			var pbtkk = $("#pbtkp2").val();
			
			var arr 	= document.getElementsByName('valuex');
			var kump 	= document.getElementById("umpx").value;
			
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseFloat(arr[i].value))
					tot += parseFloat(arr[i].value);
			}
			
			var def   = 9.24 - parseFloat(pbtkp);
			var yay   = 9.24 - parseFloat(pbtkk);
			if(pbtkp > '9.24'){
				alert('Tidak Boleh Lebih Dari 9.24');
				$("#pbtkp1").val(yay);
			}
			else
			{
				var ghj = (pbtkp/100)*tot;
				var yaya   = Math.round(ghj);
				$("#vbtkp1").val(yaya);
				var klm = (def/100)*tot;
				var yoyo   = Math.round(klm);
				$("#vbtkp2").val(yoyo);
				$("#pbtkp2").val(def);
			}
		});
		*/
		
		$("#pbtkp1").change(function(){
			//var pbtkp = $("#pbtkp1").val();
			//var pbtkk = $("#pbtkp2").val();
			var jpbpjs = $("#jpbpjs").val();
			var kodekont = $("#kodekont").val();
			
			var arr 	= document.getElementsByName('valuex');
			var kump 	= document.getElementById("umpx").value;
			
			if(kodekont==1){
				if(jpbpjs==1){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.24';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						//if(parseFloat(arr[i].value))
							//tot += parseFloat(arr[i].value);
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 9.24 - parseFloat(pbtkp);
					var yay   = 9.24 - parseFloat(pbtkk);
					if(pbtkp > 9.24){
						alert('Tidak Boleh Lebih Dari 9.24');
						$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				}
				else if(jpbpjs==2){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.54';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						//if(parseFloat(arr[i].value))
							//tot += parseFloat(arr[i].value);
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 9.54 - parseFloat(pbtkp);
					var yay   = 9.54 - parseFloat(pbtkk);
					if(pbtkp > 9.54){
						alert('Tidak Boleh Lebih Dari 9.54');
						$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				}
				else if(jpbpjs==3){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.89';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 9.89 - parseFloat(pbtkp);
					var yay   = 9.89 - parseFloat(pbtkk);
					if(pbtkp > 9.89){
						alert('Tidak Boleh Lebih Dari 9.89');
						$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				}
				else if(jpbpjs==4){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '10.27';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 10.27 - parseFloat(pbtkp);
					var yay   = 10.27 - parseFloat(pbtkk);
					if(pbtkp > 10.27){
						alert('Tidak Boleh Lebih Dari 10.27');
						$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				}
				else if(jpbpjs==5){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '10.74';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 10.74 - parseFloat(pbtkp);
					var yay   = 10.74 - parseFloat(pbtkk);
					console.log(pbtkp);console.log(yay);console.log(pbtkk);
					if(pbtkp > 10.74){
						alert('Tidak Boleh Lebih Dari 10.74');
						$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				}
			}
			else
			{
				if(jpbpjs==1){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					var jmlpbtk = parseFloat(pbtkp) + parseFloat(pbtkk);
					// alert(jmlpbtk);
					//var pbtkp = '9.24';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					if(tot<kump){
						var noob = kump;
					} else {
						var noob = tot;
					}
					
					// alert(tot);
					//var def   = 9.24 - parseFloat(pbtkp);
					//var yay   = 9.24 - parseFloat(pbtkk);
					// if(pbtkp > 9.24){
					if(jmlpbtk > 9.24){
						alert('BPJS TK Tidak Boleh Lebih Dari 9.24');
						$("#pbtkp1").val('0');
						$("#vbtkp1").val('0');
						return false;
					}
					else
					{
						// var ghj = (pbtkp/100)*tot;
						var ghj = (pbtkp/100)*noob;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				}
				else if(jpbpjs==2){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					var jmlpbtk = parseFloat(pbtkp) + parseFloat(pbtkk);
					//var pbtkp = '9.54';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					//var def   = 9.54 - parseFloat(pbtkp);
					//var yay   = 9.54 - parseFloat(pbtkk);
					if(pbtkp > 9.54){
						alert('Tidak Boleh Lebih Dari 9.54');
						return false;
						//$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				}
				else if(jpbpjs==3){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.89';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					//var def   = 9.89 - parseFloat(pbtkp);
					//var yay   = 9.89 - parseFloat(pbtkk);
					if(pbtkp > 9.89){
						alert('Tidak Boleh Lebih Dari 9.89');
						return false;
						//$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				}
				else if(jpbpjs==4){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '10.27';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					//var def   = 10.27 - parseFloat(pbtkp);
					//var yay   = 10.27 - parseFloat(pbtkk);
					if(pbtkp > 10.27){
						alert('Tidak Boleh Lebih Dari 10.27');
						return false;
						//$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				}
				else if(jpbpjs==5){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '10.74';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					//var def   = 10.74 - parseFloat(pbtkp);
					//var yay   = 10.74 - parseFloat(pbtkk);
					console.log(pbtkp);console.log(yay);console.log(pbtkk);
					if(pbtkp > 10.74){
						alert('Tidak Boleh Lebih Dari 10.74');
						return false;
						//$("#pbtkp1").val(yay);
					}
					else
					{
						var ghj = (pbtkp/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				}
			}
		});
		
		/*
		$("#pbtkp2").change(function(){
			var pbtkp = $("#pbtkp1").val();
			var pbtkk = $("#pbtkp2").val();
			
			var arr 	= document.getElementsByName('valuex');
			var kump 	= document.getElementById("umpx").value;
			
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseFloat(arr[i].value))
					tot += parseFloat(arr[i].value);
			}
			
			var def   = 9.24 - parseFloat(pbtkp);
			var yay   = 9.24 - parseFloat(pbtkk);
			if(pbtkk > '9.24'){
				alert('Tidak Boleh Lebih Dari 9.24');
				$("#pbtkp2").val(def);
			}
			else
			{
				var ghj = (pbtkk/100)*tot;
				var yaya   = Math.round(ghj);
				$("#vbtkp2").val(yaya);
				var klm = (yay/100)*tot;
				var yoyo   = Math.round(klm);
				$("#vbtkp1").val(yoyo);
				$("#pbtkp1").val(yay);
			}
			
		});
		*/
		
		$("#pbtkp2").change(function(){
			//var pbtkp = $("#pbtkp1").val();
			//var pbtkk = $("#pbtkp2").val();
			
			var arr 	= document.getElementsByName('valuex');
			var kump 	= document.getElementById("umpx").value;
			var jpbpjs = $("#jpbpjs").val();
			var kodekont = $("#kodekont").val();
			/*
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseFloat(arr[i].value))
					tot += parseFloat(arr[i].value);
			}
			
			var def   = 9.24 - parseFloat(pbtkp);
			var yay   = 9.24 - parseFloat(pbtkk);
			if(pbtkk > '9.24'){
				alert('Tidak Boleh Lebih Dari 9.24');
				$("#pbtkp2").val(def);
			}
			else
			{
				var ghj = (pbtkk/100)*tot;
				var yaya   = Math.round(ghj);
				$("#vbtkp2").val(yaya);
				var klm = (yay/100)*tot;
				var yoyo   = Math.round(klm);
				$("#vbtkp1").val(yoyo);
				$("#pbtkp1").val(yay);
			}
			*/
			
			if(kodekont==1){
				if(jpbpjs==1){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.24';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 9.24 - parseFloat(pbtkp);
					var yay   = 9.24 - parseFloat(pbtkk);
					if(pbtkk > 9.24){
						alert('Tidak Boleh Lebih Dari 9.24');
						$("#pbtkp2").val(def);
					}
					else
					{
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				}
				else if(jpbpjs==2){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.54';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 9.54 - parseFloat(pbtkp);
					var yay   = 9.54 - parseFloat(pbtkk);
					if(pbtkk > 9.54){
						alert('Tidak Boleh Lebih Dari 9.54');
						$("#pbtkp2").val(def);
					}
					else
					{
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				}
				else if(jpbpjs==3){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.89';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 9.89 - parseFloat(pbtkp);
					var yay   = 9.89 - parseFloat(pbtkk);
					if(pbtkk > 9.89){
						alert('Tidak Boleh Lebih Dari 9.89');
						$("#pbtkp2").val(def);
					}
					else
					{
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				}
				else if(jpbpjs==4){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '10.27';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 10.27 - parseFloat(pbtkp);
					var yay   = 10.27 - parseFloat(pbtkk);
					if(pbtkk > 10.27){
						alert('Tidak Boleh Lebih Dari 10.27');
						$("#pbtkp2").val(def);
					}
					else
					{
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				}
				else if(jpbpjs==5){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '10.74';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					var def   = 10.74 - parseFloat(pbtkp);
					var yay   = 10.74 - parseFloat(pbtkk);
					if(pbtkk > 10.74){
						alert('Tidak Boleh Lebih Dari 10.74');
						$("#pbtkp2").val(def);
					}
					else
					{
						console.log(pbtkk);console.log(yay);
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay/100)*tot;
						var yoyo   = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				}
			}
			else
			{
				if(jpbpjs==1){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					var jmlpbtk = parseFloat(pbtkp) + parseFloat(pbtkk);
					//var pbtkp = '9.24';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					if(tot<kump){
						var noob = kump;
					} else {
						var noob = tot;
					}
					
					//var def   = 9.24 - parseFloat(pbtkp);
					//var yay   = 9.24 - parseFloat(pbtkk);
					if(jmlpbtk > 9.24){
						alert('Tidak Boleh Lebih Dari 9.24');
						$("#pbtkp2").val('0');
						$("#vbtkp2").val('0');
						return false;
					}
					else
					{
						// var ghj = (pbtkk/100)*tot;
						var ghj = (pbtkk/100)*noob;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				}
				else if(jpbpjs==2){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.54';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					//var def   = 9.54 - parseFloat(pbtkp);
					//var yay   = 9.54 - parseFloat(pbtkk);
					if(pbtkk > 9.54){
						alert('Tidak Boleh Lebih Dari 9.54');
						return false;
						//$("#pbtkp2").val(def);
					}
					else
					{
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				}
				else if(jpbpjs==3){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '9.89';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					//var def   = 9.89 - parseFloat(pbtkp);
					//var yay   = 9.89 - parseFloat(pbtkk);
					if(pbtkk > 9.89){
						alert('Tidak Boleh Lebih Dari 9.89');
						return false;
					}
					else
					{
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				}
				else if(jpbpjs==4){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '10.27';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					//var def   = 10.27 - parseFloat(pbtkp);
					//var yay   = 10.27 - parseFloat(pbtkk);
					if(pbtkk > 10.27){
						alert('Tidak Boleh Lebih Dari 10.27');
						return false;
					}
					else
					{
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				}
				else if(jpbpjs==5){
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					//var pbtkp = '10.74';
					var tot=0;
					for(var i=0;i<arr.length;i++){
						if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
							tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
					}
					
					//var def   = 10.74 - parseFloat(pbtkp);
					//var yay   = 10.74 - parseFloat(pbtkk);
					if(pbtkk > 10.74){
						alert('Tidak Boleh Lebih Dari 10.74');
						return false;
					}
					else
					{
						console.log(pbtkk);console.log(yay);
						var ghj = (pbtkk/100)*tot;
						var yaya   = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				}
			}
		});
		
		
		$("#pbtkp3").change(function(){
			var pbkp = $("#pbtkp3").val();
			var pbkk = $("#pbtkp4").val();
			var jmlpbtk = parseFloat(pbkp) + parseFloat(pbkk);
			var kodekont = $("#kodekont").val();
			
			var arr 	= document.getElementsByName('valuex');
			var kump 	= document.getElementById("umpx").value;
			
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}
			
			if(tot<kump){
				var noob = kump;
			} else {
				var noob = tot;
			}
			
			if(kodekont==1){
				var def   = 5 - parseFloat(pbkp);
				var yay   = 5 - parseFloat(pbkk);
				if(pbkp > '5'){
					alert('Tidak Boleh Lebih Dari 5');
					$("#pbtkp3").val(yay);
				}
				else
				{
					var ghj = (pbkp/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp3").val(yaya);
					var klm = (def/100)*tot;
					var yoyo   = Math.round(klm);
					$("#vbtkp4").val(yoyo);
					$("#pbtkp4").val(def);
				}
			}
			else
			{
				//var def   = 5 - parseFloat(pbkp);
				//var yay   = 5 - parseFloat(pbkk);
				if(jmlpbtk > '5'){
					alert('Tidak Boleh Lebih Dari 5');
					$("#pbtkp3").val('0');
					$("#vbtkp3").val('0');
					return false;
				}
				else
				{
					// var ghj = (pbkp/100)*tot;
					var ghj = (pbkp/100)*noob;
					var yaya   = Math.round(ghj);
					$("#vbtkp3").val(yaya);
				}
			}
		});
		
		
		$("#pbtkp4").change(function(){
			var pbkp = $("#pbtkp3").val();
			var pbkk = $("#pbtkp4").val();
			var jmlpbtk = parseFloat(pbkp) + parseFloat(pbkk);
			var kodekont = $("#kodekont").val();
			
			var arr 	= document.getElementsByName('valuex');
			var kump 	= document.getElementById("umpx").value;
			
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}
			
			if(tot<kump){
				var noob = kump;
			} else {
				var noob = tot;
			}
			
			if(kodekont==1){
				var def   = 5 - parseFloat(pbkp);
				var yay   = 5 - parseFloat(pbkk);
				if(pbkk > '5'){
					alert('Tidak Boleh Lebih Dari 5');
					$("#pbtkp4").val(def);
				}
				else
				{
					var ghj = (pbkk/100)*tot;
					var yaya   = Math.round(ghj);
					$("#vbtkp4").val(yaya);
					var klm = (yay/100)*tot;
					var yoyo   = Math.round(klm);
					$("#vbtkp3").val(yoyo);
					$("#pbtkp3").val(yay);
				}
			}
			else
			{
				//var def   = 5 - parseFloat(pbkp);
				//var yay   = 5 - parseFloat(pbkk);
				if(jmlpbtk > '5'){
					alert('Tidak Boleh Lebih Dari 5');
					$("#pbtkp4").val('0');
					$("#vbtkp4").val('0');
					return false;
				}
				else
				{
					// var ghj = (pbkk/100)*tot;
					var ghj = (pbkk/100)*noob;
					var yaya   = Math.round(ghj);
					$("#vbtkp4").val(yaya);
				}
			}	
			
		});
		
		/*
		$("#pbtkp3").change(function(){
			var pbkp = $("#pbtkp3").val();
			var pbkk = $("#pbtkp4").val();
			
			var arr 	= document.getElementsByName('valuex');
			var kump 	= document.getElementById("umpx").value;
			
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseFloat(arr[i].value))
					tot += parseFloat(arr[i].value);
			}
			
			var def   = 5 - parseFloat(pbkp);
			var yay   = 5 - parseFloat(pbkk);
			if(pbkp > '5'){
				alert('Tidak Boleh Lebih Dari 5');
				$("#pbtkp3").val(yay);
			}
			else
			{
				var ghj = (pbkp/100)*tot;
				var yaya   = Math.round(ghj);
				$("#vbtkp3").val(yaya);
				var klm = (def/100)*tot;
				var yoyo   = Math.round(klm);
				$("#vbtkp4").val(yoyo);
				$("#pbtkp4").val(def);
			}
		});
		
		
		$("#pbtkp4").change(function(){
			var pbkp = $("#pbtkp3").val();
			var pbkk = $("#pbtkp4").val();
			
			var arr 	= document.getElementsByName('valuex');
			var kump 	= document.getElementById("umpx").value;
			
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseFloat(arr[i].value))
					tot += parseFloat(arr[i].value);
			}
			
			var def   = 5 - parseFloat(pbkp);
			var yay   = 5 - parseFloat(pbkk);
			if(pbkk > '5'){
				alert('Tidak Boleh Lebih Dari 5');
				$("#pbtkp4").val(def);
			}
			else
			{
				var ghj = (pbkk/100)*tot;
				var yaya   = Math.round(ghj);
				$("#vbtkp4").val(yaya);
				var klm = (yay/100)*tot;
				var yoyo   = Math.round(klm);
				$("#vbtkp3").val(yoyo);
				$("#pbtkp3").val(yay);
			}
			
		});
		*/
		
		$("#typenew").change(function(){
				var tnew = $("#typenew").val();
				if (tnew == '1'){
					$('#divnrespa').hide();
					$('#divnproject').show();
					// $('#divnccust').show();
					$('#divpropinsi').show();
					$('#divtpeng').show();
				}
				else
				{
					$('#divnrespa').show();
					$('#divnproject').hide();
					// $('#divnccust').hide();
					$('#divpropinsi').hide();
					$('#divtpeng').show();
				}
			
		});
		
		
		$("#typejo").change(function(){
			var tejo = $("#typejo").val();
			if ((tejo == '3') || (tejo == '5')){
				if(tejo == '3'){
					$('#xdivnmbay').hide();
				} else {
					$('#xdivnmbay').show();
				}
				$('#yeyey').show();
				$('#yuyuy').hide();
				$('#yayay').hide();
				$('#yzyzy').hide();
				$('#lalay').show();
				$('#lalax').hide();
				$('#btsrep').hide();
				//location.reload();
			}
			else
			{
				if (tejo == '2'){
					$('#divtre').show();
					$('#divtnew').hide();
					$('#divtpeng').hide();
					$('#divpropinsi').hide();
					$('#divnproject').hide();
					$('#divnccust').show();
					$('#divnrespa').hide();
					$('#divsyarat').hide();
					$('#divdeskripsi').hide();
					$('#divreptrain').show();
					$('#divbekerja').show();
					$('#divlatihan').show();
					$('#divresign').show();
					$('#divnper').show();
					$('#divnperganti').show();
					$('#divtrotres').show();
					$('#divtglgaji').hide();
					$('#divspro').hide();
					$('#divepro').hide();
					$('#divnilpro').hide();
					$('#yayay').hide();
					$('#lalax').show();
					$('#lalay').hide();
					$('#yeyey').hide();
					$('#yuyuy').show();
					$('#yzyzy').hide();
					$('#btsrep').show();
					/*
					var lrincian=[];
					$('#listrincian tbody tr').each(function(){
						var ljabatan = $(this).find(".ljabatan").html('');
						var ljabatanz = $(this).find(".ljabatanz").html('');
						var lgender = $(this).find(".lgender").html('');
						var lpendidikan = $(this).find(".lpendidikan").html('');
						var llokasi = $(this).find(".llokasi").html('');
						var llokasiz = $(this).find(".llokasiz").html('');
						var lwaktu = $(this).find(".lwaktu").html('');
						var latasan = $(this).find(".latasan").html('');
						var lkontrak = $(this).find(".lkontrak").html('');
						var ljumlah = $(this).find(".ljumlah").html('');
					})
					*/
				}
				else if (tejo == '1')
				{
					$('#divtre').hide();
					$('#divtnew').show();
					$('#divpropinsi').show();
					$('#divnrespa').hide();
					$('#divtpeng').show();
					$('#divnproject').show();
					$('#divnccust').show();
					$('#divsyarat').show();
					$('#divdeskripsi').show(); 
					$('#divreptrain').hide(); 
					$('#divbekerja').hide();
					$('#divlatihan').hide();
					$('#divresign').hide();
					$('#divnper').hide();
					$('#divnperganti').hide();
					$('#divtrotres').hide();
					$('#divtglgaji').show();
					$('#divspro').show();
					$('#divepro').show();
					$('#divnilpro').show();
					$('#yayay').show();
					$('#lalax').hide();
					$('#lalay').hide();
					$('#yeyey').hide();
					$('#yuyuy').show();
					$('#yzyzy').hide();
					$('#typenew').val(1);
					$('#btsrep').hide();
				}
				else
				{
					// $('#divtre').hide();
					// $('#divtnew').hide();
					// $('#divpropinsi').hide();
					// $('#divnproject').hide();
					// $('#divnccust').hide();
					// $('#divnrespa').show();
					// $('#divsyarat').show();
					// $('#divdeskripsi').show();
					// $('#btsrep').hide();
					$('#yeyey').hide();
					$('#yuyuy').hide();
					$('#yayay').hide();
					$('#yzyzy').show();
					$('#lalay').hide();
					$('#lalax').hide();
					$('#btsrep').hide();
				}
			}
		});
		
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
		
		
		$('body').on('click', '#btn_submit2', function(e){
				$('#ppoverlay').show();
				$('#ffggpp').hide();
				
				var pppersa 	= $('#pppersa').val(); 
				var pparea 		= $('#pparea').val(); 
				var ppskill 	= $('#ppskill').val(); 
				var ppjab 		= $('#ppjab').val(); 
				var pplevel 	= $('#pplevel').val();
				var ppjml 		= $('#ppjml').val();
				var ppsp 		= $('#ppsp').val();
				var ppep 		= $('#ppep').val();
				var ppnolam 	= $('#ppnolam').val();
				var pplampiran 	= $('#pplampiran').val();
				
				var fsize  = $('#pplampiran').prop('files')[0].size;
				if(fsize > 5242880) 
				{
					alert("Max size Upload File 5 MB");
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				
				if(pppersa=='')
				{
					alert('PersonalArea Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				if(pparea=='')
				{
					alert('Area Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				if(ppskill=='')
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
				if(pplevel=='')
				{
					alert('Level Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				if(ppjml=='')
				{
					alert('Jumlah Pekerja Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				if(ppsp=='')
				{
					alert('Start Project Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				if(ppep=='')
				{
					alert('End Project Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				if(ppnolam=='')
				{
					alert('No Lampiran Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
				if(pplampiran=='')
				{
					alert('Lampiran Harus Diisi');
					$('#ppoverlay').hide();
					$('#ffggpp').show();
					return false;
				}
					
				e.preventDefault();
				var formData = new FormData($(this).parents('form')[0]);
				
				$.ajax({
					url: '<?php echo base_url("index.php/rotasi/simpan_pp") ?>',
					//url: 'upload.php',
					type: 'POST',
					//dataType   : 'json',
					xhr: function() {
						var myXhr = $.ajaxSettings.xhr();
						return myXhr;
					},
					success: function (data) {
						$('#ppoverlay').hide();
						alert('Data Tersimpan');
						location.reload();
					},
					data: formData,
					cache: false,
					contentType: false,
					processData: false
				});
				return false;
		});
		
		
		
		$('body').on('click', '#btn_submit1', function(e){
				$('#overlay1').show();
				$('#ffgg').hide();
				
				var ncust_id 		= $('#sncust').val(); 
				var nojosk 			= $('#nojosk').val(); 
				var type_jo 		= $('#typejo').val(); 
				var nobak 			= $('#nobak').val(); 
				var nmbay 			= $('#nmbay').val(); 
				//var sare	 		= $('#sare').val();
				//var uraian_sare		= $('#sare :selected').text();
				//var spa 			= $("#spa").select2('data')[0]['id'];
				//var uraian_spa 		= $("#spa").select2('data')[0]['text'];
				var spa 			= $('#spa :selected').text();
				//var uraian_spa		= $('#spa :selected').text();
				var komponen1 		= $('#komponen1').val();
				var komponen2 		= $('#komponen2').val(); 
				var komponen3 		= $('#komponen3').val(); 
				$('#choosen option').prop('selected', true);
				// alert(type_jo);
				
				var fsize  = $('#komponen1').prop('files')[0].size;
				var fsize2  = $('#komponen2').prop('files')[0].size;
				//var fsize3  = $('#komponen3').prop('files')[0].size;
				//alert(fsize);alert(fsize2);
				
				if( (fsize > 5242880) || (fsize2 > 5242880) )
				{
					alert("Max size Upload File 5 MB");
					$('#overlay1').hide();
					$('#ffgg').show();
					return false;
				}
				
				/*
				var fsize2  = $('input[name=komp]').prop('files')[0].size;
				if(fsize2 > 5242880)
				{
					alert("Max size Upload File 5 MB");
					return false;
				}
				*/
				if (ncust_id == "" )
				{
					alert('Nama Client harus dipilih');
					$('#overlay1').hide();$('#ffgg').show();
					$('#sdivnccust').attr('class','form-group has-error'); return false;} else if (ncust_id != ""){$('#sdivnccust').attr('class','form-group')
				}
				
				if(spa=='')
				{
					alert('PersonalArea Harus Diisi');
					$('#overlay1').hide();
					$('#ffgg').show();
					return false;
				}
				else if(nmbay=='')
				{
					if(type_jo==5){
						alert('Nama Pembayaran Harus Diisi');
						$('#overlay1').hide();
						$('#ffgg').show();
						return false;
					}
				}
				else if(nobak=='')
				{
					alert('No BAK Harus Diisi');
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
					
				e.preventDefault();
				var formData = new FormData($(this).parents('form')[0]);
						
				if(type_jo==3){
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
								//alert(data);
								$('#overlay1').hide();
								alert('Data Tersimpan');
								location.reload();
								/*
								var url = "<?php echo base_url(); ?>index.php/home/rincian_simpanx/";
								var	type 		= "POST";
								var mimeType    = "multipart/form-data";
								arrjoborder = [komponen1, komponen2, komponen3, nojosk, vna];
								$.post(url, {joborder:arrjoborder}, function(resp){
									$('#overlay1').hide();
									//alert('Data Tersimpan');
									alert (resp);
									//custom_alert(resp);
									location.reload();
								});
								*/
							//}
						},
						data: formData,
						cache: false,
						contentType: false,
						processData: false
					});
					return false;
				}
				else if(type_jo==5)
				{
					//alert('B');
					e.preventDefault();
					var formData = new FormData($(this).parents('form')[0]);
					
					$.ajax({
						url: '<?php echo base_url("index.php/home/urincian_simpanxxx") ?>',
						//url: 'upload.php',
						type: 'POST',
						//dataType   : 'json',
						xhr: function() {
							var myXhr = $.ajaxSettings.xhr();
							return myXhr;
						},
						success: function (data) {
							$('#overlay1').hide();
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
		
		
		
		
		$('body').on('click', '#btn_simpan', function(e){
				$('#overlay').show();
				//$('#ggff').hide();
				var nojok 			= $('#nojok').val(); 
				var typere 			= $('#typere').val();  
				//var type_jo 		= "New";
				var type_jo 		= $('#typejo').val(); 
				var tnew 			= $('#typenew').val(); 
				var tpeng 			= $('#typepeng').val(); 
				var xtype_jo 		= $('#typejo :selected').text();
				var tanggal 		= $('#tanggal').val();
				var jeniscapt 		= $('#jeniscapt').val();
				var ncust_id 		= $('#ncust').val(); 
				var ncust_name 		= $('#ncust :selected').text();
				var tperal 			= $('#tperal:checked').val();

				
				if( (type_jo == '2') || (type_jo == '4') ){
					var project			= $('#respa :selected').val();
				}
				else if(type_jo == '1')
				{
					if(tnew == '1')
					{
						var project 		= $('#project').val();
					}
					else
					{
						var project			= $('#respa :selected').val();
					}
					
				}
				
				var respa 			= $('#respa :selected').text();
				var rincian 		= $('#rincian').val();
				var syarat 			= $('#syarat').val(); 
				var deskripsi 		= $('#deskripsi').val(); 
				var atasan 			= $('#atasan').val();
				var waktu 			= $('#waktu').val(); 
				var lama 			= $('#lama').val(); 
				var latihan 		= $('#latihan').val();
				var bekerja 		= $('#bekerja').val(); 
				var lokasi 			= $('#lokasi').val(); 
				var komponen4 		= $('#komponen4').val();
				var komponen5 		= $('#komponen5').val();
				var komponen6 		= $('#komponen6').val();
				var jenisproject 	= $('#jenisproject').val();
				var xnobak 			= $('#xnobak').val();
				var tglgaji			= $('#tglgaji').val();
				var sproject		= $('#sproject').val();
				var eproject		= $('#eproject').val();
				var nilpro			= $('#nilpro').val();

				if (komponen5 == "" )
				{
					alert('Anda harus menyertakan Lampiran Dokumen BAK'); 
					$('#overlay').hide();
					$('#ggff').show();
					$('#group_att4').attr('class','form-group has-error'); return false;} else if (komponen5 != ""){$('#group_att4').attr('class','form-group')
				}
				
				//var fsize  = $('#komponen4').prop('files')[0].size;
				var fsize2  = $('#komponen5').prop('files')[0].size;
				//var fsize3  = $('#komponen6').prop('files')[0].size;
				 
				//alert(fsize);
				
				if ($("#tperal:checked").length == 0){
					alert("Type JO harus dipilih, TerimaKasih."); 
					$('#overlay').hide(); $('#ggff').show(); return false;
				}
				
       
				if( (fsize2 > 5242880) )
				{
					alert("Max size Upload File 5 MB");
					$('#overlay').hide();
					$('#ggff').show();
					return false;
				}
				
				// if (type_jo == '2'){
					// if(typere == "" )
					// {
						// alert('Type Replacement tidak boleh kosong');
						// $('#overlay').hide();
						// $('#ggff').show();
						// $('#divtre').attr('class','form-group has-error'); return false;} else if (typere != ""){$('#divtre').attr('class','form-group')
					// }
				// }
				
				if(xnobak == "" )
				{
					alert('No BAK tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divnobak').attr('class','form-group has-error'); return false;} else if (xnobak != ""){$('#divnobak').attr('class','form-group')
				}
				
				if(tanggal == "" )
				{
					alert('Tanggal tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divtanggal').attr('class','form-group has-error'); return false;} else if (tanggal != ""){$('#divtanggal').attr('class','form-group')
				}
			
				if (jenisproject == "" )
				{
					alert('Jenis Project tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divproject').attr('class','form-group has-error'); return false;} else if (jenisproject != ""){$('#divproject').attr('class','form-group')
				}
			
				
				/*
				if( (type_jo == '2') || (type_jo == '4') ){
					if (respa == "" )
					{
						alert('PersonalArea tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divnrespa').attr('class','form-group has-error'); return false;} else if (respa != ""){$('#divnrespa').attr('class','form-group')
					}
				}
				else
				*/
				if (type_jo == '1')
				{
					if (syarat == "" )
					{
						alert('Persyaratan khusus tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divsyarat').attr('class','form-group has-error'); return false;} else if (syarat != ""){$('#divsyarat').attr('class','form-group')
					}
					
					if (deskripsi == "" )
					{
						alert('Deskripsi tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divdeskripsi').attr('class','form-group has-error'); return false;} else if (deskripsi != ""){$('#divdeskripsi').attr('class','form-group')
					}
				
					if (sproject == "" )
					{
						alert('Start Project tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divspro').attr('class','form-group has-error'); return false;} else if (sproject != ""){$('#divspro').attr('class','form-group')
					}
				
					if (eproject == "" )
					{
						alert('End Project tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divepro').attr('class','form-group has-error'); return false;} else if (eproject != ""){$('#divepro').attr('class','form-group')
					}
				
					if (nilpro == "" )
					{
						alert('Nilai Project tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divnilpro').attr('class','form-group has-error'); return false;} else if (nilpro != ""){$('#divnilpro').attr('class','form-group')
					}
					
					if(tnew == '1')
					{
							if (project == "" )
							{
								alert('Nama Project tidak boleh kosong');
								$('#overlay').hide();
								$('#ggff').show();
								$('#divnproject').attr('class','form-group has-error'); return false;} else if (project != ""){$('#divnproject').attr('class','form-group')
							}
					}
					else
					{
							if (respa == "" )
							{
								alert('PersonalArea tidak boleh kosong');
								$('#overlay').hide();
								$('#ggff').show();
								$('#divnrespa').attr('class','form-group has-error'); return false;} else if (respa != ""){$('#divnrespa').attr('class','form-group')
							}
					}
				}
				
				
				
				if (lama == "" )
				{
					alert('Lama Project tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divlama').attr('class','form-group has-error'); return false;} else if (lama != ""){$('#divlama').attr('class','form-group')
				}
				
				
				if (ncust_id == "" )
				{
					alert('Nama Client harus dipilih');
					$('#overlay').hide();$('#ggff').show();
					$('#divnccust').attr('class','form-group has-error'); return false;} else if (ncust_id != ""){$('#divnccust').attr('class','form-group')
				}
			
				if (jeniscapt == "" )
				{
					alert('Jenis Captive harus dipilih');
					$('#overlay').hide();$('#ggff').show();
					$('#divcapt').attr('class','form-group has-error'); return false;} else if (jeniscapt != ""){$('#divcapt').attr('class','form-group')
				}
				
				/*if (komponen4 == "" )
				{
					alert('Anda harus menyertakan dokumen skema');
					$('#overlay').hide();
					$('#ggff').show();
					$('#group_att3').attr('class','form-group has-error'); return false;} else if (komponen4 != ""){$('#group_att3').attr('class','form-group')
				}*/
					
				
				var lrincian=[];
				$('#listrincian tbody tr').each(function(){
					var n_ljabatan = $(this).find(".ljabatan").html();
					var ljabatan = $(this).find(".ljabatanz").html();
					var lgender = $(this).find(".lgender").html();
					var lpendidikan = $(this).find(".lpendidikan").html();
					var llokasi = $(this).find(".llokasiz").html(); llokasi
					var n_llokasi = $(this).find(".llokasi").html();
					var lwaktu = $(this).find(".lwaktu").html();
					var latasan = $(this).find(".latasan").html();
					var lkontrak = $(this).find(".lkontrak").html();
					var ljumlah = $(this).find(".ljumlah").html();
					var lskema_text = $(this).find(".lskema_text").html();
					var lskema = $(this).find(".lskema").html();
					var lskillx_text = $(this).find(".lskillx_text").html();
					var lskillx = $(this).find(".lskillx").html();
					var kump = $(this).find(".kump").html();
					var tot = $(this).find(".tot").html();
					var kidx = $(this).find(".kidx").html();
					var lktrain_text = $(this).find(".lktrain_text").html();
					var lktrain = $(this).find(".lktrain").html();
					var lktrain = $(this).find(".lktrain").html();
					var lpnorek = $(this).find(".lpnorek").html();
					var typeng = $(this).find(".typeng").html();
					var nbekerja = $(this).find(".nbekerja").html();
					var nlatihan = $(this).find(".nlatihan").html();
					var ljskema = $(this).find(".ljskema").html();
					var lreasonrot = $(this).find(".lreasonrot").html();
					lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskema_text, lskillx, lskillx_text, n_ljabatan, n_llokasi, kump, tot, kidx, lktrain, nlatihan, nbekerja, typeng, lpnorek, ljskema, lreasonrot];
					//lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskillx];
					lrincian += ',';
				})
				
				
				var lkomponen=[];
				$('#listkomponen tbody tr').each(function(){
					var kjabatan = $(this).find(".kjabatan").html();
					var kkodejab = $(this).find(".kkodejab").html();
					var klokasi = $(this).find(".klokasi").html();
					var kkodelok = $(this).find(".kkodelok").html();
					var kkomponen = $(this).find(".kkomponen").html();
					var kkodekomponen = $(this).find(".kkodekomponen").html();
					var kvalue = $(this).find(".kvalue").html();
					var kket = $(this).find(".kket").html();
					//var klevel = $(this).find(".klevel").html();
					//var kkodelevel = $(this).find(".kkodelevel").html();
					var khk = $(this).find(".khk").html();
					var kump = $(this).find(".kump").html();
					var kper = $(this).find(".kper").html();
					var lskema_text = $(this).find(".lskema_text").html();
					var lskema = $(this).find(".lskema").html();
					var lskillx_text = $(this).find(".lskillx_text").html();
					var lskillx = $(this).find(".lskillx").html();
					var kidx = $(this).find(".kidx").html();
					//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
					lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, khk, kump, kper, lskema, lskema_text, lskillx, lskillx_text, kidx];
					lkomponen += ',';
				});	
				
				if (lkomponen == "" ) {
					var lkomponenx =  "X";
				}
				else {
					var lkomponen=[];
					$('#listkomponen tbody tr').each(function(){
						var kjabatan = $(this).find(".kjabatan").html();
						var kkodejab = $(this).find(".kkodejab").html();
						var klokasi = $(this).find(".klokasi").html();
						var kkodelok = $(this).find(".kkodelok").html();
						var kkomponen = $(this).find(".kkomponen").html();
						var kkodekomponen = $(this).find(".kkodekomponen").html();
						var kvalue = $(this).find(".kvalue").html();
						var kket = $(this).find(".kket").html();
						//var klevel = $(this).find(".klevel").html();
						//var kkodelevel = $(this).find(".kkodelevel").html();
						var khk = $(this).find(".khk").html();
						var kump = $(this).find(".kump").html();
						var kper = $(this).find(".kper").html();
						var lskema_text = $(this).find(".lskema_text").html();
						var lskema = $(this).find(".lskema").html();
						var lskillx_text = $(this).find(".lskillx_text").html();
						var lskillx = $(this).find(".lskillx").html();
						var kidx = $(this).find(".kidx").html();
						//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
						lkomponenx += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, khk, kump, kper, lskema, lskema_text, lskillx, lskillx_text, kidx];
						lkomponenx += ',';
					});	
				}

				
				var lperner=[];
				$('#listperner tbody tr').each(function(){
					var ntres = $(this).find(".ntres").html();
					var ntrr = $(this).find(".ntrr").html();
					var nperner = $(this).find(".nperner").html();
					var nnama = $(this).find(".nnama").html();
					var nnamax = nnama.replace(',','.');
					var narea = $(this).find(".narea").html();
					var npersa = $(this).find(".npersa").html();
					var nskill = $(this).find(".nskill").html();
					var kjabatan = $(this).find(".kjabatan").html();
					var njabatan = $(this).find(".njabatan").html();
					var nlevel = $(this).find(".nlevel").html();
					var karea = $(this).find(".karea").html();
					var kpersa = $(this).find(".kpersa").html();
					var kskill = $(this).find(".kskill").html();
					var klevel = $(this).find(".klevel").html();
					var kkrep_train = $(this).find(".kkrep_train").html();
					var krr = $(this).find(".krr").html();
					var mntrrxy = $(this).find(".mntrrxy").html();
					var npernergn = $(this).find(".npernergn").html();
					var ntlatihan = $(this).find(".ntlatihan").html();
					var ntbekerja = $(this).find(".ntbekerja").html();
					var kabkrs = $(this).find(".kabkrs").html();
					var nalasan = $(this).find(".nalasan").html();
					var kansvh = $(this).find(".kansvh").html();
					var kcttyp = $(this).find(".kcttyp").html();
					var ktrfgb = $(this).find(".ktrfgb").html();
					var kmassn = $(this).find(".kmassn").html();
					//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
					lperner += [nperner, nnamax, narea, npersa, nskill, njabatan, nlevel, karea, kpersa, kskill, klevel, ntres, kkrep_train, ntrr, krr, mntrrxy, npernergn, ntlatihan, ntbekerja, kjabatan, kabkrs, nalasan, kansvh, kcttyp, ktrfgb, kmassn];
					lperner += ',';
				});
				
				
				var lpernergan=[];
				$('#listpernerganti tbody tr').each(function(){
					var npernergx = $(this).find(".npernergx").html();
					var npernergy = $(this).find(".npernergy").html();
					var nnamagy = $(this).find(".nnamagy").html();
					var nnamagyx = nnamagy.replace(',','.');
					var nareagy = $(this).find(".nareagy").html();
					var npersagy = $(this).find(".npersagy").html();
					var nskillgy = $(this).find(".nskillgy").html();
					var njabatangy = $(this).find(".njabatangy").html();
					var nlevelgy = $(this).find(".nlevelgy").html();
					var kareagy = $(this).find(".kareagy").html();
					var kpersagy = $(this).find(".kpersagy").html();
					var kskillgy = $(this).find(".kskillgy").html();
					var klevelgy = $(this).find(".klevelgy").html();
					var kgalasan = $(this).find(".kgalasan").html();
					var kgcttyp = $(this).find(".kgcttyp").html();
					var kgansvh = $(this).find(".kgansvh").html();
					var kgtrfgb = $(this).find(".kgtrfgb").html();
					var kgarber = $(this).find(".kgarber").html();
					lpernergan += [npernergx, npernergy, nnamagyx, nareagy, npersagy, nskillgy, njabatangy, nlevelgy, kareagy, kpersagy, kskillgy, klevelgy, kgalasan, kgcttyp, kgansvh, kgarber, kgtrfgb];
					lpernergan += ',';
				});
				
				
				var lproc=[];
				$('#listproc tbody tr').each(function(){
					var litem = $(this).find(".litem").html();
					var lqty = $(this).find(".lqty").html();
					var lspec = $(this).find(".lspec").html();
					var lbudget = $(this).find(".lbudget").html();
					var litemz = $(this).find(".litemz").html();
					var lperiode = $(this).find(".lperiode").html();
					var ltgl1 = $(this).find(".ltgl1").html();
					var ltgl2 = $(this).find(".ltgl2").html();
					//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
					lproc += [litem, lqty, lspec, lbudget, litemz, lperiode, ltgl1, ltgl2];
					lproc += ',';
				});
				
				if (lproc == "" ) {
					var lproczx =  "X";
				}
				else {
					var lproczx=[];
					$('#listproc tbody tr').each(function(){
						var litem = $(this).find(".litem").html();
						var lqty = $(this).find(".lqty").html();
						var lspec = $(this).find(".lspec").html();
						var lbudget = $(this).find(".lbudget").html();
						var litemz = $(this).find(".litemz").html();
						var lperiode = $(this).find(".lperiode").html();
						var ltgl1 = $(this).find(".ltgl1").html();
						var ltgl2 = $(this).find(".ltgl2").html();
						//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
						lproczx += [litem, lqty, lspec, lbudget, litemz, lperiode, ltgl1, ltgl2];
						lproczx += ',';
					});
				}
				
				//console.log(lproc); 
				
				var vkumdoc = [];
				$('#kumdoc:checked').each(function(i){
				  vkumdoc[i] = $(this).val();
				});
				var vkumdocx 		= vkumdoc.join(';');
				
				if( (type_jo == '1') && (typenew == '1') ){
					if(vkumdocx==''){
						$('#overlay').hide();
						$('#ggff').show();
						alert('Anda harus menyertakan lampiran pada DOC CHECKLIST..');
						return false; 
					}
				}
				
				//console.log(vkumdocx); 
				
				if(type_jo==1){
					if (lrincian == "" )
					{
						$('#overlay').hide();
						$('#ggff').show();
						alert('Anda harus menambahkan rincian');
						return false; 
					}
				}
				else if(type_jo==2) {
					if (lperner == "" )
					{
						$('#overlay').hide();
						$('#ggff').show(); 
						alert('Anda harus menambahkan Perner');
						return false;
					}  
				}

				
				e.preventDefault();
				var formData = new FormData($(this).parents('form')[0]); 

				$.ajax({
					url: '<?php echo base_url("index.php/home/urincian_simpan") ?>',
					//url: 'upload.php',
					type: 'POST',
					//dataType   : 'json',
					xhr: function() {
						var myXhr = $.ajaxSettings.xhr();
						return myXhr;   
					},
					success: function (data) {   
							// alert(data);
							if(type_jo==2){
								// alert('under maintenance..');
								var url = "<?php echo base_url(); ?>index.php/rotasi/perner_simpan/";
								var	type 		= "POST";
								var mimeType    = "multipart/form-data";
								arrjoborder = [tanggal, lama, '', '', komponen4, komponen5, komponen6, type_jo, jenisproject, xtype_jo, typere, xnobak, lperner, jeniscapt, tperal, ncust_id, ncust_name, lpernergan];
								$.post(url, {joborder:arrjoborder}, function(resp){
									$('#overlay').hide();
									alert('Data Tersimpan');
									location.reload();
								});
							} else {
								var url = "<?php echo base_url(); ?>index.php/rotasi/rincian_simpan/";
								var	type 		= "POST";
								var mimeType    = "multipart/form-data";
								var sapi = vkumdocx; 
								arrjoborder = [tanggal, project, syarat, deskripsi, lama, '', '', komponen4, komponen5, komponen6, type_jo, jenisproject, lrincian, xtype_jo, typere, respa, tnew, lkomponenx, xnobak, lproczx, vkumdocx, tglgaji, tpeng, ncust_id, ncust_name, jeniscapt, tperal, sproject, eproject, nilpro];
								$.post(url, {joborder:arrjoborder,sapi:sapi}, function(resp){
									$('#overlay').hide();
									//alert(resp);
									alert('Data Tersimpan');
									location.reload();
								});
							}
							
							
					},
					// error: function(e) {
						// alert('Error' + e);
					// },
					data: formData,
					cache: false,
					contentType: false,
					processData: false
				});
				return false;
				
		});
			
		
		/*
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
			var komponen4 		= $('#komponen4').val();
			var komponen5 		= $('#komponen5').val();
			var komponen6 		= $('#komponen6').val();
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
			
			if (komponen4 == "" )
			{
				alert('Anda harus menyertakan dokumen pendukung');
				$('#overlay').hide();
				$('#btn_submit').show();
				$('#group_att3').attr('class','form-group has-error'); return false;} else if (komponen4 != ""){$('#group_att3').attr('class','form-group')
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
			
		});
		*/
		
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

		/*$("#kompx").change(function(){
			var komp = $('#kompx').val();
			//alert(komp);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {data:komp}, function(response){
				$("#ketx").html(response);
			})
		})

		$("#kompx2").change(function(){
			var komp = $('#kompx').val();
			//alert(komp);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {data:komp}, function(response){
				$("#ketx").html(response);
			})
		})*/
		
		
		$("#typepeng").change(function(){
			var tanggal 	= new Date($("#tanggal").val());
			var bekerja 	= new Date($("#bekerja_n").val());
			var latihan 	= new Date($("#latihan_n").val());
			var typepeng	= $('#typepeng').val();
			var tperal 		= $('#tperal:checked').val();
			// if(tperal=='INF'){
				// if(typepeng==2){
					// $('#divpnorek').hide();
				// } else {
					// $('#divpnorek').show();
				// }
			// }
			
			if(typepeng==3){
				$('#divpnorek').show();
				$('#divalasanrot').show();
			} else {
				$('#divpnorek').hide();
				$('#divalasanrot').hide();
			}
			
			if(typepeng==2){
				$("#bekerja_n").val('<?php echo $tgbekerja; ?>');
				if (tanggal > latihan){
					alert ('Tanggal Latihan harus sesudah Tanggal Sekarang');
					$("#latihan_n").val($("#tanggal").val());
					// return false;
				}
				if (tanggal > bekerja){
					alert ('Tanggal Bekerja harus 14 HK dari tanggal sekarang, TerimaKasih');
					// $("#bekerja").val($("#tanggal").val());
					$("#bekerja_n").val('<?php echo $tgbekerja; ?>');
					// return false;
				}
			}
		});
		
		$("#typere").change(function(){
			var typere		= $('#typere').val();
			if(typere=='3'){
				document.getElementById("ypernery").disabled = false;
				document.getElementById("alasan_ganti").disabled = false;
			} else {
				document.getElementById("ypernery").disabled = true;
				document.getElementById("alasan_ganti").disabled = true;
				$("#ypernery").select2("val", "");
			}
			
			var tanggal 	= new Date($("#tanggal").val());
			var bekerja 	= new Date($("#bekerja").val());
			var latihan 	= new Date($("#latihan").val());
			var typere		= $('#typere').val();
			var tperal 		= $('#tperal:checked').val();
			// if(tperal=='INF'){
				// if(typere==2){
					// $('#divpnorek').hide();
				// } else {
					// $('#divpnorek').show();
				// }
			// }
			
			if(typere==2){
				$("#bekerja").val('<?php echo $tgbekerja_rep; ?>');
				if (tanggal > latihan){
					alert ('Tanggal Latihan harus sesudah Tanggal Sekarang');
					$("#latihan").val($("#tanggal").val());
					// return false;
				}
				if (tanggal > bekerja){
					// alert ('Tanggal Bekerja harus sesudah Tanggal Penerimaan');
					alert ('Tanggal Bekerja harus 5 HK dari tanggal sekarang, TerimaKasih');
					$("#bekerja").val('<?php echo $tgbekerja_rep; ?>');
					// return false;
				}
			}
		});
		

		$("#latihan_n").change(function(){
			var tanggal	 	= new Date($("#tanggal").val());
			var latihan 	= new Date($("#latihan_n").val());
			var tyjo 		= $('#typejo').val();
			var typepeng	= $('#typepeng').val();
			var typere		= $('#typere').val();
			if(tyjo==1){
				if(typepeng==2){
					if (tanggal > latihan){
						alert ('Tanggal Latihan harus sesudah Tanggal Sekarang');
						$("#latihan_n").val($("#tanggal").val());
						return false;
					}
				}
			}
		});
		
		
		$("#bekerja_n").change(function(){
			var tanggal = new Date($("#tanggal").val());
			var bekerja = new Date($("#bekerja_n").val());
			var bekerjax = new Date('<?php echo $tgbekerja; ?>');
			var tyjo 		= $('#typejo').val();
			var typepeng	= $('#typepeng').val();
			if(typepeng==2){
				if ( (bekerjax < bekerja) || (bekerjax > bekerja) ){
					alert ('Tanggal Bekerja harus 14 HK dari tanggal sekarang, TerimaKasih');
					$("#bekerja_n").val('<?php echo $tgbekerja; ?>');
					return false;
				}
			}
		});
		
		
		$("#latihan").change(function(){
			var tanggal	 	= new Date($("#tanggal").val());
			var latihan 	= new Date($("#latihan").val());
			var tyjo 		= $('#typejo').val();
			var typepeng	= $('#typepeng').val();
			var typere		= $('#typere').val();
			if(tyjo==2){
				if(typere==2){
					if (tanggal > latihan){
						alert ('Tanggal Latihan harus sesudah Tanggal Sekarang');
						$("#latihan").val($("#tanggal").val());
						return false;
					}
				}
			}
		});
		
		
		$("#bekerja").change(function(){
			var tanggal = new Date($("#tanggal").val());
			var bekerja = new Date($("#bekerja").val());
			var bekerjay = new Date('<?php echo $tgbekerja_rep; ?>');
			var tyjo 		= $('#typejo').val();
			var typere		= $('#typere').val();
			if(tyjo==2){
				if(typere==2){
					if ( (bekerjay < bekerja) || (bekerjay > bekerja) ){
						alert ('Tanggal Bekerja harus 5 HK dari tanggal sekarang, TerimaKasih');
						$("#bekerja").val('<?php echo $tgbekerja_rep; ?>');
						return false;
					}
				}
			}
		});
		
		$('#tmbhrincian').click(function(){
			$("#lskillx").select2("val", "");
			$("#tkomp").find("tr:gt(1)").remove();
			$("#tkomp_var").find("tr:gt(1)").remove();
			//$("#tkomp_ben").find("tr:gt(7)").remove();
			$("#valuex1").val('');
			$("#vvaluex1").val('');
			$("#bvaluex1").val('');
			$("#kompx1").val('');
			$("#vkompx1").val('');
			$("#bkompx1").val('');
			$("#ketx1").val('');
			$("#vketx1").val('');
			$("#bketx1").val('');
			$("#pnorek").val('');
			$('#divpnorek').hide();
			$('#divalasanrot').hide();
			document.getElementById("haha").reset();
			var tejo 		= $("#typejo").val(); 
			var tnew 		= $("#typenew").val();
			var typere 		= $('#typere').val();  		
			var respa 		= $('#respa :selected').text();	
			
			if (tejo == '2'){
				if(typere == "" )
				{
					alert('Type Replacement tidak boleh kosong');
					$('#divtre').attr('class','form-group has-error'); return false;} else if (typere != ""){$('#divtre').attr('class','form-group')
				}
			}
			
			if (tejo == '1')
			{
				if(tnew == '2')
				{
						if (respa == "" )
						{
							alert('PersonalArea tidak boleh kosong');
							$('#divnrespa').attr('class','form-group has-error'); return false;} else if (respa != ""){$('#divnrespa').attr('class','form-group')
						}
				}
			}
		
			
			if( (tejo == '2') || (tejo == '4') ){
				var group 	= $('#respa :selected').val();
				var url 	= "<?php echo base_url(); ?>index.php/home/pilih_area";
				$.post(url, {data:group}, function(response){
					$("#lokasi").html(response);
				});
			}
			else if (tejo == '1'){ 
				if (tnew == '1')
				{
					var province = $('#province').val();
					var url = "<?php echo base_url(); ?>index.php/home/pilih_lokasi";
					$.post(url, {data:province}, function(response){
						$("#lokasi").html(response);
					})
				}
				else
				{
					$('#Aoverlayz').show();
					var group 	= $('#respa :selected').val();
					var url 	= "<?php echo base_url(); ?>index.php/home/pilih_area2";
					// var url 	= "<?php echo base_url(); ?>index.php/home/pilih_area";
					$.post(url, {data:group}, function(response){
						$('#Aoverlayz').hide();
						$("#lokasi").html(response);
					});
				}
			}
			else
			{
				var province = $('#province').val();
				var url = "<?php echo base_url(); ?>index.php/home/pilih_lokasi";
				$.post(url, {data:province}, function(response){
					$("#lokasi").html(response);
				})
			}
			
			var jmlrow = document.getElementById('listrincian').getElementsByTagName("tr").length;
			$("#xmid").val(jmlrow); 
		});
		
		/*
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
			
			//var url = "<?php echo base_url(); ?>index.php/home/rincian_save/";
			//arrrincian = [nojo,uraian, var_qty, pendidikan, lokasi, waktu, var_nominal, var_total, var_tujuan];
			//$.post(url, {xrincian:arrrincian}, function(resp){
				//alert('rincian berhasil di tambahkan');
			//});
			
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
		*/
		
		$('#addproc').click(function(){
			var item 	= $('#item :selected').text();
			var itemz 	= $('#item').val();
			var qty		= $('#qty').val();
			var spec 	= $('#spec').val();
			var budget 	= $('#budget').val();
			var periode = $('#periode').val();
			var tgl1	= $('#tgl1').val();
			var tgl2	= $('#tgl2').val();
			
			if (itemz == "" )
			{
				alert('Item tidak boleh kosong');
				$('#divitem').attr('class','form-group has-error'); return false;} else if (itemz != ""){$('#divitem').attr('class','form-group')
			}
			
			if (qty == "" )
			{
				alert('qty tidak boleh kosong');
				$('#divqty').attr('class','form-group has-error'); return false;} else if (qty != ""){$('#divqty').attr('class','form-group')
			}
			
			if (spec == "" )
			{
				alert('Spec tidak boleh kosong');
				$('#divspec').attr('class','form-group has-error'); return false;} else if (spec != ""){$('#divspec').attr('class','form-group')
			}
			
			if (budget == "" )
			{
				alert('Budget tidak boleh kosong');
				$('#divbudget').attr('class','form-group has-error'); return false;} else if (budget != ""){$('#divbudget').attr('class','form-group')
			}
			
			
			$('#listproc > tbody:last-child').append('<tr><td class=lperiode>'+ periode +'</td><td class=litem>'+ item +'</td><td class=lqty>'+ qty +'</td><td class=lspec>'+ spec +'</td><td class=lbudget>'+ budget +'</td><td class=ltgl1>'+ tgl1 +'</td><td class=ltgl2>'+ tgl2 +'</td><td><button type=button class="btn btn-primary btn-block btn-xs btnedit_proc" data-toggle=modal data-target=#EPRmyModal>Edit</button></td><td class=litemz style=display:none>'+ itemz +'</td></tr>');
			
			$(".btnedit_proc").click(function(){
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var litemz	 	= $row.find(".litemz").text();
				var litem		= $row.find(".litem").text();
				var lqty		= $row.find(".lqty").text();
				var lspec		= $row.find(".lspec").text();
				var lbudget		= $row.find(".lbudget").text();
				
				$("#eitem").val(litemz);
				$("#eqty").val(lqty);
				$("#espec").val(lspec);
				$("#ebudget").val(lbudget);
				/*
				$('#editproc').click(function(){
					var item 	= $('#eitem :selected').text();
					var itemz 	= $('#eitem').val();
					var qty		= $('#eqty').val();
					var spec 	= $('#espec').val();
					var budget 	= $('#ebudget').val();
					
					if (itemz == "" )
					{
						alert('Item tidak boleh kosong');
						$('#edivitem').attr('class','form-group has-error'); return false;} else if (itemz != ""){$('#edivitem').attr('class','form-group')
					}
					
					if (qty == "" )
					{
						alert('qty tidak boleh kosong');
						$('#edivqty').attr('class','form-group has-error'); return false;} else if (qty != ""){$('#edivqty').attr('class','form-group')
					}
					
					if (spec == "" )
					{
						alert('Spec tidak boleh kosong');
						$('#edivspec').attr('class','form-group has-error'); return false;} else if (spec != ""){$('#edivspec').attr('class','form-group')
					}
					
					if (budget == "" )
					{
						alert('Budget tidak boleh kosong');
						$('#edivbudget').attr('class','form-group has-error'); return false;} else if (budget != ""){$('#edivbudget').attr('class','form-group')
					}
					
					
					$('#listproc > tbody:last-child').append('<tr><td class=litem>'+ item +'</td><td class=lqty>'+ qty +'</td><td class=lspec>'+ spec +'</td><td class=lbudget>'+ budget +'</td><td><button type=button class="btn btn-primary btn-block btn-xs btnedit_proc" data-toggle=modal data-target=#EPRmyModal>Edit</button></td><td class=litemz style=display:none>'+ itemz +'</td></tr>');
				})
				*/
			});
			
			$('#item').val('');
			$('#qty').val('');
			$('#spec').val('');
			$('#budget').val('');
			$('#periode').val('1');
			$('#tgl1').val('');
			$('#tgl2').val('');
		})
		
		
		$('#dpn_cancel').click(function(){
			$('#EModal').hide();
			$("#myModal").hide();
			$("#myModal").modal("hide");
			$("#EModal").modal("hide");
		});
		
		$('#closing').click(function(){
			$('#EModal').hide();
			$("#myModal").hide();
			$("#myModal").modal("hide");
			$("#EModal").modal("hide");
		});
		
		$('#btncancel').click(function(){
			//location.reload();   myModal
			//$("#EModal").modal('toggle');
			$('#EModal').hide();
			$("#myModal").show();
			$("#myModal").modal("show");
		});
		
		
		$('#addrincian').click(function(){
			//alert('tes');
			//document.getElementById("haha").reset();
			var tejo = $("#typejo").val();
			
			var jabatan 	= $('#jabatan :selected').text();
			var jabatanz 	= $('#jabatan').val();
			var gender 		= $('#gender').val();
			var lokasi 		= $('#lokasi :selected').text();
			var lokasiz		= $('#lokasi').val();
			var pendidikan 	= $('#pendidikan :selected').text();
			var pendidikanz = $('#pendidikan').val();
			var waktu 		= $('#waktu :selected').text();
			var waktuz 		= $('#waktu').val();
			var atasan 		= $('#atasan').val();
			var kontrak 	= $('#kontrak').val();
			var jumlah 		= $('#jumlah').val();
			var lskema 		= $('#lskema').val();
			var lskillx 	= $('#lskillx').val();
			var typenew 	= $('#typenew').val();
			var xbekerja 	= $('#bekerja_n').val();
			var latihan 	= $('#latihan_n').val();
			var tgaji	 	= $('#tgaji').val();
			var pnorek	 	= $('#pnorek').val();
			var alasanrot	= $('#alasanrot').val();
			var typepeng	= $('#typepeng').val();
			var tperal 		= $('#tperal:checked').val();
			
			// console.log(tperal);

			$('#jabx').val(jabatan);
			$('#kodejabx').val(jabatanz);
			$('#lokasix').val(lokasi);
			$('#kodelokasix').val(lokasiz);
			$('#kodekont').val(kontrak);

			
			if (jabatanz == "" )
			{
				alert('Jabatan tidak boleh kosong');
				$('#divjabatan').attr('class','form-group has-error'); return false;} else if (jabatanz != ""){$('#divjabatan').attr('class','form-group')
			}
			
			if (gender == "" )
			{
				alert('Gender tidak boleh kosong');
				$('#divgender').attr('class','form-group has-error'); return false;} else if (gender != ""){$('#divgender').attr('class','form-group')
			}
			
			if (pendidikanz == "" )
			{
				alert('Pendidikan tidak boleh kosong');
				$('#divpendidikan').attr('class','form-group has-error'); return false;} else if (pendidikanz != ""){$('#divpendidikan').attr('class','form-group')
			}
			
			if (lokasiz == "" )
			{
				alert('Lokasi Kerja tidak boleh kosong');
				$('#divlokasi').attr('class','form-group has-error'); return false;} else if (lokasiz != ""){$('#divlokasi').attr('class','form-group')
			}
			
			if (waktuz == "" )
			{
				alert('Waktu kerja tidak boleh kosong');
				$('#divwaktu').attr('class','form-group has-error'); return false;} else if (waktuz != ""){$('#divwaktu').attr('class','form-group')
			}
			
			if (atasan == "" )
			{
				alert('Atasan tidak boleh kosong');
				$('#divatasan').attr('class','form-group has-error'); return false;} else if (atasan != ""){$('#divatasan').attr('class','form-group')
			}
			
			if (kontrak == "" )
			{
				alert('Jenis Kontrak tidak boleh kosong');
				$('#divkontrak').attr('class','form-group has-error'); return false;} else if (kontrak != ""){$('#divkontrak').attr('class','form-group')
			}
			
			if (jumlah == "" )
			{ 
				alert('Jumlah tidak boleh kosong');
				$('#divjumlah').attr('class','form-group has-error'); return false;} else if (jumlah != ""){$('#divjumlah').attr('class','form-group')
			}
		
			if (lskema == "" )
			{
				alert('Level tidak boleh kosong');
				$('#divlevel').attr('class','form-group has-error'); return false;} else if (lskema != ""){$('#divlevel').attr('class','form-group')
			}
		
			if (lskillx == "" )
			{
				alert('Skilllayanan tidak boleh kosong');
				$('#divskil').attr('class','form-group has-error'); return false;} else if (lskillx != ""){$('#divskil').attr('class','form-group')
			}
		
			if (xbekerja == "" )
			{
				alert('Tanggal Bekerja tidak boleh kosong');
				$('#overlay').hide();$('#ggff').show();
				$('#divbekerjan').attr('class','form-group has-error'); return false;} else if (xbekerja != ""){$('#divbekerja').attr('class','form-group')
			}
		
			if (latihan == "" )
			{
				alert('Tanggal Pelatihan tidak boleh kosong');
				$('#overlay').hide();
				$('#ggff').show();
				$('#divlatihann').attr('class','form-group has-error'); return false;} else if (latihan != ""){$('#divlatihan').attr('class','form-group')
			}
		
			if (typepeng == "3" )
			{
				if (pnorek == "" )
				{
					alert('Perner No REKRUT Harus Di Isi untuk repot, TerimaKasih');
					$('#divpnorek').attr('class','form-group has-error'); return false;} else if (pnorek != ""){$('#divpnorek').attr('class','form-group')
				}
			
				if (alasanrot == "" )
				{
					alert('Alasan Harus Di Isi untuk repot, TerimaKasih');
					$('#divalasanrot').attr('class','form-group has-error'); return false;} else if (alasanrot != ""){$('#divalasanrot').attr('class','form-group')
				}
			}
		
			if(tperal=='INF'){
				$('#divjskema').show();
			} else {
				if(typenew=='2'){
					$('#divjskema').show();
				} else {
					$('#divjskema').show();
				}
			}
			
			$('#zoverlayz').show();
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/cek_ump/');?>",
				//dataType	: "json",
				data		: {alok:lokasiz, akerja:xbekerja, atgaji:tgaji},
				success	: function(res){
					if(res==0){
						$("#EModal").hide();
						$('#myModal').show();
						$("#myModal").modal("show");
						alert('UMK pada area '+lokasi+' belum ada di SAP, silahkan koordinasi dengan tim PM'); return false;
						
					} else {
						$('#zoverlayz').hide();
						$('#umpx').val(res);
					}
				}
			});
			
			
			
			
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/cek_mandat/');?>",
				//dataType	: "json",
				data		: {kont:kontrak},
				success	: function(resx){
					$('#mandator').val(resx);
				}
			});
			
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/cek_nm_mandat/');?>",
				//dataType	: "json",
				data		: {kont:kontrak},
				success	: function(resxx){
					$('#nm_mandator').val(resxx);
				}
			});
			
			 
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/cek_fixed/');?>",
				//dataType	: "json",
				data		: {kont:kontrak},
				success	: function(resx){
					$('#fixed').val(resx);
				}
			});
			
			
			var group = $('#kontrak').val(); 
			//alert(group);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_fixed";
			$.post(url, {data:group}, function(response){
				//console.log(response);
				$(".kompx").html(response);
			});
			
			
			var group = $('#kontrak').val(); 
			//alert(group);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_variabel";
			$.post(url, {data:group}, function(response){
				//console.log(response);
				$(".vkompx").html(response);
			});
			
			
			var group = $('#kontrak').val(); 
			//alert(group);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
			$.post(url, {data:group}, function(response){
				//console.log(response);
				$(".bkompx").html(response);
			});
			
			if(kontrak!=1 && kontrak!=6){
			// if(kontrak!=1 && kontrak!=2){
				$("#pbtkp1").val('0');
				$("#pbtkp2").val('0');
				$("#pbtkp3").val('0');
				$("#pbtkp4").val('0');
				$("#jpbpjs").val('1');
			}
			else {
				$("#pbtkp1").val('9.24');
				$("#pbtkp2").val('0');
				$("#pbtkp3").val('5');
				$("#pbtkp4").val('0');
				$("#jpbpjs").val('1');
			}
			
			// if(kontrak==2){
				
			// } else {
				// $("#vbtkp1").val('');
				// $("#vbtkp2").val('');
				// $("#vbtkp3").val('');
				// $("#vbtkp4").val('');
			// }
			
			
			$("#tkomp").find("tr:gt(1)").remove();
			$("#tkomp_var").find("tr:gt(1)").remove();
			$("#tkomp_ben").find("tr:gt(11)").remove();
			$("#valuex1").val('');
			$("#vvaluex1").val('');
			$("#bvaluex1").val('');
			$("#kompx1").val('');
			$("#kompx1").select2("val", "");
			$("#vkompx1").val('');
			$("#vkompx1").select2("val", "");
			$("#bkompx1").val('');
			$("#bkompx1").select2("val", "");
			$("#ketx1").val('');
			$("#vketx1").val('');
			$("#vbtkp1").val('');
			$("#vbtkp2").val('');
			$("#vbtkp3").val('');
			$("#vbtkp4").val('');
			$("#bketx1").val('');
			$("#excelfile").val('');
			$("#exceltable").find("tr:gt(0)").remove();
			
			if(typeof document.getElementById("pbtkp1") !== 'undefined' && document.getElementById("pbtkp1") !== null) {
				document.getElementById("pbtkp1").readOnly = false;
			}
			
			if(typeof document.getElementById("pbtkp2") !== 'undefined' && document.getElementById("pbtkp2") !== null) {
				document.getElementById("pbtkp2").readOnly = false;
			}
			
			if(typeof document.getElementById("pbtkp3") !== 'undefined' && document.getElementById("pbtkp3") !== null) {
				document.getElementById("pbtkp3").readOnly = false;
			}
			
			if(typeof document.getElementById("pbtkp4") !== 'undefined' && document.getElementById("pbtkp4") !== null) {
				document.getElementById("pbtkp4").readOnly = false;
			}
			
			$('#EModal').modal({
				backdrop: 'static',
				keyboard: false
			});
			
			$('#myModal').hide();
			$("#EModal").show();
			$("#EModal").modal("show");
			
			
			
			
			//$('#listrincian > tbody:last-child').append('<tr><td class=ljabatan>'+ jabatan +'</td><td class=lgender>'+ gender +'</td><td class=lpendidikan>'+ pendidikan +'</td><td class=llokasi>'+ lokasi +'</td><td class=lwaktu>'+ waktu +'</td><td class=latasan>'+ atasan +'</td><td class=lkontrak>'+ kontrak +'</td><td class=ljumlah>'+ jumlah +'</td><td class=llokasiz style=display:none>'+ lokasiz +'</td><td class=ljabatanz style=display:none>'+ jabatanz +'</td></tr>');
			
			//var url = "<?php echo base_url(); ?>index.php/home/rincian_save/";
			//arrrincian = [nojo,jabatan, gender, pendidikan, lokasi, waktu, atasan, kontrak, jumlah];
			//$.post(url, {xrincian:arrrincian}, function(resp){
			//	alert('rincian berhasil di tambahkan');
			//});
			
			// $('#kategori').val('');
			// $('#jabatan').val('');
			// $('#gender').val('');
			// $('#province').val('');
			// $('#lokasi').val('');
			// $('#pendidikan').val('');
			// $('#waktu').val('');
			// $('#atasan').val('');
			// $('#kontrak').val('');
			// $('#jumlah').val('');
			
			
		});

		$('#addkomponen').click(function(){
			
			var tejo = $("#typejo").val();
			var xmid = $("#xmid").val();
			
			var pnorek		= $('#pnorek').val();
			var alasanrot	= $('#alasanrot').val();
			var kjabatan	= $('#jabx').val();
			var kkodejab 	= $('#kodejabx').val();
			var klokasi		= $('#lokasix').val();
			var kkodelok 	= $('#kodelokasix').val();
			
			var typepeng 	= $('#typepeng').val();
			var ntypepeng 	= $('#typepeng :selected').text();

			var klevel 		= $('#levelx :selected').text();
			var kkodelevel 	= $('#levelx').val();
			var khk 		= $('#hkpembagix').val();
			var kump 		= $('#umpx').val();
			var jskema 		= $('#jskema').val();
			var kodekont 	= $("#kodekont").val();
			var tperal 		= $('#tperal:checked').val();
			
			var arr = document.getElementsByName('valuex');
			var tot=0;
			for(var i=0;i<arr.length;i++){
				//if(parseFloat(arr[i].value))
					//tot += parseFloat(arr[i].value);
				if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}
			
			if(tperal=='INF'){
				if(jskema==1){
					if(tot < kump){
						alert('Total Fixed harus sama atau lebih dari UMP');
						return false;
					}
				}
			} else {
				if(kodekont==1){
					if(jskema==1){
						if(tot < kump){
							alert('Total Fixed harus sama atau lebih dari UMP');
							return false;
						}
					}
				}
			}
			
			
			if (khk == "" )
			{
				alert('HK pembagi harus diisi');
				$('#divhkx').attr('class','form-group has-error'); return false;} else if (khk != ""){$('#divhkx').attr('class','form-group')
			}
		
			var bekerja 	= $('#bekerja_n').val();
			var latihan 	= $('#latihan_n').val();
			
			var jabatan 	= $('#jabatan :selected').text();
			var jabatanz 	= $('#jabatan').val();
			var gender 		= $('#gender').val();
			var lokasi 		= $('#lokasi :selected').text();
			var lokasiz		= $('#lokasi').val();
			var pendidikan 	= $('#pendidikan :selected').text();
			var pendidikanz = $('#pendidikan').val();
			var waktu 		= $('#waktu :selected').text();
			var waktuz 		= $('#waktu').val();
			var atasan 		= $('#atasan').val();
			var kontrak 	= $('#kontrak').val();
			var n_kontrak	= $('#kontrak :selected').text();
			var jumlah 		= $('#jumlah').val();
			var lskema	 	= $('#lskema').val();
			var lskema_text	= $('#lskema :selected').text();
			var lskillx	 	= $('#lskillx').val();
			var lskillx_text= $('#lskillx :selected').text();
			var mandator	= $('#mandator').val();
			var fixed		= $('#fixed').val();
			
			
			var vkumtrain = [];
			var vkumtraint = [];
			$('#kumtrain:checked').each(function(i){
			  vkumtrain[i] = $(this).val();
			  if($(this).val()==1){vkumtraint[i]='Softskill';}else if($(this).val()==2){vkumtraint[i]='Hardskill';}else if($(this).val()==3){vkumtraint[i]='Tandem Pasif';}else if($(this).val()==4){vkumtraint[i]='Tandem Aktif';}
			});
			var vkumtrainx 		= vkumtrain.join(';');
			var vkumtraintx 	= vkumtraint.join(';');	
			
			
			var vlong = [];
	        $('.kompx').each(function(i){
	          vlong[i] = $(this).val();
	        });
			
	        var vlong2 		= vlong.join(',');
			
			var vlongx = [];
	        $('.vkompx').each(function(i){
	          vlongx[i] = $(this).val();
	        });
			
	        var vlong3 		= vlongx.join(',');
			
			var vlongxx = [];
	        $('.bkompx').each(function(i){
	          vlongxx[i] = $(this).val();
	        });
			
	        var vlong4 		= vlongxx.join(',');
			
			var resy = vlong2.concat(",",vlong3,",",vlong4);
			
			console.log(resy);console.log(mandator);
			
			if(jskema==1){
				var myarr = mandator.split(",");
				var jumman = myarr.length;
				for(i=0;i<jumman;i++){ 
					var n = resy.includes(myarr[i]);
					if(n==true){
						//alert('Bnar');
					} else {
						alert('Data Mandatory Harus Di Input Semua, silahkan cek di Komponen Fixed, Variabel, Dan Benefit ');
						return false;
					}
				}
			}
			
			
			var djan = $('.tkodez');
			var chuk = djan.length;
			console.log(chuk);
			//var x = 1;
			for (x=0;x<chuk;x++)
         	{
         		var skodez = '#tkodez'+x;
				var snamaz = '#tnamaz'+x;
         		var svalz = '#tvalz'+x;
         		var sketz = '#tketz'+x;
				
				var akodez		= $(skodez).val();
				var anamaz 		= $(snamaz).val();
				var avalz 		= $(svalz).val();
				var aketz 		= $(sketz).val();
				
				
				$('#listkomponen> tbody:last-child').append('<tr><td class=kidx>'+ xmid +'</td><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ anamaz +'</td><td class=kkodekomponen style=display:none>'+ akodez +'</td>'+'</td><td class=kvalue>'+ avalz +'</td><td class=kket>'+ aketz +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
			}
			
			
			
			var komplength = $('.kompx');
			var ckomp = komplength.length;
			console.log(ckomp);
			var x = 1;
			for (x=1;x<=ckomp;x++)
         	{
         		var iddivkom = '#divkompx'+x;
				var iddivval = '#divvaluex'+x;

         		var idkom = '#kompx'+x;
         		var idket = '#ketx'+x;
         		var idval = '#valuex'+x;
				
         		var kkomponen	= $(idkom+' :selected').text();
				var kkodekomponen= $(idkom).val();
				var kvalue 		= $(idval).val();
				var kvaluex 	= bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(kvalue))));
				var kket 		= $(idket).val();
				
				var kvaluexy = kvaluex.replace(",", ".");
				
				if (kkodekomponen != "" )
				{
					if (kvaluex == "" )
					{
						alert('Setiap Value Harus Diisi Bosss..');
						return false;
					}
				}
				
				//console.log(kper);console.log(kkar);
/*
				if (kkomponen == "" )
				{
					alert('Komponen Fixed harus diisi');
					return false;
				}
				if (kvalue == "" )
				{
					alert('Value harus diisi');
					return false;
				}
				if (kket == "" )
				{
					alert('Keterangan harus diisi');
					return false;
				}
*/
				//$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ kkomponen +'</td><td class=kkodekomponen style=display:none>'+ kkodekomponen +'</td>'+'</td><td class=kvalue>'+ kvalue +'</td><td class=kket>'+ kket +'</td><td class=klevel style=display:none>'+ klevel +'</td><td class=kkodelevel style=display:none>'+ kkodelevel +'</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
				
				if(kkodekomponen!=''){
					$('#listkomponen> tbody:last-child').append('<tr><td class=kidx>'+ xmid +'</td><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ kkomponen +'</td><td class=kkodekomponen style=display:none>'+ kkodekomponen +'</td>'+'</td><td class=kvalue>'+ kvaluexy +'</td><td class=kket>'+ kket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
				}
			}	
			
			
			var vkomplength = $('.vkompx');
			var vckomp = vkomplength.length;
			//console.log(vckomp);
			var x = 1;
			for (x=1;x<=vckomp;x++)
         	{
         		var viddivkom = '#divkompx'+x;
				var viddivval = '#divvaluex'+x;

         		var vidkom = '#vkompx'+x;
         		var vidket = '#vketx'+x;
         		var vidval = '#vvaluex'+x;
				
         		var vkkomponen		= $(vidkom+' :selected').text();
				var vkkodekomponen	= $(vidkom).val();
				var vkvalue 		= $(vidval).val();
				var vkvaluex 		= bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(vkvalue))));
				var vkket 			= $(vidket).val();
				
				var vkvaluexy = vkvaluex.replace(",", ".");
				
				if (vkkodekomponen != "" )
				{
					if (vkvaluex == "" )
					{
						alert('Setiap Value Harus Diisi Bosss..');
						return false;
					}
				}
				
/*
				if (vkkomponen == "" )
				{
					alert('Komponen Varibael harus diisi');
					return false;
				}
				if (vkvalue == "" )
				{
					alert('Value harus diisi');
					return false;
				}
				if (vkket == "" )
				{
					alert('Keterangan harus diisi');
					return false;
				}
*/
				if(vkkodekomponen!=''){
					$('#listkomponen> tbody:last-child').append('<tr><td class=kidx>'+ xmid +'</td><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>'+ vkvaluex +'</td><td class=kket>'+ vkket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
				}
			}
			
			
			
			var bkomplength = $('.bkompx');
			var bckomp = bkomplength.length;
			//console.log(vckomp);
			var x = 1;
			for (x=1;x<=bckomp;x++)
         	{
         		var biddivkom = '#divkompx'+x;
				var biddivval = '#divvaluex'+x;

         		var bidkom = '#bkompx'+x;
         		var bidket = '#bketx'+x;
         		var bidval = '#bvaluex'+x;
				var idperx = '#pvaluex'+x;
				var idkarx = '#kvaluex'+x;
				var xjkkx  = '#kpvaluex'+x;
				var xjkmx  = '#kkvaluex'+x;
				var xjhtpx = '#kqvaluex'+x;
				var xjhtkx = '#kmvaluex'+x;
				var vkvalue 		= $(bidval).val();
         		var vkkomponen		= $(bidkom+' :selected').text();
				var vkkodekomponen	= $(bidkom).val();
				
				if( (vkkodekomponen==7000) || (vkkodekomponen==7001) ){
					var vkvaluex 		= $(bidval).val();
				} else {
					var vkvaluex 		= bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(vkvalue))));
				}
				
				var vkvaluexy = vkvaluex.replace(",", ".");
				
				var vkket 			= $(bidket).val();
				var kper 			= $(idperx).val();
				var kkar 			= $(idkarx).val();
				var jkkx 			= $(xjkkx).val();
				var jkmx 			= $(xjkmx).val();
				var jhtpx 			= $(xjhtpx).val();
				var jhtkx 			= $(xjhtkx).val();
				
				if (vkkodekomponen != "" )
				{
					if (vkvaluex == "" )
					{
						alert('Setiap Value Harus Diisi Bosss..');
						return false;
					}
				}
/*
				if (vkkomponen == "" )
				{
					alert('Komponen Varibael harus diisi');
					return false;
				}
				if (vkket == "" )
				{ 
					alert('Keterangan harus diisi');
					return false;
				}
*/				
				if(vkkodekomponen!=''){
					if(kper!=''){
						$('#listkomponen> tbody:last-child').append('<tr><td class=kidx>'+ xmid +'</td><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ vkket +'</td><td class=kper>'+ kper +'</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
					}
					else if(jkkx!=''){
						$('#listkomponen> tbody:last-child').append('<tr><td class=kidx>'+ xmid +'</td><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ kket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
					}
					else {
						$('#listkomponen> tbody:last-child').append('<tr><td class=kidx>'+ xmid +'</td><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>'+ vkvaluexy +'</td><td class=kket>'+ vkket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
					}
				}
			}
			
			
			var wewz = $('.nketb');
			var chukz = wewz.length;
			console.log(chukz);
			var x = 1;
			for (x=1;x<=chukz;x++)
         	{
         		var snketb 	 = '#nketb'+x;
				var skketb 	 = '#kketb'+x;
         		var spbtkp   = '#pbtkp'+x;
         		var svbtkp   = '#vbtkp'+x;
				var sbketb   = '#bketb'+x;
				
				var anketb		= $(snketb).val();
				var akketb 		= $(skketb).val();
				var apbtkp 		= $(spbtkp).val();
				var avbtkp 		= $(svbtkp).val();
				var avbtkpx 	= bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(avbtkp))));
				var abketb 		= $(sbketb).val();
				
				var avbtkpxy = avbtkpx.replace(",", "."); 
				
				$('#listkomponen> tbody:last-child').append('<tr><td class=kidx>'+ xmid +'</td><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ anketb +'</td><td class=kkodekomponen style=display:none>'+ akketb +'</td>'+'</td><td class=kvalue>'+ avbtkpxy +'</td><td class=kket>'+ abketb +'</td><td class=kper>'+ apbtkp +'</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
			}

			var pnorekx = pnorek.replace(",", ";");
			
			$('#listrincian > tbody:last-child').append('<tr><td class=kidx>'+ xmid +'</td><td class=ljabatan>'+ jabatan +'</td><td class=lgender>'+ gender +'</td><td class=lpendidikan>'+ pendidikan +'</td><td class=llokasi>'+ lokasi +'</td><td class=lwaktu>'+ waktu +'</td><td class=latasan>'+ atasan +'</td><td class=lkontrak>'+ n_kontrak +'</td><td class=ljumlah>'+ jumlah +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=khk>'+ khk +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=llokasiz style=display:none>'+ lokasiz +'</td><td class=ljabatanz style=display:none>'+ jabatanz +'</td><td class=kump style=display:none>'+ kump +'</td><td class=tot style=display:none>'+ tot +'</td> <td class=lktrain_text>'+ vkumtraintx +'</td><td class=lktrain style=display:none>'+ vkumtrainx +'</td> <td class=typeng style=display:none>'+ typepeng +'</td> <td class=ljskema style=display:none>'+ jskema +'</td> <td class=nlatihan>'+ latihan +'</td> <td class=nbekerja>'+ bekerja +'</td> <td class=ntypeng>'+ ntypepeng +'</td> <td class=lpnorek>'+ pnorekx +'</td> <td class=lreasonrot>'+ alasanrot +'</td> </tr>');
			
			
			$('#jabx').val('');
			$('#kodejabx').val('');
			$('#lokasix').val('');
			$('#kodelokasix').val('');

			$('#levelx').val('');
			//$('#hkpembagix').val('');
			//$('#umpx').val('');
			$('#ketx').val('');

			$('#kompx1').val('');
			$('#valuex1').val('');
			$('#ketx1').val('');	
			$('#myModal').modal('hide');

			$("#divmorekomp").html('');		
			
		//})
	
		});
		
		
		/*
		$("#addmorekompx").click(function(){
			var komplength = $('.kompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek'+ckomp;
			var azz = 'wowok'+ckomp;
			var ass = 'wiwik'+ckomp;
			var app = 'pvaluex'+ckomp;
			var akk = 'kvaluex'+ckomp;
			var xapp = 'xpvaluex'+ckomp;
			var xakk = 'xkvaluex'+ckomp;
			var sapp = 'kpvaluex'+ckomp;
			var sakk = 'kkvaluex'+ckomp;
			var sall = 'kqvaluex'+ckomp;
			var satt = 'kmvaluex'+ckomp;
			var ajj = 'jbpjs'+ckomp;
			var idket = 'ketx'+ckomp;
			var idval = 'valuex'+ckomp;
			var idkom = 'kompx'+ckomp;
			var iddivkom = 'divkompx'+ckomp;
			var iddivval = 'divvaluex'+ckomp;
			var iddivket = 'divketx'+ckomp;
			
			var group = $('#kodekont').val(); 
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon";
			$.post(url, {data:group}, function(response){
				$("#"+idkom).html(response);
			})
			//alert(ckomp);
			$('#tkomp > tbody:last-child').append("<tr><td width='25%'><select name="+idkom+" id="+idkom+" class='kompx form-control select2' onchange='getsifat(this,"+ckomp+")  '><option value=''></option><?php //echo $cmbkomp; ?></select></td><td width='5%'></td><td width='20%'><input type='text' class='form-control pull-right' id="+idval+" name='valuex' ></td><td width='5%'></td><td width='20%'><select class='form-control pull-right' id="+idket+"><option value=''>Pilih</option></select></td><td width='5%'></td><td width='20%'></td></tr>                                                                                                                             <tr id="+aww+" style='display:none'><td width='25%'><label>Perusahaan</label><br><input type='text' class='form-control pull-right' id="+app+" name="+app+" readOnly></td><td width='5%'></td><td width='20%'><label>Karyawan</label><br><input type='text' class='form-control pull-right' id="+akk+" name="+akk+" readOnly></td><td width='5%'></td><td width='20%'><select class='form-control pull-right' id="+ajj+" style='margin-bottom:-25px;' onchange='ubahpk(this.value,"+ckomp+")'><option value='1'>Karyawan</option><option value='2'>Perusahaan</option></select></td><td width='5%'></td><td width='20%'></td></tr>                                <tr id="+azz+" style='display:none'><td width='25%'><label>Perusahaan</label><br><input type='text' class='form-control pull-right' id="+xapp+" name="+xapp+" readOnly></td><td width='5%'></td><td width='20%'><label>Karyawan</label><br><input type='text' class='form-control pull-right' id="+xakk+" name="+xakk+" readOnly></td><td width='5%'></td><td width='20%'></td><td width='5%'></td><td width='20%'></td></tr>                                                                    <tr id="+ass+" style='display:none'><td width='25%'><label>JKK Kecelakaan</label><br><input type='text' class='form-control pull-right' id="+sapp+" name="+sapp+" readOnly></td><td width='5%'></td><td width='20%'><label>JKM Kematian</label><br><input type='text' class='form-control pull-right' id="+sakk+" name="+sakk+" readOnly></td><td width='5%'></td><td width='20%'><label>JHT Perusahaan</label><br><input type='text' class='form-control pull-right' id="+sall+" name="+sall+" readOnly></td><td width='5%'></td><td width='20%'><label>JHT Karyawan</label><br><input type='text' class='form-control pull-right' id="+satt+" name="+satt+" readOnly></td></tr>");
		});
		*/
		
		$("#addmorekompx").click(function(){
			var komplength = $('.kompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek'+ckomp;
			var azz = 'wowok'+ckomp;
			var ass = 'wiwik'+ckomp;
			var app = 'pvaluex'+ckomp;
			var akk = 'kvaluex'+ckomp;
			var xapp = 'xpvaluex'+ckomp;
			var xakk = 'xkvaluex'+ckomp;
			var sapp = 'kpvaluex'+ckomp;
			var sakk = 'kkvaluex'+ckomp;
			var sall = 'kqvaluex'+ckomp;
			var satt = 'kmvaluex'+ckomp;
			var ajj = 'jbpjs'+ckomp;
			var idket = 'ketx'+ckomp;
			var idval = 'valuex'+ckomp;
			var idkom = 'kompx'+ckomp;
			var iddivkom = 'divkompx'+ckomp;
			var iddivval = 'divvaluex'+ckomp;
			var iddivket = 'divketx'+ckomp;
			
			var group = $('#kodekont').val(); 
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_fixed";
			$.post(url, {data:group}, function(response){
				$("#"+idkom).html(response);
			})
			//alert(ckomp);
			$('#tkomp > tbody:last-child').append("<tr><td><select name="+idkom+" id="+idkom+" class='kompx form-control select2' onchange='getsifat(this,"+ckomp+",1)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; ?></select></td><td><input type='text' class='form-control pull-right' id="+idval+" name='valuex' style='width:250px' onchange='hitung(this,"+ckomp+",1)'></td><td><select class='form-control pull-right' id="+idket+" style='width:250px'><option value=''>Pilih</option></select></td></tr>");
		});
		
		
		$("#vaddmorekompx").click(function(){
			var komplength = $('.vkompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek'+ckomp;
			var azz = 'wowok'+ckomp;
			var ass = 'wiwik'+ckomp;
			var app = 'pvaluex'+ckomp;
			var akk = 'kvaluex'+ckomp;
			var xapp = 'xpvaluex'+ckomp;
			var xakk = 'xkvaluex'+ckomp;
			var sapp = 'kpvaluex'+ckomp;
			var sakk = 'kkvaluex'+ckomp;
			var sall = 'kqvaluex'+ckomp;
			var satt = 'kmvaluex'+ckomp;
			var ajj = 'jbpjs'+ckomp;
			var idket = 'vketx'+ckomp;
			var idval = 'vvaluex'+ckomp;
			var idkom = 'vkompx'+ckomp;
			var iddivkom = 'divkompx'+ckomp;
			var iddivval = 'divvaluex'+ckomp;
			var iddivket = 'divketx'+ckomp;
			
			var group = $('#kodekont').val(); 
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_variabel";
			$.post(url, {data:group}, function(response){
				$("#"+idkom).html(response);
			})
			//alert(ckomp);
			$('#tkomp_var > tbody:last-child').append("<tr><td><select name="+idkom+" id="+idkom+" class='vkompx form-control select2' onchange='getsifat(this,"+ckomp+",2)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; ?></select></td><td><input type='text' class='form-control pull-right' id="+idval+" name='vvaluex' style='width:250px' ></td><td><select class='form-control pull-right' id="+idket+" style='width:250px'><option value=''>Pilih</option></select></td></tr>");
		});
		
		
		$("#baddmorekompx").click(function(){
			var komplength = $('.bkompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek'+ckomp;
			var azz = 'wuwuk'+ckomp;
			var ass = 'zozok'+ckomp;
			var abb = 'zazak'+ckomp;
			var acc = 'zuzuk'+ckomp;
			var agg = 'zezek'+ckomp;
			var idket = 'bketx'+ckomp;
			var idval = 'bvaluex'+ckomp;
			var idkom = 'bkompx'+ckomp;
			var idname = 'nvaluex'+ckomp;
			var idnamex = 'mvaluex'+ckomp;
			var idvalx = 'pvaluex'+ckomp;
			var xidvalx = 'kvaluex'+ckomp;
			var aidnamex = 'nkpvaluex'+ckomp;
			var bidnamex = 'nkkvaluex'+ckomp;
			var cidnamex = 'nkqvaluex'+ckomp;
			var didnamex = 'nkmvaluex'+ckomp;
			var aidvalx = 'kpvaluex'+ckomp;
			var bidvalx = 'kkvaluex'+ckomp;
			var cidvalx = 'kqvaluex'+ckomp;
			var didvalx = 'kmvaluex'+ckomp;
			
			var group = $('#kodekont').val(); 
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
			$.post(url, {data:group}, function(response){
				$("#"+idkom).html(response);
			})
			//alert(ckomp);
			$('#tkomp_ben > tbody:last-child').append("<tr><td><select name="+idkom+" id="+idkom+" class='bkompx form-control select2' onchange='getsifat(this,"+ckomp+",3)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; ?></select></td><td><input type='text' class='form-control pull-right' id="+idval+" name='bvaluex' style='width:250px' ></td><td><select class='form-control pull-right' id="+idket+" style='width:250px'><option value=''>Pilih</option></select></td></tr>                <tr id="+aww+" style='display:none'><td><input type='text' class='form-control pull-right' id="+idname+" name="+idname+" value='Perusahaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+idvalx+" name="+idvalx+" style='width:250px' readOnly></td><td></td></tr>                     <tr id="+azz+" style='display:none'><td><input type='text' class='form-control pull-right' id="+idnamex+" name="+idnamex+" value='Karyawan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+xidvalx+" name="+xidvalx+" style='width:250px' readOnly></td><td></td></tr>                    <tr id="+ass+" style='display:none'><td><input type='text' class='form-control pull-right' id="+aidnamex+" name="+aidnamex+" value='JKK Kecelakaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+aidvalx+" name="+aidvalx+" style='width:250px' readOnly></td><td></td></tr>                    <tr id="+abb+" style='display:none'><td><input type='text' class='form-control pull-right' id="+bidnamex+" name="+bidnamex+" value='JKM Kematian' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+bidvalx+" name="+bidvalx+" style='width:250px' readOnly></td><td></td></tr>                    <tr id="+acc+" style='display:none'><td><input type='text' class='form-control pull-right' id="+cidnamex+" name="+cidnamex+" value='JHT Perusahaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+cidvalx+" name="+cidvalx+" style='width:250px' readOnly></td><td></td></tr>                    <tr id="+agg+" style='display:none'><td><input type='text' class='form-control pull-right' id="+didnamex+" name="+didnamex+" value='JHT Karyawan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+didvalx+" name="+didvalx+" style='width:250px' readOnly></td><td></td></tr>");
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

function functmodal() { 
	//alert("tess");
   // document.getElementById("EModal").showModal(); 
	$('#myModal').modal('hide');
    $('#EModal').modal('toggle');
	$('#EModal').modal('show');
	
} 


function hitung(a,b,c){
	var arr 	= document.getElementsByName('valuex');
	var kump 	= document.getElementById("umpx").value;
	var jpbpjs 	= document.getElementById("jpbpjs").value;
	
	var pbtkp1 	= document.getElementById("pbtkp1").value;
	var pbtkp2 	= document.getElementById("pbtkp2").value;
	var pbtkp3 	= document.getElementById("pbtkp3").value;
	var pbtkp4 	= document.getElementById("pbtkp4").value;
	var kodekont = $("#kodekont").val();
	
	var tot=0;
	for(var i=0;i<arr.length;i++){
		//if(parseFloat(arr[i].value))
			//tot += parseFloat(arr[i].value);
		if(parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
			tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
	}

	if(tot < kump){
		if(kodekont==1){
			alert('Total Fixed harus sama atau lebih dari UMP');
			document.getElementById("pbtkp1").readOnly = true; 
			document.getElementById("pbtkp2").readOnly = true; 
			document.getElementById("pbtkp3").readOnly = true; 
			document.getElementById("pbtkp4").readOnly = true; 
		}
		else 
		{
			// document.getElementById("pbtkp1").readOnly = true; 
			// document.getElementById("pbtkp2").readOnly = true; 
			// document.getElementById("pbtkp3").readOnly = true; 
			// document.getElementById("pbtkp4").readOnly = true;
			document.getElementById("pbtkp1").readOnly = false; 
			document.getElementById("pbtkp2").readOnly = false; 
			document.getElementById("pbtkp3").readOnly = false; 
			document.getElementById("pbtkp4").readOnly = false;	
		}
		
		if(kodekont==1 || kodekont==6){
			if(jpbpjs==1){
				$("#pbtkp1").val('9.24');
			}
			else if(jpbpjs==2){
				$("#pbtkp1").val('9.54');
			}
			else if(jpbpjs==3){
				$("#pbtkp1").val('9.89');
			}
			else if(jpbpjs==4){
				$("#pbtkp1").val('10.27');
			}
			else if(jpbpjs==5){
				$("#pbtkp1").val('10.74');
			}
		}
		else 
		{
			$("#pbtkp1").val('0');
		}
		
		//$('#pbtkp1').val('9.24');
		$('#vbtkp1').val('');
		
		$('#pbtkp2').val('0');
		$('#vbtkp2').val('');
		
		if(kodekont==1 || kodekont==6){
			$('#pbtkp3').val('5');
		}
		else 
		{
			$('#pbtkp3').val('0');
		}
		
		$('#vbtkp3').val('');
		
		$('#pbtkp4').val('0');
		$('#vbtkp4').val('');
	}
	else
	{
		document.getElementById("pbtkp1").readOnly = false; 
		document.getElementById("pbtkp2").readOnly = false; 
		document.getElementById("pbtkp3").readOnly = false; 
		document.getElementById("pbtkp4").readOnly = false; 
		
		var asu = (pbtkp1/100)*tot;
		var asus = Math.round(asu);
		$('#vbtkp1').val(asus);
		
		var asi = (pbtkp2/100)*tot;
		var asis = Math.round(asi);
		$('#vbtkp2').val(asis);
		
		var ase = (pbtkp3/100)*tot;
		var ases = Math.round(ase);
		$('#vbtkp3').val(ases);
		
		var asa = (pbtkp4/100)*tot;
		var asas = Math.round(asa);
		$('#vbtkp4').val(asas);
	}
	
}


/*
function hitung(a,b,c){
	var arr 	= document.getElementsByName('valuex');
	var kump 	= document.getElementById("umpx").value;
	
	var pbtkp1 	= document.getElementById("pbtkp1").value;
	var pbtkp2 	= document.getElementById("pbtkp2").value;
	var pbtkp3 	= document.getElementById("pbtkp3").value;
	var pbtkp4 	= document.getElementById("pbtkp4").value;
	
	var tot=0;
	for(var i=0;i<arr.length;i++){
		if(parseFloat(arr[i].value))
			tot += parseFloat(arr[i].value);
	}

	if(tot < kump){
		alert('Total Fixed harus sama atau lebih dari UMP');
		document.getElementById("pbtkp1").readOnly = true; 
		document.getElementById("pbtkp2").readOnly = true; 
		document.getElementById("pbtkp3").readOnly = true; 
		document.getElementById("pbtkp4").readOnly = true; 
		
		$('#pbtkp1').val('9.24');
		$('#vbtkp1').val('');
		
		$('#pbtkp2').val('0');
		$('#vbtkp2').val('');
		
		$('#pbtkp3').val('5');
		$('#vbtkp3').val('');
		
		$('#pbtkp4').val('0');
		$('#vbtkp4').val('');
	}
	else
	{
		document.getElementById("pbtkp1").readOnly = false; 
		document.getElementById("pbtkp2").readOnly = false; 
		document.getElementById("pbtkp3").readOnly = false; 
		document.getElementById("pbtkp4").readOnly = false; 
		
		var asu = (pbtkp1/100)*tot;
		var asus = Math.round(asu);
		$('#vbtkp1').val(asus);
		
		var asi = (pbtkp2/100)*tot;
		var asis = Math.round(asi);
		$('#vbtkp2').val(asis);
		
		var ase = (pbtkp3/100)*tot;
		var ases = Math.round(ase);
		$('#vbtkp3').val(ases);
		
		var asa = (pbtkp4/100)*tot;
		var asas = Math.round(asa);
		$('#vbtkp4').val(asas);
	}
}
*/

function getsifat(a,b,c){
	var komp = a.value; 
	var nkom = b;  
	
	var komplength = $('.bkompx');
	var ckomp  = komplength.length + 1;
	var aww = 'wewek'+ckomp;
	var azz = 'wowok'+ckomp;
	var ass = 'wiwik'+ckomp;
	var app = 'pvaluex'+ckomp;
	var akk = 'kvaluex'+ckomp;
	var xapp = 'xpvaluex'+ckomp;
	var xakk = 'xkvaluex'+ckomp;
	var sapp = 'kpvaluex'+ckomp;
	var sakk = 'kkvaluex'+ckomp;
	var sall = 'kqvaluex'+ckomp;
	var satt = 'kmvaluex'+ckomp;
	var ajj = 'jbpjs'+ckomp;
	var idket = 'bketx'+ckomp;
	var idval = 'bvaluex'+ckomp;
	var idkom = 'bkompx'+ckomp;
	var iddivkom = 'divkompx'+ckomp;
	var iddivval = 'divvaluex'+ckomp;
	var iddivket = 'divketx'+ckomp;
	
	var group = $('#kodekont').val(); 
	var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
	$.post(url, {data:group}, function(response){
		$("#"+idkom).html(response);
	})
	
	//var aww = 'wewek'+ckomp;
	//alert(nkom);
	
	
	if((komp=='4058') || (komp=='8888')){
		document.getElementById("bvaluex"+nkom).readOnly = true; 
		document.getElementById('wewek'+nkom).removeAttribute("style");
		document.getElementById('wuwuk'+nkom).removeAttribute("style");
		document.getElementById('zozok'+nkom).setAttribute("style","display:none;");
		document.getElementById('zazak'+nkom).setAttribute("style","display:none;");
		document.getElementById('zuzuk'+nkom).setAttribute("style","display:none;");
		document.getElementById('zezek'+nkom).setAttribute("style","display:none;");
	
		var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
		$.post(url, {data:komp}, function(response){
			console.log(c);console.log(nkom);
			if(c=='1'){
				$("#ketx"+nkom).html(response);
			} else if(c=='2'){
				$("#vketx"+nkom).html(response);
			} else {
				$("#bketx"+nkom).html(response);
			}
		});
		
		
		var vlong = [];
		$('.kompx').each(function(i){
		  vlong[i] = $(this).val();
		});
		
		var vlong2 		= vlong.join(',');
		
		var fixed = document.getElementById('fixed').value;
		var kump = document.getElementById('umpx').value;
		var arrq = document.getElementsByName('valuex');
		var myarrq = vlong2.split(",");
		var jummanq = myarrq.length;
		var kjummanq = arrq.length;
		//console.log(arrq);console.log(kjummanq);console.log(vlong2);console.log(jummanq);
	
		var totq  = 0;
		var edcba = 0;
		for(i=0;i<jummanq;i++){ 
			var n = fixed.includes(myarrq[i]);
			if(myarrq[i]=='2008'){
				edcba += parseFloat(arrq[i].value);
			}
			
			if(n==true){
				if(parseFloat(arrq[i].value))
					totq += parseFloat(arrq[i].value);
			} 
		}
		
		var atot   = totq;
		var asdf   = edcba;
		var abcde  = atot-asdf;
		var abcdef = parseFloat(abcde);
		//console.log(atot);console.log(asdf);console.log(abcde);console.log(abcdef);
		var hjk    = parseFloat(0.04*abcdef);
		var pop    = parseFloat(0.01*abcdef);
		var xhjk   = parseFloat(0.05*abcdef);
		var xpop   = 0;
		
		if(komp=='4058'){
			$('#pvaluex'+nkom).val(xhjk);
			$('#kvaluex'+nkom).val(xpop);
		}
		else {
			$('#pvaluex'+nkom).val(hjk);
			$('#kvaluex'+nkom).val(pop);
		}
		
	} 
	else if((komp=='4065') || (komp=='4066')){
		document.getElementById("bvaluex"+nkom).readOnly = true;
		document.getElementById('wewek'+nkom).removeAttribute("style");
		document.getElementById('wuwuk'+nkom).removeAttribute("style");
		document.getElementById('zozok'+nkom).setAttribute("style","display:none;");
		document.getElementById('zazak'+nkom).setAttribute("style","display:none;");
		document.getElementById('zuzuk'+nkom).setAttribute("style","display:none;");
		document.getElementById('zezek'+nkom).setAttribute("style","display:none;");
		
		var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
		$.post(url, {data:komp}, function(response){
			console.log(c);console.log(nkom);
			if(c=='1'){
				$("#ketx"+nkom).html(response);
			} else if(c=='2'){
				$("#vketx"+nkom).html(response);
			} else {
				$("#bketx"+nkom).html(response);
			}
		});
		
		var vlong = [];
		$('.kompx').each(function(i){
		  vlong[i] = $(this).val();
		});
		
		var vlong2 		= vlong.join(',');
		
		var fixed = document.getElementById('fixed').value;
		var kump = document.getElementById('umpx').value;
		var arrq = document.getElementsByName('valuex');
		var myarrq = vlong2.split(",");
		var jummanq = myarrq.length;
		var kjummanq = arrq.length;
		//console.log(fixed);console.log(kump);console.log(jummanq);console.log(kjummanq);
	
		var totq  = 0;
		var edcba = 0;
		for(i=0;i<jummanq;i++){ 
			var n = fixed.includes(myarrq[i]);
			if(myarrq[i]=='2008'){
				edcba += parseFloat(arrq[i].value);
			}
			
			if(n==true){
				if(parseFloat(arrq[i].value))
					totq += parseFloat(arrq[i].value);
			} 
		}
		
		var atot   = totq;
		var asdf   = edcba;
		var abcde  = atot-asdf;
		var abcdef = parseFloat(abcde);
		var hjk    = parseFloat(0.02*abcdef);
		var pop    = parseFloat(0.01*abcdef);
		var mlm    = parseFloat(0.03*abcdef);
		var pip    = 0;
		
		if(komp=='4066'){
			$('#pvaluex'+nkom).val(mlm);
			$('#kvaluex'+nkom).val(pip);
		}
		else {
			$('#pvaluex'+nkom).val(hjk);
			$('#kvaluex'+nkom).val(pop);
		}
		
	}
	else if((komp=='7777') || (komp=='6666')){
		document.getElementById("bvaluex"+nkom).readOnly = true; 
		document.getElementById('wewek'+nkom).setAttribute("style","display:none;");
		document.getElementById('wuwuk'+nkom).setAttribute("style","display:none;");
		document.getElementById('zozok'+nkom).removeAttribute("style");
		document.getElementById('zazak'+nkom).removeAttribute("style");		
		document.getElementById('zuzuk'+nkom).removeAttribute("style");		
		document.getElementById('zezek'+nkom).removeAttribute("style");		
		
		var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
		$.post(url, {data:komp}, function(response){
			console.log(c);console.log(nkom);
			if(c=='1'){
				$("#ketx"+nkom).html(response);
			} else if(c=='2'){
				$("#vketx"+nkom).html(response);
			} else {
				$("#bketx"+nkom).html(response);
			}
		});
		
		var vlong = [];
		$('.kompx').each(function(i){
		  vlong[i] = $(this).val();
		});
		
		var vlong2 		= vlong.join(',');
		
		var fixed = document.getElementById('fixed').value;
		var kump = document.getElementById('umpx').value;
		var arrq = document.getElementsByName('valuex');
		var myarrq = vlong2.split(",");
		var jummanq = myarrq.length;
		var kjummanq = arrq.length;
		
		var totq  = 0;
		var edcba = 0;
		for(i=0;i<jummanq;i++){ 
			var n = fixed.includes(myarrq[i]);
			if(myarrq[i]=='2008'){
				edcba += parseFloat(arrq[i].value);
			}
			
			if(n==true){
				if(parseFloat(arrq[i].value))
					totq += parseFloat(arrq[i].value);
			} 
		}
		
		var atot   = totq;
		var asdf   = edcba;
		var abcde  = atot-asdf;
		var abcdef = parseFloat(abcde);
		var hjk    = parseFloat(0.0024*abcdef);
		var pop    = parseFloat(0.003*abcdef);
		var mlm    = parseFloat(0.057*abcdef);
		var mkm    = parseFloat(0.037*abcdef);
		var msm    = parseFloat(0.02*abcdef);
		var pip    = 0;
		
		if(komp=='6666'){
			$('#kpvaluex'+nkom).val(hjk);
			$('#kkvaluex'+nkom).val(pop);
			$('#kqvaluex'+nkom).val(mkm);
			$('#kmvaluex'+nkom).val(msm);
		}
		else {
			$('#kpvaluex'+nkom).val(hjk);
			$('#kkvaluex'+nkom).val(pop);
			$('#kqvaluex'+nkom).val(mlm);
			$('#kmvaluex'+nkom).val(pip);
		}
	}
	else 
	{
		if(c=='1'){
			document.getElementById("valuex"+nkom).readOnly = false; 
		} else if(c=='2'){
			document.getElementById("vvaluex"+nkom).readOnly = false; 
		} else {
			document.getElementById("bvaluex"+nkom).readOnly = false; 
		}
		
		var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
		$.post(url, {data:komp}, function(response){
			console.log(c);console.log(nkom);
			if(c=='1'){
				$("#ketx"+nkom).html(response);
			} else if(c=='2'){
				$("#vketx"+nkom).html(response);
			} else {
				$("#bketx"+nkom).html(response);
			}
		})
	}
	
}



function ubahpk(xxx, bbb){
	var vlong = [];
	$('.kompx').each(function(i){
	  vlong[i] = $(this).val();
	});
	
	var vlong2 		= vlong.join(',');
	
	var fixed = document.getElementById('fixed').value;
	var kump = document.getElementById('umpx').value;
	var arrq = document.getElementsByName('valuex');
	var myarrq = vlong2.split(",");
	var jummanq = myarrq.length;
	var kjummanq = arrq.length;

	var totq  = 0;
	var edcba = 0;
	for(i=0;i<jummanq;i++){ 
		var n = fixed.includes(myarrq[i]);
		if(myarrq[i]=='2008'){
			edcba += parseFloat(arrq[i].value);
		}
		
		if(n==true){
			if(parseFloat(arrq[i].value))
				totq += parseFloat(arrq[i].value);
		} 
	}
	
	var atot   = totq;
	var asdf   = edcba;
	var abcde  = atot-asdf;
	var abcdef = parseFloat(abcde);
	var hjk    = parseFloat(0.04*abcdef);
	var pop    = parseFloat(0.01*abcdef);
	var mlm    = parseFloat(0.05*abcdef);
	var pip    = 0;
	
	
	if(xxx==1){
		$('#pvaluex'+bbb).val(hjk);
		$('#kvaluex'+bbb).val(pop);
	} else {
		$('#pvaluex'+bbb).val(mlm);
		$('#kvaluex'+bbb).val(pip);
	}
}


function validAngka(a)
{
	if(!/^[0-9.]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
}

function validAngkakoma(a)
{
	// if(!/^[0-9.;]+$/.test(a.value))
	if(!/^[0-9;]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
}

function pnorekrut(valjen)
{
	// if(valjen=='INF'){
		// $('#divpnorek').show();
	// } else {
		// $('#divpnorek').hide();
	// }
}

function hapuslist(row, pernx){
	var i=row.parentNode.parentNode.rowIndex;
	document.getElementById('listperner').deleteRow(i);
	$("#"+pernx).remove();
}

function carialasan(id)
{
	var url = "<?php echo base_url(); ?>index.php/rotasi/carialasan";
	$.post(url, {data:id}, function(response){
		$("#alasan").html(response);
	})
	
	if(id==2){
		$("#infox").show();
	} else {
		$("#infox").hide();
	}
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

function formatRupiah(angka, prefix) {
	var number_string = angka.replace(/[^,\d]/g, "").toString(),
	split = number_string.split(","),
	sisa = split[0].length % 3,
	rupiah = split[0].substr(0, sisa),
	ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}

	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
}			
</script>


<title>JobOrderISH | <?echo $title;?></title>
<!-- Main content -->
<div class="content-wrapper">
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-5">
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
							<select class="form-control pull-right" id="typejo" name="typejo"/>
										<?php echo $cmbtpro;?>													
							</select>		
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					
				</div>
			</div>	
				
			<div class="box box-primary" id='yuyuy'>
			<!-- form start -->
					<div class="box-body">
					
<!--					
						<div class="form-group" id="divnojo">
							<label class="col-sm-3 control-label">Nojo</label>
							<div class="col-sm-9">
							<input type="text" class="form-control pull-right" id="nojok" name="nojok" value="<?php //echo $nojo ?>" readonly />
							</div>
						</div>
-->  
						<div class="form-group" id="divtper" >
							<label class="col-sm-3 control-label">Type JO</label>
							<div class="col-sm-9">
								<div class="col-sm-3">
								<input type="radio" id="tperal" name="tperal" value="ISH" onchange="pnorekrut(this.value)" checked=checked> ISH 
								</div>
								<div class="col-sm-6">
								<input type="radio" id="tperal" name="tperal" value="INF" onchange="pnorekrut(this.value)"> INF (PERALIHAN)	
								</div>
							</div>
						</div>
						
						<div class="form-group" id="divtre">
							<label class="col-sm-3 control-label">Type Rekrut Replacement</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="typere" name="typere"/>
											<option value="1">NO REKRUT</option>	
											<option value="2">REKRUT</option>											
											<option value="3">NO REKRUT (EXISTING)</option>											
								</select>	
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						<div class="form-group" id="divtnew">
							<label class="col-sm-3 control-label">Type New</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="typenew" name="typenew"/>
											<!--<option value="">Pilih Type New</option>-->
											<option value="1">New Project</option>	
											<option value="2">Pengembangan</option>											
								</select>	
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						<!--<div class="form-group" id="divnojo">
							<label class="col-sm-3 control-label">Nojo</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nojok" name="nojok" value="<?php echo $nojo ?>" readonly>
							</div><!-- /.input group --
						</div><!-- /.form group -- -->
						
						<div class="form-group" id="divtanggal">
							<label class="col-sm-3 control-label">Tanggal</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly=readonly/>
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
						
						<div class="form-group" id="divcapt">
							<label class="col-sm-3 control-label">Jenis Captive</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="jeniscapt" name="jeniscapt"/>
									<option value="">Pilih Jenis Captive</option>
									<?php echo $cmbjcapt;?>									
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divnccust">
							<label class="col-sm-3 control-label">Nama Customer</label>
							<div class="col-sm-9">
								<select name="ncust" id="ncust" class="form-control select2 pull-right" style="width:100%">
									<option value="">Pilih Nama Customer</option>	
									<?php echo $cmbcust;?>													
								</select>			
							</div>
						</div>
						
						<div class="form-group" id="divspro">
							<label class="col-sm-3 control-label">Start Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="sproject" name="sproject"/>				
							</div>
						</div>
						
						<div class="form-group" id="divepro">
							<label class="col-sm-3 control-label">End Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="eproject" name="eproject"/>		
							</div>
						</div>
						
						<div class="form-group" id="divnilpro">
							<label class="col-sm-3 control-label">Nilai Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nilpro" name="nilpro"/>			
							</div>
						</div>
						
						<div class="form-group" id="divnproject">
							<label class="col-sm-3 control-label">Nama Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="project" name="project" placeholder="Masukkan nama project.."/>	
							</div>
						</div>
						
						<div class="form-group" id="divnrespa">
							<label class="col-sm-3 control-label">Type PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="xrespax" name="xrespax" style="width:100%;"/>
									<option value="1">Aktif</option>
									<option value="2">Tidak Aktif</option>
								</select>	
							</div>
							<br><br><br>
							<label class="col-sm-3 control-label">PersonalArea</label>
							<div class="col-sm-9">
								<!--<select class="form-control select2 pull-right" id="respa" name="respa" style="width:100%;">
									<option value="">Pilih</option>
									<?php //array_multisort(json_decode($cmbpersax), SORT_ASC, SORT_STRING); 
									//foreach($cmbpersax as $key => $list){ ?>			
									<option value="<?php //echo $list->kd_persa; ?>"><?php //echo $list->persa; ?></option>
									<?php //} ?>							
								</select>-->	
								<select class="form-control select2 pull-right" id="respa" name="respa" style="width:100%;"/>
									<option value="">Pilih</option>
									<?php array_multisort(json_decode($cmbpersax), SORT_ASC, SORT_STRING); 
									foreach($cmbpersax as $key => $list){ ?>			
									<option value="<?php echo $list->kd_persa; ?>"><?php echo $list->persa; ?></option>
									<?php } ?>	
								</select>	
							</div>
						</div>
						
						
						
						<div class="form-group" id="divsyarat">
							<label class="col-sm-3 control-label" >Persyaratan Khusus</label>
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
								<input type="text" class="form-control pull-right" id="lama" name="lama" placeholder="Satuan bulan..." onkeyup="validAngka(this)"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div id="btsrep" class="col-xs-12" style="width:100%;height:100%;border:1px solid #000; margin-bottom:10px;">
							<br>
							<div class="form-group" id="divresign">
								<label class="col-sm-3 control-label">Tanggal Resign/Rotasi</label>
								<div class="col-sm-9">
									<input type="text" class="form-control pull-right" id="resign" name="resign"/>
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
							
							<div class="form-group" id="divtrotres" >
								<label class="col-sm-3 control-label">Type Perner</label>
								<div class="col-sm-9">
									<div class="col-sm-3">
									<input type="radio" id="trotres" name="trotres" value="1" onchange="carialasan(this.value)" checked=checked> Resign 
									</div>
									<div class="col-sm-6">
									<input type="radio" id="trotres" name="trotres" value="2" onchange="carialasan(this.value)"> Rotasi / Mutasi	
									</div>
								</div>
							</div>

							<div class="form-group" id="divnperganti">
								<label class="col-sm-3 control-label" style="font-size:12px;">Perner Pengganti</label>
								<div class="col-sm-9">
									<select class="form-control pull-right" id="ypernery" name="ypernery" style="width:100%;"/>
									
									</select>	
								</div>
							</div>
							
							<div class="form-group" id="divresign">
								<label class="col-sm-3 control-label" style="font-size:12px;">ALasan Rotasi Pengganti</label>
								<div class="col-sm-9">
									<select class="form-control pull-right" id="alasan_ganti" name="alasan_ganti" style="width:100%;"/>
										<option value="">Pilih</option>
										<?php echo $cmbreason_ganti ?>
									</select>
								</div><!-- /.input group -->
							</div><!-- /.form group -->	
							
							<div class="form-group" id="divnper">
								<label class="col-sm-3 control-label" style="font-size:12px;">Perner Resign/Rotasi</label>
								<div class="col-sm-9">
									<select class="form-control pull-right" id="xpernerx" name="xpernerx" style="width:100%;"/>
									
									</select>
									<label id="infox" style="color:#FF0000; font-size:10px;">Pastikan Perner yang akan dipilih sudah dirotasikan</label>									
								</div>
							</div>
							
							<div class="form-group" id="divresign">
								<label class="col-sm-3 control-label" style="font-size:12px;">ALasan Resign/Rotasi</label>
								<div class="col-sm-9">
									<select class="form-control pull-right" id="alasan" name="alasan" style="width:100%;"/>
										<option value="">Pilih</option>
										<?php echo $cmbreason ?>
									</select>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							
							<div class="form-group" id="divreptrain">
								<label class="col-sm-3 control-label">Training</label>
								<div class="col-sm-9">
									<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
										<div class="col-md-6" style="margin-top:5px;">
											<input type="checkbox" name="rep_kumtrain[]" id="rep_kumtrain" value="1"> Softskill
										</div>
										<div class="col-md-6" style="margin-top:5px;">
											<input type="checkbox" name="rep_kumtrain[]" id="rep_kumtrain" value="2"> Hardskill
										</div>
										<div class="col-md-6" style="margin-top:5px;">
											<input type="checkbox" name="rep_kumtrain[]" id="rep_kumtrain" value="3"> Tandem Pasif
										</div>
										<div class="col-md-6" style="margin-top:5px;">
											<input type="checkbox" name="rep_kumtrain[]" id="rep_kumtrain" value="4"> Tandem Aktif
										</div>
									</div>
								</div>
							</div>
						</div>	
						
						<div class="form-group" id="divtglgaji">
							<label class="col-sm-3 control-label">Tanggal Gajian</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="tglgaji" name="tglgaji"/>
									<?php for($i=1;$i<=31;$i++){
										echo "<option value=".$i.">".$i."</option>";
									} ?>
								</select>	
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<!-- <div class="form-group" id="group_att3">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9"> -->
								<!--<input type="hidden" class="form-control pull-right" name="userfiles[]" id="komponen4">-->
								<!-- <label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
							</div>
						</div> -->
						<div class="form-group" id="divnobak">
							<label class="col-sm-3 control-label">NO LAMPIRAN</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="xnobak" name="xnobak" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att4">
							<label class="col-sm-3 control-label"><?php if($jenis=='1'){echo "Dokumen BAK";}else{echo "LAMPIRAN";} ?></label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="userfiles[]" id="komponen5"/>
								<label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att5">
							<label class="col-sm-3 control-label">FPTKP</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="userfiles[]" id="komponen6"/>
								<label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<!--
						<div id='akk'>
							<button type="button" class="btn btn-default btn-sm" id="addmore2">Add more attachment</button>
						</div>
						-->
						<!--
						<div id='akkx'>
							<button type="button" class="btn btn-default btn-sm" id="addmore3">Add more attachment</button>
						</div>
						-->
						<div class="box-footer" id="ggff">
							<button type="button" class="btn btn-primary pull-right" id="btn_simpan">Submit</button>
						</div>
						
						<div class="overlay" id="overlay">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
						
					</div><!-- /.box-body -->
			</div><!-- /.box -->
			
			
			
			
			<div class="box box-primary" id='yeyey'>
			<!-- form start -->
					<div class="box-body">
					
						<div class="form-group" id="divnojo">
							<label class="col-sm-3 control-label">Nojo</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nojosk" name="nojosk" value="<?php echo $nojosk ?>" readonly />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						<div class="form-group" id="sdivnccust">
							<label class="col-sm-3 control-label">Nama Customer</label>
							<div class="col-sm-9">
								<select name="sncust" id="sncust" class="form-control select2 pull-right" style="width:100%">
									<option value="">Pilih Nama Customer</option>	
									<?php echo $cmbcust;?>													
								</select>			
							</div>
						</div>
						
						
						<div class="form-group" id="divproject">
							<!--
							<label class="col-sm-3 control-label">Type PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control pull-right" id="xspax" name="xspax" style="width:460px;"/>
									<option value="1">Aktif</option>
									<option value="2">Tidak Aktif</option>
								</select>	
							</div>
							<br><br><br>
							-->
							<label class="col-sm-3 control-label">PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="spa" name="spa" style="width:100%;"/>
										
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
						
						<!-- <div class="form-group" id="group_att">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="komp[]" id="komponen1"/>
								<label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
							</div>
						</div> -->
						
						<div class="form-group" id="xdivnmbay">
							<label class="col-sm-3 control-label">Nama Pembayaran</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nmbay" name="nmbay" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">NO LAMPIRAN</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nobak" name="nobak" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						 
						<div class="form-group" id="group_att">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="komp[]" id="komponen1"/>
								<label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
							</div>
						</div>
						
						<div class="form-group" id="group_att1">
							<label class="col-sm-3 control-label">Dokumen BAK</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="komp[]" id="komponen2"/>
								<label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="group_att2">
							<label class="col-sm-3 control-label">Dokumen Lain</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="komp[]" id="komponen3"/>
								<label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<!--
						<div id='aww'>
							<button type="button" class="btn btn-default btn-sm" id="addmore">Add more attachment</button>
						</div>
						-->
						
						<!--
						<div id='awwx'>
							<button type="button" class="btn btn-default btn-sm" id="addmore1">Add more attachment</button>
						</div>
						--> 
						
						<div class="box-footer" id="ffgg">
							<button type="button" class="btn btn-primary pull-right" id="btn_submit1">Submit</button>
						</div>
						
						<div class="overlay1" id="overlay1">
						  <!--<i class="fa fa-refresh fa-spin"></i>--> <img src="<?php echo base_url('uploads/loading1.gif');?>" height="100" width="100" class="pull-right" />
						</div>
						
					</div><!-- /.box-body -->
			</div><!-- /.box -->
			
			
			<div class="box box-primary" id='yzyzy'>
			<!-- form start -->
					<div class="box-body">
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">PersonalArea</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="pppersa" name="pppersa" onchange="cariarea(this.value)" style="width:100%;"/>
									<option value="">Pilih</option>
									<?php echo $cmbpera ?>	
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Area</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="pparea" name="pparea" onchange="cariskill(this.value)" style="width:100%;"/>
									<option value="">Pilih</option>
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Skilllayanan</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="ppskill" name="ppskill" onchange="carijab(this.value)" style="width:100%;"/>
									<option value="">Pilih</option>	
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Jabatan</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="ppjab" name="ppjab" onchange="carilevel(this.value)" style="width:100%;"/>
									<option value="">Pilih</option>	
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Level</label>
							<div class="col-sm-9">
								<select class="form-control select2 pull-right" id="pplevel" name="pplevel" style="width:100%;"/>
									<option value="">Pilih</option>	
								</select>		
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">Jml Pekerja</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="ppjml" name="ppjml" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">Start Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="ppsp" name="ppsp" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">End Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="ppep" name="ppep" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="xdivnobak">
							<label class="col-sm-3 control-label">No Lampiran</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="ppnolam" name="ppnolam" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						 
						<div class="form-group" id="group_att">
							<label class="col-sm-3 control-label">Lampiran</label>
							<div class="col-sm-9">
								<input type="file" class="form-control pull-right" name="pplam[]" id="pplampiran"/>
								<label style="color:#FF0000; font-size:10px;">Max Size 5 MB</label>
							</div>
						</div>
						
						<div class="box-footer" id="ffggpp">
							<button type="button" class="btn btn-primary pull-right" id="btn_submit2">Submit</button>
						</div>
						
						<div class="ppoverlay" id="ppoverlay">
						  <img src="<?php echo base_url('uploads/loading1.gif');?>" height="100" width="100" class="pull-right" />
						</div>
					</div><!-- /.box-body -->
			</div><!-- /.box -->
			
		</div><!-- /.box -->
		
		
		<div class="col-md-7" id='lalay'>
			<div class="form-group">
				<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Personalarea</button>
				<select id="choosen" name="choosen[]" multiple class="form-control choosen" style="height:400px;"></select>
			</div>
		</div>
		
		<div class="col-md-7" id='lalax'>
			<div class="box box-primary divperner">
				<div class="form-group">
					<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Perner Resign/Rotasi</button>
					<!--<select id="xchoosen" name="xchoosen[]" multiple class="form-control xchoosen" style="height:400px;"></select>-->
					<table id="listperner" class="table table-bordered table-hover listperner">
						<thead>
							<tr>
								<th>Tanggal Resign/Rotasi</th>
								<th>Alasan</th>
								<th>Pelatihan</th>
								<th>Bekerja</th>
								<th>Replacement</th>
								<th>Type</th>
								<th>Perner Pengganti</th>
								<th>Perner</th>
								<th>Nama</th>
								<th>Area</th>
								<th>PersonalArea</th>
								<th>Skilllayanan</th>
								<th>Jabatan</th>
								<th>Level</th>
								<th>Training</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="box box-primary divpernerganti">
				<div class="form-group">
					<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Perner Pengganti</button>
					<!--<select id="xchoosen" name="xchoosen[]" multiple class="form-control xchoosen" style="height:400px;"></select>-->
					<table id="listpernerganti" class="table table-bordered table-hover listpernerganti">
						<thead>
							<tr>
								<th>Perner Resign/Rotasi</th>
								<th>Alasan Rotasi Pengganti</th>
								<th>Perner Pengganti</th>
								<th>Nama</th>
								<th>Area</th>
								<th>PersonalArea</th>
								<th>Skilllayanan</th>
								<th>Jabatan</th>
								<th>Level</th>
							</tr>
						</thead>
						<tbody>
						</tbody> 
					</table>
				</div>
			</div>
		</div>
		
		
		<div class="col-md-7" id='yayay'>
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Form Job Order</h3>
				</div><!-- /.box-header -->
					<div class="box-body divlistrincian">
						<div class="form-group" id="divrincian">
							<label class="col-sm-3 control-label">Rincian Kebutuhan</label>
							<div class="col-sm-9">
								<button type='button' class='btn btn-info btn-block btn-sm' data-toggle='modal' data-target='#myModal' data-backdrop='static' data-keyboard='false' id="tmbhrincian">Tambah Rincian Kebutuhan</button>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<table id="listrincian" class="table table-bordered table-hover listrincian">
							<thead>
								<tr>
									<th>ID</th>
									<th>Jabatan</th>
									<th>Kelamin</th>
									<th>Pendidikan</th>
									<th>Lokasi</th>
									<th>Waktu</th>
									<th>Atasan</th>
									<th>Kontrak</th>
									<th>Jumlah</th>
									<th>Level</th>
									<th>HK Pembagi</th>
									<th>Skilllayanan</th>
									<th>Training</th>
									<th>Tgl Pelatihan</th>
									<th>Tgl Bekerja</th>
									<th>Type Rekrut</th>
									<th>Perner No Rekrut</th>
									<th>Alasan Rotasi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<p></p><p></p><p></p>
					<div class="box-body divlistkomponen">
						<p></p>
						<div class="form-group" id="divkomponen">
							<label class="col-sm-12 control-label">Rincian Komponen Skema</label>							
						</div><!-- /.form group -->
						<table id="listkomponen" class="table table-bordered table-hover listkomponen">
							<thead>
								<tr>
									<th>ID</th>
									<th>Jabatan</th>
									<th>Lokasi</th>
									<th>Level</th>
									<th>Skilllayanan</th>
									<th>Komponen</th>
									<th>Value</th>
									<th>Keterangan</th>
									<th>Percentage</th>
									<!--<th>Perusahaan</th>
									<th>Karyawan</th>
									<th>JKK (Kecelakaan)</th>
									<th>JKM (Kematian)</th>
									<th>JHT (Perusahaan)</th>
									<th>JHT (Karyawan)</th>-->
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					
					<p></p><p></p><p></p>
					<div class="box-body divlistdoc">
						<p></p>
						<div class="col-xs-12">
							<label class="center_title_bar">Doc Checklist</label>
						</div>
						
						<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
						<?php foreach($rdoc as $list){ ?>
							<div class="col-md-4" style="margin-top:5px;">
								<input type="checkbox" name="kumdoc[]" id="kumdoc" value="<?php echo $list['doc_id'];?>"> <?php echo $list['doc_name'];?>
							</div>
						<?php } ?>
						</div>
					</div>
					
					<p></p><p></p><p></p>
					<div class="box-body divlistproc">
						<p></p>
						<div class="form-group" id="divproc">
							<label class="col-sm-3 control-label">Procurement</label>
							<div class="col-sm-9">
								<button type='button' class='btn btn-info btn-block btn-sm' data-toggle='modal' data-target='#PRmyModal' id="tmbhproc">Add Procurement</button>
							</div><!-- /.input group -->						
						</div><!-- /.form group -->
						<table id="listproc" class="table table-bordered table-hover listproc">
							<thead>
								<tr>
									<th>Periode</th>
									<th>Item</th>
									<th>Qty</th>
									<th>Spec</th>
									<th>Budget</th>
									<th>Tanggal 1</th>
									<th>Tanggal 2</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<!--
						<div class="box-footer">
							<button type="button" class="btn btn-primary pull-right" id="btn_submit">Submit</button>
						</div>
					-->
				</form>
			</div><!-- /.box -->
			<div class="modal fade" id="myModal" role="dialog" tabindex="-1">
			  <div class="modal-dialog" id="modal-alert">
				 <div class="modal-content">
					<div class="modal-header" style="background-color:blue; color:white;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Rincian Kebutuhan</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="haha">
							<div class="box-body">
								<div class="form-group" id="divtpeng">
									<label class="col-sm-3 control-label">Type Rekrut New</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="typepeng" name="typepeng"/>
											<option value="1">NO REKRUT</option>	
											<option value="2">REKRUT</option>
											<option value="3">NO REKRUT (EXISTING)</option>											
										</select>	
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divlatihann">
									<label class="col-sm-3 control-label">Tanggal Pelatihan</label>
									<div class="col-sm-9">
										<input type="text" class="form-control pull-right" id="latihan_n" name="latihan_n" />
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divbekerjan">
									<label class="col-sm-3 control-label">Tanggal Bekerja</label>
									<div class="col-sm-9">
										<input type="text" class="form-control pull-right" id="bekerja_n" name="bekerja_n"/>
									</div><!-- /.input group -->
								</div><!-- /.form group -->			
								
								<div class="form-group" id="divcategory">
									<label class="col-sm-3 control-label">Kategori Jabatan</label>
									<div class="col-sm-9">
										<input type="hidden" class="form-control pull-right" id="xmid" name="xmid" readonly />
										<select class="form-control pull-right" id="kategori">
											<option value="">Pilih Kategori</option>
											<?php echo $cmbkategori;?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								
								<div class="form-group" id="divjabatan">
									<label class="col-sm-3 control-label">Jabatan</label>
									<div class="col-sm-9">
										<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
										<select class="form-control pull-right" id="jabatan">
											<option value="">Pilih Jabatan</option>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								<div class="form-group" id="divgender">
									<label class="col-sm-3 control-label">Gender</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="gender">
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
										<select class="form-control pull-right" id="pendidikan">
											<option value="">Pilih Pendidikan</option>
											<?php echo $cmbpendidikan; ?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								
							
								<div class="form-group" id="divpropinsi">
									<label class="col-sm-3 control-label">Province</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="province">
											<option value="">Pilih Province</option>
											<?php echo $cmbprovince; ?>
										</select>
									</div>
								</div>
								
								<div class="form-group" id="divlokasi">
									<label class="col-sm-3 control-label">Lokasi Kerja</label>
									<div class="col-sm-9">
										<div class="Aoverlayz" id="Aoverlayz">
											  <i class="fa fa-refresh fa-spin"></i>
										</div>
										<select class="form-control pull-right" id="lokasi">
											<option value="">Pilih Lokasi</option>
										</select>
									</div>
								</div>
								
								
								<div class="form-group" id="divwaktu">
									<label class="col-sm-3 control-label">Waktu Kerja</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="waktu">
											<option value="">Pilihan</option>
											<option value="shifting">Shifting</option>
											<option value="office_hour">Office Hour</option>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								<div class="form-group" id="divatasan">
									<label class="col-sm-3 control-label">Atasan</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="atasan">
											<option value="">Pilih Atasan</option>
											<?php echo $cmbtgg; ?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								<div class="form-group" id="divkontrak">
									<label class="col-sm-3 control-label">Jenis Kontrak</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="kontrak">
											<option value="">Pilih Kontrak</option>
											<?php echo $cmbkontrak; ?>
										</select>
									</div><!-- /.input group -->
									
								</div><!-- /.form group -->
								
								<div class="form-group" id="divlevel">
									<label class="col-sm-3 control-label">Level Skema</label>
									<div class="col-sm-9">
										<select name="lskema" id="lskema" class="form-control pull-right">
											<option value=''>Pilih Level Skema</option>
											<?php echo $cmblskema; ?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divskil">
									<label class="col-sm-3 control-label">Skilllayanan</label>
									<div class="col-sm-9">
										<select name="lskillx" id="lskillx" class="form-control select2 pull-right" style="width:100%">
											<option value=''>Pilih Skilllayanan</option>
											<?php echo $cmb_skill ?>
											<?php /*foreach($cmb_skill as $cmb_skill){
												echo "<option value='".$cmb_skill->PERSK."'>".$cmb_skill->PTEXT." | ".$cmb_skill->PERSK."</option>";	
											}*/?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divjumlah">
									<label class="col-sm-3 control-label">Jumlah</label> 
									<div class="col-sm-9">
										<input type="text" class="form-control pull-right" id="jumlah" onkeyup="validAngka(this)">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divpnorek">
									<label class="col-sm-3 control-label">Perner No Rekrutment</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" id="pnorek" name="pnorek" placeholder="Ex: 10123;102456;109876" onkeyup="validAngkakoma(this)"/></textarea>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divalasanrot">
									<label class="col-sm-3 control-label">Alasan Rotasi</label>
									<div class="col-sm-9">
										<select class="form-control" id="alasanrot" name="alasanrot">
											<option value="">Pilih Alasan</option>
											<?php echo $cmbreason_ganti; ?>
										</select>		
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divwaktu">
									<label class="col-sm-3 control-label">Tahun Gaji</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="tgaji">
											<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
											<option value="<?php echo date('Y')+1; ?>"><?php echo date('Y')+1; ?></option>
											<option value="<?php echo date('Y')-1; ?>"><?php echo date('Y')-1; ?></option>
										</select>
									</div>
								</div>
								
								<div class="form-group" id="divwaktu">
									<label class="col-sm-3 control-label">Training</label>
									<div class="col-sm-9">
										<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
											<div class="col-md-6" style="margin-top:5px;">
												<input type="checkbox" name="kumtrain[]" id="kumtrain" value="1"> Softskill
											</div>
											<div class="col-md-6" style="margin-top:5px;">
												<input type="checkbox" name="kumtrain[]" id="kumtrain" value="2"> Hardskill
											</div>
											<div class="col-md-6" style="margin-top:5px;">
												<input type="checkbox" name="kumtrain[]" id="kumtrain" value="3"> Tandem Pasif
											</div>
											<div class="col-md-6" style="margin-top:5px;">
												<input type="checkbox" name="kumtrain[]" id="kumtrain" value="4"> Tandem Aktif
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</form>
					</div>
					<div class="modal-footer" style="background-color:blue; color:white;">
						<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
						<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
						<button type="button" class="btn btn-primary" id="addrincian" >NEXT</button>					
					</div>
				 </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			<div class="modal fade" id="PRmyModal" role="dialog" tabindex="-1">
			  <div class="modal-dialog" id="modal-alert">
				 <div class="modal-content">
					<div class="modal-header" style="background-color:blue; color:white;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Add Procurement</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="hoho">
							<div class="box-body">
								<div class="form-group" id="divitem">
									<label class="col-sm-2 control-label">Periode</label>
									<div class="col-sm-10">
										<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
										<select class="form-control pull-right" id="periode">
											<option value="1">1</option>
											<option value="2">2</option>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divitem">
									<label class="col-sm-2 control-label">Tanggal 1</label>
									<div class="col-sm-10">
										<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
										<input type="text" class="form-control pull-right" id="tgl1">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divitem">
									<label class="col-sm-2 control-label">Tanggal 2</label>
									<div class="col-sm-10">
										<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
										<input type="text" class="form-control pull-right" id="tgl2">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divitem">
									<label class="col-sm-2 control-label">Item</label>
									<div class="col-sm-10">
										<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
										<select class="form-control pull-right" id="item">
											<option value="">Pilih Item</option>
											<?php echo $cmbitem;?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divqty">
									<label class="col-sm-2 control-label">Qty</label> 
									<div class="col-sm-10">
										<input type="text" class="form-control pull-right" id="qty" onkeyup="validAngka(this)">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divspec">
									<label class="col-sm-2 control-label">Spec</label> 
									<div class="col-sm-10">
										<input type="text" class="form-control pull-right" id="spec">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="divbudget">
									<label class="col-sm-2 control-label">Budget</label> 
									<div class="col-sm-10">
										<input type="text" class="form-control pull-right" id="budget" onkeyup="validAngka(this)">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
							</div>
						</form>
					</div>
					<div class="modal-footer" style="background-color:blue; color:white;">
						<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
						<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="addproc" >Save</button>					
					</div>
				 </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			
			<div class="modal fade" id="EPRmyModal" role="dialog" tabindex="-1">
			  <div class="modal-dialog" id="modal-alert">
				 <div class="modal-content">
					<div class="modal-header" style="background-color:blue; color:white;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Procurement</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="hoho">
							<div class="box-body">
								<div class="form-group" id="edivitem">
									<label class="col-sm-2 control-label">Item</label>
									<div class="col-sm-10">
										<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
										<select class="form-control pull-right" id="eitem">
											<option value="">Pilih Item</option>
											<?php echo $cmbitem;?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="edivqty">
									<label class="col-sm-2 control-label">Qty</label> 
									<div class="col-sm-10">
										<input type="text" class="form-control pull-right" id="eqty">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="edivspec">
									<label class="col-sm-2 control-label">Spec</label> 
									<div class="col-sm-10">
										<input type="text" class="form-control pull-right" id="espec">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
								<div class="form-group" id="edivbudget">
									<label class="col-sm-2 control-label">Budget</label> 
									<div class="col-sm-10">
										<input type="text" class="form-control pull-right" id="ebudget">
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								
							</div>
						</form>
					</div>
					<div class="modal-footer" style="background-color:blue; color:white;">
						<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
						<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="editproc" >Save</button>					
					</div>
				 </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
		</div><!-- /.box -->

		<!--add scheme modal -->
		<div class="modal fade" id="EModal" name="EModal" role="dialog" tabindex="-1">
				  <div class="modal-dialog" id="modal-alert" style="width:850px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color: blue; color:white;">
							<button type="button" id="closing" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Add Skema</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" id="haha">
								<div class="box-body">							

									<div class="form-group" id="divval">
										<label class="col-sm-2 control-label">Jabatan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="jabx" readonly>
											<input type="hidden" class="form-control pull-right" id="kodejabx" readonly>
											<input type="hidden" class="form-control pull-right" id="kodekont" readonly>
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divval">
										<label class="col-sm-2 control-label">Lokasi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="lokasix" readonly >
											<input type="hidden" class="form-control pull-right" id="kodelokasix" readonly >
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								

									<div class="form-group" id="divhkx">
										<label class="col-sm-2 control-label">HK Pembagi</label>
										<div class="col-sm-9">
											<!--<input type="text" class="form-control pull-right" id="hkpembagix" >-->
											<select class="form-control pull-right" id="hkpembagix">
												<?php for($i=1;$i<=30;$i++){ ?>
												<option value=<?php echo $i; ?>><?php echo $i; ?></option>
												<!--<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>-->
												<?php } ?>
											</select>
											
											<!--<input type="text" class="form-control pull-right" id="umpx" >-->
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divumpx">
										<label class="col-sm-2 control-label">UMP</label>
										<div class="col-sm-9">
											<div class="zoverlayz" id="zoverlayz">
											  <i class="fa fa-refresh fa-spin"></i>
											</div>
											<input type="text" class="form-control pull-right" id="umpx" readOnly>
											<input type="hidden" class="form-control pull-right" id="mandator" >
											<input type="hidden" class="form-control pull-right" id="fixed" >
										</div>
									</div>
									
									<div class="form-group" id="divjskema">
										<label class="col-sm-2 control-label">Skema</label>
										<div class="col-sm-9">
											<select class="form-control pull-right" id="jskema">
												<option value="1">NEW</option>
												<option value="2">EXISTING</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="divmanskema">
										<label class="col-sm-2 control-label">Mandatory Skema</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="nm_mandator" >
										</div>
									</div>
									
									
									<div class="form-group" id="divmapilbpjs">
										<label class="col-sm-2 control-label">Pilihan BPJS</label>
										<div class="col-sm-9">
											<select class="form-control pull-right" id="jpbpjs">
												<option value="1">Kelompok I (tingkat risiko sangat rendah) : 0,24% dari upah sebulan</option>
												<option value="2">Kelompok II (tingkat risiko rendah) : 0,54% dari upah sebulan</option>
												<option value="3">Kelompok III (tingkat risiko sedang) : 0,89% dari upah sebulan</option>
												<option value="4">Kelompok IV (tingkat risiko tinggi) : 1,27% dari upah sebulan</option>
												<option value="5">Kelompok V (tingkat risiko sangat tinggi) : 1,74% dari upah sebulan</option>
											</select>
										</div>
									</div>
									
									
									<div class="nav-tabs-custom">
										<ul class="nav nav-tabs">
										  <li class="active" style="background-color:gray;"><a href="#tab_1" data-toggle="tab">Input Skema</a></li>
										 <!-- <li style="background-color:gray;"><a href="#tab_2" data-toggle="tab">Upload Skema Excel</a></li> -->
										</ul>
										<div class="tab-content">
										  <div class="tab-pane active" id="tab_1">
												<div id="allskema">	
													<button type="button" class="btn btn-default btn-sm" id="addmorekompx">Add more komponen Fixed</button>
													<table id="tkomp" class="table table-bordered table-hover" style="width:750px;">
													<thead style="background-color: blue; color:white;">
														<tr>
															<th width='250px;'>Komponen Fixed</th>	
															<!--<th width="5%"></th>-->
															<th width='250px;'>Value</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Keterangan</th>	
															<!--<th width="5%"></th>-->
															<!--<th width="20%"></th>-->	
														</tr>
													</thead>
													<tbody>
														
														<tr>
															<td>
																<select name="kompx1" id="kompx1" class="kompx form-control select2" onchange="getsifat(this,'1','1')" style="width:250px">
																	<option value=''></option>
																	<?php //echo $cmbkomp; ?>
																</select>
															</td>	
															<!--<td width="5%"></td>-->  
															<td id="haha" >
																<input type="text" class="form-control pull-right" id="valuex1" name="valuex" style="width:250px" onchange="hitung(this,'1','1')">
															</td>
															<!--<td width="5%"></td>-->
															<td>
																<select class="form-control pull-right" id="ketx1" style="width:250px">
																	<!--<option value="">Pilih</option>-->
																</select>
															</td>										
														</tr>
														
													</tbody>
													</table>
													
													<br>
													<div id="divmorekomp">
													

													</div>
													
													<button type="button" class="btn btn-default btn-sm" id="vaddmorekompx">Add more komponen Variabel</button>
													<table id="tkomp_var" class="table table-bordered table-hover" style="width:750px;">
													<thead style="background-color: blue; color:white;">
														<tr>
															<th width='250px;'>Komponen Variabel</th>	
															<!--<th width="5%"></th>-->
															<th width='250px;'>Value</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Keterangan</th>	
															<!--<th width="5%"></th>-->
															<!--<th width="20%"></th>-->	
														</tr>
													</thead>
													<tbody>
														
														<tr>
															<td>
																<select name="vkompx1" id="vkompx1" class="vkompx form-control select2" onchange="getsifat(this,'1','2')" style="width:250px">
																	<option value=''></option>
																	<?php //echo $cmbkomp; ?>
																</select>
															</td>	
															<!--<td width="5%"></td>-->
															<td id="haha" >
																<input type="text" class="form-control pull-right" id="vvaluex1" name="vvaluex" style="width:250px">
															</td>
															<!--<td width="5%"></td>-->
															<td>
																<select class="form-control pull-right" id="vketx1" style="width:250px">
																	<!--<option value="">Pilih</option>-->
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<!--<th width="20%"></td>-->											
														</tr>
														
													</tbody>
													</table>
													
													<br>
													
													<button type="button" class="btn btn-default btn-sm" id="baddmorekompx">Add more komponen Benefit</button>
													<table id="tkomp_ben" class="table table-bordered table-hover" style="width:750px;">
													<thead style="background-color: blue; color:white;">
														<tr>
															<th width='250px;'>Komponen Benefit</th>	
															<!--<th width="5%"></th>-->
															<th width='250px;'>Value</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Keterangan</th>	
															<!--<th width="5%"></th>-->
															<!--<th width="20%"></th>-->	
														</tr>
													</thead> 
													<tbody>
														
														<tr>
															<td><input type="text" class="nketb form-control pull-right" id="nketb1" name="nketb" value="BPJS TK PERUSAHAAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb1" name="kketb" value="4066"></td>	
															<td id="haha" >
																<input type="text" class="form-control" id="pbtkp1" name="ppbtkp" style="width:60px" value="9.24">% &nbsp;<input type="text" class="form-control" id="vbtkp1" name="vvbtkp" style="width:172px" readonly=readonly>
															</td>
															<td><input type="text" class="form-control pull-right" id="bketb1" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
														</tr>
														
														<tr>
															<td><input type="text" class="nketb form-control pull-right" id="nketb2" name="nketb" value="BPJS TK KARYAWAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb2" name="kketb" value="4065"></td>	
															<td id="haha" >
																<input type="text" class="form-control" id="pbtkp2" name="ppbtkp" style="width:60px" value="0">% &nbsp;<input type="text" class="form-control" id="vbtkp2" name="vvbtkp" style="width:172px" readonly=readonly>
															</td>
															<td><input type="text" class="form-control pull-right" id="bketb2" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
														</tr>
														
														<tr>
															<td><input type="text" class="nketb form-control pull-right" id="nketb3" name="nketb" value="BPJS KESEHATAN PERUSAHAAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb3" name="kketb" value="4058"></td>	
															<td id="haha" >
																<input type="text" class="form-control" id="pbtkp3" name="ppbtkp" style="width:50px" value="5">% &nbsp;<input type="text" class="form-control" id="vbtkp3" name="vvbtkp" style="width:182px" readonly=readonly>
															</td>
															<td><input type="text" class="form-control pull-right" id="bketb3" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
														</tr>
														
														<tr>
															<td><input type="text" class="nketb form-control pull-right" id="nketb4" name="nketb" value="BPJS KESEHATAN KARYAWAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb4" name="kketb" value="8002"></td>	
															<td id="haha" >
																<input type="text" class="form-control" id="pbtkp4" name="ppbtkp" style="width:50px" value="0">% &nbsp;<input type="text" class="form-control" id="vbtkp4" name="vvbtkp" style="width:182px" readonly=readonly>
															</td>
															<td><input type="text" class="form-control pull-right" id="bketb4" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
														</tr>
														
														<tr>
															<td>
																<select name="bkompx1" id="bkompx1" class="bkompx form-control select2" onchange="getsifat(this,'1','3')" style="width:250px">
																	<option value=''></option>
																	<?php //echo $cmbkomp; ?>
																</select>
															</td>	
															<!--<td width="5%"></td>-->
															<td id="haha" >
																<input type="text" class="form-control pull-right" id="bvaluex1" name="bvaluex" style="width:250px">
															</td>
															<!--<td width="5%"></td>-->
															<td>
																<select class="form-control pull-right" id="bketx1" style="width:250px">
																	<option value="">Pilih</option>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<!--<th width="20%"></td>-->											
														</tr>
														
														<tr id="wewek1" style="display:none;">
															<td>
																<input type='text' class='form-control pull-right' id='nvaluex1' name='nvaluex1' value='Perusahaan' readOnly>
															</td>
															<td>
																<input type='text' class='form-control pull-right' id='pvaluex1' name='pvaluex1' readOnly>
															</td>
															<td>
															
															</td>
														</tr>
														
														<tr id="wuwuk1" style="display:none;">
															<td>
																<input type='text' class='form-control pull-right' id='mvaluex1' name='mvaluex1' value='Karyawan' readOnly>
															</td>
															<td>
																<input type='text' class='form-control pull-right' id='kvaluex1' name='kvaluex1' readOnly>
															</td>
															<td>
															
															</td>
														</tr>
														
														<tr id="zozok1" style="display:none;">
															<td>
																<input type='text' class='form-control pull-right' id='nkpvaluex1' name='nkpvaluex1' value='JKK Kecelakaan' readOnly>
															</td>
															<td>
																<input type='text' class='form-control pull-right' id='kpvaluex1' name='kpvaluex1' readOnly>
															</td>
															<td>
															
															</td>
														</tr>
														
														<tr id="zazak1" style="display:none;">
															<td>
																<input type='text' class='form-control pull-right' id='nkkvaluex1' name='nkkvaluex1' value='JKM Kematian' readOnly>
															</td>
															<td>
																<input type='text' class='form-control pull-right' id='kkvaluex1' name='kkvaluex1' readOnly>
															</td>
															<td>
															
															</td>
														</tr>
														
														<tr id="zuzuk1" style="display:none;">
															<td>
																<input type='text' class='form-control pull-right' id='nkqvaluex1' name='nkqvaluex1' value='JHT Perusahaan' readOnly>
															</td>
															<td>
																<input type='text' class='form-control pull-right' id='kqvaluex1' name='kqvaluex1' readOnly>
															</td>
															<td>
															
															</td>
														</tr>
														
														<tr id="zezek1" style="display:none;">
															<td>
																<input type='text' class='form-control pull-right' id='nkmvaluex1' name='nkmvaluex1' value='JHT Karyawan' readOnly>
															</td>
															<td>
																<input type='text' class='form-control pull-right' id='kmvaluex1' name='kmvaluex1' readOnly>
															</td>
															<td>
															
															</td>
														</tr>
														
													</tbody>
													</table>
												</div>
										  </div><!-- /.tab-pane -->
										  
										  <div class="tab-pane" id="tab_2">
												<div class="form-group" id="group_att3">
													<div class="col-sm-6"><input type="file" id="excelfile" class="form-control" /></div> 
													<div class="col-sm-2">
														 <input type="button" class="btn btn-primary" id="viewfile" value="Upload To Table" onclick="ExportToTable()" />
													</div>
													<div class="col-sm-4">
														 <a href="<?php echo base_url().'procurement/test.xlsx';?>" target="_blank" style="color:#FF6633;"><input type="button" class="btn btn-primary" value="Download Template" /></a>
													</div>
												</div> 
												<br />  
												<br />  
												<table id="exceltable" class="table table-bordered table-hover" style="width:750px;">
													<tr style="background-color:blue; color:white;">
														<th>KODE</th>
														<th>NAMA</th>
														<th>VALUE</th>
														<th>KETERANGAN</th>
													</tr>
												</table>
										  </div><!-- /.tab-pane -->
										</div><!-- /.tab-content -->
									</div><!-- nav-tabs-custom -->
			  
									
									<!--
									<div class="form-group" id="divkompx1">
										<label class="col-sm-3 control-label">Komponen</label>
										<div class="col-sm-9">
											<select name="kompx1" id="kompx1" class="kompx form-control select2" style="width:400px;" onchange="getsifat(this,'1')">
												<option value=''></option>
												<?php //echo $cmbkomp; ?>
											</select>
										</div>
									</div>

									<div class="form-group" id="divvaluex1">
										<label class="col-sm-3 control-label">Value</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="valuex1" >
										</div>
									</div>

									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Keterangan</label>
										<div class="col-sm-9">
											<select class="form-control pull-right" id="ketx1">
												<option value="">Pilih Keterangan</option>
											</select>
										</div>							
									</div>
									-->
									
									<!--<button type="button" class="btn btn-default btn-sm" id="addmorekompx">Add more komponen</button>-->
									
								</div>
							</form>
						</div>
						<div class="modal-footer" style="background-color: blue; color:white;">
							<button type="button" class="btn btn-primary pull-left" id="btncancel">Cancel</button> 
							<button type="button" class="btn btn-primary" data-dismiss="modal" id="addkomponen">Save changes</button>						
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->	


				<!--add scheme modal -->
				<div class="modal fade" id="Komodal" name="Komodal">
				  <div class="modal-dialog" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Add Skema</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" id="haha">
								<div class="box-body">
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">ZParameter</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="zpar" >
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Start Date</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="sdateskem" >
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">End Date</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="edateskem" >
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Personal Area</label>
										<div class="col-sm-9">
											<!-- <input type="text" class="form-control pull-right" id="ear" readonly/> -->
											<select name="lpersax" id="lpersax" class="form-control select2" style="width:400px;">
												<option value=''></option>
												<?php foreach($cmb_persa as $cmb_persa){
													
													echo "<option value='".$cmb_persa->kd_persa."'>".$cmb_persa->kd_persa." | ".$cmb_persa->persa."</option>";	
												}?>
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Area</label>
										<div class="col-sm-9">
											<!-- <input type="text" class="form-control pull-right" id="ear" readonly/> -->
											<select name="lareax" id="lareax" class="form-control select2" style="width:400px;">
												<option value=''></option>
												<?php foreach($cmb_area as $cmb_area){
													
													echo "<option value='".$cmb_area->AREA."'>".$cmb_area->AREA." | ".$cmb_area->AREA_TEXT."</option>";	
												}?>
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Jabatan</label>
										<div class="col-sm-9">
											<!-- <input type="text" class="form-control pull-right" id="ear" readonly/> -->
											<select name="ljabx" id="ljabx" class="form-control select2" style="width:400px;">
												<option value=''></option>
												<?php foreach($cmb_jabatan as $cmb_jabatan){
													
													echo "<option value='".$cmb_jabatan->OBJID."'>".$cmb_jabatan->OBJID." | ".$cmb_jabatan->STEXT."</option>";	
												}?>
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Skilllayanan</label>
										<div class="col-sm-9">
											<select name="lskill" id="lskill" class="form-control select2" style="width:400px;">
												<option value=''></option>
												<?php foreach($cmb_skill as $cmb_skill){
													
													echo "<option value='".$cmb_skill->PERSK."'>".$cmb_skill->PERSK." | ".$cmb_skill->PTEXT."</option>";	
												}?>
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">HK Pembagi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="hkpembagix" >
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">UMP</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="umpx" >
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" >Cancel</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_edit">Save changes</button>						
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->	
				
				
				
			

	</div><!-- /.row -->
</section>
</div><!-- /.content-wrapper -->



<script type="text/javascript">
function ExportToTable() {  
     var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
     /*Checks whether the file is a valid excel file*/  
     if (regex.test($("#excelfile").val().toLowerCase())) {  
         var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
         if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {  
             xlsxflag = true;  
         }  
         /*Checks whether the browser supports HTML5*/  
         if (typeof (FileReader) != "undefined") {  
             var reader = new FileReader();  
             reader.onload = function (e) {  
                 var data = e.target.result;  
                 /*Converts the excel data in to object*/  
                 if (xlsxflag) {  
                     var workbook = XLSX.read(data, { type: 'binary' });  
                 }  
                 else {  
                     var workbook = XLS.read(data, { type: 'binary' });  
                 }  
                 /*Gets all the sheetnames of excel in to a variable*/  
                 var sheet_name_list = workbook.SheetNames;  
  
                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
                     /*Convert the cell value to Json*/  
                     if (xlsxflag) {  
                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                     }  
                     else {  
                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                     }  
                     if (exceljson.length > 0 && cnt == 0) {  
                         BindTable(exceljson, '#exceltable');  
                         cnt++;  
                     }  
                 });  
                 $('#exceltable').show();  
             }  
             if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                 reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
             }  
             else {  
                 reader.readAsBinaryString($("#excelfile")[0].files[0]);  
             }  
         }  
         else {  
             alert("Sorry! Your browser does not support HTML5!");  
         }  
     }  
     else {  
         alert("Please upload a valid Excel file!");  
     }  
 } 
 
 
 function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
     var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/  
     for (var i = 0; i < jsondata.length; i++) {
		 //console.log($abc);
		 var row$ = $('<tr/>');  
		 for (var colIndex = 0; colIndex < columns.length; colIndex++) {  
			if(colIndex==0){
				var cellValue = jsondata[i][columns[colIndex]];  
				if (cellValue == null)  
					 cellValue = ""; 
				row$.append($('<td/>').html('<input type="text" class="tkodez" id="tkodez'+i+'" name="tkodez'+i+'" value=\''+cellValue+'\' readonly=readonly/>'));  
			}  
			else if(colIndex==1) {
				var cellValue = jsondata[i][columns[colIndex]];  
				if (cellValue == null)  
					 cellValue = "";
				row$.append($('<td/>').html('<input type="text" class="tnamaz" id="tnamaz'+i+'" name="tnamaz'+i+'" value=\''+cellValue+'\' readonly=readonly/>'));
			}
			else if(colIndex==2) {
				var cellValue = jsondata[i][columns[colIndex]];  
				if (cellValue == null)  
					 cellValue = "";
				row$.append($('<td/>').html('<input type="text" class="tvalz" id="tvalz'+i+'" name="tvalz'+i+'" value=\''+cellValue+'\' readonly=readonly/>'));
			}
			else if(colIndex==3) {
				var cellValue = jsondata[i][columns[colIndex]];  
				if (cellValue == null)  
					 cellValue = "";
				row$.append($('<td/>').html('<input type="text" class="tketz" id="tketz'+i+'" name="tketz'+i+'" value=\''+cellValue+'\' readonly=readonly/>'));
			}
			//row$.append($('<td/>').html(cellValue));  
		 }  
		 var abc = jsondata[i][columns[2]];
		 //console.log($abc);
		 if( (abc!=undefined) || (abc!=null) ){
			 $(tableid).append(row$);  
		 }
     }  
 }  
 
 function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
     var columnSet = [];  
     var headerTr$ = $('<tr/>');  
     for (var i = 0; i < jsondata.length; i++) {  
         var rowHash = jsondata[i];  
         for (var key in rowHash) {  
             if (rowHash.hasOwnProperty(key)) {  
                 if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/  
                     columnSet.push(key);  
                     headerTr$.append($('<th/>').html(key));  
                 }  
             }  
         }  
     }  
     //$(tableid).append(headerTr$);  
     return columnSet;  
 } 
 </script>