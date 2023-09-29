<?php
$connect = mysqli_connect("localhost","root","","stvoting")or die("Connection failed");

 if($connect){
    echo "connected";
}
else{
    echo "Not connected!";
} 
