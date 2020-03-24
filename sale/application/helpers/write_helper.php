<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('rankview')){
  function rankview($num){
    if($num) return '사용자';
    return '관리자';
  }
}

  if(!function_exists('telview')){
    function telview($tel){
      return substr($tel,0,3).'-'.substr($tel,3,4).'-'.substr($tel,-4,4);
    }
}
