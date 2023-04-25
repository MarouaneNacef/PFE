<?php
    $id=(int)$_POST["mat"];
    $med=new Medecin();
    $data=$med->get_emp_file($id);
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
    <?php if ($var == 2) : ?>
        <div>
            <div class="center">
                <!-- Old visite -->
                <!--//new-->
                <h1> NAME </h1>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Ordonnance</th>
                            <th>Conclusion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($data["rdv"] as $tab)
                        echo  "
                            <tr>
                                <td>".$tab["date"]."</td>
                                <td>".$tab["heure"]."</td>
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

    <?php include 'views/pages/Footer.php'; ?>
</body>
</html>