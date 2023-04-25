<?php
    $adm=new Admin();
    $list=$adm->get_emp_list();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/views/CSS/profilelist.css"> <!-- Link -->
    <title>List des employés</title>
</head>
<body>
    <?php include "views/pages/Background.php";?>
    <?php include "views/pages/NavBar.php";?>

    <div>
        <div class="center">
            <!-- Employe list -->
            <h1> Liste des employés </h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>E-mail</th>
                        <?php if($_SESSION["prv"]==1)
                        {
                        echo "<th>Modifier</th>";
                        }
                        ?>
                        <th>Informations</th>
                        <?php if($_SESSION["prv"]==1)
                        {
                        echo "<th>Supprimer</th>";
                        }?>
                        <!--//new-->
                        <?php if($_SESSION["prv"]==2)
                        {
                        echo "<th>Profile</th>";
                        }?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($list as $l) {
                            echo "<tr>";
                                echo "<td>".$l['mat']."</td>";
                                echo "<td>".$l["nom"]."</td>";
                                echo "<td>".$l["prenom"]."</td>";
                                echo "<td>".$l["email"]."</td>";
                                if($_SESSION["prv"]==1)
                                echo "<td><form method=\"POST\" action=\"/admin/modiffier\">
                                <input type=\"hidden\" name=\"mat\" value=\"$l[mat]\">
                                <button>V</button></form></td>";
                                echo "<td><form method=\"POST\" action=\"/profile\">
                                <input type=\"hidden\" name=\"mat\" value=\"$l[mat]\">
                                <button>?</button></form></td>";
                                if($_SESSION["prv"]==1)
                                echo "<td><form method=\"POST\" action=\"/admin/delete_acc\" onsubmit=\"return confirm('Voulez vous supprimer ce compte');\">
                                <input type=\"hidden\" name=\"mat\" value=\"$l[mat]\">
                                <button>X</button></form></td>";
                                //new
                                if($_SESSION["prv"]==2)
                                echo "<td><form method=\"POST\" action=\"/madecin/med_doc\">
                                <input type=\"hidden\" name=\"mat\" value=\"$l[mat]\">
                                <button>X</button></form></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "views/pages/Footer.php";?>
    </body>
</html>