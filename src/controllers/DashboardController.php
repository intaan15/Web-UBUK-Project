<?php

class DashboardController extends BaseController{
    public function index(){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/dashboard/index', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/dashboard/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }
    public function indexL(){
        if ($_SESSION['role'] == 'librarian') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view('librarian/template/header', $data);
            $this->view('librarian/dashboard/index', $data);
            $this->view('librarian/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/dashboard/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');        
        }
    }
    public function indexC(){
        if ($_SESSION['role'] == 'customer') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view('customer/template/header', $data);
            $this->view('customer/dashboard/index', $data);
            $this->view('customer/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/dashboard/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');        
        }
    }
}