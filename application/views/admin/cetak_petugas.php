<div class="container-fluid">
		<h3 class="text-center">Daftar Petugas</h3>
		<table class="table table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Email</th>
				      <th scope="col">Role</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if($petugas !== 1): ?>
						  	<?php $i = 1; foreach ($petugas as $pts): ?>
						    <tr>
						      <th scope="row"><?= $i++ ?></th>
						      <td><?= $pts['nama_petugas']; ?></td>
						      <td><?= $pts['email']; ?></td>
						      <td><?= $pts['role']; ?></td>
						    </tr>
						<?php endforeach; ?>
				<?php endif; ?>
				  </tbody>
			</table>
	</div>
	<script>window.print();</script>


