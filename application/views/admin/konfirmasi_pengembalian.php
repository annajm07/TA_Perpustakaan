<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Pengembalian</h1>
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
				      <th scope="col">Nama Peminjam</th>
				      <th scope="col">Judul Buku</th>
				      <th scope="col">Tanggal Pinjam</th>
				      <th scope="col">Tanggal Kembali</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if($peminjam !== 1): ?>
				  		<?php $i=1; foreach($peminjam as $p): ?>
				  			<tr>
					  			<td><?= $i++; ?></td>
					  			<td><?= $p['nama_peminjam']; ?></td>
					  			<td><?= $p['judul_buku']; ?></td>
					  			<td><?= $p['tanggal_pinjam']; ?></td>
					  			<td><?= $p['tanggal_kembali']; ?></td>
					  			<td>
							      	<a class="btn btn-sm btn-success mb-1 mx-1" href="<?= base_url(); ?>admin/proses_pengembalian/<?=$p['id_peminjaman']; ?>/<?= $p['id_anggota']; ?>"><div><i class="far fa-check-circle"></i> kembalikan</div></a>
								</td>
							</tr>
				  		<?php endforeach; ?>
				  	<?php endif; ?>
				  </tbody>
			</table>
			</div>

        </div>
