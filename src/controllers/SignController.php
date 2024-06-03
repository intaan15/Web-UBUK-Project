<?php

class SignController extends BaseController {
    public function index() {
        $data = [
            'style' => '/css/style.css',
            'title' => 'E-Library'
        ];
        $this->view('sign/template/header', $data);
        $this->view('sign/landingpage/index', $data);
        $this->view('sign/template/footer');
    }
    public function login() {
        $data = [
            'style' => '/css/style.css',
            'title' => 'Login'
        ];
        $this->view('sign/template/header', $data);
        $this->view('sign/signin/index', $data);
        $this->view('sign/template/footer');
    }

    public function register() {
        $data = [
            'style' => '/css/style.css',
            'title' => 'Register'
        ];
        $this->view('sign/template/header', $data);
        $this->view('sign/signup/index', $data);
        $this->view('sign/template/footer');
    }
}

?>
