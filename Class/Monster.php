<?php
require_once('./Config/autoload.php');

class Monster{
    private string $nameMonster;
    private int $pointLifeMonster =100;
    private int $hitMonster;

    public function setName($nameMonster){
        $this->nameMonster = $nameMonster;
    }
    public function getName(){
       return $this->nameMonster;
    }
    public function setpointLifeMonster($pointLifeMonster){
        $this->pointLifeMonster =$pointLifeMonster;
    }
    public function getpointLifeMonster(){
        return $this->pointLifeMonster;
    }
    
    public function hitMonster(){
        // 1: recupere un les points de vie du monster
        // 2: enlever un nombre de pont alléatoire
    }
}




?>