<?php
   if(isset($_POST["mat"]))
      $id=(int)$_POST["mat"];
   else
      $id=(int)$_SESSION["mat"];
   $P=new Authen();
   $data=$P->get_profile($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/views/CSS/profil.css"> <!-- Link -->
    <title>Profile</title>
</head>
<body>
   <?php //include "Background.php"; ?>
   <?php //include "NavBar.php"; ?>

   <div class="main">
      <div class="title"><h1>Profil</h1></div>
      <!-- Création profil -->
      <form>  
         <h2>Informations personnelles</h2>
         <div class="infoPers">
            <label class="firstlabel">Nom:<?php echo $data["nom"]?></label><br>

            <label class="secondlabel">Prénom:<?php echo $data["prenom"]?></label><br>

            <label class="thirdlabel">Date de naissance:<?php echo $data["date_n"]?></label><br>

            <label class="fourthlabel">Lieu de naissance:<?php echo $data["lieu_n"]?></label><br>

            <label class="fifthlabel">Adresse:<?php echo $data["addresse"]?></label><br>

            <label class="5label">Tel:<?php echo $data["tel"]?></label><br>

         </div>
            <label class="sixthlabel">Sexe:<?php echo $data["sexe"]?></label><br>
            <label class="eighthlabel">Service national:<?php echo $data["service_nat"]?></label><br>
         <h2>Informations professionnelles et d'entreprise </h2>
         <div class="infoEnt">
            <label class="premlabel">Division:<?php echo $data["division"]?></label><br>
 
            <label class="deuxlabel">Direction:<?php echo $data["direction"]?></label><br>

            <label class="troislabel">Service:<?php echo $data["service"]?></label><br>

            <label class="quatlabel">Atelier:<?php echo $data["atelier"]?></label><br>

            <label class="cinqlabel">Unité:<?php echo $data["unite"]?></label><br>

            <label class="sixlabel">Qualification professionnelle:<?php echo $data["qualifiquation"]?></label><br>

            <label class="septlabel">Activités professionnelles antérieures:<?php echo $data["act_anterieur"]?></label><br>

            <h3>Formation:</h3>
            <label class="label">Scolaire:<?php echo $data["formation_sco"]?></label><br>
            <label class="label">Professionnelle:<?php echo $data["formation_pro"]?></label><br>
         </div>
         <h2>Informations du compte </h2>
         <div class="infoCmpt">
            <label class="label1">Matricule:<?php echo $data["mat"]?></label><br>
            <label class="label2">E-mail:<?php echo $data["email"]?></label><br>
         </div>
      </form>
   </div>

   <?php //include "Footer.php"; ?>

</body>