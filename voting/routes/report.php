<?php
include("../api/connect.php");
session_start();
error_reporting(0);
?>
<html>

<head>
    <title>General Secretary Voting System </title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>

<body>
    <style>
        #backbtn {
            padding: 5px;
            font-size: 15px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            float: left;
            margin: 10px;
        }

        #logoutbtn {
            padding: 5px;
            font-size: 15px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            float: right;
            margin: 10px;
        }
 #headerSection {

width: 100%;
padding: 5px;

}
#Group {
            background-color: white;
            width: 50%;
            padding: 20px;
            
        }

        #votebtn {
            padding: 5px;
            font-size: 15px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
        }

       

        #voted {
            padding: 5px;
            font-size: 15px;
            background-color: green;
            color: white;
            border-radius: 5px;

        }
        
    </style>
    
    <div id="mainSection">
        <center>
            <div id="headerSection">
                <a href="../Admin.html"><button id="backbtn">Back</button></a>
                <a href="../"><button id="logoutbtn">Logout</button></a>
                <h1>Online Voting System For College</h1>
            </div>
        </center>
        <hr>

</body>
<center>
<div id="Group">
    <?php

    $sql = "SELECT * FROM user WHERE role = 2";

    $run = mysqli_query($connect, $sql);

    $voted = $_SESSION['userdata']['status'];

    while ($data = mysqli_fetch_assoc($run)) {
        if ($voted == 0) {
            $status = "active";
        } else {
            $status = "hidden";
        }
   
        $photo = "../uploads/" . $data['photo'] . " ";
        echo '
                        <div class="group_div">
                      
                            <img style="float:right" src="' . $photo . '" height="100" width="100"> 
                                <b>Group Name:</b>' . $data['name'] . '<br><br><br>
                                <b>Votes:</b>' . $data['vote'] . '<br><br>
                                <form action="../api/vote.php" method="Post">
                                <input type="hidden" name="gvotes" value="' . $data['vote'] . '">
                                <input type="hidden" name="gid" value="' . $data['id'] . '">

                                
                            </form>
                            <br>
                            <hr>
                        </div>';
    }
    
    ?>


</div>
</center>
<style>
    .hidden {
        display: none;
    }

    .group_div {
        margin: 20px auto !important;
        padding: 10px;
        text-align: left;
    }
</style>

</html>