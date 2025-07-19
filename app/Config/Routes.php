<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// Routes untuk Berita
$routes->get('/berita', 'Articles::index'); // Daftar semua berita
$routes->get('/berita/(:segment)', 'Articles::show/$1'); // Detail berita berdasarkan slug

// Routes untuk Majalah
$routes->get('/majalah', 'Magazines::index'); // Daftar semua majalah
$routes->get('/majalah/(:segment)', 'Magazines::show/$1'); // Detail majalah berdasarkan slug


// Anda bisa menambahkan halaman statis lain jika diperlukan
// $routes->get('/tentang', 'Pages::about');