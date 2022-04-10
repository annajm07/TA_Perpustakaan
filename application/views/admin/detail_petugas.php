<div class="container mt-3">
	
	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Detail Petugas</div>
                      <div class="mb-2"><img width="65px;" src="<?= base_url(); ?>assets/img/profil/<?= $detail['gambar']; ?>"></div>
                      <div class="form-group">
						    <label for="exampleInputEmail1">ID</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['id_petugas']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">NAMA</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['nama_petugas']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">EMAIL</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['email']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">ROLE</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['role']; ?>">
					   </div>

					   <a class="btn btn-success float-right" href="<?= base_url(); ?>admin/data_petugas"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
