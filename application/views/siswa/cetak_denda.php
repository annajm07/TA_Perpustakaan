       <div class="container-fluid" style="color: black !important;">
          <h3 class="text-center">Daftar Denda</h3>
          	<table class="table table-bordered" >
				  <thead>
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
						  	<?php $i = 1; foreach ($denda as $dd): ?>
						    <tr>
						      <th scope="row"><?= $i++ ?></th>
						      <td><?= $dd['nama_siswa']; ?></td>
						      <td><?= $dd['judul_buku']; ?></td>
						      <td><?= $dd['terlambat']; ?> Hari</td>
						      <td>Rp.<?= number_format($dd['denda']); ?></td>
						      <?php if($dd['status'] == 1): ?>
						      <td><small class="font-italic font-weight-bold text-success">Sudah Dibayar</small></td>
						      <?php else : ?>
						      <td><small class="font-italic font-weight-bold text-danger">Belum Dibayar</small></td>
						      <?php endif; ?>
						    </tr>
						<?php endforeach; ?>
				  </tbody>
			</table>
			<div style="font-size: 15px;" class="font-weight-bold" >TOTAL: Rp.<?= number_format($jumlah_denda['jumlah']); ?></div>
			</div>
			
<script>window.print();</script>