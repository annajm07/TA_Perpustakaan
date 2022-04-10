<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
          </div>
          <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
          <div class="row mb-2">
          		<div class="mx-1">
          			<a href="<?= base_url(); ?>admin/tambah_petugas" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
          		</div>
          		<div class="mx-1">
          			<a target="_blank" href="<?= base_url(); ?>admin/cetak_petugas" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
          		</div>
          		<div class="mx-1">
          		<a href="<?= base_url(); ?>admin/petugas_pdf" class="btn btn-warning"><i class="fa fa-file"></i> Export PDF</a>
          		</div>
          	</div>
          <div class="table-responsive">
          	<table class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Email</th>
				      <th scope="col">Role</th>
				      <th scope="col">Aksi</th>
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
						      <td>
						      	<a class="btn btn-sm btn-primary mb-1" href="<?= base_url(); ?>admin/detail_petugas/<?= $pts['id_petugas']; ?>"><div style="width: 20px;"><i class="fas fa-search-plus"></i></div></a>
						      	<a class="btn btn-sm btn-success mb-1" href="<?= base_url(); ?>admin/edit_petugas/<?= $pts['id_petugas']; ?>"><div style="width: 20px;"><i class="fa fa-edit"></i></div></a>
						      	<a class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apakah anda yakin ingin menghapus ?');" href="<?= base_url(); ?>admin/hapus_petugas/<?= $pts['id_petugas']; ?>"><div style="width: 20px;"><i class="fa fa-trash"></i></div></a>
						      </td>
						    </tr>
						<?php endforeach; ?>
				<?php endif; ?>
				  </tbody>
			</table>
			</div>
        </div>


