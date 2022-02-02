<link rel="stylesheet" href="public/css/index.css">
<h1 style="color: red">ALl POSTS</h1>

<?php foreach($posts as $key => $post): ?>
    <h2><?=$post['id']; ?></h2>
    <p><?=$post['name'];?></p>
<?php endforeach; ?>