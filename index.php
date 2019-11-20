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
if (isset($_POST["submit"])){
    $name= $_POST["nickname"];
    $email_id = $_POST["email"];
    $telephone = $_POST["telephone"];
    $msg = $_POST["messages"];

    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom($email_id, $name);
    $email->setSubject($telephone);
    $email->addTo("rmahieddine04@gmail.com");
    $email->addContent("text/plain", $msg);
    //$email->addContent(
    //    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    //);
    $sendgrid = new \SendGrid($api_key);

    if($sendgrid->send($email)){
        echo "envoyer envoyer avec succées";
    }

}
    
    /*try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }*/


    // Redirection vers la page de listing des articles
    Header("Location: index.html");
    exit();
?>
