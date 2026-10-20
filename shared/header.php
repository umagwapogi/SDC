<?php require_once __DIR__ . '/config.php'; require_login(); $page_title = $page_title ?? 'DentalCare'; ?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page_title) ?> · DentalCare</title><link rel="stylesheet" href="<?= BASE_URL ?>/static/assets/style.css"></head><body>
<aside class="sidebar"><div class="brand"><img src="<?= BASE_URL ?>/static/logo.jpg" alt="DentalCare logo"><span>Dental<span>Care</span></span></div>
<nav><a class="<?= basename($_SERVER['PHP_SELF'])==='dashboard.php'?'active':'' ?>" href="dashboard.php">⌂ <span>Dashboard</span></a>
<a class="<?= basename($_SERVER['PHP_SELF'])==='payment.php'?'active':'' ?>" href="payment.php">⊞ <span>Record Payment</span></a>
<a class="<?= basename($_SERVER['PHP_SELF'])==='records.php'?'active':'' ?>" href="records.php">▤ <span>Payment Records</span></a>
<a class="<?= basename($_SERVER['PHP_SELF'])==='account.php'?'active':'' ?>" href="account.php">⚿ <span>My Password</span></a>
<?php if (is_admin()): ?><div class="nav-label">ADMINISTRATION</div><a class="<?= basename($_SERVER['PHP_SELF'])==='report.php'?'active':'' ?>" href="report.php">▥ <span>Collection Report</span></a><a class="<?= basename($_SERVER['PHP_SELF'])==='services.php'?'active':'' ?>" href="services.php">☷ <span>Services & Pricing</span></a><a class="<?= basename($_SERVER['PHP_SELF'])==='users.php'?'active':'' ?>" href="users.php">♙ <span>User Accounts</span></a><?php endif; ?></nav>
<div class="side-user"><div class="avatar"><?= strtoupper(substr($_SESSION['user']['full_name'], 0, 1)) ?></div><div><strong><?= e($_SESSION['user']['full_name']) ?></strong><small><?= e(ucfirst($_SESSION['user']['role'])) ?></small></div><a href="<?= BASE_URL ?>/shared/logout.php" title="Sign out">↪</a></div></aside>
<main><header class="topbar"><button class="menu" onclick="document.querySelector('.sidebar').classList.toggle('open')">☰</button><div><h1><?= e($page_title) ?></h1><p><?= date('l, F j, Y') ?></p></div><div class="role-pill"><?= e(ucfirst($_SESSION['user']['role'])) ?></div></header><section class="content"><?= show_flash() ?>
