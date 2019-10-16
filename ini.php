<?php
/*
 * 项目初始化文件
 * */
//1.设置响应头格式（设置文字编码）
header("Content-type:text/html;charset=UTF-8");
//2.定义常量目录
//定义根目录常量
define("DIR_ROOT",str_replace('\\','/',__DIR__).'/');
//定义配置文件常量

define("DIR_CONFIG",DIR_ROOT.'config/');
//定义核心文件常量
define("DIR_CORE",DIR_ROOT.'core/');
//定义业务逻辑处理目录常量
define("DIR_MODEL",DIR_ROOT.'model/');
//定义模板文件目录常量
define("DIR_VIEW",DIR_ROOT.'view/');
//echo DIR_VIEW;
//定义公开文件目录常量
define("DIR_PUBLIC",'/public');
//定义uploads目录常量
define("DIR_UNLOADS",DIR_ROOT.'uploads/');


//3.封装跳转函数
/*
 * $url为跳转页面
 * $info 提示信息
 * $time 跳转时间
 * */
function jump($url,$info=null,$time=2){
    if($info==null){
        header("location:$url");
        die;
    }else{
        header("refresh:$time;url=$url");
        die("$info");//只有""才能解析变量
    }

}

//4.封装数据处理函数
//$str  用户提交的信息
//return string 处理后的信息
function escapeString($str){
    return addslashes(strip_tags(trim($str)));
}

//5.判断用户是否登录
function is_login(){
    session_start();
    if(!isset($_SESSION['userInfo'])){
        //用户没有登录
        jump('./login.php','请您先登录');
    }
}