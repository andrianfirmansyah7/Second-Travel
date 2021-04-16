<?php
	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('model_tiket');
		}

		function index(){
			$this->load->view('login');
		}

		function signin(){
			$this->load->view('sign-in');
		}

		function aksi_login(){
			$username = trim($this->input->post('username'));
			$password = trim($this->input->post('password'));
			$hasil = $this->db->query("select * from akun WHERE username = '$username' AND password = '$password'");
			
			if ($hasil->num_rows() == 1){
				foreach($hasil->result_array() as $i){
					$session['id_user'] = $i['username'];
					$session['nama'] = $i['nama_pemillik'];
					$session['status'] = 'Login';
					$this->session->set_userdata($session);
					redirect('welcome');
				}
			}else{
				$this->session->set_flashdata("msg","<div class='callout callout-warning'><h4>Peringatan</h4>
                <p>Username/Password salah!</p>
				</div>");
				redirect('login');
			}
		}

		function logout(){
			$this->session->sess_destroy();
			redirect('login');
		}

		function input_user(){
			$nik = $this->input->post('nik');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$jk = $this->input->post('jk');
			$email = $this->input->post('email');
			$perusahaan = $this->input->post('perusahaan');
			$aplikasi = $this->input->post('aplikasi');
			
			$data = array(
			'id_user' => $nik,
			'nama_user' => $nama,
			'jk_user' => $jk,
			'alamat' => $alamat,
			'alamat_email' => $email,
			'perusahaan' => $perusahaan,
			'aplikasi' => $aplikasi,
			'foto_profil' => 'vatar.png'
			);
			
			$data1 = array(
			'username' => $nik,
			'password' => md5($nik),
			'level' => 2,
			'status' => 'Aktif'
			);
			
			$this->model_ticket->input_data($data,'user');
			$this->model_ticket->input_data($data1,'akun');
			redirect('home/daftar_user');
		}	

	}
?>