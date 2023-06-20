<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
    require'function.php';

        $id_penerima = $_GET["id_penerima"];
        if(hapus($id_penerima) > 0 ) {
         echo
         "<script>
              alert('data berhasil dihapus!');
              document.location.href='penerima/penerima.php';
              </script>
            ";
} else {
    echo
    "<script>
         alert('data gagal dihapus!');
         document.location.href='penerima/penerima.php';
         </script>
    ";
}
?>