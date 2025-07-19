<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Semua Majalah<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-center mb-4">Semua Edisi Majalah</h1>

    <div class="row">
        <?php if (!empty($magazines)): ?>
            <?php foreach ($magazines as $magazine): ?>
               <div class="col-12 col-sm-6 col-md-4 mb-4"> <div class="card h-100 shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                            <?php if ($magazine['cover_image']): ?>
                                                <img src="/uploads/magazines/covers/<?= esc($magazine['cover_image']) ?>" class="img-fluid rounded-start" alt="<?= esc($magazine['title']) ?>" style="object-fit: cover; height: 240px; width: 100%;">
                                            <?php else: ?>
                                                <img src="https://via.placeholder.com/200x150?text=No+Cover" class="img-fluid rounded-start" alt="No Cover" style="object-fit: cover; height: 150px; width: 100%;">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title"><?= esc($magazine['title']) ?></h5>
                                                <p class="card-text text-muted small"><?= date('d F Y', strtotime($magazine['published_at'])) ?></p>
                                                <p class="card-text"><?= word_limiter(strip_tags(html_entity_decode($magazine['description'])), 12, '...') ?></p>
                                                <a href="/majalah/<?= esc($magazine['slug']) ?>" class="btn btn-success btn-sm mt-auto">Lihat Detail & Baca</a>
                                            </div>
                                        </div>
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


