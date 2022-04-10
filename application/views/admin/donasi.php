<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Donasi</h1>
          </div>
          <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
          </div>
            <div class="row mb-2">
          		<div class="mx-1">
          			<button class="btn btn-primary" data-toggle="modal" data-target="#modal_donasi"><i class="fa fa-plus"></i> Tambah Donasi</button>
          		</div>
              <div class="mx-1">
              <a target="_blank" href="<?= base_url(); ?>admin/cetak_donasi" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="mx-1">
              <a  href="<?= base_url(); ?>admin/donasi_pdf" class="btn btn-warning"><i class="fa fa-file"></i> Export PDF</a>
            </div>
          	</div>
          	
          <div class="table-responsive">
            	<table class="table" id="table_keren">
  				  <thead class="thead-dark">
  				    <tr>
  				      <th scope="col">No</th>
  				      <th scope="col">Nama Donatur</th>
  				      <th scope="col">Jumlah Uang</th>
  				      <th scope="col">Tanggal</th>
  				      <th scope="col">Aksi</th>
  				    </tr>
  				  </thead>
  				  <tbody>
  				  	<?php if($donasi !== 1): ?>
  				  		<?php $i = 1; foreach($donasi as $d) :?>
  				  		<tr>
  				  			<th scope="row"><?= $i++ ?></th>
  						     <td><?= $d['nama']; ?></td>
  						     <td>Rp.<?= number_format($d['jumlah_donasi']); ?></td>
  						     <td><?= $d['tanggal']; ?></td>
  						     <td>
  						      	<a class="btn btn-sm btn-success mb-1" href="<?= base_url(); ?>admin/edit_donasi/<?= $d['id_donasi']; ?>"><div style="width: 20px;"><i class="fa fa-edit"></i></div></a>
  						      	<a class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apakah anda yakin ingin menghapus ?');" href="<?= base_url(); ?>admin/hapus_donasi/<?= $d['id_donasi']; ?>"><div style="width: 20px;"><i class="fa fa-trash"></i></div></a>
  						     </td>
  				  		</tr>
  				  	<?php endforeach; ?>
  				  	<?php endif; ?>
  				  </tbody>
  			</table>
  			<div style="font-size: 15px;" class="badge badge-success">TOTAL: Rp.<?= number_format($jumlah_donasi['jumlah']); ?></div>
			</div>
    </div>


<!-- Modal buku -->
<div class="modal fade" id="modal_donasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Donasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url(); ?>admin/donasi">
      <div class="modal-body">

        <div class="form-group">
        	<label for="nama">Nama Donatur</label>
        	<input class="form-control" type="text" name="nama" autocomplete="off">
        </div>
        <div class="form-group">
        	<label for="jumlah">Jumlah Uang</label>
        	<input class="form-control" type="number" name="jumlah">
        </div>
        <div class="form-group">
        	<label for="tanggal">Tanggal</label>
        	<input readonly class="form-control" type="text" name="tanggal" value="<?= date('Y-m-d'); ?>">
        </div>
        
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
