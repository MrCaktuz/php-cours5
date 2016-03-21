<h1>Book's title : <?php echo $datas[ 'book' ] -> title; ?></h1>

<?php if ( $datas[ 'book' ] -> cover ): ?>
    <div>
        <img src="<?php echo $datas[ 'book' ] -> cover; ?>" alt="" />
    </div>
<?php endif; ?>

<?php if ( $datas[ 'book' ] -> summary ): ?>
    <div>
        <?php echo $datas[ 'book' ] -> summary; ?>
    </div>
<?php endif; ?>

<?php if( $datas[ 'authors' ] ): ?>
    <h2>Written by :</h2>
    <ul class="authors">
        <?php foreach( $datas[ 'authors' ] as $author ): ?>
            <li class="authors">
                <a href="?a=show&e=authors&id=<?php echo $author -> id; ?>&with=books,editors"><?php echo $author -> name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if( $datas[ 'editors' ] ): ?>
    <h2>Edited by :</h2>
    <ul class="editors">
        <?php foreach( $datas[ 'editors' ] as $editor ): ?>
            <li class="editors">
                <a href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=books,authors"><?php echo $editor -> name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div>
    <a href="index.php">Tous les livres</a>
</div>
