<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// Routes untuk Berita
$routes->get('/berita', 'Articles::index');
$routes->get('/berita/kategori/(:segment)', 'Articles::index/$1');
$routes->get('/berita/(:segment)', 'Articles::show/$1');

// Rute untuk AJAX load berita berdasarkan kategori
$routes->get('/articles/ajax', 'Articles::getArticlesAjax');

// ===============================================================
// Rute untuk Fitur Pencarian Autocomplete (baru)
$routes->get('/articles/suggestions', 'Articles::getSearchSuggestions');
// ===============================================================

// Rute untuk Fitur Pencarian Berita (lama, bisa dihapus jika tidak dipakai lagi)
$routes->get('/articles/search', 'Articles::search'); // Komen/hapus jika tidak ingin halaman hasil pencarian terpisah

// Routes untuk Majalah
$routes->get('/majalah', 'Magazines::index');
$routes->get('/majalah/(:segment)', 'Magazines::show/$1');

$routes->get('menfess', 'NamaController::menfessMethod');
$routes->get('puisi', 'NamaController::puisiMethod');
$routes->get('cerpen', 'NamaController::cerpenMethod');