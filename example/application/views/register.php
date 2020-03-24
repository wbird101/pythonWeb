<div>
  <div ></div>
  <?php echo validation_errors(); ?>
  <div class="jumbotron jumbotron-fluid " id="box">
    <div class="container">
      <h1 class="display-4">회원가입 </h1>

        <form method="post" action="/index.php/auth/register">
          <div class="form-group">
            <label for="exampleInputEmail1">이메일</label>
            <input type="email" class="form-control" value="<?php echo set_value('email');?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">닉네임</label>
            <input type="text" class="form-control" value="<?php echo set_value('nickname');?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="nickname">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">비밀번호</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">비밀번호 확인</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="re_password">
          </div>
          <input type="submit" class="btn btn-primary">
        </form>
      </div>
  </div>
  <div class=""></div>
</div>
