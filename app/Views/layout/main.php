<?php
// app/Views/layout/main.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Berita Civitas Kampus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<style>
        body {
            padding-top: 56px;
           }

           #wrap {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

main {
    flex: 1;
}
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
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar-brand-text .sub-title {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.75);
            display: block;
            margin-top: -2px;
        }
        .nav-link {
            margin-right: 5px;
            
        }
        .navbar {
            background-color: #800000;
            transition: top 0.3s ease-in-out; /* Transisi untuk efek scroll */
            z-index: 1030; /* Pastikan di atas elemen lain */
        }
          :root {
        /* Menimpa warna 'danger' Bootstrap menjadi #800000 (Merah Marun) */
        --bs-danger: #800000;
        --bs-danger-rgb: 128, 0, 0;
    }

 /* Custom CSS untuk Mini Navbar Kategori */
.category-navbar .nav-link {
    color: var(--bs-body-color); /* Warna teks default */
    font-weight: 500; /* Set font-weight konsisten untuk semua kondisi (normal, hover, active) */
    position: relative;
    padding-bottom: 0.5rem; /* Memberi ruang untuk garis bawah */
    transition: all 0.3s ease;
    border-radius: 0; /* Hapus border-radius default Bootstrap pills */
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    /* text-shadow dihapus jika sebelumnya ada untuk ilusi bold */
}

.category-navbar .nav-link:hover {
    color: var(--bs-danger); /* Warna teks saat hover */
    background-color: transparent; /* Pastikan background tidak berubah */
    /* text-shadow dihapus */
}

.category-navbar .nav-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 3px; /* Jaga tinggi garis konsisten */
    background-color: transparent;
    transition: all 0.3s ease;
}

.category-navbar .nav-link:hover::after {
    background-color: var(--bs-danger); /* Warna garis saat hover */
}

.category-navbar .nav-link.active {
    color: var(--bs-danger); /* Warna teks saat aktif */
    background-color: transparent; /* Pastikan background tidak berubah */
    font-weight: 500; /* UBAH INI: Pastikan sama dengan normal (misal 500) */
    /* text-shadow dihapus */
}

.category-navbar .nav-link.active::after {
    background-color: var(--bs-danger); /* Warna garis saat aktif */
    height: 3px; /* Tinggi tetap sama dengan kondisi non-aktif */
}

/* Penyesuaian untuk tampilan mobile agar tidak terlalu rapat */
.category-navbar .nav-item {
    margin: 0 5px 10px 5px; /* Margin antar item */
}

