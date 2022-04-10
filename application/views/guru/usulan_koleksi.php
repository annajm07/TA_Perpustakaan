<div class="container mt-3">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Usulan Koleksi</h1>
     </div>

	<div class="row ml-5">
		<a class="btn btn-primary ml-1" href="<?= base_url(); ?>guru/usulan_koleksi">Buku</a>
		<a class="btn btn-primary ml-1" href="<?= base_url(); ?>guru/usulan_jurnal">Jurnal</a>
		<a class="btn btn-primary ml-1" href="<?= base_url(); ?>guru/usulan_majalah">Majalah</a>
		<a class="btn btn-primary ml-1" href="<?= base_url(); ?>guru/usulan_surat_kabar">Surat Kabar</a>
	</div>

	<div class="row mt-3 mb-3">
		<div class="col-sm-7 m-auto mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                	<div class="row ">
		              <div class="col-sm-8 m-auto">
		                <?= $this->session->flashdata('pesan'); ?>
		              </div>
	            </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-center text-lg font-weight-bold text-primary text-uppercase mb-1">Usulan Buku</div>
                      <?php echo form_open_multipart('guru/usulan_koleksi');?>
                      <div class="form-group">
						    <label for="exampleInputEmail1">Judul Buku</label>
						    <input  type="text" class="form-control" name="judul">
						    <?=form_error('judul','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">ISBN</label>
						    <input  type="text" class="form-control" name="isbn">
						    <?=form_error('isbn','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Jumlah Buku</label>
						    <input  type="text" class="form-control" name="jumlah">
						    <?=form_error('jumlah','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Pengarang</label>
						    <input type="text" class="form-control" name="pengarang">
						    <?=form_error('pengarang','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Penerbit</label>
						    <input type="text" class="form-control" name="penerbit">
						    <?=form_error('penerbit','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Tahun</label>
						    <input type="text" class="form-control" name="tahun">
						    <?=form_error('tahun','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
						    <label for="exampleInputEmail1">Jumlah Halaman</label>
						    <input type="text" class="form-control" name="jumlah_halaman">
						    <?=form_error('jumlah_halaman','<small class="text-danger ml-3">',' </small>'); ?>
					   </div>
					   <div class="form-group">
					        <label for="klasifikasi">Kategori</label>
					        <select class="form-control" id="kategori" name="kategori">
					          <option>Umum</option>
					          <option>Filsafat dan Psikologi</option>
					          <option>Agama</option>
					          <option>Sosial</option>
					          <option>Bahasa</option>
					          <option>Sains dan Matematika</option>
					          <option>Teknologi</option>
					          <option>Seni dan Rekreasi</option>
					          <option>Literatur dan Sastra</option>
					          <option>Sejarah dan Biografi</option>
					          <option>Lainnya</option>
					        </select>
					     </div>
					     <div class="form-group">
					        <label for="klasifikasi">Klasifikasi</label>
					        <select class="form-control" id="klasifikasi" name="klasifikasi">
					          <option>Kelas 1</option>
					          <option>Kelas 2</option>
					          <option>Kelas 3</option>
					          <option>Lainnya</option>
					        </select>
					     <input class="mt-3" type="file" id="gambar" name="gambar">
        				 <small>max size 1 MB</small>
					     </div>

					   <button class="btn btn-success float-right"><i class="fas fa-paper-plane"></i> Kirim</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
	</div>




</div>