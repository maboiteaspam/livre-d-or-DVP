<html>
    <head>
        <title>COMMENT CREER SON LIVRE D'OR</title>
        <META NAME="reply-to" CONTENT="ludo@informaticien.com">
        <META NAME="copyright" CONTENT="GIAMBIASI ludovic">
        <script type="text/javascript">
            function test_form(mess, expe) {
               if(mess.value=="") { alert('Vous devez tapez un message !')
                   mess.focus();return false }
                 if(expe.value=="") { alert('Vous devez tapez votre nom !')
                   expe.focus();return false }
               return true
            }
           // script permettant de tester si les champs de saisie sont bien remplis...
        </script>
    </head>
    <body>
    
    <?php
    if($test=="ok") {   // on regarde si la variable test = "ok"...
                        // si l'on n'a pas envoyé le formulaire cette variable n'est pas égale à ok
                                // dès que l'on a envoyé le formulaire, cette variable = ok donc
                                // On enregistre le message dans la bd et on affiche
                                // l'information comme quoi le message a bien été enregistré...
       $Date  = date("Y/m/d"); // on récupère la date à laquelle le message est posté
       $query = "INSERT INTO livre(codelivre, message, expediteur, date)"; // cette requette dit
       $query .= " VALUES('', '$mess','$expe', '$Date')"; 				 				 // d'envoyer les éléments du formulaire dans la base
       $result = mysql_query($query); // on enregistre
    ?>
    
    <!-- Affichage du r�sultat... -->
    <b><font face="Arial, Helvetica, sans-serif" color="#3344cc" size="3">Votre message a &eacute;t&eacute; correctement enregistr&eacute;</font></b>
    <br /><br />
    <font size="3"><a href="index.php?vue=livre"><b>Lire les messages</b></a></font>
    <?php } // fin du premier test ?>
    
    <?php if ($test!="ok"){ // première ouverture du fichier ecriture... on remplie le formulaire
    // cette partie est cachée lorsque l'on a envoyé le message...
    ?>
    <b><font face="Arial, Helvetica, sans-serif" color="#3344cc" size="3">ECRIRE UN MESSAGE</font></b>
    <br />
    <!-- notre formulaire... action : on retourne dans ce même fichier avec en plus la
    variable test qui prend la valeur ok et toutes les infos du formulaire...
    Le onSubmit sert à vérifier si le contenu du formulaire n'est pas vide... (voir function
    js appelée)
    -->
    <form method="post" onSubmit="return test_form(this.mess, this.expe)" action="ecriture.php?test=ok">
        <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" valign="top">
                <font size="2" face="Arial, Helvetica, sans-serif" color="#3344cc"><b>Votre nom</b></font>
            </td>
            <td align="center" valign="top">
                <input type="text" name="expe" size="30"><!-- on nomme expe le nom de l'expéditeur... -->
                <font size="1" face="Arial, Helvetica, sans-serif;" color="#3344cc"><b>(pr&eacute;nom ou pseudo accept&eacute;)</b></font>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <hr color="#3366cc">
            </td>
        </tr>
        <tr>
            <td align="center" valign="top">
                <font size="2" face="Arial, Helvetica, sans-serif" color="#3344cc"><b>Votre&nbsp;message :</b></font>
            </td>
            <td align="center" valign="top"><!-- on nomme mess le message de l'expéditeur... -->
                <textarea cols="50" rows="10" name="mess"></textarea>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <hr color="#3366cc">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="ok" value="&nbsp;Envoyer&nbsp;" style="cursor:hand;">
            </td>
        </tr>
        </table>
    </form>
        
    <?php } ?>
    
    </body>
</html>
