USE dental_center;

ALTER TABLE payments
    ADD COLUMN payment_ref VARCHAR(30) NULL UNIQUE AFTER id,
    ADD COLUMN patient_phone VARCHAR(30) NULL AFTER patient_name,
    ADD COLUMN status ENUM('active','cancelled') NOT NULL DEFAULT 'active' AFTER payment_datetime,
    ADD COLUMN cancelled_at DATETIME NULL AFTER status,
    ADD COLUMN cancelled_by INT UNSIGNED NULL AFTER cancelled_at,
    ADD COLUMN cancel_reason VARCHAR(255) NULL AFTER cancelled_by;

CREATE TABLE IF NOT EXISTS payment_audit_logs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    payment_id INT UNSIGNED NOT NULL,
    action VARCHAR(40) NOT NULL,
    details TEXT NULL,
    performed_by INT UNSIGNED NOT NULL,
    performed_by_name VARCHAR(120) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (payment_id) REFERENCES payments(id)
);
