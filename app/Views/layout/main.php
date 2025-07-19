<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Berita Civitas Kampus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
        body { padding-top: 56px; } /* Untuk navbar fixed-top Bootstrap */
        .card-img-top {
            width: 100%;
            height: 180px; /* Tinggi gambar yang konsisten */
            object-fit: cover; /* Pastikan gambar mengisi area tanpa terdistorsi */
        }
        .footer {
            background-color: #f8f9fa; /* Warna latar footer */
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #e9ecef;
            margin-top: 50px;
        }
        /* CSS untuk Sidebar */
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
            width: 80px; /* Ukuran gambar kecil di sidebar */
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
            color: #007bff;
        }
        .sidebar-text-muted {
            font-size: 0.85em;
            color: #666;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Civitas News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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
                        <a class="nav-link <?= url_is('tentang') ? 'active' : '' ?>" href="/tentang">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Civitas Kampus. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdsjK1rD7tIe8yvWtcE" crossorigin="anonymous"></script>

    <?= $this->renderSection('scripts') ?>
</body>
</html>