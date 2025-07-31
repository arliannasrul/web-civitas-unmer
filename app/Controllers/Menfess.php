<?php namespace App\Controllers;

use App\Models\MenfessModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\API\ResponseTrait;

class Menfess extends BaseController
{
    use ResponseTrait;

    protected $menfessModel;

    public function __construct()
    {
        $this->menfessModel = new MenfessModel();
        // helper('form'); // Hapus baris ini karena form tidak lagi ada
    }

    public function index(): string
    {
        $data = [
            'title'   => 'Menfess Civitas',
            'menfess' => $this->menfessModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        
        return view('menfess/index', $data);
    }

    // ===============================================================
    // HAPUS ATAU KOMENTARI METHOD CREATE INI
    // public function create()
    // {
    //     if ($this->request->isAJAX() && $this->request->getMethod() === 'post') {
    //         $rules = [
    //             'content' => 'required|max_length[280]',
    //         ];

    //         if (!$this->validate($rules)) {
    //             return $this->failValidationErrors($this->validator->getErrors());
    //         }

    //         $this->menfessModel->save([
    //             'content' => $this->request->getPost('content'),
    //         ]);

    //         $newMenfess = $this->menfessModel->orderBy('created_at', 'DESC')->first();

    //         return $this->respondCreated(['message' => 'Menfess berhasil diposting!', 'menfess' => $newMenfess]);
    //     }
    //     return $this->fail('Invalid request');
    // }
    // ===============================================================

    public function show($id = null): string
    {
        $menfess = $this->menfessModel->find($id);

        if (!$menfess) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'   => 'Menfess #' . $menfess['id'],
            'menfess' => $menfess,
        ];
        return view('menfess/show', $data);
    }

    public function react($id = null, $reactionType = null)
    {
        if ($this->request->isAJAX() && $this->request->getMethod() === 'post') {
            $menfess = $this->menfessModel->find($id);

            if (!$menfess) {
                return $this->failNotFound('Menfess tidak ditemukan.');
            }

            $allowedReactions = ['likes', 'dislikes', 'loves', 'fires', 'laughs', 'cries'];

            if (!in_array($reactionType, $allowedReactions)) {
                return $this->failValidationErrors('Jenis reaksi tidak valid.');
            }

            $menfess[$reactionType]++;
            $this->menfessModel->update($id, [$reactionType => $menfess[$reactionType]]);

            return $this->respondCreated([
                'message' => 'Reaksi berhasil!',
                'reaction_type' => $reactionType,
                'count' => $menfess[$reactionType]
            ]);
        }
        return $this->fail('Invalid request');
    }
}