<header class="col-xs-12">
<div class="pull-right">
<p><? echo $_SESSION['userName'] ?>님, 반갑습니다.
<button type="button" class="btn btn-info" onclick="updatePage()">정보수정</button>
<button type="button" class="btn btn-danger" onclick="deletePage()">탈퇴하기</button>
<button type="button" class="btn btn-success" onclick="logoutPage()">로그아웃</button>
</div>
</header>