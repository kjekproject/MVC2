<?php

class Help extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('help/index');
    }

    public function other($arg = false) {
        
        require 'models/Help_model.php';
        $model = new Help_model();
        $this->view->blah = $model->blah();
    }
}
