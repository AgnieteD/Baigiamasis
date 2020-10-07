<?php
require '../bootloader.php';

use App\App;

App::$db->createTable('users');
App::$db->createTable('feedback');