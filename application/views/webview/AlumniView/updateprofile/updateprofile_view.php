<section class="galeryhead2">
  <div class="blogtext wrapper-body text-center">
    <h1>Update Profile</h1>
    <p>Lorem ipsum dolor sit amet, syarat dan ketentuan</p>
    <p>Lorem ipsum dolor sit amet consectetur</p>
  </div>
</section>

<section class="profile">
  <div class="wrapper-body">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="card">
          <div class="row">
            <div class="col-lg-4 col-md-4 profileimg">
              <img src="<?= $avatar ?>" alt="" />
              <button class="btn" id="uploadButton">
                <span><iconify-icon icon="material-symbols:edit"></iconify-icon></span>
              </button>
              <form id="ganti_gambar">
                <input type="file" id="fileInput" name="image_edit" style="display: none;">
              </form>
            </div>

            <div class="col-lg-8 col-md-8 profiledetails">
              <h3 class="nama"><?= $namalengkap ?></h3>
              <div class="desc d-flex align-content-center ml-3">
                <p><?= $nisn ?> |</p>
                <p>Sukoharjo |</p>
                <p><?= $tahunlulus ?></p>
              </div>
              <p class="univ">Universitas Sebelas Maret</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="nav navigations">
            <ul>
              <li>
                <a id="profile-button"><iconify-icon class=" btn profile-button" icon="iconamoon:profile-fill"></iconify-icon>Profile</a>
              </li>
              <li>
                <a id="password-button"><iconify-icon class="btn password-button" icon="solar:lock-password-bold"></iconify-icon>Password</a>
              </li>
              <li>
                <a id="social-button"><iconify-icon class="btn social-button" icon="mingcute:dot-grid-fill"></iconify-icon>Other</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card">
            <div class="col-md-6">
              <p>Lengkapi Profil kamu</p>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $persen ?>%;, color: #9a8743;" aria-valuenow="<?= $persen ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <p class="mt-2">Profile Completion: <?= $persen ?>%</p>
          </div>
        </div>
      </div>

      <div class="identity col-md-6 col-sm-12">
        <div class="profileform">
          <div class="card" id="profile-card">
            <h3 class="text-center">Lihat / Edit Profile</h3>
            <form id="form_update_1" class="form-horizontal">
              <input type="hidden" name="id_update" value="<?= $id ?>">
              <label for="nama">Nama Lengkap </label>
              <div class="form-group">
                <div class="custom-input">
                  <input readonly class="form-control" type="text" placeholder="Nama Lengkap" name="fullname" id="namalengkap" value="<?= $namalengkap ?>" />
                  <i><iconify-icon class="left-icon" icon="tabler:user-edit"></iconify-icon></i>
                  <i onclick="toggleReadonly('namalengkap')"><iconify-icon class="right-icon" icon="material-symbols:edit"></iconify-icon></i>
                </div>
              </div>
              <label for="Tanggal lahir">Tanggal lahir</label>
              <div class="form-group">
                <div class="custom-input">
                  <input class="form-control" value="<?= $tanggallahir ?>" readonly style="background:#F5F5F5 " />
                  <i><iconify-icon class="left-icon" icon="eos-icons:modified-date-outlined"></iconify-icon></i>
                </div>
              </div>
              <label for="NISN">NISN</label>
              <div class="form-group">
                <div class="custom-input">
                  <input style="background:#F5F5F5 " class="form-control" type="text" placeholder="NISN" value="<?= $nisn ?>" readonly />
                  <i><iconify-icon class="left-icon" icon="mdi:id-card"></iconify-icon></i>
                </div>
              </div>
              <div class="social d-flex justify-content-center ml-5">
                <div class="col-md-6">
                  <label for="Tahunlulus">Tahun Lulus</label>
                  <div class="form-group selectgroup">
                    <div class="custom-input">
                      <select class="form-select" id="schoolSelect" name="tahun_lulus">
                        <option class="disabled selected" selected disabled hidden>
                          <?php for ($i = 1990; $i < 2500; $i++) {
                            $aktif = null;
                            if ($i == $tahunlulus) {
                              $aktif = "selected";
                          ?>

                            <?php } ?>
                        <option <?= $aktif ?> class="disabled" value="<?= $i ?>"><?= $i ?></option>

                      <?php } ?>
                      <!-- <script>
                            var startYear = 1990; // Define the start year
                            var currentYear = new Date().getFullYear();
                            for (var i = currentYear; i >= startYear; i--) {
                              document.write('<option value="' + i + '">' + i + '</option>');
                            }
                          </script> -->
                      </select>
                      <i><iconify-icon class="lefts-icon" icon="icon-park-outline:circular-connection"></iconify-icon></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="Sekolah">Sekolah</label>
                  <div class="form-group selectgroup">
                    <div class="custom-input">
                      <select class="form-select" id="schoolSelect" name="school">
                        <option class="disabled selected" selected disabled hidden>
                          <?php foreach ($school as $s) {
                            $aktif = null;
                            if ($s->id == $sekolah) {
                              $aktif = "selected";
                          ?>

                            <?php } ?>
                        <option <?= $aktif ?> class="disabled" value="<?= $s->id ?>"><?= $s->school_name ?></option>

                      <?php } ?>
                      <!-- <script>
                            var startYear = 1990; // Define the start year
                            var currentYear = new Date().getFullYear();
                            for (var i = currentYear; i >= startYear; i--) {
                              document.write('<option value="' + i + '">' + i + '</option>');
                            }
                          </script> -->
                      </select>
                      <i><iconify-icon class="lefts-icon" icon="icon-park-outline:circular-connection"></iconify-icon></i>
                    </div>
                  </div>
                </div>
              </div>
              <label for="schoolSelect">Nama Angkatan</label>
              <div class="form-group selectgroup">
                <div class="custom-input">
                  <input class="form-control" type="tel" placeholder="Nama Angkatan" name="angkatan" id="angkatan" readonly value="<?= $angkatan ?>" />
                  <i onclick="toggleReadonly('angkatan')"><iconify-icon class="right-icon" icon="material-symbols:edit"></iconify-icon></i>

                  <!-- <select
                        class="form-select"
                        id="schoolSelect"
                        name="angkatan"
                      >
                        <option class="selected" selected disabled hidden>
                          CTARSA BAHAGIA
                        </option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select> -->
                  <i><iconify-icon class="left-icon" icon="fluent:people-community-16-regular"></iconify-icon></i>

                </div>
              </div>
              <label for="nama">Email</label>
              <div class="form-group">
                <div class="custom-input">
                  <input readonly class="form-control" type="email" placeholder="Email" name="email" id="email" value="<?= $email ?>" />
                  <i><iconify-icon class="left-icon" icon="ic:outline-email"></iconify-icon></i>
                  <i onclick="toggleReadonly('email')"><iconify-icon class="right-icon" icon="material-symbols:edit"></iconify-icon></i>
                </div>
              </div>
              <label for="nama">Nomor HP / WhatsApp</label>
              <div class="form-group">
                <div class="custom-input">
                  <input readonly class="form-control" type="tel" placeholder="No. HP / WhatsApp" name="notelp" id="nomor" value="<?= $nomor ?>" />
                  <i><iconify-icon class="left-icon" icon="ic:baseline-whatsapp"></iconify-icon></i>
                  <i><iconify-icon onclick="toggleReadonly('nomor')" class="right-icon" icon="material-symbols:edit"></iconify-icon></i>

                </div>
            </form>
          </div>
          <div class="update d-flex justify-content-center">
            <button onclick="update_1()" class="btn btnupdatedata">Update data</button>
          </div>
        </div>
      </div>
      <div class="passwordform">
        <div class="card" id="password-card">
          <h3 class="text-center">Lihat / Edit Password</h3>
          <form action="<?= site_url('updateprofile/ganti_password') ?>" method="post" class="form-horizontal">
            <label for="password">Password</label>
            <div class="form-group">
              <div class="custom-input">
                <input id="password1" class="form-control" type="password" placeholder="Password" name="password1" />
                <i><iconify-icon class="left-icon " icon="solar:password-outline"></iconify-icon></i>
                <i data-toggle-password="password1" class=" right-icon clickable-eye"><iconify-icon icon="gridicons:visible"></iconify-icon></i>
              </div>
            </div>
            <label for="password">Password Baru</label>
            <div class="form-group">
              <div class="custom-input">
                <input id="password2" class="form-control" type="password" placeholder="Password" name="password2" />
                <i><iconify-icon class="left-icon " icon="solar:password-outline"></iconify-icon></i>
                <i data-toggle-password="password2" class=" right-icon clickable-eye"><iconify-icon icon="gridicons:visible"></iconify-icon></i>
              </div>
            </div>
            <label for="password">Konfirmasi Password Baru</label>
            <div class="form-group">
              <div class="custom-input">
                <input id="password3" class="form-control" type="password" placeholder="Password" name="password3" />
                <i><iconify-icon class="left-icon " icon="solar:password-outline"></iconify-icon></i>
                <i data-toggle-password="password3" class=" right-icon clickable-eye"><iconify-icon icon="gridicons:visible"></iconify-icon></i>
              </div>
            </div>
            <div class="update d-flex justify-content-center">
              <button type="submit" class="btn btnupdatedata">Update</button>
            </div>
        </div>
        </form>
      </div>
      <div class="socialform">
        <div class="card" id="social-card">
          <h3 class="text-center">Lihat / Edit Social</h3>
          <form id="update_sosmed" class="form-horizontal">
            <label for="Alamat">Alamat / Domisili</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $alamat ?>" class="form-control" type="text" placeholder="Alamat" name="alamat" id="alamat" />
                <i><iconify-icon class="left-icon" icon="ion:location-outline"></iconify-icon></i>
                <i><iconify-icon onclick="toggleReadonly('alamat')" class="right-icon" icon="material-symbols:edit"></iconify-icon></i>
              </div>
            </div>
            <label for="Alamat">Linkedin</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $linkedin ?>" class="form-control" type="text" placeholder="Linkedin" name="linkedin" id="linkedin" />
                <i><iconify-icon class="left-icon" icon="mdi:linkedin"></iconify-icon></i>
                <i><iconify-icon onclick="toggleReadonly('linkedin')" class="right-icon" icon="material-symbols:edit"></iconify-icon></i>
              </div>
            </div>
            <label for="Alamat">Instagram</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $instagram ?>" class="form-control" type="text" placeholder="Instagram" name="instagram" id="instagram" />
                <i><iconify-icon class="left-icon" icon="mdi:instagram"></iconify-icon></i>
                <i><iconify-icon onclick="toggleReadonly('instagram')" class="right-icon" icon="material-symbols:edit"></iconify-icon></i>
              </div>
            </div>
            <label for="Alamat">Facebook</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $facebook ?>" class="form-control" type="text" placeholder="Facebook" name="facebook" id="facebook"/>
                <i><iconify-icon class="left-icon" icon="ic:outline-facebook"></iconify-icon></i>
                <i><iconify-icon onclick="toggleReadonly('facebook')" class="right-icon" icon="material-symbols:edit"></iconify-icon></i>
              </div>
            </div>
            <label for="Alamat">Tiktok</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $tiktok ?>" class="form-control" type="text" placeholder="Tiktok" name="tiktok" id="tiktok" />
                <i><iconify-icon class="left-icon" icon="ic:baseline-tiktok"></iconify-icon></i>
                <i><iconify-icon onclick="toggleReadonly('tiktok')" class="right-icon" icon="material-symbols:edit"></iconify-icon></i>
              </div>
            </div>
            
            <label for="Alamat">Instansi Saat ini</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $instansi ?>" class="form-control" type="text" placeholder="Instansi Saat ini" name="instansi" id="instansi" />
                <i><iconify-icon class="left-icon" icon="la:university"></iconify-icon></i>
                <i><iconify-icon onclick="toggleReadonly('instansi')" class="right-icon" icon="material-symbols:edit"></iconify-icon></i>
              </div>
            </div>
          </form>
          <div class="update d-flex justify-content-center">
            <button onclick="update_sosmed()" class="btn btnupdatedata">Update Data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>