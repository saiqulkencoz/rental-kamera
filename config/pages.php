<?php
    if($_GET['page']=="sewa"){
        include "../../page/sewa/sewa.php";
    }
    else if($_GET['page']=="sewa-delete"){
        include "../../page/sewa/sewa-delete.php";
    }
    else if($_GET['page']=="sewa-edit"){
        include "../../page/sewa/sewa-edit.php";
    }
    else if($_GET['page']=="kamera"){
        include "../../page/kamera/kamera.php";
    }
    else if($_GET['page']=="kamera-delete"){
        include "../../page/kamera/kamera-delete.php";
    }
    else if($_GET['page']=="kamera-edit"){
        include "../../page/kamera/kamera-edit.php";
    }
    else if($_GET['page']=="bayar"){
        include "../../page/pembayaran/pembayaran.php";
    }
        
?>