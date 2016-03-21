<h1>Author's name : <?php echo $datas[ 'author' ] -> name; ?></h1>

<?php if( $datas[ 'books' ] ): ?>
    <h2>He wrote :</h2>
    <ul class="books">
        <?php foreach( $datas[ 'books' ] as $book ): ?>
            <li class="books">
                <a href="?a=show&e=books&id=<?php echo $book -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if( $datas[ 'editors' ] ): ?>
    <h2>He was published by :</h2>
    <ul class="editors">
        <?php foreach( $datas[ 'editors' ] as $editor ): ?>
            <li class="editors">
                <a href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=authors,books"><?php echo $editor -> name; ?></a>
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
