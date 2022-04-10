<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Donasi</h1>
          </div>
          <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
          </div>
          	
          <div class="table-responsive">
          	<table class="table" id="table_keren">
				  <thead class="thead-dark">
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
			<div style="font-size: 15px;" class="badge badge-success">TOTAL: Rp.<?= number_format($jumlah_donasi['jumlah']); ?></div>
			</div>
        </div>