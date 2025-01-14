<?php
    require("connection.php");

    if(!empty(($_POST['sendTemp'])) && !empty($_POST['sendHum'])){
        $temperature = $_POST['sendTemp'];
        $humidity = $_POST['sendHum'];

        $sql = "INSERT INTO tbl_iot SET temperature = '$temperature', humidity = '$humidity'";

        if($mysqli->query($sql) === TRUE){
            echo "Values inserted successfully.";
        } else {
            echo "Error: " . $mysqli->error;
        }
        $mysqli->close();
    }

    
?>