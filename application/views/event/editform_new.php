<form class="form-horizontal" method="post" enctype="multipart/form-data">	
	<div class="row">
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Type Event :</label>
			<div class="input-group">
				<input type="radio" id="tevent" name="tevent" class="tevent" value="0" <?php if($listedit->flag_pengadaan=="0"){echo "checked=checked";}?>> Insentive &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="tevent" name="tevent" class="tevent" value="1" <?php if($listedit->flag_pengadaan=="1"){echo "checked=checked";}?>> Pengadaan
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;" id="divpengadaan">
			<label>Type Pengadaan :</label>
			<div class="input-group">
				<input type="radio" id="tpengadaan" name="tpengadaan" value="1" <?php if($listedit->flag_pengadaan=="1"){echo "checked=checked";}?>> Barang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="tpengadaan" name="tpengadaan" value="2" <?php if($listedit->flag_pengadaan=="2"){echo "checked=checked";}?>> Pembayaran
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Jenis Event :</label>
			<div class="input-group">
				<input type="radio" id="jevent" name="jevent" value="OTC" <?php if($listedit->jenisevent=="OTC"){echo "checked=checked";}?>> OTC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="jevent" name="jevent" value="RECURING" <?php if($listedit->jenisevent=="RECURING"){echo "checked=checked";}?>> RECURING
			</div>
		</div>
	</div>	
	<div class="row">		
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Nama Event :</label>
			<div class="input-group">
				<input type="hidden" id="eid" name="eid" value="<?php echo $listedit->id ?>" class="form-control pull-right" style="width:250px">	
				<input type="text" id="nevent" name="nevent" value="<?php echo $listedit->nama_event ?>" class="form-control pull-right" style="width:250px">	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Periode Awal :</label>
			<div class="input-group">
				<input type="text" id="speriode" name="speriode" value="<?php echo $listedit->startperiode ?>" class="form-control pull-right" style="width:250px">	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Periode Akhir :</label>
			<div class="input-group">
				<input type="text" id="eperiode" name="eperiode" value="<?php echo $listedit->endperiode ?>" class="form-control pull-right" style="width:250px">	
			</div>
		</div>
	</div>	
	<div class="row">		
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Customer :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="customer" name="customer" style="width:250px">
					<option value="<?php echo $listedit->kd_customer ?>"><?php echo $listedit->customer ?></option>	
					<?php echo $cmbcust;?>
				</select>	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Negara :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="negara" name="negara" style="width:250px" onchange="ubahkota(this.value)">
					<option value="<?php echo $listedit->kdnegara ?>"><?php echo $listedit->negara ?></option>	
					<?php echo $cmbneg ?>
				</select>	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Kota :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="kota" name="kota" style="width:250px;">
					<option value="<?php echo $listedit->kdkota ?>"><?php echo $listedit->kota ?></option>
					<option value="">Pilih Kota</option>
					<option value="NASIONAL">NASIONAL</option>
					<?php echo $cmbkota ?>
				</select>	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Jumlah Peserta :</label>
			<div class="input-group">
				<input type="text" id="jmlpeserta" name="jmlpeserta" value="<?php echo $listedit->peserta ?>" class="form-control pull-right" style="width:250px">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Sumber Alokasi Biaya :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="sab" name="sab" style="width:250px">
					<option value=""<?php if($listedit->sumberalokasi==""){echo "selected=selected";}?>>Pilih Alokasi Biaya</option>
					<option value="1"<?php if($listedit->sumberalokasi=="1"){echo "selected=selected";}?>>SPK</option>
					<option value="2"<?php if($listedit->sumberalokasi=="2"){echo "selected=selected";}?>>Sisa Budget</option>
					<option value="3"<?php if($listedit->sumberalokasi=="3"){echo "selected=selected";}?>>Skema Existing</option>
					<option value="4"<?php if($listedit->sumberalokasi=="4"){echo "selected=selected";}?>>BAK</option>
				</select>
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Total Biaya :</label>
			<div class="input-group">
				<input type="text" id="biaya" name="biaya" value="<?php echo $listedit->biaya ?>" class="form-control pull-right" style="width:250px">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>PO/BAK/PKS/SP :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="jeno" name="jeno" style="width:250px">
					<option value=""<?php if($listedit->jenis_lampiran==""){echo "selected=selected";}?>>Pilih</option>
					<option value="1"<?php if($listedit->jenis_lampiran=="1"){echo "selected=selected";}?>>PO</option>
					<option value="2"<?php if($listedit->jenis_lampiran=="2"){echo "selected=selected";}?>>BAK</option>
					<option value="3"<?php if($listedit->jenis_lampiran=="3"){echo "selected=selected";}?>>PKS</option>
					<option value="4"<?php if($listedit->jenis_lampiran=="4"){echo "selected=selected";}?>>SP</option>
				</select>
			</div>
		</div>	
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>No PO/BAK/PKS/SP :</label>
			<div class="input-group">
				<input type="text" id="nolam" name="nolam" class="form-control pull-right" style="width:250px" value="<?php echo $listedit->no_lampiran ?>">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Nominal PO/BAK/PKS/SP :</label>
			<div class="input-group">
				<input type="text" id="nominal" name="nominal" class="form-control pull-right" style="width:250px" value="<?php echo $listedit->nominal_lampiran ?>">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Management Fee :</label>
			<div class="input-group">
				<input type="text" id="mfee" name="mfee" value="<?php echo $listedit->mfee ?>" class="form-control pull-right" style="width:250px">
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Lampiran : <a href="<?php echo base_url().'event/';?><?php echo $listedit->lampiran;?>" target="_blank" style="color:#FF6633;"> <?php echo $listedit->lampiran; ?> </a></label>
			<div class="input-group">
				<input type="file" class="form-control pull-right" name="lampiran" id="lampiran" />
				<label style="color:#FF0000; font-size:10px;">*Input lampiran jika Ingin mengubah lampiran, jika tidak kosongkan saja.</label>
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Lokasi Pelaksanaan :</label>
			<div class="input-group">
				<textarea id="lokasi" name="lokasi" class="form-control pull-right" rows="3" cols="25"><?php echo $listedit->lokasi ?></textarea>
			</div>
		</div>
		<?php //if(($level=='2' and $regional!='1') OR ($level=='5')){ ?>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Keterangan Approve/Reject :</label>
			<div class="input-group">
				<textarea id="ketapp" name="ketapp" class="form-control pull-right" rows="3" cols="25" <?php if($fl==9){echo 'readonly=readonly';} ?>><?php if($fl==9 OR $fl==2 OR $fl==1){echo $listedit->ketflag;} ?></textarea>
			</div>
		</div>
		
		<?php if($listedit->flag==2) { ?>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>PM :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="pmx" name="pmx" style="width:250px">
					<option value="<?php echo $listedit->userpm; ?>"><?php echo $npm->nama; ?></option>
					<?php echo $cmbpm; ?>
				</select>	
			</div>
		</div>
		<div class="col-md-4" style="margin-bottom:20px;">
			<label>Divisi :</label>
			<div class="input-group">
				<select class="form-control select2 pull-right" id="divisix" name="divisix" style="width:250px;">
					<option value="<?php echo $listedit->divisi; ?>"><?php echo $ndiv->divisi; ?></option>
					<?php echo $cmbdiv; ?>
				</select>	
			</div>
		</div>
		<?php } ?>
		
		<?php //} ?>
		
		<?php if(($level=='1') OR ($level=='2' and $regional=='1')){ ?>
			<?php if($listedit->flag==9){ ?>
			<div class="col-md-4" style="margin-top:60px;">
				<button type="button" class="btn btn-primary" id="btnedit">EDIT</button>
			</div>
			<?php } ?>
		<?php } ?>

		<?php if(($level=='2' and $regional!='1') OR $level=='4'){ ?>
			<?php if($listedit->flag==0 OR $listedit->flag==null){ ?>
			<div class="col-md-4" style="margin-top:60px;" div="divapp_atasan">
				<button type="button" class="btn btn-primary" id="btnapp">APPROVE</button>
				<button type="button" class="btn btn-warning" id="btnrej">REJECT</button>
			</div>
			<?php } ?>
		<?php } ?>
		
		<?php if($level=='5' && $type=='PPC'){ ?>
			<?php if($listedit->flag==1){ ?>
			<div class="col-md-4" style="margin-bottom:20px;">
				<label>PM :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="pm" name="pm" style="width:250px">
						<option value="">Pilih PM</option>
						<?php echo $cmbpm; ?>
					</select>	
				</div>
			</div>
			<div class="col-md-4" style="margin-bottom:20px;">
				<label>Divisi :</label>
				<div class="input-group">
					<select class="form-control select2 pull-right" id="divisi" name="divisi" style="width:250px;">
						<option value="">Pilih Divisi</option>
						<?php echo $cmbdiv; ?>
					</select>	
				</div>
			</div>
			
			<div class="col-md-4" style="margin-top:60px;" div="divapp_ppc">
				<button type="button" class="btn btn-primary" id="btnapp">APPROVE</button>
				<button type="button" class="btn btn-warning" id="btnrej">REJECT</button>
			</div>
			<?php } ?>
		<?php } ?>
	</div>	
	
	<?php if($level=='5' && $type=='PM'){ ?>
		<div class="row">	
		<hr>
			<?php if($listedit->proposal_pm==''){ ?>
			<div class="col-md-4" style="margin-bottom:20px;">
				<label>Proposal :</label>
				<div class="input-group">
					<input type="file" class="form-control pull-right" name="proposal" id="proposal" />
				</div>
			</div>
			<?php } else { ?>
			<div class="col-md-4" style="margin-bottom:20px;">
				<label>Proposal :</label>
				<div class="input-group">
					<label><a href="<?php echo base_url().'proposal_event/';?><?php echo $listedit->proposal_pm;?>" target="_blank" style="color:#FF6633;"> <?php echo $listedit->proposal_pm; ?> </a></label>
				</div>
			</div>
			<?php } ?>
			
			<?php if($listedit->skema_pm==''){ ?>
			<div class="col-md-4" style="margin-bottom:20px;">
				<label>Skema :</label>
				<div class="input-group">
					<input type="file" class="form-control pull-right" name="skema" id="skema" />
				</div>
			</div>
			<?php } else { ?>
			<div class="col-md-4" style="margin-bottom:20px;">
				<label>Skema :</label>
				<div class="input-group">
					<label><a href="<?php echo base_url().'proposal_event/';?><?php echo $listedit->skema_pm;?>" target="_blank" style="color:#FF6633;"> <?php echo $listedit->skema_pm; ?> </a></label>
				</div>
			</div>
			<?php } ?>
			
			<div class="col-md-4" style="margin-bottom:20px;">
				<label>Duedate Pengadaan :</label>
				<div class="input-group">
					<input type="text" id="duedate" name="duedate" value="<?php echo $listedit->duedate_pengadaan; ?>" class="form-control pull-right" style="width:250px">	
				</div>
			</div>
			
			<div class="col-md-4" style="margin-bottom:20px;">
				<label>Nominal Proposal :</label>
				<div class="input-group">
					<input type="text" id="nominal_proposal" name="nominal_proposal" value="<?php echo $listedit->nominal_proposal; ?>" class="form-control pull-right" style="width:250px">	
				</div>
			</div>
			
			<div class="col-md-4" style="margin-top:25px;">
				<button type="button" class="btn btn-primary" id="btnup_pro_new">UPLOAD PROPOSAL</button>
			</div>
		</div>
	<?php } ?>
	
</form>

<script>
$(document).ready(function(){
	$(".select2").select2();
	$('#speriode').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	$('#eperiode').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	$('#duedate').datepicker({format: 'yyyy-mm-dd',autoclose:true});
	
	<?php if($listedit->flag_pengadaan=="1"){ ?>
		$("#divpengadaan").show();
	<?php } else { ?>
		$("#divpengadaan").hide();
	<?php } ?>
	
	<?php if($listedit->flag==9){ ?>
	$('.tevent').click(function(){
		var vevent 	= $('.tevent:checked').val();
		if(vevent==1){
			$("#divpengadaan").show();
		} else {
			$("#divpengadaan").hide();
		}
	});
	<?php } ?>
	
	var rupiah_proposal = document.getElementById('nominal_proposal');
    rupiah_proposal.addEventListener('keyup', function(e)
    {
        rupiah_proposal.value = formatRupiah(this.value);
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