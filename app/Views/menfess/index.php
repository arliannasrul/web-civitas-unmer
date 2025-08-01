

<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1 class="text-center mb-4"><?= esc($title) ?></h1>
            <p class="text-center text-muted">Tempat untuk ungkapan, saran, kritik, atau gibahan anonim mahasiswa Universitas Merdeka Malang.</p>

            <div id="menfess-container" class="mt-5">
                <?php if (!empty($menfess)): ?>
                    <?php foreach ($menfess as $post): ?>
                       <div class="card mb-2 shadow-sm clickable-card" >
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3">
                                        <i class="fas fa-user-circle fa-2x text-secondary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Anonymous <?= esc($post['anonymous_id']) ?></h6>
                                        <small class="text-muted"><?= date('d F Y', strtotime($post['created_at'])) ?></small>
                                    </div>
                                </div>
                                <a class="card-text mb-5 text-decoration-none text-black" href="<?= base_url('menfess/' . esc($post['id'])) ?>"><?= nl2br(esc($post['content'])) ?></a>
                                <?php if ($post['image']): ?>
                                    <img src="/uploads/menfess/<?= esc($post['image']) ?>" class="img-fluid rounded mb-4" alt="Gambar menfess">
                                <?php endif; ?>
                                <hr>
                                   <div class="d-flex justify-content-between align-items-center mb-1">
                        <div> 
                            <?php if ($post['likes_count'] > 0): ?>
                            <i class="fas fa-thumbs-up text-primary"></i> <span id="likes-count-<?= esc($post['id']) ?>"><?= esc($post['likes_count']) ?></span>   
                            <?php endif; ?>
                              <?php if ($post['dislike_count'] > 0): ?>
                            <i class="fas fa-thumbs-down text-secondary ms-2"></i> <span id="dislike-count-<?= esc($post['id']) ?>"><?= esc($post['dislike_count']) ?></span>
                              <?php endif; ?>
                               <?php if ($post['fire_count'] > 0): ?>
                            <i class="fas fa-fire text-danger ms-2"></i> <span id="fire-count-<?= esc($post['id']) ?>"><?= esc($post['fire_count']) ?></span>
                                <?php endif; ?>
                                <?php if ($post['sad_count'] > 0): ?>
                            <i class="fas fa-sad-tear text-info ms-2"></i> <span id="sad-count-<?= esc($post['id']) ?>"><?= esc($post['sad_count']) ?></span>
                                <?php endif; ?>
                                <?php if ($post['laugh_count'] > 0): ?>
                            <i class="fas fa-laugh text-warning ms-2"></i> <span id="laugh-count-<?= esc($post['id']) ?>"><?= esc($post['laugh_count']) ?></span>
                                <?php endif; ?>
                                <?php if ($post['sorry_count'] > 0): ?>
                            <i class="fas fa-hand-holding-heart text-success ms-2"></i> <span id="sorry-count-<?= esc($post['id']) ?>"><?= esc($post['sorry_count']) ?></span>
                            <?php endif; ?>
                        </div>
                         
                    </div>

                               
                               <div class="d-flex justify-content-center align-items-center gap-4 mt-1">
    <div class="reaction-wrapper position-relative">
        <button class="btn btn-light react-toggle-button" data-id="<?= esc($post['id']) ?>">
            <i class="far fa-thumbs-up me-2"></i>Suka
        </button>
        <div class="reaction-popup gap-2 gap-md-4 position-absolute rounded-pill p-2 bg-light shadow-lg z-3">
            </div>
    </div>
    
    <a href="https://api.whatsapp.com/send?text=<?= urlencode('Lihat menfess ini: ' . base_url('menfess/' . esc($post['id']))) ?>" target="_blank" class="btn btn-outline-secondary">
        <i class="fab fa-whatsapp"></i> Bagikan
    </a>
