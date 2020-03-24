<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller {

  public function __construct(){
    parent::__construct();
}

function process(){
        $this->load->model('user_model');
        $users = $this->user_model->gets();
        $this->load->library('email');
        $this->email->initialize(array('mailtype'=>'html'));
        foreach($users as $user){
            $this->email->from('master@ooo2.com', 'nickname');
            $this->email->to($user->email);
            $this->email->subject('test');
            $this->email->message('test');
            $this->email->send();
            echo "{$user->email}로 메일 전송을 성공 했습니다.\n";
        }

    }

}
  ?>
