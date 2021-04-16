<!DOCTYPE html>
<html>
<head>
	<title>Second Travel</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.css">
	<script src="<?php echo base_url()?>asset/bootstrap/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>asset/bootstrap/js/bootstrap.js"></script>
</head>
<body style="height:120%">
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
    <div class="col-md-2"> </div>
     <div class="col-md-8" style="background-color: #2980b9;color:#ecf0f1;">
      <br>
      <form action="<?php echo base_url()?>pesawat/saveData" method="POST">
      <?php
       $i = 0;
       $z = 1;
       $k = 0;
         foreach ($bandara as $a) {
         $kota[$i] = $a->kota;
         $kode[$i] = $a->kode_bandara;
         $bandara[$i] = $a->nama_bandara;
         $i++;
        } ?>
         <h2>Konfirmasi Pesanan</h2>
            <p>Silahkan Cek Data Dibawah Ini</p>
            <?php
            foreach ($pilih as $a) {
            ?>
            <table class="table">
              <tr>
                <td>Nomer Penerbangan</td>
                <td><?php $dz = $a->nomer_penerbangan;echo $dz?>
                  <input type="hidden" name="terbang" value="<?php echo $dz?>">
                  <input type="hidden" name="nami" value="<?php echo $nami;?>">
                  <input type="hidden" name="email" value="<?php echo $email?>">
                </td>
              </tr>
              <tr>
                <td>Bandara Awal</td>
                <td><?php echo $kota[$k]?> - <?php echo $bandara[$k]?> (<?php echo $kode[$k]?>)</td>
                </tr>
              <tr>
                <td>Bandara Tujuan</td>
                <td><?php echo $kota[$z]?> - <?php echo $bandara[$z]?> (<?php echo $kode[$z]?>)</td>
              </tr>
              <tr>
                <td>Tanggal Berangkat</td>
                <td><?php echo date("d F Y",strtotime($tanggal))?></td>
              </tr>
              <tr>
                <td>Waktu Berangkat - Waktu Tiba</td>
                <td><?php echo $a->waktu_berangkat?> - <?php echo $a->waktu_tiba?> (<?php echo $a->waktu_tiba - $a->waktu_berangkat?> Jam)</td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td><?php echo $kelas?>
                  <input type="hidden" name="bagopi" value="<?php echo $kelas?>">
                </td>
              </tr>           
            </table>        
          </div>
        <br> 
        <div class="col-md-2"></div> 
      <?php } ?>
      </div>
      <br>
    <div class="container">
    <div class="col-md-2"> </div>
     <div class="col-md-8" style="background-color: #2980b9;color:#ecf0f1;">
     <h2>Data Penumpang</h2>
      <?php
                $i = 1;
                $z = $this->session->userdata('dewasa');
                $q = $this->session->userdata('anak');
                for($i=1;$i<=$z;$i++){
                ?>
     <div class="col-md-6">
           <p>Penumpang Ke-<?php echo $i?></p>
            <table class="table">
            <tr>
                <td>Gelar </td>
                <td><?php 
                $ga = ${"gelar".$i};
                  echo $ga;
                  ?>
                  <input type="hidden" name="jk<?php echo $i?>" value="<?php echo $ga?>">
                </td>
              </tr>  
              <tr>
                <td>Nama </td>
                <td><?php 
                $gi = ${"nama".$i}; 
                echo $gi ?>
                <input type="hidden" name="nama<?php echo $i?>" value="<?php echo $gi?>">
                </td>
              </tr>
             <tr>
                <td>Jenis Tanda Pengenal </td>
                <td><?php 
                $gu = ${"jid".$i}; 
                echo $gu ?>
                <input type="hidden" name="jid<?php echo $i?>" value="<?php echo $gu?>">
                </td>
              </tr>
              <tr>
                <td>Nomer Tanda Pengenal </td>
                <td><?php 
                $ge = ${"id".$i}; 
                echo $ge ?>
                <input type="hidden" name="id<?php echo $i?>" value="<?php echo $ge?>">
                </td>
              </tr>
              <tr>
                <td>Jenis Tiket </td>
                <td><?php 
                $go = ${"jen".$i}; 
                echo $go ?>
                <input type="hidden" name="jen<?php echo $i?>" value="<?php echo $go?>">
                </td>
              </tr>
            </table>        
          </div>
        <?php } for($g=1;$g<=$q;$g++){?> 
             <div class="col-md-6">
           <p>Penumpang Ke-<?php echo $g?></p>
            <table class="table">
            <tr>
                <td>Gelar </td>
                <td>Anak
                  <input type="hidden" name="jka<?php echo $i?>" value="Anak">
                </td>
              </tr>  
              <tr>
                <td>Nama </td>
                <td><?php 
                $gia = ${"namaa".$i}; 
                echo $gia ?>
                <input type="hidden" name="namaa<?php echo $i?>" value="<?php echo $gia?>">
                </td>
              </tr>
                <input type="hidden" name="jida<?php echo $i?>" value="">
              <tr>
                <input type="hidden" name="ida<?php echo $i?>" value="">
                </td>
              </tr>
              <tr>
                <td>Jenis Tiket </td>
                <td><?php 
                $goa = ${"jena".$i}; 
                echo $goa ?>
                <input type="hidden" name="jena<?php echo $i?>" value="<?php echo $goa?>">
                </td>
              </tr>
            </table>        
          </div>
        <?php } ?>
         </div> 
        <br> 
        <div class="col-md-2"></div> 
      </div><br>
          <div class="container">
    <div class="col-md-2"> </div>
     <div class="col-md-8" style="background-color: #2980b9;color:#ecf0f1;">
     <div class="col-md-12">
     <h2>Transaksi</h2>
            <table class="table">
            <tr>
              <td>Jumlah Penumpang</td>
              <td><?php echo $dewasa?> Dewasa <?php
              if($anak > 0){
              echo "- ".$anak?> Anak</td>
              <?php } ?>
            </tr>
            <tr>
                <td>Total Biaya </td>
                <td>Rp. <?php echo $harga?>
                  <input type="hidden" name="total" value="<?php echo $harga?>">
                </td>
              </tr>  
            </table>        
         </div>
      <div class="col-md-12">
      <center>
        <input type="submit" value="Pesan Sekarang" class="btn btn-primary" style="background-color: white;color:#2980b9;position:center">
        <br>
        <br>
        </center>
      </div>
        <br>
        </form>
        <div class="col-md-2"></div> 
        </div>
        <div class="col-md-12"><br><br><br><br><br></div>
        </body>
        </html>