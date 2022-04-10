<div class="container mt-3">
	
	<div class="row mb-4">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    	<?=$this->session->flashdata('pesan'); ?>
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Ganti Password</div>
                      <form action="<?= base_url(); ?>guru/ganti_password" method="post">
                      <div class="form-group">
						    <label for="exampleInputEmail1">Password Lama</label>
						    <input  type="password" class="form-control" name="password_lama">
						    <?=form_error('password_lama','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Password Baru</label>
						    <input  type="password" class="form-control" name="password_baru">
						    <?=form_error('password_baru','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Konfirmasi Password</label>
						    <input  type="password" class="form-control" name="konfirmasi_password">
						    <?=form_error('konfirmasi_password','<small class="text-danger ml-3">',' </small>'); ?>
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
