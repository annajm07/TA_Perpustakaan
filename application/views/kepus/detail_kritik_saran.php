<div class="container mt-3">
	
	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Detail Kritik Saran</div>
                      <div class="form-group">
						    <label for="exampleInputEmail1">Tanggal</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['tanggal']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Judul</label>
						    <textarea readonly="" type="text" class="form-control" rows="2"><?= $detail['judul_kritik']; ?></textarea>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Isi</label>
						    <textarea readonly="" class="form-control" rows="7"><?= $detail['isi_kritik']; ?></textarea>
					   </div>


					   <a class="btn btn-success float-right" href="<?= base_url(); ?>kepala_perpustakaan/Kritik_saran"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
