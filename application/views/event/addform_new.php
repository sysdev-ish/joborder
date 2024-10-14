<form class="form-horizontal" method="post" enctype="multipart/form-data">	
	<div class="row">
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Type Event :</label>
			<div class="input-group">
				<input type="radio" id="tevent" name="tevent" class="tevent" value="0" checked=checked> Insentive &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="tevent" name="tevent" class="tevent" value="1"> Pengadaan
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;" id="divpengadaan">
			<label>Type Pengadaan :</label>
			<div class="input-group">
				<input type="radio" id="tpengadaan" name="tpengadaan" value="1" checked=checked> Barang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="tpengadaan" name="tpengadaan" value="2"> Pembayaran
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Jenis Event :</label>
			<div class="input-group">
				<input type="radio" id="jevent" name="jevent" value="OTC" checked=checked> OTC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="jevent" name="jevent" value="RECURING"> RECURING
			</div>
		</div>	
	</div>	
	<div class="row">		
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Nama Event :</label>
			<div class="input-group">
				<input type="hidden" id="eid" name="eid" value="" class="form-control pull-right" style="width:250px">	
				<input type="text" id="nevent" name="nevent" class="form-control pull-right" style="width:250px">	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Periode Awal :</label>
			<div class="input-group">
				<input type="text" id="speriode" name="speriode" class="form-control pull-right" style="width:250px">	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Periode Akhir :</label>
			<div class="input-group">
				<input type="text" id="eperiode" name="eperiode" class="form-control pull-right" style="width:250px">	
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Customer :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="customer" name="customer" style="width:250px">
					<option value="">Pilih Customer</option>	
					<?php echo $cmbcust;?>
				</select>	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Negara :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="negara" name="negara" style="width:250px" onchange="ubahkota(this.value)">
					<option value="">Pilih Negara</option>
					<?php echo $cmbneg ?>
				</select>	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Kota :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="kota" name="kota" style="width:250px;">
					<option value="">Pilih Kota</option>
					<option value="NASIONAL">NASIONAL</option>
					<?php echo $cmbkota ?>
				</select>	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Jumlah Peserta :</label>
			<div class="input-group">
				<input type="text" id="jmlpeserta" name="jmlpeserta" class="form-control pull-right" style="width:250px">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Sumber Alokasi Biaya :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="sab" name="sab" style="width:250px">
					<option value="">Pilih Alokasi Biaya</option>
					<option value="1">SPK</option>
					<option value="2">Sisa Budget</option>
					<option value="3">Skema Existing</option>
					<option value="4">BAK</option>
				</select>
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Total Biaya :</label>
			<div class="input-group">
				<input type="text" id="biaya" name="biaya" class="form-control pull-right" style="width:250px">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>PO/BAK/PKS/SP :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="jeno" name="jeno" style="width:250px">
					<option value="">Pilih</option>
					<option value="1">PO</option>
					<option value="2">BAK</option>
					<option value="3">PKS</option>
					<option value="4">SP</option>
				</select>
			</div>
		</div>	
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>No PO/BAK/PKS/SP :</label>
			<div class="input-group">
				<input type="text" id="nolam" name="nolam" class="form-control pull-right" style="width:250px">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Nominal PO/BAK/PKS/SP :</label>
			<div class="input-group">
				<input type="text" id="nominal" name="nominal" class="form-control pull-right" style="width:250px">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Management Fee :</label>
			<div class="input-group">
				<input type="text" id="mfee" name="mfee" class="form-control pull-right" style="width:250px">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Lampiran :</label>
			<div class="input-group">
				<input type="file" class="form-control pull-right" name="lampiran" id="lampiran"/>
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Lokasi Pelaksanaan :</label>
			<div class="input-group">
				<textarea id="lokasi" name="lokasi" class="form-control pull-right" rows="3" cols="25"></textarea>
			</div>
		</div>
		<div class="col-md-4" style="margin-top:60px;">
			<button type="button" class="btn btn-primary" id="btnadd">ADD</button>
		</div>
	</div>
</form>

<script>
$(document).ready(function(){
	$(".select2").select2();
	$('#speriode').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	$('#eperiode').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	$("#divpengadaan").hide();
	
	$('.tevent').click(function(){
		var vevent 	= $('.tevent:checked').val();
		if(vevent==1){
			$("#divpengadaan").show();
		} else {
			$("#divpengadaan").hide();
		}
	});
	
	
	var rupiah_nominal = document.getElementById('nominal');
    rupiah_nominal.addEventListener('keyup', function(e)
    {
        rupiah_nominal.value = formatRupiah(this.value);
    });
	
	var rupiah_biaya = document.getElementById('biaya');
    rupiah_biaya.addEventListener('keyup', function(e)
    {
        rupiah_biaya.value = formatRupiah(this.value);
    });
	
	function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
});

function ubahkota(id){
	if(id==1){
		document.getElementById("kota").removeAttribute("disabled");
	} else {
		document.getElementById("kota").setAttribute("disabled", true);
		$("#kota").val("").trigger('change');
	}
}
</script>