<link href="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url() ?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>


<script type="text/javascript">
	$(function() {
		$(".select2").select2();
		$.fn.modal.Constructor.prototype.enforceFocus = $.noop;
		$.fn.dataTable.ext.errMode = 'none';

		var option = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": true,
			"bSort": false,
			"bInfo": true,
			// "bAutoWidth": false,
			// "scrollX": true,
			"bJQueryUI": false
		};

		zTable = $('#listrincian').dataTable(option);


		var yTable = $('#listnojo').dataTable({
			"searching": false,
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

		var pTable = $('#listnojo').dataTable({
			"searching": false,
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
	});

	function rincid(nojo) {
		$("#nnojo").val(nojo);
	};

	function desk(xkid, deskrip) {
		document.getElementById("cekdesk").value = deskrip;
	};

	function vdok(nobak) {
		var url = "<?php echo base_url(); ?>index.php/pks/varrdok";
		$.post(url, {
			nobakx: nobak
		}, function(res) {
			$("#arrdok").html(res);
		})

	};

	function vnojo(id) {
		var yTable = $('#listnojo').DataTable();
		var url = "<?php echo base_url(); ?>index.php/pks/varnojo";
		$.post(url, {
			nobak: id
		}, function(res) {

			$('#listnojo').dataTable().fnDestroy();
			$('#listnojo tbody').html(res);
			$('#listnojo').dataTable({
				"bFilter": false,
			});
		})

	};

	function logDraft(id) {
		var pTable = $('#listlogDraft').DataTable();
		var url = "<?php echo base_url(); ?>index.php/pks/varlogDraft";
		$.post(url, {
			nobak: id
		}, function(res) {

			$('#listlogDraft').dataTable().fnDestroy();
			$('#listlogDraft tbody').html(res);
			$('#listlogDraft').dataTable({
				"bFilter": false,
			});
		})

	};

	function returnData(id) {
		$('#txt_ket').val("")
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/pks/varNoteReturn/",
			data: {
				nobak: id
			},
			dataType: 'JSON',
			success: function(res) {

				$("#mnobak").html(res.detail[0].nobak);
				$("#mnote").html(res.detail[0].note);

			}
		});

	};

	function ValidateSize(file) {
		var oFile1 = file.files[0];
		if (oFile1.size > 5242880) // 5 mb for bytes.
		{
			alert("File size must under 5mb!");
			$(file).val('');
		}
	}

	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		return !(charCode > 31 && (charCode < 48 || charCode > 57));
	}
</script>

<script type="text/javascript">

</script>


<style>
	.daud {
		color: #FFFFFF;
		background-color: #000033;

	}
