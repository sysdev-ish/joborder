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
			PKS
			<small>List Verifikasi</small>
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
					<div class="form-group">

						<div class="col-lg-3">							
							<div class="info-box bg-aqua">
								<span class="info-box-icon"><i class="ion ion-ios-gear-outline"></i></span>
								<div class="info-box-content">
								<span class="info-box-text">Dikirim ke Legal</span>
								<span class="info-box-number"><?php echo $status[0]['dikirim']; ?></span>
								<div class="progress">
								<div class="progress-bar" style="width: <?php echo ($status[0]['dikirim']/$status[0]['jml'])*100; ?>%"></div>
								</div>
								<span class="progress-description">
								Permintaan telah dikirim ke legal
								</span>
								</div>

							</div>
						</div>

						<div class="col-lg-3">							
							<div class="info-box bg-green">
								<span class="info-box-icon"><i class="ion ion-ios-gear-outline"></i></span>
								<div class="info-box-content">
								<span class="info-box-text">Draft</span>
								<span class="info-box-number"><?php echo $status[0]['progres']; ?></span>
								<div class="progress">
								<div class="progress-bar" style="width: <?php echo ($status[0]['progres']/$status[0]['jml'])*100; ?>%"></div>
								</div>
								<span class="progress-description">
								Proses pembuatan
								</span>
								</div>

							</div>
						</div>

						<div class="col-lg-3">							
							<div class="info-box bg-yellow">
								<span class="info-box-icon"><i class="ion ion-ios-gear-outline"></i></span>
								<div class="info-box-content">
								<span class="info-box-text">Return</span>
								<span class="info-box-number"><?php echo $status[0]['dikembalikan']; ?></span>
								<div class="progress">
								<div class="progress-bar" style="width: <?php echo ($status[0]['dikembalikan']/$status[0]['jml'])*100; ?>%"></div>
								</div>
								<span class="progress-description">
								Data dikembalikan oleh Legal
								</span>
								</div>

							</div>
						</div>
						<div class="col-lg-3">							
							<div class="info-box bg-red">
								<span class="info-box-icon"><i class="ion ion-ios-gear-outline"></i></span>
								<div class="info-box-content">
								<span class="info-box-text">Stop</span>
								<span class="info-box-number"><?php echo $status[0]['berhenti']; ?></span>
								<div class="progress">
								<div class="progress-bar" style="width: <?php echo ($status[0]['berhenti']/$status[0]['jml'])*100; ?>%"></div>
								</div>
								<span class="progress-description">
								Stop permintaan
								</span>
								</div>

							</div>
						</div>
					</div>

					<table id="list_data" class="table table-bordered table-hover" style="width: 100%;">

						<thead style="background-color: #dd4b39; color:white;">
							<tr>
								<th align="center" style="width: 5%;">NO</th>								
								<th align="center">PROJECT</th>
								<th align="center">CUSTOMER</th>
								<th align="center">PM APPROVED BY</th>
								<th align="center">PKS</th>
								<th align="center">STATUS</th>
								<th align="center"></th>
							</tr>

							<tr>
								<th></th>
								<th>
									<input type="text" id="cari_project" name="cari_project" class="form-control pull-right" style="width: 100%;">
								</th>
								<th>
									<input type="text" id="cari_customer" name="cari_customer" class="form-control pull-right" style="width: 100%;">
								</th>
								<th></th>
								<th></th>
								<th>
									<select name="cari_status" id="cari_status" class="form-control select2 pull-right" style="width:100%">
											<option value="">Pilih</option>
											<option value="0">Dikirim ke Legal</option>
											<option value="6">Return</option>
										</select>
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
					url: "<?php echo base_url() . 'index.php/pks/list_data_verifikasi'; ?>",
					type: 'POST',
					dataType: "json",
					data: function(data) {
						data.cari_project = $("#cari_project").val();
						data.cari_customer = $("#cari_customer").val();
						data.cari_status = $("#cari_status").val();
					}
				},

				columnDefs: [{
						//"targets": [ 11,15,16,17,18,19,20,21,22  ], //first column / numbering column
						//"bVisible": false, //set not orderable
					},
					{
						"targets": [0, 6], //first column / numbering column
						"orderable": false,
					},
					{
						"className": "text-center",
                    	"targets": [5, 6]
					},
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

		$("#cari_status").change(function() {
			xTable.ajax.reload();
		});

		$("#cartstatpks").change(function() {
			xTable.ajax.reload();
		});

		$("#cartbak").change(function() {
			xTable.ajax.reload();
		});

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