<?php
require_once('./Config/db.php');
require_once('./Config/autoload.php');

class Monster
{
    // private PDO $db;
    private string $name;
    private int $lifePoints = 100;
    // private int $hitMonster;

    public function setName($nameMonster)
    {
        $this->name = $nameMonster;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setLifePoints($pointLifeMonster)
    {
        $this->lifePoints = $pointLifeMonster;
    }
    public function getLifePoints()
    {
        return $this->lifePoints;
    }
    public function hit($got)
    {
        $hitAleatoire = $got->getLifePoints() - rand(5,30);
        $got->setLifePoints($hitAleatoire);
        return  $got->getLifePoints();
    }
}


