<?php namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\MagazineModel;

class Home extends BaseController
{
    public function index(): string
    {
        $articleModel = new ArticleModel();
        $magazineModel = new MagazineModel();

        $data = [
            // Ambil 6 berita terbaru yang sudah dipublikasi untuk konten utama
            'latestArticles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                             ->orderBy('published_at', 'DESC')
                                             ->limit(4) // Ubah limit dari 3 menjadi 6
                                             ->findAll(),
            // Ambil 6 majalah terbaru yang sudah dipublikasi untuk konten utama
            'latestMagazines' => $magazineModel->where('published_at <=', date('Y-m-d H:i:s'))
                                               ->orderBy('published_at', 'DESC')
                                               ->limit(4) // Ubah limit dari 3 menjadi 6
                                               ->findAll(),
            // Tambahkan juga data untuk sidebar, bisa sama atau beda limitnya
            'sidebarLatestArticles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                                   ->orderBy('published_at', 'DESC')
                                                   ->limit(6) // Untuk sidebar
                                                   ->findAll(),
            'sidebarLatestMagazines' => $magazineModel->where('published_at <=', date('Y-m-d H:i:s'))
                                                      ->orderBy('published_at', 'DESC')
                                                      ->limit(6) // Untuk sidebar
                                                      ->findAll(),
        ];

        helper('text');

        return view('homepage', $data);
    }
}