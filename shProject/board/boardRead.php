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

//유저idx랑 게시글idx를 쿠키에 저장
$Witer_idx = $row['member_idx'];
//로그인 유저ID값 가져옴
$userID_idx = $_COOKIE['cooki_user_idx'];
echo "{$idx} {$userID_idx}<br>";
//게시글 추가 배열
//$view_array = array($idx);
//setcookie("cooki_boardIdx_view", serialize($view_array), time()+(60*60), "/");
//$cooki_boardIdx_view_array = unserialize($_COOKIE['cooki_boardIdx_view']);
//print_r($cooki_boardIdx_view_array);
//echo "<br>";
//array_push($view_array, 10);
////	echo "{$view_array[0]}";
//	print_r($view_array);


////게시글번호와 userID를 저장
//$cookie_data = $idx."_".$userID_idx;
//echo "{$cookie_data}<br>";
//
////쿠키에 해당 값 유무 확인
//if (!$_COOKIE[$cookie_data]) { //없으면 쿠키셋 해주고, 조회수 올려줌.
//	echo "없어";
//	setcookie($cookie_data, $cookie_data, time()+(60*5), "/");
//	$viewCheck_sql = "update boardInfo set textView=textView+1 where idx='$idx'";
//	mysqli_query($con, $viewCheck_sql);
//} else { //있으면 조회수 안올림.
//	echo "있음";
//}


//게시글번호와 userID를 저장
$cookie_data = $idx."_".$userID_idx;
echo "{$cookie_data}<br>";
//$cookie_data를 담기위해 배열 선언 
$cookie_data_arr = array();
//cookie_idx_view 쿠키의 배열 값을 가져오기 위해 변수 선언
//쿠키에 문자열(String)으로 저장되어 있기 때문에, unserialize 해줘야 함.
$cookie_idx_view_array = unserialize($_COOKIE['cookie_idx_view']);

//$_COOKIE['cookie_idx_view'] 생성 여부 확인
if (!$_COOKIE['cookie_idx_view']) { //쿠키 없으면 값을 추가하고, 쿠키셋하고, 조회수 올려줌.
	echo "쿠키 없어";
	array_push($cookie_data_arr, $cookie_data); //값 추가
	print_r($cookie_data_arr);
	//serialize -> 문자열 포멧으로 변경하기 위해 사용 (쿠키는 문자열(string)로 저장됨.)
	//쿠키나 jQuery 등등에 맞는 포멧으로 변경하기 위해 Serialize를 사용함.
	//serialize를 사용하여 배열을 쿠키 포멧에 맞게 변경하여 저장
	setcookie("cookie_idx_view", serialize($cookie_data_arr), time()+(60*5), "/");
	$viewCheck_sql = "update boardInfo set textView=textView+1 where idx='$idx'";
	mysqli_query($con, $viewCheck_sql);
	print_r($cookie_idx_view_array);
} else {
	//$cookie_idx_view_array에 $cookie_data 값 유무 확인
	if (in_array($cookie_data, $cookie_idx_view_array)) { //있으면 조회수 안올림.
		echo "값 있음<br>";
		print_r($cookie_idx_view_array);
	} else { //없으면 값을 추가하고, 쿠키셋하고, 조회수 올려줌.
		echo "값 없음<br>";
		array_push($cookie_idx_view_array, $cookie_data); //값 추가
		print_r($cookie_idx_view_array);
		setcookie("cookie_idx_view", serialize($cookie_idx_view_array), time()+(60*5), "/");
		$viewCheck_sql = "update boardInfo set textView=textView+1 where idx='$idx'";
		mysqli_query($con, $viewCheck_sql);
	}
}

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
                <? include "commentList.php"; ?>

                <div class="board_reply_list">
                    <?
                    if ($cmt_row_total == 0) {
                    echo "작성된 댓글이 없습니다.";
                    } else {
                    ?>
                    <ul>
                        <?
                        while ($cmt_row = mysqli_fetch_array($cmt_list_result)) {
                        //                                        echo "cmt : ";
                        //                                        print_r($cmt_row);
                        //                                        echo "<br>";
                        ?>
                        <li>
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading"><?=$cmt_row['userID']?> <span class="cmt_date_size"><?=$cmt_row['commentDate']?></span></h4>
                                <?=$cmt_row['comment']?>
                            </div>
                        </div>
                        </li>
                        <?
                        }
                        ?>
                    </ul>
                </div>
                <div class="board_reply_page">
                    <ul class="pagination cmt_page_center">
                        <?

                        if ($cmt_start_page > $cmt_now_block) {
                        $cmt_prev_page = $cmt_start_page - 1;
                        ?>
                        <li>
                        <a href=<? echo "$PHP_SELF?page=$page&idx=$idx&cmt_page=$cmt_prev_page" ?>
                            aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <?
                        }
                        for ($i = $cmt_start_page; $i <= $cmt_end_page; $i++) {
                        if ($cmt_page != $i) {
                        ?>
                        <li>
                        <a href=<? echo "$PHP_SELF?page=$page&idx=$idx&cmt_page=$i"?>
                            ><?=$i?>
                            <span class="sr-only"></span>
                        </a>
                        </li>
                        <?
                        } else {
                        ?>
                        <li class="active">
                        <a href="#">
                            <?=$i?>
                            <span class="sr-only"></span>
                        </a>
                        </li>
                        <?
                        }
                        }
                        if ($cmt_now_block < $cmt_block_total) {
                        $cmt_next_page = $cmt_end_page + 1;
                        ?>
                        <li>
                        <a href=<? echo "$PHP_SELF?page=$page&idx=$idx&cmt_page=$cmt_next_page" ?>
                            aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                        <?
                        }
                        ?>
                    </ul>
                    <?
                    }
                    ?>
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

