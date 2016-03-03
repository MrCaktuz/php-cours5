<h1><?php echo $datas[ 'book' ] -> title; ?></h1>

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

<div>
    <a href="index.php">Tous les livres</a>
</div>
