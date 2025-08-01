<?php namespace App\Models;

use CodeIgniter\Model;

class MenfessModel extends Model
{
    protected $table = 'menfess';
    protected $primaryKey = 'id';
    
    // Pastikan kolom-kolom ini ada di tabel database Anda
    protected $allowedFields = [
        'content', 
        'image', 
        'anonymous_id', 
        'likes_count', 
        'dislike_count', 
        'fire_count', 
        'sad_count', 
        'laugh_count', 
        'sorry_count'
    ];

    // --- Tambahkan kode ini ---
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; // Opsional, jika Anda ingin update juga otomatis
    // -------------------------
}