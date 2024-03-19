<?php
    /* Cela permet de vérifier si le paramètre d'ID du Pokémon est présent */
    if (isset($_GET['id'])) {
        $pokemonId = $_GET['id'];

       
        include './pokemon_api.php';

        
        $collectorId = 1; 

        
        add_pokemon_to_collector($collectorId, $pokemonId);
    }

    
    header("Location: collection.php");
    exit();
?>
