<?php
// app/Views/menfess/show.php
?>
<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row justify-content-center">
        <div class="col-lg-8 p-4">
            <h1 class="text-center mb-4"><?= esc($title) ?></h1>

            
<?php if (!empty($menfess)): ?>
    <?= $this->include('partials/_menfess_card', ['menfessData' => $menfess]) // Ganti 'item' menjadi 'menfessData' ?>
    <div class="text-center mt-4">
        <button type="button" class="btn btn-secondary" onclick="history.back()">&laquo; Kembali</button>
    </div>
<?php else: ?>
    <div class="alert alert-warning text-center" role="alert">
        Menfess tidak ditemukan.
    </div>
<?php endif; ?>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Karena initReactionButtons di layout/main.php sudah mencakup semua .menfess-card,
        // seharusnya tidak perlu inisialisasi ulang di sini kecuali ada kebutuhan khusus.
    });
</script>
<?= $this->endSection() ?>