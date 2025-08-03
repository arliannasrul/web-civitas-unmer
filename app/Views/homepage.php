<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Beranda<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <header class="header-hero">
        <div class="container">
            <h1 class="text-center">Selamat Datang di Portal Berita Lembaga Pers Mahasiswa Civitas Universitas Merdeka Malang</h1>
        </div>
    </header>

    <div class="row justify-content-between  container">
        <div class="col-md-12 col-lg-9 me-auto">
            <div id="carouselExampleCaptions" class="carousel slide  mb-5 "  data-bs-ride="carousel" data-bs-interval="3000" >
                <div class="carousel-indicators">
                    <?php if (!empty($latestArticles)): ?>
                        <?php foreach (array_slice($latestArticles, 0, 3) as $key => $article): ?>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $key ?>" class="<?= $key === 0 ? 'active' : '' ?>" aria-current="<?= $key === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $key + 1 ?>"></button>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="carousel-inner">
                    <?php if (!empty($latestArticles)): ?>
                        <?php foreach (array_slice($latestArticles, 0, 3) as $key => $article): ?> <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                                <a href="<?= base_url('berita/' . esc($article['slug'])) ?>"> <?php if ($article['thumbnail']): ?>
                                        <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="d-block w-100 carousel-img rounded-3" alt="<?= esc($article['title']) ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/800x400?text=No+Image" class="d-block w-100 carousel-img" alt="No Image">
                                    <?php endif; ?>
                                    <div class="carousel-caption  d-md-block bg-dark bg-opacity-75 p-3 rounded">
                                        <h5 class="text-white"><?= esc($article['title']) ?></h5>
                                        <p class="text-white-50"><?= date('d F Y', strtotime($article['published_at'])) ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/800x400?text=Belum+Ada+Berita" class="d-block w-100 carousel-img" alt="No News">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 p-3 rounded">
                                <h5 class="text-white">Tidak Ada Berita Unggulan</h5>
                                <p class="text-white-50">Silakan tambahkan berita untuk ditampilkan di sini.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <section class="mb-2 ">
                <nav class="category-navbar mb-4">
                    <ul class="nav nav-pills justify-content-center justify-content-md-start">
                        <li class="nav-item">
                            <a class="nav-link category-nav-link active" data-category-slug="all" href="#" aria-current="page">Berita Terbaru</a>
                        </li>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <li class="nav-item">
                                    <a class="nav-link category-nav-link" data-category-slug="<?= esc($category['slug']) ?>" href="#">
                                        <?= esc($category['name']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </section>

            <section class="mb-5">
                <h2 class="section-title">Berita Terbaru</h2>
                <div id="dynamic-articles-container" class="row">
                    <?php
                        echo view('partials/_article_list', ['articles' => $latestArticles]);
                    ?>
                </div>
                <div class="text-end mt-3">
                    <a href="<?= base_url('berita') ?>" class="btn btn-outline-danger" style="--bs-btn-border-color: #800000; --bs-btn-hover-bg: #800000; --bs-btn-color: #800000;">Lihat Semua Berita &raquo;</a>
                </div>
            </section>
            <section class="mt-5 mb-5">
                <h2 class="section-title">Edisi Majalah Pilihan</h2>
                <div class="row">
                    <?php if (!empty($latestMagazines)): ?>
                        <?php foreach ($latestMagazines as $magazine): ?>
                            <div class="col-12 col-sm-6 col-md-6 mb-4"> <div class="card h-100 shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                            <?php if ($magazine['cover_image']): ?>
                                                <img src="/uploads/magazines/covers/<?= esc($magazine['cover_image']) ?>" class="img-fluid rounded-start" alt="<?= esc($magazine['title']) ?>" style="object-fit: cover; height: 230px; width: 100%;">
                                            <?php else: ?>
                                                <img src="https://via.placeholder.com/200x150?text=No+Cover" class="img-fluid rounded-start" alt="No Cover" style="object-fit: cover; height: 150px; width: 100%;">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title"><?= esc($magazine['title']) ?></h5>
                                                <p class="card-text text-muted small"><?= date('d F Y', strtotime($magazine['published_at'])) ?></p>
                                                <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($magazine['description'])), 12, '...') ?></p>
                                                <a href="<?= base_url('majalah/' . esc($magazine['slug'])) ?>" class="btn btn-success btn-sm mt-auto">Lihat Detail & Baca</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center">
                            <p>Belum ada edisi majalah pilihan yang tersedia.</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="text-end mt-3">
                    <a href="<?= base_url('majalah') ?>" class="btn btn-outline-success">Lihat Semua Majalah &raquo;</a>
                </div>
            </section>
        </div>

        <div class="col-md-3 me-auto ">
            <aside class="sticky-top" style="top: 70px;"> 
                <div class="p-2 bg-light rounded shadow-sm mb-4">
                    <h4 class="mb-3 text-danger">Berita Terpopuler</h4>
                    <ul class="list-unstyled">
                        <?php if (!empty($sidebarPopularArticles)): ?>
                            <?php foreach ($sidebarPopularArticles as $article): ?>
                                <li class="d-flex align-items-center sidebar-list-item">
                                    <?php if ($article['thumbnail']): ?>
                                        <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="sidebar-img me-3" alt="<?= esc($article['title']) ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/80x60?text=No+Image" class="sidebar-img me-3" alt="No Image">
                                    <?php endif; ?>
                                    <div>
                                        <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="sidebar-link d-block"><?= esc($article['title']) ?></a>
                                        <span class="sidebar-text-muted">Like: <?= esc($article['likes_count'] ?? 0) ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><p>Belum ada berita terpopuler di sidebar.</p></li>
                        <?php endif; ?>
                    </ul>
                    <div class="text-end">
                        <a href="<?= base_url('berita') ?>" class="btn btn-sm btn-outline-danger" style="--bs-btn-color: #800000; --bs-btn-border-color: #800000; --bs-btn-hover-bg: #800000;">Lihat Semua</a>
                    </div>
                </div>
                <div class="p-2 bg-light rounded shadow-sm mb-4">
                    <h4 class="mb-3 text-danger">Berita Terbaru</h4>
                    <ul class="list-unstyled">
                        <?php if (!empty($sidebarLatestArticles)): ?>
                            <?php foreach ($sidebarLatestArticles as $article): ?>
                                <li class="d-flex align-items-center sidebar-list-item">
                                    <?php if ($article['thumbnail']): ?>
                                        <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="sidebar-img me-3" alt="<?= esc($article['title']) ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/80x60?text=No+Image" class="sidebar-img me-3" alt="No Image">
                                    <?php endif; ?>
                                    <div>
                                        <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="sidebar-link d-block"><?= esc($article['title']) ?></a>
                                        <span class="sidebar-text-muted"><?= date('d M Y', strtotime($article['published_at'])) ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><p>Belum ada berita terbaru di sidebar.</p></li>
                        <?php endif; ?>
                    </ul>
                    <div class="text-end">
                        <a href="<?= base_url('berita') ?>" class="btn btn-sm btn-outline-danger" style="--bs-btn-color: #800000; --bs-btn-border-color: #800000; --bs-btn-hover-bg: #800000;">Lihat Semua</a>
                    </div>
                </div>
                <div class="p-4 bg-light rounded shadow-sm mb-4">
                    <h4 class="mb-3 text-success">Majalah Terbaru</h4>
                    <ul class="list-unstyled">
                        <?php if (!empty($sidebarLatestMagazines)): ?>
                            <?php foreach ($sidebarLatestMagazines as $magazine): ?>
                                <li class="d-flex align-items-center sidebar-list-item">
                                    <?php if ($magazine['cover_image']): ?>
                                        <img src="/uploads/magazines/covers/<?= esc($magazine['cover_image']) ?>" class="sidebar-img me-3" alt="<?= esc($magazine['title']) ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/80x60?text=No+Cover" class="sidebar-img me-3" alt="No Cover">
                                    <?php endif; ?>
                                    <div>
                                        <a href="<?= base_url('majalah/' . esc($magazine['slug'])) ?>" class="sidebar-link d-block"><?= esc($magazine['title']) ?></a>
                                        <span class="sidebar-text-muted"><?= date('d M Y', strtotime($magazine['published_at'])) ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><p>Belum ada majalah terbaru di sidebar.</p></li>
                        <?php endif; ?>
                    </ul>
                    <div class="text-end">
                        <a href="<?= base_url('majalah') ?>" class="btn btn-sm btn-outline-success">Lihat Semua</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryLinks = document.querySelectorAll('.category-nav-link');
        const articlesContainer = document.getElementById('dynamic-articles-container');
        const sectionTitle = document.querySelector('.section-title'); // Judul "Berita Terbaru"

        categoryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah navigasi default link

                categoryLinks.forEach(navLink => navLink.classList.remove('active'));
                this.classList.add('active');

                const categorySlug = this.dataset.categorySlug;
                const url = `<?= base_url('articles/ajax') ?>?category=${categorySlug}`;

                sectionTitle.textContent = this.textContent === 'Semua Berita' ? 'Berita Terbaru' : `${this.textContent}`;

                articlesContainer.innerHTML = '<div class="col-12 text-center py-5"><div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2 text-muted">Memuat berita...</p></div>';

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        articlesContainer.innerHTML = data.html;
                    })
                    .catch(error => {
                        console.error('Error loading articles:', error);
                        articlesContainer.innerHTML = '<div class="col-12 text-center py-5"><p class="text-danger">Gagal memuat berita. Silakan coba lagi.</p></div>';
                    });
            });
        });
    });
</script>
<?= $this->endSection() ?>