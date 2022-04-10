<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Denda</h1>
          </div>
          <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
          <div class="table-responsive">
          	<table class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Siswa</th>
				      <th scope="col">Judul Buku</th>
				      <th scope="col">Terlambat</th>
				      <th scope="col">Denda</th>
				      <th scope="col">Status</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($konfirmasi_denda !== 1) : ?>
						  	<?php $i = 1; foreach ($konfirmasi_denda as $kd): ?>
						    <tr>
						      <th scope="row"><?= $i++ ?></th>
						      <td><?= $kd['nama_siswa']; ?></td>
						      <td><?= $kd['judul_buku']; ?></td>
						      <td><?= $kd['terlambat']; ?> Hari</td>
						      <td>Rp.<?= number_format($kd['denda']); ?></td>
						      <td><div class="badge badge-danger">Belum Dibayar</div></td>
						      <td>
						      	<a class="btn btn-sm btn-success mb-1" href="<?= base_url(); ?>petugas_keuangan/proses_denda/<?=$kd['id_denda']; ?>/<?=$kd['id_siswa']; ?>"><div><i class="fas fa-hand-holding-usd"></i> Lunaskan</div></a>
						      </td>
						    </tr>
						<?php endforeach; ?>
					<?php endif; ?>
				  </tbody>
			</table>
			</div>
        </div>
