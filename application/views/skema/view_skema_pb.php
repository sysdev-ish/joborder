<link href="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/my.js" type="text/javascript"></script>

<!--<link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/select2_4.0.1/dist/css/select2.min.css">-->
<script src="<?php echo base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!--<script src="<?php echo base_url() ?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>-->
<script src="<?php echo base_url() ?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>

<div class="content-wrapper">

	<section class="content">

		<div class="row">

			<div class="col-md-12">
				<div class="box box-default  box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">LIST PERNER</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>

					<div class="box-body">
						<div class="form-group">
							<div class="btn-group" role="group" aria-label="...">
								<button type="button" id="btnadd" class='btn btn-success fa fa-plus' data-toggle='modal' data-target='#myModal' aria-label="Tambah"> Tambah</button>
							</div>
							<!-- <div class="btn-group" role="group" aria-label="...">
								<button type='button' class='btn btn-warning fa fa-download' id='btn_excel'> Download Excel</button>
							</div> -->
						</div>

						<table id="list_data" class="table table-bordered table-hover" style="width:100%">
							<thead bgcolor="#FF6666">
								<tr>
									<th rowspan="2" style="text-align:center;">NO</th>
									<th rowspan="2" style="text-align:center;">PERNER</th>
									<th colspan="4" style="text-align:center;">PERHITUNGAN AWAL</th>
									<th colspan="2" style="text-align:center;">PERHITUNGAN BARU</th>
									<!-- <th rowspan="2" style="text-align:center;">x TOTAL BULAN BARU</th> -->
									<th rowspan="2" style="text-align:center;">STATUS</th>
									<th rowspan="2"></th>
								</tr>
								<tr>
									<th style="text-align:center;">START DATE</th>
									<th style="text-align:center;">END DATA</th>
									<th style="text-align:center;">ZPARAMETER AWAL</th>
									<th style="text-align:center;">x TOTAL BULAN AWAL</th>
									<th style="text-align:center;">ZPARAMETER BARU</th>
									<th style="text-align:center;">x TOTAL BULAN BARU</th>
								</tr>
								<tr>
									<th></th>
									<th><input type="text" class="form-control" id="cari_perner" style="width:100%;"></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>

				</div><!-- /.box-body -->

			</div>
		</div>
	</section>
