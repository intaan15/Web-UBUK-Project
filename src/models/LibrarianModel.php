<?php

class LibrarianModel extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll() {
        $query = "SELECT * FROM account WHERE role = 'librarian'";
        return $this->qry($query)->fetchAll();
    }
    public function insert($data) {
        $query = "INSERT INTO account
        (name, username, password, phone, role)
        VALUES (?, ?, ?, ?, 'librarian')";
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

    public function getByUsername($username) {
        $query = "SELECT * FROM account WHERE username = ?";
        return $this->qry($query, [$username])->fetch();
    }

    public function getByUsernameId($username, $id) {
        $query = "SELECT * FROM account WHERE username = ? AND id_account != ?";
        return $this->qry($query, [$username, $id])->fetch();
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