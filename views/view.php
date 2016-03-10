<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $data['page_title']; ?></title>
    </head>
    <body>
        <?php include( 'views/partials/_main_navigation.php' ); ?>
        <?php include( $datas[ 'view' ] ); // le $data[...] correspond à la vue adéquat en fonction de ce qu'on veut ?>
    </body>
</html>
