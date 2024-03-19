<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">

</head>
<body>
    <header>

        <div class="fond_video">
          <video src="./Assets/Image/Photos/pokemon_-_111535 (Original).mp4" alt="FondVideo" autoplay muted></video>
        </div>
        <nav>
          <a href="./accueil.php" class="accueil">Accueil</a>
<a href="./catalogue.php" class="catalogue">Catalogue</a>
<a href="./collection.php" class="collection">Collection</a>
<a href="./detail.php" class="detail active">Détail</a>
<a href="./index.php?logout" class="se_connecter">Se déconnecter</a>
        </nav>
        <section>
          <p>Voici le détail d'un Pokemon avec PokeCollector</p>
        </section>
        
      </header>
      <!-- --------------------------- -->

      <!-- Détails -->
      <div class="btn_retour">
        <a href="./collection.php"><svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM11.5303 8.46967C11.8232 8.76256 11.8232 9.23744 11.5303 9.53033L9.81066 11.25H16C16.4142 11.25 16.75 11.5858 16.75 12C16.75 12.4142 16.4142 12.75 16 12.75H9.81066L11.5303 14.4697C11.8232 14.7626 11.8232 15.2374 11.5303 15.5303C11.2374 15.8232 10.7626 15.8232 10.4697 15.5303L7.46967 12.5303C7.17678 12.2374 7.17678 11.7626 7.46967 11.4697L10.4697 8.46967C10.7626 8.17678 11.2374 8.17678 11.5303 8.46967Z" fill="#1C274C"/>
          </svg></a>
      </div>

      <section class="section_detail">

  <!-- php -->
  <?php
                include './pokemon_api.php';

            

                 /*  Permet de récupérer l'ID du Pokémon à partir de la requête GET */
            $id = isset($_GET['id']) ? $_GET['id'] : 1;

            
            $pokemonData = get_pokemon_by_id($id);

           

            
?>
            <img src="./Assets/Image/img/full/<?php echo $id; ?>.png" alt="<?php echo $pokemonData['identifier']; ?>">
            <div class="info_pokemon">
            <p>Nom du Pokemon : <span><?php echo $pokemonData['identifier']; ?></span</p>
            <p>Taille : <?php echo $pokemonData['height']; ?> cm</p>
            <p>Poids : <?php echo $pokemonData['weight']; ?> kg</p>
            <p>Expérience : <?php echo $pokemonData['base_experience']; ?> xp</p>
            <p>Type(s) : </p>

            <?php foreach($pokemonData['types'] as $type){
             echo '<img src="./Assets/Image/types/'.$type.'.png" alt="'.$type.'">';
            }
            ?>
            
            

        </div>

        <div class="button_pokemon">
        <a href="./add_to_collection.php?id=<?=$id;?>">
          <button>Ajouter</button>
          </a>

          
            
          <a href="./remove_from_collection.php?id=<?=$pokemonId;?>">
          <button>Enlever</button>
          </a>
          
        </div>
        <?php ?>
      </section>
<!-- ------- -->
</main>
 <!-- Footer -->
 <footer>

  <img src="./Assets/Image/Photos/pokeball_icon_136305.png" height="80" width="80" alt="Logo Pokeball">


  <div class="footer_credit"> 
        <article class="footer_page">
          <div class="footer_page_items">
            <a href="./catalogue.php"><h2>Catalogue</h2></a>
            <p>
              Accède directement à ton catalogue.
            </p>
          </div>
          <div class="footer_page_items">
            <a href="./accueil.php"><h2>Accueil</h2></a>
            <p>
            Accède directement à l'accueil.
            </p>
          </div>
          <div class="footer_page_items">
            <a href="./collection.php"><h2>Collection</h2></a>
            <p>
            Accède directement à ta collection.
            </p>
          </div>
          <div class="footer_page_items">
            <h2>Compte</h2>
            <p>
              Accède directement à ton compte.
            </p>
          </div>
          <div class="footer_page_items reseaux">
            <div class="youtube">
              <img src="" alt="" />
              <p>@PokeCollector</p>
            </div>
          </div>
        </article>
      </div>
  <div class="droits">
    <p>@PokeCollector. Tous droit est réservé.</p>
  </div>
</footer>
    <!-- ------------------------------- -->
</body>
</html>