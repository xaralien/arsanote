<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('home') ?>">
      <div class="sidebar-brand-icon rotate-n-15">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="37" viewBox="0 0 35 37" fill="none">
          <path d="M2.5375 27.5384C1.55029 26.9685 1.21205 25.7061 1.78201 24.7189L10.7895 9.11756C11.4304 8.00746 12.8499 7.62711 13.96 8.26803C14.5645 8.61701 14.9798 9.21946 15.0909 9.9085L18.269 29.6138C18.3444 30.081 17.8435 30.4263 17.4337 30.1897C17.1816 30.0442 17.0825 29.7303 17.2052 29.4664L29.7116 2.56729C30.2177 1.47877 31.5482 1.05843 32.5878 1.65864C33.5134 2.193 33.8712 3.35005 33.4089 4.31363L19.0157 34.3149C18.4609 35.4712 17.0393 35.9109 15.9286 35.2696C15.355 34.9385 14.9609 34.3668 14.8554 33.7129L11.6632 13.9203C11.5899 13.4658 12.0771 13.13 12.4758 13.3601C12.7371 13.511 12.8266 13.8452 12.6758 14.1065L5.35694 26.7829C4.78699 27.7701 3.52469 28.1084 2.5375 27.5384Z" fill="black" />
          <path d="M6.15332 22.0418H14.6533" stroke="black" stroke-width="3" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9927 35.3478C18.4278 35.1393 18.7985 34.7868 19.0249 34.3149L33.4182 4.31363C33.8805 3.35005 33.5226 2.193 32.5971 1.65863C31.5575 1.05843 30.2269 1.47877 29.7209 2.56728L17.9927 27.7926V27.8429V30.1964V35.3478Z" fill="#002761" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3415 24.8915L17.9927 27.7926V27.8429V30.1965V35.3478C18.4278 35.1394 18.7985 34.7869 19.0249 34.3149L19.3415 33.655V24.8915Z" fill="#021F4B" />
        </svg>
      </div>
      <div class="sidebar-brand-text mx-3">Arsanote</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item dropdown profiledrop  text-center mx-2 ">
      <a class=" d-flex btn btn-profile my-2 dropnews dropdown-toggle my-2" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <!-- <div class="tag my-2">
          A
        </div> -->
        <?php
        if ($this->session->userdata('user_logged_in')) {
          $nama = $this->session->userdata('name');
        } else {
          $nama = 'Guest';
        }

        // $nama = strlen($nama) > 10 ? substr($nama, 0, 20) . '...' : $nama;
        ?>
        <p class="my-2 mx-2"><?= $nama ?></p>
      </a>

      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?php
        if ($this->session->userdata('user_logged_in')) {
        ?>
          <li><a class="dropdown-item" href="<?php echo base_url('autentic/logout') ?>">Logout</a></li>
        <?php
        } else {
        ?>
          <li><a class="dropdown-item" href="<?php echo base_url('autentic') ?>">Login</a></li>
        <?php
        }
        ?>
      </ul>
    </li>

    <li class="mx-2 my-2">
      <div class="search">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control" placeholder="Search">
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />


    <?php
    $home = '';
    $workspace = '';
    $calendar = '';
    $url = $this->uri->segment(1);
    if ($url == 'home') {
      $home = 'active';
    } else if ($url == 'workspace') {
      $workspace = 'active';
    } else if ($url == 'calendar') {
      $calendar = 'active';
    }

    ?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= $home ?>">
      <a class="nav-link collapsed" href="<?php echo base_url('home') ?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
          <g clip-path="url(#clip0_5_65)">
            <path d="M16.6933 0.25607C16.5001 0.0908122 16.2542 0 16 0C15.7458 0 15.4999 0.0908122 15.3067 0.25607L0 13.3761V28.8001C0 29.6488 0.337142 30.4627 0.937258 31.0628C1.53737 31.6629 2.35131 32.0001 3.2 32.0001H11.7333C12.0162 32.0001 12.2875 31.8877 12.4876 31.6876C12.6876 31.4876 12.8 31.2163 12.8 30.9334V24.5334C12.8 23.6847 13.1371 22.8708 13.7373 22.2707C14.3374 21.6705 15.1513 21.3334 16 21.3334C16.8487 21.3334 17.6626 21.6705 18.2627 22.2707C18.8629 22.8708 19.2 23.6847 19.2 24.5334V30.9334C19.2 31.2163 19.3124 31.4876 19.5124 31.6876C19.7125 31.8877 19.9838 32.0001 20.2667 32.0001H28.8C29.6487 32.0001 30.4626 31.6629 31.0627 31.0628C31.6629 30.4627 32 29.6488 32 28.8001V13.3761L16.6933 0.25607Z" fill="black" />
          </g>
          <defs>
            <clipPath id="clip0_5_65">
              <rect width="32" height="32" fill="white" />
            </clipPath>
          </defs>
        </svg>
        <span class="mx-2">Home</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Components:</h6>
          <a class="collapse-item" href="buttons.html">Buttons</a>
          <a class="collapse-item" href="cards.html">Cards</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= $workspace ?>">
      <a class="nav-link collapsed" href="<?php echo base_url('workspace') ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
          <path d="M8 28C6.53334 28 5.27778 27.4778 4.23334 26.4333C3.18889 25.3889 2.66667 24.1333 2.66667 22.6667C2.66667 21.2 3.18889 19.9444 4.23334 18.9C5.27778 17.8556 6.53334 17.3333 8 17.3333C9.46667 17.3333 10.7222 17.8556 11.7667 18.9C12.8111 19.9444 13.3333 21.2 13.3333 22.6667C13.3333 24.1333 12.8111 25.3889 11.7667 26.4333C10.7222 27.4778 9.46667 28 8 28ZM24 28C22.5333 28 21.2778 27.4778 20.2333 26.4333C19.1889 25.3889 18.6667 24.1333 18.6667 22.6667C18.6667 21.2 19.1889 19.9444 20.2333 18.9C21.2778 17.8556 22.5333 17.3333 24 17.3333C25.4667 17.3333 26.7222 17.8556 27.7667 18.9C28.8111 19.9444 29.3333 21.2 29.3333 22.6667C29.3333 24.1333 28.8111 25.3889 27.7667 26.4333C26.7222 27.4778 25.4667 28 24 28ZM16 14.6667C14.5333 14.6667 13.2778 14.1444 12.2333 13.1C11.1889 12.0556 10.6667 10.8 10.6667 9.33333C10.6667 7.86667 11.1889 6.61111 12.2333 5.56667C13.2778 4.52222 14.5333 4 16 4C17.4667 4 18.7222 4.52222 19.7667 5.56667C20.8111 6.61111 21.3333 7.86667 21.3333 9.33333C21.3333 10.8 20.8111 12.0556 19.7667 13.1C18.7222 14.1444 17.4667 14.6667 16 14.6667Z" fill="black" fill-opacity="0.8" />
        </svg>
        <span class="mx-2">Workspace</span>
      </a>
    </li>

    <li class="nav-item <?= $calendar ?>">
      <a class="nav-link collapsed" href="<?php echo base_url('calendar') ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
          <g clip-path="url(#clip0_5_78)">
            <path d="M7 0C7.26522 0 7.51957 0.105357 7.70711 0.292893C7.89464 0.48043 8 0.734784 8 1V2H24V1C24 0.734784 24.1054 0.48043 24.2929 0.292893C24.4804 0.105357 24.7348 0 25 0C25.2652 0 25.5196 0.105357 25.7071 0.292893C25.8946 0.48043 26 0.734784 26 1V2H28C29.0609 2 30.0783 2.42143 30.8284 3.17157C31.5786 3.92172 32 4.93913 32 6V28C32 29.0609 31.5786 30.0783 30.8284 30.8284C30.0783 31.5786 29.0609 32 28 32H4C2.93913 32 1.92172 31.5786 1.17157 30.8284C0.421427 30.0783 0 29.0609 0 28V10H32V8H0V6C0 4.93913 0.421427 3.92172 1.17157 3.17157C1.92172 2.42143 2.93913 2 4 2H6V1C6 0.734784 6.10536 0.48043 6.29289 0.292893C6.48043 0.105357 6.73478 0 7 0Z" fill="black" fill-opacity="0.8" />
          </g>
          <defs>
            <clipPath id="clip0_5_78">
              <rect width="32" height="32" fill="white" />
            </clipPath>
          </defs>
        </svg>
        <span class="mx-2">Calendar</span>
      </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <nav class="navbar d-flex justify-content-center  navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <h3>Home</h3>
      </nav>
      <!-- End of Topbar -->