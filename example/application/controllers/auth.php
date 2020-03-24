<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->config('opentutorial');
  }

  function login(){
    $this->load->helper('url');
    $this->load->view("header");
    $this->load->view('login',array('returnURL'=>$this->input->get('returnURL')));
    $this->load->view("footer");
  }
  function authentication(){
    $this->load->model('user_model');
    $user = $this->user_model->getByEmail(array('email'=>$this->input->post('email')));
    if(
      $this->input->post('email')==$user->email &&
      password_verify($this->input->post('password'),$user->password)
    ){
      $this->session->set_userdata(array('is_login'=>true));
      $this->load->helper('url');
      $returnURL = $this->input->get('returnURL');
      if(empty($returnURL)){
          $returnURL = site_url('/topic/');
      }
      redirect($returnURL);
    }else{
      $this->session->set_flashdata('message','로그인에 실패했습니다.');
      $this->load->helper('url');
      redirect('/auth/login');
    }
  }

  function logout(){
    $this->session->sess_destroy();
    //$this->session->unset_userdata('is_login');
    $this->load->helper('url');
    echo 'log out is_login:'.$this->session->userdata('is_login');
//    redirect('/');
//    var_dump($this->session->userdata('is_login'));
  }

  function register(){
    $this->load->view("header");

    $this->load->library('form_validation');
    //vailid_email:이메일 주소 유효성 검사 is_unique[user.email]:db에 있는 데이타인지 체크
    $this->form_validation->set_rules('email','이메일 주소','required|valid_email');
    $this->form_validation->set_rules('nickname','닉네임','required|min_length[5]|max_length[20]');
    $this->form_validation->set_rules('password','비밀번호','required|min_length[6]|max_length[30]|matches[re_password]');
    $this->form_validation->set_rules('re_password','비밀번호 확인','required');

    if($this->form_validation->run()==false){
      $this->load->view('register');
    }else{
        //echo "email:" .$this->input->post('email'); password_hash("password", PASSWORD_DEFAULT )
        $hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT );
        $this->load->model('user_model');
        $this->user_model->add(array(
            'email'=>$this->input->post('email'),
            'nickname'=>$this->input->post('nickname'),
            'password'=>$hash));
        $this->session->set_flashdata('message','회원가입에 성공했습니다.');
        $this->load->helper('url');
        redirect('/topic');
    }
    $this->load->view("footer");
  }

}
