<?php  

class Guru_model extends CI_Model{


	public function detail_guru($email){
		return $this->db->get_where('user_anggota',['email'=>$email])->row_array();
	}

	public function ganti_foto(){
		$guru = $this->db->get_where('user_anggota',['email'=>$this->session->userdata('email')])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $guru['gambar'];
					
					if($gambar_lama !== 'default.png'){
					unlink(FCPATH.'assets/img/profil/'.$gambar_lama);
					}

					$this->db->where('email',$this->session->userdata('email'));
					$this->db->update('user_anggota',['gambar'=>$this->upload->data('file_name')]);
					return $this->db->affected_rows();
				}else{return 0;}
			}
		}

	public function ganti_password(){
		$pw_lama = $this->input->post('password_lama');
		$pw_baru = $this->input->post('password_baru');
		$konfirmasi = $this->input->post('konfirmasi_password');
		$user = $this->db->get_where('user_anggota',['id_anggota'=>$this->session->userdata('id')])->row_array();
		if(password_verify($pw_lama, $user['password'])){
			$this->db->where('id_anggota',$this->session->userdata('id'));
			$this->db->update('user_anggota',['password'=>password_hash($pw_baru, PASSWORD_DEFAULT)]);
			return 1;
		}else{
			return 0;
		}
	}

	public function proses_pinjam(){
		$id_guru = $this->input->post('id_guru');
		$id_buku = $this->input->post('id_buku');
		$nama_guru = $this->input->post('nama');
		$judul_buku = $this->input->post('judul');
		$tanggal_pinjam = $this->input->post('tgl_pinjam');
		$tanggal_kembali = 'unlimited';

		$data = [
			'id_anggota'=>$id_guru,
			'id_buku'=>$id_buku,
			'nama_peminjam'=>$nama_guru,
			'judul_buku'=>$judul_buku,
			'tanggal_pinjam'=>$tanggal_pinjam,
			'tanggal_kembali'=>$tanggal_kembali,
			'status'=>0
		];
		$this->db->insert('peminjaman',$data);
		return $this->db->affected_rows();
	}

	public function status_peminjaman(){
		$data = $this->db->get_where('peminjaman',['id_anggota'=>$this->session->userdata('id')])->result_array();
			if(empty($data)){
				return 0;
			}else{
				return $data;
			}
	}

	public function riwayat_peminjaman(){
		return $this->db->get_where('pengembalian',['id_anggota'=>$this->session->userdata('id')])->result_array();
	}

	public function jumlah_peminjaman(){
		$this->db->where('id_anggota',$this->session->userdata('id'));
		return $this->db->count_all_results('peminjaman');
	}


	 public function kirim_kritik(){
	 	$data = [
	 		'judul_kritik'=>$this->input->post('judul'),
	 		'isi_kritik'=>$this->input->post('isi'),
	 		'tanggal'=>$this->input->post('tanggal')
	 	];

	 	$this->db->insert('kritik_saran',$data);
	 	return $this->db->affected_rows();
	 }

	 public function usulan_buku(){
	 	if (!$_FILES['gambar']['name']){
			$data = [
			'judul_koleksi' => $this->input->post('judul'),
			'jenis' => 'Buku',
			'isbn' => $this->input->post('isbn'),
			'jumlah_koleksi' => $this->input->post('jumlah'),
			'pengarang' => $this->input->post('pengarang'),
			'penerbit' => $this->input->post('penerbit'),
			'tahun' => $this->input->post('tahun'),
			'jumlah_halaman' => $this->input->post('jumlah_halaman'),
			'kategori' => $this->input->post('kategori'),
			'klasifikasi' => $this->input->post('klasifikasi'),
			'gambar' => 'default.jpg',
			'status' => 0
			];
			$this->db->insert('data_koleksi',$data);
			return $this->db->affected_rows();
		}else{
			$config['upload_path'] = './assets/img/buku';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);

			if($this->upload->do_upload('gambar')){
				$data = [
						'judul_koleksi' => $this->input->post('judul'),
						'jenis' => 'Buku',
						'isbn' => $this->input->post('isbn'),
						'jumlah_koleksi' => $this->input->post('jumlah'),
						'pengarang' => $this->input->post('pengarang'),
						'penerbit' => $this->input->post('penerbit'),
						'tahun' => $this->input->post('tahun'),
						'jumlah_halaman' => $this->input->post('jumlah_halaman'),
						'kategori' => $this->input->post('kategori'),
						'klasifikasi' => $this->input->post('klasifikasi'),
						'gambar' => $this->upload->data('file_name'),
						'status' => 0
						];
						$this->db->insert('data_koleksi',$data);
						return $this->db->affected_rows();
				}else{
					return $this->db->affected_rows();
				}
			}
	 }

	 public function usulan_jurnal(){
			$data = [
			'judul_koleksi' => $this->input->post('judul'),
			'jenis' => 'Jurnal',
			'isbn' => '-',
			'jumlah_koleksi' => $this->input->post('jumlah'),
			'pengarang' => $this->input->post('penulis'),
			'penerbit' => '-',
			'tahun' => $this->input->post('tahun'),
			'jumlah_halaman' => $this->input->post('jumlah_halaman'),
			'kategori' => '-',
			'klasifikasi' => '-',
			'gambar' => 'default.jpg',
			'status' => 0
			];
			$this->db->insert('data_koleksi',$data);
			return $this->db->affected_rows();
	}


	 public function usulan_majalah(){
			$data = [
			'judul_koleksi' => $this->input->post('judul'),
			'jenis' => 'Majalah',
			'isbn' => '-',
			'jumlah_koleksi' => 1,
			'pengarang' => $this->input->post('pengarang'),
			'penerbit' => $this->input->post('penerbit'),
			'tahun' => $this->input->post('tahun'),
			'jumlah_halaman' => $this->input->post('jumlah_halaman'),
			'kategori' => '-',
			'klasifikasi' => '-',
			'gambar' => 'default.jpg',
			'status' => 0
			];
			$this->db->insert('data_koleksi',$data);
			return $this->db->affected_rows();
	}


	 public function usulan_surat_kabar(){
			$data = [
			'judul_koleksi' => $this->input->post('judul'),
			'jenis' => 'Surat Kabar',
			'isbn' => '-',
			'jumlah_koleksi' => 1,
			'pengarang' => '-',
			'penerbit' => $this->input->post('penerbit'),
			'tahun' => $this->input->post('tahun'),
			'jumlah_halaman' => $this->input->post('jumlah_halaman'),
			'kategori' => '-',
			'klasifikasi' => '-',
			'gambar' => 'default.jpg',
			'status' => 0
			];
			$this->db->insert('data_koleksi',$data);
			return $this->db->affected_rows();
	}





}


?>