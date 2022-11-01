<?php

$show = '';
if (isset($_POST)) {
    extract($_POST);
    $activities = implode(", ",$activities);
    $date = date('Y-m-d',strtotime($date));
    $sql = "INSERT INTO `contact` (`fname`,`lname`,`email`,`phone`,`adults`,`childern`,`destinations`,`activities`,`date`) VALUES ('$fname','$lname','$email','$phone','$adults','$childern','$destinations','$activities','$date')";
    $check = mysqli_query($conn,$sql);
    if ($check) {
        $show = '
        <table>
            <tr>
                <th>Client Name:</th>
                <td>'.$fname.' '.$lname.'</td>
            </tr>
            <tr>
                <th>Client Phone Number:</th>
                <td>'.$phone.'</td>
            </tr>
            <tr>
                <th>Client Email:</th>
                <td>'.$email.'</td>
            </tr>
            <tr>
                <th>Number of Adults:</th>
                <td>'.$adults.'</td>
            </tr>
            <tr>
                <th>Number of Children:</th>
                <td>'.$childern.'</td>
            </tr>
            <tr>
                <th>Destination:</th>
                <td>'.$destinations.'</td>
            </tr>
            <tr>
                <th>Travel Dates:</th>
                <td>'.$date.'</td>
            </tr>
            <tr>
                <th>Interested Activities:</th>
                <td>'.$activities.'</td>
            </tr>
            <tr>
                <th colspan="2">An agent will be in touch with you soon!</th>
            </tr>
        </table>';
    } else {
        $show = '<h3>An Error Occurred!</h3>';
    }
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width= device-width, initial-scale=1" />
    <title>Mega Travel</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header><img src="images/logo.png" height="200px" alt="logo" />

    </header>
    <div class="separator"></div>
    <main>
        <section>
            <h1 class="title center">Contact Details</h1>
            <div class="box">
                <?php echo $show; ?>
            </div>
        </section>
    </main>
    <footer>Footer</footer>
</body>

<script src="main.js"></script>

</html>