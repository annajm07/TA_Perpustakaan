<div class="container mt-3">
	
	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Edit Jurnal</div>
                      <form  action="<?= base_url(); ?>petugas_buku/edit_jurnal/<?= $detail['id_koleksi']; ?>"method="post" enctype="multipart/form-data">
	                     <div class="form-group">
							    <label for="nis">Judul Jurnal</label>
							    <input type="text" class="form-control" name="judul" value="<?= $detail['judul_koleksi'] ?>">
							    <?=form_error('judul','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						  
						   <div class="form-group">
							    <label for="nama">Jumlah Jurnal</label>
							    <input type="text" class="form-control" name="jumlah" value="<?= $detail['jumlah_koleksi'] ?>">
							    <?=form_error('jumlah','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Penulis</label>
							    <input type="text" class="form-control" name="penulis" value="<?= $detail['pengarang'] ?>">
							    <?=form_error('penulis','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   
						   <div class="form-group">
							    <label for="nama">Tahun</label>
							    <input type="text" class="form-control" name="tahun" value="<?= $detail['tahun'] ?>">
							    <?=form_error('tahun','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Jumlah Halaman</label>
							    <input type="text" class="form-control" name="jumlah_halaman" value="<?= $detail['jumlah_halaman'] ?>">
							    <?=form_error('jumlah_halaman','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>

						   <button type="submit" name="submit" class="btn btn-primary mt-1 float-right">Ubah Data</button>
					</form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
