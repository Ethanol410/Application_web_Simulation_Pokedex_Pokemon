<?php


/* Permet de lancer la session */
session_start();



include './pokemon_api.php';


/* Récupérer l'ID du dresseur connecté */
$collectorId = get_current_id();


/*  Démarrez la session si ce n'est pas déjà fait */
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

 /* Assurez-vous que la variable de session collector_id est définie avec l'ID du dresseur */
$_SESSION["collector_id"] = $collectorId;


/* Charger les données des dresseurs depuis le fichier JSON */
$collectorData = json_decode(file_get_contents($GLOBALS["prefix_path"]."collector_data.json"), true);

 /* Vérifier si le dresseur connecté existe dans les données */
if (isset($collectorData[$collectorId])) {
    $pseudoDuDresseurConnecte = $collectorData[$collectorId]['collector_name'];
} else {
     /* Gérer le cas où le dresseur n'est pas trouvé (peut-être une redirection ou une autre logique appropriée) */
    $pseudoDuDresseurConnecte = "Utilisateur inconnu";
}

 /* Vérifiez si l'utilisateur a cliqué sur "Se déconnecter" */
if (isset($_GET['logout'])) {
    logout();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Accueil</title>
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
      <a href="./accueil.php" class="accueil active">Accueil</a>
<a href="./catalogue.php" class="catalogue">Catalogue</a>
<a href="./collection.php" class="collection">Collection</a>
<a href="./detail.php" class="detail">Détail</a>
<a href="./index.php?logout" class="se_connecter">Se déconnecter</a>
    </nav>


    

    <section>
    <p>Découvrez la magie de PokeCollector et réveillez l'aventurier qui est en vous !</p>
    <p class="bienvenu">Bienvenue, cher Dresseur <?php echo $pseudoDuDresseurConnecte; ?> !</p>
      <a href="./catalogue.php"><button>Commencer l'aventure</button></a>
    </section>


  </header>
  <!-- --------------------------- -->
  <main>
    <!-- section présentation -->
    <section class="section_presentation">
      <article class="article_titre_presentation">
      <h1>Explorez une invention <span>révolutionnaire</span> pour votre collection de Pokémon</h1>
        <p>
        PokeCollector, votre Pokédex ultime, facilite la gestion et l'utilisation de votre collection de Pokémon. Découvrez une expérience sans précédent !
        </p>
      </article>
      <div class="div_box_presentation">
        <!-- Box numéro 1 , présentation -->
        <article class="article_presentation">
          <div class="text_presentation">
            <h1>Le catalogue préféré des dresseurs</h1>
            <p>
            Découvrez une toute nouvelle façon de gérer votre Pokédex ! PokeCollector vous accompagne tout au long de votre aventure.
            </p>
          </div>
          <img src="./Assets/Image/Photos/pokemon-5185124_1920.jpg" alt="" />
        </article>
        <!-- ---------------------- -->
        <article class="article_presentation_2">
          <div class="text_presentation_2">
            <h1>Une étendue de possibilités</h1>
            <p>
            PokeCollector offre de multiples façons de gérer votre collection avec facilité et flexibilité !
            </p>
          </div>
          <img src="./Assets/Image/Photos/pokemon-5101360_1920.jpg" alt="" />
        </article>
        <article class="article_presentation_3">
          <div class="text_presentation_3">
            <h1>Une facilité impressionnante</h1>
            <p>
            PokeCollector est conçu pour aider tous les dresseurs, facile à prendre en main. Il deviendra votre meilleur compagnon tout au long de votre aventure.
            </p>
          </div>
          <img src="./Assets/Image/Photos/pop-5475310_1920.jpg" alt="" />
        </article>
      </div>
    </section>
    <!-- ------------------------------------------ -->
    <!-- Section accès -->
    <section class="section_acces">
      <h1>Découvrez <span>l'accès</span> facile à tous vos Pokémon</h1>
      <div class="div_acces">
        <article class="article_acces_1">
          <img src="./Assets/Image/Photos/pokemon-5185124_1920.jpg" alt="" width="500" height="250" />
          <div>
            <h1>Le catalogue préféré des dresseurs du monde entier</h1>
            <p>
            Votre collection de Pokémon, facile à prendre en main et à utiliser, vous permet de visualiser tous vos Pokémon en un instant !
            </p>
          </div>
        </article>
        <article class="article_acces_2">
          <img src="./Assets/Image/Photos/pokemon-5101360_1920.jpg" alt="" width="500" height="250" />
          <div>
            <h1>Le catalogue préféré des catalogues</h1>
            <p>
            Votre collection de Pokémon, une expérience inégalée de gestion facile. Explorez et profitez de votre aventure Pokémon comme jamais auparavant !
            </p>
          </div>
        </article>
        <article class="article_acces_3">
          <img src="./Assets/Image/Photos/pop-5475310_1920.jpg" alt="" width="500" height="250" />
          <div>
            <h1>Le catalogue préféré des dresseurs passionnés</h1>
            <p>
            PokeCollector vous offre une gestion simplifiée de votre collection. Libérez la puissance de vos Pokémon avec facilité !
            </p>
          </div>
        </article>
      </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- section liste -->
    <section class="section_liste">
      <article>
        <div class="div_liste">
          <h2>Découvrez des <span>compagnons</span> extraordinaires</h2>
          <p>Ce sont des Pokémon exceptionnels. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Integer malesuada nunc vel risus. Convallis posuere morbi leo urna.</p>
        </div>

        <div class="div_liste">
        <h2>Découvrez des <span>compagnons</span> extraordinaires</h2>
          <p>Ce sont des magnifiques apagnan.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Integer malesuada nunc vel risus. Convallis posuere
            morbi leo urna.</p>
        </div>

        <div class="div_liste">
        <h2>Découvrez des <span>compagnons</span> extraordinaires</h2>
          <p>Ce sont des magnifiques apagnan, walay frr ils sont incroyables mes pokemons.Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Integer
            malesuada nunc vel risus. Convallis posuere morbi leo urna.</p>
        </div>
        
        <div class="div_liste">
        <h2>Découvrez des <span>compagnons</span> extraordinaires</h2>
          <p>Ce sont des magnifiques apagnan.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Integer malesuada nunc vel risus. Convallis posuere
            morbi leo urna.</p>
        </div>
      </article>
      <video src="./Assets/Image/Photos/video_pok.mp4" height="830" width="650"  autoplay loop></video>

    </section>
    <!-- ----------------------------------- -->
    <!-- section avis -->
    <section class="section_avis">
      <h1>Voici les <span> avis </span> de différents dresseurs !</h1>
      <article class="article_avis">
        <div class="div_avis">
          <div>
            <img src="./Assets/Image/Photos/ta_sbire_f.png" height="50" width="50" alt="pp avis" />
            <h3>Lisa , 27 ans</h3>
          </div>
          <p>
          En tant que dresseuse de Pokémon professionnelle, ce catalogue m'accompagne tous les jours de mon aventure ! 
          </p>
        </div>
        <div class="div_avis">
          <div>
            <img src="./Assets/Image/Photos/ta_sbire_h.png" height="50" width="50" alt="pp avis" />
            <h3>Sacha , 18 ans</h3>
          </div>
          <p>
          Ce Pokédex révolutionnaire est bien plus qu'un simple outil de gestion. Il rend chaque moment de ma quête Pokémon excitant et inoubliable.
          </p>
        </div>
        <div class="div_avis">
          <div>
            <img src="./Assets/Image/Photos/ta_sbire_f.png" height="50" width="50" alt="pp avis" />
            <h3>Alice, 22 ans</h3>
          </div>
          <p>
          "PokeCollector est bien plus qu'un simple catalogue de Pokémon. Il devient rapidement un compagnon de confiance qui m'accompagne dans toutes mes aventures.
          </p>
        </div>
        <div class="div_avis">
          <div>
            <img src="./Assets/Image/Photos/ta_sbire_h.png" height="50" width="50" alt="pp avis" />
            <h3>Maxime, 25 ans</h3>
          </div>
          <p>
          "PokeCollector, c'est la clé de ma réussite en tant que dresseur. 
          </p>
        </div>
        <div class="div_avis">
          <div>
            <img src="./Assets/Image/Photos/ta_sbire_f.png" height="50" width="50" alt="pp avis" />
            <h3>Corinne , 56 ans</h3>
          </div>
          <p>
          La facilité d'utilisation et la richesse des fonctionnalités en font un incontournable pour tout dresseur sérieux !
          </p>
        </div>
        <div class="div_avis">
          <div>
            <img src="./Assets/Image/Photos/ta_sbire_h.png" height="50" width="50" alt="pp avis" />
            <h3>Picogna , 16 ans</h3>
          </div>
          <p>
          La variété des fonctionnalités et la convivialité de l'interface me permettent de rester concentré sur l'essentiel – devenir le maître Pokémon ultime !"
          </p>
        </div>
        <div class="div_avis">
          <div>
            <img src="./Assets/Image/Photos/ta_sbire_f.png" height="50" width="50" alt="pp avis" />
            <h3>Lilou , 19 ans</h3>
          </div>
          <p>
            Voici ta collection de pokemon , facile à prendre en main et
            facile d’utilisation , elle va te permettre de pouvoir visualiser
            tout tes pokemons !
          </p>
        </div>
        <div class="div_avis">
          <div>
            <img src="./Assets/Image/Photos/ta_sbire_h.png" height="50" width="50" alt="pp avis" />
            <h3>Fréderic , 34 ans</h3>
          </div>
          <p>
            1 impact , 1 fissure , 1 vitre brisée , et Carglass vous offre vos balais d'essuie glace.
          </p>
        </div>
      </article>
    </section>
    <!-- ----------------------------- -->
    <!-- Section Chiffre -->
    <section class="section_chiffre">
      <div>
        <h1>Découvrez les <span>chiffres incroyables</span> de notre Pokédex !</h1>
        <p>
        PokeCollector rend la gestion de votre collection de Pokémon passionnante et agréable. Rejoignez-nous aujourd'hui pour une expérience inoubliable.
        </p>
        <a href="./catalogue.php"><button>Commencer l'aventure</button></a>
        
      </div>
      <article class="article_chiffre">
        <div>
          <h1>85%</h1>
          <p>Clients Satisfaits</p>
        </div>
        <div>
          <h1>200</h1>
          <p>Pokémons disponibles</p>
        </div>
        <div>
          <h1>10</h1>
          <p>Années d'expérience</p>
        </div>
      </article>
    </section>
    <!-- ------------------------------- -->
    <!--  section_questions-->
    <section class="section_questions">
      <div class="container">
        <h1><span>Questions</span> posées récémments ?</h1>
        <div class="tab">
          <input type="radio" name="acc" id="acc1">
          <label for="acc1">
            <h2>01</h2>
            <h3>Comment cela fonctionne ? </h3>
          </label>
          <div class="content">
            <p>
              Découvrez la simplicité de PokeCollector ! Notre interface conviviale facilite la gestion de votre collection. Consultez notre guide pour commencer.
            </p>
          </div>
        </div>

        <div class="tab">
          <input type="radio" name="acc" id="acc2">
          <label for="acc2">
            <h2>02</h2>
            <h3>Est ce que les pokemons sont tous présents ?</h3>
          </label>
          <div class="content">
            <p>Bien sur ! Nous sommes pour l'inclusion de chacun.</p>
          </div>
        </div>

        <div class="tab">
          <input type="radio" name="acc" id="acc3">
          <label for="acc3">
            <h2>03</h2>
            <h3>Est ce que vous aimez Pokemon ?</h3>
          </label>
          <div class="content">
            <p>Oui, avec PASSION !</p>
          </div>
        </div>

        <div class="tab">
          <input type="radio" name="acc" id="acc4">
          <label for="acc4">
            <h2>04</h2>
            <h3>Est ce que cela va aider Sacha à gagné la ligue Pokemon ?</h3>
          </label>
          <div class="content">
            <p>Oui, bien sûr ! </p>
          </div>
        </div>

      </div>
    </section>


    <!-- ----------------------- -->

    <!-- section action -->
    <section class="section_action">
      <div>
        <h1>Commencez dès <span>maintenant</span> votre aventure avec PokeCollector</h1>
        <p>PokeCollector n'attend que <span>vous</span> pour rendre votre expérience Pokémon encore plus excitante !</p>
        <div class="action_button"><a href="./catalogue.php"><button>Commencer l'aventure</button></a></div>

      </div>
    </section>
    <!-- ------------------------- -->
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