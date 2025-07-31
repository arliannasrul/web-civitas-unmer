<?php namespace App\Models;

use CodeIgniter\Model;

class MenfessModel extends Model
{
    protected $table      = 'menfess';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'content',
        'likes',
        'dislikes',
        'loves',
        'fires',
        'laughs',
        'cries'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validasi (opsional, tapi disarankan)
    protected $validationRules    = [
        'content' => 'required|max_length[280]', // Batasi seperti Twitter
    ];
    protected $validationMessages = [
        'content' => [
            'required'   => 'Konten menfess tidak boleh kosong.',
            'max_length' => 'Konten menfess terlalu panjang (maks. 280 karakter).',
        ],
    ];
    protected $skipValidation = false;
}