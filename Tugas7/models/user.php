<?php
// models/User.php

class User {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create($data) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (email, fullname, address, birthdate, gender, phone) 
             VALUES (:email, :fullname, :address, :birthdate, :gender, :phone)"
        );
        return $stmt->execute([
            ':email' => $data['email'],
            ':fullname' => $data['fullname'],
            ':address' => $data['address'],
            ':birthdate' => $data['birthdate'],
            ':gender' => $data['gender'],
            ':phone' => $data['phone'] ?? null // Jika phone opsional
        ]);
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM users ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare(
            "UPDATE users SET 
                email = :email, 
                fullname = :fullname, 
                address = :address, 
                birthdate = :birthdate, 
                gender = :gender, 
                phone = :phone 
             WHERE id = :id"
        );
        return $stmt->execute([
            ':email' => $data['email'],
            ':fullname' => $data['fullname'],
            ':address' => $data['address'],
            ':birthdate' => $data['birthdate'],
            ':gender' => $data['gender'],
            ':phone' => $data['phone'] ?? null,
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}