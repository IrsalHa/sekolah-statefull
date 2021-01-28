<?php 
// error_reporting(E_ALL);
// error_reporting(E_ALL);
ini_set('display_errors', '0');
session_start();
if(!$_SESSION['username']){
  header("location:login.php?pesan=belum_login");
}
include '../config/database.php';
      if(isset($_GET['delete'])){
        $id = $konek->real_escape_string($_GET['delete']);
      
        $delete = mysqli_query($konek, "DELETE FROM user where id = $id");
        if(!$delete){
          header("Refresh:0; url=../index.php?sukses=gagal");

       //   echo '<div class="alert alert-danger mt-4" role="alert">Data gagal di hapus</div>';
        }else{
          header("Refresh:0; url=../index.php?sukses=delete");
        }
      }
?>
