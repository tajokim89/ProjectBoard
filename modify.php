<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <?php
        include("connection_info.php");
        $page = $_GET['page'];
        $id = $_GET['id']; 
        $modi_sql = mysqli_query($conn, "SELECT * FROM board WHERE id=$id");
        $data = mysqli_fetch_array($modi_sql);
    ?>

    <script>
        function cancel_check(){
            var flag = confirm("글수정를 취소하시겠습니까?");    
            
            if (flag==true){
                location.href="/view.php?page=<?=$page?>&id=<?=$id?>";
            }
            else
                return;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>글 수정하기</h2>
        <form action="/process_modify.php?page=<?=$page?>&id=<?=$id?>" method="post" onsubmit="return confirm('등록하시겠습니까?');">
            <div class="input-group form-group col-xs-5 col-lg-2">    
                <span class="input-group-addon">작성자</span>
                <input id="disabledInput" type="text" class="form-control" name="author" placeholder="<?=$data['author']?>" disabled>
              </div>
            <div class="input-group">
                <span class="input-group-addon">제 목</span>
                <input id="title" type="text" class="form-control" name="title" value="<?=$data['title']?>"> 
            </div>
            
            <div class="form-group">
                <textarea class="form-control" rows="15" id="content" name="content"><?=$data['content']?></textarea>
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