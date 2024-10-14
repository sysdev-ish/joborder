<?php //foreach($rdoc as $list){ ?>
<!--
	<div class="col-md-4" style="margin-top:10px;">
		<input type="checkbox" <?php //if(strpos($nana, $list['doc_id']) !== false) { echo 'checked'; } ?> name="kumdoc[]" id="kumdoc" value="<?php //echo $list['doc_id'];?>" disabled=disabled> <?php //echo $list['doc_name'];?>
		<br><br>
	</div>
-->
<?php //} ?>
<?php 
if(!empty($data_ada)){
	foreach($data_ada as $listx){ 
		$abc = $listx['desk'];
		$def = $listx['hasil'];
		$ghj = $listx['kesimpulan'];
		$klm = $listx['status'];
		
		$urut_desk = explode(";", $listx['desk']);
		$juml_desk	   = count($urut_desk);
		
		$urut_hasil = explode(";", $listx['hasil']);
		$juml_hsl   = count($urut_hasil);
	}
}
 ?>

<?php foreach($pros_hr as $list){ 
	$wow = $list['jml'];
	
	$urut_id = explode(";", $list['id']);
	$juml_id = count($urut_id);
	
	$urut_judul = explode(";", $list['judul']);
	$juml_jdl   = count($urut_judul);
	
	$urut_deskripsi = explode(";", $list['deskripsi']);
	$juml_deskripsi	= count($urut_deskripsi);
} ?>


<?php if(!empty($data_ada)){ ?>
<?php for($i=0;$i<$wow;$i++) { ?>
<div class="col-md-5 form-group" id="divdes1">
		<label class="control-label"><?php echo $urut_judul[$i] ?></label>
		<textarea class="form-control" rows="3" placeholder="<?php echo $urut_deskripsi[$i] ?>" style="resize:none;" readonly=readonly/></textarea>
</div><!-- /.form group -->

<div class="col-md-5 form-group" id="divdes1">
		<label class=" control-label">Deskripsi</label> 
		<?php echo "<textarea class='form-control' rows='3' name='des' id='des' placeholder='Description'>". $urut_desk[$i] ."</textarea>" ?>	
</div><!-- /.form group -->

<div class="form-group col-md-2" id="divhdes1">
	<label class=" control-label">Hasil 1</label>
		<select class="form-control pull-right" id="h_des" name="h_des" style="width:100%; margin-bottom:70px;">
			<option value=""<?php if($urut_hasil[$i] == '') { ?> selected="selected"<?php } ?>>Pilih</option>	
			<option value="1"<?php if($urut_hasil[$i] == '1') { ?> selected="selected"<?php } ?>>Tinggi</option>
			<option value="2"<?php if($urut_hasil[$i] == '2') { ?> selected="selected"<?php } ?>>Baik</option>	
			<option value="3"<?php if($urut_hasil[$i] == '3') { ?> selected="selected"<?php } ?>>Cukup</option>	
			<option value="4"<?php if($urut_hasil[$i] == '4') { ?> selected="selected"<?php } ?>>Kurang</option>	
		</select>
</div><!-- /.form group -->
<?php } ?>

<div class="form-group col-md-12" id="divkesimpulan">
	<label class=" control-label">Kesimpulan Pewawancara</label>
	<div class="">
		<textarea id="kesimpulan" rows="5" name="kesimpulan" class="form-control" placeholder="Kesimpulan Pewawancara"><?php echo $ghj; ?></textarea>
	</div><!-- /.input group -->
</div><!-- /.form group -->

<div class="form-group col-md-12" id="divstatus">
	<label class=" control-label">Status</label>
	<div class="">
		<select class="form-control pull-right" id="status" name="status" style="width:100%;">
			<option value=""<?php if($klm == '') { ?> selected="selected"<?php } ?> >Pilih</option>	
			<option value="1"<?php if($klm == '1') { ?> selected="selected"<?php } ?> >Diterima</option>
			<option value="2"<?php if($klm == '2') { ?> selected="selected"<?php } ?>>Dipertimbangkan</option>	
			<option value="3"<?php if($klm == '3') { ?> selected="selected"<?php } ?>>Ditolak</option>		
		</select>
	</div><!-- /.input group -->
</div><!-- /.form group -->

<?php } else { ?>

<?php for($i=0;$i<$wow;$i++) { ?>
<div class="col-md-5 form-group" id="divdes1">
		<label class="control-label"><?php echo $urut_judul[$i] ?></label>
		<textarea class="form-control" rows="3" placeholder="<?php echo $urut_deskripsi[$i] ?>" style="resize:none;" readonly=readonly/></textarea>
</div><!-- /.form group -->

<div class="col-md-5 form-group" id="divdes1">
		<label class=" control-label">Deskripsi</label> 
		<textarea class='form-control' rows='3' name='des' id='des' placeholder='Description'></textarea>
</div><!-- /.form group -->

<div class="form-group col-md-2" id="divhdes1">
	<label class=" control-label">Hasil 1</label>
		<select class="form-control pull-right" id="h_des" name="h_des" style="width:100%; margin-bottom:70px;">
			<option value="">Pilih</option>	
			<option value="1">Tinggi</option>
			<option value="2">Baik</option>	
			<option value="3">Cukup</option>	
			<option value="4">Kurang</option>	
		</select>
</div><!-- /.form group -->
<?php } ?>

<div class="form-group col-md-12" id="divkesimpulan">
	<label class=" control-label">Kesimpulan Pewawancara</label>
	<div class="">
		<textarea id="kesimpulan" rows="5" name="kesimpulan" class="form-control" placeholder="Kesimpulan Pewawancara"></textarea>
	</div><!-- /.input group -->
</div><!-- /.form group -->

<div class="form-group col-md-12" id="divstatus">
	<label class=" control-label">Status</label>
	<div class="">
		<select class="form-control pull-right" id="status" name="status" style="width:100%;">
			<option value="">Pilih</option>	
			<option value="1">Diterima</option>
			<option value="2">Dipertimbangkan</option>	
			<option value="3">Ditolak</option>		
		</select>
	</div><!-- /.input group -->
</div><!-- /.form group -->

<?php } ?>