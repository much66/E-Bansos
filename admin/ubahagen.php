<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
require'../function.php';
$id_agen = $_GET["id_agen"];
$agen = query("SELECT * FROM user_agen WHERE id_agen = $id_agen")[0];

if( isset($_POST["ubah"]) ) {
    if( ubagen($_POST) > 0 ) {
        echo "
        <script>
             alert('data berhasil diubah!');
            document.location.href='agen.php';
            </script>
            ";
    
        } else {
            echo"
            <script>
            alert('data gagal diubah!');
           document.location.href='agen.php';
           </script>
           ";     
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah penerima</title>
    <link rel="stylesheet" href="tagen.css">
</head>
<body>
<div class="wrap">
    <div class="container"> 
        <div class = "lbox">
    <h1>Ubah data agen</h1>
    <form action="" method="post">
    <table border="0" align="center">
        <input type="hidden" name="id_agen" value="<?= $agen["id_agen"];?>">
        <input type="hidden" name="sagen" value="<?= $agen["sagen"];?>">
        <tr>
                <td for="nama_agen">Nama Agen</td>
                <td>:</td>
                <td><input type="text" name="nama_agen" id="nama_agen" required value="<?= $agen["nama_agen"];?>"></td>
            </tr>
            <tr>
                <td for="ukecamatan">Kecamatan</td>
                <td>:</td>
                <td>
                <div class="dropdown dropdown-dark">
                    <select name="ukecamatan" class="dropdown-select" id="ukecamatan">
                        <option>--pilih--</option>
                        <option value="Bungursari">Bungursari</option>
                        <option value="Cibeureum">Cibeureum</option>
                        <option value="Cihideung">Cihideung</option>
                        <option value="Cipedes">Cipedes</option>
                        <option value="Indihiang">Indihiang</option>
                        <option value="Kawalu">Kawalu</option>
                        <option value="Mangkubumi">Mangkubumi</option>
                        <option value="Purbaratu">Purbaratu</option>
                        <option value="Tamansari">Tamansari</option>
                        <option value="Tawang">Tawang</option>
                    </select>
                </div>
                </td>
            </tr>
            <tr>
                <td> <label for="uagen"></label> Username</td>
                <td>:</td>
                <td><input type="text" name="uagen" id="uagen" required value="<?= $agen["uagen"];?>"</td>
            </tr>
            <tr>
                <td> <label for="password"></label> Password</td>
                <td>:</td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>                                                  
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" name="ubah">Update</button>
                    <button type="reset" name="reset"> <a href="agen.php">Batal</a> </button>
                </td>
            </tr>
        </table>
        </form>
</div>
    
</div>
</div>
</body>
</html>