<?php
require_once('./Config/autoload.php');
require_once('./Config/db.php');



if (isset($_POST) && !empty($_POST)) {
    
    $newPerso = $_POST['name'];

    $newHeros = new HeroesManager($db);
    $hero = new Hero(['heros' => $newPerso]);
    
    $newHeros->checkHeros($hero);

    $newmonster = new Monster('Big King');
//    echo $newmonster->getpointLifeMonster();
   var_dump($newHeros->findAllAlive()) ;
  
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