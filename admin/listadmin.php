<?php
require_once '../include.php';
$pagesize=2;
$rows=getadminbypage();
if(!$rows){
    alertMes("sorry,没有管理员，请添加！","addadmin.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
<div class="details">
        <div class="details_operation clearfix">
            <div class="bui_select">
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addadmin()">
            </div>
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="15%">编号</th>
                    <th width="25%">管理员名称</th>
                    <th width="30%">管理员邮箱</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($rows as $row):?>
                <tr>
                    <!--这里的id和for里面的c1 需要循环出来-->
                    <td><input type="checkbox" id="c1" class="check">
                        <label for="c1" class="label">
                            <?php echo $row['id'];?>
                        </label>
                    </td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td align="center">
                        <input type="button" value="修改" class="btn"  onclick="editadmin(<?php echo $row['id'];?>)">
                        <input type="button" value="删除" class="btn"  onclick="deladmin(<?php echo $row['id'];?>)">
                    </td>
                </tr>
                <?php endforeach;?>
                <?php if($rows>$pagesize):?>
                <tr>
                	<td colspan="4"><?php echo showpage($page, $totalpage);?></td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
    function editadmin(id){
        window.location="editadmin.php?id="+id;
    }
    function deladmin(id){
        if(window.confirm("确定删除吗？")){
                window.location="doadminaction.php?act=deladmin&id="+id;
        }
    }
    function addadmin()
    {
        window.location='addadmin.php';
    }
</script>
</html>
