<?php
    require("connection.php");

    $q_data = $mysqli->query("SELECT * FROM tbl_dht");
    $temperature = 0.0;
    $humidity = 0.0;
    while($f_data = $q_data->fetch_assoc()){
        $temperature = $f_data['temperature'];
        $humidity = $f_data['humidity'];
    }
    $temperature;
    $humidity;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilibinwang-TH-Monitor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload="load()">
    <header>
        <h1>Bilibinwang Temperature and Humidity Monitor</h1>
    </header>
    <main>
        <div class="col col-1">
            <h2>Temperature</h2>
             <h3><svg class="icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M212,56a28,28,0,1,0,28,28A28,28,0,0,0,212,56Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,96Zm-84,57V88a8,8,0,0,0-16,0v65a32,32,0,1,0,16,0Zm-8,47a16,16,0,1,1,16-16A16,16,0,0,1,120,200Zm40-66V48a40,40,0,0,0-80,0v86a64,64,0,1,0,80,0Zm-40,98a48,48,0,0,1-27.42-87.4A8,8,0,0,0,96,138V48a24,24,0,0,1,48,0v90a8,8,0,0,0,3.42,6.56A48,48,0,0,1,120,232Z"></path></svg>
             <?=$temperature;?>&deg;C</h3>           
        </div>
        <div class="col col-2">
            <h2>Humidity</h2>
            <h3><svg class="icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M174,47.75a254.19,254.19,0,0,0-41.45-38.3,8,8,0,0,0-9.18,0A254.19,254.19,0,0,0,82,47.75C54.51,79.32,40,112.6,40,144a88,88,0,0,0,176,0C216,112.6,201.49,79.32,174,47.75ZM200,144a70.57,70.57,0,0,1-.46,8H136V136h63.64Q200,140,200,144ZM183.39,88H136V72h36.89A175.85,175.85,0,0,1,183.39,88ZM136,200h37.19A71.67,71.67,0,0,1,136,215.54Zm0-16V168h59.87a72,72,0,0,1-8,16Zm0-64V104h55.39a116.84,116.84,0,0,1,5.45,16Zm23.89-64H136V32.6A257.22,257.22,0,0,1,159.89,56ZM56,144c0-50,42.26-92.71,64-111.4V215.54A72.08,72.08,0,0,1,56,144Z"></path></svg>
                <?=$humidity;?>&percnt;</h3>
        </div>
    </main>

    <script type="text/javascript">

        if(<?=$temperature;?> > 30){
            alert("It is hot outside, dont forget to stay hydrated.");
        } else if(<?=$temperature?> < 20){
            alert("It is cold outside,we recommend to wear your sweater");
        }

        function load()
        {
        setTimeout("window.open('http://192.168.244.55/arduino/index.php', '_self');", 5000);
        }
    </script>
</body>
</html>