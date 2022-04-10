<div class="container mt-3">

	<div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
	
	<div class="row mb-4">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Form Peminjaman Buku</div>
                      <form  action="<?= base_url(); ?>siswa/proses_pinjam" method="post">
	                     <div class="form-group">
							    <label for="nis">ID Siswa</label>
							    <input readonly="" type="text" class="form-control" name="id_siswa" value="<?= $siswa['id_anggota']; ?>">
						   </div>
						   <div class="form-group">
							    <label for="nama">ID Buku</label>
							    <input readonly="" type="text" class="form-control" name="id_buku" value="<?= $detail['id_koleksi']; ?>">
						   </div>
						   <div class="form-group">
							    <label for="nama">Nama Siswa</label>
							    <input readonly="" type="text" class="form-control" name="nama" value="<?= $siswa['nama_anggota']; ?>">
						   </div>
						   <div class="form-group">
							    <label for="nama">Judul Buku</label>
							    <input readonly="" type="text" class="form-control" name="judul" value="<?= $detail['judul_koleksi']; ?>">
						   </div>
						   <div class="form-group">
							    <label for="nama">Tanggal Pinjam</label>
							    <input readonly="" type="text" class="form-control" name="tgl_pinjam" value="<?= date('Y-m-d'); ?>">
						   </div>
						   <div class="form-group">
							    <label for="nama">Tanggal Kembali</label>
							    <input readonly="" type="text" class="form-control" name="tgl_kembali" value="<?= date('Y-m-d',time() + (60*60*24*7)); ?>">
						   </div>
						   
						   <button type="submit" name="submit" class="btn btn-success mt-1 float-right">Lanjutkan Peminjaman</button>
					</form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
