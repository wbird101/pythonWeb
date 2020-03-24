<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatbot extends CI_Controller {
    function __construct(){
      parent::__construct();
    }

    function index(){
        $this->load->helper('date');
        $this->load->view('chatbot');
    }

}
