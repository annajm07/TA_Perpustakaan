<div class="container mt-3">
	
	<div class="row mb-5">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Detail Donasi</div>
                     
                      <div class="form-group">
						    <label for="exampleInputEmail1">Nama Donatur</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['nama']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Alamat</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['alamat']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Jenis Pembayaran</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['jenis_pembayaran']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Nama Bank</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['nama_bank']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Nomor Rekening</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['nomor_rekening']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Jumlah Uang</label>
						    <input readonly="" type="text" class="form-control" value="Rp. <?= number_format($detail['jumlah_donasi']); ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Telepon</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['telepon']; ?>">
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Tanggal</label>
						    <input readonly="" type="text" class="form-control" value="<?= $detail['tanggal']; ?>">
					   </div>
					   

					  <a class="btn btn-success float-right" href="<?= base_url(); ?>petugas_keuangan/donasi"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
