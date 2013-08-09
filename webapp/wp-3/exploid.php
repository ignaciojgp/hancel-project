
<?php

$emailsIds=$_GET['contacto'];
$emails = explode("|", $emailsIds);

foreach ($emails as $i => $value) {
    //enviar_mail($usuario, $mailsAmigos, $email);
    echo $emails[$i]."<br>";
}

?>