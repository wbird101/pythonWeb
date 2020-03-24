<?php
class MY_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        //cashing
        $this->load->driver('cache', array('adapter' => 'file'));

        if($peak = $this->config->item('peak_page_cache')){
            if($peak == current_url()){
                $this->output->cache(5);
            }
        }
    }
}
 ?>
