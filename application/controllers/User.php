<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function index_get() {
        if ($this->session->logged_in) {
            redirect('user/list');
        } else {
            $this->load->view('login');
        }
    }

    public function login_get() {
        $this->load->view('login');
    }

    public function logout_get() {
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

    public function register_get() {
        $this->load->view('register');
    }

    public function list_get() {
        if (!$this->session->logged_in) {
            redirect('user/login');
        } else {
            if (!isset($this->session->userdata['listId'])) {
                $this->load->model('List_Model');
                $list = $this->List_Model->get_list_by_email($this->session->email);
                $this->session->set_userdata('listId', $list['listId']);
                $this->session->unset_userdata('email'); // removing email from session for security purposes
            }
            $this->load->view('wishlist');
        }
    }

    public function login_post() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if (empty($email) || empty($password)) {
            $this->response(array('status' => false, 'errorMsg' => 'Please enter both username & password'));
        }

        $result = $this->User_Model->authenticate($email, $password);

        if ($result == TRUE) {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('email', $email);
            $this->response(array('status' => true, 'redirectUrl' => 'user/list'), 200);
        } else {
            $this->response(array('status' => false, 'errorMsg' => 'Invalid email or password'));
        }
    }

    public function register_post() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm-password');
        if (strcmp($password, $confirm_password) == 0) { // check if passwords match
            if ($this->User_Model->check_user($email) == false) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $user = array('name' => $name, 'email' => $email, 'password' => $hashed_password);
                $this->User_Model->create_user($user);
                $this->session->set_userdata('email', $email); // temporary - need to create list
                $this->session->set_userdata('logged_in', true);
                $this->load->view('list_creation');
            } else {
                $this->load->view('register', array('error_message' => 'User already exists! Please login.'));
            }
        } else {
            $this->load->view('register', array('error_message' => "Password don't match! Please try again."));
        }
    }

    public function list_post() {
        $name = $this->input->post('wishlist-name');
        $description = $this->input->post('description');
        $email = $this->session->userdata('email');
        if (isset($name) && isset($description) && isset($email)) {
            $this->load->model('List_Model');
            $listId = $this->List_Model->create_list($name, $description, $email);
            $this->session->set_userdata('listId', $listId);
            redirect('user/list');
        }
    }

}
