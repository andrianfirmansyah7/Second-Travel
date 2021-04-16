<!DOCTYPE html>
<html>
<head>
	<title>Second Travel</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.css">
  <style type="text/css">
    .blue
  </style>
	<script src="<?php echo base_url()?>asset/bootstrap/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>asset/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">SecondTravel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url() ?>welcome">Home</a></li>
        <li><a href="<?php echo base_url() ?>pesawat">Pemesanan Tiket Pesawat</a></li> 
        <li><a href="<?php echo base_url() ?>kereta">Pemesanan Tiket Kereta</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url() ?>login/daftar"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="<?php echo base_url();?>login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="col-md-1">
    <?php
    $i = 0;
    $z = 0;
    $k = 1;
    $q = 1;
    $j = 1;
    foreach ($kereta as $a) {
    $kota[$i] = $a->kota;
    $kode[$i] = $a->kode_stasiun;
    $stasiun[$i] = $a->nama_stasiun;
    $i++;
    }
    ?>
  </div>
  <div class="col-md-10">
    <h2><?php echo $kota[$z]?> (<?php echo $kode[$z]?>) <i class="fa fa-arrow-circle-right"></i> <?php echo $kota[$k]?> (<?php echo $kode[$k]?>)</h2>
    <p><?php echo $this->session->userdata('tanggal')?>
    <p>Kelas <?php echo $kelas?></p>
    <table class="table table-stripped">
    <thead>
      <th>Maskapai</th>
      <th>Waktu Berangkat</th>
      <th>Waktu Tiba</th>
      <th>Durasi</th>
      <th>Harga</th>
      <th>Pesan</th>
    </thead>
    <tr>
        <?php      
        foreach ($jadwal as $d){
          $date = $d->waktu_berangkat;
          $date2 = $d->waktu_tiba;
          if($kelas == 'Ekonomi'){
            $dn = $d->jumlah_eko;
            $dang = $dn;
            $ding = $d->harga_eko;
            $dung = "Ekonomi";
          }else if($kelas == 'Bisnis'){
            $dn = $d->jumlah_bis;
            $dang = $dn;
            $ding = $d->harga_bis;
            $dung = "Bisnis";
          }
    ?>
    <td><p><img src="<?php echo base_url()?>asset/gambar/kereta.png" style="margin-right: 5px;"></p>
    <p><?php echo $d->nama_kereta?></p>
     <a href="#" data-toggle="modal" data-target="#myModal<?php echo $j++?>">Detail Penerbangan</a>
<div id="myModal<?php echo $q++?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Penerbangan</h4>
      </div>
      <div class="modal-body">
      <table class="table">
      <tr>
          <td>Kereta</td>
          <td><?php echo $d->nama_kereta;?></td>
        </tr>

        <tr>
          <td>Stasiun Awal</td>
          <td><?php echo $kota[$z];?> - <?php echo $stasiun[$z];?> (<?php echo $kode[$z]?>)

          </td>
        </tr>
        <tr>
          <td>Bandara Tujuan</td>
          <td><?php echo $kota[$k];?> - <?php echo $stasiun[$k];?> (<?php echo $kode[$k]?>)</td>
        </tr>
         <tr>
          <td>Kursi Tersisa</td>
          <td><?php echo $dang;?></td>
        </tr>
        <tr>
          <td>Pembatalan</td>
          <td>Tidak Diperbolehkan</td>
        </tr>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </td>
    <form method="POST" action="<?php echo base_url()?>kereta/pesan_tiket/<?php echo $d->id_jadwal?>">
    <input type="hidden" name="kelas" value="<?php echo $dung ?>">
    <input type="hidden" name="nomer" value="<?php echo $d->id_jadwal ?>">
    <input type="hidden" name="kelas" value="<?php echo $kelas ?>">
    <input type="hidden" name="awal" value="<?php echo $d->stasiun_awal?>">
    <input type="hidden" name="akhir" value="<?php echo $d->stasiun_tujuan?>">
    <td><?php echo $date?></td>
    <td><?php echo $date2?></td>
    <td><?php echo $date2 - $date?> Jam</td>
    <td><p style="color:#2980b9">Rp. <?php echo number_format($ding)?></p></td>
    <td><input type="submit" class="btn btn-primary" value="Pesan"></td>
    </form>
    </tr>
    <?php
     }
    ?>
    </table>
  </div>
  <div class="col-md-1">
  </div>
</div>

</body>
</html>