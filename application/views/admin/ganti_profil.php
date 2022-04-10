<div class="container mt-3">
	
	<div class="row mb-4">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <?=$this->session->flashdata('pesan'); ?>
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Ganti Profil</div>
                      <form action="<?= base_url(); ?>admin/ganti_profil" method="post">
					   <div class="form-group">
						    <label for="exampleInputEmail1">Nama</label>
						    <input  type="text" class="form-control" name="nama" value="<?= $user['nama_petugas']; ?>">
						    <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    <input  type="text" class="form-control" name="email" value="<?= $user['email']; ?>">
						    <?=form_error('email','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <button type="submit" class="btn btn-success mt-2 float-right">Submit</button>
					 </form>  
					   
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
