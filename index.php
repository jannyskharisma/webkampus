<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Portal Kampus Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    .menu-item { position: relative; }
    .menu-item::after {
      content: ''; position: absolute; width: 0; height: 2px; background: orange; bottom: -2px; left: 0;
      transition: width 0.3s;
    }
    .menu-item:hover::after { width: 100%; }
    .card-hover { transition: .3s; }
    .card-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,.1); }
  </style>
</head>
<body>

<!-- Breaking news ticker -->
<div class="bg-danger text-white py-2 px-3">
  <strong>BERITA TERKINI:</strong>
  <marquee>
    Pendaftaran Beasiswa | Seminar Nasional | Universitas raih penghargaan
  </marquee>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="#">UNIVERSITAS DARUL ULUM</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link menu-item" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link menu-item" href="#">Profil</a></li>
        <li class="nav-item"><a class="nav-link menu-item" href="#">Akademik</a></li>
        <li class="nav-item"><a class="nav-link menu-item" href="#">Kontak</a></li>
      </ul>
      <a href="login.php" class="btn btn-primary ms-lg-3"><i class="fas fa-sign-in-alt"></i> Login Admin</a>
    </div>
  </div>
</nav>

<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption">
        <h5>Selamat Datang di Kampus Digital</h5>
        <p>Sumber informasi terpercaya civitas akademika.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://via.placeholder.com/1200x400/007bff/fff" class="d-block w-100" alt="Slide 2">
      <div class="carousel-caption">
        <h5>Info Akademik Terbaru</h5>
      </div>
    </div>
  </div>
</div>

<!-- Kartu Berita (dinamis dari database) -->
<div class="container my-5">
  <h2 class="mb-4 fw-bold">Berita Kampus</h2>
  <div class="row g-4">
    <?php
    $berita = mysqli_query($koneksi,"SELECT * FROM berita WHERE tipe='text' ORDER BY id DESC LIMIT 3");
    while($b = mysqli_fetch_array($berita)){
    ?>
    <div class="col-md-4">
      <div class="card card-hover">
        <div class="card-body">
          <h5 class="card-title">
            <a href="detail.php?id=<?= $b['id'] ?>" class="text-decoration-none text-dark">
              <?= htmlspecialchars($b['judul']) ?>
            </a>

          </h5>
          <p><?= htmlspecialchars(substr(strip_tags($b['konten']),0,60)) ?>...</p>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>


<!-- Video Section -->
<div class="container my-5">
  <h2 class="mb-4 fw-bold">Berita Video</h2>
  <div class="row g-4">
    <?php
    $video = mysqli_query($koneksi,"SELECT * FROM berita WHERE tipe='video' ORDER BY id DESC LIMIT 2");
    while($v = mysqli_fetch_array($video)){
    ?>
    <div class="col-md-6">
      <div class="card card-hover">
        <img src="<?= htmlspecialchars($v['thumbnail']) ?>" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($v['judul']) ?></h5>
          <p><?= htmlspecialchars(substr(strip_tags($v['deskripsi']),0,60)) ?>...</p>
          <a href="<?= htmlspecialchars($v['link']) ?>" target="_blank" class="btn btn-primary">Tonton Video</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
