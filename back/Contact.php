<?php
$from = htmlspecialchars($_POST["user_email"]);
$to = "contact@septembre-alexandre.fr";
$subject = htmlspecialchars($_POST["user_name"]);
echo $from;
$message = htmlspecialchars($_POST["user_message"]);
$headers = "From:" . $from;
$q = $db->prepare("INSERT INTO `messages` (`objet`, `contenu`, `email_source_message`, `dateEnvoi`) VALUES ('?', '?', '?', NOW());");
$q->execute(array($subject,$message,$from,));
?>