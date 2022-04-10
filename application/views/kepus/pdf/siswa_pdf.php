        <div class="container-fluid" style="color: black !important;">
			<div class="row justify-content-center">
	        	<div>
					<img src="<?= base_url(); ?>assets/img/smk.png" width="150">
				</div>
				<div class="text-center">
					<font size="6">PEMERINTAHAN DAERAH PROVINSI SUMATERA BARAT</font><br>
					<font size="6"><b>SMK SEMEN PADANG</b></font><br>
					<font size="4">Akreditasi "B"</font><br>
					<font size="3">Indarung, Lubuk Kilangan, Kota Padang, Sumatera Barat, Telp. (0751) 202500</font><br>
					<font size="3"><i>Website :http://smksemenpadang.com, email : smksemen@gmail.com</i></font>
				</div>
			</div>
		<hr align="center" width="90%" style="height: 3px !important;" color="black">
        	<h4 class="text-center">Daftar Siswa</h4>
          	<table class="table table-bordered"  style="color: black !important;">
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

			<div class="row float-right mt-5">
				<div class="mr-3">
				<font size="3"><b>Kepala Perpustakaan</b></font><br><br><br>
				<font size="2">Lili Gustina Syam</font><br>
				</div>
			</div>
        </div>
        <script>window.print();</script>
