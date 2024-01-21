<?php
require_once('./Config/autoload.php');

class Hero
{
    //  proprieter du heros
    private $id;
    private string $name;
    private int $lifePoints = 100;
    // private int $hitHeros;

    // recuperé les information de heros venant du tableau
    public function __construct(array $data)
    { 
        $this->id = $data['id'];
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
    public function hit($got)
    {
        $hitAleatoire = $got->getLifePoints() - rand(5,30);
        $got->setLifePoints($hitAleatoire);
        return  $got->getLifePoints();
    }
}
