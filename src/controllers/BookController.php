<?php

class BookController extends BaseController{
    private $bookModel;
    private $historyModel;
    public function __construct()
    {
        $this->bookModel = $this->model('BookModel');
        $this->historyModel = $this->model('HistoryModel');
    }
    public function index(){
        $data = [
            'style' => '/css/style2.css',
            'title' => 'Book',
            'AllBook' => $this->bookModel->getAll()
        ];
        if ($_SESSION['role'] == 'admin') {
            $this->view('admin/template/header', $data);
            $this->view('admin/book/index', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/book/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }
    public function indexL(){
        $data = [
            'style' => '/css/style2.css',
            'title' => 'Book',
            'AllBook' => $this->bookModel->getAll()
        ];
        if ($_SESSION['role'] == 'librarian') {
            $this->view('librarian/template/header', $data);
            $this->view('librarian/book/index', $data);
            $this->view('librarian/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/book/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }
    public function indexC(){
        $data = [
            'style' => '/css/style2.css',
            'title' => 'Book',
            'AllBook' => $this->bookModel->getAll()
        ];
        if ($_SESSION['role'] == 'customer') {
            $this->view('customer/template/header', $data);
            $this->view('customer/book/index', $data);
            $this->view('customer/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/book/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
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
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Book',
                'AllBook' => $this->bookModel->getAll()
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/book/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
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
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Book',
                'AllBook' => $this->bookModel->getAll()
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/book/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
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
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Book',
                'AllBook' => $this->bookModel->getAll()
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/book/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
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
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Book',
                'AllBook' => $this->bookModel->getAll()
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/book/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }
    public function insert_book() {
        $fields = [
            'name' => 'string | required',
            'publisher' => 'string | required',
            'stock' => 'int | required',
            'price' => 'int | required',
            'image' => 'required'
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/bookinsert');
        }
        if (isset($_POST["insert"])) {
            $name = $_POST["name"];
            $publisher = $_POST["publisher"];
            $price = $_POST["price"];
            $stock = $_POST["stock"];
            $filename = $_FILES["uploadFile"]["name"];
            $tempname = $_FILES["uploadFile"]["tmp_name"];
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = $name . "." . $file_extension;
            $location = BASEDIR . '/public/img/book/' . $filename;
            if (move_uploaded_file($tempname, $location)) {
                $proc = $this->bookModel->insert($name, $publisher, $stock, $price, $filename);
                
                if ($proc) {
                    Message::setFlash('success', 'Successfully', $name . ' added');
                    $this->redirect('admin/book');
                } else {
                    Message::setFlash('error', 'Failed', $name . ' add failed');
                    $this->redirect('admin/bookinsert');
                }
            } else {
                Message::setFlash('error', 'Failed', 'Image not found');
                $this->redirect('admin/bookinsert');
            }
        } else {
            Message::setFlash('error', 'Failed', 'Try Again');
            $this->redirect('admin/bookinsert');
        }
    }
    public function edit_book() {
        $fields = [
            'name' => 'string | required',
            'publisher' => 'string | required',
            'stock' => 'int | required',
            'price' => 'int | required',
            'image' => 'required',
            'mode' => 'string',
            'id' => 'int'
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);
        if ($inputs['mode'] == 'delete') {
            $proc = $this->bookModel->delete($inputs['id']);
            unlink(BASEDIR . '/public/img/book/' . $inputs['image']);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' deleted');
                $this->redirect('admin/book');
            }
        }
        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/bookedit/' . $inputs['id']);
        }

        if (isset($_POST["insert"])) {
            $name = $_POST["name"];
            $publisher = $_POST["publisher"];
            $price = $_POST["price"];
            $stock = $_POST["stock"];
            $filename = $_FILES["uploadFile"]["name"];
            $tempname = $_FILES["uploadFile"]["tmp_name"];
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = $name . "." . $file_extension;
            $location = BASEDIR . '/public/img/book/' . $filename;
            if (move_uploaded_file($tempname, $location)) {
                $proc = $this->bookModel->update($name, $publisher, $stock, $price, $filename);
                
                if ($proc) {
                    Message::setFlash('success', 'Successfully', $name . ' added');
                    $this->redirect('admin/book');
                } else {
                    Message::setFlash('error', 'Failed', $name . ' add failed');
                    $this->redirect('admin/bookedit/'  . $inputs['id']);
                }
            } else {
                Message::setFlash('error', 'Failed', 'Image not found');
                $this->redirect('admin/bookedit/' . $inputs['id']);
            }
        } else {
            Message::setFlash('error', 'Failed', 'Try Again');
            $this->redirect('admin/bookedit/' . $inputs['id']);
        }
    }
    public function insert_bookL() {
        $fields = [
            'name' => 'string | required',
            'publisher' => 'string | required',
            'stock' => 'int | required',
            'price' => 'int | required',
            'image' => 'required'
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('librarian/bookinsert');
        }
        if (isset($_POST["insert"])) {
            $name = $_POST["name"];
            $publisher = $_POST["publisher"];
            $price = $_POST["price"];
            $stock = $_POST["stock"];
            $filename = $_FILES["uploadFile"]["name"];
            $tempname = $_FILES["uploadFile"]["tmp_name"];
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = $name . "." . $file_extension;
            $location = BASEDIR . '/public/img/book/' . $filename;
            if (move_uploaded_file($tempname, $location)) {
                $proc = $this->bookModel->insert($name, $publisher, $stock, $price, $filename);
                
                if ($proc) {
                    Message::setFlash('success', 'Successfully', $name . ' added');
                    $this->redirect('librarian/book');
                } else {
                    Message::setFlash('error', 'Failed', $name . ' add failed');
                    $this->redirect('librarian/bookinsert');
                }
            } else {
                Message::setFlash('error', 'Failed', 'Image not found');
                $this->redirect('librarian/bookinsert');
            }
        } else {
            Message::setFlash('error', 'Failed', 'Try Again');
            $this->redirect('librarian/bookinsert');
        }
    }
    public function edit_bookL() {
        $fields = [
            'name' => 'string | required',
            'publisher' => 'string | required',
            'stock' => 'int | required',
            'price' => 'int | required',
            'image' => 'required',
            'mode' => 'string',
            'id' => 'int'
        ];

        $message = [];
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

    public function buybook($id) {
        if ($_SESSION['role'] == 'customer') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Book',
                'book' => $this->bookModel->getById($id)
            ];
            $this->view('customer/template/header', $data);
            $this->view('customer/book/buybook', $data);
            $this->view('customer/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Book',
                'AllBook' => $this->bookModel->getAll()
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/book/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }

    public function buybookproccess() {
        // $inputs= [
        //     $_POST['username'],
        //     $_POST['name'],
        //     $_POST['newstock'],
        //     $_POST['price'],
        //     $_POST['image']
        // ];
        $fields = [
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);
        $this->historyModel->addToHistory($inputs);
        
    }
}