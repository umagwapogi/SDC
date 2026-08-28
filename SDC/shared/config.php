<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'dental_center');
define('DB_USER', 'root');
define('DB_PASS', '');
define('BASE_URL', '/SDC');

function db(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $pdo;
}

function logged_in(): bool { return isset($_SESSION['user']); }
function is_admin(): bool { return logged_in() && $_SESSION['user']['role'] === 'admin'; }
function dashboard_url(): string { return BASE_URL . (is_admin() ? '/admin/dashboard.php' : '/front_desk/dashboard.php'); }
function require_login(): void { if (!logged_in()) { header('Location: ' . BASE_URL . '/login.php'); exit; } }
function require_admin(): void { require_login(); if (!is_admin()) { header('Location: ' . dashboard_url()); exit; } }
function e(?string $value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function peso(float $amount): string { return '₱' . number_format($amount, 2); }
function flash(string $message, string $type = 'success'): void { $_SESSION['flash'] = ['message' => $message, 'type' => $type]; }
function show_flash(): void { if (!empty($_SESSION['flash'])) { $f = $_SESSION['flash']; unset($_SESSION['flash']); echo '<div class="alert ' . e($f['type']) . '">' . e($f['message']) . '</div>'; } }
