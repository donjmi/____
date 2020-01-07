<h1>Liste des derniers Posts</h1>

<?php foreach($posts as $articles): ?>

<h2><?= $articles['title'] ?></h2>

<p><?= $articles['content'] ?></p>

<?php endforeach ?>