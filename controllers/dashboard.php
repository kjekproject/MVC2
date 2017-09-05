<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct(); 
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == FALSE) {
            Session::destroy();
            header('location: ../login');
            exit();
        }
        
        $this->view->js = array('dashboard/js/default.js');
    }
    
    public function index() {
        $this->view->render('dashboard/index');
    }
    
    public function logout() {
        Session::destroy();
        header('location: ../login');
        exit();
    }
    
    public function xhrInsert() {
        $this->model->xhrInsert();
    }
    
    public function xhrGetListings() {
        $this->model->xhrGetLIstings();
    }
    
    public function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }
}