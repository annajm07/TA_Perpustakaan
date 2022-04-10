<!-- Begin Page Content -->
        <div class="container-fluid mb-3">

          <div class="card-body col-sm-11 bg-light mt-5 mx-auto card">
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
		              <th scope="col">Gambar</th>
		              <th scope="col">Judul</th>
		              <th scope="col">Jumlah</th>
                  	  <th scope="col">Tersedia</th>
		              <th scope="col">Kategori</th>
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
				                <td><?= $bk['jumlah_koleksi']; ?></td>
				                <td><?= $bk['tersedia']; ?></td>
				                <td><?= $bk['kategori']; ?></td>
				                <td><?= $bk['tahun']; ?></td>
				  				<td>
				  					<a class="btn btn-sm btn-primary mb-1" href="<?= base_url(); ?>Auth/detail_buku/<?= $bk['id_koleksi']; ?>"><div><i class="fas fa-search-plus"></i> Detail</div></a>
		
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
