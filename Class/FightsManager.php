<?php
require_once('./Config/db.php');
require_once('./Config/autoload.php');

class FightsManager
{
    private PDO $db;

    public function createMonster()
    {
        $newMonster = new Monster;
        $newMonster->setName('Monsieur Peabody');
        return $newMonster;
    }

    public function fight($hero, $monster)
{
    $figthArrays = [];

    while ($hero->getLifePoints() > 0 and $monster->getLifePoints() > 0) 
    {
    
        
        $damageToMonster = intval($hero->hit($monster));

        if ($damageToMonster > 0) {
            $figthArrays[] ='il reste : '. $damageToMonster.' pts au monster';
        }
        
        if ($monster->getLifePoints() < 0 or $hero->getLifePoints() < 0) {
            break; 
        }
        
        $damageToHero = intval($monster->hit($hero));

        if ($damageToHero > 0) {
            $figthArrays[] = 'il reste : '. $damageToHero.' pts au hero ';
        }
        
        if ($hero->getLifePoints() < 0 or $monster->getLifePoints() < 0 ) {
            break; 
        }
    }

    return $figthArrays;
}

    
}
?>

