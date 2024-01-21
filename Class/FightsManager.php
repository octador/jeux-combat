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
        $damages = ['hero' => [], 'monster' => []];

        while ($hero->getLifePoints() > 0 && $monster->getLifePoints() > 0) {

            if ($hero->getLifePoints() > 0) {
                $damage = $hero->hit($monster);
                $monster->setLifePoints($damage);
                $damages['monster'][] = intval($damage);
            }

            if ($monster->getLifePoints() > 0) {
                $damage = $monster->hit($hero);
                $hero->setLifePoints($damage);
                $damages['hero'][] = intval($damage);
            }
        }

        return $damages;
    }
}
