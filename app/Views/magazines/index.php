<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Semua Majalah<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-center mb-4">Semua Edisi Majalah</h1>

    <div class="row">
        <?php if (!empty($magazines)): ?>
            <?php foreach ($magazines as $magazine): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if ($magazine['cover_image']): ?>
                            <img src="/uploads/magazines/covers/<?= esc($magazine['cover_image']) ?>" class="card-img-top" alt="<?= esc($magazine['title']) ?>" style="object-fit: cover; height: 250px;">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/400x200?text=No+Cover" class="card-img-top" alt="No Cover" style="object-fit: cover; height: 250px;">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= esc($magazine['title']) ?></h5>
                            <p class="card-text text-muted small"><?= date('d F Y', strtotime($magazine['published_at'])) ?></p>
                            <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($magazine['description'])), 20, '...') ?></p>
                            <a href="/majalah/<?= esc($magazine['slug']) ?>" class="btn btn-success btn-sm mt-auto">Lihat Detail & Baca</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p>Belum ada edisi majalah yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
<?= $this->endSection() ?>