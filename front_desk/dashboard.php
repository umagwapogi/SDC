<?php
require_once __DIR__ . '/../shared/config.php';
require_login();
if (is_admin()) { header('Location: ' . BASE_URL . '/admin/dashboard.php'); exit; }
require __DIR__ . '/../shared/dashboard.php';
