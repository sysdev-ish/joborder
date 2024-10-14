<?php foreach($rdoc as $list){ ?>
	<div class="col-md-4" style="margin-top:10px;">
		<input type="checkbox" <?php if(strpos($nana, $list['doc_id']) !== false) { echo 'checked'; } ?> name="kumdoc[]" id="kumdoc" value="<?php echo $list['doc_id'];?>" disabled=disabled> <?php echo $list['doc_name'];?>
		<br><br>
	</div>
<?php } ?>