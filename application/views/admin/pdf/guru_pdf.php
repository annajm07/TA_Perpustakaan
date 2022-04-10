        <div class="container-fluid" style="color: black !important;">
        	<h3 class="text-center">Daftar Guru</h3>
          	<table class="table table-bordered" style="font-size: 12px !important;">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nip</th>
				      <th scope="col">Nama guru</th>
				      <th scope="col">Email</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if($guru !== 1): ?>
						  	<?php $i = 1; foreach ($guru as $gr): ?>
						    <tr>
						      <th scope="row"><?= $i++ ?></th>
						      <td><?= $gr['nis/nip']; ?></td>
						      <td><?= $gr['nama_anggota']; ?></td>
						      <td><?= $gr['email']; ?></td>
						    </tr>
						<?php endforeach; ?>
				<?php endif; ?>
				  </tbody>
			</table>
		</div>
