<?php
require_once('./Config/autoload.php');
require_once('./Config/db.php');

$FightsManager = new FightsManager;

$alreadyHeros = new HeroesManager($db);
$selectId = $_POST['id'];


$hero = $alreadyHeros->find($selectId);


$monster = $FightsManager->createMonster();



$figthArrays = $FightsManager->fight($hero, $monster);

// afficher les etape du figth


$alreadyHeros->update($hero);

if ($hero->getlifepoints() <= 0) {
  $alreadyHeros->deleteHeros($hero);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./figthstyle.css">
  <title>Figth</title>
</head>

<body id="backgroundfigth">
  <section>
    <div class="round">


      <div class="figth">
        <?php
        foreach ($figthArrays as $figthArray) {

          echo $figthArray . '<br>';
        }
        ?>

<a href="./index.php"><button type="button" class="btn btn-link">Retour</button>
      </div>



    </div>

  </section>
</body>

</html>