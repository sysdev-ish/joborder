<div class="col-md-12">
	<label class="col-md-4">Draft:</label>
	<div class="input-group col-md-8">
		<?php if($listdok[0]['draft']!='' OR $listdok[0]['draft']!=null){ ?>
		<a href="https://legal.ish.co.id/public/draft/<?php echo $listdok[0]['draft']; ?>" target="_blank"><i class="fa fa-cloud-download"> Download</i></a>
		<?php } else { ?>
		<font color="red">NOT UPLOADED</font>	
		<?php } ?>
	</div>
</div>
<br>
<br>
<br>
<div class="col-md-12">
	<label class="col-md-4">Sirkulir Internal:</label>
	<div class="input-group col-md-8">
		<?php if($listdok[0]['sirkulir_i']!='' OR $listdok[0]['sirkulir_i']!=null){ ?>
		<a href="https://legal.ish.co.id/public/dok_sinternal/<?php echo $listdok[0]['sirkulir_i']; ?>" target="_blank"><i class="fa fa-cloud-download"> Download</i></a>	
		<?php } else { ?>
		<font color="red">NOT UPLOADED</font>	
		<?php } ?>
	</div>
</div>
<br>
<br>
<br>
<div class="col-md-12">
	<label class="col-md-4">Sirkulir Eksternal:</label>
	<div class="input-group col-md-8">
		<?php if($listdok[0]['sirkulir_e']!='' OR $listdok[0]['sirkulir_e']!=null){ ?>
		<a href="https://legal.ish.co.id/public/dok_seksternal/<?php echo $listdok[0]['sirkulir_e']; ?>" target="_blank"><i class="fa fa-cloud-download"> Download</i></a>	
		<?php } else { ?>
		<font color="red">NOT UPLOADED</font>	
		<?php } ?>
	</div>
</div>
<br>
<br>
<br>
<div class="col-md-12">
	<label class="col-md-4">Final PKS:</label>
	<div class="input-group col-md-8">
		<?php if($listdok[0]['doc_pks']!='' OR $listdok[0]['doc_pks']!=null){ ?>
		<a href="https://legal.ish.co.id/public/draft/<?php echo $listdok[0]['doc_pks']; ?>" target="_blank"><i class="fa fa-cloud-download"> Download</i></a>		
		<?php } else { ?>
		<font color="red">NOT UPLOADED</font>	
		<?php } ?>
	</div>
</div>