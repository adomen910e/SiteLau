<?php 

$email = htmlspecialchars($_POST['email']); 
$objet = "Mail contact site pro"; 
$nom = htmlspecialchars($_POST['nom']); 
$prenom = htmlspecialchars($_POST['prenom']); 
$texte = htmlspecialchars($_POST['message']); 
srand((double)microtime()*1000000); 
$boundary =md5(uniqid(rand())); 
$header = "From: $email \n"; 
$header .= "MIME-Version: 1.0\n"; 
$header .= "Content-Type: multipart/alternative; boundary=$boundary\n"; 
$destinataire = "laubourgeois.osteo@gmail.com"; 
$titre = "formulaire de contact"; 
$message = "\nThis is a multi-part message in MIME format."; 
$message .="\n--$boundary\nContent-Type : text/html; charset=\"iso-8859-1\"\n\n"; 
$message .="$nom - $prenom vous a contacté depuis votre site web  "; 
$message .="<br />"; 
$message .="<br />"; 
$message .="E-mail : $email\n"; 
$message .="<br>"; 
$message .="<br>"; 
$message .="objet : $objet\n"; 
$message .="<br>"; 
$message .="<br>"; 
$message .="texte : $texte\n"; 
$message .="<br>"; 
$message .="<br>"; 
$message.= "\n--$boundary--\n end of the multi-part"; 
mail($destinataire,$titre,$message,$header); 
echo "<center><h4><br>Merci , je vous repondrais le plus vite possible.</h4>"; 
header ("Refresh: 3;URL=./../index.html"); 
?> 