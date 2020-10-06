<nav class="navbar">
    <?php foreach ($data as $nav_value) : ?>
        <a href="<?= $nav_value['href']; ?> " class="<?= $nav_value['class'] ?? ''; ?>"><?= $nav_value['title']; ?></a>
    <?php endforeach; ?>
</nav>