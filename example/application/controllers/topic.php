<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends MY_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->database();
    $this->load->model("topic_model");

  }

	public function index()
	{
    $this->_head();
    $this->load->view("footer");
	}

  public function get($id)
  {
    $this->_head();
    $topic = $this->topic_model->get($id);

    //helper 사용
    //$this->load->helper('url',);
    //다수의 헬퍼 사용
    $this->load->helper(array('url','korean'));
    $this->load->view('main',array('topic'=>$topic));
    $this->load->view("footer");
   }

   public function add(){
     //logging 확인
         if(!$this->session->userdata('is_login')){
           $this->load->helper('url');
           redirect('auth/login?returnURL='.rawurlencode(site_url('/topic/add')));
         }

         $this->_head();
         //form valdation
         $this->load->library('form_validation');
         $this->form_validation->set_rules('title','제목','required');
         $this->form_validation->set_rules('description','본문','required');
         if ($this->form_validation->run() == FALSE)
         {
              $this->load->view("add");
          }
          else
          {
            $topic_id = $this->topic_model->add($this->input->post('title'),$this->input->post('description'));
            //사용자 정보 가져오기
            $this->load->model('user_model');
            $users = $this->user_model->gets();
            //email 전송
            $this->load->library('email');
            foreach($users as $user){
                $this->email->from('wbird101@naver.com', 'wbird');
                $this->email->to($user->email);
                $this->email->subject('새로운 글이 등록되었습니다.');
                $this->email->message('<a href="">'.$this->input->post('title').'</a>');

                $this->email->send();
            }

            redirect('/topic/get/'.$topic_id);

          }
         $this->load->view("footer");
   }

   function upload_form(){
     $this->_head();
     $this->load->view('upload_form');
     $this->load->view("footer");
   }

   function upload_receive_from_ck(){
     // 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
      $config['upload_path'] = './static/user';
      // git,jpg,png 파일만 업로드를 허용한다.
      $config['allowed_types'] = 'gif|jpg|png';
      // 허용되는 파일의 최대 사이즈
      $config['max_size'] = '100';
      // 이미지인 경우 허용되는 최대 폭
      $config['max_width']  = '1024';
      // 이미지인 경우 허용되는 최대 높이
      $config['max_height']  = '768';
      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload("upload"))
      {
        echo "error:".$this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        $CKEditorFuncNum = $this->input->get('CKEditorFuncNum');
        echo "성공".$CKEditorFuncNum;
        //var_dump($data);
      }
   }

   function upload_receive(){
     // 사용자가 업로드 한 파일을 /static/user/ 디렉토리에 저장한다.
      $config['upload_path'] = './static/user';
      // git,jpg,png 파일만 업로드를 허용한다.
      $config['allowed_types'] = 'gif|jpg|png';
      // 허용되는 파일의 최대 사이즈
      $config['max_size'] = '100';
      // 이미지인 경우 허용되는 최대 폭
      $config['max_width']  = '1024';
      // 이미지인 경우 허용되는 최대 높이
      $config['max_height']  = '768';
      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload("user_upload_file"))
      {
        echo $this->upload->display_errors();
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        echo "성공";
        var_dump($data);
      }
   }

   function _head(){
     $this->load->config('opentutorial');
     $this->load->view("header");
     $topics = $this->topic_model->gets();
     $this->load->view("topic_list",array('topics'=>$topics));
   }
}
