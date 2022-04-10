<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usulan Jurnal</h1>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
          	<div class="row mb-2">
          		<a class="btn btn-primary ml-1" href="<?= base_url(); ?>petugas_buku/usulan_masuk">Buku</a>
              <a class="btn btn-primary ml-1" href="<?= base_url(); ?>petugas_buku/usulan_jurnal">Jurnal</a>
              <a class="btn btn-primary ml-1" href="<?= base_url(); ?>petugas_buku/usulan_majalah">Majalah</a>
              <a class="btn btn-primary ml-1" href="<?= base_url(); ?>petugas_buku/usulan_surat_kabar">Surat Kabar</a>
            </div>
          <div class="table-responsive">
          	<table width="100%" class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
              <th scope="col">Gambar</th>
              <th scope="col">Judul Jurnal</th>
              <th scope="col">Penulis</th>
              <th scope="col">Jumlah Halaman</th>
              <th scope="col">tahun</th>
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
                  <td><?= $bk['pengarang']; ?></td>
                  <td><?= $bk['jumlah_halaman']; ?></td>
                  <td><?= $bk['tahun']; ?></td>
				  				<td>
				  					<a class="btn btn-sm btn-success mb-1 mx-1" href="<?= base_url(); ?>petugas_buku/konfirmasi_jurnal/<?=$bk['id_koleksi']; ?>"><div><i class="far fa-check-circle"></i> Tambahkan</div></a>
                      <a class="btn btn-sm btn-danger mb-1 mx-1" href="<?=base_url();?>petugas_buku/hapus_usulan_jurnal/<?=$bk['id_koleksi']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ?');"><div><i class="fa fa-trash"></i> Hapus</div></a>
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




