<?php

session_start();

// Supprime toutes les variables de session
$_SESSION = [];

// Détruit la session côté serveur
session_destroy();

// Supprime le cookie de connexion si tu utilises la branche cookie
setcookie('LOGGED_USER', '', time() - 3600, '/');

// Retour à la page d'accueil
header('Location: index.php');
exit;