<h2>Editor's name : <?php echo $datas[ 'editor' ] -> name; ?></h2>
<div class="logo">
    <img src="<?php echo $datas[ 'editor' ] -> logo; ?>" alt="" />
</div>
<div class="summary">
    <?php echo $datas[ 'editor' ] -> summary; ?>
</div>

<?php if( $datas[ 'books' ] ): ?>
    <h2>Books published :</h2>
    <ul class="books">
        <?php foreach( $datas[ 'books' ] as $book ): ?>
            <li class="books">
                <a href="?a=show&e=books&id=<?php echo $book -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if( $datas[ 'authors' ] ): ?>
    <h2>Authors published :</h2>
    <ul class="authors">
        <?php foreach( $datas[ 'authors' ] as $author ): ?>
            <li class="authors">
                <a href="?a=show&e=authors&id=<?php echo $author -> id; ?>&with=books,editors"><?php echo $author -> name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
