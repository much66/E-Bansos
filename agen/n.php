<?php   
    if(extension_loaded('gd')&& function_exists('gd_info')){
        echo "Gd Installed";
    } else {
        echo "Gd tidak terinstall";
    }
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    $sagen = $_SESSION["sagen"];

    echo $sagen - 200000;
?>