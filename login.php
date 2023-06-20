<?php 
session_start();

if(isset($_COOKIE['login'])){
   if($_COOKIE['login'] == 'true' ) {
      $_SESSION['login'] = true;
   }

}

if(isset($_SESSION["login"])){

   header("Location: penerima/homepen.php");
}
 require('function.php');
   if(isset($_POST["submit"])){
      $upenerima = $_POST["username"];
         $password = $_POST["password"];
         $result = mysqli_query($conn, "SELECT * FROM user_penerima WHERE upenerima = '$upenerima'");
         if( mysqli_num_rows($result) === 1){
           $row = mysqli_fetch_assoc($result);
           if (password_verify($password, $row["password"]) ) {
            $_SESSION["login"] = true;
            $_SESSION['id_penerima']= $row['id_penerima'];
            $_SESSION['nama']=$row['nama'];
            $_SESSION['nokk']=$row['nokk'];
            $_SESSION['nik']=$row['nik'];
            $_SESSION['upenerima']=$row['upenerima'];
            $_SESSION['spenerima']=$row['spenerima'];
            $_SESSION['ket']=$row['ket'];
            $_SESSION['no_hp']=$row['no_hp'];
            $_SESSION['ukecamatan']=$row['ukecamatan'];
            if(isset($_POST["remember"])){
               setcookie('login', 'true', time() + 60);
            }

                  header("Location: penerima/homepen.php");
                  exit;
        }
      } elseif(isset($_POST["submit"])){
         $uagen = $_POST["username"];
         $password = $_POST["password"];
         $resultt = mysqli_query($conn, "SELECT * FROM user_agen WHERE uagen = '$uagen'");
         if( mysqli_num_rows($resultt) === 1){
           $row = mysqli_fetch_assoc($resultt);
           if (password_verify($password, $row["password"]) ) {
            $_SESSION["login"] = true;
            $_SESSION['id_agen']= $row['id_agen'];
            $_SESSION['nama_agen']=$row['nama_agen'];
            $_SESSION['uagen']=$row['uagen'];
            $_SESSION['sagen']=$row['sagen'];
            $_SESSION['notelp']=$row['notelp'];
            $_SESSION['ukecamatan']=$row['ukecamatan']; 
                  header("Location: agen/homeagen.php");
                  exit;
           }
         } elseif(isset($_POST["submit"])){
            $ukecamatan = $_POST["username"];
            $password = $_POST["password"];
            $resulttt = mysqli_query($conn, "SELECT * FROM admin_kecamatan WHERE ukecamatan = '$ukecamatan'");
            if( mysqli_num_rows($resulttt) === 1){
      
              $row = mysqli_fetch_assoc($resulttt);
              if (password_verify($password, $row["password"]) ) {
               
               $_SESSION["login"] = true;
               $_SESSION['ukecamatan']=$row['ukecamatan'];
               $_SESSION['nama_admin']=$row['nama_admin'];
               $_SESSION['telp_kecamatan']=$row['telp_kecamatan'];

                     header("Location: admin/homeadmin.php");
                     exit;
              }

            }      elseif(isset($_POST["submit"])){
               $ukecamatan = $_POST["username"];
               $password = $_POST["password"];
               $resulttt = mysqli_query($conn, "SELECT * FROM admin_kota WHERE username = '$ukecamatan'");
               if( mysqli_num_rows($resulttt) === 1){
         
                 $row = mysqli_fetch_assoc($resulttt);
                 if (password_verify($password, $row["password"]) ) {
                  
                  $_SESSION["login"] = true;
                  $_SESSION['username']=$row['username'];
                  $_SESSION['kota']=$row['kota'];
                  $_SESSION['telp_kecamatan']=$row['telp_kecamatan'];
   
                        header("Location: kota/kota.php");
                        exit;
                 }
   
               }  $error = true;
            }
   }
}
   }
?>


<!DOCTYPE html>
<html>
<head>
   <title>Laman Login Bansos</title>
   <link rel="stylesheet" type="text/css" href="style.css?<?=time()?>">
</head>
<body>
   <div class="login-box">
      <img src="avatar.png" class="avatar">
      <h1>e-Bansos Tasik</h1>
      <?php if(isset($error)) : ?>
<p style="color : red; font-style: italic;">data login salah</p>
<?php endif; ?>
      <form action="" method="post">
          <label for ="username">Username</label>
          <input type="text" name="username" id="username" placeholder="Masukkan username" autocomplete="off">
          <label for="password">Kata sandi</label>
          <input type="password" name="password" id = "password" placeholder="Masukkan kata sandi">
          <input type="checkbox" name="remember" id="remember" style="margin-right: 200px;"> 
          <input type="submit" name="submit" value="Login" id="submit">
          <p>Belum punya akun?</p>
          <p>Daftar sebagai <a href="regis.php"> penerima </a> / <a href="agen/ragen.php">agen</a>. </p>
        </form>
   </div> 
</body>
</html>