<?php
  class AdminmasterModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Login Admin User
    public function login($username, $password){
        $this->db->query('SELECT * FROM admin_account WHERE admin_username = :username');
        $this->db->bind(':username', $username);
  
        $row = $this->db->single();
  
        // $hashed_password = $row->password;
        if($row){
          return $row;
        } else {
          return false;
        }
      }
  
      // Find user by Username
      public function findUserByUsername($username){
        $this->db->query('SELECT * FROM admin_account WHERE admin_username = :username');
        // Bind value
        $this->db->bind(':username', $username);
  
        $row = $this->db->single();
  
        // Check row
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }
  
      // Get User by ID
      public function getUserById($id){
        $this->db->query('SELECT * FROM admin_account WHERE admin_account_id = :id');
        // Bind value
        $this->db->bind(':id', $id);
  
        $row = $this->db->single();
  
        return $row;
      }
  }