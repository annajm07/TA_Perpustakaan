
        <div class="container-fluid">
			<h3 class="text-center">Daftar Transaksi Siswa</h3>
          	<table class="table table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Siswa</th>
				      <th scope="col">Judul Buku</th>
				      <th scope="col">Tanggal Pinjam</th>
				      <th scope="col">Tanggal Kembali</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($riwayat_peminjaman_siswa !== 1) : ?>
						  	<?php $i = 1; foreach ($riwayat_peminjaman_siswa as $rw): ?>
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

<script>window.print();</script>