<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Surat Kabar</h1>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
          	<div class="row mb-2">
          		<div class="mx-1">
          			<button class="btn btn-primary" data-toggle="modal" data-target="#modal_surat_kabar"><i class="fa fa-plus"></i> Tambah Surat Kabar</button>
          		</div>
              <div class="mx-1">
                <a target="_blank" href="<?= base_url(); ?>admin/cetak_surat_kabar" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
              </div>
              <div class="mx-1">
              <a href="<?= base_url(); ?>admin/surat_kabar_pdf" class="btn btn-warning"><i class="fa fa-file"></i> Export PDF</a>
              </div>
          	</div>
          <div class="table-responsive">
          	<table width="100%" class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
              <th scope="col">Gambar</th>
              <th scope="col">Judul Surat Kabar</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Tahun</th>
              <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($buku !== 1): ?>
				  		<?php $i = 1; foreach ($buku as $bk): ?>
				  			<tr>
				  				<th><?= $i++ ?></th>
				  				<td><img style="max-width: 50px;" src="<?= base_url(); ?>assets/img/buku/<?= $bk['gambar']; ?>"></td>
				  				<td><?= $bk['judul_koleksi']; ?></td>
                  <td><?= $bk['penerbit']; ?></td>
                  <td><?= $bk['tahun']; ?></td>
				  				<td>
				  					<a class="btn btn-sm btn-primary mb-1" href="<?= base_url(); ?>admin/detail_surat_kabar/<?= $bk['id_koleksi']; ?>"><div style="width: 20px;"><i class="fas fa-search-plus"></i></div></a>
						      		<a class="btn btn-sm btn-success mb-1" href="<?= base_url(); ?>admin/edit_surat_kabar/<?= $bk['id_koleksi']; ?>"><div style="width: 20px;"><i class="fa fa-edit"></i></div></a>
						      		<a class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apakah anda yakin ingin menghapus ?');" href="<?= base_url(); ?>admin/hapus_surat_kabar/<?= $bk['id_koleksi']; ?>"><div style="width: 20px;"><i class="fa fa-trash"></i></div></a>
						      </td>
				  				</td>
				  			</tr>
				  		<?php endforeach; ?>
				  	<?php endif; ?>
				  </tbody>
			</table>
			</div>
			</div>
		</div>

<!-- Modal buku -->
<div class="modal fade" id="modal_surat_kabar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Surat Kabar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('admin/data_surat_kabar');?>
      <div class="modal-body">

        <div class="form-group">              
            <input  type="text" class="form-control" name="judul" placeholder="judul surat kabar">               
        </div>
        <div class="form-group">             
            <input  type="text" class="form-control" name="penerbit" placeholder="penerbit">              
        </div>
        
        <div class="form-group">               
            <input  type="text" class="form-control" name="jumlah_halaman" placeholder="jumlah halaman">              
        </div>

         <div class="form-group">               
            <input  type="text" class="form-control" name="jumlah" placeholder="jumlah surat kabar">              
        </div>
        <div class="form-group">
             <input  type="text" class="form-control" name="tahun" placeholder="tahun">               
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


