<?php

class LibrarianController extends BaseController{

    private $librarianModel;
    public function __construct()
    {
        $this->librarianModel = $this->model('LibrarianModel');
    }
    public function index(){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Librarian',
                'AllLibrarian' => $this->librarianModel->getAll()
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/librarian/index', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }

    public function insert(){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Librarian',
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/librarian/insert', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }

    public function edit($id){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Librarian',
                'account' => $this->librarianModel->getById($id)
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/librarian/edit', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->redirect('logout');
        }
    }

    public function insert_account() {
        $fields = [
            'name' => 'string | required',
            'username' => 'string | required | alphanumeric',
            'password' => 'string | required',
            'phone' => 'int | required '
        ];

        $message = [
            'name' => [
                'required' => 'Nama harus diisi!',
            ],
            'username' => [
                'required' => 'Username harus diisi!',
                'aplhanumeric' => 'Masukkan huruf dan angka',
            ],
            'password' => [
                'required' => 'Password harus diisi!',
            ],
            'phone' => [
                'required' => 'Phone harus diisi!',
            ]
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/librarianinsert');
        }

        $proc = $this->librarianModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Successfully', $inputs['name'] . ' added');
            $this->redirect('admin/librarian');
        }
    }

    public function edit_account() {
        $fields = [
            'name' => 'string | required',
            'username' => 'string | required | alphanumeric',
            'password' => 'string | required',
            'phone' => 'int | required',
            'mode' => 'string',
            'id' => 'int'
        ];

        $message = [
            'name' => [
                'required' => 'Nama harus diisi!',
            ],
            'username' => [
                'required' => 'Username harus diisi!',
                'aplhanumeric' => 'Masukkan huruf dan angka',
            ],
            'password' => [
                'required' => 'Password harus diisi!',
            ],
            'phone' => [
                'required' => 'Phone harus diisi!',
            ]
        ];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/librarianedit/' . $inputs['id']);
        }

        if ($inputs['mode'] == 'update') {
            $proc = $this->librarianModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' updated');
                $this->redirect('admin/librarian');
            } 
        } else {
            $proc = $this->librarianModel->delete($inputs['id']);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' deleted');
                $this->redirect('admin/librarian');
            }
        }
    }
}