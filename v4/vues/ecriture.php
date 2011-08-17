
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


    <b><font face="Arial, Helvetica, sans-serif" color="#3344cc" size="3">ECRIRE UN MESSAGE</font></b>
    <br />
    <!-- notre formulaire... action : on retourne dans ce même fichier avec en plus la
    variable test qui prend la valeur ok et toutes les infos du formulaire...
    Le onSubmit sert à vérifier si le contenu du formulaire n'est pas vide... (voir function
    js appelée)
    -->
    <form method="post" onSubmit="return test_form(this.mess, this.expe)" action="../www/index.php?vue=ecriture&test=ok">
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

