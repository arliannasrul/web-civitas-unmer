<?php
// app/Views/partials/_menfess_card.php
// Variabel yang diharapkan sekarang adalah $menfessData
?>
<div class="card mb-3 shadow-sm menfess-card" id="menfess-<?= esc($menfessData['id']) ?>">
    <div class="card-body">
        <p class="card-text"><?= esc($menfessData['content']) ?></p>
        <small class="text-muted">Diposting: <?= date('d F Y H:i', strtotime($menfessData['created_at'])) ?></small>
        <div class="d-flex justify-content-end align-items-center mt-2 reaction-buttons">
            <button class="btn btn-sm btn-outline-secondary me-1 reaction-button" data-menfess-id="<?= esc($menfessData['id']) ?>" data-reaction-type="likes"><i class="far fa-thumbs-up"></i> <span class="reaction-count"><?= esc($menfessData['likes'] ?? 0) ?></span></button>
            <button class="btn btn-sm btn-outline-secondary me-1 reaction-button" data-menfess-id="<?= esc($menfessData['id']) ?>" data-reaction-type="dislikes"><i class="far fa-thumbs-down"></i> <span class="reaction-count"><?= esc($menfessData['dislikes'] ?? 0) ?></span></button>
            <button class="btn btn-sm btn-outline-secondary me-1 reaction-button" data-menfess-id="<?= esc($menfessData['id']) ?>" data-reaction-type="loves"><i class="far fa-heart"></i> <span class="reaction-count"><?= esc($menfessData['loves'] ?? 0) ?></span></button>
            <button class="btn btn-sm btn-outline-secondary me-1 reaction-button" data-menfess-id="<?= esc($menfessData['id']) ?>" data-reaction-type="fires"><i class="far fa-fire"></i> <span class="reaction-count"><?= esc($menfessData['fires'] ?? 0) ?></span></button>
            <button class="btn btn-sm btn-outline-secondary me-1 reaction-button" data-menfess-id="<?= esc($menfessData['id']) ?>" data-reaction-type="laughs"><i class="far fa-laugh"></i> <span class="reaction-count"><?= esc($menfessData['laughs'] ?? 0) ?></span></button>
            <button class="btn btn-sm btn-outline-secondary reaction-button" data-menfess-id="<?= esc($menfessData['id']) ?>" data-reaction-type="cries"><i class="far fa-sad-tear"></i> <span class="reaction-count"><?= esc($menfessData['cries'] ?? 0) ?></span></button>
            <a href="<?= base_url('menfess/' . esc($menfessData['id'])) ?>" class="btn btn-sm btn-outline-info ms-2"><i class="fas fa-external-link-alt"></i></a>
        </div>
    </div>
</div>