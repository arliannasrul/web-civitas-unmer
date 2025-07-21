<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Berita Civitas Kampus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
        body { padding-top: 56px; }
        .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #e9ecef;
            margin-top: 50px;
        }
        .sidebar-list-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .sidebar-list-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .sidebar-img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        .sidebar-link {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .sidebar-link:hover {
                color: #80000088;
        }
        .sidebar-text-muted {
            font-size: 0.85em;
            color: #666;
        }
        .navbar-brand-logo {
            height: 40px !important;
            width: auto !important;
            max-width: 100% !important;
            object-fit: contain;
            margin-right: 10px;
        }
        .navbar-brand-text {
            line-height: 1;
        }
        .navbar-brand-text .main-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .navbar-brand-text .sub-title {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.75);
            display: block;
            margin-top: -2px;
        }
        .nav-link {
            margin-right: 5px;
        }
        .navbar {
            background-color: #800000;
        }
         :root {
        /* Menimpa warna 'danger' Bootstrap menjadi #800000 (Merah Marun) */
        --bs-danger: #800000;
        --bs-danger-rgb: 128, 0, 0; 
    }
    /* CSS untuk Carousel */
.carousel-img {
    height: 600px; /* Tinggi tetap untuk gambar carousel */
    object-fit: cover; /* Pastikan gambar mengisi area tanpa terpotong */
}
.carousel-caption {
    padding: 1rem; /* Padding lebih kecil untuk caption */
    bottom: 0; /* Pastikan caption di bagian bawah */
    left: 0;
    right: 0;
    text-align: left; /* Teks di caption rata kiri */
    background-color: rgba(0, 0, 0, 0.47); /* Latar belakang semi-transparan */
}
.carousel-caption h5 {
    font-size: 1.5rem; /* Ukuran judul */
    margin-bottom: 0.5rem;
}
.carousel-caption p {
    font-size: 0.9rem; /* Ukuran teks kecil */
    margin-bottom: 0;
}
@media (max-width: 768px) {
    .carousel-img {
        height: 350px; /* Tinggi lebih kecil di mobile */
    }
    .carousel-caption {
        padding: 0.5rem; /* Padding lebih kecil di mobile */
    }
    .carousel-caption h5 {
        font-size: 1.1rem; /* Ukuran judul lebih kecil di mobile */
    }
    .carousel-caption p {
        font-size: 0.75rem; /* Ukuran teks lebih kecil di mobile */
    }
}


</style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top  ">
        <div class="container column-gap-3">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="/uploads/logo-civitas.webp" alt="Logo Civitas" class="navbar-brand-logo">
                <div class="d-flex flex-column navbar-brand-text">
                    <span class="main-title">CIVITAS</span>
                    <span class="sub-title pt-1 ">Lembaga Pers Mahasiswa</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse column-gap-3" id="navbarNav">
                <form class="d-flex w-100 me-auto  ">
                    <input class="form-control me-2 flex-grow-1" type="search" placeholder="Cari berita" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Cari</button>
                </form>
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('/') ? 'active' : '' ?>" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('berita*') ? 'active' : '' ?>" href="/berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('majalah*') ? 'active' : '' ?>" href="/majalah">Majalah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('tentang') ? 'active' : '' ?> text-nowrap" href="/tentang">Tentang Kami</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class=" p-2 p-md-5 mt-4">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Civitas Kampus. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdsjK1rD7tIe8yvWtcE" crossorigin="anonymous"></script>

    <?= $this->renderSection('scripts') ?>
    
</body>
</html>