<?php
session_start();
$username = $_SESSION['username'];
$numberofpeople = $_SESSION['numberofpeople'];
$preference = $_SESSION['preference'];
$rating = $_SESSION['rating'];
$roomname = "3";
$hotelname = "3";
foreach ($room as $data => $choice) {
    if ($numberofpeople == $data) {
        $roomname = $choice;
    }
}
foreach ($hotel_name as $data => $choice) {
    if ($rating == $data) {
        $hotelname = $choice;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    session_destroy();
    header('location:/index.php');
}
?>
<!doctype html>

<head lang="en">
    <meta charset="utf_8">
    <?php include "php.php"; ?>
</head>

<body>
    <pre>meci <?= $username ?> votre hotel est <?= $hotelname ?> et votre chambre choisi est <?= $roomname ?></pre>
    <br>
    <p>pour reffaire un demande voyer clicker </a></p>
    <form method="GET">
        <BUtton>ici</BUtton>
    </form>
</body>