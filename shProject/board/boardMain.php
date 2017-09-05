<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
//    echo "<script>document.location.href='http://sflower121.phps.kr/shProject/index.php';</script>";
}

header("Content-Type:text/html;charset=utf-8");

?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>welcome to my homepage</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="all_width">
    <? include "../header.php"; ?>
    <? include "../nav.php"; ?>
    <section>
        <article class="col-xs-9">
            <div>
                <h3>
                <span>게시판 리스트</span>
                </h3>
                <ul>
                    <li>1</li>
                    <li>1</li>
                    <li>1</li>
                </ul>
            </div>
            <button type="button" class="btn btn-warning pull-right" onclick="writingPage()" >글쓰기</button>
        </article>
    </section>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/member.js"></script>
<script src="../js/board.js"></script>
</html>
