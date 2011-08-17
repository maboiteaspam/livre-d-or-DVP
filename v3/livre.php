<html>
    <head>
        <title>COMMENT CREER SON LIVRE D'OR</title>
        <META NAME="reply-to" CONTENT="ludo@informaticien.com">
        <META NAME="copyright" CONTENT="GIAMBIASI ludovic">

    </head>
<body>
<!--
***********************************************************************
Ce script est libre d'utilisation. Enjoy !
ludovic giambiasi
Pour tout problème...
		 ludo@informaticien.com
=========================================
COMMENT CREER SON LIVRE D'OR ?
Etape n°1
		Vous devez créer une table dans votre base de données...
		#------
		CREATE TABLE livre (
		   codelivre int(11) NOT NULL auto_increment,
   			 message blob,
   			 expediteur varchar(100),
   			 date date,
   			 PRIMARY KEY (codelivre)
			 );
		#------
		Vous pouvez ajouter des champs... (e-mail, nom, prénom...)

Etape n°2
		Vous devez changer les paramètres de connexion à votre base dans
		le fichier connexion.php

Etape n°3
		Adaptez le code du livre d'or au design de votre site.
		le fichier livre.php (celui-ci) contient le code pour lire les messages du livre d'or.
		le fichier ecriture.php permet l'écriture de messages...
		C'est fini.

Etape n°4
		Compréhension du code source du livre d'or... vous
		allez voir, ce n'est pas bien compliqué.
***********************************************************************
-->
<font face="arial" size="2"><a href="index.php?vue=ecriture">Ecrire un message</a>
<hr />
Nombre de messages : <b><?php echo compter_les_messages(); // on affiche le nombre de message ?></b>
<br /><br />
<!-- pour se repérer... -->
<table width="600">
    <tr>
        <td width="200" align="center">
            <b><font color="#3344cc" size="2" face="Arial, Helvetica, sans-serif;">
            Exp&eacute;diteur /
            <br /> Date </font></b>
        </td>
        <td width="400" align="center">
            <b><font color="#3344cc" size="3" face="Arial, Helvetica, sans-serif;">Message</font></b>
        </td>
    </tr>
</table>

<?php
   $messages = lire_les_messages_home();
   foreach( $messages as $message ){
?>
<table border="2" bordercolor=black width="600">
    <tr bordercolor=white>
        <td width="200" align=center bgcolor="white">
            <font color="#3344cc" size="2" face="Arial, Helvetica, sans-serif;"><b><? echo $message["expediteur"]; ?></b></font>
            <br />
            <font color="#3344cc" size="2" face="Arial, Helvetica, sans-serif;">( <? echo $message["date"]; ?> )</font>
        </td>
        <td width="400" align=center bgcolor="#88ccee">
            <font color="black" size="2" face="Arial, Helvetica, sans-serif;"><? echo $message["message"]; ?></font>
        </td>
    </tr>
</table>
<?php } // on ferme la boucle ?>

</body>
</html>
