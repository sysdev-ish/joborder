<link href="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function () {
		$('#listpola').dataTable({
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false,
			"scrollX": true,
			"bJQueryUI": false  
		});		
	});
	
	function handle(e){
		var xTable = $('#listpola').dataTable({
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false,
			"scrollX": true,
			"bJQueryUI": false  
		});

		if(e.keyCode === 13){
			var url = "<?php echo base_url(); ?>" + "index.php/home/listdashboard/";
			var dataarr = $('#search').val();
			$.post(url, {dataarr:dataarr}, function(response){
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listpola tbody').html(response);
				$('#listpola').dataTable({"bFilter": false, "bSort": true, "bAutoWidth": true, "bLengthChange": false, "bPaginate": true, "scrollX": true});				
			})
		}
		return false;
	}	
</script>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Job Order
              <small>List</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Job Order</a></li>
            </ol>
          </section>

          <!-- Main content -->
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project.." onkeypress="handle(event)"/>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					</div>
					<div class="box-body">
						<table id="listpola" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No JO</th>
									<th>Project</th>
									<th>Lokasi</th>
									<th>Tgl Order</th>
									<th>Tgl Training</th>
									<th>Caplan </th>
									<th>Lulus HR</th>	
									<th>Lulus User</th>	
									<th>PKWT</th>									
									<th>Results</th>
									<th>Notes</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (count($transjo)){
									foreach($transjo as $key => $list){
										echo "<tr>";
										echo "<td>". $list['nojo'] ."</td>";
										echo "<td>". $list['project'] ."</td>";
										echo "<td>". $list['lokasi'] ."</td>";
										echo "<td>". $list['tanggal'] ."</td>";
										echo "<td>". $list['latihan'] ."</td>";
										echo "<td align='center'>". $list['jumlah'] ."</td>";
										echo "<td align='center'>". $list['hr'] ."</td>";	
										echo "<td align='center'>". $list['user'] ."</td>";		
										echo "<td align='center'>". $list['rekrut'] ."</td>";											
										?>
										<?php
										if ($list['jumlah'] > $list['rekrut']) 
												 {
													if ($list['selisih']==0){
													?>
													<td><center><button type="button" class="btn-warning"><font color="#000000"><?php echo "Last Day, GoGoGo!!" ?></font></button></center></td>
													<?php } else if ($list['selisih'] < 0){
													?>
													<td><center><button type="button" class="btn-danger"><font color="#000000"><?php echo "Overdue" ?></font></button></center></td>
													<?php } else if ($list['selisih'] > 0){
													?>
													<td><center><button type="button" class="btn-warning"><font color="#000000"><?php echo $list['selisih'] . " days left" ?></font></button></center></td>
													<?php } ?>
									       <?php } 
										 else if ($list['jumlah'] = $list['rekrut']) 
												 { ?>
													<td><center><button type="button" class="btn-success"><font color="#000000"><?php echo "Done" ?></font></button></center></td>
												<?php }	?>
										   
									    <?php 
										echo "<td>". $list['note'] ."</td>";
										echo "</tr>";
									}
								}								
								?>
							</tbody>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</section><!-- /.content -->
		</div><!-- /.container -->
	</div><!-- /.content-wrapper -->
