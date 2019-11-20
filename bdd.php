<?php
/**
 * Notre projet a régulièrement besoin de se connecter à la base de données
 * Pour éviter de répéter le code dans chaque page (et donc de compliquer la maintenance du site)
 * On isole la connexion à la base de données dans un fichier dédié
 */
$pdo = new PDO('mysql:host=localhost;dbname=site;charset=UTF8', 'root', 'root', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // On dit à PDO d'avoir par défaut une récupération des résultats (fecth, fetchAll) sous le mode d'un tableau associatif
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // On indique à PDO de nous renvoyer les erreurs SQL sous forme d'exception
]);

?>