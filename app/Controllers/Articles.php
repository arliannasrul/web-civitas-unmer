<?php namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\API\ResponseTrait;

class Articles extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('text');
    }

    public function index($categorySlug = null): string
    {
        $articleModel = new ArticleModel();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->orderBy('name', 'ASC')->findAll();

        $data = [
            'categories' => $categories,
            'activeCategorySlug' => $categorySlug,
            'title' => 'Semua Berita Civitas',
            'articlesByCategories' => [],
            'articles' => [],
            'pager' => null,
        ];

        if ($categorySlug === null) {
            foreach ($categories as $category) {
                $data['articlesByCategories'][$category['slug']] = $articleModel
                    ->where('published_at <=', date('Y-m-d H:i:s'))
                    ->where('category_id', $category['id'])
                    ->orderBy('published_at', 'DESC')
                    ->limit(5)
                    ->findAll();
            }
            $data['latestOverallArticles'] = $articleModel
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->orderBy('published_at', 'DESC')
                // PERUBAHAN DI SINI: ganti limit(6) menjadi limit(4)
                ->limit(5)
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

            $data['articles'] = $query->paginate(5);
            $data['pager'] = $articleModel->pager;
        }

        return view('articles/index', $data);
    }

    // Metode-metode lainnya tetap sama
    public function show($slug = null): string
    {
        $articleModel = new ArticleModel();
        $article = $articleModel->where('slug', $slug)
                                 ->where('published_at <=', date('Y-m-d H:i:s'))
                                 ->first();

        if (!$article) {
            throw PageNotFoundException::forPageNotFound();
        }

        $recommendedArticles = $articleModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->where('category_id', $article['category_id'])
            ->where('id !=', $article['id'])
            ->orderBy('published_at', 'DESC')
            ->limit(5)
            ->findAll();

        $data = [
            'article' => $article,
            'title' => $article['title'],
            'recommendedArticles' => $recommendedArticles,
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

    public function getSearchSuggestions(): \CodeIgniter\HTTP\Response
    {
        $searchQuery = $this->request->getGet('q');
        $articleModel = new ArticleModel();
        $suggestions = [];

        if (!empty($searchQuery) && strlen($searchQuery) >= 2) {
            $articles = $articleModel
                ->select('title, slug')
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->like('title', $searchQuery, 'both')
                ->orLike('content', $searchQuery, 'both')
                ->limit(6)
                ->orderBy('published_at', 'DESC')
                ->findAll();

            foreach ($articles as $article) {
                $suggestions[] = [
                    'title' => esc($article['title']),
                    'url' => base_url('berita/' . esc($article['slug']))
                ];
            }
        }

        return $this->response->setJSON($suggestions);
    }

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

    public function toggleLike($articleId): \CodeIgniter\HTTP\Response
    {
        $articleModel = new ArticleModel();
        $article = $articleModel->find($articleId);

        if (!$article) {
            return $this->failNotFound('Artikel tidak ditemukan.');
        }

        $newLikesCount = (int)$article['likes_count'] + 1;

        $articleModel->update($articleId, ['likes_count' => $newLikesCount]);

        return $this->respondCreated(['message' => 'Like berhasil!', 'likes_count' => $newLikesCount]);
    }
}