<?php
require'function.php';
if(isset($_POST["kirim"])){

    if( registrasi($_POST) > 0){
         echo"<script>
         alert('user baru berhasil ditambahkan!');
         document.location.href='login.php';
        </script>";
    }else{ 
        echo mysqli_error($conn);

    }
}    
?>


<!DOCTYPE html>
<html>
</head>
    <meta charset="utf-8">  
    <title>Pendaftaran Bansos Tasik</title>
    <link rel="stylesheet" href="regis.css?<?= time();?>">
</head>
<body>
    <div class="wrap">
    <div class="container">
<div class="lbox">
<img src="avatar.png" class="avatar">
    <h1>Pendaftaran Bansos Tasik</h1>
    <form action="" method="post">
        <table border="0" align="center">
             <tr>
                <td for="nokk">No KK</td>
                <td>:</td>
                <td><input type="text" name="nokk" id="nokk" required></td>
            </tr>
            <tr>
                <td for="nik">NIK</td>
                <td>:</td>
                <td><input type="text" name="nik" id="nik" required></td>
            </tr>
            <tr>
                <td><label for="nama"> Nama Lengkap </label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required></td>
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
            <td for="no_hp">No Handphone</td>
                <td>:</td>
                <td><input type="text" name="no_hp" id="no_hp" required></td>
            </tr>
            </div>
            <div class="lbox2">
            <tr>
                <td> <label for="upenerima"></label> Username</td>
                <td>:</td>
                <td><input type="text" name="upenerima" id="upenerima" required></td>
            </tr>
            <tr>
                <td> <label for="password"></label> Password</td>
                <td>:</td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>  
            <tr>
                <td> <label for="password2"></label> Konfirmasi Password</td>
                <td>:</td>
                <td><input type="password" name="password2" id="password2" required></td>
            </tr>                                                  
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" name="kirim">Kirim</button>
                    <button type="reset" name="reset"><a href="login.php">Batal</a></button>
                </td>
            </tr>
        </table>
        </form>
        </div>
        </div>
        </div>
        </div>
</body>
</html>