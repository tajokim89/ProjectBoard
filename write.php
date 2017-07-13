<?php
    include("connection_info.php");    
    $result = mysqli_query($conn, "SELECT * FROM board");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
        function cancel_check(){
            var flag = confirm("글쓰기를 취소하시겠습니까?");    
            
            if (flag==true){
                location.href="/index.php";
            }
            else
                return;
        }
    </script>

    <title>글쓰기</title>    
</head>
<body>
    <div class="container">
        <h2>새로운 글 작성</h2>
        <form action="/process_write.php" method="post" onsubmit="return confirm('등록하시겠습니까?');">
            <div class="input-group col-xs-5 col-lg-2">    
                <span class="input-group-addon">작성자</span>
                <input id="author" type="text" class="form-control" name="author" placeholder="작성자">
            </div>
            <div class="input-group">
                <span class="input-group-addon">제 목</span>
                <input id="title" type="text" class="form-control" name="title" placeholder="제목을 입력하세요 (50자제한)">    
            </div>
            
            <div class="form-group">
                <textarea class="form-control" rows="15" id="content" name="content"></textarea>
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-lg-6">
                    <input type="submit" class="btn btn-success btn-lg pull-right" value="등록"></input>
                </div>
                <div class="col-xs-6 col-lg-6">
                    <input type="button" class="btn btn-danger btn-lg" onclick="cancel_check()" value="취소"></input>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

