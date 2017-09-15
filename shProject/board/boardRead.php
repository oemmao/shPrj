<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}
include "../db_Info.php";
$page = ($_GET['page'])? $_GET['page'] : 1;
$idx = $_GET['idx'];
//echo "{$page} {$idx}";

$sql = "select idx, member_idx, subject, content, creatDate, textView, viewCheck, userID from boardInfo join memberInfo on boardInfo.member_idx = memberInfo.id where idx='$idx'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
//						echo "cmt : ";
//						print_r($row);
//						echo "<br>";

//조회수 -> 새로고침할때 조회수 안올라감 ㅋㅋ
//쿠키를 사용해서 조회수 구현하기
//if ($_SESSION['id'] != $row['member_idx'] && $row['viewCheck'] == T) {	
//	$viewCheck_sql = "update boardInfo set textView=textView+1, viewCheck='F' where idx='$idx'";
//	mysqli_query($con, $viewCheck_sql);
//}

setcookie("cooki_boardIdx", $row['idx'], time()+(60*60), "/");
//echo "board idx_11 : ".$row['idx']."<br>";
//echo "board idx : ".$_COOKIE['cooki_boardIdx']."<br>";
//
//$viewCheck = $row['idx'];
////setcookie("cooki_viewCheck", $row['idx'], time()+(60*60), "/");
//
//echo "id : ".$_COOKIE['cooki_id']."<br>";
//echo "name : ".$_COOKIE['cooki_name']."<br>";
//echo "userID : ".$_COOKIE['cooki_userID']."<br>";
//echo "viewCheck : ".$_COOKIE['cooki_viewCheck']."<br>";
//echo "viewCheck : ".$_COOKIE['cooki_viewCheck_11']."<br>";

//if ($_COOKIE['cooki_viewCheck'] > $_COOKIE['cooki_boardIdx']) {
//	$viewCheckes = 1;
//	setcookie("cooki_viewCheck", $viewCheckes+$row['idx'], time()+(60*60), "/");
//}
//$_COOKIE['cooki_id'] != $row['member_idx']
//if ($viewCheck == $_COOKIE['cooki_boardIdx'] && $_COOKIE['cooki_viewCheck'] == 1) {
//	$viewCheck_sql = "update boardInfo set textView=textView+1 where idx='$idx'";
//	mysqli_query($con, $viewCheck_sql);
//	$viewCheck = 0;
//	setcookie("cooki_viewCheck", $viewCheck, time()+(60*60), "/");
//}

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
        <article class="col-xs-12">
            <div>
                <h3>
                <span>글읽기</span>
                </h3>
                <div class="read_table">
                    <table class="read_table_size">
                    <tr class="read_table_tr_size">
                        <td class="col-xs-6 read_table_font"><?=$row['subject']?></td>
                        <td class="col-xs-5 text-center"><?=$row['creatDate']?></td>
                        <td class="col-xs-1 text-center"><?=$row['textView']?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="col-xs-12 read_table_font read_table_id_size"><?=$row['userID']?>님</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="col-xs-12 read_table_text" ><?=$row['content']?></td>
                    </tr>
                    </table>
                </div>
            </div>
            <div>
                <h4>댓글리스트</h4>

                <div class="board_reply_list">
                    <ul>
                        <li>댓글 리스트가 촤라락~</li>
                    </ul>
                </div>
            </div>
            <div>
                <h4>댓글작성</h4>
                <div class="board_reply">
                    <table class="reply_table_size">
                    <tr class="reply_table_tr_size">
                        <td class="col-xs-2 text-center reply_table_id_size" id="comment_userID" name="comment_userID"><? echo $_SESSION['userID'] ?></td>
                        <td class="col-xs-8"><textarea class="reply_text_size" id="comment_text" name="comment_text" rows="3"></textarea></td>
                        <td class="col-xs-2"><button type="button" class="btn btn-reply_color comment_submit" id="page=<?=$page?>&idx=<?=$idx?>">등록</button></td>
                    </tr>
                    </table>
                </div>
            </div>

            <div class="pull-right bnt_group">
                <button type="button" class="btn btn-Info" onclick="writingPage()" >글쓰기</button>
                <? if ($_SESSION['id'] == $row['member_idx']) {?>
                <button type="button" class="btn btn-Info boardUpdate" id="page=<?=$page?>&idx=<?=$idx?>" onclick="boardUpdate_page()" >수정</button>
                <button type="button" class="btn btn-Info boardDelete" id="page=<?=$page?>&idx=<?=$idx?>" >삭제</button>
                <? } ?>
                <button type="button" class="btn btn-primary" onclick="boardMain_page()" >목록</button>
            </div>
            <?

            mysqli_close($con);
            ?>
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

