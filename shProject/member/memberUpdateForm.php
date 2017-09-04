<?
session_start();
if(!isset($_SESSION['isLogin'])) {
	header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$idx = $_SESSION['id'];
$sql = "select userID, userName from memberInfo where id='$idx'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>welcome to my homepage</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<p>정보수정 페이지
<section>
    <article>
        <form class="form-horizontal" id="memberUpdate" method="post" >
        <div class="form-group">
            <label for="inputID" class="col-sm-1 control-label">아이디</label>
            <div class="col-sm-3">
                <input type="userid" class="form-control" id="updateID" name="updateID" placeholder="아이디" value="<?= $row['userID']?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPW" class="col-sm-1 control-label">비밀번호</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="updatePW" name="updatePW" placeholder="비밀번호">
            </div>
        </div>
        <div class="form-group">
            <label for="updatePWCheck" class="col-sm-1 control-label">비밀번호 재확인</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="updatePWCheck" name="updatePWCheck" placeholder="비밀번호 재확인">
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1 control-label">이름</label>
            <div class="col-sm-3">
                <input type="username" class="form-control" id="updateName" name="updateName" value="<?= $row['userName']?>" placeholder="이름">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-1 control-label">성별</label>
            <div class="col-sm-3">
                <label class="radio-inline">
                <input type="radio" id="checkGender1" name="checkGender" value="man"> 남자
                </label>
                <label class="radio-inline">
                <input type="radio" id="checkGender2" name="checkGender" value="woman"> 여자
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" class="btn btn-default" >정보수정</button>
                <button type="button" class="btn btn-default" onclick="prevPage()" >이전으로</button>
            </div>

        </div>
        </form>
    </article>
</section>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/member.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
