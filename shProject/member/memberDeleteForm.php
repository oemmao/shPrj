<?
session_start();
if(!isset($_SESSION['isLogin'])) {
	header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$idx = $_SESSION['id'];
$sql = "select userID from memberInfo where id='$idx'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>welcome to my homepage</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<p>회원탈퇴 페이지
<section>
    <article>
        <form class="form-horizontal" id="memberDelete" method="post" >
        <div class="form-group">
            <label for="inputID" class="col-sm-1 control-label">아이디</label>
            <div class="col-sm-3">
                <input type="userid" class="form-control" id="deleteID" name="deleteID" placeholder="아이디" value="<?= $row['userID']?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPW" class="col-sm-1 control-label">비밀번호</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="deletePW" name="deletePW" placeholder="비밀번호">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" class="btn btn-default" >탈퇴완료</button>
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
