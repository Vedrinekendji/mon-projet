<?php
session_start();
$id = $_GET['id'];

// Logique pour emprunter le livre
foreach ($_SESSION['livres'] as &$livre) {
    if ($livre['id'] == $id && $livre['statut'] == 'disponible') {
        $livre['statut'] = 'indisponible'; // Change le statut à "indisponible"
        break;
    }
}
header('Location: user.php'); // Redirige vers la liste des livres
exit;
?>