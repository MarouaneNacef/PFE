<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/views/CSS/add.css"> <!-- Link -->
    <title>Ajouter de profile</title>
</head>
<body>
   <?php //include "Background.php"; ?>
   <?php //include "NavBar.php"; ?>
   
   <div class="main">
      <div class="title"><h1>Formulaire d'inscription</h1></div>
      <!-- Création formulaire -->
      <form method="POST" action="/admin/save">  
         <h2>Informations personnelles</h2>
         <div class="infoPers">
            <label class="firstlabel">Nom:</label>
            <input class="Nom" type="text" name="nom" placeholder="Nom" required><br>
            <label class="secondlabel">Prénom:</label>
            <input class="Prenom" type="text" name="prenom" placeholder="Prenom" required><br>
            <label class="thirdlabel">Date de naissance:</label>
            <input class="dateNaiss" type="date" name="date_n" placeholder="Date de naissance" required><br>
            <label class="fourthlabel">Lieu de naissance:</label>
            <input class="Adresse" type="text" name="lieu_n" placeholder="Lieu de naissance" required><br>
            <label class="fifthlabel">Adresse:</label>
            <input class="Adresse" type="text" name="addresse" placeholder="Adresse"required><br>
            <label class="5label">Tel:</label>
            <input class="Tel" type="number" name="tel" placeholder="Tel" required><br>
         </div>
         <label class="sixthlabel">Sexe:</label><br>
         <div class="rad">
            <input type="radio" id="Sexe" name="sexe" value="Homme"required>
            <label for="Homme">Homme</label><br>
            <input type="radio" id="Sexe" name="sexe" value="Femme" required>
            <label for="Femme">Femme</label><br>
            <label class="seventhlabel">Situation familiale:</label><br>
            <input type="radio" id="situFam" name="situ_fam" value="Célibataire" required>
            <label for="Célibataire">Célibataire</label><br>
            <input type="radio" id="situFam" name="situ_fam" value="Marié" required>
            <label for="Marié">Marié</label><br>
            <input type="radio" id="situFam" name="situ_fam" value="Divorcé" required>
            <label for="Divorcé">Divorcé</label><br>
            <label class="eighthlabel">Service national:</label><br>
            <input type="radio" id="serNat" name="service_nat" value="Accompli" required>
            <label for="Accompli">Accompli</label><br>
            <input type="radio" id="serNat" name="service_nat" value="Dispensé" required>
            <label for="Dispensé">Dispensé</label><br>
            <input type="radio" id="serNat" name="service_nat" value="Inapte" required>
            <label for="Inapte">Inapte</label><br>
         </div>
         <h2>Informations professionnelles et d'entreprise </h2>
         <div class="infoEnt">
            <label class="premlabel">Division:</label>
            <input class="Division" type="text" name="division" placeholder="Division" required><br>
            <label class="deuxlabel">Direction:</label>
            <input class="Direction" type="text" name="direction" placeholder="Direction" required><br>
            <label class="troislabel">Service:</label>
            <input class="Service" type="text" name="service" placeholder="Service" required><br>
            <label class="quatlabel">Atelier:</label>
            <input class="Atelier" type="text" name="atelier" placeholder="Atelier"required><br>
            <label class="cinqlabel">Unité:</label>
            <input class="Unité" type="text" name="unite" placeholder="Unité"required><br>

            <label class="premlabel">Post:</label>
            <input class="Division" type="text" name="post" placeholder="Post" required><br>

            <label class="sixlabel">Qualification professionnelle:</label>
            <input class="qualPro" type="text" name="qualifiquation" placeholder="Qualification professionnelle"required><br>
            <label class="septlabel">Activités professionnelles antérieures:</label>
            <input class="actProAnt" type="text" name="act_anterieur" placeholder="Activités professionnelles antérieures"required><br>
            <h4>Formation:</h4><br>
            <input class="Scolaire" type="text" name="formation_sco" placeholder="Scolaire" required><br><br>
            <input class="Professionnelle" type="text" name="formation_pro" placeholder="Professionnelle" required><br>
         </div>
         <h2>Informations du compte </h2>
         <div class="infoCmpt">
            <label class="label1">Matricule:</label>
            <input class="Matricule" type="number" name="mat" placeholder="Matricule" required><br>
            <label class="label2">E-mail:</label>
            <input class="E-mail" type="email" name="email" placeholder="E-mail" required><br>
            <label class="label3">Mot de passe:</label>
            <input class="MDP" type="password" name="passwd" placeholder="Mot de passe" required><br>
            <label class="label4">Confirmer mot de passe:</label>
            <input class="CMDP" type="password" name="MDP" placeholder="Mot de passe"required><br>
         </div>
         <div class="box">
            <label for="nature">Fonction:</label><br>
            <select name="pervillage" id="Rank">
               <option value="1">Admin </option>
               <option value="2">Médecin</option>
               <option value="3" selected>Employé</option>
            </select>
         </div>
         <!-- submit button -->
         <div class="button">
            <input type="submit" value="Créer le compte">
         </div>
      </form>
   </div>

<?php // include "Footer.php"; ?>
<?php require_once "notification.php"?>
</body>

            