</div>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-danger" id="modal-alert">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Form</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" name="ksimpan" id="ksimpan" method="post">
					<div class="box-body">
						<div class="form-group" id='div-add'>
							<label class="col-sm-4 control-label">PERNER</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<select class="form-control pull-right" id="txt_perner" name="txt_perner" style="width:100%;" onchange="getlastkontrak(this.value)">
									</select>
								</div>
							</div>
						</div>
						<div class="form-group" id='div-edit'>
							<label class="col-sm-4 control-label">PERNER</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right pernerdit" id="txt_perner_edit" disabled />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">START KONTRAK</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="hidden" class="form-control pull-right" id="txt_id" />
									<input type="hidden" class="form-control pull-right" id="txt_idkontrak" />
									<input type="text" class="form-control pull-right" id="txt_start" disabled="disabled" />
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">END KONTRAK</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="txt_end" disabled="disabled" />
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">x BULAN AWAL</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="txt_jmlbulan" disabled="disabled" />
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">ZPARAMETER EXISTING</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="txt_lzparameter" disabled="disabled" />
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">PERUBAHAN TOTAL BULAN</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="txt_jmlbulannew" />
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">ZPARAMETER BARU</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="txt_zparameter" />
									</select>
								</div>
							</div>
						</div>
						<div class="form-group" id="divstatus">
							<label class="col-sm-4 control-label">Status</label>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<select class="form-control" id="txt_status" name="txt_status">
										<option value="">Pilih</option>
										<option value="1">Enable</option>
										<option value="0">Disable</option>
									</select>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btn_close">Close</button>
				<button type="button" class="btn btn-outline" id="btn_simpan">Save</button>
				<button type="button" class="btn btn-outline" id="btn_edit">Edit</button>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
	function getlastkontrak() {
		var perner = $('#txt_perner').val();

		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/skema/getlastkontrak/",
			data: {
				perner: perner
			},
			dataType: 'JSON',
			success: function(data) {
				$("#txt_idkontrak").val(data.detail[0].id_kontrak);
				$("#txt_start").val(data.detail[0].start_date);
				$("#txt_end").val(data.detail[0].end_date);
				$("#txt_jmlbulan").val(data.detail[0].jmlbulan);
				$("#txt_lzparameter").val(data.detail[0].zparameter);
			}
		});
	}

	$(function() {

		$.fn.modal.Constructor.prototype.enforceFocus = function() {
			$(".select2role").select2();
		}

		$("#btnadd").click(function() {
			$('#div-edit').hide();
			$('#div-add').show();
			$('#btn_simpan').show();
			$('#btn_edit').hide();
			reset_modal();

		});

		var xTable = $('#list_data').DataTable({
			"orderCellsTop": true,
			"bRetrieve": true,
			"searching": false,
			"bProcessing": true,
			"bPaginate": true,
			"bInfo": true,
			"bFilter": false,
			"bLengthChange": true,
			"bAutoWidth": true,
			"scrollX": true,
			"bJQueryUI": false,
			"serverSide": true,
			// "iDeferLoading": 0,
			"ajax": {
				url: "<?php echo base_url('index.php/skema/viewListSkemaPB'); ?>", // json datasource
				type: "post", // type of method  , by default would be get
				dataType: "json",
				data: function(data) {
					data.cari_perner = $("#cari_perner").val();
				},
				error: function() { // error handling code
					$("#list_data_processing").css("display", "none");
					alert('error');
				},

			},

			"columnDefs": [
				// {
				// 	"targets": [0],
				// 	"visible": false
				// }, 
				{
					"className": "text-center",
					"targets": [5, 7, 8]
				},
			]
		});

		$("#cari_perner").keypress(function(e) {
			xTable.ajax.reload();
		});



	});

	$(document).ready(function() {
		$("#txt_perner").select2({
			ajax: {
				placeholder: "Cari Perner....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/skema/xsearperner",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term
					};
				},
				processResults: function(data) {
					return {
						results: $.map(data, function(obj) {

							return {
								id: obj.perner,
								text: obj.perner
							};
						})
					};
				},
			},
			minimumInputLength: 4
		});

		$("#btn_simpan").click(function() {
			$('#overlay').show();
			var xTable = $('#list_data').DataTable();

			var perner = $('#txt_perner').val();
			var idkontrak = $('#txt_idkontrak').val();
			var start = $('#txt_start').val();
			var end = $('#txt_end').val();
			var jmlbulan = $('#txt_jmlbulan').val();
			var lzparameter = $('#txt_lzparameter').val();
			var jmlbulannew = $('#txt_jmlbulannew').val();
			var zparameter = $('#txt_zparameter').val();

			if (jmlbulannew == '') {
				alert("Perubahan Bulan Baru Tidak Boleh Kosong");
				return false;
			}

			var url = "<?php echo base_url(); ?>index.php/skema/add_uak_perner";
			$.post(url, {
				perner: perner,
				idkontrak: idkontrak,
				start: start,
				end: end,
				jmlbulan: jmlbulan,
				lzparameter: lzparameter,
				jmlbulannew: jmlbulannew,
				zparameter: zparameter
			}, function(response) {
				alert(response);
				$('#myModal').modal('hide');
				$(".modal-backdrop").remove();
				xTable.ajax.reload();
			});
		});

		$("#btn_edit").click(function() {
			$('#overlay').show();
			var xTable = $('#list_data').DataTable();

			var id = $('#txt_id').val();
			var perner = $('#txt_perner_edit').val();
			var idkontrak = $('#txt_idkontrak').val();
			var start = $('#txt_start').val();
			var end = $('#txt_end').val();
			var jmlbulan = $('#txt_jmlbulan').val();
			var lzparameter = $('#txt_lzparameter').val();
			var jmlbulannew = $('#txt_jmlbulannew').val();
			var zparameter = $('#txt_zparameter').val();

			if (jmlbulannew == '') {
				alert("Perubahan Bulan Baru Tidak Boleh Kosong");
				return false;
			}

			var url = "<?php echo base_url(); ?>index.php/skema/edit_uak_perner";
			$.post(url, {
				id: id,
				perner: perner,
				idkontrak: idkontrak,
				start: start,
				end: end,
				jmlbulan: jmlbulan,
				lzparameter: lzparameter,
				jmlbulannew: jmlbulannew,
				zparameter: zparameter
			}, function(response) {
				alert(response);
				$('#myModal').modal('hide');
				$(".modal-backdrop").remove();
				xTable.ajax.reload();
			});
		});


	});

	function edit_data(id) {
		$('#btn_simpan').hide();

		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/skema/ambil_detail_uak",
			data: {
				id: id
			},
			dataType: 'JSON',
			success: function(data) {

				$('#myModal').modal('show');
				$('#div-edit').show();
				$('#div-add').hide();

				$("#txt_id").val(id);
				$("#txt_idkontrak").val(data.detail[0].id_kontrak);
				$("#txt_perner_edit").val(data.detail[0].perner);
				$("#txt_start").val(data.detail[0].start_date);
				$("#txt_end").val(data.detail[0].end_date);
				$("#txt_jmlbulan").val(data.detail[0].jmlbulan);
				$("#txt_lzparameter").val(data.detail[0].lzparameter);
				$("#txt_jmlbulannew").val(data.detail[0].jmlbulannew);
				$("#txt_zparameter").val(data.detail[0].zparameter);
				$("#txt_status").val(data.detail[0].status);
			}
		});
	};

	function reset_modal() {
		$("#btn_edit").hide();
		$("#btn_simpan").show();
		$('#txt_id').val("");
		$('#txt_perner').val("");
		$('#txt_perner_edit').val("");
		$('#txt_idkontrak').val("");
		$('#txt_start').val("");
		$('#txt_end').val("");
		$('#txt_jmlbulan').val("");
		$('#txt_lzparameter').val("");
		$('#txt_jmlbulannew').val("");
		$('#txt_zparameter').val("");
		$('#txt_status').val("");
		$("#divstatus").hide();
	}
</script>