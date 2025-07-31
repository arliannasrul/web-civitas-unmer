<?php namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\MagazineModel;
use App\Models\CategoryModel; // Tambahkan ini

class Home extends BaseController
{
    public function index(): string
    {
        $articleModel = new ArticleModel();
        $magazineModel = new MagazineModel();
        $categoryModel = new CategoryModel(); // Inisialisasi CategoryModel

        $data = [
            // Ambil 6 berita terbaru yang sudah dipublikasi untuk konten utama
            'latestArticles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                             ->orderBy('published_at', 'DESC')
                                             ->limit(6)
                                             ->findAll(),
            // Ambil 6 majalah terbaru yang sudah dipublikasi untuk konten utama
            'latestMagazines' => $magazineModel->where('published_at <=', date('Y-m-d H:i:s'))
                                               ->orderBy('published_at', 'DESC')
                                               ->limit(4)
                                               ->findAll(),
            // Tambahkan juga data untuk sidebar, bisa sama atau beda limitnya
            'sidebarLatestArticles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                                   ->orderBy('published_at', 'DESC')
                                                   ->limit(4)
                                                   ->findAll(),
            'sidebarLatestMagazines' => $magazineModel->where('published_at <=', date('Y-m-d H:i:s'))
                                                      ->orderBy('published_at', 'DESC')
                                                      ->limit(4)
                                                      ->findAll(),
            'categories' => $categoryModel->orderBy('name', 'ASC')->findAll(), // Ambil semua kategori
        ];

        helper('text');

        return view('homepage', $data);
    }
}