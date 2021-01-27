<?php 
session_start();
error_reporting(E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'config/database.php';
$no=1;


if(!$_SESSION['username']){
  header("location:login.php?pesan=belum_login");
}

 $index = mysqli_query($konek,"select * from user");
 
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<div class="container">
<!-- Start Kode Buat  -->
<?php
      if(isset($_POST['Submit'])) {
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $foto = $_FILES['image']['name'];
       $target = "img/".basename($foto);
        $result = mysqli_query($konek, "INSERT INTO user(email,password,nama,foto) VALUES('$email','$password','$nama','$target')");        
        if(!$result){
          echo '<div class="alert alert-danger mt-4" role="alert">Data gagal di tambah</div>';
        }else{
          if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            header("Refresh:0; url=index.php?sukses=insert");
          }else{
            echo '<div class="alert alert-danger mt-4" role="alert">Data gagal di tambah eror gambar</div>';
          }
          
        }
    }
    ?>
<!-- End Kode Buat  -->



<!-- start message -->
<?php 
      if(isset($_GET['sukses'])){
        $sukses = $_GET['sukses'];

        if($sukses == 'insert'){
          echo '<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">Data berhasil di tambah  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>';
        }else if($sukses == 'delete'){
          echo '<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">Data berhasil di hapus  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>';
        }
      }
?>
<!-- end message -->
  <div class="card mt-5">
    <div class="card-header">
      <h3 class="d-inline-block p-0 m-0">Data User</h3>
      <div class="float-right">
        <a type="button" class="btn btn-primary btn-sm text-light" data-toggle="modal" data-target="#tambahData">
          Tambah data
        </a>
      </div>
    <div class="card-body table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php while($data = mysqli_fetch_array($index)){ ?>
          <tr>
            <th scope="row"><?php  echo $no++ ?></th>
            <td><?php echo $data['email']?></td>
            <td><?php echo $data['nama']?></td>
            <td><img src="<?php echo $data['foto']?>" width="100px"></td>
            <td>
            <a href="./functions/delete.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
            <a href="./edit.php?id=<?php echo $data['id']?>" class="btn btn-primary btn-sm">Edit</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

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
            <input type="email" class="form-control" name="email" placeholder="NIS">
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
