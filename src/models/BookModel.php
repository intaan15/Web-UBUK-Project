<?php

class BookModel extends Database{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll() {
        $query = "SELECT * FROM book";
        return $this->qry($query)->fetchAll();
    }
    public function getById($id) {
        $query = "SELECT * FROM book WHERE id_book = ?";
        return $this->qry($query, [$id])->fetch();
    }
    public function insert($name, $stock, $price, $image) {
        $query = "INSERT INTO book
        (name, stock, price, image)
        VALUES (?, ?, ?, ?)";
        return $this->qry($query, [
            $name,
            $stock,
            $price,
            $image
        ]);
    }
    public function update($data) {
        $query = "UPDATE book SET name = ?, stock = ?, price = ?, image = ? WHERE id_book = ?";
        return $this->qry($query, [
            $data['name'],
            $data['stock'],
            $data['price'],
            $data['image'],
            $data['id']
        ]);
    }
    public function delete($id) {
        $query = "DELETE FROM book WHERE id_book = ?";
        return $this->qry($query, [$id]);
    }
}