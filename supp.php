<?php
session_start();

// Vérifiez si l'ID est défini
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['livres'][$id - 1]); // Suppression basée sur l'index
    $_SESSION['livres'] = array_values($_SESSION['livres']); // Réindexation
} else {
    // Gérer le cas où l'ID n'est pas défini ou invalide
    header("Location: liste.php?error=invalid_id");
    exit();
}

header("Location: liste.php");
exit();
?>