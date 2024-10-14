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
		//$('#tgllahir').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		//$('#tglnikah').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		//$('#sdate').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		//$('#edate').datepicker({format: 'yyyy-mm-dd',autoclose:true});
		$('#overlay').hide();
		
		
		
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
		//yTable = $('#listrincian').dataTable(option);
		
		
		
		$('#btn_submit').click(function( e ){
			var sid	 	= $('#sid').val();
			var jum	 	= $('#jum').val();
			var lolos 	= $('#lolos').val();
			var csearch = 4;
			
			var lrincian=[];
			$('#listrincian tbody tr').each(function(){
				var lnama 	= $(this).find(".lnama").html();
				var lbirth 	= $(this).find(".lbirth").html();
				var ledu	= $(this).find(".ledu").html();
				//var luniv	= $(this).find(".luniv").html();
				var lid		= $(this).find(".lid").html();
				var lkdstat	= $(this).find(".lkdstat").html();
				var lkdnama	= $(this).find(".lkdnama").html();
				lrincian += [lnama, lbirth, ledu, lid, lkdstat, lkdnama];
				lrincian += ',';
			})
			
			var rekrut = document.getElementById("listrincian").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
			
			if (lrincian == "" )
			{
				$('#overlay').hide();
				alert('Anda belum memilih employee');
				return false;
			}
			/*
			var total = rekrut + lolos ;
			if (total > jum)
			{
				alert ('Jumlah rekrut sudah melebihi kebutuhan');
				return false;
			}
			
			if (rekrut > jum)
			{
				alert ('Jumlah rekrut sudah melebihi kebutuhan');
				return false;
			}
			*/
			
			var url = "<?php echo base_url(); ?>index.php/home/simpan_data_emp/";
			var	type 		= "POST";
			var mimeType    = "multipart/form-data";
			arrrinc = [sid, lrincian];
			$.post(url, {arrrinc:arrrinc}, function(resp){
				alert ('Data Tersimpan');
				//alert (resp);
				window.location = "<?php echo base_url(); ?>" + "index.php/home/listorder";
				//location.reload();
			});
			
		});
		
		
		/* 
		function findOccurrences(arr, val) {
			var i, j,
				count = 0;
			for (i = 0, j = arr.length; i < j; i++) {
				(arr[i] === val) && count++;
			}
			return count;
		}
		*/
		
		/*
		function load_search(){
			$('#overlay').show();
			var areaing  = $('#areaing').val();
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
		*/
		
		
		$("#btn_search").click(function(){
			$('#overlay').show();
			var elevel  = $('#elevel').val();
			//var sinput	 = $('#sinput').val();
			
			if(elevel=='')
			{
				alert('Jenis Pencarian Harus Dipilih');
				return false;
			}
			
			/*
			if(sinput=='')
			{
				alert('Masukkan pencarian yang ingin dicari');
				return false;
			}
			*/
			
			larr 		 = [elevel];
			var url = "<?php echo base_url(); ?>index.php/home/cari_integrated/";
			$.post(url, {larr:larr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listorder tbody').html(response);
				$('#listorder').dataTable({"bFilter": false, "bLengthChange": false, "bPaginate": true});
			});
		});
		
		
		/*
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
		*/
		
		$('.addrincian').click(function(){
			//alert('aaaa');
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var ab = $row.find(".txnama").text();
			var ac = $row.find(".txbdate").text();
			var ad = $row.find(".txedu").text();
			var ae = $row.find(".txinstitut").text();
			var af = $row.find(".txgpa").text();
			var ag = $row.find(".txexper").text();
			var ah = $row.find(".txid").text();
			
			var ai = document.getElementById('jstatus_'+ah).value;
			if(ai==1)
			{
				var aj = 'Lulus HR';
			}
			else if(ai==2)
			{
				var aj = 'Lulus User';
			}
			else if(ai==3)
			{
				var aj = 'Lulus Training';
			}
			else if(ai==4)
			{
				var aj = 'On Board';
			}
			//alert(ai);
			
			$('#listrincian > tbody:last-child').append('<tr><td class=lnama>'+ ab +'</td><td class=lbirth>'+ ac +'</td><td class=ledu>'+ ad +'</td><td class=luniv>'+ ae +'</td><td class=lid style=display:none>'+ ah+'</td><td class=lkdstat style=display:none>'+ ai+'</td><td class=lkdnama>'+ aj +'</td></tr>');
			
		})
			
		xTable.on( 'draw.dt', function () {
				$('.addrincian').click(function(){
					//alert('aaaa');
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var ab = $row.find(".txnama").text();
					var ac = $row.find(".txbdate").text();
					var ad = $row.find(".txedu").text();
					var ae = $row.find(".txinstitut").text();
					var af = $row.find(".txgpa").text();
					var ag = $row.find(".txexper").text();
					var ah = $row.find(".txid").text();
					
					var ai = document.getElementById('jstatus_'+ah).value;
					if(ai==1)
					{
						var aj = 'Lulus HR';
					}
					else if(ai==2)
					{
						var aj = 'Lulus User';
					}
					else if(ai==3)
					{
						var aj = 'Lulus Training';
					}
					else if(ai==4)
					{
						var aj = 'On Board';
					}
					//alert(ai);
					
					$('#listrincian > tbody:last-child').append('<tr><td class=lnama>'+ ab +'</td><td class=lbirth>'+ ac +'</td><td class=ledu>'+ ad +'</td><td class=luniv>'+ ae +'</td><td class=lid style=display:none>'+ ah+'</td><td class=lkdstat style=display:none>'+ ai+'</td><td class=lkdnama>'+ aj +'</td></tr>');
					
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
              Find Employee
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Find Employee</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<table width="100%" border="0"> 
							<tr>
								<th width="10%">
									<div class="form-group" id="divslay">
										<label class="control-label">Education Level </label>
										<div class="input-group" style="margin-bottom:15px">
											<select class="form-control" id="elevel" name="elevel" style="width:200px;">
												<option value="HIGHSCHOOL">SMA</option>
												<option value="DIPLOMA">DIPLOMA</option>
												<option value="SARJANA">SARJANA</option>
												<option value="MAGISTER">MAGISTER</option>
												<option value="DOKTORAL">DOKTORAL</option>
											</select>
											<input type="hidden" class="form-control" id="sid" name="sid" value="<?php echo $hid; ?>"  />
										</div><!-- /.input group -->
									</div>
								</th>
								<th width="50px;"></th>
								<!--
								<th width="50px;"></th>
								<th>
									<div class="form-group" id="divslay">
										<label class="control-label">Input yang Diinginkan <font color="red">*</font></label>
										<div class="input-group" style="margin-bottom:15px">
											<input type="text" class="form-control" id="sinput" name="sinput"  style="width:400px;" />
										</div>
									</div>
								</th>
								-->
								<th>
									<div style="margin-top:10px;">
										<button type="button" class="btn btn-primary" id="btn_search">Search</button>
									</div>
								</th>
								
							</tr>
						</table>
					</div>
					
					<form role="form">
							<div class="box-body"> 
								<table width="100%" border="0"> 
									<tr>
										<th width="10%">
											<div class="form-group" id="divslay">
												<label class="control-label">Kebutuhan </label>
												<div class="input-group" style="margin-bottom:15px">
													<input type="text" class="form-control" id="kebut" name="kebut" value="<?php echo $kebut; ?>" style="width:250px;" />
												</div><!-- /.input group -->
											</div>
										</th>
										<th width="50px;"></th>
										<th width="10%">
											<div class="form-group" id="divslay">
												<label class="control-label">Jumlah </label>
												<div class="input-group" style="margin-bottom:15px">
													<input type="text" class="form-control" id="jum" name="jum" value="<?php echo $jum; ?>" style="width:250px;" />
												</div><!-- /.input group -->
											</div>
										</th>
										<th width="50px;"></th>
										<th>
											<div class="form-group" id="divslay">
												<label class="control-label">Pemenuhan </label>
												<div class="input-group" style="margin-bottom:15px">
													<input type="text" class="form-control" id="jum_lolos" name="jum_lolos" value="<?php echo $jum_lolos; ?>" style="width:250px;" />
												</div><!-- /.input group -->
											</div>
										</th>
									</tr>
								</table>
						
								<table id="listorder" class="table table-bordered table-hover">
									<thead style="background-color: #dd4b39;">
										<tr>
											<th>Name</th>
											<th>BirthDate</th>
											<th>Education</th>
											<th>Institution</th>
											<th>GPA</th>
											<th>Experience</th>
											<th style='display:none'>x</th>
											<th>Status</th>
											<th>Pilih</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
								
							</div> <!-- /.box-body -->  
							<div class="overlay" id="overlay">
							  <i class="fa fa-refresh fa-spin"></i>
							</div>
					</form>
					
									
				</div><!-- /.box -->
				
				
				
				<div class="box box-default">
					<div class="box-header with-border">
						<label>Rincian Employee</label>
					</div>
					
					<form role="form">
							<div class="box-body"> 
								<table id="listrincian" class="table table-bordered table-hover">
									<thead style="background-color: #0066FF; color:#FFFFFF;">
										<tr>
											<th>Name</th>
											<th>BirthDate</th>
											<th>Education</th>
											<th>Institution</th>
											<th style='display:none'>x</th>
											<th style='display:none'>x</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
								
							</div> <!-- /.box-body -->  
							
							<div class="box-footer">
								<button type="button" class="btn btn-primary" id="btn_submit">Simpan</button>
								<a href="<?php echo base_url();?>index.php/home/listorder/"><button type="button" class="btn btn-primary">Cancel</button></a>
							</div>
							
					</form>
					
					
				</div>
				
				
				
				
			</section><!-- /.content -->
			
		<!-- </div> --><!-- /.container -->
		
	</div><!-- /.content-wrapper -->
