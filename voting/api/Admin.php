<?php

include("connect.php");

if(isset($_POST['Alogin']))

{

$username   =mysqli_real_escape_string($connect,$_POST['username']);
$password =  mysqli_real_escape_string($connect,$_POST['password']);


$sql = "SELECT * FROM `admin1` WHERE username = '$username' AND password = '$password'";

$check= mysqli_query($connect,$sql);

//if($check){echo mysqli_num_rows($check);}



If(mysqli_num_rows($check)==1){
    
    
    echo '<script>
    window.location="../routes/report.php";
    </script>';
}

else{
    echo'<script>
    alert("Invalid Credentails or User not found!");
    window.location="../Admin.html";
    </script>';
}
}

?>