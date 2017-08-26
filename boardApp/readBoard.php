<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
}

echo "게시글 읽기";

include "../loginApp/db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");

$num = $_GET['num'];
//이전글/다음글을 본 후 목록으로 돌아올때 page를 지정해 주기위해 
$page = ($_GET['page'])? $_GET['page'] : 1;

$sql = "select * from boardtest where num='$num'";
$result = mysqli_query($conn, $sql);
?>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		.div_table {
			width: 500px;
			margin: 10px;
		}
		.div_table ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		.div_table ul li {
			float: left;
		}
		.li_table_w {
			width: 100px;
		}
		.li_table_d {
			width: 300px;
		}
		.li_table_u {
			width: 100px;
		}
		.li_table_c {
			width: 400px;
			height: 30px;
		}
		.li_table_r {
			width: 100px;
			height: 30px;
		}
		.reply {
			width: 100%;
			padding-left: 20px;
			display: none;
		}
		.replyMark {
			padding: 0px;
		}
	</style>
</head>
<body>
	<table>
	<?php
	$row = mysqli_fetch_array($result);
	?>
		<tr>
			<td colspan="4" ><?= $row['subject'] ?></td>
		</tr>
		<tr>
			<td>글쓴이</td>
			<td><?= $row['writer'] ?></td>
			<td>이메일</td>
			<td><?= $row['email'] ?></td>
		</tr>
		<tr>
			<td>날짜</td>
			<td><?= $row['creatDate'] ?></td>
			<td>조회수</td>
			<td><?= $row['textView'] ?></td>
		</tr>
		<tr>
			<td colspan="4" ><?= $row['content'] ?></td>
		</tr>
		<tr>
			<td colspan="4">
			<a href="boardIndex.php?page=<?=$page?>"><input type="button" name="" value="목록보기" ></a>
			<a href="createBoardForm.php"> <input type="button" name="" value="글쓰기" ></a>
			<a href="updateBoardForm.php?num=<?=$num ?>"> <input type="button" value="수정" ></a>
			<a href="deleteBoardForm.php?num=<?=$num ?>"><input type="button" value="삭제" ></a>
			</td>
		</tr>
<!-- 이전/다음글 소스 -->
		<tr>
			<td colspan="4" >
			<?php
				//현재글번호에서 다음으로 큰 번호를 하나 가져옴 //오름차순 정렬
				$sql_next = "select num from boardtest where num > $num limit 1";
				$next_num = mysqli_query($conn, $sql_next);
				$next_text = mysqli_fetch_array($next_num); 
				//echo "{$next_text['num']}";
				if ($next_text[num]) {
					echo "<a href='readBoard.php?num=$next_text[num]'>[▲다음글]</a>";
				}
				
				$sql_prev = "select num from boardtest where num < $num order by num desc limit 1";
				$prev_num = mysqli_query($conn, $sql_prev);
				$prev_text = mysqli_fetch_array($prev_num); 
				//echo "{$prev_text[num]}";
				if ($prev_text[num]) {
					echo "<a href='readBoard.php?num=$prev_text[num]'>[▼이전글]</a>";
				}
			?>		
			</td>
		</tr>
	</table>

<!-- 댓글 폼 -->
	<p>------------------------------------------------------------<br>
	<form method="post" action="createComment.php?page=<?=$page?>&num=<?=$num ?>" >
	<table>
		<tr>
			<td>이름<br>
				<input type="text" name="commentWriter" >
			</td>
			<td><textarea name="comment" ></textarea></td>
			<td><input type="submit" value="댓글등록" ></td>
		</tr>
		<tr>
			<td>비밀번호<br>
				<input type="password"  name="commentPasswd" >
			</td>
		</tr>
	</table>
	</form>

