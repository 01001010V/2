<?php
// echo "This msg is sent from php file"

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$webSite = $_POST["website"];
$message = $_POST["message"];

if (!empty($email) && !empty($message)) {
  //if email and message field is not ampty
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //if user entered email is valid
    $receiver = "jvalmeida_pinho@outlook.com"; //email reciver email address!
    $subject = "From: $name <$email>"; //subject of the email. Subject looks lie From: Jvalmeida_pinho <abc@gmail.com>
    // merging concating all user values inside body variable. \n is used for new line
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage: $message\n\nRegards,\n$name";
    $sender = "From: $email"; //sender email

    if (mail($receiver, $subject, $body, $sender)) {
      //mai() is a inbuilt php function to send email
      echo "Sua mensagem foi enviada";
    } else {
      echo "Desculpe não conseguiu enviar sua mensagem!";
    }
  } else {
    echo "Digite um endereço de e-mail válido!";
  }
} else {
  echo "Os campos de email e mensagem estão vazios";
}
