<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function create_user($user) {
        $this->db->insert('users', $user);
    }

    public function check_user($email) {
        $result = $this->db->get_where('users', array('email' => $email));
        return $result->num_rows() > 0;
    }

    public function authenticate($email, $password) {
        $res = $this->db->get_where('users', array('email' => $email));
        if ($res->num_rows() != 1) {
            return false;
        } else {
            $row = $res->row();
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return true;
            } else {
                return false;
            }
        }
    }

}
