<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom_style.css">

<script src="<?php echo base_url(); ?>public/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/select2_4.0.1/dist/css/select2.min.css">
<script src="<?php echo base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/select2_4.0.1/dist/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/select2_4.0.1/docs/vendor/js/placeholders.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>adminlte/plugins/datepicker/my.js" type="text/javascript"></script>

<style>
	.divlistrincian {
		overflow-x: scroll;
	}

	.listrincian {
		margin: 40px auto 0px auto;
	}

	.divlistkomponen {
		overflow-x: scroll;
	}

	.listkomponen {
		margin: 40px auto 0px auto;
	}

	.divlistkompx {
		overflow-x: scroll;
	}

	.listkompx {
		margin: 40px auto 0px auto;
	}

	.divlistrincianx {
		overflow-x: scroll;
	}

	.listrincianx {
		margin: 40px auto 0px auto;
	}

	.divperner {
		overflow-x: scroll;
	}

	.listperner {
		margin: 40px auto 0px auto;
	}

	.divpernerganti {
		overflow-x: scroll;
	}

	.listpernerganti {
		margin: 40px auto 0px auto;
	}

	.divpernerexist {
		overflow-x: scroll;
	}

	.listpernerx {
		margin: 40px auto 0px auto;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		$(".select2").select2();

		$("#doc_legalitas").val("<?php echo $legalitas; ?>").trigger('change');

		$('#tanggal').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '0',
			autoclose: true
		});
		$('#latihan').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#bekerja').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#latihan_n').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#bekerja_n').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#tgl1').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#tgl2').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#resign').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#sproject').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#eproject').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#overlay').hide();
		$('#overlay1').hide();
		$('#yeyey').hide();
		$('#lalay').hide();
		//$('#divtre').show();
		//$('#divnrespax').hide();
		//$('#divnprojectx').hide();
		//$('#group_att1').hide();
		$('#group_att2').hide();
		//$('#group_att4').hide();
		$('#group_att5').hide();
		//$('#awwx').hide();
		//$('#akkx').hide();
		if (typeof document.getElementById("tgl2") !== 'undefined' && document.getElementById("tgl2") !== null) {
			document.getElementById("tgl2").disabled = true;
		}

		//$("#respa").select2().select2('val','B416');
		//$('#respa').select2('data', {id: 'B416', text: 'HCC PLASA TELKOM'});

		var optionx = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": false,
			//"bAutoWidth": false,
			//"scrollX": true,
			"bJQueryUI": false
		};

		var optionz = {
			"bRetrieve": true,
			"bServerside": true,
			"bProcessing": true,
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": false,
			"bAutoWidth": false,
			//"scrollX": true,
			"bJQueryUI": false
		};

		eTable = $('#tkomp').dataTable(optionx);
		vTable = $('#tkomp_var').dataTable(optionx);
		bTable = $('#tkomp_ben').dataTable(optionx);
		lTable = $('#listkompx').dataTable(optionz);
		rTable = $('#listrincianx').dataTable(optionz);

		$(".btnedit_komp").click(function() {
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#jabz").val($row.find(".jbz").text());
			$("#lokz").val($row.find(".arz").text());
			$("#kompz").val($row.find(".kpz").text());
			$("#valz").val($row.find(".vlz").text());
			$("#ketz").val($row.find(".ktz").text());
			$("#persenz").val($row.find(".psz").text());
			$("#idz").val($row.find(".cid").text());
			$("#nojoz").val($row.find(".cnoj").text());
			$("#ckompy").val($row.find(".ckompy").text());

			var ckompy = $row.find(".ckompy").text();
			// alert(ckompy);
			if ((ckompy == 4065) || (ckompy == 4066) || (ckompy == 4058) || (ckompy == 8002)) {
				document.getElementById("persenz").readOnly = false;
				document.getElementById("valz").readOnly = true;
			} else {
				document.getElementById("persenz").readOnly = true;
				document.getElementById("valz").readOnly = false;
			}
		});

		lTable.on('draw.dt', function() {
			$(".btnedit_komp").click(function() {
				btn = $(this).html();
				var $row = $(this).closest("tr");
				$("#jabz").val($row.find(".jbz").text());
				$("#lokz").val($row.find(".arz").text());
				$("#kompz").val($row.find(".kpz").text());
				$("#valz").val($row.find(".vlz").text());
				$("#ketz").val($row.find(".ktz").text());
				$("#persenz").val($row.find(".psz").text());
				$("#idz").val($row.find(".cid").text());
				$("#nojoz").val($row.find(".cnoj").text());

				var ckompy = $row.find(".ckompy").text();
				// alert(ckompy);
				if ((ckompy == 4065) || (ckompy == 4066) || (ckompy == 4058) || (ckompy == 8002)) {
					document.getElementById("persenz").readOnly = false;
					document.getElementById("valz").readOnly = true;
				} else {
					document.getElementById("persenz").readOnly = true;
					document.getElementById("valz").readOnly = false;
				}
			});
		});


		$(".btnedit_rinc").click(function() {
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#ridz").val($row.find(".cid").text());
			$("#rnojoz").val($row.find(".cnojr").text());
			$("#ejmlh").val($row.find(".rjml").text());

			var xkid = $row.find(".cid").text();
			var url = "<?php echo base_url(); ?>index.php/home/data_train";
			$.post(url, {
				data: xkid,
				disa: 1
			}, function(res) {
				$('#etrain').html(res);
			})
		});


		$(".btnadd_komp").click(function() {
			btn = $(this).html();
			var $row = $(this).closest("tr");
			$("#jabaz").val($row.find(".njb").text());
			$("#lokasz").val($row.find(".cnm").text());
			$("#kodekontz").val($row.find(".kon").text());
			$("#hkpembagiz").val($row.find(".hkp").text());
			$("#umpz").val($row.find(".cump").text());
			$("#kodelokasiz").val($row.find(".clok").text());
			$("#kodejabz").val($row.find(".cjab").text());

			var ajk = $row.find(".ckskill").text();
			var ajm = $row.find(".cnskill").text();
			var tyu = ajk + " | " + ajm;

			$("#kodelevel").val($row.find(".cklv").text());
			$("#namalevel").val($row.find(".cnlv").text());
			$("#kodeskill").val($row.find(".ckskill").text());
			$("#detkomp").val($row.find(".cdet_komp").text());
			//$("#namaskill").val($row.find(".ckskill").text() | $row.find(".cnskill").text());
			// $("#namaskill").val(tyu);
			$("#namaskill").val($row.find(".cnskill").text());

			var aix = $("#kodekontz").val();
			if (aix == 'PKWT') {
				var group = 1;
			} else if (aix == 'KEMITRAAN') {
				var group = 2;
			} else if (aix == 'MAGANG') {
				var group = 3;
			} else if (aix == 'THL') {
				var group = 5;
			} else if (aix == 'PKWT-KEMITRAAN PB') {
				var group = 6;
			} else {
				var group = 4;
			}

			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_fixed";
			$.post(url, {
				data: group
			}, function(response) {
				console.log(response);
				$(".xkompx").html(response);
			});


			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_variabel";
			$.post(url, {
				data: group
			}, function(response) {
				$(".xvkompx").html(response);
			});


			//var group = $('#kontrak').val(); 
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
			$.post(url, {
				data: group
			}, function(response) {
				$(".xbkompx").html(response);
			})
		});

		rTable.on('draw.dt', function() {
			$(".btnedit_rinc").click(function() {
				btn = $(this).html();
				var $row = $(this).closest("tr");
				$("#ridz").val($row.find(".cid").text());
				$("#rnojoz").val($row.find(".cnojr").text());
				$("#ejmlh").val($row.find(".rjml").text());

				var xkid = $row.find(".cid").text();
				var url = "<?php echo base_url(); ?>index.php/home/data_train";
				$.post(url, {
					data: xkid,
					disa: 1
				}, function(res) {
					$('#etrain').html(res);
				})
			});

			$(".btnadd_komp").click(function() {
				btn = $(this).html();
				var $row = $(this).closest("tr");
				$("#jabaz").val($row.find(".njb").text());
				$("#lokasz").val($row.find(".cnm").text());
				$("#kodekontz").val($row.find(".kon").text());
				$("#hkpembagiz").val($row.find(".hkp").text());
				$("#umpz").val($row.find(".cump").text());
				$("#kodelokasiz").val($row.find(".clok").text());
				$("#kodejabz").val($row.find(".cjab").text());

				var ajk = $row.find(".ckskill").text();
				var ajm = $row.find(".cnskill").text();
				var tyu = ajk + " | " + ajm;

				$("#kodelevel").val($row.find(".cklv").text());
				$("#namalevel").val($row.find(".cnlv").text());
				$("#kodeskill").val($row.find(".ckskill").text());
				$("#detkomp").val($row.find(".cdet_komp").text());
				// $("#namaskill").val(tyu);
				$("#namaskill").val($row.find(".cnskill").text());

				var aix = $("#kodekontz").val();
				if (aix == 'PKWT') {
					var group = 1;
				} else if (aix == 'KEMITRAAN') {
					var group = 2;
				} else if (aix == 'MAGANG') {
					var group = 3;
				} else if (aix == 'THL') {
					var group = 5;
				} else if (aix == 'PKWT-KEMITRAAN PB') {
					var group = 6;
				} else {
					var group = 4;
				}

				var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_fixed";
				$.post(url, {
					data: group
				}, function(response) {
					console.log(response);
					$(".xkompx").html(response);
				});


				var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_variabel";
				$.post(url, {
					data: group
				}, function(response) {
					$(".xvkompx").html(response);
				});


				//var group = $('#kontrak').val(); 
				var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
				$.post(url, {
					data: group
				}, function(response) {
					$(".xbkompx").html(response);
				})
			});
		});


		$("#spa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/searchar",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term
					};
				},
				processResults: function(data) {
					return {
						results: $.map(data, function(obj) {
							//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
							return {
								id: obj.personalarea + "#" + obj.karea,
								text: obj.personnal_area + " (" + obj.narea + ")"
							};
						})
					};
				},
			},
			minimumInputLength: 2
		});

		/*
		$("#respa").select2({
			ajax: {
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/xsearchar",
				dataType: 'json',
				delay: 250,
				data: function(params){
					return {
						q: params.term
					};
				},
				processResults: function (data) {
					 return {
						  results: $.map(data, function(obj) {
								//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
								return { id: obj.personalarea, text: obj.personnal_area };
						  })
					 };
				},
			},
			minimumInputLength: 2
		});
		*/

		$("#respa").change(function() {
			var group = $("#respa").select2('data')[0]['id'];
			var url = "<?php echo base_url(); ?>index.php/home/pilih_area";
			$.post(url, {
				data: group
			}, function(response) {
				$("#lokasi").html(response);
			})
		});


		$("#ypernery").select2({
			ajax: {
				//data: form_data,
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/perner_search",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term,
						k: $("#xrespax").val(),
						p: 2
					};
				},
				processResults: function(data, params) {
					return {
						results: $.map(data, function(obj) {
							//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
							return {
								id: obj.pernr,
								text: obj.pernr
							};
						})
					};
					console.log(params);
				},
			},
			minimumInputLength: 2
		});


		$("#ypernery").change(function() {
			var pganti = $("#ypernery").val();
			var tglresign = $("#resign").val();
			if (tglresign == '') {
				alert('Tgl Resign Harus di isi terlebih dahulu, TerimaKasih');
				return false;

			}
			var url = "<?php echo base_url(); ?>index.php/mapping/cek_perner_ganti";
			$.post(url, {
				data: pganti
			}, function(response) {
				var res = response.split(",");
				if (res[0] == 'GAGAL') {
					alert('Perner sudah pernah di input pada nojo ' + res[1] + ', dan belum di proses !!');
					$("#ypernery").select2("val", "");
					return false;
				} else if (res[0] == 'GAGALX') {
					alert('Bulan tahun rotasi tidak boleh sama atau sebelum status action terakhir !!');
					$("#ypernery").select2("val", "");
					return false;
				}
			});
		});


		$("#xpernerx").select2({
			ajax: {
				//data: form_data,
				placeholder: "Cari Nama....",
				allowClear: true,
				url: "<?php echo base_url() ?>" + "index.php/home/perner_search",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term,
						k: $("#xrespax").val(),
						p: 1
					};
				},
				processResults: function(data, params) {
					return {
						results: $.map(data, function(obj) {
							//return { id: obj.personalarea, text: obj.personnal_area+" ("+obj.personalarea+")" };
							return {
								id: obj.pernr,
								text: obj.pernr
							};
						})
					};
					console.log(params);
				},
			},
			minimumInputLength: 2
		});



		$("#xpernerx").change(function() {
			// var r = confirm("Apakah Anda Yakin tidak ada training untuk replace perner ini ?");
			// if (r == true) {
			var value = $("#xpernerx").select2('data')[0]['id'];
			var text = $("#xpernerx").select2('data')[0]['text'];
			document.getElementById("xpernerx").disabled = true;
			var pganti = $("#ypernery").val();

			var tresign = $("#resign").val();
			var tlatihan = $("#latihan").val();
			var tbekerja = $("#bekerja").val();
			var typere = $("#typere").val();
			var alasan_ganti = $("#alasan_ganti").val();
			var talasan_ganti = $('#alasan_ganti :selected').text();
			var alasan = $("#alasan").val();
			var talasan = $('#alasan :selected').text();
			var ntypere = $('#typere :selected').text();
			var trotres = $('#trotres:checked').val();
			if (trotres == 1) {
				var ntrotres = 'Resign';
			} else {
				var ntrotres = 'Rotasi-Mutasi';
			}

			document.getElementById("xpernerx").disabled = true;


			var vkumtrain = [];
			var vkumtraint = [];
			$('#rep_kumtrain:checked').each(function(i) {
				vkumtrain[i] = $(this).val();
				if ($(this).val() == 1) {
					vkumtraint[i] = 'Softskill';
				} else if ($(this).val() == 2) {
					vkumtraint[i] = 'Hardskill';
				} else if ($(this).val() == 3) {
					vkumtraint[i] = 'Tandem Pasif';
				} else if ($(this).val() == 4) {
					vkumtraint[i] = 'Tandem Aktif';
				}
			});
			var vkumtrainx = vkumtrain.join(';');
			var vkumtraintx = vkumtraint.join(';');

			if (tresign == '') {
				alert('Tanggal Resign/Rotasi tidak boleh kosong..');
				document.getElementById("xpernerx").disabled = false;
				$("#xpernerx").select2("val", "");
				return false;
			}

			if (tlatihan == '') {
				alert('Tanggal Pelatihan tidak boleh kosong..');
				document.getElementById("xpernerx").disabled = false;
				$("#xpernerx").select2("val", "");
				return false;
			}

			if (tbekerja == '') {
				alert('Tanggal Bekerja tidak boleh kosong..');
				document.getElementById("xpernerx").disabled = false;
				$("#xpernerx").select2("val", "");
				return false;
			}

			if (alasan == '') {
				alert('Alasan resign/rotasi harus dipilih..');
				document.getElementById("xpernerx").disabled = false;
				$("#xpernerx").select2("val", "");
				return false;
			}

			if (typere == '3') {
				if (pganti == null) {
					alert('Perner Pengganti harus diisi..');
					document.getElementById("xpernerx").disabled = false;
					$("#xpernerx").select2("val", "");
					return false;
				}

				if (alasan_ganti == '') {
					alert('Alasan Rotasi Pengganti harus dipilih..');
					document.getElementById("xpernerx").disabled = false;
					$("#xpernerx").select2("val", "");
					return false;
				}
			}

			var url = "<?php echo base_url(); ?>index.php/mapping/cek_perner_aktif";
			$.post(url, {
				data: value,
				trotresx: trotres
			}, function(response) {
				var res = response.split(",");
				// var abc = response.length;
				// if(abc==1){
				// $("#txt_alamat").val(res[0]);
				// }
				// else {
				// $("#txt_alamat").val(res[0]);
				// $("#pup").html(res[1]);
				// }
				//alert(response);

				if (res[0] == 'GAGAL') {
					alert('Data sudah pernah di input pada nojo ' + res[1] + ', dan belum di proses !!');
					document.getElementById("xpernerx").disabled = false;
					$("#xpernerx").select2("val", "");
					return false;
				} else if (res[0] == 'false') {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('index.php/mapping/detail_pernerx/'); ?>",
						dataType: "json",
						data: {
							anojo: value,
							tresi: trotres,
							pgantix: pganti
						},
						success: function(res) {
							document.getElementById("xpernerx").disabled = false;
							if (res.perrot.cname == null) {
								alert('Perner ' + value + ' tidak ditemukan/Perner ' + value + ' Sudah tidak aktif/Perner ' + value + ' belum di rotasi / mutasi');
								$("#xpernerx").select2("val", "");
								return false;
							}
							var tfgk = res.perrot.cname;
							var anjk = tfgk.replace(",", ".");
							$('#listperner> tbody:last-child').append('<tr><td class=ntres>' + tresign + '</td><td>' + talasan + '</td><td class=ntlatihan>' + tlatihan + '</td><td class=ntbekerja>' + tbekerja + '</td><td class=ntrrxy>' + ntypere + '</td><td class=ntrr>' + ntrotres + '</td><td class=npernergn>' + pganti + '</td><td class=nperner>' + res.perrot.PERNR + '</td><td class=nnama>' + anjk + '</td><td class=narea>' + res.perrot.btrtx + '</td><td class=npersa>' + res.perrot.wktxt + '</td><td class=nskill>' + res.perrot.pektx + '</td><td class=njabatan>' + res.perrot.platx + '</td><td class=nlevel>' + res.perrot.trfar_txt + '</td><td class=ktrep_train>' + vkumtraintx + '</td><td><button class="btn btn-box-tool btnDelete" onclick="hapuslist(this,' + value + ')"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>' + res.perrot.btrtl + '</td><td class=kpersa style=display:none>' + res.perrot.werks + '</td><td class=kskill style=display:none>' + res.perrot.persk + '</td><td class=klevel style=display:none>' + res.perrot.trfar + '</td><td class=kjabatan style=display:none>' + res.perrot.stell + '</td><td class=kabkrs style=display:none>' + res.perrot.abkrs + '</td><td class=kansvh style=display:none>' + res.perrot.ansvh + '</td><td class=nalasan style=display:none>' + alasan + '</td><td class=kkrep_train style=display:none>' + vkumtrainx + '</td><td class=krr style=display:none>' + trotres + '</td><td class=mntrrxy style=display:none>' + typere + '</td><td class=kcttyp style=display:none>' + res.perrot.cttyp + '</td><td class=ktrfgb style=display:none>' + res.perrot.trfgb + '</td><td class=kmassn style=display:none>' + res.perrot.massn + '</td></tr>');

							if (typere == '3') {
								$('#listpernerganti> tbody:last-child').append('<tr id=' + value + '><td class=npernergx>' + value + '</td><td>' + talasan_ganti + '</td><td class=npernergy>' + pganti + '</td><td class=nnamagy>' + res.pergan.cname + '</td><td class=nareagy>' + res.pergan.btrtx + '</td><td class=npersagy>' + res.pergan.wktxt + '</td><td class=nskillgy>' + res.pergan.pektx + '</td><td class=njabatangy>' + res.pergan.platx + '</td><td class=nlevelgy>' + res.pergan.trfar_txt + '</td><td class=kareagy style=display:none>' + res.pergan.btrtl + '</td><td class=kpersagy style=display:none>' + res.pergan.werks + '</td><td class=kskillgy style=display:none>' + res.pergan.persk + '</td><td class=klevelgy style=display:none>' + res.pergan.trfar + '</td><td class=kgalasan style=display:none>' + alasan_ganti + '</td><td class=kgcttyp style=display:none>' + res.pergan.cttyp + '</td><td class=kgansvh style=display:none>' + res.pergan.ansvh + '</td><td class=kgtrfgb style=display:none>' + res.pergan.trfgb + '</td><td class=kgarber style=display:none>' + res.pergan.arber + '</td></tr>');
							}

							$("#resign").val("");
							$("#latihan").val("");
							$("#bekerja").val("");
							$("#ypernery").select2("val", "");
							$("#xpernerx").select2("val", "");
						}
					})
				} else {
					//alert('Data belum diresignkan !!');
					//return false;
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('index.php/mapping/detail_pernerx/'); ?>",
						dataType: "json",
						data: {
							anojo: value,
							tresi: trotres,
							pgantix: pganti
						},
						success: function(res) {
							document.getElementById("xpernerx").disabled = false;
							if (res.perrot.cname == null) {
								alert('Perner ' + value + ' tidak ditemukan/Perner ' + value + ' Sudah tidak aktif/Perner ' + value + ' belum di rotasi / mutasi');
								$("#xpernerx").select2("val", "");
								return false;
							}
							var tfgk = res.perrot.cname;
							var anjk = tfgk.replace(",", ".");
							// $('#listperner> tbody:last-child').append('<tr><td class=ntres>'+tresign+'</td><td class=nperner>'+res.PERNR+'</td><td class=nnama>'+anjk+'</td><td class=narea>'+res.btrtx+'</td><td class=npersa>'+res.wktxt+'</td><td class=nskill>'+res.pektx+'</td><td class=njabatan>'+res.platx+'</td>'+'</td><td class=nlevel>'+res.trfar+'</td><td class=ktrep_train>'+vkumtraintx+'</td><td><button class="btn btn-box-tool btnDelete"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>'+res.btrtl+'</td><td class=kpersa style=display:none>'+res.werks+'</td><td class=kskill style=display:none>'+res.persk+'</td><td class=klevel style=display:none>'+res.persk+'</td><td class=kkrep_train style=display:none>'+vkumtrainx+'</td></tr>');
							$('#listperner> tbody:last-child').append('<tr><td class=ntres>' + tresign + '</td><td>' + talasan + '</td><td class=ntlatihan>' + tlatihan + '</td><td class=ntbekerja>' + tbekerja + '</td><td class=ntrrxy>' + ntypere + '</td><td class=ntrr>' + ntrotres + '</td><td class=npernergn>' + pganti + '</td><td class=nperner>' + res.perrot.PERNR + '</td><td class=nnama>' + anjk + '</td><td class=narea>' + res.perrot.btrtx + '</td><td class=npersa>' + res.perrot.wktxt + '</td><td class=nskill>' + res.perrot.pektx + '</td><td class=njabatan>' + res.perrot.platx + '</td><td class=nlevel>' + res.perrot.trfar_txt + '</td><td class=ktrep_train>' + vkumtraintx + '</td><td><button class="btn btn-box-tool btnDelete" onclick="hapuslist(this,' + value + ')"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>' + res.perrot.btrtl + '</td><td class=kpersa style=display:none>' + res.perrot.werks + '</td><td class=kskill style=display:none>' + res.perrot.persk + '</td><td class=klevel style=display:none>' + res.perrot.trfar + '</td><td class=kjabatan style=display:none>' + res.perrot.stell + '</td><td class=kabkrs style=display:none>' + res.perrot.abkrs + '</td><td class=kansvh style=display:none>' + res.perrot.ansvh + '</td><td class=nalasan style=display:none>' + alasan + '</td><td class=kkrep_train style=display:none>' + vkumtrainx + '</td><td class=krr style=display:none>' + trotres + '</td><td class=mntrrxy style=display:none>' + typere + '</td><td class=kcttyp style=display:none>' + res.perrot.cttyp + '</td><td class=ktrfgb style=display:none>' + res.perrot.trfgb + '</td><td class=kmassn style=display:none>' + res.perrot.massn + '</td></tr>');

							if (typere == '3') {
								$('#listpernerganti> tbody:last-child').append('<tr id=' + value + '><td class=npernergx>' + value + '</td><td>' + talasan_ganti + '</td><td class=npernergy>' + pganti + '</td><td class=nnamagy>' + res.pergan.cname + '</td><td class=nareagy>' + res.pergan.btrtx + '</td><td class=npersagy>' + res.pergan.wktxt + '</td><td class=nskillgy>' + res.pergan.pektx + '</td><td class=njabatangy>' + res.pergan.platx + '</td><td class=nlevelgy>' + res.pergan.trfar_txt + '</td><td class=kareagy style=display:none>' + res.pergan.btrtl + '</td><td class=kpersagy style=display:none>' + res.pergan.werks + '</td><td class=kskillgy style=display:none>' + res.pergan.persk + '</td><td class=klevelgy style=display:none>' + res.pergan.trfar + '</td><td class=kgalasan style=display:none>' + alasan_ganti + '</td><td class=kgcttyp style=display:none>' + res.pergan.cttyp + '</td><td class=kgansvh style=display:none>' + res.pergan.ansvh + '</td><td class=kgtrfgb style=display:none>' + res.pergan.trfgb + '</td><td class=kgarber style=display:none>' + res.pergan.arber + '</td></tr>');
							}

							$("#resign").val("");
							$("#latihan").val("");
							$("#bekerja").val("");
							$("#ypernery").select2("val", "");
							$("#xpernerx").select2("val", "");
						}
					})
				}
			})
			// } else {
			// return false;
			// }		
		});

		$("#listperner").on('click', '.btnDelete', function() {
			$(this).closest('tr').remove();
		});



		$("#xpernerxy").change(function() {
			var value = $("#xpernerx").select2('data')[0]['id'];
			var text = $("#xpernerx").select2('data')[0]['text'];
			document.getElementById("xpernerx").disabled = true;
			// if(typeof elem !== 'undefined' && elem !== null) {
			// document.getElementById(elmId).innerHTML = value;
			// }
			var tresign = $("#resign").val();
			document.getElementById("xpernerx").disabled = true;

			if (tresign == '') {
				alert('Setiap Value Harus Diisi, Mohon di Cek Kembali.');
				document.getElementById("xpernerx").disabled = false;
				$("#xpernerx").val('');
				return false;
			}

			var url = "<?php echo base_url(); ?>index.php/mapping/cek_perner_aktif";
			$.post(url, {
				data: value
			}, function(response) {
				if (response == 'false') {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('index.php/mapping/detail_perner/'); ?>",
						dataType: "json",
						data: {
							anojo: value
						},
						success: function(res) {
							//document.getElementById("xpernerx").disabled = false;
							//$('#listperner> tbody:last-child').append('<tr><td class=nperner>'+res.PERNR+'</td><td class=nnama>'+res.cname+'</td><td class=narea>'+res.btrtx+'</td><td class=npersa>'+res.wktxt+'</td><td class=nskill>'+res.pektx+'</td><td class=njabatan>'+res.platx+'</td>'+'</td><td class=nlevel>'+res.pektx+'</td><td class=karea style=display:none>'+res.btrtl+'</td><td class=kpersa style=display:none>'+res.werks+'</td><td class=kskill style=display:none>'+res.persk+'</td><td class=klevel style=display:none>'+res.persk+'</td></tr>');	
							document.getElementById("xpernerx").disabled = false;
							$('#listperner> tbody:last-child').append('<tr><td class=ntres>' + tresign + '</td><td class=nperner>' + res.PERNR + '</td><td class=nnama>' + res.cname + '</td><td class=narea>' + res.btrtx + '</td><td class=npersa>' + res.wktxt + '</td><td class=nskill>' + res.pektx + '</td><td class=njabatan>' + res.platx + '</td>' + '</td><td class=nlevel>' + res.trfar + '</td><td><button class="btn btn-box-tool btnDelete"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>' + res.btrtl + '</td><td class=kpersa style=display:none>' + res.werks + '</td><td class=kskill style=display:none>' + res.persk + '</td><td class=klevel style=display:none>' + res.persk + '</td></tr>');
						}
					})
				} else {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('index.php/mapping/detail_perner/'); ?>",
						dataType: "json",
						data: {
							anojo: value
						},
						success: function(res) {
							document.getElementById("xpernerx").disabled = false;
							$('#listperner> tbody:last-child').append('<tr><td class=ntres>' + tresign + '</td><td class=nperner>' + res.PERNR + '</td><td class=nnama>' + res.cname + '</td><td class=narea>' + res.btrtx + '</td><td class=npersa>' + res.wktxt + '</td><td class=nskill>' + res.pektx + '</td><td class=njabatan>' + res.platx + '</td>' + '</td><td class=nlevel>' + res.trfar + '</td><td><button class="btn btn-box-tool btnDelete"><i class="glyphicon glyphicon-trash"></i></button></td><td class=karea style=display:none>' + res.btrtl + '</td><td class=kpersa style=display:none>' + res.werks + '</td><td class=kskill style=display:none>' + res.persk + '</td><td class=klevel style=display:none>' + res.persk + '</td></tr>');
						}
					})
				}
			})
		})

		/*
		$("#spa").change(function(){
			var group = $("#spa").select2('data')[0]['id'];
			var url = "<?php echo base_url(); ?>index.php/home/pilih_area";
			$.post(url, {data:group}, function(response){
				$("#sare").html(response);
			})
		});
		*/

		$("#listperner").on('click', '.btnDelete', function() {
			$(this).closest('tr').remove();
		});


		$("#periode").change(function() {
			var jper = $("#periode").val();
			if (jper == '1') {
				document.getElementById("tgl2").disabled = true;
				$("#tgl2").val('');
			} else {
				document.getElementById("tgl2").disabled = false;
			}
		});

		$("#choosen").click(function() {
			$("#choosen option:selected").remove();
		});


		$("#spa").change(function() {
			var value = $("#spa").select2('data')[0]['id'];
			var text = $("#spa").select2('data')[0]['text'];
			//alert (value + " - " + text);
			var x = document.getElementById("choosen");
			var optionVal = new Array();
			for (i = 0; i < x.length; i++) {
				optionVal.push(x.options[i].value);
			}

			if ((optionVal.includes(value)) == true) {
				alert("Anda sudah memilih " + text);
				return false;
			} else {
				$("#choosen").append($('<option>', {
					value: value,
					text: text
				}));
			}
		});


		$("#jskema").change(function() {
			var jskema = $("#jskema").val();
			var kontrak = $('#kontrak').val();
			var kump = $('#umpx').val();
			if (jskema == 1) {
				$('#allskema').show();
				$("#tkomp").find("tr:gt(1)").remove();
				$("#tkomp_var").find("tr:gt(1)").remove();
				$("#tkomp_ben").find("tr:gt(5)").remove();
				$("#valuex1").val('');
				$("#vvaluex1").val('');
				$("#bvaluex1").val('');
				$('#kompx1').val("").trigger('change');
				$('#vkompx1').val("").trigger('change');
				$('#bkompx1').val("").trigger('change');
				$("#vbtkp1").val('');
				$("#vbtkp2").val('');
				$("#vbtkp3").val('');
				$("#vbtkp4").val('');
				$("#ketx1").val('');
				$("#vketx1").val('');
				$("#bketx1").val('');

				$("input[name='cekbpjs_tk']").prop("checked", false);
				$("input[name='cekbpjs_kes']").prop("checked", false);

				if (kontrak != 1 && kontrak != 6) {
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					$("#jpbpjs").val('1');
				} else {
					$("#pbtkp1").val('9.24');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					$("#jpbpjs").val('1');

					var asu = (9.24 / 100) * kump;
					var asus = Math.round(asu);
					$('#vbtkp1').val(asus);
					$('#vbtkp2').val(0);

					var asa = (5 / 100) * kump;
					var asas = Math.round(asa);
					$('#vbtkp3').val(asas);
					$('#vbtkp4').val(0);
				}
			} else {
				$('#allskema').hide();
				// $("#tkomp").find("tr:gt(0)").remove();
				// $("#tkomp_var").find("tr:gt(0)").remove();
				// $("#tkomp_ben").find("tr:gt(0)").remove();
			}

		});


		$("#jpbpjs").change(function() {
			var jpbpjs = $("#jpbpjs").val();
			var kodekont = $("#kodekont").val();
			var arr = document.getElementsByName('valuex');
			var kump = document.getElementById("umpx").value;

			var tot = 0;
			for (var i = 0; i < arr.length; i++) {
				if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}

			var aaa = $("input[name='cekbpjs_tk']:checked");
			var jml_tk = 0;
			var bbb;
			for (var i = 0; i < aaa.length; i++) {
				bbb = document.getElementById(aaa[i].value).value;
				bbb = bbb.replaceAll('.', '');
				bbb = bbb.replaceAll(',', '');
				jml_tk = jml_tk + parseInt(bbb);
			}


			var ddd = $("input[name='cekbpjs_kes']:checked");
			var jml_kes = 0;
			var eee;
			for (var i = 0; i < ddd.length; i++) {
				eee = document.getElementById(ddd[i].value).value;
				eee = eee.replaceAll('.', '');
				eee = eee.replaceAll(',', '');
				jml_kes = jml_kes + parseInt(eee);
			}

			var jmltot_tk = tot + jml_tk;
			var jmltot_kes = tot + jml_kes;

			if (jmltot_tk < kump) {
				if (jmltot_kes < kump) {
					alert('Pengkali BPJS TK dan BPJS Kes akan menggunakan UMK karena total pengkali BPJS TK dan Kes masih lebih kecil dari UMK, TerimaKasih');
				} else {
					alert('Pengkali BPJS TK akan menggunakan UMK karena total pengkali BPJS TK masih lebih kecil dari UMK, TerimaKasih');
				}
				var tot_tk = kump;
				var tot_kes = kump;
			} else {
				var tot_tk = jmltot_tk;
				var tot_kes = jmltot_kes;
			}

			if (kodekont == 1 || kodekont == 6) {
				if (jpbpjs == 1) {
					$("#pbtkp1").val('9.24');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 9.24;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 5;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				} else if (jpbpjs == 2) {
					$("#pbtkp1").val('9.54');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 9.54;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 5;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				} else if (jpbpjs == 3) {
					$("#pbtkp1").val('9.89');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 9.89;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 5;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				} else if (jpbpjs == 4) {
					$("#pbtkp1").val('10.27');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 10.27;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 5;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				} else if (jpbpjs == 5) {
					$("#pbtkp1").val('10.74');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('5');
					$("#pbtkp4").val('0');
					var pbtkp = 10.74;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 5;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}

				$("#vbtkp2").val('0');
				$("#vbtkp4").val('0');
			} else {
				if (jpbpjs == 1) {
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 0;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				} else if (jpbpjs == 2) {
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 0;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				} else if (jpbpjs == 3) {
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 0;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				} else if (jpbpjs == 4) {
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 0;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				} else if (jpbpjs == 5) {
					$("#pbtkp1").val('0');
					$("#pbtkp2").val('0');
					$("#pbtkp3").val('0');
					$("#pbtkp4").val('0');
					var pbtkp = 0;
					var ghj = (pbtkp / 100) * tot_tk;
					var yaya = Math.round(ghj);
					$("#vbtkp1").val(yaya);

					var pbtkp3 = 0;
					var ghj3 = (pbtkp3 / 100) * tot_kes;
					var yaya3 = Math.round(ghj3);
					$("#vbtkp3").val(yaya3);
				}

				$("#vbtkp2").val('0');
				$("#vbtkp4").val('0');
			}
		});


		$("#pbtkp1").change(function() {
			var jpbpjs = $("#jpbpjs").val();
			var kodekont = $("#kodekont").val();
			var arr = document.getElementsByName('valuex');
			var kump = document.getElementById("umpx").value;

			var tot = 0;
			for (var i = 0; i < arr.length; i++) {
				if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}

			var aaa = $("input[name='cekbpjs_tk']:checked");
			var jml = 0;
			var bbb;
			for (var i = 0; i < aaa.length; i++) {
				bbb = document.getElementById(aaa[i].value).value;
				bbb = bbb.replaceAll('.', '');
				bbb = bbb.replaceAll(',', '');
				jml = jml + parseInt(bbb);
			}

			var jmltot_tk = tot + jml;

			if (jmltot_tk < kump) {
				alert('Pengkali BPJS TK akan menggunakan UMK karena total pengkali BPJS TK masih lebih kecil dari UMK, TerimaKasih');
				var tot = kump;
			} else {
				var tot = jmltot_tk;
			}

			if (kodekont == 1 || kodekont == 6) {
				if (jpbpjs == 1) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 9.24 - parseFloat(pbtkp);
					var yay = 9.24 - parseFloat(pbtkk);
					if (pbtkp > 9.24) {
						alert('Tidak Boleh Lebih Dari 9.24');
						$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				} else if (jpbpjs == 2) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 9.54 - parseFloat(pbtkp);
					var yay = 9.54 - parseFloat(pbtkk);
					if (pbtkp > 9.54) {
						alert('Tidak Boleh Lebih Dari 9.54');
						$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				} else if (jpbpjs == 3) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 9.89 - parseFloat(pbtkp);
					var yay = 9.89 - parseFloat(pbtkk);
					if (pbtkp > 9.89) {
						alert('Tidak Boleh Lebih Dari 9.89');
						$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				} else if (jpbpjs == 4) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 10.27 - parseFloat(pbtkp);
					var yay = 10.27 - parseFloat(pbtkk);
					if (pbtkp > 10.27) {
						alert('Tidak Boleh Lebih Dari 10.27');
						$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				} else if (jpbpjs == 5) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 10.74 - parseFloat(pbtkp);
					var yay = 10.74 - parseFloat(pbtkk);
					console.log(pbtkp);
					console.log(yay);
					console.log(pbtkk);
					if (pbtkp > 10.74) {
						alert('Tidak Boleh Lebih Dari 10.74');
						$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
						var klm = (def / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp2").val(yoyo);
						$("#pbtkp2").val(def);
					}
				}
			} else {
				if (jpbpjs == 1) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					var jmlpbtk = parseFloat(pbtkp) + parseFloat(pbtkk);

					if (jmlpbtk > 9.24) {
						alert('BPJS TK Tidak Boleh Lebih Dari 9.24');
						$("#pbtkp1").val('0');
						$("#vbtkp1").val('0');
						return false;
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				} else if (jpbpjs == 2) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					if (pbtkp > 9.54) {
						alert('Tidak Boleh Lebih Dari 9.54');
						return false;
						//$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				} else if (jpbpjs == 3) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					if (pbtkp > 9.89) {
						alert('Tidak Boleh Lebih Dari 9.89');
						return false;
						//$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				} else if (jpbpjs == 4) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					if (pbtkp > 10.27) {
						alert('Tidak Boleh Lebih Dari 10.27');
						return false;
						//$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				} else if (jpbpjs == 5) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					if (pbtkp > 10.74) {
						alert('Tidak Boleh Lebih Dari 10.74');
						return false;
						//$("#pbtkp1").val(yay);
					} else {
						var ghj = (pbtkp / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp1").val(yaya);
					}
				}
			}
		});


		$("#pbtkp2").change(function() {
			var arr = document.getElementsByName('valuex');
			var kump = document.getElementById("umpx").value;
			var jpbpjs = $("#jpbpjs").val();
			var kodekont = $("#kodekont").val();

			var tot = 0;
			for (var i = 0; i < arr.length; i++) {
				if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}

			var aaa = $("input[name='cekbpjs_tk']:checked");
			var jml = 0;
			var bbb;
			for (var i = 0; i < aaa.length; i++) {
				bbb = document.getElementById(aaa[i].value).value;
				bbb = bbb.replaceAll('.', '');
				bbb = bbb.replaceAll(',', '');
				jml = jml + parseInt(bbb);
			}

			var jmltot_tk = tot + jml;

			if (jmltot_tk < kump) {
				alert('Pengkali BPJS TK akan menggunakan UMK karena total pengkali BPJS TK masih lebih kecil dari UMK, TerimaKasih');
				var tot = kump;
			} else {
				var tot = jmltot_tk;
			}

			if (kodekont == 1 || kodekont == 6) {
				if (jpbpjs == 1) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 9.24 - parseFloat(pbtkp);
					var yay = 9.24 - parseFloat(pbtkk);
					if (pbtkk > 9.24) {
						alert('Tidak Boleh Lebih Dari 9.24');
						$("#pbtkp2").val(def);
					} else {
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				} else if (jpbpjs == 2) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 9.54 - parseFloat(pbtkp);
					var yay = parseFloat(9.54 - pbtkk).toFixed(2);
					if (pbtkk > 9.54) {
						alert('Tidak Boleh Lebih Dari 9.54');
						$("#pbtkp2").val(def);
					} else {
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				} else if (jpbpjs == 3) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 9.89 - parseFloat(pbtkp);
					var yay = parseFloat(9.89 - pbtkk).toFixed(2);
					if (pbtkk > 9.89) {
						alert('Tidak Boleh Lebih Dari 9.89');
						$("#pbtkp2").val(def);
					} else {
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				} else if (jpbpjs == 4) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 10.27 - parseFloat(pbtkp);
					var yay = 10.27 - parseFloat(pbtkk);
					if (pbtkk > 10.27) {
						alert('Tidak Boleh Lebih Dari 10.27');
						$("#pbtkp2").val(def);
					} else {
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				} else if (jpbpjs == 5) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					var def = 10.74 - parseFloat(pbtkp);
					var yay = 10.74 - parseFloat(pbtkk);
					if (pbtkk > 10.74) {
						alert('Tidak Boleh Lebih Dari 10.74');
						$("#pbtkp2").val(def);
					} else {
						console.log(pbtkk);
						console.log(yay);
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
						var klm = (yay / 100) * tot;
						var yoyo = Math.round(klm);
						$("#vbtkp1").val(yoyo);
						$("#pbtkp1").val(yay);
					}
				}
			} else {
				if (jpbpjs == 1) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();
					var jmlpbtk = parseFloat(pbtkp) + parseFloat(pbtkk);

					if (jmlpbtk > 9.24) {
						alert('Tidak Boleh Lebih Dari 9.24');
						$("#pbtkp2").val('0');
						$("#vbtkp2").val('0');
						return false;
					} else {
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				} else if (jpbpjs == 2) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					if (pbtkk > 9.54) {
						alert('Tidak Boleh Lebih Dari 9.54');
						return false;
						//$("#pbtkp2").val(def);
					} else {
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				} else if (jpbpjs == 3) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					if (pbtkk > 9.89) {
						alert('Tidak Boleh Lebih Dari 9.89');
						return false;
					} else {
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				} else if (jpbpjs == 4) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					if (pbtkk > 10.27) {
						alert('Tidak Boleh Lebih Dari 10.27');
						return false;
					} else {
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				} else if (jpbpjs == 5) {
					var pbtkp = $("#pbtkp1").val();
					var pbtkk = $("#pbtkp2").val();

					if (pbtkk > 10.74) {
						alert('Tidak Boleh Lebih Dari 10.74');
						return false;
					} else {
						console.log(pbtkk);
						console.log(yay);
						var ghj = (pbtkk / 100) * tot;
						var yaya = Math.round(ghj);
						$("#vbtkp2").val(yaya);
					}
				}
			}
		});



		$("#pbtkp3").change(function() {
			var pbkp = $("#pbtkp3").val();
			var pbkk = $("#pbtkp4").val();
			var kodekont = $("#kodekont").val();
			var jmlpbtk = parseFloat(pbkp) + parseFloat(pbkk);

			var arr = document.getElementsByName('valuex');
			var kump = document.getElementById("umpx").value;

			var tot = 0;
			for (var i = 0; i < arr.length; i++) {
				if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}

			var aaa = $("input[name='cekbpjs_kes']:checked");
			var jml = 0;
			var bbb;
			for (var i = 0; i < aaa.length; i++) {
				bbb = document.getElementById(aaa[i].value).value;
				bbb = bbb.replaceAll('.', '');
				bbb = bbb.replaceAll(',', '');
				jml = jml + parseInt(bbb);
			}

			var jmltot_kes = tot + jml;

			if (jmltot_kes < kump) {
				alert('Pengkali BPJS Kes akan menggunakan UMK karena total pengkali BPJS Kes masih lebih kecil dari UMK, TerimaKasih');
				var tot = kump;
			} else {
				var tot = jmltot_kes;
			}

			if (kodekont == 1 || kodekont == 6) {
				var def = 5 - parseFloat(pbkp);
				var yay = 5 - parseFloat(pbkk);
				if (pbkp > '5') {
					alert('Tidak Boleh Lebih Dari 5');
					$("#pbtkp3").val(yay);
				} else {
					var ghj = (pbkp / 100) * tot;
					var yaya = Math.round(ghj);
					$("#vbtkp3").val(yaya);
					var klm = (def / 100) * tot;
					var yoyo = Math.round(klm);
					$("#vbtkp4").val(yoyo);
					$("#pbtkp4").val(def);
				}
			} else {
				//var def   = 5 - parseFloat(pbkp);
				//var yay   = 5 - parseFloat(pbkk);
				// if(pbkp > '5'){
				if (jmlpbtk > '5') {
					alert('Tidak Boleh Lebih Dari 5');
					$("#pbtkp3").val('0');
					$("#vbtkp3").val('0');
					return false;
				} else {
					var ghj = (pbkp / 100) * tot;
					var yaya = Math.round(ghj);
					$("#vbtkp3").val(yaya);
				}
			}
		});


		$("#pbtkp4").change(function() {
			var pbkp = $("#pbtkp3").val();
			var pbkk = $("#pbtkp4").val();
			var kodekont = $("#kodekont").val();
			var jmlpbtk = parseFloat(pbkp) + parseFloat(pbkk);

			var arr = document.getElementsByName('valuex');
			var kump = document.getElementById("umpx").value;

			var tot = 0;
			for (var i = 0; i < arr.length; i++) {
				if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}

			var aaa = $("input[name='cekbpjs_kes']:checked");
			var jml = 0;
			var bbb;
			for (var i = 0; i < aaa.length; i++) {
				bbb = document.getElementById(aaa[i].value).value;
				bbb = bbb.replaceAll('.', '');
				bbb = bbb.replaceAll(',', '');
				jml = jml + parseInt(bbb);
			}

			var jmltot_kes = tot + jml;

			if (jmltot_kes < kump) {
				alert('Pengkali BPJS Kes akan menggunakan UMK karena total pengkali BPJS Kes masih lebih kecil dari UMK, TerimaKasih');
				var tot = kump;
			} else {
				var tot = jmltot_kes;
			}

			if (kodekont == 1 || kodekont == 6) {
				var def = 5 - parseFloat(pbkp);
				var yay = 5 - parseFloat(pbkk);
				if (pbkk > '5') {
					alert('Tidak Boleh Lebih Dari 5');
					$("#pbtkp4").val(def);
				} else {
					var ghj = (pbkk / 100) * tot;
					var yaya = Math.round(ghj);
					$("#vbtkp4").val(yaya);
					var klm = (yay / 100) * tot;
					var yoyo = Math.round(klm);
					$("#vbtkp3").val(yoyo);
					$("#pbtkp3").val(yay);
				}
			} else {
				//var def   = 5 - parseFloat(pbkp);
				//var yay   = 5 - parseFloat(pbkk);
				// if(pbkk > '5'){
				if (jmlpbtk > '5') {
					alert('Tidak Boleh Lebih Dari 5');
					$("#pbtkp4").val('0');
					$("#vbtkp4").val('0');
					return false;
				} else {
					var ghj = (pbkk / 100) * tot;
					var yaya = Math.round(ghj);
					$("#vbtkp4").val(yaya);
				}
			}

		});




		$("#typenew").change(function() {
			var tnew = $("#typenew").val();
			if (tnew == '1') {
				//$('#divnrespax').hide();
				$('#divnrespa').hide();
				//$('#divnprojectx').show();
				$('#divnproject').hide();
				$('#divpropinsi').show();
			} else {
				//$('#divnrespax').show();
				$('#divnrespa').hide();
				//$('#divnprojectx').hide();
				$('#divnproject').hide();
				$('#divpropinsi').hide();
			}

		});


		$('#addproc').click(function() {
			var item = $('#item :selected').text();
			var itemz = $('#item').val();
			var qty = $('#qty').val();
			var spec = $('#spec').val();
			var budget = $('#budget').val();
			var periode = $('#periode').val();
			var tgl1 = $('#tgl1').val();
			var tgl2 = $('#tgl2').val();

			if (itemz == "") {
				alert('Item tidak boleh kosong');
				$('#divitem').attr('class', 'form-group has-error');
				return false;
			} else if (itemz != "") {
				$('#divitem').attr('class', 'form-group')
			}

			if (qty == "") {
				alert('qty tidak boleh kosong');
				$('#divqty').attr('class', 'form-group has-error');
				return false;
			} else if (qty != "") {
				$('#divqty').attr('class', 'form-group')
			}

			if (spec == "") {
				alert('Spec tidak boleh kosong');
				$('#divspec').attr('class', 'form-group has-error');
				return false;
			} else if (spec != "") {
				$('#divspec').attr('class', 'form-group')
			}

			if (budget == "") {
				alert('Budget tidak boleh kosong');
				$('#divbudget').attr('class', 'form-group has-error');
				return false;
			} else if (budget != "") {
				$('#divbudget').attr('class', 'form-group')
			}


			//$('#listproc > tbody:last-child').append('<tr><td class=litem>'+ item +'</td><td class=lqty>'+ qty +'</td><td class=lspec>'+ spec +'</td><td class=lbudget>'+ budget +'</td><td><button type=button class="btn btn-primary btn-block btn-xs btnedit_proc" data-toggle=modal data-target=#EPRmyModal>Edit</button></td><td class=litemz style=display:none>'+ itemz +'</td></tr>');

			$('#listproc > tbody:last-child').append('<tr><td class=lperiode>' + periode + '</td><td class=litem>' + item + '</td><td class=lqty>' + qty + '</td><td class=lspec>' + spec + '</td><td class=lbudget>' + budget + '</td><td class=ltgl1>' + tgl1 + '</td><td class=ltgl2>' + tgl2 + '</td><td>-</td><td class=litemz style=display:none>' + itemz + '</td></tr>');

			$(".btnedit_proc").click(function() {
				btn = $(this).html();
				var $row = $(this).closest("tr");
				var litemz = $row.find(".litemz").text();
				var litem = $row.find(".litem").text();
				var lqty = $row.find(".lqty").text();
				var lspec = $row.find(".lspec").text();
				var lbudget = $row.find(".lbudget").text();

				$("#eitem").val(litemz);
				$("#eqty").val(lqty);
				$("#espec").val(lspec);
				$("#ebudget").val(lbudget);
			});

			$('#item').val('');
			$('#qty').val('');
			$('#spec').val('');
			$('#budget').val('');
		})


		$("#typejo").change(function() {
			var tejo = $("#typejo").val();
			if (tejo == '3') {
				$('#yeyey').show();
				$('#yuyuy').hide();
				$('#yayay').hide();
				$('#lalay').show();
			} else {
				if (tejo == '2') {
					$('#divtre').show();
					$('#divtnew').hide();
					$('#divpropinsi').hide();
					$('#divnproject').hide();
					$('#divnrespa').show();
					/*
					var lrincian=[];
					$('#listrincian tbody tr').each(function(){
						var ljabatan = $(this).find(".ljabatan").html('');
						var ljabatanz = $(this).find(".ljabatanz").html('');
						var lgender = $(this).find(".lgender").html('');
						var lpendidikan = $(this).find(".lpendidikan").html('');
						var llokasi = $(this).find(".llokasi").html('');
						var llokasiz = $(this).find(".llokasiz").html('');
						var lwaktu = $(this).find(".lwaktu").html('');
						var latasan = $(this).find(".latasan").html('');
						var lkontrak = $(this).find(".lkontrak").html('');
						var ljumlah = $(this).find(".ljumlah").html('');
					})
					*/
				} else if (tejo == '1') {
					$('#divtre').hide();
					$('#divtnew').show();
					$('#divpropinsi').show();
					$('#divnrespa').hide();
					$('#divnproject').show();

				} else {
					$('#divtre').hide();
					$('#divtnew').hide();
					$('#divpropinsi').hide();
					$('#divnproject').hide();
					$('#divnrespa').show();

				}
				$('#yeyey').hide();
				$('#yuyuy').show();
				$('#yayay').show();
				$('#lalay').hide();
			}
		});


		$("#addmore1").click(function() {
			$('#group_att2').show();
			$('#aww').hide();
			$('#awwx').hide();
		});


		$("#addmore3").click(function() {
			$('#group_att5').show();
			$('#akk').hide();
			$('#akkx').hide();
		});


		$('body').on('click', '#btn_simpan', function(e) {
			$('#overlay').show();
			$('#ggff').hide();
			var nojok = $('#nojok').val();
			var typere = $('#typere').val();
			//var type_jo 		= "New";
			var type_jo = $('#typejo').val();
			var tnew = $('#typenew').val();
			var tpeng = $('#typepeng').val();
			var tanggal = $('#tanggal').val();
			var jeniscapt = $('#jeniscapt').val();
			//var project			= $('#respa :selected').val();
			var krespa = $('#respa').val();
			var project = $('#project').val();
			var ncust_id = $('#ncust').val();
			var ncust_name = $('#ncust :selected').text();
			//alert(project);

			var respa = $('#respa :selected').text();
			var rincian = $('#rincian').val();
			var syarat = $('#syarat').val();
			var deskripsi = $('#deskripsi').val();
			var atasan = $('#atasan').val();
			var waktu = $('#waktu').val();
			var lama = $('#lama').val();
			var latihan = $('#latihan').val();
			var bekerja = $('#bekerja').val();
			var lokasi = $('#lokasi').val();
			var approv = $('#approv').val();
			var komponen1 = $('#komponen1').val();
			var komponen2 = $('#komponen2').val();
			var komponen3 = $('#komponen3').val();
			var jenisproject = $('#jenisproject').val();
			var tjo = $('#tjo').val();
			var xnobak = $('#nobak').val();
			var tperal = $('#tperal:checked').val();
			var sproject = $('#sproject').val();
			var eproject = $('#eproject').val();
			var nilpro = $('#nilpro').val();

			var doc_legalitas = $('#doc_legalitas').val();			

			// if (tjo == '2'){
			// if(typere == "" )
			// {
			// alert('Type Replacement tidak boleh kosong');
			// $('#overlay').hide();
			// $('#ggff').show();
			// $('#divtre').attr('class','form-group has-error'); return false;} else if (typere != ""){$('#divtre').attr('class','form-group')
			// }
			// }

			if (tanggal == "") {
				alert('Tanggal tidak boleh kosong');
				$('#overlay').hide();
				$('#ggff').show();
				$('#divtanggal').attr('class', 'form-group has-error');
				return false;
			} else if (tanggal != "") {
				$('#divtanggal').attr('class', 'form-group')
			}

			if (jenisproject == "") {
				alert('Jenis Project tidak boleh kosong');
				$('#overlay').hide();
				$('#ggff').show();
				$('#divproject').attr('class', 'form-group has-error');
				return false;
			} else if (jenisproject != "") {
				$('#divproject').attr('class', 'form-group')

			}

			if (xnobak == "") {
				alert('No BAK tidak boleh kosong');
				$('#overlay').hide();
				$('#ggff').show();
				$('#divnobak').attr('class', 'form-group has-error');
				return false;
			} else if (xnobak != "") {
				$('#divnobak').attr('class', 'form-group')
			}

			if (tjo == '1') {
				if (syarat == "") {
					alert('Persyaratan khusus tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divsyarat').attr('class', 'form-group has-error');
					return false;
				} else if (syarat != "") {
					$('#divsyarat').attr('class', 'form-group')
				}

				if (deskripsi == "") {
					alert('Deskripsi tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divdeskripsi').attr('class', 'form-group has-error');
					return false;
				} else if (deskripsi != "") {
					$('#divdeskripsi').attr('class', 'form-group')
				}

				if (sproject == "") {
					alert('Start Project tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divspro').attr('class', 'form-group has-error');
					return false;
				} else if (sproject != "") {
					$('#divspro').attr('class', 'form-group')
				}

				if (eproject == "") {
					alert('End Project tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divepro').attr('class', 'form-group has-error');
					return false;
				} else if (eproject != "") {
					$('#divepro').attr('class', 'form-group')
				}

				if (nilpro == "") {
					alert('Nilai Project tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divnilpro').attr('class', 'form-group has-error');
					return false;
				} else if (nilpro != "") {
					$('#divnilpro').attr('class', 'form-group')
				}

				if (tnew == '1') {
					if (project == "") {
						alert('Nama Project tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divnproject').attr('class', 'form-group has-error');
						return false;
					} else if (project != "") {
						$('#divnproject').attr('class', 'form-group')
					}
				} else {
					if (respa == "") {
						alert('PersonalArea tidak boleh kosong');
						$('#overlay').hide();
						$('#ggff').show();
						$('#divnrespa').attr('class', 'form-group has-error');
						return false;
					} else if (respa != "") {
						$('#divnrespa').attr('class', 'form-group')
					}
				}
			}

			/*
			if(tjo == '4') {
				if (respa == "" )
				{
					alert('PersonalArea tidak boleh kosong');
					$('#overlay').hide();
					$('#ggff').show();
					$('#divnrespa').attr('class','form-group has-error'); return false;} else if (respa != ""){$('#divnrespa').attr('class','form-group')
				}
			}
			else if (tjo == '1')
			{
				if(tnew == '1')
				{
						if (project == "" )
						{
							alert('Nama Project tidak boleh kosong');
							$('#overlay').hide();
							$('#ggff').show();
							$('#divnproject').attr('class','form-group has-error'); return false;} else if (project != ""){$('#divnproject').attr('class','form-group')
						}
				}
				else
				{
						if (respa == "" )
						{
							alert('PersonalArea tidak boleh kosong');
							$('#overlay').hide();
							$('#ggff').show();
							$('#divnrespa').attr('class','form-group has-error'); return false;} else if (respa != ""){$('#divnrespa').attr('class','form-group')
						}
				}
			} 
			*/


			if (lama == "") {
				alert('Lama Project tidak boleh kosong');
				$('#overlay').hide();
				$('#ggff').show();
				$('#divlama').attr('class', 'form-group has-error');
				return false;
			} else if (lama != "") {
				$('#divlama').attr('class', 'form-group')
			}

			if (ncust_id == "") {
				alert('Nama Client harus dipilih');
				$('#overlay').hide();
				$('#ggff').show();
				$('#divnccust').attr('class', 'form-group has-error');
				return false;
			} else if (ncust_id != "") {
				$('#divnccust').attr('class', 'form-group')
			}

			if (jeniscapt == "") {
				alert('Jenis Captive harus dipilih');
				$('#overlay').hide();
				$('#ggff').show();
				$('#divcapt').attr('class', 'form-group has-error');
				return false;
			} else if (jeniscapt != "") {
				$('#divcapt').attr('class', 'form-group')
			}


			/*
				if (komponen1 == "" )
				{
					alert('Anda harus menyertakan dokumen skema');
					$('#overlay').hide();
					$('#ggff').show();
					$('#group_att3').attr('class','form-group has-error'); return false;} else if (komponen1 != ""){$('#group_att3').attr('class','form-group')
				}
			
				if (komponen2 == "" )
				{
					alert('Anda harus menyertakan dokumen bak');
					$('#overlay').hide();
					$('#ggff').show();
					$('#group_att4').attr('class','form-group has-error'); return false;} else if (komponen2 != ""){$('#group_att4').attr('class','form-group')
				}
				*/

			var lrincian = [];
			$('#listrincian tbody tr').each(function() {
				var n_ljabatan = $(this).find(".ljabatan").html();
				var ljabatan = $(this).find(".ljabatanz").html();
				var lgender = $(this).find(".lgender").html();
				var lpendidikan = $(this).find(".lpendidikan").html();
				var llokasi = $(this).find(".llokasiz").html();
				llokasi
				var n_llokasi = $(this).find(".llokasi").html();
				var lwaktu = $(this).find(".lwaktu").html();
				var latasan = $(this).find(".latasan").html();
				var lkontrak = $(this).find(".lkontrak").html();
				var ljumlah = $(this).find(".ljumlah").html();
				var lskema_text = $(this).find(".lskema_text").html();
				var lskema = $(this).find(".lskema").html();
				var lskillx_text = $(this).find(".lskillx_text").html();
				var lskillx = $(this).find(".lskillx").html();
				var kump = $(this).find(".kump").html();
				var tot = $(this).find(".tot").html();
				var kidx = '';
				var lktrain_text = $(this).find(".lktrain_text").html();
				var lktrain = $(this).find(".lktrain").html();
				var lktrain = $(this).find(".lktrain").html();
				var lpnorek = $(this).find(".lpnorek").html();
				var typeng = $(this).find(".typeng").html();
				var nbekerja = $(this).find(".nbekerja").html();
				var nlatihan = $(this).find(".nlatihan").html();
				var ljskema = $(this).find(".ljskema").html();
				var lreasonrot = $(this).find(".lreasonrot").html();
				var ldetkompo = $(this).find(".ldetkompo").html();
				var ljpkwt = $(this).find(".ljpkwt").html();
				lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskema_text, lskillx, lskillx_text, n_ljabatan, n_llokasi, kump, tot, kidx, lktrain, nlatihan, nbekerja, typeng, lpnorek, ljskema, lreasonrot, ldetkompo, ljpkwt];
				//lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskillx];
				lrincian += ',';
			})

			// alert(lrincian);
			/*
			var lkomponen=[];
			$('#listkomponen tbody tr').each(function(){
				var kjabatan = $(this).find(".kjabatan").html();
				var kkodejab = $(this).find(".kkodejab").html();
				var klokasi = $(this).find(".klokasi").html();
				var kkodelok = $(this).find(".kkodelok").html();
				var kkomponen = $(this).find(".kkomponen").html();
				var kkodekomponen = $(this).find(".kkodekomponen").html();
				var kvalue = $(this).find(".kvalue").html();
				var kket = $(this).find(".kket").html();
				//var klevel = $(this).find(".klevel").html();
				//var kkodelevel = $(this).find(".kkodelevel").html();
				var khk = $(this).find(".khk").html();
				var kump = $(this).find(".kump").html();
				var kper = $(this).find(".kper").html();
				var kkar = $(this).find(".kkar").html();
				var jkk = $(this).find(".jkk").html();
				var jkm = $(this).find(".jkm").html();
				var jhtp = $(this).find(".jhtp").html();
				var jhtk = $(this).find(".jhtk").html();
				//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
				lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, khk, kump, kper, kkar, jkk, jkm, jhtp, jhtk];
				lkomponen += ',';
			});	
			*/

			var lkomponen = [];
			$('#listkomponen tbody tr').each(function() {
				var kjabatan = $(this).find(".kjabatan").html();
				var kkodejab = $(this).find(".kkodejab").html();
				var klokasi = $(this).find(".klokasi").html();
				var kkodelok = $(this).find(".kkodelok").html();
				var kkomponen = $(this).find(".kkomponen").html();
				var kkodekomponen = $(this).find(".kkodekomponen").html();
				var kvalue = $(this).find(".kvalue").html();
				var kket = $(this).find(".kket").html();
				//var klevel = $(this).find(".klevel").html();
				//var kkodelevel = $(this).find(".kkodelevel").html();
				var khk = $(this).find(".khk").html();
				var kump = $(this).find(".kump").html();
				var kper = $(this).find(".kper").html();
				var lskema_text = $(this).find(".lskema_text").html();
				var lskema = $(this).find(".lskema").html();
				var lskillx_text = $(this).find(".lskillx_text").html();
				var lskillx = $(this).find(".lskillx").html();
				var detkompo = $(this).find(".detkompo").html();
				var kpengtk = $(this).find(".kpengtk").html();
				var kpengkes = $(this).find(".kpengkes").html();
				//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
				lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, khk, kump, kper, lskema, lskema_text, lskillx, lskillx_text, detkompo, kpengtk, kpengkes];
				lkomponen += ',';
			});
			/*
			var lperner=[];
			$('#listperner tbody tr').each(function(){
				var ntres = $(this).find(".ntres").html();
				var nperner = $(this).find(".nperner").html();
				var nnama = $(this).find(".nnama").html();
				var narea = $(this).find(".narea").html();
				var npersa = $(this).find(".npersa").html();
				var nskill = $(this).find(".nskill").html();
				var njabatan = $(this).find(".njabatan").html();
				var nlevel = $(this).find(".nlevel").html();
				var karea = $(this).find(".karea").html();
				var kpersa = $(this).find(".kpersa").html();
				var kskill = $(this).find(".kskill").html();
				var klevel = $(this).find(".klevel").html();
				lperner += [nperner, nnama, narea, npersa, nskill, njabatan, nlevel, karea, kpersa, kskill, klevel, ntres];
				lperner += ',';
			});
			*/

			var lperner = [];
			$('#listperner tbody tr').each(function() {
				var ntres = $(this).find(".ntres").html();
				var ntrr = $(this).find(".ntrr").html();
				var nperner = $(this).find(".nperner").html();
				var nnama = $(this).find(".nnama").html();
				var nnamax = nnama.replace(',', '.');
				var narea = $(this).find(".narea").html();
				var npersa = $(this).find(".npersa").html();
				var nskill = $(this).find(".nskill").html();
				var njabatan = $(this).find(".njabatan").html();
				var kjabatan = $(this).find(".kjabatan").html();
				var nlevel = $(this).find(".nlevel").html();
				var karea = $(this).find(".karea").html();
				var kpersa = $(this).find(".kpersa").html();
				var kskill = $(this).find(".kskill").html();
				var klevel = $(this).find(".klevel").html();
				var kkrep_train = $(this).find(".kkrep_train").html();
				var krr = $(this).find(".krr").html();
				var mntrrxy = $(this).find(".mntrrxy").html();
				var npernergn = $(this).find(".npernergn").html();
				var ntlatihan = $(this).find(".ntlatihan").html();
				var ntbekerja = $(this).find(".ntbekerja").html();
				var kabkrs = $(this).find(".kabkrs").html();
				var nalasan = $(this).find(".nalasan").html();
				var kansvh = $(this).find(".kansvh").html();
				var kcttyp = $(this).find(".kcttyp").html();
				var ktrfgb = $(this).find(".ktrfgb").html();
				var kmassn = $(this).find(".kmassn").html();
				//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
				lperner += [nperner, nnamax, narea, npersa, nskill, njabatan, nlevel, karea, kpersa, kskill, klevel, ntres, kkrep_train, ntrr, krr, mntrrxy, npernergn, ntlatihan, ntbekerja, kjabatan, kabkrs, nalasan, kansvh, kcttyp, ktrfgb, kmassn];
				lperner += ',';
			});

			var lpernergan = [];
			$('#listpernerganti tbody tr').each(function() {
				var npernergx = $(this).find(".npernergx").html();
				var npernergy = $(this).find(".npernergy").html();
				var nnamagy = $(this).find(".nnamagy").html();
				var nnamagyx = nnamagy.replace(',', '.');
				var nareagy = $(this).find(".nareagy").html();
				var npersagy = $(this).find(".npersagy").html();
				var nskillgy = $(this).find(".nskillgy").html();
				var njabatangy = $(this).find(".njabatangy").html();
				var nlevelgy = $(this).find(".nlevelgy").html();
				var kareagy = $(this).find(".kareagy").html();
				var kpersagy = $(this).find(".kpersagy").html();
				var kskillgy = $(this).find(".kskillgy").html();
				var klevelgy = $(this).find(".klevelgy").html();
				var kgalasan = $(this).find(".kgalasan").html();
				var kgcttyp = $(this).find(".kgcttyp").html();
				var kgansvh = $(this).find(".kgansvh").html();
				var kgtrfgb = $(this).find(".kgtrfgb").html();
				var kgarber = $(this).find(".kgarber").html();
				lpernergan += [npernergx, npernergy, nnamagyx, nareagy, npersagy, nskillgy, njabatangy, nlevelgy, kareagy, kpersagy, kskillgy, klevelgy, kgalasan, kgcttyp, kgansvh, kgarber, kgtrfgb];
				lpernergan += ',';
			});

			/*
			var lproc=[];
			$('#listproc tbody tr').each(function(){
				var litem = $(this).find(".litem").html();
				var lqty = $(this).find(".lqty").html();
				var lspec = $(this).find(".lspec").html();
				var lbudget = $(this).find(".lbudget").html();
				var litemz = $(this).find(".litemz").html();
				//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
				lproc += [litem, lqty, lspec, lbudget, litemz];
				lproc += ',';
			});
			*/

			var lproc = [];
			$('#listproc tbody tr').each(function() {
				var litem = $(this).find(".litem").html();
				var lqty = $(this).find(".lqty").html();
				var lspec = $(this).find(".lspec").html();
				var lbudget = $(this).find(".lbudget").html();
				var litemz = $(this).find(".litemz").html();
				var lperiode = $(this).find(".lperiode").html();
				var ltgl1 = $(this).find(".ltgl1").html();
				var ltgl2 = $(this).find(".ltgl2").html();
				lproc += [litem, lqty, lspec, lbudget, litemz, lperiode, ltgl1, ltgl2];
				lproc += ',';
			});

			var vkumdoc = [];
			$('#kumdoc:checked').each(function(i) {
				vkumdoc[i] = $(this).val();
			});
			var vkumdocx = vkumdoc.join(';');


			if (lrincian == "") {
				var lrincianx = "X";
			} else {
				var lrincianx = [];
				$('#listrincian tbody tr').each(function() {
					var n_ljabatan = $(this).find(".ljabatan").html();
					var ljabatan = $(this).find(".ljabatanz").html();
					var lgender = $(this).find(".lgender").html();
					var lpendidikan = $(this).find(".lpendidikan").html();
					var llokasi = $(this).find(".llokasiz").html();
					llokasi
					var n_llokasi = $(this).find(".llokasi").html();
					var lwaktu = $(this).find(".lwaktu").html();
					var latasan = $(this).find(".latasan").html();
					var lkontrak = $(this).find(".lkontrak").html();
					var ljumlah = $(this).find(".ljumlah").html();
					var lskema_text = $(this).find(".lskema_text").html();
					var lskema = $(this).find(".lskema").html();
					var lskillx_text = $(this).find(".lskillx_text").html();
					var lskillx = $(this).find(".lskillx").html();
					var kump = $(this).find(".kump").html();
					var tot = $(this).find(".tot").html();
					var kidx = '';
					var lktrain_text = $(this).find(".lktrain_text").html();
					var lktrain = $(this).find(".lktrain").html();
					var lktrain = $(this).find(".lktrain").html();
					var lpnorek = $(this).find(".lpnorek").html();
					var typeng = $(this).find(".typeng").html();
					var nbekerja = $(this).find(".nbekerja").html();
					var nlatihan = $(this).find(".nlatihan").html();
					var ljskema = $(this).find(".ljskema").html();
					var lreasonrot = $(this).find(".lreasonrot").html();
					var ldetkompo = $(this).find(".ldetkompo").html();
					var ljpkwt = $(this).find(".ljpkwt").html();
					lrincianx += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskema_text, lskillx, lskillx_text, n_ljabatan, n_llokasi, kump, tot, kidx, lktrain, nlatihan, nbekerja, typeng, lpnorek, ljskema, lreasonrot, ldetkompo, ljpkwt];
					//lrincian += [ljabatan, lgender, lpendidikan, llokasi, lwaktu, latasan, lkontrak, ljumlah, lskema, lskillx];
					lrincianx += ',';
				})
			}

			// alert(lrincianx);


			if (lkomponen == "") {
				var lkomponenx = "";
			} else {
				var lkomponenx = [];
				$('#listkomponen tbody tr').each(function() {
					var kjabatan = $(this).find(".kjabatan").html();
					var kkodejab = $(this).find(".kkodejab").html();
					var klokasi = $(this).find(".klokasi").html();
					var kkodelok = $(this).find(".kkodelok").html();
					var kkomponen = $(this).find(".kkomponen").html();
					var kkodekomponen = $(this).find(".kkodekomponen").html();
					var kvalue = $(this).find(".kvalue").html();
					var kket = $(this).find(".kket").html();
					//var klevel = $(this).find(".klevel").html();
					//var kkodelevel = $(this).find(".kkodelevel").html();
					var khk = $(this).find(".khk").html();
					var kump = $(this).find(".kump").html();
					var kper = $(this).find(".kper").html();
					var lskema_text = $(this).find(".lskema_text").html();
					var lskema = $(this).find(".lskema").html();
					var lskillx_text = $(this).find(".lskillx_text").html();
					var lskillx = $(this).find(".lskillx").html();
					var detkompo = $(this).find(".detkompo").html();
					var kpengtk = $(this).find(".kpengtk").html();
					var kpengkes = $(this).find(".kpengkes").html();
					lkomponenx += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, khk, kump, kper, lskema, lskema_text, lskillx, lskillx_text, detkompo, kpengtk, kpengkes];
					lkomponenx += ',';
				});
			}

			//alert(lkomponenx);


			if (lperner == "") {
				var lperner = "";
			} else {
				var lperner = [];
				$('#listperner tbody tr').each(function() {
					var ntres = $(this).find(".ntres").html();
					var ntrr = $(this).find(".ntrr").html();
					var nperner = $(this).find(".nperner").html();
					var nnama = $(this).find(".nnama").html();
					var nnamax = nnama.replace(',', '.');
					var narea = $(this).find(".narea").html();
					var npersa = $(this).find(".npersa").html();
					var nskill = $(this).find(".nskill").html();
					var njabatan = $(this).find(".njabatan").html();
					var kjabatan = $(this).find(".kjabatan").html();
					var nlevel = $(this).find(".nlevel").html();
					var karea = $(this).find(".karea").html();
					var kpersa = $(this).find(".kpersa").html();
					var kskill = $(this).find(".kskill").html();
					var klevel = $(this).find(".klevel").html();
					var kkrep_train = $(this).find(".kkrep_train").html();
					var krr = $(this).find(".krr").html();
					var mntrrxy = $(this).find(".mntrrxy").html();
					var npernergn = $(this).find(".npernergn").html();
					var ntlatihan = $(this).find(".ntlatihan").html();
					var ntbekerja = $(this).find(".ntbekerja").html();
					var kabkrs = $(this).find(".kabkrs").html();
					var nalasan = $(this).find(".nalasan").html();
					var kansvh = $(this).find(".kansvh").html();
					var kcttyp = $(this).find(".kcttyp").html();
					var ktrfgb = $(this).find(".ktrfgb").html();
					var kmassn = $(this).find(".kmassn").html();
					//lkomponen += [kjabatan, kkodejab, klokasi, kkodelok, kkomponen, kkodekomponen, kvalue, kket, klevel,kkodelevel, khk, kump];
					lperner += [nperner, nnamax, narea, npersa, nskill, njabatan, nlevel, karea, kpersa, kskill, klevel, ntres, kkrep_train, ntrr, krr, mntrrxy, npernergn, ntlatihan, ntbekerja, kjabatan, kabkrs, nalasan, kansvh, kcttyp, ktrfgb, kmassn];
					lperner += '#,';
				});
			}


			if (lproc == "") {
				var lproc = "";
			} else {
				var lproc = [];
				$('#listproc tbody tr').each(function() {
					var litem = $(this).find(".litem").html();
					var lqty = $(this).find(".lqty").html();
					var lspec = $(this).find(".lspec").html();
					var lbudget = $(this).find(".lbudget").html();
					var litemz = $(this).find(".litemz").html();
					var lperiode = $(this).find(".lperiode").html();
					var ltgl1 = $(this).find(".ltgl1").html();
					var ltgl2 = $(this).find(".ltgl2").html();
					lproc += [litem, lqty, lspec, lbudget, litemz, lperiode, ltgl1, ltgl2];
					lproc += ',';
				});
			}

			e.preventDefault();
			var formData = new FormData($(this).parents('form')[0]);

			$.ajax({
				url: '<?php echo base_url("index.php/home/s_edit_all") ?>',
				//url: 'upload.php',
				type: 'POST',
				//dataType   : 'json',
				xhr: function() {
					var myXhr = $.ajaxSettings.xhr();
					return myXhr;
				},
				success: function(data) {
					//alert(data);

					if (tjo == 2) {
						var url = "<?php echo base_url(); ?>index.php/home/s_perner_simpanx/";
						var type = "POST";
						var mimeType = "multipart/form-data";
						arrjoborder = [tanggal, lama, '', '', tjo, typere, xnobak, approv, nojok, lperner, tperal, jeniscapt, ncust_id, ncust_name, lpernergan, doc_legalitas];
						$.post(url, {
							joborder: arrjoborder
						}, function(resp) {
							$('#overlay').hide();
							//alert(resp);
							alert('Data Tersimpan');
							if (approv == 'atasan') {
								location.href = "<?php echo base_url(); ?>index.php/home/appjox/";
							} else {
								location.href = "<?php echo base_url(); ?>index.php/home/listorderx/";
							}
						});
					} else {
						// var url = "<?php echo base_url(); ?>index.php/home/s_edit_simpan_allx/";
						var url = "<?php echo base_url(); ?>index.php/home/new_s_edit_simpan_allx/";
						var type = "POST";
						var mimeType = "multipart/form-data";
						var sapi = vkumdocx;
						arrjoborder = [tanggal, project, syarat, deskripsi, lama, '', '', tjo, lrincianx, typere, nojok, approv, krespa, respa, tnew, xnobak, lkomponenx, lproc, vkumdocx, ncust_id, ncust_name, tpeng, tperal, jeniscapt, sproject, eproject, nilpro, doc_legalitas];
						$.post(url, {
							joborder: arrjoborder,
							sapi: sapi
						}, function(resp) {
							$('#overlay').hide();
							// custom_alert(resp);
							//alert(resp);
							if (resp == 'Gagal') {
								alert("Rincian tidak boleh kosong, harus ada rincian");
								return false;
							} else {
								alert('Data Tersimpan');
								if (approv == 'atasan') {
									location.href = "<?php echo base_url(); ?>index.php/home/appjox/";
								} else {
									location.href = "<?php echo base_url(); ?>index.php/home/listorderx/";
								}

							}
						});
					}

				},
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			});
			return false;

		});




		$("#province").change(function() {
			var province = $('#province').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_lokasi";
			$.post(url, {
				data: province
			}, function(response) {
				$("#lokasi").html(response);
			})
		})


		// $("#kategori").change(function(){
		// 	var kategori = $('#kategori').val();
		// 	var url = "<?php echo base_url(); ?>index.php/home/pilih_jabatan";
		// 	$.post(url, {data:kategori}, function(response){
		// 		$("#jabatan").html(response);
		// 	})
		// })

		$("#jabatan").change(function() {
			var jabatan = $('#jabatan').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kategori_jabatan";
			$.post(url, {
				data: jabatan
			}, function(response) {
				$("#kategori").html(response);
			})
		})

		/*
		$("#latihan").change(function(){
			var tanggal = new Date($("#tanggal").val());
			var latihan = new Date($("#latihan").val());
			if (tanggal > latihan){
				alert ('Tanggal Latihan harus sesudah Tanggal Penerimaan');
				$("#latihan").val($("#tanggal").val());
				return false;
			}
		});
		
		$("#bekerja").change(function(){
			var tanggal = new Date($("#tanggal").val());
			var bekerja = new Date($("#bekerja").val());
			if (tanggal > bekerja){
				alert ('Tanggal Bekerja harus sesudah Tanggal Penerimaan');
				$("#bekerja").val($("#tanggal").val());
				return false;
			}
		});
		*/

		$("#typepeng").change(function() {
			var tanggal = new Date($("#tanggal").val());
			var bekerja = new Date($("#bekerja_n").val());
			var latihan = new Date($("#latihan_n").val());
			var typepeng = $('#typepeng').val();

			if (typepeng == 3) {
				$('#divpnorek').show();
				$('#divalasanrot').show();
			} else {
				$('#divpnorek').hide();
				$('#divalasanrot').hide();
			}

			// if(typepeng==2){
			// $("#bekerja_n").val('<?php echo $tgbekerja; ?>');
			// if (tanggal > latihan){
			// alert ('Tanggal Latihan harus sesudah Tanggal Sekarang');
			// $("#latihan_n").val($("#tanggal").val());
			// }
			// if (tanggal > bekerja){
			// alert ('Tanggal Bekerja harus 14 HK dari tanggal sekarang, TerimaKasih');
			// $("#bekerja_n").val('<?php echo $tgbekerja; ?>');
			// }
			// }
		});

		$("#typere").change(function() {
			var typere = $('#typere').val();
			if (typere == '3') {
				document.getElementById("ypernery").disabled = false;
				document.getElementById("alasan_ganti").disabled = false;
			} else {
				document.getElementById("ypernery").disabled = true;
				document.getElementById("alasan_ganti").disabled = true;
				$("#ypernery").select2("val", "");
			}

			var tanggal = new Date($("#tanggal").val());
			var bekerja = new Date($("#bekerja").val());
			var latihan = new Date($("#latihan").val());
			var typere = $('#typere').val();

			// if(typere==2){
			// $("#bekerja").val('<?php echo $tgbekerja_rep; ?>');
			// if (tanggal > latihan){
			// alert ('Tanggal Latihan harus sesudah Tanggal Sekarang');
			// $("#latihan").val($("#tanggal").val());
			// }
			// if (tanggal > bekerja){
			// alert ('Tanggal Bekerja harus 5 HK dari tanggal sekarang, TerimaKasih');
			// $("#bekerja").val('<?php echo $tgbekerja_rep; ?>');
			// }
			// }

		});

		$("#latihan").change(function() {
			var tanggal = new Date($("#tanggal").val());
			var latihan = new Date($("#latihan").val());
			var tyjo = $('#tjo').val();
			var typepeng = $('#typepeng').val();
			var typere = $('#typere').val();
			if (tanggal > latihan) {
				alert('Tanggal Latihan harus sesudah Tanggal Sekarang');
				$("#latihan").val($("#tanggal").val());
				return false;
			}
			// if(tyjo==2){
			// if(typere==2){
			// if (tanggal > latihan){
			// alert ('Tanggal Latihan harus sesudah Tanggal Penerimaan');
			// $("#latihan").val($("#tanggal").val());
			// return false;
			// }
			// }
			// }
		});

		$("#bekerja").change(function() {
			var tanggal = new Date($("#tanggal").val());
			var bekerja = new Date($("#bekerja").val());
			var bekerjay = new Date('<?php echo $tgbekerja_rep; ?>');
			var tyjo = $('#tjo').val();
			var typepeng = $('#typepeng').val();
			var typere = $('#typere').val();
			// if(tyjo==2){
			// if(typere==2){
			// if ( (bekerjay < bekerja) || (bekerjay > bekerja) ){
			// alert ('Tanggal Bekerja harus 5 HK dari tanggal sekarang, TerimaKasih');
			// $("#bekerja").val('<?php echo $tgbekerja_rep; ?>');
			// return false;
			// }
			// }
			// }
		});


		$("#latihan_n").change(function() {
			var tanggal = new Date($("#tanggal").val());
			var latihan = new Date($("#latihan_n").val());
			var start_pro = new Date($("#sproject").val());
			var tyjo = $('#typejo').val();
			var typepeng = $('#typepeng').val();
			var typere = $('#typere').val();
			var vstart_pro = $('#sproject').val();
			if (typepeng == 2) {
				if (vstart_pro == '') {
					alert('Tanggal Start Project harus diisi dahulu, TerimaKasih');
					$("#latihan_n").val('');
					return false;
				} else {
					if (latihan < start_pro) {
						alert('Tanggal Latihan harus sesudah Tanggal Start Project');
						$("#latihan_n").val('');
						return false;
					}
				}
			} else {
				// if (tanggal > latihan){
				// alert ('Tanggal Latihan harus sesudah Tanggal Sekarang');
				// $("#latihan_n").val('');
				// return false;
				// }
			}
			// if(tyjo==1){
			// if(typepeng==2){
			// if (tanggal > latihan){
			// alert ('Tanggal Latihan harus sesudah Tanggal Sekarang');
			// $("#latihan_n").val($("#tanggal").val());
			// return false;
			// }
			// }
			// }
		});


		$("#bekerja_n").change(function() {
			var tanggal = new Date($("#tanggal").val());
			var bekerja = new Date($("#bekerja_n").val());
			var bekerjax = new Date('<?php echo $tgbekerja; ?>');
			var start_pro = new Date($("#sproject").val());
			var tyjo = $('#typejo').val();
			var typepeng = $('#typepeng').val();
			var vstart_pro = $('#sproject').val();

			if (typepeng == 2) {
				if (vstart_pro == '') {
					alert('Tanggal Start Project harus diisi dahulu, TerimaKasih');
					$("#bekerja_n").val('');
					return false;
				} else {
					if (bekerja < start_pro) {
						alert('Tanggal Bekerja harus sesudah Tanggal Start Project');
						$("#bekerja_n").val('');
						return false;
					}
				}
			} else {
				// if (tanggal > bekerja){
				// alert ('Tanggal Bekerja harus sesudah Tanggal Sekarang');
				// $("#bekerja_n").val('');
				// return false;
				// }
			}
			// if(typepeng==2){
			// if ( (bekerjax < bekerja) || (bekerjax > bekerja) ){
			// alert ('Tanggal Bekerja harus 14 HK dari tanggal sekarang, TerimaKasih');
			// $("#bekerja_n").val('<?php echo $tgbekerja; ?>');
			// return false;
			// }
			// }
		});


		$("#save_edit").click(function() {
			$('#overlay').show();
			var valz = $('#valz').val();
			var idz = $('#idz').val();
			var nojoz = $('#nojoz').val();
			var persenz = $('#persenz').val();

			if (valz == "") {
				alert("Value tidak boleh kosong");
				return false;
			}

			arrjab = [idz, valz, nojoz, persenz];
			var url = "<?php echo base_url(); ?>index.php/home/kompz_edit/";
			$.post(url, {
				xjab: arrjab
			}, function(response) {
				$('#overlay').hide();
				alert('Sukses');
				lTable.fnDestroy();
				$('#listkompx tbody').html(response);
				$('#listkompx').dataTable({
					"bRetrieve": true,
					"bServerside": true,
					"bProcessing": true,
					"bPaginate": false,
					"bLengthChange": false,
					"bFilter": false,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": false,
					"bJQueryUI": false
				});
			});
		});


		$("#save_editrinc").click(function() {
			$('#overlay').show();
			var ridz = $('#ridz').val();
			var rnojoz = $('#rnojoz').val();
			var rjmlh = $('#ejmlh').val();

			var vkumtrain = [];
			$('#tkumtrain:checked').each(function(i) {
				vkumtrain[i] = $(this).val();
			});
			var vkumtrainx = vkumtrain.join(';');

			arrjab = [ridz, vkumtrainx, rnojoz, rjmlh];
			var url = "<?php echo base_url(); ?>index.php/home/erinc_edit/";
			$.post(url, {
				xjab: arrjab
			}, function(response) {
				$('#overlay').hide();
				alert('Sukses');
				rTable.fnDestroy();
				$('#listrincianx tbody').html(response);
				$('#listrincianx').dataTable({
					"bRetrieve": true,
					"bServerside": true,
					"bProcessing": true,
					"bPaginate": false,
					"bLengthChange": false,
					"bFilter": false,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": false,
					"bJQueryUI": false
				});
			});
		});


		$('#tmbhrincian').click(function() {
			$("#lskillx").select2("val", "");
			$("#tkomp").find("tr:gt(1)").remove();
			$("#tkomp_var").find("tr:gt(1)").remove();
			//$("#tkomp_ben").find("tr:gt(7)").remove();
			$("#valuex1").val('');
			$("#vvaluex1").val('');
			$("#bvaluex1").val('');
			$("#kompx1").val('');
			$("#vkompx1").val('');
			$("#bkompx1").val('');
			$("#ketx1").val('');
			$("#vketx1").val('');
			$("#bketx1").val('');
			$('#divpnorek').hide();
			$('#divalasanrot').hide();
			document.getElementById('divjpkwt').setAttribute("style", "display:none;");
			document.getElementById("haha").reset();
			var tejo = $("#tjo").val();
			var tnew = $("#typenew").val();
			if ((tejo == '2') || (tejo == '4')) {
				var group = $('#respa :selected').val();
				var url = "<?php echo base_url(); ?>index.php/home/pilih_area";
				$.post(url, {
					data: group
				}, function(response) {
					$("#lokasi").html(response);
				});
			} else if (tejo == '1') {
				if (tnew == '1') {
					var province = $('#province').val();
					var url = "<?php echo base_url(); ?>index.php/home/pilih_lokasi";
					$.post(url, {
						data: province
					}, function(response) {
						$("#lokasi").html(response);
					})
				} else {
					var group = $('#respa :selected').val();
					var url 	= "<?php echo base_url(); ?>index.php/home/pilih_lokasi_local";
					// var url = "<?php echo base_url(); ?>index.php/home/pilih_area_2";
					$.post(url, {
						data: group
					}, function(response) {
						$("#lokasi").html(response);
					});
				}
			} else {
				var province = $('#province').val();
				var url = "<?php echo base_url(); ?>index.php/home/pilih_lokasi";
				$.post(url, {
					data: province
				}, function(response) {
					$("#lokasi").html(response);
				})
			}
		});


		$('#dpn_cancel').click(function() {
			$('#EModal').hide();
			$("#myModal").hide();
			$("#myModal").modal("hide");
			$("#EModal").modal("hide");
		});

		$('#btncancel').click(function() {
			//location.reload();   myModal
			//$("#EModal").modal('toggle');
			$('#EModal').hide();
			$("#myModal").show();
			$("#myModal").modal("show");
		});


		$('#addrincian').click(function() {
			//alert('tes');
			//document.getElementById("haha").reset();
			var tejo = $("#typejo").val();

			var jabatan = $('#jabatan :selected').text();
			var jabatanz = $('#jabatan').val();
			var gender = $('#gender').val();
			var lokasi = $('#lokasi :selected').text();
			var lokasiz = $('#lokasi').val();
			var pendidikan = $('#pendidikan :selected').text();
			var pendidikanz = $('#pendidikan').val();
			var waktu = $('#waktu :selected').text();
			var waktuz = $('#waktu').val();
			var atasan = $('#atasan').val();
			var kontrak = $('#kontrak').val();
			var jpkwt = $('#jpkwt').val();
			var jumlah = $('#jumlah').val();
			var lskema = $('#lskema').val();
			var lskillx = $('#lskillx').val();
			var typenew = $('#typenew').val();
			var xbekerja = $('#bekerja_n').val();
			var latihan = $('#latihan_n').val();
			var typepeng = $('#typepeng').val();
			var pnorek = $('#pnorek').val();
			var alasanrot = $('#alasanrot').val();
			var tgaji = $('#tgaji').val();
			var tperal = $('#tperal:checked').val();

			$('#jabx').val(jabatan);
			$('#kodejabx').val(jabatanz);
			$('#lokasix').val(lokasi);
			$('#kodelokasix').val(lokasiz);
			$('#kodekont').val(kontrak);

			if (jabatanz == "") {
				alert('Jabatan tidak boleh kosong');
				$('#divjabatan').attr('class', 'form-group has-error');
				return false;
			} else if (jabatanz != "") {
				$('#divjabatan').attr('class', 'form-group')
			}

			if (gender == "") {
				alert('Gender tidak boleh kosong');
				$('#divgender').attr('class', 'form-group has-error');
				return false;
			} else if (gender != "") {
				$('#divgender').attr('class', 'form-group')
			}

			if (pendidikanz == "") {
				alert('Pendidikan tidak boleh kosong');
				$('#divpendidikan').attr('class', 'form-group has-error');
				return false;
			} else if (pendidikanz != "") {
				$('#divpendidikan').attr('class', 'form-group')
			}

			if (lokasiz == "") {
				alert('Lokasi Kerja tidak boleh kosong');
				$('#divlokasi').attr('class', 'form-group has-error');
				return false;
			} else if (lokasiz != "") {
				$('#divlokasi').attr('class', 'form-group')
			}

			if (waktuz == "") {
				alert('Waktu kerja tidak boleh kosong');
				$('#divwaktu').attr('class', 'form-group has-error');
				return false;
			} else if (waktuz != "") {
				$('#divwaktu').attr('class', 'form-group')
			}

			if (atasan == "") {
				alert('Atasan tidak boleh kosong');
				$('#divatasan').attr('class', 'form-group has-error');
				return false;
			} else if (atasan != "") {
				$('#divatasan').attr('class', 'form-group')
			}

			if (kontrak == "") {
				alert('Jenis Kontrak tidak boleh kosong');
				$('#divkontrak').attr('class', 'form-group has-error');
				return false;
			} else if (kontrak != "") {
				$('#divkontrak').attr('class', 'form-group')
			}

			if (kontrak == 1 || kontrak == 6) {
				if (jpkwt == "") {
					alert('Jenis PKWT tidak boleh kosong');
					$('#divjpkwt').attr('class', 'form-group has-error');
					return false;
				} else if (jpkwt != "") {
					$('#divjpkwt').attr('class', 'form-group')
				}
			}

			// if (jumlah == "" )
			// {
			// alert('Jumlah tidak boleh kosong');
			// $('#divjumlah').attr('class','form-group has-error'); return false;} else if (jumlah != ""){$('#divjumlah').attr('class','form-group')
			// }

			// if (lskema == "" )
			// {
			// alert('Level tidak boleh kosong');
			// $('#divlevel').attr('class','form-group has-error'); return false;} else if (lskema != ""){$('#divlevel').attr('class','form-group')
			// }

			// if (lskillx == "" )
			// {
			// alert('Skilllayanan tidak boleh kosong');
			// $('#divskil').attr('class','form-group has-error'); return false;} else if (lskillx != ""){$('#divskil').attr('class','form-group')
			// }

			// if (xbekerja == "" )
			// {
			// alert('Tanggal Bekerja tidak boleh kosong');
			// $('#overlay').hide();$('#ggff').show();
			// $('#divbekerjan').attr('class','form-group has-error'); return false;} else if (xbekerja != ""){$('#divbekerja').attr('class','form-group')
			// }

			// if (latihan == "" )
			// {
			// alert('Tanggal Pelatihan tidak boleh kosong');
			// $('#overlay').hide();
			// $('#ggff').show();
			// $('#divlatihann').attr('class','form-group has-error'); return false;} else if (latihan != ""){$('#divlatihan').attr('class','form-group')
			// }

			// if (typepeng == "3" )
			// {
			// if (pnorek == "" )
			// {
			// alert('Perner No REKRUT Harus Di Isi untuk repot, TerimaKasih');
			// $('#divpnorek').attr('class','form-group has-error'); return false;} else if (pnorek != ""){$('#divpnorek').attr('class','form-group')
			// }

			// if (alasanrot == "" )
			// {
			// alert('Alasan Harus Di Isi untuk repot, TerimaKasih');
			// $('#divalasanrot').attr('class','form-group has-error'); return false;} else if (alasanrot != ""){$('#divalasanrot').attr('class','form-group')
			// }
			// }

			if (tperal == 'INF') {
				$('#divjskema').show();
			} else {
				if (typenew == '2') {
					$('#divjskema').show();
				} else {
					$('#divjskema').show();
				}
			}

			$('#zoverlayz').show();
			$.ajax({
				type: "POST",
				// url: "<?//php echo base_url('index.php/home/cek_ump_local/'); ?>",
				url: "<?php echo base_url('index.php/home/cek_ump'); ?>",
				//dataType	: "json",
				data: {
					alok: lokasiz,
					akerja: xbekerja,
					atgaji: tgaji
				},
				success: function(res) {
					if (res == 0) {
						$("#EModal").hide();
						$('#myModal').show();
						$("#myModal").modal("show");
						alert('UMK tahun ' + tgaji + ' pada area ' + lokasi + ' belum ada di SAP, silahkan koordinasi dengan tim PM');
						return false;

					} else {
						$('#zoverlayz').hide();
						$('#umpx').val(res);

						if (kontrak != 1 && kontrak != 6) {
							// if(kontrak!=1 && kontrak!=2){
							$("#pbtkp1").val('0');
							$("#pbtkp2").val('0');
							$("#pbtkp3").val('0');
							$("#pbtkp4").val('0');
							$("#jpbpjs").val('1');
						} else {
							$("#pbtkp1").val('9.24');
							$("#pbtkp2").val('0');
							$("#pbtkp3").val('5');
							$("#pbtkp4").val('0');
							$("#jpbpjs").val('1');

							var asu = (9.24 / 100) * res;
							var asus = Math.round(asu);
							$('#vbtkp1').val(asus);
							$('#vbtkp2').val(0);

							var asa = (5 / 100) * res;
							var asas = Math.round(asa);
							$('#vbtkp3').val(asas);
							$('#vbtkp4').val(0);
						}
					}
				}
			});


			$.ajax({
				type: "POST",
				url: "<?php echo base_url('index.php/home/cek_mandat/'); ?>",
				//dataType	: "json",
				data: {
					kont: kontrak,
					jpkwt: jpkwt
				},
				success: function(resx) {
					$('#mandator').val(resx);
				}
			});

			$.ajax({
				type: "POST",
				url: "<?php echo base_url('index.php/home/cek_nm_mandat/'); ?>",
				//dataType	: "json",
				data: {
					kont: kontrak,
					jpkwt: jpkwt
				},
				success: function(resxx) {
					$('#nm_mandator').val(resxx);
				}
			});


			$.ajax({
				type: "POST",
				url: "<?php echo base_url('index.php/home/cek_fixed/'); ?>",
				//dataType	: "json",
				data: {
					kont: kontrak
				},
				success: function(resx) {
					$('#fixed').val(resx);
				}
			});


			var group = $('#kontrak').val();
			//alert(group);
			//console.log(group);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_fixed";
			$.post(url, {
				data: group
			}, function(response) {
				console.log(response);
				//alert(response);
				$(".kompx").html(response);
			});


			var group = $('#kontrak').val();
			//alert(group);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_variabel";
			$.post(url, {
				data: group
			}, function(response) {
				//console.log(response);
				$(".vkompx").html(response);
			});


			var group = $('#kontrak').val();
			//alert(group);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
			$.post(url, {
				data: group
			}, function(response) {
				//console.log(response);
				$(".bkompx").html(response);
			});

			if (kontrak != 1) {
				$("#pbtkp1").val('0');
				$("#pbtkp2").val('0');
				$("#pbtkp3").val('0');
				$("#pbtkp4").val('0');
				$("#jpbpjs").val('1');
			} else {
				$("#pbtkp1").val('9.24');
				$("#pbtkp2").val('0');
				$("#pbtkp3").val('5');
				$("#pbtkp4").val('0');
				$("#jpbpjs").val('1');
			}

			$("#tkomp").find("tr:gt(1)").remove();
			$("#tkomp_var").find("tr:gt(1)").remove();
			// $("#tkomp_ben").find("tr:gt(11)").remove();
			$("#tkomp_ben").find("tr:gt(5)").remove();
			$("#valuex1").val('');
			$("#vvaluex1").val('');
			$("#bvaluex1").val('');
			$("#kompx1").val('');
			$("#kompx1").select2("val", "");
			$("#vkompx1").val('');
			$("#vkompx1").select2("val", "");
			$("#bkompx1").val('');
			$("#bkompx1").select2("val", "");
			$("#ketx1").val('');
			$("#vketx1").val('');
			$("#vbtkp1").val('');
			$("#vbtkp2").val('');
			$("#vbtkp3").val('');
			$("#vbtkp4").val('');
			$("#bketx1").val('');
			$("#excelfile").val('');
			$("#exceltable").find("tr:gt(0)").remove();

			$("input[name='cekbpjs_tk']").removeAttr('checked');
			$("input[name='cekbpjs_kes']").removeAttr('checked');

			if (typeof document.getElementById("pbtkp1") !== 'undefined' && document.getElementById("pbtkp1") !== null) {
				document.getElementById("pbtkp1").readOnly = false;
			}

			if (typeof document.getElementById("pbtkp2") !== 'undefined' && document.getElementById("pbtkp2") !== null) {
				document.getElementById("pbtkp2").readOnly = false;
			}

			if (typeof document.getElementById("pbtkp3") !== 'undefined' && document.getElementById("pbtkp3") !== null) {
				document.getElementById("pbtkp3").readOnly = false;
			}

			if (typeof document.getElementById("pbtkp4") !== 'undefined' && document.getElementById("pbtkp4") !== null) {
				document.getElementById("pbtkp4").readOnly = false;
			}

			$('#EModal').modal({
				backdrop: 'static',
				keyboard: false
			});

			$('#myModal').hide();
			$("#EModal").show();
			$("#EModal").modal("show");

			if (kontrak == 2) {
				$('#divfixed').hide();
				$('#divbenefit').show();
			} else {
				$('#divfixed').show();
				$('#divbenefit').show();
			}
		});



		$('#addkomponen').click(function() {
			var tejo = $("#typejo").val();

			var pnorek = $('#pnorek').val();
			var alasanrot = $('#alasanrot').val();
			var kjabatan = $('#jabx').val();
			var kkodejab = $('#kodejabx').val();
			var klokasi = $('#lokasix').val();
			var kkodelok = $('#kodelokasix').val();
			var kodekont = $("#kodekont").val();

			var typepeng = $('#typepeng').val();
			var ntypepeng = $('#typepeng :selected').text();

			var klevel = $('#levelx :selected').text();
			var kkodelevel = $('#levelx').val();
			var khk = $('#hkpembagix').val();
			var kump = $('#umpx').val();
			var jskema = $('#jskema').val();

			var arr = document.getElementsByName('valuex');
			var tot = 0;
			for (var i = 0; i < arr.length; i++) {
				if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
					tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
			}

			console.log(tot);
			console.log(kump);
			//change condition by kaha 26/9/22 -> menambah jika total = ump maka bisa
			if (kodekont == 1 || kodekont == 6) {
				if (jskema == 1) {
					if (tot < kump) {
						if (tot > kump) {
							// return tot;
						} else if (tot = kump) {
							// return tot;
						} else {
							alert('Total Fixed harus sama atau lebih dari UMP');
							return false;
						}
					}
				}
			}


			if (khk == "") {
				alert('HK pembagi harus diisi');
				$('#divhkx').attr('class', 'form-group has-error');
				return false;
			} else if (khk != "") {
				$('#divhkx').attr('class', 'form-group')
			}

			var bekerja = $('#bekerja_n').val();
			var latihan = $('#latihan_n').val();

			var jabatan = $('#jabatan :selected').text();
			var jabatanz = $('#jabatan').val();
			var gender = $('#gender').val();
			var lokasi = $('#lokasi :selected').text();
			var lokasiz = $('#lokasi').val();
			var pendidikan = $('#pendidikan :selected').text();
			var pendidikanz = $('#pendidikan').val();
			var waktu = $('#waktu :selected').text();
			var waktuz = $('#waktu').val();
			var atasan = $('#atasan').val();
			var kontrak = $('#kontrak').val();
			var n_kontrak = $('#kontrak :selected').text();
			var jpkwt = $('#jpkwt').val();
			var n_jpkwt = $('#jpkwt :selected').text();
			var jumlah = $('#jumlah').val();
			var lskema = $('#lskema').val();
			var lskema_text = $('#lskema :selected').text();
			var lskillx = $('#lskillx').val();
			var lskillx_text = $('#lskillx :selected').text();
			var mandator = $('#mandator').val();
			var fixed = $('#fixed').val();
			var detkomp = $('#detkompnew').val();

			if (kontrak == 1 || kontrak == 6) {
				if (jpkwt == '') {
					var jpkwt_asli = '-';
					var n_jpkwt_asli = '-';
				} else {
					var jpkwt_asli = $('#jpkwt').val();
					var n_jpkwt_asli = $('#jpkwt :selected').text();
				}
			} else {
				var jpkwt_asli = '-';
				var n_jpkwt_asli = '-';
			}

			var vkumtrain = [];
			var vkumtraint = [];
			$('#kumtrain:checked').each(function(i) {
				vkumtrain[i] = $(this).val();
				if ($(this).val() == 1) {
					vkumtraint[i] = 'Softskill';
				} else if ($(this).val() == 2) {
					vkumtraint[i] = 'Hardskill';
				} else if ($(this).val() == 3) {
					vkumtraint[i] = 'Tendem Pasif';
				} else if ($(this).val() == 4) {
					vkumtraint[i] = 'Tendem Aktif';
				}
			});
			var vkumtrainx = vkumtrain.join(';');
			var vkumtraintx = vkumtraint.join(';');

			var vlong = [];
			$('.kompx').each(function(i) {
				vlong[i] = $(this).val();
			});

			var vlong2 = vlong.join(',');

			var vlongx = [];
			$('.vkompx').each(function(i) {
				vlongx[i] = $(this).val();
			});

			var vlong3 = vlongx.join(',');

			var vlongxx = [];
			$('.bkompx').each(function(i) {
				vlongxx[i] = $(this).val();
			});

			var vlong4 = vlongxx.join(',');

			var resy = vlong2.concat(",", vlong3, ",", vlong4);

			//console.log(atot);console.log(asdf);console.log(abcde);

			if (jskema == 1) {
				var myarr = mandator.split(",");
				var jumman = myarr.length;
				for (i = 0; i < jumman; i++) {
					var n = resy.includes(myarr[i]);
					if (n == true) {
						//alert('Bnar');
					} else {
						alert('Data Mandatory Harus Di Input Semua, silahkan cek di Komponen Fixed, Variabel, dan Benefit ');
						return false;
					}
				}
			}

			if (jskema == 1) {
				var djan = $('.tkodez');
				var chuk = djan.length;
				//console.log(chuk);
				//var x = 1;
				for (x = 0; x < chuk; x++) {
					var skodez = '#tkodez' + x;
					var snamaz = '#tnamaz' + x;
					var svalz = '#tvalz' + x;
					var sketz = '#tketz' + x;

					var akodez = $(skodez).val();
					var anamaz = $(snamaz).val();
					var avalz = $(svalz).val();
					var aketz = $(sketz).val();


					$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>' + kjabatan + '</td><td class=kkodejab style=display:none>' + kkodejab + '</td><td class=klokasi>' + klokasi + '</td><td class=kkodelok style=display:none>' + kkodelok + '</td><td class=kkomponen>' + anamaz + '</td><td class=kkodekomponen style=display:none>' + akodez + '</td>' + '</td><td class=kvalue>' + avalz + '</td><td class=kket>' + aketz + '</td><td class=kper>-</td><td class=khk style=display:none>' + khk + '</td><td class=kump style=display:none>' + kump + '</td><td class=detkompo style=display:none>' + detkomp + '</td></tr>');
				}


				var komplength = $('.kompx');
				var ckomp = komplength.length;
				//console.log(ckomp);
				var x = 1;
				for (x = 1; x <= ckomp; x++) {
					var iddivkom = '#divkompx' + x;
					var iddivval = '#divvaluex' + x;

					var idkom = '#kompx' + x;
					var idket = '#ketx' + x;
					var idval = '#valuex' + x;
					var idpeng_tk = 'tk_valuex' + x;
					var idpeng_kes = 'kes_valuex' + x;

					var kkomponen = $(idkom + ' :selected').text();
					var kkodekomponen = $(idkom).val();
					var kvalue = $(idval).val();
					var kvaluex = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(kvalue))));
					var kket = $(idket).val();

					var cekstat_tk = document.getElementById(idpeng_tk).checked;
					if (cekstat_tk == true) {
						var valpeng_tk = 'Y';
					} else {
						var valpeng_tk = 'N';
					}

					var cekstat_kes = document.getElementById(idpeng_kes).checked;
					if (cekstat_kes == true) {
						var valpeng_kes = 'Y';
					} else {
						var valpeng_kes = 'N';
					}

					var kvaluexy = kvaluex.replace(",", ".");

					if (kkodekomponen != "") {
						if (kvaluex == "") {
							alert('Setiap Value Harus Diisi, Mohon di Cek Kembali.');
							return false;
						}
					}

					if (kkodekomponen != '') {
						$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>' + kjabatan + '</td><td class=kkodejab style=display:none>' + kkodejab + '</td><td class=klokasi>' + klokasi + '</td><td class=kkodelok style=display:none>' + kkodelok + '</td><td class=lskema_text>' + lskema_text + '</td><td class=lskema style=display:none>' + lskema + '</td><td class=lskillx_text>' + lskillx_text + '</td><td class=lskillx style=display:none>' + lskillx + '</td><td class=kkomponen>' + kkomponen + '</td><td class=kkodekomponen style=display:none>' + kkodekomponen + '</td>' + '</td><td class=kvalue>' + kvaluexy + '</td><td class=kket>' + kket + '</td><td class=kper>-</td><td class=kpengtk>Y</td><td class=kpengkes>Y</td><td class=khk style=display:none>' + khk + '</td><td class=kump style=display:none>' + kump + '</td><td class=detkompo style=display:none>' + detkomp + '</td></tr>');
					}
				}


				var vkomplength = $('.vkompx');
				var vckomp = vkomplength.length;
				//console.log(vckomp);
				var x = 1;
				for (x = 1; x <= vckomp; x++) {
					var viddivkom = '#divkompx' + x;
					var viddivval = '#divvaluex' + x;

					var vidkom = '#vkompx' + x;
					var vidket = '#vketx' + x;
					var vidval = '#vvaluex' + x;
					var idpeng_tk = 'tk_vvaluex' + x;
					var idpeng_kes = 'kes_vvaluex' + x;

					var vkkomponen = $(vidkom + ' :selected').text();
					var vkkodekomponen = $(vidkom).val();
					var vkvalue = $(vidval).val();
					var vkvaluex = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(vkvalue))));
					var vkket = $(vidket).val();

					var cekstat_tk = document.getElementById(idpeng_tk).checked;
					if (cekstat_tk == true) {
						var valpeng_tk = 'Y';
					} else {
						var valpeng_tk = 'N';
					}

					var cekstat_kes = document.getElementById(idpeng_kes).checked;
					if (cekstat_kes == true) {
						var valpeng_kes = 'Y';
					} else {
						var valpeng_kes = 'N';
					}

					var vkvaluexy = vkvaluex.replace(",", ".");

					if (vkkodekomponen != "") {
						if (vkvaluex == "") {
							alert('Setiap Value Harus Diisi, Mohon di Cek Kembali.');
							return false;
						}
					}

					if (vkkodekomponen != '') {
						$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>' + kjabatan + '</td><td class=kkodejab style=display:none>' + kkodejab + '</td><td class=klokasi>' + klokasi + '</td><td class=kkodelok style=display:none>' + kkodelok + '</td><td class=lskema_text>' + lskema_text + '</td><td class=lskema style=display:none>' + lskema + '</td><td class=lskillx_text>' + lskillx_text + '</td><td class=lskillx style=display:none>' + lskillx + '</td><td class=kkomponen>' + vkkomponen + '</td><td class=kkodekomponen style=display:none>' + vkkodekomponen + '</td>' + '</td><td class=kvalue>' + vkvaluexy + '</td><td class=kket>' + vkket + '</td><td class=kper>-</td><td class=kpengtk>' + valpeng_tk + '</td><td class=kpengkes>' + valpeng_kes + '</td><td class=khk style=display:none>' + khk + '</td><td class=kump style=display:none>' + kump + '</td><td class=detkompo style=display:none>' + detkomp + '</td></tr>');
					}
				}



				var bkomplength = $('.bkompx');
				var bckomp = bkomplength.length;
				//console.log(vckomp);
				var x = 1;
				for (x = 1; x <= bckomp; x++) {
					var biddivkom = '#divkompx' + x;
					var biddivval = '#divvaluex' + x;

					var bidkom = '#bkompx' + x;
					var bidket = '#bketx' + x;
					var bidval = '#bvaluex' + x;
					var idperx = '#pvaluex' + x;
					var idkarx = '#kvaluex' + x;
					var xjkkx = '#kpvaluex' + x;
					var xjkmx = '#kkvaluex' + x;
					var xjhtpx = '#kqvaluex' + x;
					var xjhtkx = '#kmvaluex' + x;

					// var idpeng_tk 	= 'tk_bvaluex'+x;
					// var idpeng_kes 	= 'kes_bvaluex'+x;

					// var cekstat_tk 	= document.getElementById(idpeng_tk).checked;
					// if(cekstat_tk==true){
					// var valpeng_tk = 'Y';
					// } else {
					// var valpeng_tk = 'N';
					// }

					// var cekstat_kes = document.getElementById(idpeng_kes).checked;
					// if(cekstat_kes==true){
					// var valpeng_kes = 'Y';
					// } else {
					// var valpeng_kes = 'N';
					// }

					var vkkomponen = $(bidkom + ' :selected').text();
					var vkkodekomponen = $(bidkom).val();
					var vkvalue = $(bidval).val();

					if ((vkkodekomponen == 7000) || (vkkodekomponen == 7001)) {
						var vkvaluex = $(bidval).val();
					} else {
						var vkvaluex = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(vkvalue))));
					}

					var vkvaluexy = vkvaluex.replace(",", ".");

					var vkket = $(bidket).val();
					var kper = $(idperx).val();
					var kkar = $(idkarx).val();
					var jkkx = $(xjkkx).val();
					var jkmx = $(xjkmx).val();
					var jhtpx = $(xjhtpx).val();
					var jhtkx = $(xjhtkx).val();

					if (vkkodekomponen != "") {
						if (vkvaluex == "") {
							alert('Setiap Value Harus Diisi, Mohon di Cek Kembali.');
							return false;
						}
					}

					if (vkkodekomponen != '') {
						// if(kper!=''){
						// $('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ vkket +'</td><td class=kper>'+ kper +'</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td><td class=detkompo style=display:none>'+ detkomp+'</td></tr>');	
						// }
						// else if(jkkx!=''){
						// $('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ kket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td><td class=detkompo style=display:none>'+ detkomp+'</td></tr>');	
						// }
						// else {
						$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>' + kjabatan + '</td><td class=kkodejab style=display:none>' + kkodejab + '</td><td class=klokasi>' + klokasi + '</td><td class=kkodelok style=display:none>' + kkodelok + '</td><td class=lskema_text>' + lskema_text + '</td><td class=lskema style=display:none>' + lskema + '</td><td class=lskillx_text>' + lskillx_text + '</td><td class=lskillx style=display:none>' + lskillx + '</td><td class=kkomponen>' + vkkomponen + '</td><td class=kkodekomponen style=display:none>' + vkkodekomponen + '</td>' + '</td><td class=kvalue>' + vkvaluexy + '</td><td class=kket>' + vkket + '</td><td class=kper>-</td><td class=kpengtk>-</td><td class=kpengkes>-</td><td class=khk style=display:none>' + khk + '</td><td class=kump style=display:none>' + kump + '</td><td class=detkompo style=display:none>' + detkomp + '</td></tr>');
						// }
					}
				}


				var wewz = $('.nketb');
				var chukz = wewz.length;
				//console.log(chukz);
				var x = 1;
				for (x = 1; x <= chukz; x++) {
					var snketb = '#nketb' + x;
					var skketb = '#kketb' + x;
					var spbtkp = '#pbtkp' + x;
					var svbtkp = '#vbtkp' + x;
					var sbketb = '#bketb' + x;

					var anketb = $(snketb).val();
					var akketb = $(skketb).val();
					var apbtkp = $(spbtkp).val();
					var avbtkp = $(svbtkp).val();
					var avbtkpx = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(avbtkp))));
					var abketb = $(sbketb).val();

					var avbtkpxy = avbtkpx.replace(",", ".");

					$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>' + kjabatan + '</td><td class=kkodejab style=display:none>' + kkodejab + '</td><td class=klokasi>' + klokasi + '</td><td class=kkodelok style=display:none>' + kkodelok + '</td><td class=lskema_text>' + lskema_text + '</td><td class=lskema style=display:none>' + lskema + '</td><td class=lskillx_text>' + lskillx_text + '</td><td class=lskillx style=display:none>' + lskillx + '</td><td class=kkomponen>' + anketb + '</td><td class=kkodekomponen style=display:none>' + akketb + '</td>' + '</td><td class=kvalue>' + avbtkpxy + '</td><td class=kket>' + abketb + '</td><td class=kper>' + apbtkp + '</td><td class=kpengtk>-</td><td class=kpengkes>-</td><td class=khk style=display:none>' + khk + '</td><td class=kump style=display:none>' + kump + '</td><td class=detkompo style=display:none>' + detkomp + '</td></tr>');
				}
			}


			//$('#listrincian > tbody:last-child').append('<tr><td class=ljabatan>'+ jabatan +'</td><td class=lgender>'+ gender +'</td><td class=lpendidikan>'+ pendidikan +'</td><td class=llokasi>'+ lokasi +'</td><td class=lwaktu>'+ waktu +'</td><td class=latasan>'+ atasan +'</td><td class=lkontrak>'+ n_kontrak +'</td><td class=ljumlah>'+ jumlah +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=khk>'+ khk +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=llokasiz style=display:none>'+ lokasiz +'</td><td class=ljabatanz style=display:none>'+ jabatanz +'</td><td class=kump style=display:none>'+ kump +'</td><td class=tot style=display:none>'+ tot +'</td></tr>');

			//10-12-2019
			//$('#listrincian > tbody:last-child').append('<tr><td class=ljabatan>'+ jabatan +'</td><td class=lgender>'+ gender +'</td><td class=lpendidikan>'+ pendidikan +'</td><td class=llokasi>'+ lokasi +'</td><td class=lwaktu>'+ waktu +'</td><td class=latasan>'+ atasan +'</td><td class=lkontrak>'+ n_kontrak +'</td><td class=ljumlah>'+ jumlah +'</td><td class=lskema_text>'+ lskema_text +'</td><td class=lskema style=display:none>'+ lskema +'</td><td class=khk>'+ khk +'</td><td class=lskillx_text>'+ lskillx_text +'</td><td class=lskillx style=display:none>'+ lskillx +'</td><td class=llokasiz style=display:none>'+ lokasiz +'</td><td class=ljabatanz style=display:none>'+ jabatanz +'</td><td class=kump style=display:none>'+ kump +'</td><td class=tot style=display:none>'+ tot +'</td>  <td class=lktrain_text>'+ vkumtraintx +'</td><td class=lktrain style=display:none>'+ vkumtrainx +'</td><td class=detkompo style=display:none>'+ detkomp+'</td></tr>');

			var pnorekx = pnorek.replace(",", ";");

			$('#listrincian > tbody:last-child').append('<tr><td class=ljabatan>' + jabatan + '</td><td class=lgender>' + gender + '</td><td class=lpendidikan>' + pendidikan + '</td><td class=llokasi>' + lokasi + '</td><td class=lwaktu>' + waktu + '</td><td class=latasan>' + atasan + '</td><td class=lkontrak>' + n_kontrak + '</td><td class=lnjpkwt>' + n_jpkwt_asli + '</td><td class=ljumlah>' + jumlah + '</td><td class=lskema_text>' + lskema_text + '</td><td class=lskema style=display:none>' + lskema + '</td><td class=khk>' + khk + '</td><td class=lskillx_text>' + lskillx_text + '</td><td class=lskillx style=display:none>' + lskillx + '</td><td class=llokasiz style=display:none>' + lokasiz + '</td><td class=ljabatanz style=display:none>' + jabatanz + '</td><td class=kump style=display:none>' + kump + '</td><td class=tot style=display:none>' + tot + '</td> <td class=lktrain_text>' + vkumtraintx + '</td><td class=lktrain style=display:none>' + vkumtrainx + '</td> <td class=typeng style=display:none>' + typepeng + '</td> <td class=nlatihan>' + latihan + '</td> <td class=nbekerja>' + bekerja + '</td> <td class=ntypeng>' + ntypepeng + '</td> <td class=lpnorek>' + pnorekx + '</td> <td class=ljskema style=display:none>' + jskema + '</td> <td class=ljpkwt style=display:none>' + jpkwt_asli + '</td> <td class=lreasonrot>' + alasanrot + '</td> <td class=ldetkompo style=display:none>' + detkomp + '</td> </tr>');


			$('#jabx').val('');
			$('#kodejabx').val('');
			$('#lokasix').val('');
			$('#kodelokasix').val('');

			var nextdetkomp = parseInt(detkomp) + 1;
			// alert(nextdetkomp);
			$('#detkompnew').val(nextdetkomp);

			$('#levelx').val('');
			//$('#hkpembagix').val('');
			//$('#umpx').val('');
			$('#ketx').val('');

			$('#kompx1').val('');
			$('#valuex1').val('');
			$('#ketx1').val('');
			$('#myModal').modal('hide');

			$("#divmorekomp").html('');
			//})
		});



		$('#addkomponenx').click(function() {
			var tejo = $("#typejo").val();

			var kjabatan = $('#jabaz').val();
			var kkodejab = $('#kodejabz').val();
			var klokasi = $('#lokasz').val();
			var kkodelok = $('#kodelokasiz').val();

			var khk = $('#hkpembagiz').val();
			var kump = $('#umpz').val();

			var kodelevel = $('#kodelevel').val();
			var namalevel = $('#namalevel').val();
			var kodeskill = $('#kodeskill').val();
			var namaskill = $('#namaskill').val();
			var detkomp = $('#detkomp').val();


			var komplength = $('.xkompx');
			var ckomp = komplength.length;
			console.log(ckomp);
			var x = 1;
			for (x = 1; x <= ckomp; x++) {
				var iddivkom = '#divkompx' + x;
				var iddivval = '#divvaluex' + x;

				var idkom = '#xkompx' + x;
				var idket = '#xketx' + x;
				var idval = '#xvaluex' + x;

				var kkomponen = $(idkom + ' :selected').text();
				var kkodekomponen = $(idkom).val();
				var kvalue = $(idval).val();
				var kvaluex = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(kvalue))));
				var kket = $(idket).val();

				var kvaluexy = kvaluex.replace(",", ".");

				if (kkodekomponen != "") {
					if (kvaluex == "") {
						alert('Setiap Value Harus Diisi Bosss..');
						return false;
					}
				}

				if (kkodekomponen != '') {
					$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>' + kjabatan + '</td><td class=kkodejab style=display:none>' + kkodejab + '</td><td class=klokasi>' + klokasi + '</td><td class=kkodelok style=display:none>' + kkodelok + '</td><td class=lskema_text>' + namalevel + '</td><td class=lskema style=display:none>' + kodelevel + '</td><td class=lskillx_text>' + namaskill + '</td><td class=lskillx style=display:none>' + kodeskill + '</td><td class=kkomponen>' + kkomponen + '</td><td class=kkodekomponen style=display:none>' + kkodekomponen + '</td>' + '</td><td class=kvalue>' + kvaluexy + '</td><td class=kket>' + kket + '</td><td class=kper>-</td><td class=kpengtk>N</td><td class=kpengkes>N</td><td class=khk style=display:none>' + khk + '</td><td class=kump style=display:none>' + kump + '</td><td class=detkompo style=display:none>' + detkomp + '</td></tr>');
				}
			}


			var vkomplength = $('.xvkompx');
			var vckomp = vkomplength.length;
			//console.log(vckomp);
			var x = 1;
			for (x = 1; x <= vckomp; x++) {
				var viddivkom = '#divkompx' + x;
				var viddivval = '#divvaluex' + x;

				var vidkom = '#xvkompx' + x;
				var vidket = '#xvketx' + x;
				var vidval = '#xvvaluex' + x;

				var vkkomponen = $(vidkom + ' :selected').text();
				var vkkodekomponen = $(vidkom).val();
				var vkvalue = $(vidval).val();
				var vkvaluex = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(vkvalue))));
				var vkket = $(vidket).val();

				var vkvaluexy = vkvaluex.replace(",", ".");

				if (vkkodekomponen != "") {
					if (vkvaluex == "") {
						alert('Setiap Value Harus Diisi Bosss..');
						return false;
					}
				}

				if (vkkodekomponen != '') {
					$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>' + kjabatan + '</td><td class=kkodejab style=display:none>' + kkodejab + '</td><td class=klokasi>' + klokasi + '</td><td class=kkodelok style=display:none>' + kkodelok + '</td><td class=lskema_text>' + namalevel + '</td><td class=lskema style=display:none>' + kodelevel + '</td><td class=lskillx_text>' + namaskill + '</td><td class=lskillx style=display:none>' + kodeskill + '</td><td class=kkomponen>' + vkkomponen + '</td><td class=kkodekomponen style=display:none>' + vkkodekomponen + '</td>' + '</td><td class=kvalue>' + vkvaluexy + '</td><td class=kket>' + vkket + '</td><td class=kper>-</td><td class=kpengtk>N</td><td class=kpengkes>N</td><td class=khk style=display:none>' + khk + '</td><td class=kump style=display:none>' + kump + '</td><td class=detkompo style=display:none>' + detkomp + '</td></tr>');
				}
			}



			var bkomplength = $('.xbkompx');
			var bckomp = bkomplength.length;
			//console.log(vckomp);
			var x = 1;
			for (x = 1; x <= bckomp; x++) {
				var biddivkom = '#divkompx' + x;
				var biddivval = '#divvaluex' + x;

				var bidkom = '#xbkompx' + x;
				var bidket = '#xbketx' + x;
				var bidval = '#xbvaluex' + x;
				var idperx = '#pvaluex' + x;
				var idkarx = '#kvaluex' + x;
				var xjkkx = '#kpvaluex' + x;
				var xjkmx = '#kkvaluex' + x;
				var xjhtpx = '#kqvaluex' + x;
				var xjhtkx = '#kmvaluex' + x;

				var vkkomponen = $(bidkom + ' :selected').text();
				var vkkodekomponen = $(bidkom).val();
				var vkvalue = $(bidval).val();

				if ((vkkodekomponen == 7000) || (vkkodekomponen == 7001)) {
					var vkvaluex = $(bidval).val();
				} else {
					var vkvaluex = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(vkvalue))));
				}

				var vkvaluexy = vkvaluex.replace(",", ".");

				var vkket = $(bidket).val();
				var kper = $(idperx).val();
				var kkar = $(idkarx).val();
				var jkkx = $(xjkkx).val();
				var jkmx = $(xjkmx).val();
				var jhtpx = $(xjhtpx).val();
				var jhtkx = $(xjhtkx).val();

				if (vkkodekomponen != "") {
					if (vkvaluex == "") {
						alert('Setiap Value Harus Diisi Bosss..');
						return false;
					}
				}

				if (vkkodekomponen != '') {
					// if(kper!=''){
					// $('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ vkket +'</td><td class=kper>'+ kper +'</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td><td class=detkompo style=display:none>'+ detkomp+'</td></tr>');
					// }
					// else if(jkkx!=''){
					// $('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>'+ kjabatan +'</td><td class=kkodejab style=display:none>'+ kkodejab +'</td><td class=klokasi>'+ klokasi +'</td><td class=kkodelok style=display:none>'+ kkodelok +'</td><td class=kkomponen>'+ vkkomponen +'</td><td class=kkodekomponen style=display:none>'+ vkkodekomponen +'</td>'+'</td><td class=kvalue>-</td><td class=kket>'+ kket +'</td><td class=kper>-</td><td class=khk style=display:none>'+ khk +'</td><td class=kump style=display:none>'+ kump+'</td><td class=detkompo style=display:none>'+ detkomp+'</td></tr>');	
					// }
					// else {
					$('#listkomponen> tbody:last-child').append('<tr><td class=kjabatan>' + kjabatan + '</td><td class=kkodejab style=display:none>' + kkodejab + '</td><td class=klokasi>' + klokasi + '</td><td class=kkodelok style=display:none>' + kkodelok + '</td><td class=lskema_text>' + namalevel + '</td><td class=lskema style=display:none>' + kodelevel + '</td><td class=lskillx_text>' + namaskill + '</td><td class=lskillx style=display:none>' + kodeskill + '</td><td class=kkomponen>' + vkkomponen + '</td><td class=kkodekomponen style=display:none>' + vkkodekomponen + '</td>' + '</td><td class=kvalue>' + vkvaluexy + '</td><td class=kket>' + vkket + '</td><td class=kper>-</td><td class=kpengtk>-</td><td class=kpengkes>-</td><td class=khk style=display:none>' + khk + '</td><td class=kump style=display:none>' + kump + '</td><td class=detkompo style=display:none>' + detkomp + '</td></tr>');
					// }
				}
			}



			$('#jabx').val('');
			$('#kodejabx').val('');
			$('#lokasix').val('');
			$('#kodelokasix').val('');

			$('#levelx').val('');
			$('#ketx').val('');

			$('#kompx1').val('');
			$('#valuex1').val('');
			$('#ketx1').val('');
			$('#myModal').modal('hide');

			$("#divmorekomp").html('');
			//})
		})




		$("#addmorekompx").click(function() {
			var komplength = $('.kompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek' + ckomp;
			var azz = 'wowok' + ckomp;
			var ass = 'wiwik' + ckomp;
			var app = 'pvaluex' + ckomp;
			var akk = 'kvaluex' + ckomp;
			var xapp = 'xpvaluex' + ckomp;
			var xakk = 'xkvaluex' + ckomp;
			var sapp = 'kpvaluex' + ckomp;
			var sakk = 'kkvaluex' + ckomp;
			var sall = 'kqvaluex' + ckomp;
			var satt = 'kmvaluex' + ckomp;
			var ajj = 'jbpjs' + ckomp;
			var idket = 'ketx' + ckomp;
			var idval = 'valuex' + ckomp;
			var idkom = 'kompx' + ckomp;
			var iddivkom = 'divkompx' + ckomp;
			var iddivval = 'divvaluex' + ckomp;
			var iddivket = 'divketx' + ckomp;
			var idcekbpjs_tk = 'tk_' + idval;
			var idcekbpjs_kes = 'kes_' + idval;

			var group = $('#kodekont').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_fixed";
			$.post(url, {
				data: group
			}, function(response) {
				$("#" + idkom).html(response);
			})
			//alert(ckomp);
			//$('#tkomp > tbody:last-child').append("<tr><td><select name="+idkom+" id="+idkom+" class='kompx form-control select2' onchange='getsifat(this,"+ckomp+",1)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; 
																																																																																																									?></select></td><td><input type='text' class='form-control pull-right' id="+idval+" name='valuex' style='width:250px' onchange='hitung(this,"+ckomp+",1)'></td><td><select class='form-control pull-right' id="+idket+" style='width:250px'><option value=''>Pilih</option></select></td></tr>");

			$('#tkomp > tbody:last-child').append("<tr><td><select name=" + idkom + " id=" + idkom + " class='kompx form-control select2' onchange='getsifat(this," + ckomp + ",1)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; 
																																																																																																														?></select></td><td><input type='text' class='form-control pull-right' id=" + idval + " name='valuex' style='width:150px' onchange='hitung(this," + ckomp + ",1)'></td><td><select class='form-control pull-right' id=" + idket + " style='width:150px'><option value=''>Pilih</option></select></td><td><center><input type='checkbox' class='tk' id=" + idcekbpjs_tk + " name='cekbpjs_tk_fixed' value=" + idval + " checked disabled></center></td><td><center><input type='checkbox' class='kes' id=" + idcekbpjs_kes + " name='cekbpjs_kes_fixed' value=" + idval + " checked disabled></center></td>	</tr>");
		});

		// perubahan disabled from indisabled

		$("#xaddmorekompx").click(function() {
			var komplength = $('.xkompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek' + ckomp;
			var azz = 'wowok' + ckomp;
			var ass = 'wiwik' + ckomp;
			var app = 'pvaluex' + ckomp;
			var akk = 'kvaluex' + ckomp;
			var xapp = 'xpvaluex' + ckomp;
			var xakk = 'xkvaluex' + ckomp;
			var sapp = 'kpvaluex' + ckomp;
			var sakk = 'kkvaluex' + ckomp;
			var sall = 'kqvaluex' + ckomp;
			var satt = 'kmvaluex' + ckomp;
			var ajj = 'jbpjs' + ckomp;
			var idket = 'xketx' + ckomp;
			var idval = 'xvaluex' + ckomp;
			var idkom = 'xkompx' + ckomp;
			var iddivkom = 'divkompx' + ckomp;
			var iddivval = 'divvaluex' + ckomp;
			var iddivket = 'divketx' + ckomp;

			//var group = $('#kodekontz').val(); 
			var aix = $("#kodekontz").val();
			if (aix == 'PKWT') {
				var group = 1;
			} else if (aix == 'KEMITRAAN') {
				var group = 2;
			} else if (aix == 'MAGANG') {
				var group = 3;
			} else if (aix == 'THL') {
				var group = 5;
			} else {
				var group = 4;
			}
			//alert(group);
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_fixed";
			$.post(url, {
				data: group
			}, function(response) {
				$("#" + idkom).html(response);
			})
			//alert(ckomp);
			$('#tkompx > tbody:last-child').append("<tr><td><select name=" + idkom + " id=" + idkom + " class='xkompx form-control select2' onchange='getsifatx(this," + ckomp + ",1)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; 
																																																																																																																?></select></td><td><input type='text' class='form-control pull-right' id=" + idval + " name='xvaluex' style='width:250px'></td><td><select class='form-control pull-right' id=" + idket + " style='width:250px'><option value=''>Pilih</option></select></td></tr>");
		});


		$("#vaddmorekompx").click(function() {
			var komplength = $('.vkompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek' + ckomp;
			var azz = 'wowok' + ckomp;
			var ass = 'wiwik' + ckomp;
			var app = 'pvaluex' + ckomp;
			var akk = 'kvaluex' + ckomp;
			var xapp = 'xpvaluex' + ckomp;
			var xakk = 'xkvaluex' + ckomp;
			var sapp = 'kpvaluex' + ckomp;
			var sakk = 'kkvaluex' + ckomp;
			var sall = 'kqvaluex' + ckomp;
			var satt = 'kmvaluex' + ckomp;
			var ajj = 'jbpjs' + ckomp;
			var idket = 'vketx' + ckomp;
			var idval = 'vvaluex' + ckomp;
			var idkom = 'vkompx' + ckomp;
			var iddivkom = 'divkompx' + ckomp;
			var iddivval = 'divvaluex' + ckomp;
			var iddivket = 'divketx' + ckomp;
			var idcekbpjs_tk = 'tk_' + idval;
			var idcekbpjs_kes = 'kes_' + idval;

			var group = $('#kodekont').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_variabel";
			$.post(url, {
				data: group
			}, function(response) {
				$("#" + idkom).html(response);
			})
			//alert(ckomp);			
			$('#tkomp_var > tbody:last-child').append("<tr><td><select name=" + idkom + " id=" + idkom + " class='vkompx form-control select2' onchange='getsifat(this," + ckomp + ",2)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; 
																																																																																																																	?></select></td><td><input type='text' class='form-control pull-right' id=" + idval + " name='vvaluex' style='width:150px' ></td><td><select class='form-control pull-right' id=" + idket + " style='width:150px'><option value=''>Pilih</option></select></td><td><center><input type='checkbox' class='tk' id=" + idcekbpjs_tk + " onclick='jumlahkan_tk(\"" + idval + "\",\"" + idcekbpjs_tk + "\",\"" + idcekbpjs_kes + "\")' name='cekbpjs_tk' value=" + idval + "></center></td><td><center><input type='checkbox' class='kes' id=" + idcekbpjs_kes + " onclick='jumlahkan_kes(\"" + idval + "\",\"" + idcekbpjs_kes + "\",\"" + idcekbpjs_tk + "\")' name='cekbpjs_kes' value=" + idval + "></center></td></tr>");
		});


		$("#xvaddmorekompx").click(function() {
			var komplength = $('.xvkompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek' + ckomp;
			var azz = 'wowok' + ckomp;
			var ass = 'wiwik' + ckomp;
			var app = 'pvaluex' + ckomp;
			var akk = 'kvaluex' + ckomp;
			var xapp = 'xpvaluex' + ckomp;
			var xakk = 'xkvaluex' + ckomp;
			var sapp = 'kpvaluex' + ckomp;
			var sakk = 'kkvaluex' + ckomp;
			var sall = 'kqvaluex' + ckomp;
			var satt = 'kmvaluex' + ckomp;
			var ajj = 'jbpjs' + ckomp;
			var idket = 'xvketx' + ckomp;
			var idval = 'xvvaluex' + ckomp;
			var idkom = 'xvkompx' + ckomp;
			var iddivkom = 'divkompx' + ckomp;
			var iddivval = 'divvaluex' + ckomp;
			var iddivket = 'divketx' + ckomp;

			var aix = $("#kodekontz").val();
			if (aix == 'PKWT') {
				var group = 1;
			} else if (aix == 'KEMITRAAN') {
				var group = 2;
			} else if (aix == 'MAGANG') {
				var group = 3;
			} else if (aix == 'THL') {
				var group = 5;
			} else {
				var group = 4;
			}

			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_variabel";
			$.post(url, {
				data: group
			}, function(response) {
				$("#" + idkom).html(response);
			})
			//alert(ckomp);
			$('#tkomp_varx > tbody:last-child').append("<tr><td><select name=" + idkom + " id=" + idkom + " class='xvkompx form-control select2' onchange='getsifatx(this," + ckomp + ",2)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; 
																																																																																																																		?></select></td><td><input type='text' class='form-control pull-right' id=" + idval + " name='vvaluex' style='width:250px' ></td><td><select class='form-control pull-right' id=" + idket + " style='width:250px'><option value=''>Pilih</option></select></td></tr>");
		});


		$("#baddmorekompx").click(function() {
			var komplength = $('.bkompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek' + ckomp;
			var azz = 'wuwuk' + ckomp;
			var ass = 'zozok' + ckomp;
			var abb = 'zazak' + ckomp;
			var acc = 'zuzuk' + ckomp;
			var agg = 'zezek' + ckomp;
			var idket = 'bketx' + ckomp;
			var idval = 'bvaluex' + ckomp;
			var idkom = 'bkompx' + ckomp;
			var idname = 'nvaluex' + ckomp;
			var idnamex = 'mvaluex' + ckomp;
			var idvalx = 'pvaluex' + ckomp;
			var xidvalx = 'kvaluex' + ckomp;
			var aidnamex = 'nkpvaluex' + ckomp;
			var bidnamex = 'nkkvaluex' + ckomp;
			var cidnamex = 'nkqvaluex' + ckomp;
			var didnamex = 'nkmvaluex' + ckomp;
			var aidvalx = 'kpvaluex' + ckomp;
			var bidvalx = 'kkvaluex' + ckomp;
			var cidvalx = 'kqvaluex' + ckomp;
			var didvalx = 'kmvaluex' + ckomp;

			var group = $('#kodekont').val();
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
			$.post(url, {
				data: group
			}, function(response) {
				$("#" + idkom).html(response);
			})
			//alert(ckomp);
			$('#tkomp_ben > tbody:last-child').append("<tr><td><select name=" + idkom + " id=" + idkom + " class='bkompx form-control select2' onchange='getsifat(this," + ckomp + ",3)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; 
																																																																																																																	?></select></td><td><input type='text' class='form-control pull-right' id=" + idval + " name='bvaluex' style='width:250px' ></td><td><select class='form-control pull-right' id=" + idket + " style='width:250px'><option value=''>Pilih</option></select></td></tr>");

			//$('#tkomp_ben > tbody:last-child').append("<tr><td><select name="+idkom+" id="+idkom+" class='bkompx form-control select2' onchange='getsifat(this,"+ckomp+",3)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; 
																																																																																																												?></select></td><td><input type='text' class='form-control pull-right' id="+idval+" name='bvaluex' style='width:250px' ></td><td><select class='form-control pull-right' id="+idket+" style='width:250px'><option value=''>Pilih</option></select></td></tr>                <tr id="+aww+" style='display:none'><td><input type='text' class='form-control pull-right' id="+idname+" name="+idname+" value='Perusahaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+idvalx+" name="+idvalx+" style='width:250px' readOnly></td><td></td></tr>                     <tr id="+azz+" style='display:none'><td><input type='text' class='form-control pull-right' id="+idnamex+" name="+idnamex+" value='Karyawan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+xidvalx+" name="+xidvalx+" style='width:250px' readOnly></td><td></td></tr>                    <tr id="+ass+" style='display:none'><td><input type='text' class='form-control pull-right' id="+aidnamex+" name="+aidnamex+" value='JKK Kecelakaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+aidvalx+" name="+aidvalx+" style='width:250px' readOnly></td><td></td></tr>                    <tr id="+abb+" style='display:none'><td><input type='text' class='form-control pull-right' id="+bidnamex+" name="+bidnamex+" value='JKM Kematian' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+bidvalx+" name="+bidvalx+" style='width:250px' readOnly></td><td></td></tr>                    <tr id="+acc+" style='display:none'><td><input type='text' class='form-control pull-right' id="+cidnamex+" name="+cidnamex+" value='JHT Perusahaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+cidvalx+" name="+cidvalx+" style='width:250px' readOnly></td><td></td></tr>                    <tr id="+agg+" style='display:none'><td><input type='text' class='form-control pull-right' id="+didnamex+" name="+didnamex+" value='JHT Karyawan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id="+didvalx+" name="+didvalx+" style='width:250px' readOnly></td><td></td></tr>");
		});


		$("#xbaddmorekompx").click(function() {
			var komplength = $('.xbkompx');
			var ckomp = komplength.length + 1;
			var aww = 'wewek' + ckomp;
			var azz = 'wuwuk' + ckomp;
			var ass = 'zozok' + ckomp;
			var abb = 'zazak' + ckomp;
			var acc = 'zuzuk' + ckomp;
			var agg = 'zezek' + ckomp;
			var idket = 'xbketx' + ckomp;
			var idval = 'xbvaluex' + ckomp;
			var idkom = 'xbkompx' + ckomp;
			var idname = 'nvaluex' + ckomp;
			var idnamex = 'mvaluex' + ckomp;
			var idvalx = 'pvaluex' + ckomp;
			var xidvalx = 'kvaluex' + ckomp;
			var aidnamex = 'nkpvaluex' + ckomp;
			var bidnamex = 'nkkvaluex' + ckomp;
			var cidnamex = 'nkqvaluex' + ckomp;
			var didnamex = 'nkmvaluex' + ckomp;
			var aidvalx = 'kpvaluex' + ckomp;
			var bidvalx = 'kkvaluex' + ckomp;
			var cidvalx = 'kqvaluex' + ckomp;
			var didvalx = 'kmvaluex' + ckomp;

			var aix = $("#kodekontz").val();
			if (aix == 'PKWT') {
				var group = 1;
			} else if (aix == 'KEMITRAAN') {
				var group = 2;
			} else if (aix == 'MAGANG') {
				var group = 3;
			} else if (aix == 'THL') {
				var group = 5;
			} else {
				var group = 4;
			}

			//var group = $('#kodekont').val(); 
			var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
			$.post(url, {
				data: group
			}, function(response) {
				$("#" + idkom).html(response);
			})
			//alert(ckomp);
			$('#tkomp_benx > tbody:last-child').append("<tr><td><select name=" + idkom + " id=" + idkom + " class='xbkompx form-control select2' onchange='getsifatx(this," + ckomp + ",3)' style='width:250px'><option value=''></option><?php //echo $cmbkomp; 
																																																																																																																		?></select></td><td><input type='text' class='form-control pull-right' id=" + idval + " name='bvaluex' style='width:250px' ></td><td><select class='form-control pull-right' id=" + idket + " style='width:250px'><option value=''>Pilih</option></select></td></tr>                <tr id=" + aww + " style='display:none'><td><input type='text' class='form-control pull-right' id=" + idname + " name=" + idname + " value='Perusahaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id=" + idvalx + " name=" + idvalx + " style='width:250px' readOnly></td><td></td></tr>                     <tr id=" + azz + " style='display:none'><td><input type='text' class='form-control pull-right' id=" + idnamex + " name=" + idnamex + " value='Karyawan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id=" + xidvalx + " name=" + xidvalx + " style='width:250px' readOnly></td><td></td></tr>                    <tr id=" + ass + " style='display:none'><td><input type='text' class='form-control pull-right' id=" + aidnamex + " name=" + aidnamex + " value='JKK Kecelakaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id=" + aidvalx + " name=" + aidvalx + " style='width:250px' readOnly></td><td></td></tr>                    <tr id=" + abb + " style='display:none'><td><input type='text' class='form-control pull-right' id=" + bidnamex + " name=" + bidnamex + " value='JKM Kematian' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id=" + bidvalx + " name=" + bidvalx + " style='width:250px' readOnly></td><td></td></tr>                    <tr id=" + acc + " style='display:none'><td><input type='text' class='form-control pull-right' id=" + cidnamex + " name=" + cidnamex + " value='JHT Perusahaan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id=" + cidvalx + " name=" + cidvalx + " style='width:250px' readOnly></td><td></td></tr>                    <tr id=" + agg + " style='display:none'><td><input type='text' class='form-control pull-right' id=" + didnamex + " name=" + didnamex + " value='JHT Karyawan' style='width:250px' readOnly></td><td><input type='text' class='form-control pull-right' id=" + didvalx + " name=" + didvalx + " style='width:250px' readOnly></td><td></td></tr>");
		});

	});

	function custom_alert(output_msg, title_msg) {
		if (!title_msg) title_msg = 'Alert';
		//if (!output_msg) output_msg = 'No Message to Display.';
		if (!output_msg) output_msg = 'Data Tersimpan.';
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


	function delfile(nojo, komponen, jenis) {
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/deletefile/',
			type: 'POST',
			data: {
				file: komponen,
				nojoz: nojo,
				jenisz: jenis
			},
			success: function(response) {
				//alert(response);
				location.reload();
			},
			error: function() {
				alert('error delete attachment');
			}
		});
	}


	function delete_Row(row, nid) {
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/deleterinc/',
			type: 'POST',
			data: {
				bid: nid
			},
			success: function(response) {

			},
			error: function() {
				alert('error delete rincian');
			}
		});

		var i = row.parentNode.parentNode.rowIndex;
		var y = 'rinc';
		document.getElementById('listrincianx').deleteRow(i, y);
		//alert(nid);
	}


	function delete_Row2(row, nid) {
		// alert(row);
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/deleterinc_komp/',
			type: 'POST',
			data: {
				bid: nid
			},
			success: function(response) {

			},
			error: function() {
				alert('error delete rincian');
			}
		});

		var i = row.parentNode.parentNode.rowIndex;
		var y = 'kompon';
		document.getElementById('listkompx').deleteRow(i, y);
		// alert(nid);
	}


	function delete_Row3(row, nid) {
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/deleterinc_proc/',
			type: 'POST',
			data: {
				bid: nid
			},
			success: function(response) {

			},
			error: function() {
				alert('error delete procurement');
			}
		});

		var i = row.parentNode.parentNode.rowIndex;
		var y = 'proc';
		document.getElementById('listproc').deleteRow(i, y);
		//alert(nid);
	}


	function delete_Row_perner(row, nid) {
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/deleterinc_pernx/',
			type: 'POST',
			data: {
				bid: nid
			},
			success: function(response) {

			},
			error: function() {
				alert('error delete perner');
			}
		});

		var i = row.parentNode.parentNode.rowIndex;
		var y = 'pern';
		document.getElementById('listpernerx').deleteRow(i, y);
		//alert(nid);
	}


	function deleteRow(row, jns) {
		var i = row.parentNode.parentNode.rowIndex;
		if (jns == 'rinc') {
			document.getElementById('listrincianx').deleteRow(i);
		} else if (jns == 'kompon') {
			document.getElementById('listkompx').deleteRow(i);
		} else if (jns == 'proc') {
			document.getElementById('listproc').deleteRow(i);
		} else {
			document.getElementById('listpernerx').deleteRow(i);
		}
	}


	function hitung(a, b, c) {
		var arr = document.getElementsByName('valuex');
		var kump = document.getElementById("umpx").value;
		var jpbpjs = document.getElementById("jpbpjs").value;

		var pbtkp1 = document.getElementById("pbtkp1").value;
		var pbtkp2 = document.getElementById("pbtkp2").value;
		var pbtkp3 = document.getElementById("pbtkp3").value;
		var pbtkp4 = document.getElementById("pbtkp4").value;
		var kodekont = $("#kodekont").val();

		var tot = 0;
		for (var i = 0; i < arr.length; i++) {
			if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
				tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
		}

		var aaa = $("input[name='cekbpjs_tk']:checked");
		var jml_tk = 0;
		var bbb;
		for (var i = 0; i < aaa.length; i++) {
			bbb = document.getElementById(aaa[i].value).value;
			bbb = bbb.replaceAll('.', '');
			bbb = bbb.replaceAll(',', '');
			jml_tk = jml_tk + parseInt(bbb);
		}

		var ccc = $("input[name='cekbpjs_kes']:checked");
		var jml_kes = 0;
		var ddd;
		for (var i = 0; i < ccc.length; i++) {
			ddd = document.getElementById(ccc[i].value).value;
			ddd = ddd.replaceAll('.', '');
			ddd = ddd.replaceAll(',', '');
			jml_kes = jml_kes + parseInt(ddd);
		}

		var jumtot_tk = tot + jml_tk;
		var jumtot_kes = tot + jml_kes;

		if (jumtot_tk < kump) {
			alert('Pengkali BPJS TK akan menggunakan UMK karena total pengkali BPJS TK masih lebih kecil dari UMK, TerimaKasih');
			var tot_tk = kump;
		} else {
			var tot_tk = jumtot_tk;
		}

		if (jumtot_kes < kump) {
			alert('Pengkali BPJS Kes akan menggunakan UMK karena total pengkali BPJS Kes masih lebih kecil dari UMK, TerimaKasih');
			var tot_kes = kump;
		} else {
			var tot_kes = jumtot_kes;
		}

		var asu = (pbtkp1 / 100) * tot_tk;
		var asus = Math.round(asu);
		$('#vbtkp1').val(asus);

		var asi = (pbtkp2 / 100) * tot_tk;
		var asis = Math.round(asi);
		$('#vbtkp2').val(asis);

		var ase = (pbtkp3 / 100) * tot_kes;
		var ases = Math.round(ase);
		$('#vbtkp3').val(ases);

		var asa = (pbtkp4 / 100) * tot_kes;
		var asas = Math.round(asa);
		$('#vbtkp4').val(asas);
	}


	function getsifat(a, b, c) {
		var komp = a.value;
		var nkom = b;

		var komplength = $('.bkompx');
		var ckomp = komplength.length + 1;
		var aww = 'wewek' + ckomp;
		var azz = 'wowok' + ckomp;
		var ass = 'wiwik' + ckomp;
		var app = 'pvaluex' + ckomp;
		var akk = 'kvaluex' + ckomp;
		var xapp = 'xpvaluex' + ckomp;
		var xakk = 'xkvaluex' + ckomp;
		var sapp = 'kpvaluex' + ckomp;
		var sakk = 'kkvaluex' + ckomp;
		var sall = 'kqvaluex' + ckomp;
		var satt = 'kmvaluex' + ckomp;
		var ajj = 'jbpjs' + ckomp;
		var idket = 'bketx' + ckomp;
		var idval = 'bvaluex' + ckomp;
		var idkom = 'bkompx' + ckomp;
		var iddivkom = 'divkompx' + ckomp;
		var iddivval = 'divvaluex' + ckomp;
		var iddivket = 'divketx' + ckomp;

		var group = $('#kodekont').val();
		var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
		$.post(url, {
			data: group
		}, function(response) {
			$("#" + idkom).html(response);
		})

		//var aww = 'wewek'+ckomp;
		//alert(nkom);


		if ((komp == '4058') || (komp == '8888')) {
			document.getElementById("bvaluex" + nkom).readOnly = true;
			document.getElementById('wewek' + nkom).removeAttribute("style");
			document.getElementById('wuwuk' + nkom).removeAttribute("style");
			document.getElementById('zozok' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zazak' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zuzuk' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zezek' + nkom).setAttribute("style", "display:none;");

			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {
				data: komp
			}, function(response) {
				console.log(c);
				console.log(nkom);
				if (c == '1') {
					$("#ketx" + nkom).html(response);
				} else if (c == '2') {
					$("#vketx" + nkom).html(response);
				} else {
					$("#bketx" + nkom).html(response);
				}
			});


			var vlong = [];
			$('.kompx').each(function(i) {
				vlong[i] = $(this).val();
			});

			var vlong2 = vlong.join(',');

			var fixed = document.getElementById('fixed').value;
			var kump = document.getElementById('umpx').value;
			var arrq = document.getElementsByName('valuex');
			var myarrq = vlong2.split(",");
			var jummanq = myarrq.length;
			var kjummanq = arrq.length;
			//console.log(arrq);console.log(kjummanq);console.log(vlong2);console.log(jummanq);

			var totq = 0;
			var edcba = 0;
			for (i = 0; i < jummanq; i++) {
				var n = fixed.includes(myarrq[i]);
				if (myarrq[i] == '2008') {
					edcba += parseFloat(arrq[i].value);
				}

				if (n == true) {
					if (parseFloat(arrq[i].value))
						totq += parseFloat(arrq[i].value);
				}
			}

			var atot = totq;
			var asdf = edcba;
			var abcde = atot - asdf;
			var abcdef = parseFloat(abcde);
			//console.log(atot);console.log(asdf);console.log(abcde);console.log(abcdef);
			var hjk = parseFloat(0.04 * abcdef);
			var pop = parseFloat(0.01 * abcdef);
			var xhjk = parseFloat(0.05 * abcdef);
			var xpop = 0;

			if (komp == '4058') {
				$('#pvaluex' + nkom).val(xhjk);
				$('#kvaluex' + nkom).val(xpop);
			} else {
				$('#pvaluex' + nkom).val(hjk);
				$('#kvaluex' + nkom).val(pop);
			}

		} else if ((komp == '4065') || (komp == '4066')) {
			document.getElementById("bvaluex" + nkom).readOnly = true;
			document.getElementById('wewek' + nkom).removeAttribute("style");
			document.getElementById('wuwuk' + nkom).removeAttribute("style");
			document.getElementById('zozok' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zazak' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zuzuk' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zezek' + nkom).setAttribute("style", "display:none;");

			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {
				data: komp
			}, function(response) {
				console.log(c);
				console.log(nkom);
				if (c == '1') {
					$("#ketx" + nkom).html(response);
				} else if (c == '2') {
					$("#vketx" + nkom).html(response);
				} else {
					$("#bketx" + nkom).html(response);
				}
			});

			var vlong = [];
			$('.kompx').each(function(i) {
				vlong[i] = $(this).val();
			});

			var vlong2 = vlong.join(',');

			var fixed = document.getElementById('fixed').value;
			var kump = document.getElementById('umpx').value;
			var arrq = document.getElementsByName('valuex');
			var myarrq = vlong2.split(",");
			var jummanq = myarrq.length;
			var kjummanq = arrq.length;
			//console.log(fixed);console.log(kump);console.log(jummanq);console.log(kjummanq);

			var totq = 0;
			var edcba = 0;
			for (i = 0; i < jummanq; i++) {
				var n = fixed.includes(myarrq[i]);
				if (myarrq[i] == '2008') {
					edcba += parseFloat(arrq[i].value);
				}

				if (n == true) {
					if (parseFloat(arrq[i].value))
						totq += parseFloat(arrq[i].value);
				}
			}

			var atot = totq;
			var asdf = edcba;
			var abcde = atot - asdf;
			var abcdef = parseFloat(abcde);
			var hjk = parseFloat(0.02 * abcdef);
			var pop = parseFloat(0.01 * abcdef);
			var mlm = parseFloat(0.03 * abcdef);
			var pip = 0;

			if (komp == '4066') {
				$('#pvaluex' + nkom).val(mlm);
				$('#kvaluex' + nkom).val(pip);
			} else {
				$('#pvaluex' + nkom).val(hjk);
				$('#kvaluex' + nkom).val(pop);
			}

		} else if ((komp == '7777') || (komp == '6666')) {
			document.getElementById("bvaluex" + nkom).readOnly = true;
			document.getElementById('wewek' + nkom).setAttribute("style", "display:none;");
			document.getElementById('wuwuk' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zozok' + nkom).removeAttribute("style");
			document.getElementById('zazak' + nkom).removeAttribute("style");
			document.getElementById('zuzuk' + nkom).removeAttribute("style");
			document.getElementById('zezek' + nkom).removeAttribute("style");

			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {
				data: komp
			}, function(response) {
				console.log(c);
				console.log(nkom);
				if (c == '1') {
					$("#ketx" + nkom).html(response);
				} else if (c == '2') {
					$("#vketx" + nkom).html(response);
				} else {
					$("#bketx" + nkom).html(response);
				}
			});

			var vlong = [];
			$('.kompx').each(function(i) {
				vlong[i] = $(this).val();
			});

			var vlong2 = vlong.join(',');

			var fixed = document.getElementById('fixed').value;
			var kump = document.getElementById('umpx').value;
			var arrq = document.getElementsByName('valuex');
			var myarrq = vlong2.split(",");
			var jummanq = myarrq.length;
			var kjummanq = arrq.length;

			var totq = 0;
			var edcba = 0;
			for (i = 0; i < jummanq; i++) {
				var n = fixed.includes(myarrq[i]);
				if (myarrq[i] == '2008') {
					edcba += parseFloat(arrq[i].value);
				}

				if (n == true) {
					if (parseFloat(arrq[i].value))
						totq += parseFloat(arrq[i].value);
				}
			}

			var atot = totq;
			var asdf = edcba;
			var abcde = atot - asdf;
			var abcdef = parseFloat(abcde);
			var hjk = parseFloat(0.0024 * abcdef);
			var pop = parseFloat(0.003 * abcdef);
			var mlm = parseFloat(0.057 * abcdef);
			var mkm = parseFloat(0.037 * abcdef);
			var msm = parseFloat(0.02 * abcdef);
			var pip = 0;

			if (komp == '6666') {
				$('#kpvaluex' + nkom).val(hjk);
				$('#kkvaluex' + nkom).val(pop);
				$('#kqvaluex' + nkom).val(mkm);
				$('#kmvaluex' + nkom).val(msm);
			} else {
				$('#kpvaluex' + nkom).val(hjk);
				$('#kkvaluex' + nkom).val(pop);
				$('#kqvaluex' + nkom).val(mlm);
				$('#kmvaluex' + nkom).val(pip);
			}
		} else {
			if (c == '1') {
				document.getElementById("valuex" + nkom).readOnly = false;
			} else if (c == '2') {
				document.getElementById("vvaluex" + nkom).readOnly = false;
			} else {
				document.getElementById("bvaluex" + nkom).readOnly = false;
			}

			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {
				data: komp
			}, function(response) {
				console.log(c);
				console.log(nkom);
				if (c == '1') {
					$("#ketx" + nkom).html(response);
				} else if (c == '2') {
					$("#vketx" + nkom).html(response);
				} else {
					$("#bketx" + nkom).html(response);
				}
			})
		}

	}



	function getsifatx(a, b, c) {
		var komp = a.value;
		var nkom = b;

		var komplength = $('.xbkompx');
		var ckomp = komplength.length + 1;
		var aww = 'wewek' + ckomp;
		var azz = 'wowok' + ckomp;
		var ass = 'wiwik' + ckomp;
		var app = 'pvaluex' + ckomp;
		var akk = 'kvaluex' + ckomp;
		var xapp = 'xpvaluex' + ckomp;
		var xakk = 'xkvaluex' + ckomp;
		var sapp = 'kpvaluex' + ckomp;
		var sakk = 'kkvaluex' + ckomp;
		var sall = 'kqvaluex' + ckomp;
		var satt = 'kmvaluex' + ckomp;
		var ajj = 'jbpjs' + ckomp;
		var idket = 'xbketx' + ckomp;
		var idval = 'xbvaluex' + ckomp;
		var idkom = 'xbkompx' + ckomp;
		var iddivkom = 'divkompx' + ckomp;
		var iddivval = 'divvaluex' + ckomp;
		var iddivket = 'divketx' + ckomp;

		var group = $('#kodekontz').val();
		var url = "<?php echo base_url(); ?>index.php/home/pilih_kompon_benefit";
		$.post(url, {
			data: group
		}, function(response) {
			$("#" + idkom).html(response);
		})

		//var aww = 'wewek'+ckomp;
		//alert(nkom);


		if ((komp == '4058') || (komp == '8888')) {
			document.getElementById("bvaluex" + nkom).readOnly = true;
			document.getElementById('wewek' + nkom).removeAttribute("style");
			document.getElementById('wuwuk' + nkom).removeAttribute("style");
			document.getElementById('zozok' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zazak' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zuzuk' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zezek' + nkom).setAttribute("style", "display:none;");

			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {
				data: komp
			}, function(response) {
				console.log(c);
				console.log(nkom);
				if (c == '1') {
					$("#ketx" + nkom).html(response);
				} else if (c == '2') {
					$("#vketx" + nkom).html(response);
				} else {
					$("#bketx" + nkom).html(response);
				}
			});


			var vlong = [];
			$('.kompx').each(function(i) {
				vlong[i] = $(this).val();
			});

			var vlong2 = vlong.join(',');

			var fixed = document.getElementById('fixed').value;
			var kump = document.getElementById('umpx').value;
			var arrq = document.getElementsByName('valuex');
			var myarrq = vlong2.split(",");
			var jummanq = myarrq.length;
			var kjummanq = arrq.length;
			//console.log(arrq);console.log(kjummanq);console.log(vlong2);console.log(jummanq);

			var totq = 0;
			var edcba = 0;
			for (i = 0; i < jummanq; i++) {
				var n = fixed.includes(myarrq[i]);
				if (myarrq[i] == '2008') {
					edcba += parseFloat(arrq[i].value);
				}

				if (n == true) {
					if (parseFloat(arrq[i].value))
						totq += parseFloat(arrq[i].value);
				}
			}

			var atot = totq;
			var asdf = edcba;
			var abcde = atot - asdf;
			var abcdef = parseFloat(abcde);
			//console.log(atot);console.log(asdf);console.log(abcde);console.log(abcdef);
			var hjk = parseFloat(0.04 * abcdef);
			var pop = parseFloat(0.01 * abcdef);
			var xhjk = parseFloat(0.05 * abcdef);
			var xpop = 0;

			if (komp == '4058') {
				$('#pvaluex' + nkom).val(xhjk);
				$('#kvaluex' + nkom).val(xpop);
			} else {
				$('#pvaluex' + nkom).val(hjk);
				$('#kvaluex' + nkom).val(pop);
			}

		} else if ((komp == '4065') || (komp == '4066')) {
			document.getElementById("bvaluex" + nkom).readOnly = true;
			document.getElementById('wewek' + nkom).removeAttribute("style");
			document.getElementById('wuwuk' + nkom).removeAttribute("style");
			document.getElementById('zozok' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zazak' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zuzuk' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zezek' + nkom).setAttribute("style", "display:none;");

			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {
				data: komp
			}, function(response) {
				console.log(c);
				console.log(nkom);
				if (c == '1') {
					$("#ketx" + nkom).html(response);
				} else if (c == '2') {
					$("#vketx" + nkom).html(response);
				} else {
					$("#bketx" + nkom).html(response);
				}
			});

			var vlong = [];
			$('.kompx').each(function(i) {
				vlong[i] = $(this).val();
			});

			var vlong2 = vlong.join(',');

			var fixed = document.getElementById('fixed').value;
			var kump = document.getElementById('umpx').value;
			var arrq = document.getElementsByName('valuex');
			var myarrq = vlong2.split(",");
			var jummanq = myarrq.length;
			var kjummanq = arrq.length;
			//console.log(fixed);console.log(kump);console.log(jummanq);console.log(kjummanq);

			var totq = 0;
			var edcba = 0;
			for (i = 0; i < jummanq; i++) {
				var n = fixed.includes(myarrq[i]);
				if (myarrq[i] == '2008') {
					edcba += parseFloat(arrq[i].value);
				}

				if (n == true) {
					if (parseFloat(arrq[i].value))
						totq += parseFloat(arrq[i].value);
				}
			}

			var atot = totq;
			var asdf = edcba;
			var abcde = atot - asdf;
			var abcdef = parseFloat(abcde);
			var hjk = parseFloat(0.02 * abcdef);
			var pop = parseFloat(0.01 * abcdef);
			var mlm = parseFloat(0.03 * abcdef);
			var pip = 0;

			if (komp == '4066') {
				$('#pvaluex' + nkom).val(mlm);
				$('#kvaluex' + nkom).val(pip);
			} else {
				$('#pvaluex' + nkom).val(hjk);
				$('#kvaluex' + nkom).val(pop);
			}

		} else if ((komp == '7777') || (komp == '6666')) {
			document.getElementById("bvaluex" + nkom).readOnly = true;
			document.getElementById('wewek' + nkom).setAttribute("style", "display:none;");
			document.getElementById('wuwuk' + nkom).setAttribute("style", "display:none;");
			document.getElementById('zozok' + nkom).removeAttribute("style");
			document.getElementById('zazak' + nkom).removeAttribute("style");
			document.getElementById('zuzuk' + nkom).removeAttribute("style");
			document.getElementById('zezek' + nkom).removeAttribute("style");

			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {
				data: komp
			}, function(response) {
				console.log(c);
				console.log(nkom);
				if (c == '1') {
					$("#ketx" + nkom).html(response);
				} else if (c == '2') {
					$("#vketx" + nkom).html(response);
				} else {
					$("#bketx" + nkom).html(response);
				}
			});

			var vlong = [];
			$('.kompx').each(function(i) {
				vlong[i] = $(this).val();
			});

			var vlong2 = vlong.join(',');

			var fixed = document.getElementById('fixed').value;
			var kump = document.getElementById('umpx').value;
			var arrq = document.getElementsByName('valuex');
			var myarrq = vlong2.split(",");
			var jummanq = myarrq.length;
			var kjummanq = arrq.length;

			var totq = 0;
			var edcba = 0;
			for (i = 0; i < jummanq; i++) {
				var n = fixed.includes(myarrq[i]);
				if (myarrq[i] == '2008') {
					edcba += parseFloat(arrq[i].value);
				}

				if (n == true) {
					if (parseFloat(arrq[i].value))
						totq += parseFloat(arrq[i].value);
				}
			}

			var atot = totq;
			var asdf = edcba;
			var abcde = atot - asdf;
			var abcdef = parseFloat(abcde);
			var hjk = parseFloat(0.0024 * abcdef);
			var pop = parseFloat(0.003 * abcdef);
			var mlm = parseFloat(0.057 * abcdef);
			var mkm = parseFloat(0.037 * abcdef);
			var msm = parseFloat(0.02 * abcdef);
			var pip = 0;

			if (komp == '6666') {
				$('#kpvaluex' + nkom).val(hjk);
				$('#kkvaluex' + nkom).val(pop);
				$('#kqvaluex' + nkom).val(mkm);
				$('#kmvaluex' + nkom).val(msm);
			} else {
				$('#kpvaluex' + nkom).val(hjk);
				$('#kkvaluex' + nkom).val(pop);
				$('#kqvaluex' + nkom).val(mlm);
				$('#kmvaluex' + nkom).val(pip);
			}
		} else {
			if (c == '1') {
				document.getElementById("xvaluex" + nkom).readOnly = false;
			} else if (c == '2') {
				document.getElementById("xvvaluex" + nkom).readOnly = false;
			} else {
				document.getElementById("xbvaluex" + nkom).readOnly = false;
			}

			var url = "<?php echo base_url(); ?>index.php/home/pilih_sifatkomp";
			$.post(url, {
				data: komp
			}, function(response) {
				console.log(c);
				console.log(nkom);
				if (c == '1') {
					$("#xketx" + nkom).html(response);
				} else if (c == '2') {
					$("#xvketx" + nkom).html(response);
				} else {
					$("#xbketx" + nkom).html(response);
				}
			})
		}

	}


	function ubahpk(xxx, bbb) {
		var vlong = [];
		$('.kompx').each(function(i) {
			vlong[i] = $(this).val();
		});

		var vlong2 = vlong.join(',');

		var fixed = document.getElementById('fixed').value;
		var kump = document.getElementById('umpx').value;
		var arrq = document.getElementsByName('valuex');
		var myarrq = vlong2.split(",");
		var jummanq = myarrq.length;
		var kjummanq = arrq.length;

		var totq = 0;
		var edcba = 0;
		for (i = 0; i < jummanq; i++) {
			var n = fixed.includes(myarrq[i]);
			if (myarrq[i] == '2008') {
				edcba += parseFloat(arrq[i].value);
			}

			if (n == true) {
				if (parseFloat(arrq[i].value))
					totq += parseFloat(arrq[i].value);
			}
		}

		var atot = totq;
		var asdf = edcba;
		var abcde = atot - asdf;
		var abcdef = parseFloat(abcde);
		var hjk = parseFloat(0.04 * abcdef);
		var pop = parseFloat(0.01 * abcdef);
		var mlm = parseFloat(0.05 * abcdef);
		var pip = 0;


		if (xxx == 1) {
			$('#pvaluex' + bbb).val(hjk);
			$('#kvaluex' + bbb).val(pop);
		} else {
			$('#pvaluex' + bbb).val(mlm);
			$('#kvaluex' + bbb).val(pip);
		}
	}

	function cekval() {
		var idz = document.getElementById('idz').value;
		var nojoz = document.getElementById('nojoz').value;
		var persenz = document.getElementById('persenz').value;
		arrlist = [idz, nojoz, persenz];
		var url = "<?php echo base_url(); ?>index.php/home/cekval";
		$.post(url, {
			arrlist: arrlist
		}, function(response) {
			$("#valz").val(response);
		})
	}

	function validAngkakoma(a) {
		if (!/^[0-9.;]+$/.test(a.value)) {
			a.value = a.value.substring(0, a.value.length - 1000);
		}
	}

	function hapuslist(row, pernx) {
		var i = row.parentNode.parentNode.rowIndex;
		document.getElementById('listperner').deleteRow(i);
		$("#" + pernx).remove();
	}

	function carialasan(id) {
		var url = "<?php echo base_url(); ?>index.php/rotasi/carialasan";
		$.post(url, {
			data: id
		}, function(response) {
			$("#alasan").html(response);
		})
	}

	function jumlahkan_tk(valuex, stat_tk, stat_kes) {
		var value_tk = document.getElementById(valuex).value;
		var cekstat_tk = document.getElementById(stat_tk).checked;
		var cekstat_kes = document.getElementById(stat_kes).checked;
		var arr = document.getElementsByName('valuex');

		if (cekstat_tk == true) {
			if (value_tk == '') {
				alert('Value harus di isi terlebih dahulu, baru boleh di checklist, TerimaKasih');
				document.getElementById(stat_tk).checked = false;
				return false;
			} else {
				document.getElementById(valuex).setAttribute('readonly', true);
			}
		} else {
			if (cekstat_kes == true) {
				document.getElementById(valuex).setAttribute('readonly', true);
			} else {
				document.getElementById(valuex).removeAttribute('readonly', true);
			}
		}

		var aaa = $("input[name='cekbpjs_tk']:checked");
		var jml = 0;
		var bbb;
		for (var i = 0; i < aaa.length; i++) {
			bbb = document.getElementById(aaa[i].value).value;
			bbb = bbb.replaceAll('.', '');
			bbb = bbb.replaceAll(',', '');
			jml = jml + parseInt(bbb);
		}
		console.log(jml);

		var tot = 0;
		for (var i = 0; i < arr.length; i++) {
			if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
				tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
		}

		var jmltot = tot + jml;

		var kump = document.getElementById("umpx").value;
		var pbtkp1 = document.getElementById("pbtkp1").value;
		var pbtkp2 = document.getElementById("pbtkp2").value;

		if (jmltot < kump) {
			alert('Pengkali BPJS TK akan menggunakan UMK karena total pengkali BPJS TK masih lebih kecil dari UMK, TerimaKasih');
			var tot = kump;
		} else {
			var tot = jmltot;
		}

		var asu = (pbtkp1 / 100) * tot;
		var asus = Math.round(asu);
		$('#vbtkp1').val(asus);

		var asi = (pbtkp2 / 100) * tot;
		var asis = Math.round(asi);
		$('#vbtkp2').val(asis);
	}


	function jumlahkan_kes(valuex, stat_kes, stat_tk) {
		var value_kes = document.getElementById(valuex).value;
		var cekstat_kes = document.getElementById(stat_kes).checked;
		var cekstat_tk = document.getElementById(stat_tk).checked;
		var arr = document.getElementsByName('valuex');

		if (cekstat_kes == true) {
			if (value_kes == '') {
				alert('Value harus di isi terlebih dahulu, baru boleh di checklist, TerimaKasih');
				document.getElementById(stat_kes).checked = false;
				return false;
			} else {
				document.getElementById(valuex).setAttribute('readonly', true);
			}
		} else {
			if (cekstat_tk == true) {
				document.getElementById(valuex).setAttribute('readonly', true);
			} else {
				document.getElementById(valuex).removeAttribute('readonly', true);
			}
		}

		var aaa = $("input[name='cekbpjs_kes']:checked");
		var jml = 0;
		var bbb;
		for (var i = 0; i < aaa.length; i++) {
			bbb = document.getElementById(aaa[i].value).value;
			bbb = bbb.replaceAll('.', '');
			bbb = bbb.replaceAll(',', '');
			jml = jml + parseInt(bbb);
		}
		console.log(jml);

		var tot = 0;
		for (var i = 0; i < arr.length; i++) {
			if (parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value))))))
				tot += parseFloat(bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(arr[i].value)))));
		}

		var jmltot = tot + jml;

		var kump = document.getElementById("umpx").value;
		var pbtkp3 = document.getElementById("pbtkp3").value;
		var pbtkp4 = document.getElementById("pbtkp4").value;

		if (jmltot < kump) {
			alert('Pengkali BPJS Kes akan menggunakan UMK karena total pengkali BPJS Kes masih lebih kecil dari UMK, TerimaKasih');
			var tot = kump;
		} else {
			var tot = jmltot;
		}

		var ase = (pbtkp3 / 100) * tot;
		var ases = Math.round(ase);
		$('#vbtkp3').val(ases);

		var asa = (pbtkp4 / 100) * tot;
		var asas = Math.round(asa);
		$('#vbtkp4').val(asas);
	}


	function cari_pkwt(value) {
		if (value == 1 || value == 6) {
			document.getElementById('divjpkwt').removeAttribute("style");
		} else {
			document.getElementById('divjpkwt').setAttribute("style", "display:none;");
		}
	}

	function isNumberKey(evt, id) {
		try {
			var charCode = (evt.which) ? evt.which : event.keyCode;

			if (charCode == 46) {
				var txt = document.getElementById(id).value;
				if (!(txt.indexOf(".") > -1)) {

					return true;
				}
			}
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;

			return true;
		} catch (w) {
			alert(w);
		}
	}
