<?php
// app/Views/articles/search_results.php
?>
<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="container my-5">
        <h1 class="mb-4 text-center"><?= esc($title) ?></h1>

        <?php if (!empty($searchQuery)): ?>
            <p class="lead text-center">Menampilkan hasil untuk: "<strong><?= esc($searchQuery) ?></strong>"</p>
        <?php endif; ?>

        <?php if (!empty($results)): ?>
            <div class="list-group">
                <?php foreach ($results as $article): ?>
                    <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="list-group-item list-group-item-action py-3">
                        <h5 class="mb-1 text-danger"><?= esc($article['title']) ?></h5>
                        <small class="text-muted">Dipublikasi: <?= date('d F Y', strtotime($article['published_at'])) ?></small>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-4">
                <a href="<?= base_url('berita') ?>" class="btn btn-outline-secondary">Kembali ke Semua Berita</a>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center" role="alert">
                Maaf, tidak ditemukan berita yang cocok dengan pencarian "<strong><?= esc($searchQuery) ?></strong>".
                <p class="mt-2 mb-0"><a href="<?= base_url('berita') ?>" class="alert-link">Lihat semua berita</a> atau coba kata kunci lain.</p>
            </div>
        <?php endif; ?>
    </div>

<?= $this->endSection() ?>