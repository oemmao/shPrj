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
		<td><?= $row['content'] ?></td>
	</tr>
	<tr>
		<td colspan="4">
		<a href="boardIndex.php"><input type="button" name="" value="목록보기" ></a>
		<a href="createBoardForm.php"> <input type="button" name="" value="글쓰기" ></a>
		<a href="updateBoardForm.php?num=<?=$num ?>"> <input type="button" value="수정" ></a>
		<a href="deleteBoardForm.php?num=<?=$num ?>"><input type="button" value="삭제" ></a>
		</td>
	</tr>
	
<?php
mysqli_close($conn);
?>
	</table>
</body>
</html>