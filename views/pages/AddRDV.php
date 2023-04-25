<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/views/CSS/add.css"> <!-- Link -->
    <title>Ajouter de rendez-vous</title>
</head>
<body>
   <?php //include "Background.php"; ?>
   <?php //include "NavBar.php"; ?>
   
   <div class="main">
      <div class="title"><h1>Ajout de rendez-vous</h1></div>
      <!-- Création formulaire -->
      <form method="POST" action="/medecin/saveRDV">  
         <h2>Remplissez les cases suivantes:</h2>
         <div class="infoPers">
            <label class="one">Matricule:</label>
            <input class="Matricule" type="text" name="mat" placeholder="Matricule" required><br>
            <label class="two">Date de visite:</label>
            <input class="dateVisite" type="date" name="dateV" placeholder="Date de visite" required><br>
            <label class="three">heure de visite:</label>
            <input class="Adresse" type="text" name="HV" placeholder="HH:MM" required><br>

        
            <div class="box">
               <label for="nature">Nature du RDV:</label><br>
               <select name="nature" id="nature">
                  <option value="non régulier" selected >non régulier </option>
                  <option value="annuel">Annuel</option>
                  <option value="semestriel">semestriel</option>
               </select>
            </div>
         </div>
         <div class="button">
            <input type="submit" value="Confirmer">
         </div>
      </form>
   </div>

   <?php //include "Footer.php"; ?>
</body>
