<?php 
if (!empty($pros_file_f)){
	foreach($pros_file_f as $listx){  ?>
			<div class="form-group col-md-12">
				<div class="form-group col-md-3">
					<label class="control-label"><?php echo $listx['doc_name'] ?></label>
				</div>
				
				<?php if($listx['source_data']=='SAPHIRE'){ ?>
					<div class="form-group col-md-4" id="group_att1">
							<div class="">
								<input type='button' class='form-control btn-success' id='btnkomentar'>Generate and Download From Saphire</button>
							</div>
					</div>
				<?php } else if($listx['source_data']=='GENERATE') { ?>
					<div class="form-group col-md-4" id="group_att1">
							<div class="">
								<input type='button' class='form-control btn-success' id='btnprev' onclick="previ('<?php echo $listx['nama_file'] ?>', '<?php echo $nojx ?>');" value="Generate Dokumen">
								<!--<input type="button" class='btn btn-info btn-block btn-sm btnprev' id="btnprev" name="simpan" value="Generate Dokumen">-->
							</div>
					</div>	
				<?php } else {
					
				} ?>
				
				<?php if($listx['source_data']=='SAPHIRE'){ ?>
					<div class="form-group col-md-5">
						<input type="file" class="form-control pull-right" name="komp[]" id="komponen1"/>
						<input type="hidden" class="form-control pull-right" name="kumpx[]" id="kumpx" value="<?php echo $listx['nama_file'] ?>"/>
						<input type="hidden" class="form-control pull-right" name="kumix[]" id="kumix" value="<?php echo $listx['doc_id'] ?>"/>
					</div>
				<?php } else if($listx['source_data']=='GENERATE') { ?>
					<div class="form-group col-md-5">
						<input type="file" class="form-control pull-right" name="komp[]" id="komponen1"/>
						<input type="hidden" class="form-control pull-right" name="kumpx[]" id="kumpx" value="<?php echo $listx['nama_file'] ?>"/>
						<input type="hidden" class="form-control pull-right" name="kumix[]" id="kumix" value="<?php echo $listx['doc_id'] ?>"/>
					</div>
				<?php } else { ?>
					<div class="form-group col-md-9">
						<input type="file" class="form-control pull-right" name="komp[]" id="komponen1"/>
						<input type="hidden" class="form-control pull-right" name="kumpx[]" id="kumpx" value="<?php echo $listx['nama_file'] ?>"/>
						<input type="hidden" class="form-control pull-right" name="kumix[]" id="kumix" value="<?php echo $listx['doc_id'] ?>"/>
					</div>
				<?php } ?>
			</div>
<?php }
} else {
	
}
 ?>


