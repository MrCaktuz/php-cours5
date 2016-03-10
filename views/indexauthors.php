<?php var_dump($data[authors]); ?>
<ul>
    <?php foreach ( $datas[ 'authors' ] as $author ) :?>
            <li><a href="index.php?a=show&e=authors&id=<?php echo $author -> id; ?>"><?php echo $author -> name; ?></a></li> <!--tous les liens pointe vers le index.-->
    <?php endforeach; ?>
</ul>
