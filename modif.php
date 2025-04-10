<?php
session_start();

// Pré-remplir le formulaire pour modifier un livre
$livreAModifier = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if (isset($_SESSION['livres'][$id - 1])) {

    $livreAModifier = $_SESSION['livres'][$id - 1];
} else {
    // Gérer l'erreur si le livre n'existe pas
    echo "Livre non trouvé.";
    exit();
}
}

// Modifier un livre
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])) {
    $id = (int) $_POST['id'];
    if (isset($_SESSION['livres'][$id - 1])) {

    $_SESSION['livres'][$id - 1]['titre'] = $_POST['titre'];
    $_SESSION['livres'][$id - 1]['genre'] = $_POST['genre'];
    $_SESSION['livres'][$id - 1]['annee_pub'] = $_POST['annee_pub'];
    $_SESSION['livres'][$id - 1]['statut'] = $_POST['statut'];

    header("Location: liste.php"); // Redirection après modification
    exit();
} else {
    echo "Livre non trouvé.";
    exit();
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Livre</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
</head>
<body class="modif">
    <div class="container">
        <h1>Modifier un Livre</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $livreAModifier['id']; ?>">
            <input type="text" name="titre" placeholder="Titre" value="<?php echo $livreAModifier['titre']; ?>" required>
            <input type="text" name="genre" placeholder="Genre" value="<?php echo $livreAModifier['genre']; ?>" required>
            <input type="number" name="annee_pub" placeholder="Année de publication" value="<?php echo $livreAModifier['annee_pub']; ?>" required>
            <select name="statut" required>
                <option value="disponible" <?php echo $livreAModifier['statut'] == 'disponible' ? 'selected' : ''; ?>>Disponible</option>
                <option value="indisponible" <?php echo $livreAModifier['statut'] == 'indisponible' ? 'selected' : ''; ?>>Indisponible</option>
                </select>
                <button type="submit" name="modifier">Modifier</button>
            </form>
        
    </div>
</body>
</html>