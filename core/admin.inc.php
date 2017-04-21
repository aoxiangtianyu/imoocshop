<?php
function checkadmin($sql){
    return fetchone($sql);
}
function checkLogined(){
    if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
        alertMes("请先登录","login.php");
    }
}
function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:login.php");
}
function addadmin(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(insert("imooc_admin",$arr)){
        $mes="添加成功!<br/><a href='addadmin.php'>继续添加</a>|<a href='listadmin.php'>查看管理员列表</a>";
    }else{
        $mes="添加失败！<br /><a href='addadmin.php'>重新添加</a>";
    }
    return $mes;
}
function getalladmin(){
    $sql="select id,username,email from imooc_admin";
    $rows=fetchall($sql);
    return $rows;
}
function editadmin($id){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(update("imooc_admin",$arr,"id={$id}")){
        $mes="编辑成功！<br /><a href='listadmin.php'>查看管理员列表</a>";
    }else{
        $mes="编辑失败！<br /><a href='listadmin.php'>请重新修改</a>";
    }
    return $mes;
}
function deladmin($id){
    if(delete("imooc_admin","id={$id}")){
        $mes="删除成功！<br /><a href='listadmin.php'>查看管理员</a>";
    }else{
        $mes="删除失败！<br /><a href='listadmin.php'>重新删除</a>";
    }
    return $mes;
}
 ?>
