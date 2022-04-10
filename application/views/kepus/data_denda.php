<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Denda</h1>
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
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($data_denda !== 1) : ?>
						  	<?php $i = 1; foreach ($data_denda as $dd): ?>
						    <tr>
						      <th scope="row"><?= $i++ ?></th>
						      <td><?= $dd['nama_siswa']; ?></td>
						      <td><?= $dd['judul_buku']; ?></td>
						      <td><?= $dd['terlambat']; ?> Hari</td>
						      <td>Rp.<?= number_format($dd['denda']); ?></td>
						      <?php if($dd['status'] == 1): ?>
						      <td><div class="badge badge-success">Sudah Dibayar</div></td>
						      <?php else : ?>
						      <td><div class="badge badge-danger">Belum Dibayar</div></td>
						      <?php endif; ?>
						    </tr>
						<?php endforeach; ?>
					<?php endif; ?>
				  </tbody>
			</table>
			<div style="font-size: 15px;" class="badge badge-success">TOTAL: Rp.<?= number_format($jumlah_denda['jumlah']); ?></div>
			</div>
        </div>
