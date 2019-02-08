<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class List_Model extends CI_Model {

    public function create_list($name, $description, $email) {
        $list = array('name' => $name, 'description' => $description, 'email' => $email);
        $this->db->insert('lists', $list);
        return $this->db->insert_id();
    }

    public function get_list_by_email($email) {
        // get listid of the email
        $list_query = $this->db->get_where('lists', array('email' => $email));
        $list = $list_query->result_array();

        return $list[0];
    }

    public function get_list_by_id($listId) {
        // get listid of the email
        $list_query = $this->db->get_where('lists', array('listId' => $listId));
        $list = $list_query->result_array();

        return $list[0];
    }

    public function update_list($listId, $data) {
        $this->db->update('lists', $data, array('listId' => $listId));
        return $this->db->affected_rows();
    }

}
