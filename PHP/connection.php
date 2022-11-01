<?php
$conn = mysqli_connect('localhost','root','mega_travels');
if (mysqli_connect_errno()) {
    die('Can\'t Connect to database');
}