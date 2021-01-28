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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<div class="container">

  <div class="card mt-5">
    <div class="card-header">
      <h3 class="d-inline-block p-0 m-0">Data User</h3>
      <div class="float-right">
        <a href="../index.php" type="button" class="btn btn-dark btn-sm text-light">
          Back
        </a>
      </div>
  </div>
  <div class="card-body">
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

