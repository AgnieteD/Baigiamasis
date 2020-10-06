<?php
session_start();
define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');

require ROOT . '/vendor/autoload.php';

require ROOT . '/app/config/routes.php';

require ROOT . '/core/functions/html.php';
require ROOT . '/core/functions/form/validators.php';
require ROOT . '/app/functions/form/validators.php';

$app = new App\App();