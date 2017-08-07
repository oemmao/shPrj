$(function() {
	//아이디 중복체크
	$("#duCheckID").click(function() {
		var insertID = $("#insertID").val();
		if (insertID == "") {
			alert("아이디를 입력해 주세요.");
		} else {
			$.ajax({
				url:'checkID.php',
				type: 'POST',
				data: {
					insertID : insertID
				},
				success:function(result) {
					if (result == "1") {
						alert("사용 가능한 아이디입니다.");
						$("#checkid").val(1);
					} else {
						alert("이미 사용중인 아이디입니다. 다시 입력해 주세요.");
						$("#checkid").val(0);
					}
					
				}
			})
		}
	});

	//회원가입 완료
	$("#memberSubmit").click(function() {
		if ($("#checkid").val() == 1) {

			$.ajax({
				url:'memberDatabase.php',
				type: 'post',
				data: $('form').serialize(),	
				success: function(result) {
					if (result == "1") {
						alert("회원가입이 완료 되었습니다.");
						document.location.href='loginSession.php';
					} else {
						alert(result);
					}
				}
			});
		} else { 
			alert("아이디 중복체크를 해주세요.");
		}
	});
});