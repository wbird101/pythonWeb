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
                    <?=$member->name?>
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">아이디</td>
                <td width="80%" align="left">
                    <?=$member->uid?>
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">암호</td>
                <td width="80%" align="left">
                    <?=$member->pwd?>
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">전화</td>
                <td width="80%" align="left">
                    <?=telview($member->tel)?>
                </td>
            </tr>
            <tr>
                <td width="20%" style="vertical-align:middle">등급</td>
                <td width="80%" align="left">
                    <?=rankview($member->rank)?>
                </td>
            </tr>
        </tbody>
    </table>
    <div align="center">
        <a href="/sale/member/view/no/<?=$member->no?>/update" class="btn btn-secondary">수정</a>
        <a href="/sale/member/delete/no/<?=$member->no?>" class="btn btn-secondary" onclick="return confirm('삭제할까요?');">삭제</a>
        <a href="/sale/member/list"  class="btn btn-secondary">이전화면</a>
    </div>
</form>
