<?php
// app/Views/partials/_article_list.php
?>
<?php if (!empty($articles)): ?>
    <?php foreach ($articles as $article): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
            <div class="card h-100">
                <?php if ($article['thumbnail']): ?>
                    <img src="/uploads/articles/<?= esc($article['thumbnail']) ?>" class="card-img-top" alt="<?= esc($article['title']) ?>" style="object-fit: cover; height: 150px;">
                <?php else: ?>
                    <img src="https://via.placeholder.com/400x150?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 150px;">
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                    <h5 class="mb-2"><?= word_limiter(strip_tags(html_entity_decode($article['title'])), 8, '...') ?></h5>
                    <p class=" mb-2 text-muted small">
                        Dipublikasi pada: <?= date('d F Y', strtotime($article['published_at'])) ?>
                    </p>
                    <p class=""><?= word_limiter(strip_tags(html_entity_decode($article['content'])), 15, '...') ?></p>
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
<?php else: ?>
    <div class="col-12 text-center">
        <p>Belum ada berita untuk kategori ini.</p>
    </div>
<?php endif; ?>