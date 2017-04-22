<?php
// 连接数据库
function connect(){
    $link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败Error".mysql_error());
    mysql_set_charset(DB_CHARSET);
    mysql_select_db(DB_DBNAME) or die('指定数据库打开失败');
    return $link;
}
// 插入数据
function insert($table,$array){
    $keys=join(',',array_keys($array));
    $vals="'".join("','",$array)."'";
    $sql="insert into {$table}($keys) values({$vals})";
    mysql_query($sql);
    $a=mysql_insert_id();
    return $a;
}
// 更新数据
function update($table,$array,$where=null){
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result=mysql_query($sql);
    if($result){
        return mysql_affected_rows();
    }else{
        return false;
    }
}
// 删除数据
function delete($table,$where=null){
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table} {$where}";
    mysql_query($sql);
    return mysql_affected_rows();
}
// 得到指定一条记录
function fetchone($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result,$result_type);
    return $row;
}
// 得到结果集中所有记录
function fetchall($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    while(@$row=mysql_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}
// 得到结果集中的记录条数
function getresultnum($sql){
    $result=mysql_query($sql);
    return mysql_num_rows($result);
}
// 得到上一步记录的ID号
function getinsertid(){
    return mysql_insert_id();
}
 ?>
