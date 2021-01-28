<?php 
    $konek = mysqli_connect("localhost","root","irsal","tugas");
    if(!$konek){
           echo mysqli_connect_error();
    }
?>