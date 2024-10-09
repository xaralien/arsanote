<section class="login d-flex align-items-center">
      <div class="wrapper-body">
        <div class="container loginbg">
          <div class="card login-card">
            <div class="col-md-12 d-flex align-items-center">
              <div class="card-body mt-7">
                <div class="col-md-12 col-sm-12">
                  <h3>Masuk Ke Akun</h3>
                  <p class="login-card-description">
                    Lihat contoh penulisan yang tepat serta syarat dan ketentuan
                    <a href="">di sini</a>
                  </p>
                  <form action="<?= site_url('user/Login') ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i ><iconify-icon icon="ic:outline-email"></iconify-icon></i>
                          </span>
                        </div>
                        <input
                          class="form-control"
                          type="text"
                          placeholder="Email/NISN"
                          name="username"
                        />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i ><iconify-icon icon="solar:password-linear"></iconify-icon></i>
                          </span>
                        </div>
                        <input
                          class="form-control"
                          type="password"
                          placeholder="Password"
                          name="password"
                        />
                      </div>
                    </div>
                
                  <div class="remember d-flex justify-content-between mt-9">
                    <div class="ceklis form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value="1"
                        id="remember_me" 
                        name="remember_me" 
                      />
                      <label class="rememberme" for="remember_me" style="font-size: 13px;">
                        Remember Me
                      </label>
                    </div>
                    <a href="<?php echo base_url('user/resetpassword') ?>" class="text-resets1" style="font-size: 13px;">Lupa pasword</a>
                  </div>
                  <div class="masuk  d-md-flex  d-block justify-content-center">
                    <button type="submit" class="btn loginbtn2">Masuk</button>
                    <div class=" masuk2 d-flex justify-content-center">
                    <p class="login-card-footer-text">
                      Belum punya akun?
                    </p>
                    <a href="<?= site_url('user/signup') ?>" class="text-resets">Daftar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      </form>
    </section>