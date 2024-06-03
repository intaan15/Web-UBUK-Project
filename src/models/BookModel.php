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
}