</script>




<title>JobOrderISH | <? echo $title; ?></title>

<!-- Main content -->
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<!-- left column -->

			<div class="col-md-5">
				<form class="form-horizontal">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Job Order</h3>
						</div><!-- /.box-header -->

						<div class="box-body">
							<div class="form-group" id="divproject">
								<label class="col-sm-3 control-label">Type Project</label>
								<div class="col-sm-9">
									<input type="text" class="form-control pull-right" id="typejo" name="typejo" value="<?php echo $ntjo; ?>" readonly />
									<input type="hidden" class="form-control pull-right" id="approv" name="approv" value="<?php echo $apps; ?>" readonly />
									<input type="hidden" class="form-control pull-right" id="tjo" name="tjo" value="<?php echo $tjo; ?>" readonly />
								</div><!-- /.input group -->
							</div><!-- /.form group -->

						</div>
					</div>

					<div class="box box-primary" id='yuyuy'>
						<!-- form start -->
						<div class="box-body">

							<!--					
						<div class="form-group" id="divnojo">
							<label class="col-sm-3 control-label">Nojo</label>
							<div class="col-sm-9">
							<input type="text" class="form-control pull-right" id="nojok" name="nojok" value="<?php //echo $nojo 
																																																?>" readonly />
							</div>
						</div>
