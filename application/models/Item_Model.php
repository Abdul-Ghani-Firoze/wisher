<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item_Model extends CI_Model {

    public function create_item($title, $url, $price, $priority, $listId) {
        $item = array('title' => $title, 'url' => $url, 'price' => $price,
            'priority' => $priority, 'listId' => $listId);
        $this->db->insert('items', $item);
        return $this->db->insert_id();
    }

    public function get_item($itemId) {
        $query = $this->db->get_where('items', array('itemId' => $itemId));
        return $query->result_array();
    }

    public function get_items($listId) {
        $query = $this->db->get_where('items', array('listId' => $listId));
        if ($query != null) {
            return $query->result_array();
        }
        return null;
    }

    public function delete_item($itemId) {
        return $this->db->delete('items', array('itemId' => $itemId));
    }

}
