<?php

require_once('./Config/autoload.php');
require_once('./Config/db.php');

$newHeros = new HeroesManager($db);
if (isset($_POST) && !empty($_POST)) {

    $newPerso = $_POST['name'];

    $hero = new Hero(['heros' => $newPerso]);

    $newHeros->checkHeros($hero);

}
$results = $newHeros->findAllAlive();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeux de combat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <form action="" method="post">
        <label for="name"> donne un nom a ton personnage : </label>
        <input type="text" name="name">
        <button type="submit">GO</button>
    </form>

    <div class="d-flex flex-wrap container justify-content-center gap-3">

        <?php
        foreach ($results as $result) { ?>
            <form action="./fight.php" method="post">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $result->getname() ?></h3>
                        <h4><?php echo $result->getlifepoints() . "Points" ?></h4>

                        <input type="hidden" value="<?php echo $result->getId() ?>"name = 'id' >
                        <button type="submit" class="btn btn-primary">COMBATRE
                        </button>

                    </div>
                </div>

            </form>
        <?php }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>