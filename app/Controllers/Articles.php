<?php namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Articles extends BaseController
{
    public function __construct()
    {
        helper('text'); // Pastikan helper text dimuat untuk word_limiter
    }

    public function index($categorySlug = null): string
    {
        $articleModel = new ArticleModel();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->orderBy('name', 'ASC')->findAll();

        $data = [
            'categories'         => $categories,
            'activeCategorySlug' => $categorySlug,
            'title'              => 'Semua Berita Civitas',
            'articlesByCategories' => [],
            'articles'           => [],
            'pager'              => null,
        ];

        if ($categorySlug === null) {
            foreach ($categories as $category) {
                $data['articlesByCategories'][$category['slug']] = $articleModel
                    ->where('published_at <=', date('Y-m-d H:i:s'))
                    ->where('category_id', $category['id'])
                    ->orderBy('published_at', 'DESC')
                    ->limit(4)
                    ->findAll();
            }
            $data['latestOverallArticles'] = $articleModel
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->orderBy('published_at', 'DESC')
                ->limit(6)
                ->findAll();

            $data['title'] = 'Semua Berita';
        } else {
            $category = $categoryModel->where('slug', $categorySlug)->first();

            if (!$category) {
                throw PageNotFoundException::forPageNotFound();
            }

            $data['title'] = 'Berita Kategori ' . esc($category['name']);

            $query = $articleModel
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->where('category_id', $category['id'])
                ->orderBy('published_at', 'DESC');

            $data['articles'] = $query->paginate(9);
            $data['pager'] = $articleModel->pager;
        }

        return view('articles/index', $data);
    }

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

    public function getArticlesAjax(): \CodeIgniter\HTTP\Response
    {
        $categorySlug = $this->request->getGet('category');
        $articleModel = new ArticleModel();
        $categoryModel = new CategoryModel();
        $categoryId = null;

        if ($categorySlug && $categorySlug !== 'all') {
            $category = $categoryModel->where('slug', $categorySlug)->first();
            if ($category) {
                $categoryId = $category['id'];
            }
        }

        $query = $articleModel->where('published_at <=', date('Y-m-d H:i:s'))
                              ->orderBy('published_at', 'DESC');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $articles = $query->findAll();

        $data = [
            'articles' => $articles,
        ];

        $html = view('partials/_article_list', $data);

        return $this->response->setJSON(['html' => $html]);
    }

    // =========================================================================
    // METHOD BARU UNTUK SEARCH SUGGESTIONS (AUTOCOMPLETE)
    // =========================================================================
    public function getSearchSuggestions(): \CodeIgniter\HTTP\Response
    {
        $searchQuery = $this->request->getGet('q');
        $articleModel = new ArticleModel();
        $suggestions = [];

        if (!empty($searchQuery) && strlen($searchQuery) >= 2) { // Minimal 2 karakter untuk memulai pencarian
            $articles = $articleModel
                ->select('title, slug') // Hanya ambil title dan slug
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->like('title', $searchQuery, 'both') // Cari di title (mengandung)
                ->orLike('content', $searchQuery, 'both') // Atau di content (mengandung)
                ->limit(6) // Batasi jumlah rekomendasi
                ->orderBy('published_at', 'DESC')
                ->findAll();

            foreach ($articles as $article) {
                $suggestions[] = [
                    'title' => esc($article['title']),
                    'url' => base_url('berita/' . esc($article['slug']))
                ];
            }
        }

        return $this->response->setJSON($suggestions); // Kembalikan array JSON
    }

    // =========================================================================
    // METHOD SEARCH LAMA (opsional: bisa dihapus jika tidak lagi dipakai)
    // =========================================================================
    public function search(): string
    {
        $articleModel = new ArticleModel();
        $searchQuery = $this->request->getGet('q');

        $results = [];
        $title = 'Hasil Pencarian';

        if ($searchQuery) {
            $title .= ': ' . esc($searchQuery);
            $results = $articleModel
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->like('title', $searchQuery)
                ->orLike('content', $searchQuery)
                ->orderBy('published_at', 'DESC')
                ->findAll();
        }

        $data = [
            'results' => $results,
            'searchQuery' => $searchQuery,
            'title' => $title,
        ];

        return view('articles/search_results', $data);
    }
}