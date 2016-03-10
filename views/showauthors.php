<h1><?php echo $datas[ 'author' ] -> title; ?></h1>

<?php if ( $datas[ 'author' ] -> name ): ?>
    <div>
        <?php echo $datas[ 'author' ] -> name; ?>
    </div>
<?php endif; ?>

<div>
    <a href="index.php">Tous les Auteurs</a>
</div>
