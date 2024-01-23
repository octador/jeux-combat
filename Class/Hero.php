<?php
require_once('./Config/autoload.php');

class Hero
{
    //  proprieter du heros
    private $id;
    private string $name;
    private int $lifePoints;
    private string $image;
    // private int $hitHeros;

    // recuperé les information de heros venant du tableau
    public function __construct(array $data)
    { 
        $this->image =$data['image'];
        $this->name = $data['heros'];
        
    }

    public function getImage():string{
        return $this->image;
    }
    
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
    public function getlifepoints():int{
        return $this->lifePoints;
    }
    public function hit($got)
    {
        $hitAleatoire = $got->getLifePoints() - rand(5,30);
        $got->setLifePoints($hitAleatoire);
        return  $got->getLifePoints();
    }
}
