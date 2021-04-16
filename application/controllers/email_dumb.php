   		$pesan ="<h1>Pembayaran</h1><p>Saudara ".$nami."</p>
			<p>Silahkan Lakukan Pembayaran Dengan Menekan Link di Bawah Ini</p>
			<br>
			<p><a href='".base_url()."kereta/selamat/".$kode."'>".base_url()."pesawat/pembayaran/".$kode."</a></p>";
			$ci = get_instance();
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_timeout'] = '7';
			$config['smtp_user'] = "andrianfirmansyah6290@gmail.com";
			$config['smtp_pass'] = "cimenteng";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$config['validation'] = TRUE;
	
			$ci->email->initialize($config);
		
			$ci->email->from('andrianfirmansyah6290@gmail.com','Admin');
			$ci->email->to($email);
			$ci->email->subject('Reset Password');
			$ci->email->message($pesan);
			if($this->email->send()){
			redirect('pesawat/cetak');
			}else{
			show_error($this->email->print_debugger());
			}
