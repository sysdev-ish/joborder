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
	document.getElementById('eventNameAdd').value = "";
	document.getElementById('dateFromAdd').value= "";
	document.getElementById('dateToAdd').value= "";
	document.getElementById('eventTypeAdd').value= "";
	document.getElementById('vanueAdd').value= "";
	document.getElementById('locationAdd').value= "";
	document.getElementById('cityID').value= "";
	document.getElementById('eventValueAdd').value= "";
	document.getElementById('eventManagementAdd').value= "";
  document.getElementById('eventNotesAdd').value= "";
	document.getElementById('poNameAdd').value= "";

}
function validate()
{
	if(document.getElementById('cityID').value == "" || document.getElementById('eventNameAdd').value=="" || document.getElementById('dateFromAdd').value=="" || document.getElementById('dateToAdd').value=="" || document.getElementById('vanueAdd').value=="" || document.getElementById('eventValueAdd').value=="" ||document.getElementById('eventManagementAdd').value=="" )
	{
		alert("Please insert correctly your data");
	}
	else {
		document.getElementById("addID").submit();
	}
}
function btnChecker()
{
	 var status = "Y";
	 var datas = "";

  	datas = document.getElementById("poNameAdd").value;
		var btn = document.getElementById("saveDataBtn");
		if(datas.length<1)
		{
			btn.disabled = true;
		}
		else {
			btn.disabled = false;
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
					 url: '<?php echo base_url(); ?>index.php/jobOrderEvent/jobEventDetail',
					 dataType: 'json',
					 data: {'jonos': jonoStr },
					 beforeSend: function (jqXHR, settings) {
					 },
					 timeout: 5000,
					 success: function (data) {
						 //alert(" | " +  data.result);
						 var buttonStr = "<button type='button' class='btn btn-danger pull-left' data-dismiss='modal' id='dpn_cancel'><i class='fa fa-close'></i>Cancel</button> ";

						 if(data.status=='N')
						 {

							 buttonStr = buttonStr + "<?php echo "  <button type='button' class='btn btn-primary pull-right' id='dpn_save' onclick='process()'>Process <i class='fa fa-arrow-circle-right'></i></button> <button type='button' class='btn btn-warning pull-right' id='dpn_delete' onclick='deletes()'> <i class='fa fa-arrow-circle-left'></i> Delete</button>";?>";
						 }
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
function saveData()
{
	var trainingNames = document.getElementById('eventNameAdd').value;
	var dateFroms = document.getElementById('dateFromAdd').value;
	var dateTos = document.getElementById('dateToAdd').value;
	var vanue = document.getElementById('vanueAdd').value;
	var citys = document.getElementById('cityID').value;
	var eventValues = document.getElementById('eventValueAdd').value;
	var notes = document.getElementById('eventNotesAdd').value;
	var poNo = document.getElementById('poNoAdd').value;
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
					 url: '<?php echo base_url(); ?>index.php/joborder/JSSaveJOTraining',
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
						// alert(errorThrown + " " + textStatus);
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
}else { alert("Please insert correctly your data");
}

//alert(trainingNames + " " + dateFroms + " " + dateTos + " " + vanues + " " + citys + " " + joValues + " " + descriptions + " " + durations + " ");

}

function validAngka(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	  return false;

	return true;
}

function process()
{
	if(confirm("Are you sure want to process this data?"))
	{

			var jonoStr = document.getElementById("jonoDetail").value;
			var reponses = "";
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/jobOrderEvent/joOrderEventProcess',
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
							// 	 alert(errorThrown + " 0 " + textStatus);
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
	//alert(jono);
	if(confirm("Are you sure want to delete this data?"))
	{

			var reponses = "";

		  //alert(criteriaData + " " + status + " " + jonoStr );
			$.ajax(
				 {
						 type: 'POST',
						 url: '<?php echo base_url(); ?>index.php/jobOrderEvent/joOrderEventDelete',
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
							 $('#myModal').modal('hide');
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
	var types = document.getElementById("eventType").value;

		var reponses = "";
		//alert( <?php echo "'" . $username . "'" ; ?> + " " +  <?php echo "'" . $level . "'" ; ?> + " " + status);
		$.ajax(
			 {
					 type: 'POST',
					 url: '<?php echo base_url(); ?>index.php/jobOrderEvent/JSGetEventList',
					 dataType: 'json',
					// contentType: "application/json; charset=utf-8",
					 data: {'criteriaData': criteriaData,'status' : status,'types': types },
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
					<div class="form-group col-md-3">
						<label class="col-md-4">Job Status :  </label>
						<div class="input-group col-md-8">
							<select class="form-control" id="status" name ="status" >
								<option value = "N" selected> NEW </option>
                <option value = "W"> SALES APPROVAL </option>
                <option value = "O"> OPERATION </option>
								<option value = "A"> OPERATION APPROVAL </option>
								<option value = "F"> FINANCE </option>
								<option value = "B"> BILLING </option>
                <option value = "C"> CLOSE </option>
								<option value = "D"> DELETED </option>
							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group col-md-4">
						<label class="col-md-4">Event Type :  </label>
						<div class="input-group col-md-8">
							<select class="form-control" id="eventType" name ="eventType" >
								<option value = ""> ALL </option>
								<option value = "Event" selected> EVENT </option>
								<option value = "OTC"> OTC </option>

							</select>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
					<div class="form-group col-md-3">
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
					<h3 class="box-title">List Job Order (Event / OTC) Data</h3>

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

	<?php echo form_open_multipart('jobOrderEvent/joOrderEventAdd', 'id="addID"');?>
		<div class="modal fade" id="myModal2" role="dialog" tabindex="-1">
				<div class="modal-dialog" id="modal-alert">
				 <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title">Add Job Order (Event / OTC)</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class="box-body">

								<div class="form-group col-md-12">
									<label class="col-md-4">Event / OTC Name :  </label>
									<div class="input-group col-md-8">
											<input type="text" value="" class="form-control pull-right" id="eventNameAdd" name="eventNameAdd">
									</div>
								</div>


								<div class="form-group col-md-12">
									<label class="col-md-4">Date From :  </label>
									<div class="input-group col-md-8">
										<input type="text" value="" placeholder="ex 2017-01-01" class="form-control pull-right" id="dateFromAdd" name="dateFromAdd" >
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">Date To :   </label>
									<div class="input-group col-md-8">
										<input type="text" value="" placeholder="ex 2017-01-01" class="form-control pull-right" id="dateToAdd" name="dateToAdd" >
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4">Event Type :   </label>
									<div class="input-group col-md-8">
										<select class="form-control" id="eventTypeAdd" name ="eventTypeAdd">
											<option value="Event">Event</option>
											<option value="OTC">OTC</option>
										</select>
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">Vanue :   </label>
									<div class="input-group col-md-8">
										<input type="text" value="" class="form-control pull-right" id="vanueAdd" name="vanueAdd" >
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">Location :   </label>
									<div class="input-group col-md-8">
										<input type="text" value="" class="form-control pull-right" id="locationAdd" name="locationAdd" >
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">City :  </label>
									<div class="input-group col-md-8">
										<select class="form-control" id="cityID" name ="cityID">
											<?php echo $cmbCity ?>
										</select>
									</div><!-- /.input group -->
								</div><!-- /.form group -->

								<div class="form-group col-md-12">
									<label class="col-md-4">Notes :  </label>
									<div class="input-group col-md-8">
											<textarea rows="4" id="eventNotesAdd" name="eventNotesAdd" class="form-control pull-right"></textarea>
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">Value : Rp. </label>
									<div class="input-group col-md-8">
											<input type="text"  class="form-control pull-right" id="eventValueAdd"  onkeypress="return validAngka(event);" name="eventValueAdd" value="0">
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">Management Fee : % </label>
									<div class="input-group col-md-8">
											<input type="text" maxlength="2" class="form-control pull-right" id="eventManagementAdd"  onkeypress="return validAngka(event);" name="eventManagementAdd"  value="0" >
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-4">PO No : </label>
									<div class="input-group col-md-8">
											<input type="text" value=""  placeholder="0" class="form-control pull-right" id="poNoAdd"  name="poNoAdd">
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-4">PO Upload : </label>
									<div class="input-group col-md-8">
											<input type='file' id='poNameAdd' name='poNameAdd' onchange='btnChecker()'>
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
						 <button type="button" disabled class="btn btn-primary" id="saveDataBtn" title="Process Data" onclick="validate()"> Process Data <i class="fa fa-arrow-circle-right"></i></button>
					</div>
				 </div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
</form>
	</div><!-- /.row -->
</section>
</div>
