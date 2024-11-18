<?php
require_once 'pdo.php';

class UserModel {
    public static function register($email, $ten, $password) {
        global $pdo;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO nguoidung (email, ten, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
        return $stmt->execute([$email, $ten, $passwordHash]);
    }

    public static function login($email, $password) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM nguoidung WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user; // trả về thông tin người dùng
        }
        return false;
    }
}
?>