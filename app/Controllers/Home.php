<?php namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\MagazineModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    public function index(): string
    {
        $articleModel = new ArticleModel();
        $magazineModel = new MagazineModel();
        $categoryModel = new CategoryModel();

        $data = [
            'title' => 'Beranda',
            // Ambil 6 berita terbaru yang sudah dipublikasi untuk konten utama
            'latestArticles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                             ->orderBy('published_at', 'DESC')
                                             ->limit(5)
                                             ->findAll(),
            // Ambil 4 majalah terbaru yang sudah dipublikasi untuk konten utama
            'latestMagazines' => $magazineModel->where('published_at <=', date('Y-m-d H:i:s'))
                                               ->orderBy('published_at', 'DESC')
                                               ->limit(5)
                                               ->findAll(),
            // Tetap ambil berita terbaru untuk sidebar
            'sidebarLatestArticles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                                     ->orderBy('published_at', 'DESC')
                                                     ->limit(4)
                                                     ->findAll(),
            // BARIS INI YANG DITAMBAH: Mengambil berita terpopuler (berdasarkan likes_count) untuk sidebar
            'sidebarPopularArticles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                                    ->orderBy('likes_count', 'DESC')
                                                    ->limit(5)
                                                    ->findAll(),
            'sidebarLatestMagazines' => $magazineModel->where('published_at <=', date('Y-m-d H:i:s'))
                                                      ->orderBy('published_at', 'DESC')
                                                      ->limit(4)
                                                      ->findAll(),
            'categories' => $categoryModel->orderBy('name', 'ASC')->findAll(),
        ];

        helper('text');

        return view('homepage', $data);
    }
}