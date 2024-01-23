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
foreach ($figthArrays as $figthArray)
{
  
  echo $figthArray . '<br>';
}

$alreadyHeros->update($hero);

if ($hero->getlifepoints() <= 0) {
  $alreadyHeros->deleteHeros($hero);
}
?>


<a href="./Index.php"><button type="button" class="btn btn-link">Retour</button>
</a>
