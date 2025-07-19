<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($magazine['title']) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="mb-3 text-center"><?= esc($magazine['title']) ?></h1>
            <p class="text-muted small text-center">Dipublikasi pada: <?= date('d F Y H:i', strtotime($magazine['published_at'])) ?></p>

            <div class="row justify-content-center mb-4">
                <div class="col-md-8">
                    <?php if ($magazine['cover_image']): ?>
                        <img src="/uploads/magazines/covers/<?= esc($magazine['cover_image']) ?>" class="img-fluid rounded shadow-sm mb-3" alt="Cover <?= esc($magazine['title']) ?>">
                    <?php endif; ?>
                    <p class="lead text-center"><?= html_entity_decode(esc($magazine['description'])) ?></p>
                </div>
            </div>

            <hr>

            <h2 class="text-center mb-4">Baca Majalah Online</h2>

            <?php if ($magazine['pdf_file']): ?>
                <div class="text-center mb-3">
                    <a href="/uploads/magazines/pdfs/<?= esc($magazine['pdf_file']) ?>" class="btn btn-primary" download>
                        <i class="bi bi-download"></i> Unduh PDF Majalah
                    </a>
                </div>
                <div class="embed-responsive embed-responsive-16by9" style="height: 800px; width: 100%; border: 1px solid #ddd;">
                    <iframe class="embed-responsive-item w-100 h-100" src="/uploads/magazines/pdfs/<?= esc($magazine['pdf_file']) ?>#toolbar=0&navpanes=0&scrollbar=0" frameborder="0">
                        Browser Anda tidak mendukung tampilan PDF. Silakan <a href="/uploads/magazines/pdfs/<?= esc($magazine['pdf_file']) ?>" download>unduh PDF</a> untuk membacanya.
                    </iframe>
                </div>
                <p class="text-muted small text-center mt-2">Jika tampilan PDF tidak muncul, browser Anda mungkin tidak mendukungnya. Silakan gunakan tombol "Unduh PDF Majalah".</p>
            <?php else: ?>
                <div class="alert alert-warning text-center" role="alert">
                    File PDF majalah ini tidak tersedia.
                </div>
            <?php endif; ?>

            <div class="text-center mt-5">
                <a href="/majalah" class="btn btn-secondary">&laquo; Kembali ke Daftar Majalah</a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>