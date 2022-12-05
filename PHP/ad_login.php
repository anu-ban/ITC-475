<?php
session_start();
$show = '';
if (isset($_POST['login'])) {
    extract($_POST);
    $sql = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password' ";
    $check = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($check);
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['username'] = $row['username'];
        header('location:admin.php');
    }else {
        $show = '<h3 class="center">Incorrect Email or Password!</h3>';
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
            <h1 class="title center">Admin Login</h1>
            <div class="box">
                <?php echo $show; ?>
                <form action="" method="post">
                    <div class="formrow">
                        <label class="bold">Email:</label>
                        <input type="text" name="email" id="email" class="inp" placeholder="Enter your Email..." required>
                    </div>
                    <div class="formrow">
                        <label class="bold">Password:</label>
                        <input type="password" name="password" id="password" class="inp" placeholder="Enter your Password..." >
                    </div>

                    <div class="formrow center">
                        <button type="submit" class="btn" name="login">Login</button>
                    </div>

                </form>
            </div>
        </section>
    </main>
    <footer>Footer</footer>
</body>

<script src="main.js"></script>

</html>