<?php 
error_reporting(E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', '1');
include '../config/database.php';
    if(isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $foto = $_FILES['image']['name'];
        $target = "../img/".basename($foto);
       if($foto == 0){
        $result = mysqli_query($konek, "UPDATE user SET email='$email',password='$password',nama='$nama' WHERE id=$id");          }
      else{
        $result = mysqli_query($konek, "UPDATE user SET email='$email',password='$password',nama='$nama',foto='$target' WHERE id=$id");     
      }
        if($result){
           $poto = move_uploaded_file($_FILES['image']['tmp_name'], $target);
          echo '<div class="alert alert-danger mt-4" role="alert">Data Sukses di update</div>';
          header("Refresh:0; url=../index.php?sukses=update");
          // header("Refresh:0; url=edit.php?id=".$GLOBALS['id']."");
        }else{
          echo '<div class="alert alert-danger mt-4" role="alert">Data gagal di update</div>';
           header("Refresh:0; url=edit.php?id=".$GLOBALS['id']."");
        }
    }
  ?>