<?php

class User_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function userList() {
        $query = $this->db->prepare('SELECT id, login, role FROM users');
        $query->execute();
        return $query->fetchAll();
    }
    
    public function singleUser($id) {
        $query = $this->db->prepare('SELECT id, login, role FROM users WHERE id = :id');
        $query->execute(array(':id' => $id));
        return $query->fetch();
    }

    public function create($data) {
        $login = $data['login'];
        $password = $data['password'];
        $role = $data['role'];
        
        $query = $this->db->prepare("INSERT INTO users
            (login, password, role) 
            VALUES (:login, :password, :role);");
        $query->execute(array(
            ':login' => $login, 
            ':password' => $password, 
            ':role' => $role
        ));
    }
    
    public function editSave($data) {
        $id = $data['id'];
        $login = $data['login'];
        $password = $data['password'];
        $role = $data['role'];
        
        $query = $this->db->prepare("UPDATE users 
            SET login = :login, password = :password, role = :role
            WHERE id = :id");
        $query->execute(array(
            ':id' => $id,
            ':login' => $login, 
            ':password' => $password, 
            ':role' => $role
        ));
    }
    
    public function delete($id) {
        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(array(':id' => $id));
    }
}
