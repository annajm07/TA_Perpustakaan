        <div class="container-fluid" style="color: black !important;">
        	<h3 class="text-center">Daftar Siswa</h3>
          	<table class="table table-bordered" style="font-size: 12px !important;">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nis</th>
				      <th scope="col">Nama Siswa</th>
				      <th scope="col">Kelas</th>
				      <th scope="col">Email</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($siswa !== 1) : ?>
						  	<?php $i = 1; foreach ($siswa as $sw): ?>
						    <tr>
						      <th scope="row"><?= $i++ ?></th>
						      <td><?= $sw['nis/nip']; ?></td>
						      <td><?= $sw['nama_anggota']; ?></td>
						      <td><?= $sw['kelas']; ?></td>
						      <td><?= $sw['email']; ?></td>
						    </tr>
						<?php endforeach; ?>
					<?php endif; ?>
				  </tbody>
			</table>
        </div>
