<section class="wrapper boards">
  <div class="container my-4 ms-3">
    <div class=" d-flex justify-content-start">
      <div class="buttonworkspace">
        <button class="btn btn-board px-5" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
          <i class="bi bi-sort-down"></i>
          Sorting List</button>
      </div>
    </div>
  </div>
  <ul class="column__list my-2">
    <?php foreach ($list as $l) { ?>
      <li class="card column__item">
        <div class="d-flex justify-content-between">
          <div class="column__title--wrapper">

            <h2><?= $l->name ?></h2>
            <i class="fas fa-ellipsis-h"></i>
          </div>
          <div class="button3">
            <div class="dropdown">
              <button class="btn">
                <i class="bi bi-three-dots"></i>
              </button>
              <div class="dropdown-content">
                <!-- Your dropdown menu items go here -->
                <a onclick="DeleteList(<?= $l->id ?>)">Delete</a>
                <!-- <a href="#">Item 2</a>
                <a href="#">Item 3</a> -->
              </div>
            </div>
          </div>
        </div>
        <ul class="card__list">
          <?php
          $this->db->select('*');
          $this->db->from('card');
          $this->db->where('is_active', 1);
          $this->db->where('id_list', $l->id);
          $card = $this->db->get()->result();

          foreach ($card as $c) {
          ?>
            <li class="card__item" type="button" data-bs-toggle="modal" onclick="onEdit(<?= $c->id ?>)" data-bs-target="#editmodal">
              <?php
              $this->db->select('*');
              $this->db->from('label');
              $this->db->where('is_active', 1);
              $this->db->where('id_card', $c->id);
              $label = $this->db->get()->result();

              foreach ($label as $label) {

              ?>
                <span style="background-color: <?= $label->color ?>;" class="card__tag card__tag--browser"><?= $label->name ?></span>
              <?php } ?>
              <p class="card__title"><?= $c->name ?></p>
              <?php
              $this->db->select('*');
              $this->db->from('checklist');
              $this->db->where('is_active', 1);
              $this->db->where('status', 1);
              $this->db->where('id_card', $c->id);
              $checklist_done = $this->db->get()->result();
              $checklist_done = count($checklist_done);

              $this->db->select('*');
              $this->db->from('checklist');
              $this->db->where('is_active', 1);
              $this->db->where('id_card', $c->id);
              $checklist_all = $this->db->get()->result();
              $checklist_all = count($checklist_all);

              if ($checklist_all != 0) {
              ?>
                <p class="card__title">Checklist <?= $checklist_done . '/' . $checklist_all ?> </p>
              <?php
              }
              ?>
            </li>
          <?php
          }
          ?>
        </ul>
        <div hidden id="form_add_card_<?= $l->id ?>">
          <form id="add_card_<?= $l->id ?>">
            <textarea class="form-control mb-2" name="text_add_card_<?= $l->id ?>" id="text_add_card_<?= $l->id ?>" cols="4" rows="2"></textarea>
          </form>
          <button class="btn " onclick="saveCard(<?= $l->id ?>)">Save</button>
          <button class="btn " onclick="cancelFormCard(<?= $l->id ?>)">Cancel</button>
        </div>
        <div id="button_add_card_<?= $l->id ?>" class="column__item--cta">
          <i class="fas fa-plus"></i>
          <button onclick="toggleFormCard(<?= $l->id ?>)" class="btn btnaddcard">
            <i class="bi bi-plus-lg"></i> Add another card
          </button>
        </div>
      </li>
    <?php } ?>
    <li class="card column__item">
      <div hidden id="form_add_list">
        <form id="add_list">
          <textarea class="form-control mb-2" id="text_add_list" name="list_name" cols="4" rows="2"></textarea>
        </form>
        <?php
        $uri = $this->uri->segment(4);
        ?>
        <button class="btn" onclick="saveList(<?= $uri; ?>)">Save</button>
        <button class="btn" onclick="cancelForm()">Cancel</button>
      </div>
      <div id="button_add_list" class="column__item--cta">
        <i class="fas fa-plus"></i>
        <button onclick="toggleForm()" class="btn btnaddlist">
          <i class="bi bi-plus-lg"></i>Add another list
        </button>
      </div>
    </li>
  </ul>
</section>

