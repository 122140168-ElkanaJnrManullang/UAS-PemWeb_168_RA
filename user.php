<?php

class User {
    private $name;
    private $username;
    private $email;
    private $password;

    // Constructor untuk inisialisasi data pengguna
    public function __construct($name, $username, $email, $password) {
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    // Metode untuk mendaftarkan pengguna
    public function register() {
        // Validasi input
        if (empty($this->name) || empty($this->username) || empty($this->email) || empty($this->password)) {
            return "All fields are required.";
        }

        // Simulasi password hashing untuk keamanan
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        // Simulasi data pengguna disimpan dalam format array
        $userData = [
            "name" => $this->name,
            "username" => $this->username,
            "email" => $this->email,
            "password" => $hashedPassword
        ];

        // Menyimpan data ke file JSON
        return $this->saveToFile($userData);
    }

    // Metode untuk menyimpan data ke file
    private function saveToFile($userData) {
        // Baca file users.json dan decode ke array PHP
        $file = 'users.json';
        $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

        // Tambahkan data pengguna baru ke array
        $users[] = $userData;

        // Simpan kembali ke file users.json
        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
        return "User successfully registered.";
    }
}

?>