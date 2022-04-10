<div class="container mt-3">
	
	<div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
    </div>

	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Tambah Guru</div>
                      <form  action="<?= base_url(); ?>admin/tambah_guru"method="post" enctype="multipart/form-data">
	                      <div class="form-group">
							    <label for="nis">Nip</label>
							    <input type="number" class="form-control" name="nip">
							    <?=form_error('nip','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Nama guru</label>
							    <input type="text" class="form-control" name="nama">
							    <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
						   		<label >Jenis Kelamin</label>
						   		<select class="form-control" name="jenis_kelamin">
						   			<option>laki-laki</option>
						   			<option>perempuan</option>
						   		</select>
						   </div>
						   <div class="form-group">
							    <label for="email">Email</label>
							    <input type="text" class="form-control" name="email">
							    <?=form_error('email','<small class="text-danger ml-3">',' </small>'); ?>
						   </div> 
						   <div class="form-group">
							    <label for="password">Password</label>
							    <input  type="text" class="form-control" name="password">
							    <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>

						   <button type="submit" name="submit" class="btn btn-primary mt-1 float-right">Simpan</button>
					</form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
