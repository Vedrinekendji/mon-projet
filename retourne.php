<?php
session_start();
$id = $_GET['id'];

// Logique pour retourner le livre
foreach ($_SESSION['livres'] as &$livre) {
    if ($livre['id'] == $id && $livre['statut'] == 'indisponible') {
        $livre['statut'] = 'disponible'; // Change le statut à "disponible"
        break;
    }
}
header('Location: user.php'); // Redirige vers la liste des livres
exit;
?>