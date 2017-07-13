<?php
    include("connection_info.php");
    $id=$_GET['id'];
    $del_sql = "DELETE FROM board WHERE id=$id";
    mysqli_query($conn, $del_sql);
    header('Location:/index.php');
?>