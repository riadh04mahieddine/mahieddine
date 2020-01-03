<?php
require("bdd.php"); // Inclusion de la connexion à la base de données ($pdo)
require 'vendor/autoload.php';
$api_key = "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";

if (isset($_POST["nickname"])) { // Si le formulaire a été envoyé et qu'on a reçu le champ "comment_nickname","comment_nickname"
    $contactname= $_POST["nickname"];
    $contactemail = $_POST["email"];
    $contacttelephone = $_POST["telephone"];
    $contactmessage = $_POST["messages"];

    $sql = "INSERT INTO contact (nickname, email, telephone, messages ) VALUES (?, ?, ?, ?)";

    // Requête SQL pour ajouter la catégorie dans la table comment (voir sql.sh)
    $query = $pdo->prepare($sql);
    $query->execute([$contactname, $contactemail, $contacttelephone, $contactmessage]); // On remplace au moment de l'exécution de la requête le "?" par la valeur de la variabe $categoryName autrement dit par la valeur du champ de formulaire
}
if (isset($_POST["nickname"])){
    $name= $_POST["nickname"];
    $email_id = $_POST["email"];
    $telephone = $_POST["telephone"];
    $msg = $_POST["messages"];
    var_dump($_POST);
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($email_id, $name);
    $email->setSubject($telephone);
    $email->addTo("rmahieddine04@gmail.com");
    $email->addContent("text/plain", $msg);
    $sendgrid = new \SendGrid($api_key);

    if($sendgrid->send($email)){
        echo "envoyer envoyer avec succées";
    }

}

// Redirection vers la page de listing des articles
header("Location:index.html");
//exit();

