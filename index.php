<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $numberPeople = $_POST['number_people'];
    $preference = $_POST['preference'];
    $rating = $_POST["radio"];
    $error = [];
    if (empty($username)) {
        array_push($error, "-voyer rentrer votre nom ");
    }
    if (empty($numberPeople)) {
        array_push($error, "-voyer rentrer le numero de gens /n");
    }
    if (empty($rating)) {
        array_push($error, "-voyer choisir un rating ");
    }
    if (count($error) != 0) {
        foreach ($error as $data) {
            echo $data;
            echo "<br>";
           
        }
    
    } else {
        header('location:me.php');
    $_SESSION['username']=$username;
    $_SESSION['numberofpeople']=$numberPeople;
    $_SESSION['preference'] = $preference;
    $_SESSION['rating'] = $rating;
    exit;
    }
}
?>
<!Doctype html>
<html>

<head lang="en">
    <meta charset="utf_8">
    <?php include "php.php"; ?>
</head>

<body>
    <h1>welcome to Shaza website</h1>
    <?php if($_GET['info']=='logout'):?>
    <p>votre sesion est fermer</p>
    
    <?php endif ?>
    <p>shaza website is a place where you can found a room for your vacation</p><br>
    <div>
        <form method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
            <!--username-->
            <label for="username">please enter your name</label><br>
            <input type="text" id="username" name="username" value="
<?= !empty($username) ? $username : "" ?>
"><br>

            <!-- number of people-->
            <label for="number_people">please choose the number of people</label>
            <select name="number_people" id="number_people">
                <?php foreach ($number as $data) : ?>
                    <option value="<?= $data ?>" id="people" <?= $numberPeople == $data ? "selected" : "" ?>><?= $data ?></option>
                <?php endforeach; ?>
                <br>
            </select>
            <p>votre preferance</p>
            <!-- preference-->
            <?php foreach ($filter as $data) : ?>
                <label for="<?=$data?>"><?= $data ?></label>
                <input type="checkbox" name="preference[]" id="<?= $data ?>" value="<?= $data ?>" <?= in_array($data, $preference) ? "checked" : " " ?>>
            <?php endforeach ?>
            <br>
            <p>Guest rating </p>
            <!-- guest rating-->
            <?php foreach ($guest_rating as $data) : ?>
                <label for="$data"><?= $data ?></label>
                <input type="radio" name="radio" value="<?= $data ?>" id="<?= $data ?>" 
                <?= $rating == $data ? "checked" : "" ?>>
            <?php endforeach ?>
            <br>
            <button type="submit">submit</button>
        </form>
    </div>

</body>

</html>