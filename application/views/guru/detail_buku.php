<div class="container mt-3">
	
	<div class="row mb-5">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Detail Buku</div>
                      <div class="mb-2"><img width="65px;" src="<?= base_url(); ?>assets/img/buku/<?= $detail['gambar']; ?>"></div>
                      <div class="form-group">
						    <label for="exampleInputEmail1">Judul</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['judul_koleksi']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">ISBN</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['isbn']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Jumlah Buku</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['jumlah_koleksi']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Pengarang</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['pengarang']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Penerbit</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['penerbit']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Tahun</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['tahun']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Jumlah Halaman</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['jumlah_halaman']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Kategori</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['kategori']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Klasifikasi</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['klasifikasi']; ?>">
					   </div>

					  <a class="btn btn-danger float-left" href="<?= base_url(); ?>guru/buku"><i class="fas fa-arrow-left"></i> Kembali</a>

					   <a class="btn btn-success float-right" href="<?= base_url(); ?>guru/pinjam/<?=$detail['id_koleksi']; ?>"><i class="fas fa-share-square"></i> Pinjam</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
