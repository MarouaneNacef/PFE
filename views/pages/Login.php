<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <title>Centre medicale sonatrach</title>
    <link rel="stylesheet" href="/views/CSS/login.css"> <!-- Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css"> <!-- Link -->
</head>
<body>
<div class="splitleft">
  <div class="centered">
    <img src="/views/Media/144.png" alt="Sonatrach"> <!-- Link -->
    <h2>Bienvenue au centre de médecine du travail SONATRACH     <i class="bi bi-heart-pulse"></i></h2>
        <ul>
            <li>Consultez le dossier medicale</li>
            <li>Consultez les rendez-vous </li>
            <li>Prenez soin de votre santé et celle de vos collegues</li>
        </ul>
        <p><strong><< La santé est comme la richesse, il ne suffit pas de l'avoir,</strong></p>
       <p><strong> il faut savoir la conserver.>></strong></p>
  </div>
</div>   
<div class="splitright">
    <form method="POST" action="/login">
        <h3>Connectez-vous</h3>
    <div class="centered">
        <label for="username">Matricule</label>
        <input type="number" class="form-control" min="0" required placeholder="Matricule" id="number" name="mat">
    </div>
    <div class="centered">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" required placeholder="Mot de passe" id="password" name="passwd">
    </div>
        <button>Connecter   <i class="bi bi-door-open-fill"></i></button>
    </form>
</div>
<?php require_once "notification.php"; ?>
</body>
</html>