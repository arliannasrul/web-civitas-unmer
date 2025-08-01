<?php namespace App\Controllers;

use App\Models\MenfessModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Exceptions\PageNotFoundException;

class Menfess extends BaseController
{
    use ResponseTrait;

    public function index(): string
    {
        $menfessModel = new MenfessModel();
        $data = [
            'menfess' => $menfessModel->orderBy('created_at', 'DESC')->findAll(),
            'title'   => 'Menfess Civitas Unmer Malang'
        ];

        return view('menfess/index', $data);
    }

    public function show($id = null): string
    {
        $menfessModel = new MenfessModel();
        $post = $menfessModel->find($id);

        if (!$post) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'post'  => $post,
            'title' => 'Detail Menfess #' . $post['id']
        ];

        return view('menfess/show', $data);
    }

    public function react($menfessId, $reactionType): \CodeIgniter\HTTP\Response
    {
        $menfessModel = new MenfessModel();
        $menfess = $menfessModel->find($menfessId);

        if (!$menfess) {
            return $this->failNotFound('Menfess tidak ditemukan.');
        }

        $allowedReactions = ['likes', 'dislike', 'fire', 'sad', 'laugh', 'sorry'];
        if (!in_array($reactionType, $allowedReactions)) {
            return $this->failBadRequest('Jenis reaksi tidak valid.');
        }

        $columnName = $reactionType . '_count';
        $newCount = (int)$menfess[$columnName] + 1;

        $menfessModel->update($menfessId, [$columnName => $newCount]);

        return $this->respondCreated([
            'message' => 'Reaksi berhasil!', 
            'reaction_type' => $reactionType,
            'new_count' => $newCount
        ]);
    }
}