-- SQL Query untuk membuat tabel users
-- Anda bisa menjalankan ini melalui PhpMyAdmin, MySQL Workbench, atau terminal MySQL

CREATE TABLE users (
    id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(20) UNIQUE NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    -- Untuk TEXT, '8,2' di spesifikasi tugas mungkin tidak berlaku secara langsung.
    -- TEXT adalah tipe data untuk string panjang.
    address TEXT NOT NULL,
    birthdate DATE NOT NULL,
    gender ENUM('M', 'F') NOT NULL,
    phone VARCHAR(14) NULL, -- Menganggap phone bisa kosong
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);