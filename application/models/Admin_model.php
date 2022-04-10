<?php 
class Admin_model extends CI_Model{

	public function detail_admin($id){
		return $this->db->get_where('user_petugas',['id_petugas'=>$id])->row_array();
	}

	public function ganti_foto(){
		$admin = $this->db->get_where('user_petugas',['id_petugas'=>$this->session->userdata('id_petugas')])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $admin['gambar'];
					
					if($gambar_lama !== 'default.png'){
					unlink(FCPATH.'assets/img/profil/'.$gambar_lama);
					}

					$this->db->where('id_petugas',$this->session->userdata('id'));
					$this->db->update('user_petugas',['gambar'=>$this->upload->data('file_name')]);
					return $this->db->affected_rows();
				}else{return 0;}
			}
		}

public function ganti_profil(){
	$email = $this->input->post('email');
	$nama = $this->input->post('nama');
	$this->db->where('id_petugas',$this->session->userdata('id'));
	$this->db->update('user_petugas',['email'=>$email,'nama_petugas'=>$nama]);
	return $this->db->affected_rows();
}

public function ganti_password(){
		$pw_lama = $this->input->post('password_lama');
		$pw_baru = $this->input->post('password_baru');
		$konfirmasi = $this->input->post('konfirmasi_password');
		$user = $this->db->get_where('user_petugas',['id_petugas'=>$this->session->userdata('id')])->row_array();
		if(password_verify($pw_lama, $user['password'])){
			$this->db->where('id_petugas',$this->session->userdata('id'));
			$this->db->update('user_petugas',['password'=>password_hash($pw_baru, PASSWORD_DEFAULT)]);
			return 1;
		}else{
			return 0;
		}
	}

	public function getPetugas(){
		$this->db->where('role !=','Administrator');
		$data = $this->db->get('user_petugas')->result_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

	public function detail_petugas($id){
		$this->db->where('id_petugas',$id);
		$data = $this->db->get('user_petugas')->row_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}

	}

	public function tambah_petugas(){

			$data = [
				'nama_petugas'=> $this->input->post('nama'),
				'email'=> $this->input->post('email'),
				'gambar'=> 'default.png',
				'password'=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'role'=> $this->input->post('role')
			];
				$this->db->insert('user_petugas',$data);
				return $this->db->affected_rows();
				
	}

	public function cek_email($table1,$table2,$email){
				$tbl_1 = $this->db->get_where($table1,['email'=>$email])->row_array();
				$tbl_2 = $this->db->get_where($table2,['email'=>$email])->row_array();
		if(!empty($tbl_1['email'])){
			return 0;
		}elseif(!empty($tbl_2['email'])){
			return 0;
		}else{
			return 1;
		}
	}

	public function edit_petugas($id){
		$petugas = $this->db->get_where('user_petugas',['id_petugas'=>$id])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $petugas['gambar'];

					if($gambar_lama !== 'default.png'){
					unlink(FCPATH.'assets/img/profil/'.$gambar_lama);
					}

					$data = [
						'nama'=> $this->input->post('nama'),
						'gambar'=> $this->upload->data('file_name'),
						'email'=> $this->input->post('email'),
						'role'=> $this->input->post('role')
					];
					$this->db->where('id_petugas',$id);
					$this->db->update('user_petugas',$data);
					return $this->db->affected_rows();
				}else{return 0;}

		}else{			
			$data = [
						'nama'=> $this->input->post('nama'),
						'email'=> $this->input->post('email'),
						'role'=> $this->input->post('role')
					];
				$this->db->where('id_petugas',$id);
				$this->db->update('user_petugas',$data);
				return $this->db->affected_rows();
		}
	}

	public function hapus_petugas($id){
	$petugas = $this->db->get_where('user_petugas',['id_petugas'=>$id])->row_array();

	if($petugas['gambar'] !== 'default.png'){
	unlink(FCPATH.'assets/img/profil/'.$petugas['gambar']);
	}

	$this->db->delete('user_petugas',['id_petugas'=>$id]);
	return $this->db->affected_rows();
	}


	public function getAnggotaGuru(){
		$this->db->where('role','guru');
		$data = $this->db->get('user_anggota')->result_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

	public function tambah_guru(){

			$data = [
				'nis/nip'=> $this->input->post('nip'),
				'nama_anggota'=> $this->input->post('nama'),
				'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
				'role'=> 'guru',
				'kelas'=> '-',
				'jurusan'=> '-',
				'email'=> $this->input->post('email'),
				'gambar'=> 'default.png',
				'password'=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'is_active'=> 1
			];
				$this->db->insert('user_anggota',$data);
				return $this->db->affected_rows();
				
	}

	public function detail_guru($id){
		$this->db->where('id_anggota',$id);
		$data = $this->db->get('user_anggota')->row_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}

	}


	public function edit_guru($id){
		$anggota = $this->db->get_where('user_anggota',['id_anggota'=>$id])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $anggota['gambar'];

					if($gambar_lama !== 'default.png'){
					unlink(FCPATH.'assets/img/profil/'.$gambar_lama);
					}
					$data = [
						'nis/nip'=> $this->input->post('nip'),
						'nama_anggota'=> $this->input->post('nama'),
						'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
						'gambar'=> $this->upload->data('file_name')
					];
					$this->db->where('id_anggota',$id);
					$this->db->update('user_anggota',$data);
					return $this->db->affected_rows();
				}else{return 0;}

		}else{			
			$data = [
						'nis/nip'=> $this->input->post('nip'),
						'nama_anggota'=> $this->input->post('nama'),
						'jenis_kelamin'=> $this->input->post('jenis_kelamin')
					];
				$this->db->where('id_anggota',$id);
				$this->db->update('user_anggota',$data);
				return $this->db->affected_rows();
		}
	}

	public function hapus_guru($id){
		$guru = $this->db->get_where('user_anggota',['id_anggota'=>$id])->row_array();

		if($guru['gambar'] !== 'default.png'){
		unlink(FCPATH.'assets/img/profil/'.$guru['gambar']);
		}

		$this->db->delete('user_anggota',['id_anggota'=>$id]);
		return $this->db->affected_rows();
	}

	public function jumlah_guru(){
		$this->db->where('role','guru');
		return $this->db->count_all_results('user_anggota');
	}


	public function getAnggotaSiswa(){
		$data = $this->db->get_where('user_anggota',['role'=>'siswa','is_active'=>1])->result_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

		public function detail_siswa($id){
		$this->db->where('id_anggota',$id);
		$data = $this->db->get('user_anggota')->row_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}

	}

	public function edit_siswa($id){
		$anggota = $this->db->get_where('user_anggota',['id_anggota'=>$id])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $anggota['gambar'];

					if($gambar_lama !== 'default.png'){
					unlink(FCPATH.'assets/img/profil/'.$gambar_lama);
					}

					$data = [
						'nis/nip'=> $this->input->post('nis'),
						'nama_anggota'=> $this->input->post('nama'),
						'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
						'kelas'=> $this->input->post('kelas'),
						'jurusan'=> $this->input->post('jenis_kelamin'),
						'gambar'=> $this->upload->data('file_name')
					];
					$this->db->where('id_anggota',$id);
					$this->db->update('user_anggota',$data);
					return $this->db->affected_rows();
				}else{return 0;}

		}else{			
			$data = [
						'nis/nip'=> $this->input->post('nis'),
						'nama_anggota'=> $this->input->post('nama'),
						'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
						'kelas'=> $this->input->post('kelas'),
						'jurusan'=> $this->input->post('jenis_kelamin')
					];
				$this->db->where('id_anggota',$id);
				$this->db->update('user_anggota',$data);
				return $this->db->affected_rows();
		}
	}

	public function hapus_siswa($id){
		$siswa = $this->db->get_where('user_anggota',['id_anggota'=>$id])->row_array();

		if($siswa['gambar'] !== 'default.png'){
		unlink(FCPATH.'assets/img/profil/'.$siswa['gambar']);
		}

		$this->db->delete('user_anggota',['id_anggota'=>$id]);
		return $this->db->affected_rows();
	}

		public function jumlah_siswa(){
		$this->db->where('role','siswa');
		return $this->db->count_all_results('user_anggota');
	}

	public function konfirmasi(){
		$this->db->where('is_active',0);
		$data = $this->db->get('user_anggota')->result_array();
		if(empty($data)){
			return 1;
		}else{
			return $data;
		}

		}

	public function aktif_user($id){
		$this->db->where('id_anggota',$id);
		$this->db->update('user_anggota',['is_active'=>1]);
		return $this->db->affected_rows();
	 }


	 public function data_buku(){
		$data = $this->db->get_where('data_koleksi',['status'=>1,'jenis'=>'Buku'])->result_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}
	 }

	 public function input_buku(){
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
			'status' => 1
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
						'status' => 1
						];
						$this->db->insert('data_koleksi',$data);
						return $this->db->affected_rows();
				}else{
					return $this->db->affected_rows();
				}
			}
	 }

	 public function input_perawatan(){
	 	$data = [
	 				'judul' => $this->input->post('judul'),
	 				'jenis_koleksi' => $this->input->post('jenis_koleksi'),
	 				'kondisi_koleksi' => $this->input->post('kondisi_koleksi'),
	 				'aksi' => $this->input->post('aksi'),
	 				'tanggal' => $this->input->post('tanggal')
	 	];

	 	$this->db->insert('perawatan',$data);
	 	return $this->db->affected_rows();
	 }
	 public function getPerawatanById($id){
	 	return $this->db->get_where('perawatan',['id_perawatan'=>$id])->row_array();
	 }

	 public function detail_buku($id){
		$this->db->where('id_koleksi',$id);
		$data = $this->db->get('data_koleksi')->row_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}

	}

	public function edit_buku($id){
		$buku = $this->db->get_where('data_koleksi',['id_koleksi'=>$id])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/buku';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $buku['gambar'];
					unlink(FCPATH.'assets/img/buku/'.$gambar_lama);
					$data = [
						'judul_koleksi'=> $this->input->post('judul'),
						'jenis' => 'Buku',
						'isbn'=> $this->input->post('isbn'),
						'jumlah_koleksi'=> $this->input->post('jumlah'),
						'pengarang'=> $this->input->post('pengarang'),
						'penerbit'=> $this->input->post('penerbit'),
						'tahun'=> $this->input->post('tahun'),
						'jumlah_halaman'=> $this->input->post('jumlah_halaman'),
						'kategori'=> $this->input->post('kategori'),
						'klasifikasi'=> $this->input->post('klasifikasi'),
						'gambar'=> $this->upload->data('file_name'),
						'status' => 1
					];
					$this->db->where('id_koleksi',$id);
					$this->db->update('data_koleksi',$data);
					return $this->db->affected_rows();
				}else{return 0;}

		}else{			
			$data = [
						'judul_koleksi'=> $this->input->post('judul'),
						'jenis' => 'Buku',
						'isbn'=> $this->input->post('isbn'),
						'jumlah_koleksi'=> $this->input->post('jumlah'),
						'pengarang'=> $this->input->post('pengarang'),
						'penerbit'=> $this->input->post('penerbit'),
						'tahun'=> $this->input->post('tahun'),
						'jumlah_halaman'=> $this->input->post('jumlah_halaman'),
						'kategori'=> $this->input->post('kategori'),
						'klasifikasi'=> $this->input->post('klasifikasi'),
						'status' => 1
					];
				$this->db->where('id_koleksi',$id);
				$this->db->update('data_koleksi',$data);
				return $this->db->affected_rows();
		}
	}

	public function hapus_buku($id){
		$buku = $this->db->get_where('data_koleksi',['id_koleksi'=>$id])->row_array();
		if($buku['gambar'] !== 'default.jpg'){
		unlink(FCPATH.'assets/img/buku/'.$buku['gambar']);
		}
		$this->db->delete('data_koleksi',['id_koleksi'=>$id]);
		return $this->db->affected_rows();
	}

	public function jumlah_buku(){
		$this->db->where(['status'=>1,'jenis'=>'Buku']);
		return $this->db->count_all_results('data_koleksi');
	}

	public function tersedia(){
		$buku = $this->db->get_where('data_koleksi',['jenis'=>'Buku'])->result_array();
		
		foreach($buku as $bk){
				$this->db->where('id_buku', $bk['id_koleksi']);
				$jumlah_dipinjam = $this->db->count_all_results('peminjaman');
				$tersedia = $bk['jumlah_koleksi'] - $jumlah_dipinjam;
				$this->db->where('id_koleksi', $bk['id_koleksi']);
				$this->db->update('data_koleksi', ['tersedia'=>$tersedia]);
		}
		
	}

	public function getPerawatan(){
		return $this->db->get('perawatan')->result_array();
	}

	 public function getKonfirmPeminjaman(){
	 	$this->db->where('status',0);
		$data = $this->db->get('peminjaman')->result_array();
		if(empty($data)){
			return 1;
		}else{
			return $data;
		}
	  }

	 public function aktif_peminjaman($id){
	  	$this->db->where('id_peminjaman',$id);
		$this->db->update('peminjaman',['status'=>1]);
		return $this->db->affected_rows();
	 }

	 public function hapus_peminjaman($id){
	 	$this->db->where('id_peminjaman',$id);
	 	$this->db->delete('peminjaman');
	 	return $this->db->affected_rows();
	 }


	 public function getPeminjam(){
		$data = $this->db->get('peminjaman')->result_array();
		if(empty($data)){
			return 1;
		}else{
			return $data;
		}
	 }

	 public function sedang_meminjam(){
		$data = $this->db->get_where('peminjaman',['status !='=>2])->result_array();
		if(empty($data)){
			return 1;
		}else{
			return $data;
		}
	 }

	 public function getDaftarPeminjam(){
	 	$this->db->where('status',1);
		$data = $this->db->get('peminjaman')->result_array();
		if(empty($data)){
			return 1;
		}else{
			return $data;
		}
	 }

	 public function riwayat_peminjaman_siswa(){
	 	$data = $this->db->get_where('pengembalian',['role'=>'siswa'])->result_array();
	 	if(empty($data)){
	 		return 1;
	 	}else{
	 		return $data;
	 	}
	 }

	  public function riwayat_peminjaman_guru(){
	 	$data = $this->db->get_where('pengembalian',['role'=>'guru'])->result_array();
	 	if(empty($data)){
	 		return 1;
	 	}else{
	 		return $data;
	 	}
	 }


	 public function proses_pengembalian($id_peminjaman,$id_anggota){
	 	$anggota = $this->db->get_where('user_anggota',['id_anggota'=>$id_anggota])->row_array();
	 	$result = $this->db->get_where('peminjaman',['id_peminjaman'=>$id_peminjaman])->row_array();
	 	$tetapan_denda = $this->db->get('ketetapan_denda')->row_array();
	 	$nama_peminjam = $result['nama_peminjam'];
	 	$role = $anggota['role'];
	 	$id_buku = $result['id_buku'];
	 	$judul_buku = $result['judul_buku'];
	 	$tanggal_pinjam = $result['tanggal_pinjam'];
	 	$tanggal_kembali = date('Y-m-d');

	 	if($anggota['role'] == 'guru'){ 		
		 	$data = [
		 		'id_peminjaman' =>$id_peminjaman,
		 		'id_anggota' => $id_anggota,
		 		'id_buku' => $id_buku,
		 		'nama_peminjam' => $nama_peminjam,
		 		'role' => $role,
		 		'judul_buku' => $judul_buku,
		 		'tanggal_pinjam' => $tanggal_pinjam,
		 		'tanggal_kembali' => $tanggal_kembali
		 	];
		 		$this->db->insert('pengembalian',$data);
		 	    $this->db->delete('peminjaman',['id_peminjaman' =>$id_peminjaman]);

	 	}else{
	 		// selisih waktu pinjam dengan pengembalian
	 		$waktuPinjam = strtotime($tanggal_pinjam);
	 		$waktuPengembalian = strtotime(date('Y-m-d'));
	 		$selisih = $waktuPengembalian - $waktuPinjam;
	 		$hari = $selisih/(60*60*24);

	 		// cek apakah terlambat atau tidak
	 		if ($hari > 7){
		 			$terlambat = $hari - 7;
		 			$denda = $terlambat * $tetapan_denda['denda_per_hari'];

		 		$data = [
			 		'id_peminjaman' =>$id_peminjaman,
			 		'id_anggota' => $id_anggota,
			 		'id_buku' => $id_buku,
			 		'nama_peminjam' => $nama_peminjam,
			 		'role' => $role,
			 		'judul_buku' => $judul_buku,
			 		'tanggal_pinjam' => $tanggal_pinjam,
			 		'tanggal_kembali' => $tanggal_kembali
			 	];
			 	$this->db->insert('pengembalian',$data);
			 	$this->db->insert('denda',['id_siswa'=>$id_anggota,'nama_siswa'=>$nama_peminjam,'judul_buku'=>$judul_buku,'terlambat'=>$terlambat,'denda'=>$denda,'status'=>0]);
			 	$this->db->where('id_peminjaman',$id_peminjaman);
			 	$this->db->update('peminjaman',['status'=>2]);

	 		}else{
	 			$data = [
			 		'id_peminjaman' =>$id_peminjaman,
			 		'id_anggota' => $id_anggota,
			 		'id_buku' => $id_buku,
			 		'nama_peminjam' => $nama_peminjam,
			 		'role' => $role,
			 		'judul_buku' => $judul_buku,
			 		'tanggal_pinjam' => $tanggal_pinjam,
			 		'tanggal_kembali' => $tanggal_kembali
			 	];
			 	$this->db->insert('pengembalian',$data);
			 	$this->db->delete('peminjaman',['id_peminjaman' =>$id_peminjaman]);

	 		}

	 	}

	 	return $this->db->affected_rows();
	 }

	 public function tetapkan_denda($data){
	 	$this->db->update('ketetapan_denda',['denda_per_hari'=>$data]);
	 	return $this->db->affected_rows();
	 }

	 public function konfirmasi_denda(){
	 	$data = $this->db->get_where('denda',['status' => 0])->result_array();
	 	if(empty($data)){
	 		return 1;
	 	}else{
	 		return $data;
	 	}
	 }

	 public function proses_denda($id,$id_siswa){
	 	$this->db->where('id_denda',$id);
		$this->db->update('denda',['status'=>1]);
		$this->db->delete('peminjaman',['id_anggota'=>$id_siswa]);
		return $this->db->affected_rows();
	 }

	 public function data_denda(){
	 	$data = $this->db->get('denda')->result_array();
	 	if(empty($data)){
	 		return 1;
	 	}else{
	 		return $data;
	 	}
	 }

	  public function jumlah_denda(){
	 	$data = $this->db->query('SELECT SUM(denda) as jumlah FROM denda')->row_array();
	 	return $data;
	 }

	 public function donasi(){
	 	$data = $this->db->get('donasi')->result_array();
	 	if(empty($data)){
	 		return 1;
	 	}else{
	 		return $data;
	 	}
	 }

	 public function tambah_donasi(){
	 	$nama = $this->input->post('nama');
	 	$jumlah = $this->input->post('jumlah');
	 	$alamat = $this->input->post('alamat');
	 	$tanggal = $this->input->post('tanggal');
	 	$jenis_pembayaran = $this->input->post('jenis_pembayaran');
	 	$nama_bank = $this->input->post('nama_bank');
	 	$no_rek = $this->input->post('no_rek');
	 	$telepon = $this->input->post('telepon');
	 	$data = [
	 		'nama'=>$nama,
	 		'jumlah_donasi'=>$jumlah,
	 		'tanggal'=>$tanggal,
	 		'alamat'=>$alamat,
	 		'jenis_pembayaran'=>$jenis_pembayaran,
	 		'nama_bank'=>$nama_bank,
	 		'nomor_rekening'=>$no_rek,
	 		'telepon'=>$telepon
	 	];
	 	$this->db->insert('donasi',$data);
	 	return $this->db->affected_rows();
	 }

	 public function edit_donasi($id){
	 	$donasi = $this->db->get_where('donasi',['id_donasi'=>$id])->row_array();

	 	$data = [
	 		'nama'=>$this->input->post('nama'),
	 		'jumlah_donasi'=>$this->input->post('jumlah'),
	 		'tanggal'=>$this->input->post('tanggal')
	 	];
				$this->db->where('id_donasi',$id);
				$this->db->update('donasi',$data);
				return $this->db->affected_rows();
	}

	 public function detail_donasi($id){
	 	return $this->db->get_where('donasi',['id_donasi'=>$id])->row_array();
	 }

	 public function hapus_donasi($id){
	 	$this->db->delete('donasi',['id_donasi'=>$id]);
	 	return $this->db->affected_rows();
	 }

	 public function jumlah_donasi(){
	 	$data = $this->db->query('SELECT SUM(jumlah_donasi) as jumlah FROM donasi')->row_array();
	 	return $data;
	 }

	 public function kritik_saran(){
	 	$data = $this->db->get('kritik_saran')->result_array();
	 	if(empty($data)){
	 		return 1;
	 	}else{
	 		return $data;
	 	}
	 }

	 public function detail_kritik_saran($id){
	 	return $this->db->get_where('kritik_saran',['id_kritik'=>$id])->row_array();
	 }

	 public function hapus_kritik_saran($id){
	 	$this->db->delete('kritik_saran',['id_kritik'=>$id]);
	 	return $this->db->affected_rows();
	 }



	}


 ?>