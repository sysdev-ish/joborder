<div class="content-wrapper">

<section class="content-header">
	<h1>
		Detail
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-body">
					<a onclick="history.go(-1);" class="btn btn-danger "><i class="fa fa-back"></i><b>Kembali</b></a>
				</div>

			</div>
			<div class="box box-danger">
				<div class="box-body">
					
					<h3 class="text-center">Project</h3>

					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>NO BAK</b> <a class="pull-right"><?php echo $listData[0]['nobak']; ?></a><br><br><br>
						</li>
						<li class="list-group-item">
							<b>CUSTOMER</b> <a class="pull-right"><?php echo explode('||', $listData[0]['customer'])[1]; ?></a>
						</li>
						<li class="list-group-item">
							<b>PROJECT</b> <a class="pull-right"><?php echo $listData[0]['project']; ?></a><br><br><br><br>
						</li>
						<li class="list-group-item">
							<?php if($listData[0]['project_type'] == 1){ ?>
								<b>PROJECT TYPE</b> <a class="pull-right"> BARU</a>
							<?php }else{ ?>
								<b>PROJECT TYPE</b> <a class="pull-right"> PENGEMBANGAN</a>
							<?php } ?>
						</li>
						<li class="list-group-item">
							<b>PROJECT NILAI</b> <a class="pull-right"><?php echo number_format($listData[0]['project_nilai'], 0, ",", "."); ?></a>
						</li>
						<li class="list-group-item">
							<b>PROJECT START</b> <a class="pull-right"><?php echo $listData[0]['project_start']; ?></a>
						</li>
						<li class="list-group-item">
							<b>PROJECT END</b> <a class="pull-right"><?php echo $listData[0]['project_end']; ?></a>
						</li>
						<li class="list-group-item">
							<b>PROJECT LONG</b> <a class="pull-right"><?php echo $listData[0]['project_long'].' Bulan'; ?></a>
						</li>
						<li class="list-group-item">
							<b>CREATED BY</b> <a class="pull-right"><?php echo explode('-', $listData[0]['project_created'])[1]; ?></a>
						</li>
						<li class="list-group-item">
							<b>PM APPROVED BY</b> <a class="pull-right"><?php echo explode('-', $listData[0]['project_approved_by'])[1]; ?></a>
						</li>
						<li class="list-group-item">
							<b>PM APPROVED AT</b> <a class="pull-right"><?php echo $listData[0]['project_approved_at']; ?></a>
						</li>
						<li class="list-group-item">
							<?php if(!empty($listData[0]['pks_file']) && $listData[0]['pks_file'] <> 8 ){ ?>
								<b>Draft PKS</b> 
							<?php }else{ ?>
								<b>Dokumen PKS</b> 
							<?php } ?>
							<a  type="button"  id="button" onclick="button"><a class="pull-right" href='https://legal.ish.co.id/legal/uploads/<?php echo $listData[0]['pks_file']; ?>' target='_blank'> <?php echo explode('/', $listData[0]['pks_file'])[2]; ?></a>
						</li>
						
					</ul>
					<!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
				</div>

			</div>

		</div>

		<div class="col-md-8">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">History</h3>
				</div>
				<div class="box-body">

					<?php if(!empty($report->data) && $listData[0]['status_pks'] != 7 && $type == 'PM'){ ?>
						<a class="btn btn-primary" id="btn_update" data-toggle='modal' data-target='#myModal' ><i class='fa fa-add'></i><b>Update</b></a>
						<br>
					<?php } ?>

					<table id="list_data" class="table table-bordered table-hover" style="width: 100%;">

						<thead style="background-color: #dd4b39; color:white;">
							<tr>
								<th align="center" style="width: 5%;">NO</th>								
								<th align="center">UPDATED</th>
								<th align="center">UPDATED AT</th>
								<th align="center">KETERANGAN</th>
								<th align="center">LAMPIRAN</th>
							</tr>

						</thead>
						<tbody>
							<?php
								if (count($report->data)){
									$i = 1;
									$path = 'https://legal.ish.co.id/legal/uploads/';

									foreach($report->data as $key => $list){
										if(!empty($list->attachment)){
											$lampiran = '<a href=' . $path . $list->attachment . ' target="_blank"> ' . md5($list->attachment) . '.' . explode('.', $list->attachment)[1] . '</a>';
										}else{
											$lampiran = '';
										}
										
										echo "<tr>";
					                    echo "<td class=''>". $i ."</td>";
					                    echo "<td class=''>". explode('-', $list->created)[1] ."</td>";
					                    echo "<td class=''>". date('Y-m-d H:i:s',strtotime($list->created_at)) ."</td>";
					                    echo "<td class=''>". $list->keterangan ."</td>";
					                    echo "<td class=''>". $lampiran ."</td>";
					                    $i++;
									}
								}else{
    								echo "<tr align=center><td colspan=8>No data to display</td></tr>";
    							}
							?>
						</tbody>

					</table>
				</div>
			</div>
		</div>

	</div>

