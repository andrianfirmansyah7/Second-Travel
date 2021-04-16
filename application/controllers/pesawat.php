<?php

	class Pesawat extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_tiket');
		}

		function index(){
			$data['bandara'] = $this->model_tiket->getBandara();
			$this->load->view('bandara',$data);
		}

		function getjadwal(){
			$dari = $this->input->post('bnd1');
			$menuju = $this->input->post('bnd2');
			$tanggal = $this->input->post('tanggal');
			$anak = $this->input->post('anak');
			$kelas = $this->input->post('bom');
			$dewasa = $this->input->post('dewasa');
			$data['bandara'] = $this->model_tiket->getBandara2($dari,$menuju);
			$data['jadwal'] = $this->model_tiket->getJadwal($dari,$menuju,$kelas,$tanggal);
			$data['jumlah'] = $this->model_tiket->getJml($dari,$menuju,$kelas,$tanggal);
			$data['kelas'] = $kelas;
			$session['tanggal']	= $tanggal;
			$session['anak'] = $anak;
			$session['dewasa'] = $dewasa;
			$this->session->set_userdata($session);
			$this->load->view('jadwal_pesawat',$data);
			}

		function pesan_tiket($id){
			$data['harga'] = $this->model_tiket->get_harga($id);
			$data['kelas'] = $this->input->post('kelas');
			$data['nomer'] = $this->input->post('nomer');
			$data['kelas'] = $this->input->post('kelas');
			$data['awal'] = $this->input->post('awal');
			$data['akhir'] = $this->input->post('akhir');
			$a = $this->session->userdata('dewasa');
			$b = $this->session->userdata('anak');
			$tambah = $a+$b;
			$data['jml'] = $tambah;
			$data['kd'] = $this->input->post('kd');
			$this->load->view('pesan_pesawat',$data);
		}

		function tambahdata(){ 
		$nami = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$tgl = $this->session->userdata('tanggal');
		$jml = $this->input->post('jml');
		$email = $this->input->post('email');
		$kelas = $this->input->post('bagoi');
		$nomer = $this->input->post('nomer');
		$harga = $this->input->post('harga');
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');
		$kd = $this->input->post('kd');
		$anak = $this->session->userdata('anak');
		$dewasa = $this->session->userdata('dewasa');
		$hAnak = $anak * $harga/2;
		$hDewasa = $dewasa * $harga;
		$total = $hAnak + $hDewasa;
		$data['kelas'] = $kelas;
		$data['email'] = $email;
		$data['harga'] = $total;
		$data['anak'] = $anak;
		$data['dewasa'] = $dewasa;
		$data['tanggal'] = $tgl;
		$data['nami'] = $nami;
		$data['jml'] = $anak + $dewasa;
		$data['pilih'] = $this->model_tiket->getDetails($awal,$akhir,$nomer);
		$data['bandara'] = $this->model_tiket->getBandara2($awal,$akhir);
		$dati = array();
		for($i=1;$i<=$jml;$i++){
			$data['nama'.$i] = $_POST['nama'.$i];
			$data['gelar'.$i] = $_POST['jk'.$i];
			$data['jid'.$i] = $_POST['jid'.$i];
			$data['id'.$i] = $_POST['id'.$i];
			$data['jen'.$i] = $_POST['jen'.$i];
		}
		$this->load->view('konfirmasi_pesawat',$data);
		}

		function saveData(){
		$kode = $this->model_tiket->getkodetiket();
		$nami = $this->input->post('nami');
		$email = $this->input->post('email');
		$anak = $this->session->userdata('anak');
		$dewasa = $this->session->userdata('dewasa');
		$tgl = $this->session->userdata('tanggal');
		$total = $this->input->post('total');
		$nomer = $this->input->post('nomer');
		$kelas = $this->input->post('bagopi');
		$nomer = $this->input->post('terbang');
		$data = array(
		'id_booking' => $kode,
		'costumer' => $nami,
		'email' => $email,
		'tanggal_pesan' => date('Y-m-d'),
		'tanggal_berangkat' => $tgl,
		'total_biaya' => $total,
		'jml_anak' =>	$anak,
		'jml_dewasa' => $dewasa,
		'jadwal' => $nomer
		);

		$this->model_tiket->tambah($data,'booking_pesawat');

		$i=1;
		while(isset($_POST['nama'.$i]))
	    {
	    $kode1 = $this->model_tiket->getnomertiket();
	    $book = $kode;
	    $nama = $_POST['nama'.$i]; 
        $jk = $_POST['jk'.$i];
		$jenis = $_POST['jid'.$i];
		$id = $_POST['id'.$i];
		$tiket = $_POST['jen'.$i];

        $nomer = $nomer;
        $kels = $kelas;
        $tanggal1 = $tgl;
		$this->model_tiket->tambah_penumpang($nama,$jk,$kode1,$nomer,$book,$kels,$tanggal1,$jenis,$id,$tiket);
    	$i++;
   		}
   		redirect('pesawat/selamat/'.$book);
		}

		function selamat($id){
			$data['id'] = $id;
			$this->load->view('selamat',$data);
		}

		function pembayaran(){
			$data['kode'] = $_GET['data'];
			$this->load->view('pembayaran_pesawat',$data);
		}

		function cetak_tiket($id){
			$data['user'] = $this->model_tiket->getuser($id);
			$bandara = $this->db->query("SELECT a.id_booking,a.costumer,a.email,a.tanggal_pesan,a.tanggal_berangkat,b.no_tiket,b.nama_costumer,b.jk,b.kelas,c.nomer_penerbangan, c.dari,c.menuju, c.waktu_berangkat,c.waktu_tiba,d.nama_pesawat,d.jumlah_bis,d.jumlah_eko,e.nama_maskapai,e.kode_maskapai,e.foto_maskapai, f.harga_eko, f.harga_bis
				FROM booking_pesawat a
				LEFT JOIN penumpang_pesawat b on a.id_booking = b.id_booking
				LEFT JOIN jadwal_pesawat c on c.nomer_penerbangan = b.no_penerbangan
				LEFT JOIN pesawat d on c.pesawat = d.id_pesawat
				LEFT JOIN maskapai e on c.maskapai = e.id_maskapai
				LEFT JOIN harga_pesawat f on c.harga = f.id_harga
				where a.id_booking = '$id' AND b.id_booking = '$id'");
			foreach ($bandara->result_array() as $i) {
				$dari = $i['dari'];
				$menuju = $i['menuju'];
			}
			$data['bandara'] = $this->model_tiket->getBandara2($dari,$menuju);
			$data['penumpang'] = $this->model_tiket->getpenumpang1($id);
			$this->load->view('print_tiket',$data);
	}
		function cetak(){
			$this->load->view('selamat');
		}
}
