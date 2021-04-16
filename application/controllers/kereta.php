<?php
	
	class Kereta extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_tiket');
		}

		function index(){
			$data['stasiun'] = $this->model_tiket->getStasiun();
			$this->load->view('stasiun',$data);
		}

		function getjadwal(){
			$dari = $this->input->post('st1');
			$menuju = $this->input->post('st2');
			$tanggal = $this->input->post('tanggal');
			$anak = $this->input->post('anak');
			$kelas = $this->input->post('bom');
			$dewasa = $this->input->post('dewasa');
			$data['kereta'] = $this->model_tiket->getstasiun2($dari,$menuju);
			$data['jadwal'] = $this->model_tiket->getJadwalKereta($dari,$menuju,$kelas,$tanggal);
			$data['kelas'] = $kelas;
			$session['tanggal']	= $tanggal;
			$session['anak'] = $anak;
			$session['dewasa'] = $dewasa;
			$this->session->set_userdata($session);
			$this->load->view('jadwal_kereta',$data);
			}

		function pesan_tiket($id){
			$data['harga'] = $this->model_tiket->get_hargakereta($id);
			$data['kelas'] = $this->input->post('kelas');
			$data['kelas'] = $this->input->post('kelas');
			$data['awal'] = $this->input->post('awal');
			$data['akhir'] = $this->input->post('akhir');
			$a = $this->session->userdata('dewasa');
			$b = $this->session->userdata('anak');
			$tambah = $a+$b;
			$data['jml'] = $tambah;
			$session['anak'] = $b;
			$session['dewasa'] = $a;
			$data['id'] = $id;
			$data['kd'] = $this->input->post('kd');
			$this->load->view('pesan_kereta',$data);
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
		$data['pilih'] = $this->model_tiket->getDetailsKereta($awal,$akhir,$nomer);
		$data['bandara'] = $this->model_tiket->getstasiun2($awal,$akhir);
		$dati = array();
		for($i=1;$i<=$jml;$i++){
			$data['nama'.$i] = $_POST['nama'.$i];
			$data['gelar'.$i] = $_POST['jk'.$i];
			$data['jid'.$i] = $_POST['jid'.$i];
			$data['id'.$i] = $_POST['id'.$i];
			$data['jen'.$i] = $_POST['jen'.$i];
		}
		$this->load->view('konfirmasi_kereta',$data);
		}

		function saveData(){
		$kode = $this->model_tiket->getkodetiketk();
		$nami = $this->input->post('nami');
		$email = $this->input->post('email');
		$anak = $this->session->userdata('anak');
		$dewasa = $this->session->userdata('dewasa');
		$tgl = $this->session->userdata('tanggal');
		$total = $this->input->post('total');
		$nomer = $this->input->post('nomor');
		$kelas = $this->input->post('bagopi');
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

		$this->model_tiket->tambah($data,'booking_kereta1');

		$i=1;
		while(isset($_POST['nama'.$i]))
	    {
	    $kode1 = $this->model_tiket->getnomertiketk();
	    $book = $kode;
	    $nama = $_POST['nama'.$i]; 
        $jk = $_POST['jk'.$i];
		$jenis = $_POST['jid'.$i];
		$id = $_POST['id'.$i];
		$tiket = $_POST['jen'.$i];

        $nomer = $nomer;
        $kels = $kelas;
        $tanggal1 = $tgl;
		$this->model_tiket->tambah_penumpanga($nama,$jk,$kode1,$nomer,$book,$kels,$tanggal1,$jenis,$id,$tiket);
    	$i++;
   		}
   		redirect('kereta/selamat/'.$book);
		}

		function pembayaran(){
			$data['kode'] = $_GET['data'];
			$this->load->view('pembayaran_pesawat',$data);
		}

		function cetak_tiket($id){
			$data['user'] = $this->model_tiket->getuserk($id);
			$bandara = $this->db->query("SELECT a.id_booking,c.stasiun_awal, c.stasiun_tujuan
				FROM booking_kereta1 a
				LEFT JOIN jadwal_kereta c on c.id_jadwal = a.jadwal
				where a.id_booking = '$id'");
			foreach ($bandara->result_array() as $i) {
				$awal = $i['stasiun_awal'];
				$akhir = $i['stasiun_tujuan'];
			}
			$data['bandara'] = $this->model_tiket->getstasiun2($awal,$akhir);
			$data['penumpang'] = $this->model_tiket->getpenumpang2($id);
			$this->load->view('print_tiketk',$data);
	}
		function selamat($id){
			$data['id'] = $id;
			$this->load->view('selamat',$data);
		}
	}
?>