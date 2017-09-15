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
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>welcome to my homepage</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="all_width">
    <? include "../layout/header.php"; ?>
    <!--     <? include "../layout/nav.php"; ?> -->
    <section>
        <article class="col-xs-12 article_line">
            <div>
                <h3>
                <span>글쓰기</span>
                </h3>
                <form method="post" class="writing_submit" enctype="multipart/form-data" class="form-horizontal" id="writingForm">
                <div class="form-group">
                    <label for="inputSubject" class="col-sm-2 control-label">제목</label>
                    <div class="col-sm-10">
                        <input type="inputSubject" class="form-control" id="inputSubject" name="inputSubject" placeholder="제목">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputFile" class="col-sm-2 control-label" >파일첨부</label>
                    <div class="col-sm-10">
                        <input type="file" id="inputFile" name="inputFile">
                        <!-- <p class="help-block">여기에 블록레벨 도움말 예제</p> -->
                    </div>

                </div>
                <div class="form-group">
                    <label for="inputContent" class="col-sm-2 control-label">글쓰기</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="inputContent" name="inputContent" rows="5"></textarea>
                    </div>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-info" >확인</button>
                    <button type="button" class="btn btn-warning" id="input_clear">다시쓰기</button>
                    <button type="button" class="btn btn-success" onclick="boardMain_page()" >목록</button>
                </div>
                </form>
            </div>

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
