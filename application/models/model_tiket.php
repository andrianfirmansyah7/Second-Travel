<?php
	class Model_tiket extends CI_Model{
		function tambah($data,$table){
			return $this->db->insert($table,$data);
		}

	    function hapus($id)
		{
	        $this->db->where('nis', $id);
			$this->db->delete('siswa');
		}

		function ubah($table,$id,$val,$data)
		{
			$this->db->where($id, $val);
			$this->db->update($table, $data); 
		}

		function getBandara(){
			$query = $this->db->query("select * from bandara");
			return $query->result();
		}

		function getStasiun(){
			$query = $this->db->query("select * from stasiun");
			return $query->result();
		}		

		function getJadwal($dari,$menuju,$kelas,$tanggal){
			$query = $this->db->query("SELECT a.nomer_penerbangan, a.dari,a.menuju, a.waktu_berangkat,a.waktu_tiba,b.nama_pesawat,b.jumlah_bis,b.jumlah_eko,c.nama_maskapai,c.kode_maskapai,c.foto_maskapai, d.harga_eko, d.harga_bis
			FROM jadwal_pesawat a 
			LEFT JOIN pesawat b on a.pesawat = b.id_pesawat
			LEFT JOIN maskapai c on a.maskapai = c.id_maskapai
			LEFT JOIN harga_pesawat d on a.harga = d.id_harga
			WHERE a.dari = '$dari' AND a.menuju = '$menuju'
			"
			);
			return $query->result();
		}

		function getJadwalKereta($dari,$menuju,$kelas,$tanggal){
			$query = $this->db->query("SELECT a.id_jadwal,a.stasiun_awal,a.stasiun_tujuan, a.waktu_berangkat,a.waktu_tiba,b.nama_kereta,b.jumlah_bis,b.jumlah_eko,b.jumlah_ekse, c.harga_eko, c.harga_bis, c.harga_ekse
			FROM jadwal_kereta a 
			LEFT JOIN kereta b on a.id_kereta = b.id_kereta 
			LEFT JOIN harga_kereta c on a.harga = c.id_harga
			WHERE a.stasiun_awal = '$dari' AND a.stasiun_tujuan = '$menuju'
			"
			);
			return $query->result();
		}


		function getDetails($dari,$menuju,$no){
			$query = $this->db->query("SELECT a.nomer_penerbangan, a.waktu_berangkat, a.waktu_tiba, b.nama_pesawat, c.nama_maskapai,c.kode_maskapai
			FROM jadwal_pesawat a 
			LEFT JOIN pesawat b on a.pesawat = b.id_pesawat
			LEFT JOIN maskapai c on a.maskapai = c.id_maskapai
			WHERE a.dari = '$dari' AND a.menuju = '$menuju' AND a.nomer_penerbangan = '$no'
			"
			);
			return $query->result();
		}

		function getDetailsKereta($dari,$menuju,$no){
			$query = $this->db->query("SELECT a.id_jadwal, a.waktu_berangkat, a.waktu_tiba, b.nama_kereta	
			FROM jadwal_kereta a 
			LEFT JOIN kereta b on a.id_kereta = b.id_kereta
			WHERE a.stasiun_awal = '$dari' AND a.stasiun_tujuan = '$menuju' AND a.id_jadwal = '$no'
			"
			);
			return $query->result();
		}

		function getBayar($id){
			$query = $this->db->query("SELECT * from booking_pesawat where id_booking = '$id'");
			return $query->result();
		}

		function getUser($id){
			$query = $this->db->query("SELECT a.id_booking,a.costumer,a.email,a.tanggal_pesan,a.tanggal_berangkat, c.nomer_penerbangan,c.dari,c.menuju, c.waktu_berangkat,c.waktu_tiba,d.nama_pesawat,d.jumlah_bis,d.jumlah_eko,e.nama_maskapai,e.kode_maskapai,e.foto_maskapai, f.harga_eko, f.harga_bis
				FROM booking_pesawat a
				LEFT JOIN jadwal_pesawat c on c.nomer_penerbangan = a.jadwal
				LEFT JOIN pesawat d on c.pesawat = d.id_pesawat
				LEFT JOIN maskapai e on c.maskapai = e.id_maskapai
				LEFT JOIN harga_pesawat f on c.harga = f.id_harga
				where a.id_booking = '$id'
				");
				return $query->result();
		}

		function getUserk($id){
			$query = $this->db->query("SELECT a.id_booking,a.costumer,a.email,a.tanggal_pesan,a.tanggal_berangkat, c.waktu_berangkat,c.waktu_tiba,d.nama_kereta,d.jumlah_bis,d.jumlah_eko, f.harga_eko, f.harga_bis
				FROM booking_kereta1 a
				LEFT JOIN jadwal_kereta c on c.id_jadwal = a.jadwal
				LEFT JOIN kereta d on c.id_kereta = d.id_kereta
				LEFT JOIN harga_kereta f on c.harga = f.id_harga
				where a.id_booking = '$id'
				");
				return $query->result();
		}

		function getPenumpang1($id){
			$query = $this->db->query("SELECT * FROM penumpang_pesawat WHERE id_booking = '$id'");
			return $query->result();
		}

		function getPenumpang2($id){
			$query = $this->db->query("SELECT * FROM penumpang_kereta WHERE id_booking = '$id'");
			return $query->result();
		}



		function getJml($dari,$menuju,$kelas,$tanggal){
			$query = $this->db->query("SELECT a.nomer_penerbangan, COUNT(IF(b.no_penerbangan = a.nomer_penerbangan AND b.kelas = '$kelas' AND b.tanggal_berangkat = '$tanggal',no_penerbangan,null)) AS jml
				FROM jadwal_pesawat a
				LEFT JOIN penumpang_pesawat b on b.no_penerbangan = a.nomer_penerbangan
				");
		}

		function getBandara2($dari,$menuju){
			$query = $this->db->query("select * from bandara where id_bandara = '$dari' OR id_bandara = '$menuju'");
			return $query->result();
		}

		function getstasiun2($dari,$menuju){
			$query = $this->db->query("select * from stasiun where id_stasiun = '$dari' OR id_stasiun = '$menuju'");
			return $query->result();
		}


		function get_harga($id){
			$query = $this->db->query("select * from harga_pesawat where no_penerbangan = '$id'");
			return $query->result();
		}

		function get_hargakereta($id){
			$query = $this->db->query("select * from harga_kereta where kereta = '$id'");
			return $query->result();
		}

		public function getkodetiket()
		{
        $query = $this->db->query("select max(id_booking) as max_code FROM booking_pesawat");
        $row = $query->row_array();
        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 9, 4);
        $max_nik = $max_fix + 1;
        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");
        $nik = "B".$tahun.$bulan.$tanggal.sprintf("%04s", $max_nik);
        return $nik;
		}

		public function getkodetiketk()
		{
        $query = $this->db->query("select max(id_booking) as max_code FROM booking_kereta1");
        $row = $query->row_array();
        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 10, 4);
        $max_nik = $max_fix + 1;
        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");
        $nik = "BK".$tahun.$bulan.$tanggal.sprintf("%04s", $max_nik);
        return $nik;
		}


		public function getnomertiket()
		{
        $query = $this->db->query("select max(no_tiket) as max_code FROM penumpang_pesawat");
        $row = $query->row_array();
        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 4, 4);
        $max_nik = $max_fix + 1;
        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");
        $nik = $tanggal.$bulan.sprintf("%04s", $max_nik);
        return $nik;
		}

		public function getnomertiketk()
		{
        $query = $this->db->query("select max(no_tiket) as max_code FROM penumpang_kereta");
        $row = $query->row_array();
        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 4, 4);
        $max_nik = $max_fix + 1;
        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");
        $nik = $tanggal.$bulan.sprintf("%04s", $max_nik);
        return $nik;
		}


		public function getMax(){
			$query = $this->db->query("select max(id) as max_code FROM costumer_pesawat");
	        $row = $query->row_array();
	        $max_id = $row['max_code'];
    	    $max_fix = (int) substr($max_id, 9, 4);
	        $max_nik = $max_fix + 1;
	        return $max_nik;
		}

		public function tambah_penumpang($nama,$jk,$kode,$nomer,$book,$kelas,$tanggal,$jenis,$id,$tiket){
	    $data = array(
	    'no_tiket'=>$kode,
	    'id_booking'=>$book,
        'nama_costumer'=>$nama,
        'jk' => $jk,
        'jenis_identitas' => $jenis,
        'nomer_identitas' => $id,   
        'no_penerbangan' => $nomer,
        'tanggal_berangkat' => $tanggal,
        'kelas' => $kelas,
        'tipe' => $tiket   
	   	 );
	    $this->db->insert('penumpang_pesawat', $data);
		}

		public function tambah_penumpanga($nama,$jk,$kode,$nomer,$book,$kelas,$tanggal,$jenis,$id,$tiket){
	    $data = array(
	    'no_tiket'=>$kode,
	    'id_booking'=>$book,
        'nama_costumer'=>$nama,
        'jk' => $jk,
        'jenis_identitas' => $jenis,
        'nomer_identitas' => $id,   
        'id_jadwal' => $nomer,
        'tanggal_berangkat' => $tanggal,
        'kelas' => $kelas,
        'tipe' => $tiket   
	   	 );
	    $this->db->insert('penumpang_kereta', $data);
		}

		public function getPenumpang($id){
			$query = $this->db->query("SELECT a.no_tiket, a.nama_costumer,a.jk,a.tanggal_berangkat,a.kelas,b.tanggal_pesan,b.id_booking,c.waktu_berangkat, c.waktu_tiba,c.dari,c.menuju,d.harga_eko,d.harga_bis
				FROM penumpang_pesawat a
				LEFT JOIN booking_pesawat b on a.id_booking = b.id_booking
				LEFT JOIN jadwal_pesawat c on c.nomer_penerbangan = a.no_penerbangan
				LEFT JOIN harga_pesawat d on d.no_penerbangan = a.no_penerbangan
				WHERE a.id_booking = '$id'
				");
				return $query->result();
		}
	}
?>