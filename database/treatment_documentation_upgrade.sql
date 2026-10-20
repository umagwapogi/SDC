USE dental_center;

ALTER TABLE payments
    ADD COLUMN treatment_date DATE NULL AFTER patient_phone,
    ADD COLUMN dentist_name VARCHAR(160) NULL AFTER treatment_date,
    ADD COLUMN tooth_area VARCHAR(100) NULL AFTER dentist_name,
    ADD COLUMN diagnosis VARCHAR(255) NULL AFTER tooth_area,
    ADD COLUMN treatment_notes TEXT NULL AFTER diagnosis;
