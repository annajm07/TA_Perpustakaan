<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Riwayat Peminjaman</h1>
          </div>
          <div class="row mb-2">
          	<div class="mx-1">
          		<a target="_blank" href="<?= base_url(); ?>siswa/cetak_transaksi" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
          	</div>
          	<div>
          		<a  href="<?= base_url(); ?>siswa/transaksi_pdf" class="btn btn-warning"><i class="fa fa-file"></i> Export PDF</a>
          	</div>
          </div>
          <div class="table-responsive">
          	<table class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Siswa</th>
				      <th scope="col">Judul Buku</th>
				      <th scope="col">Tanggal Pinjam</th>
				      <th scope="col">Tanggal Kembali</th>
				    </tr>
				  </thead>
				  <tbody>
						  	<?php $i = 1; foreach ($riwayat as $rw): ?>
						    <tr>
						      <th scope="row"><?= $i++ ?></th>
						      <td><?= $rw['nama_peminjam']; ?></td>
						      <td><?= $rw['judul_buku']; ?></td>
						      <td><?= $rw['tanggal_pinjam']; ?></td>
						      <td><?= $rw['tanggal_kembali']; ?></td>
						    </tr>
						<?php endforeach; ?>
				  </tbody>
			</table>
			</div>
        </div>
