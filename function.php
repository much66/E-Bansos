<?php
    $conn=mysqli_connect("localhost","root","","bansos");

    global $mysqli;
    $host="localhost";
    $user="root";
    $pass="";
    $database="bansos";
    $mysqli= new mysqli($host,$user,$pass,$database);
    if(mysqli_connect_errno()){
        trigger_error('koneksi ke database gagal: ' . mysqli_connect_error(), E_USER_ERROR);
    }

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows=[];
    while($row = mysqli_fetch_assoc($result) ) {
       $rows[]=$row;
   }
    return$rows;
}

function tambah($data){
    global $conn;
    $upenerima = strtolower (stripslashes ($data["upenerima"]));
    $password = mysqli_real_escape_string ($conn, $data["password"]);
    $result = mysqli_query($conn, "SELECT upenerima FROM user_penerima WHERE upenerima='$upenerima'");
    if(mysqli_fetch_assoc($result)){
    echo"<script>
             alert('username sudah terdaftar!')
           </script>";
    return false; }
    
   $password = password_hash($password, PASSWORD_DEFAULT);
   $nokk = htmlspecialchars($data["nokk"]);
   $nik = htmlspecialchars($data["nik"]);
   $nama =htmlspecialchars($data["nama"]);
   $ukecamatan =htmlspecialchars($data["ukecamatan"]);
   $no_hp =htmlspecialchars($data["no_hp"]);

  
        $query = "INSERT INTO user_penerima VALUES ('','$nokk','$nik','$nama','$ukecamatan','$no_hp','','','$upenerima','$password')";
        mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id_penerima = $data["id_penerima"];
    $spenerima = $data["spenerima"];
    $upenerima = strtolower (stripslashes ($data["upenerima"]));
    $password = mysqli_real_escape_string ($conn, $data["password"]);
   $password = password_hash($password, PASSWORD_DEFAULT);
   $nokk = htmlspecialchars($data["nokk"]);
   $nik = htmlspecialchars($data["nik"]);
   $nama =htmlspecialchars($data["nama"]);
   $ket =htmlspecialchars($data["ket"]);
   $ukecamatan =htmlspecialchars($data["ukecamatan"]);
   $no_hp =htmlspecialchars($data["no_hp"]);


$query = "UPDATE user_penerima SET
          id_penerima = '$id_penerima',
          nik = '$nik',
          nokk = '$nokk',
          nama = '$nama',
          ukecamatan = '$ukecamatan',
          upenerima = '$upenerima',
          password = '$password',
          spenerima = '$spenerima',
          ket = '$ket'
          where id_penerima = $id_penerima";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapus($id_penerima){
    global $conn;
   mysqli_query($conn, "DELETE FROM user_penerima WHERE id_penerima = $id_penerima");
   return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;
    $upenerima = strtolower (stripslashes ($data["upenerima"]));
    $password = mysqli_real_escape_string ($conn, $data["password"]);
    $password2 = mysqli_real_escape_string ($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT upenerima FROM user_penerima WHERE upenerima='$upenerima'");
    if(mysqli_fetch_assoc($result)){
    echo"<script>
             alert('username sudah terdaftar!')
           </script>";
    return false;
}
    // cek konfirmasi password
    if($password!==$password2){
        echo"<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
   }
   
   $password = password_hash($password, PASSWORD_DEFAULT);
   $nokk = htmlspecialchars($data["nokk"]);
   $nik = htmlspecialchars($data["nik"]);
   $nama =htmlspecialchars($data["nama"]);
   $ukecamatan =htmlspecialchars($data["ukecamatan"]);
    $no_hp =htmlspecialchars($data["no_hp"]);

   mysqli_query($conn, "INSERT INTO user_penerima VALUES('','$nokk','$nik','$nama','$ukecamatan','$no_hp','','','$upenerima','$password')");
   return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM user_penerima WHERE
                nik LIKE '%$keyword%' OR 
                nokk LIKE '%$keyword%' OR 
                ukecamatan LIKE '%$keyword%' OR 
                nama LIKE '%$keyword%' OR 
                no_hp LIKE '%$keyword%' OR 
                spenerima LIKE '%$keyword%' 
                " ; 
                return query($query);
}









function ubagen($data){
    global $conn;
    $id_agen = $data["id_agen"];
    $sagen = $data["sagen"];
    $uagen = strtolower (stripslashes ($data["uagen"]));
    $password = mysqli_real_escape_string ($conn, $data["password"]);
   $password = password_hash($password, PASSWORD_DEFAULT);
   $nama_agen = htmlspecialchars($data["nama_agen"]);
   $ukecamatan =htmlspecialchars($data["ukecamatan"]);


$query = "UPDATE user_agen SET
          id_agen = '$id_agen',
          nama_agen = '$nama_agen',
          ukecamatan = '$ukecamatan',
          sagen = '$sagen',
          uagen = '$uagen',
          password = '$password'
          
          where id_agen = $id_agen";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}


function ragen($data){
    global $conn;
    $uagen = strtolower (stripslashes ($data["uagen"]));
    $password = mysqli_real_escape_string ($conn, $data["password"]);
    $password2 = mysqli_real_escape_string ($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT uagen FROM user_agen WHERE uagen='$uagen'");
    if(mysqli_fetch_assoc($result)){
    echo"<script>
             alert('username sudah terdaftar!')
           </script>";
    return false;
}
    // cek konfirmasi password
    if($password!==$password2){
        echo"<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
   }
   
   $password = password_hash($password, PASSWORD_DEFAULT);
   $nama_agen = htmlspecialchars($data["nama_agen"]);
   $ukecamatan =htmlspecialchars($data["ukecamatan"]);

   mysqli_query($conn, "INSERT INTO user_agen VALUES('','$nama_agen','$ukecamatan','','','$uagen','$password')");
   return mysqli_affected_rows($conn);
}

function tagen($data){
    global $conn;
    $uagen = strtolower (stripslashes ($data["uagen"]));
    $password = mysqli_real_escape_string ($conn, $data["password"]);
    $result = mysqli_query($conn, "SELECT uagen FROM user_agen WHERE uagen='$uagen'");
    if(mysqli_fetch_assoc($result)){
    echo"<script>
             alert('username sudah terdaftar!')
           </script>";
    return false; }
    
   $password = password_hash($password, PASSWORD_DEFAULT);
   $nama_agen = htmlspecialchars($data["nama_agen"]);
   $ukecamatan =htmlspecialchars($data["ukecamatan"]);
  
        $query = "INSERT INTO user_agen VALUES ('','$nama_agen','$ukecamatan','','','$uagen','$password')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
}

function hagen($id_agen){
    global $conn;
   mysqli_query($conn, "DELETE FROM user_agen WHERE id_agen = $id_agen");
   return mysqli_affected_rows($conn);
}

function transaksi($data){
    global $conn;
    
   $id_transaksi = $data["id_transaksi"];
   $tanggal = $data["tanggal"];
   $jumlah_uang =$data["jumlah_uang"];
   $id_agen =$data["id_agen"];
   $id_penerima =$data["id_penerima"];
   $sagen = $data["sagen"];

   $qry = "UPDATE user_penerima SET
   spenerima = '0'
   where id_penerima = $id_penerima";
   mysqli_query($conn, $qry);

        $qury = "UPDATE user_agen SET
        id_agen = '$id_agen',
        sagen = '$sagen'        
        where id_agen = $id_agen";
        mysqli_query($conn, $qury);
        
        $query = "INSERT INTO detail_transaksi VALUES ('$id_transaksi','$tanggal','$jumlah_uang','$id_agen','$id_penerima')";
        mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>