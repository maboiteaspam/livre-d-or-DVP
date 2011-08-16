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
Pour tout probl�me...
		 ludo@informaticien.com
=========================================
COMMENT CREER SON LIVRE D'OR ?
Etape n�1
		Vous devez cr�er une table dans votre base de donn�es...
		#------
		CREATE TABLE livre (
		   codelivre int(11) NOT NULL auto_increment,
   			 message blob,
   			 expediteur varchar(100),
   			 date date,
   			 PRIMARY KEY (codelivre)
			 );
		#------
		Vous pouvez ajouter des champs... (e-mail, nom, pr�nom...)

Etape n�2
		Vous devez changer les param�tres de connexion � votre base dans
		le fichier connexion.php

Etape n�3
		Adaptez le code du livre d'or au design de votre site.
		le fichier livre.php (celui-ci) contient le code pour lire les messages du livre d'or.
		le fichier ecriture.php permet l'�criture de messages...
		C'est fini.

Etape n�4
		Compr�hension du code source du livre d'or... vous
		allez voir, ce n'est pas bien compliqu�.
***********************************************************************
-->
<?php
 $sql = mysql_query("select count(*) from livre"); // pour conna�tre le nombre de messages...
 $total = @mysql_fetch_array($sql);	 							 // ...pr�sents dans le livre d'or.
 $resder = $total[0];															 // le r�sultat sera stock� dans la variable $resder
 $sql = mysql_query("select * from livre order by date desc"); // voici la requette permettant d'aller chercher les messages...
 																 			 // ...tri�s par date
?>

<font face="arial" size="2"><a href="index.php?vue=ecriture">Ecrire un message</a>
<hr />
Nombre de messages : <b><?php echo $resder; // on affiche le nombre de message ?></b>
<br /><br />
<!-- pour se rep�rer... -->
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
while($valeurlud = @mysql_fetch_array($sql)){ // d�but de la boucle qui se terminera � la fin des enregistrements

    list($a,$m,$j)=explode("-",$valeurlud["date"]); // gestion de la date : voir le tutoriel
    $date="$j-$m-$a";																// "gestion date" pour comprendre...
?>
<table border="2" bordercolor=black width="600">
    <tr bordercolor=white>
        <td width="200" align=center bgcolor="white">
            <font color="#3344cc" size="2" face="Arial, Helvetica, sans-serif;"><b><? echo $valeurlud["expediteur"]; ?></b></font>
            <br />
            <font color="#3344cc" size="2" face="Arial, Helvetica, sans-serif;">( <? echo $date; ?> )</font>
        </td>
        <td width="400" align=center bgcolor="#88ccee">
            <font color="black" size="2" face="Arial, Helvetica, sans-serif;"><? echo $valeurlud["message"]; ?></font>
        </td>
    </tr>
</table>
<?php } // on ferme la boucle ?>

</body>
</html>
