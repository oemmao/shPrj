//글쓰기
var writingPage = function() {
	document.location.href='http://sflower121.phps.kr/shProject/board/boardCreateForm.php';
}
var boardMain_page = function() {
	document.location.href='http://sflower121.phps.kr/shProject/board/boardMain.php';
	}
var boardUpdate_page = function() {
	var add = $('.boardUpdate').attr('id');
	document.location.href='http://sflower121.phps.kr/shProject/board/boardUpdateForm.php?'+ add;
}
var boardPrev_page = function() {
	document.location.href=history.back(-1);
}
$(function(){
	//글쓰기 다시쓰기 기능
	$('#input_clear').click(function(){
		$('input').val('');
		$('textarea').val('');
	});
	//글쓰기
	$('.writing_submit').submit(function(event){
		//alert('come #writing_submit');
		event.preventDefault();
		var isValid = false;
		var form = $('#writingForm')[0];
        var formData = new FormData(form);
        formData.append("inputFile", $("#inputFile")[0].files[0]);
		formData.append("inputSubject", $('#inputSubject').val());
		formData.append("inputContent", $('#inputContent').val());

//		var form = $('#writingForm');
//		var inputData = form.serialize();
		console.log(formData);
		var subject = $('#inputSubject').val();
		var content = $('#inputContent').val();
		if (subject == "") {
			alert('제목을 입력해 주시기 바랍니다.');
		} else if (content == "") {
			alert('내용을 입력해 주시기 바랍니다.');
		} else {
			isValid = true;
			$.ajax({
				url: 'boardCreate.php',
				type: 'post',
				dataType: 'json',
				processData: false,
                contentType: false,
				data: formData,
				success: function(result)	{
					var result = result;
					isValid = result.result;
					if (isValid) {
						alert(result.message);
						console.log(result);
						//document.location.href='boardMain.php';
					} else {
						alert(result.message);
					}
				}		
			})
		}
		if (!isValid) {
			event.preventDefault();
		}
	});
	//글수정
	$(".boardUpdate_submit").click(function(){
		alert("boardUpdate_submit");
		var updateAdd = $(this).attr('id');
		var form = $('#boardUpdateForm');
		var inputData = form.serialize();
		var subject = $('#inputSubject').val();
		var content = $('#inputContent').val();
		alert(updateAdd);
		if (subject == "") {
			alert('제목을 입력해 주시기 바랍니다.');
		} else if (content == "") {
			alert('내용을 입력해 주시기 바랍니다.');
		} else {
			$.ajax({
				url: 'boardUpdate.php?' + updateAdd,
				type: 'post',
				dataType: 'json',
				data: inputData,
				success: function(result)	{
					var result = result;
					isValid = result.result;
					if (isValid) {
						alert(result.message);
						document.location.href='boardRead.php?' + updateAdd;
					} else {
						alert(result.message);
					}
				}		
			})
		}
	});
	//글삭제
	$(".boardDelete").click(function(){
		var DeleteAdd = $(this).attr('id');
		alert(DeleteAdd);
		var result = confirm("게시글을 삭제 하시겠습니까?");
		if(result) {
			document.location.href='boardDelete.php?' + DeleteAdd;
		}
	});

	//댓글작성
	$(".comment_submit").click(function(){
		alert('come comment_submit');
		var commentAdd = $(this).attr('id');
		var comment_userID = $("#comment_userID").text();
		var comment_text = $("#comment_text").val();
		alert(comment_text);
		var inputData = {	"comment_userID" : comment_userID,
							"comment_text" : comment_text	};
		if (comment_text == "")	{
			alert("댓글 내용을 입력해 주시기 바랍니다.");
		} else {
			$.ajax({
				url: 'commentCreate.php?' + commentAdd,
				type: 'post',
				dataType: 'json',
				data: inputData,
				success: function(result) {
					var result = result;
					isValid = result.result;
					if (isValid) {
						alert(result.message);
						document.location.href='boardRead.php?' + commentAdd;
					} else {
						alert(result.message);
					}
				}
			})
		}
	});

});