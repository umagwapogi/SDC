<?php
$page_title = 'Record Payment'; require_once __DIR__ . '/header.php';
$services = db()->query('SELECT * FROM services WHERE active=1 ORDER BY category, service_item')->fetchAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['patient_name'] ?? ''); $phone = trim($_POST['patient_phone'] ?? ''); $service = (int) ($_POST['service_id'] ?? 0); $amount = (float) ($_POST['amount'] ?? 0); $dt = $_POST['payment_datetime'] ?? date('Y-m-d\TH:i');
    if ($name === '' || !$service || $amount <= 0) flash('Please complete the patient, service, and payment amount.', 'error');
    else { $s = db()->prepare('SELECT service_item FROM services WHERE id=?'); $s->execute([$service]); $row = $s->fetch();
        if (!$row) flash('Please select a valid service.', 'error');
        else { $stamp = date('Ymd', strtotime($dt)); $n = (int) db()->query("SELECT COUNT(*) FROM payments WHERE DATE(payment_datetime) = '" . date('Y-m-d', strtotime($dt)) . "'")->fetchColumn() + 1; $ref = 'PAY-' . $stamp . '-' . str_pad((string)$n, 3, '0', STR_PAD_LEFT);
            $q = db()->prepare('INSERT INTO payments(payment_ref,patient_name,patient_phone,service_id,service_name,amount,payment_datetime,recorded_by,recorded_by_name) VALUES(?,?,?,?,?,?,?,?,?)');
            $q->execute([$ref, $name, $phone ?: null, $service, $row['service_item'], $amount, date('Y-m-d H:i:s', strtotime($dt)), $_SESSION['user']['id'], $_SESSION['user']['full_name']]);
            flash('Payment successfully recorded.'); header('Location: receipt.php?id=' . db()->lastInsertId()); exit;
        }
    }
}
?>
<style>.form-layout{display:block;width:100%}.form-layout>div{width:100%}.field-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}.field-grid label{margin-bottom:0}@media(max-width:650px){.field-grid{grid-template-columns:1fr}}</style>
<div class="form-layout"><div><div class="intro"><span>COMPLETED SERVICE PAYMENT</span><h2>Record a payment</h2><p>Use this only after the dental service has been completed.</p></div><form class="panel form-panel" method="post"><div class="form-section"><h3>Patient information</h3><div class="field-grid"><label>Patient / Client Name <b>*</b><input name="patient_name" value="<?= e($_POST['patient_name'] ?? '') ?>" placeholder="Enter full name" required></label><label>Mobile Number <input name="patient_phone" value="<?= e($_POST['patient_phone'] ?? '') ?>" placeholder="Optional"></label></div></div><div class="form-section"><h3>Payment details</h3><label>Service Provided <b>*</b><select name="service_id" id="service" required><option value="">Select completed service</option><?php foreach ($services as $s): ?><option value="<?= $s['id'] ?>" data-price="<?= $s['default_price'] ?>"><?= e($s['category'] . ' — ' . $s['service_item']) ?></option><?php endforeach; ?></select></label><div class="field-grid"><label>Amount Paid (PHP) <b>*</b><div class="money-input"><span>₱</span><input type="number" id="amount" name="amount" min="0.01" step="0.01" value="<?= e($_POST['amount'] ?? '') ?>" placeholder="0.00" required></div></label><label>Payment Date & Time <b>*</b><input type="datetime-local" name="payment_datetime" value="<?= e($_POST['payment_datetime'] ?? date('Y-m-d\TH:i')) ?>" required></label></div></div><div class="form-actions"><a href="dashboard.php" class="secondary">Cancel</a><button class="primary">Save & View Receipt</button></div></form></div></div><?php require __DIR__ . '/footer.php';
