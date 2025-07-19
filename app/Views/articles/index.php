<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Berita Civitas<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-center mb-4">Semua Berita Civitas</h1>

    <div class="row">
        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if ($article['thumbnail']): ?>
                            <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>" style="object-fit: cover; height: 250px;">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 250px;">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= esc($article['title']) ?></h5>
                            <p class="card-text text-muted small">
                                Dipublikasi: <?= date('d F Y', strtotime($article['published_at'])) ?>
                            </p>
                            <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($article['content'])), 20, '...') ?></p>
                            <a href="/berita/<?= esc($article['slug']) ?>" class="btn btn-primary btn-sm mt-auto">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p>Belum ada berita yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="d-flex justify-content-center mt-4 text-danger">
        <?= $pager->links() ?>
    </div>
<?= $this->endSection() ?>