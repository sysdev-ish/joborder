<?php

if (!empty($pros_file_leg)){
	foreach($pros_file_leg as $listx){  ?>
	
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



if (!empty($pros_file_ops)){
	foreach($pros_file_ops as $listxx){  ?>

			<div class="form-group col-md-12">
				<div class="form-group col-md-3">
					<label class="control-label"><?php echo $listxx['doc_name'] ?></label>
				</div>
				
				<?php	if(($listxx['filename']!='') || (!is_null($listxx['filename'])) ){ ?>
				<div class="form-group col-md-9">
					<a href="<?php echo base_url().'invoice/';?><?php echo $listxx['filename']; ?>"><button type='button' class='form-control btn-success' id='btnfile1'>Download File</button></a>
				</div>
				<?php } else { ?>
				<div class="form-group col-md-9">
					<label>File not uploaded by OPS, please confirm to OPS division..</label>
				</div>	
				<?php } ?>
				
			</div>
	
<?php	}
} else {
	
}



if (!empty($pros_file_fin)){
	foreach($pros_file_fin as $listxxx){  ?>

			<div class="form-group col-md-12">
				<div class="form-group col-md-3">
					<label class="control-label"><?php echo $listxxx['doc_name'] ?></label>
				</div>
				
				<?php	if(($listxxx['filename']!='') || (!is_null($listxxx['filename'])) ){ ?>
				<div class="form-group col-md-9">
					<a href="<?php echo base_url().'invoice/';?><?php echo $listxxx['filename']; ?>"><button type='button' class='form-control btn-success' id='btnfile1'>Download File</button></a>
				</div>
				<?php } else { ?>
				<div class="form-group col-md-9">
					<label>File not uploaded by Finance, please confirm to Finance Division..</label>
				</div>	
				<?php } ?>
				
			</div>
	
<?php	}
} else {
	
}
?>