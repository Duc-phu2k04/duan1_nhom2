<div class="row">
            <form action="index.php?act=dskh" method="post">
                <div class="row formtitle">
                    <h1>DANH SÁCH BÌNH LUẬN</h1>
                </div>
                <div class="row formcontent ">
                    <div class="row mb10 formdsloai"> 
                      <table>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Id User</th>
                            <th>ID name </th>
                            <th>Id Pro</th>
                            <th>Nội Dung </th>
                            <th>Ngày Bình luận</th>
                            <th></th>
                        </tr>
                        <?php
if (is_array($listbinhluan) && !empty($listbinhluan)) {
    foreach ($listbinhluan as $binhluan) {
        extract($binhluan);
        $suabl = "index.php?act=suabl&id=" . $id;
        $xoabl = "index.php?act=xoabl&id=" . $id;

        echo '
        <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>' . $id . '</td>
            <td>' . $idname . '</td>
            <td>' . $iduser . '</td>
            <td>' . $idpro . '</td>
            <td>' . $noidung . '</td>
            <td>' . $ngaybinhluan . '</td>
            <td>
                <a href="' . $xoabl . '"><input type="button" value="Xóa"></a>
            </td>
        </tr>';
    }
} else {
    echo "<tr><td colspan='8'>Không có bình luận nào.</td></tr>";
}
?>

                      </table> 
                    </div>
                    <div class="row mb20">
                        <input type="button" value="Chọn Tất Cả">
                        <input type="button" value="Bỏ Chọn Tất Cả">
                        <input type="button" value="Xóa Các Mục Đã Chọn">
                    </div>
                </div>
            </form>
        </div>