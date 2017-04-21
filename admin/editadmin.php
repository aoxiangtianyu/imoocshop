<?php
require_once "../include.php";
connect();
$id=$_REQUEST['id'];
$sql="select id,username,password,email from imooc_admin where id='{$id}'";
$row=fetchone($sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>编辑管理员</h3>
<form action="doadminaction.php?act=editadmin&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr>
    <td align="right">管理员名称</td>
    <td>
        <input type="text" name="username" placeholder="<?php echo $row['username'];?>" size=40/>
    </td>
</tr>
<tr>
    <td align="right">
        管理员密码
    </td>
    <td>
        <input type="password" name="password" placeholder="<?php echo $row['password'];?>" size=40/>
    </td>
</tr>
<tr>
    <td align="right">
        管理员邮箱
    </td>
    <td>
        <input type='text' name="email" placeholder="<?php echo $row['email'];?>" size=40/>
    </td>
</tr>
<tr>
    <td colspan='2' align="center">
        <input type="submit" value="编辑管理员" />
    </td>
</tr>
</table>
</form>
</body>
</html>
