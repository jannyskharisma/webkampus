<?php
session_start();
include 'koneksi.php';

if($_POST){
  $u = mysqli_real_escape_string($koneksi,$_POST['user']);
  $p = mysqli_real_escape_string($koneksi,$_POST['pass']);
  
  // md5 hash
  $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$u' AND password=md5('$p')");
  
  if(mysqli_num_rows($cek)>0){
    $_SESSION['admin']=$u;
    header('Location: admin/dashboard.php');
    exit;
  } else {
    echo "Login gagal";
  }
}
?>
<form method="post">
  <input type="text" name="user" placeholder="Username">
  <input type="password" name="pass" placeholder="Password">
  <button type="submit">Login</button>
</form>
