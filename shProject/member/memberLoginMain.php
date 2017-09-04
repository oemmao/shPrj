<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
//    echo "<script>document.location.href='http://sflower121.phps.kr/shProject/index.php';</script>";
}

header("Content-Type:text/html;charset=utf-8");
//echo "회원가입 또는 로그인 성공 화면<br>";
//echo $_SESSION['userName'];
echo "{$_SESSION['userName']}님, 반갑습니다.";
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>welcome to my homepage</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<button type="button" class="btn btn-info" onclick="updatePage()">정보수정</button>
<button type="button" class="btn btn-danger" onclick="deletePage()">탈퇴하기</button>
<button type="button" class="btn btn-success">로그아웃</button>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/member.js"></script>
</html>
