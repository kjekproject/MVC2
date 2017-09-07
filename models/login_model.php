<?php

class Login_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function run() {
        $login      = $_POST['login'];
        $password   = $_POST['password'];
        
        $query = $this->db->prepare("SELECT id, role FROM users WHERE
                login = :login AND password = :password");
        $query->execute(array(
            ':login' => $login,
            ':password' => $password
        ));
        
        $data = $query->fetch();
        
        $count = $query->rowCount();
        if($count >0) {
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', TRUE);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }
    }
}