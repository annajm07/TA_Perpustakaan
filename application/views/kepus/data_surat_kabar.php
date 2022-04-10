<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Surat Kabar</h1>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
          	
          <div class="table-responsive">
          	<table width="100%" class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
              <th scope="col">Gambar</th>
              <th scope="col">Judul Surat Kabar</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Tahun</th>
              <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($buku !== 1): ?>
				  		<?php $i = 1; foreach ($buku as $bk): ?>
				  			<tr>
				  				<th><?= $i++ ?></th>
				  				<td><img style="max-width: 50px;" src="<?= base_url(); ?>assets/img/buku/<?= $bk['gambar']; ?>"></td>
				  				<td><?= $bk['judul_koleksi']; ?></td>
                  <td><?= $bk['penerbit']; ?></td>
                  <td><?= $bk['tahun']; ?></td>
				  				<td>
				  					<a class="btn btn-sm btn-primary mb-1" href="<?= base_url(); ?>kepala_perpustakaan/detail_surat_kabar/<?= $bk['id_koleksi']; ?>"><div style="width: 20px;"><i class="fas fa-search-plus"></i></div></a>
						      		
						      </td>
				  				</td>
				  			</tr>
				  		<?php endforeach; ?>
				  	<?php endif; ?>
				  </tbody>
			</table>
			</div>
			</div>
		</div>
