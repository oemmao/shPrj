<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- viewport meta 태크를 사용하여 모바일 부라우저상에서 레이아웃 조정하기 -->
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>welcome to my homepage</title>
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css">
</head>
<body>

<div>
<h1 class="text-center" >어서와!</h1><br>
<section>
    <article class="col-xs-12" >
        <form id="memberLogin" method="post">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="id" class="form-control" id="loginID" name="loginID" placeholder="ID를 입력하세요">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">PW</label>
                    <input type="password" class="form-control" id="loginPW" name="loginPW" placeholder="비밀번호를 입력하세요">
                </div>
            </div>
        </div>
<!--         <div class="row"> -->
<!--             <div class="col-md-4"> -->
<!--                 <div class="form-group"> -->
<!--                     <label for="exampleInputFile">파일 업로드</label> -->
<!--                     <input type="file" id="exampleInputFile"> -->
<!--                     <p class="help-block">여기에 블록레벨 도움말 예제</p> -->
<!--                 </div> -->
<!--             </div> -->
<!--         </div> -->
        <div class="row">
            <div class="col-md-4 form-group col-md-offset-4">
                <div class="checkbox">
                    <label>
                    <input type="checkbox" id="chk_remember" name="chk_remember" > 입력을 기억합니다
                    </label>
                </div>
            </div>
        </div>
		<div class="text-center" >
        <button type="submit" class="btn btn-success " >로그인</button>
        <button type="button" class="btn btn-warning " onclick="insertPage()" >회원가입</button>
		</div>
        </form>
    </article>
</section>
<aside>
</aside>
<footer>
</footer>
</div>
</body>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/member.js"></script>
</html>