</style>
<!-- Full Width Column -->
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Job Order PKS
			<small>List</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Job Order</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="box box-danger" id="tar1">
			<form role="form" id="formid">
				<div class="box-body">
					<div class="col-lg-3">
						<label></label>
						<div class="input-group">
							<button type='button' class='btn btn-primary' id='btn_excel'><i class='fa fa-cloud-download'></i> Download To Excel</button>
						</div>
					</div>
					<table id="listorder" class="table table-bordered table-hover">
						<thead style="background-color: #dd4b39; color:white;">
							<tr>
								<th align="center" style="width:200px;">No BAK</th>
								<th align="center" style="width:200px;">No JO</th>
								<th align="center" style="width:120px">Type New</th>
								<th align="center" style="width:350px;">Project</th>
								<th align="center">Lama Project</th>
								<th align="center">No PKS</th>
								<th align="center">Approval Draft</th>
								<th align="center">Status PKS</th>
								<th align="center">File PKS</th>
								<th align="center">Log Update</th>
							</tr>

							<tr>
								<th align="center">
									<div class="form-group"><input type="text" id="cartbak" name="cartbak" class="form-control pull-right" style="width:200px;"></div>
								</th>
								<th align="center">
									<div class="form-group"><input type="text" id="carnoj" name="carnoj" class="form-control pull-right" style="width:200px;"></div>
								</th>
								<!-- <th align="center"><div class="form-group"><select name="cartnew" id="cartnew" class="form-control select2 pull-right" style="width:150px"><option value=""></option><option value="1">New Project</option><option value="2">New Pengembangan</option></select></div></th> -->
								<th align="center">
									<div class="form-group"><select name="cartnew" id="cartnew" class="form-control select2 pull-right" style="width:150px">
											<option value=""></option>
											<option value="1">New</option>
											<option value="6">Perpanjangan Project</option>
										</select></div>
								</th>
								<th align="center">
									<div class="form-group"><input type="text" id="carpro" name="carpro" class="form-control pull-right" style="width:350px;"></div>
								</th>
								<th align="center"></th>
								<th align="center">
									<div class="form-group"><input type="text" id="carpks" name="carpks" class="form-control pull-right" style="width:200px;"></div>
								</th>
								<th align="center">
									<div class="form-group"><input type="text" id="carapp" class="form-control pull-right" style="width:200px;"></div>
								</th>
								<!-- <th align="center"><div class="form-group"><select name="cartbak" id="cartbak" class="form-control select2 pull-right" style="width:200px"><option value=""></option><?php echo $cmbbak; ?></select></div></th> -->
								<th align="center">
									<div class="form-group"><select name="cartstatpks" id="cartstatpks" class="form-control select2 pull-right" style="width:200px">
											<option value=""></option>
											<option value="0">Dikirim ke Legal</option>
											<option value="10">Done PKS</option>
											<option value="1">Draft Internal</option>
											<option value="19">Return</option>
											<option value="6">Review Ekternal</option>
											<option value="7">Review Internal</option>
											<option value="9">Review Internal by PM</option>
											<option value="14">Sirkuler Eksternal</option>
											<option value="13">Sirkuler Internal</option>
											<option value="15">Verifikasi</option>
										</select></div>
								</th>
								<th align="center"></th>
								<th align="center"></th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</form>

			<div class="modal fade" id="XmyModal" role="dialog">
				<div class="modal-dialog" id="modal-alert" style="width:630px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Approval PKS FROM PM</h4>
						</div>
						<div class="modal-body">
							<textarea id="ketapp" class="form-control pull-right" rows="5"></textarea>
							<br><br><br><br><br><br><br><br>
							<div class="col-md-12">
								<label>New value project :</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-money"></i>
									</div>
									<input type="text" class="form-control" id="txt_nilai" name="txt_nilai">
								</div>
							</div>
							<br><br><br><br>
							<div class="col-md-12">
								<label>Upload Attachment :</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-search"></i>
									</div>
									<input type="file" onchange="ValidateSize(this)" class="form-control" id="unbak" name="nbak[]">
								</div>
							</div>
							<br><br><br><br>
							<div class="col-md-12">
								<label>Change Status :</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-search"></i>
									</div>
									<select name="txt_status" id="txt_status" class="form-control pull-right" style="width:100%">
										<option value=""></option>
										<option value="9">Review Internal</option>
										<option value="13">Sirkuler Internal</option>
									</select>
								</div>
							</div>
							<br><br><br><br>

							<input type="hidden" id="nnojo" name="nnojo">
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_rej">Review Internal</button> -->
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btn_app">Process</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->


			<div class="modal fade" id="DXmyModal" role="dialog">
				<div class="modal-dialog" id="modal-alert" style="width:630px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">History Dokumen</h4>
						</div>
						<div class="modal-body">
							<div id="arrdok"></div>
							<br><br><br>
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btn_close">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->

			<div class="modal fade" id="myModal3" role="dialog">
				<div class="modal-dialog" id="modal-alert">
					<div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">NOJO</h4>
						</div>
						<div class="modal-body">
							<table id="listnojo" class="table table-bordered table-hover" style="width: 100%">
								<thead>
									<tr>
										<th>NO</th>
										<th>NOJO</th>
										<th>APPROVAL</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<br><br><br>
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btn_close">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->

			<div class="modal fade" id="myModal4" role="dialog">
				<div class="modal-dialog" id="modal-alert" style="width:800px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Log</h4>
						</div>
						<div class="modal-body">
							<table id="listlogDraft" class="table table-bordered table-hover" style="width: 100%">
								<thead>
									<tr>
										<th>NO</th>
										<th>UPDATE</th>
										<th>ATTACHMENT</th>
										<th>STATUS</th>
										<th>UPD</th>
										<th>TIME</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<br><br><br>
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btn_close">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->

			<div class="modal fade" id="myModal5" role="dialog">
				<div class="modal-dialog" id="modal-alert" style="width:800px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Return BAK</h4>
						</div>
						<div class="modal-body">
							<table class="table " style="width: 100%">
								<tbody>
									<tr>
										<td>NOBAK</td>
										<td id="mnobak"></td>
									</tr>
									<tr>
										<td>NOTE</td>
										<td id="mnote"></td>
									</tr>
								</tbody>
							</table>
							<div>
								<label>Ket :</label>
								<textarea class="form-control" rows="2" name="txt_ket" id="txt_ket" style="resize:none"></textarea>
							</div>

						</div><br><br><br>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" id="btn_return" value="16">Return</button>
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btn_revisi" value="15">Revisi</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->

		</div>
	</section>
