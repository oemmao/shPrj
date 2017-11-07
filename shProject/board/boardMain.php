<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}
include "boardList.php";
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
<?
//$cookie_user_idx = $_COOKIE['cooki_user_idx'];
//$cookie_view_arr = unserialize($_COOKIE['cookie_idx_view']);
//print_r($cookie_view_arr);
print_r($_COOKIE);
?>
<div class="all_width">
    <? include "../layout/header.php"; ?>
<!--     <? include "../layout/nav.php"; ?> -->
    <section>
        <article class="col-xs-12 article_line">
            <div class="list_size">
                <h3>
                <span>게시판 리스트</span>
                </h3>
                <!-- 				<? echo "{$board_total}"; ?> -->
                <!-- 				<? echo "{$sql_list}";?> -->
                <!-- 				<?echo "{$total_result}";?> -->

                <table class="table">
                <thead>
                <tr>
                    <th class="col-xs-1 text-center">No.</th>
                    <th class="col-xs-4 text-center">제목</th>
                    <th class="col-xs-2 text-center">작성</th>
                    <th class="col-xs-3 text-center">작성일</th>
                    <th class="col-xs-2 text-center">조회</th>
                </tr>
                </thead>
                <?
                while($row = mysqli_fetch_array($board_result)) {
                //						echo "cmt : ";
                //						print_r($row);
                //						echo "<br>";
                ?>
                <tr>
                    <td class="text-center"><?= $row['idx']?></td>
                    <td><a href="boardRead.php?page=<?=$page?>&idx=<?=$row['idx']?>"><?= $row['subject']?></a></td>
                    <td class="text-center"><?= $row['userID']?></td>
                    <td class="text-center"><?= $row['creatDate']?></td>
                    <td class="text-center"><?= $row['textView']?></td>
                </tr>
                <?
                }
                mysqli_close($con);
                ?>
                </table>
            </div>
            <div class="writing_size">
                <button type="button" class="btn btn-warning pull-right" onclick="writingPage()" >글쓰기</button>
            </div>
            <div class="#">
                <ul class="pagination page_center">
                    <?
                    if ($start_page > $now_block) {
                    $prev_page = $start_page - 1;
                    ?>
                    <li>
                    <a href=<? echo "$PHP_SELF?page=$prev_page" ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>

                    <?
                    }
                    for ($i = $start_page; $i <= $end_page; $i++) {
						if ($page != $i) {
                    ?>
                    <li>
                    <a href=<? echo "$PHP_SELF?page=$i"?>
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
                    if ($now_block < $block_total) {
                    $next_page = $end_page + 1;
                    ?>
                    <li>
                    <a href=<? echo "$PHP_SELF?page=$next_page" ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                    <?
                    }
                    ?>
                </ul>
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
