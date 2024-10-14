		<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/plugins/datepicker/my.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
		
		
		<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
		<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
		<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<script type="text/javascript">
	$(function () {$.fn.dataTable.ext.errMode = 'none';
		$('#tgllahir').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#tglnikah').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#sdate').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#edate').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#overlay').hide();
		
		$("#lpa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/skema/cari_perar",
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
			var url = "<?php echo base_url(); ?>index.php/skema/cari_area";
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
			arrskem = [larea, vlpa, lsl, ljabat, llv, lidsk, ltpk, lrincian, ltpaa, ltpab, ltpfa];
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
              New Hiring
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">New Hiring</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<label>Summary Profile Detail</label>
					</div>
					
					<form role="form">
							<div class="box-body"> 
							<table width="100%" border="0"> 
								<tr>
									<th width="10%">
										<div class="form-group" id="divslay">
											<label class="control-label">Start Date <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="sdate" name="sdate"  />
											</div><!-- /.input group -->
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divslay">
											<label class="control-label">End Date <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="edate" name="edate"   />
											</div><!-- /.input group -->
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Area <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
								</tr>
								
								<tr>
									<th width="10%">
										<div class="form-group" id="divare">
											<label class="control-label">Nama Lengkap </label>
											<div class="input-group" style="margin-bottom:15px">
												<input type="text" class="form-control" id="namaleng" name="namaleng" style="width:400px" />
											</div><!-- /.input group -->
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divtpk">
											<label class="control-label">Status Nikah </label>
											<div class="input-group">
												<select class="form-control" id="llv" style="width:400px;">
													<option value=""></option>
													<option value="Single">Single</option>
													<option value="Nikah">Nikah</option>
													<option value="Janda">Janda</option>
													<option value="Duda">Duda</option>
												</select>
												<!--<input type="text" class="form-control" id="ltpk" onkeyup="validAngka(this)"/>-->
											</div>
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Skill Group <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
								</tr>	
								
								
								<tr>
									<th>
										<div class="form-group" id="divpar">
											<label class="control-label">Jenis Kelamin <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
													<?php //echo $cmbar; ?>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
									<th width="30px;"></th>
									<th>
										<div class="form-group" id="divtpaa">
											<label class="control-label">Nikah Sejak <font color="red">*</font></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="tglnikah" name="tglnikah" onkeyup="validAngka(this)"/>
											</div>
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Payroll Area <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divslay">
											<label class="control-label">Tanggal Lahir <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="tgllahir" name="tgllahir"  />
											</div><!-- /.input group -->
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divtpfa">
											<label class="control-label">Agama </label>
											<div class="input-group">
												<select class="form-control" id="llv" style="width:400px;">
													<option value=""></option>
													<option value="1">ISLAM</option>
													<option value="2">KRISTEN PROTESTAN</option>
													<option value="3">KRISTEN KATOLIK</option>
													<option value="4">HINDU</option>
													<option value="5">BUDHA</option>
													<option value="6">KHONG HU CU</option>
												</select>
											</div>
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Klien Layanan <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divjbt">
											<label class="control-label">Tempat lahir <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<input type="text" class="form-control pull-right" id="lidsk" name="lidsk" style="width:400px" />
											</div>
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Reason For Action </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""></option>
													<option value="1">Project Baru</option>
													<option value="2">Pengembangan Existing Project</option>
													<option value="3">Replacement Agent Resign</option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Job Key <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divlvl">
											<label class="control-label">Negara Lahir <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="llv" style="width:400px;">
													<option value="Indonesia"> Indonesia</option>
												</select>
											</div>
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Employee Group </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""></option>
													<option value="1">Organik (INSANI)</option>
													<option value="2">Terminated</option>
													<option value="3">Outsource (INSANI)</option>
													<option value="4">Outsource (PPJP)</option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
									<th width="50px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Tipe Kontrak <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""></option>
													<option value="PKWT">PKWT</option>
													<option value="PARTTIME">PARTTIME</option>
													<option value="MAGANG">MAGANG</option>
													<option value="KEMITRAAN">KEMITRAAN</option>
													<option value="THL">THL</option>
												</select>
											</div><!-- /.input group -->
										</div>
									</th>
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divtpab">
											<label class="control-label">Kewarganegaraan </label>
											<div class="input-group">
												<select class="form-control" id="llv" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
								
							</table>   
								
							</div> <!-- /.box-body -->  
							<div class="box-footer">
								<button type="button" class="btn btn-primary" id="btn_submit">Simpan</button>
								<a href="<?php echo base_url();?>index.php/home/listorder/"><button type="button" class="btn btn-primary">Cancel</button></a>
							</div>
						</form>
					
									
				</div><!-- /.box -->
				
				
				
				
				<!--
				<div class="box box-default">
					<div class="box-header with-border">
						<label>Personal Detail</label>
					</div>
					
					<form role="form">
							<div class="box-body"> 
							<table width="100%" border="0"> 
								<tr>
									<th width="10%">
										<div class="form-group" id="divare">
											<label class="control-label">Title </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> Pilih Title</option>
													<option value="Bp"> Bp</option>
													<option value="Ibu"> Ibu</option>
												</select>
											</div>
										</div>
									</th>
									<th width="80px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Area <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>	
								
								
								<tr>
									<th>
										<div class="form-group" id="divpar">
											<label class="control-label">Jenis Kelamin <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
													<?php //echo $cmbar; ?>
												</select>
											</div>
										</div>
									</th>
									<th width="30px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Skill Group <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divslay">
											<label class="control-label">Tanggal Lahir <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="tgllahir" name="tgllahir"  />
											</div>
										</div>
									</th>
									<th width="30px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Payroll Area <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divjbt">
											<label class="control-label">Tempat lahir <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<input type="text" class="form-control pull-right" id="lidsk" name="lidsk" width="100%" />
											</div>
										</div>
									</th>
									<th width="30px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Klien Layanan <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divlvl">
											<label class="control-label">Negara Lahir <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="llv" style="width:400px;">
													<option value="Indonesia"> Indonesia</option>
												</select>
											</div>
										</div>
									</th>
									<th width="30px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Job Key <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
								 
								<tr>
									<th>
										<div class="form-group" id="divtpk">
											<label class="control-label">Status Nikah </label>
											<div class="input-group">
												<select class="form-control" id="llv" style="width:400px;">
													<option value=""> </option>
												</select>
												
											</div>
										</div>
									</th>
									<th width="30px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Tipe Kontrak <font color="red">*</font></label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
								<tr>
									<th>
										<div class="form-group" id="divtpaa">
											<label class="control-label">Nikah Sejak <font color="red">*</font></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" id="tglnikah" name="tglnikah" onkeyup="validAngka(this)"/>
											</div>
										</div>
									</th>
									<th width="30px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Reason For Action </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
								<tr>
									<th>
										<div class="form-group" id="divtpab">
											<label class="control-label">Kewarganegaraan </label>
											<div class="input-group">
												<select class="form-control" id="llv" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
									<th width="30px;"></th>
									<th>
										<div class="form-group" id="divare">
											<label class="control-label">Employee Group </label>
											<div class="input-group" style="margin-bottom:15px">
												<select class="form-control" id="larea" name="larea" style="width:400px;">
													<option value=""> </option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
								
								<tr>
									<th>
										<div class="form-group" id="divtpfa">
											<label class="control-label">Agama </label>
											<div class="input-group">
												<select class="form-control" id="llv" style="width:400px;">
													<option value=""> Pilih Agama</option>
												</select>
											</div>
										</div>
									</th>
								</tr>
								
							</table>   
								
							</div> 
							
						</form>
					
				</div>
				-->
				
				
				
			</section><!-- /.content -->
			
		<!-- </div> --><!-- /.container -->
		
	</div><!-- /.content-wrapper -->
