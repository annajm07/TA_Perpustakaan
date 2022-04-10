        <div class="container-fluid" style="color: black !important;">
			<h3 class="text-center">Riwayat Peminjaman</h3>
          	<table class="table table-bordered" style="font-size: 12px !important;">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Guru</th>
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