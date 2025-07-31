<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($article['title']) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row justify-content-center">
        <div class="col-lg-8 p-4">
            <h1 class="mb-3 text-center"><?= esc($article['title']) ?></h1>
            <p class="text-muted small text-center">Dipublikasi pada: <?= date('d F Y H:i', strtotime($article['published_at'])) ?></p>

            <?php if ($article['thumbnail']): ?>
                <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="img-fluid rounded mb-4 shadow-sm" alt="<?= esc($article['title']) ?>">
            <?php endif; ?>

            <div class="content-article mb-5">
                <?= html_entity_decode($article['content']) ?>
            </div>

            <?php if (!empty($recommendedArticles)): ?>
                <hr class="my-5">
                <h2 class="h4 mb-4 text-center">Berita Lainnya dari Kategori Ini</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($recommendedArticles as $recArticle): ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <?php if ($recArticle['thumbnail']): ?>
                                    <img src="/uploads/articles/<?= esc($recArticle['thumbnail']) ?>" class="card-img-top" alt="<?= esc($recArticle['title']) ?>" style="object-fit: cover; height: 150px;">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x150?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 150px;">
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title mb-2"><?= word_limiter(strip_tags(html_entity_decode($recArticle['title'])), 8, '...') ?></h5>
                                    <p class="card-text text-muted small">
                                        Dipublikasi: <?= date('d F Y', strtotime($recArticle['published_at'])) ?>
                                    </p>
                                    <a href="<?= base_url('berita/' . esc($recArticle['slug'])) ?>" class="btn btn-danger btn-sm mt-auto" style="--bs-btn-bg: #800000">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="text-center mt-5">
                <button type="button" class="btn btn-secondary" onclick="history.back()">&laquo; Kembali</button>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>