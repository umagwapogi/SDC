<?php require_once __DIR__ . '/../shared/config.php'; require_login(); if(is_admin()){header('Location: '.BASE_URL.'/admin/account.php');exit;} require __DIR__ . '/../shared/account.php';
