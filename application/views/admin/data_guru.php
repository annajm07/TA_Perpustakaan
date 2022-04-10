<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Guru</h1>
          </div>
           <div class="row">
              <div class="col-sm-8">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
          <div class="row mb-1">
          		<div class="mx-1">
          			<a href="<?= base_url(); ?>admin/tambah_guru" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
          		</div>
          		<div class="mx-1">
          			<a target="_blank" href="<?= base_url(); ?>admin/cetak_guru" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
          		</div>
          		<div class="mx-1">
          		<a href="<?= base_url(); ?>admin/guru_pdf" class="btn btn-warning"><i class="fa fa-file"></i> Export PDF</a>
          		</div>
          	</div>
          <div class="card-body">
          <div class="table-responsive">
          	<table width="100%" class="table" id="table_keren">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nip</th>
				      <th scope="col">Nama guru</th>
				      <th scope="col">Email</th>
				      <th scope="col">Aksi</th>
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
						      <td>
						      	<a class="btn btn-sm btn-primary mb-1" href="<?= base_url(); ?>admin/detail_guru/<?= $gr['id_anggota']; ?>"><div style="width: 20px;"><i class="fas fa-search-plus"></i></div></a>
						      	<a class="btn btn-sm btn-success mb-1" href="<?= base_url(); ?>admin/edit_guru/<?= $gr['id_anggota']; ?>"><div style="width: 20px;"><i class="fa fa-edit"></i></div></a>
						      	<a class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apakah anda yakin ingin menghapus ?');" href="<?= base_url(); ?>admin/hapus_guru/<?= $gr['id_anggota']; ?>"><div style="width: 20px;"><i class="fa fa-trash"></i></div></a>
						      </td>
						    </tr>
						<?php endforeach; ?>
				<?php endif; ?>
				  </tbody>
			</table>
			</div>
			</div>
		</div>
