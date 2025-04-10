<?php
session_start();

// Initialiser le tableau des livres si ce n'est pas déjà fait
if (!isset($_SESSION['livres'])) {
    $_SESSION['livres'] = [];
}
// Ajouter un livre
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {
    $id = count($_SESSION['livres']) + 1; // ID auto-incrémenté
    $titre = $_POST['titre'];
    $genre = $_POST['genre'];
    $annee_pub = $_POST['annee_pub'];
    $statut = $_POST['statut'];

    $_SESSION['livres'][] = [
        'id' => $id,
        'titre' => $titre,
        'genre' => $genre,
        'annee_pub' => $annee_pub,
        'statut' => $statut,
    ];

    header("Location: liste.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Livre</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body class="ajouter">
   
    <div class="container">
        <h1>Ajouter un Livre</h1>
        <form method="POST">
            <input type="text" name="titre" placeholder="Titre" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <input type="number" name="annee_pub" placeholder="Année de publication" required>
            <select name="statut" required>
                <option value="disponible">Disponible</option>
                <option value="emprunté">Emprunté</option>
            </select>
            <button type="submit" name="ajouter">Ajouter Livre</button>
        </form>
        <a href="liste.php">Retour à la liste</a>
    </div>
</body>
</html>