<?php
require_once '../include.php';
$sql="select * from imooc_admin";
$totalrows=getresultnum($sql);
$pagesize=2;
$totalpage=ceil($totalrows/$pagesize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($var)){
    $page=1;
}
if($page>=$totalpage) $page=$totalpage;
$offset=($page-1)*$pagesize;
$sql="select * from imooc_admin limit {$offset},{$pagesize}";
$rows=fetchall($sql);
print_r($rows);
 ?>
