<h1>Liste des titres de livres</h1>
<ul>
    <?php foreach ( $datas[ 'books' ] as $book ) :?> <!-- le foreach permet de faire une liste de chaque books -->
            <li><a href="index.php?a=show&e=books&id=<?php echo $book -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a></li> <!--tous les liens pointe vers le index.-->
    <?php endforeach; ?>
</ul>
