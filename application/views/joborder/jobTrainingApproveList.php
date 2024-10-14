<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">
<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#dateToAdd').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	$('#dateFromAdd').datepicker({format: 'yyyy-mm-dd',autoclose:true});
});
function clearData(){
	//document.getElementById('trainingNameAdd').value = "";
	//document.getElementById('dateFromAdd').value= "";
	//document.getElementById('dateToAdd').value= "";
	//document.getElementById('vanueAdd').value= "";
	//document.getElementById('cityID').value= "";
	//document.getElementById('joValueAdd').value= "";
//  document.getElementById('descriptionAdd').value= "";
//	document.getElementById('durationAdd').value= "";

}
function processByNo(jono)
{
	if(confirm("Are you sure want to process this data?"))
	{

			var jonoStr = document.getElementById(jono+"data").value;
			var reponses = "";
			// alert(jonoStr);
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/jobOrder/JSProcessJOTraining',
						 dataType: 'json',
						 data: {'jono': jonoStr},
						 beforeSend: function (jqXHR, settings) {

						 },
						 timeout: 5000,
						 success: function (data) {
								// alert(data);
								location.reload();
								// document.getElementById("ListDetail").innerHTML = data;
						 },
						 error: function (jqXHR, textStatus, errorThrown) {
							// getList();
							 location.reload();
							 	 // alert(errorThrown + " 0 " + textStatus);
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

function process()
{
	if(confirm("Are you sure want to process this data?"))
	{

			var jonoStr = document.getElementById("jonoAdd").value;
			var reponses = "";
			//alert(jonoStr);
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/jobOrder/JSProcessJOTraining',
						 dataType: 'json',
						 data: {'jono': jonoStr},
						 beforeSend: function (jqXHR, settings) {

						 },
						 timeout: 5000,
						 success: function (data) {
								// alert(data);
								location.reload();
								// document.getElementById("ListDetail").innerHTML = data;
						 },
						 error: function (jqXHR, textStatus, errorThrown) {
							// getList();
							location.reload();
							 	 // alert(errorThrown + " 0 " + textStatus);
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
function reject()
{
	var commentReject = document.getElementById('commentReject').value;
	if(commentReject.length<1)
	{
		alert("Commentary its mandatory for reject activity");
	}
	else {
		if(confirm("Are you sure want to reject this data?"))
		{


				var jonoStr = document.getElementById("jonoAdd").value;
				var rejectComment = document.getElementById("commentReject").value;
				var reponses = "";
				//alert(jonoStr + ' ' + rejectComment);
				$.ajax(
					 {
							 type: 'POST',
							 url: '<?php echo base_url(); ?>index.php/jobOrder/joTrainingReject',
							 dataType: 'json',
							 data: {'jono': jonoStr,'rejectComment':rejectComment},
							 beforeSend: function (jqXHR, settings) {

							 },
							 timeout: 5000,
							 success: function (data) {
									// alert(data);
									location.reload();
									// document.getElementById("ListDetail").innerHTML = data;
							 },
							 error: function (jqXHR, textStatus, errorThrown) {
								// getList();
								 	 //alert(errorThrown + " 0 " + textStatus);
									 location.reload();
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

}

function listDetail(datas)
{
		var reponses = "";
		//alert(datas);
		var jonoStr = document.getElementById(datas+"data").value;
		//alert(jonoStr);
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/jobOrder/jobOrderTrainingDetailApproval',
					 dataType: 'json',
					 data: {'jonos': jonoStr },
					 beforeSend: function (jqXHR, settings) {
					 },
					 timeout: 5000,
					 success: function (data) {
						 //alert(" | " +  data.result);
							 document.getElementById("listDetailModal").innerHTML = data.result;
					 },
					 error: function (jqXHR, textStatus, errorThrown) {
						 alert("-" + errorThrown);
						// location.reload();
							 if (textStatus == 'timeout') {

							 } else {

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
					<h3 class="box-title">List Job Order (Training/EO) Data</h3>

				</div><!-- /.box-header -->
				<!-- form start -->

				<div class="box-body" id="ListData">


					<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Jo No</th>
                        <th>Training Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Vanue</th>
                        <th>City</th>
                        <th>Value <br>(Rp)</th>
                        <th>Duration <br>(Month)</th>
												<th>Last Approval</th>
                        <th>Next Approval</th>
                        <th>Status</th>
												<th>Create By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="ListDetail">

												<?php echo $approvalList ?>

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
						<h4 class="modal-title">Job Order (Training / EO)</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class="box-body" id="listDetailModal">


							</div>
						</form>
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" id="dpn_cancel"><i class="fa fa-close"></i>Cancel</button>
						<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
						<button type="button" title="Reject Data"  class="btn btn-warning" id="addrincian" onclick="reject()"> <i class="fa fa-arrow-circle-left"></i> Reject Data  </button>
						<button type="button" title="Process Data"  class="btn btn-success" id="addrincian" onclick="process()">Approve Data <i class="fa fa-arrow-circle-right"></i> </button>
					</div>

				 </div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

	</div><!-- /.row -->
</section>
</div>
