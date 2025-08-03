<?php
// app/Views/partials/_article_list.php
?>
<?php if (!empty($articles)): ?>
    <?php
        // Ambil berita pertama untuk layout besar jika ada
        $firstArticle = array_shift($articles);
    ?>
    <div class="row">
        <div class="col-lg-5 mb-4 fs-5">
            <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
                <?php if ($firstArticle['thumbnail']): ?>
                    <a href="<?= base_url('berita/' . esc($firstArticle['slug'])) ?>">
                        <img src="/uploads/articles/<?= esc($firstArticle['thumbnail']) ?>" class="card-img-top" alt="<?= esc($firstArticle['title']) ?>" style="object-fit: cover; height: 300px;">
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('berita/' . esc($firstArticle['slug'])) ?>">
                        <img src="https://via.placeholder.com/800x350?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 3000px;">
                    </a>
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title fw-bold">
                        <a href="<?= base_url('berita/' . esc($firstArticle['slug'])) ?>" class="text-decoration-none text-dark">
                            <?= esc($firstArticle['title']) ?>
                        </a>
                    </h3>
                    <p class="card-text text-muted small">
                        Dipublikasi pada: <?= date('d F Y', strtotime($firstArticle['published_at'])) ?>
                    </p>
                    <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($firstArticle['content'])), 30, '...') ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                        <a href="<?= base_url('berita/' . esc($firstArticle['slug'])) ?>" class="btn btn-danger btn-sm" style="--bs-btn-bg: #800000">Baca Selengkapnya</a>
                        <span class="text-muted small">
                            <i class="fas fa-heart text-danger"></i> <?= esc($firstArticle['likes_count'] ?? 0) ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 fs-7">
            <div class="d-flex flex-column gap-0">
                <?php foreach ($articles as $article): ?>
                    <div class=" shadow-sm border-0  overflow-hidden">
                        <div class="p-2 row g-0 align-items-center">
                            <div class="col-md-4 pe-4">
                                <?php if ($article['thumbnail']): ?>
                                    <a href="<?= base_url('berita/' . esc($article['slug'])) ?>">
                                        <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="img-fluid rounded-start w-100" alt="<?= esc($article['title']) ?>" style="object-fit: cover; max-height: 200px;">
                                    </a>
                                <?php else: ?>
                                    <a href="<?= base_url('berita/' . esc($article['slug'])) ?>">
                                        <img src="https://via.placeholder.com/400x200?text=No+Image" class="img-fluid rounded-start w-100" alt="No Image" style="object-fit: cover; max-height: 2000px;">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title mb-2">
                                        <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="text-decoration-none text-dark">
                                            <?= word_limiter(strip_tags(html_entity_decode($article['title'])), 8, '...') ?>
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted small">
                                        Dipublikasi: <?= date('d F Y', strtotime($article['published_at'])) ?>
                                    </p>
                                    <p class="card-text mb-3  d-md-block"><?= word_limiter(strip_tags(html_entity_decode($article['content'])), 15, '...') ?></p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
                                        <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="btn btn-danger btn-sm" style="--bs-btn-bg: #800000">Baca Selengkapnya</a>
                                        <span class="text-muted small">
                                            <i class="fas fa-heart text-danger"></i> <?= esc($article['likes_count'] ?? 0) ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="col-12 text-center">
        <p>Belum ada berita yang tersedia.</p>
    </div>
<?php endif; ?>