<div class="container mt-3">

	 <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
      </div>
	
	<div class="row mx-auto" style="margin-top: 10%;">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Ganti Foto</div>
                    <form action="<?= base_url(); ?>petugas_buku/ganti_foto" method="post" enctype="multipart/form-data">
					   <div class="mb-2 mt-2">
					   	<img style="margin-left: 38%;" width="23%;" src="<?= base_url(); ?>assets/img/profil/<?= $detail['gambar']; ?>">
					   	<br>
					   	<small style="margin-left: 45%;"><?= $detail['gambar']; ?></small>
					   </div>         
                      <div>
                      	<input type="file" id="gambar" name="gambar">
                      	<br>
                      	<small>max size 1 MB</small>
                      </div>
                      <button type="submit" class="btn btn-success mt-2 float-right">Submit</button>		
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
