<div class="container mt-5">

	<div class="row mb-3">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    	<?= $this->session->flashdata('pesan'); ?>
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Form Kritik dan Saran</div>
                    <form method="post" action="<?= base_url(); ?>Auth/kritik_saran" >
                      <div class="form-group">
						    <label for="exampleInputEmail1">Tanggal</label>
						    <input readonly="" type="text" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Judul</label>
						    <textarea  type="text" name="judul" class="form-control" rows="2"></textarea>
						    <?=form_error('judul','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Isi</label>
						    <textarea  class="form-control" name="isi" rows="7"></textarea>
						    <?=form_error('isi','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>


					   <button type="submit" class="btn btn-success float-right"><i class="fas fa-paper-plane"></i> Kirim</button>
					</form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
