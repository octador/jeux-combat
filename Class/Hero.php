<?php
require_once('./Config/autoload.php');

class Hero
{
    //  proprieter du heros
    private $id;
    private string $name;
    private int $lifePoints = 100;
    private int $hitHeros;

    // recuperé les information de heros venant du tableau
    public function __construct(array $data)
    {
        $this->name = $data['heros'];
    }
    // public function HitMonster()
    // {
    // }
    public function getId():int{
        return $this->id;
    }
    public function setId($id):void{
        $this->id = $id;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setLifePoints($point):void
    {
        $this->lifePoints = $point;
    }
    public function getlifepoints():string{
        return $this->lifePoints;
    }
    public function hitHeros(){
        // 1: recupere un les points de vie de HitMonster
        // 2: enlever un nombre de pont alléatoire
    
    }
}
