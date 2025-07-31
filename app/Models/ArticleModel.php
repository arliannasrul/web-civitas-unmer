<?php namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table      = 'articles'; // Nama tabel di database
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; // ID akan otomatis diisi
    protected $returnType     = 'array'; // Data akan dikembalikan dalam bentuk array
    protected $useSoftDeletes = false; // Tidak menggunakan soft delete

    // Kolom-kolom yang diizinkan untuk diisi/diupdate
    protected $allowedFields = ['title', 'slug', 'content', 'thumbnail', 'category_id', 'published_at', 'likes_count'];

    // Mengaktifkan timestamps (akan otomatis mengisi created_at dan updated_at)
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at'; // Tidak perlu jika useSoftDeletes false

    // Aturan validasi (kita tidak pakai sekarang, jadi biarkan kosong)
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}