<div class="container mt-3">
	
	<div class="row">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Edit Siswa</div>
                      <form  action="<?= base_url(); ?>admin/edit_Siswa/<?= $detail['id_anggota']; ?>"method="post" enctype="multipart/form-data">
	                     <div class="form-group">
							    <label for="nis">Nis</label>
							    <input type="text" class="form-control" name="nis" value="<?= $detail['nis/nip'] ?>">
						   </div>
						   <div class="form-group">
							    <label for="nama">Nama Siswa</label>
							    <input type="text" class="form-control" name="nama" value="<?= $detail['nama_anggota'] ?>">
							    <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
						   </div>
						   <div class="form-group">
						   		<label >Jenis Kelamin</label>
						   		<select class="form-control" name="jenis_kelamin">

						   			<option selected="selected"><?= $detail['jenis_kelamin']; ?></option>

						   			<?php if($detail['jenis_kelamin']!== 'laki-laki'): ?>
							      		<option>laki-laki</option>
							     	 <?php endif; ?>

							      	<?php if($detail['jenis_kelamin']!== 'perempuan'): ?>
						   				<option>perempuan</option>
							      	<?php endif; ?>

						   		</select>
						   </div>
						   <div class="form-group">
							    <label for="email">Kelas</label>
							    <input type="text" class="form-control" name="kelas" value="<?= $detail['kelas'] ?>">
							    <?=form_error('kelas','<small class="text-danger ml-3">',' </small>'); ?>
						   </div> 
						   <div class="form-group">
							    <label for="jurusan">Jurusan</label>
							    <input type="text" class="form-control" name="jurusan" value="<?= $detail['jurusan'] ?>">
							    <?=form_error('email','<small class="text-danger ml-3">',' </small>'); ?>
						   </div> 
						   <div class="form-group">
							    <label for="email">Email</label>
							    <input readonly="" type="text" class="form-control" name="email" value="<?= $detail['email'] ?>">
						   </div> 

							<input type="file" id="gambar" name="gambar">
					        <div class="mb-2 mt-2"><img width="40px;" src="<?= base_url(); ?>assets/img/profil/<?= $detail['gambar']; ?>"></div>
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
