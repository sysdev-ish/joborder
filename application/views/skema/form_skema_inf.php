		<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/plugins/datepicker/my.js" type="text/javascript"></script>
		
		
		<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
		<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
		<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<script type="text/javascript">
	$(function () {$.fn.dataTable.ext.errMode = 'none';
		$("#nana").slideUp("slow");
		$("#xxx").slideUp("slow");
		$('#overlay').hide();
		
		$("#lpa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/skema/cari_peraring",
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
		
		$("#lpa").change(function(){
			var group = $("#lpa").select2('data')[0]['id'];
			var url = "<?php echo base_url(); ?>index.php/skema/cari_areaing";
			$.post(url, {data:group}, function(response){
				$("#larea").html(response);
			})
		});
		
		
		$("#paing").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/skema/cari_peraring",
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
		
		
		
		$("#paing").change(function(){
			var group = $("#paing").select2('data')[0]['id'];
			var url = "<?php echo base_url(); ?>index.php/skema/cari_areaing";
			$.post(url, {data:group}, function(response){
				$("#areaing").html(response);
			})
		});
		/*
		$("#ljabat").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/skema/cari_jabat",
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
								return { id: obj.jabatan, text: obj.jabatan };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		*/
		
		var option = {
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
		};
		
		xTable = $('#listorder').dataTable(option);

		$('#addrincian').click(function(){
				var ket 		= $('#ket').val();
				var valu 		= $('#valu').val();
				var komponen	= $('#komponen').val();
				
				if (komponen == "" )
				{
					alert('Komponen tidak boleh kosong');
					$('#divkomponen').attr('class','form-group has-error'); return false;} else if (komponen != ""){$('#divkomponen').attr('class','form-group')
					
				}
				
				if (komponen == "OKO" )
				{
					var keren = $('#komponen1').val();
					if (keren == "" )
					{
						alert('Other Komponen tidak boleh kosong');
						$('#divkomponen1').attr('class','form-group has-error'); return false;} else if (keren != ""){$('#divkomponen1').attr('class','form-group')
						
					}
				}
				else
				{	
					var keren = $('#komponen').val();
				}
				
				if (valu == "" )
				{
					alert('Value tidak boleh kosong');
					$('#divval').attr('class','form-group has-error'); return false;} else if (valu != ""){$('#divval').attr('class','form-group')
				}
				
				if (ket == "" )
				{
					alert('Keterangan tidak boleh kosong');
					$('#divket').attr('class','form-group has-error'); return false;} else if (ket != ""){$('#divket').attr('class','form-group')
				}
				
								
				$('#listrincian > tbody:last-child').append('<tr><td class=lkompon>'+ keren +'</td><td class=lvalu>'+ valu +'</td><td class=lketer>'+ ket +'</td></tr>');
				
				$('#ket').val('');
				$('#valu').val('');
				$('#komponen').val('');
				$('#komponen1').val('');
			
			
		});
		
		 
		
		$('#btn_submit').click(function( e ){
			var larea 			= $('#larea').val(); 
			var lpa 			= $('#lpa :selected').text();
			var vlpa 			= $("#lpa").select2('data')[0]['id'];
			var lsl		 		= $('#lsl').val(); 
			var ljabat	 		= $('#ljabat').val();
			var llv 			= $('#llv').val();
			var lidsk 			= $('#lidsk').val();
			var ltpk 			= $('#ltpk').val();
			var ltpaa 			= $('#ltpaa').val();
			var ltpab 			= $('#ltpab').val();
			var ltpfa 			= $('#ltpfa').val();
			var lwk 			= $('#lwk').val();
			var tlwk 			= $('#lwk :selected').text();
			
			if(larea == "" )
			{
				alert('Area tidak boleh kosong');
				$('#divare').attr('class','form-group has-error'); return false;} else if (larea != ""){$('#divare').attr('class','form-group')
			}
			
			if (lpa == "" )
			{
				alert('Personal Area tidak boleh kosong');
				$('#divpar').attr('class','form-group has-error'); return false;} else if (lpa != ""){$('#divpar').attr('class','form-group')
			}
			
			if (lsl == "" )
			{
				alert('Skill Layanan tidak boleh kosong');
				$('#divslay').attr('class','form-group has-error'); return false;} else if (lsl != ""){$('#divslay').attr('class','form-group')
			}
			
			if (ljabat == "" )
			{
				alert('Jabatan tidak boleh kosong');
				$('#divjbt').attr('class','form-group has-error'); return false;} else if (ljabat != ""){$('#divjbt').attr('class','form-group')
			}
			
			if (ltpk == "" )
			{
				alert('Tanggal Pembayaran Kompensasi tidak boleh kosong');
				$('#divtpk').attr('class','form-group has-error'); return false;} else if (ljabat != ""){$('#divtpk').attr('class','form-group')
			}
		
			if (ltpaa == "" )
			{
				alert('Tanggal Periode Absensi Awal tidak boleh kosong');
				$('#divtpaa').attr('class','form-group has-error'); return false;} else if (ljabat != ""){$('#divtpaa').attr('class','form-group')
			}
			
			if (ltpab == "" )
			{
				alert('Tanggal Periode Absensi Akhir tidak boleh kosong');
				$('#divtpab').attr('class','form-group has-error'); return false;} else if (ljabat != ""){$('#divtpab').attr('class','form-group')
			}
			
			if (ltpfa == "" )
			{
				alert('Tanggal Pengumpulan Form Absensi tidak boleh kosong');
				$('#divtpfa').attr('class','form-group has-error'); return false;} else if (ljabat != ""){$('#divtpfa').attr('class','form-group')
			}
		
			if (lwk == "" )
			{
				alert('Waktu Kerja Harus Diisi..');
				$('#divlwk').attr('class','form-group has-error'); return false;} else if (lwk != ""){$('#divlwk').attr('class','form-group')
			}
			
			
			var lrincian=[];
			$('#listrincian tbody tr').each(function(){
				var lkompon = $(this).find(".lkompon").html();
				var lvalu 	= $(this).find(".lvalu").html();
				var lketer	= $(this).find(".lketer").html();
				lrincian += [lkompon,, lvalu,, lketer];
				lrincian += ',,';
			})
			
			
			if (lrincian == "" )
			{
				var lrincian="";
			}
			else
			{
				var lrincian=[];
				$('#listrincian tbody tr').each(function(){
					var lkompon = $(this).find(".lkompon").html();
					var lvalu 	= $(this).find(".lvalu").html();
					var lketer	= $(this).find(".lketer").html();
					lrincian += [lkompon,, lvalu,, lketer];
					lrincian += ',,';
				})
			}
			
			/*
			if (lrincian == "" )
			{
				alert('Anda harus menambahkan rincian kebutuhan skema');
				return false;
			}
			*/
			
			var url = "<?php echo base_url(); ?>index.php/skema/rincian_skema_simpan/";
			var	type 		= "POST";
			var mimeType    = "multipart/form-data";
			arrskem = [larea, vlpa, lsl, ljabat, llv, lidsk, ltpk, lrincian, ltpaa, ltpab, ltpfa, tlwk];
			$.post(url, {arrskem:arrskem}, function(resp){
				alert ('Data Tersimpan');
				//alert (resp);
				location.reload();
			});
					
		});
		
		
		
		
		$("#btndel").click(function () {
			//$('#overlay').show();
			
			var vsubkat = new Array();
            var oTable = $('#listorder').dataTable();
            var rowcollection =  oTable.$(".active:checked", {"page": "all"});
			rowcollection.each(function(i){
				vsubkat[i] = $(this).val();
			});
			
	        var vsubkat 	= vsubkat.join(',');
			
			var url = "<?php echo base_url(); ?>" + "index.php/skema/del_all/";
			larr = [vsubkat];
			
			$.post(url, {larr:larr}, function(response){
				//alert(response);
				alert('Sukses');
				load_search();
				
			});
        });
		
		
		
		$('#btn_edit').click(function( e ){
			//$('#overlay').show();
			var eid 			= $('#eid').val(); 
			var ekomponen 		= $('#ekomponen').val();
			var evalu		 	= $('#evalu').val(); 
			var eket	 		= $('#eket').val();
			var gid 			= $('#gid').val(); 
			
			var url = "<?php echo base_url(); ?>index.php/skema/edit_rincian_skema/";
			var	type 		= "POST";
			var mimeType    = "multipart/form-data";
			arrskemx = [eid, ekomponen, evalu, eket, gid];
			$.post(url, {arrskemx:arrskemx}, function(resp){
				alert ('Data Berhasil Di Edit');
				//$('#overlay').hide();
				load_search();
			});
					
		});
		
		
		
		function load_search(){
			$('#overlay').show();
			var areaing  = $('#areaing').val();
			//var paing 	 = $('#paing').val();
			var sling	 = $('#sling').val();
			var lpaing 	 = $('#paing :selected').text();
			var paing 	 = $("#paing").select2('data')[0]['id'];
			
			if(lpaing=='')
			{
				alert('PersonalArea Harus Diisi');
				return false;
			}
			
			larr 		 = [areaing, paing, sling];
			var url = "<?php echo base_url(); ?>index.php/skema/view_skema/";
			$.post(url, {larr:larr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listorder tbody').html(response);
				$('#listorder').dataTable({"bFilter": false, "bLengthChange": false, "bPaginate": true});
			});
		}
		
		
		
		$("#btn_search").click(function(){
			$('#overlay').show();
			var areaing  = $('#areaing').val();
			//var paing 	 = $('#paing').val();
			var sling	 = $('#sling').val();
			var lpaing 	 = $('#paing :selected').text();
			var paing 	 = $("#paing").select2('data')[0]['id'];
			
			if(lpaing=='')
			{
				alert('PersonalArea Harus Diisi');
				return false;
			}
			
			larr 		 = [areaing, paing, sling];
			var url = "<?php echo base_url(); ?>index.php/skema/view_skema/";
			$.post(url, {larr:larr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listorder tbody').html(response);
				$('#listorder').dataTable({"bFilter": false, "bLengthChange": false, "bPaginate": true});
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
		
		$("#komponen").change(function(){
			  var ish 			= $('#komponen').val();
			  if (ish == 'OKO'){
			  	 $("#xxx").slideDown("slow");
			  }
			  else
			  {
			  	 $("#xxx").slideUp("slow");
			  }
		});
		
		$("#cancelz").click(function(){
			$("#nana").slideUp("slow");
		});
		
		

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
		
		
		
		
			
		xTable.on( 'draw.dt', function () {
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
		});
		
	});
	
	
	function handle(e){
		var xTable = $('#listorder').dataTable({
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
			var url = "<?php echo base_url(); ?>" + "index.php/home/listjo/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listorder tbody').html(response);
				$('#listorder').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": false, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
	}	


	function validAngka(a)
	{
		if(!/^[0-9.]+$/.test(a.value))
		{
		a.value = a.value.substring(0,a.value.length-1000);
		}
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
              Skema Contract
              <small>List</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Skema Contract</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<!--
							<div class="col-lg-3">
								<div class="form-group">
									<label class="col-sm-3 control-label" style="margin-left:3px;">Group</label>
									<div class="input-group" style="margin-left:+65px;">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select class="form-control" id="grouping" name="grouping">
												<option value=""> Pilih Group </option>
												<?php //echo $cmbgroup ?>
										</select>
									</div>
								</div>
							</div>
						-->
							<div class="col-lg-3">
								<div class="form-group">
									<label class="col-sm-3 control-label" >PersonalArea</label>
									<div class="input-group" style="margin-left:+130px;">
										<select class="form-control" id="paing" name="paing">
												<option value=""> Pilih PersonalArea </option>
												<?php //echo $cmbpa; ?>
										</select>
									</div>
								</div>
							</div>
						
							<div class="col-lg-3">
								<div class="form-group">
									<label class="col-sm-3 control-label" >Area</label>
									<div class="input-group" >
										<select class="form-control" id="areaing" name="areaing" style="width:200px;">
												<option value=""> Pilih Area </option>
												<?php //echo $cmbar; ?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-lg-3">
								<div class="form-group">
									<label class="col-sm-3 control-label" >SkillLayanan</label>
									<div class="input-group" style="margin-left:+118px;">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<select class="form-control" id="sling" name="sling">
												<option value=""> Pilih SkillLayanan </option>
												<option value="ALL"> Select All</option>
												<?php echo $cmbsl; ?>
										</select>
									</div>
								</div>
							</div>
					</div>
					
					<div class="box-footer">
						<button type="button" class="btn btn-primary" id="btn_search">Search</button>
						<!--<button type='buttton' class='btn btn-danger' data-toggle='modal' data-target='#mdllogin'  id='add_data'>Add Data</button>-->			
						<button type='buttton' class='btn btn-danger'  id='add_data'>Add Data</button>
					</div>
					
					<div id="nana">
						<form role="form">
							<div class="box-body"> 
							<table width="100%" border="0"> 
								<tr>
									<th width="10%">
										<div class="form-group" id="divare">
											<label class="control-label">PersonalArea </label>
											<div class="input-group" style="margin-bottom:15px">
												<input type="hidden" class="form-control" id="lidsk" value="<?php echo $skemaz; ?>" />
												<!--<select class="form-control" id="lpa" style="width:300px;">
													<option value=""> Pilih PersonalArea</option>-->
													<?php //echo $cmbpa; ?>
												<select class="form-control pull-right" id="lpa" name="lpa" style="width:400px;"/>
													<option value=""> Pilih PersonalArea</option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
									<!--
									<th width="30%">
										<label class="control-label">Komponen </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lperner" style="width:500px;" />
										</div>
									</th>
									-->
									<th rowspan="5" valign="top">
									<div class="box-body">
										<div class="form-group" id="divrincian">
											<div class="col-sm-3">
												<button type='button' class='btn btn-info btn-block btn-sm' data-toggle='modal' data-target='#myModal' id="tmbhrincian">Input Rincian Skema</button>
											</div><!-- /.input group -->
										</div><!-- /.form group -->
										
										<table id="listrincian" class="table table-bordered table-hover" style="margin-left:14px;">
											<thead style="background-color:#0099CC; color:#FFFFFF;">
												<tr>
													<th>Komponen</th>
													<th>Value</th>
													<th>Keterangan</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
										
									</div>
									</th>
									
								</tr>	
								
								
								<tr>
									<th>
										<div class="form-group" id="divpar">
											<label class="control-label">Area </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> Pilih Area</option>
													<?php //echo $cmbar; ?>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Value </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lnama" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divslay">
											<label class="control-label">SkillLayanan </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="lsl" style="width:400px;">
													<option value=""> Pilih SkillLayanan</option>
													<option value="ALL"> Select All</option>
													<?php echo $cmbsl; ?>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Keterangan </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lpass" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divjbt">
											<label class="control-label">Jabatan </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="ljabat" name="ljabat" style="width:400px;">
													<option value=""> Pilih Jabatan</option>
													<option value="ALL"> Select All</option>
													<?php echo $cmbjb; ?>
												</select>
											</div>
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Level Gaji </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lpass" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divlvl">
											<label class="control-label">Level </label>
											<div class="input-group" style="margin-bottom:15px">
												<!--<input type="text" class="form-control" id="llv"/>-->
												<select class="form-control" id="llv" style="width:400px;">
													<option value=""> Pilih Level</option>
													<option value="ALL"> Select All</option>
													<?php echo $cmblv; ?>
												</select>
											</div>
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Level Gaji </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lpass" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divtpk">
											<label class="control-label">Tgl Pembayaran Kompensasi </label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="ltpk" onkeyup="validAngka(this)"/>
											</div>
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Level Gaji </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lpass" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								<tr>
									<th>
										<div class="form-group" id="divtpaa">
											<label class="control-label">Tgl Periode Absensi Awal </label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="ltpaa" onkeyup="validAngka(this)"/>
											</div>
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Level Gaji </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lpass" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								<tr>
									<th>
										<div class="form-group" id="divtpab">
											<label class="control-label">Tgl Periode Absensi Akhir </label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="ltpab" onkeyup="validAngka(this)"/>
											</div>
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Level Gaji </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lpass" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divtpfa">
											<label class="control-label">Tgl Pengumpulan Form Absensi </label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="ltpfa" onkeyup="validAngka(this)"/>
											</div>
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Level Gaji </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lpass" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divlwk">
											<label class="control-label">Waktu Kerja </label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<select class="form-control" id="lwk" name="lwk" style="width:100%;">
													<option value=""> Pilih Waktu Kerja</option>
													<option value="1"> Office Hours</option>
													<option value="2"> Shifting</option>
												</select>
											</div>
										</div>
									</th>
									<!--
									<th>
										<label class="control-label">Level Gaji </label>
										<div class="input-group">
											<input type="text" class="form-control" id="lpass" style="width:500px;" />
										</div>
									</th>
									-->
								</tr>
								
								
								
							</table>   
								
							</div> <!-- /.box-body -->  
							<div class="box-footer">
								<button type="button" class="btn btn-primary" id="btn_submit">Simpan</button>
								<button type="button" class="btn btn-primary" id="cancelz">Cancel</button>
							</div>
						</form>
						
					</div>
						
					<div class="box-body">
						<button type="button" class="btn btn-primary pull-right" style="margin-right:5px;" id="btndel">Delete</button>
						<table id="listorder" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Area</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Personal Area</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Skill Layanan</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Jabatan</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Level</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Komponen</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Value</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Keterangan</font></th>
									<th style="background-color:#CC0000;"><font color="#FFFFFF"> Tanggal Penggajian</font></th>
									<th style="display:none">x</th>
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
					
					<div class="overlay" id="overlay">
					  <i class="fa fa-refresh fa-spin"></i>
					</div>	
					
					
					
					
				<div class="modal fade" id="myModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:#CC0000; color:#FFFFFF;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Rincian Kebutuhan Skema</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" id="haha">
								<div class="box-body">
									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Nama Komponen</label>
										<div class="col-sm-9">
											<!--<input type="text" class="form-control pull-right" id="komponen"/>-->
											<select class="form-control" id="komponen" style="width:400px;">
												<option value=""> Pilih Komponen</option>
												<?php echo $cmbkompo; ?>
												<option value="OKO">Other</option>
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div id="xxx">
									<div class="form-group" id="divkomponen1">
										<label class="col-sm-3 control-label">Other Komponen</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="komponen1"/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									</div>
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Value</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="valu"/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divket">
										<label class="col-sm-3 control-label">Keterangan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="ket"/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
								</div>
							</form>
						</div>
						<div class="modal-footer" style="background-color:#CC0000;">
							<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button>						
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->	
				
				
				
							
				<div class="modal fade" id="EModal" role="dialog">
				  <div class="modal-dialog" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header" style="background-color:#CC0000; color:#FFFFFF;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Edit Kebutuhan Skema</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" id="haha">
								<div class="box-body">
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Area</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="ear" readonly/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Personal Area</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="epa" readonly/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Skill Layanan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="esl" readonly/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Jabatan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="ejb" readonly/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Level</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="elv" readonly/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divkomponen">
										<label class="col-sm-3 control-label">Nama Komponen</label>
										<div class="col-sm-9">
											<input type="hidden" class="form-control pull-right" id="eid"/>
											<input type="hidden" class="form-control pull-right" id="gid"/>
											<input type="text" class="form-control pull-right" id="ekomponen"/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divval">
										<label class="col-sm-3 control-label">Value</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="evalu"/>
										</div><!-- /.input group -->
									</div><!-- /.form group -->
									
									<div class="form-group" id="divket">
										<label class="col-sm-3 control-label">Keterangan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="eket"/>
										</div><!-- /.input group -->
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
