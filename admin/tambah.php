<?php
session_start();
if(!isset($_SESSION['admin'])){ header('Location: ../login.php'); exit; }  // cek login
include '../koneksi.php';

// Jika form disubmit
if($_POST){
  $judul = $_POST['judul'];
  $konten = $_POST['konten'];
  $tipe = $_POST['tipe'];
  $link = $_POST['link'];
  $thumbnail = $_POST['thumbnail'];

  // Simpan ke database
  mysqli_query($koneksi, "INSERT INTO berita (judul, konten, tipe, link, thumbnail) 
    VALUES ('$judul','$konten','$tipe','$link','$thumbnail')");
  header('Location: dashboard.php');  // kembali ke dashboard
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Berita/Video</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h3>Tambah Berita / Video</h3>
  <form method="post">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Konten</label>
      <textarea name="konten" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>Tipe</label>
      <select name="tipe" class="form-control" required>
        <option value="text">Berita Teks</option>
        <option value="video">Video</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Link (khusus video)</label>
      <input type="url" name="link" class="form-control">
    </div>
    <div class="mb-3">
      <label>Thumbnail (URL gambar, khusus video)</label>
      <input type="url" name="thumbnail" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
