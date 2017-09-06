var writingPage = function() {
	document.location.href='http://sflower121.phps.kr/shProject/board/boardCreateForm.php';
}
var board_prevPage = function() {
document.location.href='http://sflower121.phps.kr/shProject/board/boardMain.php';
	}

$(function(){
//글쓰기 다시쓰기 기능
$('#input_clear').click(function(){
	$('input').val('');
	$('textarea').val('');
});

$('#writing_submit').click(function(){
	alert('come #writing_submit');
	var form = $('#writingForm');
	var inputData = form.serialize();
	var subject = $('#inputSubject').val();
	var content = $('#inputContent').val();
	if (subject == "") {
		alert('제목을 입력해 주시기 바랍니다.');
	} else if (content == "") {
		alert('내용을 입력해 주시기 바랍니다.');
	} else {
		$.ajax({
			url: 'boardCreate.php',
			type: 'post',
			dataType: 'json',
			data: inputData,
			success: function(result)	{
				var result = result;
				isValid = result.result;
				if (isValid) {
					alert(result.message);
					document.location.href='boardMain.php';
				} else {
					alert(result.message);
				}
			}		
		})
	}

});

});