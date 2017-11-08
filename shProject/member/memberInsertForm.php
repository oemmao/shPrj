<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>welcome to my homepage</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<p class="text-center">회원가입 페이지
<section>
<div class="all_width">
    <article class="col-xs-12">
        <form class="form-horizontal" id="memberInsert" method="post" >
        <!--         <div class="form-group"> -->
        <!--             <label for="inputEmail3" class="col-sm-1 control-label">Email</label> -->
        <!--             <div class="col-sm-3"> -->
        <!--                 <input type="email" class="form-control" id="inputEmail3" placeholder="Email"> -->
        <!--             </div> -->
        <!--         </div> -->
        <div class="form-group ">
            <label for="inputID" class=" col-md-offset-4 col-sm-1 control-label">아이디</label>
            <div class="col-sm-3">
                <input type="userid" class="form-control" id="inputID" name="inputID" isDuCheck="0" placeholder="아이디">
            </div>
			<div class="col-sm-1 text-right">
            <button type="button" class="btn btn-default" id="duCheckID" >중복확인</button>
			</div>
        </div>
        <div class="form-group">
            <label for="inputPW" class="col-sm-1 col-md-offset-4 control-label">비밀번호</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="inputPW" name="inputPW" placeholder="비밀번호">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPWCheck" class="col-sm-1 col-md-offset-4 control-label">비밀번호 재확인</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="inputPWCheck" name="inputPWCheck" placeholder="비밀번호 재확인">
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-1 col-md-offset-4 control-label">이름</label>
            <div class="col-sm-3">
                <input type="username" class="form-control" id="inputName" name="inputName" placeholder="이름">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-1 col-md-offset-4 control-label">성별</label>
            <div class="col-sm-3">
                <label class="radio-inline">
                <input type="radio" id="checkGender1" name="checkGender" value="man"> 남자
                </label>
                <label class="radio-inline">
                <input type="radio" id="checkGender2" name="checkGender" value="woman"> 여자
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4 text-center">
                <button type="submit" class="btn btn-warning" >가입하기</button>
				<button type="button" class="btn btn-default" onclick="indexPage()" >메인으로</button>
            </div>
			
        </div>
        </form>
    </article>
</section>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/member.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
