<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/views/CSS/add.css"> <!-- Link -->
    <title>validation</title>
</head>
<body>
   <?php //include "Background.php"; ?>
   <?php //include "NavBar.php"; ?>
   
   <div class="main">
      <div class="title"><h1>Rapport de la visite médicale</h1></div>
      <!-- Création formulaire -->
      <form method="POST" action="/madecin/validate">  
         <h2>Remplissez les cases suivantes:</h2>
         <div class="infoPers">
            <label class="one">Conclusion:</label>
            <input class="Conclusion" type="text" name="con" placeholder="Conclusion" required><br>
            <label class="two">Ordonnance:</label>
            <input class="Ordonnance" type="text" name="ord" placeholder="Ordonnance" required><br>
         </div>
         <input type="hidden" name="id_v" value="<?php echo $_POST["id_v"] ?>">
         <div class="button">
            <input type="submit" value="Confirmer">
         </div>
      </form>
   </div>

   <?php //include "Footer.php"; ?>
</body>