<h1><?php echo $datas[ 'author' ] -> name; ?></h1>

<div class="birth">
    <?php if ( $datas[ 'author' ] -> birth_date ): ?>
        <div>
            <h2>Né le :</h2>
            <?php echo $datas[ 'author' ] -> birth_date; ?>
        </div>
    <?php endif; ?>
</div>

<div class="death">
    <?php if ( $datas[ 'author' ] -> death_date ): ?>
        <div>
            <h2>Mort le :</h2>
            <?php echo $datas[ 'author' ] -> death_date; ?>
        </div>
    <?php endif; ?>
</div>

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
