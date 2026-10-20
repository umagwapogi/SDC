CREATE DATABASE IF NOT EXISTS dental_center CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dental_center;

CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, full_name VARCHAR(120) NOT NULL, username VARCHAR(60) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL, role ENUM('admin','front_desk') NOT NULL DEFAULT 'front_desk', status TINYINT(1) NOT NULL DEFAULT 1, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE services (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, category VARCHAR(100) NOT NULL, service_item VARCHAR(160) NOT NULL, price_label VARCHAR(80) NOT NULL, default_price DECIMAL(10,2) NULL, notes TEXT NULL, active TINYINT(1) NOT NULL DEFAULT 1);
CREATE TABLE payments (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, patient_name VARCHAR(160) NOT NULL, service_id INT UNSIGNED NULL, service_name VARCHAR(160) NOT NULL, amount DECIMAL(10,2) NOT NULL, payment_datetime DATETIME NOT NULL, recorded_by INT UNSIGNED NOT NULL, recorded_by_name VARCHAR(120) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (service_id) REFERENCES services(id));

INSERT INTO users (full_name,username,password,role) VALUES ('System Administrator','admin','$2y$10$iNyX4cCpfMAYXqkX0PcMTeZtIXPYOBKEaaSD7PPigle2iVBRYJqaC','admin'), ('Front Desk Staff','frontdesk','$2y$10$pVNdHiMS4CncoN3H1quwgOKORzjlS6Osh4sYzxcTzrydJKrW5DRuW','front_desk');
INSERT INTO services (category,service_item,price_label,default_price,notes) VALUES
('Consultation','General Dental Consultation','₱500',500,'Standard fee'),
('Cleaning','Adult Oral Prophylaxis — Light','₱1,500',1500,'Based on calculus deposits'),
('Cleaning','Adult Oral Prophylaxis — Moderate','₱2,000',2000,'Based on calculus deposits'),
('Cleaning','Adult Oral Prophylaxis — Heavy','₱2,500',2500,'Based on calculus deposits'),
('Cleaning','Pediatric Oral Prophylaxis','₱2,000',2000,'Includes Fluoride Treatment'),
('Orthodontics','Conventional Metal Braces','₱70,000 – ₱90,000',70000,'Downpayment: ₱15,000; Monthly Adjustment: ₱3,000; Includes Oral Prophylaxis; Excludes Fillings and Extractions'),
('Orthodontics','Braces Removal','₱3,000',3000,'Includes Oral Prophylaxis & Polishing'),
('Restorative','Tooth Filling (Pasta)','₱1,500 – ₱2,500 / tooth',1500,'Cost depends on case complexity'),
('Cosmetic','Composite Veneers','₱7,000 / tooth',7000,'Composite material'),
('Cosmetic','Porcelain Veneers','₱20,000 / tooth',20000,'Porcelain material'),
('Extractions','Permanent Tooth Extraction','₱1,500 – ₱2,500 / tooth',1500,'Conventional'),
('Extractions','Temporary Tooth Extraction','₱1,000 – ₱1,500 / tooth',1000,'Baby teeth'),
('Extractions','Impacted Wisdom Tooth','₱10,000 – ₱15,000 / tooth',10000,'Surgical removal');
