<?php
// Définit la classe HeroesManager qui contient tout le CRUD d’un héros :

// Enregistrer un nouveau héros en base de données.
// Modifier un héros.
// Sélectionner un héros.
// Récupérer une liste de plusieurs héros vivants.
// Savoir si un héros existe.

require_once('./Config/autoload.php');
require_once('./Config/db.php');

class HeroesManager
{
    private PDO $db;
    private array $herosArray;
    private array $checkArrayHero;

    public function __construct($db)
    {
        $this->db = $db;
    }
    // check if exist
    public function checkHeros($newPerso): void
    {
        $request = $this->db->query("SELECT * FROM heros");
        $herosArrays = $request->fetchAll();

        // Parcourir tous les héros $herosArrays
        foreach ($herosArrays as $herosArray) {

            // Comparer avec $newPerso
            if ($herosArray['heros'] == $newPerso) {
                // $this->herosArray = ;
                $newHeros = new Hero($herosArray);
                var_dump($herosArray);

                // hero->setName($newPerso);
                echo 'rooooo';
                return;
            }
        }

        // Si la boucle se termine sans trouver de correspondance, ajouter le nouveau héros
        $this->addHeros($newPerso);
    }

    // add Heros in $db
    public function addHeros($newPerso): void
    {
        $request = $this->db->prepare("INSERT INTO heros(heros) VALUES (:heros)");
        $request->execute([
            'heros' => $newPerso
        ]);
        var_dump($newPerso);
    }
}
