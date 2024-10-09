<section class="calendar">
  <div id="evoCalendar"></div>
  <div class="logcard">
    <div class="container mt-5">
      <div class="d-flex justify-content-start mx-3 ">
        <p class="log my-2">Keterangan</p>
      </div>

      <hr class="devider">
      <?php
      foreach ($calenderdata as $data) {
      ?>
        <div class="logactivity d-flex mx-3">
          <p class="mx-2"><?= $data->date ?></p>
          <p class="mx-2 ">.</p>
          <p class="mx-2"><?= $data->name ?></p>
        </div>
      <?php
      }
      ?>
      <!-- <div class="logactivity d-flex mx-3">
        <p class="mx-2">12 Desember 2023</p>
        <p class="mx-2 ">.</p>
        <p class="mx-2">Deadline Content Course Lorem Ipsum</p>
      </div>
      <div class="logactivity d-flex mx-3">
        <p class="mx-2">12 Desember 2023</p>
        <p class="mx-2 ">.</p>
        <p class="mx-2">Deadline Content Course Lorem Ipsum</p>
      </div>
      <div class="logactivity d-flex mx-3">
        <p class="mx-2">12 Desember 2023</p>
        <p class="mx-2 ">.</p>
        <p class="mx-2">Deadline Content Course Lorem Ipsum</p>
      </div> -->
    </div>
  </div>
</section>