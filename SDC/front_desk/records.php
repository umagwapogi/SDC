<?php
require_once __DIR__ . '/../shared/config.php';
require_login();
if (is_admin()) { header('Location: ' . BASE_URL . '/admin/records.php'); exit; }
require __DIR__ . '/../shared/records.php';
