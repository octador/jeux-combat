<?php
require_once('./Config/autoload.php');
require_once('./Config/db.php');



if (isset($_POST) && !empty($_POST)) {
    // var_dump($_GET);
    $newPerso = $_POST['name'];
    $newHeros = new HeroesManager($db);
    //  chercher si dans la base de donnée si le name existe
    $newHeros->checkHeros($newPerso);

    // $newheros = new Hero($id,$newPerso, $lifePoint);
    // var_dump($newheros);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeux de combat</title>
</head>

<body>

    <form action="" method="post">
        <label for="name"> donne un nom a ton personnage : </label>
        <input type="text" name="name">
        <button type="submit">GO</button>
    </form>


</body>

</html>