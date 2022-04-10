

  <div class="container-fluid mt-3">
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
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Tambah Petugas</div>
                      	<?php echo form_open_multipart('admin/tambah_petugas');?>
		        <div class="form-group">
		        	<input class="form-control" type="text" name="nama" placeholder="nama">
		        	<?=form_error('email','<small class="text-danger ml-3">',' </small>'); ?>
		        </div>
		        <div class="form-group">
		        	<input class="form-control" type="email" name="email" placeholder="email">
		        	<?=form_error('email','<small class="text-danger ml-3">',' </small>'); ?>
		        </div>
		        <div class="form-group">
				    <label for="role">Role</label>
				    <select class="form-control" id="role" name="role">
				      <option>Petugas Buku</option>
				      <option>Petugas Pelayanan</option>
				      <option>Petugas Keuangan</option>
				      <option>Kepala Perpustakaan</option>
				    </select>
				 </div>
				  <div class="form-group">
		        	<input class="form-control" type="text" name="password" placeholder="password">
		        	<?=form_error('password','<small class="text-danger ml-3">',' </small>'); ?>
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