</section>

</div>
<div class="modal modal-danger fade in" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Update</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Keterangan</label>
					<textarea class="form-control" name="txt_keterangan" id="txt_keterangan" rows="3" style="resize: none;" placeholder="Enter ..."></textarea>
				</div>
				<div class="form-group">
					<label>Lampiran</label>
					<input type="file" class="form-control" name="txt_lampiran" id="txt_lampiran">
					<span>format allow (jpg, jpeg, png, pdf)</span>
				</div>

				<?php if($listData[0]['status_pks'] == 3){ ?>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control pull-right" name="txt_status" id="txt_status" style="width:100%">
						<option value="">Pilih</option>
						<option value="2">Review Internal</option>
						<option value="4">Sirkuler Internal</option>
					</select>
				</div>
				<?php } ?>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btn_submit">Submit</button>
			</div>
		</div>

	</div>
</div>

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

	function getFileExtension(filename) {
		// get file extension
		const extension = filename.split('.').pop().toLowerCase();
		return extension;
	}

	$(document).ready(function() {

		$(".select2").select2();

		$('input[name=txt_lampiran]').change(function() {
			var file = $('#txt_lampiran').val();
			const ext = getFileExtension(file);
			console.log(ext);
			if (ext == 'jpg' || ext == 'jpeg' || ext == 'pdf' || ext == 'png') {

			} else {
				alert('format file salah');
				$('#txt_lampiran').val('');
				return false;
			}
		});

		$("#btn_update").click(function(){
			$('#txt_keterangan').val('');
			$('#txt_lampiran').val('');
		 });

		var xTable = $('#list_data').dataTable({
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": true,
			"scrollX": true,
			"bJQueryUI": false ,
			columnDefs: [{
			    "defaultContent": "-",
			    "targets": "_all"
			  }] 
		});

		$("#btn_submit").click(function(){
			var xTable = $('#list_data').DataTable();
			var id = "<?php echo $listData[0]['id']; ?>";
			var keterangan = $("#txt_keterangan").val();
			var lampiran = $("#txt_lampiran").val();
			var status = $("#txt_status").val();

			if(keterangan == ''){
				alert('Keterangan tidak boleh kosong');
				return false;
			}

			if('<?php echo $listData[0]['status_pks']; ?>' == 3){
				if(status == ''){
					alert('Status tidak boleh kosong');
					return false;
				}

			}

			var file_data = $('#txt_lampiran').prop('files')[0];
			var form_data = new FormData();

			form_data.append('file', file_data);
			form_data.append('id', id);
			form_data.append('keterangan', keterangan);
			form_data.append('lampiran', lampiran);
			form_data.append('status', status);

			var url = "<?php echo base_url(); ?>" + "index.php/pks/update_history/";

			$.ajax({
				url: url,
				data: form_data,
				processData: false,
				contentType: false,
				type: "POST",
				// dataType: "json", 
				success: function(res) {

					alert(res);
					$('#myModal').modal('hide');
					$(".modal-backdrop").remove();
					// xTable.ajax.reload();
					location.reload();

				}
			});
		});


	});

	function submit(){
		
	}
</script>