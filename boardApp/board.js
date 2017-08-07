$(function(){
	$("#textSave").click(function() {
		var text = $('form').serialize();
		$.ajax({
			url:'createBoard.php',
			type: 'post',
			data: text,
			success: function(result) {
				if (result == "1") {
					alert("글이 등록되었습니다.");
					document.location.href='boardIndex.php';
				} else {
					alert(result);
				}
			}	
		});
	});
});

