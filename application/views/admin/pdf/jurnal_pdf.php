        <div class="container-fluid" style="color: black !important;">
          <h3 class="text-center">Daftar Jurnal</h3>
          	<table class="table table-bordered" style="font-size: 12px !important;">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Judul Jurnal</th>
				      <th scope="col">Jumlah Jurnal</th>
		              <th scope="col">Penulis</th>
		              <th scope="col">Tahun</th>
		              <th scope="col">Jumlah Halaman</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($buku !== 1): ?>
				  		<?php $i = 1; foreach ($buku as $bk): ?>
				  			<tr>
				  				<th><?= $i++ ?></th>
				  				<td><?= $bk['judul_koleksi']; ?></td>
				  				<td><?= $bk['jumlah_koleksi']; ?></td>
			                    <td><?= $bk['pengarang']; ?></td>
			                    <td><?= $bk['tahun']; ?></td>
			                    <td><?= $bk['jumlah_halaman']; ?></td>
				  			</tr>
				  		<?php endforeach; ?>
				  	<?php endif; ?>
				  </tbody>
			</table>
			</div>


