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
function clearData(){
	//alert("here");
	document.getElementById("levelNo").value = "1";
	document.getElementById("valueMin").value = "0";

}
function saveData()
{
	var taskID = document.getElementById("lTask").value;
	var taskDetailID = document.getElementById("lTaskDetail").value;
	var citysIDs = document.getElementById("cityID").value;
	var userID = document.getElementById("lUser").value;
	var levelNo = document.getElementById("levelNo").value;
	var valueMin = document.getElementById("valueMin").value;
	var reponses = "";
		// alert(citysIDs);
		// alert(taskID + " " + taskDetailID + " " + userID + " " + levelNo + " " + valueMin );
	if(citysIDs.length>0)
	{
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/Setting/JSapproveUserAdd',
					 dataType: 'json',
					// contentType: "application/json; charset=utf-8",
					 data: {'taskID': taskID,'taskDetailID': taskDetailID,'userID': userID,'levelNo': levelNo,'valueMin': valueMin,'cityID':citysIDs },
					 beforeSend: function (jqXHR, settings) {
							 //removeBtn.style.display = 'none';
							 //Lbl.style.display = '';
							 //Lbl.innerHTML = "wait..";
					 },
					 timeout: 5000,
					 success: function (data) {
						 getList();
							// alert(data);
							 //document.getElementById("ListDetail").innerHTML = data;
					 },
					 error: function (jqXHR, textStatus, errorThrown) {
						 getList();
						 	// alert("Saving Data Failed, Please check your data and city cannot be empty");
							 if (textStatus == 'timeout') {
									 //Lbl.innerHTML = "Timeout";
							 } else {
									 //Lbl.innerHTML = "Error";
							 }
					 }

			 }
				);
	}
	else {
		alert("Please select city on filtering data panel");
	}


}
function deleteData(taskIDs,taskDetailIDs,userIDs,cityIDs)
{

	if(confirm("Are you sure want to delete this data?"))
	{

			var reponses = "";
		 //alert(taskIDs + " " + taskDetailIDs + " " + userIDs );
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/Setting/JSapproveUserDelete',
						 dataType: 'json',
						// contentType: "application/json; charset=utf-8",
						 data: {'taskID': taskIDs,'taskDetailID': taskDetailIDs,'userID': userIDs,'cityID': cityIDs },
						 beforeSend: function (jqXHR, settings) {
								 //removeBtn.style.display = 'none';
								 //Lbl.style.display = '';
								 //Lbl.innerHTML = "wait..";
						 },
						 timeout: 5000,
						 success: function (data) {
								// alert(data);
								// document.getElementById("ListDetail").innerHTML = data;
						 },
						 error: function (jqXHR, textStatus, errorThrown) {
							 //	 alert("Deleting Data Failed, Please Check Your Data");

								 if (textStatus == 'timeout') {
										 //Lbl.innerHTML = "Timeout";
								 } else {
										 //Lbl.innerHTML = "Error";
								 }
						 }

				 }
					);

	}


		getList();
}
function getChange(datas)
{
		var reponses = "";
		//alert(datas);
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/Setting/JStaskDetail',
					 dataType: 'json',
					// contentType: "application/json; charset=utf-8",
					 data: {'taskID': datas },
					 beforeSend: function (jqXHR, settings) {
							 //removeBtn.style.display = 'none';
							 //Lbl.style.display = '';
							 //Lbl.innerHTML = "wait..";
					 },
					 timeout: 5000,
					 success: function (data) {
							// alert(data);
							 document.getElementById("lTaskDetail").innerHTML = data;
					 },
					 error: function (jqXHR, textStatus, errorThrown) {
						 	 alert(errorThrown);
							 if (textStatus == 'timeout') {
									 //Lbl.innerHTML = "Timeout";
							 } else {
									 //Lbl.innerHTML = "Error";
							 }
					 }

			 }
				);

}
function getList()
{
	var taskIDs = document.getElementById("lTask").value;
	var taskDetailIDs = document.getElementById("lTaskDetail").value;
  var citysIDs = document.getElementById("cityID").value;
		var reponses = "";
		//alert(datas);
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/Setting/JSApprovalData',
					 dataType: 'json',
					// contentType: "application/json; charset=utf-8",
					 data: {'taskID': taskIDs,'taskDetailID' : taskDetailIDs,'cityID': citysIDs },
					 beforeSend: function (jqXHR, settings) {
							 //removeBtn.style.display = 'none';
							 //Lbl.style.display = '';
							 //Lbl.innerHTML = "wait..";
					 },
					 timeout: 5000,
					 success: function (data) {
							// alert(data);
							 document.getElementById("ListDetail").innerHTML = data;
					 },
					 error: function (jqXHR, textStatus, errorThrown) {
						 	 alert(errorThrown);
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
				<form role="form">
				<div class="box-body">
					<div class="form-group col-md-5">
						<label class="col-md-4">Task :  </label>
						<div class="input-group col-md-8">
							<select class="form-control" id="lTask" name ="lTask" onchange="getChange(this.value)">
								<?php echo $cmbTask ?>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<div class="form-group col-md-5">
						<label class="col-md-4">Task Detail :  </label>
						<div class="input-group col-md-8">
							<select class="form-control" id="lTaskDetail" name ="lTaskDetail">
								<?php echo $cmbTaskDetail ?>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group col-md-5">
						<label class="col-md-4">City :  </label>
						<div class="input-group col-md-8">
							<select class="form-control" id="cityID" name ="cityID">
								<?php echo $cmbCity ?>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group col-md-2">
						<button type="button" class="btn btn-primary" id="btn_simpan" onclick="getList()"><i class="fa fa-search"></i> Search</button>

					</div>

				</div><!-- /.box-body -->

				</form>
			</div><!-- /.box -->
		</div><!-- /.box -->

		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">List Approval Data</h3>

				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form">
				<div class="box-body" id="ListData">
					<div class="form-group col-md-9">
					</div>
					<div class="form-group col-md-3">
						<button type="button" class="btn btn-primary btn-block" onclick="clearData()" data-toggle="modal" data-target="#myModal"  id="tmbhrincian"><i class="fa fa-plus"></i> Add</button>
					</div>

					<table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
											  <th>City</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Level</th>
                        <th>Value Min</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="ListDetail">
                    <tr>
												<?php echo $approvalList ?>
                    </tr>

                    </tbody>
                </table>

				</div><!-- /.box-body -->
				</form>
			</div><!-- /.box -->
		</div><!-- /.box -->

		<div class="modal fade" id="myModal" role="dialog" tabindex="-1">
			  <div class="modal-dialog" id="modal-alert">
				 <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title">Add Approval User</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class="box-body">

								<div class="form-group col-md-12">
									<label class="col-md-4">User :  </label>
									<div class="input-group col-md-8">
										<select class="form-control" id="lUser" name ="lUser">
											<?php echo $cmbUser ?>
										</select>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4">Level :  </label>
									<div class="input-group col-md-8">
										<input type="text" value="" class="form-control pull-right" id="levelNo" >
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4">Value Min : Rp.  </label>
									<div class="input-group col-md-8">
										<input type="text" value="0" class="form-control pull-right" id="valueMin" >
									</div>
								</div>

							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
						<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
						<button type="button" class="btn btn-success" id="addrincian" onclick="saveData()" data-dismiss="modal">Save User</button>
					</div>
				 </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div>

	</div><!-- /.row -->
</section>
</div>
