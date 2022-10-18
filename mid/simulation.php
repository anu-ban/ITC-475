<?php
$show = '';
date_default_timezone_set("Asia/Karachi");
if (isset($_REQUEST['smart'])) {
    $devices = $_REQUEST['device'];
    $start = $_REQUEST['start'];
    $end = $_REQUEST['end'];
    foreach ($devices as $index => $device) {
        $start_time = $start[$index];
        $end_time = $end[$index];
        $current = date('H:i');
        if ((strtotime($current) > strtotime($start_time)) && (strtotime($current) < strtotime($end_time))) {
            $status = 'ON';
        }else{
            $status = 'OFF';
        }
        $show .= '<tr>
        <td>'.$device.'</td>
        <td>'.$status.'</td>
        <td>'.date('H:i A',strtotime($start_time)).'</td>
        <td>'.date('H:i A',strtotime($end_time)).'</td>
        </tr>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Home</title>
    <style>
        * {
            box-sizing: border-box;
        }
        
        .box {
            width: 50%;
            margin: 0 auto;
        }
        
        h1 {
            text-align: center;
        }
        
        table {
            width: 100%;
        }
        
        table,th,
        td {
            padding: 5px;
            border: 1px solid black;
            border-collapse: collapse;
        }
        
        .inp {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }
        
        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            border: 1px solid blue;
            background-color: #bbecff;
            border-radius: 4px;
        }
        
        .btn:hover {
            background-color: #bbecff;
        }
        
        .center {
            text-align: center;
        }
        #table{
            display: none;
        }
    </style>
</head>

<body  onload="startTime()">

    <div class="box">
        <h1>Smart Home Panel</h1>
        <h2 class="center" id="txt"></h2>
        <table id="table">
            <tr>
                <th>Devices</th>
                <th>State</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
            <?php echo $show; ?>
        </table>
        <div class="center">
            <button class="btn" onclick="run()">Run Simulation</button>
        </div>
    </div>
    <script>
        function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        
          var ampm = h >= 12 ? 'PM' : 'AM';
        h = checkTime(h);
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =  h + ":" + m + ":"+s+ " " + ampm;
        setTimeout(startTime, 1000);
        }

        function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
        }
        function run(){
            document.getElementById('table').style.display='table';
        }
    </script>
</body>

</html>