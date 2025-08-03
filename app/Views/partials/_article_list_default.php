<?php
// app/Views/partials/_article_list_default.php
// Menampilkan daftar berita dengan layout grid standar untuk halaman kategori.

if (!empty($articles)): ?>
    <div class="row">
        <?php foreach ($articles as $article): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-3">
                    <?php if ($article['thumbnail']): ?>
                        <a href="<?= base_url('berita/' . esc($article['slug'])) ?>">
                            <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>" style="object-fit: cover; height: 180px;">
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('berita/' . esc($article['slug'])) ?>">
                            <img src="https://via.placeholder.com/400x180?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 180px;">
                        </a>
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= word_limiter(strip_tags(html_entity_decode($article['title'])), 8, '...') ?></h5>
                        <p class="card-text text-muted small">
                            Dipublikasi: <?= date('d F Y', strtotime($article['published_at'])) ?>
                        </p>
                        <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($article['content'])), 15, '...') ?></p>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                            <a href="<?= base_url('berita/' . esc($article['slug'])) ?>" class="btn btn-danger btn-sm" style="--bs-btn-bg: #800000">Baca Selengkapnya</a>
                            <span class="text-muted small">
                                <i class="fas fa-heart text-danger"></i> <?= esc($article['likes_count'] ?? 0) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="col-12 text-center">
        <p>Belum ada berita yang tersedia untuk kategori ini.</p>
    </div>
<?php endif; ?>