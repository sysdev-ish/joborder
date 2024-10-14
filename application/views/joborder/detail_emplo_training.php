<?php
if(!empty($pros_train)){ 
	foreach($pros_train as $listx){ 
		$ghj = $listx['penilaian'];
		$klm = $listx['status'];
	}
}
else
{
	$ghj = '';
	$klm = '';
}
?>
<div class="form-group col-md-12" id="divkesimpulan">
	<label class=" control-label">Assessment Result</label>
	<div class="">
		<textarea id="ases" rows="5" cols="80" name="ases" class="form-control pull-right" placeholder="Kesimpulan Pewawancara"><?php echo $ghj; ?></textarea>
	</div><!-- /.input group -->
</div><!-- /.form group -->

<div class="form-group col-md-12" id="divstatus">
	<label class=" control-label">Status</label>
	<div class="">
		<select class="form-control" id="xstatus" name="xstatus" style="width:100%;">
			<option value=""<?php if($klm == '') { ?> selected="selected"<?php } ?> >Pilih</option>	
			<option value="1"<?php if($klm == '1') { ?> selected="selected"<?php } ?> >Diterima</option>
			<option value="2"<?php if($klm == '2') { ?> selected="selected"<?php } ?>>Dipertimbangkan</option>	
			<option value="3"<?php if($klm == '3') { ?> selected="selected"<?php } ?>>Ditolak</option>			
		</select>
	</div><!-- /.input group -->
</div><!-- /.form group -->