<!DOCTYPE html>
<html>
<head>
	<title>E-Ticket Second Travel</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.css">
</head>
<body onload="window.print()">
<div class="container">
<?php
	$i = 0;
    $z = 0;
    $k = 1;
    $q = 1;
    $j = 1;
     foreach ($bandara as $a) {
    $kota[$i] = $a->kota;
    $kode[$i] = $a->kode_stasiun;
    $bandara[$i] = $a->nama_stasiun;
    $i++;
    }
    ?>
    <h2 style="font-family:Palatino Linotype;">E-Ticket SecondTravel</h2>
	<div class="col-md-6">
		<table class="table">
		<?php foreach($user as $i){ ?>
			<tr>
			<td><b>Id Booking</b></td>
			<td><?php echo $i->id_booking?></td>
          	</tr>
			<tr>
			<td><b>Tanggal Booking</b></td>
			<td><?php echo date("d F Y",strtotime($i->tanggal_pesan))?></td>
			</tr>
			<tr>
			<td><b>Tanggal Berangkat</b></td>
			<td><?php echo date("d F Y",strtotime($i->tanggal_berangkat))?></td>
			</tr>
			<tr>
			<td><b>Waktu Berangkat</b></td>
			<td><?php echo $i->waktu_berangkat?></td>
          	</tr>
			<tr>
			<td><b>Waktu Tiba</b></td>
			<td><?php echo $i->waktu_tiba?></td>
          	</tr>
		<?php } ?>
		</table>
	</div>
	<div class="col-md-6">
		<table class="table">
			<tr><td><b>Stasiun Awal</b></td>
          	<td><?php echo $kota[$z];?> - <?php echo $bandara[$z];?> (<?php echo $kode[$z]?>)</td></tr>
			<tr><td><b>Stasiun Tujuan</b></td>
          	<td><?php echo $kota[$j];?> - <?php echo $bandara[$j];?> (<?php echo $kode[$j]?>)</td></tr>
		</table>
	</div>
	<div class="col-md-12">
	<table class="table">
	<tr>
		<th>No Tiket</th>
		<th>Gelar</th>
		<th>Nama Penumpang</th>
		<th>Nomer Identitas</th>
		<th>Jenis Tiket</th>
	</tr>
	<?php foreach ($penumpang as $z) { ?>
	<tr>
		<td><?php echo $z->no_tiket?></td>
		<td><?php echo $z->jk?></td>
		<td><?php echo $z->nama_costumer?></td>
		<td><?php echo $z->nomer_identitas?></td>
		<td><?php echo $z->tipe?></td>
	</tr>	
	<?php } ?>
	</table>
	</div>
	</div>
</body>
</html>