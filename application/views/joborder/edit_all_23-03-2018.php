<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">

<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<style>
 .divlistrincian{ overflow-x: scroll; }
 .listrincian{margin:40px auto 0px auto; }
 
 .divlistkomponen{ overflow-x: scroll; }
 .listkomponen{margin:40px auto 0px auto; }

 .divlistkompx{ overflow-x: scroll; }
 .listkompx{margin:40px auto 0px auto; }
 
 .divlistrincianx{ overflow-x: scroll; }
 .listrincianx{margin:40px auto 0px auto; }
</style>
		
<script type="text/javascript">
	$(document).ready(function(){
		$('#tanggal').datepicker({format: 'yyyy-mm-dd',startDate : '0', autoclose:true});
		$('#latihan').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#bekerja').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#tgl1').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#tgl2').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#overlay').hide();
		$('#overlay1').hide();
		$('#yeyey').hide();
		$('#lalay').hide();
		//$('#divtre').show();
		//$('#divnrespax').hide();
		//$('#divnprojectx').hide();
		//$('#group_att1').hide();
		$('#group_att2').hide();
		//$('#group_att4').hide();
		$('#group_att5').hide();
		//$('#awwx').hide();
		//$('#akkx').hide();
		document.getElementById("tgl2").disabled = true;
		
		//$("#respa").select2().select2('val','B416');
		//$('#respa').select2('data', {id: 'B416', text: 'HCC PLASA TELKOM'});
		
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
						k: $("#xrespax").val()
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
			var value = $("#xpernerx").select2('data')[0]['id'];
			var text = $("#xpernerx").select2('data')[0]['text'];
			document.getElementById("xpernerx").disabled = true;
			
			var url = "<?php echo base_url(); ?>index.php/mapping/cek_perner_aktif";
			$.post(url, {data:value}, function(response){
				if(response=='false'){
					$.ajax({
						type 		: "POST",
						url		: "<?php echo base_url('index.php/mapping/detail_perner/');?>",
						dataType	: "json",
						data		: {anojo:value},
						success	: function(res){
							document.getElementById("xpernerx").disabled = false;
							$('#listperner> tbody:last-child').append('<tr><td class=nperner>'+res.PERNR+'</td><td class=nnama>'+res.cname+'</td><td class=narea>'+res.btrtx+'</td><td class=npersa>'+res.wktxt+'</td><td class=nskill>'+res.pektx+'</td><td class=njabatan>'+res.platx+'</td>'+'</td><td class=nlevel>'+res.pektx+'</td><td class=karea style=display:none>'+res.btrtl+'</td><td class=kpersa style=display:none>'+res.werks+'</td><td class=kskill style=display:none>'+res.persk+'</td><td class=klevel style=display:none>'+res.persk+'</td></tr>');	
						}
					})
				}
				else
				{
					alert('Data belum diresignkan !!');
					return false;
				}
			})
		})
		
		/*
		$("#spa").change(function(){
			var group = $("#spa").select2('data')[0]['id'];
			var url = "<?php echo base_url(); ?>index.php/home/pilih_area";
			$.post(url, {data:group}, function(response){
				$("#sare").html(response);
			})
		});
		*/
		
		$("#periode").change(function(){
			var jper = $("#periode").val();
			if(jper=='1') {
				document.getElementById("tgl2").disabled = true;
				$("#tgl2").val('');
			} else {
				document.getElementById("tgl2").disabled = false;
			}
		});
		
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
		});
		
		
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
				$("#vbtkp1").val(ghj);
				var klm = (def/100)*tot;
				$("#vbtkp2").val(klm);
				$("#pbtkp2").val(def);
			}
		});
		
		
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
				$("#vbtkp2").val(ghj);
				var klm = (yay/100)*tot;
				$("#vbtkp1").val(klm);
				$("#pbtkp1").val(yay);
			}
			
		});
		
		
		
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
				$("#vbtkp3").val(ghj);
				var klm = (def/100)*tot;
				$("#vbtkp4").val(klm);
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
				$("#vbtkp4").val(ghj);
				var klm = (yay/100)*tot;
				$("#vbtkp3").val(klm);
				$("#pbtkp3").val(yay);
			}
			
		});
		
		
		
		$("#typenew").change(function(){
				var tnew = $("#typenew").val();
				if (tnew == '1'){
					//$('#divnrespax').hide();
					$('#divnrespa').hide();
					//$('#divnprojectx').show();
					$('#divnproject').hide();
					$('#divpropinsi').show();
				}
				else
				{
					//$('#divnrespax').show();
					$('#divnrespa').hide();
					//$('#divnprojectx').hide();
					$('#divnproject').hide();
					$('#divpropinsi').hide();
				}
			
		});
		
		
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
			
			
			//$('#listproc > tbody:last-child').append('<tr><td class=litem>'+ item +'</td><td class=lqty>'+ qty +'</td><td class=lspec>'+ spec +'</td><td class=lbudget>'+ budget +'</td><td><button type=button class="btn btn-primary btn-block btn-xs btnedit_proc" data-toggle=modal data-target=#EPRmyModal>Edit</button></td><td class=litemz style=display:none>'+ itemz +'</td></tr>');
			
			$('#listproc > tbody:last-child').append('<tr><td class=lperiode>'+ periode +'</td><td class=litem>'+ item +'</td><td class=lqty>'+ qty +'</td><td class=lspec>'+ spec +'</td><td class=lbudget>'+ budget +'</td><td class=ltgl1>'+ tgl1 +'</td><td class=ltgl2>'+ tgl2 +'</td><td>-</td><td class=litemz style=display:none>'+ itemz +'</td></tr>');
			
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
			});
			
			$('#item').val('');
			$('#qty').val('');
			$('#spec').val('');
			$('#budget').val('');
		})
		
		
		$("#typejo").change(function(){
			var tejo = $("#typejo").val();
			if (tejo == '3'){
				$('#yeyey').show();
				$('#yuyuy').hide();
				$('#yayay').hide();
				$('#lalay').show();
			}
			else
			{
				if (tejo == '2'){
					$('#divtre').show();
					$('#divtnew').hide();
					$('#divpropinsi').hide();
					$('#divnproject').hide();
					$('#divnrespa').show();
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
					$('#divnproject').show();
					
				}
				else
				{
					$('#divtre').hide();
					$('#divtnew').hide();
					$('#divpropinsi').hide();
					$('#divnproject').hide();
					$('#divnrespa').show();
					
				}
				$('#yeyey').hide();
				$('#yuyuy').show();
				$('#yayay').show();
				$('#lalay').hide();
			}
		});
		
		
		$("#addmore1").click(function(){
				$('#group_att2').show();
				$('#aww').hide();
				$('#awwx').hide();
		});
		
		
		$("#addmore3").click(function(){
				$('#group_att5').show();
				$('#akk').hide();
				$('#akkx').hide();
		});
		
		
		$('body').on('click', '#btn_simpan', function(e){
				$('#overlay').show();
				$('#ggff').hide();
				var nojok 			= $('#nojok').val(); 
				var typere 			= $('#typere').val(); 
				//var type_jo 		= "New";
				var type_jo 		= $('#typejo').val(); 
				var tnew 			= $('#typenew').val(); 
				var tanggal 		= $('#tanggal').val();
				//var project			= $('#respa :selected').val();
				var krespa				= $('#respa').val();
				var project 			= $('#project').val();
				//alert(project);
		
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
				var approv 			= $('#approv').val(); 
				var komponen1		= $('#komponen1').val(); 
				var komponen2 		= $('#komponen2').val(); 
				var komponen3 		= $('#komponen3').val(); 
				var jenisproject 	= $('#jenisproject').val();
				var tjo 			= $('#tjo').val();
				var xnobak 			= $('#nobak').val();
				
				if (tjo == '2'){
					if(typere == "" )
					{
						alert('Type Replacement tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divtre').attr('class','form-group has-error'); return false;} else if (typere != ""){$('#divtre').attr('class','form-group')
					}
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
				
				if(xnobak == "" )
				{
					alert('No BAK tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divnobak').attr('class','form-group has-error'); return false;} else if (xnobak != ""){$('#divnobak').attr('class','form-group')
				}
				
				if(tjo == '4') {
					if (respa == "" )
					{
						alert('PersonalArea tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divnrespa').attr('class','form-group has-error'); return false;} else if (respa != ""){$('#divnrespa').attr('class','form-group')
					}
				}
				else if (tjo == '1')
				{
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
				
				
				if (tjo == '1')
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
				
				if (latihan == "" )
				{
					alert('Tanggal Pelatihan tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divlatihan').attr('class','form-group has-error'); return false;} else if (latihan != ""){$('#divlatihan').attr('class','form-group')
				}
				
				if (bekerja == "" )
				{
					alert('Tanggal Bekerja tidak boleh kosong');
					$('#overlay').hide();$('#ggff').show();

					$('#divbekerja').attr('class','form-group has-error'); return false;} else if (bekerja != ""){$('#divbekerja').attr('class','form-group')
				}
				/*
				if (komponen1 == "" )
				{
					alert('Anda harus menyertakan dokumen skema');
					$('#overlay').hide();
					$('#ggff').show();
					$('#group_att3').attr('class','form-group has-error'); return false;} else if (komponen1 != ""){$('#group_att3').attr('class','form-group')
				}
			
				if (komponen2 == "" )
				{
					alert('Anda harus menyertakan dokumen bak');
					$('#overlay').hide();
					$('#ggff').show();
					$('#group_att4').attr('class','form-group has-error'); return false;} else if (komponen2 != ""){$('#group_att4').attr('class','form-group')
				}
				*/
				
				
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
					lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskema_text, lskillx, lskillx_text, n_ljabatan, n_llokasi, kump, tot];
					//lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskillx];
					lrincian += ',';
				})
				/*
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
					var kkar = $(this).find(".kkar").html();
					var jkk = $(this).find(".jkk").html();
					var jkm = $(this).find(".jkm").html();
					var jhtp = $(this).find(".jhtp").html();
					var jhtk = $(this).find(".jhtk").html();
					//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
					lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, khk, kump, kper, kkar, jkk, jkm, jhtp, jhtk];
					lkomponen += ',';
				});	
				*/
				
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
					//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
					lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, khk, kump, kper];
					lkomponen += ',';
				});	
				
				var lperner=[];
				$('#listperner tbody tr').each(function(){
					var nperner = $(this).find(".nperner").html();
					var nnama = $(this).find(".nnama").html();
					var narea = $(this).find(".narea").html();
					var npersa = $(this).find(".npersa").html();
					var nskill = $(this).find(".nskill").html();
					var njabatan = $(this).find(".njabatan").html();
					var nlevel = $(this).find(".nlevel").html();
					var karea = $(this).find(".karea").html();
					var kpersa = $(this).find(".kpersa").html();
					var kskill = $(this).find(".kskill").html();
					var klevel = $(this).find(".klevel").html();
					//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
					lperner += [nperner, nnama, narea, npersa, nskill, njabatan, nlevel, karea, kpersa, kskill, klevel];
					lperner += ',';
				});
				
				/*
				var lproc=[];
				$('#listproc tbody tr').each(function(){
					var litem = $(this).find(".litem").html();
					var lqty = $(this).find(".lqty").html();
					var lspec = $(this).find(".lspec").html();
					var lbudget = $(this).find(".lbudget").html();
					var litemz = $(this).find(".litemz").html();
					//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
					lproc += [litem, lqty, lspec, lbudget, litemz];
					lproc += ',';
				});
				*/
				
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
				
				var vkumdoc = [];
				$('#kumdoc:checked').each(function(i){
				  vkumdoc[i] = $(this).val();
				});
				var vkumdocx 		= vkumdoc.join(';');
				
				
				if (lrincian == "" )
				{
					var lrincian="";
				}
				else
				{
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
						lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskema_text, lskillx, lskillx_text, n_ljabatan, n_llokasi, kump, tot];
						//lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskillx];
						lrincian += ',';
					})
				}
				
				
				if (lkomponen == "" )
				{
					var lkomponen="";
				}
				else
				{
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
						//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
						lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, khk, kump, kper];
						lkomponen += ',';
					});	
				}
				
				
				if (lperner == "" )
				{
					var lperner="";
				}
				else
				{
					var lperner=[];
					$('#listperner tbody tr').each(function(){
						var nperner = $(this).find(".nperner").html();
						var nnama = $(this).find(".nnama").html();
						var narea = $(this).find(".narea").html();
						var npersa = $(this).find(".npersa").html();
						var nskill = $(this).find(".nskill").html();
						var njabatan = $(this).find(".njabatan").html();
						var nlevel = $(this).find(".nlevel").html();
						var karea = $(this).find(".karea").html();
						var kpersa = $(this).find(".kpersa").html();
						var kskill = $(this).find(".kskill").html();
						var klevel = $(this).find(".klevel").html();
						//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
						lperner += [nperner, nnama, narea, npersa, nskill, njabatan, nlevel, karea, kpersa, kskill, klevel];
						lperner += ',';
					});
				}
				
				
				if (lproc == "" )
				{
					var lproc="";
				}
				else
				{
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
				}
				
				e.preventDefault();
				var formData = new FormData($(this).parents('form')[0]);

				$.ajax({
					url: '<?php echo base_url("index.php/home/s_edit_all") ?>',
					//url: 'upload.php',
					type: 'POST',
					//dataType   : 'json',
					xhr: function() {
						var myXhr = $.ajaxSettings.xhr();
						return myXhr;
					},
					success: function (data) { 
							//alert(data);
							
							if(tjo==2){
								var url = "<?php echo base_url(); ?>index.php/home/s_perner_simpan/";
								var	type 		= "POST";
								var mimeType    = "multipart/form-data";
								arrjoborder = [tanggal, lama, latihan, bekerja, tjo, typere, xnobak, approv, nojok, lperner];
								$.post(url, {joborder:arrjoborder}, function(resp){
									$('#overlay').hide();
									//alert(resp);
									alert('Data Tersimpan');
									if(approv=='atasan')
									{
										location.href="<?php echo base_url();?>index.php/home/appjo/";
									}
									else
									{
										location.href="<?php echo base_url();?>index.php/home/listorder/";
									}
								});
							} else {
								var url = "<?php echo base_url(); ?>index.php/home/s_edit_simpan_all/";
								var	type 		= "POST";
								var mimeType    = "multipart/form-data";
								var sapi = vkumdocx; 
								arrjoborder = [tanggal, project, syarat, deskripsi, lama, latihan, bekerja, tjo, lrincian, typere, nojok, approv, krespa, respa, tnew, xnobak, lkomponen, lproc, vkumdocx];
								$.post(url, {joborder:arrjoborder,sapi:sapi}, function(resp){
									$('#overlay').hide();
									//custom_alert(resp);
									//alert(resp);
									alert('Data Tersimpan');
									if(approv=='atasan')
									{
										location.href="<?php echo base_url();?>index.php/home/appjo/";
									}
									else
									{
										location.href="<?php echo base_url();?>index.php/home/listorder/";
									}
									
								});
							}
							
					},
					data: formData,
					cache: false,
					contentType: false,
					processData: false
				});
				return false;
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
			document.getElementById("haha").reset();
			var tejo = $("#tjo").val(); 
			var tnew = $("#typenew").val();
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
					var group 	= $('#respa :selected').val();
					var url 	= "<?php echo base_url(); ?>index.php/home/pilih_area";
					$.post(url, {data:group}, function(response){
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
		});
		
		
		$('#dpn_cancel').click(function(){
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
			var xbekerja 	= $('#bekerja').val();
			var latihan 	= $('#latihan').val();

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
				$('#divlevel').attr('class','form-group has-error'); return false;} else if (jumlah != ""){$('#divlevel').attr('class','form-group')
			}
		
			if (lskillx == "" )
			{
				alert('Skilllayanan tidak boleh kosong');
				$('#divskil').attr('class','form-group has-error'); return false;} else if (jumlah != ""){$('#divskil').attr('class','form-group')
			}
		
			
			if(typenew=='2'){
				$('#divjskema').show();
			} else {
				$('#divjskema').hide();
			}
			
			$('#zoverlayz').show();
			$.ajax({
				type 		: "POST",
				url		: "<?php echo base_url('index.php/home/cek_ump/');?>",
				//dataType	: "json",
				data		: {alok:lokasiz, akerja:xbekerja},
				success	: function(res){
					//alert(res);
					$('#zoverlayz').hide();
					$('#umpx').val(res);
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
				url		: "<?php echo base_url('index.php/home/cek_fixed/');?>",
				//dataType	: "json",
				data		: {kont:kontrak},
				success	: function(resx){
					$('#fixed').val(resx);
				}
			});
			
			
			var group = $('#kontrak').val(); 
			//alert(group);
			//console.log(group);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_fixed";
			$.post(url, {data:group}, function(response){
				console.log(response);
				//alert(response);
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
			})
			
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
			$("#excelfile").val('');
			$("#exceltable").find("tr:gt(0)").remove();
			
			$('#EModal').modal({
				backdrop: 'static',
				keyboard: false
			});
			
			$('#myModal').hide();
			$("#EModal").show();
			$("#EModal").modal("show");
		});
		
		
		$('#addkomponen').click(function(){
			var tejo = $("#typejo").val();
			
			var kjabatan	= $('#jabx').val();
			var kkodejab 	= $('#kodejabx').val();
			var klokasi		= $('#lokasix').val();
			var kkodelok 	= $('#kodelokasix').val();

			var klevel 		= $('#levelx :selected').text();
			var kkodelevel 	= $('#levelx').val();
			var khk 		= $('#hkpembagix').val();
			var kump 		= $('#umpx').val();
			var jskema 		= $('#jskema').val();
			
			var arr = document.getElementsByName('valuex');
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseFloat(arr[i].value))
					tot += parseFloat(arr[i].value);
			}

			if(jskema==1){
				if(tot < kump){
					//alert('Total Fixed harus sama atau lebih dari UMP');
					//return false;
				}
			}
			
			
			if (khk == "" )
			{
				alert('HK pembagi harus diisi');
				$('#divhkx').attr('class','form-group has-error'); return false;} else if (khk != ""){$('#divhkx').attr('class','form-group')
			}
		

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
			
			
			if(jskema==1){
				var myarr = mandator.split(",");
				var jumman = myarr.length;
				for(i=0;i<jumman;i++){ 
					var n = resy.includes(myarr[i]);
					if(n==true){
						//alert('Bnar');
					} else {
						alert('Data Mandatory Harus Di Input Semua, silahkan cek di Komponen Fixed ');
						return false;
					}
				}
			}
			
			//console.log(atot);console.log(asdf);console.log(abcde);
			/*
			var myarr = mandator.split(",");
			var jumman = myarr.length;
			for(i=0;i<jumman;i++){ 
				var n = vlong2.includes(myarr[i]);
				if(n==true){
					//alert('Bnar');
				} else {
					//alert('Data Mandatory Harus Di Input Semua Pada Jenis Kontrak ');
					//return false;
				}
			}
			*/
			
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
				
				
				$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ anamaz +'</td><td class=kkodekomponen style=display:none>'+ akodez +'</td>'+'</td><td class=kvalue>'+ avalz +'</td><td class=kket>'+ aketz +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
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
				var kket 		= $(idket).val();
				
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
					//$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ kkomponen +'</td><td class=kkodekomponen style=display:none>'+ kkodekomponen +'</td>'+'</td><td class=kvalue>'+ kvalue +'</td><td class=kket>'+ kket +'</td><td class=kper>-</td><td class=kkar>-</td><td class=jkk>-</td><td class=jkm>-</td><td class=jhtp>-</td><td class=jhtk>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
					
					$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ kkomponen +'</td><td class=kkodekomponen style=display:none>'+ kkodekomponen +'</td>'+'</td><td class=kvalue>'+ kvalue +'</td><td class=kket>'+ kket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
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
				var vkket 			= $(vidket).val();
				
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
					//$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>'+ vkvalue +'</td><td class=kket>'+ vkket +'</td><td class=kper>-</td><td class=kkar>-</td><td class=jkk>-</td><td class=jkm>-</td><td class=jhtp>-</td><td class=jhtk>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
					
					$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>'+ vkvalue +'</td><td class=kket>'+ vkket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');
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
				
         		var vkkomponen		= $(bidkom+' :selected').text();
				var vkkodekomponen	= $(bidkom).val();
				var vkvalue 		= $(bidval).val();
				var vkket 			= $(bidket).val();
				var kper 			= $(idperx).val();
				var kkar 			= $(idkarx).val();
				var jkkx 			= $(xjkkx).val();
				var jkmx 			= $(xjkmx).val();
				var jhtpx 			= $(xjhtpx).val();
				var jhtkx 			= $(xjhtkx).val();
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
						//$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ vkket +'</td><td class=kper>'+ kper +'</td><td class=kkar>'+ kkar +'</td><td class=jkk>-</td><td class=jkm>-</td><td class=jhtp>-</td><td class=jhtk>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
						
						$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ vkket +'</td><td class=kper>'+ kper +'</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');
					}
					else if(jkkx!=''){
						//$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ kket +'</td><td class=kper>-</td><td class=kkar>-</td><td class=jkk>'+ jkkx +'</td><td class=jkm>'+ jkmx +'</td><td class=jhtp>'+ jhtpx +'</td><td class=jhtk>'+ jhtkx +'</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
						
						$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ kket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
					}
					else {
						//$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>'+ vkvalue +'</td><td class=kket>'+ vkket +'</td><td class=kper>-</td><td class=kkar>-</td><td class=jkk>-</td><td class=jkm>-</td><td class=jhtp>-</td><td class=jhtk>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');
						
						$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>'+ vkvalue +'</td><td class=kket>'+ vkket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
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
				var abketb 		= $(sbketb).val();
				
				$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ anketb +'</td><td class=kkodekomponen style=display:none>'+ akketb +'</td>'+'</td><td class=kvalue>'+ avbtkp +'</td><td class=kket>'+ abketb +'</td><td class=kper>'+ apbtkp +'</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td></tr>');	
			}
			
						
			$('#listrincian > tbody:last-child').append('<tr><td class=ljabatan>'+ jabatan +'</td><td class=lgender>'+ gender +'</td><td class=lpendidikan>'+ pendidikan +'</td><td class=llokasi>'+ lokasi +'</td><td class=lwaktu>'+ waktu +'</td><td class=latasan>'+ atasan +'</td><td class=lkontrak>'+ n_kontrak +'</td><td class=ljumlah>'+ jumlah +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=khk>'+ khk +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=llokasiz style=display:none>'+ lokasiz +'</td><td class=ljabatanz style=display:none>'+ jabatanz +'</td><td class=kump style=display:none>'+ kump +'</td><td class=tot style=display:none>'+ tot +'</td></tr>');
			

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
	
	
	function delete_Row(row,nid){
		$.ajax({
			  url: '<?php echo base_url(); ?>index.php/home/deleterinc/',
			  type: 'POST',
			  data: {bid : nid},
			  success: function (response) {
					
			  },
			  error: function () {
				 alert('error delete rincian');
			  }
		});
		
		var i=row.parentNode.parentNode.rowIndex;
		var y='rinc';
		document.getElementById('listrincianx').deleteRow(i,y);
		//alert(nid);
	}	
	
	
	function delete_Row2(row,nid){
		$.ajax({
			  url: '<?php echo base_url(); ?>index.php/home/deleterinc_komp/',
			  type: 'POST',
			  data: {bid : nid},
			  success: function (response) {
					
			  },
			  error: function () {
				 alert('error delete rincian');
			  }
		});
		
		var i=row.parentNode.parentNode.rowIndex;
		var y='kompon';
		document.getElementById('listkompx').deleteRow(i,y);
		//alert(nid);
	}	
	
	
	function delete_Row3(row,nid){
		$.ajax({
			  url: '<?php echo base_url(); ?>index.php/home/deleterinc_proc/',
			  type: 'POST',
			  data: {bid : nid},
			  success: function (response) {
					
			  },
			  error: function () {
				 alert('error delete procurement');
			  }
		});
		
		var i=row.parentNode.parentNode.rowIndex;
		var y='proc';
		document.getElementById('listproc').deleteRow(i,y);
		//alert(nid);
	}	
	
	
	function delete_Row_perner(row,nid){
		$.ajax({
			  url: '<?php echo base_url(); ?>index.php/home/deleterinc_pern/',
			  type: 'POST',
			  data: {bid : nid},
			  success: function (response) {
					
			  },
			  error: function () {
				 alert('error delete perner');
			  }
		});
		
		var i=row.parentNode.parentNode.rowIndex;
		var y='pern';
		document.getElementById('listpernerx').deleteRow(i,y);
		//alert(nid);
	}	
	
	
	function deleteRow(row,jns)
	{
		var i=row.parentNode.parentNode.rowIndex;
		if(jns=='rinc'){
			document.getElementById('listrincianx').deleteRow(i);
		} else if(jns=='kompon') {
			document.getElementById('listkompx').deleteRow(i);
		} else if(jns=='proc') {
			document.getElementById('listproc').deleteRow(i);
		} else {
			document.getElementById('listpernerx').deleteRow(i);
		}
	}
	
	
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
			$('#vbtkp1').val(asu);
			
			var asi = (pbtkp2/100)*tot;
			$('#vbtkp2').val(asi);
			
			var ase = (pbtkp3/100)*tot;
			$('#vbtkp3').val(ase);
			
			var asa = (pbtkp4/100)*tot;
			$('#vbtkp4').val(asa);
		}
		
	}
	
	
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
							<input type="text" class="form-control pull-right" id="typejo" name="typejo" value="<?php echo $ntjo; ?>" readonly />	
							<input type="hidden" class="form-control pull-right" id="approv" name="approv" value="<?php echo $apps; ?>" readonly />	
							<input type="hidden" class="form-control pull-right" id="tjo" name="tjo" value="<?php echo $tjo; ?>" readonly />
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
					<?php if($tjo==2){ ?>
								<div class="form-group" id="divtre">
									<label class="col-sm-3 control-label">Type Replacement</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="typere" name="typere"/>
													<option value='1'<?php if($tre == '1') { ?> selected="selected"<?php } ?>>FULLFILLMENT</option>	
													<option value='2'<?php if($tre == '2') { ?> selected="selected"<?php } ?>>REKRUT</option>											
										</select>	
									</div><!-- /.input group -->
								</div><!-- /.form group -->
					<?php } else if($tjo==1) { ?>
									<div class="form-group" id="divtnew">
										<label class="col-sm-3 control-label">Type New</label>
										<div class="col-sm-9">
										<!--
											<select class="form-control pull-right" id="typenew" name="typenew" />
														<option value='1'<?php //if( ($tynew == '0') || ($tynew == '1') || ($tynew == null) ) { ?> selected="selected"<?php //} ?>>NEW PROJECT</option>	
														<option value='2'<?php //if($tynew == '2') { ?> selected="selected"<?php //} ?>>PENGEMBANGAN</option>
											</select>	
										-->
										<input type="text" class="form-control pull-right" id="typenewx" name="typenewx" value="<?php if($tynew == '2') { echo "PENGEMBANGAN"; } else { echo "NEW PROJECT"; } ?>" readonly />
										<input type="hidden" class="form-control pull-right" id="typenew" name="typenew" value="<?php echo $tynew; ?>" readonly />
										</div><!-- /.input group -->
									</div><!-- /.form group -->
						
					<?php } ?>
						
						
						<div class="form-group" id="divnojo">
							<label class="col-sm-3 control-label">Nojo</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nojok" name="nojok" value="<?php echo $noj; ?>" readonly />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<div class="form-group" id="divtanggal">
							<label class="col-sm-3 control-label">Tanggal</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>" placeholder="Masukkan tanggal sekarang.."/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						
						
						<div class="form-group" id="divproject">
							<label class="col-sm-3 control-label">Jenis Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="jenisproject" name="jenisproject" value="<?php echo $jpro; ?>" readonly />									
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<?php if($tjo==4) { ?>
							<div class="form-group" id="divnrespa">
								<label class="col-sm-3 control-label">PersonalArea</label>
								<div class="col-sm-9">
									<select class="form-control pull-right" id="respa" name="respa" style="width:380px;"/>
									<option value="<?php echo $nproj; ?>"><?php echo $nsap; ?></option>
									</select>	
								</div>
							</div>
						<?php } else if($tjo==2) { ?>
							<div class="form-group" id="divnper">
								<label class="col-sm-3 control-label">Perner</label>
								<div class="col-sm-9">
									<select class="form-control pull-right" id="xpernerx" name="xpernerx" style="width:375px;"/>
									
									</select>	
								</div>
							</div>
						<?php } else if ($tjo==1) { 
										if($tynew==2) { ?>
												<div class="form-group" id="divnrespa">
													<label class="col-sm-3 control-label">PersonalArea</label>
													<div class="col-sm-9">
														<select class="form-control pull-right" id="respa" name="respa" style="width:380px;"/>
														<option value="<?php echo $nproj; ?>"><?php echo $nsap; ?></option>
														</select>	
													</div>
												</div>
										<?php } else { ?>
												<div class="form-group" id="divnproject">
													<label class="col-sm-3 control-label">Nama Project</label>
													<div class="col-sm-9">
														<input type="text" class="form-control pull-right" id="project" name="project" value="<?php echo $nproj; ?>" placeholder="Masukkan nama project.."/>	
													</div>
												</div>
										<?php } ?>
							
						<?php } ?>
						
						
						<?php if($tjo!=2) { ?>
						<div class="form-group" id="divsyarat">
							<label class="col-sm-3 control-label">Persyaratan Khusus</label>
							<div class="col-sm-9">
								<textarea class="form-control" rows="3" id="syarat" name="syarat"  placeholder="Persyaratan Khusus Jabatan..."/><?php echo $syaratx; ?></textarea>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="divdeskripsi">
							<label class="col-sm-3 control-label">Deskripsi Pekerjaan</label>
							<div class="col-sm-9">
								<textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" placeholder="Deskripsi Pekerjaan Jabatan..."/><?php echo $deskripsix; ?></textarea>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<?php } ?>
						
						<div class="form-group" id="divlama">
							<label class="col-sm-3 control-label">Lama Project</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="lama" name="lama" value="<?php echo $lproj; ?>" placeholder="Satuan bulan..."/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="divlatihan">
							<label class="col-sm-3 control-label">Tanggal Pelatihan</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="latihan" name="latihan" value="<?php echo $pelatihan; ?>" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="divbekerja">
							<label class="col-sm-3 control-label">Tanggal Bekerja</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="bekerja" name="bekerja" value="<?php echo $bekerja; ?>" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<div class="form-group" id="divnobak">
							<label class="col-sm-3 control-label">NO BAK</label>
							<div class="col-sm-9">
								<input type="text" class="form-control pull-right" id="nobak" name="nobak" value="<?php echo $nobak; ?>" />
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<!--
						<div class="form-group">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9">
								<?php //if($komponen_skema == '') { ?>
									<div id="dskem">
										<input type="file" class="form-control pull-right" name="komp[]" id="komponen1" />
										<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen11" value="skema"/>
									</div>
								<?php //} else {
									//$abc = 'skema'; ?>
									<label class='control-label' style='color:grey' value='<?php //echo $komponen_skema ?>' name='kompak[]' id='kompak_skema'><?php //echo $komponen_skema ?><button title='Delete Skema File' type='button' class='btn btn-box-tool' onclick='delfile("<?php //echo $noj ?>","<?php //echo $komponen_skema ?>", "<?php //echo $abc ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br> 
									
								<?php //} ?>
							</div>
						</div>
						-->
						
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
									<label class='control-label' style='color:grey' value='<?php echo $komponen_bak ?>' name='kompak[]' id='kompak_bak'><?php echo $komponen_bak ?><button title='Delete BAK File' type='button' class='btn btn-box-tool' onclick='delfile("<?php echo $noj ?>","<?php echo $komponen_bak ?>", "<?php echo $cde ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br>
								<?php }?>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						
						<!--
						<div class="form-group">
							<label class="col-sm-3 control-label">Dokumen Lain</label>
							<div class="col-sm-9">
								<?php //if($komponen_other == ''){ ?>
									<div id="doth">
										<input type="file" class="form-control pull-right" name="komp[]" id="komponen3"/>
										<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen33" value="other"/>
									</div>
								<?php //} else {
									//$fgh = 'other'; ?>
									<label class='control-label' style='color:grey' value='<?php //echo $komponen_other ?>' name='kompak[]' id='kompak_other'><?php //echo $komponen_other ?><button title='Delete Other File' type='button' class='btn btn-box-tool' onclick='delfile("<?php //echo $noj ?>","<?php //echo $komponen_other ?>", "<?php //echo $fgh ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br>
									
								<?php //} ?>
							</div>
						</div>
						-->
						
						<!--
						<div id='akk'>
							<button type="button" class="btn btn-default btn-sm" id="addmore2">Add more attachment</button>
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
			
		</div><!-- /.box -->
		
		
		<?php if($tjo==3){ ?>
		<div class="col-md-7" id='lalay'>
			<div class="form-group">
				<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Personalarea</button>
				<select id="choosen" name="choosen[]" multiple class="form-control choosen" style="height:400px;"></select>
			</div>
		</div>
		<?php } ?>
		
		<?php if($tjo==2){ ?>
		<div class="col-md-7" id='lalax'>
			<div class="box box-primary">
				<div class="form-group">
					<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Perner</button>
					<!--<select id="xchoosen" name="xchoosen[]" multiple class="form-control xchoosen" style="height:400px;"></select>-->
					<table id="listperner" class="table table-bordered table-hover listperner">
						<thead>
							<tr>
								<th>Perner</th>
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
			
			<br><br>
			<div class="box box-primary">
				<div class="form-group">
					<button type="button" class='btn btn-info btn-block btn-sm'>Detail Rincian Perner Existing</button>
					<!--<select id="xchoosen" name="xchoosen[]" multiple class="form-control xchoosen" style="height:400px;"></select>-->
					<table id="listpernerx" class="table table-bordered table-hover listperner">
						<thead>
							<tr>
								<th>Perner</th>
								<th>Nama</th>
								<th>Area</th>
								<th>PersonalArea</th>
								<th>Skilllayanan</th>
								<th>Jabatan</th>
								<th>Level</th>
								<th>Action</th>
								<th style="display:none">X</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($ppp as $key => $list){ 
									echo "<tr>";
									echo "<td>". $list['perner'] ."</td>";
									echo "<td>". $list['nama'] ."</td>";
									echo "<td>". $list['nm_area'] ."</td>";
									echo "<td>". $list['nm_persa'] ."</td>";
									echo "<td>". $list['nm_skilllayanan'] ."</td>";
									echo "<td>". $list['nm_jabatan'] ."</td>";
									echo "<td>". $list['nm_level'] ."</td>";
									?>
									<!--<td><a href="<?php  //echo base_url()?>index.php/home/rinc_hapus/<?php //echo $list['id'];?>" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></a></td>-->
									<td><button title='Delete Perner' type='button' class='btn btn-box-tool' onclick='delete_Row_perner(this,<?php echo $list['id'];?>)'><i class="glyphicon glyphicon-trash"></i></button></td>
									<?php
									echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if($tjo==1){ ?>
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
								<button type='button' class='btn btn-info btn-block btn-sm' data-toggle='modal' data-target='#myModal' id="tmbhrincian">Tambah Rincian Kebutuhan</button>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<table id="listrincian" class="table table-bordered table-hover listrincian">
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
									<th>Level</th>
									<th>HK Pembagi</th>
									<th>Skilllayanan</th>
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
									<th>Jabatan</th>
									<th>Lokasi</th>
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
						
					<br><br>
					
					<div class="box-body divlistrincianx">
						<div class="form-group" id="divrincian">
							<div class="col-sm-12">
								<button type='button' class='btn btn-info btn-block btn-sm'>Detail Rincian Existing</button>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<table id="listrincianx" class="table table-bordered table-hover listrincianx">
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
									<th>Level</th>
									<th>HK Pembagi</th>
									<th>Skilllayanan</th>
									<th>Action</th>
									<th style="display:none">x</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								foreach($bbb as $key => $list){ 
									echo "<tr>";
									echo "<td>". $list['name_job_function'] ."</td>";
									echo "<td>". $list['gender'] ."</td>";
									echo "<td>". $list['pendidikan'] ."</td>";
									echo "<td>". $list['city_name'] ."</td>";
									echo "<td>". $list['waktu'] ."</td>";
									echo "<td>". $list['atasan'] ."</td>";
									echo "<td>". $list['kontrak'] ."</td>";
									echo "<td>". $list['jumlah'] ."</td>";
									echo "<td>". $list['level'] ."</td>";
									echo "<td>". $list['hk_pembagi'] ."</td>";
									echo "<td>". $list['skilllayanan_txt'] ."</td>";
									?>
									<!--<td><a href="<?php  //echo base_url()?>index.php/home/rinc_hapus/<?php //echo $list['id'];?>" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></a></td>-->
									<td><button title='Delete Rincian' type='button' class='btn btn-box-tool' onclick='delete_Row(this,<?php echo $list['id'];?>)'><i class="glyphicon glyphicon-trash"></i></button></td>
									<?php
									echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
									echo "</tr>";
								}
							?>
							</tbody>
						</table>
					</div>
					
					<div class="box-body divlistkompx">
						<div class="form-group" id="divrincian">
							<div class="col-sm-12">
								<button type='button' class='btn btn-info btn-block btn-sm'>Detail Rincian Komponen Existing</button>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
						<table id="listkompx" class="table table-bordered table-hover listkompx">
							<thead>
								<tr>
									<th>Jabatan</th>
									<th>Lokasi</th>
									<th>Komponen</th>
									<th>Value</th>
									<th>Keterangan</th>
									<th>Percentage</th>
									<!--
									<th>Perusahaan</th>
									<th>Karyawan</th>
									<th>JKK (Kecelakaan)</th>
									<th>JKM (Kematian)</th>
									<th>JHT (Perusahaan)</th>
									<th>JHT (Karyawan)</th> -->
									<th>Action</th>
									<th style="display:none">x</th>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach($ccc as $key => $list){ 
									echo "<tr>";
									echo "<td>". $list['jabatan_txt'] ."</td>";
									echo "<td>". $list['area_txt'] ."</td>";
									echo "<td>". $list['komponen_txt'] ."</td>";
									echo "<td>". $list['value'] ."</td>";
									echo "<td>". $list['keterangan'] ."</td>";
									echo "<td>". $list['persentase'] ."</td>";
									/*
									echo "<td>". $list['perusahaan'] ."</td>";
									echo "<td>". $list['karyawan'] ."</td>";
									echo "<td>". $list['jkk'] ."</td>";
									echo "<td>". $list['jkm'] ."</td>";
									echo "<td>". $list['jht_per'] ."</td>";
									echo "<td>". $list['jht_kar'] ."</td>"; */
									?>
									<!--<td><a href="<?php  //echo base_url()?>index.php/home/rinc_hapus/<?php //echo $list['id'];?>" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></a></td>-->
									<td><button title='Delete Komponen' type='button' class='btn btn-box-tool' onclick='delete_Row2(this,<?php echo $list['id'];?>)'><i class="glyphicon glyphicon-trash"></i></button></td>
									<?php
									echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
									echo "</tr>";
								}
							?>
							</tbody>
						</table>
					</div>
					
					<div class="box-body divlistproc">
						<p></p>
						<div class="col-xs-12">
							<label class="center_title_bar">Doc Checklist</label>
						</div>
						
						<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
						<?php foreach($rdoc as $list){ ?>
							<div class="col-md-4" style="margin-top:10px;">
								<input type="checkbox" <?php if(strpos($nana, $list['doc_id']) !== false) { echo 'checked'; } ?> name="kumdoc[]" id="kumdoc" value="<?php echo $list['doc_id'];?>"> <?php echo $list['doc_name'];?>
								
							</div>
						<?php } ?>
						</div>
					</div>
					
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
									<th style="display:none;">X</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (count($ddd)){
										foreach($ddd as $key => $list){
											echo "<tr>"; 
											echo "<td>". $list['periode'] ."</td>";
											echo "<td>". $list['item_name'] ."</td>";
											echo "<td>". $list['qty'] ."</td>";
											echo "<td>". $list['spec'] ."</td>";
											echo "<td>". $list['budget'] ."</td>";
											echo "<td>". $list['tgl1'] ."</td>";	
											echo "<td>". $list['tgl2'] ."</td>"; ?>
											<td><button title='Delete Procurement' type='button' class='btn btn-box-tool' onclick='delete_Row3(this,<?php echo $list['id'];?>)'><i class="glyphicon glyphicon-trash"></i></button></td>
											<?php
											echo "<td class='cid' style='display:none'>". $list['id'] ."</td>";
											echo "</tr>";
										}
									}
								?>
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
								
							<?php if($tjo!=2){ ?>
								<div class="form-group" id="divpropinsi">
									<label class="col-sm-3 control-label">Province</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="province"/>
											<option value="">Pilih Province</option>
											<?php echo $cmbprovince; ?>
										</select>
									</div>
								</div>
							<?php } ?>
								
								<div class="form-group" id="divlokasi">
									<label class="col-sm-3 control-label">Lokasi Kerja</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="lokasi"/>
											<option value="">Pilih Lokasi</option>
											
										</select>
									</div>
								</div>
								
								
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
										<select name="lskillx" id="lskillx" class="form-control pull-right select2" >
											<option value=''>Pilih Skilllayanan</option>
											<?php foreach($cmb_skill as $cmb_skill){
												
												echo "<option value='".$cmb_skill->PERSK."'>".$cmb_skill->PERSK." | ".$cmb_skill->PTEXT."</option>";	
											}?>
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
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
						<button type="button" class="btn btn-primary" id="addrincian" >NEXT</button>	
						<!--<button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button>-->						
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
										<input type="text" class="form-control pull-right" id="qty">
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
										<input type="text" class="form-control pull-right" id="budget">
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
			
			
			<div class="modal fade" id="EModal" name="EModal" role="dialog" tabindex="-1">
				  <div class="modal-dialog" id="modal-alert" style="width:850px;">
					 <div class="modal-content">
						<div class="modal-header" style="background-color: blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
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
									

									<hr>
									
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
												<input type="text" class="form-control pull-right" id="valuex1" name="valuex" onchange="hitung(this,'1','1')" style="width:250px">
											</td>
											<!--<td width="5%"></td>-->
											<td>
												<select class="form-control pull-right" id="ketx1" style="width:250px">
													<option value="">Pilih</option>
												</select>
											</td>
											<!--<td width="5%"></td>-->
											<!--<th width="20%"></td>-->											
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
													<option value="">Pilih</option>
												</select>
											</td>
											<!--<td width="5%"></td>-->
											<!--<th width="20%"></td>-->											
										</tr>
										
									</tbody>
									</table>
									
									<br>
									
									<button type="button" class="btn btn-default btn-sm" id="baddmorekompx">Add more komponen Benefit</button>
									<table id="tkomp_ben" class="table table-bordered table-hover" style="width:850px;">
									<thead style="background-color: blue; color:white;">
										<tr>
											<th width='250px;'>Komponen Benefit</th>	
											<!--<th width="5%"></th>-->
											<th width='450px;'>Value</th>
											<!--<th width="5%"></th>-->
											<th width='150px;'>Keterangan</th>	
											<!--<th width="5%"></th>-->
											<!--<th width="20%"></th>-->	
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="text" class="nketb form-control pull-right" id="nketb1" name="nketb" value="BPJS TK PERUSAHAAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb1" name="kketb" value="4066"></td>	
											<td id="haha" >
												<input type="text" class="form-control" id="pbtkp1" name="ppbtkp" style="width:50px" value="9.24">% &nbsp;<input type="text" class="form-control" id="vbtkp1" name="vvbtkp" style="width:172px" readonly=readonly>
											</td>
											<td><input type="text" class="form-control pull-right" id="bketb1" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
										</tr>
										
										<tr>
											<td><input type="text" class="nketb form-control pull-right" id="nketb2" name="nketb" value="BPJS TK KARYAWAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb2" name="kketb" value="4065"></td>	
											<td id="haha" >
												<input type="text" class="form-control" id="pbtkp2" name="ppbtkp" style="width:50px" value="0">% &nbsp;<input type="text" class="form-control" id="vbtkp2" name="vvbtkp" style="width:172px" readonly=readonly>
											</td>
											<td><input type="text" class="form-control pull-right" id="bketb2" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
										</tr>
										
										<tr>
											<td><input type="text" class="nketb form-control pull-right" id="nketb3" name="nketb" value="BPJS KESEHATAN PERUSAHAAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb3" name="kketb" value="4058"></td>	
											<td id="haha" >
												<input type="text" class="form-control" id="pbtkp3" name="ppbtkp" style="width:50px" value="5">% &nbsp;<input type="text" class="form-control" id="vbtkp3" name="vvbtkp" style="width:172px" readonly=readonly>
											</td>
											<td><input type="text" class="form-control pull-right" id="bketb3" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
										</tr>
										
										<tr>
											<td><input type="text" class="nketb form-control pull-right" id="nketb4" name="nketb" value="BPJS KESEHATAN KARYAWAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb4" name="kketb" value="8002"></td>	
											<td id="haha" >
												<input type="text" class="form-control" id="pbtkp4" name="ppbtkp" style="width:50px" value="0">% &nbsp;<input type="text" class="form-control" id="vbtkp4" name="vvbtkp" style="width:172px" readonly=readonly>
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
		</div><!-- /.box -->
		<?php } ?>
		
		
	</div><!-- /.row -->
</section>
</div><!-- /.content-wrapper -->