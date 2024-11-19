<?php 
function insert_binhluan($iduser,$idname,$idpro,$noidung,$ngaybinhluan){
    $sql= "insert into binhluan(user_id,user_name,product_id,noidung,trangthai) values('$iduser','$idname','$idpro','$noidung','$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($idpro){
    $sql= "select * from binhluan where 1";
    if($idpro > 0)
    $sql.=" and idpro='".$idpro."'";
    $sql.=" order by id desc";
    $listbinhluan=pdo_query($sql);
    return $listbinhluan;
}

function delete_binhluan($id){
    $sql= "delete from binhluan where id=".$id;
    pdo_execute($sql);
}
?>