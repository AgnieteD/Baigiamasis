<section>
    <h2 class="title">Atsiliepimai</h2>
    <div>
        <?= $data['table']; ?>
    </div>
    <?php if (App\App::$session->getUser()) : ?>
        <div>
            <?php print $data['form']; ?>
        </div>
    <?php else: ?>
        <a class="button" href="<?= Core\Router::getUrl('register'); ?>">Norite parašyti komentarą? Užsiregistruokite</a>
    <?php endif; ?>
</section>