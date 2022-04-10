<div class="container mt-3">
	
	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Detail Majalah</div>
                      <div class="mb-2"><img width="65px;" src="<?= base_url(); ?>assets/img/buku/<?= $detail['gambar']; ?>"></div>
                      <div class="form-group">
						    <label for="exampleInputEmail1">Judul Majalah</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['judul_koleksi']; ?>">
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
						    <label for="exampleInputEmail1">Jumlah Majalah</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['jumlah_koleksi']; ?>">
					   </div>
					   
					   <div class="form-group">
						    <label for="exampleInputEmail1">Tahun</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['tahun']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Jumlah Halaman</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['jumlah_halaman']; ?>">
					   </div>
					  

					   <a class="btn btn-success float-right" href="<?= base_url(); ?>admin/data_majalah"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
