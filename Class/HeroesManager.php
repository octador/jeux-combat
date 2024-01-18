<?php
require_once('./Config/autoload.php');
require_once('./Config/db.php');

class HeroesManager
{
    private PDO $db;
    private array $herosObjectArray = [];
    

    public function __construct($db)
    {
        $this->db = $db;
    }
    // check if exist
    public function checkHeros(Hero $newPerso) : array
    {
        $request = $this->db->prepare("SELECT * FROM heros WHERE heros = :heros");
        $request->execute([
            'heros' => $newPerso->getName()
        ]);

        $herosArrays = $request->fetchAll();
        // var_dump($herosArrays);

        if(!$herosArrays) {
            // var_dump($herosArrays);
            $this->addHeros($newPerso);
        }

        // var_dump($this->herosObjectArray);
        return $this->herosObjectArray;
    }

    // add Heros in $db
    public function addHeros(Hero $newPerso): void
    {
        $request = $this->db->prepare("INSERT INTO heros(heros) VALUES (:heros)");
        $request->execute([
            'heros' => $newPerso->getName()
        ]);

        $id = $this->db->lastInsertId();
        $newPerso->setId($id);
    
        // var_dump($herosArray);
        $this->herosObjectArray[] = $newPerso;
    }

    // afficher tout les heros qui son en vie
    public function findAllAlive(){

        $request = $this->db->query("SELECT * FROM heros WHERE heros.life_points > 0 ORDER BY life_points DESC");
        $results = $request->fetchAll();
     return $results;
    }
}
