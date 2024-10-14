<?php 

if (!empty($pros_file_c)){
	foreach($pros_file_c as $listx){  ?>
	
					<div class="form-group col-md-12">
					<div class="form-group col-md-3">
						<label class="control-label"><?php echo $listx['doc_name'] ?></label>
					</div>
					
			<?php	if(($listx['filename']!='') || (!is_null($listx['filename'])) ){ ?>
						<div class="form-group col-md-4" id="group_att1">
							<div class="">
								<a href="<?php echo base_url().'invoice/';?><?php echo $listx['filename']; ?>" target="_blank"><button type='button' class='form-control btn-success' id='btnfile1'>Download File</button></a>
							</div>
						</div>
						
						<div class="form-group col-md-5"><label class='control-label'>* Uploaded By Legal</label></div>
		<?php 		} 
					else
					{ ?>
						<div class="form-group col-md-9" id="group_att1">
							<div class="">
								<label>File PKS not uploaded by Legal, please confirm to legal division..</label>
							</div>
						</div>
						
		<?php		} ?>
					</div>
			
<?php	}
} else {
	
}



if (!empty($pros_file_b)){
	foreach($pros_file_b as $listx){  ?>
	
		<?php 	if($listx['doc_id']==1){  ?>
					<div class="form-group col-md-12">
					<div class="form-group col-md-3">
						<label class="control-label"><?php echo $listx['doc_name'] ?></label>
					</div>
					
			<?php	if($pks!=''){ ?>
						<div class="form-group col-md-4" id="group_att1">
							<div class="">
								<a href="<?php echo base_url().'invoice/';?><?php echo $pks; ?>"><button type='button' class='form-control btn-success' id='btnfile1'>Download File</button></a>
							</div>
						</div>
						
						<div class="form-group col-md-5"><label class='control-label'>* Uploaded By Legal</label></div>
		<?php 		} 
					else
					{ ?>
						<div class="form-group col-md-9" id="group_att1">
							<div class="">
								<label>File PKS not uploaded by Legal, please confirm to legal division..</label>
							</div>
						</div>
						
		<?php		} ?>
					</div>
		<?php	}	
				else 
				{ ?>
					<div class="form-group col-md-12">
					<div class="form-group col-md-3">
						<label class="control-label"><?php echo $listx['doc_name'] ?></label>
					</div>
					
					<?php if($listx['source_data']=='SAPHIRE'){ ?>
						<div class="form-group col-md-4" id="group_att1">
								<div class="">
									<input type='button' class='form-control btn-success' id='btnkomentar' value='Generate and Download From Saphire'>
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
		<?php	} ?>
<?php }
} else {
	
}
 ?>


