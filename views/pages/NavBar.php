<!--Navigation bar-->

<link rel="stylesheet" href="/views/CSS/NavBar.css"> <!-- Link -->

<nav>
    <img src="/views/Media/sona.jpg" alt="Sonatrach" class="logo left"> <!-- Link -->

    <?php $var=$_SESSION["prv"]; ?>

    <!--Left-->
        <!--Emp-->
    <?php if ($var == 3) : ?>
    <a href="/profile" class="left">Profil<span> / Employé</span></a> <!--Profil info-->
    <?php endif; ?>
        <!--Adm-->
    <?php if ($var == 1) : ?>
    <a href="/profile" class="left">Profil<span> / Admin</span></a> <!--Profil info-->
    <?php endif; ?>
        <!--Med-->
    <?php if ($var == 2) : ?>
    <a href="/profile" class="left">Profil<span> / Médecin</span></a> <!--Profil info-->
    <?php endif; ?>

    <!--Right -->
        <!--All-->
        <a href="/logout" class="right">Se déconnecter</a> <!--Logout Button-->
        <a href="/home" class="right">Home</a> <!--Logout Button-->
        <!--Adm + Med-->
    <?php if ($var == 1 || $var == 2) : ?>
    <a href="/admin/profil_list" class="right">Liste des employés</a> <!--Adm: Employe List-->
    <?php endif; ?>
        <!--Adm-->
    <?php if ($var == 1) : ?>
    <a href="/admin/addEmp" class="right">Ajouter un Profil</a> <!--Med: Add RDV-->
    <?php endif; ?>
        <!--Med-->
    <?php if ($var == 2) : ?>
    <a href="/medecin/addRDV" class="right">Ajouter un RDV</a> <!--Med: Add RDV-->
    <?php endif; ?>
</nav>