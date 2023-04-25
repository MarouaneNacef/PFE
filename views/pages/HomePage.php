<?php
    $id=(int)$_SESSION["mat"];
    $emp=new Employe();
    $data=$emp->get_visit($id);
    $valid=array();
    $novalid=array();
    foreach($data as $tab)
    {
        if($tab["valid"]==0)
            $novalid[]=$tab;
        if($tab["valid"]==1)
            $valid[]=$tab;
    }
    $dm=$emp->get_demande($id);
    $med=new Medecin();
    $dmn=$med->get_demande($id);
    $plan=$med->get_planing($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/views/CSS/Home.css"> <!-- Link -->
</head>
<body>
    <?php include 'views/pages/Background.php'; ?>
    <?php include 'views/pages/NavBar.php'; ?>

    <?php $var=$_SESSION["prv"];?>

    <!--Adm or Emp-->
    <?php if ($var == 1 || $var == 3) : ?>
        <div>
            <div class="center">
                <!-- Old Demande -->
                <h1> Demande de report d'un rendez-vous</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Doc ID</th>
                            <th>Annuler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($dm as $tab)
                        echo  "
                            <tr>
                                <td>".$tab["date"]."</td>
                                <td>".$tab["heure"]."</td>
                                <td>".$tab["id_med"]."</td>
                                <td><form method=\"POST\" action=\"/employe/annuler\">
                                <input type=\"hidden\" name=\"id_d\" value=\"".$tab["id_v"]."\">
                                <button>X</button></form></td>
                            </tr>
                            ";
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="center">
                <!-- New RDV -->
                <h1> Rendez-vous </h1>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Doc ID</th>
                            <th>Reporter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($novalid as $tab)
                        echo  "
                            <tr>
                                <td>".$tab['date']."</td>
                                <td>".$tab['heure']."</td>
                                <td>".$tab['id_med']."</td>
                                <td><form method=\"POST\" action=\"/employe/reporter\">
                                <input type=\"hidden\" name=\"id_v\" value=\"".$tab["id"]."\">
                                <button>+</button></form></td>
                            </tr>
                            ";
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="center">
                <!-- Old visite -->
                <h1> Visite </h1>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Doc ID</th>
                            <th>Ordonnance</th>
                            <th>Conclusion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($valid as $tab)
                        echo  "
                            <tr>
                                <td>".$tab["date"]."</td>
                                <td>".$tab["heure"]."</td>
                                <td>".$tab["id_med"]."</td>
                                <td>".$tab["ordonnance"]."</td>
                                <td>".$tab["conclusion"]."</td>
                            </tr>
                            ";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <!--Med-->
    <?php if ($var == 2) : ?>
        <div>
            <div class="center">
                <!-- New Demande -->
                <h1> Demande de report d'un rendez-vous </h1>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Emp ID</th>
                            <th>Reporter</th>
                            <th>Annuler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($dmn as $tab)
                        echo  "
                            <tr>
                                <td>".$tab["date"]."</td>
                                <td>".$tab["heure"]."</td>
                                <td>".$tab["id_emp"]."</td>
                                <td><form><button>V</button></form></td>
                                <td><form method=\"POST\" action=\"/employe/annuler\">
                                <input type=\"hidden\" name=\"id_d\" value=\"".$tab["id_v"]."\">
                                <button>X</button></form></td>
                            </tr>
                            ";
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="center">
                <!-- New RDV -->
                <h1> Rendez-vous </h1>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Emp ID</th>
                            <th>Valider</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($plan as $tab)
                        echo  "
                            <tr>
                                <td>".$tab["date"]."</td>
                                <td>".$tab["heure"]."</td>
                                <td>".$tab["id_emp"]."</td>
                                <td><form method=\"POST\" action=\"/medecin/valider\">
                                <input type=\"hidden\" name=\"id_v\" value=\"".$tab["id"]."\">
                                <button>+</button></form></td>
                            </tr>
                            ";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php include 'views/pages/Footer.php'; ?>
</body>
</html>