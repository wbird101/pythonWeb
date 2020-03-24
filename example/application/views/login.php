<div class="jumbotron jumbotron-fluid" id="box">
  <div class="container">
    <h1 class="display-4">로그인</h1>
      <form action="<?=site_url('/auth/authentication?returnURL='.rawurlencode($returnURL))?>" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">아이디</label>
          <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <input type="submit" class="btn btn-primary">
      </form>
    </div>
</div>
