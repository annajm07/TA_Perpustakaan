<div class="container mt-3">
	
	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Edit Donasi</div>
                      <form  action="<?= base_url(); ?>admin/edit_donasi/<?= $detail['id_donasi']; ?>"method="post">
	                     <div class="form-group">
							    <label for="nis">Nama</label>
							    <input type="text" class="form-control" name="nama" value="<?= $detail['nama'] ?>">
							     <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Jumlah Uang</label>
							    <input type="text" class="form-control" name="jumlah" value="<?= $detail['jumlah_donasi'] ?>">
							    <?=form_error('jumlah','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Tanggal</label>
							    <input readonly="" type="text" class="form-control" name="tanggal" value="<?= $detail['tanggal'] ?>">
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
