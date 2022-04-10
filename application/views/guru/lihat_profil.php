<div class="container mt-3">
	
	<div class="row mb-4">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Data Profil</div>
                      <div class="mb-2"><img width="65px;" src="<?= base_url(); ?>assets/img/profil/<?= $detail['gambar']; ?>"></div>
                      <div class="form-group">
						    <label for="exampleInputEmail1">Nip</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['nis/nip']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Nama Guru</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['nama_anggota']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Jenis Kelamin</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['jenis_kelamin']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['email']; ?>">
					   </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
