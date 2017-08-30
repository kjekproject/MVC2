<?php

class Help extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('help/index');
    }

    public function other($arg = false) {
        
        require 'models/Help_Model.php';
        $model = new Help_model();
        $this->view->blah = $model->blah();
    }
}
