<script src="<?php echo base_url()?>public/plugins/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
	$(function () {
	//$(document).ready(function(){
		$(".select2").select2();
		$.fn.modal.Constructor.prototype.enforceFocus = $.noop;
		
		CKEDITOR.replace('compose_textarea');
		CKEDITOR.config.autoParagraph = false;
	});
</script>

<?php
if (!empty($pros_file_g)){
		foreach($pros_file_g as $listx){  
			$aa = $listx['nama_perusahaan'];
			$bb = $listx['direktorat'];
			$cc = $listx['unit'];
			$dd = $listx['n_user'];
			$ee = $listx['j_user'];
			$ff = $listx['id_gm'];
			$gg = $listx['isi_dokumen'];
		} ?>
		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Isi Dokumen (LPP)</label>
			<div class="">
				<?php echo "<textarea id='compose_textarea' class='form-control' style='height: 300px' name='compose_textarea'>".$gg."</textarea>"; ?>
			</div>
		</div>
									
		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Nama Perusahaan</label>
			<div class="">
				<input type="text" id="nperus" name="nperus" class="form-control" value="<?php echo $aa; ?>">		
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Direktorat (BAPP)</label>
			<div class="">
				<input type="text" id="direk" name="direk" class="form-control" value="<?php echo $aa; ?>">	
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Unit (BAPP)</label>
			<div class="">
				<input type="text" id="unit" name="unit" class="form-control" value="<?php echo $aa; ?>">	
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Nama Penandatangan Client</label>
			<div class="">
				<input type="text" id="nttdx" name="nttdx" class="form-control" value="<?php echo $aa; ?>">	
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Jabatan Penandatangan Client</label>
			<div class="">
				<input type="text" id="jttdx" name="jttdx" class="form-control" value="<?php echo $aa; ?>">	
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Jabatan Penandatangan ISH</label>
			<div class="">
				<select id='jishx' name='jishx' class='form-control' >
					<!--<option value=''>- Pilih -</option>-->
					<?php //echo $cmbgm ?>
				</select>	
			</div><!-- /.input group -->
		</div><!-- /.form group -->
<?php } else { ?>
		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Isi Dokumen (LPP)</label>
			<div class="">
				<textarea id='compose_textarea' class='form-control' style='height: 300px' name='compose_textarea'></textarea>
			</div>
		</div>
		
		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Nama Perusahaan</label>
			<div class="">
				<input type="text" id="nperus" name="nperus" class="form-control">		
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Direktorat (BAPP)</label>
			<div class="">
				<input type="text" id="direk" name="direk" class="form-control">	
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Unit (BAPP)</label>
			<div class="">
				<input type="text" id="unit" name="unit" class="form-control">	
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Nama Penandatangan Client</label>
			<div class="">
				<input type="text" id="nttdx" name="nttdx" class="form-control">	
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Jabatan Penandatangan Client</label>
			<div class="">
				<input type="text" id="jttdx" name="jttdx" class="form-control">	
			</div><!-- /.input group -->
		</div><!-- /.form group -->

		<div class="form-group col-md-12" id="divproject">
			<label class=" control-label">Jabatan Penandatangan ISH</label>
			<div class="">
				<select id='jishx' name='jishx' class='form-control'>
					<!--<option value=''>- Pilih -</option>-->
					<?php //echo $cmbgm ?>
				</select>	
			</div><!-- /.input group -->
		</div><!-- /.form group -->
<?php } ?>