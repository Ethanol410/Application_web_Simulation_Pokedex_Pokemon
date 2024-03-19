<?php

include './pokemon_api.php';

 /* Permet de vérifier si association_id est présent dans l'URL */
if (isset($_GET['id'])) {
    $associationId = $_GET['id'];
    
    delete_pokemon_from_collector($associationId);
    
    header('Location: ./collection.php');
    exit();
} else {
    echo "L'identifiant d'association n'est pas spécifié.";
}
?>
