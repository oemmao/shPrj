<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
//    echo "<script>document.location.href='http://sflower121.phps.kr/shProject/index.php';</script>";
}

header("Content-Type:text/html;charset=utf-8");
//echo "회원가입 또는 로그인 성공 화면<br>";
//echo $_SESSION['userName'];
//echo "{$_SESSION['userName']}님, 반갑습니다.";
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>welcome to my homepage</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="all_width">
<? include "header.php"; ?>
<? include "nav.php"; ?>
<section>
    <article class="col-xs-9">
        <div>
            <h3>
            <span>게시판 메인</span>
            </h3>
			<img class="img_info" src="image/board_main.jpg">
        </div>
    </article>
</section>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/member.js"></script>
</html>
