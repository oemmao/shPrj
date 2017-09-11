<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$idx = $_GET['idx'];
$page = $_GET['page'];
$sql = "select * from boardInfo where idx='$idx'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
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
    <? include "../layout/header.php"; ?>
    <? include "../layout/nav.php"; ?>
    <section>
        <article class="col-xs-9 article_line">
            <div>
                <h3>
                <span>글 수정하기</span>
                </h3>
                <form class="form-horizontal" id="boardUpdateForm">
                <div class="form-group">
                    <label for="inputSubject" class="col-sm-2 control-label">제목</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputSubject" name="inputSubject" value="<?= $row['subject']?>">
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
                        <textarea class="form-control" id="inputContent" name="inputContent" rows="5"><?= $row['content']?></textarea>
                    </div>
                </div>
                </form>
            </div>
			<div class="pull-right">
            <button type="button" class="btn btn-info boardUpdate_submit" id="page=<?=$page?>&idx=<?=$idx?>">확인</button>
			<button type="button" class="btn btn-warning" id="input_clear">다시쓰기</button>
			<button type="button" class="btn btn-success" onclick="boardPrev_page()" >이전으로</button>
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