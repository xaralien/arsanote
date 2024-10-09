<section class="emailnotif">
      <div class="notifhead">
        <div class="col-md-12 d-flex justify-content-center">
          <div class="card d-flex align-items-center mt-3">
            <h2>Halo</h2>
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/image/6310507.jpg" width="200" height="200" />
            <p class="mt-3">Silahkan Masukkan Email anda</p>
            <form action="<?= site_url('autentic/resetpassword') ?>" method="post">
            <div class="form-group">
                      <div class="custom-input">
                        <input class="form-control" type="text" placeholder="Email" name="email" />
                        <i><iconify-icon class="leftss-icon" icon="ic:outline-email"></iconify-icon></i>
                      </div>
                    </div>

            <button  type="submit" class="btn btnemailnotif">Reset Password</button>
          </div>
        </div>
        <div class="col-md-12 d-flex justify-content-center mt-3">
          <div class="card brader2 d-flex align-items-center">
            <p>Butuh bantuan lebih lanjut?</p>
            <a href="">Hubungi admin</a>
          </div>
        </div>
      </div>
      </form>
    </section>