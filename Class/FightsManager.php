<?php
require_once('./Config/db.php');
require_once('./Config/autoload.php');

class FighttsManager{
// recuperé les property du heros
private object $herosFigth;
// recuperé les property du monster
private object $monsterFigth;
// recupérée le héros et le monstre
public function __construct($herosFigth,$monsterFigth)
{
    $this->herosFigth = $herosFigth;
    $this->monsterFigth = $monsterFigth;
}



}








?>