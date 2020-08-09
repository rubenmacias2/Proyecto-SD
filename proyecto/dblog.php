<?php

$dbhost="bm99petidvmcgvr70eqh-mysql.services.clever-cloud.com";
$dbuser="u5kpbywn7gk5uyhc";
$dbpass="6BoO7N7z1rwshRSFbVLd";
$dbname="bm99petidvmcgvr70eqh";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn){
    die("No hay conexión".mysqli_connect_error());

}
$temail = $_POST["txemail"];
$passw = $_POST["txpass"];

$query = mysqli_query($conn,"select * from usuario where nameUsuario = '".$temail."' and contrasenia ='".$passw."';" );
$queryuser = mysqli_query($conn,"select * from usuario where nameUsuario = '".$temail."';" );

$datesUser = mysqli_num_rows($query);
$duser = mysqli_num_rows($queryuser);

if($datesUser == 1){
     $arra = mysqli_fetch_array($query);

    echo "<script> localStorage.setItem('temail','".$arra[2]."');
            window.location.href='Music/index.html';
    </script>";
    
}
else if($duser == 1){
    echo'<script type="text/javascript">
    alert("contraseña mal digitada");
    window.location.href="index.html";
    </script>';
    }
   else if($datesUser == 0){
    echo'<script type="text/javascript">
    alert("usuario inexistente");
    window.location.href="index.html";
    </script>';
    }
?>