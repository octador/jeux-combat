<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=jeux_de_combat', 'root', '');
    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}




?>