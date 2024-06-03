<?php

class BookController extends BaseController{
    private $bookModel;
    public function __construct()
    {
        $this->bookModel = $this->model('BookModel');
    }
    public function index(){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Book',
                'AllBook' => $this->bookModel->getAll()
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/book/index', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }
    public function indexL(){
        if ($_SESSION['role'] == 'librarian') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Book',
                'AllBook' => $this->bookModel->getAll()
            ];
            $this->view('librarian/template/header', $data);
            $this->view('librarian/book/index', $data);
            $this->view('librarian/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }
    public function indexC(){
        if ($_SESSION['role'] == 'customer') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Book',
                'AllBook' => $this->bookModel->getAll()
            ];
            $this->view('customer/template/header', $data);
            $this->view('customer/book/index', $data);
            $this->view('customer/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }

    public function insert(){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Book',
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/book/insert');
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }
    public function insertL(){
        if ($_SESSION['role'] == 'librarian') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Book',
            ];
            $this->view('librarian/template/header', $data);
            $this->view('librarian/book/insert');
            $this->view('librarian/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }
    public function edit($id){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Book',
                'book' => $this->bookModel->getById($id)
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/book/edit', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }
    public function editL($id){
        if ($_SESSION['role'] == 'librarian') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Book',
                'book' => $this->bookModel->getById($id)
            ];
            $this->view('librarian/template/header', $data);
            $this->view('librarian/book/edit', $data);
            $this->view('librarian/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }
    public function insert_book() {
        $fields = [
            'name' => 'string | required',
            'stock' => 'int | required',
            'price' => 'int | required',
            'image' => 'required'
        ];

        $message = [
            'name' => [
                'required' => 'Nama harus diisi!',
            ],
            'stock' => [
                'required' => 'Stock harus diisi!',
            ],
            'price' => [
                'required' => 'Price harus diisi!',
            ],
            'image' => [
                'required' => 'Image harus diisi!',
            ]
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/bookinsert');
        }

        $proc = $this->bookModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Successfully', $inputs['name'] . ' added');
            $this->redirect('admin/book');
        }
    }
    public function edit_book() {
        $fields = [
            'name' => 'string | required',
            'stock' => 'int | required',
            'price' => 'int | required',
            'image' => 'required',
            'mode' => 'string',
            'id' => 'int'
        ];

        $message = [
            'name' => [
                'required' => 'Nama harus diisi!',
            ],
            'stock' => [
                'required' => 'Stock harus diisi!',
            ],
            'price' => [
                'required' => 'Price harus diisi!',
            ],
            'image' => [
                'required' => 'Image harus diisi!',
            ]
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/bookedit/' . $inputs['id']);
        }

        if ($inputs['mode'] == 'update') {
            $proc = $this->bookModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' updated');
                $this->redirect('admin/book');
            } 
        } else {
            $proc = $this->bookModel->delete($inputs['id']);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' deleted');
                $this->redirect('admin/book');
            }
        }
    }
    public function insert_bookL() {
        $fields = [
            'name' => 'string | required',
            'stock' => 'int | required',
            'price' => 'int | required',
            'image' => 'required'
        ];

        $message = [
            'name' => [
                'required' => 'Nama harus diisi!',
            ],
            'stock' => [
                'required' => 'Stock harus diisi!',
            ],
            'price' => [
                'required' => 'Price harus diisi!',
            ],
            'image' => [
                'required' => 'Image harus diisi!',
            ]
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('librarian/bookinsert');
        }

        $proc = $this->bookModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Successfully', $inputs['name'] . ' added');
            $this->redirect('librarian/book');
        }
    }
    public function edit_bookL() {
        $fields = [
            'name' => 'string | required',
            'stock' => 'int | required',
            'price' => 'int | required',
            'image' => 'required',
            'mode' => 'string',
            'id' => 'int'
        ];

        $message = [
            'name' => [
                'required' => 'Nama harus diisi!',
            ],
            'stock' => [
                'required' => 'Stock harus diisi!',
            ],
            'price' => [
                'required' => 'Price harus diisi!',
            ],
            'image' => [
                'required' => 'Image harus diisi!',
            ]
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('librarian/bookedit/' . $inputs['id']);
        }

        if ($inputs['mode'] == 'update') {
            $proc = $this->bookModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' updated');
                $this->redirect('librarian/book');
            } 
        } else {
            $proc = $this->bookModel->delete($inputs['id']);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' deleted');
                $this->redirect('librarian/book');
            }
        }
    }
}