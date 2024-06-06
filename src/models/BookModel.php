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
    public function insert($name, $publisher, $stock, $price, $image) {
        $query = "INSERT INTO book
        (name, publisher, stock, price, image)
        VALUES (?, ?, ?, ?, ?)";
        return $this->qry($query, [
            $name,
            $publisher,
            $stock,
            $price,
            $image
        ]);
    }
    public function update($data) {
        $query = "UPDATE book SET name = ?, publisher = ?, stock = ?, price = ?, image = ? WHERE id_book = ?";
        return $this->qry($query, [
            $data['name'],
            $data['publisher'],
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

    public function updateStock($id) {
        $query = "UPDATE books SET stock = stock - 1 WHERE id = ?";
        return $this->qry($query, [$id]);
    }
}