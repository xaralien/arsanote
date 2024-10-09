<section class="loginview">
  <div class="container my-5 ">
    <div class="heading p-5">
      <h1 class="d-flex justify-content-center text-dark">Masuk ke Akun</h1>
      <p class="d-flex justify-content-center text-dark">Masuk ke akun Anda dan jelajahi Arsanote!</p>
    </div>

    <form action="<?= site_url('autentic/proses_login') ?>" method="post">
      <div class="heads d-flex justify-content-center align-items-center my-4">
        <img src="<?php echo base_url(); ?>assets/image/email.svg" alt="" class="eml">
        <!-- <input type="text" class="form-control" placeholder="Email"> -->
        <select name="email" id="email">
          <option disabled selected>Pilih Divisi</option>
          <?php
          foreach ($user as $u) {
          ?>
            <option value="<?= $u->email ?>"><?= $u->division ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="heads d-flex justify-content-center align-items-center my-4">
        <img src="<?php echo base_url(); ?>assets/image/psw.svg" alt="" class="psw">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="primarys  d-flex justify-content-center align-items-center my-4">
        <button class="btn btn-primarys ">Masuk</button>
      </div>
    </form>
  </div>
</section>