<?php namespace App\Models;

use CodeIgniter\Model;

class MagazineModel extends Model
{
    protected $table      = 'magazines'; // Nama tabel di database
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    // Kolom-kolom yang diizinkan untuk diisi/diupdate
    protected $allowedFields = ['title', 'slug', 'description', 'cover_image', 'pdf_file', 'published_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}