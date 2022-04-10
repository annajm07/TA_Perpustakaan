<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tetapkan Denda</h1>
          </div>
          <div class="row mt-3 mb-3">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                	<div class="row">
		              <div class="col-sm-8 m-auto">
		                <?= $this->session->flashdata('pesan'); ?>
		              </div>
	           		 </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Atur Ulang Denda</div>
                      <form action="<?= base_url(); ?>Kepala_Perpustakaan/tetapkan_denda" method="post">
                      <div class="form-group">
						    <label for="exampleInputEmail1">Denda Per Hari (Rp)</label>
						    <input  type="text" class="form-control" name="denda_per_hari" value="<?= number_format($denda['denda_per_hari']); ?>">
						    <?=form_error('denda_per_hari','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>	
					    <button class="btn btn-success float-right"><i class="fas fa-paper-plane"></i> Ubah</button>
                    </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>
	</div>


          	

        </div>