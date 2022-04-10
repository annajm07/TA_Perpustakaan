        <div class="container-fluid" style="color: black !important;">
        <h3 class="text-center">Daftar Donasi</h3>
          	<table class="table table-bordered" style="font-size: 12px !important;">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Donatur</th>
				      <th scope="col">Jumlah Uang</th>
				      <th scope="col">Tanggal</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if($donasi !== 1): ?>
				  		<?php $i = 1; foreach($donasi as $d) :?>
				  		<tr>
				  			<th scope="row"><?= $i++ ?></th>
						     <td><?= $d['nama']; ?></td>
						     <td>Rp.<?= number_format($d['jumlah_donasi']); ?></td>
						     <td><?= $d['tanggal']; ?></td>

				  		</tr>
				  	<?php endforeach; ?>
				  	<?php endif; ?>
				  </tbody>
			</table>
			<div style="font-size: 15px;" class="font-weight-bold">TOTAL: Rp.<?= number_format($jumlah_donasi['jumlah']); ?></div>
			</div>

<script>window.print();</script>