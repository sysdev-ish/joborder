<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="<?php echo base_url();?>adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminlte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

 <!--<script src="<?php //echo base_url(); ?>adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php //echo base_url();?>adminlte/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script src="<?php //echo base_url();?>adminlte/plugins/fastclick/fastclick.js" type="text/javascript"></script>
<script src="<?php //echo base_url();?>adminlte/dist/js/app.min.js" type="text/javascript"></script>
<script src="<?php //echo base_url();?>adminlte/dist/js/demo.js" type="text/javascript"></script>-->

<script src="<?php echo base_url();?>adminlte/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
<!--<script src="<?php //echo base_url();?>adminlte/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>-->
<script src="<?php echo base_url();?>adminlte/plugins/chartjs/highcharts.js"></script>

 
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
          ['Kota', 'Waktu(Jam)'],
          ['Bandung',     11],
          ['Surabaya',      2],
          ['Jakarta',  2],
          ['Medan', 2],
          ['Makassar',    7]
        ]);

        var options2 = {
          title: 'Jumlah Per Area'
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
		//chart2.draw(data2);
      }
    </script>
	
	
<script type="text/javascript">
$(function () {
	$('#container').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false
		},
		title: {
			text: 'Progress Pemenuhan JO Per Area'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					style: {
						color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					}
				}
			}
		},
		series: [{
			type: 'pie',
			name: 'Persentase Pemenuhan JO',
			data: [
					<?php 
					// data yang diambil dari database
					if(count($graph)>0)
					{
					   foreach ($graph as $data) {
                           echo "['". $data->layanan . "'," . $data->total ."],\n";
					   }
					}
					?>
			]
		}]
	});
    
    $.ajax({url:"<?php echo base_url(); ?>index.php/dashboard/get_alljo/", success: function(result){
        $("#o_new").hide();
        $('#new_jo').html(result);
    }})
    $.ajax({url:"<?php echo base_url(); ?>index.php/dashboard/get_ontime/", success: function(result){
        $("#o_ontime").hide();
        $('#ontime').html(result);
    }})
    $.ajax({url:"<?php echo base_url(); ?>index.php/dashboard/get_overdue/", success: function(result){
        $("#o_overdue").hide();
        $('#overdue').html(result);
    }})
    $.ajax({url:"<?php echo base_url(); ?>index.php/dashboard/get_canceled/", success: function(result){
        $("#o_canceled").hide();
        $('#canceled').html(result);
    }})
    $.ajax({url:"<?php echo base_url(); ?>index.php/dashboard/get_topod/", success: function(result){
        $("#o_topod").hide();
        $('#topod').html(result);
    }})
});
 
