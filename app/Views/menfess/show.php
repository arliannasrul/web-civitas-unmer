<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="text-center mb-4"><?= esc($title) ?></h1>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="me-3">
                            <i class="fas fa-user-circle fa-2x text-secondary"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Anonymous (ID: <?= esc($post['anonymous_id']) ?>)</h6>
                            <small class="text-muted"><?= date('d F Y H:i', strtotime($post['created_at'])) ?></small>
                        </div>
                    </div>
                    <p class="card-text mb-2"><?= nl2br(esc($post['content'])) ?></p>
                    <?php if ($post['image']): ?>
                        <img src="/uploads/menfess/<?= esc($post['image']) ?>" class="img-fluid rounded mb-3" alt="Gambar menfess">
                    <?php endif; ?>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <i class="fas fa-thumbs-up text-primary"></i> <span id="likes-count-<?= esc($post['id']) ?>"><?= esc($post['likes_count']) ?></span>
                            <i class="fas fa-thumbs-down text-secondary ms-2"></i> <span id="dislike-count-<?= esc($post['id']) ?>"><?= esc($post['dislike_count']) ?></span>
                            <i class="fas fa-fire text-danger ms-2"></i> <span id="fire-count-<?= esc($post['id']) ?>"><?= esc($post['fire_count']) ?></span>
                            <i class="fas fa-sad-tear text-info ms-2"></i> <span id="sad-count-<?= esc($post['id']) ?>"><?= esc($post['sad_count']) ?></span>
                            <i class="fas fa-laugh text-warning ms-2"></i> <span id="laugh-count-<?= esc($post['id']) ?>"><?= esc($post['laugh_count']) ?></span>
                            <i class="fas fa-hand-holding-heart text-success ms-2"></i> <span id="sorry-count-<?= esc($post['id']) ?>"><?= esc($post['sorry_count']) ?></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-secondary" onclick="history.back()">&laquo; Kembali</button>
                        <div class="btn-group" role="group">
                            <a href="https://api.whatsapp.com/send?text=<?= urlencode('Lihat menfess ini: ' . base_url('menfess/' . esc($post['id']))) ?>" target="_blank" class="btn btn-success">
                                <i class="fab fa-whatsapp"></i> Bagikan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk tombol salin tautan
        const copyLinkButton = document.getElementById('copy-link-button');
        if (copyLinkButton) {
            copyLinkButton.addEventListener('click', function() {
                const menfessUrl = this.dataset.url;
                navigator.clipboard.writeText(menfessUrl).then(() => {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check"></i> Disalin!';
                    setTimeout(() => {
                        this.innerHTML = originalText;
                    }, 3000);
                }).catch(err => {
                    console.error('Gagal menyalin link:', err);
                    alert('Gagal menyalin link. Silakan salin manual.');
                });
            });
        }
    });
</script>
<?= $this->endSection() ?>