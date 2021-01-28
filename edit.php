<?php 
session_start();
if(!$_SESSION['username']){
  header("location:login.php?pesan=belum_login");
}

error_reporting(E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include './config/database.php';

$id=$_GET['id'];
$siswa = mysqli_query($konek,"select * from user where id=$id");

 while($data = mysqli_fetch_array($siswa)){
  $nama = $data['nama'];
  $email = $data['email'];
  $password = $data['password'];
  $foto = $data['foto'];
}

?>  

<!doctype html>
<html lang="en">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>  
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>DashBoard Edit</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="https://iqonic.design/themes/note-plus/html/assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="../assets/css/backend.mine209.css?v=1.0.0">
      <link rel="stylesheet" href="./assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="./assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="./assets/vendor/remixicon/fonts/remixicon.css">
      <link rel="stylesheet" href="./assets/vendor/%40icon/dripicons/dripicons.css">
      
      <link rel='stylesheet' href='./assets/vendor/fullcalendar/core/main.css' />
      <link rel='stylesheet' href='./assets/vendor/fullcalendar/daygrid/main.css' />
      <link rel='stylesheet' href='./assets/vendor/fullcalendar/timegrid/main.css' />
      <link rel='stylesheet' href='./assets/vendor/fullcalendar/list/main.css' />
      <link rel="stylesheet" href="./assets/vendor/mapbox/mapbox-gl.css">  </head>
  <body class="noteplus-layout  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="create-note" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <h4 class="mb-4">Create New Tag</h4>
                        <div class="content create-workform">
                            <input type="text" class="form-control" placeholder="Enter Tag Name">
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <div class="btn btn-outline-primary mr-4" data-dismiss="modal">Create</div>
                                    <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Modal -->
    <div class="modal fade" id="tag-rename" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <h4 class="mb-4">Rename Your Tag</h4>
                        <div class="content create-workform">
                            <input type="text" class="form-control" placeholder="Enter Tag Name">
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                    <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
       <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                      <i class="ri-menu-line wrapper-menu"></i>
                      <a href="index.html" class="header-logo">
                             
                          
                      </a>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                      <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                          <li class="nav-item nav-icon search-content">
                              <a href="#" class="search-toggle rounded" id="h1-dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="ri-search-line"></i>
                              </a>
                              <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="h1-dropdownSearch">
                                  <form action="#" class="searchbox p-2">
                                      <div class="form-group mb-0 position-relative">
                                      <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                      <a href="#" class="search-link"><i class="las la-search"></i></a> 
                                      </div>
                                  </form>
                              </div>
                          </li>                
                          <li class="nav-item nav-icon dropdown mail-content">
                              <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="h1-dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="">
                                  <svg width="20" class="svg-icon" id="main-n-010" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                  </svg>
                              </i>
                              <span class="badge badge-primary count-mail mail rounded-circle">2</span>
                              <span class="bg-primary"></span>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="h1-dropdownMenuButton2">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                          <div class="px-3 pt-0 pb-0">
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3 border-bottom">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/01.jpg" alt="01">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Emma Watson</h5>
                                                              <small class="text-dark"><b>12 : 47 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3 border-bottom">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/02.jpg" alt="02">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Ashlynn Franci</h5>
                                                              <small class="text-dark"><b>11 : 30 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/03.jpg" alt="03">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Kianna Carder</h5>
                                                              <small class="text-dark"><b>11 : 21 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                          </div>
                                          <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                              View All
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="nav-item nav-icon dropdown mail-content"> 
                              <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="h1-dropdownMenuButton004" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                              <i class="">
                                  <svg width="20" class="svg-icon" id="main-n-020" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                  </svg>
                              </i>
                              <span class="badge badge-primary count-mail rounded-circle">2</span>
                              <span class="bg-primary "></span>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="h1-dropdownMenuButton004">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                          <div class="px-3 pt-0 pb-0">
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3 border-bottom">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/01.jpg" alt="01">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Emma Watson</h5>
                                                              <small class="text-dark"><b>12 : 47 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3 border-bottom">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/02.jpg" alt="02">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Ashlynn Franci</h5>
                                                              <small class="text-dark"><b>11 : 30 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/03.jpg" alt="03">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Kianna Carder</h5>
                                                              <small class="text-dark"><b>11 : 21 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                          </div>
                                          <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                              View All
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </li>  
                          <li class="caption-content">
                             <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between" id="h-dropdownMenuButton001" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="../assets/images/user/1.jpg" class="img-fluid rounded avatar-50" alt="user">
                              </a>
                              <div class="dropdown-menu dropdown-menu-right w-100 border-0 py-2" aria-labelledby="h-dropdownMenuButton001">
                                  <a class="dropdown-item mb-2" href="">
                                      <span class="mt-2"><?= $_SESSION['nama']?></span>
                                  </a>
                                  <hr class="my-1">
                                  <a class="dropdown-item" href="./functions/logout.php">
                                      <span>Logout</span>
                                  </a>
                              </div>
                          </li>
                          </ul>                     
                      </div> 
                  </div>
              </nav>
          </div>
      </div>      
       <div class="content-page">
     <div class="container-fluid">
     <?php 
      if(isset($_GET['sukses'])){
        $msg = $_GET['sukses'];
        if($msg == 'update'){
          echo '<div class="alert alert-success" role="alert">
          <strong>Sukses! </strong>&nbsp Data berhasil di update!
         </div>';
        }else if($msg == 'insert'){
          echo '<div class="alert alert-success" role="alert">
          <strong>Sukses! </strong>&nbsp Data berhasil di insert!
         </div>';
        }else if($msg == 'delete'){
          echo '<div class="alert alert-success" role="alert">
          <strong>Sukses! </strong>&nbsp Data berhasil di delete!
         </div>';
      }else if($msg == 'gagal'){
        echo '<div class="alert alert-danger" role="alert">
       <strong>Gagal!</strong>
      </div>';
    }
      }
     ?>
        <div class="desktop-header">
        
            <div class="card card-block topnav-left">
                <div class="card-body write-card">
                
                     <div class="d-flex flex-wrap align-items-center justify-content-between">
                           <h4>Edit</h4>
                           <div class="media flex-wrap align-items-center">
                           </div>
                     </div>
                  </div>
            </div>
            <div class="card topnav-right">
                
                <div class="card-body card-content-right">
                    <ul class="list-inline m-0 p-0 d-flex align-items-center justify-content-around">
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="">
                                <svg width="20" class="svg-icon" id="main-n-01" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </i>
                            <span class="badge badge-primary count-mail mail rounded-circle">2</span>
                            <span class="bg-primary"></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="p-3">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card pb-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/01.jpg" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Emma Watson</h5>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/02.jpg" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Ashlynn Franci</h5>
                                                            <small class="text-dark"><b>11 : 30 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card pt-3">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/03.jpg" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Kianna Carder</h5>
                                                            <small class="text-dark"><b>11 : 21 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown pl-3"> 
                            <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="dropdownMenuButton002" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <i class="">
                                <svg width="20" class="svg-icon" id="main-n-02" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </i>
                            <span class="badge badge-primary count-mail rounded-circle">2</span>
                            <span class="bg-primary "></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton002">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="p-3">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card pb-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/01.jpg" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Emma Watson</h5>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/02.jpg" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Ashlynn Franci</h5>
                                                            <small class="text-dark"><b>11 : 30 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card pt-3">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/03.jpg" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Kianna Carder</h5>
                                                            <small class="text-dark"><b>11 : 21 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>  
                    </ul>
                </div>            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            
               <div class="card card-block card-stretch card-height note-table">
               
                  <div class="card-body custom-notes-space mb-3">
                  <form action="/functions/edit.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email"  value="<?php echo $email ?>" class="form-control">
 </div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" value="<?php echo $nama ?>" class="form-control">
  </div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password"  value="<?php echo $password ?>" class="form-control">
</div>
<div class="form-group">
    <label>Foto</label>
    <br>
    <img src="../<?php echo $foto?>" width="100px">
    <input type="file" name="image"  name="fileToUpload" id="fileToUpload">
</div>
<input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
<button type="submit" name="Submit" class="btn btn-primary">Save changes</button>
</form>
      
                 
</div>


     
                  </div>
               </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="new-note" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <h4 class="mb-4">Create New Notebook</h4>
                        <div class="content create-workform">
                            <h5 class="mb-2">Name</h5>
                            <input type="text" class="form-control" placeholder="Notebook Name">
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                    <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <h4 class="mb-4">Edit Notebook</h4>
                        <div class="content create-workform">
                            <h5 class="mb-2">Name</h5>
                            <input type="text" class="form-control" placeholder="Notebook Name" value="" id="notebook-title" name="note">
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                    <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer mb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="text-secondary mr-1"><script>document.write(new Date().getFullYear())</script>©</span> <a href="#" class="">Irsal</a>.
                </div>
            </div>
        </div>
    </footer>
    <!-- Backend Bundle JavaScript -->
    <script src="./assets/js/backend-bundle.min.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="./assets/js/flex-tree.min.js"></script>
    <script src="./assets/js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="./assets/js/table-treeview.js"></script>
    
    <!-- Masonary Gallery Javascript -->
    <script src="../assets/js/masonry.pkgd.min.js"></script>
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    
    <!-- Mapbox Javascript -->
    <script src="../assets/js/mapbox-gl.js"></script>
    <script src="../assets/js/mapbox.js"></script>
    
    <!-- Fullcalender Javascript -->
    <script src='../assets/vendor/fullcalendar/core/main.js'></script>
    <script src='../assets/vendor/fullcalendar/daygrid/main.js'></script>
    <script src='../assets/vendor/fullcalendar/timegrid/main.js'></script>
    <script src='../assets/vendor/fullcalendar/list/main.js'></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="../assets/js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="../assets/js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>
    
    <!-- slider JavaScript -->
    <script src="../assets/js/slider.js"></script>
    
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>

    <!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" name="password" placeholder="Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Foto</label>
            <input type="file" name="image" id="fileToUpload">
          <br>
            <small>.png .jpg</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="Submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>

   
    </div>
  </div>
</div>

  </body>

</html>
<?php include 'views/_sidebar.php';?>