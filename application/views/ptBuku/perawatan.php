<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perawatan Koleksi</h1>
          </div>
          <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
          </div>
            <div class="row mb-2">
          		<div class="mx-1">
          			<button class="btn btn-primary" data-toggle="modal" data-target="#modal_donasi"><i class="fa fa-plus"></i> Tambah Data</button>
          		</div>
              <div class="mx-1">
              <a target="_blank" href="<?= base_url(); ?>petugas_buku/cetak_perawatan" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="mx-1">
              <a  href="<?= base_url(); ?>petugas_buku/perawatan_pdf" class="btn btn-warning"><i class="fa fa-file"></i> Export PDF</a>
            </div>
          	</div>
          	
          <div class="table-responsive">
          	<table class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Judul</th>
				      <th scope="col">Jenis Koleksi</th>
				      <th scope="col">Kondisi Koleksi</th>
				      <th scope="col">Tanggal</th>
              <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if($perawatan !== 1): ?>
				  		<?php $i = 1; foreach($perawatan as $d) :?>
				  		<tr>
				  			<th scope="row"><?= $i++ ?></th>
						     <td><?= $d['judul']; ?></td>
                 <td><?= $d['jenis_koleksi']; ?></td>
                 <td><?= $d['kondisi_koleksi']; ?></td>
						     <td><?= $d['tanggal']; ?></td>
						     <td>
						      	<a class="btn btn-sm btn-primary mb-1" href="<?= base_url(); ?>petugas_buku/detail_perawatan/<?= $d['id_perawatan']; ?>"><div style="width: 20px;"><i class="fas fa-search-plus"></i></div></a>
                    <a class="btn btn-sm btn-success mb-1" href="<?= base_url(); ?>petugas_buku/edit_perawatan/<?= $d['id_perawatan']; ?>"><div style="width: 20px;"><i class="fa fa-edit"></i></div></a>
						      	<a class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apakah anda yakin ingin menghapus ?');" href="<?= base_url(); ?>petugas_buku/hapus_perawatan/<?= $d['id_perawatan']; ?>"><div style="width: 20px;"><i class="fa fa-trash"></i></div></a>
						     </td>
				  		</tr>
				  	<?php endforeach; ?>
				  	<?php endif; ?>
				  </tbody>
			</table>
			</div>
        </div>


<!-- Modal buku -->
<div class="modal fade" id="modal_donasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Laporan Perawatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('petugas_buku/perawatan');?>
      <div class="modal-body">

        <div class="form-group">
        	<input class="form-control" type="text" name="judul" autocomplete="off" placeholder="judul">
        </div>

         <select  class="form-control" name="jenis_koleksi">
           <option class="hidden text-center" selected disabled>Jenis Koleksi</option>
           <option>Buku</option>
           <option>Jurnal</option>
           <option>Majalah</option>
           <option>Surat Kabar</option>
       </select>

       <select  class="form-control mt-3" name="kondisi_koleksi">
           <option class="hidden text-center" selected disabled>Kondisi Koleksi</option>
           <option>Rusak</option>
           <option>Robek</option>
           <option>Terbakar</option>
           <option>Hilang</option>
           <option>Lainnya</option>
       </select>

       <div class="form-group mt-3">
          <textarea  type="text" name="aksi" class="form-control" rows="3" placeholder="catatan"></textarea>
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
