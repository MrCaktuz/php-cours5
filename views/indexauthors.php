<!-- <?php var_dump( $datas[ 'authors' ] ); ?> -->
<h1>Liste des Authors</h1>
<ul>
    <?php foreach ( $datas[ 'authors' ] as $author ) :?>
            <li><a href="index.php?a=show&e=authors&id=<?php echo $author -> id; ?>&with=books,editors"><?php echo $author -> name; ?></a></li> <!--tous les liens pointe vers le index.-->
    <?php endforeach; ?>
</ul>
