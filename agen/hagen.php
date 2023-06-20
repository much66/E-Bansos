<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
    require'../function.php';

        $id_agen = $_GET["id_agen"];
        if(hagen($id_agen) > 0 ) {
         echo
         "<script>
              alert('data berhasil dihapus!');
              document.location.href='agen.php';
              </script>
            ";
} else {
    echo
    "<script>
         alert('data gagal dihapus!');
         document.location.href='agen.php';
         </script>
    ";
}
?>