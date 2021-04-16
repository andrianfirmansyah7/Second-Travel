<!DOCTYPE html>
<html>
<head>
	<title>Second Travel</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/font-awesome/css/fontawasome.min.css">
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
      <?php if($this->session->userdata('status') == 'Login'){?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('nama')?></a></li>
        <li><a href="<?php echo base_url();?>login/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
      <?php }else{ ?>
         <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url() ?>login/daftar"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="<?php echo base_url();?>login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      <?php
      }
      ?>
    </div>
  </div>
</nav>
<div class="container">
<div class="col-md-2">
</div>
<div class="col-md-8" style="background-color: #2980b9;color:#ecf0f1;">
<br>
  <h2>Pemesanan Tiket Pesawat</h2>
  <p>Silahkan Masukkan Data Terlebih Dahulu</p>
  <form action="<?php echo base_url()?>pesawat/getJadwal" method="POST">
  <div class="col-md-12">
  <div class="col-md-6">
  <label>Bandara Awal</label>
    <?php
          echo "<select name='bnd1' class='form-control' required>
          <option value='' disabled selected>Bandara Awal</option>";
          foreach ($bandara as $q){
          echo "<option value='".$q->id_bandara."'>".$q->nama_bandara." (".$q->kode_bandara.")</option>";
          } 
          echo "</select>";
         ?>
         </div>
         <div class="col-md-6">
  <label>Bandara Tujuan</label>
    <?php
          echo "<select name='bnd2' class='form-control' required>
          <option value='' disabled selected>Bandara Tujuan</option>";
          foreach ($bandara as $q){
          echo "<option value='".$q->id_bandara."'>".$q->nama_bandara." (".$q->kode_bandara.")</option>";
          } 
          echo "</select>";
         ?><br>   
         </div>  
  </div>
  <div class="col-md-12">
    <div class="col-md-6">
   <label>Tanggal Berangkat</label>
   <input type="date" name="tanggal" class="form-control" required><br>
   </div>
   <div class="col-md-6">
   <label>Jumlah Penumpang</label><br>
   <div class="col-md-6">
   <label>Dewasa</label>
   <input type="number" name="dewasa" class="form-control" placeholder="Dewasa" min="0" max="4" value="0">
   </div>
   <div class="col-md-6">
   <label>Anak-Anak</label>
   <input type="number" name="anak" class="form-control" placeholder="Anak-anak" min="0" max="4" value="0">      
   </div>
   </div>
   </div>
   <div class="col-md-12">
   <div class="col-md-6">
   <label>Kelas</label>
   <select name='bom' class="form-control">
   <option value='' disabled selected>Kelas</option>
    <option value="Bisnis">Bisnis</option>
    <option value="Ekonomi">Ekonomi</option>
   </select>
   <br>
   </div>
   </div>
   <div class="col-md-12">
   <div class="col-md-4"></div>
    <div class="col-md-4">
    <center><input type="submit" value="Cari Data" class="btn btn-primary" style="background-color: white;color:#2980b9;position:center"></center><br></div>   
   </div>
    </form>
</div>
</div>
</body>
</html>