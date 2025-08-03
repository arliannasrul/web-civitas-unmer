<?php
// app/Views/articles/index.php
?>
<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="text-center mb-5"><?= esc($title) ?></h1>
<div class="mx-5">
    <?php if ($activeCategorySlug === null): // Tampilan halaman /berita utama ?>
        <?php if (!empty($latestOverallArticles)): ?>
            <section class="mb-5">
                <h2 class="section-title mb-4">Berita Terbaru</h2>
                <?= view('partials/_article_list', ['articles' => $latestOverallArticles]); ?>
            </section>
            <hr class="my-5">
        <?php endif; ?>

        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <section class="mb-5">
                    <h2 class="section-title mb-4"> <?= esc($category['name']) ?></h2>
                    <div class="row">
                        <?php if (!empty($articlesByCategories[$category['slug']])): ?>
                            <?= view('partials/_article_list', ['articles' => $articlesByCategories[$category['slug']]]); ?>
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
        <section class="mb-5">
            <?= view('partials/_article_list_default', ['articles' => $articles]); ?>
        </section>
        <div class="d-flex justify-content-center mt-4 text-danger">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>