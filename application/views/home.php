<!DOCTYPE html>
<html>
<head>
	<title>Second Travel</title>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.css">
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
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('nama');?></a></li>
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
<div class="jumbotron" style="background-color: #2980b9;color:#ecf0f1;">
  <h1>Second Travel</h1> 
  <p>Selamat Datang di Website Second Travel</p>
  <p>Travel Nomer Satu</p>
  <p>Se Cimenteng Raya</p>
</div>
<div class="row">
<center><p style="font-size: 20px;">Keunggulan Kami</p><br></center>
    <div class="col-sm-4">
    <center>
      <i class="fa fa-4x fa-thumbs-o-up text-primary mb-3 sr-icons"></i>
      <h3>Pelayanan Terbaik</h3>
    </center>
      <p>Kami menjamin pelayanan kami yang terbaik diantara yang terbaik</p> 
    </div>
    <div class="col-sm-4">
    <center>
      <i class="fa fa-4x fa-money text-primary mb-3 sr-icons"></i>
      <h3>Harga Murah</h3>
      </center>
      <p>Harga tiket di Travel kami termurah dibandingkan dengan yang lain</p>
    </div>
    <div class="col-sm-4">
        <center>
      <i class="fa fa-4x fa-clock-o text-primary mb-3 sr-icons"></i>
      <h3>Tersedia 24 Jam</h3> 
    </center>
      <p>Website kami tersedia selama 24 jam setiap hari, 30 hari setiap bulan sehingga anda dapat memesan tiket kapanpun dan dimanapun</p>
    </div>
  </div>
</div>
</body>
</html>