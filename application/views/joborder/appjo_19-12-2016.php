<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/select2/select2-bootstrap.css" />

<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		
		<script src="<?php echo base_url(); ?>public/plugins/datepicker/my.js" type="text/javascript"></script>

<script type="text/javascript">
	
	$(function () {
		
		var option = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": true,
			"scrollX": true,
			"bJQueryUI": false  
		};
		
		xTable = $('#listrincian').dataTable(option);
		yTable = $('#listskema').dataTable(option);
		zTable = $('#listpola').dataTable(option);
		$("#akhir").hide();
		
		$(".btndetail").click(function(){
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/trajo";
			$.post(url, {data : vnojo}, function(res){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincian tbody').html(res);
				$('#listrincian').dataTable(option);
			})
		});
		
		/*
		$("#btn_search").click(function(){
			$('#overlay').show();
			var regional = $('#regionaling').val();
			var witel 	 = $('#areaing').val();
			var plasa	 = $('#subareaing').val();
			larr 		 = [regional, witel, plasa];
			var url = "<?php echo base_url(); ?>index.php/csr/view_csr/";
			$.post(url, {larr:larr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listpenilaian tbody').html(response);
				$('#listpenilaian').dataTable({"bFilter": false, "bLengthChange": false, "bPaginate": true});
			});
		});
		*/
		
		
		
		
		
		$('#btn_simpanin').click(function(){
			//document.getElementById("haha").reset();
			var rinjab 		= $('#rinjab :selected').text();
			var rinjabz 	= $('#rinjab').val();
			
			//alert(rinjabz);
			//exit();
			var ssalaryz 	= $('#ssalaryz').val();
			var esalaryz	= $('#esalaryz').val();
			
			var angka 		 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('ssalaryz').value))));
			var ssalary		 = angka ;
			
			//var esalary 	= $('#esalary').val();	
			var angka1 		 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('esalaryz').value))));
			var esalary		 = angka1 ;
			
			var exper 		= $('#exper').val();	
			var level 		= $('#level').val();
			var job_skills 	= $('#job_skills').val();
			//var job_skillsz	= $('#job_skills').text();
			var job_benefits= $('#job_benefits').val();
			//var job_benefitsz= $('#job_benefits').text();
			var duedate 	= $('#duedate').val();	
			var duedate1 	= $('#duedate1').val();	
			
			if (rinjab == "" )
			{
				alert('Jabatan Harus Di Pilih');
				$('#divrin').attr('class','form-group has-error'); return false;} else if (rinjab != ""){$('#divrin').attr('class','form-group')
			}
		
			if( (ssalary=="") || (esalaryz=="") )
			{
				alert('Range Salary Harus Di Isi Semua');
				$('#divsal').attr('class','form-group has-error'); return false;} else if ((ssalary != "") || (esalaryz=="")){$('#divsal').attr('class','form-group')
			}
		
			if(esalary < ssalary)
			{
				alert('Range Salary tidak benar, salary akhir harus lebih besar daripada salary awal');
				return false;
			}
			
			if(level == "") {
				alert("Level Tidak Boleh Kosong !!");
				return false;
			}
			else if(exper == "") {
				alert("Experience Tidak Boleh Kosong !!");
				return false;
			}
			else if(job_skills == "") {
				alert("Skills Tidak Boleh Kosong !!");
				return false;
			}
			else if( (duedate == "") || (duedate1 == "") ) {
				alert("Range Tanggal Posting Tidak Boleh Kosong !!");
				return false;
			}
			
			$('#listskemax> tbody:last-child').append('<tr><td class=lrinjabz style=display:none>'+ rinjabz +'</td><td class=lrinjab>'+ rinjab +'</td><td class=lssalaryz>'+ ssalary +'</td><td class=lesalaryz>'+ esalary +'</td><td class=llevel style=display:none>'+ level +'</td><td class=lexper style=display:none>'+ exper +'</td><td class=ljob_skills style=display:none>'+ job_skills +'</td><td class=ljob_benefits style=display:none>'+ job_benefits +'</td><td class=lduedate style=display:none>'+ duedate +'</td><td class=lduedate1 style=display:none>'+ duedate1 +'</td></tr>');
			
			$('#ssalaryz').val('');
			$('#esalaryz').val('');
			$('#exper').val('');	
			$('#level').val('');
			$('#job_skills').val('');
			$('#job_benefits').val('');
			$('#duedate').val('');	
			$('#duedate1').val('');	
		});
		
	
		
		
		$('#tmbhrincian').click(function(){
			var nojo = $('#nojol').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_rincian";
			$.post(url, {data:nojo}, function(response){
				$("#rinjab").html(response);
			})
		});
		
		
		
		$('#duedate').datepicker({format: 'yyyy-mm-dd', startDate : '0', autoclose : true});
		$('#duedate1').datepicker({format: 'yyyy-mm-dd', startDate : '0', autoclose : true});
		
		$("#btn_download").click(function(){
			//var lkomponen = $row.find(".komponen").text();
			//$(".btn_download").val('<?php echo base_url();?>uploads/'+ lkomponen);
			window.location = $("#btn_download").val();			
		});
		
		
		$('#btnsubmit').click(function(){
			var lrincian=[];
			$('#listskemax tbody tr').each(function(){
				var lrinjab       = $(this).find(".lrinjab").html();
				var lssalaryz     = $(this).find(".lssalaryz").html();
				var lesalaryz     = $(this).find(".lesalaryz").html();
				var llevel 	      = $(this).find(".llevel").html();
				var lexper 	      = $(this).find(".lexper").html();
				var ljob_skills   = $(this).find(".ljob_skills").html();
				var ljob_benefits = $(this).find(".ljob_benefits").html();
				var lduedate 	  = $(this).find(".lduedate").html();
				var lduedate1 	  = $(this).find(".lduedate1").html();
				//lrincian += [lrinjabz, lssalaryz, lesalaryz, llevel, lexper, ljob_skills, ljob_benefits, lduedate, lduedate1];
				lrincian += [lrinjab, lssalaryz, lesalaryz, llevel, ljob_skills, ljob_benefits, lduedate, lduedate1];
				lrincian += ',';
			})
			
			
			if (lrincian == "" )
			{
				alert('Anda harus menambahkan Salary Rincian Jabatan terlebih dahulu !!');
				return false;
			}
			
			
			var nojol 	= $('#nojol').val(); 
			arrrin = [nojol, lrincian];
			var url	= "<?php echo base_url();?>index.php/home/simpanrincian";
			//arrappjo = [vnojo, ket, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
			$.post(url, {arrrin : arrrin}, function(res){
				alert(res);
				//alert('Data Berhasil Di Approve');
				//location.reload();
				
			})
			
		});
		
		
		$(".btnadd").click(function(){
			$("#wew").show();
			$("#awal").show();
			$("#akhir").hide();
			$('#ket').val(''); 
			$('#ssalary').val('');	
			$('#esalary').val('');	
			$('#exper').val('');	
			$('#level').val('');
			$('#job_skills').val('');
			$('#job_benefits').val('');
			$('#duedate').val('');	
			$('#duedate1').val('');	
			
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			
			$("#nojol").val(vnojo);
			
			$("#testing").slideUp("slow");
				
			if (btn == "Waiting Approval"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Waiting Approval Admin"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval Admin </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved Admin"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Rejected"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_atasan" name="ket_atasan"/></textarea>');
				
				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var atasan = $row.find(".atasan").text();
				
				$("#ket_atasan").val(atasan);
				
				$("#approvalbtn").html("");
			} else if (btn == "Rejected Admin"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_admin" name="ket_admin"/></textarea>');
				
				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var admin = $row.find(".admin").text();
				
				$("#ket_admin").val(admin);
				
				$("#approvalbtn").html("");
			} else if (btn == "Approve"){
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><br><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan">Approve</button>'
				$("#approvalbtn").html(appbtn);
				
				$("#btnsimpan").click(function(){
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Approve');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})	
							
				$("#btnreject").click(function(){
					var ket_status 		= $('#ket').val();			
					
					if(ket_status == ""){
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}
				
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			} else {
			$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
			$("#labeljon").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label>');
				var appbtn1 = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Approve Admin</button>'
				var appbtn2 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Submit</button>'
				$("#approvalbtn").html(appbtn1);
				$("#approvalbtnz").html(appbtn2);
				
				$("#btnsimpan1").click(function(){
					
					$("#awal").hide();
					$("#akhir").show();
					$("#wew").hide();
					$("#testing").slideDown("slow");
					//var ssalary 	= $('#ssalary').val();	
					
					
					var lrincian=[];
					$('#listskemax tbody tr').each(function(){
						var lrinjab   = $(this).find(".lrinjab").html();
						var lssalaryz = $(this).find(".lssalaryz").html();
						var lesalaryz = $(this).find(".lesalaryz").html();
						lrincian += [lrinjab, lssalaryz, lesalaryz];
						lrincian += ',';
					})
					
					
					if (lrincian == "" )
					{
						alert('Anda harus menambahkan Salary Rincian Jabatan terlebih dahulu !!');
						return false;
					}
								
					/*
					if((ssalary == "") || (esalary == "")){
						alert("Silahkan input data berikut terlebih dahulu !!");
						return false;
					}
					*/
					
					
				
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo12";
					//arrappjo = [vnojo, ket, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Approve');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})	
							
				$("#btnreject1").click(function(){
					var ket_status 		= $('#ket').val();			
					
					if(ket_status == ""){
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}
					
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo1";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			}
			
		});
	
		zTable.on( 'draw.dt', function () {	
		$(".btndetail").click(function(){
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			$("#inojo").val(vnojo);
			var url	= "<?php echo base_url();?>index.php/home/trajo";
			$.post(url, {data : vnojo}, function(res){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincian tbody').html(res);
				$('#listrincian').dataTable(option);
			})
		})
		
		$("#btn_download").click(function(){
			//var lkomponen = $row.find(".komponen").text();
			//$("#btn_download").val('<?php echo base_url();?>uploads/'+ lkomponen);
			window.location = $("#btn_download").val();			
		});
		
		
		$(".btnadd").click(function(){
			$('#listpola').dataTable(option);
			$("#wew").show();
			$("#awal").show();
			$("#akhir").hide();
			$('#ket').val(''); 
			$('#ssalary').val('');	
			$('#esalary').val('');	
			$('#exper').val('');	
			$('#level').val('');
			$('#job_skills').val('');
			$('#job_benefits').val('');
			$('#duedate').val('');	
			$('#duedate1').val('');	
			
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var atasan = $row.find(".atasan").text();
			var admin = $row.find(".admin").text();
			
			$("#ket_atasan").val(atasan);
			$("#ket_admin").val(admin);
			$("#testing").slideUp("slow");
			
			if (btn == "Waiting Approval"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Waiting Approval Admin"){
				$("#labeljo").html('<label class="control-label"> Menunggu Approval Admin </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved Admin"){
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Rejected"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_atasan" name="ket_atasan"/></textarea>');
				
				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var atasan = $row.find(".atasan").text();
				
				$("#ket_atasan").val(atasan);
				
				$("#approvalbtn").html("");
			} else if (btn == "Rejected Admin"){
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_admin" name="ket_admin"/></textarea>');
				
				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var admin = $row.find(".admin").text();
				
				$("#ket_admin").val(admin);
				
				$("#approvalbtn").html("");
			} else if (btn == "Approve"){
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan">Approve</button>'
				$("#approvalbtn").html(appbtn);
				
				$("#btnsimpan").click(function(){
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Approve');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})	
							
				$("#btnreject").click(function(){
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			} else {
			$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
			$("#labeljon").html('<label class="control-label"> Anda akan menyetujui Job order No '+ vnojo +'</label>');
				var appbtn1 = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Approve Admin</button>'
				var appbtn2 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Submit</button>'
				$("#approvalbtn").html(appbtn1);
				$("#approvalbtnz").html(appbtn2);
				
				$("#btnsimpan1").click(function(){
					
					$("#awal").hide();
					$("#akhir").show();
					$("#wew").hide();
					$("#testing").slideDown("slow");
					
					var lrincian=[];
					$('#listskemax tbody tr').each(function(){
						var lrinjab   = $(this).find(".lrinjab").html();
						var lssalaryz = $(this).find(".lssalaryz").html();
						var lesalaryz = $(this).find(".lesalaryz").html();
						lrincian += [lrinjab, lssalaryz, lesalaryz];
						lrincian += ',';
					})
					
					
					if (lrincian == "" )
					{
						alert('Anda harus menambahkan Salary Rincian Jabatan terlebih dahulu !!');
						return false;
					}
					
					/*
					if((ssalary == "") || (esalary == "")){
						alert("Silahkan input data berikut terlebih dahulu !!");
						return false;
					}
					*/
					
					
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/simpantjo12";
					//arrappjo = [vnojo, ket, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Approve');
						//alert();
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})	
							
				$("#btnreject1").click(function(){
					var vnojo 	= $row.find(".nojo").text();
					var ket 	= $('#ket').val(); 
					$("#inojo").val(vnojo);
					var url	= "<?php echo base_url();?>index.php/home/rejectjo1";
					arrappjo = [vnojo, ket];
					$.post(url, {arrappjo : arrappjo}, function(res){
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			}
			
		});
		});
});		
	
	
	function custom_alert(output_msg, title_msg)
	{
		if (!title_msg)	title_msg = 'Alert';
		if (!output_msg) output_msg = 'No Message to Display.';
		$("<div></div>").html(output_msg).dialog({
			title: title_msg,
			resizable: false,
			modal: true,
			buttons: {
				"Ok": function() { $( this ).dialog( "close" );	}
			}
		});
	}	
	
	
	function handle(e){
		var xTable = $('#listpola').dataTable({
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": true,
			"scrollX": true,
			"bJQueryUI": false 			
		});

		if(e.keyCode === 13){
			var url = "<?php echo base_url(); ?>" + "index.php/home/listappjo/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listpola tbody').html(response);
				$('#listpola').dataTable({"bFilter": false, "bSort": false, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
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
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Job Order
              <small>Approval</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Job Order</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project .." onkeypress="handle(event)"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
					<div class="box-body">
						<table id="listpola" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th align="center">No JO</th>
									<th align="center">Project</th>
									<th align="center">Persyaratan</th>
									<th align="center">Deskripsi</th>
									<th align="center">Bekerja</th>
									<th align="center">Creater</th>
									<th align="center">Last Update</th>
									<!--<th style="display:none">x</th>-->
									<th style="display:none">x</th>
									<th style="display:none">x</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
									if ($level == '4')
									{
										if ($list['approval_admin'] == 0){
												$btn = 'Approve Admin';
												$stat = 'btn-warning';
											} elseif ($list['approval_admin'] == 1) {
												$btn = 'Approved Admin';
												$stat = 'btn-success';
											} elseif ($list['approval_admin'] == 2) {
												$btn = 'Rejected Admin';
												$stat = 'btn-danger';
											} 
									}
									else if ($level == '2')
									{
											if ($list['approval'] == 0){
												$btn = 'Approve';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
									}
									else 
									{
											if ($list['approval'] == 0){
												$btn = 'Waiting Approval';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												if($list['approval_admin'] == 0){
													$btn = 'Waiting Approval Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 1){												
													$btn = 'Approved Admin';
													$stat = 'btn-success';
												} elseif($list['approval_admin'] == 2){
													$btn = 'Rejected Admin';
													$stat = 'btn-danger';
												}
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
									}
									
										echo "<tr>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['upd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										//echo "<td class='jmr' style='display:none'>". $list['jml_rincian'] ."</td>";
										echo "<td class='atasan' style='display:none'>". $list['ket_atasan'] ."</td>";
										echo "<td class='admin' style='display:none'>". $list['ket_admin'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>
										<button type='submit' class='btn btn-primary btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>DETAIL</button>";
										echo "<button type='submit' class='btn ". $stat ." btn-block btn-xs btnadd' id='btnadd' data-toggle='modal' data-target='#myModal'>" . $btn . "</button>";
										if ($level == '4')
										{ ?><br />
										<a href="<?php echo base_url().'uploads/';?><?php echo $list['komponen'];?>" target="_blank"><button type='button' class='btn daud btn-block btn-xs btn_download' id='btn_download'>Download</button></a>
										 <?php } echo "</td>"; echo "</tr>";
									}
								}								
								?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
				<div class="modal fade" id="XmyModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listrincian" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Jabatan</th>
										<th>Gender</th>
										<th>Pendidikan</th>
										<th>Lokasi</th>
										<th>Atasan</th>
										<th>Kontrak</th>
										<th>Waktu</th>
										<th>Jumlah</th>
										<!--<th>Dokumen Pendukung</th>-->
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan">Approve</button>-->
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->						
						
				<div class="modal fade" id="myModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Input Rincian Jabatan</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
								
							<div id="wew">
									<div class="form-group">
											<div id="labeljo"></div>
									</div><!-- /.form group -->
							</div>
									
							<div id="testing">	

									<div class="form-group">
											<div id="labeljon"></div>
									</div><!-- /.form group -->
									
									<div class="form-group">
										<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#HmyModal' id="tmbhrincian" style="margin-left:16px;">Input Salary Rincian</button>
									</div>
									
									<table id="listskemax" class="table table-bordered table-hover" >
										<thead>
											<tr>
												<th style="display:none">xxx</th>
												<th>Jabatan</th>
												<th>Start Salary</th>
												<th>End Salary</th>
												<th style="display:none">Job Level</th>
												<th style="display:none">Experience</th>
												<th style="display:none">Skills</th>
												<th style="display:none">Benefits</th>
												<th style="display:none">Start Publish Date</th>
												<th style="display:none">End Publish Date</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
									
									
									<div class="form-group">
										<input type="hidden" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="ssalary"/>
										<input type="hidden" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="esalary"/>
										<input type="hidden" class="form-control pull-right" id="nojol" name="nojol"/>
									</div><!-- /.form group -->
											
						</div>
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" id="awal">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<div id="approvalbtn"></div>
						</div>
						<div class="modal-footer" id="akhir">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclosed">Close</button>
							<!--<div id="approvalbtnz"></div>-->
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btnsubmit">Submit</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				
				
				
				
				
				<div class="modal fade" id="HmyModal" role="dialog">
				  <div class="modal-dialog modal-info" id="modal-alert">
					 <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
								
							<div id="wew">
									<div class="form-group">
											<div id="labeljo"></div>
									</div><!-- /.form group -->
							</div>
									
											<div class="form-group" id="divrin">
												<label>Rincian</label>
												<div class="input-group">
													<select class="form-control" id="rinjab" name="rinjab">
														<?php //echo $cmbrin ?>
													</select>
												</div>
											</div>
									
							
											<div class="form-group" id="divsal">
												<label>Salary</label>
												<div class="input-group">
												<table>
												<tr>
													<td width="300px"><input type="text" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="ssalaryz"/></td>
													<td width="50px" align="center">To</td>
													<td width="300px"><input type="text" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="esalaryz"/></td> 
												</tr>	
												</table>
												</div><!-- /.input group -->
											</div><!-- /.form group -->
											
											
											<table border="0">
											<tr>
											<td>
												<div class="form-group">
													<label>Job Level</label>
													<div class="input-group">
													<select class="form-control" id="level">
														<option value=""> Pilih Job Level</option>
														<?php echo $cmblevel ?>
													</select>
													</div><!-- /.input group -->
												</div><!-- /.form group -->
											</td>
											
											<td width="80px"></td>
											
											<td> 
												<div class="form-group">
													<label>Experience</label>
													<div class="input-group">
													<select class="form-control" id="exper">
														<option value=""> Pilih Job Experience</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
													</select>
													</div><!-- /.input group -->
												</div><!-- /.form group -->
											</td>
											</tr>
											</table>
											
											 <div class="form-group">
												<label for="job_skills">Skills Required</label>
												<input type="hidden" data-placeholder="Choose skills..." id="job_skills" 
													name="job_skills" style="width:100%;" class="select2-offscreen form-control"/>
											</div>
											
											<div class="form-group">
												<label for="job_skills">Benefits(optional)</label>
												<input type="hidden" data-placeholder="Choose Benefits..." id="job_benefits" 
													name="job_benefits" style="width:100%;" class="select2-offscreen form-control"/>
											</div>
											
											<div class="form-group">
												<label>Publish Start</label>
												<div class="input-group">
												<table>
												<tr>
													<td width="300px"><input type="text" class="form-control" id="duedate"/></td>
													<td width="50px" align="center">s/d</td>
													<td width="300px"><input type="text" class="form-control" id="duedate1"/></td> 
												</tr>	
												</table>
												</div><!-- /.input group -->
											</div><!-- /.form group -->
											
											
									
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpanin">Simpan</button>
						</div>
					 </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.example-modal -->
				
				
				
				
				
				
				
				
				
				
				
				</div><!-- /.box -->
				
				
			</section><!-- /.content -->
	</div><!-- /.content-wrapper -->
	
<script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
$(".select2").select2();

$("#job_skills").select2({
	createSearchChoice:function(term, data) { 
		if ($(data).filter(function() { 
			return this.text.localeCompare(term)===0; 
		}).length===0) {
			return {id:term, text:term};
		} 
	},
	multiple: true,
	data: [
		<?php 
			foreach ($form_job_skills as $value) {
				echo "{id: ".$value->id.", text:'".$value->skill_name."'},";            
			}
		?>
	],
	separator: "|"
});

$("#job_benefits").select2({
	createSearchChoice:function(term, data) { 
		if ($(data).filter(function() { 
			return this.text.localeCompare(term)===0; 
		}).length===0) {
			return {id:term, text:term};
		} 
	},
	multiple: true,
	data: [
		<?php 
			foreach ($form_job_benefits as $value) {
				echo "{id: ".$value->id.", text:'".$value->name_benefits."'},";            
			}
		?>
	],
	separator: "|"
});
	
</script>
