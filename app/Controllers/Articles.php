<?php namespace App\Controllers;

use App\Models\ArticleModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Articles extends BaseController
{
    // Constructor untuk memuat helper sekali saat controller diinisialisasi
    public function __construct()
    {
        helper('text'); // MUAT HELPER 'TEXT' DI SINI
    }

    // Fungsi untuk menampilkan DAFTAR SEMUA BERITA
    public function index(): string
    {
        $articleModel = new ArticleModel();

        $data = [
            'articles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                       ->orderBy('published_at', 'DESC')
                                       ->paginate(9),
            'pager' => $articleModel->pager,
            'title' => 'Semua Berita Civitas'
        ];
        return view('articles/index', $data);
    }

    // Fungsi untuk menampilkan DETAIL SATU BERITA berdasarkan slug
    public function show($slug = null): string
    {
        $articleModel = new ArticleModel();
        $article = $articleModel->where('slug', $slug)
                                ->where('published_at <=', date('Y-m-d H:i:s'))
                                ->first();

        if (!$article) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'article' => $article,
            'title' => $article['title']
        ];
        return view('articles/show', $data);
    }
}