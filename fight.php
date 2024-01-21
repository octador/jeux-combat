<?php
require_once('./Config/autoload.php');
require_once('./Config/db.php');

$FightsManager= new FightsManager;

$alreadyHeros = new HeroesManager($db);
$selectId = $_POST['id'];


$hero = $alreadyHeros->find($selectId);
var_dump($hero->getName());

$monster = $FightsManager->createMonster();

var_dump($monster);
var_dump($hero);

  $figthArrays[] = $FightsManager->fight($hero,$monster);
  var_dump($figthArrays);
  echo 'point de vie du hero : ' .$hero->getlifepoints().'<br>';
  echo 'point de vie du monstre : '. $monster->getlifepoints();

  foreach ($figthArrays as $figthArray) {
   var_dump($figthArray);
  }
  
// var_dump($figthArrays);
// var_dump($monster);
// var_dump($hero);

// var_dump($FightsManager->hit($monster));

?>
<!-- <form action="" method="post">
    <button type="submit"class="btn btn-primary">HIT</button>
</form> -->