</div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info text-center" role="alert">
                        Belum ada menfess yang tersedia saat ini.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reactedMenfess = JSON.parse(localStorage.getItem('reactedMenfess')) || {};

        // Loop untuk setiap tombol reaksi
        document.querySelectorAll('.react-toggle-button').forEach(button => {
            const menfessId = button.dataset.id;
            const reactionPopup = button.parentElement.querySelector('.reaction-popup');

            // Cek jika pengguna sudah pernah bereaksi
            if (reactedMenfess[menfessId]) {
                const reaction = reactedMenfess[menfessId];
                button.innerHTML = `<i class="fas fa-${reaction.icon} me-2 text-${reaction.color}"></i> ${reaction.label}`;
                button.classList.add('disabled');
            }

            // Event listener untuk tombol "Suka"
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // Mencegah klik menyebar ke elemen lain

                // Jika tombol dinonaktifkan, hentikan fungsi
                if (this.classList.contains('disabled')) {
                    return;
                }

                // Tutup semua pop-up reaksi lainnya
                document.querySelectorAll('.reaction-popup').forEach(popup => {
                    if (popup !== reactionPopup) {
                        popup.style.display = 'none';
                    }
                });

                // Tambahkan event listener untuk mengklik card
document.querySelectorAll('.clickable-card').forEach(card => {
    card.addEventListener('click', function(e) {
        // Cek apakah klik terjadi pada tombol reaksi atau area lain yang tidak seharusnya mengarahkan
        // Kita menggunakan .closest() untuk memeriksa apakah elemen yang diklik atau salah satu parent-nya adalah .reaction-wrapper atau .btn-outline-secondary
        if (e.target.closest('.reaction-wrapper') || e.target.closest('.btn-outline-secondary')) {
            // Jika iya, hentikan event dan jangan alihkan halaman
            return;
        }

        // Ambil URL dari atribut data-url
        const url = this.dataset.url;
        if (url) {
            // Alihkan ke halaman detail
            window.location.href = url;
        }
    });
});
                // Tampilkan atau sembunyikan pop-up yang sesuai
                if (reactionPopup.style.display === 'none' || reactionPopup.style.display === '') {
                    reactionPopup.style.display = 'flex';
                } else {
                    reactionPopup.style.display = 'none';
                }
            });
        });

        // Event listener untuk menutup pop-up saat mengklik di luar area reaksi
        document.body.addEventListener('click', function(e) {
            if (!e.target.closest('.reaction-wrapper')) {
                document.querySelectorAll('.reaction-popup').forEach(popup => {
                    popup.style.display = 'none';
                });
            }
        });

        // Event listener untuk setiap tombol reaksi di dalam pop-up
        document.querySelectorAll('.reaction-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const menfessId = this.dataset.id;
                const reactionType = this.dataset.reaction;
                const reactionLabel = this.dataset.label;
                const reactionIcon = this.dataset.icon;
                const reactionColor = this.querySelector('i').className.split(' ').find(cls => cls.startsWith('text-')).replace('text-', '');
                
                // Cek lagi apakah pengguna sudah bereaksi
                if (reactedMenfess[menfessId]) {
                    return;
                }

                const url = `<?= base_url('menfess/react/') ?>${menfessId}/${reactionType}`;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.new_count !== undefined) {
                        // Perbarui jumlah likes di halaman
                        const countSpan = document.getElementById(`likes-count-${menfessId}`);
                        if (countSpan) {
                            countSpan.textContent = data.new_count;
                        }

                        // Simpan reaksi ke local storage
                        const reactionData = {
                            type: reactionType,
                            label: reactionLabel,
                            icon: reactionIcon,
                            color: reactionColor
                        };
                        reactedMenfess[menfessId] = reactionData;
                        localStorage.setItem('reactedMenfess', JSON.stringify(reactedMenfess));
                        
                        // Perbarui tombol "Suka"
                        const toggleButton = document.querySelector(`.react-toggle-button[data-id="${menfessId}"]`);
                        if (toggleButton) {
                            toggleButton.innerHTML = `<i class="fas fa-${reactionIcon} me-2 text-${reactionColor}"></i> ${reactionLabel}`;
                            toggleButton.classList.add('disabled');
                        }

                        // Sembunyikan pop-up reaksi
                        const reactionPopup = button.closest('.reaction-popup');
                        if (reactionPopup) {
                            reactionPopup.style.display = 'none';
                        }
                    }
                })
                .catch(error => {
                    console.error('Error saat memberikan reaksi:', error);
                    alert('Terjadi kesalahan saat memberikan reaksi.');
                });
            });
        });
    });
</script>
<?= $this->endSection() ?>
