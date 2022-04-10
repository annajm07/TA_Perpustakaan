        <div class="container-fluid" style="color: black !important;">
          <h3 class="text-center">Daftar Buku</h3>
          	<table class="table table-bordered" style="font-size: 10px !important;">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Judul</th>
				      <th scope="col">ISBN</th>
				      <th scope="col">Jumlah Buku</th>
		              <th scope="col">Pengarang</th>
		              <th scope="col">Penerbit</th>
		              <th scope="col">Tahun</th>
		              <th scope="col">Jumlah Halaman</th>
		              <th scope="col">Kategori</th>
		              <th scope="col">Klasifikasi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($buku !== 1): ?>
				  		<?php $i = 1; foreach ($buku as $bk): ?>
				  			<tr>
				  				<th><?= $i++ ?></th>
				  				<td><?= $bk['judul_koleksi']; ?></td>
				  				<td><?= $bk['isbn']; ?></td>
				  				<td><?= $bk['jumlah_koleksi']; ?></td>
			                    <td><?= $bk['pengarang']; ?></td>
			                    <td><?= $bk['penerbit']; ?></td>
			                    <td><?= $bk['tahun']; ?></td>
			                    <td><?= $bk['jumlah_halaman']; ?></td>
			                    <td><?= $bk['kategori']; ?></td>
			                    <td><?= $bk['klasifikasi']; ?></td>
				  			</tr>
				  		<?php endforeach; ?>
				  	<?php endif; ?>
				  </tbody>
			</table>
			</div>


