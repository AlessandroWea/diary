<h1 style="green">Single post</h1>
<?php foreach($post as $value): ?>
    <h2>ID: <?=$value['id'];?></h2>
    <p>NAME: <?=$value['name'];?></p>
<?php endforeach; ?>