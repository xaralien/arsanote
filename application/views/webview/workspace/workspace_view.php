<section class="wrapper workspace">
  <div class="container">
    <div class=" d-flex justify-content-between">
      <div class="drop  d-flex align-content-center">
        <p class="drop my-2">Urutkan : </p>
        <div class="dropdown ">
          <a class="btn dropnew dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Terbaru
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
      </div>


      <div class="buttonworkspace">
        <div class="dropdown">
          <button class="btn btn-work  " onclick="toggleDropdown(event)">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
              <path d="M12.5 17.5H15M15 17.5H17.5M15 17.5V20M15 17.5V15" stroke="white" stroke-width="3" stroke-linecap="round" />
              <path d="M27.5 14.7474C27.5 11.4569 27.5 9.81169 26.5381 8.74229C26.4497 8.64392 26.3561 8.5503 26.2577 8.46182C25.1882 7.5 23.5431 7.5 20.2526 7.5H19.7855C18.3434 7.5 17.6224 7.5 16.9505 7.30847C16.5814 7.20325 16.2255 7.05589 15.8901 6.86929C15.2796 6.52959 14.7697 6.01972 13.75 5L13.0621 4.31219C12.7204 3.97041 12.5495 3.79951 12.3699 3.65064C11.5956 3.0088 10.6458 2.61536 9.64446 2.52172C9.4122 2.5 9.17052 2.5 8.68719 2.5C7.58402 2.5 7.03244 2.5 6.57299 2.58669C4.55039 2.9683 2.9683 4.55039 2.58669 6.57299C2.5 7.03244 2.5 7.58402 2.5 8.68719M27.4891 20C27.4442 23.0995 27.2144 24.8566 26.0355 26.0355C24.5711 27.5 22.214 27.5 17.5 27.5H12.5C7.78595 27.5 5.42894 27.5 3.96446 26.0355C2.5 24.5711 2.5 22.214 2.5 17.5V13.75" stroke="white" stroke-width="3" stroke-linecap="round" />
            </svg>
            Create New Workspace</button>
          <div class="dropdown-contents dropcard">
            <!-- Your dropdown menu items go here -->
            <div class="card p-5">
              <form id="add_workspace">
                <h3>New Workspace</h3>
                <hr class="sidebar-dividere">
                <label for="">Background</label>
                <div class="labeling justify-content-center align-items-center my-2">
                  <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
                </div>

                <div class="titles my-4">
                  <label for="">Title</label>
                  <input type="text" name="labelwork" id="labelwork" class="labelwork my-0 mx-2" />
                </div>
                <div class="division my-3">
                  <label for="" class=" mx-2 my-0">Role and Collab</label>
                  <div class="divisions  mx-2 p-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        SEKRE
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        PIJAR
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        MEDIA
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        LITERASI
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        MARCOM
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        IT
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        SUPPORT
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        SPONSOR
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        KOMUNITAS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        LAINNYA
                      </label>
                    </div>
                  </div>
                </div>
              </form>
              <div class="buttonadd d-flex justify-content-center my-2">
                <button onclick="addWorkspace()" class="btn btncreate px-5">Create</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="allworkspace">
    <div class="row mt-5 mx-4">

      <?php
      foreach ($allworkspace as $w) {
      ?>
        <div class="col-sm-4">
          <div class="card">
            <div class="button3">
              <button class="btn btn-3" onclick="toggleDropdown1('<?= $w->id ?>')">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 36 36" fill="none">
                  <path d="M27.9117 20.8009C27.5438 20.801 27.1795 20.7287 26.8395 20.588C26.4995 20.4473 26.1906 20.241 25.9304 19.9809C25.6701 19.7209 25.4636 19.4121 25.3227 19.0722C25.1818 18.7323 25.1092 18.368 25.1091 18.0001C25.109 17.6322 25.1814 17.2678 25.3221 16.9279C25.4627 16.5879 25.669 16.279 25.9291 16.0187C26.1892 15.7585 26.498 15.552 26.8378 15.4111C27.1777 15.2702 27.542 15.1976 27.9099 15.1975C28.653 15.1973 29.3657 15.4922 29.8913 16.0175C30.4169 16.5427 30.7123 17.2553 30.7125 17.9983C30.7128 18.7414 30.4178 19.4541 29.8926 19.9797C29.3673 20.5053 28.6548 20.8007 27.9117 20.8009Z" fill="black" fill-opacity="0.8" />
                  <path d="M18.2962 20.8008C19.843 20.8008 21.097 19.5469 21.097 18C21.097 16.4532 19.843 15.1992 18.2962 15.1992C16.7493 15.1992 15.4954 16.4532 15.4954 18C15.4954 19.5469 16.7493 20.8008 18.2962 20.8008Z" fill="black" fill-opacity="0.8" />
                  <path d="M8.67873 20.8003C10.2256 20.8003 11.4795 19.5464 11.4795 17.9995C11.4795 16.4527 10.2256 15.1987 8.67873 15.1987C7.13189 15.1987 5.87793 16.4527 5.87793 17.9995C5.87793 19.5464 7.13189 20.8003 8.67873 20.8003Z" fill="black" fill-opacity="0.8" />
                </svg>
              </button>
              <div id="dropdown-contents<?= $w->id ?>" class="dropdown-contents9 dropcard">
                <!-- Your dropdown menu items go here -->
                <div class="card p-5">
                  <form id="edit_workspace_<?= $w->id ?>">
                    <h3>Edit Workspace</h3>
                    <hr class="sidebar-dividere">
                    <label for="">Background</label>
                    <div class="labeling justify-content-center align-items-center my-2">
                      <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
                    </div>

                    <div class="titles my-4">
                      <label for="">Title</label>
                      <input type="text" name="labelwork" id="labelwork" class="labelwork my-0 mx-2" value="<?= $w->title ?>" />
                    </div>
                  </form>
                  <div class="buttonadd d-flex justify-content-center my-2">
                    <button onclick="editworkspace(<?= $w->id ?>)" class="btn btncreate px-5">Update Workspace</button>
                    <button onclick="confirmDelete('<?= base_url('workspace/delete/' . $w->id) ?>')" class="btn btncreate px-5">Delete Workspace</button>

                  </div>
                </div>
              </div>
            </div>
            <a href="<?= base_url('board/allboard/' . $w->id) ?>">
              <img src="<?= base_url('upload/workspace/' . $w->thumbnail) ?>" class="card-img-top img-fluid" alt="...">
              <div class="justify-content-start p-2">
                <p class="my-0"><?= $w->title ?></p>
              </div>
            </a>
          </div>
        </div>
      <?php
      }
      ?>

      <!-- <div class="col-sm-4">
        <div class="card">
          <img src="<?php echo base_url() ?>assets/image/tabs-1.jpg" class="card-img-top img-fluid" alt="...">
          <div class="justify-content-start p-2">
            <p class="my-0">Workspace name</p>
            <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus tincidunt sa...</p>
          </div>
        </div>
      </div> -->
    </div>
  </div>


</section>