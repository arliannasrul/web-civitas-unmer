<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Beranda<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <header class="header-hero">
        <div class="container ">
            <h1>Selamat Datang di Portal Berita Civitas Kampus</h1>
            <p>Temukan informasi terbaru seputar kegiatan kampus, prestasi mahasiswa, dan edisi majalah terbaru.</p>
        </div>
    </header>

    <section>
        <h2 class="section-title">Berita Terbaru</h2>
        <div class="row">
            <?php if (!empty($latestArticles)): ?>
                <?php foreach ($latestArticles as $article): ?>
                    <div class="col-md-4 col-8 mb-4" >
                        <div class="card">
                            <?php if ($article['thumbnail']): ?>
                                <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>" style="object-fit: cover; height: 250px;">
                            <?php else: ?>
                                <img src="[https://via.placeholder.com/400x200?text=No+Image](https://via.placeholder.com/400x200?text=No+Image)" class="card-img-top" alt="No Image" style="object-fit: cover; height: 200px;">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($article['title']) ?></h5>
                                <p class="card-text-muted"><?= date('d F Y', strtotime($article['published_at'])) ?></p>
                                <p class="card-text"><?= word_limiter(strip_tags($article['content']), 20, '...') ?></p>
                                <a href="/berita/<?= esc($article['slug']) ?>" class="btn btn-danger">Baca Selengkapnya</a> 
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Belum ada berita terbaru yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-end mt-3">
            <a href="/berita" class="btn btn-outline-danger">Lihat Semua Berita &raquo;</a>
        </div>
    </section>

    <section class="mt-5">
        <h2 class="section-title">Majalah Terbaru</h2>
        <div class="row">
            <?php if (!empty($latestMagazines)): ?>
                <?php foreach ($latestMagazines as $magazine): ?>
                    <div class="card mb-3 col-8 col-md-5">
                        <div class="row g-0">
                            <div class="col-md-4  d-flex justify-content-center align-items-center mb-3 mb-md-0">
                            <?php if ($magazine['cover_image']): ?>
                                <img src="/uploads/magazines/covers/<?= esc($magazine['cover_image']) ?>" class="img-fluid rounded-start" alt="<?= esc($magazine['title']) ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/400x200?text=No+Cover" class="card-img-top" alt="No Cover">
                            <?php endif; ?>
                            </div>
                            <div class="col-md-8 ">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($magazine['title']) ?></h5>
                                <p class="card-text-muted"><?= date('d F Y', strtotime($magazine['published_at'])) ?></p>
                                <p class="card-text"><?= esc(word_limiter(strip_tags($magazine['description']), 20)) ?></p>
                                <a href="/majalah/<?= esc($magazine['slug']) ?>" class="btn btn-success">Lihat Detail & Unduh</a>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Belum ada majalah terbaru yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-end mt-3">
            <a href="/majalah" class="btn btn-outline-success">Lihat Semua Majalah &raquo;</a>
        </div>
    </section>

<?= $this->endSection() ?>