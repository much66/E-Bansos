<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
require'../function.php';
$id_penerima = $_GET["id_penerima"];
$pen = query("SELECT * FROM user_penerima WHERE id_penerima = $id_penerima")[0];

if( isset($_POST["ubah"]) ) {
    if( ubah($_POST) > 0 ) {
        echo "
        <script>
             alert('data berhasil diubah!');
            document.location.href='penerima/penerima.php';
            </script>
            ";
    
        } else {
            echo"
            <script>
            alert('data gagal diubah!');
           document.location.href='penerima/penerima.php';
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
    <link rel="stylesheet" href="../tambah.css">
</head>
<body>
<div class="wrap">
    <div class="container"> 
        <div class = "lbox">
    <h1>Ubah data penerima</h1>
    <form action="" method="post">
    <table border="0" align="center">
        <input type="hidden" name="id_penerima" value="<?= $pen["id_penerima"];?>">
        <input type="hidden" name="spenerima" value="<?= $pen["spenerima"];?>">

             <tr>
                <td for="nokk">No KK</td>
                <td>:</td>
                <td><input type="text" name="nokk" id="nokk" required value="<?= $pen["nokk"]; ?>"></td>
            </tr>
            <tr>
                <td for="nik">NIK</td>
                <td>:</td>
                <td><input type="text" name="nik" id="nik" required value="<?= $pen["nik"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="nama"> Nama Lengkap </label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required value="<?=$pen["nama"];?>"></td>
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
                <td><label for="ket"> Keterangan </label></td>
                <td>:</td>
                <td><input type="text" name="ket" id="ket" required value="<?=$pen["ket"];?>"></td>
            </tr>
            <tr>
                <td> <label for="upenerima"></label> Username</td>
                <td>:</td>
                <td><input type="text" name="upenerima" id="upenerima" required value="<?=$pen["upenerima"];?>"></td>
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
                    <button type="reset" name="reset"> <a href="penerima.php">Batal</a> </button>
                </td>
            </tr>
        </table>
        </form>
</div>
    
</div>
</div>
</body>
</html>