</div>


<script>
	$(function() {

		$('#txt_nilai').keyup(function(event) {
			// skip for arrow keys
			if (event.which >= 37 && event.which <= 40) return;

			// format number
			$(this).val(function(index, value) {
				//$('#txttarget2').val(value);
				return value
					.replace(/\D/g, "")
					.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			});
		});

		dataString = $("#formid").serializeArray();
		var xTable =
			$("#listorder").DataTable({
				orderCellsTop: true,
				fixedHeader: true,
				processing: true,
				serverSide: true,
				responsive: true,
				bFilter: false,
				bAutoWidth: false,
				bLengthChange: false,
				scrollX: true,
				// ordering: true,
				bSort: true,
				ajax: {
					url: "<?php echo base_url() . 'index.php/pks/listdata_pks'; ?>",
					type: 'POST',
					dataType: "json",
					// data		: dataString
					data: function(data) {
						data.carpro = $("#carpro").val();
						data.carnoj = $("#carnoj").val();
						data.cartnew = $("#cartnew").select2('data')[0]['id'];
						data.cartbak = $("#cartbak").val();
						// data.cartbak      	= $("#cartbak").select2('data')[0]['id'];
						data.cartstatpks = $("#cartstatpks").select2('data')[0]['id'];
						data.carpks = $("#carpks").val();
						data.carapp = $("#carapp").val();
					}
				},
				createdRow: function(row, data, index) {
					$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
				},
				columnDefs: [{
						//"targets": [ 11,15,16,17,18,19,20,21,22  ], //first column / numbering column
						//"bVisible": false, //set not orderable
					},
					{
						"targets": [0, 1, 2, 4, 5], //first column / numbering column
						"orderable": false,
					},
				],
			});
		$('.dataTables_filter').addClass('pull-right');
		$('.dataTables_paginate').addClass('pull-right');

		$("#carnoj").keypress(function(e) {
			if (e.keyCode === 13) {
				xTable.ajax.reload();
			}
		});

		$("#cartnew").change(function() {
			xTable.ajax.reload();
		});

		$("#cartstatpks").change(function() {
			xTable.ajax.reload();
		});

		$("#carpro").keypress(function(e) {
			if (e.keyCode === 13) {
				xTable.ajax.reload();
			}
		});

		$("#cartbak").change(function() {
			xTable.ajax.reload();
		});

		/*
		$("#btn_app").click(function(){
			var nojo = $("#nnojo").val();
			var kapp = $("#ketapp").val();
			larr = [nojo,kapp]
			var url	= "<?php echo base_url(); ?>index.php/pks/app_pks";
			$.post(url, {data : larr, typex : 1}, function(res){
				alert(res);
				// alert("Sukses");
				xTable.ajax.reload();
			})
		});
		
		$("#btn_rej").click(function(){
			var nojo = $("#nnojo").val();
			var kapp = $("#ketapp").val();
			larr = [nojo,kapp]
			var url	= "<?php echo base_url(); ?>index.php/pks/app_pks";
			$.post(url, {data : larr, typex : 2}, function(res){
				alert(res);
				// alert("Sukses");
				xTable.ajax.reload();
			})
		});
		*/

		$("#btn_return").click(function() {
			var nobak = $("#mnobak").html();
			var ket = $("#txt_ket").val();
			var flag = $("#btn_return").val();

			var url = "<?php echo base_url(); ?>index.php/pks/revisi_pks";
			$.post(url, {
				nobak: nobak,
				ket: ket,
				flag: flag
			}, function(res) {
				alert(res);
				// alert("Sukses");
				xTable.ajax.reload();
			})
		});

		$("#btn_revisi").click(function() {
			var nobak = $("#mnobak").html();
			var ket = $("#txt_ket").val();
			var flag = $("#btn_revisi").val();

			var url = "<?php echo base_url(); ?>index.php/pks/revisi_pks";
			$.post(url, {
				nobak: nobak,
				ket: ket,
				flag: flag
			}, function(res) {
				alert(res);
				// alert("Sukses");
				xTable.ajax.reload();
			})
		});

		$("#btn_app").click(function() {
			var nojo = $("#nnojo").val();
			var kapp = $("#ketapp").val();
			var newbak = $("#unbak").val();
			var nilai = $('#txt_nilai').val();
			var status = $('#txt_status').val();

			if (kapp == '') {
				alert('Keterangan harus diisi');
				return false;
			} else if (status == '') {
				alert('Status harus diisi');
				return false;
			}

			var fd = new FormData();
			var filesnbak = $('#unbak')[0].files[0];
			fd.append('filesnbak', filesnbak);
			fd.append('newbak', newbak);
			fd.append('nobak', nojo);
			fd.append('kapp', kapp);
			fd.append('nilai', nilai);
			fd.append('status', status);

			$.ajax({
				url: '<?php echo base_url("index.php/pks/app_pks") ?>',
				type: 'POST',
				xhr: function() {
					var myXhr = $.ajaxSettings.xhr();
					return myXhr;
				},
				success: function(data) {
					alert(data);
					$('#XmyModal').modal('hide');
					xTable.ajax.reload();
				},
				data: fd,
				cache: false,
				contentType: false,
				processData: false
			});
			return false;
		});


		$("#btn_rej").click(function() {
			var nojo = $("#nnojo").val();
			var kapp = $("#ketapp").val();
			var newbak = $("#unbak").val();
			var nilai = $('#txt_nilai').val();

			if (kapp == '') {
				alert('Keterangan harus diisi');
				return false;
			}

			var fd = new FormData();
			var filesnbak = $('#unbak')[0].files[0];
			fd.append('filesnbak', filesnbak);
			fd.append('newbak', newbak);
			fd.append('nobak', nojo);
			fd.append('kapp', kapp);
			fd.append('nilai', nilai);
			fd.append('typex', 2);

			$.ajax({
				url: '<?php echo base_url("index.php/pks/app_pks") ?>',
				type: 'POST',
				xhr: function() {
					var myXhr = $.ajaxSettings.xhr();
					return myXhr;
				},
				success: function(data) {
					alert(data);
					$('#XmyModal').modal('hide');
					xTable.ajax.reload();
				},
				data: fd,
				cache: false,
				contentType: false,
				processData: false
			});
			return false;
		});

		$("#btn_excel").click(function() {
			var cartbak = $('#cartbak').val();
			var carnoj = $('#carnoj').val();
			var cartnew = $('#cartnew').val();
			var carpro = $('#carpro').val();
			var carpks = $('#carpks').val();
			var carapp = $('#carapp').val();
			var cartstatpks = $('#cartstatpks').val();
			url = "<?php echo base_url(); ?>index.php/pks/excel/?cartbak=" + cartbak + "&carnoj=" + carnoj + "&cartnew=" + cartnew + "&carpro=" + carpro + "&carpks=" + carpks + "&carapp=" + carapp + "&cartstatpks=" + cartstatpks;
			window.open(url, '_blank');
		});

	});
</script>