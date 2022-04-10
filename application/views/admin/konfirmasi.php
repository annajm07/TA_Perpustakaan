<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Pengguna</h1>
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
				      <th scope="col">Nis</th>
				      <th scope="col">Nama Siswa</th>
				      <th scope="col">Kelas</th>
				      <th scope="col">Email</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if($konfirmasi !== 1) : ?>
						  	<?php $i = 1; foreach ($konfirmasi as $kf): ?>
							    <tr>
							      <th scope="row"><?= $i++ ?></th>
							      <td><?= $kf['nis/nip']; ?></td>
							      <td><?= $kf['nama_anggota']; ?></td>
							      <td><?= $kf['kelas']; ?></td>
							      <td><?= $kf['email']; ?></td>
							      <td>
							      	<a class="btn btn-sm btn-success mb-1 mx-1" href="<?= base_url(); ?>admin/konfirmasi/<?=$kf['id_anggota']; ?>"><div style="width: 70px;"><i class="far fa-check-circle"></i> Konfirm</div></a>
							      	<a class="btn btn-sm btn-danger mb-1 mx-1" href="<?=base_url();?>admin/hapus_siswa/<?=$kf['id_anggota']; ?>"><div style="width: 70px;"><i class="fa fa-trash"></i> Hapus</div></a>
							      </td>
							    </tr>
						    <?php endforeach; ?>
					<?php endif; ?>
				  </tbody>
			</table>
			</div>

        </div>
