<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser les données reçues
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Valider que tous les champs sont bien remplis
    if ($name && $email && $message) {
        // Adresse email où recevoir les messages
        $to = "tonemail@example.com";  // Remplace par ton adresse email
        $subject = "Message de contact depuis le portfolio";
        $headers = "From: $email";

        // Préparer le contenu de l'email
        $email_body = "Nom: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Message:\n$message";

        // Envoyer l'email
        if (mail($to, $subject, $email_body, $headers)) {
            echo "Merci pour votre message. Je vous répondrai dès que possible.";
        } else {
            echo "Erreur lors de l'envoi. Veuillez réessayer plus tard.";
        }
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
}
?>
