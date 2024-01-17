<?php
require_once('./Config/autoload.php');

class Hero
{
    //  definir le proprieter du heros
    private $id;
    private string $name;
    private int $lifePoints;

    // recuperé les information de heros venant du tableau
    public function __construct(array $data)
    {

        $this->id = $data['id'];
        $this->name = $data['heros'];;
        $this->lifePoints = $data['life_points'];
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
}
