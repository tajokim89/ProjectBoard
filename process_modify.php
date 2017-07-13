<?php
    include("connection_info.php");
    $nowtime = date("Y-m-d H:i:s");
    $id=$_GET['id'];
    $sql = "UPDATE board SET title = '".$_POST['title']."', content = '".$_POST['content']."', created = '$nowtime' WHERE id=$id";
    mysqli_query($conn, $sql);
    header('Location:/index.php');
?>

