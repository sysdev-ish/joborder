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

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Non PKS
			<small>List Project Non PKS</small>
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

					<!-- <div class="col-lg-3">
						<label></label>
						<div class="input-group">
							<button type='button' class='btn btn-primary' id='btn_excel'><i class='fa fa-cloud-download'></i> Download To Excel</button>
						</div>
					</div> -->

					<table id="list_data" class="table table-bordered table-hover" style="width: 100%;">

						<thead style="background-color: #dd4b39; color:white;">
							<tr>
								<th align="center" style="width: 5%;">NO</th>
								<th align="center">PROJECT</th>
								<th align="center">NOBAK</th>
								<th align="center">CUSTOMER</th>
								<th align="center">TYPE</th>
							</tr>

							<tr>
								<th></th>
								<th>
									<input type="text" id="cari_project" name="cari_project" class="form-control pull-right" style="width: 100%;">
								</th>
								<th></th>
								<th>
									<input type="text" id="cari_customer" name="cari_customer" class="form-control pull-right" style="width: 100%;">
								</th>
								<th></th>
							</tr>

						</thead>

					</table>
				</div>
			</form>

		</div>
	</section>
</div>

<script type="text/javascript">
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

		var xTable = $("#list_data").DataTable({
			orderCellsTop: true,
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
				url: "<?php echo base_url() . 'index.php/pks/list_data_project_non_pks'; ?>",
				type: 'POST',
				dataType: "json",
				data: function(data) {
					data.cari_project = $("#cari_project").val();
					data.cari_customer = $("#cari_customer").val();
				}
			},

			columnDefs: [{
					//"targets": [ 11,15,16,17,18,19,20,21,22  ], //first column / numbering column
					//"bVisible": false, //set not orderable
				},
				{
					"targets": [0], //first column / numbering column
					"orderable": false,
				},
				// {
				// 	"className": "text-center",
				// 	"targets": [5]
				// },
			],
		});

		$('.dataTables_filter').addClass('pull-right');
		$('.dataTables_paginate').addClass('pull-right');

		$("#cari_project").keypress(function(e) {
			if (e.keyCode === 13) {
				xTable.ajax.reload();
			}
		});

		$("#cari_customer").keypress(function(e) {
			if (e.keyCode === 13) {
				xTable.ajax.reload();
			}
		});

		$("#cartstatpks").change(function() {
			xTable.ajax.reload();
		});

		$("#cartbak").change(function() {
			xTable.ajax.reload();
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