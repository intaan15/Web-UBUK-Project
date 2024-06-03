<?php

class AuthModel extends Database {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($username) {
        $query = "SELECT * FROM account WHERE username='$username'";
        return $this->qry($query)->fetch();
    }

    public function insert($data) {
        $query = "INSERT INTO account
        (name, username, password, phone, role)
        VALUES (?, ?, ?, ?, 'customer')";
        return $this->qry($query, [
            $data['name'],
            $data['username'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['phone']
        ]);
    }
}