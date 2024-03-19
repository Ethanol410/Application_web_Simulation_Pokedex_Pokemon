<?php 

include './pokemon_api.php';

 /* Vérifie si le formulaire d'ajout de dresseur est soumis */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_collector'])) {
    $pseudo = $_POST['username'];
    $id = $_POST['user_password'];
    $gender = $_POST['gender']; 

    /* Cela ajoute le nouveau dresseur */
    try {
        add_collector($id, $pseudo, $gender);
        echo "Dresseur ajouté avec succès!";
    } catch (ErrorException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

 /* Permet de vérifier si le formulaire de connexion est soumis */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_collector'])) {
    $pseudo = $_POST['login_username'];
    $id = $_POST['login_user_password'];

 

/*  Permet de vérifier si le dresseur existe avec les informations d'identification fournies*/
    $collectorData = json_decode(file_get_contents($GLOBALS["prefix_path"]."collector_data.json"), true);
    if (isset($collectorData[$id]) && $collectorData[$id]['collector_name'] === $pseudo) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        
        $_SESSION["collector_id"] = $id;

        header("Location: ./accueil.php");
        exit();
    } else {
        
        echo "Identifiants incorrects. Veuillez réessayer.";
    }
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Site Pokemon</title>
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
  
    <section>
      <p>Améliorer la gestion de collection avec PokeCollector</p>
    </section>


    <div class="form_login_create">
    <form method="post" class="form card">
            <div class="field">
                <label for="username">Pseudo</label>
                <input class="input" name="username" type="text" placeholder="Username" id="username" required>
            </div>
            <div class="field">
                <label for="password">Id</label>
                <input class="input" name="user_password" type="text" placeholder="ID" id="password" required>
            </div>
            <div class="field">
                <label for="gender">Genre</label>
                <select class="input" name="gender" id="gender" required>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
            </div>
            <button class="button" type="submit" name="add_collector">Ajouter Dresseur</button>
        </form>


        <!-- Formulaire de connexion -->
        <form method="post" class="form card">
            <div class="field">
                <label for="login_username">Pseudo</label>
                <input class="input" name="login_username" type="text" placeholder="Username" id="login_username" required>
            </div>
            <div class="field">
                <label for="login_user_password">Id</label>
                <input class="input" name="login_user_password" type="password" placeholder="ID" id="login_user_password" required>
            </div>
            <button class="button" type="submit" name="login_collector">Connexion</button>
        </form>

        </div>
    
</header>

  <!-- ------------------------------- -->
 
</body>

</html>