@media (max-width: 767.98px) {
    .category-navbar .nav-link {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        font-size: 0.9em;
    }
    .category-navbar .nav-pills {
        flex-wrap: wrap; /* Izinkan wrap agar tidak overflow */
        justify-content: center !important;
    }
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
.carousel-item {
        /* Transisi default Bootstrap untuk geser */
        transition: transform 0.6s ease-in-out;
    }
/* Custom CSS for dropdown on hover */
@media (min-width: 992px) { /* Applies to larger screens (desktop/tablet) */
    .navbar-nav .dropdown:hover .dropdown-menu {
        display: block;
    }
}

.reaction-popup {
    display: none;
         position: absolute;
    top: -65px; /* Menggeser ke atas agar tidak menutupi tombol */
    left: 50%; /* Posisikan pop-up di tengah secara horizontal */
    transform: translateX(-50%); /* Geser pop-up kembali ke kiri sebesar 50% lebarnya */
}

.reaction-popup.show {
    display: flex;

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

/* Kustomisasi Offcanvas untuk Mobile */
@media (max-width: 991.98px) { /* Untuk ukuran di bawah large (lg) */
    .navbar-collapse {
        /* Sembunyikan navbar-collapse default di mobile */
        display: none !important;
    }
    .offcanvas-header {
        background-color: #800000; /* Warna header offcanvas */
        color: white;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .offcanvas-body {
        background-color: #800000; /* Warna background body offcanvas */
    }
    .offcanvas-body .navbar-nav .nav-item .nav-link,
    .offcanvas-body .navbar-nav .dropdown-item {
        color: white; /* Warna teks link di offcanvas */
        padding: 10px 15px;
        margin-right: 0; /* Hapus margin yang tidak perlu */
    }
    .offcanvas-body .navbar-nav .nav-item .nav-link:hover,
    .offcanvas-body .navbar-nav .dropdown-item:hover {
        background-color: #555;
        color: white;
    }
    .offcanvas-body .navbar-nav .dropdown-menu {
        background-color: #444; /* Warna dropdown menu di offcanvas */
        border: none;
        padding: 0;
        margin-top: 0;
    }
    .offcanvas-body .navbar-nav .dropdown-menu li:last-child .dropdown-item {
        border-bottom: none;
    }
    .offcanvas-body .navbar-nav .dropdown-toggle::after {
        margin-left: 0.5em; /* Sesuaikan panah dropdown */
    }
    .offcanvas-body .d-flex.w-100.me-auto {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    /* Pastikan tombol offcanvas-toggler terlihat */
    .navbar-toggler {
        display: block; /* Atau display: flex; jika menggunakan icon custom */
    }
}

</style>
</head>
<body id="wrap">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container column-gap-3">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="/uploads/logo-civitas.webp" alt="Logo Civitas" class="navbar-brand-logo">
                <div class="d-flex flex-column navbar-brand-text">
                    <span class="main-title">CIVITAS</span>
                    <span class="sub-title pt-1 ">Lembaga Pers Mahasiswa</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse column-gap-2" id="navbarNav">
                <form class="d-flex w-100 me-auto position-relative" action="<?= base_url('articles/search') ?>" method="GET">
                    <input class="form-control me-3 flex-grow-1" type="search" placeholder="Cari berita" aria-label="Search" name="q" id="desktop-search-input">
                    <button class="btn btn-outline-light" type="submit">Cari</button>
                    <div id="desktop-search-suggestions" class="list-group position-absolute w-100 shadow-lg" style="z-index: 1050; top: 100%; display: none; background-color: white; border-radius: 0.25rem;">
                        </div>
                </form>
                <ul class="navbar-nav ms-auto gap-2 ">
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('/') ? 'active' : '' ?>" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('berita*') ? 'active' : '' ?>" href="<?= base_url('berita') ?>">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('majalah*') ? 'active' : '' ?>" href="<?= base_url('majalah') ?>">Majalah</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link <?= url_is('menfess*') ? 'active' : '' ?>" href="<?= base_url('menfess') ?>">Menfess</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= url_is('lainnya*') ? 'active' : '' ?>" href="#" id="navbarDropdownLainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lainnya
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownLainnya">
                            <li><a class="dropdown-item" href="<?= base_url('cerpen') ?>">Cerpen</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('puisi') ?>">Puisi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= url_is('tentang') ? 'active' : '' ?> text-nowrap" href="/tentang">Tentang Kami</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu Civitas</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form class="d-flex w-100 mb-3 position-relative" action="<?= base_url('articles/search') ?>" method="GET">
                <input class="form-control me-2" type="search" placeholder="Cari berita..." aria-label="Search" name="q" id="mobile-search-input">
                <button class="btn btn-outline-light" type="submit">Cari</button>
                <div id="mobile-search-suggestions" class="list-group position-absolute w-100 shadow-lg" style="z-index: 1050; top: 100%; display: none; background-color: white; border-radius: 0.25rem;">
                    </div>
            </form>
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link <?= url_is('/') ? 'active' : '' ?>" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= url_is('berita*') ? 'active' : '' ?>" href="<?= base_url('berita') ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= url_is('majalah*') ? 'active' : '' ?>" href="<?= base_url('majalah') ?>">Majalah</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= url_is('lainnya*') ? 'active' : '' ?>" href="#" id="offcanvasDropdownLainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lainnya
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="offcanvasDropdownLainnya">
                        <li><a class="dropdown-item" href="<?= base_url('menfess') ?>">Menfess</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('puisi') ?>">Puisi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= url_is('tentang') ? 'active' : '' ?> text-nowrap" href="/tentang">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </div>

    <main class=" p-2 p-md-5 mt-4 mx-2 mx-md-5">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer  ">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Civitas Kampus. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('scripts') ?>

    <script>
        // JavaScript untuk Navbar Dinamis (sembunyi/muncul saat scroll)
        let prevScrollpos = window.scrollY;

        window.onscroll = function() {
            let currentScrollPos = window.scrollY;
            const navbar = document.querySelector('.navbar');

            if (navbar) {
                if (prevScrollpos > currentScrollPos) {
                    navbar.style.top = "0";
                } else {
                    if (currentScrollPos > navbar.offsetHeight && navbar.offsetHeight > 0) {
                        navbar.style.top = `-${navbar.offsetHeight}px`;
                    }
                }
                prevScrollpos = currentScrollPos;
            }
        }

        // =========================================================================
        // JavaScript untuk Fitur Pencarian Autocomplete
        // =========================================================================
        document.addEventListener('DOMContentLoaded', function() {
            const desktopSearchInput = document.getElementById('desktop-search-input');
            const desktopSuggestionsContainer = document.getElementById('desktop-search-suggestions');
            const mobileSearchInput = document.getElementById('mobile-search-input');
            const mobileSuggestionsContainer = document.getElementById('mobile-search-suggestions');

            let searchTimeout;
            const suggestionDelay = 300; // Delay dalam ms sebelum mengirim permintaan AJAX

            function fetchSuggestions(inputElement, suggestionsContainer) {
                const query = inputElement.value;
                if (query.length < 2) { // Minimal 2 karakter untuk memicu pencarian
                    suggestionsContainer.style.display = 'none';
                    return;
                }

                // Tampilkan loading/kosongkan dulu
                suggestionsContainer.innerHTML = '<a href="#" class="list-group-item list-group-item-action text-center py-2 text-muted">Memuat...</a>';
                suggestionsContainer.style.display = 'block';

                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    fetch(`<?= base_url('articles/suggestions') ?>?q=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            suggestionsContainer.innerHTML = ''; // Kosongkan container
                            if (data.length > 0) {
                                data.forEach(item => {
                                    const suggestionItem = document.createElement('a');
                                    suggestionItem.href = item.url;
                                    suggestionItem.classList.add('list-group-item', 'list-group-item-action');
                                    suggestionItem.textContent = item.title;
                                    suggestionItem.style.color = '#800000'; // Warna teks untuk rekomendasi (putih jika offcanvas)
                                    suggestionItem.style.backgroundColor = 'white'; // Background putih
                                    suggestionsContainer.appendChild(suggestionItem);
                                });
                            } else {
                                const noResultsItem = document.createElement('a');
                                noResultsItem.href = '#'; // Tidak bisa diklik
                                noResultsItem.classList.add('list-group-item', 'list-group-item-action', 'text-center', 'text-muted');
                                noResultsItem.textContent = `Tidak ada hasil untuk "${query}"`;
                                noResultsItem.style.color = '#800000';
                                noResultsItem.style.backgroundColor = 'white';
                                suggestionsContainer.appendChild(noResultsItem);
                            }
                            suggestionsContainer.style.display = 'block';
                        })
                        .catch(error => {
                            console.error('Error fetching search suggestions:', error);
                            suggestionsContainer.innerHTML = '<a href="#" class="list-group-item list-group-item-action text-center text-danger">Gagal memuat rekomendasi.</a>';
                            suggestionsContainer.style.display = 'block';
                        });
                }, suggestionDelay);
            }

            function hideSuggestions(suggestionsContainer) {
                setTimeout(() => { // Memberi sedikit waktu untuk klik link
                    suggestionsContainer.style.display = 'none';
                    suggestionsContainer.innerHTML = '';
                }, 100);
            }

            // Event Listener untuk Desktop Search
            if (desktopSearchInput) {
                desktopSearchInput.addEventListener('input', () => fetchSuggestions(desktopSearchInput, desktopSuggestionsContainer));
                desktopSearchInput.addEventListener('focus', () => {
                    if (desktopSearchInput.value.length >=2) { // Tampilkan kembali jika ada input
                        fetchSuggestions(desktopSearchInput, desktopSuggestionsContainer);
                    }
                });
                desktopSearchInput.addEventListener('blur', () => hideSuggestions(desktopSuggestionsContainer));
            }

            // Event Listener untuk Mobile Search
            if (mobileSearchInput) {
                mobileSearchInput.addEventListener('input', () => fetchSuggestions(mobileSearchInput, mobileSuggestionsContainer));
                mobileSearchInput.addEventListener('focus', () => {
                     if (mobileSearchInput.value.length >=2) { // Tampilkan kembali jika ada input
                        fetchSuggestions(mobileSearchInput, mobileSuggestionsContainer);
                    }
                });
                mobileSearchInput.addEventListener('blur', () => hideSuggestions(mobileSuggestionsContainer));
            }
             // =====================================================================
            // JavaScript untuk Like Button (dengan localStorage)
            // =====================================================================

            // Fungsi untuk menandai tombol like sebagai sudah di-like
            function markAsLiked(button) {
                const icon = button.querySelector('i');
                // icon.classList.remove('far', 'text-secondary'); // Hapus outline jika ada
                // icon.classList.add('fas', 'text-danger'); // Tambah solid dan merah
                button.classList.add('btn-danger'); // Ubah warna background tombol menjadi merah marun
                button.classList.remove('btn-light');
                button.disabled = true; // Disable tombol
            }

            // Inisialisasi status tombol like saat halaman dimuat
            document.querySelectorAll('.like-button').forEach(button => {
                const articleId = button.dataset.articleId;
                const likedArticles = JSON.parse(localStorage.getItem('likedArticles')) || {};

                if (likedArticles[articleId]) {
                    markAsLiked(button);
                }

                button.addEventListener('click', function() {
                    if (this.disabled) { // Cek lagi jika sudah disabled
                        // alert('Anda sudah menyukai artikel ini!'); // Opsional: notifikasi
                        return;
                    }

                    // Pastikan articleId ada
                    if (!articleId) {
                        console.error('Article ID tidak ditemukan pada tombol like.');
                        alert('Terjadi kesalahan. ID artikel tidak ditemukan.');
                        return;
                    }

                    // Cek lagi di localStorage sebelum kirim request
                    if (likedArticles[articleId]) {
                        // alert('Anda sudah menyukai artikel ini!'); // Opsional: notifikasi
                        markAsLiked(this); // Pastikan tombol di-disable
                        return;
                    }

                    const currentButton = this; // Simpan referensi tombol yang diklik
                    const likesCountSpan = currentButton.querySelector('.likes-count');

                    fetch(`<?= base_url('articles/like/') ?>${articleId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            // Jika Anda menggunakan CSRF, tambahkan token di sini:
                            // 'X-Requested-With': 'XMLHttpRequest',
                            // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            // Jika respons bukan 2xx, lempar error
                            return response.json().then(err => {
                                throw new Error(err.message || 'Gagal memproses like.');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.likes_count !== undefined) {
                            likesCountSpan.textContent = data.likes_count;

                            // Simpan status like ke localStorage
                            likedArticles[articleId] = true;
                            localStorage.setItem('likedArticles', JSON.stringify(likedArticles));

                            markAsLiked(currentButton); // Tandai tombol sebagai sudah di-like
                        } else {
                            console.error('Data likes_count tidak ditemukan dalam respons:', data);
                            alert('Gagal mendapatkan jumlah like terbaru.');
                        }
                    })
                    .catch(error => {
                        console.error('Error like artikel:', error);
                        alert('Terjadi kesalahan saat melakukan like: ' + error.message);
                    });
                });
            });

            // =====================================================================
            // Fungsi untuk Tombol Copy Link (Hanya di show.php)
            // =====================================================================
            const copyLinkButton = document.getElementById('copy-link-button');
            if (copyLinkButton) {
                copyLinkButton.addEventListener('click', function() {
                    const articleUrl = this.dataset.articleUrl;
                    navigator.clipboard.writeText(articleUrl).then(() => {
                        // Beri feedback ke user
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check"></i> Disalin!';
                        setTimeout(() => {
                            this.innerHTML = originalText;
                        }, 2000); // Kembali ke teks asli setelah 2 detik
                    }).catch(err => {
                        console.error('Gagal menyalin link:', err);
                        alert('Gagal menyalin link. Silakan salin manual.');
                    });
                });
            }
        });

    </script>
</body>
</html>