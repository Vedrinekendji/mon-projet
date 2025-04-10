
<?php
  session_start();


 $mot_de_passe_defini = "vedrine";

  $message = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $mot_de_passe_entree = $_POST['mot_de_passe'];

                                                                                                
    if ($mot_de_passe_entree === $mot_de_passe_defini) {
       $_SESSION['auth'] = true; // Marque l'utilisateur comme authentifié
      header('Location: liste.php'); 
          exit; 
 } else {
      $message = "Mot de passe incorrect. Veuillez réessayer.";
     }
    }
    ?>
                                                                                            <!DOCTYPE html>
                                                                                            <html lang="fr">
                                                                                            <head>
                                                                                                <meta charset="UTF-8">
                                                                                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                                                                <title>Formulaire de Mot de Passe</title>
                                                                                                <style>
                                                                                                    body {
                                                                                                        font-family: Arial, sans-serif;
                                                                                                        display: flex;
                                                                                                        justify-content: center;
                                                                                                        align-items: center;
                                                                                                        height: 100vh;
                                                                                                        background-color: #f4f4f4;
                                                                                                    }
                                                                                                    .container {
                                                                                                        background: #fff;
                                                                                                        padding: 20px;
                                                                                                        border-radius: 5px;
                                                                                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                                                                                    }
                                                                                                    h1 {
                                                                                                        margin-bottom: 20px;
                                                                                                    }
                                                                                                    input[type="password"] {
                                                                                                        width: 100%;
                                                                                                        padding: 10px;
                                                                                                        margin-bottom: 20px;
                                                                                                        border: 1px solid #ccc;
                                                                                                        border-radius: 5px;
                                                                                                    }
                                                                                                    input[type="submit"] {
                                                                                                        background-color: #5cb85c;
                                                                                                        color: white;
                                                                                                        border: none;
                                                                                                        padding: 10px;
                                                                                                        border-radius: 5px;
                                                                                                        cursor: pointer;
                                                                                                        width: 100%;
                                                                                                    }
                                                                                                    input[type="submit"]:hover {
                                                                                                        background-color: #4cae4c;
                                                                                                    }
                                                                                                    .message {
                                                                                                        margin-top: 20px;
                                                                                                        color: red;
                                                                                                    }
                                                                                                </style>
                                                                                            </head>
                                                                                            <body>
                                                                                                <div class="container">
                                                                                                    <h1>Entrez le Mot de Passe</h1>
                                                                                                    <form method="post" action="">
                                                                                                        <input type="password" name="mot_de_passe" required placeholder="Mot de passe">
                                                                                                        <input type="submit" value="Valider">
                                                                                                    </form>
                                                                                                    <?php if ($message): ?>
                                                                                                        <div class="message"><?php echo $message; ?></div>
                                                                                                    <?php endif; ?>
                                                                                                </div>

                                                                                            </body>
                                                                                            </html>