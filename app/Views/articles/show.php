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
                  <div class="text-center mt-5 mb-3">
                <button type="button" class="btn btn-secondary" onclick="history.back()">&laquo; Kembali</button>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-5">
                <button class="btn btn-light like-button d-flex align-items-center" data-article-id="<?= esc($article['id']) ?>">
                    <i class="fas fa-heart text-danger me-2"></i> <span class="likes-count"><?= esc($article['likes_count'] ?? 0) ?></span>
                </button>
                
                <div>
                    <button class="btn  btn-outline-secondary btn-sm me-2" id="copy-link-button" data-article-url="<?= base_url('berita/' . esc($article['slug'])) ?>">
                        <i class="fas fa-link"></i> Bagikan Berita
                    </button>
                    <div class="btn-group" role="group" aria-label="Share buttons">
                        <a href="https://api.whatsapp.com/send?text=<?= urlencode(esc($article['title']) . ' - ' . base_url('berita/' . esc($article['slug']))) ?>" target="_blank" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(base_url('berita/' . esc($article['slug']))) ?>&quote=<?= urlencode(esc($article['title'])) ?>" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?= urlencode(base_url('berita/' . esc($article['slug']))) ?>&text=<?= urlencode(esc($article['title'])) ?>" target="_blank" class="btn btn-info btn-sm">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode(base_url('berita/' . esc($article['slug']))) ?>&title=<?= urlencode(esc($article['title'])) ?>&summary=<?= urlencode(word_limiter(strip_tags(html_entity_decode($article['content'])), 20)) ?>" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>


            <?php if (!empty($recommendedArticles)): ?>
                <hr class="my-5">
                <h2 class="h4 mb-4 text-center">Berita Lainnya</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($recommendedArticles as $recArticle): ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <?php if ($recArticle['thumbnail']): ?>
                                    <img src="/uploads/articles/<?= esc($recArticle['thumbnail']) ?>" class="card-img-top" alt="<?= esc($recArticle['title']) ?>" style="object-fit: cover; height: 150px;">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x150?text=No+Image" class="card-img-top" alt="No Image" style="object-fit: cover; height: 150px;">
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title mb-2"><?= word_limiter(strip_tags(html_entity_decode($recArticle['title'])), 8, '...') ?></h5>
                                    <p class="card-text text-muted small">
                                        Dipublikasi: <?= date('d F Y', strtotime($recArticle['published_at'])) ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                                        <a href="<?= base_url('berita/' . esc($recArticle['slug'])) ?>" class="btn btn-danger btn-sm" style="--bs-btn-bg: #800000">Baca Selengkapnya</a>
                                        <span class="text-muted small">
                                            <i class="fas fa-heart text-danger"></i> <?= esc($recArticle['likes_count'] ?? 0) ?>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
          
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // =====================================================================
        // Fungsi untuk Menangani Like Button
        // =====================================================================
        document.querySelectorAll('.like-button').forEach(button => {
            button.addEventListener('click', function() {
                const articleId = this.dataset.articleId;
                const likesCountSpan = this.querySelector('.likes-count');

                fetch(`<?= base_url('articles/like/') ?>${articleId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        // Jika Anda menggunakan CSRF, tambahkan token di sini:
                        // 'X-Requested-With': 'XMLHttpRequest',
                        // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        // Jika respons bukan 2xx, lempar error
                        return response.json().then(err => { throw new Error(err.message || 'Gagal memproses like.'); });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.likes_count !== undefined) {
                        likesCountSpan.textContent = data.likes_count;
                        // Opsional: berikan feedback visual, misal tombol berubah warna
                        this.classList.add('btn-danger'); // Atau ubah ikon menjadi terisi
                        this.classList.remove('btn-light');
                        // Untuk contoh sederhana, kita tidak mengimplementasikan unlike, hanya like.
                        // Jika ingin unlike, Anda perlu melacak status like user (via session/cookie/db)
                    } else {
                        console.error('Data likes_count tidak ditemukan dalam respons:', data);
                        alert('Gagal mendapatkan jumlah like terbaru.');
                    }
                })
                .catch(error => {
                    console.error('Error like artikel:', error);
                    alert('Terjadi kesalahan saat melakukan like: ' + error.message);
                });
            });
        });

        // =====================================================================
        // Fungsi untuk Tombol Copy Link
        // =====================================================================
        const copyLinkButton = document.getElementById('copy-link-button');
        if (copyLinkButton) {
            copyLinkButton.addEventListener('click', function() {
                const articleUrl = this.dataset.articleUrl;
                navigator.clipboard.writeText(articleUrl).then(() => {
                    // Beri feedback ke user
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check"></i> Disalin!';
                    setTimeout(() => {
                        this.innerHTML = originalText;
                    }, 3000); // Kembali ke teks asli setelah 2 detik
                }).catch(err => {
                    console.error('Gagal menyalin link:', err);
                    alert('Gagal menyalin link. Silakan salin manual.');
                });
            });
        }
    });
</script>
<?= $this->endSection() ?>