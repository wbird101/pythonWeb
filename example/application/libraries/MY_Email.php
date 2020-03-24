<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Email extends CI_Email{
    public function to($to){
        $this->ci = &get_instance();    //content 가져요기
        $_to = $this->ci->config->item('dev_receive_email');
        $to = !$_to ? $to : $_to;
        return parent::to($to);
    }
}
?>
