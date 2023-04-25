<?php
   $adm=new Admin();
   $data=$adm->get_emp((int)$_POST["mat"]);
   $tmp=explode("-",$data["date_n"]);
   $tmp=array($tmp[2],$tmp[1],$tmp[0]);
   $tmp=implode("-",$tmp);
   $data["date_n"]=$tmp;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/views/CSS/add.css"> <!-- Link -->
    <title>modifier un profile</title>
</head>
<body>
   <?php //include "Background.php"; ?>
   <?php //include "NavBar.php"; ?>
   
   <div class="main">
      <div class="title"><h1>Formulaire d'inscription</h1></div>
      <!-- Création formulaire -->
      <form method="POST" action="/admin/alter">
         <input type="hidden" name="old_mat" value="<?php echo $_POST["mat"]?>">
         <h2>Informations personnelles</h2>
         <div class="infoPers">
            <label class="firstlabel">Nom:</label>
            <input class="Nom" type="text" name="nom" required value="<?php echo $data["nom"]?>"><br>
            <label class="secondlabel">Prénom:</label>
            <input class="Prenom" type="text" name="prenom"  required value="<?php echo $data["prenom"]?>"><br>
            <label class="thirdlabel">Date de naissance:</label>
            <input class="dateNaiss" type="date" name="date_n" id="date" required value="<?php echo $data["date_n"]?>"><br>
            <!--<script> document.getElementById("date").defaultValue = "<?php //echo $data["date_n"]?>";</script>-->
            <label class="fourthlabel">Lieu de naissance:</label>
            <input class="Adresse" type="text" name="lieu_n"  required value="<?php echo $data["lieu_n"]?>"><br>
            <label class="fifthlabel">Adresse:</label>
            <input class="Adresse" type="text" name="addresse" required value="<?php echo $data["addresse"]?>"><br>
            <label class="5label">Tel:</label>
            <input class="Tel" type="text" name="tel" required value="<?php echo $data["tel"]?>"><br>
         </div>
         <label class="sixthlabel">Sexe:</label><br>
         <?php
            $h="";$f="";
            if($data["sexe"]=="Homme")
               $h="checked";
            else
               $f="checked";
         ?>
         <div class="rad">
            <input type="radio" id="Sexe" name="sexe" value="Homme"required <?php echo $h?>>
            <label for="Homme">Homme</label><br>
            <input type="radio" id="Sexe" name="sexe" value="Femme" required <?php echo $f?>>
            <label for="Femme">Femme</label><br>
            <?php 
               $c="";$m="";$d="";
               switch($data["situ_fam"])
               {
                  case "Célibataire";
                     $c="checked";
                     break;
                  case "Marié";
                     $m="checked";
                     break;
                  case "Divorcé":
                     $d="checked";
                     break;
               }
            ?>
            <label class="seventhlabel">Situation familiale:</label><br>
            <input type="radio" id="situFam" name="situ_fam" value="Célibataire" required <?php echo $c?>>
            <label for="Célibataire">Célibataire</label><br>
            <input type="radio" id="situFam" name="situ_fam" value="Marié" required <?php echo $m?>>
            <label for="Marié">Marié</label><br>
            <input type="radio" id="situFam" name="situ_fam" value="Divorcé" required <?php echo $d?>>
            <label for="Divorcé">Divorcé</label><br>
            <?php
               $a=$d=$i="";
               switch($data["service_nat"])
               {
                  case "Accompli":
                     $a="checked";
                     break;
                  case "Dispensé":
                     $d="checked";
                     break;
                  case "Inapte":
                     $i="checked";
                     break;
               }
            ?>
            <label class="eighthlabel">Service national:</label><br>
            <input type="radio" id="serNat" name="service_nat" value="Accompli" required <?php echo $a?>>
            <label for="Accompli">Accompli</label><br>
            <input type="radio" id="serNat" name="service_nat" value="Dispensé" required <?php echo $d?>>
            <label for="Dispensé">Dispensé</label><br>
            <input type="radio" id="serNat" name="service_nat" value="Inapte" required <?php echo $i?>>
            <label for="Inapte">Inapte</label><br>
         </div>
         <h2>Informations professionnelles et d'entreprise </h2>
         <div class="infoEnt">
            <label class="premlabel">Division:</label>
            <input class="Division" type="text" name="division" required value="<?php echo $data["division"]?>"><br>
            <label class="deuxlabel">Direction:</label>
            <input class="Direction" type="text" name="direction" required value="<?php echo $data["direction"]?>"><br>
            <label class="troislabel">Service:</label>
            <input class="Service" type="text" name="service" required value="<?php echo $data["service"]?>"><br>
            <label class="quatlabel">Atelier:</label>
            <input class="Atelier" type="text" name="atelier" required value="<?php echo $data["atelier"]?>"><br>
            <label class="cinqlabel">Unité:</label>
            <input class="Unité" type="text" name="unite" required value="<?php echo $data["unite"]?>"><br>

            <label class="premlabel">Post:</label>
            <input class="Division" type="text" name="post" required value="<?php echo $data["post"]?>"><br>

            <label class="sixlabel">Qualification professionnelle:</label>
            <input class="qualPro" type="text" name="qualifiquation" required value="<?php echo $data["qualifiquation"]?>"><br>
            <label class="septlabel">Activités professionnelles antérieures:</label>
            <input class="actProAnt" type="text" name="act_anterieur" required value="<?php echo $data["act_anterieur"]?>"><br>
            <h4>Formation:</h4><br>
            <input class="Scolaire" type="text" name="formation_sco" required value="<?php echo $data["formation_sco"]?>"><br><br>
            <input class="Professionnelle" type="text" name="formation_pro" required value="<?php echo $data["formation_pro"]?>"><br>
         </div>
         <h2>Informations du compte </h2>
         <div class="infoCmpt">
            <label class="label1">Matricule:</label>
            <input class="Matricule" type="text" name="mat" required value="<?php echo $data["mat"]?>"><br>
            <label class="label2">E-mail:</label>
            <input class="E-mail" type="text" name="email" required value="<?php echo $data["email"]?>"><br>
            <label class="label3">Mot de passe:</label>
            <input class="MDP" type="password" name="passwd" required value="<?php echo $data["passwd"]?>"><br>
         </div>
         <?php
         $a=$m=$e="";
         switch($data["pervillage"])
               {
                  case 1:
                     $a="selcted";
                     break;
                  case 2:
                     $m="selected";
                     break;
                  case 3:
                     $e="selected";
                     break;
               }
         ?>
         <div class="box">
            <label for="nature">Fonction:</label><br>
            <select name="pervillage" id="Rank">
               <option value="1" <?php echo $a?>>Admin </option>
               <option value="2" <?php echo $m?>>Médecin</option>
               <option value="3" <?php echo $e?>>Employé</option>
            </select>
         </div>
         <!-- submit button -->
         <div class="button">
            <input type="submit" value="modiffier le compte">
         </div>
      </form>
   </div>

<?php // include "Footer.php"; ?>
<?php require_once "notification.php"?>
</body>

            