<?php
// app/Views/menfess/index.php
?>
<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row justify-content-center">
        <div class="col-lg-8 p-4">
            <h1 class="text-center mb-4"><?= esc($title) ?></h1>

            <div class="alert alert-info text-center mb-4" role="alert">
                Ingin menfessmu tampil di sini? Kirimkan pesanmu melalui WhatsApp Civitas atau Email!
                <br>Tim kami akan menyeleksi menfess terbaik untuk dipublikasikan.
            </div>
<div id="menfessList">
    <?php if (!empty($menfess)): ?>
        <?php foreach ($menfess as $singleMenfess): // Ganti $menfessItem menjadi $singleMenfess ?>
            <?= $this->include('partials/_menfess_card', ['menfessData' => $singleMenfess]) // Ganti 'item' menjadi 'menfessData' ?>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            Belum ada menfess yang diposting.
        </div>
    <?php endif; ?>
</div>

        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // HAPUS SEMUA JAVASCRIPT YANG TERKAIT DENGAN FORM POSTING MENFESS
        // const menfessContentInput = document.getElementById('menfessContent');
        // const charCount = document.getElementById('charCount');
        // const contentFeedback = document.getElementById('contentFeedback');
        // const menfessForm = document.getElementById('menfessForm');
        // // ... dan semua event listener serta fetch untuk menfessForm

        const menfessList = document.getElementById('menfessList');

        // =====================================================================
        // JavaScript untuk Menangani Reaksi (Jempol, Dislike, Love, dll.)
        // Ini tetap dipertahankan
        // =====================================================================

        // Helper function to escape HTML for content display
        function escapeHtml(text) {
            var map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }

        function initReactionButtons(container) {
            const reactionsLocalStorageKey = 'menfessReactions';
            let menfessReactions = JSON.parse(localStorage.getItem(reactionsLocalStorageKey)) || {};

            container.querySelectorAll('.reaction-button').forEach(button => {
                const menfessId = button.dataset.menfessId;
                const reactionType = button.dataset.reactionType;

                if (menfessReactions[menfessId]) {
                    if (menfessReactions[menfessId][reactionType]) {
                        button.classList.remove('btn-outline-secondary');
                        button.classList.add('btn-primary');
                    }
                    if (Object.keys(menfessReactions[menfessId]).length > 0) {
                         button.disabled = true;
                    }
                }

                button.addEventListener('click', function() {
                    if (this.disabled) {
                        return;
                    }

                    if (menfessReactions[menfessId] && Object.keys(menfessReactions[menfessId]).length > 0) {
                        alert('Anda hanya bisa memberikan satu jenis reaksi per menfess.');
                        return;
                    }

                    const reactionCountSpan = this.querySelector('.reaction-count');
                    const currentButton = this;

                    fetch(`<?= base_url('menfess/react/') ?>${menfessId}/${reactionType}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => { throw new Error(err.message || 'Gagal mengirim reaksi.'); });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.count !== undefined) {
                            reactionCountSpan.textContent = data.count;

                            if (!menfessReactions[menfessId]) {
                                menfessReactions[menfessId] = {};
                            }
                            menfessReactions[menfessId][reactionType] = true;
                            localStorage.setItem(reactionsLocalStorageKey, JSON.stringify(menfessReactions));

                            currentButton.classList.remove('btn-outline-secondary');
                            currentButton.classList.add('btn-primary');

                            document.querySelectorAll(`.menfess-card[id="menfess-${menfessId}"] .reaction-button`).forEach(btn => {
                                btn.disabled = true;
                            });

                            // alert('Terima kasih atas reaksinya!'); // Feedback, opsional
                        } else {
                            console.error('Data count tidak ditemukan dalam respons:', data);
                            alert('Gagal mendapatkan jumlah reaksi terbaru.');
                        }
                    })
                    .catch(error => {
                        console.error('Error reacting to menfess:', error);
                        alert('Terjadi kesalahan saat mengirim reaksi: ' + error.message);
                    });
                });
            });
        }

        // Inisialisasi tombol reaksi untuk semua menfess yang ada saat DOMContentLoaded
        document.querySelectorAll('.menfess-card').forEach(card => {
            initReactionButtons(card);
        });
    });
</script>
<?= $this->endSection() ?>