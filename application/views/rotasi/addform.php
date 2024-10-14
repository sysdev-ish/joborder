<div class="col-md-3">
	<form class="form-horizontal" >
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Pilih Komponen Rotasi/Mutasi</h3>
		</div>
	
		<div class="box-body">
			<div class="col-md-12" style="margin-bottom:20px;">
				<label>Nojo :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="nojo" name="nojo" onchange="cariarea(this.value)" style="width:250px">
						<option value="">Pilih Nojo</option>	
						<?php echo $cmbnoj;?>
					</select>	
				</div>
			</div>
			<div class="col-md-12" style="margin-bottom:20px;">
				<label>Area :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="area" name="area" onchange="caripersa(this.value)" style="width:250px">
						<option value="">Pilih Area</option>
					</select>	
				</div>
			</div>
			<div class="col-md-12" style="margin-bottom:20px;">
				<label>PersonalArea :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="persa" name="persa" onchange="carijab(this.value)" style="width:250px">
						<option value="">Pilih PersonalArea</option>	
					</select>	
				</div>
			</div>
			<div class="col-md-12" style="margin-bottom:20px;">
				<label>Jabatan :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="jabatan" name="jabatan" onchange="cariskill(this.value)" style="width:250px">
						<option value="">Pilih Jabatan</option>	
					</select>	
				</div>
			</div>
			<div class="col-md-12" style="margin-bottom:20px;">
				<label>Skilllayanan :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="skill" name="skill" onchange="carilevel(this.value)" style="width:250px">
						<option value="">Pilih Skilllayanan</option>	
						<?php echo $cmbskill;?>
					</select>	
				</div>
			</div>
			<div class="col-md-12" style="margin-bottom:20px;">
				<label>Level :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="level" name="level" style="width:250px">
						<option value="">Pilih Level</option>	
						<?php echo $cmblvl;?>
					</select>	
				</div>
			</div>
			<div class="col-md-12" style="margin-bottom:20px;">
				<label>Perner yang akan di rotasi/mutasi :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="perner" name="perner" style="width:250px">
						<option value="">Pilih Perner</option>	
						<?php echo $cmbperner;?>
					</select>	
				</div>
			</div>
		</div>
	</div>	
	</form>
</div>

<div class="col-md-9">
	<form class="form-horizontal" >
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Rincian Rotasi/Mutasi</h3>
		</div>
	
		<div class="box-body">
			<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h6><i class="icon fa fa-check"></i> Detail Perner Sebelum di Rotasi/Mutasi</h6>
			</div>
			<table id="listrincianperner" class="table table-bordered table-hover">
				<thead style="background-color:#0099CC; color:#FFFFFF;">
					<tr>
						<th>Perner</th>
						<th>PersonalArea</th>
						<th>Area</th>
						<th>Skilllayanan</th>
						<th>Jabatan</th>
						<th>Level</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<br><br><br>
			<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h6><i class="icon fa fa-check"></i> Detail Perner yang akan di Rotasi/Mutasi</h6>
			</div>
			<table id="listrincianrotasi" class="table table-bordered table-hover">
				<thead style="background-color:#0099CC; color:#FFFFFF;">
					<tr>
						<th>Perner</th>
						<th>PersonalArea</th>
						<th>Area</th>
						<th>Skilllayanan</th>
						<th>Jabatan</th>
						<th>Level</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>	
	</form>
</div>

<script>
$(document).ready(function(){
	$(".select2").select2();
});

function cariarea(id) {
	var url = "<?php echo base_url(); ?>index.php/rotasi/cariarea";
	$.post(url, {datax:id}, function(response){
		$("#area").html(response);
	})
}

function caripersa(id) {
	var nojoid 	= $('#nojo').val(); 
	var url = "<?php echo base_url(); ?>index.php/rotasi/caripersa";
	$.post(url, {datax:id, datanojo:nojoid}, function(response){
		$("#persa").html(response);
	})
}

function carijab(id) {
	var nojoid 	= $('#nojo').val(); 
	var areaid 	= $('#area').val(); 
	var url = "<?php echo base_url(); ?>index.php/rotasi/carijab";
	$.post(url, {datax:id, areax:areaid, nojox:nojoid}, function(response){
		$("#jabatan").html(response);
	})
}

function cariskill(id) {
	var nojoid 	= $('#nojo').val(); 
	var areaid 	= $('#area').val();
	var url = "<?php echo base_url(); ?>index.php/rotasi/cariskill";
	$.post(url, {datax:id}, function(response){
		$("#skill").html(response);
	})
}

function carilevel(id) {
	var url = "<?php echo base_url(); ?>index.php/rotasi/carilevel";
	$.post(url, {datax:id}, function(response){
		$("#level").html(response);
	})
}
</script>	