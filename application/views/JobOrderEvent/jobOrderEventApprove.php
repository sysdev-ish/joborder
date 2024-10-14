<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">
<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<? echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/moment.min.js" type="text/javascript"></script>
<script src="<? echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#dateToAdd').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	$('#dateFromAdd').datepicker({format: 'yyyy-mm-dd',autoclose:true});
});

function listDetail(datas)
{
		var reponses = "";
		//alert(datas);
		var jonoStr = document.getElementById(datas+"data").value;
		//alert(jonoStr);
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/JobOrderEvent/jobEventApproveDetail',
					 dataType: 'json',
					 data: {'jonos': jonoStr },
					 beforeSend: function (jqXHR, settings) {
					 },
					 timeout: 5000,
					 success: function (data) {
						 //alert(" | " +  data.result);
						 var buttonStr = "<button type='button' class='btn btn-danger pull-left' data-dismiss='modal' id='dpn_cancel'><i class='fa fa-close'></i> Cancel</button> ";
							 buttonStr = buttonStr + "<button type='button' class='btn btn-primary pull-right' onclick='process()' >Approve <i class='fa fa fa-arrow-circle-right'></i></button> ";
							 buttonStr = buttonStr + "<button type='button' class='btn btn-warning pull-right' onclick='reject()'><i class='fa fa-arrow-circle-left'></i> Reject</button> ";


						 	 document.getElementById("listButton").innerHTML =buttonStr;
 						 	 document.getElementById("listDetailModal").innerHTML = data.result;

					 },
					 error: function (jqXHR, textStatus, errorThrown) {
						// alert("-" + errorThrown);
							 if (textStatus == 'timeout') {

							 } else {

							 }
					 }

			 }
				);

}

function getValueChk()
{
	var totalData = document.querySelectorAll("[id='chk']").length;
  var stringData = "";
	for (i = 0; i < totalData; i++) {
		if(document.querySelectorAll("[id='chk']")[i].checked)
		{
    	stringData +=  document.querySelectorAll("[id='chk']")[i].value + "||";
		}
	}
	return stringData;
}
function reject()
{
	var strComment = document.getElementById("rejectsDetail").value;
	if(strComment.length>5)
	{
	if(confirm("Are you sure want to reject this data?"))
	{

			var jonoStr = document.getElementById("jonoDetail").value;
			var reponses = "";
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/JobOrderEvent/joOrderEventRejectProcess',
						 dataType: 'json',
						 data: {'jono': jonoStr,'rejects':strComment},
						 beforeSend: function (jqXHR, settings) {

						 },
						 timeout: 5000,
						 success: function (data) {
							 //alert(data.result);
								getList();
								$('#myModal').modal('hide');
								// document.getElementById("ListDetail").innerHTML = data;
						 },
						 error: function (jqXHR, textStatus, errorThrown) {
							 getList();
							 //	 alert(errorThrown + " 0 " + textStatus);
								 if (textStatus == 'timeout') {
										 //Lbl.innerHTML = "Timeout";
								 } else {
										 //Lbl.innerHTML = "Error";
								 }
						 }

				 }
					);
	}
}
else {
	alert("Please fill minimum 5 character in comment text");
}
}
function process()
{
	if(confirm("Are you sure want to approve this data?"))
	{

			var jonoStr = document.getElementById("jonoDetail").value;
			var reponses = "";
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/JobOrderEvent/joOrderEventApproveProcess',
						 dataType: 'json',
						 data: {'jono': jonoStr},
						 beforeSend: function (jqXHR, settings) {

						 },
						 timeout: 5000,
						 success: function (data) {
							 //alert(data.result);
								getList();
								$('#myModal').modal('hide');
								// document.getElementById("ListDetail").innerHTML = data;
						 },
						 error: function (jqXHR, textStatus, errorThrown) {
							 getList();
							 //	 alert(errorThrown + " 0 " + textStatus);
								 if (textStatus == 'timeout') {
										 //Lbl.innerHTML = "Timeout";
								 } else {
										 //Lbl.innerHTML = "Error";
								 }
						 }

				 }
					);
	}
}
function deletes()
{
	jono = document.getElementById('jonoDetail').value;
	alert(jono);
	if(confirm("Are you sure want to delete this data?"))
	{

			var reponses = "";

		  //alert(criteriaData + " " + status + " " + jonoStr );
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/JobOrderEvent/joOrderEventDelete',
						 dataType: 'json',
						// contentType: "application/json; charset=utf-8",
						 data: {'jono': jono},
						 beforeSend: function (jqXHR, settings) {
								 //removeBtn.style.display = 'none';
								 //Lbl.style.display = '';
								 //Lbl.innerHTML = "wait..";
						 },
						 timeout: 5000,
						 success: function (data) {
							 getList();
								// alert(data);
								// document.getElementById("ListDetail").innerHTML = data;
						 },
						 error: function (jqXHR, textStatus, errorThrown) {
							 getList();
							 	// alert(errorThrown);
								 if (textStatus == 'timeout') {
										 //Lbl.innerHTML = "Timeout";
								 } else {
										 //Lbl.innerHTML = "Error";
								 }
						 }

				 }
					);
	}

}

