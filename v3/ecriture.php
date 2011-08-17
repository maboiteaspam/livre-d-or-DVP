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
    $message_utilisateur        = "";
    $formulaire_est_en_erreur   = false;
    $formulaire_est_valide      = isset($_GET["test"])?$_GET["test"]:"KO";     // lecture de la variable d'url nommée : test
    if($formulaire_est_valide==="ok") {  // on regarde si la variable test = "ok"...
                                        // si l'on n'a pas envoyé le formulaire cette variable n'est pas égale à ok
                                        // dès que l'on a envoyé le formulaire, cette variable = ok donc
                                        // On enregistre le message dans la bd et on affiche
                                        // l'information comme quoi le message a bien été enregistré...

        $mess = isset($_POST["mess"])?$_POST["mess"]:"";    // Lecture de la variable de formulaire (POST) nommée : mess
        $expe = isset($_POST["expe"])?$_POST["expe"]:"";    // Lecture de la variable de formulaire (POST) nommée : expe

        $mess = trim($mess);        // on supprime les espaces blancs
        $mess = strip_tags($mess);  // on supprime les balises HTML
        if( $mess === "" ){
            $formulaire_est_en_erreur = true;
        }

        $expe = trim($expe);        // on supprime les espaces blancs
        $expe = strip_tags($expe);  // on supprime les balises HTML
        if( $expe === "" ){
            $formulaire_est_en_erreur = true;
        }

        if( $formulaire_est_en_erreur === false ){  // si aucune erreurs n'est détectée
                                                    // on procède à l'écriture dans la base de données
            $Date  = date("Y/m/d"); // on récupère la date à laquelle le message est posté
            $insertion_reussie = inserer_message( $mess, $expe, $Date );
            if( $insertion_reussie === false ){
                $message_utilisateur = "Un problème grave est survenu, nous ne pouvons enregistrer votre message.";
            }else{
                $message_utilisateur = "Votre message a &eacute;t&eacute; correctement enregistr&eacute;";
            }
        }else{
            $message_utilisateur = "Des erreurs sont survenues lors de la validation de votre message....";
        }
    ?>
    <!-- Affichage du résultat... -->
    <b><font face="Arial, Helvetica, sans-serif" color="#3344cc" size="3"><?php echo $message_utilisateur; ?></font></b>
    <br /><br />
    <font size="3"><a href="index.php?vue=livre"><b>Lire les messages</b></a></font>
    <?php } // fin du premier test ?>

    
    
    <?php if ($formulaire_est_valide!=="ok"){ // première ouverture du fichier ecriture... on remplie le formulaire
    // cette partie est cachée lorsque l'on a envoyé le message...
    ?>
        <b><font face="Arial, Helvetica, sans-serif" color="#3344cc" size="3">ECRIRE UN MESSAGE</font></b>
        <br />
        <!-- notre formulaire... action : on retourne dans ce même fichier avec en plus la
        variable test qui prend la valeur ok et toutes les infos du formulaire...
        Le onSubmit sert à vérifier si le contenu du formulaire n'est pas vide... (voir function
        js appelée)
        -->
        <form method="post" onSubmit="return test_form(this.mess, this.expe)" action="index.php?vue=ecriture&test=ok">
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
