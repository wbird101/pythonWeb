<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/static/css/style.css" rel="stylesheet" type="text/css">
          <link href="/static/lib/css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
      <?php
      if($this->session->flashdata('message')){
      ?>
      <script>alert('<?=$this->session->flashdata('message')?>');</script>
      <?php
      }
      //echo 'is_login:'.$this->session->userdata('is_login');
      if($this->config->item('is_dev')){
        echo '<div class="container">
          개발환경을 수정중입니다.
        </div>';
      }  ?>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <?php
          if($this->session->userdata('is_login')){
            echo '<a class="nav-link active" href="/index.php/auth/login">로그아웃</a>';
          }else{
            echo '<a class="nav-link active" href="/index.php/auth/login">로그인</a>';
            echo '</li><li class="nav-item">';
            echo '<a class="nav-link active" href="/index.php/auth/register">회원가입</a>';
          }
           ?>
        </li>
      </ul>

      <div class="container-fluid">
        <div class="row">
