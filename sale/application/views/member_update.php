<?php
if($member->rank == 0){
    $rank = array('admin'=>'<input class="form-check-input" type="radio" name="rank" checked id="inlineRadio1" value="0">',
                    'user'=>'<input class="form-check-input" type="radio" name="rank" id="inlineRadio2" value="1">');
} else{
    $rank = array('admin'=>'<input class="form-check-input" type="radio" name="rank"  id="inlineRadio1" value="0">',
                    'user'=>'<input class="form-check-input" type="radio" name="rank" checked id="inlineRadio2" value="1">');
}
 ?>
<form mehtod="post" action="">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td width="20%" style="vertical-align:middle">번호</td>
                <td width="80%" align="left"><?=$member->no?></td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">이름</td>
                <td width="80%" align="left">
                    <input type="text" name="name" value="<?=$member->name?>">
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">아이디</td>
                <td width="80%" align="left">
                    <input type="text" name="name" value="<?=$member->uid?>">
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">암호</td>
                <td width="80%" align="left">
                    <input type="text" name="name" value="<?=$member->pwd?>">
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">전화</td>
                <td width="80%" align="left">
                    <input type="text" name="name" value="<?=telview($member->tel)?>">
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">등급</td>
                <td width="80%" align="left">
                    <div class="form-check form-check-inline">
                      <?=$rank['admin']?>
                      <label class="form-check-label" for="inlineRadio1">관리자</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <?=$rank['user']?>
                      <label class="form-check-label" for="inlineRadio2">사용자</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div align="center">
        <a href="/sale/member/update/no/<?=$member->no?>" class="btn btn-secondary">수정</a>
        <a href="/sale/member/delete/no/<?=$member->no?>" class="btn btn-secondary" onclick="return confirm('삭제할까요?');">삭제</a>
        <a href="/sale/member/list"  class="btn btn-secondary">이전화면</a>
    </div>
</form>
