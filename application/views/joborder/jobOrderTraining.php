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
	document.getElementById('trainingNameAdd').value = "";
	document.getElementById('dateFromAdd').value= "";
	document.getElementById('dateToAdd').value= "";
	document.getElementById('vanueAdd').value= "";
	document.getElementById('cityID').value= "";
	document.getElementById('joValueAdd').value= "";
  document.getElementById('descriptionAdd').value= "";
	document.getElementById('durationAdd').value= "";

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
					 url: '<?php echo base_url(); ?>index.php/JobOrder/JobOrderTrainingDetails',
					 dataType: 'json',
					 data: {'jonos': jonoStr },
					 beforeSend: function (jqXHR, settings) {
					 },
					 timeout: 5000,
					 success: function (data) {
						 //alert(" | " +  data.result);
							 document.getElementById("listDetailModal").innerHTML = data.result;
							 var btn = document.getElementById("btnProc");
							 //alert(data.totalDoc);
							 if(parseInt(data.totalDoc)>0) {
								 btn.disabled = true;
								 document.getElementById('totalDoc').value = data.totalDoc;
							 }
							 else {
							 	btn.disabled = false;
								document.getElementById('totalDoc').value = "0";
							 }
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
function saveData()
{
	var trainingNames = document.getElementById('trainingNameAdd').value;
	var dateFroms = document.getElementById('dateFromAdd').value;
	var dateTos = document.getElementById('dateToAdd').value;
	var vanues = document.getElementById('vanueAdd').value;
	var citys = document.getElementById('cityID').value;
	var joValues = document.getElementById('joValueAdd').value;
	var descriptions = document.getElementById('descriptionAdd').value;
	var durations = document.getElementById('durationAdd').value;
  var chkData =	getValueChk();

//alert(trainingNames + " " + dateFroms + " " + dateTos + " " + vanues + " " + citys + " " + joValues + " " + descriptions + " " + durations + " ");
if(trainingNames.length>0 && dateFroms.length>0 && dateTos.length>0)
{

	if(confirm("Are you sure want to save this data?"))
	{
		var reponses = "";
	//	alert(taskID + " " + taskDetailID + " " + userID + " " + levelNo + " " + valueMin );
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/JobOrder/JSSaveJOTraining',
					 dataType: 'json',
					// contentType: "application/json; charset=utf-8",
					 data: {'projectType': 'N','trainingName': trainingNames,'dateFrom': dateFroms,'dateTo': dateTos,'vanue': vanues,'city': citys,'joValue': joValues,'description': descriptions,'duration': durations,'chkData':chkData},
					 beforeSend: function (jqXHR, settings) {

					 },
					 timeout: 5000,
					 success: function (data) {
						 getList();
					//   alert(data.result);
							// document.getElementById("ListDetail").innerHTML = data;
					 },
					 error: function (jqXHR, textStatus, errorThrown) {
						 alert(errorThrown + " " + textStatus);
						 getList();

							 if (textStatus == 'timeout') {
									 //Lbl.innerHTML = "Timeout";
							 } else {
									 //Lbl.innerHTML = "Error";
							 }
					 }

			 }
				);
$('#myModal2').modal('hide');
}
}else { alert("Please insert correctly your data");}
}
function saveProcessData()
{
	var trainingNames = document.getElementById('trainingNameAdd').value;
	var dateFroms = document.getElementById('dateFromAdd').value;
	var dateTos = document.getElementById('dateToAdd').value;
	var vanues = document.getElementById('vanueAdd').value;
	var citys = document.getElementById('cityID').value;
	var joValues = document.getElementById('joValueAdd').value;
	var descriptions = document.getElementById('descriptionAdd').value;
	var durations = document.getElementById('durationAdd').value;
	var chkData =	getValueChk();
//alert(trainingNames + " " + dateFroms + " " + dateTos + " " + vanues + " " + citys + " " + joValues + " " + descriptions + " " + durations + " ");
if(trainingNames.length>0 && dateFroms.length>0 && dateTos.length>0)
{

	if(confirm("Are you sure want to save and process this data?"))
	{
		var reponses = "";
	//	alert(taskID + " " + taskDetailID + " " + userID + " " + levelNo + " " + valueMin );
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/JobOrder/JSSaveAndProcessJOTraining',
					 dataType: 'json',
					// contentType: "application/json; charset=utf-8",
					 data: {'projectType': 'N','trainingName': trainingNames,'dateFrom': dateFroms,'dateTo': dateTos,'vanue': vanues,'city': citys,'joValue': joValues,'description': descriptions,'duration': durations,'chkData':chkData},
					 beforeSend: function (jqXHR, settings) {

					 },
					 timeout: 5000,
					 success: function (data) {
						 getList();

							// alert(data.result);
							// document.getElementById("ListDetail").innerHTML = data;
					 },
					 error: function (jqXHR, textStatus, errorThrown) {
						 alert(errorThrown + " " + textStatus);
						 getList();

							 if (textStatus == 'timeout') {
									 //Lbl.innerHTML = "Timeout";
							 } else {
									 //Lbl.innerHTML = "Error";
							 }
					 }

			 }
				);
	 $('#myModal2').modal('hide');
}}else { alert("Please insert correctly your data");}
}
function process(jono)
{
	if(confirm("Are you sure want to process this data?"))
	{

			var jonoStr = document.getElementById(jono+"data").value;
			var reponses = "";
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/JobOrder/JSProcessJOTraining',
						 dataType: 'json',
						 data: {'jono': jonoStr},
						 beforeSend: function (jqXHR, settings) {

						 },
						 timeout: 5000,
						 success: function (data) {
							 //alert(data.result);
								getList();
								// document.getElementById("ListDetail").innerHTML = data;
						 },
						 error: function (jqXHR, textStatus, errorThrown) {
							 getList();
							 	 alert(errorThrown + " 0 " + textStatus);
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
function deletes(jono)
{
	if(confirm("Are you sure want to delete this data?"))
	{
			var criteriaData = document.getElementById("criteriaData").value;
			var status = document.getElementById("status").value;
			var jonoStr = document.getElementById(jono+"data").value;
			//alert(<?php echo "'".$nama."'";?>);
			var deletedBy = <?php echo "'".$nama."'";?>;

			var reponses = "";
		  //alert(criteriaData + " " + status + " " + jonoStr );
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/JobOrder/JSDeleteJOTraining',
						 dataType: 'json',
						// contentType: "application/json; charset=utf-8",
						 data: {'jono': jonoStr,'criteriaData': criteriaData,'status': status,'deletedBy': deletedBy,'username': <?php echo "'" . $username . "'" ; ?>,'level': <?php echo "'" . $level . "'" ; ?>},
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
function getChange(datas)
{
		var reponses = "";
		//alert(datas);
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/setting/JStaskDetail',
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
							 document.getElementById("lTaskDetail").innerHTML = data.result;
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
function getList()
{
	var criteriaData = document.getElementById("criteriaData").value;
	var status = document.getElementById("status").value;

		var reponses = "";
		//alert( <?php echo "'" . $username . "'" ; ?> + " " +  <?php echo "'" . $level . "'" ; ?> + " " + status);
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/JobOrder/JSJobTrainingData',
					 dataType: 'json',
					// contentType: "application/json; charset=utf-8",
					 data: {'criteriaData': criteriaData,'status' : status,'username': <?php echo "'" . $username . "'" ; ?>,'level': <?php echo "'" . $level . "'" ; ?> },
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
					<div class="form-group col-md-5">
						<label class="col-md-4">Job Type :  </label>
						<div class="input-group col-md-8">
							<select class="form-control" id="status" name ="status" >
                <option value = ""> ALL </option>
								<option value = "N" selected> NEW </option>
                <option value = "W"> WAITING FOR APPROVAL </option>
                <option value = "O"> ONGOING </option>
								<option value = "R"> ISH ACADEMY </option>
								<option value = "B"> BILLING </option>
                <option value = "C"> CLOSE </option>
								<option value = "D"> DELETED </option>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->

					<div class="form-group col-md-5">
						<label class="col-md-4">Search :  </label>
						<div class="input-group col-md-8">
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
					<h3 class="box-title">List Job Order (Training/EO) Data</h3>

				</div><!-- /.box-header -->
				<!-- form start -->

				<div class="box-body" id="ListData">
					<div class="form-group col-md-9">
					</div>
					<div class="form-group col-md-3">
						<button type="button" class="btn btn-primary btn-block" onclick="clearData()" data-toggle="modal" data-target="#myModal2"  id="tmbhrincian"><i class="fa fa-plus"></i> Add</button>
					</div>

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
			</div>

		 </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
		<div class="modal fade" id="myModal2" role="dialog" tabindex="-1">
				<div class="modal-dialog" id="modal-alert">
				 <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title">Add Job Order (Training / EO)</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class="box-body">

								<div class="form-group col-md-12">
									<label class="col-md-4">Training / EO Name :  </label>
									<div class="input-group col-md-8">
											<input type="text" value="" class="form-control pull-right" id="trainingNameAdd" >
									</div>
								</div>


								<div class="form-group col-md-12">
									<label class="col-md-4">Date From :  </label>
									<div class="input-group col-md-8">
										<input type="text" value="" placeholder="ex 2017-01-01" class="form-control pull-right" id="dateFromAdd" >
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">Date To :   </label>
									<div class="input-group col-md-8">
										<input type="text" value="" placeholder="ex 2017-01-01" class="form-control pull-right" id="dateToAdd" >
									</div>
								</div>


								<div class="form-group col-md-12">
									<label class="col-md-4">Vanue :   </label>
									<div class="input-group col-md-8">
										<input type="text" value="" class="form-control pull-right" id="vanueAdd" >
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">City :  </label>
									<div class="input-group col-md-8">
										<select class="form-control" id="cityID" name ="cityID">
											<?php echo $cmbCity2 ?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->

								<div class="form-group col-md-12">
									<label class="col-md-4">Detail Description :  </label>
									<div class="input-group col-md-8">
											<textarea rows="4" id="descriptionAdd" class="form-control pull-right"></textarea>
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">JO Value : Rp. </label>
									<div class="input-group col-md-8">
											<input type="text" value="" placeholder="0" class="form-control pull-right" id="joValueAdd" >
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">Duration : (Month)</label>
									<div class="input-group col-md-8">
											<input type="text" value="" placeholder="0" class="form-control pull-right" id="durationAdd" maxlength="2" >
									</div>

								</div>

								<div class="form-group col-md-12">
									<label class="col-md-12">Document Checklist : </label>
									<div class="input-group col-md-12" style="width:100%;height:100%;border:1px solid #000;">
											<?php echo $chkDetail; ?>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" id="dpn_cancel"><i class="fa fa-close"></i>Cancel</button>
						<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
						 <button type="button" class="btn btn-success" id="addrincian" title="Save Data" onclick="saveData()"> <i class="fa fa-save"></i> Save as Draft</button> <button type="button" title="Process Data"  class="btn btn-primary" id="addrincian" onclick="saveProcessData()">Process Data <i class="fa fa-arrow-circle-right"></i> </button>
					</div>
				 </div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

	</div><!-- /.row -->
</section>
</div>
