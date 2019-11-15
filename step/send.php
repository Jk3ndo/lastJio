<?php

	/* Récupération des informations du formulaire*/
 $nom = $_POST['firstname'];
 $prenom = $_POST['lastname'];
 $mail = $_POST['mail'];
 $subject = $_POST['subject'];
 $motif = $_POST['motif'];
 $message = $_POST['message'];

$m = "Jiot3ch_Hydro@gmail.com";
$md = "kenguehunterdonald@gmail.com";

 $msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :<br/><br/>";
 $msg_ok = "Votre demande a bien été prise en compte.";
 $sms = $msg_erreur;
 define('MAIL_DESTINATAIRE',$md); // remplacer par votre email
 define('MAIL_SUJET', $subject); 

//Préparation de l'entête du mail:
  $mail_entete  = "MIME-Version: 1.0\r\n";
  $mail_entete .= "From: {$_POST['firstname']} "
               ."<{$_POST['mail']}>\r\n";
  $mail_entete .= 'Reply-To: '.$m."\r\n";
  $mail_entete .= 'Content-Type: text/plain; charset="iso-8859-1"';
  $mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
  $mail_entete .= 'X-Mailer:PHP/' . phpversion()."\r\n";

$corps= $motif.",\n".$message;
 // envoi du mail
  if (mail(MAIL_DESTINATAIRE,MAIL_SUJET,$corps,$mail_entete)) {
    //Le mail est bien expédié
    echo $msg_ok;
    header("Location: contact.php?var=".$msg_ok);
  } else {
    //Le mail n'a pas été expédié
    $rep= "Une erreur est survenue lors de l'envoi du formulaire. Veuillez réessayer SVP.";
    header("Location: contact.php?var=".$rep);
  }

?>