-->

							<div class="form-group" id="divtper">
								<label class="col-sm-3 control-label">Type JO</label>
								<div class="col-sm-9">
									<div class="col-sm-3">
										<input type="radio" id="tperal" name="tperal" value="ISH" <?php if ($flag_peral != '1') { ?> checked="checked" <?php } ?>> ISH
									</div>
									<div class="col-sm-6">
										<input type="radio" id="tperal" name="tperal" value="INF" <?php if ($flag_peral == '1') { ?> checked="checked" <?php } ?>> INF (PERALIHAN)
									</div>
								</div>
							</div>

							<?php if ($tjo == 2) { ?>
								<div class="form-group" id="divtre">
									<label class="col-sm-3 control-label">Type Replacement</label>
									<div class="col-sm-9">
										<select class="form-control pull-right" id="typere" name="typere" />
										<option value='1'>NO REKRUTMENT</option>
										<option value='2'>REKRUT</option>
										<option value="3">NO REKRUT (EXISTING)</option>
										</select>
									</div>
								</div>
							<?php } else if ($tjo == 1) { ?>
								<div class="form-group" id="divtnew">
									<label class="col-sm-3 control-label">Type New</label>
									<div class="col-sm-9">
										<!--<select class="form-control pull-right" id="typenew" name="typenew" readOnly="readOnly"/>
														<option value='1'<?php //if( ($tynew == '0') || ($tynew == '1') || ($tynew == null) ) { 
																							?> selected="selected"<?php //} 
																																																																					?>>NEW PROJECT</option>	
														<option value='2'<?php //if($tynew == '2') { 
																							?> selected="selected"<?php //} 
																																																?>>PENGEMBANGAN</option>
											</select>-->

										<input type="text" class="form-control pull-right" id="typenewx" name="typenewx" value="<?php if ($tynew == '2') {
																																																							echo "PENGEMBANGAN";
																																																						} else {
																																																							echo "NEW PROJECT";
																																																						} ?>" readonly />
										<input type="hidden" class="form-control pull-right" id="typenew" name="typenew" value="<?php echo $tynew; ?>" readonly />
									</div>
								</div>

							<?php } ?>


							<div class="form-group" id="divnojo">
								<label class="col-sm-3 control-label">Nojo</label>
								<div class="col-sm-9">
									<input type="text" class="form-control pull-right" id="nojok" name="nojok" value="<?php echo $noj; ?>" readonly />
								</div><!-- /.input group -->
							</div><!-- /.form group -->

							<div class="form-group" id="divtanggal">
								<label class="col-sm-3 control-label">Tanggal</label>
								<div class="col-sm-9">
									<input type="text" class="form-control pull-right" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>" placeholder="Masukkan tanggal sekarang.." readOnly=readOnly />
								</div><!-- /.input group -->
							</div><!-- /.form group -->



							<div class="form-group" id="divproject">
								<label class="col-sm-3 control-label">Jenis Project</label>
								<div class="col-sm-9">
									<input type="text" class="form-control pull-right" id="jenisproject" name="jenisproject" value="<?php echo $jpro; ?>" readonly />
								</div><!-- /.input group -->
							</div><!-- /.form group -->

							<div class="form-group" id="divcapt">
								<label class="col-sm-3 control-label">Jenis Captive</label>
								<div class="col-sm-9">
									<select class="form-control pull-right" id="jeniscapt" name="jeniscapt" />
									<option value="">Pilih Jenis Captive</option>
									<option value="1" <?php if ($jcap == '1') { ?> selected="selected" <?php } ?>>Captive</option>
									<option value="2" <?php if ($jcap == '2') { ?> selected="selected" <?php } ?>>Non Captive</option>
									</select>
								</div><!-- /.input group -->
							</div><!-- /.form group -->

							<div class="form-group" id="divnccust">
								<label class="col-sm-3 control-label">Nama Customer</label>
								<div class="col-sm-9">
									<select name="ncust" id="ncust" class="form-control select2 pull-right" style="width:100%">
										<option value="<?php echo $kcust; ?>"><?php echo $ncust; ?></option>
										<?php echo $cmbcust; ?>
									</select>
								</div>
							</div>

							<?php if ($tjo == 1) { ?>
								<div class="form-group" id="divspro">
									<label class="col-sm-3 control-label">Start Project</label>
									<div class="col-sm-9">
										<input type="text" class="form-control pull-right" id="sproject" name="sproject" value="<?php echo $sproject; ?>" />
									</div>
								</div>

								<div class="form-group" id="divepro">
									<label class="col-sm-3 control-label">End Project</label>
									<div class="col-sm-9">
										<input type="text" class="form-control pull-right" id="eproject" name="eproject" value="<?php echo $eproject; ?>" />
									</div>
								</div>

								<div class="form-group" id="divnilpro">
									<label class="col-sm-3 control-label">Nilai Project</label>
									<div class="col-sm-9">
										<input type="text" class="form-control pull-right" id="nilpro" name="nilpro" value="<?php echo $nil_pro; ?>" />
									</div>
								</div>
							<?php } ?>


							<?php if ($tjo == 4) { ?>
								<div class="form-group" id="divnrespa">
									<label class="col-sm-3 control-label">PersonalArea</label>
									<div class="col-sm-9">
										<select class="form-control select2 pull-right" id="respa" name="respa" style="width:100%;" />
										<option value="">Pilih</option>
										<?php array_multisort(json_decode($cmbpersax), SORT_ASC, SORT_STRING);
										foreach ($cmbpersax as $key => $list) { ?>
											<option value="<?php echo $list->kd_persa; ?>"><?php echo $list->persa; ?></option>
										<?php } ?>
										</select>
										<!--<select class="form-control pull-right" id="respa" name="respa" style="width:380px;"/>->
									<!--<option value="<?php //echo $nproj; 
																			?>"><?php //echo $nsap; 
																															?></option>-->
										<!--</select>-->
									</div>
								</div>
								<?php } else if ($tjo == 1) {
								if ($tynew == 2) { ?>
									<div class="form-group" id="divnrespa">
										<label class="col-sm-3 control-label">PersonalArea</label>
										<div class="col-sm-9">
											<select class="form-control select2 pull-right" id="respa" name="respa" style="width:100%;" />
											<?php echo $cmbpersa_all; ?>
											<!--<option value="">Pilih</option>-->
											<?php //array_multisort(json_decode($cmbpersax), SORT_ASC, SORT_STRING); 
											//foreach($cmbpersax as $key => $list){ 
											?>
											<!--<option value="<?php //echo $list->kd_persa; 
																					?>"><?php //echo $list->persa; 
																																						?></option>-->
											<?php //} 
											?>
											</select>
											<!--
														<select class="form-control pull-right" id="respa" name="respa" style="width:380px;"/>
														</select>	
														-->
										</div>
									</div>
								<?php } else { ?>
									<div class="form-group" id="divnproject">
										<label class="col-sm-3 control-label">Nama Project</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="project" name="project" value="<?php echo $nproj; ?>" placeholder="Masukkan nama project.." />
										</div>
									</div>
								<?php } ?>

							<?php } ?>


							<?php if ($tjo != 2) { ?>
								<div class="form-group" id="divsyarat">
									<label class="col-sm-3 control-label">Persyaratan Khusus</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" id="syarat" name="syarat" placeholder="Persyaratan Khusus Jabatan..." /><?php echo $syaratx; ?></textarea>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
								<div class="form-group" id="divdeskripsi">
									<label class="col-sm-3 control-label">Deskripsi Pekerjaan</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" placeholder="Deskripsi Pekerjaan Jabatan..." /><?php echo $deskripsix; ?></textarea>
									</div><!-- /.input group -->
								</div><!-- /.form group -->
							<?php } ?>

							<div class="form-group" id="divlama">
								<label class="col-sm-3 control-label">Lama Project</label>
								<div class="col-sm-9">
									<input type="text" class="form-control pull-right" id="lama" name="lama" value="<?php echo $lproj; ?>" placeholder="Satuan bulan..." />
								</div><!-- /.input group -->
							</div><!-- /.form group -->

							<?php if ($tjo == 2) { ?>
								<div id="btsrep" class="col-xs-12" style="width:100%;height:100%;border:1px solid #000; margin-bottom:10px;">
									<br>
									<div class="form-group" id="divresign">
										<label class="col-sm-3 control-label">Tanggal Resign/Rotasi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="resign" name="resign" />
										</div>
									</div>
									<div class="form-group" id="divlatihan">
										<label class="col-sm-3 control-label">Tanggal Pelatihan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="latihan" name="latihan" />
										</div>
									</div>
									<div class="form-group" id="divbekerja">
										<label class="col-sm-3 control-label">Tanggal Bekerja</label>
										<div class="col-sm-9">
											<input type="text" class="form-control pull-right" id="bekerja" name="bekerja" />
										</div>
									</div>
									<div class="form-group" id="divtrotres">
										<label class="col-sm-3 control-label">Type Perner</label>
										<div class="col-sm-9">
											<div class="col-sm-3">
												<input type="radio" id="trotres" name="trotres" value="1" onchange="carialasan(this.value)" checked=checked> Resign
											</div>
											<div class="col-sm-6">
												<input type="radio" id="trotres" name="trotres" value="2" onchange="carialasan(this.value)"> Rotasi / Mutasi
											</div>
										</div>
									</div>

									<div class="form-group" id="divnperganti">
										<label class="col-sm-3 control-label" style="font-size:12px;">Perner Pengganti</label>
										<div class="col-sm-9">
											<select class="form-control pull-right" id="ypernery" name="ypernery" style="width:100%;" <?php if ($tjo == 2) {
																																																									echo "disabled=disabled";
																																																								} ?> />

											</select>
										</div>
									</div>

									<div class="form-group" id="divresign">
										<label class="col-sm-3 control-label" style="font-size:12px;">ALasan Rotasi Pengganti</label>
										<div class="col-sm-9">
											<select class="form-control pull-right" id="alasan_ganti" name="alasan_ganti" style="width:100%;" <?php if ($tjo == 2) {
																																																													echo "disabled=disabled";
																																																												} ?> />
											<option value="">Pilih</option>
											<?php echo $cmbreason_ganti ?>
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divnper">
										<label class="col-sm-3 control-label" style="font-size:12px;">Perner Resign/Rotasi</label>
										<div class="col-sm-9">
											<select class="form-control pull-right select2" id="xpernerx" name="xpernerx" style="width:100%;" />

											</select>
										</div>
									</div>

									<div class="form-group" id="divresign">
										<label class="col-sm-3 control-label" style="font-size:12px;">ALasan Resign/Rotasi</label>
										<div class="col-sm-9">
											<select class="form-control pull-right" id="alasan" name="alasan" style="width:100%;" />
											<option value="">Pilih</option>
											<?php echo $cmbreason ?>
											</select>
										</div><!-- /.input group -->
									</div><!-- /.form group -->

									<div class="form-group" id="divreptrain">
										<label class="col-sm-3 control-label">Training</label>
										<div class="col-sm-9">
											<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
												<div class="col-md-6" style="margin-top:5px;">
													<input type="checkbox" name="rep_kumtrain[]" id="rep_kumtrain" value="1"> Softskill
												</div>
												<div class="col-md-6" style="margin-top:5px;">
													<input type="checkbox" name="rep_kumtrain[]" id="rep_kumtrain" value="2"> Hardskill
												</div>
												<div class="col-md-6" style="margin-top:5px;">
													<input type="checkbox" name="rep_kumtrain[]" id="rep_kumtrain" value="3"> Tandem Pasif
												</div>
												<div class="col-md-6" style="margin-top:5px;">
													<input type="checkbox" name="rep_kumtrain[]" id="rep_kumtrain" value="4"> Tandem Aktif
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<div class="form-group" id="divnobak">
								<label class="col-sm-3 control-label">NO BAK</label>
								<div class="col-sm-9">
									<input type="text" class="form-control pull-right" id="nobak" name="nobak" value="<?php echo $nobak; ?>" />
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<!--
						<div class="form-group">
							<label class="col-sm-3 control-label">Dokumen Skema</label>
							<div class="col-sm-9">
								<?php //if($komponen_skema == '') { 
								?>
									<div id="dskem">
										<input type="file" class="form-control pull-right" name="komp[]" id="komponen1" />
										<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen11" value="skema"/>
									</div>
								<?php //} else {
								//$abc = 'skema'; 
								?>
									<label class='control-label' style='color:grey' value='<?php //echo $komponen_skema 
																																					?>' name='kompak[]' id='kompak_skema'><?php //echo $komponen_skema 
																																																																						?><button title='Delete Skema File' type='button' class='btn btn-box-tool' onclick='delfile("<?php //echo $noj 
																																																																																																																																			?>","<?php //echo $komponen_skema 
																																																																																																																																															?>", "<?php //echo $abc 
																																																																																																																																																																?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br> 
									
								<?php //} 
								?>
							</div>
						</div>
						-->

							<div class="form-group">
								<label class="col-sm-3 control-label">Dokumen BAK</label>
								<div class="col-sm-9">
									<?php if ($komponen_bak == '') { ?>
										<div id="dbak">
											<input type="file" class="form-control pull-right" name="komp[]" id="komponen2" />
											<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen22" value="bak" />
										</div>
									<?php } else {
										$cde = 'bak'; ?>
										<label class='control-label' style='color:grey' value='<?php echo $komponen_bak ?>' name='kompak[]' id='kompak_bak'><?php echo $komponen_bak ?><button title='Delete BAK File' type='button' class='btn btn-box-tool' onclick='delfile("<?php echo $noj ?>","<?php echo $komponen_bak ?>", "<?php echo $cde ?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times'></i></button></label><br>
									<?php } ?>
								</div><!-- /.input group -->
							</div><!-- /.form group -->

							<div class="form-group">
								<label class="col-sm-3 control-label">Legalitas</label>
								<div class="col-sm-9">
									<select class="form-control pull-right" id="doc_legalitas" name="doc_legalitas" />
										<option value="">Pilih</option>
										<option value="1">PKS</option>
										<option value="2">Amandemen</option>
										<option value="3">Addendum</option>
										<option value="4">MOU</option>
									</select>
								</div><!-- /.input group -->
							</div>

							<!--
						<div class="form-group">
							<label class="col-sm-3 control-label">Dokumen Lain</label>
							<div class="col-sm-9">
								<?php //if($komponen_other == ''){ 
								?>
									<div id="doth">
										<input type="file" class="form-control pull-right" name="komp[]" id="komponen3"/>
										<input type="hidden" class="form-control pull-right" name="kompol[]" id="komponen33" value="other"/>
									</div>
								<?php //} else {
								//$fgh = 'other'; 
								?>
									<label class='control-label' style='color:grey' value='<?php //echo $komponen_other 
																																					?>' name='kompak[]' id='kompak_other'><?php //echo $komponen_other 
																																																																						?><button title='Delete Other File' type='button' class='btn btn-box-tool' onclick='delfile("<?php //echo $noj 
																																																																																																																																			?>","<?php //echo $komponen_other 
																																																																																																																																															?>", "<?php //echo $fgh 
																																																																																																																																																																?>");this.parentNode.parentNode.removeChild(this.parentNode);'><i class='fa fa-times' ></i></button></label><br>
									
								<?php //} 
								?>
							</div>
						</div>
						-->

							<!--
						<div id='akk'>
							<button type="button" class="btn btn-default btn-sm" id="addmore2">Add more attachment</button>
						</div>
						-->


							<div class="box-footer" id="ggff">
								<button type="button" class="btn btn-primary pull-right" id="btn_simpan">Submit</button>
							</div>

							<div class="overlay" id="overlay">
								<i class="fa fa-refresh fa-spin"></i>
							</div>

						</div><!-- /.box-body -->
					</div><!-- /.box -->

			</div><!-- /.box -->


			<?php if ($tjo == 3) { ?>
				<div class="col-md-7" id='lalay'>
					<div class="form-group">
						<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Personalarea</button>
						<select id="choosen" name="choosen[]" multiple class="form-control choosen" style="height:400px;"></select>
					</div>
				</div>
			<?php } ?>

			<?php if ($tjo == 2) { ?>
				<div class="col-md-7" id='lalax'>
					<div class="box box-primary">
						<div class="form-group divperner">
							<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Perner Resign/Rotasi</button>
							<!--<select id="xchoosen" name="xchoosen[]" multiple class="form-control xchoosen" style="height:400px;"></select>-->
							<table id="listperner" class="table table-bordered table-hover listperner">
								<thead>
									<tr>
										<th>Tanggal Resign/Rotasi</th>
										<th>Alasan</th>
										<th>Pelatihan</th>
										<th>Bekerja</th>
										<th>Replacement</th>
										<th>Type</th>
										<th>Perner Pengganti</th>
										<th>Perner</th>
										<th>Nama</th>
										<th>Area</th>
										<th>PersonalArea</th>
										<th>Skilllayanan</th>
										<th>Jabatan</th>
										<th>Level</th>
										<th>Training</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<br><br>
						<div class="form-group divpernerganti">
							<button type="button" class='btn btn-info btn-block btn-sm'>Rincian Perner Pengganti</button>
							<!--<select id="xchoosen" name="xchoosen[]" multiple class="form-control xchoosen" style="height:400px;"></select>-->
							<table id="listpernerganti" class="table table-bordered table-hover listpernerganti">
								<thead>
									<tr>
										<th>Perner Resign/Rotasi</th>
										<th>Alasan Rotasi Pengganti</th>
										<th>Perner Pengganti</th>
										<th>Nama</th>
										<th>Area</th>
										<th>PersonalArea</th>
										<th>Skilllayanan</th>
										<th>Jabatan</th>
										<th>Level</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>

					<br><br>
					<div class="box box-primary divpernerexist">
						<div class="form-group">
							<button type="button" class='btn btn-info btn-block btn-sm'>Detail Rincian Perner Existing</button>
							<!--<select id="xchoosen" name="xchoosen[]" multiple class="form-control xchoosen" style="height:400px;"></select>-->
							<table id="listpernerx" class="table table-bordered table-hover listpernerx">
								<thead>
									<tr>
										<th>Tanggal Resign/Rotasi</th>
										<th>Alasan Resign/Rotasi</th>
										<th>Pelatihan</th>
										<th>Bekerja</th>
										<th>Replacement</th>
										<th>Type</th>
										<th>Perner Pengganti</th>
										<th>Alasan Pengganti</th>
										<th>Perner</th>
										<th>Nama</th>
										<th>Area</th>
										<th>PersonalArea</th>
										<th>Skilllayanan</th>
										<th>Jabatan</th>
										<th>Level</th>
										<th>Action</th>
										<th style="display:none">X</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($ppp as $key => $list) {
										echo "<tr>";
										echo "<td>" . $list['tgl_resign'] . "</td>";
										echo "<td>" . $list['nm_alasan'] . "</td>";
										if ($list['tgllatihan'] != '') {
											echo "<td>" . $list['tgllatihan'] . "</td>";
										} else {
											echo "<td>" . $list['latihan'] . "</td>";
										}

										if ($list['tglbekerja'] != '') {
											echo "<td>" . $list['tglbekerja'] . "</td>";
										} else {
											echo "<td>" . $list['bekerja'] . "</td>";
										}

										if ($list['typerep'] != '') {
											echo "<td>" . $list['typerep'] . "</td>";
										} else {
											if ($list['trep'] == '2') {
												echo "<td>Rekrut</td>";
											} else if ($list['trep'] == '3') {
												echo "<td>No Rekrut (Existing)</td>";
											} else if ($list['trep'] == '1') {
												echo "<td>No Rekrut</td>";
											} else {
												echo "<td>-</td>";
											}
										}

										if ($list['rotasi_resign'] == 1) {
											echo "<td>Resign</td>";
										} else if ($list['rotasi_resign'] == 2) {
											echo "<td>Rotasi-Mutasi</td>";
										} else {
											echo "<td></td>";
										}

										echo "<td>" . $list['perner_ganti'] . "</td>";
										echo "<td>" . $list['alasan_ganti'] . "</td>";
										echo "<td>" . $list['perner'] . "</td>";
										echo "<td>" . $list['nama'] . "</td>";
										echo "<td>" . $list['nm_area'] . "</td>";
										echo "<td>" . $list['nm_persa'] . "</td>";
										echo "<td>" . $list['nm_skilllayanan'] . "</td>";
										echo "<td>" . $list['nm_jabatan'] . "</td>";
										echo "<td>" . $list['nm_level'] . "</td>";

									?>
										<!--<td><a href="<?php  //echo base_url()
																			?>index.php/home/rinc_hapus/<?php //echo $list['id'];
																																													?>" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></a></td>-->
										<td><button title='Delete Perner' type='button' class='btn btn-box-tool' onclick='delete_Row_perner(this,<?php echo $list['id']; ?>)'><i class="glyphicon glyphicon-trash"></i></button></td>
									<?php
										echo "<td class='cid' style='display:none'>" . $list['id'] . "</td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ($tjo == 1) { ?>
				<div class="col-md-7" id='yayay'>
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Form Job Order</h3>
						</div><!-- /.box-header -->
						<div class="box-body divlistrincian">
							<div class="form-group" id="divrincian">
								<label class="col-sm-3 control-label">Rincian Kebutuhan</label>
								<div class="col-sm-9">
									<button type='button' class='btn btn-info btn-block btn-sm' data-toggle='modal' data-target='#myModal' id="tmbhrincian">Tambah Rincian Kebutuhan</button>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<table id="listrincian" class="table table-bordered table-hover listrincian">
								<thead>
									<tr>
										<th>Jabatan</th>
										<th>Kelamin</th>
										<th>Pendidikan</th>
										<th>Lokasi</th>
										<th>Waktu</th>
										<th>Atasan</th>
										<th>Kontrak</th>
										<th>PKWT</th>
										<th>Jumlah</th>
										<th>Level</th>
										<th>HK Pembagi</th>
										<th>Skilllayanan</th>
										<th>Training</th>
										<th>Tgl Pelatihan</th>
										<th>Tgl Bekerja</th>
										<th>Type Rekrut</th>
										<th>Perner No Rekrut</th>
										<th>Alasan Rotasi</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>

						<p></p>
						<p></p>
						<p></p>
						<div class="box-body divlistkomponen">
							<p></p>
							<div class="form-group" id="divkomponen">
								<label class="col-sm-12 control-label">Rincian Komponen Skema</label>
							</div><!-- /.form group -->
							<table id="listkomponen" class="table table-bordered table-hover listkomponen">
								<thead>
									<tr>
										<th>Jabatan</th>
										<th>Lokasi</th>
										<th>Level</th>
										<th>Skilllayanan</th>
										<th>Komponen</th>
										<th>Value</th>
										<th>Keterangan</th>
										<th>Percentage</th>
										<th>Pengkalian TK</th>
										<th>Pengkalian Kes</th>
										<!--<th>Perusahaan</th>
									<th>Karyawan</th>
									<th>JKK (Kecelakaan)</th>
									<th>JKM (Kematian)</th>
									<th>JHT (Perusahaan)</th>
									<th>JHT (Karyawan)</th>-->
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>

						<br><br>

						<div class="box-body divlistrincianx">
							<div class="form-group" id="divrincian">
								<div class="col-sm-12">
									<button type='button' class='btn btn-info btn-block btn-sm'>Detail Rincian Existing</button>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<table id="listrincianx" style="margin-top:-0.1px;" class="table table-bordered table-hover listrincianx">
								<thead>
									<tr>
										<th>Jabatan</th>
										<th>Kelamin</th>
										<th>Pendidikan</th>
										<th>Lokasi</th>
										<th>Waktu</th>
										<th>Atasan</th>
										<th>Kontrak</th>
										<th>PKWT</th>
										<th>Jumlah</th>
										<th>Level</th>
										<th>HK Pembagi</th>
										<th>Skilllayanan</th>
										<th>Training</th>
										<th>Tgl Pelatihan</th>
										<th>Tgl Bekerja</th>
										<th>Type Rekrut</th>
										<th>Perner No Rekrut</th>
										<th>Action</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($bbb as $key => $list) {
										echo "<tr>";
										echo "<td class='njb'>" . $list['name_job_function'] . "</td>";
										echo "<td>" . $list['gender'] . "</td>";
										echo "<td>" . $list['pendidikan'] . "</td>";
										echo "<td class='cnm'>" . $list['city_name'] . "</td>";
										echo "<td>" . $list['waktu'] . "</td>";
										echo "<td>" . $list['atasan'] . "</td>";
										echo "<td class='kon'>" . $list['kontrak'] . "</td>";
										if ($list['jenis_pkwt'] == '') {
											echo "<td class='jpkwt'>-</td>";
										} else {
											echo "<td class='jpkwt'>" . $list['jenis_pkwt'] . "</td>";
										}
										echo "<td class='rjml'>" . $list['jumlah'] . "</td>";
										echo "<td class='cnlv'>" . $list['level'] . "</td>";
										echo "<td class='hkp'>" . $list['hk_pembagi'] . "</td>";
										echo "<td class='cnskill'>" . $list['nskill_sap'] . "</td>";
										if ($list['train_soft'] == 1) {
											$wikwik1 = 'Training Softskill,';
										}
										if ($list['train_hard'] == 1) {
											$wikwik2 = 'Training Hardskill,';
										}
										if ($list['tendem_pasif'] == 1) {
											$wikwik3 = 'Tendem Pasif,';
										}
										if ($list['tendem_aktif'] == 1) {
											$wikwik4 = 'Tendem Aktif';
										}

										$wikwok = $wikwik1 . '' . $wikwik2 . '' . $wikwik3 . '' . $wikwik4;
										echo "<td class='cntrain'>" . $wikwok . "</td>";

										if ($list['tgl_latihan'] != '') {
											echo "<td class='tlat'>" . $list['tgl_latihan'] . "</td>";
										} else {
											echo "<td class='tlat'>" . $list['latihan'] . "</td>";
										}

										if ($list['tgl_bekerja'] != '') {
											echo "<td class='tbek'>" . $list['tgl_bekerja'] . "</td>";
										} else {
											echo "<td class='tbek'>" . $list['bekerja'] . "</td>";
										}

										if ($list['typerek'] != '') {
											echo "<td class='nrek'>" . $list['typerek'] . "</td>";
										} else {
											if ($list['newrek'] == 1) {
												echo "<td class='nrek'>No Rekrut</td>";
											}
											if ($list['newrek'] == 2) {
												echo "<td class='nrek'>Rekrut</td>";
											}
											if ($list['newrek'] == 3) {
												echo "<td class='nrek'>No Rekrut (Existing)</td>";
											}
										}

										if ($list['perner_norekrut'] != '') {
											echo "<td class='pnorek'>" . $list['perner_norekrut'] . "</td>";
										} else {
											echo "<td class='pnorek'>" . $list['pernorek'] . "</td>";
										}

									?>
										<!--<td><a href="<?php  //echo base_url()
																			?>index.php/home/rinc_hapus/<?php //echo $list['id'];
																																													?>" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></a></td>-->
										<td><button title='Delete Rincian' type='button' class='btn btn-box-tool' onclick='delete_Row(this,<?php echo $list['id']; ?>)'><i class="glyphicon glyphicon-trash"></i></button> <button type='button' class='btn btn-box-tool btnadd_komp' id='btnadd_komp' data-toggle='modal' data-target='#POPmyModal'><i class="glyphicon glyphicon-plus-sign"></i></button> <button type='button' class='btn btn-box-tool btnedit_rinc' id='btnedit_rinc' data-toggle='modal' data-target='#ROPmyModal'><i class="glyphicon glyphicon-pencil"></i></button></td>
									<?php
										echo "<td class='cid' style='display:none'>" . $list['id'] . "</td>";
										echo "<td class='cump' style='display:none'>" . $list['ump'] . "</td>";
										echo "<td class='cjab' style='display:none'>" . $list['jabatan'] . "</td>";
										echo "<td class='clok' style='display:none'>" . $list['lokasi'] . "</td>";
										echo "<td class='cklv' style='display:none'>" . $list['alevel'] . "</td>";
										echo "<td class='ckskill' style='display:none'>" . $list['skilllayanan'] . "</td>";
										echo "<td class='cdet_komp' style='display:none'>" . $list['detail_komp'] . "</td>";
										echo "<td class='cnojr' style='display:none'>" . $list['nojo'] . "</td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>

						<br><br>

						<div class="box-body divlistkompx">
							<div class="form-group" id="divrincian">
								<div class="col-sm-12">
									<button type='button' class='btn btn-info btn-block btn-sm'>Detail Rincian Komponen Existing</button>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<table id="listkompx" style="margin-top:-0.1px;" class="table table-bordered table-hover listkompx">
								<thead>
									<tr>
										<th>Jabatan</th>
										<th>Lokasi</th>
										<th>Komponen</th>
										<th>Value</th>
										<th>Keterangan</th>
										<th>Percentage</th>
										<th>Pengkalian TK</th>
										<th>Pengkalian Kes</th>
										<!--
									<th>Perusahaan</th>
									<th>Karyawan</th>
									<th>JKK (Kecelakaan)</th>
									<th>JKM (Kematian)</th>
									<th>JHT (Perusahaan)</th>
									<th>JHT (Karyawan)</th> -->
										<th>Action</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
										<th style="display:none">x</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($ccc as $key => $list) {
										echo "<tr>";
										echo "<td class='jbz'>" . $list['jabatan_txt'] . "</td>";
										echo "<td class='arz'>" . $list['area_txt'] . "</td>";
										echo "<td class='kpz'>" . $list['komponen_txt'] . "</td>";
										echo "<td class='vlz'>" . $list['value'] . "</td>";
										echo "<td class='ktz'>" . $list['keterangan'] . "</td>";
										echo "<td class='psz'>" . $list['persentase'] . "</td>";
										if ($list['pengkali_tk'] != '') {
											echo "<td class='tkz'>" . $list['pengkali_tk'] . "</td>";
										} else {
											echo "<td class='tkz'>-</td>";
										}

										if ($list['pengkali_kes'] != '') {
											echo "<td class='ksz'>" . $list['pengkali_kes'] . "</td>";
										} else {
											echo "<td class='ksz'>-</td>";
										}


										/*
									echo "<td>". $list['perusahaan'] ."</td>";
									echo "<td>". $list['karyawan'] ."</td>";
									echo "<td>". $list['jkk'] ."</td>";
									echo "<td>". $list['jkm'] ."</td>";
									echo "<td>". $list['jht_per'] ."</td>";
									echo "<td>". $list['jht_kar'] ."</td>"; */
									?>
										<!--<td><a href="<?php  //echo base_url()
																			?>index.php/home/rinc_hapus/<?php //echo $list['id'];
																																													?>" class="btn btn-danger btn-sm" onclick="deleteRow(this)"><i class="glyphicon glyphicon-trash"></i></a></td>-->
										<td><button title='Delete Komponen' type='button' class='btn btn-box-tool' onclick='delete_Row2(this,<?php echo $list['id']; ?>)'><i class="glyphicon glyphicon-trash"></i></button>
											<?php //if( ($list['komponen']!=4065) && ($list['komponen']!=4066) && ($list['komponen']!=4058) && ($list['komponen']!=8002) ){ 
											?>
											<button type='button' class='btn btn-box-tool btnedit_komp' id='btnedit_komp' data-toggle='modal' data-target='#OPmyModal'><i class="glyphicon glyphicon-pencil"></i></button>
											<?php //} 
											?>
										</td>
									<?php
										echo "<td class='cid' style='display:none'>" . $list['id'] . "</td>";
										echo "<td class='cnoj' style='display:none'>" . $list['nojo'] . "</td>";
										echo "<td class='ckompy' style='display:none'>" . $list['komponen'] . "</td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>

						<div class="box-body divlistproc">
							<p></p>
							<div class="col-xs-12">
								<label class="center_title_bar">Doc Checklist</label>
							</div>

							<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
								<?php foreach ($rdoc as $list) { ?>
									<div class="col-md-4" style="margin-top:10px;">
										<input type="checkbox" <?php if (strpos($nana, $list['doc_id']) !== false) {
																							echo 'checked';
																						} ?> name="kumdoc[]" id="kumdoc" value="<?php echo $list['doc_id']; ?>"> <?php echo $list['doc_name']; ?>

									</div>
								<?php } ?>
							</div>
						</div>

						<div class="box-body divlistproc">
							<p></p>
							<div class="form-group" id="divproc">
								<label class="col-sm-3 control-label">Procurement</label>
								<div class="col-sm-9">
									<button type='button' class='btn btn-info btn-block btn-sm' data-toggle='modal' data-target='#PRmyModal' id="tmbhproc">Add Procurement</button>
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<table id="listproc" class="table table-bordered table-hover listproc">
								<thead>
									<tr>
										<th>Periode</th>
										<th>Item</th>
										<th>Qty</th>
										<th>Spec</th>
										<th>Budget</th>
										<th>Tanggal 1</th>
										<th>Tanggal 2</th>
										<th>Action</th>
										<th style="display:none;">X</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (count($ddd)) {
										foreach ($ddd as $key => $list) {
											echo "<tr>";
											echo "<td>" . $list['periode'] . "</td>";
											echo "<td>" . $list['item_name'] . "</td>";
											echo "<td>" . $list['qty'] . "</td>";
											echo "<td>" . $list['spec'] . "</td>";
											echo "<td>" . $list['budget'] . "</td>";
											echo "<td>" . $list['tgl1'] . "</td>";
											echo "<td>" . $list['tgl2'] . "</td>"; ?>
											<td><button title='Delete Procurement' type='button' class='btn btn-box-tool' onclick='delete_Row3(this,<?php echo $list['id']; ?>)'><i class="glyphicon glyphicon-trash"></i></button></td>
									<?php
											echo "<td class='cid' style='display:none'>" . $list['id'] . "</td>";
											echo "</tr>";
										}
									}
									?>
								</tbody>
							</table>
						</div>

						<!--
						<div class="box-footer">
							<button type="button" class="btn btn-primary pull-right" id="btn_submit">Submit</button>
						</div>
					-->
						</form>
					</div><!-- /.box -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog" id="modal-alert">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Rincian Kebutuhan</h4>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" id="haha">
										<div class="box-body">
											<div class="form-group" id="divtpeng">
												<label class="col-sm-3 control-label">Type Rekrut New</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="typepeng" name="typepeng" />
													<option value="1">NO REKRUTMENT</option>
													<option value="2">REKRUT</option>
													<option value="3">NO REKRUT (EXISTING)</option>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divlatihann">
												<label class="col-sm-3 control-label">Tanggal Pelatihan</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="latihan_n" name="latihan_n" />
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divbekerjan">
												<label class="col-sm-3 control-label">Tanggal Bekerja</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="bekerja_n" name="bekerja_n" />
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divjabatan">
												<label class="col-sm-3 control-label">Jabatan</label>
												<div class="col-sm-9">
													<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
													<select class="form-control pull-right select2" style="width: 100%;" id="jabatan" />
													<option value="">Pilih Jabatan</option>
													<option value=""><?php echo $cmbdetailkategori; ?></option>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divcategory">
												<label class="col-sm-3 control-label">Kategori Jabatan</label>
												<div class="col-sm-9">
													<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
													<select class="form-control pull-right select2" style="width: 100%;" id="kategori" />
													<option value="">Pilih Kategori</option>
													<?php echo $cmbkategori; ?>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divgender">
												<label class="col-sm-3 control-label">Gender</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="gender" />
													<option value="">Pilih Kelamin</option>
													<option value="Pria">Pria</option>
													<option value="Wanita">Wanita</option>
													<option value="Pria-Wanita">Pria-Wanita</option>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->
											<div class="form-group" id="divpendidikan">
												<label class="col-sm-3 control-label">Pendidikan</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="pendidikan" />
													<option value="">Pilih Pendidikan</option>
													<?php echo $cmbpendidikan; ?>
													</select>
												</div><!-- /.input group -->

											</div><!-- /.form group -->

											<?php if ($tjo != 2) { ?>
												<?php if ($tynew != 2) { ?>
													<div class="form-group" id="divpropinsi">
														<label class="col-sm-3 control-label">Province</label>
														<div class="col-sm-9">
															<select class="form-control pull-right" id="province" />
															<option value="">Pilih Province</option>
															<?php echo $cmbprovince; ?>
															</select>
														</div>
													</div>
												<?php } ?>
											<?php } ?>

											<div class="form-group" id="divlokasi">
												<label class="col-sm-3 control-label">Lokasi Kerja</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="lokasi" />
													<option value="">Pilih Lokasi</option>

													</select>
												</div>
											</div>


											<div class="form-group" id="divwaktu">
												<label class="col-sm-3 control-label">Waktu Kerja</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="waktu" />
													<option value="">Pilihan</option>
													<option value="shifting">Shifting</option>
													<option value="office_hour">Office Hour</option>
													</select>
												</div><!-- /.input group -->

											</div><!-- /.form group -->
											<div class="form-group" id="divatasan">
												<label class="col-sm-3 control-label">Atasan</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="atasan" />
													<option value="">Pilih Atasan</option>
													<?php echo $cmbtgg; ?>
													</select>
												</div><!-- /.input group -->

											</div><!-- /.form group -->
											<div class="form-group" id="divkontrak">
												<label class="col-sm-3 control-label">Jenis Kontrak</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="kontrak" onchange="cari_pkwt(this.value)" />
													<option value="">Pilih Kontrak</option>
													<?php echo $cmbkontrak; ?>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divjpkwt" style="display:none">
												<label class="col-sm-3 control-label">Jenis PKWT</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="jpkwt">
														<option value="">Pilih Jenis PKWT</option>
														<?php echo $cmbjpkwt; ?>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divlevel">
												<label class="col-sm-3 control-label">Level Skema</label>
												<div class="col-sm-9">
													<select name="lskema" id="lskema" class="form-control pull-right">
														<option value=''>Pilih Level Skema</option>
														<?php echo $cmblskema; ?>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divskil">
												<label class="col-sm-3 control-label">Skilllayanan</label>
												<div class="col-sm-9">
													<select name="lskillx" id="lskillx" class="form-control pull-right select2" style="width:100%">
														<option value=''>Pilih Skilllayanan</option>
														<?php echo $cmb_skill ?>

														<?php /*foreach($cmb_skill as $cmb_skill){
												echo "<option value='".$cmb_skill->PERSK."'>".$cmb_skill->PTEXT."</option>";	
											}*/ ?>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divjumlah">
												<label class="col-sm-3 control-label">Jumlah</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="jumlah" />
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divpnorek">
												<label class="col-sm-3 control-label">Perner No Rekrutment</label>
												<div class="col-sm-9">
													<textarea class="form-control" rows="3" id="pnorek" name="pnorek" placeholder="Ex: 10123;102456;109876" onkeyup="validAngkakoma(this)" /></textarea>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divalasanrot">
												<label class="col-sm-3 control-label">Alasan Rotasi</label>
												<div class="col-sm-9">
													<select class="form-control" id="alasanrot" name="alasanrot">
														<option value="">Pilih Alasan</option>
														<?php echo $cmbreason_ganti; ?>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divwaktu">
												<label class="col-sm-3 control-label">Tahun Gaji</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="tgaji">
														<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
														<option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
														<option value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
														<option value="<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></option>
														<option value="<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></option>
														<option value="<?php echo date('Y') - 4; ?>"><?php echo date('Y') - 4; ?></option>
													</select>
												</div>
											</div>

											<div class="form-group" id="divwaktu">
												<label class="col-sm-3 control-label">Training</label>
												<div class="col-sm-9">
													<div class="col-xs-12" style="width:100%;height:100%;border:1px solid #000;">
														<div class="col-md-6" style="margin-top:5px;">
															<input type="checkbox" name="kumtrain[]" id="kumtrain" value="1"> Softskill
														</div>
														<div class="col-md-6" style="margin-top:5px;">
															<input type="checkbox" name="kumtrain[]" id="kumtrain" value="2"> Hardskill
														</div>
														<div class="col-md-6" style="margin-top:5px;">
															<input type="checkbox" name="kumtrain[]" id="kumtrain" value="3"> Tendem Pasif
														</div>
														<div class="col-md-6" style="margin-top:5px;">
															<input type="checkbox" name="kumtrain[]" id="kumtrain" value="4"> Temdem Aktif
														</div>
													</div>
												</div>
											</div>

										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
									<button type="button" class="btn btn-primary" id="addrincian">NEXT</button>
									<!--<button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button>-->
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->



					<div class="modal fade" id="OPmyModal" role="dialog" tabindex="-1">
						<div class="modal-dialog" id="modal-alert">
							<div class="modal-content">
								<div class="modal-header" style="background-color:blue; color:white;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Edit Komponen</h4>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" id="hoho">
										<div class="box-body">
											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">Jabatan</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="jabz" readOnly=readOnly>
													<input type="hidden" class="form-control pull-right" id="idz">
													<input type="hidden" class="form-control pull-right" id="nojoz">
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">Lokasi</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="lokz" readOnly=readOnly>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">Komponen</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="kompz" readOnly=readOnly>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">Value</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="valz">
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divqty">
												<label class="col-sm-2 control-label">Keterangan</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="ketz" readOnly=readOnly>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divspec">
												<label class="col-sm-2 control-label">Percentage</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="persenz" onchange="cekval()">
												</div><!-- /.input group -->
											</div><!-- /.form group -->

										</div>
									</form>
								</div>
								<div class="modal-footer" style="background-color:blue; color:white;">
									<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
									<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
									<button type="button" class="btn btn-primary" data-dismiss="modal" id="save_edit">Save</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->



					<div class="modal fade" id="ROPmyModal" role="dialog" tabindex="-1">
						<div class="modal-dialog" id="modal-alert">
							<div class="modal-content">
								<div class="modal-header" style="background-color:blue; color:white;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Edit Rincian</h4>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" id="hbhb">
										<div class="box-body">
											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">ID</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="ridz" readOnly=readOnly>
													<input type="text" class="form-control pull-right" id="rnojoz" readOnly=readOnly>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divspec">
												<label class="col-sm-2 control-label">Jumlah</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="ejmlh">
												</div>
											</div>

											<div class="form-group" id="divwaktu">
												<label class="col-sm-2 control-label">Training</label>
												<div class="col-sm-10">
													<div id="etrain"></div>
												</div>
											</div>

										</div>
									</form>
								</div>
								<div class="modal-footer" style="background-color:blue; color:white;">
									<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
									<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
									<button type="button" class="btn btn-primary" data-dismiss="modal" id="save_editrinc">Save</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->





					<div class="modal fade" id="PRmyModal" role="dialog" tabindex="-1">
						<div class="modal-dialog" id="modal-alert">
							<div class="modal-content">
								<div class="modal-header" style="background-color:blue; color:white;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Add Procurement</h4>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" id="hoho">
										<div class="box-body">
											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">Periode</label>
												<div class="col-sm-10">
													<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
													<select class="form-control pull-right" id="periode">
														<option value="1">1</option>
														<option value="2">2</option>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">Tanggal 1</label>
												<div class="col-sm-10">
													<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
													<input type="text" class="form-control pull-right" id="tgl1">
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">Tanggal 2</label>
												<div class="col-sm-10">
													<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
													<input type="text" class="form-control pull-right" id="tgl2">
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divitem">
												<label class="col-sm-2 control-label">Item</label>
												<div class="col-sm-10">
													<!--<input type="hidden" class="form-control pull-right" id="nojok" name="nojok" readonly />-->
													<select class="form-control pull-right" id="item">
														<option value="">Pilih Item</option>
														<?php echo $cmbitem; ?>
													</select>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divqty">
												<label class="col-sm-2 control-label">Qty</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="qty">
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divspec">
												<label class="col-sm-2 control-label">Spec</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="spec">
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divbudget">
												<label class="col-sm-2 control-label">Budget</label>
												<div class="col-sm-10">
													<input type="text" class="form-control pull-right" id="budget">
												</div><!-- /.input group -->
											</div><!-- /.form group -->

										</div>
									</form>
								</div>
								<div class="modal-footer" style="background-color:blue; color:white;">
									<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" id="dpn_cancel">Cancel</button>
									<!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id="addrincian">Save changes</button> -->
									<button type="button" class="btn btn-primary" data-dismiss="modal" id="addproc">Save</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->


					<div class="modal fade" id="EModal" name="EModal" role="dialog" tabindex="-1">
						<div class="modal-dialog" id="modal-alert" style="width:900px;">
							<div class="modal-content">
								<div class="modal-header" style="background-color: blue; color:white;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Add Skema</h4>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" id="haha">
										<div class="box-body">

											<div class="form-group" id="divval">
												<label class="col-sm-2 control-label">Jabatan</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="jabx" readonly>
													<input type="hidden" class="form-control pull-right" id="kodejabx" readonly>
													<input type="hidden" class="form-control pull-right" id="kodekont" readonly>
													<input type="hidden" class="form-control pull-right" id="detkompnew" value="<?php echo $detkompnew; ?>" readonly>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divval">
												<label class="col-sm-2 control-label">Lokasi</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="lokasix" readonly>
													<input type="hidden" class="form-control pull-right" id="kodelokasix" readonly>
												</div><!-- /.input group -->
											</div><!-- /.form group -->


											<div class="form-group" id="divhkx">
												<label class="col-sm-2 control-label">HK Pembagi</label>
												<div class="col-sm-9">
													<!--<input type="text" class="form-control pull-right" id="hkpembagix" >-->
													<select class="form-control pull-right" id="hkpembagix">
														<?php for ($i = 1; $i <= 30; $i++) { ?>
															<option value=<?php echo $i; ?>><?php echo $i; ?></option>
														<?php } ?>
													</select>

													<!--<input type="text" class="form-control pull-right" id="umpx" >-->
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divumpx">
												<label class="col-sm-2 control-label">UMP</label>
												<div class="col-sm-9">
													<div class="zoverlayz" id="zoverlayz">
														<i class="fa fa-refresh fa-spin"></i>
													</div>
													<input type="text" class="form-control pull-right" id="umpx" readOnly>
													<input type="hidden" class="form-control pull-right" id="mandator">
													<input type="hidden" class="form-control pull-right" id="fixed">
												</div>
											</div>

											<div class="form-group" id="divjskema">
												<label class="col-sm-2 control-label">Skema</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="jskema">
														<option value="1">NEW</option>
														<option value="2">EXISTING</option>
													</select>
												</div>
											</div>

											<div class="form-group" id="divmanskema">
												<label class="col-sm-2 control-label">Mandatory Skema</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="nm_mandator">
												</div>
											</div>

											<div class="form-group" id="divmapilbpjs">
												<label class="col-sm-2 control-label">Pilihan BPJS</label>
												<div class="col-sm-9">
													<select class="form-control pull-right" id="jpbpjs">
														<option value="1">Kelompok I (tingkat risiko sangat rendah) : 0,24% dari upah sebulan</option>
														<option value="2">Kelompok II (tingkat risiko rendah) : 0,54% dari upah sebulan</option>
														<option value="3">Kelompok III (tingkat risiko sedang) : 0,89% dari upah sebulan</option>
														<option value="4">Kelompok IV (tingkat risiko tinggi) : 1,27% dari upah sebulan</option>
														<option value="5">Kelompok V (tingkat risiko sangat tinggi) : 1,74% dari upah sebulan</option>
													</select>
												</div>
											</div>


											<hr>

											<div id="allskema">
												<div id="divfixed">

													<button type="button" class="btn btn-default btn-sm" id="addmorekompx">Add more komponen Fixed</button>
													<table id="tkomp" class="table table-bordered table-hover" style="width:850px;">
														<thead style="background-color: blue; color:white;">
															<tr>
																<th width='250px;'>Komponen Fixed</th>
																<!--<th width="5%"></th>-->
																<th width='150px;'>Value</th>
																<!--<th width="5%"></th>-->
																<th width='150px;'>Keterangan</th>
																<th width='100px;'>Pengkali BPJS TK</th>
																<th width='100px;'>Pengkali BPJS Kes</th>
																<!--<th width="5%"></th>-->
																<!--<th width="20%"></th>-->
															</tr>
														</thead>
														<tbody>
	
															<tr>
																<td>
																	<select name="kompx1" id="kompx1" class="kompx form-control select2" onchange="getsifat(this,'1','1')" style="width:250px">
																		<option value=''></option>
																		<?php //echo $cmbkomp; 
																		?>
																	</select>
																</td>
																<!--<td width="5%"></td>-->
																<td id="haha">
																	<!--<input type="text" class="form-control pull-right" id="valuex1" name="valuex" onchange="hitung(this,'1','1')" style="width:150px">-->
																	<input type="text" class="form-control pull-right" id="valuex1" name="valuex" style="width:150px" onchange="hitung(this,'1','1')">
																</td>
																<!--<td width="5%"></td>-->
																<td>
																	<select class="form-control pull-right" id="ketx1" style="width:150px">
																		<option value="">Pilih</option>
																	</select>
																</td>
																<td>
																	<!--<center><input type="checkbox" class="tk" id="tk_valuex1" onclick="jumlahkan_tk('valuex1','tk_valuex1','kes_valuex1')" name="cekbpjs_tk" value="valuex1"></center>-->
																	<center><input type="checkbox" class="tk" id="tk_valuex1" name="cekbpjs_tk_fixed" value="valuex1" checked disabled></center>
																</td>
																<td>
																	<!--<center><input type="checkbox" class="kes" id="kes_valuex1" onclick="jumlahkan_kes('valuex1','kes_valuex1','tk_valuex1')" name="cekbpjs_kes" value="valuex1"></center>-->
																	<center><input type="checkbox" class="kes" id="kes_valuex1" name="cekbpjs_kes_fixed" value="valuex1" checked disabled></center>
																</td>
																<!--<td width="5%"></td>-->
																<!--<th width="20%"></td>-->
															</tr>
	
	
														</tbody>
													</table>
												</div>

												<br>
												<div id="divmorekomp">


												</div>

												<button type="button" class="btn btn-default btn-sm" id="vaddmorekompx">Add more komponen Variabel</button>
												<table id="tkomp_var" class="table table-bordered table-hover" style="width:850px;">
													<thead style="background-color: blue; color:white;">
														<tr>
															<th width='250px;'>Komponen Variabel</th>
															<!--<th width="5%"></th>-->
															<th width='150px;'>Value</th>
															<!--<th width="5%"></th>-->
															<th width='150px;'>Keterangan</th>
															<th width='100px;'>Pengkali BPJS TK</th>
															<th width='100px;'>Pengkali BPJS Kes</th>
															<!--<th width="5%"></th>-->
															<!--<th width="20%"></th>-->
														</tr>
													</thead>
													<tbody>

														<tr>
															<td>
																<select name="vkompx1" id="vkompx1" class="vkompx form-control select2" onchange="getsifat(this,'1','2')" style="width:250px">
																	<option value=''></option>
																	<?php //echo $cmbkomp; 
																	?>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<td id="haha">
																<input type="text" class="form-control pull-right" id="vvaluex1" name="vvaluex" style="width:150px">
															</td>
															<!--<td width="5%"></td>-->
															<td>
																<select class="form-control pull-right" id="vketx1" style="width:150px">
																	<option value="">Pilih</option>
																</select>
															</td>
															<td>
																<center><input type="checkbox" class="tk" id="tk_vvaluex1" onclick="jumlahkan_tk('vvaluex1','tk_vvaluex1','kes_vvaluex1')" name="cekbpjs_tk" value="vvaluex1"></center>
															</td>
															<td>
																<center><input type="checkbox" class="kes" id="kes_vvaluex1" onclick="jumlahkan_kes('vvaluex1','kes_vvaluex1','tk_vvaluex1')" name="cekbpjs_kes" value="vvaluex1"></center>
															</td>
															<!--<td width="5%"></td>-->
															<!--<th width="20%"></td>-->
														</tr>

													</tbody>
												</table>

												<br>

												<button type="button" class="btn btn-default btn-sm" id="baddmorekompx">Add more komponen Benefit</button>
												<table id="tkomp_ben" class="table table-bordered table-hover" style="width:850px;">
													<thead style="background-color: blue; color:white;">
														<tr>
															<th width='250px;'>Komponen Benefit</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Value</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Keterangan</th>
															<!--<th width="5%"></th>-->
															<!--<th width="20%"></th>-->
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><input type="text" class="nketb form-control pull-right" id="nketb1" name="nketb" value="BPJS TK PERUSAHAAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb1" name="kketb" value="4066"></td>
															<td id="haha">
																<input type="text" class="form-control" id="pbtkp1" name="ppbtkp" style="width:60px" value="9.24" onkeypress="return isNumberKey(event,this.id)">% &nbsp;<input type="text" class="form-control" id="vbtkp1" name="vvbtkp" style="width:172px" readonly=readonly>
															</td>
															<td><input type="text" class="form-control pull-right" id="bketb1" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
														</tr>

														<tr>
															<td><input type="text" class="nketb form-control pull-right" id="nketb2" name="nketb" value="BPJS TK KARYAWAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb2" name="kketb" value="4065"></td>
															<td id="haha">
																<input type="text" class="form-control" id="pbtkp2" name="ppbtkp" style="width:60px" value="0" onkeypress="return isNumberKey(event,this.id)">% &nbsp;<input type="text" class="form-control" id="vbtkp2" name="vvbtkp" style="width:172px" readonly=readonly>
															</td>
															<td><input type="text" class="form-control pull-right" id="bketb2" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
														</tr>

														<tr>
															<td><input type="text" class="nketb form-control pull-right" id="nketb3" name="nketb" value="BPJS KESEHATAN PERUSAHAAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb3" name="kketb" value="4058"></td>
															<td id="haha">
																<input type="text" class="form-control" id="pbtkp3" name="ppbtkp" style="width:50px" value="5" onkeypress="return isNumberKey(event,this.id)">% &nbsp;<input type="text" class="form-control" id="vbtkp3" name="vvbtkp" style="width:172px" readonly=readonly>
															</td>
															<td><input type="text" class="form-control pull-right" id="bketb3" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
														</tr>

														<tr>
															<td><input type="text" class="nketb form-control pull-right" id="nketb4" name="nketb" value="BPJS KESEHATAN KARYAWAN" style="width:250px" readonly=readonly><input type="hidden" class="form-control pull-right" id="kketb4" name="kketb" value="8002"></td>
															<td id="haha">
																<input type="text" class="form-control" id="pbtkp4" name="ppbtkp" style="width:50px" value="0" onkeypress="return isNumberKey(event,this.id)">% &nbsp;<input type="text" class="form-control" id="vbtkp4" name="vvbtkp" style="width:172px" readonly=readonly>
															</td>
															<td><input type="text" class="form-control pull-right" id="bketb4" name="bketb" value="BULAN" style="width:250px" readonly=readonly></td>
														</tr>

														<tr>
															<td>
																<select name="bkompx1" id="bkompx1" class="bkompx form-control select2" onchange="getsifat(this,'1','3')" style="width:250px">
																	<option value=''></option>
																	<?php //echo $cmbkomp; 
																	?>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<td id="haha">
																<input type="text" class="form-control pull-right" id="bvaluex1" name="bvaluex" style="width:250px">
															</td>
															<!--<td width="5%"></td>-->
															<td>
																<select class="form-control pull-right" id="bketx1" style="width:250px">
																	<option value="">Pilih</option>
																</select>
															</td>
															<!--<td>
												<center><input type="checkbox" class="tk" id="tk_bvaluex1" onclick="jumlahkan_tk('bvaluex1','tk_bvaluex1','kes_bvaluex1')" name="cekbpjs_tk" value="bvaluex1"></center>
											</td>
											<td>
												<center><input type="checkbox" class="kes" id="kes_bvaluex1" onclick="jumlahkan_kes('bvaluex1','kes_bvaluex1','tk_bvaluex1')" name="cekbpjs_kes" value="bvaluex1"></center>
											</td>-->
															<!--<td width="5%"></td>-->
															<!--<th width="20%"></td>-->
														</tr>


													</tbody>
												</table>
											</div>

											<!--<button type="button" class="btn btn-default btn-sm" id="addmorekompx">Add more komponen</button>-->

										</div>
									</form>
								</div>
								<div class="modal-footer" style="background-color: blue; color:white;">
									<button type="button" class="btn btn-primary pull-left" id="btncancel">Cancel</button>
									<button type="button" class="btn btn-primary" data-dismiss="modal" id="addkomponen">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->



					<div class="modal fade" id="POPmyModal" name="POPmyModal" role="dialog" tabindex="-1">
						<div class="modal-dialog" id="modal-alert" style="width:850px;">
							<div class="modal-content">
								<div class="modal-header" style="background-color: blue; color:white;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Add Skema</h4>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" id="haha">
										<div class="box-body">

											<div class="form-group" id="divval">
												<label class="col-sm-2 control-label">Jabatan</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="jabaz" readonly>
													<input type="hidden" class="form-control pull-right" id="kodejabz" readonly>
													<input type="hidden" class="form-control pull-right" id="kodekontz" readonly>
													<input type="hidden" class="form-control pull-right" id="kodelevel" readonly>
													<input type="hidden" class="form-control pull-right" id="namalevel" readonly>
													<input type="hidden" class="form-control pull-right" id="kodeskill" readonly>
													<input type="hidden" class="form-control pull-right" id="namaskill" readonly>
													<input type="hidden" class="form-control pull-right" id="detkomp" readonly>
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divval">
												<label class="col-sm-2 control-label">Lokasi</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="lokasz" readonly>
													<input type="hidden" class="form-control pull-right" id="kodelokasiz" readonly>
												</div><!-- /.input group -->
											</div><!-- /.form group -->


											<div class="form-group" id="divhkx">
												<label class="col-sm-2 control-label">HK Pembagi</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="hkpembagiz" readonly>
													<!--<input type="text" class="form-control pull-right" id="umpx" >-->
												</div><!-- /.input group -->
											</div><!-- /.form group -->

											<div class="form-group" id="divumpx">
												<label class="col-sm-2 control-label">UMP</label>
												<div class="col-sm-9">
													<input type="text" class="form-control pull-right" id="umpz" readOnly>
													<!--<input type="hidden" class="form-control pull-right" id="mandatorz" >
											<input type="hidden" class="form-control pull-right" id="fixedz" >-->
												</div>
											</div>

											<hr>

											<div id="allskema">
												<button type="button" class="btn btn-default btn-sm" id="xaddmorekompx">Add more komponen Fixed</button>
												<table id="tkompx" class="table table-bordered table-hover" style="width:750px;">
													<thead style="background-color: blue; color:white;">
														<tr>
															<th width='250px;'>Komponen Fixed</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Value</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Keterangan</th>
															<!--<th width="5%"></th>-->
															<!--<th width="20%"></th>-->
														</tr>
													</thead>
													<tbody>

														<tr>
															<td>
																<select name="xkompx" id="xkompx1" class="xkompx form-control select2" onchange="getsifatx(this,'1','1')" style="width:250px">
																	<option value=''></option>
																	<?php //echo $cmbkomp; 
																	?>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<td id="haha">
																<input type="text" class="form-control pull-right" id="xvaluex1" name="xvaluex" style="width:250px">
															</td>
															<!--<td width="5%"></td>-->
															<td>
																<select class="form-control pull-right" id="xketx1" style="width:250px">
																	<option value="">Pilih</option>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<!--<th width="20%"></td>-->
														</tr>


													</tbody>
												</table>

												<br>
												<div id="divmorekomp">


												</div>

												<button type="button" class="btn btn-default btn-sm" id="xvaddmorekompx">Add more komponen Variabel</button>
												<table id="tkomp_varx" class="table table-bordered table-hover" style="width:750px;">
													<thead style="background-color: blue; color:white;">
														<tr>
															<th width='250px;'>Komponen Variabel</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Value</th>
															<!--<th width="5%"></th>-->
															<th width='250px;'>Keterangan</th>
															<!--<th width="5%"></th>-->
															<!--<th width="20%"></th>-->
														</tr>
													</thead>
													<tbody>

														<tr>
															<td>
																<select name="xvkompx" id="xvkompx1" class="xvkompx form-control select2" onchange="getsifatx(this,'1','2')" style="width:250px">
																	<option value=''></option>
																	<?php //echo $cmbkomp; 
																	?>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<td id="haha">
																<input type="text" class="form-control pull-right" id="xvvaluex1" name="xvvaluex" style="width:250px">
															</td>
															<!--<td width="5%"></td>-->
															<td>
																<select class="form-control pull-right" id="xvketx1" style="width:250px">
																	<option value="">Pilih</option>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<!--<th width="20%"></td>-->
														</tr>

													</tbody>
												</table>

												<br>

												<button type="button" class="btn btn-default btn-sm" id="xbaddmorekompx">Add more komponen Benefit</button>
												<table id="tkomp_benx" class="table table-bordered table-hover" style="width:850px;">
													<thead style="background-color: blue; color:white;">
														<tr>
															<th width='250px;'>Komponen Benefit</th>
															<!--<th width="5%"></th>-->
															<th width='450px;'>Value</th>
															<!--<th width="5%"></th>-->
															<th width='150px;'>Keterangan</th>
															<!--<th width="5%"></th>-->
															<!--<th width="20%"></th>-->
														</tr>
													</thead>
													<tbody>

														<tr>
															<td>
																<select name="xbkompx" id="xbkompx1" class="xbkompx form-control select2" onchange="getsifatx(this,'1','3')" style="width:250px">
																	<option value=''></option>
																	<?php //echo $cmbkomp; 
																	?>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<td id="haha">
																<input type="text" class="form-control pull-right" id="xbvaluex1" name="xbvaluex" style="width:250px">
															</td>
															<!--<td width="5%"></td>-->
															<td>
																<select class="form-control pull-right" id="xbketx1" style="width:250px">
																	<option value="">Pilih</option>
																</select>
															</td>
															<!--<td width="5%"></td>-->
															<!--<th width="20%"></td>-->
														</tr>



													</tbody>
												</table>
											</div>

											<!--<button type="button" class="btn btn-default btn-sm" id="addmorekompx">Add more komponen</button>-->

										</div>
									</form>
								</div>
								<div class="modal-footer" style="background-color: blue; color:white;">
									<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" id="btn_close">Close</button>
									<button type="button" class="btn btn-primary" data-dismiss="modal" id="addkomponenx">Save changes</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->


				</div><!-- /.box -->
			<?php } ?>


		</div><!-- /.row -->
	</section>
</div><!-- /.content-wrapper -->