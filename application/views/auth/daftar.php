
  <div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar</h1>
              </div>
              <?=$this->session->flashdata('pesan'); ?>
              <form class="user" method="post" action="<?= base_url(); ?>auth/daftar">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama lengkap" value="<?= set_value('nama'); ?>">
                  <?=form_error('nama','<small class="text-danger ml-3">',' </small>'); ?>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-user" name="nis" placeholder="Nomor induk siswa" value="<?= set_value('nis'); ?>">
                  <?=form_error('nis','<small class="text-danger ml-3">',' </small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user"  name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                  <?=form_error('email','<small class="text-danger ml-3">',' </small>'); ?>
                </div>
                 <div class="form-group row">
                   <div class="col-sm-4 mb-3 mb-sm-0">
                    <select style=" border-radius: 10rem; font-size: 0.8rem;" class="form-control " name="jenis_kelamin">
                      <option class="hidden text-center" selected disabled>Jenis Kelamin</option>
                      <option>Laki-Laki</option>
                      <option>Perempuan</option>
                    </select>
                    <?=form_error('jenis_kelamin','<small class="text-danger ml-3">',' </small>'); ?>
                  </div>
                  <div class="col-sm-4">
                    <select style=" border-radius: 10rem; font-size: 0.8rem;" class="form-control " name="kelas">
                      <option class="hidden text-center" selected disabled>Kelas</option>
                      <option>X-EI</option>
                      <option>X-TM-1</option>
                      <option>X-TM-2</option>
                      <option>X-TM-3</option>
                      <option>XI-EI</option>
                      <option>XI-TM-1</option>
                      <option>XI-TM-2</option>
                      <option>XI-TM-3</option>
                      <option>XII-EI</option>
                      <option>XII-TM-1</option>
                      <option>XII-TM-2</option>
                      <option>XII-TM-3</option>
                    </select>
                     <?=form_error('kelas','<small class="text-danger ml-3">',' </small>'); ?>
                  </div>
                  <div class="col-sm-4">
                    <select style=" border-radius: 10rem; font-size: 0.8rem;" class="form-control " name="jurusan">
                      <option class="hidden text-center" selected disabled>Jurusan</option>
                      <option>Elektronika Industri</option>
                      <option>Teknik Mesin</option>
                    </select>
                     <?=form_error('jurusan','<small class="text-danger ml-3">',' </small>'); ?>
                  </div>
               </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user"  name="password1" placeholder="Kata Sandi">
                    <?=form_error('password1','<small class="text-danger ml-3">',' </small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user"  name="konfirmasi" placeholder="Konfirmasi Kata Sandi">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">
                  Daftar
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/forgot_password'); ?>">Lupa Kata Sandi?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=base_url('auth') ?>">Sudah Punya Akun? Masuk!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
