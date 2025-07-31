<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

    <h1 class="text-center mb-5"><?= esc($title) ?></h1>
<div class="">
    <?php if ($activeCategorySlug === null): // Tampilan per kategori di halaman /berita ?>
        <?php if (!empty($latestOverallArticles)): ?>
            <section class="mb-5">
                <h2 class="section-title mb-4">Berita Terbaru</h2>
                <div class="row">
                    <?php foreach ($latestOverallArticles as $article): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card h-100 shadow-sm">
                                <?php if ($article['thumbnail']): ?>
                                    <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>" style="object-fit: cover; height: 280px;">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x180?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 180px;">
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= word_limiter(strip_tags(html_entity_decode($article['title'])), 8, '...') ?></h5>
                                    <p class="card-text text-muted small">
                                        Dipublikasi: <?= date('d F Y', strtotime($article['published_at'])) ?>
                                    </p>
                                    <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($article['content'])), 15, '...') ?></p>
                                    <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="btn btn-danger btn-sm mt-auto" style="--bs-btn-bg: #800000">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-end mt-3">
                    <a href="<?= base_url('berita?page=2') ?>" class="btn btn-outline-danger" style="--bs-btn-border-color: #800000; --bs-btn-hover-bg: #800000; --bs-btn-color: #800000;">Lihat Lebih Banyak Berita &raquo;</a>
                </div>
            </section>
            <hr class="my-5">
        <?php endif; ?>


        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <section class="mb-5">
                    <h2 class="section-title mb-4"> <?= esc($category['name']) ?></h2>
                    <div class="row">
                        <?php if (!empty($articlesByCategories[$category['slug']])): ?>
                            <?php foreach ($articlesByCategories[$category['slug']] as $article): ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <?php if ($article['thumbnail']): ?>
                                            <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>" style="object-fit: cover; height: 280px;">
                                        <?php else: ?>
                                            <img src="https://via.placeholder.com/400x180?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 180px;">
                                        <?php endif; ?>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title"><?= word_limiter(strip_tags(html_entity_decode($article['title'])), 8, '...') ?></h5>
                                            <p class="card-text text-muted small">
                                                Dipublikasi: <?= date('d F Y', strtotime($article['published_at'])) ?>
                                            </p>
                                            <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($article['content'])), 15, '...') ?></p>
                                            <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="btn btn-danger btn-sm mt-auto" style="--bs-btn-bg: #800000">Baca Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center">
                                <p class="text-muted">Belum ada berita untuk kategori ini.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="text-end mt-3">
                        <a href="<?= base_url('berita/kategori/' . esc($category['slug'])) ?>" class="btn btn-outline-danger" style="--bs-btn-border-color: #800000; --bs-btn-hover-bg: #800000; --bs-btn-color: #800000;">Lihat Semua Berita <?= esc($category['name']) ?> &raquo;</a>
                    </div>
                </section>
                <?php if ($category !== end($categories)): // Tambahkan HR kecuali untuk kategori terakhir ?>
                    <hr class="my-5">
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p>Belum ada kategori berita yang tersedia.</p>
            </div>
        <?php endif; ?>

    <?php else: // Tampilan untuk kategori spesifik dengan pagination ?>

        <div class="row">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <?php if ($article['thumbnail']): ?>
                                <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>" style="object-fit: cover; height: 180px;">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/400x180?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 180px;">
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= word_limiter(strip_tags(html_entity_decode($article['title'])), 8, '...') ?></h5>
                                <p class="card-text text-muted small">
                                    Dipublikasi: <?= date('d F Y', strtotime($article['published_at'])) ?>
                                </p>
                                <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($article['content'])), 15, '...') ?></p>
                                <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="btn btn-danger btn-sm mt-auto" style="--bs-btn-bg: #800000">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>Belum ada berita yang tersedia untuk kategori ini.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-center mt-4 text-danger">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>