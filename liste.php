<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Livres</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
</head>
<body class="liste">
   
    <div class="container">
        <h1>Liste des Livres</h1>

        <a href="ajouter.php">Ajouter un Nouveau Livre</a>
        
        <?php if (empty($_SESSION['livres'])): ?>
            <p>Aucun livre disponible.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Genre</th>
                        <th>Année de Publication</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['livres'] as $livre): ?>
                        <tr>
                            <td><?php echo $livre['id']; ?></td>
  
                            <td><?php echo htmlspecialchars($livre['titre']); ?></td>
                            <td><?php echo htmlspecialchars($livre['genre']); ?></td>
                            <td><?php echo htmlspecialchars($livre['annee_pub']); ?></td>
                            <td><?php echo htmlspecialchars($livre['statut']); ?></td>
                            <td>
                                <a href="modif.php?id=<?php echo $livre['id']; ?>">Modifier</a>
                                <a href="supp.php?id=<?php echo $livre['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>