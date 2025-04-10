<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Livres</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
    <script>
        function confirmReturn() {
            return confirm("Voulez-vous vraiment retourner ce livre ?");
        }
    </script>
</head>
<body class="liste">
   
    <div class="container">
        <h1>Liste des Livres</h1>

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
                                <?php if ($livre['statut'] == 'disponible'): ?>
                                    <a href="emprunter.php?id=<?php echo $livre['id']; ?>">Emprunter</a>
                                <?php else: ?>
                                    <a href="retourne.php?id=<?php echo $livre['id']; ?>" onclick="return confirmReturn();">Retourner</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>