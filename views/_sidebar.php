<div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="index.php" class="header-logo">
                   <h4 class="logo-title ml-3">Dashboard</h4>
              </a>
              <div class="iq-menu-bt-sidebar">
                  <i style="color: black;" class="las la-times wrapper-menu"><span class="material-icons">crop</span></i>
              </div>
          </div>    
          <div class="sidebar-caption dropdown">
              <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?= $_SESSION['foto'] ?>" class="img-fluid rounded avatar-50 mr-3" alt="user">
                  <div class="caption">
                      <h6 class="mb-0 line-height"><?= $_SESSION['nama']?></h6>
                  </div>
                  <span class="material-icons">expand_more</span>
              </a>
              <div class="dropdown-menu w-100 border-0 my-2" aria-labelledby="dropdownMenuButton">
                  <hr class="my-2">
                  <a class="dropdown-item" href="./functions/logout.php">
                      <i class="las la-sign-out-alt font-size-20 mr-1"></i>
                      <span>Logout</span>
                  </a>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
         
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      <li class="">
                              <a href="index.php" class="svg-icon">
                              <i class="material-icons">dashboard</i>
                                  <span>Dashboard</span>
                              </a>
                          <ul id="index" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                      </li>
                      <li class="">
                              <a data-toggle="modal" data-target="#tambahData" class="svg-icon">
                              <i class="material-icons">person_add_alt_1</i>
                                  <span>Add User</span>
                              </a>
                          <ul id="index" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                      </li>
                  </ul>
              </nav>
              <div id="sidebar-bottom" class="position-relative sidebar-bottom">
                  <div class="card rounded shadow-none">
                      <div class="card-body">
                          <div class="sidebarbottom-content">
                              <div class="image"><img src="../assets/images/layouts/side-bkg.png" class="img-fluid" alt="side-bkg"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="p-3"></div>
          </div>
      </div> 