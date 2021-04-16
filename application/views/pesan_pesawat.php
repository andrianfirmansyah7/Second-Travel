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
		     <h2>Pemesan</h2>
		        <p>Silahkan Masukkan Data Terlebih Dahulu</p>
		        <?php
		        foreach($harga as $d){
		        if($kelas == "Ekonomi"){
		        	$h = $d->harga_eko;	        	
		        }else{
		        	$h = $d->harga_bis;
		        }
		    	}
		        ?>
		         <form class="form-horizontal" method="POST" action="<?php echo base_url()?>pesawat/tambahdata">
		          <input type="hidden" name="harga" value="<?php echo $h?>">
		          <input type="hidden" name="nomer" value="<?php echo $nomer?>">
		          <input type="hidden" name="bagoi" value="<?php echo $kelas?>">
		          <input type="hidden" name="awal" value="<?php echo $awal?>">
		          <input type="hidden" name="akhir" value="<?php echo $akhir?>">
		          <input type="hidden" name="kd" value="<?php echo $kd?>">
		            <div class="form-group">
		                 <label class="control-label col-sm-2" for="nama">Nama Pemesan</label>
		                      <div class="col-sm-10">
		                             <input type="name" name="nama" class="form-control" id="nama" placeholder="Nama Pemesan">
		                       </div>
		             </div>
		                    <div class="form-group"> 
		                        <label class="control-label col-sm-2" for="pwd">Email</label>
		                             <div class="col-sm-10">        
		                             <input type="email" class="form-control" id="pwd" placeholder="Email" name="email">     
		                             </div>
		                             </div> 
		                             <br>
		                    </div> 
		                    <div class="col-md-2"> </div>
		                    </div>
		                    <br> 
		                    <div class="container"> <div class="col-md-2"> </div> <div class="col-md-8" style ="background-color: #2980b9;color:#ecf0f1;"> 
		                    <br>
		                    <?php
		                    $i = 1;
               				$z = $this->session->userdata('dewasa');
              				$m = $this->session->userdata('anak');
		                    for($i=1;$i<=$z;$i++){
		                    ?>
		                    <div class="col-md-6">
		                       <h2>Data Penumpang <?php echo $i ?></h2>   
		                       <p>Silahkan Masukkan Data Terlebih Dahulu</p>
		                       <div class="col-md-6">
		                       	<label>Titel</label>
		                       <select class="form-control" name="jk<?php echo $i?>">
		                       		<option value='' disabled selected>Titel</option>         
		                       		<option value="Mr">Mr</option>
		                       		<option value="Mrs">Mrs</option>
		                       		<option value="Miss">Miss</option>
		                       	</select>
		                       	</div>
		                      <div class="col-md-6">
		                       	<label>Jenis Pengenal</label>
		                       <select class="form-control" name="jid<?php echo $i?>">
		                       		<option value='' disabled selected>Pengenal</option>         
		                       		<option value="KTP">KTP</option>
		                       		<option value="Passport">Passport</option>
		                       	</select>
		                       	<br>
		                       	</div>
		                       	<br>
		                       	<br>
		                       <label>Nama Penumpang</label>       
		                       <input type="name" name="nama<?php echo $i?>" class="form-control" id="nama" placeholder="Nama Penumpang"><br>
		                       <label>Nomer Tanda Pengenal</label>       
		                       <input type="name" name="id<?php echo $i?>" class="form-control" id="nama" placeholder="Nomer Tanda Pengenal" maxlength="16">
		                        <input type="hidden" name="jen<?php echo $i?>" class="form-control" id="nama" value="Dewasa"><br>
		                   		 </div>
		                       	<?php } for($q=1;$q<=$m;$q++){
		                    ?>
		                    <div class="col-md-6">
		                       <h2>Data Penumpang <?php echo $i ?></h2>   
		                       <p>Silahkan Masukkan Data Terlebih Dahulu (Penumpang Anak)</p>
		                       <label>Nama Penumpang</label>       
		                       <input type="name" name="namaa<?php echo $i?>" class="form-control" id="nama" placeholder="Nama Penumpang"><br>
		                        <input type="hidden" name="jena<?php echo $i?>" class="form-control" id="nama" value="Anak"><br>
		                   		 </div>
		                       	<?php } ?>
		                       	<input type="hidden" name="jml" value="<?php echo $z?>">
 							   <div class="col-md-12">
 							   <br><center><input type="submit" value="Cari Data" class="btn btn-primary" style="background-color: white;color:#2980b9;position:center"></center><br></div>   
  								 </div>
		                       </div> <div class="col-md-2"></div> 
		                       </form>
		                       </div>
		                       </body> </html>
