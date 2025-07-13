<?php
// public/index.php

// Tampilkan semua error PHP untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load database connection
$pdo = require_once __DIR__ . '/../config/database.php';

// Load models
require_once __DIR__ . '/../models/User.php';

// Load controllers
require_once __DIR__ . '/../controllers/UserController.php';

// Inisialisasi model dan controller
$userModel = new User($pdo);
$userController = new UserController($userModel);

// Ambil URI yang diminta dan metode HTTP
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Menghapus base path (misal: /pembelajaran-6/public) dari URI
$base_path = '/pembelajaran-6/public'; // Sesuaikan ini jika folder public Anda ada di root web server
if (strpos($request_uri, $base_path) === 0) {
    $request_uri = substr($request_uri, strlen($base_path));
}

// Router sederhana
switch ($request_uri) {
    case '/':
        if ($method === 'GET') {
            $userController->index();
        }
        break;
    case '/create':
        if ($method === 'GET') {
            $userController->create();
        }
        break;
    case '/store':
        if ($method === 'POST') {
            $userController->store();
        }
        break;
    default:
        // Handle edit, update, delete with dynamic ID
        if (preg_match('/^\/edit\/(\d+)$/', $request_uri, $matches)) {
            $id = (int)$matches[1];
            if ($method === 'GET') {
                $userController->edit($id);
            }
        } elseif (preg_match('/^\/update\/(\d+)$/', $request_uri, $matches)) {
            $id = (int)$matches[1];
            if ($method === 'POST') {
                $userController->update($id);
            }
        } elseif (preg_match('/^\/delete\/(\d+)$/', $request_uri, $matches)) {
            $id = (int)$matches[1];
            if ($method === 'POST') {
                $userController->destroy($id);
            }
        } else {
            // 404 Not Found
            http_response_code(404);
            echo "<h1>404 Not Found</h1>";
            echo "<p>The requested URL was not found on this server.</p>";
        }
        break;
}