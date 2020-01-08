<h1>Liste des derniers Posts</h1>

<?php foreach($posts as $articles): ?>

<h2><a href="PostsController/Read/<?= $articles['id'] ?>"><?= $articles['title'] ?></a></h2>

<p><?= $articles['content'] ?></p>

<?php endforeach ?>