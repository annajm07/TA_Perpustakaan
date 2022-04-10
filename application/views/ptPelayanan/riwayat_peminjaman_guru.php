<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi Guru</h1>
          </div>
          <div class="row mb-2">
          	<div class="mx-1">
          		<a target="_blank" href="<?= base_url(); ?>petugas_pelayanan/cetak_transaksi_guru" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
          	</div>
          	<div>
          		<a  href="<?= base_url(); ?>petugas_pelayanan/transaksi_guru_pdf" class="btn btn-warning"><i class="fa fa-file"></i> Export PDF</a>
          	</div>
          </div>
          <div class="table-responsive">
          	<table class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Guru</th>
				      <th scope="col">Judul Buku</th>
				      <th scope="col">Tanggal Pinjam</th>
				      <th scope="col">Tanggal Kembali</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($riwayat_peminjaman_guru !== 1) : ?>
						  	<?php $i = 1; foreach ($riwayat_peminjaman_guru as $rw): ?>
						    <tr>
						      <th scope="row"><?= $i++ ?></th>
						      <td><?= $rw['nama_peminjam']; ?></td>
						      <td><?= $rw['judul_buku']; ?></td>
						      <td><?= $rw['tanggal_pinjam']; ?></td>
						      <td><?= $rw['tanggal_kembali']; ?></td>
						    </tr>
						<?php endforeach; ?>
					<?php endif; ?>
				  </tbody>
			</table>
			</div>
        </div>