</script>
	
 
 
	<title>SalesFunnel | <?php echo $title;?></title>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Job Order</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
       <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><b>New Job Order</b></span>
                <span class="info-box-number">
                    <div id="new_jo"></div>
                    <a href="<?php echo base_url(); ?>index.php/home/dashboard_newjo/" ></a>
                </span>
                <div class="overlay" id="o_new">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-industry"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b>Ontime</b></span>
              <span class="info-box-number">
                  <div id="ontime"></div>
                  <a href="<?php echo base_url(); ?>index.php/home/dashboard_ontime/" ></a>
                </span>
                <div class="overlay" id="o_ontime">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b>Overdue</b></span>
              <span class="info-box-number">
                  <div id="overdue"></div>
                  <a href="<?php echo base_url(); ?>index.php/home/dashboard_over/" ></a></span>
                <div class="overlay" id="o_overdue">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b>Nojo Canceled </b></span>
              <span class="info-box-number">
                  <div id="canceled"></div>
                  <a href="<?php echo base_url(); ?>index.php/home/dashboard_cancel/" ></a></span>
                <div class="overlay" id="o_canceled">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Recap Report</h3>

            </div>
            <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                 

                  <div class="chart">
                 		 
                     <!-- BAR CHART -->
									 <div class="box box-success">
										
										<div class="box-body">
										  <div class="chart">
											<!--<div id="chart_div2" style="width: 650px; height: 400px;"></div>-->
											<div id="container"></div>
										  </div>
										</div>
										
									  </div>
					<!-- /.tutup bar-chart -->
                  </div>
                  
                </div>
               
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>TOP 10 OVERDUE</strong>
                  </p>
				  <table width="100%" class="table table-bordered table-hover">
				  <thead bgcolor="#FF6666"; >
					  <tr>
					  <td>Project</td>
					  <td>Kebutuhan</td>
					  <td>Jumlah</td>
					  <td>Duedate</td>
					  </tr>	
				  </thead>
				  <tbody>
				  	<?php
					
					if (count($wew)){
						foreach($wew as $key => $list){
							echo "<tr>";
							echo "<td>". $list['project'] ."</td>";
							echo "<td>". $list['jumlah'] ."</td>";
							if ($list['rekrut'] == NUll)
							{
								echo "<td>0</td>";
							}
							else
							{
								echo "<td>". $list['rekrut'] ."</td>";
							}
							echo "<td>". $list['bekerja'] ."</td>";
							echo "</tr>";
						}
					}	
					
					?>
				  </tbody>
				  </table>

                  <!--<div class="progress-group">-->
				  <?php
									/*	if (count($ish)){
											$i=1;
											foreach($ish as $list){
												echo "<span style='display:none'>". $i ."</span>";
												echo "<div class='progress-group'> ";
												echo "<span class='progress-text'>". $list['nama_customer'] ."</span>";
												$lol 		= $list['nilai'];
												$lolipop	= $lol/1000000;
												echo "<span class='progress-number'>Rp ". $lolipop ." Jt</span>";
												if($i==1)
												{
												echo "<div class='progress sm'>";
                     							echo "<div class='progress-bar progress-bar-aqua' style='width: 80%'></div>";
                   								echo "</div>";
												}
												else if($i==2)
												{
													echo "<div class='progress sm'>";
													echo " <div class='progress-bar progress-bar-red' style='width: 70%'></div>";
													echo "</div>";
												}
												else if($i==3)
												{
													echo "<div class='progress sm'>";
													echo " <div class='progress-bar progress-bar-green' style='width: 60%'></div>";
													echo "</div>";
												}
												echo "</div>";
												$i++;
												//$cok  = $list['nilai_project'];
											}
										} */
					?>
                    <!--<span class="progress-text"><?php //echo $djan; ?></span>
                    <span class="progress-number"><?php //echo $cok; ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  
                  <div class="progress-group">
                    <span class="progress-text">PT Telkom</span>
                    <span class="progress-number">Rp 15 M</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 70%"></div>
                    </div>
                  </div>
                  
                  <div class="progress-group">
                    <span class="progress-text">PT Infomedia Nusantara</span>
                    <span class="progress-number">Rp 10 M</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 60%"></div>
                    </div>
                  </div>
                  
                  <div class="progress-group">
                    <span class="progress-text">PT Mayora</span>
                    <span class="progress-number">5 M</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 40%"></div>
                    </div>
                  </div>-->
                  
                </div>
                
              </div>
              
            </div>
			
			
			<!--
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">Rp 1,3 T</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                 
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">Rp 90 M</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                 
                </div>
               
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">Rp 10 M</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                 
                </div>
              
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">Goal Completion</span>
                  </div>
                 
                </div>
				
              </div>
            
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
		  
		  
		  
		  <!--
		   <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
         
          </div>
		<!-- TUTUP BAR CHART -->
		  
		  
		  
		  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
 <!--     <div class="row">
       
        <div class="col-md-8">
          
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Visitors Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
           
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                  
                    <div id="world-map-markers" style="height: 325px;"></div>
                  </div>
                </div>
                
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Visits</span>
                    </div>
                    
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">30%</h5>
                      <span class="description-text">Referrals</span>
                    </div>
                    
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text">Organic</span>
                    </div>
                    
                  </div>
                </div>
                
              </div>
              
            </div>
           
          </div>
           
          <div class="row">
            <div class="col-md-6">
              
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
               
                <div class="box-body">
                  
                  <div class="direct-chat-messages">
                   
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Dummy</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                      </div>
                      
                      <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                      <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                      </div>
                     
                    </div>
                    
                    
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                      </div>
                      
                      <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                      <div class="direct-chat-text">
                        You better believe it!
                      </div>
                      
                    </div>
                    

                    
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                      </div>
                      
                      <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                      <div class="direct-chat-text">
                        Working with AdminLTE on a great new app! Wanna join?
                      </div>
                     
                    </div>
                    

                    
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                      </div>
                      
                      <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                      <div class="direct-chat-text">
                        I would love to.
                      </div>
                     
                    </div>
                    

                  </div>
                 

                  
                  <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Count Dracula
                                  <small class="contacts-list-date pull-right">2/28/2015</small>
                                </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                          </div>
                          
                        </a>
                      </li>
                      
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Sarah Doe
                                  <small class="contacts-list-date pull-right">2/23/2015</small>
                                </span>
                            <span class="contacts-list-msg">I will be waiting for...</span>
                          </div>
                         
                        </a>
                      </li>
                      
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nadia Jolie
                                  <small class="contacts-list-date pull-right">2/20/2015</small>
                                </span>
                            <span class="contacts-list-msg">I'll call you back at...</span>
                          </div>
                          
                        </a>
                      </li>
                      
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nora S. Vans
                                  <small class="contacts-list-date pull-right">2/10/2015</small>
                                </span>
                            <span class="contacts-list-msg">Where is your new...</span>
                          </div>
                          
                        </a>
                      </li>
                     
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  John K.
                                  <small class="contacts-list-date pull-right">1/27/2015</small>
                                </span>
                            <span class="contacts-list-msg">Can I take a look at...</span>
                          </div>
                          
                        </a>
                      </li>
                      
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Kenneth M.
                                  <small class="contacts-list-date pull-right">1/4/2015</small>
                                </span>
                            <span class="contacts-list-msg">Never mind I found...</span>
                          </div>
                          
                        </a>
                      </li>
                     
                    </ul>
                    
                  </div>
                  
                </div>
                
                <div class="box-footer">
                  <form action="#" method="post">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                          <span class="input-group-btn">
                            <button type="button" type="button" class="btn btn-warning btn-flat">Send</button>
                          </span>
                    </div>
                  </form>
                </div>
                
              </div>
             
            </div>
            

            <div class="col-md-6">
              
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="dist/img/user1-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="dist/img/user8-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                      <img src="dist/img/user7-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Jane</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user6-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">John</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user2-160x160.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander</a>
                      <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user5-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user4-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/user3-128x128.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                  </ul>
                  
                </div>
              >
                <div class="box-footer text-center">
                  <a href="javascript::" class="uppercase">View All Users</a>
                </div>
                
              </div>
              
            </div>
            
          </div>
          

         
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Popularity</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              
            </div>
            
            <div class="box-footer clearfix">
              <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            
          </div>
          
        </div>
        

        <div class="col-md-4">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
          
          </div>
          
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            
          </div>
          
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <
          </div>
          
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            
          </div>
          

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Browser Usage</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  
                </div>
               
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                  </ul>
                </div>
                
              </div>
             
            </div>
            
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">United States of America
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                </li>
                <li><a href="#">China
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
              </ul>
            </div>
            
          </div>
         

         
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript::;" class="product-title">Samsung TV
                      <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                  </div>
                </li>
                
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript::;" class="product-title">Bicycle
                      <span class="label label-info pull-right">$700</span></a>
                        <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                  </div>
                </li>
                
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript::;" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                        <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                  </div>
                </li>
               
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript::;" class="product-title">PlayStation 4
                      <span class="label label-success pull-right">$399</span></a>
                        <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                  </div>
                </li>
              
              </ul>
            </div>
           
            <div class="box-footer text-center">
              <a href="javascript::;" class="uppercase">View All Products</a>
            </div>
            
          </div>
         
        </div>
        
      </div>-->
     
    </section>
      </div><!-- /.content-wrapper -->
	 
	 


