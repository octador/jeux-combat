<?php
// Définit la classe HeroesManager qui contient tout le CRUD d’un héros :

// Enregistrer un nouveau héros en base de données.
// Modifier un héros.
// Sélectionner un héros.
// Récupérer une liste de plusieurs héros vivants.
// Savoir si un héros existe.

require_once('../Config/autoload.php');
require_once('../Config/db.php');
    
    class HeroesManager{
        private PDO $db;
        private array $herosArray ;
        
        public function __construct($db)
        {
            $this->db = $db;
        }
        // check if exist
        public function checkHeros() :void
        {
            $request = $this->db->query("SELECT * FROM heros");
            $herosArray = $request->fetchAll();
            var_dump($herosArray);
        }
        // add Heros in $db
        public function addHeros() :void
        {
        $request = $this->db->prepare("INSERT INTO heros(heros) VALUES (:heros)");
        $request->execute([
            'heros'=> $this->herosArray['heros']
        ]);

        }
    }
    
$newHeros = new HeroesManager($db);

$newHeros->checkHeros();
$newHeros->addHeros()








?>
