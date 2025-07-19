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
            'latestArticles' => $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                                             ->orderBy('published_at', 'DESC')
                                             ->limit(3)
                                             ->findAll(),
            'latestMagazines' => $magazineModel->where('published_at <=', date('Y-m-d H:i:s'))
                                               ->orderBy('published_at', 'DESC')
                                               ->limit(3)
                                               ->findAll(),
        ];

        helper('text');



        return view('homepage', $data);
    }
}