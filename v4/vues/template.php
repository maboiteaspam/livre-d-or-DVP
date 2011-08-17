<html>
    <head>
        <title><?php echo $title; ?></title>
        <META NAME="reply-to" CONTENT="<?php echo $reply_to; ?>">
        <META NAME="copyright" CONTENT="<?php echo $copyright; ?>">
    </head>
    <body>
        <?php include( $configuration["repertoire_base"] . "vues/" . $vue_a_afficher . ".php"); ?>
    </body>
</html>
