<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    function __construct(){
      parent::__construct();
     $this->load->database();
     $this->load->model('member_model');
    }

    function list(){
        $this->_header();
        $this->load->helper('write');
        $member_list = $this->member_model->list();
        $this->load->view('member_list',array('list'=>$member_list));
        $this->load->view('footer');
    }

    function view(){
        $no = $this->uri->segment(4);
        $member = $this->member_model->get($no);
        $this->load->helper('write');
        //echo ($member->uid);
        $this->_header();
        if($this->uri->segment(5)=='update') $this->load->view('member_update',array("member"=>$member));
        else $this->load->view('member_view',array("member"=>$member));
        $this->load->view('footer');
    }

    function delete(){
        $this->load->helper('url');

        $no = $this->uri->segment(4);
        $this->member_model->delete($no);
        redirect('/sale/member/list');
    }

    function _header(){
        $this->load->view('header');
        $this->load->view('member_name');
    }

}
