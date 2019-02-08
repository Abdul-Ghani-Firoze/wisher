<?php

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Wishlist extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('List_Model');
        $this->load->model('Item_Model');
    }

    public function index_get($listId = null) {
        $list = $this->List_Model->get_list_by_id($listId);
        $listItems = $this->Item_Model->get_items($listId);
        $data['list'] = $list;
        $data['items'] = $listItems;
        $this->load->view('wishlist-shared', $data);
    }

    public function list_get() {
        $list = $this->List_Model->get_list_by_id($this->session->listId);
        $this->response($list, 200);
    }

    public function items_get() {
        $items = $this->Item_Model->get_items($this->session->listId);
        $this->response($items, 200);
    }

    public function item_get($itemId = null) {
        if (isset($itemId)) {
            $this->load->model('Item_Model');
            $item = $this->Item_Model->get_item($itemId);
            $this->response($item, 200);
        }
    }

    public function list_put() {
        $updatedData = array('name' => $this->put('name'), 'description' => $this->put('description'));
        $row = $this->List_Model->update_list($this->put('listId'), $updatedData);
        if ($row > 0) {
            $this->response($row, 200);
        }
    }

    public function item_post() {
        $title = $this->post('title');
        $url = $this->post('url');
        $price = $this->post('price');
        $priority = $this->post('priority');
        $listId = $this->post('listId');

        if (isset($title) && isset($url) && isset($price) && isset($priority) && isset($listId)) {
            $itemId = $this->Item_Model->create_item($title, $url, $price, $priority, $listId);
            if ($itemId != null) {
                $this->response(array('itemId' => $itemId), 200);
            }
        }
    }

    public function item_put() {
        $itemId = $this->put('itemId');
        $title = $this->put('title');
        $url = $this->put('url');
        $price = $this->put('price');
        $priority = $this->put('priority');

        $item = array('title' => $title, 'url' => $url, 'price' => $price, 'priority' => $priority);
        $this->db->update('items', $item, array('itemId' => $itemId));
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->response($result, 200);
        }
    }

    public function item_delete($itemId) {
        $deleted = $this->Item_Model->delete_item($itemId);
        if ($deleted) {
            $this->response($deleted, 200);
        }
    }

}
