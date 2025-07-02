<?php
session_start();
if(!isset($_SESSION['admin'])){ header('Location: ../login.php'); exit; }
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h3>Dashboard Admin</h3>
  <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Berita</a>
  <table class="table table-bordered">
    <tr>
      <th>Judul</th><th>Tanggal</th><th>Aksi</th>
    </tr>
    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
    while($d = mysqli_fetch_array($data)){
      echo "<tr>
        <td>{$d['judul']}</td>
        <td>{$d['tanggal']}</td>
        <td>
          <a href='edit.php?id={$d['id']}' class='btn btn-warning btn-sm'>Edit</a>
          <a href='hapus.php?id={$d['id']}' class='btn btn-danger btn-sm'>Hapus</a>
        </td>
      </tr>";
    }
    ?>
  </table>
</body>
</html>
