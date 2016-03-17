<h1><?php echo $datas[ 'author' ] -> name; ?></h1>

<?php if( $datas[ 'books' ] ): ?>
    <ul class="books">
        <h2>He wrote :</h2>
        <?php foreach( $datas[ 'books' ] as $book ): ?>
            <li class="books">
                <a href="?a=show&e=books&id=<?php echo $author -> id; ?>&with=authors,editors"><?php echo $book -> name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="Bio">
    <?php if ( $datas[ 'author' ] -> bio ): ?>
        <div>
            <h2>About him :</h2>
            <?php echo $datas[ 'author' ] -> bio; ?>
        </div>
    <?php endif; ?>
</div>

<div>
    <a href="index.php?a=index&e=authors">Tous les Auteurs</a>
</div>