<!-- Modal Position List -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sort</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1 style="text-align:center;">Sorting Your List</h1>
        <form id="position">
          <div id="box" class="box">
            <?php foreach ($list as $l) { ?>
              <div class="item" data-id="<?= $l->id ?>" draggable="true"><?= $l->name ?></div>
            <?php
            }
            ?>
            <div class="item"></div>
          </div>
        </form>
        <div id="itemClip" class="item itemClip hide">some item</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btnsave" data-bs-dismiss="modal">Close</button>
        <button onclick="savePositions()" type="button" class="btn btncancel">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal donation -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="row">
        <div class="col-md-7">
          <div class="card-contentleft my-5 mx-4">
            <form id="detailcard_form">
              <input type="hidden" id="id_detail" name="id_detail">
              <div class="cardtit  ">
                <label for="card-tit">Card Title</label>
                <input type="text" name="name" class="form-control" id="card_title" placeholder="Title">
              </div>
              <div class="carddesc my-5">
                <label for="card-desc">Description</label>
                <textarea class="form-control" name="card_desc" id="card_desc" cols="30" rows="4" placeholder="Write your message" type="text" style="height: 200px;"></textarea>
              </div>
              <div class="carddate my-5">
                <label for="card-desc">Due date</label>
                <input type="date" name="date" class="form-control" id="card_date" placeholder="Date">
              </div>
            </form>
            <div class="carddate my-5">
              <button onclick="saveDetail()" class="btn btndate px-4 mt-5">
                Save Change
              </button>
            </div>
            <hr class="sidebar-dividers my-2 mx-0" />
            <div class="checklist">
              <label for="check">Checklist</label>
              <div class="progress">
                <div id="persen_checklist" class="progress-bar" role="progressbar" style="width: 0%; color: #9a8743;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="prof">
                <p id="label_persen_checklist" class="mt-2"></p>
              </div>
              <div id="checklist_list">
                <!-- <div class="barcheck d-flex justify-content-center align-items-center my-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>
                <div class="inputcheck">
                  <input type="text" class="form-control" placeholder="Email">
                  <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="editpen ms-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                    <path d="M13.3782 5.07534L9.89 1.62329L11.039 0.472603C11.3537 0.157534 11.7402 0 12.1988 0C12.6573 0 13.0436 0.157534 13.3577 0.472603L14.5067 1.62329C14.8213 1.93836 14.9855 2.31863 14.9991 2.76411C15.0128 3.20959 14.8624 3.58959 14.5477 3.90411L13.3782 5.07534ZM12.1881 6.28767L3.48817 15H0V11.5068L8.69991 2.79452L12.1881 6.28767Z" fill="black" fill-opacity="0.8" />
                  </svg>
                </div>
                </div> -->
                <!-- <div class="barcheck d-flex justify-content-center align-items-center ms-4 my-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  </div>
                  <div class="inputcheck">
                    <input type="text" class="form-control" placeholder="Email">
                    <input type="text" class="form-control" placeholder="Email">
                  </div>
                  <a href="tes">
                    <div class="editpen ms-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                        <path d="M13.3782 5.07534L9.89 1.62329L11.039 0.472603C11.3537 0.157534 11.7402 0 12.1988 0C12.6573 0 13.0436 0.157534 13.3577 0.472603L14.5067 1.62329C14.8213 1.93836 14.9855 2.31863 14.9991 2.76411C15.0128 3.20959 14.8624 3.58959 14.5477 3.90411L13.3782 5.07534ZM12.1881 6.28767L3.48817 15H0V11.5068L8.69991 2.79452L12.1881 6.28767Z" fill="black" fill-opacity="0.8" />
                      </svg>
                    </div>
                  </a>
                </div> -->
              </div>
              <hr class="sidebar-dividers mt-5 mx-0" />
              <div class="activity my-5">
                <div id="activity_list">
                  <div class="cardavt" style="margin-bottom: -20px;">
                    <div class="inputs">
                      <label for="card-desc"><b>Card Activity</b></label>
                    </div>
                  </div>
                  <!-- <div class="cardavt">
                    <div class="tags ">
                      <p class="d-flex justify-content-center">A</p>
                    </div>
                    <div class="inputs">
                      <div class="profile d-flex">
                        <p>Adib dwi Kusuma</p>
                        <p class="mx-3">3 second ago</p>
                      </div>
                      <input type="text" class="form-control" placeholder="Email" readonly>
                      <div class="sunting mx-3 my-2">
                        <a href="">Edit</a>
                        <a href="" class="mx-3">Delete</a>
                      </div>
                    </div>
                  </div> -->
                </div>
                <div class="cardavt mt-5">
                  <form id="addActivity">
                    <div class="inputs">
                      <input type="hidden" id="id_detail_activity" name="id_detail">
                      <label for="card-desc">Your Message</label>
                      <input type="text" class="form-control" id="message" name="message" placeholder="Input Message">
                      <div class="sunting mx-3 my-2">
                      </div>
                      <div onclick="addActivity()" class="btn btnsavechat btn-dark mx-2 p-2">
                        Save
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-1">
          <hr class="vertical-line">
        </div>
        <div class="col-md-4">
          <div class="container mt-5">
            <button class="btnlabels px-4 mt-4" id="btnlabels">
              <svg class="icon me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 15" fill="none">
                <path d="M13.125 7.5L10.4062 11.3438C10.2917 11.5104 10.1433 11.6406 9.96125 11.7344C9.77917 11.8281 9.58375 11.875 9.375 11.875H3.125C2.78125 11.875 2.48708 11.7527 2.2425 11.5081C1.99792 11.2635 1.87542 10.9692 1.875 10.625V4.375C1.875 4.03125 1.9975 3.73708 2.2425 3.4925C2.4875 3.24792 2.78167 3.12542 3.125 3.125H9.375C9.58333 3.125 9.77875 3.17187 9.96125 3.26562C10.1438 3.35937 10.2921 3.48958 10.4062 3.65625L13.125 7.5Z" fill="black" fill-opacity="0.8" />
              </svg>
              Labels
              <i class="bx bx-chevron-down ms-5" id="arrow"></i>
            </button>

            <div class="dropdowns p-2" id="dropdowns">
              <div id="label_list">
                <!-- <div id="label_card" class="labeling d-flex justify-content-center align-items-center my-2">
                  <input type="color" class="color" id="color" name="color" value="#e66465" />
                  <input type="text" id="labelInput" name="labelInput" placeholder="Label" class="labelsinput my-0 mx-2" />
                  <button class="btn btnedit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                      <path d="M13.3782 5.07534L9.89 1.62329L11.039 0.472603C11.3537 0.157534 11.7402 0 12.1988 0C12.6573 0 13.0436 0.157534 13.3577 0.472603L14.5067 1.62329C14.8213 1.93836 14.9855 2.31863 14.9991 2.76411C15.0128 3.20959 14.8624 3.58959 14.5477 3.90411L13.3782 5.07534ZM12.1881 6.28767L3.48817 15H0V11.5068L8.69991 2.79452L12.1881 6.28767Z" fill="black" fill-opacity="0.8" />
                    </svg>
                  </button>
                </div> -->
              </div>
              <div id="label_new" style="display: none;">
                <div id="label_card" class="labeling d-flex justify-content-center align-items-center my-2">
                  <div class="hidden d-flex justify-content-center align-items-center ">
                    <form id="label_form_new">
                      <input type="hidden" id="id_detail_label" name="id_detail">
                      <input type="color" class="color" id="color" name="color" value="#e66465" />
                      <input type="text" id="labelInput" name="labelInput" placeholder="Label" class="labelsinput my-0 mx-2" />
                    </form>
                  </div>
                  <button onclick="add_label()" class="btn btnedit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                      <path d="M13.3782 5.07534L9.89 1.62329L11.039 0.472603C11.3537 0.157534 11.7402 0 12.1988 0C12.6573 0 13.0436 0.157534 13.3577 0.472603L14.5067 1.62329C14.8213 1.93836 14.9855 2.31863 14.9991 2.76411C15.0128 3.20959 14.8624 3.58959 14.5477 3.90411L13.3782 5.07534ZM12.1881 6.28767L3.48817 15H0V11.5068L8.69991 2.79452L12.1881 6.28767Z" fill="black" fill-opacity="0.8" />
                    </svg>
                  </button>
                  <button onclick="add_label()" class="btn btnedit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M16 3.55556V14.2222C16 14.7111 15.8261 15.1298 15.4782 15.4782C15.1304 15.8267 14.7117 16.0006 14.2222 16H1.77778C1.28889 16 0.870519 15.8261 0.522667 15.4782C0.174815 15.1304 0.000592593 14.7117 0 14.2222V1.77778C0 1.28889 0.174222 0.870518 0.522667 0.522667C0.871111 0.174815 1.28948 0.000592593 1.77778 0H12.4444L16 3.55556ZM8 13.3333C8.74074 13.3333 9.37037 13.0741 9.88889 12.5556C10.4074 12.037 10.6667 11.4074 10.6667 10.6667C10.6667 9.92592 10.4074 9.2963 9.88889 8.77778C9.37037 8.25926 8.74074 8 8 8C7.25926 8 6.62963 8.25926 6.11111 8.77778C5.59259 9.2963 5.33333 9.92592 5.33333 10.6667C5.33333 11.4074 5.59259 12.037 6.11111 12.5556C6.62963 13.0741 7.25926 13.3333 8 13.3333ZM2.66667 6.22222H10.6667V2.66667H2.66667V6.22222Z" fill="black" fill-opacity="0.8" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="buttonadd d-flex justify-content-center">
                <button id="btnCreateLabel" class="btn btncreate">Create new Label</button>
              </div>
            </div>
          </div>
          <div class="container mt-5 ">
            <button class="btn btncek px-4 mt-5" id="btncek">
              <svg class="icon me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 13 13" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.165 1.165C0.25 2.08125 0.25 3.55375 0.25 6.5C0.25 9.44625 0.25 10.9194 1.165 11.8344C2.08125 12.75 3.55375 12.75 6.5 12.75C9.44625 12.75 10.9194 12.75 11.8344 11.8344C12.75 10.92 12.75 9.44625 12.75 6.5C12.75 3.55375 12.75 2.08063 11.8344 1.165C10.92 0.25 9.44625 0.25 6.5 0.25C3.55375 0.25 2.08063 0.25 1.165 1.165ZM5.59 3.69813C5.63243 3.65352 5.66566 3.60099 5.6878 3.54354C5.70993 3.48608 5.72053 3.42484 5.71899 3.36329C5.71745 3.30174 5.70381 3.2411 5.67883 3.18482C5.65386 3.12855 5.61805 3.07775 5.57344 3.03531C5.52883 2.99288 5.4763 2.95965 5.41885 2.93752C5.3614 2.91538 5.30015 2.90478 5.2386 2.90632C5.17705 2.90786 5.11641 2.9215 5.06014 2.94648C5.00386 2.97145 4.95306 3.00727 4.91062 3.05187L3.46438 4.57063L3.08938 4.17688C3.0474 4.13049 2.99657 4.09297 2.93987 4.06654C2.88317 4.04011 2.82175 4.02529 2.75924 4.02296C2.69672 4.02063 2.63438 4.03084 2.57587 4.05299C2.51736 4.07513 2.46388 4.10877 2.41857 4.1519C2.37326 4.19504 2.33705 4.24681 2.31206 4.30416C2.28708 4.36151 2.27382 4.42329 2.27308 4.48584C2.27234 4.54839 2.28413 4.61046 2.30775 4.66839C2.33137 4.72631 2.36635 4.77893 2.41062 4.82313L3.125 5.57312C3.16878 5.61907 3.22143 5.65565 3.27977 5.68065C3.3381 5.70564 3.40091 5.71853 3.46438 5.71853C3.52784 5.71853 3.59065 5.70564 3.64898 5.68065C3.70732 5.65565 3.75997 5.61907 3.80375 5.57312L5.59 3.69813ZM7.125 4.15625C7.00068 4.15625 6.88145 4.20564 6.79354 4.29354C6.70564 4.38145 6.65625 4.50068 6.65625 4.625C6.65625 4.74932 6.70564 4.86855 6.79354 4.95646C6.88145 5.04436 7.00068 5.09375 7.125 5.09375H10.25C10.3743 5.09375 10.4935 5.04436 10.5815 4.95646C10.6694 4.86855 10.7188 4.74932 10.7188 4.625C10.7188 4.50068 10.6694 4.38145 10.5815 4.29354C10.4935 4.20564 10.3743 4.15625 10.25 4.15625H7.125ZM5.58938 8.07312C5.63365 8.02893 5.66863 7.97632 5.69225 7.91839C5.71587 7.86046 5.72766 7.79839 5.72692 7.73584C5.72618 7.67329 5.71292 7.61151 5.68794 7.55416C5.66295 7.49681 5.62674 7.44504 5.58143 7.4019C5.53612 7.35877 5.48264 7.32513 5.42413 7.30299C5.36562 7.28084 5.30328 7.27064 5.24076 7.27296C5.17825 7.27529 5.11683 7.29011 5.06013 7.31654C5.00343 7.34297 4.9526 7.38049 4.91062 7.42688L3.46438 8.94563L3.08938 8.55188C3.0474 8.50549 2.99657 8.46797 2.93987 8.44154C2.88317 8.41511 2.82175 8.40029 2.75924 8.39796C2.69672 8.39563 2.63438 8.40584 2.57587 8.42799C2.51736 8.45013 2.46388 8.48377 2.41857 8.5269C2.37326 8.57004 2.33705 8.62181 2.31206 8.67916C2.28708 8.73651 2.27382 8.79829 2.27308 8.86084C2.27234 8.92339 2.28413 8.98546 2.30775 9.04339C2.33137 9.10132 2.36635 9.15393 2.41062 9.19812L3.125 9.94812C3.16878 9.99407 3.22143 10.0307 3.27977 10.0556C3.3381 10.0806 3.40091 10.0935 3.46438 10.0935C3.52784 10.0935 3.59065 10.0806 3.64898 10.0556C3.70732 10.0307 3.75997 9.99407 3.80375 9.94812L5.58938 8.07312ZM7.125 8.53125C7.00068 8.53125 6.88145 8.58064 6.79354 8.66854C6.70564 8.75645 6.65625 8.87568 6.65625 9C6.65625 9.12432 6.70564 9.24355 6.79354 9.33146C6.88145 9.41936 7.00068 9.46875 7.125 9.46875H10.25C10.3743 9.46875 10.4935 9.41936 10.5815 9.33146C10.6694 9.24355 10.7188 9.12432 10.7188 9C10.7188 8.87568 10.6694 8.75645 10.5815 8.66854C10.4935 8.58064 10.3743 8.53125 10.25 8.53125H7.125Z" fill="black" fill-opacity="0.8" />
              </svg>
              Checklist
              <i class="bx bx-chevron-down ms-5" id="arrow1"></i>
            </button>
            <div class="dropdowns1 p-2" id="dropdowns1">
              <div class="labeling1  my-2">
                <form id="form_add_checklist">
                  <label for="">Title</label>
                  <input type="hidden" id="id_detail_checklist" name="id_detail">
                  <input type="text" name="checklist_name" id="checklist_name" placeholder="Label" class="labelsinput1 " />
                </form>
              </div>
              <div class="buttonadd d-flex justify-content-center">
                <button onclick="addchecklist()" class="btn btncreate">Create new Label</button>
              </div>
            </div>
          </div>
          <!-- <div class="container mt-5 ">
            <button class="btn btndate px-4 mt-5" id="btndate">
              <svg class="icon me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 15" fill="none">
                <path d="M1.25 5.625C1.25 4.44625 1.25 3.8575 1.61625 3.49125C1.9825 3.125 2.57125 3.125 3.75 3.125H11.25C12.4288 3.125 13.0175 3.125 13.3837 3.49125C13.75 3.8575 13.75 4.44625 13.75 5.625C13.75 5.91937 13.75 6.06687 13.6588 6.15875C13.5669 6.25 13.4187 6.25 13.125 6.25H1.875C1.58062 6.25 1.43312 6.25 1.34125 6.15875C1.25 6.06687 1.25 5.91875 1.25 5.625ZM1.25 11.25C1.25 12.4288 1.25 13.0175 1.61625 13.3837C1.9825 13.75 2.57125 13.75 3.75 13.75H11.25C12.4288 13.75 13.0175 13.75 13.3837 13.3837C13.75 13.0175 13.75 12.4288 13.75 11.25V8.125C13.75 7.83063 13.75 7.68313 13.6588 7.59125C13.5669 7.5 13.4187 7.5 13.125 7.5H1.875C1.58062 7.5 1.43312 7.5 1.34125 7.59125C1.25 7.68313 1.25 7.83125 1.25 8.125V11.25Z" fill="black" fill-opacity="0.8" />
                <path d="M4.375 1.875V3.75M10.625 1.875V3.75" stroke="black" stroke-opacity="0.8" stroke-linecap="round" />
              </svg>
              Dates
              <i class="bx bx-chevron-down ms-5" id="arrow2"></i>
            </button>
            <div class="dropdowns2 p-2" id="dropdowns2">
              <div class="labeling2  my-2">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" class="dates">
              </div>

              <div class="labeling2  my-2">
                <label for="dueDate">Due Date:</label>
                <input type="date" id="dueDate" name="dueDate" class="dates">
              </div>


              <div class="buttonadd d-flex justify-content-center">
                <button class="btn btncreate">Add Date</button>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>