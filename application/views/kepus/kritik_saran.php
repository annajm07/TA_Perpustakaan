<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kritik dan Saran</h1>
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
				      <th scope="col">Judul</th>
				      <th scope="col">Isi</th>
				      <th scope="col">Tanggal</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if($kritik_saran !== 1): ?>
				  		<?php $i = 1; foreach($kritik_saran as $ks) :?>
				  		<tr>
				  			<th scope="row"><?= $i++ ?></th>
						     <td><?= substr($ks['judul_kritik'], 0,10); ?> <?php if(strlen($ks['judul_kritik'])>10) :?>[...]<?php endif; ?></td>
						     <td><?= substr($ks['isi_kritik'], 0,60); ?> <?php if(strlen($ks['isi_kritik'])>60) :?>[...]<?php endif; ?></td>
						     <td><?= $ks['tanggal']; ?></td>
						     <td>
						      	<a class="btn btn-sm btn-primary mb-1" href="<?= base_url(); ?>kepala_perpustakaan/detail_kritik_saran/<?= $ks['id_kritik']; ?>"><div style="width: 20px;"><i class="fa fa-search-plus"></i></div></a>
						      	<a class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apakah anda yakin ingin menghapus ?');" href="<?= base_url(); ?>kepala_perpustakaan/hapus_kritik_saran/<?= $ks['id_kritik']; ?>"><div style="width: 20px;"><i class="fa fa-trash"></i></div></a>
						     </td>
				  		</tr>
				  	<?php endforeach; ?>
				  	<?php endif; ?>
				  </tbody>
			</table>
			</div>
        </div>

