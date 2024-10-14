<?php 
foreach($det_train as $key => $list){ ?>
	<div class="form-group" id="divwaktu">
		<div class="col-sm-12">
			<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
				<div class="col-md-3" style="margin-top:5px;">
					<input type="checkbox" <?php if($list['train_soft']==1) { echo 'checked'; } ?> name="tkumtrain[]" id="tkumtrain" value="1" <?php if($disa!=1){echo 'disabled=disabled';}?>> Softskill
				</div>
				<div class="col-md-3" style="margin-top:5px;">
					<input type="checkbox" <?php if($list['train_hard']==1) { echo 'checked'; } ?> name="tkumtrain[]" id="tkumtrain" value="2" <?php if($disa!=1){echo 'disabled=disabled';}?>> Hardskill
				</div>
				<div class="col-md-3" style="margin-top:5px;">
					<input type="checkbox" <?php if($list['tendem_pasif']==1) { echo 'checked'; } ?> name="tkumtrain[]" id="tkumtrain" value="3" <?php if($disa!=1){echo 'disabled=disabled';}?>> Tendem Pasif
				</div>
				<div class="col-md-3" style="margin-top:5px;">
					<input type="checkbox" <?php if($list['tendem_aktif']==1) { echo 'checked'; } ?> name="tkumtrain[]" id="tkumtrain" value="4" <?php if($disa!=1){echo 'disabled=disabled';}?>> Temdem Aktif
				</div>
			</div>
		</div>
	</div>
<?php } ?>

