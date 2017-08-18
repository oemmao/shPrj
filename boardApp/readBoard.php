<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
}

echo "게시글 읽기";

$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbName = 'myTest';

$num = $_GET['num'];
$page = $_GET['page'];

$conn = mysqli_connect($host, $user, $pw, $dbName);

if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$sql = "select * from boardtest where num='$num'";
$result = mysqli_query($conn, $sql);
?>
<html>
<head>
	<meta charset="utf-8" />
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

<!-- 댓글 소스 -->
<?php
	//댓글 유무 확인 //boardtest DB에서 cmtCount에 댓글 갯수 저장함 
	$sql_check = "select cmtCount from boardtest where num='$num'";
	$result_check = mysqli_query($conn, $sql_check);
	$row = mysqli_fetch_assoc($result_check); //mysqli_fetch_assoc()를 활용하여 DB값 가져옴
	if ($row['cmtCount'] == 0) {
		//댓글 없음
	} else {

		$sql_cmt = "select comment_id, name, commentDate, comment from comment_test where board_num='$num' order by comment_id desc";
		$result_cmt = mysqli_query($conn, $sql_cmt);
?>	
	<p>-------------------------------------<br>
	<p>댓글임<br>
	<?php
		while ($row_cmt = mysqli_fetch_array($result_cmt)) {
	?>
	<form method="post" action="updateComment.php?page=<?=$page?>&num=<?=$num?>&cmt=<?=$_GET['cmt']?>">
	<table>
		<tr>
			<td><?= $row_cmt['name'] ?></td>
			<td><?= $row_cmt['commentDate'] ?></td>
	<?php
	//if로 구분예정 / 댓글번호도 get으로 넘긴당
			if ($_GET['cmt'] == $row_cmt['comment_id']) {
			//url의 cmt 값과 DB의 commemt_id 값이 일치하면 수정페이지로 변경
	?>	
		</tr>
		<tr>
			<td colspan="2" ><textarea name="commentUpdate" ><?= $row_cmt['comment'] ?></textarea></td>
			<td><input type="submit" value="수정"></td>
		</tr>
	<?php
			} else {
	?>
			<td><a href="readBoard.php?page=<?=$page?>&num=<?=$num?>&cmt=<?=$row_cmt['comment_id']?>"><input type="button" value="수정"></a></td>
			<td><input type="button" name="commentDelete" class="commentDelete" id="num=<?=$num?>&cmt=<?=$row_cmt['comment_id']?>" value="삭제" >
			<!-- id에 게시판번호와 댓글번호를 저장 -->
			</td>
		</tr>
		<tr>
			<td colspan="2" ><?= $row_cmt['comment'] ?></td>
			<td>답글</td>
		</tr>
	<?php
			}
		}
	?>
	</table>
	</form>
<?php
	}
mysqli_close($conn);
?>	
	<p>-------------------------------------<br>
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
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="board.js"></script>
</html>