<!-- 댓글 소스 -->
<?php
	//댓글 유무 확인 //boardtest DB에서 cmtCount에 댓글 갯수 저장함 
	$sql_check = "select cmtCount from boardtest where num='$num'";
	$result_check = mysqli_query($conn, $sql_check);
	$row = mysqli_fetch_assoc($result_check); //mysqli_fetch_assoc()를 활용하여 DB값 가져옴
	if ($row['cmtCount'] == 0) {
		//댓글 없음
	} else {

		$cmt_total_count = $row['cmtCount'];
		$cmtPage = ($_GET['cmtPage'])? $_GET['cmtPage'] : 1; //댓글 페이지
		$cmt_list = 3;
		$cmt_block = 3;

		$cmtNum = ceil($cmt_total_count / $cmt_list); // 총 페이지
		$cmtBlockNum = ceil($cmtNum / $cmt_block); //총 블록
		$cmtNowBlock = ceil($cmtPage / $cmt_block); //현재 블록 위치

		$start_cmt = ($cmtNowBlock - 1) * $cmt_block + 1; //블록 처음 페이지
		if ($start_cmt <= 1) {
			$start_cmt = 1;
		}

		$end_cmt = $cmtNowBlock * $cmt_block; //블록 마지막 페이지
		if ($cmtNum <= $end_cmt) {
			$end_cmt = $cmtNum;
		}
		
		$start_cmt_num = ($cmtPage - 1) * $cmt_list;
		$sql_cmt = "select comment_id, name, commentDate, comment from comment_test where board_num='$num' order by comment_id desc limit $start_cmt_num, $cmt_list";
		$result_cmt = mysqli_query($conn, $sql_cmt);
?>	
	<p>------------------------------------------------------------<br>
	<p>댓글임<br>
	<p>ul li로 작성<br>
	<?php
		while ($row_cmt = mysqli_fetch_array($result_cmt)) {
	?>
	<form method="post" action="updateComment.php?page=<?=$page?>&num=<?=$num?>&cmt=<?=$_GET['cmt']?>">
	<div class="div_table" >
		<ul class="ul_table" >
			<li class="li_table_w" ><?= $row_cmt['name'] ?></li>
			<li class="li_table_d" ><?= $row_cmt['commentDate'] ?></li>
	<?php
		//if로 구분예정 / 댓글번호도 get으로 넘긴당
			if ($_GET['cmt'] == $row_cmt['comment_id']) {
			//url의 cmt 값과 DB의 commemt_id 값이 일치하면 수정페이지로 변경	
	?>
		</ul>
		<ul class="ul_table" >
		<li class="li_table_c" ><textarea name="commentUpdate" ><?= $row_cmt['comment'] ?></textarea></li>
		<li class="li_table_r" ><input type="submit" value="수정완료"></li>
		</ul>

	<?php
			} else {
	?>

			<li class="li_table_u" ><a href="readBoard.php?page=<?=$page?>&num=<?=$num?>&cmt=<?=$row_cmt['comment_id']?>"><input type="button" value="수정"></a>
			<input type="button" name="commentDelete" class="commentDelete" id="page=<?=$page?>&num=<?=$num?>&cmt=<?=$row_cmt['comment_id']?>" value="삭제" >
			<!-- id에 게시판번호와 댓글번호를 저장 --></li>
		</ul>
		<ul class="ul_table" >
			<li class="li_table_c" ><?= $row_cmt['comment'] ?></li>
			<li class="li_table_r" ><input type="button" class="cmtReply_button" id="page=<?=$page?>&num=<?=$num?>&cmt=<?=$row_cmt['comment_id']?>" value="[답글]" ></li>
			<!-- 대댓글 -->
			<li class="reply" id="<?=$row_cmt['comment_id']?>" >
				<div>
					<table>
						<tr>
							<!-- valign는 셀의 수직 정렬 방식 -->
							<td valign=top >┗</td>
							<td>이름<br>
								<input type="text" name="c_commentWriter" ><br>
								비밀번호<br>
								<input type="password"  name="c_commentPasswd" >
							</td>
							<td><textarea name="c_comment" ></textarea></td>
							<td><input type="submit" value="답글등록" ></td>
						</tr>
					</table>
				</div>
			</li>
		</ul>
	</div>

	<?php
			}
		}
	?>
	</form>

<!-- 대댓글 폼 -->
<!-- 	<div class="c_commentForm"> -->
<!-- 	<form method="post" action="#" > -->
<!-- 	<table> -->
<!-- 		<tr> -->
<!-- 			<td>이름<br> -->
<!-- 				<input type="text" name="c_commentWriter" > -->
<!-- 			</td> -->
<!-- 			<td><textarea name="c_comment" ></textarea></td> -->
<!-- 			<td><input type="submit" value="댓글등록" ></td> -->
<!-- 		</tr> -->
<!-- 		<tr> -->
<!-- 			<td>비밀번호<br> -->
<!-- 				<input type="password"  name="c_commentPasswd" > -->
<!-- 			</td> -->
<!-- 		</tr> -->
<!-- 	</table> -->
<!-- 	</form> -->
<!-- 	</div> -->


	<div class="div_table" >
		<ul class="ul_table" >
			<li>
			<?php
				if ($start_cmt > $cmtNowBlock) {
					$prev_cmt = $start_cmt - 1;
				echo "<a href='$PHP_SELF?page=$page&num=$num&cmtPage=$prev_cmt'>이전</a>";
				}
				//댓글 페이지리스트 출력
				for ($i = $start_cmt; $i <= $end_cmt; $i++) {
					//댓글수가 $cmt_list보다 작으면 페이지 표시 안함
					if ($row['cmtCount'] <= $cmt_list) {
						
					} else {
					//현재 페이지를 제외한 페이지에만 링크 생성하기 위해 
						if ($cmtPage != $i) {
							echo "<a href='$PHP_SELF?page=$page&num=$num&cmtPage=$i'>";
						}
						echo "[$i]&nbsp";
						//현재 페이지를 제외한 페이지에만 링크 생성하기 위해 
						if ($cmtPage != $i) {
							echo "</a>";
						}
					}
				}

				if ($cmtNowBlock < $cmtBlockNum ) {
				$next_cmt = $end_cmt + 1;
				echo "<a href='$PHP_SELF?page=$page&num=$num&cmtPage=$next_cmt'>다음</a>";
				}
			?>	
			</li>
		</ul>
	</div>
<?php
	}
mysqli_close($conn);
?>
<!-- 	<p>-------------------------------------<br> -->
<!-- 	<form method="post" action="createComment.php?page=<?=$page?>&num=<?=$num ?>" > -->
<!-- 	<table> -->
<!-- 		<tr> -->
<!-- 			<td>이름<br> -->
<!-- 				<input type="text" name="commentWriter" > -->
<!-- 			</td> -->
<!-- 			<td><textarea name="comment" ></textarea></td> -->
<!-- 			<td><input type="submit" value="댓글등록" ></td> -->
<!-- 		</tr> -->
<!-- 		<tr> -->
<!-- 			<td>비밀번호<br> -->
<!-- 				<input type="password"  name="commentPasswd" > -->
<!-- 			</td> -->
<!-- 		</tr> -->
<!-- 	</table> -->
<!-- 	</form> -->
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="board.js"></script>
</html>