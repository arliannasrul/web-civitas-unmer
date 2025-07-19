<?php namespace App\Controllers;

use App\Models\MagazineModel;
use CodeIgniter\Exceptions\PageNotFoundException; // Untuk error 404

class Magazines extends BaseController
{
    // Fungsi untuk menampilkan DAFTAR SEMUA MAJALAH
    public function index(): string
    {
        $magazineModel = new MagazineModel();
        $data = [
            'magazines' => $magazineModel->where('published_at <=', date('Y-m-d H:i:s')) // Hanya yang sudah dipublikasi
                                         ->orderBy('published_at', 'DESC')
                                         ->findAll(),
            'title' => 'Semua Edisi Majalah Civitas'
        ];
        return view('magazines/index', $data);
    }

    // Fungsi untuk menampilkan DETAIL SATU MAJALAH berdasarkan slug (dengan PDF viewer)
    public function show($slug = null): string
    {
        $magazineModel = new MagazineModel();
        $magazine = $magazineModel->where('slug', $slug)
                                 ->where('published_at <=', date('Y-m-d H:i:s')) // Pastikan sudah dipublikasi
                                 ->first();

        if (!$magazine) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'magazine' => $magazine,
            'title' => $magazine['title']
        ];
        return view('magazines/show', $data);
    }
}