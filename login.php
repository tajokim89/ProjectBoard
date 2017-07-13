<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <center><h2>사용자 로그인</h2></center>
        <div class="row">
            <div class="col-xs-4 col-lg-4"></div>
            <div class="col-xs-4 col-lg-4" style="background-color:lavender;">
                <form>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="userid" type="text" class="form-control" name="userid" placeholder="아이디">
                    </div>
                        <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="비밀번호">
                    </div>
                </form>
                    <br>
                    <button type="button" class="btn btn-warning">ID / 비밀번호 찾기</button>
                    <button type="button" class="btn btn-info pull-right">로그인</button>
            </div>
            <div class="col-xs-4 col-lg-4"></div>
        </div>
    </div>
</body>