<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("KelasModel");
		$this->load->model("SiswaModel");
		$this->load->model("UserModel");
	}

	public function index()
	{
		$data['title'] = 'GANESHA KNOWLEDGE';
		$this->load->view('templates/user/header_user', $data);
		$this->load->view('user/index');
		$this->load->view('templates/user/footer_user');
	}

	public function registrasi(){

		$enkripsi = PASSWORD_HASH($this->input->post('password'), PASSWORD_BCRYPT);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[kpassword]');
		$this->form_validation->set_rules('kpassword', 'Konfirmasi Password', 'required|trim|matches[password]');

		$this->form_validation->set_message('required', '%s harus diisi');
		$this->form_validation->set_message('valid_email', '%s harus sesuai format');	
		$this->form_validation->set_message('is_unique', '%s sudah ada');
		$this->form_validation->set_message('matches', '%s tidak cocok');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', 'Harap periksa kembali form!');
			$this->index();
        }else {

			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'password' => $enkripsi,
				'role' => 2,
				'created_at' => date("Y-m-d:h:i:s")
			];

			$hasil = $this->UserModel->registrasi($data);

			if ($hasil) {
				$this->session->set_flashdata('message', 'Registrasi berhasil!');
				redirect(base_url());
			}else{
				$this->session->set_flashdata('message', 'Registrasi gagal!');
				$this->index();
			}
		}
	}


	public function login(){
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->UserModel->getDataUser($email);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
	
		$this->form_validation->set_message('required', '%s harus diisi');
		$this->form_validation->set_message('valid_email', '%s harus sesuai format');	

		if ($this->form_validation->run() == false) {
			$this->index();
        }else {

			if ($user) {
				if (password_verify($password, $user['password'])) {
					// $this->session->set_flashdata('message', 'Login berhasil!');
					if($user['role']==1){
						$data = [
							'id' => $user['id'],
							'email' => $user['email'],
							'nama' => $user['nama'],
							'bergabung' => $user['created_at'],
							'role' => 'admin'
						];
						$this->session->set_userdata($data);
						redirect(base_url('admin'));
					}else{
						$data = [
							'id' => $user['id'],
							'email' => $user['email'],
							'nama' => $user['nama'],
							'bergabung' => $user['created_at'],
							'role' => 'user'
						];
						$this->session->set_userdata($data);
					$this->index();
					}
				}else{
					$this->session->set_flashdata('message', 'Password Salah!');
					redirect(base_url());
				}
			}
			else{ 
				$this->session->set_flashdata('message', 'Email tidak terdaftar!');
				$this->index();
			}
		}

	}

	public function logout(){
		$this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role');

		$this->session->set_flashdata('message', 'Anda berhasil logout!');
		redirect(base_url());
	}

	public function profilsaya()
	{
		$data['title'] = 'GANESHA KNOWLEDGE';

		if($this->session->userdata("role")=="user"){
		$this->load->view('templates/user/header_user', $data);
		$this->load->view('user/profilsaya');
		$this->load->view('templates/user/footer_user');
		}else if($this->session->userdata("role")=="admin"){
			redirect("admin");
		}else{
			$this->index();
		}
	}

	public function ubahprofil()
	{
		$data['title'] = 'GANESHA KNOWLEDGE';
		$data['user'] = $this->UserModel->getUserDetail($this->session->userdata('id'));

		if($this->session->userdata("role")=="user"){
		$this->load->view('templates/user/header_user', $data);
		$this->load->view('user/ubahprofil', $data);
		$this->load->view('templates/user/footer_user');
		}else if($this->session->userdata("role")=="admin"){
			redirect("admin");
		}else{
			$this->index();
		}
	}


	public function ubahprofilproses()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required|trim');
			$this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required|trim');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
			$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
			$this->form_validation->set_rules('namaortu', 'Nama Orang Tua', 'required|trim');
			$this->form_validation->set_rules('asalsekolah', 'Asal Sekolah', 'required|trim');
			$this->form_validation->set_message('required', '%s harus tidak boleh kosong');
			if ($this->form_validation->run() == false) {
				$this->ubahprofil();
			} else {
				$data = [
					'nama' => $this->input->post("nama"),
					'alamat' => $this->input->post("alamat"),
					'tempat_lahir' => $this->input->post("tempatlahir"),
					'tanggal_lahir' => $this->input->post("tanggallahir"),
					'jenis_kelamin' => $this->input->post("jk"),
					'no_telp' => $this->input->post("telepon"),
					'nama_ortu' => $this->input->post("namaortu"),
					'asal_sekolah' => $this->input->post("asalsekolah"),
				];
				$update = $this->UserModel->ubahUser($data,$this->session->userdata('id'));
				if ($update) {
					$data = [
						'nama' => $this->input->post("nama")
					];
					$this->session->set_userdata($data);
					echo "
					<script>
						alert('Berhasil mengubah profil');
						window.location = '".base_url('user/ubahprofil')."';
					</script>
					";
				}else{
					echo "
					<script>
						alert('Tidak ada data yang diubah');
						window.location = '".base_url('user/ubahprofil')."';
					</script>
					";
				}
			}
		}else{
			return redirect(base_url('user/ubahprofil'));
		}
	}

	public function pembayaran()
	{
		$data['title'] = 'GANESHA KNOWLEDGE';
		$data['pembayaran'] = $this->SiswaModel->getSiswaByUserId($this->session->userdata('id'));

		if($this->session->userdata("role")=="user"){
		$this->load->view('templates/user/header_user', $data);
		$this->load->view('user/pembayaran');
		$this->load->view('templates/user/footer_user');
		}else if($this->session->userdata("role")=="admin"){
			redirect("admin");
		}else{
			$this->index();
		}
	}

	public function pembayaranproses()
	{
		$this->form_validation->set_rules('id', 'id', 'required|trim');

		if (empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'Foto', 'required|trim');
			var_dump($_FILES['foto']['name']);
		}

		$this->form_validation->set_message('required', '%s harus diisi');

		if ($this->form_validation->run() == false) {
			echo "
			<script>
				alert('Bukti pembayaran tidak boleh kosong');
				window.location = '".base_url('user/pembayaran')."';
			</script>
			";
		} else {
			$foto = $_FILES['foto']['name'];

			$belah = explode('.', $foto);
			$ekstensi = strtolower(end($belah));

			// $namaBaru = $this->session->userdata('id');
			$namaBaru = $this->session->userdata('id');
			$namaBaru .= $belah[0];
			$namaBaruDB = $namaBaru . "." . $ekstensi;

			$config['file_name'] = $namaBaruDB;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = '2048';
			$config['upload_path'] = './assets/img-pembayaran/';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				echo "Error";
				$error = array('error' => $this->upload->display_errors());
				echo "
				<script>
					alert('Gagal mengupload foto, pastikan ukuran tidak lebih dari 2mb');
			
				</script>
				";
			} else {

				$data = [
					"pembayaran" => '/assets/img-pembayaran/' . $namaBaruDB
				];
				$update = $this->SiswaModel->ubahSiswa($data,$this->input->post("id"));
				if ($update) {
					echo "
					<script>
						alert('Berhasil melakukan pembayaran');
						window.location = '".base_url('user/pembayaran')."';
					</script>
					";
				}else{
					echo "
					<script>
						alert('Ada kesalahan');
						window.location = '".base_url('user/pembayaran')."';
					</script>
					";
				}
			}
			
		}
	}

	public function daftarbimbel()
	{
		$data['title'] = 'GANESHA KNOWLEDGE';
		$data['kelas'] = $this->KelasModel->getAllClass();

		if($this->session->userdata("role")=="user"){
		$this->load->view('templates/user/header_user', $data);
		$this->load->view('user/daftarbimbel');
		$this->load->view('templates/user/footer_user');
		}else if($this->session->userdata("role")=="admin"){
			redirect("admin");
		}else{
			$this->index();
		}
	}

	public function daftarbimbelproses()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
			$this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required|trim');
			$this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required|trim');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
			$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
			$this->form_validation->set_rules('namaortu', 'Nama Orang Tua', 'required|trim');
			$this->form_validation->set_rules('asalsekolah', 'Asal Sekolah', 'required|trim');
			$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

			$this->form_validation->set_message('required', '%s harus tidak boleh kosong');
			if ($this->form_validation->run() == false) {
				$this->daftarbimbel();
			} else {
				$kelas = $this->KelasModel->getDetailClassById($this->input->post("kelas"));

				if (empty($_FILES['foto']['name'])) {
					//tanpa pemayaran
					$data = [
						"user_id" => $this->session->userdata('id'),
						"nama" => $this->input->post("nama"),
						"alamat" => $this->input->post("alamat"),
						"tempat_lahir" => $this->input->post("tempatlahir"),
						"tanggal_lahir" => $this->input->post("tanggallahir"),
						"jenis_kelamin" => $this->input->post("jk"),
						"no_telp" => $this->input->post("telepon"),
						"nama_ortu" => $this->input->post("namaortu"),
						"asal_sekolah" => $this->input->post("asalsekolah"),
						"kelas_id" => $this->input->post("kelas"),
						"pembayaran" => "",
						"total_pembayaran" => $kelas['harga'],
						"status" => "0",
					];
					$insert = $this->SiswaModel->tambahSiswa($data);
					if ($insert) {
						echo "
						<script>
							alert('Berhasil mendaftar, silahkan lunasi tagihan');
							window.location = '".base_url('user/pembayaran')."';
						</script>
						";
					}else{
						echo "
						<script>
							alert('Ada kesalahan');
							window.location = '".base_url('user/daftarbimbel')."';
						</script>
						";
					}
				} else {
					//dengan pembayaran
					$foto = $_FILES['foto']['name'];

					$belah = explode('.', $foto);
					$ekstensi = strtolower(end($belah));

					// $namaBaru = $this->session->userdata('id');
					$namaBaru = $this->session->userdata('id');
					$namaBaru .= $belah[0];
					$namaBaruDB = $namaBaru . "." . $ekstensi;

					$config['file_name'] = $namaBaruDB;
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']      = '2048';
					$config['upload_path'] = './assets/img-pembayaran/';

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('foto')) {
						echo "Error";
						$error = array('error' => $this->upload->display_errors());
						echo "
						<script>
							alert('Gagal mengupload foto, pastikan ukuran tidak lebih dari 2mb');
							window.location = '".base_url('user/pembayaran')."';
						</script>
						";
					} else {

						$data = [
							"user_id" =>$this->session->userdata('id'),
							"nama" => $this->input->post("nama"),
							"alamat" => $this->input->post("alamat"),
							"tempat_lahir" => $this->input->post("tempatlahir"),
							"tanggal_lahir" => $this->input->post("tanggallahir"),
							"jenis_kelamin" => $this->input->post("jk"),
							"no_telp" => $this->input->post("telepon"),
							"nama_ortu" => $this->input->post("namaortu"),
							"asal_sekolah" => $this->input->post("asalsekolah"),
							"kelas_id" => $this->input->post("kelas"),
							"pembayaran" => '/assets/img-pembayaran/' . $namaBaruDB,
							"total_pembayaran" => $kelas['harga'],
							"status" => "0",
						];
						$insert = $this->SiswaModel->tambahSiswa($data);
						if ($insert) {
							echo "
							<script>
								alert('Berhasil mendaftar, silahkan lunasi tagihan');
								window.location = '".base_url('user/pembayaran')."';
							</script>
							";
						}else{
							echo "
							<script>
								alert('Ada kesalahan');
								window.location = '".base_url('user/daftarbimbel')."';
							</script>
							";
						}
					}
				}
			}
		} else {
			return redirect(base_url('user/daftarbimbel'));
		}
	}
}
