<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Portal Kampus Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

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

<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-10 md:mb-0">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Portal Darul Ulum</h1>
            <p class="text-xl mb-8">Sumber informasi terpercaya untuk seluruh civitas akademika Universitas Teknologi Digital.</p>
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                <button class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition">
                    <i class="fas fa-graduation-cap mr-2"></i>Info Akademik
                </button>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    <i class="fas fa-calendar-alt mr-2"></i>Kalender Akademik
                </button>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-center">
            <!-- Carousel Ilustrasi Kampus -->
            <div id="kampusCarousel" class="carousel slide w-100" data-bs-ride="carousel" data-bs-interval="3000" style="max-width:500px;">
              <div class="carousel-inner rounded-lg shadow-xl">
                <div class="carousel-item active">
                  <img src="admin/img/kampus1.jpg" class="d-block w-100" alt="Kampus 1" style="height:350px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                  <img src="admin/img/kampus2.jpg" class="d-block w-100" alt="Kampus 2" style="height:350px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                  <img src="admin/img/kampus3.jpg" class="d-block w-100" alt="Kampus 3" style="height:350px; object-fit:cover;">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#kampusCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#kampusCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <!-- End Carousel -->
        </div>
    </div>
</section>

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
