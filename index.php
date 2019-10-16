<?php
//1.加载项目初始化文件
include './ini.php';  //  ./代表同级目录
//3.判断是否设置了七天免登录并且未过期
session_start();
if(isset($_COOKIE['user_id'])){
    //根据user_id主动创建会话区
    include DIR_CORE.'MySQLDB.php';
    $user_id=$_COOKIE['user_id'];
    $sql="select * from user where user_id=$user_id";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    $_SESSION['userInfo']=$row;
}
//2.加载视图文件
include DIR_VIEW.'index.html';
