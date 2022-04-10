<?php  

class Ptbuku_Model extends CI_Model{
	public function detail_ptbuku($email){
		return $this->db->get_where('user_petugas',['email'=>$email])->row_array();
	}

	public function ganti_foto(){
		$ptbuku = $this->db->get_where('user_petugas',['email'=>$this->session->userdata('email')])->row_array();
		if($_FILES['gambar']['name']){
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '1024';
			$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					$gambar_lama = $ptbuku['gambar'];
					
					if($gambar_lama !== 'default.png'){
					unlink(FCPATH.'assets/img/profil/'.$gambar_lama);
					}

					$this->db->where('email',$this->session->userdata('email'));
					$this->db->update('user_petugas',['gambar'=>$this->upload->data('file_name')]);
					return $this->db->affected_rows();
				}else{return 0;}
			}
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

	public function data_jurnal(){
		$data = $this->db->get_where('data_koleksi',['status'=>1,'jenis'=>'jurnal'])->result_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

	 public function input_jurnal(){
	 	
	$data = [
			'judul_koleksi'=> $this->input->post('judul'),
			'jenis' => 'Jurnal',
			'isbn'=> '-',
			'jumlah_koleksi'=> $this->input->post('jumlah'),
			'pengarang'=> $this->input->post('penulis'),
			'penerbit'=> '-',
			'tahun'=> $this->input->post('tahun'),
			'jumlah_halaman'=> $this->input->post('jumlah_halaman'),
			'kategori'=> '-',
			'klasifikasi'=> '-',
			'gambar'=> 'default.jpg',
			'status' => 1
			];
			$this->db->insert('data_koleksi',$data);
			return $this->db->affected_rows();	
	 }

	public function edit_jurnal($id){
		$jurnal = $this->db->get_where('data_koleksi',['id_koleksi'=>$id])->row_array();							
			$data = [
						'judul_koleksi'=> $this->input->post('judul'),
						'jenis' => 'Jurnal',
						'isbn'=> '-',
						'jumlah_koleksi'=> $this->input->post('jumlah'),
						'pengarang'=> $this->input->post('penulis'),
						'penerbit'=> '-',
						'tahun'=> $this->input->post('tahun'),
						'jumlah_halaman'=> $this->input->post('jumlah_halaman'),
						'kategori'=> '-',
						'klasifikasi'=> '-',
						'gambar'=> 'default.jpg',
						'status' => 1
					];
				$this->db->where('id_koleksi',$id);
				$this->db->update('data_koleksi',$data);
				return $this->db->affected_rows();
		}

	public function data_majalah(){
		$data = $this->db->get_where('data_koleksi',['status'=>1,'jenis'=>'Majalah'])->result_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

	public function input_majalah(){
	 	
	$data = [
			'judul_koleksi'=> $this->input->post('judul'),
			'jenis' => 'Majalah',
			'isbn'=> '-',
			'jumlah_koleksi'=> $this->input->post('jumlah'),
			'pengarang'=> $this->input->post('pengarang'),
			'penerbit'=> $this->input->post('penerbit'),
			'tahun'=> $this->input->post('tahun'),
			'jumlah_halaman'=> $this->input->post('jumlah_halaman'),
			'kategori'=> '-',
			'klasifikasi'=> '-',
			'gambar'=> 'default.jpg',
			'status' => 1
			];
			$this->db->insert('data_koleksi',$data);
			return $this->db->affected_rows();	
	 }

	public function edit_majalah($id){
		$jurnal = $this->db->get_where('data_koleksi',['id_koleksi'=>$id])->row_array();							
			$data = [
						'judul_koleksi'=> $this->input->post('judul'),
						'jenis' => 'Majalah',
						'isbn'=> '-',
						'jumlah_koleksi'=> $this->input->post('jumlah'),
						'pengarang'=> $this->input->post('pengarang'),
						'penerbit'=> $this->input->post('penerbit'),
						'tahun'=> $this->input->post('tahun'),
						'jumlah_halaman'=> $this->input->post('jumlah_halaman'),
						'kategori'=> '-',
						'klasifikasi'=> '-',
						'gambar'=> 'default.jpg',
						'status' => 1
					];
				$this->db->where('id_koleksi',$id);
				$this->db->update('data_koleksi',$data);
				return $this->db->affected_rows();
		}

	public function data_surat_kabar(){
		$data = $this->db->get_where('data_koleksi',['status'=>1,'jenis'=>'Surat Kabar'])->result_array();
		if (!empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

	public function input_surat_kabar(){
	 	
	$data = [
			'judul_koleksi'=> $this->input->post('judul'),
			'jenis' => 'Surat Kabar',
			'isbn'=> '-',
			'jumlah_koleksi'=> $this->input->post('jumlah'),
			'pengarang'=> '-',
			'penerbit'=> $this->input->post('penerbit'),
			'tahun'=> $this->input->post('tahun'),
			'jumlah_halaman'=> $this->input->post('jumlah_halaman'),
			'kategori'=> '-',
			'klasifikasi'=> '-',
			'gambar'=> 'default.jpg',
			'status' => 1
			];
			$this->db->insert('data_koleksi',$data);
			return $this->db->affected_rows();	
	 }

	public function edit_surat_kabar($id){
		$jurnal = $this->db->get_where('data_koleksi',['id_koleksi'=>$id])->row_array();							
			$data = [
						'judul_koleksi'=> $this->input->post('judul'),
						'jenis' => 'Surat Kabar',
						'isbn'=> '-',
						'jumlah_koleksi'=> $this->input->post('jumlah'),
						'pengarang'=> '-',
						'penerbit'=> $this->input->post('penerbit'),
						'tahun'=> $this->input->post('tahun'),
						'jumlah_halaman'=> $this->input->post('jumlah_halaman'),
						'kategori'=> '-',
						'klasifikasi'=> '-',
						'gambar'=> 'default.jpg',
						'status' => 1
					];
				$this->db->where('id_koleksi',$id);
				$this->db->update('data_koleksi',$data);
				return $this->db->affected_rows();
		}


	public function usulan_buku_masuk(){
		$data = $this->db->get_where('data_koleksi',['status'=>0,'jenis'=>'Buku'])->result_array();
		if(! empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

	public function jumlah_jurnal(){
		$this->db->where(['status'=>1,'jenis'=>'Jurnal']);
		return $this->db->count_all_results('data_koleksi');
	}

	public function jumlah_majalah(){
		$this->db->where(['status'=>1,'jenis'=>'Majalah']);
		return $this->db->count_all_results('data_koleksi');
	}

	public function jumlah_surat_kabar(){
		$this->db->where(['status'=>1,'jenis'=>'Surat Kabar']);
		return $this->db->count_all_results('data_koleksi');
	}

	public function konfirmasi_usulan($id){
		$this->db->where('id_koleksi',$id);
		$this->db->update('data_koleksi',['status'=>1]);
		return $this->db->affected_rows();
	}

	public function hapus_usulan($id){
		$data = $this->db->get_where('data_koleksi',['id_koleksi'=>$id])->row_array();
		if($data['gambar'] !== 'default.jpg'){
			unlink(FCPATH.'assets/img/buku/'.$data['gambar']);
		}
		$this->db->delete('data_koleksi',['id_koleksi'=>$id]);
		return $this->db->affected_rows();
	}

	public function usulan_jurnal_masuk(){
		$data = $this->db->get_where('data_koleksi',['status'=>0,'jenis'=>'Jurnal'])->result_array();
		if(! empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

	public function usulan_majalah_masuk(){
		$data = $this->db->get_where('data_koleksi',['status'=>0,'jenis'=>'Majalah'])->result_array();
		if(! empty($data)){
			return $data;
		}else{
			return 1;
		}
	}

		public function usulan_surat_kabar_masuk(){
		$data = $this->db->get_where('data_koleksi',['status'=>0,'jenis'=>'Surat Kabar'])->result_array();
		if(! empty($data)){
			return $data;
		}else{
			return 1;
		}
	}
}


?>