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
                <span>글쓰기</span>
                </h3>
                <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputSubject" class="col-sm-2 control-label">제목</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputSubject" name="inputSubject" placeholder="제목">
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
                </form>
            </div>
			<div class="pull-right">
            <button type="button" class="btn btn-info ">확인</button>
			<button type="reset" class="btn btn-warning" value="다시쓰기">다시쓰기</button>
			<button type="button" class="btn btn-success" onclick="board_prevPage()" >이전으로</button>
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
