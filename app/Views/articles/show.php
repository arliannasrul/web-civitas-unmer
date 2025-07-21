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

            <div class="text-center mt-5">
                <a href="/berita" class="btn btn-secondary">&laquo; Kembali ke Daftar Berita</a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>