<?php
    $keyword = $_GET["keyword"];
    $conn = mysqli_connect("localhost","root","");
    if ($conn) {
        mysqli_select_db($conn,"blueshop");
        mysqli_query($conn,"SET NAMES utf8");
    } else {
        echo mysqli_connect_errno();
        
    }
    $sql = "SELECT * FROM member WHERE name LIKE '%$keyword%'";
    $objQuery = mysqli_query($conn,$sql);
?>
    <table border="1">
    <?php while($row = mysqli_fetch_array($objQuery)){ ?>
        <div style="display:flex; align-items: center;">
            <div>
                <img src='member_photo/<?=$row["username"]?>.jpg' width='100'>
            </div>
            <div style="padding-left : 10px;">
                ชื่อ : <?=$row["name"]?> <br>
                ที่อยู่ : <?=$row["address"]?> <br>
                อีเมล : <?=$row["email"]?> <br>
            </div>
        </div>
    <?php } ?>
    </table>
    <?php