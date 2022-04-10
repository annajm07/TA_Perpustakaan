<div class="container mt-3">
	
	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Edit Buku</div>
                      <form  action="<?= base_url(); ?>petugas_buku/edit_buku/<?= $detail['id_koleksi']; ?>"method="post" enctype="multipart/form-data">
	                     <div class="form-group">
							    <label for="nis">Judul</label>
							    <input type="text" class="form-control" name="judul" value="<?= $detail['judul_koleksi'] ?>">
						   </div>
						   <div class="form-group">
							    <label for="nama">ISBN</label>
							    <input type="text" class="form-control" name="isbn" value="<?= $detail['isbn'] ?>">
							    <?=form_error('isbn','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Jumlah Buku</label>
							    <input type="text" class="form-control" name="jumlah" value="<?= $detail['jumlah_koleksi'] ?>">
							    <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Pengarang</label>
							    <input type="text" class="form-control" name="pengarang" value="<?= $detail['pengarang'] ?>">
							    <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Penerbit</label>
							    <input type="text" class="form-control" name="penerbit" value="<?= $detail['penerbit'] ?>">
							    <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Tahun</label>
							    <input type="text" class="form-control" name="tahun" value="<?= $detail['tahun'] ?>">
							    <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
							    <label for="nama">Jumlah Halaman</label>
							    <input type="text" class="form-control" name="jumlah_halaman" value="<?= $detail['jumlah_halaman'] ?>">
							    <?=form_error('jumlah_halaman','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
						   		<label >Kategori</label>
						   		<select class="form-control" name="kategori">

						   			<option selected="selected"><?= $detail['kategori']; ?></option>

						   			<?php if($detail['kategori']!== 'Umum'): ?>
							      		<option>Umum</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Filsafat dan Psikologi'): ?>
							      		<option>Filsafat dan Psikologi</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Agama'): ?>
							      		 <option>Agama</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Sosial'): ?>
							      		<option>Sosial</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Bahasa'): ?>
							      		<option>Bahasa</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Sains dan Matematika'): ?>
							      		<option>Sains dan Matematika</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Teknologi'): ?>
							      		<option>Teknologi</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Seni dan Rekreasi'): ?>
							      		<option>Seni dan Rekreasi</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Literatur dan Sastra'): ?>
							      		<option>Literatur dan Sastra</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Sejarah dan Biografi'): ?>
							      		<option>Sejarah dan Biografi</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['kategori']!== 'Lainnya'): ?>
							      		 <option>Lainnya</option>
							     	 <?php endif; ?>
						   		</select>       				         
						   </div>
						   <div class="form-group">
						   		<label >Klasifikasi</label>
						   		<select class="form-control" name="klasifikasi">

						   			<option selected="selected"><?= $detail['klasifikasi']; ?></option>

						   			<?php if($detail['klasifikasi']!== 'kelas 1'): ?>
							      		<option>kelas 1</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['klasifikasi']!== 'kelas 2'): ?>
							      		<option>kelas 2</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['klasifikasi']!== 'kelas 3'): ?>
							      		<option>kelas 3</option>
							     	 <?php endif; ?>

							     	 <?php if($detail['klasifikasi']!== 'lainnya'): ?>
							      		<option>lainnya</option>
							     	 <?php endif; ?>
						   		</select>
						   </div>

							<input type="file" id="gambar" name="gambar">
					        <div class="mb-2 mt-2"><img width="40px;" src="<?= base_url(); ?>assets/img/buku/<?= $detail['gambar']; ?>"></div>
					        <small>max size 1 MB</small>

						   <button type="submit" name="submit" class="btn btn-primary mt-1 float-right">Ubah Data</button>
					</form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
	</div>
</div>
