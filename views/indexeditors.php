<h1>Liste des éditeurs</h1>

<ul>
    <?php foreach ($datas['editors'] as $editor): ?>
        <li><a href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=authors,books"><?php echo $editor -> name; ?></a></li>
    <?php endforeach; ?>
</ul>
