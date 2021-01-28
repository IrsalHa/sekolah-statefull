<?php
session_start();
// error_reporting(E_ALL);
// error_reporting(E_ALL);
ini_set('display_errors', '0');
include '../config/database.php';

if(isset($_POST['Submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($konek,"select * from user where email='$email' and password='$password'");
   // $data = mysqli_query($konek,"select * from admin where email='$email' and password='$password'");
    $cek = mysqli_num_rows($query);
    $data = $query->fetch_assoc();
    if($cek > 0){
        $_SESSION['username'] = $email;
        $_SESSION['nama'] = $data['nama'];
	    $_SESSION['password'] = $password;  
       // echo "sukses";
        header('Location: ../index.php');
    }else{
       // echo "gagal";
       header('Location: ../login.php');
    }

}
?>