
<font face="arial" size="2"><a href="../www/index.php?vue=ecriture">Ecrire un message</a>
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