function getList()
{
	var criteriaData = document.getElementById("criteriaData").value;

		var reponses = "";
		//alert( <?php echo "'" . $username . "'" ; ?> + " " +  <?php echo "'" . $level . "'" ; ?> + " " + status);
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/JobOrderEvent/JSGetEventApproveList',
					 dataType: 'json',
					// contentType: "application/json; charset=utf-8",
					 data: {'criteriaData': criteriaData },
					 beforeSend: function (jqXHR, settings) {

					 },
					 timeout: 5000,
					 success: function (data) {
							// alert(data);
							 document.getElementById("ListDetail").innerHTML = data.result;
					 },
					 error: function (jqXHR, textStatus, errorThrown) {
						 	// alert(errorThrown);
							 if (textStatus == 'timeout') {
									 //Lbl.innerHTML = "Timeout";
							 } else {
									 //Lbl.innerHTML = "Error";
							 }
					 }

			 }
				);

}
</script>
<title>PortalISH | <?php echo $title;?></title>
        <!-- Main content -->

<div class="content-wrapper">
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Filtering Data</h3>
				</div><!-- /.box-header -->
				<!-- form start -->

				<div class="box-body">


					<div class="form-group col-md-8">
						<label class="col-md-2">Search :  </label>
						<div class="input-group col-md-10">
							<input type="text" value="" placeholder="Search .." class="form-control pull-right" id="criteriaData" >
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group col-md-2">
						<button type="button" class="btn btn-primary" id="btn_simpan" onclick="getList()"><i class="fa fa-search"></i> Search</button>

					</div>

				</div><!-- /.box-body -->


			</div><!-- /.box -->
		</div><!-- /.box -->

		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Approval List Job Order (Event / OTC) Data</h3>

				</div><!-- /.box-header -->
				<!-- form start -->

				<div class="box-body" id="ListData">
					<div class="form-group col-md-9">
					</div>
					<div class="form-group col-md-3">
					</div>

					<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Jo No</th>
												<th>Type</th>
                        <th>Event/OTC Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Vanue</th>
                        <th>City</th>
                        <th>Value <br>(Rp)</th>
												<th>Management Fee <br>(%)</th>
                        <th>PO No</th>
												<th>Last Approval</th>
												<th>Next Approval</th>
                        <th>Status</th>
												<th>Create By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="ListDetail">

												<?php echo $jobOrderList ?>

                    </tbody>
                </table>

				</div><!-- /.box-body -->

			</div><!-- /.box -->
		</div><!-- /.box -->
<!-- MODAL -->
<div class="modal fade" id="myModal" role="dialog" tabindex="-1">
		<div class="modal-dialog" id="modal-alert">
		 <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Job Order (Event / OTC)</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="box-body" id="listDetailModal">


					</div>
				</form>
			</div>
			<div class="modal-footer" id="listButton">


			</div>

		 </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>


	</div><!-- /.row -->
</section>
</div>
