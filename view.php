<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>books</title>
    </head>
    <body>
        <ul>
            <?php foreach ( $books as $book ) :?>
                    <li><a href="index.php?id=<?php echo $book -> id; ?>"><?php echo $book -> title; ?></a></li> <!--tous les liens pointe vers le index.-->
            <?php endforeach; ?>
        </ul>
    </body>
</html>
