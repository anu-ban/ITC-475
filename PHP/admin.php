<?php
session_start();
include('connection.php');
include('confirmation.php');
$show = '';
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    $sql = "SELECT * FROM `contact` ";
    $check = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($check);
    if (mysqli_num_rows($check) > 0) {
        do {
            $show .= '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['fname'].' '.$row['lname'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone'].'</td>
            <td>'.$row['adults'].'</td>
            <td>'.$row['childern'].'</td>
            <td>'.$row['destinations'].'</td>
            <td>'.$row['activities'].'</td>
            <td>'.date('d-M-Y',strtotime($row['date'])).'</td>
            </tr>';
        } while ($row = mysqli_fetch_assoc($check));
    }else {
        $show = '<h3 class="center">No data found!</h3>';
    }
}else{
    header('location:ad_login.php');
    die();
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
    <div>
        <!--Star of Nav link-->
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="./home.html">About Us</a></li>
                <li><a href="./contact.html">Contact Agent</a></li>
                <li><a href="./admin.php">Admin</a></li>
            </ul>
        </nav>
    </div>
    <main>
        <section>
            <h1 class="title center">Hi Admin</h1>
            <div class="box box2">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>No of Adults</th>
                        <th>No of Childern</th>
                        <th>Destination</th>
                        <th>Activities</th>
                        <th>Date</th>
                    </tr>
                    <?php echo $show; ?>
                </table>
            </div>
        </section>
    </main>
    <footer>Footer</footer>
</body>

<script src="main.js"></script>

</html>