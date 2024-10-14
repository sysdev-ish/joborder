<link href="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/plugins/select2/select2-bootstrap.css" />

<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/plugins/datepicker/my.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function() {
		$.fn.modal.Constructor.prototype.enforceFocus = $.noop;
		$.fn.dataTable.ext.errMode = 'none';
		var optioni = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": true,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": true,
			"scrollX": true,
			"bJQueryUI": false
		};

		var option = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": true,
			"scrollX": true,
			"bJQueryUI": false
		};

		var optionz = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": true,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": true,
			"scrollX": true,
			"bJQueryUI": false
		};

		var optionx = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			//"bAutoWidth": false,
			//"scrollX": true,
			"bJQueryUI": false
		};

		xTable = $('#listrincian').dataTable(optionx);
		kTable = $('#listrincianx').dataTable(optionx);
		eTable = $('#listrincianxy').dataTable(optionx);
		yTable = $('#listskema').dataTable(option);
		//zTable = $('#listpola').dataTable(optionz);
		wTable = $('#listdokumen').dataTable(optionx);
		wTable = $('#listdokumen_rep').dataTable(optionx);
		vTable = $('#listpolar').dataTable(option);
		uTable = $('#listpolarxy').dataTable(option);
		ppTable = $('#listpolarpp').dataTable(option);
		qTable = $('#listkomp').dataTable(optionx);
		sTable = $('#listperner').dataTable(optionx);
		pTable = $('#listproc').dataTable(optionx);
		$("#akhir").hide();
		$('#overlay').hide();
		$('#overlay1').hide();
		$("#tar2").slideUp("slow");
		$("#tar3").slideUp("slow");
		$("#tar4").slideUp("slow");
		$('#overlayxy').hide();

		$(".btndetkom").click(function() {
			$('#listrincian').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var vjab = $row.find(".kjab").text();
			var vlok = $row.find(".klok").text();
			var klv = $row.find(".klv").text();
			var ksl = $row.find(".ksl").text();
			var dkomp = $row.find(".dkomp").text();
			var rid = $row.find(".rid").text();
			larr = [vnojo, vjab, vlok, klv, ksl, dkomp];
			var url = "<?php echo base_url(); ?>index.php/home/detkom";
			$.post(url, {
				larrx: larr
			}, function(res) {
				qTable.fnDestroy();
				$('#overlay').hide();
				$('#listkomp tbody').html(res);
				$('#listkomp').dataTable({
					"bFilter": false,
					"bSort": true,
					"bAutoWidth": false,
					"bLengthChange": false,
					"bPaginate": true,
					"scrollX": true
				});
			});

			var url = "<?php echo base_url(); ?>index.php/home/data_train";
			$.post(url, {
				data: rid
			}, function(res) {
				$('#hide_train').html(res);
			})
		});


		xTable.on('draw.dt', function() {
			$(".btndetkom").click(function() {
				$('#listrincian').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var vnojo = $row.find(".nojo").text();
				var vjab = $row.find(".kjab").text();
				var vlok = $row.find(".klok").text();
				var klv = $row.find(".klv").text();
				var ksl = $row.find(".ksl").text();
				var dkomp = $row.find(".dkomp").text();
				var rid = $row.find(".rid").text();
				larr = [vnojo, vjab, vlok, klv, ksl, dkomp];
				var url = "<?php echo base_url(); ?>index.php/home/detkom";
				$.post(url, {
					larrx: larr
				}, function(res) {
					qTable.fnDestroy();
					$('#overlay').hide();
					$('#listkomp tbody').html(res);
					$('#listkomp').dataTable({
						"bFilter": false,
						"bSort": true,
						"bAutoWidth": false,
						"bLengthChange": false,
						"bPaginate": true,
						"scrollX": true
					});
				});

				var url = "<?php echo base_url(); ?>index.php/home/data_train";
				$.post(url, {
					data: rid
				}, function(res) {
					$('#hide_train').html(res);
				})
			});
		});



		$(".btndok").click(function() {
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/ztrajo";
			$.post(url, {
				data: vnojo
			}, function(res) {
				wTable.fnDestroy();
				$('#overlay').hide();
				$('#listdokumen tbody').html(res);
				$('#listdokumen').dataTable({
					"bRetrieve": true,
					"bServerside": true,
					"bProcessing": true,
					"bPaginate": true,
					"bLengthChange": false,
					"bFilter": false,
					"bSort": true,
					"bInfo": true,
					"bAutoWidth": true,
					"scrollX": true,
					"bJQueryUI": false
				});
			})
		});

		$(".btnpic").click(function() {
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#picid").val($row.find(".id").text());
			$("#ket_sap").val($row.find(".kdone").text());
		});

		$(".btndetail").click(function() {
			var vnojo = 'a';
			var vjab = 'b';
			var vlok = 'c';
			larr = [vnojo, vjab, vlok];
			var url = "<?php echo base_url(); ?>index.php/home/detkom";
			$.post(url, {
				larrx: larr
			}, function(res) {
				qTable.fnDestroy();
				$('#overlay').hide();
				$('#listkomp tbody').html(res);
				$('#listkomp').dataTable({
					"bFilter": false,
					"bSort": true,
					"bAutoWidth": false,
					"bLengthChange": false,
					"bPaginate": true,
					"scrollX": true
				});
			})

			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var trep = $row.find(".trep").text();
			var tjo = $row.find(".tjo").text();
			var qappro = $row.find(".qappro").text();
			var alasan_atasan = $row.find(".atasan").text();
			$("#nnojo").val(vnojo);
			$("#ntjo").val(tjo);
			$("#ntrep").val(trep);
			$("#nket").val(alasan_atasan);

			console.log(btn);
			if (btn == "Waiting Approval") {
				document.getElementById('nbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('nbtn_reject').setAttribute("style", "display:none;");
			} else if (btn == "Approved") {
				document.getElementById('nbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('nbtn_reject').setAttribute("style", "display:none;");
			} else if (btn == "Rejected") {
				document.getElementById('nbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('nbtn_reject').setAttribute("style", "display:none;");
			} else if (btn == "Approve") {
				document.getElementById('nbtn_simpan').removeAttribute("style");
				document.getElementById('nbtn_reject').removeAttribute("style");
			}
			/*
			if(qappro==0){
				document.getElementById('nbtn_simpan').removeAttribute("style");
				document.getElementById('nbtn_reject').removeAttribute("style");
			} else {
				document.getElementById('nbtn_simpan').setAttribute("style","display:none;");
				document.getElementById('nbtn_reject').setAttribute("style","display:none;");
			}
			*/
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/trajo";
			$.post(url, {
				data: vnojo
			}, function(res) {
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincian tbody').html(res);
				$('#listrincian').dataTable({
					"bFilter": false,
					"bSort": true,
					"bAutoWidth": false,
					"bLengthChange": false,
					"bPaginate": true,
					"scrollX": true
				});
			})

			var url = "<?php echo base_url(); ?>index.php/home/ztrajo";
			$.post(url, {
				data: vnojo
			}, function(res) {
				wTable.fnDestroy();
				$('#overlay').hide();
				$('#listdokumen tbody').html(res);
				$('#listdokumen').dataTable({
					"bFilter": false,
					"bSort": true,
					"bLengthChange": false,
					"bPaginate": true
				});
			});

			var url = "<?php echo base_url(); ?>index.php/home/zproc";
			$.post(url, {
				data: vnojo
			}, function(res) {
				pTable.fnDestroy();
				$('#overlay').hide();
				$('#listproc tbody').html(res);
				$('#listproc').dataTable({
					"bFilter": false,
					"bSort": true,
					"bLengthChange": false,
					"bPaginate": true
				});
			})

			var url = "<?php echo base_url(); ?>index.php/home/kokok";
			$.post(url, {
				data: vnojo
			}, function(res) {
				$("#koko").html(res);
			})
		});



		$(".vbtndetail").click(function() {
			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var trep = $row.find(".trep").text();
			var tjo = $row.find(".tjo").text();
			var qappro = $row.find(".qappro").text();
			var alasan_atasan = $row.find(".atasan").text();
			$("#rnojo").val(vnojo);
			$("#rtjo").val(tjo);
			$("#rtrep").val(trep);
			$("#rket").val(alasan_atasan);

			console.log(btn);
			if (btn == "Waiting Approval") {
				document.getElementById('rbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('rbtn_reject').setAttribute("style", "display:none;");
			} else if (btn == "Approved") {
				document.getElementById('rbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('rbtn_reject').setAttribute("style", "display:none;");
			} else if (btn == "Rejected") {
				document.getElementById('rbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('rbtn_reject').setAttribute("style", "display:none;");
			} else if (btn == "Approve") {
				document.getElementById('rbtn_simpan').removeAttribute("style");
				document.getElementById('rbtn_reject').removeAttribute("style");
			}
			/*
			if(qappro==0){
				document.getElementById('rbtn_simpan').removeAttribute("style");
				document.getElementById('rbtn_reject').removeAttribute("style");
			} else {
				document.getElementById('rbtn_simpan').setAttribute("style","display:none;");
				document.getElementById('rbtn_reject').setAttribute("style","display:none;");
			}
			*/
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/det_per";
			$.post(url, {
				data: vnojo
			}, function(res) {
				sTable.fnDestroy();
				$('#overlay').hide();
				$('#listperner tbody').html(res);
				$('#listperner').dataTable({
					"bFilter": false,
					"bSort": true,
					"bAutoWidth": false,
					"bLengthChange": false,
					"bPaginate": true,
					"scrollX": true
				});
			});

			var url = "<?php echo base_url(); ?>index.php/home/ztrajo";
			$.post(url, {
				data: vnojo
			}, function(res) {
				wTable.fnDestroy();
				$('#overlay').hide();
				$('#listdokumen tbody').html(res);
				$('#listdokumen').dataTable({
					"bFilter": false,
					"bSort": true,
					"bLengthChange": false,
					"bPaginate": true
				});
			})
		});


		$(".btndetailx").click(function() {
			$('#listpolar').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".tejo").text();
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/xtrajo";
			$.post(url, {
				data: vnojo
			}, function(res) {
				kTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincianx tbody').html(res);
				$('#listrincianx').dataTable({
					"bFilter": false,
					"bSort": true,
					"bLengthChange": false,
					"bPaginate": true
				});
			})
		});


		$("#typeapp").change(function() {
			/*
			  var ish 			= $('#typeapp').val();
			  if (ish == 'SKEMA'){
			  	 $("#tar1").slideUp("slow");
				 $("#tar2").slideDown("slow");
			  }
			  else
			   if (ish == 'N/R'){
			  	 $("#tar1").slideDown("slow");
				 $("#tar2").slideUp("slow");
			  }
			  */
			var ish = $('#typeapp').val();
			if (ish == 'VARIABEL') {
				$('#overlayxy').show();
				$("#tar1").hide();
				$("#tar2").hide();
				$("#tar3").show();
				$("#tar4").hide();

				var url = "<?php echo base_url(); ?>" + "index.php/home/vappjo_xlistjox/";
				var dataarr = $('#xsearch').val();
				$.post(url, {
					dataarr: dataarr
				}, function(response) {
					uTable.fnDestroy();
					$('#overlayxy').hide();
					$('#listpolarxy tbody').html(response);
					$('#listpolarxy').dataTable({
						"bFilter": true,
						"bSort": false,
						"bAutoWidth": true,
						"bLengthChange": false,
						"bPaginate": true,
						"scrollX": true
					});
				})

			} else if (ish == 'SKEMA') {
				$('#overlayx').show();
				$("#tar1").hide();
				$("#tar2").show();
				$("#tar3").hide();
				$("#tar4").hide();

				var url = "<?php echo base_url(); ?>" + "index.php/home/appjo_xlistjox/";
				var dataarr = $('#xsearch').val();
				$.post(url, {
					dataarr: dataarr
				}, function(response) {
					vTable.fnDestroy();
					$('#overlayx').hide();
					$('#listpolar tbody').html(response);
					$('#listpolar').dataTable({
						"bFilter": true,
						"bSort": false,
						"bAutoWidth": true,
						"bLengthChange": false,
						"bPaginate": true,
						"scrollX": true
					});
				})
			} else if (ish == 'PP') {
				$('#ppoverlayxy').show();
				$("#tar1").hide();
				$("#tar2").hide();
				$("#tar3").hide();
				$("#tar4").show();

				var url = "<?php echo base_url(); ?>" + "index.php/rotasi/appjo_xlistjoppx/";
				var dataarr = $('#xsearch').val();
				$.post(url, {
					dataarr: dataarr
				}, function(response) {
					ppTable.fnDestroy();
					$('#ppoverlayxy').hide();
					$('#listpolarpp tbody').html(response);
					$('#listpolarpp').dataTable({
						"bFilter": true,
						"bSort": false,
						"bAutoWidth": true,
						"bLengthChange": false,
						"bPaginate": true,
						"scrollX": true
					});
				})
			} else if (ish == 'N/R') {
				$("#tar1").show();
				$("#tar2").hide();
				$("#tar3").hide();
				$("#tar4").hide();
			}
		});


		$("#btn_search").click(function() {
			$('#overlay1').show();
			var ar3 = $('#ar3').val();
			var p3r = $('#p3r').val();
			larr = [ar3, p3r];
			var url = "<?php echo base_url(); ?>index.php/home/search_sk/";
			$.post(url, {
				larr: larr
			}, function(response) {
				//alert(response)
				vTable.fnDestroy();
				$('#overlay1').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({
					"bFilter": false,
					"bSort": false,
					"bAutoWidth": true,
					"bLengthChange": false,
					"bPaginate": true,
					"scrollX": true
				});
			});
		});



		function load_search() {
			$('#overlay1').show();
			var ar3 = $('#ar3').val();
			var p3r = $('#p3r').val();
			larr = [ar3, p3r];
			var url = "<?php echo base_url(); ?>index.php/home/search_sk/";
			$.post(url, {
				larr: larr
			}, function(response) {
				vTable.fnDestroy();
				$('#overlay1').hide();
				$('#listpolar tbody').html(response);
				$('#listpolar').dataTable({
					"bFilter": false,
					"bSort": false,
					"bAutoWidth": true,
					"bLengthChange": false,
					"bPaginate": true,
					"scrollX": true
				});
			});
		}


		function vload_search() {
			$('#overlayxy').show();
			var ar3 = '';
			var p3r = '';
			var t3r = '2';
			larr = [ar3, p3r, t3r];
			var url = "<?php echo base_url(); ?>index.php/home/search_sk/";
			$.post(url, {
				larr: larr
			}, function(response) {
				vTable.fnDestroy();
				$('#overlayxy').hide();
				$('#listpolarxy tbody').html(response);
				$('#listpolarxy').dataTable({
					"bFilter": false,
					"bSort": false,
					"bAutoWidth": true,
					"bLengthChange": false,
					"bPaginate": true,
					"scrollX": true
				});
			});
		}



		$(".btnapp").click(function() {
			$('#listpolar').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var bar = $row.find(".bar").text();
			var bpa = $row.find(".bpa").text();
			var bare = $row.find(".bare").text();
			var pare = $row.find(".pare").text();
			var tejo = $row.find(".tejo").text();
			$("#xketx").val($row.find(".ketdon").text());

			if (btn == "Approved") {
				$('#zolo').show();
				$("#labeljoz").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn_sk").html("");
			} else if (btn == "Waiting Approval") {
				$("#labeljoz").html('<label class="control-label"> Waiting Approval MANAR </label>');

				$('#listpolar').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var keter = $row.find(".keter").text();

				$("#ket_app").val(keter);

				$("#approvalbtn_sk").html("");
			} else if (btn == "Rejected") {
				$("#labeljoz").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app"/></textarea>');

				$('#listpolar').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var keter = $row.find(".keter").text();

				$("#ket_app").val(keter);

				$("#approvalbtn_sk").html("");
			} else if (btn == "Approve") {
				$("#labeljoz").html('<label class="control-label"> Anda akan menyetujui Penyesuaian Skema ' + bar + ' -> ' + bpa + '</label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnrez" id="btnrez">Reject</button><button type="button" class="btn btn-outline btnappro" id="btnappro">Approve</button>';
				$("#approvalbtn_sk").html(appbtn);

				$("#btnappro").click(function() {
					$('#overlay1').show();
					var tejo = $row.find(".tejo").text();
					var ket_appro = $('#ket_app').val();
					var bar = $row.find(".bar").text();
					var bpa = $row.find(".bpa").text();
					var bare = $row.find(".bare").text();
					var pare = $row.find(".pare").text();
					var url = "<?php echo base_url(); ?>index.php/home/s_sk";
					arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
					$.post(url, {
						arrappjol: arrappjol
					}, function(res) {
						$('#overlay1').hide();
						alert('Data Berhasil Di Approve');
						$('#GmyModal').modal('hide');
						load_search();
					})
				});


				$("#btnrez").click(function() {
					$('#overlay1').show();
					var ket_appro = $('#ket_app').val();
					if (ket_appro == "") {
						$('#overlay1').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}

					var tejo = $row.find(".tejo").text();
					var bar = $row.find(".bar").text();
					var bpa = $row.find(".bpa").text();
					var bare = $row.find(".bare").text();
					var pare = $row.find(".pare").text();
					var url = "<?php echo base_url(); ?>index.php/home/r_sk";
					arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
					$.post(url, {
						arrappjol: arrappjol
					}, function(res) {
						$('#overlay1').hide();
						alert('Data Berhasil Di Reject');
						$('#GmyModal').modal('hide');
						load_search();
					})
				});
			}
		});


		$(".ppbtnapp").click(function() {
			$('#listpolarpp').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var ppid = $row.find(".ppid").text();
			var persaid = $row.find(".persaid").text();
			var ppnoj = $row.find(".noj").text();
			var ppbtn = $row.find(".ppbtn").text();
			var ket_ats = $row.find(".ppk_atasan").text();
			var ket_pm = $row.find(".ppk_pm").text();
			var cekapp = $row.find(".cekapp").text();

			if (btn == "Approved") {
				$("#ppvlabeljoz").html('<label class="control-label"> ' + ppbtn + ' </label>');
				$("#ppapprovalbtn_sk").html("");
			} else if (btn == "Waiting Approval") {
				$("#ppvlabeljoz").html('<label class="control-label"> ' + ppbtn + ' </label>');
				$("#ppapprovalbtn_sk").html("");
			} else if (btn == "Rejected") {
				if (ppbtn == "Rejected PM") {
					$("#ppvlabeljoz").html('<label class="control-label"> JO ditolak PM </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app"/></textarea>');
				} else if (ppbtn == "Rejected Atasan") {
					$("#ppvlabeljoz").html('<label class="control-label"> JO ditolak Atasan </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app"/></textarea>');
				}

				if (ppbtn == "Rejected Atasan") {
					$("#ppket_app").val(ket_ats);
				} else if (ppbtn == "Rejected PM") {
					$("#ppket_app").val(ket_pm);
				}
				$("#ppapprovalbtn_sk").html("");
			} else if (btn == "Approve") {
				$("#ppvlabeljoz").html('<label class="control-label"> Anda akan menyetujui Perpanjangan Project ' + persaid + ' </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline ppbtnrez" id="ppbtnrez">Reject</button><button type="button" class="btn btn-outline ppbtnappro" id="ppbtnappro">Approve</button>';
				$("#ppapprovalbtn_sk").html(appbtn);

				$("#ppbtnappro").click(function() {
					$('#ppoverlayxy').show();
					var ppid = $row.find(".ppid").text();
					var ppket_app = $('#ppket_app').val();
					if (ppket_app == "") {
						$('#ppoverlayxy').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}

					var url = "<?php echo base_url(); ?>index.php/rotasi/spp";
					arrappjol = [ppid, ppket_app, persaid, ppnoj, cekapp];
					$.post(url, {
						arrappjol: arrappjol
					}, function(res) {
						$('#ppoverlayxy').hide();
						alert('Data Berhasil Di Approve');
						$('#PPGmyModal').modal('hide');
						ppTable.fnDestroy();
						$('#ppoverlayxy').hide();
						$('#listpolarpp tbody').html(res);
						$('#listpolarpp').dataTable({
							"bFilter": true,
							"bSort": false,
							"bAutoWidth": true,
							"bLengthChange": false,
							"bPaginate": true,
							"scrollX": true
						});
					})
				});


				$("#ppbtnrez").click(function() {
					$('#ppoverlayxy').show();
					var ppid = $row.find(".ppid").text();
					var ppket_app = $('#ppket_app').val();
					if (ppket_app == "") {
						$('#ppoverlayxy').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}

					var url = "<?php echo base_url(); ?>index.php/rotasi/rpp";
					arrappjol = [ppid, ppket_app, persaid, ppnoj, cekapp];
					$.post(url, {
						arrappjol: arrappjol
					}, function(res) {
						$('#ppoverlayxy').hide();
						alert('Data Berhasil Di Reject');
						$('#PPGmyModal').modal('hide');
						ppTable.fnDestroy();
						$('#ppoverlayxy').hide();
						$('#listpolarpp tbody').html(res);
						$('#listpolarpp').dataTable({
							"bFilter": true,
							"bSort": false,
							"bAutoWidth": true,
							"bLengthChange": false,
							"bPaginate": true,
							"scrollX": true
						});
					})
				});
			}
		});



		$('#btn_simpanin').click(function() {
			//document.getElementById("haha").reset();
			var rinjab = $('#rinjab :selected').text();
			var rinjabz = $('#rinjab').val();

			//alert(rinjabz);
			//exit();
			var ssalaryz = $('#ssalaryz').val();
			var esalaryz = $('#esalaryz').val();

			var angka = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('ssalaryz').value))));
			var ssalary = angka;

			//var esalary 	= $('#esalary').val();	
			var angka1 = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('esalaryz').value))));
			var esalary = angka1;

			var exper = $('#exper').val();
			var level = $('#level').val();
			var job_skills = $('#job_skills').val();
			//var job_skillsz	= $('#job_skills').text();
			var job_benefits = $('#job_benefits').val();
			//var job_benefitsz= $('#job_benefits').text();
			var duedate = $('#duedate').val();
			var duedate1 = $('#duedate1').val();

			if (rinjab == "") {
				alert('Jabatan Harus Di Pilih');
				$('#divrin').attr('class', 'form-group has-error');
				return false;
			} else if (rinjab != "") {
				$('#divrin').attr('class', 'form-group')
			}

			if ((ssalary == "") || (esalaryz == "")) {
				alert('Range Salary Harus Di Isi Semua');
				$('#divsal').attr('class', 'form-group has-error');
				return false;
			} else if ((ssalary != "") || (esalaryz == "")) {
				$('#divsal').attr('class', 'form-group')
			}

			if (esalary < ssalary) {
				alert('Range Salary tidak benar, salary akhir harus lebih besar daripada salary awal');
				return false;
			}

			if (level == "") {
				alert("Level Tidak Boleh Kosong !!");
				return false;
			} else if (exper == "") {
				alert("Experience Tidak Boleh Kosong !!");
				return false;
			} else if (job_skills == "") {
				alert("Skills Tidak Boleh Kosong !!");
				return false;
			} else if ((duedate == "") || (duedate1 == "")) {
				alert("Range Tanggal Posting Tidak Boleh Kosong !!");
				return false;
			}

			$('#listskemax> tbody:last-child').append('<tr><td class=lrinjabz style=display:none>' + rinjabz + '</td><td class=lrinjab>' + rinjab + '</td><td class=lssalaryz>' + ssalary + '</td><td class=lesalaryz>' + esalary + '</td><td class=llevel style=display:none>' + level + '</td><td class=lexper style=display:none>' + exper + '</td><td class=ljob_skills style=display:none>' + job_skills + '</td><td class=ljob_benefits style=display:none>' + job_benefits + '</td><td class=lduedate style=display:none>' + duedate + '</td><td class=lduedate1 style=display:none>' + duedate1 + '</td></tr>');

			$('#ssalaryz').val('');
			$('#esalaryz').val('');
			$('#exper').val('');
			$('#level').val('');
			$('#job_skills').val('');
			$('#job_benefits').val('');
			$('#duedate').val('');
			$('#duedate1').val('');
		});




		$('#tmbhrincian').click(function() {
			var nojo = $('#nojol').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_rincian";
			$.post(url, {
				data: nojo
			}, function(response) {
				$("#rinjab").html(response);
			})
		});



		$('#duedate').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '0',
			autoclose: true
		});
		$('#duedate1').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '0',
			autoclose: true
		});

		$("#btn_download").click(function() {
			//var lkomponen = $row.find(".komponen").text();
			//$(".btn_download").val('<?php echo base_url(); ?>uploads/'+ lkomponen);
			window.location = $("#btn_download").val();
		});


		$('#btnsubmit').click(function() {
			var lrincian = [];
			$('#listskemax tbody tr').each(function() {
				var lrinjabz = $(this).find(".lrinjabz").html();
				var lssalaryz = $(this).find(".lssalaryz").html();
				var lesalaryz = $(this).find(".lesalaryz").html();
				var llevel = $(this).find(".llevel").html();
				var lexper = $(this).find(".lexper").html();
				var ljob_skills = $(this).find(".ljob_skills").html();
				var ljob_benefits = $(this).find(".ljob_benefits").html();
				var lduedate = $(this).find(".lduedate").html();
				var lduedate1 = $(this).find(".lduedate1").html();
				//lrincian += [lrinjabz, lssalaryz, lesalaryz, llevel, lexper, ljob_skills, ljob_benefits, lduedate, lduedate1];
				lrincian += [lrinjabz, lssalaryz, lesalaryz, llevel, ljob_skills, ljob_benefits, lduedate, lduedate1];
				lrincian += ',';
			})


			if (lrincian == "") {
				alert('Anda harus menambahkan Salary Rincian Jabatan terlebih dahulu !!');
				return false;
			}


			var nojol = $('#nojol').val();
			arrrin = [nojol, lrincian];
			var url = "<?php echo base_url(); ?>index.php/home/simpanrincian";
			//arrappjo = [vnojo, ket, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
			$.post(url, {
				arrrin: arrrin
			}, function(res) {
				//alert(res);
				alert('Data Berhasil Di Approve');
				location.reload();

			})

		});


		$('#btnskip').click(function() {

			var nojol = $('#nojol').val();
			arrrinx = [nojol];
			var url = "<?php echo base_url(); ?>index.php/home/simpanrincian_skip";
			//arrappjo = [vnojo, ket, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
			$.post(url, {
				arrrinx: arrrinx
			}, function(res) {
				//alert(res);
				alert('Data Telah Di Approve');
				location.reload();

			})

		});



		$(".btnadd").click(function() {
			$("#wew").show();
			$("#awal").show();
			$("#akhir").hide();
			$('#ket').val('');
			$('#ssalary').val('');
			$('#esalary').val('');
			$('#exper').val('');
			$('#level').val('');
			$('#job_skills').val('');
			$('#job_benefits').val('');
			$('#duedate').val('');
			$('#duedate1').val('');


			$('#listpola').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".nojo").text();
			var trep = $row.find(".trep").text();
			var natasan = $row.find(".natasan").text();

			$("#nojol").val(vnojo);
			$("#treplace").val(trep);

			$("#testing").slideUp("slow");

			if (btn == "Waiting Approval") {
				$("#labeljo").html('<label class="control-label"> Menunggu Approval ' + natasan + ' </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Waiting Approval Admin") {
				$("#labeljo").html('<label class="control-label"> Menunggu Approval Admin </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved") {
				$("#labeljo").html('<label class="control-label"> Sudah diapprove oleh ' + natasan + ' </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Approved Admin") {
				$("#labeljo").html('<label class="control-label"> Sudah diapprove </label>');
				$("#approvalbtn").html("");
			} else if (btn == "Rejected") {
				$("#labeljo").html('<label class="control-label"> JO ditolak oleh ' + natasan + ' </label><br><textarea class="form-control" rows="3" id="ket_atasan" name="ket_atasan"/></textarea>');

				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var atasan = $row.find(".atasan").text();

				$("#ket_atasan").val(atasan);

				$("#approvalbtn").html("");
			} else if (btn == "Rejected Admin") {
				$("#labeljo").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_admin" name="ket_admin"/></textarea>');

				$('#listpola').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var admin = $row.find(".admin").text();

				$("#ket_admin").val(admin);

				$("#approvalbtn").html("");
			} else if (btn == "Approve") {
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No ' + vnojo + '</label><br><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan">Approve</button>'
				$("#approvalbtn").html(appbtn);

				$("#btnsimpan").click(function() {
					$('#overlay').show();
					var vnojo = $row.find(".nojo").text();
					var tjok = $row.find(".tjo").text();
					var ket = $('#ket').val();
					var trep = $row.find(".trep").text();
					var tjen = 'New';
					$("#inojo").val(vnojo);
					var url = "<?php echo base_url(); ?>index.php/home/simpantjo";
					arrappjo = [vnojo, ket, tjok, trep];
					$.post(url, {
						arrappjo: arrappjo
					}, function(res) {
						$('#overlay').hide();
						//alert('Data Berhasil Di Approve');
						alert(res);
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})

				$("#btnreject").click(function() {
					$('#overlay').show();
					var ket_status = $('#ket').val();

					if (ket_status == "") {
						$('#overlay').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}

					var vnojo = $row.find(".nojo").text();
					var tjok = $row.find(".tjo").text();
					var trep = $row.find(".trep").text();
					var ket = $('#ket').val();
					var tjen = 'New';
					$("#inojo").val(vnojo);
					var url = "<?php echo base_url(); ?>index.php/home/rejectjo";
					arrappjo = [vnojo, ket, tjok, trep];
					$.post(url, {
						arrappjo: arrappjo
					}, function(res) {
						$('#overlay').hide();
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			} else {
				$("#labeljo").html('<label class="control-label"> Anda akan menyetujui Job order No ' + vnojo + '</label><textarea class="form-control" rows="3" id="ket" name="ket" placeholder="Alasan Reject..."/></textarea>');
				$("#labeljon").html('<label class="control-label"> Anda akan menyetujui Job order No ' + vnojo + '</label>');
				var appbtn1 = '<button type="button" class="btn btn-outline btnreject" data-dismiss="modal" id="btnreject1">Reject</button><button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Approve Admin</button>'
				var appbtn2 = '<button type="button" class="btn btn-outline" data-dismiss="modal" id="btnsimpan1">Submit</button>'
				$("#approvalbtn").html(appbtn1);
				$("#approvalbtnz").html(appbtn2);

				$("#btnsimpan1").click(function() {
					$('#overlay').show();
					$("#awal").hide();
					$("#akhir").show();
					$("#wew").hide();
					$("#testing").slideDown("slow");
					//var ssalary 	= $('#ssalary').val();	


					var lrincian = [];
					$('#listskemax tbody tr').each(function() {
						var lrinjab = $(this).find(".lrinjab").html();
						var lssalaryz = $(this).find(".lssalaryz").html();
						var lesalaryz = $(this).find(".lesalaryz").html();
						lrincian += [lrinjab, lssalaryz, lesalaryz];
						lrincian += ',';
					})


					if (lrincian == "") {
						alert('Anda harus menambahkan Salary Rincian Jabatan terlebih dahulu !!');
						return false;
					}

					/*
					if((ssalary == "") || (esalary == "")){
						alert("Silahkan input data berikut terlebih dahulu !!");
						return false;
					}
					*/



					var vnojo = $row.find(".nojo").text();
					var ket = $('#ket').val();
					var tjen = 'New';
					$("#inojo").val(vnojo);
					var url = "<?php echo base_url(); ?>index.php/home/simpantjo1";
					//arrappjo = [vnojo, ket, ssalary, esalary, exper, level, job_skills, job_benefits, duedate, duedate1];
					arrappjo = [vnojo, ket];
					$.post(url, {
						arrappjo: arrappjo
					}, function(res) {
						$('#overlay').hide();
						alert('Data Berhasil Di Approve');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})

				$("#btnreject1").click(function() {
					$('#overlay').show();
					var ket_status = $('#ket').val();

					if (ket_status == "") {
						$('#overlay').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}

					var vnojo = $row.find(".nojo").text();
					var ket = $('#ket').val();
					$("#inojo").val(vnojo);
					var url = "<?php echo base_url(); ?>index.php/home/rejectjo1";
					arrappjo = [vnojo, ket];
					$.post(url, {
						arrappjo: arrappjo
					}, function(res) {
						$('#overlay').hide();
						alert('Data Berhasil Di Reject');
						location.reload();
						/*
						xTable.fnDestroy();
						$('#overlay').hide();
						$('#listpola tbody').html(res);
						$('#listpola').dataTable(option);
						*/
					})
				})
			}
		});



		$(".vbtndetailx").click(function() {
			$('#listpolarxy').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var vnojo = $row.find(".tejo").text();
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/xtrajo";
			$.post(url, {
				data: vnojo
			}, function(res) {
				eTable.fnDestroy();
				$('#overlay').hide();
				$('#listrincianxy tbody').html(res);
				$('#listrincianxy').dataTable({
					"bFilter": false,
					"bSort": true,
					"bLengthChange": false,
					"bPaginate": true
				});
			})
		});

		$(".vbtnapp").click(function() {
			$('#listpolarxy').dataTable(option);
			btn = $(this).html();
			var $row = $(this).closest("tr");
			var bar = $row.find(".bar").text();
			var bpa = $row.find(".bpa").text();
			var bare = $row.find(".bare").text();
			var pare = $row.find(".pare").text();
			var tejo = $row.find(".tejo").text();

			if (btn == "Approved") {
				$("#vlabeljoz").html('<label class="control-label"> Sudah diapprove </label>');
				$("#vapprovalbtn_sk").html("");
			} else if (btn == "Waiting Approval") {
				$("#vlabeljoz").html('<label class="control-label"> Waiting Approval MANAR </label>');

				$('#listpolarxy').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var keter = $row.find(".keter").text();

				$("#ket_app").val(keter);

				$("#vapprovalbtn_sk").html("");
			} else if (btn == "Rejected") {
				$("#vlabeljoz").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app"/></textarea>');

				$('#listpolarxy').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var keter = $row.find(".keter").text();

				$("#ket_app").val(keter);

				$("#vapprovalbtn_sk").html("");
			} else if (btn == "Approve") {
				$("#vlabeljoz").html('<label class="control-label"> Anda akan menyetujui Penyesuaian Variabel ' + tejo + ' </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app" placeholder="Alasan Reject..."/></textarea>');
				var appbtn = '<button type="button" class="btn btn-outline btnrez" id="btnrez">Reject</button><button type="button" class="btn btn-outline btnappro" id="btnappro">Approve</button>';
				$("#vapprovalbtn_sk").html(appbtn);

				$("#btnappro").click(function() {
					$('#overlayxy').show();
					var tejo = $row.find(".tejo").text();
					var ket_appro = $('#ket_app').val();
					var bar = $row.find(".bar").text();
					var bpa = $row.find(".bpa").text();
					var bare = $row.find(".bare").text();
					var pare = $row.find(".pare").text();
					var url = "<?php echo base_url(); ?>index.php/home/s_skpm";
					arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
					$.post(url, {
						arrappjol: arrappjol
					}, function(res) {
						$('#overlayxy').hide();
						alert('Data Berhasil Di Approve');
						$('#VGmyModal').modal('hide');
						vload_search();
					})
				});


				$("#btnrez").click(function() {
					$('#overlayxy').show();
					var ket_appro = $('#ket_app').val();
					if (ket_appro == "") {
						$('#overlayxy').hide();
						alert("Keterangan Status Tidak Boleh Kosong !!");
						return false;
					}

					var tejo = $row.find(".tejo").text();
					var bar = $row.find(".bar").text();
					var bpa = $row.find(".bpa").text();
					var bare = $row.find(".bare").text();
					var pare = $row.find(".pare").text();
					var url = "<?php echo base_url(); ?>index.php/home/r_sk";
					arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
					$.post(url, {
						arrappjol: arrappjol
					}, function(res) {
						$('#overlayxy').hide();
						alert('Data Berhasil Di Reject');
						$('#VGmyModal').modal('hide');
						vload_search();
					})
				});
			}
		});



		uTable.on('draw.dt', function() {
			$(".vbtndetailx").click(function() {
				$('#listpolarxy').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var vnojo = $row.find(".tejo").text();
				$("#inojo").val(vnojo);
				var url = "<?php echo base_url(); ?>index.php/home/xtrajo";
				$.post(url, {
					data: vnojo
				}, function(res) {
					eTable.fnDestroy();
					$('#overlay').hide();
					$('#listrincianxy tbody').html(res);
					$('#listrincianxy').dataTable({
						"bFilter": false,
						"bSort": true,
						"bLengthChange": false,
						"bPaginate": true
					});
				})
			});

			$(".vbtnapp").click(function() {
				$('#listpolarxy').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var bar = $row.find(".bar").text();
				var bpa = $row.find(".bpa").text();
				var bare = $row.find(".bare").text();
				var pare = $row.find(".pare").text();
				var tejo = $row.find(".tejo").text();

				if (btn == "Approved") {
					$("#vlabeljoz").html('<label class="control-label"> Sudah diapprove </label>');
					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Waiting Approval") {
					$("#vlabeljoz").html('<label class="control-label"> Waiting Approval MANAR </label>');

					$('#listpolarxy').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var keter = $row.find(".keter").text();

					$("#ket_app").val(keter);

					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Rejected") {
					$("#vlabeljoz").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app"/></textarea>');

					$('#listpolarxy').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var keter = $row.find(".keter").text();

					$("#ket_app").val(keter);

					$("#vapprovalbtn_sk").html("");
				} else if (btn == "Approve") {
					$("#vlabeljoz").html('<label class="control-label"> Anda akan menyetujui Penyesuaian Variabel ' + tejo + ' </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app" placeholder="Alasan Reject..."/></textarea>');
					var appbtn = '<button type="button" class="btn btn-outline btnrez" id="btnrez">Reject</button><button type="button" class="btn btn-outline btnappro" id="btnappro">Approve</button>';
					$("#vapprovalbtn_sk").html(appbtn);

					$("#btnappro").click(function() {
						$('#overlayxy').show();
						var tejo = $row.find(".tejo").text();
						var ket_appro = $('#ket_app').val();
						var bar = $row.find(".bar").text();
						var bpa = $row.find(".bpa").text();
						var bare = $row.find(".bare").text();
						var pare = $row.find(".pare").text();
						var url = "<?php echo base_url(); ?>index.php/home/s_skpm";
						arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
						$.post(url, {
							arrappjol: arrappjol
						}, function(res) {
							$('#overlayxy').hide();
							alert('Data Berhasil Di Approve');
							$('#VGmyModal').modal('hide');
							load_search();
						})
					});


					$("#btnrez").click(function() {
						$('#overlayxy').show();
						var ket_appro = $('#ket_app').val();
						if (ket_appro == "") {
							$('#overlayxy').hide();
							alert("Keterangan Status Tidak Boleh Kosong !!");
							return false;
						}

						var tejo = $row.find(".tejo").text();
						var bar = $row.find(".bar").text();
						var bpa = $row.find(".bpa").text();
						var bare = $row.find(".bare").text();
						var pare = $row.find(".pare").text();
						var url = "<?php echo base_url(); ?>index.php/home/r_sk";
						arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
						$.post(url, {
							arrappjol: arrappjol
						}, function(res) {
							$('#overlayxy').hide();
							alert('Data Berhasil Di Reject');
							$('#VGmyModal').modal('hide');
							load_search();
						})
					});
				}
			});
		});



		vTable.on('draw.dt', function() {
			$(".btndetailx").click(function() {
				$('#listpolar').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var vnojo = $row.find(".tejo").text();
				$("#inojo").val(vnojo);
				var url = "<?php echo base_url(); ?>index.php/home/xtrajo";
				$.post(url, {
					data: vnojo
				}, function(res) {
					kTable.fnDestroy();
					$('#overlay').hide();
					$('#listrincianx tbody').html(res);
					$('#listrincianx').dataTable({
						"bFilter": false,
						"bSort": true,
						"bLengthChange": false,
						"bPaginate": true
					});
				})
			});


			$(".btnapp").click(function() {
				$('#listpolar').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var bar = $row.find(".bar").text();
				var bpa = $row.find(".bpa").text();
				var bare = $row.find(".bare").text();
				var pare = $row.find(".pare").text();
				var tejo = $row.find(".tejo").text();
				var yyy = $row.find(".ketdone").text();
				// add by kaha 19-01-2024 -> detail approved
				$("#xketx").val($row.find(".ketdon").text());

				if ((btn == "Approved PM") || (btn == "Approved Atasan")) {
					// add by kaha 19-01-2024 -> detail approved
					$('#zolo').show();
					$("#labeljoz").html('<label class="control-label"> Sudah diapprove </label>');
					// 
					$("#approvalbtn_sk").html("");
				} else if ((btn == "Waiting Approval PM") || (btn == "Waiting Approval Atasan")) {
					$("#labeljoz").html('<label class="control-label"> Waiting Approval </label>');

					$('#listpolar').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var keter = $row.find(".keter").text();

					$("#ket_app").val(keter);

					$("#approvalbtn_sk").html("");
				} else if (btn == "Rejected") {
					$("#labeljoz").html('<label class="control-label"> JO ditolak </label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app"/></textarea>');

					$('#listpolar').dataTable(option);
					btn = $(this).html();
					var $row = $(this).closest("tr");
					var keter = $row.find(".keter").text();

					$("#ket_app").val(keter);

					$("#approvalbtn_sk").html("");
				} else if (btn == "Approve") {
					$("#labeljoz").html('<label class="control-label"> Anda akan menyetujui Penyesuaian Skema ' + bar + ' -> ' + bpa + '</label><br><textarea class="form-control" rows="3" id="ket_app" name="ket_app" placeholder="Alasan Reject..."/></textarea>');
					var appbtn = '<button type="button" class="btn btn-outline btnrez" id="btnrez">Reject</button><button type="button" class="btn btn-outline btnappro" id="btnappro">Approve</button>';
					$("#approvalbtn_sk").html(appbtn);

					$("#btnappro").click(function() {
						$('#overlay1').show();
						var tejo = $row.find(".tejo").text();
						var ket_appro = $('#ket_app').val();
						var bar = $row.find(".bar").text();
						var bpa = $row.find(".bpa").text();
						var bare = $row.find(".bare").text();
						var pare = $row.find(".pare").text();
						var url = "<?php echo base_url(); ?>index.php/home/s_sk";
						arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
						$.post(url, {
							arrappjol: arrappjol
						}, function(res) {
							$('#overlay1').hide();
							alert('Data Berhasil Di Approve');
							$('#GmyModal').modal('hide');
							load_search();
						})
					});


					$("#btnrez").click(function() {
						$('#overlay1').show();
						var ket_appro = $('#ket_app').val();
						if (ket_appro == "") {
							$('#overlay1').hide();
							alert("Keterangan Status Tidak Boleh Kosong !!");
							return false;
						}

						var tejo = $row.find(".tejo").text();
						var bar = $row.find(".bar").text();
						var bpa = $row.find(".bpa").text();
						var bare = $row.find(".bare").text();
						var pare = $row.find(".pare").text();
						var url = "<?php echo base_url(); ?>index.php/home/r_sk";
						arrappjol = [tejo, ket_appro, bar, bpa, bare, pare];
						$.post(url, {
							arrappjol: arrappjol
						}, function(res) {
							$('#overlay1').hide();
							alert('Data Berhasil Di Reject');
							$('#GmyModal').modal('hide');
							load_search();
						})
					});
				}
			});
		});


		ppTable.on('draw.dt', function() {
			$(".ppbtnapp").click(function() {
				$('#listpolarpp').dataTable(option);
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var ppid = $row.find(".ppid").text();
				var persaid = $row.find(".persaid").text();
				var ppnoj = $row.find(".noj").text();
				var ppbtn = $row.find(".ppbtn").text();
				var ket_ats = $row.find(".ppk_atasan").text();
				var ket_pm = $row.find(".ppk_pm").text();
				var cekapp = $row.find(".cekapp").text();

				if (btn == "Approved") {
					$("#ppvlabeljoz").html('<label class="control-label"> ' + ppbtn + ' </label>');
					$("#ppapprovalbtn_sk").html("");
				} else if (btn == "Waiting Approval") {
					$("#ppvlabeljoz").html('<label class="control-label"> ' + ppbtn + ' </label>');
					$("#ppapprovalbtn_sk").html("");
				} else if (btn == "Rejected") {
					if (ppbtn == "Rejected PM") {
						$("#ppvlabeljoz").html('<label class="control-label"> JO ditolak PM </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app"/></textarea>');
					} else if (ppbtn == "Rejected Atasan") {
						$("#ppvlabeljoz").html('<label class="control-label"> JO ditolak Atasan </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app"/></textarea>');
					}

					if (ppbtn == "Rejected Atasan") {
						$("#ppket_app").val(ket_ats);
					} else if (ppbtn == "Rejected PM") {
						$("#ppket_app").val(ket_pm);
					}
					$("#ppapprovalbtn_sk").html("");
				} else if (btn == "Approve") {
					$("#ppvlabeljoz").html('<label class="control-label"> Anda akan menyetujui Perpanjangan Project ' + persaid + ' </label><br><textarea class="form-control" rows="3" id="ppket_app" name="ppket_app" placeholder="Alasan Reject..."/></textarea>');
					var appbtn = '<button type="button" class="btn btn-outline ppbtnrez" id="ppbtnrez">Reject</button><button type="button" class="btn btn-outline ppbtnappro" id="ppbtnappro">Approve</button>';
					$("#ppapprovalbtn_sk").html(appbtn);

					$("#ppbtnappro").click(function() {
						$('#ppoverlayxy').show();
						var ppid = $row.find(".ppid").text();
						var ppket_app = $('#ppket_app').val();
						if (ppket_app == "") {
							$('#ppoverlayxy').hide();
							alert("Keterangan Status Tidak Boleh Kosong !!");
							return false;
						}

						var url = "<?php echo base_url(); ?>index.php/rotasi/spp";
						arrappjol = [ppid, ppket_app, persaid, ppnoj, cekapp];
						$.post(url, {
							arrappjol: arrappjol
						}, function(res) {
							$('#ppoverlayxy').hide();
							alert('Data Berhasil Di Approve');
							$('#PPGmyModal').modal('hide');
							ppTable.fnDestroy();
							$('#ppoverlayxy').hide();
							$('#listpolarpp tbody').html(res);
							$('#listpolarpp').dataTable({
								"bFilter": true,
								"bSort": false,
								"bAutoWidth": true,
								"bLengthChange": false,
								"bPaginate": true,
								"scrollX": true
							});
						})
					});


					$("#ppbtnrez").click(function() {
						$('#ppoverlayxy').show();
						var ppid = $row.find(".ppid").text();
						var ppket_app = $('#ppket_app').val();
						if (ppket_app == "") {
							$('#ppoverlayxy').hide();
							alert("Keterangan Status Tidak Boleh Kosong !!");
							return false;
						}

						var url = "<?php echo base_url(); ?>index.php/rotasi/rpp";
						arrappjol = [ppid, ppket_app, persaid, ppnoj, cekapp];
						$.post(url, {
							arrappjol: arrappjol
						}, function(res) {
							$('#ppoverlayxy').hide();
							alert('Data Berhasil Di Reject');
							$('#PPGmyModal').modal('hide');
							ppTable.fnDestroy();
							$('#ppoverlayxy').hide();
							$('#listpolarpp tbody').html(res);
							$('#listpolarpp').dataTable({
								"bFilter": true,
								"bSort": false,
								"bAutoWidth": true,
								"bLengthChange": false,
								"bPaginate": true,
								"scrollX": true
							});
						})
					});
				}
			});
		});



	});


	function custom_alert(output_msg, title_msg) {
		if (!title_msg) title_msg = 'Alert';
		if (!output_msg) output_msg = 'No Message to Display.';
		$("<div></div>").html(output_msg).dialog({
			title: title_msg,
			resizable: false,
			modal: true,
			buttons: {
				"Ok": function() {
					$(this).dialog("close");
				}
			}
		});
	}


	function handle(e) {
		var xTable = $('#listpola').dataTable({
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": true,
			"scrollX": true,
			"bJQueryUI": false
		});

		if (e.keyCode === 13) {
			$('#overlay').show();
			var url = "<?php echo base_url(); ?>" + "index.php/home/listappjo/";
			var dataarr = $('#search').val();
			$.post(url, {
				dataarr: dataarr
			}, function(response) {
				xTable.fnDestroy();
				$('#overlay').hide();
				$('#listpola tbody').html(response);
				$('#listpola').dataTable({
					"bFilter": false,
					"bSort": false,
					"bAutoWidth": true,
					"bLengthChange": false,
					"bPaginate": true,
					"scrollX": true
				});
			})
		}
		return false;
	}
</script>

<script>
	function baddx(nojo, jbtn, ntype, ntrep, alasan_atasan, lvel, region) {
		console.log(jbtn);

		if (lvel == 2 && region == 0) {
			if (jbtn == "Waiting Approval") {
				document.getElementById('rbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('rbtn_reject').setAttribute("style", "display:none;");
				$("#rket").val('');
			} else if (jbtn == "Approved") {
				document.getElementById('rbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('rbtn_reject').setAttribute("style", "display:none;");
				$("#rket").val('');
			} else if (jbtn == "Rejected") {
				document.getElementById('rbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('rbtn_reject').setAttribute("style", "display:none;");
				$("#rket").val(alasan_atasan);
			} else if (jbtn == "Approve") {
				document.getElementById('rbtn_simpan').removeAttribute("style");
				document.getElementById('rbtn_reject').removeAttribute("style");
				$("#rket").val('');
			}
		} else {
			document.getElementById('rbtn_simpan').setAttribute("style", "display:none;");
			document.getElementById('rbtn_reject').setAttribute("style", "display:none;");
			$("#rket").val('');
		}

		$("#rnojo").val(nojo);
		$("#rtjo").val(ntype);
		$("#rtrep").val(ntrep);
		$("#rket").val(alasan_atasan);


		var url = "<?php echo base_url(); ?>index.php/home/det_perx";
		$.post(url, {
			data: nojo
		}, function(res) {
			sTable.fnDestroy();
			$('#overlay').hide();
			$('#listperner tbody').html(res);
			$('#listperner').dataTable({
				"bFilter": false,
				"bSort": true,
				"bLengthChange": false,
				"bPaginate": true
			});
		})

		var url = "<?php echo base_url(); ?>index.php/home/ztrajo";
		$.post(url, {
			data: nojo
		}, function(res) {
			wTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumen_rep tbody').html(res);
			$('#listdokumen_rep').dataTable({
				"bFilter": false,
				"bSort": true,
				"bLengthChange": false,
				"bPaginate": true
			});
		})

	};



	function baddy(nojo, jbtn, ntype, ntrep, alasan_atasan, lvel, region) {
		var vnojo = 'a';
		var vjab = 'b';
		var vlok = 'c';
		larr = [vnojo, vjab, vlok];
		var url = "<?php echo base_url(); ?>index.php/home/detkom";
		$.post(url, {
			larrx: larr
		}, function(res) {
			qTable.fnDestroy();
			$('#overlay').hide();
			$('#listkomp tbody').html(res);
			$('#listkomp').dataTable({
				"bFilter": false,
				"bSort": true,
				"bAutoWidth": false,
				"bLengthChange": false,
				"bPaginate": true,
				"scrollX": true
			});
		})

		console.log(jbtn);

		if (lvel == 2 && region == 0) {
			if (jbtn == "Waiting Approval") {
				document.getElementById('nbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('nbtn_reject').setAttribute("style", "display:none;");
				$("#nket").val('');
			} else if (jbtn == "Approved") {
				document.getElementById('nbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('nbtn_reject').setAttribute("style", "display:none;");
				$("#nket").val('');
			} else if (jbtn == "Rejected") {
				document.getElementById('nbtn_simpan').setAttribute("style", "display:none;");
				document.getElementById('nbtn_reject').setAttribute("style", "display:none;");
				$("#nket").val(alasan_atasan);
			} else if (jbtn == "Approve") {
				document.getElementById('nbtn_simpan').removeAttribute("style");
				document.getElementById('nbtn_reject').removeAttribute("style");
				$("#nket").val('');
			}
		} else {
			document.getElementById('nbtn_simpan').setAttribute("style", "display:none;");
			document.getElementById('nbtn_reject').setAttribute("style", "display:none;");
			$("#nket").val('');
		}

		$("#nnojo").val(nojo);
		$("#ntjo").val(ntype);
		$("#ntrep").val(ntrep);
		$("#nket").val(alasan_atasan);


		var url = "<?php echo base_url(); ?>index.php/home/trajox";
		$.post(url, {
			data: nojo
		}, function(res) {
			//qTable.fnDestroy();
			xTable.fnDestroy();
			$('#overlay').hide();
			$('#listrincian tbody').html(res);
			$('#listrincian').dataTable({
				"bFilter": false,
				"bSort": true,
				"bLengthChange": false,
				"bPaginate": true,
				"bAutoWidth": true,
				"scrollX": true
			});
		})

		var url = "<?php echo base_url(); ?>index.php/home/ztrajo";
		$.post(url, {
			data: nojo
		}, function(res) {
			wTable.fnDestroy();
			$('#overlay').hide();
			$('#listdokumen tbody').html(res);
			$('#listdokumen').dataTable({
				"bFilter": false,
				"bSort": true,
				"bLengthChange": false
			});
		})

		var url = "<?php echo base_url(); ?>index.php/home/zproc";
		$.post(url, {
			data: nojo
		}, function(res) {
			pTable.fnDestroy();
			$('#overlay').hide();
			$('#listproc tbody').html(res);
			$('#listproc').dataTable({
				"bFilter": false,
				"bSort": true,
				"bLengthChange": false,
				"bPaginate": true
			});
		});

		var url = "<?php echo base_url(); ?>index.php/home/kokok";
		$.post(url, {
			data: nojo
		}, function(res) {
			$("#koko").html(res);
		})

	};
</script>


<style>
	.daud {
		color: #FFFFFF;
		background-color: #000033;

	}

	#VXmyModal {
		overflow-x: auto;
		overflow-y: auto;
	}

	#XmyModal {
		overflow-x: auto;
		overflow-y: auto;
	}
</style>
<!-- Full Width Column -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Job Order
			<small>Approval</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Job Order</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php if (($level == '2') || ($level == '1') || ($level == '14') || ($level == '4')) { ?>
			<div class="box box-default">
				<div class="box-header with-border">
					<div class="form-group">
						<div class="input-group">
							<label class="col-sm-6 control-label">Jenis Approval</label>
							<div class="col-sm-6">
								<select class="form-control pull-right" id="typeapp" name="typeapp" style="width:300px;" />
								<option value="N/R">New Dan Replace</option>
								<option value="SKEMA">Penyesuaian Skema</option>
								<?php //if( ($level==2) && ($regional==0) ) { 
								?>
								<option value="VARIABEL">Pembayaran Variabel</option>
								<!--<option value="PP">Perpanjangan Project</option>-->
								<?php //} 
								?>
								</select>
							</div>
						</div><!-- /.input group -->
					</div><!-- /.form group -->
				</div>
			</div>
		<?php } ?>

		<div class="box box-default" id="tar1">
			<!--
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="text" class="form-control pull-right" id="search" placeholder="Search Project .." onkeypress="handle(event)"/>
							</div>
						</div>
					</div>
				-->
			<form role="form" id="formsrc">
				<div class="box-body">
					<table id="listpola" class="table table-bordered table-hover" style="width:100%">
						<thead style="background-color: #dd4b39; color:white;">
							<tr>
								<th style="display:none">x</th>
								<th align="center">No JO</th>
								<th align="center">Project</th>
								<!--<th align="center">Type JO</th>-->
								<th align="center">Persyaratan</th>
								<th align="center">Deskripsi</th>
								<!--<th align="center">Bekerja</th>-->
								<th align="center">Creater</th>
								<th align="center">Last Update</th>
								<th style="display:none">x</th>
								<th style="display:none">x</th>
								<th style="display:none">x</th>
								<th style="display:none">x</th>
								<th style="display:none">x</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							/*
								if (count($transjo)){
									foreach($transjo as $key => $list){
									if ($level == '2')
									{
											if($regional=='1')
											{
												if ($list['approval'] == 0){
													$btn = 'Waiting Approval';
													$stat = 'btn-warning';
												} elseif ($list['approval'] == 1) {
													$btn = 'Approved';
													$stat = 'btn-success';
												} elseif ($list['approval'] == 2) {
													$btn = 'Rejected';
													$stat = 'btn-danger';
												}
											}
											else
											{
												if ($list['approval'] == 0){
													$btn = 'Approve';
													$stat = 'btn-warning';
												} elseif ($list['approval'] == 1) {
													$btn = 'Approved';
													$stat = 'btn-success';
												} elseif ($list['approval'] == 2) {
													$btn = 'Rejected';
													$stat = 'btn-danger';
												}
											}
									}
									else 
									{
											if ($list['approval'] == 0){
												$btn = 'Waiting Approval';
												$stat = 'btn-warning';
											} elseif ($list['approval'] == 1) {
												$btn = 'Approved';
												$stat = 'btn-success';
											} elseif ($list['approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}
									}
									 
										echo "<tr>"; 
										echo "<td class='qappro' style='display:none'>". $list['approval'] ."</td>";
										echo "<td class=nojo>". $list['nojo'] ."</td>";
										if($list['n_project']!='')
										{
											echo "<td class='project'>". $list['n_project'] ."</td>";
										}
										else
										{ 
											echo "<td class='project'>". $list['project'] ."</td>";
										}
										
										if($list['type_jo']==1){
											if($list['type_new']==1){
												echo "<td>". $list['ntype_jo'] ." - New Project</td>";
											}
											else {
												echo "<td>". $list['ntype_jo'] ." - Pengembangan</td>";
											} 
										} else {
											if($list['type_replace']==1){
												echo "<td>". $list['ntype_jo'] ." - No Rekrutment</td>";
											}
											else {
												echo "<td>". $list['ntype_jo'] ." - Rekrutment</td>";
											}
										}
										
										echo "<td>". $list['syarat'] ."</td>";
										echo "<td>". $list['deskripsi'] ."</td>";
										echo "<td>". $list['bekerja'] ."</td>";
										echo "<td>". $list['nupd'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td class='tjo' style='display:none'>". $list['type_jo'] ."</td>";
										echo "<td class='atasan' style='display:none'>". $list['ket_atasan'] ."</td>";
										echo "<td class='admin' style='display:none'>". $list['ket_admin'] ."</td>";
										if($level=='6')
										{
											echo "<td class='natasan' style='display:none'>Atasan masing-masing</td>";
										}
										else if ($level == '2')
										{
											echo "<td class='natasan' style='display:none'>Anda</td>";
										}
										else
										{
											echo "<td class='natasan' style='display:none'>". $list['natasan'] ."</td>";
										}
										echo "<td class='trep' style='display:none'>". $list['type_replace'] ."</td>";
										//echo "<td class=komponen style='display:none'>". $list['komponen'] ."</td>";
										echo "<td>";
										
										if($list['type_jo']==1){
											echo "<button type='button' class='btn ". $stat ." btn-block btn-xs btndetail' id='btndetail' data-toggle='modal' data-target='#XmyModal'>" . $btn . "</button>";
										}
										else {
											echo "<button type='button' class='btn ". $stat ." btn-block btn-xs vbtndetail' id='vbtndetail' data-toggle='modal' data-target='#VXmyModal'>" . $btn . "</button>";
										} 
										//echo "<button type='button' class='btn bg-navy btn-block btn-xs btndok' id='btndok' data-toggle='modal' data-target='#ZmyModal'>Attachment</button>";
										
										
										
										if ($level == '1'){
											if ($list['approval'] == 2) {
												$abcde = 'atasan';
												echo "<a href='". base_url() . 'index.php/home/edit_all' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
											}
										}
										echo "</td>"; echo "</tr>";
										$zit = $list['doc_id']; 
									}
								}
								*/

							?>
						</tbody>
					</table>
				</div><!-- /.box-body -->
			</form>

			<div class="overlay" id="overlay">
				<i class="fa fa-refresh fa-spin"></i>
			</div>

			<div class="modal fade" id="XmyModal" role="dialog">
				<div class="modal-dialog" id="modal-alert" style="width:1230px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<div class="box-group" id="accordion">
								<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
								<div class="panel box box-primary">
									<div class="box-header with-border">
										<h4 class="box-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Rincian Dan Skema
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in">
										<div class="box-body">
											<table id="listrincian" class="table table-bordered table-hover" style="width:1230px;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th>Pelatihan</th>
														<th>Bekerja</th>
														<th>Type Rekrut</th>
														<th>Jabatan</th>
														<th>Gender</th>
														<th>Pendidikan</th>
														<th>Lokasi</th>
														<th>Atasan</th>
														<th>Kontrak</th>
														<th>PKWT</th>
														<th>Waktu</th>
														<th>Jumlah</th>
														<th>Perner No Rekrut</th>
														<!--<th >Status</th>-->
														<th>Detail</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<th style="display:none">X</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead>
												<tbody style="color:#000000;">
												</tbody>
											</table>

											<br>
											<hr><br>

											<div class="form-group" id="divwaktu">
												<label class="col-sm-12 control-label">Skema</label>
											</div>
											<table id="listkomp" class="table table-bordered table-hover" style="width:100%;">
												<thead style="background-color:blue; color:white">
													<tr>
														<th>Level</th>
														<th style="display:none">X</th>
														<th>UMP</th>
														<th>Komponen</th>
														<th style="display:none">X</th>
														<th>Value</th>
														<th>Persentase</th>
														<th>Pengkali TK</th>
														<th>Pengkali Kes</th>
														<!--
													<th>Perusahaan</th>
													<th>Karyawan</th>
													<th>JKK</th>
													<th>JKM</th>
													<th>JHT Perusahaan</th>
													<th>JHT Karyawan</th>-->
														<th>Keterangan</th>
														<th>HK Pembagi</th>
													</tr>
												</thead>
												<tbody style="color:#000000">
												</tbody>
											</table>

											<br>
											<hr><br>

											<div class="form-group" id="divwaktu">
												<label class="col-sm-12 control-label">Training</label>
											</div>
											<div id="hide_train"></div>

											<br>
											<hr><br>
										</div>
									</div>
								</div>
								<div class="panel box box-danger">
									<div class="box-header with-border">
										<h4 class="box-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												Attachment
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse">
										<div class="box-body">
											<table id="listdokumen" class="table table-bordered" style="width:900px;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th>Dokumen Skema</th>
														<th>Dokumen BAK</th>
														<th>Dokumen Lain</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead>
												<tbody style="color:#000000;">
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel box box-success">
									<div class="box-header with-border">
										<h4 class="box-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												Doc Checklist
											</a>
										</h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse">
										<div class="box-body">
											<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000; margin-bottom:20px;" id="koko">

											</div>
										</div>
									</div>
								</div>
								<div class="panel box box-warning">
									<div class="box-header with-border">
										<h4 class="box-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
												Procurement
											</a>
										</h4>
									</div>
									<div id="collapseFour" class="panel-collapse collapse">
										<div class="box-body">
											<table id="listproc" class="table table-bordered" style="width:900px;">
												<thead style="background-color:blue; color:white;">
													<tr>
														<th>Item</th>
														<th>Qty</th>
														<th>Spec</th>
														<th>Budget</th>
														<!--<th>Dokumen Pendukung</th>-->
													</tr>
												</thead>
												<tbody style="color:#000000;">
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>

							<br>

							<textarea class="form-control" rows="3" id="nket" name="nket" placeholder="Alasan Reject..." /></textarea>
							<input type="hidden" id="nnojo" name="nnojo">
							<input type="hidden" id="ntjo" name="ntjo">
							<input type="hidden" id="ntrep" name="ntrep">
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>-->
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="nbtn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="nbtn_simpan">Approve</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->



			<div class="modal fade" id="VXmyModal" role="dialog">
				<div class="modal-dialog" id="modal-alert" style="width:1280px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:blue; color:white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listperner" class="table table-bordered table-hover" style="width:1250px;">
								<thead style="background-color:blue; color:white;">
									<tr>
										<th>Status</th>
										<th>Type</th>
										<th>Pelatihan</th>
										<th>Bekerja</th>
										<th>Rotasi/Resign</th>
										<th>Perner</th>
										<th>Nama</th>
										<th>Area</th>
										<th>PersonalArea</th>
										<th>Skilllayanan</th>
										<th>Level</th>
										<th>Jabatan</th>
										<th>Perner Pengganti</th>
										<!--<th >Status</th>-->
										<th style="display:none">X</th>
										<th style="display:none">X</th>
									</tr>
								</thead>
								<tbody style="color:#000000;">
								</tbody>
							</table>

							<br>
							<hr><br>

							<table id="listdokumen_rep" class="table table-bordered" style="width:1250px;">
								<thead style="background-color:blue; color:white;">
									<tr>
										<th>Dokumen Skema</th>
										<th>Dokumen BAK</th>
										<th>Dokumen Lain</th>
										<!--<th>Dokumen Pendukung</th>-->
									</tr>
								</thead>
								<tbody style="color:#000000;">
								</tbody>
							</table>

							<br>
							<hr><br>

							<textarea class="form-control" rows="3" id="rket" name="rket" placeholder="Alasan Reject..." /></textarea>
							<input type="hidden" id="rnojo" name="rnojo">
							<input type="hidden" id="rtjo" name="rtjo">
							<input type="hidden" id="rtrep" name="rtrep">
						</div>
						<div class="modal-footer" style="background-color:blue; color:white;">
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>-->
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="rbtn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="rbtn_simpan">Approve</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->


			<div class="modal fade" id="ZmyModal" role="dialog">
				<div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Dokumen Pendukung</h4>
						</div>
						<div class="modal-body">
							<table id="listdokumen" class="table table-bordered">
								<thead>
									<tr>
										<th style="width:300px;">Dokumen Skema</th>
										<th style="width:300px;">Dokumen BAK</th>
										<th style="width:300px;">Dokumen Lain</th>
										<!--<th>Dokumen Pendukung</th>-->
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
							<!--<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_reject">Reject</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpan">Approve</button>-->
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->


			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-info" id="modal-alert">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Approval</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">

									<div id="wew">
										<div class="form-group">
											<div id="labeljo"></div>
										</div><!-- /.form group -->
									</div>

									<div id="testing">

										<div class="form-group">
											<div id="labeljon"></div>
										</div><!-- /.form group -->

										<div class="form-group">
											<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#HmyModal' id="tmbhrincian" style="margin-left:16px;">Input Salary Rincian</button>
										</div>

										<table id="listskemax" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th style="display:none">xxx</th>
													<th>Jabatan</th>
													<th>Start Salary</th>
													<th>End Salary</th>
													<th style="display:none">Job Level</th>
													<th style="display:none">Experience</th>
													<th style="display:none">Skills</th>
													<th style="display:none">Benefits</th>
													<th style="display:none">Start Publish Date</th>
													<th style="display:none">End Publish Date</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>


										<div class="form-group">
											<input type="hidden" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="ssalary" />
											<input type="hidden" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="esalary" />
											<input type="hidden" class="form-control pull-right" id="nojol" name="nojol" />
											<input type="hidden" class="form-control pull-right" id="treplace" name="treplace" />
										</div><!-- /.form group -->

									</div>

								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer" id="awal">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<div id="approvalbtn"></div>
						</div>
						<div class="modal-footer" id="akhir">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclosed">Close</button>
							<!--<div id="approvalbtnz"></div>-->
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btnsubmit">Submit</button>
							<button type="button" class="btn btn-outline pull-right" data-dismiss="modal" id="btnskip">Skip & Approve</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->








			<div class="modal fade" id="HmyModal" role="dialog">
				<div class="modal-dialog modal-info" id="modal-alert">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">

									<div id="wew">
										<div class="form-group">
											<div id="labeljo"></div>
										</div><!-- /.form group -->
									</div>

									<div class="form-group" id="divrin">
										<label>Rincian</label>
										<div class="input-group">
											<select class="form-control" id="rinjab" name="rinjab">
												<?php //echo $cmbrin 
												?>
											</select>
										</div>
									</div>


									<div class="form-group" id="divsal">
										<label>Salary</label>
										<div class="input-group">
											<table>
												<tr>
													<td width="300px"><input type="text" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="ssalaryz" /></td>
													<td width="50px" align="center">To</td>
													<td width="300px"><input type="text" class="form-control timepicker" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="esalaryz" /></td>
												</tr>
											</table>
										</div><!-- /.input group -->
									</div><!-- /.form group -->


									<table border="0">
										<tr>
											<td>
												<div class="form-group">
													<label>Job Level</label>
													<div class="input-group">
														<select class="form-control" id="level">
															<option value=""> Pilih Job Level</option>
															<?php echo $cmblevel ?>
														</select>
													</div><!-- /.input group -->
												</div><!-- /.form group -->
											</td>

											<td width="80px"></td>

											<td>
												<div class="form-group">
													<label>Experience</label>
													<div class="input-group">
														<select class="form-control" id="exper">
															<option value=""> Pilih Job Experience</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
														</select>
													</div><!-- /.input group -->
												</div><!-- /.form group -->
											</td>
										</tr>
									</table>

									<div class="form-group">
										<label for="job_skills">Skills Required</label>
										<input type="hidden" data-placeholder="Choose skills..." id="job_skills" name="job_skills" style="width:100%;" class="select2-offscreen form-control" />
									</div>

									<div class="form-group">
										<label for="job_skills">Benefits(optional)</label>
										<input type="hidden" data-placeholder="Choose Benefits..." id="job_benefits" name="job_benefits" style="width:100%;" class="select2-offscreen form-control" />
									</div>

									<div class="form-group">
										<label>Publish Start</label>
										<div class="input-group">
											<table>
												<tr>
													<td width="300px"><input type="text" class="form-control" id="duedate" /></td>
													<td width="50px" align="center">s/d</td>
													<td width="300px"><input type="text" class="form-control" id="duedate1" /></td>
												</tr>
											</table>
										</div><!-- /.input group -->
									</div><!-- /.form group -->



								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclose">Close</button>
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_simpanin">Simpan</button>

						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->

		</div><!-- /.box -->







		<div class="box box-default" id="tar2">
			<!--
					<div class="box-header with-border">
						<div class="form-group">
							<div class="input-group">
								<table>
									<tr>
										<td>
											<div class="form-group">
												<label class="col-sm-3 control-label" >Area</label>
												<div class="input-group" style="margin-left:+70px;">
													<select class="form-control" id="ar3" name="ar3">
															<option value=""> Pilih Area </option>
															<?php //echo $cmbare 
															?>
													</select>
												</div>
											</div>
										</td>
										<td>
											<div class="form-group">
												<label class="col-sm-3 control-label" style="margin-left:60px;">PersonalArea</label>
												<div class="input-group" style="margin-left:+180px;">
													<select class="form-control" id="p3r" name="p3r">
															<option value=""> Pilih PersonalArea </option>
															<?php //echo $cmbpera 
															?>
													</select>
												</div>
											</div>
										</td>
										<td>
											<div class="form-group">
												<label class="col-sm-3 control-label" style="margin-left:20px;"></label>
												<div class="input-group" style="margin-left:+70px;">
													<button type="button" class="btn btn-primary" id="btn_search">Search</button>
												</div>
											</div>
										</td>
									</tr>							
								</table>
							</div>
						</div>
					</div>
					-->
			<div class="box-body">
				<div class="overlayx" id="overlayx">
					<i class="fa fa-refresh fa-spin"></i>
				</div>
				<table id="listpolar" class="table table-bordered table-hover">
					<thead style="background-color: #dd4b39; color:white;">
						<tr>
							<th align="center">Nojo</th>
							<th align="center" style="display:none">Area</th>
							<th align="center">PersonalArea</th>
							<th align="center">Dokumen Skema</th>
							<th align="center">Dokumen BAK</th>
							<th align="center">Dokumen Lain</th>
							<th align="center">Creater</th>
							<th align="center">Last Update</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th>Action</th>
							<th style="display:none">x</th>
						</tr>
					</thead>
					<tbody>
						<?php
						/*
								if (count($transjos)){
									foreach($transjos as $key => $list){
										if($level==2)
										{
											if($regional!=1)
											{
												if ($list['flag_approval'] == 0){
												$btn = 'Approve';
												$stat = 'btn-warning';
												} elseif ($list['flag_approval'] == 1) {
													$btn = 'Approved';
													$stat = 'btn-success';
												} elseif ($list['flag_approval'] == 2) {
													$btn = 'Rejected';
													$stat = 'btn-danger';
												} 
											}
											else
											{
												if ($list['flag_approval'] == 0){
												$btn = 'Waiting Approval';
												$stat = 'btn-warning';
												} elseif ($list['flag_approval'] == 1) {
													$btn = 'Approved';
													$stat = 'btn-success';
												} elseif ($list['flag_approval'] == 2) {
													$btn = 'Rejected';
													$stat = 'btn-danger';
												} 
											}
										}
										else
										{
											if ($list['flag_approval'] == 0){
											$btn = 'Waiting Approval';
											$stat = 'btn-warning';
											} elseif ($list['flag_approval'] == 1) {
												$btn = 'Approved';
												$stat = 'btn-success';
											} elseif ($list['flag_approval'] == 2) {
												$btn = 'Rejected';
												$stat = 'btn-danger';
											}  
										}
										echo "<tr>";
										echo "<td class='noj'>". $list['nojo'] ."</td>";
										echo "<td class='bar' style='display:none'>". $list['n_area'] ."</td>";
										echo "<td class='bpa'>". $list['n_perar'] ."</td>";
										?>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['skema'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['skema']; ?> </a></td>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['bak'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['bak']; ?> </a></td>
										<td><a href="<?php echo base_url().'uploads/';?><?php echo $list['other'];?>" target="_blank" style="color:#FF6633;"> <?php echo $list['other']; ?> </a></td>
										<?php
										echo "<td>". $list['nama'] ."</td>";
										echo "<td>". $list['lup'] ."</td>";
										echo "<td class='tejo' style='display:none'>". $list['nojo'] ."</td>";
										echo "<td class='keter' style='display:none'>". $list['ket_reject'] ."</td>";
										echo "<td class='bare' style='display:none'>". $list['area'] ."</td>";
										echo "<td class='pare' style='display:none'>". $list['perar'] ."</td>";
										echo "<td>";
										echo "<button type='submit' class='btn btn-primary btn-block btn-xs btndetailx' id='btndetailx' data-toggle='modal' data-target='#UmyModal'>DETAIL</button>
										<button type='button' class='btn ". $stat ." btn-block btn-xs btnapp' id='btnapp' data-toggle='modal' data-target='#GmyModal'>" . $btn . "</button>";
										if ($list['flag_approval'] == 2) {
											$abcde = 'atasan';
											echo "<a href='". base_url() . 'index.php/home/edit_all_skema' . '/'  . $abcde . '/'  . $list['nojo'] ."'><button type='button' class='btn btn-warning btn-block btn-xs' style='margin-top:5px;'>Edit</button></a>";
										}
										echo "</td>";
										
										echo "</tr>";
									}
								}	
								*/
						?>
					</tbody>
				</table>
			</div><!-- /.box-body -->

			<div class="overlay1" id="overlay1">
				<i class="fa fa-refresh fa-spin"></i>
			</div>


			<div class="modal fade" id="GmyModal" role="dialog">
				<div class="modal-dialog modal-info" id="modal-alert">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Approval</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<div class="form-group">
										<!-- add by kaha 19-01-2024 -> detail approved -->
										<div id="labeljoz"></div>
										<br>
										<div id="zolo">
											<textarea class="form-control" rows="3" id="xketx" name="xketx" style="width:500px;" /></textarea>
										</div>
										<!-- add by kaha 19-01-2024 -> detail approved -->
									</div><!-- /.form group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclosed">Close</button>
							<div id="approvalbtn_sk"></div>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->



			<div class="modal fade" id="UmyModal" role="dialog">
				<div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listrincianx" class="table table-bordered table-hover" style="width:100%">
								<thead>
									<tr>
										<th>Area</th>
										<th>PersonalArea</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->

		</div><!-- /.box -->




		<div class="box box-default" id="tar3">
			<div class="box-header with-border">
				<div class="form-group">
					<div class="input-group">
					</div><!-- /.input group -->
				</div><!-- /.form group -->
			</div>
			<div class="box-body">
				<div class="overlayxy" id="overlayxy">
					<i class="fa fa-refresh fa-spin"></i>
				</div>
				<table id="listpolarxy" class="table table-bordered table-hover">
					<thead style="background-color: #dd4b39; color:white;">
						<tr>
							<th align="center">Nojo</th>
							<th align="center" style="display:none">Area</th>
							<th align="center">PersonalArea</th>
							<th align="center">Dokumen Skema</th>
							<th align="center">Dokumen BAK</th>
							<th align="center">Dokumen Lain</th>
							<th align="center">Creater</th>
							<th align="center">Last Update</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div><!-- /.box-body -->

			<div class="modal fade" id="ZUmyModal" role="dialog">
				<div class="modal-dialog modal-info" id="modal-alert" style="width:650px;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Detail JO</h4>
						</div>
						<div class="modal-body">
							<table id="listrincianxy" class="table table-bordered table-hover" style="width:100%">
								<thead>
									<tr>
										<th>Area</th>
										<th>PersonalArea</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline" data-dismiss="modal" id="btn_close">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->


			<div class="modal fade" id="VGmyModal" role="dialog">
				<div class="modal-dialog modal-info" id="modal-alert">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Approval</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<div class="form-group">
										<div id="vlabeljoz"></div>
									</div><!-- /.form group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclosed">Close</button>
							<div id="vapprovalbtn_sk"></div>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->

		</div><!-- /.box -->


		<div class="box box-default" id="tar4">
			<div class="box-header with-border">
				<div class="form-group">
					<div class="input-group">
					</div><!-- /.input group -->
				</div><!-- /.form group -->
			</div>
			<div class="box-body">
				<div class="ppoverlayxy" id="ppoverlayxy">
					<i class="fa fa-refresh fa-spin"></i>
				</div>
				<table id="listpolarpp" class="table table-bordered table-hover">
					<thead style="background-color: #dd4b39; color:white;">
						<tr>
							<th align="center">Nojo</th>
							<th align="center">PersonalArea</th>
							<th align="center">Area</th>
							<th align="center">Skilllayanan</th>
							<th align="center">Jabatan</th>
							<th align="center">Level</th>
							<th align="center">Jumlah</th>
							<th align="center">Start Project</th>
							<th align="center">End Project</th>
							<th align="center">No Lampiran</th>
							<th align="center">Lampiran</th>
							<th align="center">Creater</th>
							<th align="center">Create Date</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th style="display:none">x</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div><!-- /.box-body -->

			<div class="modal fade" id="PPGmyModal" role="dialog">
				<div class="modal-dialog modal-info" id="modal-alert">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Approval</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="box-body">
									<div class="form-group">
										<div id="ppvlabeljoz"></div>
									</div><!-- /.form group -->
								</div><!-- /.box-body -->
							</form><!-- /.form-horizontal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="btnclosed">Close</button>
							<div id="ppapprovalbtn_sk"></div>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.example-modal -->

		</div><!-- /.box -->



	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
	$(".select2").select2();

	$("#job_skills").select2({
		createSearchChoice: function(term, data) {
			if ($(data).filter(function() {
					return this.text.localeCompare(term) === 0;
				}).length === 0) {
				return {
					id: term,
					text: term
				};
			}
		},
		multiple: true,
		data: [
			<?php
			foreach ($form_job_skills as $value) {
				echo "{id: " . $value->id . ", text:'" . $value->skill_name . "'},";
			}
			?>
		],
		separator: "|"
	});

	$("#job_benefits").select2({
		createSearchChoice: function(term, data) {
			if ($(data).filter(function() {
					return this.text.localeCompare(term) === 0;
				}).length === 0) {
				return {
					id: term,
					text: term
				};
			}
		},
		multiple: true,
		data: [
			<?php
			foreach ($form_job_benefits as $value) {
				echo "{id: " . $value->id . ", text:'" . $value->name_benefits . "'},";
			}
			?>
		],
		separator: "|"
	});
</script>


<script type="text/javascript">
	$(function() {
		dataString = $("#formsrc").serializeArray();
		$("#listpola").DataTable().destroy();
		var mTable =
			$("#listpola").DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				bFilter: true,
				bLengthChange: false,
				bAutoWidth: false,
				scrollX: true,
				ordering: true,
				bSort: true,
				ajax: {
					url: "<?php echo base_url() . 'index.php/mapping/data_listappjox'; ?>",
					type: 'POST',
					dataType: "json",
					data: dataString
				},
				createdRow: function(row, data, index) {
					$('td', row).eq(8).addClass('jumlah'); // 6 is index of column
				},
				columnDefs: [{
					"targets": [0, 7, 8, 9, 10, 11], //first column / numbering column
					"bVisible": false, //set not orderable
				}, ],
			});
		$('.dataTables_filter').addClass('pull-right');
		$('.dataTables_paginate').addClass('pull-right');


		$("#nbtn_simpan").click(function() {
			$('#overlay').show();
			var vnojo = $('#nnojo').val();
			var tjok = $('#ntjo').val();
			var ket = $('#nket').val();
			var trep = $('#ntrep').val();
			var tjen = 'New';
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/simpantjo";
			arrappjo = [vnojo, ket, tjok, trep, tjen];
			$.post(url, {
				arrappjo: arrappjo
			}, function(res) {
				$('#overlay').hide();
				alert('Data Approved');
				$('#XmyModal').hide();
				mTable.ajax.reload();
			})
		});

		$("#nbtn_reject").click(function() {
			$('#overlay').show();
			var ket_status = $('#nket').val();

			if (ket_status == "") {
				$('#overlay').hide();
				alert("Keterangan Status Tidak Boleh Kosong !!");
				return false;
			}

			var vnojo = $('#nnojo').val();
			var tjok = $('#ntjo').val();
			var trep = $('#ntrep').val();
			var ket = $('#nket').val();
			var tjen = 'New';
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/rejectjo";
			arrappjo = [vnojo, ket, tjok, trep, tjen];
			$.post(url, {
				arrappjo: arrappjo
			}, function(res) {
				$('#overlay').hide();
				alert('Data Rejected');
				$('#XmyModal').hide();
				mTable.ajax.reload();
			})
		})

		$("#rbtn_simpan").click(function() {
			$('#overlay').show();
			var vnojo = $('#rnojo').val();
			var tjok = $('#rtjo').val();
			var ket = $('#rket').val();
			var trep = $('#rtrep').val();
			var tjen = 'Rep';
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/simpantjo";
			arrappjo = [vnojo, ket, tjok, trep, tjen];
			$.post(url, {
				arrappjo: arrappjo
			}, function(res) {
				$('#overlay').hide();
				alert('Data Approved');
				$('#VXmyModal').hide();
				mTable.ajax.reload();
			})
		});


		$("#rbtn_reject").click(function() {
			$('#overlay').show();
			var ket_status = $('#rket').val();

			if (ket_status == "") {
				$('#overlay').hide();
				alert("Keterangan Status Tidak Boleh Kosong !!");
				return false;
			}

			var vnojo = $('#rnojo').val();
			var tjok = $('#rtjo').val();
			var trep = $('#rtrep').val();
			var ket = $('#rket').val();
			var tjen = 'Rep';
			$("#inojo").val(vnojo);
			var url = "<?php echo base_url(); ?>index.php/home/rejectjo";
			arrappjo = [vnojo, ket, tjok, trep, tjen];
			$.post(url, {
				arrappjo: arrappjo
			}, function(res) {
				$('#overlay').hide();
				alert('Data Rejected');
				$('#VXmyModal').hide();
				mTable.ajax.reload();
			})
		})
	});
</script>