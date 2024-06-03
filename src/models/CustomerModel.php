<?php

class CustomerModel extends Database{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $query = "SELECT * FROM account WHERE role = 'customer'";
        return $this->qry($query)->fetchAll();
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
    
    public function getById($id) {
        $query = "SELECT * FROM account WHERE id_account = ?";
        return $this->qry($query, [$id])->fetch();
    }

    public function update($data) {
        $query = "UPDATE account SET name = ?, username = ?, password = ?, phone = ? WHERE id_account = ?";
        return $this->qry($query, [
            $data['name'],
            $data['username'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['phone'],
            $data['id']
        ]);
    }
    public function delete($id) {
        $query = "DELETE FROM account WHERE id_account = ?";
        return $this->qry($query, [$id]);
    }
}