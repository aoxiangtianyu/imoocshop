<?php
function showpage($page,$totalpage,$where=null,$sep='&nbsp;'){
    $where=($where==null)?null:"&".$where;
    $url=$_SERVER['PHP_SELF'];
    $index=($page==1)?"首页":"<a href='{$url}?page=1{$where}'>首页</a>";
    $last=($page==$totalpage)?"尾页":"<a href='{$url}?page={$totalpage}{$where}'>尾页</a>";
    $prevpage=($page>=1)?$page-1:1;
    $nextpage=($page>=$totalpage)?$totalpage:$page+1;
    $prev=($page==1)?"上一页":"<a href='{$url}?page=$prevpage{$where}'>上一页</a>";
    $next=($page==$totalpage)?"下一页":"<a href='{$url}?page=$nextpage{$where}'>下一页</a>";
    $str="总共{$totalpage}页/当前是第{$page}页";
    for($i=1;$i<=$totalpage;$i++){
        if($page==$i){
            $p.="[{$i}]";
        }else{
            $p.="<a href='{$url}?page={$i}{$where}' style='text-decoration:none;'>[{$i}]</a>";
        }
    }
    $pagestr=$str.$sep.$index.$sep.$prev.$sep.$p.$sep.$next.$sep.$last;
    return $pagestr;
}
 ?>
