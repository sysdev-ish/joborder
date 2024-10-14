<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url()?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>


<script type="text/javascript">
$(function () {
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
});

function rincid(nojo){
	var vnojo = nojo; 
	var url	= "<?php echo base_url();?>index.php/bast/listrinc";
	$.post(url, {data : vnojo}, function(res){
		zTable.fnDestroy();
		$('#overlay').hide();
		$('#listrincian tbody').html(res);
		$('#listrincian').dataTable({"bFilter": false, "bSort": true, "bLengthChange": false, "bPaginate": true});
	})
};

function desk(xkid, deskrip){
	document.getElementById("cekdesk").value = deskrip;
};
</script>

<script type="text/javascript">

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
          <section class="content-header">
            <h1>
              Job Order
              <small>List</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Job Order</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<div class="box box-default" id="tar1">
					<form role="form" id="formid">	
						<div class="box-body">
							<table id="listorder" class="table table-bordered table-hover">
								<thead style="background-color: #dd4b39; color:white;">
									<tr>
										<th align="center" style="width:220px;">No JO</th>
										<th align="center" style="width:120px">Type New</th>
										<th align="center" style="width:350px;">Project</th>
										<th align="center">Lama Project</th>
										<th align="center">Tgl Bekerja</th>
										<th align="center">Deskripsi</th>
										<th align="center">No BAK</th>
										<th align="center">Action</th>
									</tr>
									
									<tr>
										<th align="center"><div class="form-group"><input type="text" id="carnoj" class="form-control pull-right" style="width:220px;"></div></th>
										<th align="center"><div class="form-group"><select name="cartnew" id="cartnew" class="form-control select2 pull-right" style="width:150px"><option value=""></option><option value="1">New Project</option><option value="2">New Pengembangan</option></select></div></th>
										<th align="center"><div class="form-group"><input type="text" id="carpro" class="form-control pull-right" style="width:350px;"></div></th>
										<th align="center"></th>
										<th align="center"></th>
										<th align="center"></th>
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
						<div class="modal-dialog" id="modal-alert" style="width:930px;">
							<div class="modal-content">
								<div class="modal-header" style="background-color:blue; color:white;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Detail JO</h4>
								</div>
								<div class="modal-body">
									<div class="box-group" id="accordion">
										<div class="panel box box-primary">
										  <div class="box-header with-border">
											<h4 class="box-title">
											  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Rincian Dan Checklist data
											  </a>
											</h4>
										  </div>
										  <div id="collapseOne" class="panel-collapse collapse in">
											<div class="box-body">
												<table id="listrincian" class="table table-bordered table-hover"  style="width:100%;">
													<thead style="background-color:blue; color:white;">
														<tr>
															<th >Jabatan</th>
															<th >Gender</th>
															<th >Pendidikan</th>
															<th >Lokasi</th>
															<th >Atasan</th>
															<th >Kontrak</th>
															<th >Waktu</th>
															<th >Permintaan</th>
															<th >Pemenuhan</th>
														</tr>
													</thead>
													<tbody style="color:#000000;">
													</tbody>
												</table>
												<!--<br><hr><br>-->
											</div>
										  </div>
										</div>
									</div>
									<br>
									
									<div class="box-body divlistdoc">
										<p></p>
										<div class="col-xs-12">
											<label class="center_title_bar">Doc Upload list</label>
										</div>
										
										<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
										<?php foreach($rdoc as $list){ ?>
											<div class="col-md-4" style="margin-top:5px;">
												<input type="checkbox" name="kumdoc[]" id="kumdoc" value="<?php echo $list['id'];?>"> <?php echo $list['nama'];?>
											</div>
										<?php } ?>
										</div>
									</div>
									<br>
									
									<div class="col-md-12">
										<label class=" control-label">Upload File Checklist</label>
										<div class="">
											<input type="file" class="form-control pull-right" name="komponen1" id="komponen1"/>
											<label style="color:#FF0000; font-size:10px;">Recomended Using ZIP Format</label>											
										</div>
									</div>
									<br><br><br><br>
									
									<input type="hidden" id="nnojo" name="nnojo">
									<input type="hidden" id="ntjo" name="ntjo">
									<input type="hidden" id="ntrep" name="ntrep">
								</div>
								<div class="modal-footer" style="background-color:blue; color:white;">
									<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
									<button type="button" class="btn btn-outline" data-dismiss="modal" id="nbtn_simpan">Bast</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.example-modal -->
					
						
					<div class="modal fade" id="Modal_des" role="dialog">
					  <div class="modal-dialog" id="modal-alert" style="width:500px;">
						 <div class="modal-content">
							<div class="modal-header" style="background-color:blue; color:white;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Deskripsi</h4>
							</div>
							<div class="modal-body">
								<form class="">
									<div class="box-body">
										<textarea id="cekdesk" cols="55" rows="10"></textarea>
									</div>
								</form>
							</div>
							<div class="modal-footer" style="background-color:blue; color:white;">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							</div>
						 </div>
					  </div>
					</div>
							
				</div>
			</section>
	</div>
	
	
<script>
$(function(){
	dataString = $("#formid").serializeArray();
	var xTable =
	$("#listorder").DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		bFilter: false,
		bAutoWidth: false,
		bLengthChange: false,
		scrollX: true,
		// ordering: true,
		bSort : true,
		ajax: {
		  url 		: "<?php echo base_url().'index.php/bast/listdata_bast';?>",
		  type 		:'POST',
		  dataType	: "json",
		  // data		: dataString
		  data         : function (data) {
				data.carpro      	= $("#carpro").val();
				data.carnoj      	= $("#carnoj").val();
				data.cartnew      	= $("#cartnew").select2('data')[0]['id'];
		  }
		},
		createdRow: function(row, data, index) {
			$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
		},
		columnDefs: [
        { 
            //"targets": [ 11,15,16,17,18,19,20,21,22  ], //first column / numbering column
            //"bVisible": false, //set not orderable
        },
		{ 
            "targets": [ 0, 1, 2 ], //first column / numbering column
            "orderable": false,
        },
        ],
	});
	$('.dataTables_filter').addClass('pull-right'); 
	$('.dataTables_paginate').addClass('pull-right');
	
	$("#carnoj").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
	$("#cartnew").change(function(){
		xTable.ajax.reload();
	});
	
	$("#carpro").keypress(function(e){
		if(e.keyCode === 13){
			xTable.ajax.reload();
		}
	});
	
});

</script>