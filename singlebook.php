<h1><?php echo $book -> title; ?></h1>

<?php if ( $book -> cover ): ?>
    <div>
        <img src="<?php echo $book -> cover; ?>" alt="" />
    </div>
<?php endif; ?>

<?php if ( $book -> summary ): ?>
    <div>
        <?php echo $book -> summary; ?>
    </div>
<?php endif; ?>

<div>
    <a href="index.php">Tous les livres</a>
</div>
