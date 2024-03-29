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
    public function checkHeros(Hero $newPerso): array
    {
        $request = $this->db->prepare("SELECT * FROM heros WHERE heros = :heros");
        $request->execute([
            'heros' => $newPerso->getName()
        ]);

        $herosArrays = $request->fetchAll();
        // var_dump($herosArrays);

        if (!$herosArrays) {
            // var_dump($herosArrays);
            $this->addHeros($newPerso);
        }

        // var_dump($this->herosObjectArray);
        return $this->herosObjectArray;
    }

    // add Heros in $db
    public function addHeros(Hero $newPerso): void
    {
        $request = $this->db->prepare("INSERT INTO heros(heros, image) VALUES (:heros,:image)");
        $request->execute([
            'image' => $newPerso->getImage(),
            'heros' => $newPerso->getName()
        ]);

        $id = $this->db->lastInsertId();
        $newPerso->setId($id);


        $this->herosObjectArray[] = $newPerso;
    }

    // afficher tout les heros qui son en vie
    public function findAllAlive()
    {

        $request = $this->db->query("SELECT * FROM heros WHERE heros.life_points > 0 ORDER BY life_points DESC");
        $results = $request->fetchAll();
        $herosLifeResult = [];

        foreach ($results as $result) {
            $hero = new Hero($result);
            $hero->setid($result['id']);
            $hero->setName($result['heros']);
            $hero->setLifePoints($result['life_points']);

            $herosLifeResult[] = $hero;
        }
        return $herosLifeResult;
    }

    public function find($selectId)
    {

        $request = $this->db->prepare("SELECT *FROM heros WHERE id = :id");
        $request->execute([
            ':id' => $selectId
        ]);
        $findArray = $request->fetch();


        $hero = new Hero($findArray);
       
        $hero->setLifePoints($findArray['life_points']);
        $hero->setId($findArray['id']);
        return $hero;
    }
    public function update(Hero $hero)
    {

        $sql = ("UPDATE `heros` SET `life_points`= :life_points WHERE heros.id = :id");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            ':life_points' => $hero->getlifepoints(),
            ':id' => $hero->getId()
        ]);
    }
    public function deleteHeros(Hero $hero)
    {
        $sql = "DELETE FROM heros WHERE id = :id";

        $statement = $this->db->prepare($sql);

        $statement->execute([
            ':id' => $hero->getId()
        ]);
    }
}
