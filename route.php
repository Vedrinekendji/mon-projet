<?php
session_start();

// Initialisation des livres (Simule une base de données)
if (!isset($_SESSION['livres'])) {
    $_SESSION['livres'] = [];
}

// Redirige vers la liste
header("Location: liste.php");
exit();
?>