<?php

require '../vendor/autoload.php';
require '../src/Log.php';

$log = new Log('test.json');

$log->deleteValue('apple');

print_r($log->getAll());