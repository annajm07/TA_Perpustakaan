<div class="container mt-3">
	
	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Edit Petugas</div>
                      <form  action="<?= base_url(); ?>admin/edit_petugas/<?= $detail['id_petugas']; ?>"method="post" enctype="multipart/form-data">
	                      <div class="form-group">
							    <label for="exampleInputEmail1">ID</label>
							    <input readonly="" type="text" class="form-control" name="id" value="<?= $detail['id_petugas']; ?>">
						   </div>
						   <div class="form-group">
							    <label for="exampleInputEmail1">NAMA</label>
							    <input type="text" class="form-control" name="nama" value="<?= $detail['nama_petugas']; ?>">
						   </div>
						   <div class="form-group">
							    <label for="exampleInputEmail1">EMAIL</label>
							    <input readonly="" type="text" class="form-control" value="<?= $detail['email']; ?>">
						   </div>
						    <div class="form-group">
							    <label for="role">Role</label>
							    <select class="form-control" id="role" name="role">
							      <option selected="selected"><?= $detail['role']; ?></option>

							      <?php if($detail['role']!== 'Petugas Buku'): ?>
							      	<option>Petugas Buku</option>
							      <?php endif; ?>

							      <?php if($detail['role']!== 'Petugas Pelayanan'): ?>
							      <option>Petugas Pelayanan</option>
							      <?php endif; ?>

							      <?php if($detail['role']!== 'Petugas Keuangan'): ?>
							      <option>Petugas Keuangan</option>
							      <?php endif; ?>

							      <?php if($detail['role']!== 'Kepala Perpustakaan'): ?>
							      <option>Kepala Perpustakaan</option>
							      <?php endif; ?>

							    </select>
							 </div>

							<input type="file" id="gambar" name="gambar">
					        <div class="mb-2 mt-2"><img width="40px;" src="<?= base_url(); ?>assets/img/profil/<?= $detail['gambar']; ?>"></div>
					        <small>max size 1 MB</small>

						   <button type="submit" name="submit" class="btn btn-primary mt-1 float-right">Ubah Data</button>
					</form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
