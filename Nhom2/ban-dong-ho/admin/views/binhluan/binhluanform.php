<?php
session_start();
require_once('./models/binhluan.php');
require_once './models/pdo.php';
$idpro = $_REQUEST['idpro'];
$dsbl =loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="row mb ">
        <?php
        if(isset($_SESSION['user'])){
            extract($_SESSION['user']);
          
        ?>

        <div class="boxtitle">
          Bình Luận
        </div>        

        <div class="boxcontent2 menudoc binhluan">
            <ul>
                <table>
                <?php 
               foreach ($dsbl as $bl) {
                extract($bl);
                echo'<tr><td>'.$noidung.'</td>';
                echo'<td>'.$iduser.'</td>';
                echo'<td>'.$ngaybinhluan.'</td></tr>';
                }
                ?>
                </table>
            </ul>
        </div>

        <div class="boxfooter searchbox">
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="idpro" value="<?= $idpro?>">
            <input type="text" name="noidung" >
            <input type="submit" name="guibinhluan" value="Gửi Bình Luận">
        </form>
        </div>
      
        <?php
         
        if (isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
            $idpro = $_POST['idpro'];
            $idname = $_POST['idname'];
            $iduser=$_SESSION['user']['id'];
            $noidung =$_POST['noidung'];
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($iduser,$idname,$idpro,$noidung,$ngaybinhluan);
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
        ?>
        </div>
    </div>
    <?php }else{}?>
</body>
</html>