<main class="signup d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="wrapper-body">
    <div class="container signupbg">
      <div class="card signup-card">
        <div class="col-md-12 d-flex align-items-center">
          <div class="card-body mt-7">
            <div class="col-md-12 col-sm-12">
              <h3>Daftar Akun Alumni</h3>
              <p class="signup-card-description">
                Lihat contoh penulisan yang tepat serta syarat dan ketentuan
                <a href="">di sini</a>
              </p>
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <form class="form-horizontal" id="formregis">
                    <div class="form-group">
                      <div class="custom-input">
                        <input class="form-control" type="text" placeholder="Email" name="email" />
                        <i><iconify-icon class="lefts-icon" icon="ic:outline-email"></iconify-icon></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-input">
                        <input class="form-control" type="namalengkap" placeholder="Nama Lengkap" name="namalengkap" />
                        <i><iconify-icon class="lefts-icon" icon="tabler:user-edit"></iconify-icon></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-input">
                        <input class="form-control" type="char" placeholder="NISN" name="nisn" />
                        <i><iconify-icon class="lefts-icon" icon="mdi:id-card"></iconify-icon></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-input">
                        <input class="form-control" type="password" placeholder="Password" name="password" />
                        <i><iconify-icon class="lefts-icon" icon="solar:password-linear"></iconify-icon></i>
                      </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-offset-2 col-sm-8">
                  <div class="form-group selectgroup">
                    <div class="custom-input">
                      <select class="form-select" id="schoolSelect" name="socialmedia">
                        <option class="disabled selected" selected disabled hidden>
                          Tahun lulus
                          <script>
                            var startYear = 1990; // Define the start year
                            var currentYear = new Date().getFullYear();
                            for (var i = currentYear; i >= startYear; i--) {
                              document.write('<option value="' + i + '">' + i + '</option>');
                            }
                          </script>
                      </select>
                      <i><iconify-icon class="lefts-icon" icon="icon-park-outline:circular-connection"></iconify-icon></i>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-group selectgroup">
                      <div class="custom-input">
                        <select class="form-select" id="schoolSelect" name="sekolah">
                          <option class="selected" selected disabled hidden>
                            Sekolah
                          </option>
                          <?php
                          foreach ($sekolah as $s) {
                          ?>
                            <option value="<?= $s->id ?>"><?= $s->school_name ?></option>
                          <?php  } ?>

                        </select>
                        <i><iconify-icon class="lefts-icon" icon="la:university"></iconify-icon></i>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-input">
                      <input class="form-control" type="date" name="tanggallahir" placeholder="Tanggal Lahir" />
                      <i><iconify-icon class="lefts-icon" icon="eos-icons:modified-date-outlined"></iconify-icon></i>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-input">
                      <input class="form-control" type="number" maxlength="15" min="0" step="1" placeholder="No. HP / WhatsApp" name="nomor" />
                      <i><iconify-icon class="lefts-icon" icon="ic:baseline-whatsapp"></iconify-icon></i>
                    </div>
                    </form>
                  </div>
                </div>
                <div class="masuk d-lg-flex d-block justify-content-lg-start justify-content-center">
                  <button onclick="regis()" class="btn signupbtn2">Daftar</button>
                  <p class="signup-card-footer-text d-flex d-lg-inline d-md-inline justify-content-center align-items-center">
                    Sudah punya akun?
                    <a href="<?= site_url('user/login') ?>" class="text-resetss d-lg-inline d-md-inline d-flex align-items-center">Login</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>