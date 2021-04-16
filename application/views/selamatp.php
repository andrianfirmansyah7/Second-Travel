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
  <h2>Selamat,Tiket Telah Berhasil Dipesan</h2>
  <p>Cetak E-Tiket</p>
  <div class="col-md-12">
  <center>
	<a href="<?php echo base_url()?>pesawat/cetak_tiket/<?php echo $id?>" class="btn btn-primary" style="background-color: white;color:#2980b9;position:center">Cetak Tiket</a><br></center>
  </div>
</div>
</div>

