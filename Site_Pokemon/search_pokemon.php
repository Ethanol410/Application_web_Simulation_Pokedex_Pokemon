<?php
include './pokemon_api.php';

 /* Cela récupére le terme de recherche depuis l'URL */
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

 /* Permet de vérifier si le terme de recherche n'est pas vide avant de l'utiliser */
if (!empty($searchTerm)) {
    $pokemonData = list_all_pokemon();

/* Filtre les résultats en fonction du terme de recherche */
$searchResults = array_filter($pokemonData, function($pokemon) use ($searchTerm) {
    return strpos(strtolower($pokemon['identifier']), strtolower($searchTerm)) !== false;
});

/* Cela stocke l'html de la carte */
$output = "";


foreach ($searchResults as $pokemonId => $pokemon) {
    $output .= '<div class="catalogue_card">';
    $output .= '<div class="catalogue_card-info">';
    $output .= '<a href="./detail.php?id=' . $pokemonId . '">';
    $output .= '<div class="catalogue_card-avatar">';
    $output .= '<img src="./Assets/Image/img/96px/' . $pokemonId . '.png" alt="' . $pokemon['identifier'] . '">';
    $output .= '</div>';
    $output .= '</a>';
    $output .= '<div class="catalogue_card-title">' . $pokemon['identifier'] . '</div>';
    $output .= '<div class="catalogue_card-subtitle">' . str_pad($pokemonId, 3, '0', STR_PAD_LEFT) . '</div>';
    $output .= '</div>';
    $output .= '<ul class="catalogue_card-social">';
    $output .= '<a href="./add_to_collection.php?id=' . $pokemonId . '">';
    $output .= '<li class="catalogue_card-social__item">';
    $output .= '<svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
    $output .= '<path d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z" fill="#1C274C" />';
    $output .= '<path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="#1C274C" />';
    $output .= '</svg>';
    $output .= '</li>';
    $output .= '</a>';
    $output .= '<a href="./detail.php?id=' . $pokemonId . '">';
    $output .= '<li class="catalogue_card-social__item">';
    $output .= '<svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
    $output .= '<path fill-rule="evenodd" clip-rule="evenodd"
    d="M10.9436 1.25H13.0564C14.8942 1.24998 16.3498 1.24997 17.489 1.40314C18.6614 1.56076 19.6104 1.89288 20.3588 2.64124C21.1071 3.38961 21.4392 4.33856 21.5969 5.51098C21.75 6.65019 21.75 8.10583 21.75 9.94359V14.0564C21.75 15.8942 21.75 17.3498 21.5969 18.489C21.4392 19.6614 21.1071 20.6104 20.3588 21.3588C19.6104 22.1071 18.6614 22.4392 17.489 22.5969C16.3498 22.75 14.8942 22.75 13.0564 22.75H10.9436C9.10583 22.75 7.65019 22.75 6.51098 22.5969C5.33856 22.4392 4.38961 22.1071 3.64124 21.3588C2.89288 20.6104 2.56076 19.6614 2.40314 18.489C2.24997 17.3498 2.24998 15.8942 2.25 14.0564V9.94358C2.24998 8.10582 2.24997 6.65019 2.40314 5.51098C2.56076 4.33856 2.89288 3.38961 3.64124 2.64124C4.38961 1.89288 5.33856 1.56076 6.51098 1.40314C7.65019 1.24997 9.10582 1.24998 10.9436 1.25ZM6.71085 2.88976C5.70476 3.02502 5.12511 3.27869 4.7019 3.7019C4.27869 4.12511 4.02502 4.70476 3.88976 5.71085C3.75159 6.73851 3.75 8.09318 3.75 10V14C3.75 15.9068 3.75159 17.2615 3.88976 18.2892C4.02502 19.2952 4.27869 19.8749 4.7019 20.2981C5.12511 20.7213 5.70476 20.975 6.71085 21.1102C7.73851 21.2484 9.09318 21.25 11 21.25H13C14.9068 21.25 16.2615 21.2484 17.2892 21.1102C18.2952 20.975 18.8749 20.7213 19.2981 20.2981C19.7213 19.8749 19.975 19.2952 20.1102 18.2892C20.2484 17.2615 20.25 15.9068 20.25 14V10C20.25 8.09318 20.2484 6.73851 20.1102 5.71085C19.975 4.70476 19.7213 4.12511 19.2981 3.7019C18.8749 3.27869 18.2952 3.02502 17.2892 2.88976C16.2615 2.75159 14.9068 2.75 13 2.75H11C9.09318 2.75 7.73851 2.75159 6.71085 2.88976ZM7.25 8C7.25 7.58579 7.58579 7.25 8 7.25H16C16.4142 7.25 16.75 7.58579 16.75 8C16.75 8.41421 16.4142 8.75 16 8.75H8C7.58579 8.75 7.25 8.41421 7.25 8ZM7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H16C16.4142 11.25 16.75 11.5858 16.75 12C16.75 12.4142 16.4142 12.75 16 12.75H8C7.58579 12.75 7.25 12.4142 7.25 12ZM7.25 16C7.25 15.5858 7.58579 15.25 8 15.25H13C13.4142 15.25 13.75 15.5858 13.75 16C13.75 16.4142 13.4142 16.75 13 16.75H8C7.58579 16.75 7.25 16.4142 7.25 16Z"
    fill="#1C274C" />';
    $output .= '</svg>';
    $output .= '</li>';
    $output .= '</a>';
    $output .= '</ul>';
    $output .= '</div>';
}
}else {
    echo "Veuillez entrer un terme de recherche.
    Si vous souhaitez ré-afficher tous les pokemons, entrez 'a'.";
}


echo $output;
?>
