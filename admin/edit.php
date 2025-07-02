<?php
session_start();
if(!isset($_SESSION['admin'])){ header('Location: ../login.php'); exit; }
include '../koneksi.php';

$id = $_GET['id'];  // id berita yg diedit
$data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM berita WHERE id=$id"));

if($_POST){
  $judul = $_POST['judul'];
  $konten = $_POST['konten'];
  $tipe = $_POST['tipe'];
  $link = $_POST['link'];
  $thumbnail = $_POST['thumbnail'];

  mysqli_query($koneksi, "UPDATE berita SET judul='$judul', konten='$konten', tipe='$tipe', link='$link', thumbnail='$thumbnail' WHERE id=$id");
  header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Berita/Video</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h3>Edit Berita / Video</h3>
  <form method="post">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Konten</label>
      <textarea name="konten" class="form-control" required><?= htmlspecialchars($data['konten']) ?></textarea>
    </div>
    <div class="mb-3">
      <label>Tipe</label>
      <select name="tipe" class="form-control" required>
        <option value="text" <?= $data['tipe']=='text'?'selected':'' ?>>Berita Teks</option>
        <option value="video" <?= $data['tipe']=='video'?'selected':'' ?>>Video</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Link (khusus video)</label>
      <input type="url" name="link" value="<?= htmlspecialchars($data['link']) ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label>Thumbnail (URL gambar, khusus video)</label>
      <input type="url" name="thumbnail" value="<?= htmlspecialchars($data['thumbnail']) ?>" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
